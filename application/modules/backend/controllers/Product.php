<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	Class Product extends MX_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('cookie');
			$this->load->model("common_model");
			$this->sessionn = $this->session->userdata('user_account');
			
			$this->sidebar = 'partials/hosting_sidebar';
			
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
		
		
		public function createProduct(){
			
			$this->load->model('login_model');
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			$this->template->set('user_menu',$user_menu);
			
			$this->template->set('slug',$slug);
			$this->template->set('user',$user);
			$this->template->set('page','createproduct');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Admin Product List | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('createproduct');
			
		}
		
		
		
		public function save_publish_application_basic_info(){
			
			
			$post_values=$this->input->post();
			// print_r($post_values);
			
			// $basic_info=array('basic_info'=>$post_values);
			
			$this->session->set_userdata('publisher_basic_info',$post_values);
			
			echo "<pre>";
			print_r($this->session->all_userdata());
			
		}
		
		
		public function save_publish_application_company_info(){
			
			
			$post_values=$this->input->post();
			
			$this->session->set_userdata('publisher_company_info',$post_values);
			
			echo "<pre>";
			print_r($this->session->all_userdata());
			
		}
		
		
		public function save_publish_application_all_info(){
			
			
			if($this->session->userdata('publisher_basic_info')){
				
				$publisher_basic_info=$this->session->userdata('publisher_basic_info');
				
				$publisher_application_data['user_id']=$this->session->userdata('user_id');
				$publisher_application_data['category']=$publisher_basic_info['productCategory'];
				$publisher_application_data['choice1']=$publisher_basic_info['choice1'];
				$publisher_application_data['choice2']=$publisher_basic_info['choice2'];
				$publisher_application_data['choice3']=$publisher_basic_info['choice3'];
				$publisher_application_data['choice4']=$publisher_basic_info['choice4'];
				$publisher_application_data['choice5']=$publisher_basic_info['choice5'];
				$publisher_application_data['business_address']=$publisher_basic_info['businessAddress'];
				$publisher_application_data['business_phone']=$publisher_basic_info['businessPhone'];
				$publisher_application_data['business_fax']=$publisher_basic_info['fax'];
				$publisher_application_data['business_email']=$publisher_basic_info['email'];
				
				
				$this->db->insert('tbl_publisher_application',$publisher_application_data);
				$publisher_application_id=$this->db->insert_id();
				
				
				if($this->session->userdata('publisher_company_info')){
					
					$publisher_company_info=$this->session->userdata('publisher_company_info');
					
					
					$company_info['user_id']=$this->session->userdata('user_id');
					$company_info['application_id']=$publisher_application_id;
					
					$company_info['publishing_company_name1']=$publisher_company_info['publishing_company_name1'];
					$company_info['performing_rights_organization1']=$publisher_company_info['performing_rights_organization1'];
					$company_info['position_held1']=$publisher_company_info['position_held1'];
					$company_info['publishing_company_name2']=$publisher_company_info['publishing_company_name2'];
					$company_info['performing_rights_organization2']=$publisher_company_info['performing_rights_organization2'];
					$company_info['position_held2']=$publisher_company_info['position_held2'];
					$company_info['publishing_company_name3']=$publisher_company_info['publishing_company_name3'];
					$company_info['performing_rights_organization3']=$publisher_company_info['performing_rights_organization3'];
					$company_info['position_held3']=$publisher_company_info['position_held3'];
					
					$company_info['is_listed_on_bmi_website']=$publisher_company_info['companyInfoListed'];
					$company_info['contact_name']=$publisher_company_info['contactName'];
					$company_info['title']=$publisher_company_info['title'];
					$company_info['address']=$publisher_company_info['address'];
					$company_info['city']=$publisher_company_info['city'];
					$company_info['state']=$publisher_company_info['state'];
					$company_info['zip']=$publisher_company_info['zip'];
					$company_info['phone']=$publisher_company_info['phone'];
					$company_info['fax']=$publisher_company_info['fax'];
					$company_info['email']=$publisher_company_info['email'];
					$company_info['url']=$publisher_company_info['url'];
					
					$company_info['is_administratered_by_bmi']=$publisher_company_info['anotherBMICompany'];
					$company_info['administrator_name']=$publisher_company_info['administratorName'];
					$company_info['contact_person']=$publisher_company_info['contactPerson'];
					$company_info['administrator_address']=$publisher_company_info['administratorAddress'];
					$company_info['is_representative_at_bmi']=$publisher_company_info['contactAtBMI'];
					$company_info['representative_name']=$publisher_company_info['bmiContactName'];
					
					$this->db->insert('tbl_publisher_application_company_info',$company_info);
					// $publisher_application_id=$this->db->insert_id();
					
					
					// echo "<pre>";
					// print_r($publisher_company_info);
					
				}
				
				
			}
			
			
			
			
			
			
		}
		
		
		
		
		
	}
