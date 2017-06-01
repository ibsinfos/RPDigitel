<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model("common_model");
        ini_set('memory_limit', '360M');
        
    }

    public function index() {
	
			// print_r($_SESSION['user_account']['user_id']);
			
			 //echo '<pre>'; print_r(); exit;
	
		if(!isset($_SESSION)) {
			session_start();
		}
		
			
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
		
		
		
		$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS,'*',array('user_id'=>$_SESSION['paasport_user_id']),'id ASC ',1);
      
		if(!empty($_SESSION['paasport_user_id'])) 
		{
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			$this->template->set('slug',$slug);
        }
	  
	   $this->template->set('user',$user);
		$this->template->set('page', 'dashboard');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | Dashboard')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('dashboard');
    }

    /**
     * code for call signup form
     */
    public function createVcard() {
        $session_data = $this->session->userdata();
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
        $userdata = $this->common_model->getRecords(TABLES::$ADMIN_USER, '*', array('id' => $session_data['user_account']['user_id']));
        if($userdata[0]['vcard_complete_status'] == '1'){
            redirect(base_url()."vcard-edit");
        }
        $this->load->model("Location_model");
        
        $result['list'] = $this->Location_model->getCountry();
        
        $tabs = $this->common_model->getRecords(TABLES::$VCARD_TABS, '*', array('user_id' => $session_data['user_account']['user_id']));
        $custom_tabs = $this->common_model->getRecords(TABLES::$VCARD_CUSTOM_TABS, '*', array('user_id' => $session_data['user_account']['user_id']));
        $this->template->set('tabs', $tabs);
        $this->template->set('custom_tabs', $custom_tabs);
        $this->template->set('user_data', $userdata);
        $this->template->set('page', 'vcard-steps');
        $this->template->set('country', $result['list']);
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | Home')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('vcard_steps');
    }

    /**
     * code for call vcaed edit page
     */
    public function editVcard() {
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
        $this->load->model("Location_model");
        $session_data = $this->session->userdata();
        $result['list'] = $this->Location_model->getCountry();
        $userdata = $this->common_model->getRecords(TABLES::$ADMIN_USER, '*', array('id' => $session_data['user_account']['user_id']));
        $business_strat = $this->common_model->getRecords(TABLES::$BUSINESS_STRAT, '*', array('user_id' => $session_data['user_account']['user_id']));
        $tabs = $this->common_model->getRecords(TABLES::$VCARD_TABS, '*', array('user_id' => $session_data['user_account']['user_id']));
        $custom_tabs = $this->common_model->getRecords(TABLES::$VCARD_CUSTOM_TABS, '*', array('user_id' => $session_data['user_account']['user_id']));
        $this->template->set('tabs', $tabs);
        $this->template->set('custom_tabs', $custom_tabs);
        $this->template->set('user_data', $userdata);
        $this->template->set('business_strat', $business_strat);
        $this->template->set('page', 'vcard-edit');
        $this->template->set('country', $result['list']);
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | Update vCard')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('edit_vcard');
    }
	
	
	//Added by Ranjit on 26 april 2017 to add menu Manage vcard in inner header Start
	
	public function manageVcard() {
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
		$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS,'*',array('user_id'=>$_SESSION['paasport_user_id']),'id ASC ',1);
      
		if(!empty($_SESSION['paasport_user_id'])) 
		{
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			$this->template->set('slug',$slug);
        }
		
	  
	    $this->template->set('user',$user);
		$this->template->set('page', 'vcard-manage');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | Manage Paasport')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('manage_vcard');
		
    }

	
	//Added by Ranjit on 26 april 2017 to add menu Manage vcard in inner header Start
	
	
	
	
    public function updatevCard() {
        if (!$this->common_model->isLoggedIn()) {
           $map ['status'] = 0;
            $map ['msg'] = "Your session has been time out. Please login to continue.";
            echo json_encode($map);
            exit();
        }
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        
        $birthdate = date("Y-m-d",strtotime($this->input->post('birthday')));
        if($birthdate > date('Y-m-d', strtotime('-10 years'))){
             $map ['status'] = 0;
            $map ['msg'] = "Please check birth date. User should be atleast 10 year old.";
            echo json_encode($map);
            exit();
        }
        
        $anniversary = date("Y-m-d",strtotime($this->input->post('anniversary')));
        if($anniversary > date('Y-m-d')){
             $map ['status'] = 0;
            $map ['msg'] = "Anniversary date can not be greater than today's date";
            echo json_encode($map);
            exit();
        }
        
        $session_data = $this->session->userdata();
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
        $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('job_title', 'Job Title', 'trim|required');
        $this->form_validation->set_rules('company_phone', 'Company Phone', 'trim|required');
        $this->form_validation->set_rules('company_website', 'Company Website', 'trim|required');

        $this->form_validation->set_rules('personal_title', 'Personal Title', 'trim|required');
        $this->form_validation->set_rules('home_phone', 'Home Phone', 'trim|required');

        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('instagram_link', 'Instagram Link', 'trim|required');
        $this->form_validation->set_rules('theme_color', 'Theme Color', 'trim|required');
        $this->form_validation->set_rules('increase_your_credit_desc', 'Increase your credit description', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
            exit();
        } else {
            $map = array();
            $user = array();
            $user['first_name'] = $this->input->post('first_name');
            $user['last_name'] = $this->input->post('last_name');
            $user['mobile'] = $this->input->post('mobile');
            $user['email'] = $this->input->post('email');

            $user['company_name'] = $this->input->post('company_name');
            $user['job_title'] = $this->input->post('job_title');
            $user['work_phone'] = $this->input->post('company_phone');
            $user['work_website'] = $this->input->post('company_website');
            $user['work_address'] = $this->input->post('work_address');
            $user['work_city'] = $this->input->post('work_city');
            $user['work_state'] = $this->input->post('work_state');
            $user['work_country'] = $this->input->post('work_country');
            $user['work_postal_code'] = $this->input->post('work_postal_code');

            $user['home_address'] = $this->input->post('home_address');
            $user['home_city'] = $this->input->post('home_city');
            $user['home_state'] = $this->input->post('home_state');
            $user['home_country'] = $this->input->post('home_country');
            $user['home_postal_code'] = $this->input->post('home_postal_code');
            $user['home_phone'] = $this->input->post('home_phone');
            $user['personal_title'] = $this->input->post('personal_title');
            $user['nick_name'] = $this->input->post('nick_name');

            $user['gender'] = $this->input->post('gender');
            $user['birthday'] = $this->input->post('birthday');
            $user['anniversary'] = $this->input->post('anniversary');
            $user['notes'] = $this->input->post('notes');
            $user['why_choose_desc'] = $this->input->post('why_choose_desc');
            $user['product_page_url'] = $this->input->post('product_page_url');

            $user['youtube_link'] = $this->input->post('youtube_link');
            $user['instagram_link'] = $this->input->post('instagram_link');
            $user['facebook_link'] = $this->input->post('facebook_link');
            $user['twitter_link'] = $this->input->post('twitter_link');
            $user['linkedin_link'] = $this->input->post('linkedin_link');
            $user['theme_color'] = $this->input->post('theme_color');
            $user['increase_your_credit_desc'] = $this->input->post('increase_your_credit_desc');

            $this->load->model('Login_model');

            if (isset($_FILES['user_image']) && !empty($_FILES['user_image']['name'])) {
                $config = array();
                $config['upload_path'] = './uploads/users/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = FALSE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('user_image')) {
                    $error = $this->upload->display_errors();
                    $map ['status'] = 0;
                    $map ['msg'] = "User Image upload error - " . $error;
                    echo json_encode($map);
                    exit;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                $user['user_image'] = base_url() . "uploads/users/" . $data['upload_data']['file_name'];
            } else {
                $user['user_image'] = $this->input->post('user_image_old');
            }
            if (isset($_FILES['company_logo']) && !empty($_FILES['company_logo']['name'])) {
                $config1 = array();
                $config1['upload_path'] = './uploads/logos/';
                $config1['allowed_types'] = 'gif|jpg|png|jpeg';
                $config1['max_size'] = 1024;
                $config1['max_width'] = 1024;
                $config1['max_height'] = 768;
                $config1['remove_spaces'] = TRUE;
                $config1['encrypt_name'] = TRUE;
                $config1['overwrite'] = FALSE;

                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                if (!$this->upload->do_upload('company_logo')) {
                    $error1 = $this->upload->display_errors();
                    $map1 ['status'] = 0;
                    $map1 ['msg'] = "Company logo upload error - " . $error1;
                    echo json_encode($map1);
                    exit;
                } else {
                    $data1 = array('upload_data' => $this->upload->data());
                }
                $user['company_logo'] = base_url() . "uploads/logos/" . $data1['upload_data']['file_name'];
            } else {
                $user['company_logo'] = $this->input->post('company_logo_old');
            }

            if (!empty($_FILES['why_choose_image']['name']) && isset($_FILES['why_choose_image'])) {
                $config = array();
                $config['upload_path'] = './uploads/why_choose_images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 1024;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = FALSE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('why_choose_image')) {
                    $error = $this->upload->display_errors();
                    $map ['status'] = 0;
                    $map ['msg'] = "Why choose image error - " . $error1;
                    echo json_encode($map);
                    exit;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                $user['why_choose_image'] = base_url() . "uploads/why_choose_images/" . $data['upload_data']['file_name'];
            } else {
                $user['why_choose_image'] = $this->input->post('why_choose_image_old');
            }
            if (isset($_FILES['why_choose_video']['name']) && !empty($_FILES['why_choose_video']['name'])) {
                $config1 = array();
                $config1['upload_path'] = './uploads/why_choose_videos/';
                $config1['allowed_types'] = 'mp4|mpeg|avi|3gp';
                $config1['max_size'] = 20971520;
                $config1['remove_spaces'] = TRUE;
                $config1['encrypt_name'] = TRUE;
                $config1['overwrite'] = FALSE;


                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                if (!$this->upload->do_upload('why_choose_video')) {
                    $error1 = $this->upload->display_errors();
                    $map1 ['status'] = 0;
                    $map1 ['msg'] = "Why choose video error - " . $error1;
                    echo json_encode($map1);
                    exit;
                } else {
                    $data1 = array('upload_data' => $this->upload->data());
                }
                $user['why_choose_video'] = base_url() . "uploads/why_choose_videos/" . $data1['upload_data']['file_name'];
            } elseif ($this->input->post('why_choose_video_url') != '') {
                if (strpos($this->input->post('why_choose_video_url'), 'embed') == false && strpos($this->input->post('why_choose_video_url'), 'youtu.be') == true) {
                    $map ['status'] = 0;
                    $map ['msg'] = "Please insert youtube embed url";
                    echo json_encode($map);
                    exit;
                } else {
                    $user['why_choose_video'] = $this->input->post('why_choose_video_url');
                }
            } else {
                $user['why_choose_video'] = $this->input->post('why_choose_video_old');
            }
        }
        
        if (isset($_FILES['business_opportunity_video']['name']) && $_FILES['business_opportunity_video']['name']!='') {

            $config3 = array();
            $config3['upload_path'] = './uploads/business_opportunity_video/';
            $config3['allowed_types'] = 'mp4|mpeg|avi|3gp';
            $config3['max_size'] = 20971520;
            $config3['remove_spaces'] = TRUE;
            $config3['encrypt_name'] = TRUE;
            $config3['overwrite'] = FALSE;

            $this->load->library('upload', $config3);
            $this->upload->initialize($config3);
            if (!$this->upload->do_upload('business_opportunity_video')) {
                $error4 = $this->upload->display_errors();
                $map ['status'] = 0;
                $map ['msg'] = "Businss opprtunity video error - " . $error4;
                echo json_encode($map);
                exit;
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            $user['business_opportunity_video'] = base_url() . "uploads/business_opportunity_video/" . $data['upload_data']['file_name'];
        } else {
            $user['business_opportunity_video'] = $this->input->post('business_opportunity_video_url');
        }

        if (isset($_POST['tab_name'])) {
            for ($k = 0; $k < count($_POST['tab_name']); $k++) {
                $tabs = $this->common_model->updateRow(TABLES::$VCARD_TABS, array('tab_name' => $_POST['tab_name'][$k]), array('id' => $_POST['edit_id'][$k]));
            }
        }
        
            $this->db->where('user_id', $session_data['user_account']['user_id']);
            $this->db->delete(TABLES::$VCARD_CUSTOM_TABS);
            for ($t = 0; $t < count($_POST['tab_name_more']); $t++) {
                $tabs1 = $this->common_model->insertRow(array('tab_val' => $_POST['tab_val_more'][$t], 'tab_name' => $_POST['tab_name_more'][$t], 'user_id' => $session_data['user_account']['user_id']), TABLES::$VCARD_CUSTOM_TABS);
            }
       
        $uid = $this->common_model->updateRow(TABLES::$ADMIN_USER, $user, array('id' => $session_data['user_account']['user_id']));
        if ($uid) {
            $map ['status'] = 1;
            $map ['msg'] = "Your data has been updated";
            echo json_encode($map);
        }
    }

    public function saveVcardStep1() {

        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
        $this->form_validation->set_rules('theme_color', 'Theme Color', 'trim|required');



        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
        } else {
            $map = array();
            $user = array();
            if (isset($_FILES['user_image']) && !empty($_FILES['user_image']['name'])) {
                $config = array();
                $config['upload_path'] = './uploads/users/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = FALSE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('user_image')) {
                    $error = $this->upload->display_errors();
                    $map ['status'] = 0;
                    $map ['msg'] = "User Image upload error - " . $error;
                    echo json_encode($map);
                    exit;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                $user['user_image'] = base_url() . "uploads/users/" . $data['upload_data']['file_name'];
            } else {
                $user['user_image'] = $this->input->post('user_image_old');
            }
            if (isset($_FILES['company_logo']) && !empty($_FILES['company_logo']['name'])) {
                $config1 = array();
                $config1['upload_path'] = './uploads/logos/';
                $config1['allowed_types'] = 'gif|jpg|png|jpeg';
                $config1['max_size'] = 1024;
                $config1['max_width'] = 1024;
                $config1['max_height'] = 768;
                $config1['remove_spaces'] = TRUE;
                $config1['encrypt_name'] = TRUE;
                $config1['overwrite'] = FALSE;

                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                if (!$this->upload->do_upload('company_logo')) {
                    $error1 = $this->upload->display_errors();
                    $map1 ['status'] = 0;
                    $map1 ['msg'] = "Company logo upload error - " . $error1;
                    echo json_encode($map1);
                    exit;
                } else {
                    $data1 = array('upload_data' => $this->upload->data());
                }
                $user['company_logo'] = base_url() . "uploads/logos/" . $data1['upload_data']['file_name'];
            } else {
                $user['company_logo'] = $this->input->post('company_logo_old');
            }
            $user['first_name'] = $this->input->post('first_name');
            $user['last_name'] = $this->input->post('last_name');
            $user['mobile'] = $this->input->post('mobile');
            $user['email'] = $this->input->post('email');
            $user1['id'] = $this->input->post('id');
            $user['theme_color'] = $this->input->post('theme_color');
            $this->load->model('Login_model');
            $uid = $this->common_model->updateRow(TABLES::$ADMIN_USER, $user, array('id' => $user1['id']));
            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "Your data has been saved";
                echo json_encode($map);
            }
        }
    }

    public function saveVcardStep2() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;

        $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('job_title', 'Job Title', 'trim|required');
        $this->form_validation->set_rules('company_phone', 'Company Phone', 'trim|required');
        $this->form_validation->set_rules('company_website', 'Company Website', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
        } else {
            $map = array();
            $user = array();
            $user['company_name'] = $this->input->post('company_name');
            $user['job_title'] = $this->input->post('job_title');
            $user['work_phone'] = $this->input->post('company_phone');
            $user['work_website'] = $this->input->post('company_website');
            $user['work_address'] = $this->input->post('work_address');
            $user['work_city'] = $this->input->post('work_city');
            $user['work_state'] = $this->input->post('work_state');
            $user['work_country'] = $this->input->post('work_country');
            $user['work_postal_code'] = $this->input->post('work_postal_code');
            $user1['id'] = $this->input->post('id');
            $this->load->model('Login_model');
            $uid = $this->common_model->updateRow(TABLES::$ADMIN_USER, $user, array('id' => $user1['id']));
            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "Your data has been saved";
                echo json_encode($map);
            }
        }
    }

    public function saveVcardStep3() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;

        $this->form_validation->set_rules('personal_title', 'Personal Title', 'trim|required');
        $this->form_validation->set_rules('home_phone', 'Home Phone', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
        } else {
            $map = array();
            $user = array();
            $user['home_address'] = $this->input->post('home_address');
            $user['home_city'] = $this->input->post('home_city');
            $user['home_state'] = $this->input->post('home_state');
            $user['home_country'] = $this->input->post('home_country');
            $user['home_postal_code'] = $this->input->post('home_postal_code');
            $user['home_phone'] = $this->input->post('home_phone');
            $user['personal_title'] = $this->input->post('personal_title');
            $user['nick_name'] = $this->input->post('nick_name');
            $user1['id'] = $this->input->post('id');
            $this->load->model('Login_model');
            $uid = $this->common_model->updateRow(TABLES::$ADMIN_USER, $user, array('id' => $user1['id']));
            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "Your data has been saved";
                echo json_encode($map);
            }
        }
    }

    public function saveVcardStep4() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $birthdate = date("Y-m-d",strtotime($this->input->post('birthday')));
        if($birthdate > date('Y-m-d', strtotime('-10 years'))){
             $map ['status'] = 0;
            $map ['msg'] = "Please check birth date. User should be atleast 10 year old.";
            echo json_encode($map);
            exit();
        }
        
        $anniversary = date("Y-m-d",strtotime($this->input->post('anniversary')));
        if($anniversary > date('Y-m-d')){
             $map ['status'] = 0;
            $map ['msg'] = "Anniversary date can not be greater than today's date";
            echo json_encode($map);
            exit();
        }
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
        } else {
            $map = array();
            $user = array();
            $user['gender'] = $this->input->post('gender');
            $user['birthday'] = $this->input->post('birthday');
            $user['anniversary'] = $this->input->post('anniversary');
            $user['notes'] = $this->input->post('notes');
            $user1['id'] = $this->input->post('id');
            $this->load->model('Login_model');
            $uid = $this->common_model->updateRow(TABLES::$ADMIN_USER, $user, array('id' => $user1['id']));
            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "Your data has been saved";
                echo json_encode($map);
            }
        }
    }

    public function saveVcardStep5() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $map = array();
        $user = array();
        if (strpos($this->input->post('why_choose_video_url'), 'embed') == false && strpos($this->input->post('why_choose_video_url'), 'youtu.be') == true) {
            $map ['status'] = 0;
            $map ['msg'] = "Please insert youtube embed url";
            echo json_encode($map);
            exit;
        }
        $user1['id'] = $this->input->post('id');
        if (isset($_FILES['why_choose_image']['name']) && $_FILES['why_choose_image']['name'] !='') {
            $config = array();
            $config['upload_path'] = './uploads/why_choose_images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['overwrite'] = FALSE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('why_choose_image')) {
                $error = $this->upload->display_errors();
                $map ['status'] = 0;
                $map ['msg'] = "Why choose image error - " . $error;
                echo json_encode($map);
                exit;
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            $user['why_choose_image'] = base_url() . "uploads/why_choose_images/" . $data['upload_data']['file_name'];
        }
        if (isset($_FILES['why_choose_video']['name'])) {

            $config1 = array();
            $config1['upload_path'] = './uploads/why_choose_videos/';
            $config1['allowed_types'] = 'mp4|mpeg|avi|3gp';
            $config1['remove_spaces'] = TRUE;
            $config1['max_size'] = 20971520;
            $config1['encrypt_name'] = TRUE;
            $config1['overwrite'] = FALSE;


            $this->load->library('upload', $config1);
            $this->upload->initialize($config1);
            if (!$this->upload->do_upload('why_choose_video')) {
                $error1 = $this->upload->display_errors();
                $map1 ['status'] = 0;
                $map1 ['msg'] = "Why choose video error - " . $error1;
                echo json_encode($map1);
                exit;
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            $user['why_choose_video'] = base_url() . "uploads/why_choose_videos/" . $data['upload_data']['file_name'];
        } else {
            $user['why_choose_video'] = $this->input->post('why_choose_video_url');
        }
        $user['why_choose_desc'] = $this->input->post('why_choose_desc');
        $user['increase_your_credit_desc'] = $this->input->post('increase_your_credit_desc');
        $user['product_page_url'] = $this->input->post('product_page_url');

        $uid = $this->common_model->updateRow(TABLES::$ADMIN_USER, $user, array('id' => $user1['id']));
        if ($uid) {
            $map ['status'] = 1;
            $map ['msg'] = "Your data has been saved";
            echo json_encode($map);
            exit;
        }
    }

    public function saveVcardStep6() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $map = array();
        $user = array();
        $user1['id'] = $this->input->post('id');
        if (strpos($this->input->post('business_opportunity_video_url'), 'embed') == false && strpos($this->input->post('business_opportunity_video_url'), 'youtu.be') == true) {
            $map ['status'] = 0;
            $map ['msg'] = "Please insert youtube embed url";
            echo json_encode($map);
            exit();
        }
        if (isset($_FILES['business_opportunity_video']['name']) && $_FILES['business_opportunity_video']['name']!='') {

            $config3 = array();
            $config3['upload_path'] = './uploads/business_opportunity_video/';
            $config3['allowed_types'] = 'mp4|mpeg|avi|3gp';
            $config3['max_size'] = 20971520;
            $config3['remove_spaces'] = TRUE;
            $config3['encrypt_name'] = TRUE;
            $config3['overwrite'] = FALSE;

            $this->load->library('upload', $config3);
            $this->upload->initialize($config3);
            if (!$this->upload->do_upload('business_opportunity_video')) {
                $error4 = $this->upload->display_errors();
                $map ['status'] = 0;
                $map ['msg'] = "Businss opprtunity video error - " . $error4;
                echo json_encode($map);
                exit;
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            $user['business_opportunity_video'] = base_url() . "uploads/business_opportunity_video/" . $data['upload_data']['file_name'];
        } else {
            $user['business_opportunity_video'] = $this->input->post('business_opportunity_video_url');
        }
        $updatedata = $this->common_model->updateRow(TABLES::$ADMIN_USER, $user, array('id' => $user1['id']));

        if (isset($_POST['business_strategy']) && $_POST['business_strategy'] !='') {
            if ($_FILES['business_strat_video']['name'] !='' && isset($_FILES['business_strat_video']['name'])) {
                $error = array();
                $config5 = array();
                $config5['upload_path'] = './uploads/business_strategy_videos/'; //give the path to upload the image in folder
                $config5['remove_spaces'] = TRUE;
                $config5['encrypt_name'] = TRUE; // for encrypting the name
                $config5['allowed_types'] = 'mp4|mpeg|avi|3gp';
                $config5['max_size'] = 20971520;
                $config5['overwrite'] = FALSE;
                $files = $_FILES;
                $count = count($_FILES['business_strat_video']['name']);
                for ($i = 0; $i < $count; $i++) {
                    $_FILES['business_strat_video']['name'] = $files['business_strat_video']['name'][$i];
                    $_FILES['business_strat_video']['type'] = $files['business_strat_video']['type'][$i];
                    $_FILES['business_strat_video']['tmp_name'] = $files['business_strat_video']['tmp_name'][$i];
                    $_FILES['business_strat_video']['error'] = $files['business_strat_video']['error'][$i];
                    $_FILES['business_strat_video']['size'] = $files['business_strat_video']['size'][$i];
                    $this->load->library('upload', $config5);
                    $this->upload->initialize($config5); //function defination below
                    if ($this->upload->do_upload('business_strat_video')) {
                        $upload_data = $this->upload->data();
                        $name_array[] = $upload_data['file_name'];
                        $fileName = $upload_data['file_name'];
                        $images[] = $fileName;
                    } else {
                        $error[] = $this->upload->display_errors();
                    }
                }
                if (sizeof($error) > 0) {
                    $map ['status'] = 0;
                    foreach ($error as $err) {
                        $map ['msg'] = "Business Strategy video error - " . $err;
                    }
                    echo json_encode($map);
                    exit;
                } else {
                    $fileName = $images;
                }
            }
        }
        for ($i = 0; $i < count($_POST['business_strategy']); $i++) {
            $video = base_url() . "uploads/business_strategy_videos/" . $fileName[$i];
            $this->common_model->insertRow(array('user_id' => $user1['id'], 'strat_name' => $_POST['strat_name'][$i], 'video' => $video, 'description' => $_POST['business_strategy'][$i]), TABLES::$BUSINESS_STRAT);
        }
        $card_data = array();
        $map ['status'] = 1;
        $map ['msg'] = "Your data has been saved";
        echo json_encode($map);
    }

    public function saveVcardStep7() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $this->form_validation->set_rules('instagram_link', 'Instagram Link', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
        } else {
            $map = array();
            $user = array();
            $user['youtube_link'] = $this->input->post('youtube_link');
            $user['instagram_link'] = $this->input->post('instagram_link');
            $user['facebook_link'] = $this->input->post('facebook_link');
            $user['twitter_link'] = $this->input->post('twitter_link');
            $user['linkedin_link'] = $this->input->post('linkedin_link');
            $user['vcard_complete_status'] = 1;
            $user1['id'] = $this->input->post('id');
            $this->load->model('Login_model');
            $uid = $this->common_model->updateRow(TABLES::$ADMIN_USER, $user, array('id' => $user1['id']));
            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "Your data has been saved";
//$this->generate_card($user1['id']);
                echo json_encode($map);
            }
        }
    }

    public function saveVcardStep8() {
        $session_data = $this->session->userdata();
        if (isset($_POST['tab_name'])) {
            for ($k = 0; $k < count($_POST['tab_name']); $k++) {
                $tabs = $this->common_model->updateRow(TABLES::$VCARD_TABS, array('tab_name' => $_POST['tab_name'][$k]), array('id' => $_POST['edit_id'][$k]));
            }
        }
       
            $this->db->where('user_id', $session_data['user_account']['user_id']);
            $this->db->delete(TABLES::$VCARD_CUSTOM_TABS);
            for ($t = 0; $t < count($_POST['tab_name_more']); $t++) {
                $tabs1 = $this->common_model->insertRow(array('tab_val' => $_POST['tab_val_more'][$t], 'tab_name' => $_POST['tab_name_more'][$t], 'user_id' => $session_data['user_account']['user_id']), TABLES::$VCARD_CUSTOM_TABS);
            }
       
        if ($tabs1 != '') {
            $map ['status'] = 1;
            $map ['msg'] = "Your data has been updated";
            echo json_encode($map);
        }
    }

    public function deleteDynamicImage() {
        $this->common_model->deleteRows(array('id' => $this->input->post('id')), TABLES::$BUSINESS_STRAT, 'id');
        $map ['status'] = 1;
        $map ['msg'] = "Image Deleted";
        echo json_encode($map);
    }

    public function updateStrategy() {
        $session_date = $this->session->userdata('user_account');
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $map = array();
        $user = array();

//        if (strpos($this->input->post('business_opportunity_video_url'), 'embed') == false && strpos($this->input->post('business_opportunity_video_url'), 'youtu.be') == true) {
//            $map ['status'] = 0;
//            $map ['msg'] = "Please insert youtube embed url";
//            echo json_encode($map);
//            exit();
//        }
         $this->form_validation->set_rules('strat_name', 'Strategt Name', 'trim|required');
         $this->form_validation->set_rules('strat_desc', 'Description', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
            exit();
        }
        if (isset($_FILES['video']['name']) && !empty($_FILES['video']['name'])) {

            $config3 = array();
            $config3['upload_path'] = './uploads/business_strategy_videos/';
            $config3['allowed_types'] = 'mp4|mpeg|avi|3gp';
            $config3['max_size'] = 20971520;
            $config3['remove_spaces'] = TRUE;
            $config3['encrypt_name'] = TRUE;
            $config3['overwrite'] = FALSE;

            $this->load->library('upload', $config3);
            $this->upload->initialize($config3);
            if (!$this->upload->do_upload('video')) {
                $error4 = $this->upload->display_errors();
                $map ['status'] = 0;
                $map ['msg'] = $error4;
                echo json_encode($map);
                exit;
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            $user['video'] = "uploads/business_strategy_videos/" . $data['upload_data']['file_name'];
            
           
        } else {
            $user['video'] = $this->input->post('of');
        }
        $user['strat_name'] = $this->input->post('strat_name');
        $user['description'] = $this->input->post('strat_desc');
        $user['user_id'] = $session_date['user_id'];
        if ($_POST['edit_id'] != "") {
             @unlink($this->input->post('old_file'));
            $updatedata = $this->common_model->updateRow(TABLES::$BUSINESS_STRAT, $user, array('id' => $_POST['edit_id']));
        } else {
            $updatedata = $this->common_model->insertRow($user, TABLES::$BUSINESS_STRAT);
        }
        //echo $this->db->last_query();
        if ($updatedata) {
            $map ['status'] = 1;
            $map ['msg'] = "Business Strategies Data Updated";
            echo json_encode($map);
        }
    }

    public function generate_card($id) {
        error_reporting(0);

        $data = $this->common_model->generateVcard($id);
//echo $data[0]['first_name'];
        $card_data['first_name'] = $data[0]['first_name'];
        $card_data['last_name'] = $data[0]['last_name'];
        $card_data['gender'] = $data[0]['gender'];
        $card_data['additional_name'] = $data[0]['middle_name']; //Middle name
        $card_data['name_prefix'] = $data[0]['personal_title'];  //Mr. Mrs. Dr.
        $card_data['nickname'] = $data[0]['nickname'];

        /*
          Contact's company, department, title, profession
         */
        $card_data['company'] = $data[0]['company_name'];
//$card_data['department'] = "";
        $card_data['title'] = $data[0]['job_title'];
//        $card_data['role'] = $data[0]['role'];

        /*
          Contact's work address
         */
//$card_data['work_po_box'] = "";
//$card_data['work_extended_address'] = "";
        $card_data['work_address'] = $data[0]['work_address'];
        $card_data['work_city'] = $data[0]['work_city'];
        $card_data['work_state'] = $data[0]['work_state'];
        $card_data['work_postal_code'] = $data[0]['work_postal_code'];
        $card_data['work_country'] = $data[0]['work_country'];
        $card_data['gender'] = $data[0]['gender'];

        /*
          Contact's home address
         */
//$card_data['home_po_box'] = "";
//$card_data['home_extended_address'] = "";
        $card_data['home_address'] = $data[0]['home_address'];
        $card_data['home_city'] = $data[0]['home_city'];
        $card_data['home_state'] = $data[0]['home_state'];
        $card_data['home_postal_code'] = $data[0]['home_postal_code'];
        $card_data['home_country'] = $data[0]['home_country'];

        /*
          Contact's telephone numbers.
         */
        $card_data['office_tel'] = $data[0]['office_tel'];
//$card_data['home_tel'] = "";
        $card_data['fax_tel'] = $data[0]['fax_tel'];
        $card_data['cell_tel'] = $data[0]['mobile'];
//$card_data['pager_tel'] = "";

        /*
          Contact's email addresses
         */
        $card_data['email1'] = $data[0]['email'];
        $card_data['email2'] = $data[0]['email'];

        $card_data['url'] = $data[0]['work_website'];

        /*
          Some other contact data.
         */
//$card_data['photo'] = "";  //Enter a URL.
        $card_data['birthday'] = $data[0]['birthday'];
        $card_data['note'] = $data[0]['notes'];
        $this->load->library('vcard');
        $this->vcard->load($card_data);
        $this->vcard->generate_download($data[0]['first_name'] . ".vcf");
    }

}
