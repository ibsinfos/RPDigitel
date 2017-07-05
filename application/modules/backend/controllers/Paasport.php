<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paasport extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'Text', 'cookie'));
        $this->load->library('form_validation');
        $this->load->model("common_model");
        ini_set('memory_limit', '360M');




        $this->sessionn = $this->session->userdata('user_account');

        $this->sidebar = 'partials/hosting_sidebar';

        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url());
        }

        if (!empty($_SESSION['paasport_user_id'])) {
            $user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id' => $_SESSION['paasport_user_id']), '', 1);
            $slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
            $this->template->set('user', $user);
            $this->template->set('slug', $slug);
        }
    }

    public function createPaasport() {
//print_r($this->session->all_userdata());
        $this->load->model('login_model');
        $user_menu = $this->login_model->get_menu_by_user($_SESSION['user_id']);
        $user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id' => $_SESSION['paasport_user_id']), '', 1);
        $slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
//        print_r($user);
        if (!empty($user)) {

            $this->session->set_userdata('vcard_id', $user[0]['id']);

            $userdata = $this->common_model->getRecords(TABLES::$USERS, '*', array('id' => $this->session->userdata('paasport_user_id')));

            $userdata_paasport = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'id' => $this->session->userdata('vcard_id')));
            $user_company = $this->common_model->getRecords(TABLES::$VCARD_COMPANY_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));

            //To get User Experience, Education Details        
            $user_experience_data = $this->common_model->getRecords(TABLES::$EXPERIENCE_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->session->userdata('vcard_id')));
            $user_education_data = $this->common_model->getRecords(TABLES::$EDUCATION_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->session->userdata('vcard_id')));
            $user_skills = $this->common_model->getRecords(TABLES::$SKILLS_AND_EXPERTISE, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->session->userdata('vcard_id')));
            $user_priceplan = $this->common_model->getRecords(TABLES::$PRICE_PLAN, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->session->userdata('vcard_id')));

            $user_list = $this->common_model->getRecords(TABLES::$LIST_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->session->userdata('vcard_id')));
            $user_link = $this->common_model->getRecords(TABLES::$LINK_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->session->userdata('vcard_id')));
            $user_video_url = $this->common_model->getRecords(TABLES::$VIDEO_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->session->userdata('vcard_id')));
            $user_portfolio = $this->common_model->getRecords(TABLES::$PORTFOLIO_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->session->userdata('vcard_id')));
            $media_audio_list = $this->common_model->getRecords(TABLES::$PAASPORT_AUDIO, '*', array('paasport_user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->session->userdata('vcard_id')));
            $media_video_list = $this->common_model->getRecords(TABLES::$PAASPORT_VIDEO, '*', array('paasport_user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->session->userdata('vcard_id')));
            $gallary_list = $this->common_model->getRecords(TABLES::$PAASPORT_GALLARY, '*', array('paasport_user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->session->userdata('vcard_id')));
            $user_blog = $this->common_model->getRecords(TABLES::$BLOG_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->session->userdata('vcard_id')));
        } else {

            $userdata = $userdata_paasport = $user_company = $user_experience_data = $user_education_data = $user_skills = array();
            $user_priceplan = $user_list = $user_link = $user_video_url = $user_portfolio = array();
            $media_audio_list = $media_video_list = $gallary_list = $user_blog = array();
        }

        $this->template->set('user_blog', $user_blog);

        $this->template->set('user_data', $userdata_paasport);
        $this->template->set('user_company', $user_company);
        $this->template->set('user_exp_data', $user_experience_data);
        $this->template->set('user_edu_data', $user_education_data);
        $this->template->set('user_skills', $user_skills);
        $this->template->set('user_priceplan', $user_priceplan);
        $this->template->set('user_list', $user_list);
        $this->template->set('user_link', $user_link);
        $this->template->set('user_video_url', $user_video_url);
        $this->template->set('user_portfolio', $user_portfolio);
        $this->template->set('media_audio_list', $media_audio_list);
        $this->template->set('media_video_list', $media_video_list);
        $this->template->set('gallary_list', $gallary_list);



        $this->template->set('user_menu', $user_menu);

        $this->template->set('slug', $slug);
        $this->template->set('user', $user);
        $this->template->set('page', 'createpaasport');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend_silo')
                ->title('Create Paasport| Silo')
                ->set_partial('header', 'partials/header')
                ->set_partial('sidebar', $this->sidebar)
                ->set_partial('footer', 'partials/footer');
        $this->template->build('createpaasport');
    }

    public function index() {

        if (!isset($_SESSION)) {
            session_start();
        }
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }

        $session_data = $this->session->userdata();
        $userdata = $this->common_model->getRecords(TABLES::$USERS, '*', array('id' => $this->session->userdata('paasport_user_id')));

        $first_user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id' => $session_data['paasport_user_id']), 'id ASC', 1);

        //To get User Experience, Education Details        
        $user_experience_data = $this->common_model->getRecords(TABLES::$EXPERIENCE_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));

        $user_education_data = $this->common_model->getRecords(TABLES::$EDUCATION_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));

        $user_skills = $this->common_model->getRecords(TABLES::$SKILLS_AND_EXPERTISE, '*', array('user_id' => $this->session->userdata('paasport_user_id')));

        $user_priceplan = $this->common_model->getRecords(TABLES::$PRICE_PLAN, '*', array('user_id' => $this->session->userdata('paasport_user_id')));

        $user_list = $this->common_model->getRecords(TABLES::$LIST_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));

        $user_link = $this->common_model->getRecords(TABLES::$LINK_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));
        $user_video_url = $this->common_model->getRecords(TABLES::$VIDEO_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));
        $user_portfolio = $this->common_model->getRecords(TABLES::$PORTFOLIO_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));
        if (!empty($this->session->userdata('vcard_id'))) {
            $user_blog = $this->common_model->getRecords(TABLES::$BLOG_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->session->userdata('vcard_id')));
            $this->template->set('user_blog', $user_blog);
        }


        if (!empty($_SESSION['paasport_user_id'])) {
            $slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
            $this->template->set('slug', $slug);
        }
        $this->template->set('first_user', $first_user);
        $this->template->set('user_data', $userdata);
        $this->template->set('user_exp_data', $user_experience_data);
        $this->template->set('user_edu_data', $user_education_data);
        $this->template->set('user_skills', $user_skills);
        $this->template->set('user_priceplan', $user_priceplan);
        $this->template->set('user_list', $user_list);
        $this->template->set('user_link', $user_link);
        $this->template->set('user_video_url', $user_video_url);
        $this->template->set('user_portfolio', $user_portfolio);
        $this->template->set('page', 'dashboard');
        $this->template->set('page', 'dashboard');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('vcard_default')
                ->title('PaasPort | Dashboard')
                ->set_partial('header', 'partials/vcard_header');
        $this->template->build('vcard_main');
    }

    public function view($slug) {
        $this->load->library('google_url_api');
        $session_data = $this->session->userdata();
        $this->load->model('common_model');
        // $slug = $this->uri->segment(1);

        $data['user'] = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('slug' => $slug));

        $data['user_experience_data'] = $this->common_model->getRecords(TABLES::$EXPERIENCE_DETAILS, '*', array('user_id' => $data['user'][0]['user_id'], 'vcard_id' => $data['user'][0]['id']));

        $data['user_education_data'] = $this->common_model->getRecords(TABLES::$EDUCATION_DETAILS, '*', array('user_id' => $data['user'][0]['user_id'], 'vcard_id' => $data['user'][0]['id']));

        $data['user_skills'] = $this->common_model->getRecords(TABLES::$SKILLS_AND_EXPERTISE, '*', array('user_id' => $data['user'][0]['user_id'], 'vcard_id' => $data['user'][0]['id']));

        $data['user_blog'] = $this->common_model->getRecords(TABLES::$BLOG_DETAILS, '*', array('user_id' => $data['user'][0]['user_id'], 'vcard_id' => $data['user'][0]['id']), 'id DESC ', 2);


        $data['shorten_url'] = '';
        $url = current_url();
        $this->google_url_api->enable_debug(FALSE);
        $short_url = $this->google_url_api->shorten($url);
        //echo '<pre>'; print_r($short_url); 
        if (!empty($short_url->id))
            $data['shorten_url'] = $short_url->id;

        if (!empty($_SESSION['paasport_user_id'])) {
            $slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
            $this->template->set('slug', $slug);
        }
        $this->template->set('user', $data['user']);
        $this->template->set('user_experience_data', $data['user_experience_data']);
        $this->template->set('user_education_data', $data['user_education_data']);
        $this->template->set('user_skills', $data['user_skills']);
        $this->template->set('user_blog', $data['user_blog']);
        $this->template->set('shorten_url', $data['shorten_url']);


        $this->template->set('page', 'dashboard');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('vcard_view')
                ->title('PaasPort | Dashboard')
                ->set_partial('header', 'partials/vcard_header_view');
        $this->template->build('vcard_detail_view');




        // $this->load->view('vcard_detail_view',$data);
    }

    public function saveUserinfo() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;


        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('contact', 'Contact Number', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['email'] = form_error('email');
            $error_array['firstname'] = form_error('firstname');
            $error_array['contact'] = form_error('contact');
            $error_array['lastname'] = form_error('lastname');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            $user = array();
            if (isset($_FILES['wizard-picture']) && !empty($_FILES['wizard-picture']['name'])) {
                $config = array();
                $config['upload_path'] = './paas-port/uploads/users/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = FALSE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('wizard-picture')) {
                    $error = $this->upload->display_errors();
                    $map ['status'] = 0;
                    $map ['msg'] = "User Image upload error - " . $error;
                    echo json_encode($map);
                    exit;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                /* $filename = $_SERVER['DOCUMENT_ROOT']."/novaevcard/".$this->input->post('old_user_image'); 
                  if (file_exists($filename)) {
                  unlink($filename);
                  } */
                $user['user_image'] = "uploads/users/" . $data['upload_data']['file_name'];
            } else {
                // $user['user_image'] = $this->input->post('user_image_old');
            }
            if (isset($_FILES['cover_image']) && !empty($_FILES['cover_image']['name'])) {
                $config = array();
                $config['upload_path'] = './paas-port/uploads/silo_scan_disc/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = FALSE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('cover_image')) {
                    $error = $this->upload->display_errors();
                    $map ['status'] = 0;
                    $map ['msg'] = "User Image upload error - " . $error;
                    echo json_encode($map);
                    exit;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                /* $filename = $_SERVER['DOCUMENT_ROOT']."/novaevcard/".$this->input->post('old_user_image'); 
                  if (file_exists($filename)) {
                  unlink($filename);
                  } */
                $user['cover_image'] = "uploads/silo_scan_disc/" . $data['upload_data']['file_name'];
            } else {
                // $user['user_image'] = $this->input->post('user_image_old');
            }
            $user['first_name'] = $this->input->post('firstname');
            $user['last_name'] = $this->input->post('lastname');
            $user['mobile'] = $this->input->post('contact');
            $user['email'] = $this->input->post('email');
            $user['home_postal_code'] = $this->input->post('pincode');
            $user['home_address'] = $this->input->post('address');
            $user['user_id'] = $this->session->userdata('paasport_user_id');
            //$user1['id'] = $this->input->post('id');
            //$this->load->model('Login_model');
            // create slug
            $config = array(
                'field' => 'slug',
                'slug' => 'slug',
                'table' => TABLES::$VCARD_BASIC_DETAILS,
                'id' => 'id',
            );

            $this->load->library('slug', $config);

            $data_slug = array(
                'slug' => $user['first_name'] . " " . $user['last_name'],
            );

            $slug = $this->slug->create_uri($data_slug);

            $user['slug'] = $slug;
            // create slug

            $is_already_exists = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, 'id', array('user_id' => $this->session->userdata('paasport_user_id')), 'id asc', 1);

            //print_r($is_already_exists);
            if (empty($is_already_exists)) {
                $vcard_basic_id= $this->common_model->insertRow($user, TABLES::$VCARD_BASIC_DETAILS);
            } else {
                $vcard_basic_id= $is_already_exists[0]['id'];
                $update_vcard_basic= $this->common_model->updateRow(TABLES::$VCARD_BASIC_DETAILS, $user, array('user_id' => $this->session->userdata('paasport_user_id'),'id'=>$vcard_basic_id));
            }

            $paasport_status_update = $this->common_model->updateRow('membership', array('paasport_complete_status' => '1'), array('user_id' => $this->session->userdata('user_id')));
            
            if ($vcard_basic_id) {
                $this->session->set_userdata('vcard_id', $vcard_basic_id);
                $map ['status'] = 1;
                $map ['msg'] = "Basic Information has been saved";
                echo json_encode($map);
            }
        }
        exit;
    }

    public function validurl($str) {
        if (filter_var($str, FILTER_VALIDATE_URL) !== FALSE) {
            return TRUE;
        } else {
            $this->form_validation->set_message('validurl', 'The Website field must contain a valid Website URL.');
            return FALSE;
        }
    }

    public function saveCompanyInfo() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;

        $this->form_validation->set_rules('companyname', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('jobtitle1', 'Job Title', 'trim|required');
        $this->form_validation->set_rules('companyemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('companywebsite', 'Website', 'trim|required|callback_validurl');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['companyname'] = form_error('companyname');
            $error_array['jobtitle1'] = form_error('jobtitle1');
            $error_array['companyemail'] = form_error('companyemail');
            $error_array['companywebsite'] = form_error('companywebsite');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            if (!empty($this->session->userdata('vcard_id'))) {
                $user = array();
                $user['company_name'] = $this->input->post('companyname');
                $user['job_title'] = $this->input->post('jobtitle1');
                $user['start_date'] = date("Y-m-d", strtotime($this->input->post('startdate')));
                $user['work_phone'] = $this->input->post('companycontact');
                $user['work_email'] = $this->input->post('companyemail');
                $user['work_website'] = $this->input->post('companywebsite');
                //$user['user_id'] = $this->session->userdata('paasport_user_id');                                 
                $uid = $this->common_model->updateRow(TABLES::$VCARD_BASIC_DETAILS, $user, array('id' => $this->session->userdata('vcard_id')));
                if ($uid) {
                    $map ['status'] = 1;
                    $map ['msg'] = "Professional Information has been saved";
                    echo json_encode($map);
                }
            }
        }
        exit;
    }

    public function saveSocialInfo() {
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
        if (!empty($this->input->post('facebook_url'))) {
            $this->form_validation->set_rules('facebook_url', 'Facebook Link', 'callback_validurl');
        }
        if (!empty($this->input->post('twitter_url'))) {
            $this->form_validation->set_rules('twitter_url', 'Twitter Link', 'callback_validurl');
        }
        if (!empty($this->input->post('googleplus_url'))) {
            $this->form_validation->set_rules('googleplus_url', 'Google Plus Link', 'callback_validurl');
        }
        if (!empty($this->input->post('linkedin_url'))) {
            $this->form_validation->set_rules('linkedin_url', 'Twitter Link', 'callback_validurl');
        }
        if (!empty($this->input->post('youtube_url'))) {
            $this->form_validation->set_rules('youtube_url', 'Twitter Link', 'callback_validurl');
        }
        if (!empty($this->input->post('pinterest_url'))) {
            $this->form_validation->set_rules('pinterest_url', 'Twitter Link', 'callback_validurl');
        }
        $this->form_validation->set_rules('user_url', 'Email', 'trim|required|valid_email');


        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['facebook_url'] = form_error('facebook_url');
            $error_array['twitter_url'] = form_error('twitter_url');
            $error_array['googleplus_url'] = form_error('googleplus_url');
            $error_array['linkedin_url'] = form_error('linkedin_url');
            $error_array['youtube_url'] = form_error('youtube_url');
            $error_array['pinterest_url'] = form_error('pinterest_url');
            $error_array['user_url'] = form_error('user_url');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            //print_r($this->session->all_userdata());
            if (!empty($this->session->userdata('vcard_id'))) {
//            echo "here";
                $map = array();
                $user = array();
                $user['facebook_link'] = $this->input->post('facebook_url');
                $user['twitter_link'] = $this->input->post('twitter_url');
                $user['google_plus_link'] = $this->input->post('googleplus_url');
                $user['linkedin_link'] = $this->input->post('linkedin_url');
                $user['youtube_link'] = $this->input->post('youtube_url');
                $user['pinterest_link'] = $this->input->post('pinterest_url');
                $user['received_email'] = $this->input->post('user_url');
                $uid = $this->common_model->updateRow(TABLES::$VCARD_BASIC_DETAILS, $user, array('id' => $this->session->userdata('vcard_id')));
                $this->generateQRCode1();
                if ($uid) {
                    $map ['status'] = 1;
                    $map ['msg'] = "Social Information has been saved";
                    echo json_encode($map);
                }
            }
        }
        //echo '<pre>';
        // print_r($_POST);
        exit;
    }

    //Added by Ranjit on 09 May 2017 to save Short Bio info End
    public function saveShortBio() {
        //     $this->load->helper('utility_helper');
        $this->load->model('common_model');
        //        $this->load->helper(array(
        //            'form',
        //            'url'
        //        ));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        //$this->form_validation->set_rules('editor1', 'About Information', 'trim|required');

        /* if ($this->form_validation->run() == FALSE) {
          $map ['status'] = 0;
          $map ['msg'] = validation_errors();
          echo json_encode($map);
          } else { */

        $map = array();
        $user = array();
        if (!empty($this->session->userdata('vcard_id'))) {
            $user['short_bio'] = $this->input->post('short_bio');
            $user1['id'] = $this->input->post('id');
            $this->load->model('Login_model');
            $uid = $this->common_model->updateRow(TABLES::$VCARD_BASIC_DETAILS, $user, array('id' => $this->session->userdata('vcard_id')));
            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "Your data has been saved";
                echo json_encode($map);
            }
        }
        //}
        //echo '<pre>';
        // print_r($_POST);
        exit;
    }

    //Added by Ranjit on 09 May 2017 to save Short Bio info End
    //Added by Ranjit on 09 May 2017 to save Experience Start

    public function saveSkillsAndExerptise1() {
        //echo '<pre>'; print_r($_POST); //exit;
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));

        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;

        $map = array();
        $skill = array();
        $skill['user_id'] = $this->session->userdata('paasport_user_id');

        // add record
        if (!empty($_POST['txt_skill'])) {
            foreach ($_POST['txt_skill'] as $skill_item) {

                $skill['skill'] = $skill_item;
                $ins_skill = $this->common_model->insertRow($skill, TABLES::$SKILLS_AND_EXPERTISE);
            }
        }
        if (!empty($_POST['txt_skill_update'])) {
            $skill_update = array();
            foreach ($_POST['txt_skill_update'] as $skill_id => $skill_item_update) {

                $skill_update['skill'] = $skill_item_update;
                $skill_update['user_id'] = $skill['user_id'];
                $ins_skill = $this->common_model->updateRow(TABLES::$SKILLS_AND_EXPERTISE, $skill_update, array('id' => $_POST['txt_skill_update_id'][$skill_id]));
            }
        }
        // add record
        if ($ins_skill) {
            $map ['status'] = 1;
            $map ['msg'] = 'Skills & Expertise added successfully.';
        } else {
            $map ['status'] = 0;
            $map ['msg'] = "Unable to add Skills & Expertise.";
        }
        echo json_encode($map);
        exit;
    }

    public function getSkillsAndExerptise() {
        $this->load->model('common_model');
        $user_skills = $this->common_model->getRecords(TABLES::$SKILLS_AND_EXPERTISE, '*', array('user_id' => $this->session->userdata('paasport_user_id')));
        $str = '';
        if (!empty($user_skills)) {

            $exp_count1 = 0;
            foreach ($user_skills as $user_skill) {
                $exp_count1++;
                $str .= '<div class="form-group">
                    <input class="input_update form-control skill-text" name="txt_skill_update[]" id="tb_' . $user_skill['id'] . '" value="' . $user_skill['skill'] . '" type="text">
                    <input class="input_update_id form-control skill-text" name="txt_skill_update_id[]"  value="' . $user_skill['id'] . '" type="hidden">
                    </div>';
            }
        }
        echo $str;
        exit;
    }

    public function getSkillsAndExerptDetail() {
        $this->load->model('common_model');
        $user_skills = $this->common_model->getRecords(TABLES::$SKILLS_AND_EXPERTISE, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->input->post('vcard_id')));
        $str = '';
        if (!empty($user_skills)) {
            $str .= '<div  style="padding: 5px;">';
            $str .= '<p><b>Skills you have added:</b></p>';
            $exp_count1 = 0;
            foreach ($user_skills as $user_skill) {
                $exp_count1++;
                $str .= $user_skill['skill'] . '<br>';
            }
            $str .= '</div>';
        }
        echo $str;
        exit;
    }

    public function removeAllSkillsAndExerptise() {
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $user_id = $this->session->userdata('paasport_user_id');
        $this->common_model->deleteRows(array('user_id' => $user_id), TABLES::$SKILLS_AND_EXPERTISE, 'user_id');
        $delFlag = 1;

        if ($delFlag) {
            $map ['status'] = 1;
            $map ['msg'] = 'Skills & Expertise deleted successfully.';
        } else {
            $map ['status'] = 0;
            $map ['msg'] = "Unable to delete Skills & Expertise.";
        }
        echo json_encode($map);
        exit;
    }

    public function removeSkillsAndExerptise() {
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $user_id = $this->session->userdata('paasport_user_id');
        $delFlag = 0;
        if (!empty($this->input->post('skillid'))) {
            $this->common_model->deleteRows(array('id' => $this->input->post('skillid')), TABLES::$SKILLS_AND_EXPERTISE, 'id');
            $delFlag = 1;
        }

        if ($delFlag) {
            $map ['status'] = 1;
            $map ['msg'] = 'Skills & Expertise deleted successfully.';
        } else {
            $map ['status'] = 0;
            $map ['msg'] = "Unable to delete Skills & Expertise.";
        }
        echo json_encode($map);
        exit;
    }

    public function saveSkills() {
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));

        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $this->form_validation->set_rules('txt_skill', 'Skill & Expertise', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['txt_skill'] = form_error('txt_skill');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            $ins_experience = '';
            if (!empty($this->session->userdata('vcard_id'))) {
                $map = array();
                $experience = array();
                $experience['user_id'] = $this->session->userdata('paasport_user_id');
                $experience['skill'] = $this->input->post('txt_skill');
                $experience['vcard_id'] = $this->session->userdata('vcard_id');
                $ins_experience = $this->common_model->insertRow($experience, TABLES::$SKILLS_AND_EXPERTISE);
            }
            if ($ins_experience) {
                $map ['status'] = 1;
                $map ['ins_skill_id'] = $ins_experience;
                $map ['msg'] = 'Skill & Expertise saved successfully.';
            } else {
                $map ['status'] = 0;
                $map ['ins_skill_id'] = '';
                $map ['msg'] = "Unable to save Skill & Expertise.";
            }
            echo json_encode($map);
            exit;
        }
    }

    public function deleteSkill() {
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        if (!empty($this->input->post('skill_ids'))) {
            $delFlag = 0;
            foreach ($this->input->post('skill_ids') as $exp_id) {
                if (!empty($exp_id)) {
                    $this->common_model->deleteRows(array('id' => $exp_id), TABLES::$SKILLS_AND_EXPERTISE, 'id');
                    $delFlag = 1;
                }
            }
        }
        if ($delFlag) {
            $map ['status'] = 1;
            $map ['msg'] = 'Skill deleted successfully.';
        } else {
            $map ['status'] = 0;
            $map ['msg'] = "Unable to delete Skill.";
        }
        echo json_encode($map);
        exit;
    }

    public function saveSkillsAndExerptise() {



        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));

        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        //$this->form_validation->set_rules('instagram_link', 'Instagram Link', 'trim|required');

        /* if ($this->form_validation->run() == FALSE) {
          $map ['status'] = 0;
          $map ['msg'] = validation_errors();
          echo json_encode($map);
          } else { */
        $map = array();
        $skill = array();
        $skill['user_id'] = $this->session->userdata('paasport_user_id');


        $skill_temp = $this->input->get('skill_list');

        $skill_array = explode(",", $skill_temp);

        foreach ($skill_array as $skill_item) {

            //            echo '<br/>'.$skill_item;

            $skill['skill'] = $skill_item;

            $ins_skill = $this->common_model->insertRow($skill, TABLES::$SKILLS_AND_EXPERTISE);
        }

        if ($ins_skill) {
            $map ['status'] = 1;
            $map ['msg'] = 'Experience added successfully.';
        } else {
            $map ['status'] = 0;
            $map ['msg'] = "Unable to add experience.";
        }
        echo json_encode($map);
        exit;
    }

    //Added by Ranjit on 09 May 2017 to save Experience End





    public function saveExperience() {
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));

        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $this->form_validation->set_rules('prevCompanyName', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('prevJobTitle', 'Position Title', 'trim|required');
        $this->form_validation->set_rules('prevStartDate', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('prevEndDate', 'End Date', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['prevCompanyName'] = form_error('prevCompanyName');
            $error_array['prevJobTitle'] = form_error('prevJobTitle');
            $error_array['prevStartDate'] = form_error('prevStartDate');
            $error_array['prevEndDate'] = form_error('prevEndDate');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            $ins_experience = '';
            if (!empty($this->session->userdata('vcard_id'))) {
                $map = array();
                $experience = array();
                $experience['user_id'] = $this->session->userdata('paasport_user_id');
                $experience['company_name'] = $this->input->post('prevCompanyName');
                $experience['position_title'] = $this->input->post('prevJobTitle');
                $experience['start_date'] = date('Y-m-d', strtotime($this->input->post('prevStartDate')));

                $experience['end_date'] = date('Y-m-d', strtotime($this->input->post('prevEndDate')));
                $experience['vcard_id'] = $this->session->userdata('vcard_id');
                $ins_experience = $this->common_model->insertRow($experience, TABLES::$EXPERIENCE_DETAILS);
            }

            if ($ins_experience) {
                $map ['status'] = 1;
                $map ['ins_experience_id'] = $ins_experience;
                $map ['msg'] = 'Experience saved successfully.';
            } else {
                $map ['status'] = 0;
                $map ['ins_experience_id'] = '';
                $map ['msg'] = "Unable to save experience.";
            }
            echo json_encode($map);
            exit;
        }
    }

    public function getExperienceData() {


        $this->load->model('common_model');
        $session_data = $this->session->userdata();
        $user_skills = $this->common_model->getRecords(TABLES::$EXPERIENCE_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->input->post('vcard_id')));
        $str = '';
        if (!empty($user_skills)) {
            $cnt = 1;
            $str .= "<thead><tr><th>Select</th><th>Company Name</th><th>Position Title</th><th>Start Date</th><th>End Date</th><th></th></tr></thead><tbody>";
            foreach ($user_skills as $user_skill) {

                $str .= "<tr id=" . $user_skill['id'] . "><td><input type='checkbox' name='record' value=" . $user_skill['id'] . "></td><td>" . $user_skill['company_name'] . "</td><td>" . $user_skill['position_title'] . "</td><td>" . $user_skill['start_date'] . "</td><td>" . $user_skill['end_date'] . "</td><td>";
                $str .= "<a href='#' onclick=getExpDetailUpdate('" . $user_skill['id'] . "','" . $user_skill['company_name'] . "','" . $user_skill['position_title'] . "','" . $user_skill['start_date'] . "','" . $user_skill['end_date'] . "'); >Edit</a>";

                $str .= "</td></tr>";
                $cnt += 1;
            }
            $str .= "</tbody>";
        }
        echo $str;
        exit;
    }

    public function getExperienceDataMobile() {
        $this->load->model('common_model');
        $session_data = $this->session->userdata();
        $user_skills = $this->common_model->getRecords(TABLES::$EXPERIENCE_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->input->post('vcard_id')));
        $str = '';
        if (!empty($user_skills)) {
            $cnt = 1;
            foreach ($user_skills as $user_skill) {
                $str .= "<div id='info-remove" . $user_skill['id'] . "'><div class='content-company div-delete'> <strong>Company Name: </strong>" . $user_skill['company_name'] . "</div><div class='content-position div-delete'><strong>Position Title: </strong>" . $user_skill['position_title'] . "</div><div class='start-date div-delete'><strong>Start Date: </strong>" . $user_skill['start_date'] . "</div><div class='end-date div-delete'><strong>End Date: </strong>" . $user_skill['end_date'] . "</div><hr></div>";
                $cnt += 1;
            }
        }
        echo $str;
        exit;
    }

    //Delete Exp Start

    public function deleteExperience() {
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        if (!empty($this->input->post('exp_ids'))) {
            $delFlag = 0;
            foreach ($this->input->post('exp_ids') as $exp_id) {
                if (!empty($exp_id)) {
                    $this->common_model->deleteRows(array('id' => $exp_id), TABLES::$EXPERIENCE_DETAILS, 'id');
                    $delFlag = 1;
                }
            }
        }
        if ($delFlag) {
            $map ['status'] = 1;
            $map ['msg'] = 'Experience deleted successfully.';
        } else {
            $map ['status'] = 0;
            $map ['msg'] = "Unable to delete experience.";
        }
        echo json_encode($map);
        exit;
    }

    //Delete Exp End






    public function saveEducation() {

        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $this->form_validation->set_rules('eduInstituteName', 'Institute Name', 'trim|required');
        $this->form_validation->set_rules('degree', 'Degree or Certificate', 'trim|required');
        $this->form_validation->set_rules('eduStartDate', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('eduEndDate', 'End Date', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['eduInstituteName'] = form_error('eduInstituteName');
            $error_array['degree'] = form_error('degree');
            $error_array['eduStartDate'] = form_error('eduStartDate');
            $error_array['eduEndDate'] = form_error('eduEndDate');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            $ins_experience = '';
            if (!empty($this->session->userdata('vcard_id'))) {
                $map = array();
                $edu = array();
                $edu['user_id'] = $this->session->userdata('paasport_user_id');
                $edu['vcard_id'] = $this->session->userdata('vcard_id');
                $edu['institute_name'] = $this->input->post('eduInstituteName');
                $edu['degree_or_certificate'] = $this->input->post('degree');
                $edu['start_date'] = date('Y-m-d', strtotime($this->input->post('eduStartDate')));

                $edu['end_date'] = date('Y-m-d', strtotime($this->input->post('eduEndDate')));

                //if(empty($this->input->post('edu_det_id')))
                //{                     
                $ins_experience = $this->common_model->insertRow($edu, TABLES::$EDUCATION_DETAILS);
                //} 
                //else
                //{
                //  $ins_experience = $this->common_model->updateRow(TABLES::$EDUCATION_DETAILS,$edu,array('id'=>$this->input->post('edu_det_id')));
                //} 
            }
            if ($ins_experience) {
                $map ['ins_edu_id'] = $ins_experience;
                $map ['status'] = 1;
                $map ['msg'] = 'Education saved successfully.';
            } else {
                $map ['ins_edu_id'] = '';
                $map ['status'] = 0;
                $map ['msg'] = "Unable to save Education.";
            }
            echo json_encode($map);
            exit;
        }
    }

    public function getEducationData() {
        $this->load->model('common_model');
        $session_data = $this->session->userdata();
        $user_skills = $this->common_model->getRecords(TABLES::$EDUCATION_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->input->post('vcard_id')));
        $str = '';
        if (!empty($user_skills)) {
            $cnt = 1;
            $str .= "<thead><tr><th>Select</th><th>Company Name</th><th>Position Title</th><th>Start Date</th><th>End Date</th><th></th></tr></thead><tbody>";
            foreach ($user_skills as $user_skill) {

                $str .= "<tr id=" . $user_skill['id'] . "><td><input type='checkbox' name='record' value=" . $user_skill['id'] . "></td><td>" . $user_skill['institute_name'] . "</td><td>" . $user_skill['degree_or_certificate'] . "</td><td>" . $user_skill['start_date'] . "</td><td>" . $user_skill['end_date'] . "</td><td>";


                $str .= "<a href='#' onclick=getEduDetailUpdate('" . $user_skill['id'] . "','" . $user_skill['institute_name'] . "','" . $user_skill['degree_or_certificate'] . "','" . $user_skill['start_date'] . "','" . $user_skill['end_date'] . "'); >Edit</a>";

                $str .= "</td></tr>";
                $cnt += 1;
            }
            $str .= "</tbody>";
        }
        echo $str;
        exit;
    }

    public function getSkillData() {
        $this->load->model('common_model');
        $session_data = $this->session->userdata();
        $user_skills = $this->common_model->getRecords(TABLES::$SKILLS_AND_EXPERTISE, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->input->post('vcard_id')));
        $str = '';
        if (!empty($user_skills)) {
            $cnt = 1;
            $str .= "<thead><tr><th>Select</th><th>Skill</th><th></th></tr></thead><tbody>";
            foreach ($user_skills as $user_skill) {

                $str .= "<tr id=" . $user_skill['id'] . "><td><input type='checkbox' name='record' value=" . $user_skill['id'] . "></td><td>" . $user_skill['skill'] . "</td><td>";


                $str .= "<a href='#' onclick=getSkillDetailUpdate('" . $user_skill['id'] . "','" . $user_skill['skill'] . "'); >Edit</a>";

                $str .= "</td></tr>";
                $cnt += 1;
            }
            $str .= "</tbody>";
        }
        echo $str;
        exit;
    }

    public function getEducationDataMobile() {
        $this->load->model('common_model');
        $session_data = $this->session->userdata();
        $user_skills = $this->common_model->getRecords(TABLES::$EDUCATION_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->input->post('vcard_id')));
        $str = '';
        if (!empty($user_skills)) {
            $cnt = 1;
            foreach ($user_skills as $user_skill) {
                $str .= "<div id='info-remove" . $user_skill['id'] . "'><div class='content-company div-delete'> <strong>Institute Name: </strong>" . $user_skill['institute_name'] . "</div><div class='content-position div-delete'><strong>Degree or Certificate: </strong>" . $user_skill['degree_or_certificate'] . "</div><div class='start-date div-delete'><strong>Start Date: </strong>" . $user_skill['start_date'] . "</div><div class='end-date div-delete'><strong>End Date: </strong>" . $user_skill['end_date'] . "</div><hr></div>";

                $cnt += 1;
            }
        }
        echo $str;
        exit;
    }

    public function deleteEducation() {
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        if (!empty($this->input->post('edu_ids'))) {
            $delFlag = 0;
            foreach ($this->input->post('edu_ids') as $edu_id) {
                if (!empty($edu_id)) {
                    $this->common_model->deleteRows(array('id' => $edu_id), TABLES::$EDUCATION_DETAILS, 'id');
                    $delFlag = 1;
                }
            }
        }
        if ($delFlag) {
            $map ['status'] = 1;
            $map ['msg'] = 'Education deleted successfully.';
        } else {
            $map ['status'] = 0;
            $map ['msg'] = "Unable to delete Education.";
        }
        echo json_encode($map);
        exit;
    }

    // Start save price plan
    public function savePricePlan() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;


        $this->form_validation->set_rules('pricingtitle', 'Price Title', 'trim|required');
        $this->form_validation->set_rules('pricingdescription', 'Price Description', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['pricingtitle'] = form_error('pricingtitle');
            $error_array['pricingdescription'] = form_error('pricingdescription');
            $map ['msg'] = $error_array;
            echo json_encode($map);
            exit;
        } else {
            $ins_experience = '';
            if (!empty($this->session->userdata('vcard_id'))) {

                $price_plan = array();
                $price_plan['plan_title'] = $this->input->post('pricingtitle');
                $price_plan['plan_description'] = $this->input->post('pricingdescription');
                $price_plan['price'] = $this->input->post('pricingprice');
                $price_plan['user_id'] = $this->session->userdata('paasport_user_id');
                $price_plan['vcard_id'] = $this->session->userdata('vcard_id');

                if (empty($this->input->post('pricing_id1'))) {
                    $ins_experience = $this->common_model->insertRow($price_plan, TABLES::$PRICE_PLAN);
                } else {
                    $ins_experience = $this->common_model->updateRow(TABLES::$PRICE_PLAN, $price_plan, array('id' => $this->input->post('pricing_id1')));
                }
            }

            if ($ins_experience) {
                $map ['ins_price_id'] = $ins_experience;
                $map ['status'] = 1;
                $map ['msg'] = 'Price Plan added successfully.';
            } else {
                $map ['ins_edu_id'] = '';
                $map ['status'] = 0;
                $map ['msg'] = "Unable to  add Price Plan.";
            }
            echo json_encode($map);
            exit;
        }
    }

    public function deletePrice() {
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $user_id = $this->session->userdata('paasport_user_id');
        $delFlag = 0;
        if (!empty($this->input->post('price_id'))) {
            $this->common_model->deleteRows(array('id' => $this->input->post('price_id')), TABLES::$PRICE_PLAN, 'id');
            $delFlag = 1;
        }

        if ($delFlag) {
            $map ['status'] = 1;
            $map ['msg'] = 'Price Plan deleted successfully.';
        } else {
            $map ['status'] = 0;
            $map ['msg'] = "Unable to delete Price Plan.";
        }
        echo json_encode($map);
        exit;
    }

    // End save price plan
    // start save price plan image
    public function savePricePlanImage() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();

        $errorMsg = array();
        $err_num = 0;
        $user = array();
        $map = array();
        $imap = array();
        if (empty($this->input->post('pricing_id'))) {
            $img_upload_flag = 0;

            if (!empty($this->session->userdata('vcard_id'))) {
                //print_r($_FILES['file']['name']);
                if (!empty($_FILES['file']['name'][0])) {

                    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                        $_FILES['ufile']['name'] = $_FILES['file']['name'][$i];
                        $_FILES['ufile']['type'] = $_FILES['file']['type'][$i];
                        $_FILES['ufile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                        $_FILES['ufile']['error'] = $_FILES['file']['error'][$i];
                        $_FILES['ufile']['size'] = $_FILES['file']['size'][$i];

                        $config = array();
                        $config['upload_path'] = './paas-port/uploads/price_plan/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['remove_spaces'] = TRUE;
                        $config['encrypt_name'] = TRUE;
                        $config['overwrite'] = FALSE;


                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('ufile')) {
                            $error = $this->upload->display_errors();
                            $map ['status'] = 0;
                            $map ['msg'] = "User Image upload error - " . $error;
                            echo json_encode($map);
                            exit;
                        } else {
                            $data = array('upload_data' => $this->upload->data());
                        }

                        $user['plan_image'] = "uploads/price_plan/" . $data['upload_data']['file_name'];
                        $user['user_id'] = $this->session->userdata('paasport_user_id');
                        $user['vcard_id'] = $this->session->userdata('vcard_id');

                        $ins_experience = $this->common_model->insertRow($user, TABLES::$PRICE_PLAN);
                        if ($ins_experience) {
                            $img_upload_flag = 1;
                            $map [$i]['user_img'] = base_url() . $user['plan_image'];
                            $map [$i]['ins_price_id'] = $ins_experience;
                            $map [$i]['status'] = 1;
                            $map [$i]['msg'] = 'Price Plan Image uploaded successfully.';
                        } else {
                            $map [$i]['user_img'] = '';
                            $map [$i]['ins_edu_id'] = '';
                            $map [$i]['status'] = 0;
                            $map [$i]['msg'] = "Unable to upload Price Plan Image.";
                        }
                        //echo json_encode($map);
                        //exit;
                    }
                    if ($img_upload_flag == 1) {
                        $imap['img_upload_flag'] = 1;
                        $imap['image'] = $map;
                        $imap ['status'] = 1;
                        $imap ['msg'] = 'Price Plan Image uploaded successfully.';
                    } else {
                        $imap['img_upload_flag'] = 0;
                        $imap['image'] = '';
                        $imap ['status'] = 0;
                        $imap ['msg'] = 'Unable to upload Price Plan Image.';
                    }
                    echo json_encode($imap);
                    exit;
                }
            }
        } else {


            $config = array();
            $config['upload_path'] = './paas-port/uploads/price_plan/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['overwrite'] = FALSE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('updatefile')) {
                $error = $this->upload->display_errors();
                $map ['status'] = 0;
                $map ['msg'] = "User Image upload error - " . $error;
                echo json_encode($map);
                exit;
            } else {
                $data = array('upload_data' => $this->upload->data());
            }

            $user['plan_image'] = "uploads/price_plan/" . $data['upload_data']['file_name'];

            $ins_experience = $this->common_model->updateRow(TABLES::$PRICE_PLAN, $user, array('id' => $this->input->post('pricing_id')));
            if ($ins_experience) {
                $map['img_upload_flag'] = 1;
                $map['image'] = '';
                $map ['status'] = 1;
                $map ['msg'] = 'Price Plan Image uploaded successfully.';
            } else {
                $map['img_upload_flag'] = 0;
                $map['image'] = '';
                $map ['status'] = 0;
                $map ['msg'] = 'Unable to upload Price Plan Image.';
            }
        }
        echo json_encode($map);
        exit;
    }

    public function getPriceData() {
        $this->load->model('common_model');
        $session_data = $this->session->userdata();
        $user_priceplan = $this->common_model->getRecords(TABLES::$PRICE_PLAN, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->input->post('vcard_id')));
        $str = '';
        if (!empty($user_priceplan)) {
            foreach ($user_priceplan as $u_plan) {
                if (!empty($u_plan['plan_title'])) {

                    $var_open_price = '"' . $u_plan['id'] . '","' . $u_plan['plan_title'] . '","' . $u_plan['plan_description'] . '","' . $u_plan['price'] . '"';
                    $var_del_image = '"' . $u_plan['id'] . '"';


                    $str .= '<div class="panel panel-success panel-price-plan-' . $u_plan['id'] . '">';
                    $str .= '<div class="panel-heading">';
                    $str .= '<h3 class="panel-title">' . $u_plan['plan_title'] . '</h3>';
                    $str .= '<div class="pull-right">';
                    $str .= '<span id="editpanel" class="badge editbutton" title="Edit" onclick=openPrice(' . $var_open_price . ') >';
                    $str .= '<i class="fa fa-pencil-square-o"></i></span>';
                    $str .= '<span id="deletepanel" class="badge editbutton" title="Delete" onclick=deletePrice(' . $var_del_image . ') >';
                    $str .= '<i class="fa fa-trash"></i></span><span class="pull-right clickable">';
                    $str .= '<i class="glyphicon glyphicon-chevron-up"></i></span></div></div>';
                    $str .= '<div class="panel-body"><div class="panel-body-content">' . $u_plan['plan_description'] . '</div><div class="footer1">' . $u_plan['price'] . '</div>';
                    $str .= '</div></div>';
                } else if (!empty($u_plan['plan_image'])) {
                    $var_open_image = '"' . $u_plan['id'] . '","' . $u_plan['plan_image'] . '"';
                    $var_del_image = '"' . $u_plan['id'] . '"';

                    $str .= '<div class="panel panel-success panel-price-plan-' . $u_plan['id'] . '">';
                    $str .= '<div class="panel-heading">';
                    $str .= '<h3 class="panel-title"></h3>';
                    $str .= '<div class="pull-right">';
                    $str .= '<span id="editpanel" class="badge editbutton" onclick=openPriceImage(' . $var_open_image . '); title="Edit" >';
                    $str .= '<i class="fa fa-pencil-square-o"></i></span>';
                    $str .= '<span id="deletepanel" class="badge editbutton" title="Delete" onclick=deletePrice(' . $var_del_image . ') >';
                    $str .= '<i class="fa fa-trash"></i></span><span class="pull-right clickable">';
                    $str .= '<i class="glyphicon glyphicon-chevron-up"></i></span></div></div>';
                    $str .= '<div class="panel-body"><div class="panel-body-content"><img src="' . base_url() . $u_plan['plan_image'] . '" class="img-responsive"/> </div><div class="footer1"></div>';
                    $str .= '</div></div>';
                }
            }
        }
        echo $str;
        exit;
    }

    // End save price plan image
    // start save list  
    public function saveList() {

        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;

        $this->form_validation->set_rules('listname', 'List', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['listname'] = form_error('listname');
            $map ['msg'] = $error_array;
            echo json_encode($map);
            exit;
        } else {
            $ins_experience = '';
            if (!empty($this->session->userdata('vcard_id'))) {

                $price_plan = array();
                $price_plan['list'] = $this->input->post('listname');
                $price_plan['user_id'] = $this->session->userdata('paasport_user_id');
                $price_plan['vcard_id'] = $this->session->userdata('vcard_id');


                if (empty($this->input->post('list_id'))) {
                    $ins_experience = $this->common_model->insertRow($price_plan, TABLES::$LIST_DETAILS);
                } else {
                    $ins_experience = $this->common_model->updateRow(TABLES::$LIST_DETAILS, $price_plan, array('id' => $this->input->post('list_id')));
                }
            }
            if ($ins_experience) {
                $map ['ins_price_id'] = $ins_experience;
                $map ['status'] = 1;
                $map ['msg'] = 'List saved successfully.';
            } else {
                $map ['ins_edu_id'] = '';
                $map ['status'] = 0;
                $map ['msg'] = "Unable to save List.";
            }
            echo json_encode($map);
            exit;
        }
    }

    public function getListData() {
        $this->load->model('common_model');
        $session_data = $this->session->userdata();
        $user_skills = $this->common_model->getRecords(TABLES::$LIST_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));
        $str = '';
        if (!empty($user_skills)) {
            $cnt = 1;
            $str .= " <thead><tr> <th width='80'>Sr. No.</th><th>List Names</th></tr></thead><tbody>";
            foreach ($user_skills as $user_skill) {
                $str .= "<tr><td> " . $cnt . "</td><td>" . $user_skill['list'] . "</td></tr>";
                $cnt += 1;
            }
            $str .= "</tbody>";
        }
        echo $str;
        exit;
    }

    public function getMainListData() {
        $this->load->model('common_model');
        $session_data = $this->session->userdata();
        $user_skills = $this->common_model->getRecords(TABLES::$LIST_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->input->post('vcard_id')));
        $str = '';
        if (!empty($user_skills)) {
            $cnt = 1;
            foreach ($user_skills as $user_skill) {
                $str .= "<li>" . $user_skill['list'];

                $str .= "<div class='pull-right'>";
                $str .= "<span id='editpanellists' class='badge editbutton' title='Edit' onclick=openList('" . $user_skill['id'] . "','" . $user_skill['list'] . "'); ><i class='fa fa-pencil-square-o'></i></span></div>";

                $str .= "</li>";
                $cnt += 1;
            }
        }
        echo $str;
        exit;
    }

    public function getListDataMobile() {
        $this->load->model('common_model');
        $session_data = $this->session->userdata();
        $user_skills = $this->common_model->getRecords(TABLES::$LIST_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->input->post('vcard_id')));
        $str = '';
        if (!empty($user_skills)) {
            $cnt = 1;
            foreach ($user_skills as $user_skill) {
                $str .= "<li>" . $user_skill['list'];
                $str .= "</li>";
                $cnt += 1;
            }
        }
        echo $str;
        exit;
    }

    // end save list
    // start save link  
    public function saveLink() {

        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;


        $this->form_validation->set_rules('addlink', 'Link', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
            exit;
        } else {
            $ins_experience = '';
            if (!empty($this->session->userdata('vcard_id'))) {
                $price_plan = array();
                $price_plan['link'] = $this->input->post('addlink');
                $price_plan['user_id'] = $this->session->userdata('paasport_user_id');
                $price_plan['vcard_id'] = $this->session->userdata('vcard_id');

                if (empty($this->input->post('addlink_id'))) {
                    $ins_experience = $this->common_model->insertRow($price_plan, TABLES::$LINK_DETAILS);
                } else {
                    $ins_experience = $this->common_model->updateRow(TABLES::$LINK_DETAILS, $price_plan, array('id' => $this->input->post('addlink_id')));
                }
            }

            if ($ins_experience) {
                $map ['ins_price_id'] = $ins_experience;
                $map ['status'] = 1;
                $map ['msg'] = 'Link saved successfully.';
            } else {
                $map ['ins_edu_id'] = '';
                $map ['status'] = 0;
                $map ['msg'] = "Unable to saved Link.";
            }
            echo json_encode($map);
            exit;
        }
    }

    public function getLinkData() {
        $this->load->model('common_model');
        $session_data = $this->session->userdata();
        $user_skills = $this->common_model->getRecords(TABLES::$LINK_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->input->post('vcard_id')));
        $str_arr = array();
        if (!empty($user_skills)) {
            $cnt = 1;
            $str_arr['table'] = "<thead><tr><th width='80'>Sr. No.</th><th>Links</th></tr></thead><tbody>";
            $str_arr['main_table'] = "";
            foreach ($user_skills as $user_skill) {
                $str_arr['table'] .= "<tr><td> " . $cnt . "</td><td>" . $user_skill['link'] . "</td></tr>";
                $str_arr['main_table'] .= "<div class='linking'><a href=''>" . $user_skill['link'] . "</a><span class='pull-right'><i class='fa fa-external-link' aria-hidden='true'></i></span>";

                $str_arr['main_table'] .= "<div class='pull-right'>";
                $str_arr['main_table'] .= "<span id='editpanellinks' class='badge editbutton' title='Edit' onclick=openLink('" . $user_skill['id'] . "','" . $user_skill['link'] . "');>";
                $str_arr['main_table'] .= "<i class='fa fa-pencil-square-o'></i></span></div>";

                $str_arr['main_table'] .= "</div>";
                $str_arr['moblie_table'] .= "<div class='linking'><a href=''>" . $user_skill['link'] . "<span class='pull-right'><i class='fa fa-external-link' aria-hidden='true'></i></span></a></div>";
                $cnt += 1;
            }
            $str_arr['table'] .= "</tbody>";
        }
        echo json_encode($str_arr);
        exit;
    }

    // end save list

    public function validvideourl($str) {
        if (strpos($str, 'embed') == FALSE && strpos($str, 'youtu.be') == FALSE) {
            $this->form_validation->set_message('validvideourl', 'Please insert youtube embed url.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    // start save video url 
    public function getVideoData() {

        $this->load->model('common_model');
        $session_data = $this->session->userdata();
        $user_skills = $this->common_model->getRecords(TABLES::$VIDEO_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->input->post('vcard_id')));
        $str_arr = array();
        if (!empty($user_skills)) {
            $cnt = 1;
            $str_arr['table'] = "<thead><tr><th width='80'>Sr. No.</th><th>Video URL</th></tr></thead><tbody>";

            $str_arr['main_table'] = "";
            foreach ($user_skills as $user_skill) {
                $str_arr['table'] .= "<tr><td> " . $cnt . "</td><td>" . $user_skill['video_url'] . "</td></tr>";
                $str_arr['main_table'] .= "<div class='panel-body-content text-center'><div class='embed-responsive embed-responsive-4by3'><iframe class='embed-responsive-item' src=" . $user_skill['video_url'] . "></iframe></div><hr><div>" . $user_skill['video_description'] . "";

                $str_arr['main_table'] .= "<div class='pull-right'>";
                $str_arr['main_table'] .= "<span id='editpanellinks' class='badge editbutton' title='Edit' onclick=openvideo('" . $user_skill['id'] . "','" . $user_skill['video_url'] . "','" . $user_skill['video_description'] . "');>";
                $str_arr['main_table'] .= "<div class='pull-right'><i class='fa fa-pencil-square-o'></i></span></div>";

                $str_arr['main_table'] .= "</div></div>";
                $str_arr['moblie_table'] .= "<div class='panel-body-content text-center'><div class='embed-responsive embed-responsive-4by3'><iframe class='embed-responsive-item' src=" . $user_skill['video_url'] . "></iframe></div><hr><div>" . $user_skill['video_description'] . "</div></div>";
                $cnt += 1;
            }
            $str_arr['table'] .= "</tbody>";
        }
        echo json_encode($str_arr);
        exit;
    }

    public function saveVideoUrl() {

        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $this->form_validation->set_rules('videourl', 'Video URL', 'trim|required|callback_validvideourl');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['videourl'] = form_error('videourl');
            $map ['msg'] = $error_array;
            echo json_encode($map);
            exit;
        } else {
            $ins_experience = '';
            if (!empty($this->session->userdata('vcard_id'))) {

                $price_plan = array();
                $price_plan['video_url'] = $this->input->post('videourl');
                $price_plan['video_description'] = $this->input->post('video_description');
                $price_plan['user_id'] = $this->session->userdata('paasport_user_id');
                $price_plan['vcard_id'] = $this->session->userdata('vcard_id');

                if (empty($this->input->post('videourl_id'))) {
                    $ins_experience = $this->common_model->insertRow($price_plan, TABLES::$VIDEO_DETAILS);
                } else {

                    $ins_experience = $this->common_model->updateRow(TABLES::$VIDEO_DETAILS, $price_plan, array('id' => $this->input->post('videourl_id')));
                }
            }




            if ($ins_experience) {
                $map ['ins_price_id'] = $ins_experience;
                $map ['status'] = 1;
                $map ['msg'] = 'Video URL added successfully.';
            } else {
                $map ['ins_edu_id'] = '';
                $map ['status'] = 0;
                $map ['msg'] = "Unable to  add Video URL.";
            }
            echo json_encode($map);
            exit;
        }
    }

    // end  save video url

    public function generateQRCode1() {
        $this->load->model('common_model');
        $session_data = $this->session->all_userdata();
        if (!empty($this->session->userdata('paasport_user_id'))) {
            $chk_user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));

            //if(count($chk_user)==1)
            //{ 
            if (!empty($this->session->userdata('vcard_id'))) {

                $user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'id' => $this->session->userdata('vcard_id')));

                //echo $this->session->userdata('vcard_id');
                //print_r($this->session->userdata('paasport_user_id'));

                $slug = $user[0]['slug'];
                //Generate qr code start

                $this->load->library('Ciqrcode');

                $params['data'] = base_url() . $slug;
                $params['level'] = 'H';
                $params['size'] = 5;
                $params['savename'] = FCPATH . 'paas-port/vcard_qrcode_file/paasport_qrcode.png';

                $this->ciqrcode->generate($params);

                //Generate qr code end
                //To update slug,qr code and ext start

                $content = file_get_contents(base_url() . "paas-port/vcard_qrcode_file/paasport_qrcode.png");
                //$content=mysql_escape_string($content);
                $qr_code_image = $content;
                // $user['qr_code_image'] = $qr_code_image;

                @list(,, $imtype, ) = getimagesize(base_url() . "paas-port/vcard_qrcode_file/paasport_qrcode.png");

                if ($imtype == 3) {
                    $ext = "png";
                } elseif ($imtype == 2) {
                    $ext = "jpeg";
                } elseif ($imtype == 1) {
                    $ext = "gif";
                } else {
                    $ext = "png";
                }

                // $user['qr_code_image_ext'] = $ext;


                $this->common_model->updateRow(TABLES::$VCARD_BASIC_DETAILS, array("qr_code_image" => $qr_code_image, "qr_code_image_ext" => $ext), array("id" => $this->session->userdata('vcard_id')));
            }
            //} 
        }
    }

    public function generateQRCode() {
        // qr code image generation Start 

        $this->load->library('ciqrcode');

        // $params['data'] = 'http://rebelute.in';
        $params['data'] = $_SESSION['user_account']['email'];
        $params['level'] = 'H';
        $params['size'] = 5;
        $params['savename'] = FCPATH . 'paas-port/vcard_qrcode_file/vcard_qrcode.png';
        $this->ciqrcode->generate($params);

        // qr code image generation end /
        // echo '<img src="'.base_url().'paas-port/vcard_qrcode_file/vcard_qrcode.png" />';


        $content = file_get_contents(base_url() . "paas-port/vcard_qrcode_file/vcard_qrcode.png");
        //$content=mysql_escape_string($content);

        @list(,, $imtype, ) = getimagesize(base_url() . "paas-port/vcard_qrcode_file/vcard_qrcode.png");

        if ($imtype == 3) {
            $ext = "png";
        } elseif ($imtype == 2) {
            $ext = "jpeg";
        } elseif ($imtype == 1) {
            $ext = "gif";
        } else {
            $ext = "png";
        }


        /* $qrcode_details = array(
          'name' => $params['data'],
          'qr_code' => $content,
          'ext' => $ext
          );


          $this->load->model('qr_code');

          $result_ins_qrc=$this->qr_code->generate_qr_code($qrcode_details);
          echo '<pre>';
          print_r($result_ins_qrc);
          exit; */

        $this->common_model->updateRow(TABLES::$USERS, array("slug" => $slug, "qr_code_image" => $qr_code_image, "qr_code_image_ext" => $ext), array("id" => $user['user_id']));
    }

    //start  save portfolio
    public function savePortfolio() {

        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;

        if (!empty($this->input->post('portfolioDiv')) && $this->input->post('portfolioDiv') == 'descprining1') {
            $this->form_validation->set_rules('videourl_portfolio', 'Video URL', 'trim|required|callback_validvideourl');
            if ($this->form_validation->run() == FALSE) {
                $map ['status'] = 0;
                $error_array = array();
                $error_array['videourl_portfolio'] = form_error('videourl_portfolio');
                $map ['msg'] = $error_array;
                $map['img_upload_flag'] = 2;
                echo json_encode($map);
                exit;
            }
        }
        $user = array();
        $map = array();
        if (empty($this->input->post('videourl_portfolio_id'))) {
            if (!empty($_FILES['file-2']['name'][0])) {
                $imap = array();
                $img_upload_flag = 0;
                for ($i = 0; $i < count($_FILES['file-2']['name']); $i++) {
                    $_FILES['ufile']['name'] = $_FILES['file-2']['name'][$i];
                    $_FILES['ufile']['type'] = $_FILES['file-2']['type'][$i];
                    $_FILES['ufile']['tmp_name'] = $_FILES['file-2']['tmp_name'][$i];
                    $_FILES['ufile']['error'] = $_FILES['file-2']['error'][$i];
                    $_FILES['ufile']['size'] = $_FILES['file-2']['size'][$i];

                    $config = array();
                    $config['upload_path'] = './paas-port/uploads/portfolio/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['remove_spaces'] = TRUE;
                    $config['encrypt_name'] = TRUE;
                    $config['overwrite'] = FALSE;


                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('ufile')) {
                        $error = $this->upload->display_errors();
                        $map ['status'] = 0;
                        $map ['msg'] = "User Image upload error - " . $error;
                        echo json_encode($map);
                        exit;
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                    }

                    $user['image'] = "uploads/portfolio/" . $data['upload_data']['file_name'];
                    $user['user_id'] = $this->session->userdata('paasport_user_id');
                    $user['vcard_id'] = $this->session->userdata('vcard_id');

                    $ins_experience = $this->common_model->insertRow($user, TABLES::$PORTFOLIO_DETAILS);
                    if ($ins_experience) {
                        $img_upload_flag = 1;
                        $map [$i]['user_img'] = base_url() . $user['image'];
                        $map [$i]['ins_price_id'] = $ins_experience;
                        $map [$i]['status'] = 1;
                        $map [$i]['msg'] = 'Portfolio uploaded successfully.';
                    } else {
                        $img_upload_flag = 0;
                        $map [$i]['user_img'] = '';
                        $map [$i]['ins_edu_id'] = '';
                        $map [$i]['status'] = 0;
                        $map [$i]['msg'] = "Unable to upload Portfolio Image.";
                    }
                    //echo json_encode($map);
                    //exit;
                }
                if ($img_upload_flag == 1) {
                    $imap['img_upload_flag'] = 1;
                    $imap['image'] = $map;
                    $imap ['status'] = 1;
                    $imap ['msg'] = 'Portfolio uploaded successfully.';
                } else {
                    $imap['img_upload_flag'] = 0;
                    $imap['image'] = '';
                    $imap ['status'] = 0;
                    $imap ['msg'] = 'Unable to upload Portfolio Image.';
                }
                echo json_encode($imap);
                exit;
            }
        } else {
            if (!empty($_FILES['portfolioImg_updatefile']['name'])) {
                $config = array();
                $config['upload_path'] = './paas-port/uploads/portfolio/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = FALSE;


                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('portfolioImg_updatefile')) {
                    $error = $this->upload->display_errors();
                    $map ['status'] = 0;
                    $map ['msg'] = "User Image upload error - " . $error;
                    echo json_encode($map);
                    exit;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }

                $user['image'] = "uploads/portfolio/" . $data['upload_data']['file_name'];
                $user['user_id'] = $this->session->userdata('paasport_user_id');
                $user['vcard_id'] = $this->session->userdata('vcard_id');

                $ins_experience = $this->common_model->updateRow(TABLES::$PORTFOLIO_DETAILS, $user, array('id' => $this->input->post('videourl_portfolio_id')));

                if ($ins_experience) {
                    $map['img_upload_flag'] = 1;
                    $map['image'] = '';
                    $map ['status'] = 1;
                    $map ['msg'] = 'Price Plan Image uploaded successfully.';
                } else {
                    $map['img_upload_flag'] = 0;
                    $map['image'] = '';
                    $map ['status'] = 0;
                    $map ['msg'] = 'Unable to upload Price Plan Image.';
                }
                echo json_encode($map);
                exit;
            }
        }

        if (!empty($this->input->post('videourl_portfolio'))) {
            $user['video_url'] = $this->input->post('videourl_portfolio');
            $user['user_id'] = $this->session->userdata('paasport_user_id');
            $user['vcard_id'] = $this->session->userdata('vcard_id');
            if (!empty($user)) {

                if (empty($this->input->post('videourl_portfolio_id'))) {
                    $ins_experience = $this->common_model->insertRow($user, TABLES::$PORTFOLIO_DETAILS);
                } else {
                    $ins_experience = $this->common_model->updateRow(TABLES::$PORTFOLIO_DETAILS, $user, array('id' => $this->input->post('videourl_portfolio_id')));
                }


                if ($ins_experience) {
                    $map['img_upload_flag'] = 2;
                    $map['user_img'] = '';
                    $map ['ins_price_id'] = $ins_experience;
                    $map ['status'] = 1;
                    $map ['msg'] = 'Portfolio uploaded successfully.';
                } else {
                    $map['img_upload_flag'] = 2;
                    $map['user_img'] = '';
                    $map ['ins_edu_id'] = '';
                    $map ['status'] = 0;
                    $map ['msg'] = "Unable to upload Portfolio.";
                }
                echo json_encode($map);
                exit;
            }
        }


        exit;
    }

    // End save portfolio   
    //  vcard update
    public function updateVcard() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }

        $session_data = $this->session->userdata();

        $userdata = $this->common_model->getRecords(TABLES::$USERS, '*', array('id' => $this->session->userdata('paasport_user_id')));

        $userdata_paasport = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id' => $session_data['paasport_user_id']));



        //$user_company = $this->common_model->getRecords(TABLES::$VCARD_COMPANY_DETAILS, '*', array('user_id' => $session_data['paasport_user_id']));
        //To get User Experience, Education Details        
        //$user_experience_data = $this->common_model->getRecords(TABLES::$EXPERIENCE_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));
        // $user_education_data = $this->common_model->getRecords(TABLES::$EDUCATION_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));
        //$user_skills= $this->common_model->getRecords(TABLES::$SKILLS_AND_EXPERTISE, '*', array('user_id' => $this->session->userdata('paasport_user_id')));
        //$user_priceplan= $this->common_model->getRecords(TABLES::$PRICE_PLAN, '*', array('user_id' => $this->session->userdata('paasport_user_id')));
        //$user_list= $this->common_model->getRecords(TABLES::$LIST_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));
        //$user_link= $this->common_model->getRecords(TABLES::$LINK_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));
        //$user_video_url= $this->common_model->getRecords(TABLES::$VIDEO_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));
        //$user_portfolio= $this->common_model->getRecords(TABLES::$PORTFOLIO_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id')));

        $this->template->set('user_data', $userdata_paasport);
        //$this->template->set('user_company', $user_company);
        //$this->template->set('user_exp_data', $user_experience_data);
        //$this->template->set('user_edu_data', $user_education_data);
        //$this->template->set('user_skills', $user_skills);
        //$this->template->set('user_priceplan', $user_priceplan);
        //$this->template->set('user_list', $user_list);
        //$this->template->set('user_link', $user_link);
        //$this->template->set('user_video_url', $user_video_url);
        //$this->template->set('user_portfolio', $user_portfolio);


        if (!empty($_SESSION['paasport_user_id'])) {
            $slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
            $this->template->set('slug', $slug);
        }
        $this->template->set('page', 'dashboard');
        $this->template->set('page', 'dashboard');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('vcard_default')
                ->title('PaasPort | Dashboard')
                ->set_partial('header', 'partials/vcard_header');
        $this->template->build('vcard_update_main');
    }

    public function updateVcardData($vcard_id = null) {

        if (!isset($_SESSION)) {
            session_start();
        }
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }

        if (!empty($_SESSION['paasport_user_id'])) {
            $slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
            $this->template->set('slug', $slug);
        }

        $session_data = $this->session->userdata();

        $userdata = $this->common_model->getRecords(TABLES::$USERS, '*', array('id' => $this->session->userdata('paasport_user_id')));

        $userdata_paasport = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id' => $session_data['paasport_user_id'], 'id' => $vcard_id));

        $user_company = $this->common_model->getRecords(TABLES::$VCARD_COMPANY_DETAILS, '*', array('user_id' => $session_data['paasport_user_id']));


        //To get User Experience, Education Details        
        $user_experience_data = $this->common_model->getRecords(TABLES::$EXPERIENCE_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $vcard_id));

        $user_education_data = $this->common_model->getRecords(TABLES::$EDUCATION_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $vcard_id));

        $user_skills = $this->common_model->getRecords(TABLES::$SKILLS_AND_EXPERTISE, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $vcard_id));

        $user_priceplan = $this->common_model->getRecords(TABLES::$PRICE_PLAN, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $vcard_id));

        $user_list = $this->common_model->getRecords(TABLES::$LIST_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $vcard_id));

        $user_link = $this->common_model->getRecords(TABLES::$LINK_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $vcard_id));
        $user_video_url = $this->common_model->getRecords(TABLES::$VIDEO_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $vcard_id));
        $user_portfolio = $this->common_model->getRecords(TABLES::$PORTFOLIO_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $vcard_id));

        $user_blog = $this->common_model->getRecords(TABLES::$BLOG_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $vcard_id));
        $this->template->set('user_blog', $user_blog);

        $this->template->set('user_data', $userdata_paasport);
        $this->template->set('user_company', $user_company);
        $this->template->set('user_exp_data', $user_experience_data);
        $this->template->set('user_edu_data', $user_education_data);
        $this->template->set('user_skills', $user_skills);
        $this->template->set('user_priceplan', $user_priceplan);
        $this->template->set('user_list', $user_list);
        $this->template->set('user_link', $user_link);
        $this->template->set('user_video_url', $user_video_url);
        $this->template->set('user_portfolio', $user_portfolio);
        $this->template->set('page', 'dashboard');
        $this->template->set('page', 'dashboard');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('vcard_default')
                ->title('PaasPort | Dashboard')
                ->set_partial('header', 'partials/vcard_header');
        $this->template->build('vcard_update');
    }

    function updateUserinfo() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;


        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('contact', 'Contact Number', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['email'] = form_error('email');
            $error_array['firstname'] = form_error('firstname');
            $error_array['contact'] = form_error('contact');
            $error_array['lastname'] = form_error('lastname');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            $user = array();
            if (isset($_FILES['wizard-picture']) && !empty($_FILES['wizard-picture']['name'])) {
                $config = array();
                $config['upload_path'] = './paas-port/uploads/users/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = FALSE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('wizard-picture')) {
                    $error = $this->upload->display_errors();
                    $map ['status'] = 0;
                    $map ['msg'] = "User Image upload error - " . $error;
                    echo json_encode($map);
                    exit;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                /* $filename = $_SERVER['DOCUMENT_ROOT']."/novaevcard/".$this->input->post('old_user_image'); 
                  if (file_exists($filename)) {
                  unlink($filename);
                  } */
                $user['user_image'] = "uploads/users/" . $data['upload_data']['file_name'];
            } else {
                // $user['user_image'] = $this->input->post('user_image_old');
            }
            if (isset($_FILES['cover_image']) && !empty($_FILES['cover_image']['name'])) {
                $config = array();
                $config['upload_path'] = './paas-port/uploads/silo_scan_disc/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = FALSE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('cover_image')) {
                    $error = $this->upload->display_errors();
                    $map ['status'] = 0;
                    $map ['msg'] = "User Image upload error - " . $error;
                    echo json_encode($map);
                    exit;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                /* $filename = $_SERVER['DOCUMENT_ROOT']."/novaevcard/".$this->input->post('old_user_image'); 
                  if (file_exists($filename)) {
                  unlink($filename);
                  } */
                $user['cover_image'] = "uploads/silo_scan_disc/" . $data['upload_data']['file_name'];
            } else {
                // $user['user_image'] = $this->input->post('user_image_old');
            }
            $user['first_name'] = $this->input->post('firstname');
            $user['last_name'] = $this->input->post('lastname');
            $user['mobile'] = $this->input->post('contact');
            $user['email'] = $this->input->post('email');
            $user['home_postal_code'] = $this->input->post('pincode');
            $user['home_address'] = $this->input->post('address');
            $user['user_id'] = $this->session->userdata('paasport_user_id');
            $vcard_basic_id = $this->input->post('id');

            $uid = $this->common_model->updateRow(TABLES::$VCARD_BASIC_DETAILS, $user, array('id' => $vcard_basic_id));

            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "Basic Information has been updated.";
                echo json_encode($map);
            }
        }
        exit;
    }

    public function updateCompanyInfo() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;

        $this->form_validation->set_rules('companyname', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('jobtitle1', 'Job Title', 'trim|required');
        $this->form_validation->set_rules('companyemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('companywebsite', 'Website', 'trim|required|callback_validurl');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['companyname'] = form_error('companyname');
            $error_array['jobtitle1'] = form_error('jobtitle1');
            $error_array['companyemail'] = form_error('companyemail');
            $error_array['companywebsite'] = form_error('companywebsite');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            $user = array();
            $user['company_name'] = $this->input->post('companyname');
            $user['job_title'] = $this->input->post('jobtitle1');
            $user['start_date'] = date("Y-m-d", strtotime($this->input->post('startdate')));
            $user['work_phone'] = $this->input->post('companycontact');
            $user['work_email'] = $this->input->post('companyemail');
            $user['work_website'] = $this->input->post('companywebsite');
            $user['user_id'] = $this->session->userdata('paasport_user_id');
            $company_id = $this->input->post('company_id');
            $uid = $this->common_model->updateRow(TABLES::$VCARD_BASIC_DETAILS, $user, array('id' => $company_id));
            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "Professional Information has been updated";
                echo json_encode($map);
            }
        }
        exit;
    }

    public function updateSocialInfo() {
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
        $this->form_validation->set_rules('user_url', 'Email', 'trim|required|valid_email');
        if (!empty($this->input->post('facebook_url'))) {
            $this->form_validation->set_rules('facebook_url', 'Facebook Link', 'callback_validurl');
        }
        if (!empty($this->input->post('twitter_url'))) {
            $this->form_validation->set_rules('twitter_url', 'Twitter Link', 'callback_validurl');
        }
        if (!empty($this->input->post('googleplus_url'))) {
            $this->form_validation->set_rules('googleplus_url', 'Google Plus Link', 'callback_validurl');
        }
        if (!empty($this->input->post('linkedin_url'))) {
            $this->form_validation->set_rules('linkedin_url', 'Twitter Link', 'callback_validurl');
        }
        if (!empty($this->input->post('youtube_url'))) {
            $this->form_validation->set_rules('youtube_url', 'Twitter Link', 'callback_validurl');
        }
        if (!empty($this->input->post('pinterest_url'))) {
            $this->form_validation->set_rules('pinterest_url', 'Twitter Link', 'callback_validurl');
        }

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['facebook_url'] = form_error('facebook_url');
            $error_array['twitter_url'] = form_error('twitter_url');
            $error_array['googleplus_url'] = form_error('googleplus_url');
            $error_array['linkedin_url'] = form_error('linkedin_url');
            $error_array['youtube_url'] = form_error('youtube_url');
            $error_array['pinterest_url'] = form_error('pinterest_url');
            $error_array['user_url'] = form_error('user_url');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            $map = array();
            $user = array();
            $user['facebook_link'] = $this->input->post('facebook_url');
            $user['twitter_link'] = $this->input->post('twitter_url');
            $user['google_plus_link'] = $this->input->post('googleplus_url');
            $user['linkedin_link'] = $this->input->post('linkedin_url');
            $user['youtube_link'] = $this->input->post('youtube_url');
            $user['pinterest_link'] = $this->input->post('pinterest_url');
            $user['received_email'] = $this->input->post('user_url');
            $social_id = $this->input->post('social_id');
            $uid = $this->common_model->updateRow(TABLES::$VCARD_BASIC_DETAILS, $user, array('id' => $social_id));
            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "Social Information has been saved";
                echo json_encode($map);
            }
        }
        //echo '<pre>';
        // print_r($_POST);
        exit;
    }

    public function updateShortBio() {
        //     $this->load->helper('utility_helper');
        $this->load->model('common_model');
        //        $this->load->helper(array(
        //            'form',
        //            'url'
        //        ));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        //$this->form_validation->set_rules('editor1', 'About Information', 'trim|required');

        /* if ($this->form_validation->run() == FALSE) {
          $map ['status'] = 0;
          $map ['msg'] = validation_errors();
          echo json_encode($map);
          } else { */
        $map = array();
        $user = array();
        //            $user['short_bio'] = $this->input->post('editor1');
        $user['short_bio'] = $this->input->post('short_bio');
        $user1['id'] = $this->input->post('id');
        $this->load->model('Login_model');
        $uid = $this->common_model->updateRow(TABLES::$VCARD_BASIC_DETAILS, $user, array('id' => $user1['id']));
        if ($uid) {
            $map ['status'] = 1;
            $map ['msg'] = "Short Bio has been saved";
            echo json_encode($map);
        }
        //}
        //echo '<pre>';
        // print_r($_POST);
        exit;
    }

    public function updateExperience() {
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));

        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $this->form_validation->set_rules('prevCompanyName', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('prevJobTitle', 'Position Title', 'trim|required');
        $this->form_validation->set_rules('prevStartDate', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('prevEndDate', 'End Date', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['prevCompanyName'] = form_error('prevCompanyName');
            $error_array['prevJobTitle'] = form_error('prevJobTitle');
            $error_array['prevStartDate'] = form_error('prevStartDate');
            $error_array['prevEndDate'] = form_error('prevEndDate');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            $map = array();
            $experience = array();
            $experience['user_id'] = $this->session->userdata('paasport_user_id');
            $experience['company_name'] = $this->input->post('prevCompanyName');
            $experience['position_title'] = $this->input->post('prevJobTitle');
            $experience['start_date'] = date('Y-m-d', strtotime($this->input->post('prevStartDate')));
            $experience['end_date'] = date('Y-m-d', strtotime($this->input->post('prevEndDate')));
            $experience['vcard_id'] = $this->input->post('vcard_id');
            if (empty($this->input->post('exp_det_id'))) {

                $ins_experience = $this->common_model->insertRow($experience, TABLES::$EXPERIENCE_DETAILS);
            } else {
                $ins_experience = $this->common_model->updateRow(TABLES::$EXPERIENCE_DETAILS, $experience, array('id' => $this->input->post('exp_det_id')));
            }

            if ($ins_experience) {
                $map ['status'] = 1;
                $map ['ins_experience_id'] = $ins_experience;
                $map ['msg'] = 'Experience updated successfully.';
            } else {
                $map ['status'] = 0;
                $map ['ins_experience_id'] = '';
                $map ['msg'] = "Unable to update experience.";
            }
            echo json_encode($map);
            exit;
        }
    }

    public function updateEducation() {

        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $this->form_validation->set_rules('eduInstituteName', 'Institute Name', 'trim|required');
        $this->form_validation->set_rules('degree', 'Degree or Certificate', 'trim|required');
        $this->form_validation->set_rules('eduStartDate', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('eduEndDate', 'End Date', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['eduInstituteName'] = form_error('eduInstituteName');
            $error_array['degree'] = form_error('degree');
            $error_array['eduStartDate'] = form_error('eduStartDate');
            $error_array['eduEndDate'] = form_error('eduEndDate');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            $map = array();
            $edu = array();
            $edu['user_id'] = $this->session->userdata('paasport_user_id');
            $edu['institute_name'] = $this->input->post('eduInstituteName');
            $edu['degree_or_certificate'] = $this->input->post('degree');
            $edu['start_date'] = date('Y-m-d', strtotime($this->input->post('eduStartDate')));
            $edu['end_date'] = date('Y-m-d', strtotime($this->input->post('eduEndDate')));
            $edu['vcard_id'] = $this->input->post('vcard_id');
            if (empty($this->input->post('edu_det_id'))) {
                $ins_experience = $this->common_model->insertRow($edu, TABLES::$EDUCATION_DETAILS);
            } else {
                $ins_experience = $this->common_model->updateRow(TABLES::$EDUCATION_DETAILS, $edu, array('id' => $this->input->post('edu_det_id')));
            }
            if ($ins_experience) {
                $map ['ins_edu_id'] = $ins_experience;
                $map ['status'] = 1;
                $map ['msg'] = 'Education saved successfully.';
            } else {
                $map ['ins_edu_id'] = '';
                $map ['status'] = 0;
                $map ['msg'] = "Unable to save Education.";
            }
            echo json_encode($map);
            exit;
        }
    }

    public function updateSkills() {
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));

        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $this->form_validation->set_rules('txt_skill', 'Skill & Expertise', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['txt_skill'] = form_error('txt_skill');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            $ins_experience = '';
            if (empty($this->input->post('txt_skill_id'))) {
                $map = array();
                $experience = array();
                $experience['user_id'] = $this->session->userdata('paasport_user_id');
                $experience['skill'] = $this->input->post('txt_skill');
                $experience['vcard_id'] = $this->input->post('vcard_id');
                $ins_experience = $this->common_model->insertRow($experience, TABLES::$SKILLS_AND_EXPERTISE);
            } else {
                $map = array();
                $experience = array();
                $experience['user_id'] = $this->session->userdata('paasport_user_id');
                $experience['skill'] = $this->input->post('txt_skill');
                $experience['vcard_id'] = $this->input->post('vcard_id');
                $ins_experience = $this->common_model->updateRow(TABLES::$SKILLS_AND_EXPERTISE, $experience, array('id' => $this->input->post('txt_skill_id')));
            }

            if ($ins_experience) {
                $map ['status'] = 1;
                $map ['ins_skill_id'] = $ins_experience;
                $map ['msg'] = 'Skill & Expertise saved successfully.';
            } else {
                $map ['status'] = 0;
                $map ['ins_skill_id'] = '';
                $map ['msg'] = "Unable to save Skill & Expertise.";
            }
            echo json_encode($map);
            exit;
        }
    }

    public function updateList() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;

        $this->form_validation->set_rules('listname', 'List', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['listname'] = form_error('listname');
            $map ['msg'] = $error_array;
            echo json_encode($map);
            exit;
        } else {
            $ins_experience = '';


            $price_plan = array();
            $price_plan['list'] = $this->input->post('listname');
            $price_plan['user_id'] = $this->session->userdata('paasport_user_id');
            $price_plan['vcard_id'] = $this->input->post('vcard_id');


            if (empty($this->input->post('list_id'))) {
                $ins_experience = $this->common_model->insertRow($price_plan, TABLES::$LIST_DETAILS);
            } else {
                $ins_experience = $this->common_model->updateRow(TABLES::$LIST_DETAILS, $price_plan, array('id' => $this->input->post('list_id')));
            }

            if ($ins_experience) {
                $map ['ins_price_id'] = $ins_experience;
                $map ['status'] = 1;
                $map ['msg'] = 'List saved successfully.';
            } else {
                $map ['ins_edu_id'] = '';
                $map ['status'] = 0;
                $map ['msg'] = "Unable to save List.";
            }
            echo json_encode($map);
            exit;
        }
    }

    public function updateLink() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;


        $this->form_validation->set_rules('addlink', 'Link', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
            exit;
        } else {
            $ins_experience = '';

            $price_plan = array();
            $price_plan['link'] = $this->input->post('addlink');
            $price_plan['user_id'] = $this->session->userdata('paasport_user_id');
            $price_plan['vcard_id'] = $this->input->post('vcard_id');

            if (empty($this->input->post('addlink_id'))) {
                $ins_experience = $this->common_model->insertRow($price_plan, TABLES::$LINK_DETAILS);
            } else {
                $ins_experience = $this->common_model->updateRow(TABLES::$LINK_DETAILS, $price_plan, array('id' => $this->input->post('addlink_id')));
            }



            if ($ins_experience) {
                $map ['ins_price_id'] = $ins_experience;
                $map ['status'] = 1;
                $map ['msg'] = 'Link saved successfully.';
            } else {
                $map ['ins_edu_id'] = '';
                $map ['status'] = 0;
                $map ['msg'] = "Unable to saved Link.";
            }
            echo json_encode($map);
            exit;
        }
    }

    public function updateVideoUrl() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $this->form_validation->set_rules('videourl', 'Video URL', 'trim|required|callback_validvideourl');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['videourl'] = form_error('videourl');
            $map ['msg'] = $error_array;
            echo json_encode($map);
            exit;
        } else {
            $ins_experience = '';
            $price_plan = array();
            $price_plan['video_url'] = $this->input->post('videourl');
            $price_plan['video_description'] = $this->input->post('video_description');
            $price_plan['user_id'] = $this->session->userdata('paasport_user_id');
            $price_plan['vcard_id'] = $this->input->post('vcard_id');

            if (empty($this->input->post('videourl_id'))) {
                $ins_experience = $this->common_model->insertRow($price_plan, TABLES::$VIDEO_DETAILS);
            } else {
                $ins_experience = $this->common_model->updateRow(TABLES::$VIDEO_DETAILS, $price_plan, array('id' => $this->input->post('videourl_id')));
            }
            $this->generateQRCode1();

            if ($ins_experience) {
                $map ['ins_price_id'] = $ins_experience;
                $map ['status'] = 1;
                $map ['msg'] = 'Video URL added successfully.';
            } else {
                $map ['ins_edu_id'] = '';
                $map ['status'] = 0;
                $map ['msg'] = "Unable to  add Video URL.";
            }
            echo json_encode($map);
            exit;
        }
    }

    public function updatePricePlanImage() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();

        $errorMsg = array();
        $err_num = 0;
        $user = array();
        $map = array();
        $imap = array();
        if (empty($this->input->post('pricing_id'))) {
            $img_upload_flag = 0;


            if (!empty($_FILES['file']['name'][0])) {


                for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                    $_FILES['ufile']['name'] = $_FILES['file']['name'][$i];
                    $_FILES['ufile']['type'] = $_FILES['file']['type'][$i];
                    $_FILES['ufile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                    $_FILES['ufile']['error'] = $_FILES['file']['error'][$i];
                    $_FILES['ufile']['size'] = $_FILES['file']['size'][$i];

                    $config = array();
                    $config['upload_path'] = './paas-port/uploads/price_plan/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['remove_spaces'] = TRUE;
                    $config['encrypt_name'] = TRUE;
                    $config['overwrite'] = FALSE;


                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('ufile')) {
                        $error = $this->upload->display_errors();
                        $map ['status'] = 0;
                        $map ['msg'] = "User Image upload error - " . $error;
                        echo json_encode($map);
                        exit;
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                    }

                    $user['plan_image'] = "uploads/price_plan/" . $data['upload_data']['file_name'];
                    $user['user_id'] = $this->session->userdata('paasport_user_id');
                    $user['vcard_id'] = $this->input->post('vcard_id');

                    $ins_experience = $this->common_model->insertRow($user, TABLES::$PRICE_PLAN);
                    if ($ins_experience) {
                        $img_upload_flag = 1;
                        $map [$i]['user_img'] = base_url() . $user['plan_image'];
                        $map [$i]['ins_price_id'] = $ins_experience;
                        $map [$i]['status'] = 1;
                        $map [$i]['msg'] = 'Price Plan Image uploaded successfully.';
                    } else {
                        $map [$i]['user_img'] = '';
                        $map [$i]['ins_edu_id'] = '';
                        $map [$i]['status'] = 0;
                        $map [$i]['msg'] = "Unable to upload Price Plan Image.";
                    }
                    //echo json_encode($map);
                    //exit;
                }
                if ($img_upload_flag == 1) {
                    $imap['img_upload_flag'] = 1;
                    $imap['image'] = $map;
                    $imap ['status'] = 1;
                    $imap ['msg'] = 'Price Plan Image uploaded successfully.';
                } else {
                    $imap['img_upload_flag'] = 0;
                    $imap['image'] = '';
                    $imap ['status'] = 0;
                    $imap ['msg'] = 'Unable to upload Price Plan Image.';
                }
                echo json_encode($imap);
                exit;
            }
        } else {
            $config = array();
            $config['upload_path'] = './paas-port/uploads/price_plan/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['overwrite'] = FALSE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('updatefile')) {
                $error = $this->upload->display_errors();
                $map ['status'] = 0;
                $map ['msg'] = "User Image upload error - " . $error;
                echo json_encode($map);
                exit;
            } else {
                $data = array('upload_data' => $this->upload->data());
            }

            $user['plan_image'] = "uploads/price_plan/" . $data['upload_data']['file_name'];
            $user['vcard_id'] = $this->input->post('vcard_id');

            $ins_experience = $this->common_model->updateRow(TABLES::$PRICE_PLAN, $user, array('id' => $this->input->post('pricing_id')));
            if ($ins_experience) {
                $map['img_upload_flag'] = 1;
                $map['image'] = '';
                $map ['status'] = 1;
                $map ['msg'] = 'Price Plan Image uploaded successfully.';
            } else {
                $map['img_upload_flag'] = 0;
                $map['image'] = '';
                $map ['status'] = 0;
                $map ['msg'] = 'Unable to upload Price Plan Image.';
            }
        }
        echo json_encode($map);
        exit;
    }

    public function updatePricePlan() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;


        $this->form_validation->set_rules('pricingtitle', 'Price Title', 'trim|required');
        $this->form_validation->set_rules('pricingdescription', 'Price Description', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array = array();
            $error_array['pricingtitle'] = form_error('pricingtitle');
            $error_array['pricingdescription'] = form_error('pricingdescription');
            $map ['msg'] = $error_array;
            echo json_encode($map);
            exit;
        } else {
            $ins_experience = '';


            $price_plan = array();
            $price_plan['plan_title'] = $this->input->post('pricingtitle');
            $price_plan['plan_description'] = $this->input->post('pricingdescription');
            $price_plan['price'] = $this->input->post('pricingprice');
            $price_plan['user_id'] = $this->session->userdata('paasport_user_id');
            $price_plan['vcard_id'] = $this->input->post('vcard_id');

            if (empty($this->input->post('pricing_id1'))) {
                $ins_experience = $this->common_model->insertRow($price_plan, TABLES::$PRICE_PLAN);
            } else {
                $ins_experience = $this->common_model->updateRow(TABLES::$PRICE_PLAN, $price_plan, array('id' => $this->input->post('pricing_id1')));
            }


            if ($ins_experience) {
                $map ['ins_price_id'] = $ins_experience;
                $map ['status'] = 1;
                $map ['msg'] = 'Price Plan added successfully.';
            } else {
                $map ['ins_edu_id'] = '';
                $map ['status'] = 0;
                $map ['msg'] = "Unable to  add Price Plan.";
            }
            echo json_encode($map);
            exit;
        }
    }

    public function updatePortfolio() {
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;

        if (!empty($this->input->post('portfolioDiv')) && $this->input->post('portfolioDiv') == 'descprining1') {
            $this->form_validation->set_rules('videourl_portfolio', 'Video URL', 'trim|required|callback_validvideourl');
            if ($this->form_validation->run() == FALSE) {
                $map ['status'] = 0;
                $error_array = array();
                $error_array['videourl_portfolio'] = form_error('videourl_portfolio');
                $map ['msg'] = $error_array;
                $map['img_upload_flag'] = 2;
                echo json_encode($map);
                exit;
            }
        }
        $user = array();
        $map = array();
        if (empty($this->input->post('videourl_portfolio_id'))) {
            if (!empty($_FILES['file-2']['name'][0])) {
                $imap = array();
                $img_upload_flag = 0;
                for ($i = 0; $i < count($_FILES['file-2']['name']); $i++) {
                    $_FILES['ufile']['name'] = $_FILES['file-2']['name'][$i];
                    $_FILES['ufile']['type'] = $_FILES['file-2']['type'][$i];
                    $_FILES['ufile']['tmp_name'] = $_FILES['file-2']['tmp_name'][$i];
                    $_FILES['ufile']['error'] = $_FILES['file-2']['error'][$i];
                    $_FILES['ufile']['size'] = $_FILES['file-2']['size'][$i];

                    $config = array();
                    $config['upload_path'] = './paas-port/uploads/portfolio/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['remove_spaces'] = TRUE;
                    $config['encrypt_name'] = TRUE;
                    $config['overwrite'] = FALSE;


                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('ufile')) {
                        $error = $this->upload->display_errors();
                        $map ['status'] = 0;
                        $map ['msg'] = "User Image upload error - " . $error;
                        echo json_encode($map);
                        exit;
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                    }

                    $user['image'] = "uploads/portfolio/" . $data['upload_data']['file_name'];
                    $user['user_id'] = $this->session->userdata('paasport_user_id');
                    $user['vcard_id'] = $this->input->post('vcard_id');

                    $ins_experience = $this->common_model->insertRow($user, TABLES::$PORTFOLIO_DETAILS);
                    if ($ins_experience) {
                        $img_upload_flag = 1;
                        $map [$i]['user_img'] = base_url() . $user['image'];
                        $map [$i]['ins_price_id'] = $ins_experience;
                        $map [$i]['status'] = 1;
                        $map [$i]['msg'] = 'Portfolio uploaded successfully.';
                    } else {
                        $img_upload_flag = 0;
                        $map [$i]['user_img'] = '';
                        $map [$i]['ins_edu_id'] = '';
                        $map [$i]['status'] = 0;
                        $map [$i]['msg'] = "Unable to upload Portfolio Image.";
                    }
                    //echo json_encode($map);
                    //exit;
                }
                if ($img_upload_flag == 1) {
                    $imap['img_upload_flag'] = 1;
                    $imap['image'] = $map;
                    $imap ['status'] = 1;
                    $imap ['msg'] = 'Portfolio uploaded successfully.';
                } else {
                    $imap['img_upload_flag'] = 0;
                    $imap['image'] = '';
                    $imap ['status'] = 0;
                    $imap ['msg'] = 'Unable to upload Portfolio Image.';
                }
                echo json_encode($imap);
                exit;
            }
        } else {
            if (!empty($_FILES['portfolioImg_updatefile']['name'])) {
                $config = array();
                $config['upload_path'] = './paas-port/uploads/portfolio/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = FALSE;


                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('portfolioImg_updatefile')) {
                    $error = $this->upload->display_errors();
                    $map ['status'] = 0;
                    $map ['msg'] = "User Image upload error - " . $error;
                    echo json_encode($map);
                    exit;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }

                $user['image'] = "uploads/portfolio/" . $data['upload_data']['file_name'];
                $user['user_id'] = $this->session->userdata('paasport_user_id');
                $user['vcard_id'] = $this->input->post('vcard_id');

                $ins_experience = $this->common_model->updateRow(TABLES::$PORTFOLIO_DETAILS, $user, array('id' => $this->input->post('videourl_portfolio_id')));

                if ($ins_experience) {
                    $map['img_upload_flag'] = 1;
                    $map['image'] = '';
                    $map ['status'] = 1;
                    $map ['msg'] = 'Price Plan Image uploaded successfully.';
                } else {
                    $map['img_upload_flag'] = 0;
                    $map['image'] = '';
                    $map ['status'] = 0;
                    $map ['msg'] = 'Unable to upload Price Plan Image.';
                }
                echo json_encode($map);
                exit;
            }
        }

        if (!empty($this->input->post('videourl_portfolio'))) {
            $user['video_url'] = $this->input->post('videourl_portfolio');
            $user['user_id'] = $this->session->userdata('paasport_user_id');
            $user['vcard_id'] = $this->input->post('vcard_id');
            if (!empty($user)) {

                if (empty($this->input->post('videourl_portfolio_id'))) {
                    $ins_experience = $this->common_model->insertRow($user, TABLES::$PORTFOLIO_DETAILS);
                } else {
                    $ins_experience = $this->common_model->updateRow(TABLES::$PORTFOLIO_DETAILS, $user, array('id' => $this->input->post('videourl_portfolio_id')));
                }


                if ($ins_experience) {
                    $map['img_upload_flag'] = 2;
                    $map['user_img'] = '';
                    $map ['ins_price_id'] = $ins_experience;
                    $map ['status'] = 1;
                    $map ['msg'] = 'Portfolio uploaded successfully.';
                } else {
                    $map['img_upload_flag'] = 2;
                    $map['user_img'] = '';
                    $map ['ins_edu_id'] = '';
                    $map ['status'] = 0;
                    $map ['msg'] = "Unable to upload Portfolio.";
                }
                echo json_encode($map);
                exit;
            }
        }


        exit;
    }

    public function getPortfolio() {
        $this->load->model('common_model');
        $session_data = $this->session->userdata();
        $user_portfolio = $this->common_model->getRecords(TABLES::$PORTFOLIO_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->input->post('vcard_id')));
        $str = '';
        if (!empty($user_portfolio)) {
            foreach ($user_portfolio as $u_portfolio) {

                $str .= '<div class="panel-body-content text-center">';
                if (!empty($u_portfolio['image'])) {

                    $var_open_port = '"' . $u_portfolio['id'] . '","' . $u_portfolio['image'] . '"';

                    $str .= '<div class="pull-right">';
                    $str .= '<span id="editpanelportfolio" class="badge editbutton" title="Edit" onclick=openPortfolioImage(' . $var_open_port . ') ><i class="fa fa-pencil-square-o"></i>';
                    $str .= '</span>';
                    $str .= '</div>';
                    $str .= '<img src="' . base_url() . $u_portfolio['image'] . '" class="img-responsive"/>';
                }
                $str .= '<hr>';
                if (!empty($u_portfolio['video_url'])) {

                    $var_open_video = '"' . $u_portfolio['id'] . '","' . $u_portfolio['video_url'] . '"';

                    $str .= '<div class="pull-right">';
                    $str .= '<span id="editpanelportfolio" class="badge editbutton" title="Edit" onclick=openPortfolioVideo(' . $var_open_video . ') ><i class="fa fa-pencil-square-o"></i>';
                    $str .= '</span>';
                    $str .= '</div>';
                    $str .= '<div class="embed-responsive embed-responsive-4by3">';
                    $str .= '<iframe class="embed-responsive-item" src="' . $u_portfolio['video_url'] . '"></iframe>';
                    $str .= '</div>';
                }
                $str .= '</div>';
            }
        }
        echo $str;
        exit;
    }

    public function saveBloginfo() {

        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $error_array = array();
        $error_array['blogTitle'] = '';
        $error_array['blogshortdesc'] = '';
        $error_array['bloglongdesc'] = '';
        $error_array['coverimage'] = '';
        $error_array['bloguploadvideo'] = '';
        $error_array['txtblogvideourl'] = '';


        $this->form_validation->set_rules('blogTitle', 'Title', 'trim|required');
        $this->form_validation->set_rules('blogshortdesc1', 'Short Description', 'trim|required');
        $this->form_validation->set_rules('bloglongdesc1', 'Long Description', 'trim|required');
        if (!empty($this->input->post('blog')) && $this->input->post('blog') == 'coverimagediv') {
            if (empty($_FILES['coverimage']['name'])) {
                $map ['status'] = 0;
                $error_array['coverimage'] = "The Cover Image field is required.";
                $map ['msg'] = $error_array;
                echo json_encode($map);
                exit;
            }
        }
        if (!empty($this->input->post('blog')) && $this->input->post('blog') == 'blogvideodiv') {
            if (empty($_FILES['bloguploadvideo']['name'])) {
                $map ['status'] = 0;
                $error_array['bloguploadvideo'] = "The Video field is required.";
                $map ['msg'] = $error_array;
                echo json_encode($map);
                exit;
            }
        }
        if (!empty($this->input->post('blog')) && $this->input->post('blog') == 'blogvideourldiv') {
            $this->form_validation->set_rules('txtblogvideourl', 'Video URL', 'trim|required|callback_validvideourl');
        }


        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array['blogTitle'] = form_error('blogTitle');
            $error_array['blogshortdesc'] = form_error('blogshortdesc1');
            $error_array['bloglongdesc'] = form_error('bloglongdesc1');
            $error_array['txtblogvideourl'] = form_error('txtblogvideourl');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            if (!empty($this->session->userdata('vcard_id'))) {
                $user = array();
                if (isset($_FILES['coverimage']) && !empty($_FILES['coverimage']['name'])) {
                    $config = array();
                    $config['upload_path'] = './paas-port/uploads/blogs/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['remove_spaces'] = TRUE;
                    $config['encrypt_name'] = TRUE;
                    $config['overwrite'] = FALSE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('coverimage')) {
                        $error = $this->upload->display_errors();
                        $map ['status'] = 0;
                        $error_array['coverimage'] = "User Image upload error - " . $error;
                        $map ['msg'] = $error_array;
                        echo json_encode($map);
                        exit;
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                    }
                    $user['cover_image'] = "uploads/blogs/" . $data['upload_data']['file_name'];
                }
                if (isset($_FILES['bloguploadvideo']) && !empty($_FILES['bloguploadvideo']['name'])) {
                    $config = array();
                    $config['upload_path'] = './paas-port/uploads/blogs/';
                    $config['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
                    $config['remove_spaces'] = TRUE;
                    $config['encrypt_name'] = TRUE;
                    $config['overwrite'] = FALSE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('bloguploadvideo')) {
                        $error = $this->upload->display_errors();
                        $map ['status'] = 0;
                        $error_array['bloguploadvideo'] = "User Video upload error - " . $error;
                        $map ['msg'] = $error_array;
                        echo json_encode($map);
                        exit;
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                    }
                    $user['video'] = "uploads/blogs/" . $data['upload_data']['file_name'];
                }
                if (!empty($this->input->post('txtblogvideourl'))) {
                    $user['video_url'] = $this->input->post('txtblogvideourl');
                }
                $user['title'] = $this->input->post('blogTitle');
                $user['short_desc'] = $this->input->post('blogshortdesc1');
                $user['long_desc'] = $this->input->post('bloglongdesc1');
                $user['user_id'] = $this->session->userdata('paasport_user_id');
                $user['vcard_id'] = $this->session->userdata('vcard_id');
                if ($this->input->post('popular') == 1) {
                    $user['popular'] = $this->input->post('popular');
                }
                $uid = $this->common_model->insertRow($user, TABLES::$BLOG_DETAILS);
                if ($uid) {
                    $map ['status'] = 1;
                    $map ['blogid'] = $uid;
                    $map ['msg'] = "Blog Information has been saved";
                    echo json_encode($map);
                } else {
                    $map ['status'] = 0;
                    $map ['blogid'] = '';
                    $map ['msg'] = "Unable to save blog information";
                    echo json_encode($map);
                }
            }
        }
        exit;
    }

    public function updateBloginfo() {
        //echo '<pre>'; print_r($_FILES);   echo '<pre>'; print_r($_POST);      exit;
        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $error_array = array();
        $error_array['blogTitle'] = '';
        $error_array['blogshortdesc'] = '';
        $error_array['bloglongdesc'] = '';
        $error_array['coverimage'] = '';
        $error_array['bloguploadvideo'] = '';


        $this->form_validation->set_rules('blogTitle', 'Title', 'trim|required');
        $this->form_validation->set_rules('blogshortdesc1', 'Short Description', 'trim|required');
        $this->form_validation->set_rules('bloglongdesc1', 'Long Description', 'trim|required');
        /* if(!empty($this->input->post('blog')) && $this->input->post('blog')=='coverimagediv')
          {
          if (empty($_FILES['coverimage']['name']))
          {
          $map ['status'] = 0;
          $error_array['coverimage']= "The Cover Image field is required.";
          $map ['msg'] = $error_array;
          echo json_encode($map);
          exit;
          }
          }
          if(!empty($this->input->post('blog')) && $this->input->post('blog')=='blogvideodiv')
          {
          if (empty($_FILES['bloguploadvideo']['name']))
          {
          $map ['status'] = 0;
          $error_array['bloguploadvideo']= "The Video field is required.";
          $map ['msg'] = $error_array;
          echo json_encode($map);
          exit;
          }
          } */
        if (!empty($this->input->post('blog')) && $this->input->post('blog') == 'blogvideourldiv') {
            $this->form_validation->set_rules('txtblogvideourl', 'Video URL', 'trim|required|callback_validvideourl');
        }


        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;

            $error_array['blogTitle'] = form_error('blogTitle');
            $error_array['blogshortdesc'] = form_error('blogshortdesc1');
            $error_array['bloglongdesc'] = form_error('bloglongdesc1');
            $error_array['txtblogvideourl'] = form_error('txtblogvideourl');
            $map ['msg'] = $error_array;
            echo json_encode($map);
        } else {
            $user = array();
            if (isset($_FILES['coverimage']) && !empty($_FILES['coverimage']['name'])) {
                $config = array();
                $config['upload_path'] = './paas-port/uploads/blogs/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = FALSE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('coverimage')) {
                    $error = $this->upload->display_errors();
                    $map ['status'] = 0;
                    $error_array['coverimage'] = "User Image upload error - " . $error;
                    $map ['msg'] = $error_array;
                    echo json_encode($map);
                    exit;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                $user['cover_image'] = "uploads/blogs/" . $data['upload_data']['file_name'];
            }
            if (isset($_FILES['bloguploadvideo']) && !empty($_FILES['bloguploadvideo']['name'])) {
                $config = array();
                $config['upload_path'] = './paas-port/uploads/blogs/';
                $config['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = FALSE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('bloguploadvideo')) {
                    $error = $this->upload->display_errors();
                    $map ['status'] = 0;
                    $error_array['bloguploadvideo'] = "User Video upload error - " . $error;
                    $map ['msg'] = $error_array;
                    echo json_encode($map);
                    exit;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                $user['video'] = "uploads/blogs/" . $data['upload_data']['file_name'];
            }
            if (!empty($this->input->post('txtblogvideourl'))) {
                $user['video_url'] = $this->input->post('txtblogvideourl');
            }
            $user['title'] = $this->input->post('blogTitle');
            $user['short_desc'] = $this->input->post('blogshortdesc1');
            $user['long_desc'] = $this->input->post('bloglongdesc1');
            $user['user_id'] = $this->session->userdata('paasport_user_id');
            $user['vcard_id'] = $this->input->post('vcard_id');
            if ($this->input->post('popular') == 1) {
                $user['popular'] = $this->input->post('popular');
            }
            if (empty($this->input->post('blogid'))) {
                $uid = $this->common_model->insertRow($user, TABLES::$BLOG_DETAILS);
            } else {
                $uid = $this->common_model->updateRow(TABLES::$BLOG_DETAILS, $user, array('id' => $this->input->post('blogid')));
            }

            if ($uid) {
                $map ['blogid'] = $uid;
                $map ['status'] = 1;
                $map ['msg'] = "Blog Information has been saved";
                echo json_encode($map);
            }
        }
        exit;
    }

    public function getBlogData() {
        $this->load->model('common_model');
        $session_data = $this->session->userdata();
        $user_skills = $this->common_model->getRecords(TABLES::$BLOG_DETAILS, '*', array('user_id' => $this->session->userdata('paasport_user_id'), 'vcard_id' => $this->input->post('vcard_id')));
        $str = '';
        if (!empty($user_skills)) {
            $cnt = 1;
            $str .= "<thead><tr><th>Title</th><th>Short Description</th><th>Long Description</th><th>Action</th></tr></thead><tbody>";
            foreach ($user_skills as $ub) {

                $var_blog = '"' . $ub['id'] . '","' . $ub['vcard_id'] . '","' . $ub['cover_image'] . '","' . $ub['video'] . '","' . $ub['video_url'] . '","' . $ub['title'] . '","' . $ub['short_desc'] . '","' . $ub['long_desc'] . '","' . $ub['popular'] . '"';

                $str .= "<tr class=blog-previewdetail-" . $ub['id'] . "  >";
                $str .= "<td> " . $ub['title'] . "</td>";
                $str .= "<td> " . $ub['short_desc'] . "</td>";
                $str .= "<td> " . $ub['long_desc'] . "</td>";
                $str .= '<td><a href="#" onclick=openBlog(' . $ub['id'] . ') > Edit </a> | <a href="#" onclick=deleteBlog(' . $ub['id'] . '); > Delete </a></td>';
                $str .= "</tr>";
            }
            $str .= "</tbody>";
        }
        echo $str;
        exit;
    }

    public function deleteblog() {
        $this->load->model('common_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        //$user_id = $this->session->userdata('paasport_user_id');
        $this->common_model->deleteRows(array('id' => $this->input->post('blog_id')), TABLES::$BLOG_DETAILS, 'id');
        $delFlag = 1;

        if ($delFlag) {
            $map ['status'] = 1;
            $map ['msg'] = 'Blog deleted successfully.';
        } else {
            $map ['status'] = 0;
            $map ['msg'] = "Unable to delete Blog.";
        }
        echo json_encode($map);
        exit;
    }

    public function getBlog() {
        if (!empty($this->input->post('b_id'))) {
            $user_blog = $this->common_model->getRecords(TABLES::$BLOG_DETAILS, '*', array('id' => $this->input->post('b_id')));
            echo json_encode($user_blog[0]);
            exit;
        }
    }

    public function sendmail() {

        $this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $error_array = array();
        $error_array['to'] = '';
        $error_array['from'] = '';

        $this->form_validation->set_rules('to', 'To', 'trim|required|valid_email');
        $this->form_validation->set_rules('fromid', 'From', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $error_array['to'] = form_error('to');
            $error_array['from'] = form_error('fromid');
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

    public function main_view($slug) {
        $this->load->library('google_url_api');
        $session_data = $this->session->userdata();
        $this->load->model('common_model');

        $data['user'] = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('slug' => $slug));


        $url = current_url();
        $this->google_url_api->enable_debug(FALSE);
        $short_url = $this->google_url_api->shorten($url);
        if (!empty($short_url->id))
            $data['shorten_url'] = $short_url->id;

        $this->load->view('vcard_detail_view_main', $data);
    }

    //To Upload Media-Audio   

    public function uploadMediaAudio() {

        if (!empty($_FILES['file']['name'])) {

            $audio_file = time() . $_FILES["file"]['name'];
            $audio_file = str_replace(" ", "_", $audio_file);
            $audio_file = str_replace("#", "", $audio_file);
            $audio_file = str_replace("-", "", $audio_file);
            $audio_file = str_replace("(", "", $audio_file);
            $audio_file = str_replace(")", "", $audio_file);




            $user_id = $this->session->userdata('user_id');
            $upload_path = './paas-port/uploads/media/audio/' . $user_id;

            if (!is_dir($upload_path)) {
                mkdir('./uploads/silo_publisher_application/' . $user_id, 0777, TRUE);
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

            $files_path = "./uploads/silo_publisher_application/" . $user_id . "/" . $config['file_name'];

            $publisher_application_files_data['user_id'] = $this->session->userdata('user_id');
            $publisher_application_files_data['application_id'] = $this->session->userdata('publisher_application_id');
            ;
            $publisher_application_files_data['file_path'] = $files_path;

            $this->db->insert('tbl_publisher_application_files', $publisher_application_files_data);
            $file_id = $this->db->insert_id();
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

            $ext = pathinfo($upload_result['file_name'], PATHINFO_EXTENSION);


            $result = array('type' => $ext, 'file_name' => $upload_result['file_name'], 'raw_name' => $upload_result['raw_name'], 'file_id' => $file_id);
            echo json_encode($result);
        }
    }

    public function uploadAudioFiles() {

        if (!empty($_FILES['file']['name'])) {

            $audio_file = time() . $_FILES["file"]['name'];
            $audio_file = str_replace(" ", "_", $audio_file);
            $audio_file = str_replace("#", "", $audio_file);
            $audio_file = str_replace("-", "", $audio_file);
            $audio_file = str_replace("(", "", $audio_file);
            $audio_file = str_replace(")", "", $audio_file);


            $user_id = $this->session->userdata('user_id');
            $upload_path = 'paas-port/uploads/media/audio/' . $user_id;

            if (!is_dir($upload_path)) {
                mkdir('paas-port/uploads/media/audio/' . $user_id, 0777, TRUE);
            }

            $config['file_name'] = $audio_file;
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'mp3|wav|ogg|wma';
            $config['max_size'] = '10000';
            $config['max_width'] = '';
            $config['max_height'] = '';
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            $upload_result = $this->upload->data();

            $files_path = "paas-port/uploads/media/audio/" . $user_id . "/" . $config['file_name'];

            $media_audio_files_data['paasport_user_id'] = $this->session->userdata('paasport_user_id');
            $media_audio_files_data['name'] = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
            $media_audio_files_data['file_path'] = $files_path;
            $media_audio_files_data['vcard_id'] = $this->session->userdata('vcard_id');
            $media_audio_files_data['encrypted_file_name'] = $upload_result['raw_name'];

            $this->db->insert('tbl_paasport_audio', $media_audio_files_data);
            $file_id = $this->db->insert_id();

            $ext = pathinfo($upload_result['file_name'], PATHINFO_EXTENSION);

            $result = array('type' => $ext, 'file_name' => $upload_result['file_name'], 'raw_name' => $upload_result['raw_name'], 'file_id' => $file_id);
            echo json_encode($result);
        }
    }

    public function uploadVideoFiles() {

        if (!empty($_FILES['file']['name'])) {

            $video_file = time() . $_FILES["file"]['name'];
            $video_file = str_replace(" ", "_", $video_file);
            $video_file = str_replace("#", "", $video_file);
            $video_file = str_replace("-", "", $video_file);
            $video_file = str_replace("(", "", $video_file);
            $video_file = str_replace(")", "", $video_file);


            $user_id = $this->session->userdata('user_id');
            $upload_path = 'paas-port/uploads/media/video/' . $user_id;

            if (!is_dir($upload_path)) {
                mkdir('paas-port/uploads/media/video/' . $user_id, 0777, TRUE);
            }

//            $config['file_name'] = $_FILES["file"]['name'];
            $config['file_name'] = $video_file;
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10000';
            $config['max_width'] = '';
            $config['max_height'] = '';
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);


            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $error = $this->upload->display_errors();
                $upload_result ['status'] = 0;
                $upload_result ['msg'] = "Video upload error - " . $error;
                echo json_encode($upload_result);
                exit;
            } else {
                $upload_result = $this->upload->data();
            }


            $files_path = "paas-port/uploads/media/video/" . $user_id . "/" . $config['file_name'];

            $media_video_files_data['paasport_user_id'] = $this->session->userdata('paasport_user_id');
            $media_video_files_data['name'] = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
            $media_video_files_data['file_path'] = $files_path;
            $media_video_files_data['vcard_id'] = $this->session->userdata('vcard_id');
            $media_video_files_data['encrypted_file_name'] = $upload_result['raw_name'];


            $this->db->insert('tbl_paasport_video', $media_video_files_data);
            $file_id = $this->db->insert_id();

            $ext = pathinfo($upload_result['file_name'], PATHINFO_EXTENSION);

            $result = array('type' => $ext, 'file_name' => $upload_result['file_name'], 'raw_name' => $upload_result['raw_name'], 'file_id' => $file_id);
            echo json_encode($result);
        }
    }

    public function uploadGalleryFiles() {

        if (!empty($_FILES['file']['name'])) {

            $gallary_file = time() . $_FILES["file"]['name'];
            $gallary_file = str_replace(" ", "_", $gallary_file);
            $gallary_file = str_replace("#", "", $gallary_file);
            $gallary_file = str_replace("-", "", $gallary_file);
            $gallary_file = str_replace("(", "", $gallary_file);
            $gallary_file = str_replace(")", "", $gallary_file);

            $user_id = $this->session->userdata('user_id');
            $upload_path = 'paas-port/uploads/gallary/' . $user_id;

            if (!is_dir($upload_path)) {
                mkdir('paas-port/uploads/gallary/' . $user_id, 0777, TRUE);
            }

            $config['file_name'] = $gallary_file;
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

            $files_path = "paas-port/uploads/gallary/" . $user_id . "/" . $config['file_name'];

            $gallary_files_data['paasport_user_id'] = $this->session->userdata('paasport_user_id');
            $gallary_files_data['name'] = $_FILES["file"]['name'];
            $gallary_files_data['file_path'] = $files_path;
            $gallary_files_data['vcard_id'] = $this->session->userdata('vcard_id');

            $this->db->insert('tbl_paasport_gallary', $gallary_files_data);
            $file_id = $this->db->insert_id();

            $ext = pathinfo($upload_result['file_name'], PATHINFO_EXTENSION);

            $result = array('type' => $ext, 'file_name' => $upload_result['file_name'], 'raw_name' => $upload_result['raw_name'], 'file_id' => $file_id);
            echo json_encode($result);
        }
    }

    public function updateAudioModalDetails() {

        if (!empty($this->input->post('audio_file_id'))) {

            $audio_file_id = $this->input->post('audio_file_id');
            $audio['name'] = $this->input->post('audio_file_name');
            $audio['genre'] = $this->input->post('audio_file_genre');

            $this->db->where('id', $this->input->post('audio_file_id'));
            $this->db->update('tbl_paasport_audio', $audio);
        }
    }

    public function updateVideoModalDetails() {

        if (!empty($this->input->post('video_file_id'))) {

            $video_file_id = $this->input->post('video_file_id');
            $video['name'] = $this->input->post('video_file_name');
            $video['genre'] = $this->input->post('video_file_genre');

            $this->db->where('id', $this->input->post('video_file_id'));
            $this->db->update('tbl_paasport_video', $video);
        }
    }

}
