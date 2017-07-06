
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {	


	 	function __construct() {       
			parent::__construct();		
		}	
		
		public function loginUser()	{
			// echo '<pre/>';
			// print_r($_POST);
			// die;
			
			$this->load->model('Webservices_model');
			$data = $this->Webservices_model->loginUser($this->input->post());
			echo json_encode($data);
			// print_r($this->input->post());
			
		}
		
		public function socialLogin()	{
		
			$this->load->model('Webservices_model');
			$data = $this->Webservices_model->socialLogin($this->input->post());
			echo json_encode($data);
			
		}
		
		
		public function registerUser()	{
			// echo '<pre/>';
			// print_r($_POST);
			// die;
			
			$this->load->model('Webservices_model');
			$data = $this->Webservices_model->registerUser($this->input->post());
			echo json_encode($data);
			
		}
		
		public function socialRegister()	{
			
			$this->load->model('Webservices_model');
			$data = $this->Webservices_model->socialRegister($this->input->post());
			echo json_encode($data);
			
		}
		
		public function syncUserFiles()	{
			/*echo '<pre/>';		
			print_r($_POST);	
			$filepath = trim($_POST['path'],'[,],",/');
			$a = explode("/", $filepath);
			print_r($a);	
			print_r($_FILES);		
			die;	*/
			
			$this->load->model('Webservices_model');		
			$data = $this->Webservices_model->uploadSyncFiles($_POST, $_FILES);		
			echo json_encode($data);	
			
		}
		
		public function downloadUserFiles()	{		
			/*echo '<pre/>';		
			print_r($_POST);		
			print_r($_FILES);		
			die;	*/
			
			$this->load->model('Webservices_model');		
			$data = $this->Webservices_model->downloadUserFiles($_POST);		
			echo json_encode($data);	
			
		}
		
		public function findFilesByUser(){		
			
			$this->load->model('Webservices_model');		
			$data = $this->Webservices_model->getUserFiles($_POST);		
			echo json_encode($data);	
			
		}
}

?>
