<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vcard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model("common_model");
        ini_set('memory_limit', '360M');
    }

    public function index() {

        // print_r($_SESSION['user_account']['user_id']);
        //			 print_r($_SESSION['user_account']);
        //			 print_r($this->session->all_userdata());
        //	die('sd');
        if (!isset($_SESSION)) {
            session_start();
        }


        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }

        $session_data = $this->session->userdata();
        $userdata = $this->common_model->getRecords(TABLES::$ADMIN_USER, '*', array('id' => $session_data['user_account']['user_id']));

        //To get User Experience, Education Details        
        $user_experience_data = $this->common_model->getRecords(TABLES::$EXPERIENCE_DETAILS, '*', array('user_id' => $session_data['user_account']['user_id']));
                
        $user_education_data = $this->common_model->getRecords(TABLES::$EDUCATION_DETAILS, '*', array('user_id' => $session_data['user_account']['user_id']));
 
        $user_skills= $this->common_model->getRecords(TABLES::$SKILLS_AND_EXPERTISE, '*', array('user_id' => $session_data['user_account']['user_id']));
                               
        
        $this->template->set('user_data', $userdata);
        $this->template->set('user_exp_data', $user_experience_data);
        $this->template->set('user_edu_data', $user_education_data);
        $this->template->set('user_skills', $user_skills);
        $this->template->set('page', 'dashboard');
        $this->template->set('page', 'dashboard');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('vcard_default')
                ->title('vCard | Dashboard')
                ->set_partial('header', 'partials/vcard_header');
        $this->template->build('vcard_main');
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
            $map ['msg'] = validation_errors();
            echo json_encode($map);
        } else {
            $user = array();
            if (isset($_FILES['wizard-picture']) && !empty($_FILES['wizard-picture']['name'])) {
                $config = array();
                $config['upload_path'] = './uploads/users/';
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
            $user['first_name'] = $this->input->post('firstname');
            $user['last_name'] = $this->input->post('lastname');
            $user['mobile'] = $this->input->post('contact');
            $user['email'] = $this->input->post('email');
            $user['home_postal_code'] = $this->input->post('pincode');
            $user['home_address'] = $this->input->post('address');
            $user1['id'] = $this->input->post('id');
            $this->load->model('Login_model');
            $uid = $this->common_model->updateRow(TABLES::$ADMIN_USER, $user, array('id' => $user1['id']));
            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "Your data has been saved";
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
            $map ['msg'] = validation_errors();
            echo json_encode($map);
        } else {
            $user = array();
            $user['company_name'] = $this->input->post('companyname');
            $user['job_title'] = $this->input->post('jobtitle1');
            $user['start_date'] = date("Y-m-d", strtotime($this->input->post('startdate')));
            $user['work_phone'] = $this->input->post('companycontact');
            $user['work_email'] = $this->input->post('companyemail');
            $user['work_website'] = $this->input->post('companywebsite');
            $user1['id'] = $this->input->post('id');
            $this->load->model('Login_model');
            $uid = $this->common_model->updateRow(TABLES::$ADMIN_USER, $user, array('id' => $user1['id']));
            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "Your data has been saved";
                echo json_encode($map);
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
        //$this->form_validation->set_rules('instagram_link', 'Instagram Link', 'trim|required');

        /* if ($this->form_validation->run() == FALSE) {
          $map ['status'] = 0;
          $map ['msg'] = validation_errors();
          echo json_encode($map);
          } else { */
        $map = array();
        $user = array();
        $user['facebook_link'] = $this->input->post('facebook_url');
        $user['twitter_link'] = $this->input->post('twitter_url');
        $user['google_plus_link'] = $this->input->post('googleplus_url');
        $user['linkedin_link'] = $this->input->post('linkedin_url');
        $user['youtube_link'] = $this->input->post('youtube_url');
        $user['pinterest_link'] = $this->input->post('pinterest_url');
        $user['received_email'] = $this->input->post('user_url');
        $user1['id'] = $this->input->post('id');
        $this->load->model('Login_model');
        $uid = $this->common_model->updateRow(TABLES::$ADMIN_USER, $user, array('id' => $user1['id']));
        if ($uid) {
            $map ['status'] = 1;
            $map ['msg'] = "Your data has been saved";
            echo json_encode($map);
        }
        //}
        //echo '<pre>';
        // print_r($_POST);
        exit;
    }

    //Added by Ranjit on 09 May 2017 to save Short Bio info End
    public function saveShortBio() {
        //	   $this->load->helper('utility_helper');
        $this->load->model('common_model');
        //        $this->load->helper(array(
        //            'form',
        //            'url'
        //        ));
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
        $user = array();
        //            $user['short_bio'] = $this->input->post('editor1');
        $user['short_bio'] = $this->input->post('short_bio');
        $user1['id'] = $this->input->post('id');
        $this->load->model('Login_model');
        $uid = $this->common_model->updateRow(TABLES::$ADMIN_USER, $user, array('id' => $user1['id']));
        if ($uid) {
            $map ['status'] = 1;
            $map ['msg'] = "Your data has been saved";
            echo json_encode($map);
        }
        //}
        //echo '<pre>';
        // print_r($_POST);
        exit;
    }

    //Added by Ranjit on 09 May 2017 to save Short Bio info End
   
    //Added by Ranjit on 09 May 2017 to save Experience Start

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
        $skill= array();
        $skill['user_id'] = $this->session->userdata('paasport_user_id');
        
        
        $skill_temp= $this->input->get('skill_list');
        
        $skill_array=explode(",",$skill_temp);
   
        foreach ($skill_array as $skill_item){
            
//            echo '<br/>'.$skill_item;
        
            $skill['skill']=$skill_item;
        
            $ins_skill= $this->common_model->insertRow($skill, TABLES::$SKILLS_AND_EXPERTISE);
                
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
    
    
    
    //Added by Ranjit on 09 May 2017 to save Experience Start

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
        //$this->form_validation->set_rules('instagram_link', 'Instagram Link', 'trim|required');

        /* if ($this->form_validation->run() == FALSE) {
          $map ['status'] = 0;
          $map ['msg'] = validation_errors();
          echo json_encode($map);
          } else { */
        $map = array();
        $experience = array();
        $experience['user_id'] = $this->session->userdata('paasport_user_id');
        $experience['company_name'] = $this->input->post('prevCompanyName');
        $experience['position_title'] = $this->input->post('prevJobTitle');
        $experience['start_date'] = date('Y-m-d', strtotime($this->input->post('prevStartDate')));
        ;
        $experience['end_date'] = date('Y-m-d', strtotime($this->input->post('prevEndDate')));
        ;

        $ins_experience = $this->common_model->insertRow($experience, TABLES::$EXPERIENCE_DETAILS);
        if ($ins_experience) {
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
    
    
    
    
    
//Delete Exp Start

public function deleteExperience()
{

    //$del_experience=$this->common_model->deleteRows(array('id' => '9'), TABLES::$SMS_TEMPLATE, array('id' =>'9'));
    $del_experience=1;
      if ($del_experience) {
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
    
    
    
    
    
    //Added by Ranjit on 09 May 2017 to save Education details Start

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
        //$this->form_validation->set_rules('instagram_link', 'Instagram Link', 'trim|required');

        /* if ($this->form_validation->run() == FALSE) {
          $map ['status'] = 0;
          $map ['msg'] = validation_errors();
          echo json_encode($map);
          } else { */
        $map = array();
        $edu = array();
        $edu['user_id'] = $this->session->userdata('paasport_user_id');
        $edu['institute_name'] = $this->input->post('eduInstituteName');
        $edu['degree_or_certificate'] = $this->input->post('degree');
        $edu['start_date'] = date('Y-m-d', strtotime($this->input->post('eduStartDate')));
        ;
        $edu['end_date'] = date('Y-m-d', strtotime($this->input->post('eduEndDate')));
        ;


//			            print_r($edu);
//			            die('here');

        $ins_experience = $this->common_model->insertRow($edu, TABLES::$EDUCATION_DETAILS);
        if ($ins_experience) {
            $map ['status'] = 1;
            $map ['msg'] = 'Experience added successfully.';
        } else {
            $map ['status'] = 0;
            $map ['msg'] = "Unable to add experience.";
        }
        echo json_encode($map);
        exit;
    }

    //Added by Ranjit on 09 May 2017 to save Education details End
}
