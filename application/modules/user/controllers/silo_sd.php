<?php
	
	class silo_sd extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->is_logged_in();
			//  modules::run('user/login/is_logged_in');
		}
		
		function is_logged_in() 
		{
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
//				
				die();
				//$this->load->view('login_form');
			}
		}
		
		function index() {

			// $this->load->view('silo-sd');
			$data['slug']=$this->getSlugname($_SESSION['paasport_user_id']); 
			$data['main_content'] = 'silo-sd';
			$data['page'] = 'silo_sd';
			$this->load->view('includes/template', $data);
		}
		
		function getSlugname($user_id)
		{
			$this->load->model('membership_model');
			$slug=$this->membership_model->get_paasport_slug($user_id);
			return $slug;
		}
		
	}
