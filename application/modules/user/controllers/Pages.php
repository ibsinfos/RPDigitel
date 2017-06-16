<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Pages extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model("common_model");
    }

    /*
     * Load view for about us page
     */

    public function home() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $user_role = $this->session->userdata('role');
        if (!empty($_SESSION['paasport_user_id'])) {
            $data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
        }
        $this->template->set('slug', $data['slug']);
        $this->template->set('page', 'fiberrail');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('rpdigitel_frontend')
                ->title('Home | RPDigitel')
                ->set_partial('header', 'partials/header')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('homepage');
    }

    /*
     * Load view for about us page
     */

    public function subscription() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $user_role = $this->session->userdata('role');
        if (!empty($_SESSION['paasport_user_id'])) {
            $data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
        }
        $this->template->set('slug', $data['slug']);
        $this->template->set('page', 'fiberrail');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('rpdigitel_frontend')
                ->title('Home | RPDigitel')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('subscription');
    }

    /*
     * Load view for about us page
     */

    public function main_dashboard() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $user_role = $this->session->userdata('role');

        if (!isset($is_logged_in) || $is_logged_in != true || $user_role != 'user') {
            redirect('login');
            die();
        }
        $this->load->model('common_model');
        $data['slug'] = '';
        if (!empty($_SESSION['paasport_user_id'])) {
            $data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
        }
        $this->template->set('page', 'main_dashboard');
        $this->template->set('slug', $data['slug']);
        $this->template->set_theme('default_theme');
        $this->template->set_layout('rpdigitel_frontend')
                ->title('Home | RPDigitel')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('main_dashboard');
    }

    /*
     * Load view for checkout
     */

    public function login() {

        if ($this->session->userdata('is_logged_in') !== FALSE) {
            // if ($this->session->userdata('role') == 'user') {
            //            redirect(base_url() . 'user/dashboard');
            redirect(base_url() . 'fiberrails');
        } else {

            if (!isset($_SESSION)) {
                session_start();
            }

            if ($_SESSION) {
                session_destroy();
            }
        }
        $this->template->set('page', 'login');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('rpdigitel_frontend')
                ->title('Home | RPDigitel')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('login_form');
    }

    /*
     * Load view for register
     */

    public function register() {

        $this->template->set('page', 'register');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('frontend_silo')
                ->title('Register | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('register');
    }

    /**
     * code for call page not found
     */
    public function pageNotFound404() {
        $this->template->set('page', '404');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('frontend_silo')
                ->title('404 Page Not Found | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('frontpages/page_not_found');
    }

}
