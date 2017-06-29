<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	Class Dashboard extends MX_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			//echo '<pre>'; print_r($_SESSION); 	exit;
			/*$user_account=array();
				$user_account['username']='ranjit';
				$user_account['email']='ranjit@gmail.com';
				$user_account['user_id']='40';
				$user_account['role_id']=0;
				$user_account['purchase_pack']=2;
				$_SESSION['user_account']=$user_account;
			*/
			
			//echo '<pre>'; print_r($_SESSION); 
			//echo '<pre>'; print_r($this->session->userdata); exit;
			
			$this->load->helper('url');
			$this->load->helper('cookie');
			$this->load->model("common_model");
			$this->session = $this->session->userdata('user_account');
			
			// print_r($user_details);
			// die('ss');
			
			// echo $_SESSION['testt'];
			
			$this->sidebar = 'partials/hosting_sidebar';
			
			/* if ($this->session['purchase_pack'] == '1') {
				$this->sidebar = 'partials/marketplace_sidebar';
				} else if ($this->session['purchase_pack'] == '2') {
				$this->sidebar = 'partials/hosting_sidebar';
				} else {
				$this->sidebar = 'partials/both_sidebar';
			} */
			
			if (!$this->common_model->isLoggedIn())  {
				redirect(base_url());
			}
		}
		/*public function community()
			{
			$latest_news = $this->common_model->getRecords(TABLES::$NEWS, '*',array('latest'=>'1'));		
			$slider = $this->common_model->getRecords(TABLES::$COMMUNITY_SLIDER, '*');		
			$category = $this->common_model->getRecords(TABLES::$NEWS,'*',array('header'=>1),'',2);	
			$category_slider = $this->common_model->getRecords(TABLES::$NEWS,'*',array('category_slider'=>1),'',3);	
			$other = $this->common_model->getRecords(TABLES::$NEWS,'*',array('category'=>'','featured'=>'0','latest'=>'0','category_slider'=>'0','header'=>'0'));	
			$this->template->set('category_slider',$category_slider);
			$this->template->set('other',$other);
			$this->template->set('category',$category);
			$this->template->set('slider',$slider);
			$this->template->set('latest_news',$latest_news);
			$this->template->set('page','community');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_community')
			->title('Silo | Community')
			->set_partial('header','partials/header_community')                
			->set_partial('footer','partials/footer_community');
			$this->template->build('community');
		}*/
		public function admin_dashboard()
		{
			$this->template->set('page','dashboard');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('admin_silo')
			->title('Admin Dashboard | Silo')
			->set_partial('header','partials/admin_header')
			->set_partial('sidebar','partials/admin_sidebar')
			->set_partial('footer', 'partials/admin_footer');
			$this->template->build('admin_dashboard');
		}
		public function index()
		{
			
			$this->load->model("login_model");
			
			//$data['user'][0]['user_id']=31;
			// echo '<pre>';
			// print_r($this->session->userdata()); exit;
			
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			
			
				$this->load->library('google_url_api');
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			// create a shorten url start
			$url = backend_passport_url()."view/".$slug; 
			$this->google_url_api->enable_debug(FALSE);
			$short_url = $this->google_url_api->shorten($url);
			if(!empty($short_url->id))
			$shorten_url=$short_url->id; 
			else
			$shorten_url=$url; 
			
			
			
			$this->template->set('user_menu',$user_menu);
			$this->template->set('user',$user);
			$this->template->set('shorten_url',$shorten_url);
			$this->template->set('slug',$slug);
			$this->template->set('page','dashboard');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Admin Dashboard | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('dashboard');
		}
		
		
		public function edit_profile()
		{
			$this->load->library('google_url_api');
			$this->load->model("login_model");
			
			//$data['user'][0]['user_id']=31;
			// echo '<pre>';
			// print_r($this->session->userdata()); exit;
			
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			
			
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			
			
			// create a shorten url
			$url = backend_passport_url()."view/".$slug; 
			$this->google_url_api->enable_debug(FALSE);
			$short_url = $this->google_url_api->shorten($url);
			if(!empty($short_url->id))
			$shorten_url=$short_url->id; 
			else
			$shorten_url=$url; 
			
			// create a shorten url
			
			$this->template->set('user_menu',$user_menu);
			$this->template->set('shorten_url',$shorten_url);
			$this->template->set('slug',$slug);
			$this->template->set('user',$user);
			$this->template->set('page','dashboard');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Admin Dashboard | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('edit_profile');
		}
		
		/*
			* Load view for my subscribers
		*/
		
		public function mySubscribers()
		{
			
			$this->template->set('page', 'my_subscribers');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('My subscribers | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('my_subscribers');
		}
		
		/*
			* Load view for order history
		*/
		
		public function orderHistory()
		{
			
			$this->template->set('page', 'order_history');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Order history | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('order_history');
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
		public function sendmail()
		{
			
			$this->load->helper('utility_helper');
			$this->load->model('common_model');
			$this->load->helper(array('form', 'url', 'email'));
			$errors = array();
			$this->load->library('form_validation');
			$errorMsg = array();
			$err_num = 0;
			$error_array=array();
			$error_array['to']=''; 
			$error_array['from']=''; 
			
			$this->form_validation->set_rules('to', 'To', 'trim|required|valid_email');
			$this->form_validation->set_rules('fromid', 'From', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) 
			{
				$map ['status'] = 0;			
				$error_array['to']=form_error('to'); 
				$error_array['from']=form_error('fromid'); 					
				$map ['msg'] = $error_array;
				echo json_encode($map);
				exit;
				} else {
				
				$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'rpdigitel@gmail.com', // change it to yours
				'smtp_pass' => 'Rebelute@905', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
				);
				
				$message = "Hello, <br /> <br /> Please find below Link. <br /><br /> " . $this->input->post('shorten_url') . " ";
				$message .= "<br /><br /> Thanks & Regards,";
				$message .= "<br /> " . $this->input->post('fromid');
				
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from(trim('rpdigitel@gmail.com')); // change it to yours
				$this->email->to(trim($this->input->post('to'))); // change it to yours
				$this->email->subject('Welcome to RP Digital');
				$this->email->message($message);				
				
				if ($this->email->send()) {
					$map ['status'] = 1;
					$map ['msg'] = "Email Sent Successfully";
					} else {
					$map ['status'] = 0;
					$map ['msg'] = 'Email not Sent';
					//show_error($this->email->print_debugger());
				}
				echo json_encode($map);
				exit;
			}			
		}
		
		
		
		/*
			public function create_pdf(){
			
			$this->load->model('login_model');
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			$this->template->set('user_menu',$user_menu);
			
			$this->template->set('slug',$slug);
			$this->template->set('user',$user);
			$this->template->set('page','create_pdf');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Admin Product List | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('create_pdf');
			
			}
		*/
		
		
		public function orderTable(){
			
			$this->load->model('login_model');
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			
			$this->template->set('user_menu',$user_menu);
			
			$this->template->set('slug',$slug);
			$this->template->set('user',$user);
			$this->template->set('page','ordertable');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Admin Order Table | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('ordertable');
			
		}
		
		
		
		public function Calender(){
			
			$this->load->model('login_model');
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			
			$this->template->set('user_menu',$user_menu);
			
			$this->template->set('slug',$slug);
			$this->template->set('user',$user);
			$this->template->set('page','Calender');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Admin Calender | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('calender');
			
		}
		
		
		public function services(){
			
			$this->load->model('login_model');
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			
			
			
			//Added By ranjit on 21 June2017 Start
			
			$services_menu = $this->common_model->getRecords('services', '*', '', '');
			$user_subscribed_services= $this->common_model->getRecords('tbl_services_subscription', '*', array('user_id'=>$_SESSION['user_id']), '');
			
			$user_services_array=array();
			foreach($user_subscribed_services as $u_services){
				array_push($user_services_array,$u_services['service_id']);
			}
			
			$this->template->set('services_menu', $services_menu);
			$this->template->set('user_subscribed_services', $user_subscribed_services);
			$this->template->set('user_services_array', $user_services_array);
			
			//Added By ranjit on 21 June2017 End
			
			
			
			$this->template->set('user_menu',$user_menu);
			
			$this->template->set('slug',$slug);
			$this->template->set('user',$user);
			$this->template->set('page','services');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Admin services | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('services');
			
		}
		
		public function invoices(){
			
			$this->load->model('login_model');
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			
			$this->template->set('user_menu',$user_menu);
			
			$this->template->set('slug',$slug);
			$this->template->set('user',$user);
			$this->template->set('page','invoices');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Admin invoices | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('invoices');
			
		}
		
		public function addproduct(){
			
			$this->load->model('login_model');
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			
			$this->template->set('user_menu',$user_menu);
			
			$this->template->set('slug',$slug);
			$this->template->set('user',$user);
			$this->template->set('page','addproduct');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Admin addproduct | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('addproduct');
			
		}
		
		
		
		public function email_template(){
			
			$this->load->model('login_model');
			$user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
			$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			
			
			$this->template->set('user_menu',$user_menu);
			
			$this->template->set('slug',$slug);
			$this->template->set('user',$user);
			$this->template->set('page','email_template');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('backend_silo')
			->title('Admin email_template | Silo')
			->set_partial('header', 'partials/header')
			->set_partial('sidebar', $this->sidebar)
			->set_partial('footer', 'partials/footer');
			$this->template->build('email_template');
			
		}
		
		
		
		
		
	}				