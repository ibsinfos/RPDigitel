<?php
	
	class silo_bank extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			//$this->is_logged_in();
			//  modules::run('user/login/is_logged_in');
		}
		
		function is_logged_in() {
			$is_logged_in = $this->session->userdata('is_logged_in');
			$user_role = $this->session->userdata('role');
			// print_r($this->session->userdata);
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
		
		function index() {
			// $this->load->view('silo-bank');
			
			$data['main_content'] = 'silo-bank';
			$this->load->view('includes/template', $data);
		}
		
		
		
		function download_silobank_apk() {
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
			$this->form_validation->set_rules('company', 'Company name', 'trim|required|min_length[4]');
			
			
			if ($this->form_validation->run() == FALSE) {
				
				echo validation_errors('<p class="error">');
				
			} else 
			
			if(!$this->input->post('silo_bank_agree')){
			
				echo "Please accept terms and conditions";
				
				}else{
				echo "success";		
			}
			
			
			
		}
		
		
		
		
		
	}
