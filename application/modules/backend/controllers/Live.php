<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	Class Live extends MX_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('cookie');
			$this->load->model("common_model");
			$this->session = $this->session->userdata('user_account');
			$this->sidebar = 'partials/hosting_sidebar';
			/*
				if ($this->session['purchase_pack'] == '1') {
				$this->sidebar = 'partials/marketplace_sidebar';
				} else if ($this->session['purchase_pack'] == '2') {
				$this->sidebar = 'partials/hosting_sidebar';
				} else {
				$this->sidebar = 'partials/both_sidebar';
				}
			*/
			if (!$this->common_model->isLoggedIn()) {
				redirect(base_url());
			}
		}
		
		public function index()
		{
			$this->load->model('login_model');
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			
			$this->template->set('user_menu',$user_menu);
			$this->template->set('slug',$slug);
			$this->template->set('user',$user);
			$this->template->set('page', 'go_live');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Product List | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('go-live');
		}
		
		
	}
