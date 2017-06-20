<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Home extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model("common_model");
    }

    /*
     * Load view for about us page
     */

    public function index() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $user_role = $this->session->userdata('role');
        if (!empty($_SESSION['paasport_user_id'])) {
            $data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
        }else{
            $data['slug'] = "";
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

}
