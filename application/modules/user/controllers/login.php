<?php
	
	class login extends CI_Controller {
		
		function __construct() {
			
			parent::__construct();
			$this->load->library('form_validation');
			
			//SMS
			$this->load->config('twilio', TRUE);
			$this->number = $this->config->item('number', 'twilio');
		}
		
		function index() {
			
			$this->load->model('membership_model');
			
			// $to_number='+919665639973';
			// $msg_body="test sms";
			// $response = $this->membership_model->twilioSms($this->number, $to_number, $msg_body);
            
			
			//        session_start();
			//        print_r($this->session->all_userdata());
			//        
			//        if($_SESSION){print_r($_SESSION);}
			//session_destroy();
			//die(0);
			
			
			//New condition added on 02-05-2017 by Ranjit to check whether user logged in or not [ref : problem while sending OTP]
			if ($this->session->userdata('is_logged_in') !== FALSE) {
				// if ($this->session->userdata('role') == 'user') {
				//            redirect(base_url() . 'user/dashboard');
				redirect(base_url() . 'fiberrails');
				} else {
				
				if (!isset($_SESSION)) {
					session_start();
				}
				
				if ($_SESSION) {
					session_destroy();
				}
				
				
				
			}
			
			$data['main_content'] = 'login_form';
			$this->load->view('includes/template', $data);
		}
		
		/*
			//without ajax
			function validate_credentials() {
			$this->load->model('membership_model');
			//$username=$this->input->post('username');
			$user = $this->membership_model->get_user_role();
			$query = $this->membership_model->validate_user($user['role']);
			
			
			// $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
			// $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
			
			
			// if ($this->form_validation->run() == FALSE) {
			// $this->load->view('login_form');
			// } else {
			
			
			if ($query) { // if the user's credentials validated...
			$data = array(
			'username' => $this->input->post('username'),
			'is_logged_in' => true,
			'role' => $user['role']
			);
			$this->session->set_userdata($data);
			redirect('user/Dashboard/members_area');
			} else { // incorrect username or password
			// $this->index();
			//$data['error_msg']="please enter correct Username and Password";
			//$this->load->view('login_form',$data);
			$this->session->set_userdata('error_msg', 'please enter correct Username and Password');
			
			//$this->load->view('login_form');
			
			redirect('user/login/index/');
			}
			// }
			}
		*/
		
		function crm_validate_credentials() {
			
			
			$this->load->model('membership_model');
			$user = $this->membership_model->get_user_role();
			$query_result = $this->membership_model->validate_user($user['role']);
			
			if ($query_result == "error") {// if the user's credentials validated...
				//echo '<p class="error">' . $query_result;
				echo '<p class="error">Please Enter valid Username and Password';
				} else { // incorrect username or password
				
				
				if($user['two_way_authentication']=='Y'){//OTP verification Start
					
					$data = array(
					'username' => $query_result,
					'role' => $user['role'],
					'user_id' => $user['user_id'],
					'phone_no' => $user['phone_no']
					);
					
					$this->session->set_userdata($data);
					
					$this->send_otp($user['phone_no']);
					
					echo "otp";
					
					}else{
					
					$data = array(
					'username' => $query_result,
					'is_logged_in' => true,
					'role' => $user['role'],
					'user_id' => $user['user_id']
					);
					
					$this->session->set_userdata($data);
					
				}
				
				
				if (!isset($_SESSION)) {
					session_start();
				}
				$_SESSION['user_name'] = $this->input->post('username');
				//                $_SESSION['user_name']="admin";
				
				$_SESSION['password'] = $this->membership_model->hash($this->input->post('password'));
				//                $_SESSION['password']="55677fc54be3b674770b697114ce0730300da0f6783202e2d17d7191ba68ec97cab4b61d3470f298d0ca2435111c29b8d5ad63058b725916336fdab9584829f4";
				
				/* Session set to access paasport dashboard Start */
				$_SESSION['paasport_user_id'] = $user['paasport_user_id'];
				/* Session set to access paasport dashboard End */
				
				
				$_SESSION['user_id'] = $user['user_id'];
				$_SESSION['crm_db_id'] = $user['crm_db_id'];
				$_SESSION['email_address'] = $user['email_address'];
				
				
				/* code to check CRM db start */
				
				//            $registered_with_crm='set';
				//Check record in rpdigitel.database_details table
				
				if($user['two_way_authentication']!='Y'){
					
					$registered_with_crm = $this->membership_model->get_database_details($user['crm_db_id']);
					
					if ($registered_with_crm == "error") {
						echo 'true';
						} else {
						echo 'crm';
					}
					
					
				}
				
                //To set flashdata Success message
                $this->session->set_flashdata('login_success_msg','You logged in successfully');
                /* code to check CRM db end */
			}
		}
		
		function paasport_validate_credentials() {
			
			$this->load->model('membership_model');
			$user = $this->membership_model->get_user_role();
			$query_result = $this->membership_model->validate_user($user['role']);
			
			if ($query_result == "error") {// if the user's credentials validated...
				//echo '<p class="error">' . $query_result;
				echo '<p class="error">Please Enter valid Username and Password';
				} else { // incorrect username or password
				
				if($user['two_way_authentication']=='Y'){//OTP verification Start
					
					$data = array(
					'username' => $query_result,
					'role' => $user['role'],
					'user_id' => $user['user_id'],
					'phone_no' => $user['phone_no']
					);
					
					$this->session->set_userdata($data);
					
					$this->send_otp($user['phone_no']);
					
					echo "otp";
					
					}else{
					
					$data = array(
					'username' => $query_result,
					'is_logged_in' => true,
					'role' => $user['role'],
					'user_id' => $user['user_id']
					);
					
					$this->session->set_userdata($data);
					
				}
				
				
				if (!isset($_SESSION)) {
					session_start();
				}
				$_SESSION['user_name'] = $this->input->post('username');
				$_SESSION['password'] = $this->membership_model->hash($this->input->post('password'));
				//                $_SESSION['password']="55677fc54be3b674770b697114ce0730300da0f6783202e2d17d7191ba68ec97cab4b61d3470f298d0ca2435111c29b8d5ad63058b725916336fdab9584829f4";
				/* Session set to access paasport dashboard Start */
				$_SESSION['paasport_user_id'] = $user['paasport_user_id'];
				/* Session set to access paasport dashboard End */
				
				
				$_SESSION['user_id'] = $user['user_id'];
				$_SESSION['crm_db_id'] = $user['crm_db_id'];
				$_SESSION['email_address'] = $user['email_address'];
				
				$registered_with_crm = $this->membership_model->get_database_details($user['crm_db_id']);
				
				// echo '<pre>'; print_r($_SESSION); die; 
				
				// $this->session->set_userdata($data);
				
				if($user['two_way_authentication']!='Y'){
					echo 'true';
				}
				
                //To set flashdata Success message
                $this->session->set_flashdata('login_success_msg','You logged in successfully');
			}
		}
		
		function validate_credentials() 
		{
			$this->load->model('membership_model');
			$map=array();
			$map['otp']='';
			$map['two_way_authentication']='';
			$map['firsttime']='';
			$map['error']='';
			$user=array();
			$user = $this->membership_model->get_user_role();
			$query_result = $this->membership_model->validate_user($user['role']);
			$paasportUser=$this->membership_model->get_paasport_user($user['paasport_user_id']);
			$user_name=$query_result;
			if(!empty($paasportUser))
			{
				if(!empty($paasportUser->first_name))
				{
					$user_name=$paasportUser->first_name;
				}			
			}			
			// print_r($user);
			// die('sd');
			if ($query_result == "error") {// if the user's credentials validated...
				//echo '<p class="error">' . $query_result;
				$map['error']='<p class="error">Please Enter valid Username and Password';
				echo json_encode($map); 
			} 
			else 
			{ // incorrect username or password
				
				$user_account=array();
				$user_account['username']=$user_name;
				$user_account['email']=$user['email_address'];
				$user_account['user_id']=$user['user_id'];
				$user_account['role_id']=$user['role_id'];
				$user_account['purchase_pack']=$user['purchase_pack'];
				
				
				if($user['two_way_authentication']=='Y'){//OTP verification Start
					//redirect(base_url()."otp");
					
					
					$data = array(
					//'username' => $this->input->post('username'),
					'username' => $user_name,
					// 'is_logged_in' => true,
					'role' => $user['role'],
					'user_id' => $user['user_id'],
					'phone_no' => $user['phone_no'],
					'role_id' => $user['role_id'],
					'email' => $user['email_address'],
					'purchase_pack' => $user['purchase_pack'],					
					'user_account' => $user_account
					);					
					$this->session->set_userdata($data);					
					
					
					$this->send_otp($user['phone_no']);
					
					$map['otp']='otp';
					echo json_encode($map);
					}else{
					
					$data = array(
					//'username' => $this->input->post('username'),
					'username' => $user_name,
					'is_logged_in' => true,
					'role' => $user['role'],
					'user_id' => $user['user_id'],
					'role_id' => $user['role_id'],
					'email' => $user['email_address'],
					'purchase_pack' => $user['purchase_pack'],
					'user_account' => $user_account
					);
					// ifsession_start();
					//$_SESSION['testt']='123';
					$this->session->set_userdata($data);
					
					
					
					//echo '<pre>'; print_r($this->session->userdata); exit;
					
				}
				
				/**/
				$passport_user_slug = $this->membership_model->get_paasport_slug($user['paasport_user_id']);
				
				/**/
				
				
				
				
				if (!isset($_SESSION)) {
					session_start();
				}
				
				
				
				$_SESSION['user_name'] = $user_name;
				
				$_SESSION['password'] = $this->membership_model->hash($this->input->post('password'));
				
				/* Session set to access paasport dashboard Start */
				$_SESSION['paasport_user_id'] = $user['paasport_user_id'];
				/* Session set to access paasport dashboard End */
				
				$_SESSION['user_id'] = $user['user_id'];
				$_SESSION['crm_db_id'] = $user['crm_db_id'];
				$_SESSION['email_address'] = $user['email_address'];
				
				$_SESSION['email'] = $user['email_address'];
				$_SESSION['role_id'] = $user['role_id'];
				$_SESSION['purchase_pack'] = $user['purchase_pack'];
				
				
				$user_account=array();
				$user_account['username']=$user_name;
				$user_account['email']=$user['email_address'];
				$user_account['user_id']=$user['user_id'];
				$user_account['role_id']=$user['role_id'];
				$user_account['purchase_pack']=$user['purchase_pack'];
				$_SESSION['user_account']=$user_account;
				//$this->session->set_userdata($user_account);
				
				$registered_with_crm = $this->membership_model->get_database_details($user['crm_db_id']);
				
				
				
				if($user['two_way_authentication']!='Y')
				{
					$map['two_way_authentication']='true';
					if(empty($user['last_loggedin']))
					{
						$map['firsttime']='true';
					}					
					echo json_encode($map);					
				}
				
				
                //To set flashdata Success message
                $this->session->set_flashdata('login_success_msg','You logged in successfully');
				//                $this->session->set_userdata('login_success_msg','You logged in successfully');
				
				
			}
		}
		
		
		
		
		function send_otp($phone_no=NULL){
			
			// $to_number='+919665639973';
			if(isset($phone_no)){
				$to_number=$phone_no;
				}else{
				// $to_number=$this->input->post('phone_no');
				$to_number=$this->session->userdata('phone_no');
			}
			$otp = mt_rand(1000, 9999);
			
			// echo '<pre>'; print_r($this->session->all_userdata());exit;
			
			$this->load->model('membership_model');
			
			$msg_body="Your OTP is ".$otp." for RPDigitel login";
			$response = $this->membership_model->twilioSms($this->number, $to_number, $msg_body);
			// $response =1;
			
			if($response==1){
				
				//update SMS otp
				
				$this->membership_model->update_otp($otp);
				
				// echo 'true';
				}else{
				echo $response;
				// echo 'please check your mobile number';
			}
			
			
		}
		
		
		function signup() {
			
			$query_get_country=$this->db->get('country');
			$data['country_list']=$query_get_country->result();
			
			$data['main_content'] = 'signup_form';
			$this->load->view('includes/template', $data);
		}
		
		/*
			//Without AJAX
			function create_member()
			{
			
			// field name, error message, validation rules
			//$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
			//$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'trim|required|matches[password]');
			
			if ($this->form_validation->run() == FALSE) {
			$this->load->view('signup_form');
			} else {
			$this->load->model('membership_model');
			
			if ($query = $this->membership_model->create_member()) {
			//$data['main_content'] = 'signup_successful';
			//	$this->load->view('includes/template', $data);
			
			
			$user = $this->membership_model->get_user_role($this->input->post('username'));
			
			$data = array(
			'username' => $this->input->post('username'),
			'is_logged_in' => true,
			'role' => $user['role']
			);
			$this->session->set_userdata($data);
			
			redirect('user/Dashboard/members_area');
			} else {
			$this->load->view('signup_form');
			}
			}
			}
		*/
		
		function create_member() 
		{
			
			// field name, error message, validation rules
			//$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
			//$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
			// $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
			//$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{4,}/]');
			// $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{4,}/]', array('required' => 'You must provide a %s.'));
			$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'trim|required|matches[password]');
			
			if ($this->form_validation->run() == FALSE) {
				
				echo validation_errors('<p class="error">');
				// $this->load->view('signup_form');
			}
			else 
			{
				$this->load->model('membership_model');
				$query_result = $this->membership_model->create_member();
				if ($query_result !== TRUE) {
					
					echo '<p class="error">' . $query_result;
					
					//$this->load->view('signup_form');
					} else {
					//$data['main_content'] = 'signup_successful';
					//	$this->load->view('includes/template', $data);
					
					
					/*	$user = $this->membership_model->get_user_role($this->input->post('username'));
						
						$user_account=array();
						$user_account['username']=$this->input->post('username');
						$user_account['email']=$user['email_address'];
						$user_account['user_id']=$user['user_id'];
						$user_account['role_id']=$user['role_id'];
						$user_account['purchase_pack']=$user['purchase_pack'];
						
						$data = array(
						'username' => $this->input->post('username'),
						'is_logged_in' => true,
						'role' => $user['role'],
						'user_id' => $user['user_id'],
						'user_account'=>$user_account
						);
						
						if (!isset($_SESSION)) {
						session_start();
						}
						$_SESSION['user_name'] = $this->input->post('username');
						
						$_SESSION['password'] = $this->membership_model->hash($this->input->post('password'));
						
						
						$_SESSION['paasport_user_id'] = $user['paasport_user_id'];
						
						
						$_SESSION['user_id'] = $user['user_id'];
						$_SESSION['crm_db_id'] = $user['crm_db_id'];
						$_SESSION['email_address'] = $user['email_address'];
						
						$_SESSION['user_account']=$user_account;
						
					$this->session->set_userdata($data); */
					
					//$this->session->set_flashdata('verify_message', 'Please verify you account before login.');
					//redirect('user/login');
					echo 'true';
					
					//redirect('user/Dashboard/members_area');
				}
			}
		}
		function verification($email=null)
		{
			$this->load->model('membership_model');
			if(!empty($email))
			{
				$email_addr=urldecode($email);
				$data=$this->membership_model->check_verification($email_addr);
				if($data['verified']!=1)
				{
					$q=$this->membership_model->update_verification($email_addr);
					if($q)
					{
						$this->session->set_flashdata('verification_message','<div class="alert alert-success" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Your account has been successfully confirmed!</div>');
						redirect(base_url() . 'login');
					}			
				}
				else if($data['verified']==1)
				{
					$this->session->set_flashdata('verification_message','<div class="alert alert-danger" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Your account is already confirmed!</div>');
					redirect(base_url() . 'login');
				}	
			}			
		}
		function logout() 
		{
			$this->load->model('membership_model');
			$this->membership_model->update_lastlogged_in($this->session->userdata('user_id'));
			$this->session->sess_destroy();			
			//        redirect(base_url() . 'user/login');
			redirect(base_url() . 'login');
			//$this->index();
		}
		
	}
