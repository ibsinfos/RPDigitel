<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller
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
        $this->template->set('page', 'inboxlist');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | Inbox List')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('inbox_list');
    }
    

}
