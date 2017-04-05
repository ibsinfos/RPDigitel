<?php

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged_in();
        //modules::run('admin/login/is_logged_in');
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $user_role = $this->session->userdata('role');
        if (!isset($is_logged_in) || $is_logged_in != true || $user_role != 'admin') {
            echo 'You don\'t have permission to access this page ';
            echo anchor('Admin/login', 'Login');

            die();
            //$this->load->view('login_form');
        }
    }

    function members_area() {
        $this->load->view('Admin_Dashboard');
    }

    function another_page() { // just for sample
        echo 'good. you\'re logged in.';
    }

}
