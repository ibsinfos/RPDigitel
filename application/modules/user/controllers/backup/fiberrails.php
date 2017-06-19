<?php
	
	class fiberrails extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			//$this->is_logged_in();
			//  modules::run('user/login/is_logged_in');
		}
		
		function is_logged_in() {
			$is_logged_in = $this->session->userdata('is_logged_in');
			$user_role = $this->session->userdata('role');
			
			if (!isset($is_logged_in) || $is_logged_in != true || $user_role != 'user') {
				//echo 'You don\'t have permission to access this page. <a href="user/login">Login</a>';	
				
				/*
					// Bug 0001642: Instead of login link, direct login page should displayed. =Resolved_10-04-2017
					echo 'You don\'t have permission to access this page.';
					echo anchor('user/login', 'Login');
				*/
				
				//				redirect('user/login');
				redirect('login');
				
				die();
				
				//$this->load->view('login_form');
			}
		}
		
		function index() 
		{
			
			$is_logged_in = $this->session->userdata('is_logged_in');
			$user_role = $this->session->userdata('role');
			
			/*if (!isset($is_logged_in) || $is_logged_in != true || $user_role != 'user') {
				
				redirect('login');
				
				die();
			}*/
			
			
			//                    $_SESSION['sess_name']='rpdigitel1';
			//                    print_r($this->session->all_userdata());
			//                    die();
			//$this->load->view('fiber-rails');
			
			
			//$result = $this->db->query("SELECT * FROM 'your_table'")->limit(1)->get()->result();
			
			
			/*
				$config['dbxyz']['hostname'] = 'localhost';
				$config['dbxyz']['username'] = 'root';
				$config['dbxyz']['password'] = '';
				$config['dbxyz']['database'] = 'rpdigitel1';
				$config['dbxyz']['dbdriver'] = 'mysqli';
				$config['dbxyz']['dbprefix'] = '';
				$config['dbxyz']['pconnect'] = TRUE;
				$config['dbxyz']['db_debug'] = TRUE;
				$config['dbxyz']['cache_on'] = FALSE;
				$config['dbxyz']['cachedir'] = '';
				$config['dbxyz']['char_set'] = 'utf8';
				$config['dbxyz']['dbcollat'] = 'utf8_general_ci';
				$config['dbxyz']['swap_pre'] = '';
				$config['dbxyz']['autoinit'] = TRUE;
				$config['dbxyz']['stricton'] = FALSE;
			*/
			//load database config
			//$this->config->load('database');
			
			//Set database config dynamically        
			//$this->config->set_item('dbxyz', $config);
			
			//Now you can load the new database using
			//    echo $this->dbxyz = $this->load->database('dbxyz'); 
			//    die();
            $this->load->model('common_model');    
			if(!empty($_SESSION['paasport_user_id']))
			{
				$data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			}
			//$data['main_content'] = 'fiber-rails';
       		$data['main_content'] = 'fiber-rails-main';
       		$data['page'] = 'fiberrails';
			$this->load->view('includes/template', $data);
		}
		
		function main_dashboard()
		{
			$is_logged_in = $this->session->userdata('is_logged_in');
			$user_role = $this->session->userdata('role');
			
			if (!isset($is_logged_in) || $is_logged_in != true || $user_role != 'user') 
			{
				redirect('login');
				die();
			}
			$this->load->model('common_model');  
			$data['slug']='';
			if(!empty($_SESSION['paasport_user_id']))
			{
				$data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			}	
			$data['page'] = 'main_dashboard';
			$this->load->view('user/main_dashboard',$data);			
		}
		
		function subscription() 
		{
			
			$is_logged_in = $this->session->userdata('is_logged_in');
			$user_role = $this->session->userdata('role');
			
            $this->load->model('common_model');    
			if(!empty($_SESSION['paasport_user_id']))
			{
				$data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			}
			//$data['main_content'] = 'fiber-rails';
			
			$data['services'] = $this->common_model->getRecords('services','*','','');
			
			// echo "<pre>";
			// print_r($data['services']);
			// die();
			
			
       		$data['main_content'] = 'subscription';
       		$data['page'] = 'fiberrails';
			$this->load->view('includes/template', $data);
		}
		
		function checkout() 
		{
			
			$is_logged_in = $this->session->userdata('is_logged_in');
			$user_role = $this->session->userdata('role');
			
			
            $this->load->model('membership_model');
            $this->load->model('common_model');
			if(!empty($_SESSION['paasport_user_id']))
			{
				$data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			}
			
			//$data['main_content'] = 'fiber-rails';
			
			$data['pricing_plan_total']=$this->input->post('pricing_plan_total');
			$data['country_list'] = $this->common_model->getRecords('tbl_countries');
			
			// print_r($this->session->all_userdata());
			// die('sfd');
			
			if($this->session->userdata('email')){
				$data['user_details'] = $this->common_model->getRecords('membership','*',array('email_address'=>$this->session->userdata('email')),'',1);
				}else{
				$data['user_details']='';
			}
			
			
			// $query_get_country=$this->db->get('country');
			
			$data['country_code_list']=$this->membership_model->query_get_country();
			
			// echo "<pre>";
			// print_r($data['user_details']);
			// die();
			
			
			if($this->input->post('pricing_plan_total')){
				
				$data['pricing_plan_total']=$this->input->post('pricing_plan_total');
				$this->session->set_userdata(array('pricing_plan_total'=>$data['pricing_plan_total']));
				
				}else if($this->session->userdata('pricing_plan_total')){
				
				$data['pricing_plan_total']=$this->session->userdata('pricing_plan_total');
				
				}else{
				$data['pricing_plan_total']='';
			}
			
			
			
       		$data['main_content'] = 'checkout';
       		$data['page'] = 'fiberrails';
			$this->load->view('includes/template', $data);
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
			$plan_cat=$this->input->post('plan_cat');
			$plan_name=$this->input->post('plan_name');
			$plan_duration=$this->input->post('plan_duration');
			$plan_price=$this->input->post('plan_price');
			
			// echo "dd";
			/*remove from cart start*/
			
			// 'rowid' => 'b99ccdf16028f015540f341130b6d8ec',
			/*		
				$remove_data = array(
				'id' => $plan_cat,
				'qty'   => 0
				);
				
				$this->cart->update($remove_data);
			*/
			
			
			/*remove from cart end*/
			
			
			/*
				$data = array(
				'id'      => $plan_cat,
				'qty'     => 1,
				'price'   => $plan_price,
				'name'    => $plan_name,
				'options' => array('duration' => $plan_duration, 'plan_cat' => $plan_cat)
				);
				
				$this->cart->insert($data);
			*/
			// print_r($this->cart->contents());
			
			$plan_details=array(
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
			
			$result_register_user=$this->membership_model->register_from_subscription_checkout($member_details);
			echo $result_register_user."ss";
			/* To Register as new user after Subscription Checkout End*/
			
			
			}else{
			
			//User already loggedin
			echo "User already loggedin";
			}

			
			// print_r($this->session->all_userdata());

			// echo "exist";
		}
		
		
	}