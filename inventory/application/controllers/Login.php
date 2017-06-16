<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * 	@author : Creativeitem
 * 	date	: 11 September, 2015
 * 	http://codecanyon.net/user/Creativeitem
 * 	http://creativeitem.com
 */


class Login extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('utility');
        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    //Default function, redirects to logged in user area
    public function index()
    {
        redirect(master_url() . 'login', 'refresh');
        exit;
        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
        if ($this->session->userdata('customer_login') == 1)
            redirect(base_url() . 'index.php?customer/dashboard', 'refresh');
        if ($this->session->userdata('employee_login') == 1)
            redirect(base_url() . 'index.php?employee/dashboard', 'refresh');
        if ($this->session->userdata('manager_login') == 1)
            redirect(base_url() . 'index.php?manager/dashboard', 'refresh');

        $this->load->view('backend/login');

    }

    //Ajax login function
    function ajax_login()
    {
        $response = array();

        //Recieving post input of email, password from ajax request
        $email      = $_POST["email"];
        $password   = $_POST["password"];
        $response['submitted_data'] = $_POST;

        //Validating login
        $login_status = $this->validate_login( $email ,  $password );
        $response['login_status'] = $login_status;
        if ($login_status == 'success') {
            $response['redirect_url'] = $this->session->userdata('last_page');
        }

        //Replying ajax request with validation response
        echo json_encode($response);
    }

    //Validating login informations from ajax request
    function validate_login($email = '' , $password = '')
    {
        $credential	=	array(	'email' => $email , 'password' => sha1($password) );

        // Checking login credential for users of the system
        $query = $this->db->get_where('user' , $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();

            //setting the session parameters for admin
            if ($row->type == 1) {
                $this->session->set_userdata('admin_login' , '1');
                $this->session->set_userdata('login_type' , 'admin');
            }
            //setting the session parameters for customers
            if ($row->type == 2) {
                $this->session->set_userdata('customer_login' , '1');
                $this->session->set_userdata('login_type' , 'customer');
            }
            //setting the session parameters for employees
            if ($row->type == 4) {
                $this->session->set_userdata('employee_login' , '1');
                $this->session->set_userdata('login_type' , 'employee');
            }
            //setting the session parameters for employees
            if ($row->type == 5) {
                $this->session->set_userdata('manager_login' , '1');
                $this->session->set_userdata('login_type' , 'manager');
            }
            //setting the common session parameters for all type of users of the system
            $this->session->set_userdata('login_user_id' , $row->user_id);
            return 'success';
        }

        return 'invalid';
    }



    function forgot_password()
    {
        $this->load->view('backend/forgot_password');
    }

    function ajax_forgot_password()
    {
        $resp 					= array();
        $resp['status']         = 'false';
        $email 					= $_POST["email"];
        $reset_account_type		= '';
        //resetting user password here
        $new_password			=	substr( md5( rand(100000000,20000000000) ) , 0,7);
        $new_hashed_password	=	sha1($new_password);

        // Checking valid presence of email in the database and resetting password
        $query = $this->db->get_where('user' , array('email' => $email));
        if ($query->num_rows() > 0)
        {
            $this->db->where('email' , $email);
            $this->db->update('user' , array('password' => $new_hashed_password));
            $resp['status']         = 'true';
            // send new password to user email
            $this->email_model->reset_password_email($new_password , $email);
        }


        $resp['submitted_data'] = $_POST;

        echo json_encode($resp);
    }
    /*******LOGOUT FUNCTION *******/
    function logout()
    {
        $this->session->sess_destroy();
        redirect(master_url()."login" , 'refresh');
    }

}
