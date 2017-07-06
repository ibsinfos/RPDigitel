<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	Class Community_slider extends MX_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			
			$this->load->helper('url');
			$this->load->helper('cookie');
			$this->load->model("common_model");
			// $this->session = $this->session->userdata('user_account');		
			if (!$this->common_model->isLoggedIn())  {
				redirect(base_url().'admin/login');
			}
		}
		
		public function add_slider()
		{
			$this->load->library('session');
			$this->load->helper('utility_helper');
			$this->load->model('common_model');
			$this->load->helper(array('form', 'url', 'email'));
			$session_data=$this->session->userdata('user_account');
			$user = array();
			
				$this->template->set('page','add_slider');
				$this->template->set_theme('default_theme');
				$this->template->set_layout('admin_silo')
				->title('Admin Dashboard | Silo')
				->set_partial('header','partials/admin_header')
				->set_partial('sidebar','partials/admin_sidebar')
				->set_partial('footer', 'partials/admin_footer');
				$this->template->build('add_slider');
			
				
				if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) 
				{
					$config = array();
					$config['upload_path'] = './uploads/slider/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['remove_spaces'] = TRUE;
					$config['encrypt_name'] = TRUE;
					$config['overwrite'] = FALSE;
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('image')) {
						$error = $this->upload->display_errors();
						$map ['status'] = 0;
						$error_array['image']= "User Image upload error - " . $error; 
						$map ['msg'] = $error_array;
						echo json_encode($map);
						exit;
						} else {
						$data = array('upload_data' => $this->upload->data());
					}               
					$user['image'] = "uploads/slider/" . $data['upload_data']['file_name'];
					$uid= $this->common_model->insertRow($user, TABLES::$COMMUNITY_SLIDER);
					if ($uid) {				
						$this->session->set_flashdata('news_message','<div class="alert alert-success" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Slider Image has been saved successfully</div>');
						redirect(base_url() . 'add-slider');
					}
					else
					{
						$this->session->set_flashdata('news_message','<div class="alert alert-danger" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Unable to save Slider Image</div>');
						redirect(base_url() . 'add-slider');
					}
				}								
				
						
			
		}
		
		public function view_slider()
		{
			
			$news = $this->common_model->getRecords(TABLES::$COMMUNITY_SLIDER, '*');		
			$this->template->set('news',$news);
			$this->template->set('page','slider_list');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('admin_silo')
			->title('Admin Dashboard | Silo')
			->set_partial('header','partials/admin_header')
			->set_partial('sidebar','partials/admin_sidebar')
			->set_partial('footer', 'partials/admin_footer');
			$this->template->build('view_slider');	
		}
		public function delete_slider($id=null)
		{
			if(!empty($id))
			{
				$this->common_model->deleteRows(array('id'=>$id),TABLES::$COMMUNITY_SLIDER,'id');
				$this->session->set_flashdata('news_message','<div class="alert alert-success" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Slider Image has been deleted successfully</div>');
				redirect(base_url().'news');
			}
			else
			{
				redirect(base_url().'news');
			}
		}
		public function saveNews()
		{
			$this->load->library('session');
			$this->load->helper('utility_helper');
			$this->load->model('common_model');
			$this->load->helper(array('form', 'url', 'email'));
			$session_data=$this->session->userdata('user_account');
			$user = array();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'News Title', 'trim|required');
			if ($this->form_validation->run() == FALSE) 
			{
				redirect('add-news');
			}
			else
			{
				if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) 
				{
					$config = array();
					$config['upload_path'] = './uploads/news/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['remove_spaces'] = TRUE;
					$config['encrypt_name'] = TRUE;
					$config['overwrite'] = FALSE;
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('image')) {
						$error = $this->upload->display_errors();
						$map ['status'] = 0;
						$error_array['image']= "User Image upload error - " . $error; 
						$map ['msg'] = $error_array;
						echo json_encode($map);
						exit;
						} else {
						$data = array('upload_data' => $this->upload->data());
					}               
					$user['image'] = "uploads/news/" . $data['upload_data']['file_name'];
				}				
				$user['title'] = $this->input->post('title');
				$user['description'] = $this->input->post('description');
				if(!empty($this->input->post('category')))
				{
					$user['category'] = implode(',',$this->input->post('category')); 
				}	
				$user['user_id'] = $session_data['user_id'];
				$user['created'] = date('Y-m-d h:i:s');							
				$uid= $this->common_model->insertRow($user, TABLES::$NEWS);
				if ($uid) {				
					$map ['status'] = 1;
					$map ['blogid'] = $uid;
					$map ['msg'] = "News has been saved";
					echo json_encode($map);
				}
				else
				{
					$map ['status'] = 0;
					$map ['blogid'] = '';
					$map ['msg'] = "Unable to save blog information";
					echo json_encode($map);
				}
			}			
			
		}
		
		
		
			
		public function edit_slider($id=null)
		{
			$this->load->library('session');
			$this->load->helper('utility_helper');
			$this->load->model('common_model');
			$this->load->helper(array('form', 'url', 'email'));
			$session_data=$this->session->userdata('user_account');
			$user = array();
			
				$news = $this->common_model->getRecords(TABLES::$COMMUNITY_SLIDER, '*',array('id'=>$id));
				$this->template->set('news',$news);
				$this->template->set('page','edit_slider');
				$this->template->set_theme('default_theme');
				$this->template->set_layout('admin_silo')
				->title('Admin Dashboard | Silo')
				->set_partial('header','partials/admin_header')
				->set_partial('sidebar','partials/admin_sidebar')
				->set_partial('footer', 'partials/admin_footer');
				$this->template->build('edit_slider');
			
				
				if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) 
				{
					$config = array();
					$config['upload_path'] = './uploads/slider/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['remove_spaces'] = TRUE;
					$config['encrypt_name'] = TRUE;
					$config['overwrite'] = FALSE;
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('image')) {
						$error = $this->upload->display_errors();
						$map ['status'] = 0;
						$error_array['image']= "User Image upload error - " . $error; 
						$map ['msg'] = $error_array;
						echo json_encode($map);
						exit;
						} else {
						$data = array('upload_data' => $this->upload->data());
					}               
					$user['image'] = "uploads/slider/" . $data['upload_data']['file_name'];
					$uid = $this->common_model->updateRow(TABLES::$COMMUNITY_SLIDER,$user,array('id'=>$this->input->post('id')));
					if ($uid) {				
						$this->session->set_flashdata('news_message','<div class="alert alert-success" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Slider Image has been saved successfully</div>');
						redirect(base_url().'edit-slider/'.$id);
					}
					else
					{
						$this->session->set_flashdata('news_message','<div class="alert alert-danger" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Unable to save Slider Image</div>');
						redirect(base_url().'edit-slider/'.$id);
					}
				}								
			
			}
			
		
		
		
	
		
	
	}
