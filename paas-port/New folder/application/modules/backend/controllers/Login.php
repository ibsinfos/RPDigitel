<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends MX_Controller
{

    /**
     * constructor used to load all the models used in the controller.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model("common_model");
    }

    /**
     * functino to load admin login view
     */
    public function index()
    {
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend')
                ->title('vCard | Administrator control panel');
        $this->template->build('login');
    }

    /**
     * function to check admin login
     */
    public function adminlogin()
    {
        $user_name = trim($this->input->post('user_name'));
        $user_password = $this->input->post('user_password');
        $user_details = $this->common_model->getRecords(TABLES::$ADMIN_USER, 'email,password,verified,role_id,first_name,last_name,id,slug', array('email' => $user_name, 'password' => md5($user_password), 'role_id' => 1));
        $map = array();
        if (count($user_details) > 0) {
            if (MD5($user_password) === $user_details[0]['password']) {
                if ($user_details[0]['verified'] == 1) {
                    $user = array();
                    $user['first_name'] = $user_details[0]['first_name'];
                    $user['last_name'] = $user_details[0]['last_name'];
                    $user['email'] = $user_details[0]['email'];
					$user['slug'] = $user_details[0]['slug'];
                    $user['user_id'] = $user_details[0]['id'];
                    $user['role_id'] = $user_details[0]['role_id'];
                    $map ['status'] = 1;
                    $this->session->set_userdata('user_account', $user);
                    $map ['msg'] = "Logged in successfully.";
                    redirect('backend/dashboard');
                } else {
                    $map ['status'] = 0;
                    $map ['msg'] = "Login to this site have been blocked by Admin.";
                }
            } else {
                $map ['status'] = 0;
                $map ['msg'] = "Email or password is wrong.";
            }
        } else {
            $map ['status'] = 0;
            $map ['msg'] = "Email or password is wrong.";
        }
        $this->template->set_theme('default_theme');
        $this->template->set('arr', $map);
        $this->template->set_layout('backend')
                ->title('vCard | Administrator control panel');
        $this->template->build('login');
    }

    /**
     * Code For Logout Functionality
     */
    public function logout()
    {
        $this->session->unset_userdata('adminsession');
        redirect(base_url() . "admin");
    }

}
