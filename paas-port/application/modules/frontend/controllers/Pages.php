<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    /**
     * code for call homepage
     */
    public function home()
    {
        $this->load->model("cms_model");
    	$this->load->model("common_model");
		
		$arrSliderData = $this->cms_model->getSliderById(1);
		$arr_cms_details = $this->common_model->getRecords('trans_cms', '', array('cms_val_id' => '1')); 
		$arr_marketing = $this->common_model->getRecords('tbl_marketing', '', array('id' => '1')); 
		$arr_business = $this->common_model->getRecords('tbl_business_professional', '', array('id' => '1')); 
		
		$this->template->set('arrSliderData', $arrSliderData);
		$this->template->set('arr_cms_details', $arr_cms_details);
		$this->template->set('arr_marketing', $arr_marketing);
		$this->template->set('arr_business', $arr_business);
		
        $this->template->set('page', 'home');
        $this->template->set('page_type', 'main');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | Home')        
		->set_partial ( 'header', 'partials/header' )
		->set_partial ( 'footer', 'partials/footer' );
        $this->template->build('homepage');
    }
    
    /**
     * code for call homepage
     */
    public function pricing()
    {
        $this->template->set('page', 'pricing');
        $this->template->set('page_type', 'main');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | Pricing')        
		->set_partial ( 'header', 'partials/header' )
		->set_partial ( 'footer', 'partials/footer' );
        $this->template->build('pricing');
    }
    
    /**
     * code for call contact us
     */
    public function contact()
    {
        $this->template->set('page', 'contact');
        $this->template->set('page_type', 'main');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | Contact Us')        
		->set_partial ( 'header', 'partials/header' )
		->set_partial ( 'footer', 'partials/footer' );
        $this->template->build('contact_us');
    }
    
    /**
     * code for call contact us
     */
    public function howItWorks()
    {
        $this->template->set('page', 'howitworks');
        $this->template->set('page_type', 'main');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | How it works')        
		->set_partial ( 'header', 'partials/header' )
		->set_partial ( 'footer', 'partials/footer' );
        $this->template->build('how_it_works');
    }
	
	/**
     * code for call FAQ
     */
    public function pageNotFound404()
    {        
        $this->load->model("common_model");
        $this->load->view('page_not_found');
    }

}
