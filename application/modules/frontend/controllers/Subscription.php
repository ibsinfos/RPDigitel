<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subscription extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model("common_model");

        $this->sessdata = $this->session->userdata('user_account');
        if ($this->sessdata['purchase_pack'] == '1') {
            $this->sidebar = 'partials/marketplace_sidebar';
        } else if ($this->sessdata['purchase_pack'] == '2') {
            $this->sidebar = 'partials/hosting_sidebar';
        } else {
            $this->sidebar = 'partials/both_sidebar';
        }
    }

    public function index() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $user_role = $this->session->userdata('role');

        $this->load->model('common_model');
        if (!empty($_SESSION['paasport_user_id'])) {
            $data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
        }
        //$data['main_content'] = 'fiber-rails';

        $data['services'] = $this->common_model->getRecords('services', '*', '', '');


        $this->template->set('page', 'subscription');
        $this->template->set('slug', $data['slug']);
        $this->template->set('services', $data['services']);
        $this->template->set_theme('default_theme');
        $this->template->set_layout('rpdigitel_frontend')
                ->title('Home | RPDigitel')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('subscription');
    }

}
