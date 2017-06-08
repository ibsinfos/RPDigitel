<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class News extends MX_Controller
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
           redirect(base_url());
		}
    }
	
	public function add_news()
	{
		$this->load->library('session');
		$this->load->helper('utility_helper');
		$this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
		$session_data=$this->session->userdata('user_account');
		$user = array();
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('title', 'News Title', 'trim|required');
		 $this->form_validation->set_rules('description','Description', 'trim|required');
		 
		if ($this->form_validation->run() == FALSE) 
		{
			$category = $this->common_model->getRecords(TABLES::$CATEGORY, '*');		
			$this->template->set('category',$category);
			$this->template->set('page','dashboard');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('admin_silo')
					->title('Admin Dashboard | Silo')
					->set_partial('header','partials/admin_header')
					->set_partial('sidebar','partials/admin_sidebar')
					->set_partial('footer', 'partials/admin_footer');
			$this->template->build('add_news');
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
						$this->session->set_flashdata('news_message','<div class="alert alert-success" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>News has been saved successfully</div>');
						redirect(base_url() . 'add-news');
					}
					else
					{
						$this->session->set_flashdata('news_message','<div class="alert alert-danger" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Unable to save news</div>');
						redirect(base_url() . 'add-news');
					}
		}				
			
	}
	
	public function view_news()
	{
		
			$news = $this->common_model->getRecords(TABLES::$NEWS, '*');		
			$this->template->set('news',$news);
			$this->template->set('page','dashboard');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('admin_silo')
					->title('Admin Dashboard | Silo')
					->set_partial('header','partials/admin_header')
					->set_partial('sidebar','partials/admin_sidebar')
					->set_partial('footer', 'partials/admin_footer');
			$this->template->build('view_news');	
	}
	public function delete_news($id=null)
	{
		if(!empty($id))
		{
			$this->common_model->deleteRows(array('id'=>$id),TABLES::$NEWS,'id');
			$this->session->set_flashdata('news_message','<div class="alert alert-success" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>News has been saved successfully</div>');
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
    public function index()
    {
		
    }

	
	

    
    
	
   
}
