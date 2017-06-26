<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	Class Product extends MX_Controller
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
		
		
		public function createProduct(){
			
			$this->load->model('login_model');
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			$this->template->set('user_menu',$user_menu);
			
			$this->template->set('slug',$slug);
			$this->template->set('user',$user);
			$this->template->set('page','createproduct');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Admin Product List | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('createproduct');
			
		}
		
		
		
		public function save_publish_application_basic_info(){
			
			
			$post_values=$this->input->post();
			// print_r($post_values);
			
			// $basic_info=array('basic_info'=>$post_values);
			
			$this->session->set_userdata('publisher_basic_info',$post_values);
			
			print_r($this->session->all_userdata());
			
		}
		
		
		public function save_publish_application_company_info(){
			
			
			$post_values=$this->input->post();
			
			$this->session->set_userdata('publisher_company_info',$post_values);
			
			print_r($this->session->all_userdata());
			
		}
		
		
		
		
		
	}
