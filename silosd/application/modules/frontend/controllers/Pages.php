<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Pages extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model("common_model");
    }

    /*
     * Load view for about us page
     */

    public function home()
    {
        $this->template->set('page', 'home');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('frontend')
                ->title('Home | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('homepage');
    }

    /*
     * Load view for about us
     */

    public function aboutUs()
    {

        $this->template->set('page', 'about_us');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('frontend')
                ->title('About Us | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('about_us');
    }
    /*
     * Load view for checkout
     */

    public function checkout()
    {

        $this->template->set('page', 'checkout');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('frontend')
                ->title('Checkout | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('checkout');
    }
    /*
     * Load view for checkout
     */

    public function contactUs()
    {

        $this->template->set('page', 'contact_us');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('frontend')
                ->title('Contact Us | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('contact_us');
    }
    /*
     * Load view for checkout
     */

    public function login()
    {

        $this->template->set('page', 'login');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('frontend')
                ->title('Login | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('login');
    }
    /*
     * Load view for register
     */

    public function register()
    {

        $this->template->set('page', 'register');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('frontend')
                ->title('Register | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('register');
    }
    /*
     * Load view for support
     */

    public function support()
    {

        $this->template->set('page', 'support');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('frontend')
                ->title('Support | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('support');
    }
    
    /**
     * code for call page not found
     */
    public function pageNotFound404()
    {
        $this->template->set('page', '404');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('frontend')
                ->title('404 Page Not Found | Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('frontpages/page_not_found');
    }
}
