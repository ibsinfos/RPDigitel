<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	Class Dashboard extends MX_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('cookie');
			$this->load->model("common_model");
		}
		
		/*
			* Load view for about us page
		*/
		
		public function index() {
			$is_logged_in = $this->session->userdata('is_logged_in');
			$user_role = $this->session->userdata('role');
			
			if (!isset($is_logged_in) || $is_logged_in != true || $user_role != 'user') {
				redirect('login');
				die();
			}
			$this->load->model('common_model');
			$data['slug'] = '';
			if (!empty($_SESSION['paasport_user_id'])) {
				$data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			}
			
			
			$services_menu = $this->common_model->getRecords('services', '*', '', '');
			$user_subscribed_services= $this->common_model->getRecords('tbl_services_subscription', '*', array('user_id'=>$this->session->userdata('user_id')), '');
			
			$user_services_array=array();
			foreach($user_subscribed_services as $u_services){
				array_push($user_services_array,$u_services['service_id']);
			}
			
			
			
			
			
			
			$this->template->set('page', 'main_dashboard');
			$this->template->set('slug', $data['slug']);
			$this->template->set('services_menu', $services_menu);
			$this->template->set('user_subscribed_services', $user_subscribed_services);
			$this->template->set('user_services_array', $user_services_array);
			$this->template->set_theme('default_theme');
			$this->template->set_layout('rpdigitel_frontend')
			->title('Home | RPDigitel')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer');
			$this->template->build('main_dashboard');
		}
		
	}
