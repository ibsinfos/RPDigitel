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
			
			// if (!$this->common_model->isLoggedIn()) {
			// redirect(base_url());
			// }
			
			// if(!empty($_SESSION['paasport_user_id']))
			// {
			// $user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			// $slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			// $this->template->set('user',$user);
			// $this->template->set('slug',$slug);
			// }
		}
		
		
		public function createProduct(){
			
			$this->load->model('login_model');
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			
			
			//********************************************************************************************************
			
			
			
			function getDirContents($dir, &$results = array()){
				$files = scandir($dir);
				
				foreach($files as $key => $value){
					// $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
					$path = $dir.DIRECTORY_SEPARATOR.$value;
					if(!is_dir($path)) {
						$results[] = $path;
						} else if($value != "." && $value != "..") {
						getDirContents($path, $results);
						// $results[] = $path;  //Directories
					}
				}
				
				return $results;
			}
			
			$dir='./uploads/'.$_SESSION['user_id'];
			
			
			
			$silosd_files=getDirContents($dir);
			
			// echo "<pre>";
			// print_r($silosd_files);
			// die();
			// var_dump(getDirContents($dir));
			
			
			//********************************************************************************************************
			
			
			
			
			
			$this->template->set('user_menu',$user_menu);
			
			$this->template->set('silosd_files',$silosd_files);
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
			
			// print_r($post_values['foc_stock_stockholdersName']);
			
			
			$publisher_basic_info=$post_values;
			
			// if($this->session->userdata('publisher_basic_info')){
			
			// $publisher_basic_info=$this->session->userdata('publisher_basic_info');
			
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
			
			$this->session->set_userdata('publisher_application_id',$publisher_application_id);
			
			//basic info Inserted
			
			
			//Stockholder
			$count_busi_stock=0;
			
			if(isset($post_values['foc_stock_stockholdersName'])){
				foreach($post_values['foc_stock_stockholdersName'] as $busi_structure){
					
					$stockholder_data['user_id']=$this->session->userdata('user_id');
					$stockholder_data['application_id']=$publisher_application_id;
					$stockholder_data['name']=$post_values['foc_stock_stockholdersName'][$count_busi_stock];
					$stockholder_data['address']=$post_values['foc_stock_homeAddressZipCode'][$count_busi_stock];
					$stockholder_data['tax_id']=$post_values['foc_stock_ssOrTaxId'][$count_busi_stock];
					$stockholder_data['ownership_percentage']=$post_values['foc_stock_percentageOfOwnership'][$count_busi_stock];
					$stockholder_data['is_publicaly_traded']=$post_values['foc_stock_isPublicklyTradedCorporation'][$count_busi_stock];
					
					$this->db->insert('tbl_publisher_stockholders',$stockholder_data);
					$count_busi_stock++;
					
				}
			}
			
			
			//Officers
			$count_busi_officers=0;
			
			if(isset($post_values['foc_officers_officerssName'])){
				foreach($post_values['foc_officers_officerssName'] as $busi_structure){
					
					$stockholder_data['user_id']=$this->session->userdata('user_id');
					$stockholder_data['application_id']=$publisher_application_id;
					$stockholder_data['name']=$post_values['foc_officers_officerssName'][$count_busi_officers];
					$stockholder_data['address']=$post_values['foc_officers_homeAddressZipCode'][$count_busi_officers];
					$stockholder_data['office_held']=$post_values['foc_officers_officeHeld'][$count_busi_officers];
					
					$this->db->insert('tbl_publisher_officers',$stockholder_data);
					$count_busi_officers++;
					
				}
			}
			
			
			//PARTNERSHIP
			$count_busi_partnership=0;
			
			if(isset($post_values['foc_partners_Name'])){
				foreach($post_values['foc_partners_Name'] as $busi_structure){
					
					
					$stockholder_data['user_id']=$this->session->userdata('user_id');
					$stockholder_data['application_id']=$publisher_application_id;
					$stockholder_data['name']=$post_values['foc_partners_Name'][$count_busi_partnership];
					$stockholder_data['address']=$post_values['foc_partners_homeAddressZipCode'][$count_busi_partnership];
					$stockholder_data['tax_id']=$post_values['foc_partners_ssOrTaxId'][$count_busi_partnership];
					$stockholder_data['ownership_percentage']=$post_values['foc_partners_percentageOfOwnership'][$count_busi_partnership];
					
					
					$this->db->insert('tbl_publisher_partners',$stockholder_data);
					$count_busi_partnership++;
					
				}
			}
			
			
			//Members
			$count_busi_members=0;
			
			if(isset($post_values['foc_members_Name'])){
				foreach($post_values['foc_members_Name'] as $busi_structure){
					
					
					$stockholder_data['user_id']=$this->session->userdata('user_id');
					$stockholder_data['application_id']=$publisher_application_id;
					$stockholder_data['name']=$post_values['foc_members_Name'][$count_busi_members];
					$stockholder_data['address']=$post_values['foc_members_homeAddressZipCode'][$count_busi_members];
					$stockholder_data['tax_id']=$post_values['foc_members_ssOrTaxId'][$count_busi_members];
					$stockholder_data['ownership_percentage']=$post_values['foc_members_percentageOfOwnership'][$count_busi_members];
					
					
					$this->db->insert('tbl_publisher_members',$stockholder_data);
					$count_busi_members++;
					
				}
			}
			
			
			//Members
			$count_busi_managers=0;
			
			if(isset($post_values['foc_managers_Name'])){
				foreach($post_values['foc_managers_Name'] as $busi_structure){
					
					
					$stockholder_data['user_id']=$this->session->userdata('user_id');
					$stockholder_data['application_id']=$publisher_application_id;
					$stockholder_data['name']=$post_values['foc_managers_Name'][$count_busi_managers];
					$stockholder_data['address']=$post_values['foc_managers_homeAddressZipCode'][$count_busi_managers];
					$stockholder_data['tax_id']=$post_values['foc_managers_ssOrTaxId'][$count_busi_managers];
					$stockholder_data['have_authority']=$post_values['foc_managers_is_have_authority'][$count_busi_managers];
					
					
					$this->db->insert('tbl_publisher_managers',$stockholder_data);
					$count_busi_managers++;
					
				}
			}
			
			
			
			if($publisher_basic_info['businessStructureRadio']=='A'){
				
				$io['user_id']=$this->session->userdata('user_id');
				$io['application_id']=$publisher_application_id;
				
				$io['last_name']=$publisher_basic_info['io_lastName'];
				$io['first_name']=$publisher_basic_info['io_firstName'];
				$io['middle_name']=$publisher_basic_info['io_middleName'];
				$io['social_security_number']=$publisher_basic_info['io_socailSecurityNo'];
				$io['street']=$publisher_basic_info['io_street'];
				$io['city']=$publisher_basic_info['io_city'];
				$io['state']=$publisher_basic_info['io_state'];
				$io['zip_code']=$publisher_basic_info['io_zipCode'];
				$io['organization_name']=$publisher_basic_info['io_organizationName'];
				$io['affiliation_period']=$publisher_basic_info['io_affiliationPeriod'];
				
				$this->db->insert('tbl_publisher_busi_io',$io);
				
				
				}else if($publisher_basic_info['businessStructureRadio']=='B'){
				
				$foc['user_id']=$this->session->userdata('user_id');
				$foc['application_id']=$publisher_application_id;
				
				$foc['corporation_name']=$publisher_basic_info['foc_corporationName'];
				$foc['is_corporation_division']=$publisher_basic_info['foc_is_corporationDivision'];
				$foc['company_name']=$publisher_basic_info['foc_companyName'];
				$foc['state_of_incorporation']=$publisher_basic_info['foc_incorporationState'];
				$foc['tin']=$publisher_basic_info['foc_taxIdentyNo'];
				$foc['is_bmi_publishing_company']=$publisher_basic_info['foc_bmiDivisionRadio'];
				
				
				$this->db->insert('tbl_publisher_busi_foc',$foc);
				
				
				}else if($publisher_basic_info['businessStructureRadio']=='C'){
				
				$partnership['user_id']=$this->session->userdata('user_id');
				$partnership['application_id']=$publisher_application_id;
				
				$partnership['tin_ein']=$publisher_basic_info['p_taxIdentyNo'];
				
				$this->db->insert('tbl_publisher_busi_partnership',$partnership);
				
				
				}else if($publisher_basic_info['businessStructureRadio']=='D'){
				
				$fol['user_id']=$this->session->userdata('user_id');
				$fol['application_id']=$publisher_application_id;
				
				$fol['llc_name']=$publisher_basic_info['fol_nameOfLLC'];
				$fol['company_name']=$publisher_basic_info['fol_companyName'];
				$fol['state']=$publisher_basic_info['fol_incorporationState'];
				$fol['tin']=$publisher_basic_info['fol_taxIdentyNo'];
				$fol['is_dba']=$publisher_basic_info['fol_bmiDivision'];
				
				$this->db->insert('tbl_publisher_busi_fol',$fol);
				
			}
			
			
			
			// }
			// echo "<pre>";
			// print_r($post_values);
			
			// $this->session->set_userdata('publisher_basic_info',$post_values);
			
			// echo "<pre>";
			// print_r($this->session->all_userdata());
			// print_r($this->session->userdata('publisher_company_info'));
			
		}
		
		
		public function save_publish_application_company_info(){
			
			$publisher_company_info_post_values=$this->input->post();
			
			$publisher_company_info=$publisher_company_info_post_values;
			
			
			// if($this->session->userdata('publisher_company_info')){
			
			// $publisher_company_info=$this->session->userdata('publisher_company_info');
			
			
			$company_info['user_id']=$this->session->userdata('user_id');
			$company_info['application_id']=$this->session->userdata('publisher_application_id');
			
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
			//company info inserted
			// $publisher_application_id=$this->db->insert_id();
			
			
			// echo "<pre>";
			// print_r($publisher_company_info);
			
			// }
			
			// $this->session->set_userdata('publisher_company_info',$publisher_company_info_post_values);
			
			// echo "<pre>";
			// print_r($this->session->all_userdata());
			// print_r($this->session->userdata('publisher_company_info'));
			
		}
		
		/*
			public function upload_files_publish_application(){
			
			if( !empty( $_FILES['file']['name'] ) ) 				
			{
			
			$file = time().$_FILES["file"]['name'];					
			$file = str_replace(" ","_",$file);					
			$file = str_replace("#","",$file);					
			$file = str_replace("-","",$file);					
			$file = str_replace("(","",$file);					
			$file = str_replace(")","",$file);					
			
			$config['file_name'] = $file;
			$config['upload_path'] = './uploads/silo_publisher_application';					
			$config['allowed_types'] = 'jpg|png|jpeg';					
			$config['max_size'] = '10000';					
			$config['max_width']  = '';					
			$config['max_height']  = '';					
			$config['overwrite'] = TRUE;					
			$config['remove_spaces'] = TRUE;					
			$this->load->library('upload', $config);					
			$upload_file=$this->upload->do_upload('file');					
			
			if($this->session->userdata('upload_file_list')){
			
			$upload_file_list=$this->session->userdata('upload_file_list');
			
			array_push($upload_file_list,$file);
			
			$this->session->set_userdata('upload_file_list',$upload_file_list);
			
			print_r($upload_file_list);
			
			}else{
			
			$upload_file_list=array();
			array_push($upload_file_list,$file);
			
			$this->session->set_userdata('upload_file_list',$upload_file_list);
			
			}
			
			}
		}*/
		
		
		
		
		
		
		
		
		
		public function uploadProductFiles() {
			
			if (!empty($_FILES['file']['name'])) {
				
				$profile_image = time() . $_FILES["file"]['name'];
				$profile_image = str_replace(" ", "_", $profile_image);
				$profile_image = str_replace("#", "", $profile_image);
				$profile_image = str_replace("-", "", $profile_image);
				$profile_image = str_replace("(", "", $profile_image);
				$profile_image = str_replace(")", "", $profile_image);
				
				
				
				
				$user_id=$this->session->userdata('user_id');
				$upload_path='./uploads/silo_publisher_application/'.$user_id;
				
				if (!is_dir($upload_path)) {
					mkdir('./uploads/silo_publisher_application/'.$user_id, 0777, TRUE);
				}
				
				
				$config['file_name'] = $_FILES["file"]['name'];
				// $config['upload_path'] = './uploads/projects/thumbnails/';
				$config['upload_path'] = $upload_path;
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '10000';
				$config['max_width'] = '';
				$config['max_height'] = '';
				$config['overwrite'] = TRUE;
				$config['remove_spaces'] = TRUE;
				$this->load->library('upload', $config);
				$this->upload->do_upload('file');
				$upload_result = $this->upload->data();
				
				/*
					$image_config = array(
					'source_image' => $upload_result['full_path'],
					// 'new_image' => "uploads/projects/thumbnails/260x146/",
					'new_image' => "uploads/silo_publisher_application/thumbnails/260x146/",
					'maintain_ratio' => false,
					'width' => 260,
					'height' => 146
					);
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					$this->image_lib->clear();
				*/
				$ext=pathinfo($upload_result['file_name'], PATHINFO_EXTENSION);
				
				
				$result=array('type'=>$ext,'file_name'=>$upload_result['file_name']);
				echo json_encode($result);
			}
		}
		
		
		public function deleteThumbnail() {
			$path = "./uploads/projects/thumbnails/" . $this->input->post('filename');
			$this->load->helper("file");
			delete_files($path);
			unlink($path);
		}
		
		
		
		
		
		public function upload_from_silo_sd() {
			
			$post_values=$this->input->post();
			
			$file_count=1;
			foreach($post_values as $files){
				
				//echo $files;
				$file_count++;
				
				
					$publisher_application_files_data['user_id']=$this->session->userdata('user_id');
					$publisher_application_files_data['application_id']=$this->session->userdata('publisher_application_id');;
					$publisher_application_files_data['file_path']=$files;
					
				$this->db->insert('tbl_publisher_application_files',$publisher_application_files_data);
				
			}
			
			
		}
		
		
		public function save_publish_application_all_info(){
			
			
			// echo "<pre>";
			// print_r($this->session->all_userdata());
			// $publisher_basic_info=$this->session->userdata('publisher_basic_info');
			// $tempp=$publisher_basic_info->new_added_stockholdersName;
			// print_r($tempp);
			
			
			
			// echo "<pre>";
			// print_r($this->session->all_userdata());
			
			
			
		}
		
		
		
	}
	
	
?>