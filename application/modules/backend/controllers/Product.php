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
			
			
			if (is_dir($dir)) {
			$silosd_files=getDirContents($dir);
                        }else{
                            $silosd_files=array();
                        }
			// echo "<pre>";
			// print_r($silosd_files);
			// die();
			// var_dump(getDirContents($dir));
			
			
			//********************************************************************************************************
			
			
			
			$application_id=$this->uri->segment(3);
			// die;
			if($application_id!=''){
				$basic_info_data = $this->common_model->getRecords(TABLES::$PUBLISHER_APPLICATION, '*', array('user_id'=>$this->session->userdata['user_id'],'id'=>$application_id),'');
				
				$busi_io_data = $this->common_model->getRecords(TABLES::$PUBLISHER_BUSI_IO, '*', array('user_id'=>$this->session->userdata['user_id'],'application_id'=>$application_id),'');
				
				$busi_foc_data = $this->common_model->getRecords(TABLES::$PUBLISHER_BUSI_FOC, '*', array('user_id'=>$this->session->userdata['user_id'],'application_id'=>$application_id),'');
				
				$busi_partnership_data = $this->common_model->getRecords(TABLES::$PUBLISHER_BUSI_PARTNERSHIP, '*', array('user_id'=>$this->session->userdata['user_id'],'application_id'=>$application_id),'');
				
				
				$busi_fol_data = $this->common_model->getRecords(TABLES::$PUBLISHER_BUSI_FOL, '*', array('user_id'=>$this->session->userdata['user_id'],'application_id'=>$application_id),'');
				
				$company_info_data = $this->common_model->getRecords(TABLES::$PUBLISHER_APPLICATION_COMPANY_INFO, '*', array('user_id'=>$this->session->userdata['user_id'],'application_id'=>$application_id),'');
				
				$uploaded_files_data = $this->common_model->getRecords(TABLES::$PUBLISHER_APPLICATION_FILES, '*', array('user_id'=>$this->session->userdata['user_id'],'application_id'=>$application_id),'');
				
				
				
				$managers_data = $this->common_model->getRecords(TABLES::$PUBLISHER_MANAGERS, '*', array('user_id'=>$this->session->userdata['user_id'],'application_id'=>$application_id),'');
				
				$members_data = $this->common_model->getRecords(TABLES::$PUBLISHER_MEMBERS, '*', array('user_id'=>$this->session->userdata['user_id'],'application_id'=>$application_id),'');
				
				$officers_data = $this->common_model->getRecords(TABLES::$PUBLISHER_OFFICERS, '*', array('user_id'=>$this->session->userdata['user_id'],'application_id'=>$application_id),'');
				
				$partners_data = $this->common_model->getRecords(TABLES::$PUBLISHER_PARTNERS, '*', array('user_id'=>$this->session->userdata['user_id'],'application_id'=>$application_id),'');
				
				$stockholders_data = $this->common_model->getRecords(TABLES::$PUBLISHER_STOCKHOLDERS, '*', array('user_id'=>$this->session->userdata['user_id'],'application_id'=>$application_id),'');
				
				}else{
				
				$basic_info_data=array();
				$busi_io_data=array();
				$busi_foc_data=array();
				$company_info_data=array();
				$uploaded_files_data=array();
				$busi_fol_data=array();
				$busi_partnership_data=array();
				$managers_data=array();
				$members_data=array();
				$officers_data=array();
				$partners_data=array();
				$stockholders_data=array();
				
			}
			// echo "<pre>";
			// print_r($officers_data);
			
			//************************************** Basic Information data Start *********************************************
			
			
			
			
			
			//************************************** Basic Information data End *********************************************
			
			
			
			$this->template->set('basic_info_data',$basic_info_data);
			$this->template->set('busi_io_data',$busi_io_data);
			$this->template->set('busi_foc_data',$busi_foc_data);
			$this->template->set('busi_partnership_data',$busi_partnership_data);
			$this->template->set('partners_data',$partners_data);
			$this->template->set('members_data',$members_data);
			$this->template->set('managers_data',$managers_data);
			$this->template->set('busi_fol_data',$busi_fol_data);
			$this->template->set('company_info_data',$company_info_data);
			$this->template->set('stockholders_data',$stockholders_data);
			$this->template->set('officers_data',$officers_data);
			$this->template->set('uploaded_files_data',$uploaded_files_data);
			
			
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
			$publisher_application_data['business_structure_cat']=$publisher_basic_info['businessStructureRadio'];
			
			if(isset($publisher_basic_info['publisher_application_id'])){
				
				$this->db->where(array('id'=>$publisher_basic_info['publisher_application_id']));
				$this->db->update('tbl_publisher_application',$publisher_application_data);
				
				$publisher_application_id=$publisher_basic_info['publisher_application_id'];
				
				
				}else{
				
				$this->db->insert('tbl_publisher_application',$publisher_application_data);
				
				$publisher_application_id=$this->db->insert_id();
			}
			$this->session->set_userdata('publisher_application_id',$publisher_application_id);
			
			//basic info Inserted
			
			
			//Stockholder
			$count_busi_stock=0;
			
			if(isset($post_values['foc_stock_stockholdersName'])){
				
				if(isset($publisher_basic_info['publisher_application_id'])){
					
					$this->db->where(array('application_id'=>$publisher_basic_info['publisher_application_id']));
					$this->db->delete('tbl_publisher_stockholders');
					
				}
				
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
				
				if(isset($publisher_basic_info['publisher_application_id'])){
					
					$this->db->where(array('application_id'=>$publisher_basic_info['publisher_application_id']));
					$this->db->delete('tbl_publisher_officers');
					
				}
				
				
				
				foreach($post_values['foc_officers_officerssName'] as $busi_structure){
					
					$officers_data['user_id']=$this->session->userdata('user_id');
					$officers_data['application_id']=$publisher_application_id;
					$officers_data['name']=$post_values['foc_officers_officerssName'][$count_busi_officers];
					$officers_data['address']=$post_values['foc_officers_homeAddressZipCode'][$count_busi_officers];
					$officers_data['office_held']=$post_values['foc_officers_officeHeld'][$count_busi_officers];
					
					$this->db->insert('tbl_publisher_officers',$officers_data);
					$count_busi_officers++;
					
				}
			}
			
			
			//PARTNERSHIP
			$count_busi_partnership=0;
			
			if(isset($post_values['foc_partners_Name'])){
				
				
				if(isset($publisher_basic_info['publisher_application_id'])){
					
					$this->db->where(array('application_id'=>$publisher_basic_info['publisher_application_id']));
					$this->db->delete('tbl_publisher_partners');
					
				}
				
				foreach($post_values['foc_partners_Name'] as $busi_structure){
					
					
					$partners_data['user_id']=$this->session->userdata('user_id');
					$partners_data['application_id']=$publisher_application_id;
					$partners_data['name']=$post_values['foc_partners_Name'][$count_busi_partnership];
					$partners_data['address']=$post_values['foc_partners_homeAddressZipCode'][$count_busi_partnership];
					$partners_data['tax_id']=$post_values['foc_partners_ssOrTaxId'][$count_busi_partnership];
					$partners_data['ownership_percentage']=$post_values['foc_partners_percentageOfOwnership'][$count_busi_partnership];
					
					
					$this->db->insert('tbl_publisher_partners',$partners_data);
					$count_busi_partnership++;
					
				}
			}
			
			
			//Members
			$count_busi_members=0;
			
			if(isset($post_values['foc_members_Name'])){
				
				if(isset($publisher_basic_info['publisher_application_id'])){
					
					$this->db->where(array('application_id'=>$publisher_basic_info['publisher_application_id']));
					$this->db->delete('tbl_publisher_members');
					
				}
				
				foreach($post_values['foc_members_Name'] as $busi_structure){
					
					
					$members_data['user_id']=$this->session->userdata('user_id');
					$members_data['application_id']=$publisher_application_id;
					$members_data['name']=$post_values['foc_members_Name'][$count_busi_members];
					$members_data['address']=$post_values['foc_members_homeAddressZipCode'][$count_busi_members];
					$members_data['tax_id']=$post_values['foc_members_ssOrTaxId'][$count_busi_members];
					$members_data['ownership_percentage']=$post_values['foc_members_percentageOfOwnership'][$count_busi_members];
					
					
					$this->db->insert('tbl_publisher_members',$members_data);
					$count_busi_members++;
					
				}
			}
			
			
			//Members
			$count_busi_managers=0;
			
			if(isset($post_values['foc_managers_Name'])){
				
				if(isset($publisher_basic_info['publisher_application_id'])){
					
					$this->db->where(array('application_id'=>$publisher_basic_info['publisher_application_id']));
					$this->db->delete('tbl_publisher_managers');
					
				}
				
				foreach($post_values['foc_managers_Name'] as $busi_structure){
					
					
					$managers_data['user_id']=$this->session->userdata('user_id');
					$managers_data['application_id']=$publisher_application_id;
					$managers_data['name']=$post_values['foc_managers_Name'][$count_busi_managers];
					$managers_data['address']=$post_values['foc_managers_homeAddressZipCode'][$count_busi_managers];
					$managers_data['tax_id']=$post_values['foc_managers_ssOrTaxId'][$count_busi_managers];
					$managers_data['have_authority']=$post_values['foc_managers_is_have_authority'][$count_busi_managers];
					
					
					$this->db->insert('tbl_publisher_managers',$managers_data);
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
			
			
			
			
			if(isset($publisher_company_info['c_publisher_application_id'])){
				
				$this->db->where(array('application_id'=>$publisher_company_info['c_publisher_application_id']));
				$this->db->update('tbl_publisher_application_company_info',$company_info);
				
				$publisher_application_id=$publisher_company_info['c_publisher_application_id'];
				
				
				}else{
				
				$this->db->insert('tbl_publisher_application_company_info',$company_info);
				
			}
			// $this->session->set_userdata('publisher_application_id',$publisher_application_id);
			
			
			
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
				
				// print_r($upload_result);
				
				$files_path="./uploads/silo_publisher_application/".$user_id."/".$config['file_name'];
				
				$publisher_application_files_data['user_id']=$this->session->userdata('user_id');
				$publisher_application_files_data['application_id']=$this->session->userdata('publisher_application_id');;
				$publisher_application_files_data['file_path']=$files_path;
				
				$this->db->insert('tbl_publisher_application_files',$publisher_application_files_data);
					$file_id=$this->db->insert_id();		
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
				
				
				$result=array('type'=>$ext,'file_name'=>$upload_result['file_name'],'raw_name'=>$upload_result['raw_name'],'file_id'=>$file_id);
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
		
		
		public function delete_publisher_file() {
			
			$post_values=$this->input->post();
			
			$file_id=$post_values['file_id'];
			
				$this->db->where(array('id'=>$file_id));
				$this->db->delete('tbl_publisher_application_files');
				
			
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
		
		
		
		
		
		
		public function productList(){
			
			$this->load->model('login_model');
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			
			$this->template->set('user_menu',$user_menu);
			
			$application_list = $this->common_model->getRecords(TABLES::$PUBLISHER_APPLICATION, '*', array('user_id'=>$_SESSION['user_id']),"id desc");
			
			
			$this->template->set('slug',$slug);
			$this->template->set('user',$user);
			$this->template->set('application_list',$application_list);
			$this->template->set('page','productlist');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Admin Product List | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('productlist');
			
		}
		
		
		
		
		
		
		
		
		
	}
	
	
?>