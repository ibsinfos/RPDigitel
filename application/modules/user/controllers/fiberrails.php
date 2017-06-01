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
       		$data['main_content'] = 'fiber-rails';
			$this->load->view('includes/template', $data);
		}
		
	}
