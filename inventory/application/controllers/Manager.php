<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 *  @author     : Creativeitem
 *  date        : 19 November, 2015
 *  Bijoy Stock Inventory Manager ERP
 *  http://codecanyon.net/user/Creativeitem
 *  support@creativeitem.com
 */
class Manager extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

       /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }

    // DEFAULT FUNCTION (redirects to login page if no user is logged in)
    public function index()
    {
        if ($this->session->userdata('manager_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('manager_login') == 1)
            redirect(base_url() . 'index.php?manager/dashboard', 'refresh');
        $this->load->view('backend/index');
    }

    // DASHBOARD
    function dashboard()
    {
        if ($this->session->userdata('manager_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('manager_dashboard');
        $this->load->view('backend/index', $page_data);
    }

    function profile($param1 = '' , $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('manager_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if($param1 == 'do_update')
        {
            $this->user_model->update_user_profile($this->session->userdata('login_user_id'));
            $this->session->set_flashdata('success_message' , get_phrase('profile_info_updated'));
            redirect(base_url() . 'index.php?manager/profile/' , 'refresh');
        }

        if($param1 == 'change_password')
        {
            $success_status = $this->user_model->update_user_password($this->session->userdata('login_user_id'));
            if($success_status == 1) {
                $this->session->set_flashdata('success_message' , get_phrase('password_updated'));
            }
            if($success_status == 0) {
                $this->session->set_flashdata('error_message' , get_phrase('password_update_failed'));
            }
            redirect(base_url() . 'index.php?manager/profile/' , 'refresh');
        }

        $page_data['page_name']  = 'profile';
        $page_data['page_title'] = get_phrase('profile');
        $this->load->view('backend/index', $page_data);
    }

    function warehouse_details(){
      //  echo $logged_in_user_id;
      if ($this->session->userdata('manager_login') != 1) {
          $this->session->set_userdata('last_page', current_url());
          redirect(base_url(), 'refresh');
      }
      $page_data['page_name']  = 'managers_warehouse';
      $page_data['page_title'] = get_phrase('warehouse');
      $this->load->view('backend/index', $page_data);
    }

    function manager_warehouse_details($warehouse_code){

      if ($this->session->userdata('manager_login') != 1) {
          $this->session->set_userdata('last_page', current_url());
          redirect(base_url(), 'refresh');
      }
      $this->session->set_userdata('warehouse_code', $warehouse_code);
      $page_data['page_name']  = 'manager_warehouse_details';
      $page_data['page_title'] = get_phrase('warehouse_details');
      $this->load->view('backend/index', $page_data);
    }

}
