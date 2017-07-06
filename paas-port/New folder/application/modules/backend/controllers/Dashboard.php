<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard extends MX_Controller
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
     * Function to load dashboard view
     */
    public function index()
    {
        $session_data = $this->session->userdata('user_account');
        if (!$this->common_model->isLoggedIn()) {

            $this->session->set_flashdata('msg', 'Please login to contninue.');

            redirect(base_url() . "login");

        }
        if ($session_data['role_id'] !='1') {

            $this->session->set_flashdata('msg', 'You are not authorized to access backend');

            redirect(base_url() . "login");

        }
        $this->template->set('page','dashboard');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend')
                ->title('vCard | Administrator control panel')
                ->set_partial('header', 'partials/header')
                ->set_partial('leftpanel', 'partials/leftpanel')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('dashboard');
    }

}
