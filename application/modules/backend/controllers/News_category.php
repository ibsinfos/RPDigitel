<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	Class News_category extends MX_Controller
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
		
		
		public function index()
		{
			
			$categories = $this->common_model->getRecords(TABLES::$CATEGORY, '*');		
			$this->template->set('categories',$categories);
			$this->template->set('page','category_list');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('admin_silo')
			->title('Admin Dashboard | Silo')
			->set_partial('header','partials/admin_header')
			->set_partial('sidebar','partials/admin_sidebar')
			->set_partial('footer', 'partials/admin_footer');
			$this->template->build('category_list');	
		}
		
		public function delete_category($id=null)
		{
			if(!empty($id))
			{
				$this->common_model->deleteRows(array('id'=>$id),TABLES::$CATEGORY,'id');
				$this->session->set_flashdata('news_message','<div class="alert alert-success" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Category has been deleted successfully</div>');
				redirect(base_url().'category');
			}
			else
			{
				redirect(base_url().'category');
			}
		}
		
		public function add_category()
		{
			$this->load->library('session');
			$this->load->helper('utility_helper');
			$this->load->model('common_model');
			$this->load->helper(array('form','url', 'email'));
			$session_data=$this->session->userdata('user_account');
			$user = array();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Category', 'trim|required');
			if ($this->form_validation->run() == FALSE) 
			{
				$this->template->set('page','add_category');
				$this->template->set_theme('default_theme');
				$this->template->set_layout('admin_silo')
				->title('Admin Dashboard | Silo')
				->set_partial('header','partials/admin_header')
				->set_partial('sidebar','partials/admin_sidebar')
				->set_partial('footer', 'partials/admin_footer');
				$this->template->build('add_category');
			}
			else
			{
				$user['name'] = $this->input->post('name');							
				$uid= $this->common_model->insertRow($user, TABLES::$CATEGORY);
				if ($uid) {				
					$this->session->set_flashdata('news_message','<div class="alert alert-success" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Category has been saved successfully</div>');
					redirect(base_url() . 'add-category');
				}
				else
				{
					$this->session->set_flashdata('news_message','<div class="alert alert-danger" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Unable to save Category</div>');
					redirect(base_url() . 'add-category');
				}
			}				
			
		}
		
		public function edit_category($id=null)
		{
			$this->load->library('session');
			$this->load->helper('utility_helper');
			$this->load->model('common_model');
			$this->load->helper(array('form','url', 'email'));
			$session_data=$this->session->userdata('user_account');
			$user = array();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Category', 'trim|required');
			if ($this->form_validation->run() == FALSE) 
			{
				$category = $this->common_model->getRecords(TABLES::$CATEGORY, '*',array('id'=>$id));		
				$this->template->set('category',$category);
				$this->template->set('page','add_category');
				$this->template->set_theme('default_theme');
				$this->template->set_layout('admin_silo')
				->title('Admin Dashboard | Silo')
				->set_partial('header','partials/admin_header')
				->set_partial('sidebar','partials/admin_sidebar')
				->set_partial('footer', 'partials/admin_footer');
				$this->template->build('edit_category');
			}
			else
			{
				$user['name'] = $this->input->post('name');							
				$uid = $this->common_model->updateRow(TABLES::$CATEGORY,$user,array('id'=>$this->input->post('id')));
				if ($uid) {				
					$this->session->set_flashdata('news_message','<div class="alert alert-success" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Category has been saved successfully</div>');
					redirect(base_url() . 'edit-category/'.$id);
				}
				else
				{
					$this->session->set_flashdata('news_message','<div class="alert alert-danger" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Unable to save Category</div>');
					redirect(base_url() . 'edit-category'.$id);
				}
			}				
			
		}
		
	}
