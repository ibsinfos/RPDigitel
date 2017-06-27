<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	Class Broadcast extends MX_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('cookie');
			$this->load->model("common_model");
			$this->sessionn = $this->session->userdata('user_account');
			
			$this->sidebar = 'partials/hosting_sidebar';
			
			if (!$this->common_model->isLoggedIn()) {
				redirect(base_url());
			}
			
			if(!empty($_SESSION['paasport_user_id']))
			{
				$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
				$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
				$this->template->set('user',$user);
				$this->template->set('slug',$slug);
			}
		}
		
		
		public function index(){
			
			$this->load->model('login_model');
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			$this->template->set('user_menu',$user_menu);
			
			$this->template->set('slug',$slug);
			$this->template->set('user',$user);
			$this->template->set('page','broadcast');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Create Paasport| Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('broadcast');
			
		}
		
	
	}
