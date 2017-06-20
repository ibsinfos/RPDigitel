
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {	


	 	function __construct() {       
			parent::__construct();		
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
