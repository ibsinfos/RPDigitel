<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model("common_model");
        $this->session = $this->session->userdata('user_account');
        if ($this->session['purchase_pack'] == '1') {
            $this->sidebar = 'partials/marketplace_sidebar';
        } else if ($this->session['purchase_pack'] == '2') {
            $this->sidebar = 'partials/hosting_sidebar';
        } else {
            $this->sidebar = 'partials/both_sidebar';
        }
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->template->set('page', 'dashboard');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend')
                ->title('Admin Dashboard | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('sidebar', $this->sidebar)
                ->set_partial('footer', 'partials/footer');
        $this->template->build('dashboard');
    }

    /*
     * Load view for my subscribers
     */

    public function mySubscribers()
    {

        $this->template->set('page', 'my_subscribers');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend')
                ->title('My subscribers | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('sidebar', $this->sidebar)
                ->set_partial('footer', 'partials/footer');
        $this->template->build('my_subscribers');
    }

    /*
     * Load view for order history
     */

    public function orderHistory()
    {

        $this->template->set('page', 'order_history');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend')
                ->title('Order history | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('sidebar', $this->sidebar)
                ->set_partial('footer', 'partials/footer');
        $this->template->build('order_history');
    }

    /*
     * Load view for download center
     */

    public function downloadCenter()
    {

        $this->template->set('page', 'download_center');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend')
                ->title('Download Center | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('sidebar', $this->sidebar)
                ->set_partial('footer', 'partials/footer');
        $this->template->build('download_center');
    }

    /*
     * Load view for setting
     */

    public function setting()
    {

        $this->template->set('page', 'setting');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend')
                ->title('Setting | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('sidebar', $this->sidebar)
                ->set_partial('footer', 'partials/footer');
        $this->template->build('setting');
    }

}
