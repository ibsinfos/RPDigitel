<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  @author     : Creativeitem
 *  date        : 10 February, 2017
 *  Human Resource Management System
 *  http://support.creativeitem.com
 */

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('utility');
        /* cache control */
//        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
//        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
//        $this->output->set_header('Pragma: no-cache');
//        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    //Default function, redirects to logged in user area
    public function index() {
         redirect(master_url() . 'login', 'refresh');
         exit;
        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
        if ($this->session->userdata('employee_login') == 1)
            redirect(base_url() . 'index.php?employee/dashboard', 'refresh');

        $this->load->view('backend/login');
    }

    //Ajax login function 
    function ajax_login() {
        $response = array();

        //Recieving post input of email, password from ajax request
        $email = $_POST["email"];
        $password = $_POST["password"];
        $response['submitted_data'] = $_POST;

        //Validating login
        $login_status = $this->validate_login($email, $password);
        $response['login_status'] = $login_status;
        if ($login_status == 'success') {
            $response['redirect_url'] = $this->session->userdata('last_page');
        }

        //Replying ajax request with validation response
        echo json_encode($response);
    }

    //Validating login informations from ajax request
    function validate_login($email = '', $password = '') {
        $credential = array('email' => $email, 'password' => sha1($password));

        // Checking login credential for users of the system
        $query = $this->db->get_where('user', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();

            //setting the session parameters for admin
            if ($row->type == 1) {
                $this->session->set_userdata('admin_login', '1');
                $this->session->set_userdata('login_type', 'admin');
            }

            //setting the session parameters for employees
            if ($row->type == 2) {
                $this->session->set_userdata('employee_login', '1');
                $this->session->set_userdata('login_type', 'employee');
            }
            //setting the common session parameters for all type of users of the system
            $this->session->set_userdata('login_user_id', $row->user_id);
            return 'success';
        }

        return 'invalid';
    }

    function forgot_password() {
        $this->load->view('backend/forgot_password');
    }

    function ajax_forgot_password() {
        $resp = array();
        $resp['status'] = 'false';
        $email = $_POST["email"];
        $reset_account_type = '';
        //resetting user password here
        $new_password = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $new_hashed_password = sha1($new_password);

        // Checking credential for admin
        $query = $this->db->get_where('admin', array('email' => $email));
        if ($query->num_rows() > 0) {
            $reset_account_type = 'admin';
            $this->db->where('email', $email);
            $this->db->update('admin', array('password' => $new_hashed_password));
            $resp['status'] = 'true';
            // send new password to user email
            $this->email_model->notify_email('password_reset_confirmation', $reset_account_type, $email, $new_password);
        }
        // Checking credential for staff
        $query = $this->db->get_where('staff', array('email' => $email));
        if ($query->num_rows() > 0) {
            $reset_account_type = 'staff';
            $this->db->where('email', $email);
            $this->db->update('staff', array('password' => $new_hashed_password));
            $resp['status'] = 'true';
            // send new password to user email
            $this->email_model->notify_email('password_reset_confirmation', $reset_account_type, $email, $new_password);
        }
        // Checking credential for client
        $query = $this->db->get_where('client', array('email' => $email));
        if ($query->num_rows() > 0) {
            $reset_account_type = 'client';
            $this->db->where('email', $email);
            $this->db->update('client', array('password' => $new_hashed_password));
            $resp['status'] = 'true';
            // send new password to user email
            $this->email_model->notify_email('password_reset_confirmation', $reset_account_type, $email, $new_password);
        }


        $resp['submitted_data'] = $_POST;

        echo json_encode($resp);
    }

    /*     * *RESET AND SEND PASSWORD TO REQUESTED EMAIL*** */

    function reset_password() {
        $account_type = $this->input->post('account_type');
        if ($account_type == "") {
            redirect(base_url(), 'refresh');
        }
        $email = $this->input->post('email');
        $result = $this->email_model->password_reset_email($account_type, $email); //SEND EMAIL ACCOUNT OPENING EMAIL
        if ($result == true) {
            $this->session->set_flashdata('flash_message', get_phrase('password_sent'));
        } else if ($result == false) {
            $this->session->set_flashdata('flash_message', get_phrase('account_not_found'));
        }

        redirect(base_url(), 'refresh');
    }

    /*     * *****LOGOUT FUNCTION ****** */

    function logout() {
        $this->session->sess_destroy();
        redirect(master_url(), 'refresh');
    }

}
