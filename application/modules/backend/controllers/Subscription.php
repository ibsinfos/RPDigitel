<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Subscription extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('cookie');
			$this->load->model("common_model");
			
			$this->sessdata = $this->session->userdata('user_account');
			if ($this->sessdata['purchase_pack'] == '1') {
				$this->sidebar = 'partials/marketplace_sidebar';
				} else if ($this->sessdata['purchase_pack'] == '2') {
				$this->sidebar = 'partials/hosting_sidebar';
				} else {
				$this->sidebar = 'partials/both_sidebar';
			}
			/*
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
				
			*/
		}
		
		
		public function plan_list()
		{
			$this->load->model('Subscription_model');
			$user_id = $this->sessdata['user_id'];
			$data = $this->Subscription_model->get_plan_list();
			
			// echo "<pre>";
			// print_r($data);
			// die();
			
			$this->template->set('plan_list', $data); // data to be sent in front end
			
			$this->template->set('page', 'plan_list');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Project List | Silo')
			->set_partial('header','partials/admin_header')
			->set_partial('sidebar','partials/admin_sidebar')
			->set_partial('footer', 'partials/admin_footer');
			$this->template->build('plan_list');
		} 
		
		
		public function add_plan()
		{
			
			$this->load->model('Common_model');
			
			if($this->input->post('name')){
				
				$name=$this->input->post('name');
				$price=$this->input->post('price');
				$feature=$this->input->post('feature');
				
				// print_r($feature);
				// die();
				$feature = implode(',', $feature);
				
				
				$insert_data=array('name'=>$name,'price'=>$price,'features'=>$feature);
				$data = $this->common_model->insertRow($insert_data,'member_services_plans');
				
			}
			
			$this->load->model('Subscription_model');
			$user_id = $this->sessdata['user_id'];
			$data = $this->Subscription_model->get_plan_list();
			$features_list = $this->Subscription_model->get_features_list();
			
			// echo "<pre>";
			// print_r($data);
			// die();
			
			$this->template->set('plan_list', $data); // data to be sent in front end
			$this->template->set('features_list', $features_list); 
			
			$this->template->set('page', 'add_plan');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Project List | Silo')
			->set_partial('header','partials/admin_header')
			->set_partial('sidebar','partials/admin_sidebar')
			->set_partial('footer', 'partials/admin_footer');
			$this->template->build('add_plan');
			
			
		}
		
		public function delete_plan()
		{
			
			
			$del_id=$this->uri->segment(2);
			// die('sd');
			$this->load->model('Subscription_model');
			
			$data = $this->Subscription_model->deletePlan($del_id);
			
		}
		
		
		
		
		public function edit_plan()
		{
			if($this->uri->segment(2)){
				$update_id=$this->uri->segment(2);
			}
			$this->load->model('Subscription_model');
			
			
			$this->load->model('Common_model');
			
			if($this->input->post('name')){
				
				$name=$this->input->post('name');
				$price=$this->input->post('price');
				$feature=$this->input->post('feature');
				$plan_id=$this->input->post('plan_id');
				
				$feature = implode(',', $feature);
				
				
				$up_data=array('name'=>$name,'price'=>$price,'features'=>$feature);
				$condition=array('id'=>$plan_id);
				
				$data = $this->common_model->updateRow('member_services_plans',$up_data,$condition);
				
				// die('sa');
				redirect(base_url()."plan-list");
				// die();
				
			}
			
			
			$user_id = $this->sessdata['user_id'];
			// $features_list = $this->Subscription_model->get_features_list();
			
			
			$plan_details = $this->Subscription_model->get_plan_details($update_id);
			
			// echo "<pre>";
			// print_r($plan_details[0]->features);
			// die();
			$plan_features_list = $this->Subscription_model->get_plan_features_list($plan_details[0]->features);
			
			// $this->template->set('plan_list', $data); // data to be sent in front end
			// $this->template->set('features_list', $features_list); 

			$this->template->set('plan_details', $plan_details); 
			$this->template->set('plan_features_list', $plan_features_list); 
			
			$this->template->set('page', 'edit_plan');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Project List | Silo')
			->set_partial('header','partials/admin_header')
			->set_partial('sidebar','partials/admin_sidebar')
			->set_partial('footer', 'partials/admin_footer');
			$this->template->build('edit_plan');
			
			
		}
		
		
		
		
		
		public function assign_plan()
		{
			
			$this->load->model('Subscription_model');
			$this->load->model('Common_model');
			
			if($this->input->post('service_name')){
				
				$service_id=$this->input->post('service_name');
				
				$plan=$this->input->post('plan');
				
				// $plan= implode(',', $plan);
				
				//To delete all previous plans
				
				
				// $data = $this->subscription_model->delete_service_plans($service_id);
				
				
				$data = $this->Subscription_model->delete_service_plans($del_id);
				
				
				foreach($plan as $plan_id){
					
					$insert_data=array('service_id'=>$service_id,'plan_id'=>$plan_id);
					
					$data = $this->common_model->insertRow($insert_data,'services_plan_mapping');
					
				}
				
			}
			
			$user_id = $this->sessdata['user_id'];
			$plan_list = $this->Subscription_model->get_plan_list();
			$service_list = $this->Subscription_model->get_all("services");
			
			// echo "<pre>";
			// print_r($data);
			// die();
			
			$this->template->set('plan_list', $plan_list); // data to be sent in front end
			$this->template->set('service_list', $service_list); 
			
			$this->template->set('page', 'assign_plan');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Project List | Silo')
			->set_partial('header','partials/admin_header')
			->set_partial('sidebar','partials/admin_sidebar')
			->set_partial('footer', 'partials/admin_footer');
			$this->template->build('assign_plan');
			
			
		}
		
		
		public function get_service_plans(){
			
			$service_id=$this->input->post('service_id');
			
			$this->load->model('Subscription_model');
			
			$result=$this->subscription_model->get_service_details($service_id);
			
			echo $result;
			
		}
		
		
		
		
		
		function admin_subscription() 
		{
			
			$is_logged_in = $this->session->userdata('is_logged_in');
			$user_role = $this->session->userdata('role');
			
            $this->load->model('common_model');    
			if(!empty($_SESSION['paasport_user_id']))
			{
				$data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			}
			
			$data['services'] = $this->common_model->getRecords('services','*','','');
			
			// echo "<pre>";
			// print_r($data['services']);
			// die();
			
			
       		// $data['main_content'] = 'subscription';
       		// $data['page'] = 'fiberrails';
			// $this->load->view('includes/template', $data);
			
			
			
			
			$this->template->set('services', $data['services']); 
			$this->template->set('slug', $data['slug']); 
			
			$this->template->set('page', 'admin_subscription');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('admin_silo')
			->title('Admin Dashboard | Silo')
			->set_partial('header','partials/admin_header')
			->set_partial('sidebar','partials/admin_sidebar')
			->set_partial('footer', 'partials/admin_footer');
			$this->template->build('admin_subscription');
			
			
			
			
		}
		
		
		
		
	}
	
