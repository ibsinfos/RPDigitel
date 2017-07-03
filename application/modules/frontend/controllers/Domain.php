<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Domain extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('cookie');
			$this->load->model("common_model");
			$this->sidebar = 'partials/hosting_sidebar';
			
		}
		
		public function index() {
			$is_logged_in = $this->session->userdata('is_logged_in');
			$user_role = $this->session->userdata('role');
			
			$this->load->model('common_model');
			if (!empty($_SESSION['paasport_user_id'])) {
				$data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			}
			
			if($this->session->userdata('user_id')){	
				
				$purchased_plans=$this->common_model->getRecords(TABLES::$SUBSCRIPTION_DETAILS, 'plan_id,end_date',array('user_id'=>$this->session->userdata('user_id')));
				
				}else{
				$purchased_plans=array();
			}
			
			
			if (!empty($_SESSION['paasport_user_id'])) {
				$this->template->set('slug', $data['slug']);
			}
			
			$this->template->set('page', 'domain');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('rpdigitel_frontend')
			->title('Home | RPDigitel')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer');
			$this->template->build('domain');
		}
		
		function domain_results(){
			
			$is_logged_in = $this->session->userdata('is_logged_in');
			$user_role = $this->session->userdata('role');
			
			$this->load->model('common_model');
			if (!empty($_SESSION['paasport_user_id'])) {
				$data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
				}
			
			if($this->session->userdata('user_id')){
				
				$purchased_plans=$this->common_model->getRecords(TABLES::$SUBSCRIPTION_DETAILS, 'plan_id,end_date',array('user_id'=>$this->session->userdata('user_id')));
				
				}else{
				$purchased_plans=array();
			}
			
			
			if (!empty($_SESSION['paasport_user_id'])) {
				$this->template->set('slug', $data['slug']);
			}
			
			$this->template->set('page', 'domain-results');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('rpdigitel_frontend')
			->title('Home | RPDigitel')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer');
			$this->template->build('domain-results');
		
		}
		
		
	}
