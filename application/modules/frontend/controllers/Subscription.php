<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Subscription extends CI_Controller {
		
		public function __construct() {
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
		}
		
		public function index() {
			$is_logged_in = $this->session->userdata('is_logged_in');
			$user_role = $this->session->userdata('role');
			
			$this->load->model('common_model');
			if (!empty($_SESSION['paasport_user_id'])) {
				$data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			}
			//$data['main_content'] = 'fiber-rails';
			
			$data['services'] = $this->common_model->getRecords('services', '*', '', '');
			
			
			
			/*Unset selected plan Sessions Start*/
			
			$services_cat = $this->common_model->getRecords('services', 'category');
			
			foreach ($services_cat as $service_cat) {
				
				$service_cat=$service_cat['category'];
				
				if ($this->session->userdata($service_cat)) {
					
					$this->session->unset_userdata($service_cat);
				}
			}
			
			/*Unset selected plan Sessions end*/
			
			if($this->session->userdata('user_id')){	
				
				$purchased_plans=$this->common_model->getRecords(TABLES::$SUBSCRIPTION_DETAILS, 'plan_id,end_date',array('user_id'=>$this->session->userdata('user_id')));
				
				}else{
				$purchased_plans=array();
			}
			
			// echo "<pre>";
			// print_r($purchased_plans);
			// echo die();
			
			
			// $user_purchased_plans=array();
			
			// foreach($purchased_plans as $a){
			// array_push($user_purchased_plans,$a['plan_id']);
			// }
			
			if (!empty($_SESSION['paasport_user_id'])) {
				$this->template->set('slug', $data['slug']);
			}
			$this->template->set('page', 'subscription');
			$this->template->set('purchased_plans', $purchased_plans);
			$this->template->set('services', $data['services']);
			$this->template->set_theme('default_theme');
			$this->template->set_layout('rpdigitel_frontend')
			->title('Home | RPDigitel')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer');
			$this->template->build('subscription');
		}
		
		function getcities() 
		{
			$this->load->model('common_model');
			$country_id=$this->input->post('country_id');
			$state_list = $this->common_model->getRecords('tbl_states','*',array('country_id'=>$country_id),'');
			
			// print_r($state_list);
			
			foreach($state_list as $state){
				echo "<option value='".$state['id']."'>".$state['name']."</option>";
			}
		}
		
		function addToCart_Plan() 
		{
			$this->load->model('common_model');
			$plan_id=$this->input->post('plan_id');
			$plan_cat=$this->input->post('plan_cat');
			$plan_name=$this->input->post('plan_name');
			$plan_duration=$this->input->post('plan_duration');
			$plan_price=$this->input->post('plan_price');
			
			$plan_details=array(
			'plan_id'    => $plan_id,
			'name'    => $plan_name,
			'cat'      => $plan_cat,
			'qty'     => 1,
			'price'   => $plan_price,
			'duration' => $plan_duration
			);
			
			$selected_plans=array($plan_cat=>$plan_details);
			
			$this->session->set_userdata($selected_plans);
			
			print_r($this->session->all_userdata());
		}
		
		function removeFromCart_Plan() 
		{
			$this->load->model('common_model');
			$plan_cat=$this->input->post('plan_cat');
			
			$this->session->unset_userdata($plan_cat);
			
			print_r($this->session->all_userdata());
		}
		
		
		
		function checkout_save_member() 
 		{
			$post_values=$this->input->post();
			// print_r($post_values);
 			
 			
			// -			$user_details=array(
			// -			'name'    => 'aaa'
			
			// $email=$post_values['email'];
			
			
			
			if (array_key_exists("u_password",$post_values)){
				
				$member_details=array('member_details'=>$post_values);
				$this->session->set_userdata($member_details);
				
				
				
				/* To Register as new user after Subscription Checkout Start*/
				
				$this->load->model('membership_model');
				
				$member_details=array(
				"first_name"=>$this->session->userdata['member_details']['first_name'],
				"last_name"=>$this->session->userdata['member_details']['last_name'],
				"phone_no"=>$this->session->userdata['member_details']['phone'],
				"email_address"=>$this->session->userdata['member_details']['email'],
				"username"=>$this->session->userdata['member_details']['email'],
				"password"=>$this->session->userdata['member_details']['u_password'],
				"role"=>'user',
				"country_code"=>$this->session->userdata['member_details']['country_code'],
				);
				
				// -			$this->session->set_userdata($user_details);
				$result_register_user=$this->membership_model->register_from_subscription_checkout($member_details);
				
				/* To Register as new user after Subscription Checkout End*/
				
				$billing_address=array(
				"user_id"=>$result_register_user,
				"address"=>$this->session->userdata['member_details']['billing_address'],
				"city"=>$this->session->userdata['member_details']['billing_city'],
				"country_id"=>$this->session->userdata['member_details']['billing_country'],
				"state_id"=>$this->session->userdata['member_details']['billing_state'],
				"zip"=>$this->session->userdata['member_details']['billing_zip']
				);
				
				// -			$this->session->set_userdata($user_details);
				$user_billing_address=$this->membership_model->save_subscription_billing_address($billing_address);
				// echo $result_register_user;
				// die();
				
				}else{
				
				//User already loggedin
				echo "User already loggedin";
			}
			
 			
 			// print_r($this->session->all_userdata());
			
 			// echo "exist";
		}
		
	}
