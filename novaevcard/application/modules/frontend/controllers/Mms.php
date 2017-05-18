<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mms extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model("common_model");
    }

    public function index()
    {
        if (!$this->common_model->isLoggedIn()) {
            redirect("login");
        }
        $this->template->set('page', 'mmslist');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | MMS List')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('mms_list');
    }
    

}
