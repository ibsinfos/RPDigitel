<?php	
		
		
		
	defined('BASEPATH') OR exit('No direct script access allowed');	
		
		
		
	class Login extends MX_Controller {		
				
				
				
		function __construct() {			
						
			parent::__construct();			
						
			$this->load->helper('url');			
						
			$this->load->helper('cookie');			
						
			$this->load->model("common_model");			
						
			ini_set('memory_limit', '128M');			
						
						
		}		
				
				
				
		/**			
						
			* call Login Page			
						
		*/		
				
		public function index() {			
			if ($this->common_model->isLoggedIn()) {				
				redirect(base_url() . "dashboard");				
			}else{				redirect("../");						}			
						
			$this->template->set('page', 'login');			
						
			$this->template->set('page_type', 'main');			
						
						
			$this->template->set_theme('default_theme');			
						
			$this->template->set_layout('default')			
						
			->title('vCard | Login');			
						
			//->set_partial ( 'header', 'partials/header_home' )			
						
			//->set_partial ( 'footer', 'partials/footer' );			
						
			$this->template->build('login');			
						
		}		
				
				
				
		/**			
						
			* call Login Popup			
						
		*/		
				
		public function loginPopup() {			
						
			$this->template->set('page', 'loginpopup');			
						
			$this->template->set('page_type', 'main');			
						
			$this->template->set('userId', $this->session->userdata('fbuserid'));			
						
			$this->template->set_theme('default_theme');			
						
			$this->template->set_layout(false)			
						
			->title('vCard | LoginPopup');			
						
			$this->template->build('login');			
						
		}		
				
				
				
		/**			
						
			* chech for valid user(username or password)			
						
		*/		
				
		public function loginuser() {			
						
			$this->load->helper(array('form', 'url'));			
						
			$this->load->library('form_validation');			
						
			$data = array();			
						
			$map = array();			
									// $username = $this->input->post('username');						// $password = $this->input->post('password');									//Added by ranjit on 25 April 2017 to get $_SESSION['paasport_user_id'] Start						if(!isset($_SESSION)) {				session_start();			}							if(isset($_SESSION['email_address']) && isset($_SESSION['password'])){
								$username = $_SESSION['email_address'];				$password = $_SESSION['password'];				$this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email');				$encryptedpass=$password;								}else{								$username = $this->input->post('username');				$password = $this->input->post('password');								$this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email');								$this->form_validation->set_rules('password', 'Password', 'trim|required');				$encryptedpass=MD5($password);							}						// print_r($_SESSION);			// die(0);						//Added by ranjit on 25 April 2017 to get $_SESSION['paasport_user_id'] end			
						
			$this->load->model('Login_model');			
						/*
				if ($this->form_validation->run() == FALSE) {				
								
								
								
				$msg = validation_errors();				
				
				} else {			*/			
															/********************** Added by ranjit on 28 April 2017 to update default data in tbl_users table start [dicussed with atul sir] **********************/												$user_details_init = $this->Login_model->getUserDetailByEmail($username);						if ($user_details_init[0]['slug'] == NULL) {								$default_data = $this->common_model->getRecords('tbl_default_contents', '*');												$user_default_data['company_name'] = $default_data[0]['company_name'];                $user_default_data['job_title'] = $default_data[0]['job_title'];                $user_default_data['work_phone'] = $default_data[0]['work_phone'];                $user_default_data['why_choose_desc'] = $default_data[0]['why_choose_desc'];                $user_default_data['business_opportunity_video'] = $default_data[0]['business_opportunity_video'];                $user_default_data['why_choose_video'] = $default_data[0]['why_choose_video'];                $user_default_data['why_choose_image'] = $default_data[0]['why_choose_image'];                $user_default_data['work_website'] = $default_data[0]['work_website'];                $user_default_data['user_image'] = $default_data[0]['user_image'];                $user_default_data['company_logo'] = $default_data[0]['company_logo'];                $user_default_data['product_page_url'] = $default_data[0]['product_page_url'];                $user_default_data['youtube_link'] = "https://youtube.com";                $user_default_data['instagram_link'] = "https://instagram.com";                $user_default_data['facebook_link'] = "https://facebook.com";                $user_default_data['twitter_link'] = "https://twitter.com";                $user_default_data['linkedin_link'] = "https://linkedin.com";				                $user_default_data['increase_your_credit_desc'] = $default_data[0]['increase_your_credit_desc'];												$update_tbl_users=$this->common_model->updateRow(TABLES::$ADMIN_USER,$user_default_data, array("id" => $user_details_init[0]['id']));																																 if ($update_tbl_users) {                    foreach (unserialize($default_data[0]['tabs']) as $tab) {                        //echo $tab;                        $data1 = array(						'tab_name' => $tab,                            'user_id' => $user_details_init[0]['id']                        );                        $this->db->insert(TABLES::$VCARD_TABS, $data1);                    }                    $bs['strat_name'] = 'Minimize taxes strategy';                    $bs['description'] = 'Our First Strategy, Minimizing Taxes is essential because Americans lose about 1/3 of                     their income to taxes. We help our Associates minimize their taxes by two methods.Watch Video                     The first method, Correct Tax Withholding is important because 80% of all employees have too much money                     withheld from their paycheck for taxes. When too much money is withheld, the employee is unable to use that                    money. We help our Associates maximize take home pay and use it for investing or debt elimination.                     The strategy is amazing, because if an employee increases his take home pay by $500 monthly and                     invest it at 8% Rate of Return, he will have almost $175,000 in 15 years and over $745,000 in 30 years.';                    $bs['video'] = base_url() . "uploads/business_strategy_videos/default_busi_strat_video.mp4";                    $bs['user_id'] = $user_details_init[0]['id'];                    $this->common_model->insertRow($bs, TABLES::$BUSINESS_STRAT);				}																							}									/********************** Added by ranjit on 28 April 2017 to update default data in tbl_users table end **********************/																		
            $user_details = $this->Login_model->getUserDetailByEmail($username);			
						
            if (count($user_details) > 0) {				
								
                if ($encryptedpass === $user_details[0]['password']) {					
										
										
										
                    if ($user_details[0]['verified'] == 1 && $user_details[0]['email_verify'] == 1) {						
												
                        $user = array();						
												
                        $user['first_name'] = $user_details[0]['first_name'];						
												
                        $user['last_name'] = $user_details[0]['last_name'];						
												
                        $user['email'] = $user_details[0]['email'];						
												
                        $user['mobile'] = $user_details[0]['mobile'];						
												
                        $user['user_id'] = $user_details[0]['id'];						
												
                        $user['role_id'] = $user_details[0]['role_id'];						
												
                        $user['slug'] = $user_details[0]['slug'];																		//added by ranjit to store qr code image and ext in session						// $user['qr_code_image'] = $user_details[0]['qr_code_image'];                        // $user['qr_code_image_ext'] = $user_details[0]['qr_code_image_ext'];						
																														/********************** Added by ranjit on 28 April 2017 to Generate vcard and qr code start [dicussed with atul sir]**********************/												if ($user_details[0]['slug'] == NULL) {														//create slug collumn in tbl-users table start														$config = array(							'field' => 'slug',							'slug' => 'slug',							'table' => TABLES::$ADMIN_USER,							'id' => 'id',							);																					$this->load->library('slug', $config);																					$data_slug = array(							'slug' => $user_details[0]['first_name'] . " " . $user_details[0]['last_name'],							);														$slug = $this->slug->create_uri($data_slug);														$user['slug']=$slug;																					//create slug collumn in tbl-users table end														//Generate qr code start														$this->load->library('Ciqrcode');														$params['data'] = base_url().$slug;							$params['level'] = 'H';							$params['size'] = 5;							$params['savename'] = FCPATH.'vcard_qrcode_file/vcard_qrcode.png';														$this->ciqrcode->generate($params);														//Generate qr code end																												//To update slug,qr code and ext start														$content=file_get_contents(base_url()."vcard_qrcode_file/vcard_qrcode.png");							//$content=mysql_escape_string($content);							$qr_code_image=$content;																						// $user['qr_code_image'] = $qr_code_image;														@list(, , $imtype, ) = getimagesize(base_url()."vcard_qrcode_file/vcard_qrcode.png");														if ($imtype == 3){								$ext="png"; 								}elseif ($imtype == 2){								$ext="jpeg";								}elseif ($imtype == 1){								$ext="gif";								}else{								$ext="png";							}														// $user['qr_code_image_ext'] = $ext;																					$this->common_model->updateRow(TABLES::$ADMIN_USER, array("slug" => $slug,"qr_code_image" => $qr_code_image,"qr_code_image_ext" => $ext), array("id" => $user['user_id']));														//To update slug,qr code and ext end																				}												/********************** Added by ranjit on 28 April 2017 to Generate vcard and qr code end **********************/																								                        $this->session->set_userdata('user_account', $user);																		
                        if ($user_details[0]['vcard_complete_status'] == 1) {							
														
                            redirect(base_url() . "dashboard");							
														
							} else {							
                            //redirect(base_url() . "vcard");							                            //Added by ranjit on 25 April 2017 to redict to dashboard [bcoz create vcard option added on dashboard]                            redirect(base_url() . "dashboard");							
														
						}						
												
						} else if ($user_details[0]['email_verify'] == 0 && $user_details[0]['verified'] == 0) {						
												
												
												
                        $msg = "You did not verified your email. Please verify to continue.";						
												
						} else if ($user_details[0]['email_verify'] == 1 && $user_details[0]['verified'] == 0) {						
												
                        $msg = "Your account has been blocked. Please contact administrator.";						
												
					}					
										
					} else {					
										
										
										
                    $msg = "Password is wrong.";					
										
				}				
								
				} else {				
								
                $msg = "Email or password is wrong.";				
								
			}			
						
			//}			
						
			$this->template->set('page', 'loginpopup');			
						
			$this->template->set('page_type', 'main');			
						
			$this->template->set('userId', $this->session->userdata('fbuserid'));			
						
			$this->template->set_theme('default_theme');			
						
			$this->template->set('msg', $msg);			
						
			$this->template->set_layout(false)			
						
			->title('vCard | Login');			
						
			$this->template->build('login');			
						
		}		
				
				
				
		/**			
						
			* Code For Logout Functionality			
						
		*/		
				
		public function logout() {			
						
			$userid = $this->session->userdata('user_account');			
						
			$userdata = array();			
						
			$userdata['id'] = $userid['user_id'];			
						
			$userdata['last_visit_date'] = date('Y-m-d H:i:s');			
						
			$this->common_model->updateRow(TABLES::$ADMIN_USER, array("last_visit_date" => $userdata['last_visit_date']), array("id" => $userdata['id']));			
						
			$this->session->unset_userdata('user_account');			
						
			//   redirect(base_url()."login");			// redirect('http://'.$_SERVER['SERVER_NAME'].'/login/logout');			redirect('../login/logout');			
						
		}		
				
				
				
		/**			
						
			* code for accept trems and condition			
						
		*/		
				
		public function acceptTermsCondition() {			
						
			$params = array();			
						
			$userdata = $this->input->post('data');			
						
			unset($userdata['result']['terms_accepted']);			
						
			$userdata['result']['terms_accepted'] = 1;			
						
			$params['terms_accepted'] = 1;			
						
			$params['id'] = $userdata['result']['id'];			
						
			$this->load->library('fb/userLib');			
						
			$boolvalue = $this->userlib->updateUserById($params);			
						
			if ($boolvalue == 1) {				
								
				$this->session->set_userdata('fbuser', $userdata['result']);				
								
				$this->session->set_userdata('fbuserid', $userdata['result']['id']);				
								
				$this->session->set_userdata('fbuserpermissions', $userdata['result']['permissions']);				
								
			}			
						
		}		
				
				
				
		/**			
						
			* code for call signup form			
						
		*/		
				
		public function registration() {			
			if ($this->common_model->isLoggedIn()) {				
				redirect(base_url() . "dashboard");				
			}			
						
			$plan_data = $this->common_model->getRecords(TABLES::$MST_PLANS, '*', array('plan_name' => 'vcard_plan'));			
						
			$this->template->set('plan_data', $plan_data);			
						
			$this->template->set('page', 'registration');			
						
			$this->template->set('page_type', 'main');			
						
			$this->template->set('page_type', 'main');			
						
			$this->template->set_theme('default_theme');			
						
			$this->template->set_layout('default')			
						
			->title('vCard | Sign up');			
						
			$this->template->build('signup');			
						
		}		
				
				
				
		/**			
						
			* code for save data of business			
						
		*/		
				
		public function saveUserInfo() {			
						
			$this->load->helper('utility_helper');			
						
			$this->load->helper('email');			
						
			$this->load->model('common_model');			
						
			$this->load->helper(array(			
						
            'form',			
						
            'url',			
						
            'html'			
						
			));			
						
			$errors = array();			
						
			$this->load->library('form_validation');			
						
			$errorMsg = array();			
						
			$err_num = 0;			
						
						
						
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|numeric');			
						
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');			
						
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');			
						
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_users.email]');			
						
			$this->form_validation->set_message('is_unique', 'The %s is already registered');			
						
						
						
			if ($this->form_validation->run() == FALSE) {				
								
				$map ['status'] = 0;				
								
				$map ['msg'] = validation_errors();				
								
				echo json_encode($map);				
								
				exit;				
								
				} else {				
								
				$map = array();				
								
				$user = array();				
								
				$user['first_name'] = $this->input->post('first_name');				
								
				$user['last_name'] = $this->input->post('last_name');				
								
				$user['email'] = $this->input->post('email');				
								
				$user['mobile'] = $this->input->post('mobile');				
								
				$user['source'] = $this->input->post('source');				
								
				$user['reffered_by'] = $this->input->post('reffered_by');				
								
				$user['plan_id'] = $this->input->post('plan_id');				
								
								
								
				$config = array(				
								
                'field' => 'slug',				
								
                'slug' => 'slug',				
								
                'table' => TABLES::$ADMIN_USER,				
								
                'id' => 'id',				
								
				);				
								
				$this->load->library('slug', $config);				
								
				$data_slug = array(				
								
                'slug' => $user['first_name'] . " " . $user['last_name'],				
								
				);				
								
				$slug = $this->slug->create_uri($data_slug);				
								
				$user['slug'] = $slug;				
								
								
								
				$this->load->model('Login_model');				
								
				$pass = rand(00000, 99999);				
								
				$user['password'] = MD5($pass);				
								
				$user['created_time'] = date('Y-m-d H:i:s');				
								
								
								
								
								
				/* Default data save */				
								
								
								
				$user['company_name'] = 'Novae vCard';				
								
				$user['job_title'] = 'Executive Vice President';				
								
				$user['work_phone'] = '(678) 521-3376';				
								
				$user['why_choose_desc'] = 'Why Choose Novae vCard?';				
								
				$user['business_opportunity_video'] = base_url() . "uploads/business_opportunity_video/default_business_opportunity.mp4";				
								
				$user['why_choose_video'] = base_url() . "uploads/why_choose_videos/default_why_choose_video.mp4";				
								
				$user['work_website'] = 'http://novaevcard.com';				
								
				$user['user_image'] = base_url() . "uploads/users/default_user.png";				
								
				$user['company_logo'] = base_url() . "uploads/logos/default_company_logo.png";				
								
				$user['product_page_url'] = "http://backontrack.myecon.net/products/";				
								
				$user['youtube_link'] = "https://youtube.com";				
								
				$user['instagram_link'] = "https://instagram.com";				
								
				$user['facebook_link'] = "https://facebook.com";				
								
				$user['twitter_link'] = "https://twitter.com";				
								
				$user['linkedin_link'] = "https://linkedin.com";				
								
								
								
				$user['increase_your_credit_desc'] = 'Like what you saw so far? Want to know more about our products/services or business opportunity? Take the first step by filling out your contact information below. We will contact you promptly with more details and answer all your questions.';				
								
								
								
								
								
								
								
				$uid = $this->Login_model->addUser($user);				
								
				if ($uid) {					
										
					$userdata = $this->common_model->getRecords(TABLES::$ADMIN_USER, 'id,first_name,last_name,mobile,email,plan_id', array('id' => $uid));					
										
					$data1 = array(					
										
                    array(					
										
					'tab_name' => 'WHY CHOOSE Novae vCard?',					
										
					'user_id' => $uid					
										
                    ),					
										
                    array(					
										
					'tab_name' => 'Powerful Strategies',					
										
					'user_id' => $uid					
										
                    ),					
										
                    array(					
										
					'tab_name' => 'Our Products / Services',					
										
					'user_id' => $uid					
										
                    ),					
										
                    array(					
										
					'tab_name' => 'Novae vCard Opportunity',					
										
					'user_id' => $uid					
										
                    ),					
										
                    array(					
										
					'tab_name' => 'Take the first step',					
										
					'user_id' => $uid					
										
                    ),					
										
                    array(					
										
					'tab_name' => 'Contact me today',					
										
					'user_id' => $uid					
										
                    ),					
										
					);					
										
										
										
					$this->db->insert_batch(TABLES::$VCARD_TABS, $data1);					
										
										
										
					$bs['strat_name'] = 'Minimize taxes strategy';					
										
					$bs['description'] = 'Our First Strategy, Minimizing Taxes is essential because Americans lose about 1/3 of 					
										
                    their income to taxes. We help our Associates minimize their taxes by two methods.Watch Video 					
										
                    The first method, Correct Tax Withholding is important because 80% of all employees have too much money 					
										
                    withheld from their paycheck for taxes. When too much money is withheld, the employee is unable to use that					
										
                    money. We help our Associates maximize take home pay and use it for investing or debt elimination. 					
										
                    The strategy is amazing, because if an employee increases his take home pay by $500 monthly and 					
										
                    invest it at 8% Rate of Return, he will have almost $175,000 in 15 years and over $745,000 in 30 years.';					
										
					$bs['video'] = base_url() . "uploads/business_strategy_videos/default_busi_strat_video.mp4";					
										
					$bs['user_id'] = $uid;					
										
										
										
					$this->common_model->insertRow($bs, TABLES::$BUSINESS_STRAT);					
										
					$this->session->set_userdata('user_account', array(					
										
                    'user_id' => $userdata[0]['id'],					
										
                    'first_name' => $userdata[0]['first_name'],					
										
                    'last_name' => $userdata[0]['last_name'],					
										
                    'mobile' => $userdata[0]['mobile'],					
										
                    'email' => $userdata[0]['email'],					
										
                    'pass' => $pass,					
										
                    'plan_id' => $userdata[0]['plan_id'],					
										
					));					
										
					$map ['status'] = 1;					
										
					$map ['msg'] = "Success. Redirecting to payment page...";					
										
					echo json_encode($map);					
										
					exit;					
										
				}				
								
			}			
						
		}		
				
				
				
		public function emailVerify($userid) {			
						
			$this->load->model("common_model");			
						
			$salt = "abcdldkfldfknsdfkl123456789";			
						
			$decrypted_id_raw = base64_decode($this->uri->segment(2));			
						
			$decrypted_id = preg_replace(sprintf('/%s/', $salt), '', $decrypted_id_raw);			
						
						
						
			$verify = $this->common_model->updateRow(TABLES::$ADMIN_USER, array("email_verify" => 1, "verified" => 1), array("id" => $decrypted_id));			
						
						
						
			$msg = "Your account is activated. Now you can login";			
						
						
						
			$this->session->set_flashdata('msg', $msg);			
						
			redirect(base_url() . "login");			
						
			exit;			
						
		}		
				
				
				
		public function otpVerify($userid) {			
						
			$this->template->set('page', 'otpverify');			
						
			$this->template->set_theme('default_theme');			
						
			$this->template->set('userid', $userid);			
						
			$this->template->set_layout('default')			
						
			->title('vCard | Otpverification')			
						
			->set_partial('header', 'partials/header_home')			
						
			->set_partial('footer', 'partials/footer');			
						
			$this->template->build('otpverification');			
						
		}		
				
				
				
		public function checkOtp() {			
						
			$map = array();			
						
			$otpverification = array(			
						
            'id' => $this->input->post('userid'),			
						
            'otp' => $this->input->post('otp'),			
						
			);			
						
			$this->load->library('fb/userLib');			
						
			if ($this->userlib->isOTPValid($this->input->post('userid'), $this->input->post('otp'))) {				
								
				$this->userlib->updateUserByOtp($otpverification);				
								
				$map['status'] = 1;				
								
				$map['message'] = "OTP verified successfully.";				
								
				} else {				
								
				$map['status'] = 0;				
								
				$map['message'] = "Invalid OTP.";				
								
			}			
						
			echo json_encode($map);			
						
		}		
				
				
				
		/**			
						
			* Function for load change password form			
						
		*/		
				
		public function changePassword() {			
						
						
			$this->template->set('page', 'changepassword');			
						
			$this->template->set_theme('default_theme');			
						
			$this->template->set_layout('default')			
						
			->title('vCard | ChangePassword')			
						
			->set_partial('header', 'partials/header')			
						
			->set_partial('footer', 'partials/footer');			
						
			$this->template->build('profile/changepassword');			
						
		}		
				
				
				
		/**			
						
			* Function for load forget password form			
						
		*/		
				
		public function forgetPassword() {			
			if ($this->common_model->isLoggedIn()) {				
				redirect(base_url() . "dashboard");				
			}			
						
			$this->load->helper(array('form', 'url'));			
						
			$this->load->library('form_validation');			
						
			if ($this->input->post('submit')) {				
								
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');				
								
				if ($this->form_validation->run() == FALSE) {					
										
					$msg = validation_errors();					
										
					$this->session->set_flashdata('err', $msg);					
										
					redirect(base_url() . "forget-password");					
										
					exit;					
										
					} else {					
										
					/* getting admin details if exist from email */					
										
					$arr_admin_detail = $this->common_model->getRecords(TABLES::$ADMIN_USER, '', array("email" => $this->input->post('email'), "email_verify" => '1'));					
										
										
										
					if (count($arr_admin_detail) > 0) {						
												
						$data['global'] = $this->common_model->getGlobalSettings();						
												
						/* sending admin credentail on admin account mail on user email */						
												
						$pass = rand(00000, 99999);						
												
						/* setting reserved_words for email content */						
												
						$reserved_words = array(						
												
                        "||FIRST_NAME||" => $arr_admin_detail[0]['first_name'],						
												
                        "||LAST_NAME||" => $arr_admin_detail[0]['last_name'],						
												
                        "||USER_NAME||" => $arr_admin_detail[0]['email'],						
												
                        "||USER_PASSWORD||" => $pass,						
												
                        "||USER_EMAIL||" => $arr_admin_detail[0]['email'],						
												
                        "||SITE_TITLE||" => $data['global']['site_title']						
												
						);						
												
												
												
						/* getting mail subect and mail message using email template title and lang_id and reserved works */						
												
						$email_content = $this->common_model->getEmailTemplateInfo('user-forgot-password', $reserved_words);						
												
						/* sending admin user mail for forgot password */						
												
						/* 1.recipient array. 2.From array containing email and name, 3.Mail subject 4.Mail Body */					
										
					$mail = $this->common_model->sendEmail($this->input->post('email'), array("email" => $data['global']['site_email'], "name" => $data['global']['site_title']), $email_content['subject'], $email_content['content']);					
										
					if ($mail) {					
										
					$this->common_model->updateRow(TABLES::$ADMIN_USER, array("password" => md5($pass)), array("email" => $this->input->post('email')));					
										
					$this->session->set_flashdata('msg', 'Your login details has been sent successfully.');					
										
					redirect(base_url() . "login");					
										
					exit;					
										
					} else {					
										
					$this->session->set_flashdata('err', 'Error occurred during sending mail, please try latter.');					
										
					redirect(base_url() . "forgot-password");					
										
					exit;					
										
					}					
										
					} else {					
										
					$this->session->set_flashdata('err', 'Your email is not registered with us.');					
										
					redirect(base_url() . "forget-password");					
										
					exit;					
										
					}					
										
					}					
										
					}					
										
					$this->template->set('page_type', 'inner');					
										
					$this->template->set('page', 'forgetpassword');					
										
					$this->template->set_theme('default_theme');					
										
					$this->template->set_layout('default')					
										
					->title('vCard | Forget Password');					
										
					$this->template->build('forget_password');					
										
					}					
										
										
										
					/**					
										
					* 					
										
					*/					
										
					public function editPassword() {					
										
					$user_id = $this->session->userdata('fbuserid');					
										
					$param = $this->input->post('data');					
										
					$newpassword = $param['text_password'];					
										
					$password = MD5($newpassword);					
										
					$param['password'] = $password;					
										
					$this->load->library('fb/auth');					
										
					$response = $this->auth->checkPassword($param);					
										
					$map = array();					
										
					if ($response['status'] == 1) {					
										
					$param['id'] = $user_id;					
										
					$boolvalue = $this->auth->editPassword($param);					
										
					if ($boolvalue == 1) {					
										
					$map['status'] = 1;					
										
					$map['msg'] = "Password updated successfully";					
										
					} else {					
										
					$map['status'] = 0;					
										
					$map['msg'] = "Failed to change password";					
										
					}					
										
					} else {					
										
					$map = $response;					
										
					}					
										
					echo json_encode($map);					
										
					}					
										
										
										
					public function checkUserEmailAndMobile() {					
										
					$email = $this->input->get("email");					
										
					$mobile = $this->input->get("mobile");					
										
					$this->load->library('fb/userLib');					
										
					$result = $this->userlib->checkUserEmailAndMobile($email, $mobile);					
										
					echo json_encode($result);					
										
					}					
										
										
										
					public function emailExist() {					
										
					$this->load->model('common_model');					
										
					$email = $this->common_model->getRecords(TABLES::$ADMIN_USER, 'id', array('email' => $_POST['email']));					
										
					if (count($email) > 0) {					
										
					return false;					
										
					} else {					
										
					return true;					
										
					}					
										
					}					
										
										
										
					}					
										
										
										
					?>					