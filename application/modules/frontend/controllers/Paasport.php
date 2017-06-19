<?php

class Paasport extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('membership_model');
    }

    function index() {

        if (!isset($_SESSION)) {
            session_start();
        }


        $query_get_country = $this->db->get('country');
        $data['country_list'] = $query_get_country->result();
        $this->load->model('common_model');
        $data['slug'] = '';
        if (!empty($_SESSION['paasport_user_id'])) {
            $data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
        }
        $this->template->set('country_list', $data['country_list']);
        $this->template->set('page', 'paasport');
        $this->template->set('slug', $data['slug']);
        $this->template->set_theme('default_theme');
        $this->template->set_layout('rpdigitel_frontend')
                ->title('Home | RPDigitel')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('paasport');
    }

}

?>
										