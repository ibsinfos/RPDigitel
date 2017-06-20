<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	Class Project extends MX_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('cookie');
			$this->load->model("common_model");
			$this->session = $this->session->userdata('user_account');
			
			
			$this->sidebar = 'partials/hosting_sidebar';
			
			
			/*
				if ($this->session['purchase_pack'] == '1') {
				$this->sidebar = 'partials/marketplace_sidebar';
				} else if ($this->session['purchase_pack'] == '2') {
				$this->sidebar = 'partials/hosting_sidebar';
				} else {
				$this->sidebar = 'partials/both_sidebar';
				}
			*/
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
		}
		
		public function projectList()
		{
			$this->load->model('Project_Model');
			$user_id = $this->session['user_id'];
			$data = $this->Project_Model->getProjectListModelForUser($user_id);
			$this->template->set('project_list', $data); // data to be sent in front end
			
			$this->template->set('page', 'project_list');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Project List | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('project_list');
		}
		
		/*
			* Load view for my subscribers
		*/
		
		public function addProject()
		{
			$this->template->set('page', 'add_project');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Add Project | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('add_project');
		}
		
		/*
			* Load view for order history
		*/
		
		public function uploadFiles()
		{
			$this->load->model('Project_Model');
			$user_id = $this->session['user_id'];
			$data = $this->Project_Model->getProjectListModelForUser($user_id);
			$this->template->set('project_list', $data); // data to be sent in front end
			
			
			$this->template->set('page', 'upload_files');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Upload Files | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('upload_files');
		}
		
		/*
			* Load view for download center
		*/
		
		public function downloadCenter()
		{
			
			$this->template->set('page', 'download_center');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Download Center | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('download_center');
		}
		
		/*
			* Load view for setting
		*/
		
		public function setting()
		{
			
			$this->template->set('page', 'setting');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Setting | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('setting');
		}
		
		public function saveNewProject()
		{
			$this->load->model('Project_Model');
			$project_name= trim($this->input->post('project_name'));
			$description = trim($this->input->post('description'));
			$user_id = $this->session['user_id'];
			// checking whether the project is already addded
			
			$count = $this->Project_Model->checkProjectAlreadyExists($user_id,$project_name);
			
			
			if($project_name=="" || $description=="")
			{
				redirect(base_url().'add-project?msg=invalid');
			}
			else if($count!=0)
			{
				redirect(base_url().'add-project?msg=exists');
			}
			else
			{
				
				$data = array("user_id"=>$user_id,
				"project_name"=>$project_name,
				"description"=>$description
				);
				$this->Project_Model->saveNewProjectModel($data,$user_id,$project_name);
				redirect(base_url().'add-project?msg=success');			
			}
		}
		
		
		public function browse_files()
		{
			
			$this->load->model("login_model");
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			
			$this->template->set('user_menu',$user_menu);
			$this->template->set('page', 'browse_files');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('elfinder')
			->title('Browse File | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('browse_files');
		}
		
		
		public function sd_storage()
		{
		
			$this->load->model("login_model");
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			
			$this->template->set('user_menu',$user_menu);
			
			$this->template->set('page', 'file_browse');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('elfinder')
			->title('View File | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('user_files');
		}
		
		public function cloud_storage()
		{
		
			$this->load->model("login_model");
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			
			$this->template->set('user_menu',$user_menu);
			
			$this->template->set('page', 'cloud_storage');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('elfinder')
			->title('Cloud Storage | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('cloud_storage');
		}
		
		
		public function uploadProjectFiles()
		{
			//echo "<pre>"; print_r($_FILES);
			$user_id = $this->session['user_id'];
			$project_name = $_SESSION['project_name'];
			if( !empty( $_FILES['file']['name'] ) ) 
			{
			    
				$profile_image = time().$_FILES["file"]['name'];
				$profile_image = str_replace(" ","_",$profile_image);
				$profile_image = str_replace("#","",$profile_image);
				$profile_image = str_replace("-","",$profile_image);
				$profile_image = str_replace("(","",$profile_image);
				$profile_image = str_replace(")","",$profile_image);
				
				$config['file_name'] = $profile_image;
				$config['upload_path'] = './uploads/'.$user_id.'/'.$project_name;
				$config['allowed_types'] = '*';
				$config['max_size'] = '10000';
				$config['max_width']  = '';
				$config['max_height']  = '';
				$config['overwrite'] = TRUE;
				$config['remove_spaces'] = TRUE;
				$this->load->library('upload', $config);
				$this->upload->do_upload('file');
				
				$this->load->model('Project_Model');
				$this->Project_Model->addFileToProject($user_id,$profile_image);
			}
		}
		
		public function setProjectId()
		{
			$project_id = $this->input->post('project_id');
			$_SESSION['project_name'] = $project_id;
			
		}
		
	}
