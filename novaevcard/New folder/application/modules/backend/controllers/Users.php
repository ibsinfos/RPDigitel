<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {

        parent::__construct();

        $this->load->model("common_model");

//        $this->load->library('form_validation');
    }

    /* Frontend : Manage Blog Start */

    public function userList() {
        $session_data = $this->session->userdata('user_account');
        if (!$this->common_model->isLoggedIn()) {

            $this->session->set_flashdata('msg', 'Please login to contninue.');

            redirect(base_url() . "backend/login");
        }
        if ($session_data['role_id'] != '1') {

            $this->session->set_flashdata('msg', 'You are not authorized to access backend');

            redirect(base_url() . "login");
        }

        $data['global'] = $this->common_model->getGlobalSettings();

        $data = $this->common_model->commonFunction();

        $data['user_session'] = $this->session->userdata('user_account');

        #START Action :: Fetch all active Blog added by admin :   

        $data['arr_user_data'] = $this->common_model->getRecords(TABLES::$ADMIN_USER, '*');

//        print_r($data['arr_product_data']);





        $this->template->set('page', 'users_list');

        $this->template->set('arr_user_data', $data['arr_user_data']);

        $this->template->set('user_session', $data['user_session']);

        $this->template->set_theme('default_theme');

        $this->template->set_layout('backend')
                ->title('vCard | Users List')
                ->set_partial('header', 'partials/header')
                ->set_partial('leftpanel', 'partials/leftpanel')
                ->set_partial('footer', 'partials/footer');

        $this->template->build('users/users_list');
    }

    public function userDetails($id) {
        $session_data = $this->session->userdata('user_account');
        if (!$this->common_model->isLoggedIn()) {

            $this->session->set_flashdata('msg', 'Please login to contninue.');

            redirect(base_url() . "backend/login");
        }
        if ($session_data['role_id'] != '1') {

            $this->session->set_flashdata('msg', 'You are not authorized to access backend');

            redirect(base_url() . "login");
        }

        $data['arr_user_data'] = $this->common_model->getRecords(TABLES::$ADMIN_USER, '*', array('id' => $id));

        $this->template->set('page', 'user_details');

        $this->template->set('arr_user_data', $data['arr_user_data']);

        $this->template->set_theme('default_theme');

        $this->template->set_layout('backend')
                ->title('vCard | Users List')
                ->set_partial('header', 'partials/header')
                ->set_partial('leftpanel', 'partials/leftpanel')
                ->set_partial('footer', 'partials/footer');

        $this->template->build('users/users_detail');
    }

    public function addUser() {
        $session_data = $this->session->userdata('user_account');
        if (!$this->common_model->isLoggedIn()) {

            $this->session->set_flashdata('msg', 'Please login to contninue.');

            redirect(base_url() . "backend/login");
        }
        if ($session_data['role_id'] != '1') {

            $this->session->set_flashdata('msg', 'You are not authorized to access backend');

            redirect(base_url() . "login");
        }

        $data = $this->common_model->commonFunction();

        $plan_data = $this->common_model->getRecords(TABLES::$MST_PLANS, '*', array('plan_name' => 'vcard_plan'));
        $default_data = $this->common_model->getRecords('tbl_default_contents', '*');
        $this->template->set('plan_data', $plan_data);

        if ($this->input->post()) {



            $this->load->library('form_validation');

            $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|numeric');

            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');

            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');

            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_users.email]');

            $this->form_validation->set_message('is_unique', 'The %s is already registered');



            if ($this->form_validation->run() == FALSE) {

                $this->template->set('error', validation_errors());

                $this->template->set('page', 'add_user');

                $this->template->set_theme('default_theme');

                $this->template->set_layout('backend')
                        ->title('vCard | Add User')
                        ->set_partial('header', 'partials/header')
                        ->set_partial('leftpanel', 'partials/leftpanel')
                        ->set_partial('footer', 'partials/footer');

                $this->template->build('users/add_user');
            } else {



                $user['first_name'] = $this->input->post('first_name');

                $user['last_name'] = $this->input->post('last_name');

                $user['email'] = $this->input->post('email');

                $user['mobile'] = $this->input->post('mobile');

                $user['email_verify'] = '1';

                $user['role_id'] = '0';

                $user['user_status'] = '1';

                $user['vcard_complete_status'] = '0';

                $user['verified'] = '1';

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

                $user['company_name'] = $default_data[0]['company_name'];
                $user['job_title'] = $default_data[0]['job_title'];
                $user['work_phone'] = $default_data[0]['work_phone'];
                $user['why_choose_desc'] = $default_data[0]['why_choose_desc'];
                $user['business_opportunity_video'] = $default_data[0]['business_opportunity_video'];
                $user['why_choose_video'] = $default_data[0]['why_choose_video'];
                $user['why_choose_image'] = $default_data[0]['why_choose_image'];
                $user['work_website'] = $default_data[0]['work_website'];
                $user['user_image'] = $default_data[0]['user_image'];
                $user['company_logo'] = $default_data[0]['company_logo'];
                $user['product_page_url'] = $default_data[0]['product_page_url'];
                $user['youtube_link'] = "https://youtube.com";
                $user['instagram_link'] = "https://instagram.com";
                $user['facebook_link'] = "https://facebook.com";
                $user['twitter_link'] = "https://twitter.com";
                $user['linkedin_link'] = "https://linkedin.com";

                $user['increase_your_credit_desc'] = $default_data[0]['increase_your_credit_desc'];





                $uid = $this->Login_model->addUser($user);

                /* Code for savin gbusiness strategy default */


                if ($uid) {

                    foreach (unserialize($default_data[0]['tabs']) as $tab) {
                        //echo $tab;
                        $data1 = array(
                            'tab_name' => $tab,
                            'user_id' => $uid
                        );
                        $this->db->insert(TABLES::$VCARD_TABS, $data1);
                    }

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

                    $reserved_words = array
                        (
                        "||USER_NAME||" => $this->input->post('email'),
                        "||FIRST_NAME||" => $this->input->post('first_name'),
                        "||LAST_NAME||" => $this->input->post('last_name'),
                        "||USER_EMAIL||" => $this->input->post('email'),
                        "||USER_PASSWORD||" => $pass,
                        "||SITE_URL||" => base_url(),
                        "||SITE_TITLE||" => stripslashes($data['global']['site_title'])
                    );

                    $template_title = 'user_created_by_admin';

                    $arr_emailtemplate_data = $this->common_model->getEmailTemplateInfo($template_title, $reserved_words);



                    $recipeinets = $this->input->post('email');

                    $from = array("email" => stripslashes($data['global']['site_email']), "name" => stripslashes($data['global']['site_title']));



                    $subject = $arr_emailtemplate_data['subject'];

                    $message = $arr_emailtemplate_data['content'];



                    $mail = $this->common_model->sendEmail($recipeinets, $from, $subject, $message);

                    $msg = 'User created successfully. Login credentials has sent to the users email id.';

                    //$this->session->unset_userdata('user_account');

                    $this->session->set_flashdata('msg', $msg);

                    redirect(base_url() . 'backend/users/list');
                }
            }
        }

        $this->template->set('page', 'add_user');

        $this->template->set_theme('default_theme');

        $this->template->set_layout('backend')
                ->title('vCard | Add User')
                ->set_partial('header', 'partials/header')
                ->set_partial('leftpanel', 'partials/leftpanel')
                ->set_partial('footer', 'partials/footer');

        $this->template->build('users/add_user');
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

    public function deleteUser($userid) {
        $this->db->delete(TABLES::$ADMIN_USER, array('id' => $userid));
        $this->db->delete(TABLES::$BUSINESS_STRAT, array('user_id' => $userid));
        $this->db->delete(TABLES::$VCARD_TABS, array('user_id' => $userid));
        $this->db->delete(TABLES::$VCARD_CUSTOM_TABS, array('user_id' => $userid));
        $this->db->delete(TABLES::$SMS_TEMPLATE, array('user_id' => $userid));
        $this->db->delete(TABLES::$OPTIN_LIST, array('user_id' => $userid));
        $this->db->delete(TABLES::$MST_AUTO_RESPONDER, array('user_id' => $userid));
        $this->db->delete(TABLES::$CRON_TEXTMSG, array('user_id' => $userid));
        $this->db->delete(TABLES::$CLIENT_CONTACTS, array('user_id' => $userid));
        $this->db->delete(TABLES::$APPOINTMENTS, array('user_id' => $userid));

        // if($userdelete == true){
        $this->session->set_userdata("msg", "User has been deleted successfully.");
        redirect(base_url() . "backend/users/list");
        //}
    }

    public function editUser($userid) {
        $session_data = $this->session->userdata('user_account');
        if (!$this->common_model->isLoggedIn()) {

            $this->session->set_flashdata('msg', 'Please login to contninue.');

            redirect(base_url() . "backend/login");
        }
        if ($session_data['role_id'] != '1') {

            $this->session->set_flashdata('msg', 'You are not authorized to access backend');

            redirect(base_url() . "login");
        }
        $this->load->model("Location_model");
        $userdata = $this->common_model->getRecords(TABLES::$ADMIN_USER, '*', array('id' => $userid));
        //print_r($userdata);
        $result['list'] = $this->Location_model->getCountry();
        $business_strat = $this->common_model->getRecords(TABLES::$BUSINESS_STRAT, '*', array('user_id' => $userid));
        $tabs = $this->common_model->getRecords(TABLES::$VCARD_TABS, '*', array('user_id' => $userid));
        $custom_tabs = $this->common_model->getRecords(TABLES::$VCARD_CUSTOM_TABS, '*', array('user_id' => $userid));
        $this->template->set('page', 'add_user');
        $this->template->set('userid', $userid);
        $this->template->set('user_data', $userdata);
        $this->template->set('tabs', $tabs);
        $this->template->set('custom_tabs', $custom_tabs);
        $this->template->set('business_strat', $business_strat);
        $this->template->set('country', $result['list']);

        $this->template->set_theme('default_theme');

        $this->template->set_layout('backend')
                ->title('vCard | Add User')
                ->set_partial('header', 'partials/header')
                ->set_partial('leftpanel', 'partials/leftpanel')
                ->set_partial('footer', 'partials/footer');

        $this->template->build('users/edit_user');
    }

    public function updateStrategy1() {

        $session_date = $this->session->userdata('user_account');
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->library('form_validation');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $map = array();
        $user = array();
        $this->form_validation->set_rules('strat_name', 'Strategy Name', 'trim|required');
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
            $user['video'] = base_url() . "uploads/business_strategy_videos/" . $data['upload_data']['file_name'];
        } else {
            $user['video'] = $this->input->post('of');
        }
        $user['strat_name'] = $this->input->post('strat_name');
        $user['description'] = $this->input->post('strat_desc');
        $user['user_id'] = $this->input->post('userid');
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

    public function updatevCard() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->library('form_validation');
        $this->load->helper(array(
            'form',
            'url', 'file'
        ));
        //$session_data = $this->session->userdata();
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;

        $birthdate = date("Y-m-d", strtotime($this->input->post('birthday')));
        if ($birthdate > date('Y-m-d', strtotime('-10 years'))) {
            $map ['status'] = 0;
            $map ['msg'] = "Please check birth date. User should be atleast 10 year old.";
            echo json_encode($map);
            exit();
        }

        $anniversary = date("Y-m-d", strtotime($this->input->post('anniversary')));
        if ($anniversary > date('Y-m-d')) {
            $map ['status'] = 0;
            $map ['msg'] = "Anniversary date can not be greater than today's date";
            echo json_encode($map);
            exit();
        }

        $email = $this->common_model->getRecords(TABLES::$ADMIN_USER, 'email', array('id' => $this->input->post('userid')));
        if ($email[0]['email'] != $this->input->post('email')) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_users.email]');
            $this->form_validation->set_message('is_unique', 'The %s is already registered');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        }

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

            if (isset($_FILES['business_opportunity_video']['name']) && !empty($_FILES['business_opportunity_video']['name'])) {

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
                $user['business_opportunity_video'] = $this->input->post('old_file');
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
                    $error1 = $this->upload->display_errors();
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
            if (!empty($_FILES['why_choose_video']['name']) && isset($_FILES['why_choose_video'])) {
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

        if (isset($_POST['tab_name'])) {
            for ($k = 0; $k < count($_POST['tab_name']); $k++) {
                $tabs = $this->common_model->updateRow(TABLES::$VCARD_TABS, array('tab_name' => $_POST['tab_name'][$k]), array('id' => $_POST['edit_id'][$k]));
            }
        }

        $this->db->where('user_id', $this->input->post('userid'));
        $this->db->delete(TABLES::$VCARD_CUSTOM_TABS);
        for ($t = 0; $t < count($_POST['tab_name_more']); $t++) {
            $tabs1 = $this->common_model->insertRow(array('tab_val' => $_POST['tab_val_more'][$t], 'tab_name' => $_POST['tab_name_more'][$t], 'user_id' => $this->input->post('userid')), TABLES::$VCARD_CUSTOM_TABS);
        }

        $uid = $this->common_model->updateRow(TABLES::$ADMIN_USER, $user, array('id' => $this->input->post('userid')));
        if ($uid) {
            $map ['status'] = 1;
            $map ['msg'] = "Your data has been updated";
            echo json_encode($map);
        }
    }

    public function resetPassword() {
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;

        if ($this->input->post('password') != $this->input->post('confirmpass')) {
            $map ['status'] = 0;
            $map ['msg'] = "<p>Password and confirm password doesn't match</p>";
            echo json_encode($map);
            exit;
        }
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirmpass', 'Confirm Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
            exit;
        } else {
            $arr_admin_detail = $this->common_model->getRecords(TABLES::$ADMIN_USER, 'first_name,last_name,email', array("id" => $this->input->post('userid')));
            $data['global'] = $this->common_model->getGlobalSettings();
            /* sending admin credentail on admin account mail on user email */
            $pass = $this->input->post('password');
            /* setting reserved_words for email content */
            $reserved_words = array(
                "||FIRST_NAME||" => $arr_admin_detail[0]['first_name'],
                "||LAST_NAME||" => $arr_admin_detail[0]['last_name'],
                "||USER_NAME||" => $arr_admin_detail[0]['email'],
                "||USER_PASSWORD||" => $pass,
                "||USER_EMAIL||" => $arr_admin_detail[0]['email'],
                "||SITE_TITLE||" => $data['global']['site_title']
            );

            $email_content = $this->common_model->getEmailTemplateInfo('reset-password-by-admin', $reserved_words);

            $mail = $this->common_model->sendEmail($arr_admin_detail[0]['email'], array("email" => $data['global']['site_email'], "name" => $data['global']['site_title']), $email_content['subject'], $email_content['content']);
            if ($mail) {
                $this->common_model->updateRow(TABLES::$ADMIN_USER, array("password" => md5($pass)), array("id" => $this->input->post('userid')));
                $map ['status'] = 1;
                $map ['msg'] = "Password reseted and mailed to user";
                echo json_encode($map);
                exit;
            } else {
                $map ['status'] = 1;
                $map ['msg'] = "Unable to send email";
                echo json_encode($map);
                exit;
            }
        }
    }

    public function updateDefaultContent() {


        //print_r($userdata);
        $data = $this->common_model->getRecords('tbl_default_contents', '*');
        $this->template->set('page', 'updateinfo');
        $this->template->set('data', $data);

        $this->template->set_theme('default_theme');

        $this->template->set_layout('backend')
                ->title('vCard | Add User')
                ->set_partial('header', 'partials/header')
                ->set_partial('leftpanel', 'partials/leftpanel')
                ->set_partial('footer', 'partials/footer');

        $this->template->build('users/update_default_content');
    }

    public function updateDefaultContents() {

        if (isset($_FILES['user_image']['name']) && !empty($_FILES['user_image']['name'])) {
            $config = array();
            $config['upload_path'] = './uploads/users/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['overwrite'] = FALSE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('user_image')) {
                $error1 = $this->upload->display_errors();
                $map1 ['status'] = 0;
                $map1 ['msg'] = "User image upload error - " . $error1;
                echo json_encode($map1);
                exit;
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            $user['user_image'] = base_url() . "uploads/users/" . $data['upload_data']['file_name'];
        } else {
            $user['user_image'] = $this->input->post('user_image_old');
        }
        if (isset($_FILES['company_logo']['name']) && $_FILES['company_logo']['name'] != '') {
            $config1 = array();
            $config1['upload_path'] = './uploads/logos/';
            $config1['allowed_types'] = 'gif|jpg|png|jpeg';
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

        if (isset($_FILES['business_opportunity_video']['name']) && $_FILES['business_opportunity_video']['name'] != '') {

            $config3 = array();
            $config3['upload_path'] = './uploads/business_opportunity_video/';
            $config3['allowed_types'] = 'mp4|mpeg|avi|3gp';
            $config3['max_size'] = '20971520';
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
            $user['business_opportunity_video'] = $this->input->post('business_opportunity_video_old');
        }

        if ($_FILES['why_choose_image']['name'] != '' && isset($_FILES['why_choose_image']['name'])) {
            $config = array();
            $config['upload_path'] = './uploads/why_choose_images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['overwrite'] = FALSE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('why_choose_image')) {
                $error1 = $this->upload->display_errors();
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
        if ($_FILES['why_choose_video']['name'] != '' && isset($_FILES['why_choose_video']['name'])) {
            $config1 = array();
            $config1['upload_path'] = './uploads/why_choose_videos/';
            $config1['allowed_types'] = 'mp4|mpeg|avi|3gp';
            $config1['max_size'] = '20971520';
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
        } else {
            $user['why_choose_video'] = $this->input->post('why_choose_video_old');
        }
        $user['company_name'] = $this->input->post('company_name');
        $user['job_title'] = $this->input->post('job_title');
        $user['work_phone'] = $this->input->post('work_phone');
        $user['why_choose_desc'] = $this->input->post('why_choose_desc');
        $user['product_page_url'] = $this->input->post('product_page_url');

        $user['tabs'] = serialize($this->input->post('tabs'));
        $user['increase_your_credit_desc'] = $this->input->post('increase_your_credit_desc');

        $insert = $this->common_model->updateRow('tbl_default_contents', $user, array('id' => $this->input->post('edit_id')));
        if ($insert) {
            $msg = 'Default Contents Updated Successfully.';
            $map1 ['status'] = 1;
            $map1 ['msg'] = $msg;
            echo json_encode($map1);
            exit;
        }
    }

}

/* End of file home.php */

/* Location: ./application/controllers/home.php */

