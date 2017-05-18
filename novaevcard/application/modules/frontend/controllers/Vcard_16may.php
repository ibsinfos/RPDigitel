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
        
		$user_priceplan= $this->common_model->getRecords(TABLES::$PRICE_PLAN, '*', array('user_id' => $session_data['user_account']['user_id']));
		
		$user_list= $this->common_model->getRecords(TABLES::$LIST_DETAILS, '*', array('user_id' => $session_data['user_account']['user_id']));
		
		$user_link= $this->common_model->getRecords(TABLES::$LINK_DETAILS, '*', array('user_id' => $session_data['user_account']['user_id']));
		$user_video_url= $this->common_model->getRecords(TABLES::$VIDEO_DETAILS, '*', array('user_id' => $session_data['user_account']['user_id']));
		$user_portfolio= $this->common_model->getRecords(TABLES::$PORTFOLIO_DETAILS, '*', array('user_id' => $session_data['user_account']['user_id']));
       
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
                ->title('Paasport | Dashboard')
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
            $map ['ins_experience_id'] = $ins_experience;
            $map ['msg'] = 'Experience added successfully.';
        } else {
            $map ['status'] = 0;
			$map ['ins_experience_id'] = '';
            $map ['msg'] = "Unable to add experience.";
        }
        echo json_encode($map);
        exit;
    }

    //Added by Ranjit on 09 May 2017 to save Experience End
    
    
    
    
    
//Delete Exp Start

public function deleteExperience()
{
	 $this->load->model('common_model');
     $this->load->helper(array(
            'form',
            'url'
        )); 
    if(!empty($this->input->post('exp_ids')))
	{
		$delFlag=0;	
		foreach($this->input->post('exp_ids') as $exp_id)
		{
			if(!empty($exp_id))
			{
				$this->common_model->deleteRows(array('id'=>$exp_id), TABLES::$EXPERIENCE_DETAILS, 'id');
				$delFlag=1;	
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
        
        $edu['end_date'] = date('Y-m-d', strtotime($this->input->post('eduEndDate')));


        $ins_experience = $this->common_model->insertRow($edu, TABLES::$EDUCATION_DETAILS);
        if ($ins_experience) {
            $map ['ins_edu_id'] = $ins_experience;
            $map ['status'] = 1;
            $map ['msg'] = 'Experience added successfully.';
        } else {
			$map ['ins_edu_id']='';	
            $map ['status'] = 0;
            $map ['msg'] = "Unable to add experience.";
        }
        echo json_encode($map);
        exit;
    }

    //Added by Ranjit on 09 May 2017 to save Education details End
	
	
	public function deleteEducation()
	{
		 $this->load->model('common_model');
		 $this->load->helper(array(
				'form',
				'url'
			)); 
			if(!empty($this->input->post('edu_ids')))
			{
				$delFlag=0;	
				foreach($this->input->post('edu_ids') as $edu_id)
				{
					if(!empty($edu_id))
					{
						$this->common_model->deleteRows(array('id'=>$edu_id), TABLES::$EDUCATION_DETAILS, 'id');
						$delFlag=1;	
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
	public function savePricePlan()
	{
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
            $map ['msg'] = validation_errors();
            echo json_encode($map);
			exit;
        } else 
		{
            $price_plan = array();          
            $price_plan['plan_title'] = $this->input->post('pricingtitle');
            $price_plan['plan_description'] = $this->input->post('pricingdescription');
            $price_plan['price'] = $this->input->post('pricingprice');
            $price_plan['user_id'] = $this->session->userdata('paasport_user_id');
        	$ins_experience = $this->common_model->insertRow($price_plan, TABLES::$PRICE_PLAN);
			if ($ins_experience) {
				$map ['ins_price_id'] = $ins_experience;
				$map ['status'] = 1;
				$map ['msg'] = 'Price Plan added successfully.';
			} else {
				$map ['ins_edu_id']='';	
				$map ['status'] = 0;
				$map ['msg'] = "Unable to  add Price Plan.";
			}
			echo json_encode($map);
			exit;
			
			
        }
       
		
	}
	// End save price plan
	// start save price plan image
	public function savePricePlanImage()
	{
		
		//echo '<pre>'; print_r($_FILES); exit;
		
		$this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
       
        $errorMsg = array();
        $err_num = 0;        
            $user = array();
            $map = array();
			if(!empty($_FILES['file']['name']))
			{
				for($i=0;$i<count($_FILES['file']['name']);$i++)
				{
						$_FILES['ufile']['name'] = $_FILES['file']['name'][$i];
						$_FILES['ufile']['type'] = $_FILES['file']['type'][$i];
						$_FILES['ufile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
						$_FILES['ufile']['error'] = $_FILES['file']['error'][$i];
						$_FILES['ufile']['size'] = $_FILES['file']['size'][$i];
						
						$config = array();
						$config['upload_path'] = './uploads/price_plan/';
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
						
						$ins_experience = $this->common_model->insertRow($user, TABLES::$PRICE_PLAN);
						if ($ins_experience) {
							$map [$i]['user_img'] = base_url().$user['plan_image'];
							$map [$i]['ins_price_id'] = $ins_experience;
							$map [$i]['status'] = 1;
							$map [$i]['msg'] = 'Price Plan Image uploaded successfully.';
						} else {
							$map [$i]['user_img'] = '';
							$map [$i]['ins_edu_id']='';	
							$map [$i]['status'] = 0;
							$map [$i]['msg'] = "Unable to upload Price Plan Image.";
						}
						//echo json_encode($map);
						//exit;
				}
			}     
					
        echo json_encode($map);
        exit;
	}
	// End save price plan image
	
	// start save list	
	public function saveList()
	{
		
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
            $map ['msg'] = validation_errors();
            echo json_encode($map);
			exit;
        } else 
		{
            $price_plan = array();          
            $price_plan['list'] = $this->input->post('listname');
            $price_plan['user_id'] = $this->session->userdata('paasport_user_id');
        	$ins_experience = $this->common_model->insertRow($price_plan, TABLES::$LIST_DETAILS);
			
			if ($ins_experience) {
				$map ['ins_price_id'] = $ins_experience;
				$map ['status'] = 1;
				$map ['msg'] = 'List added successfully.';
			} else {
				$map ['ins_edu_id']='';	
				$map ['status'] = 0;
				$map ['msg'] = "Unable to  add List.";
			}
			echo json_encode($map);
			exit;
			
			
        }
       
		
	}
	// end save list
	
	// start save link	
	public function saveLink()
	{
		
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
        } else 
		{
            $price_plan = array();          
            $price_plan['link'] = $this->input->post('addlink');
            $price_plan['user_id'] = $this->session->userdata('paasport_user_id');
        	$ins_experience = $this->common_model->insertRow($price_plan, TABLES::$LINK_DETAILS);
			
			if ($ins_experience) {
				$map ['ins_price_id'] = $ins_experience;
				$map ['status'] = 1;
				$map ['msg'] = 'Link added successfully.';
			} else {
				$map ['ins_edu_id']='';	
				$map ['status'] = 0;
				$map ['msg'] = "Unable to  add Link.";
			}
			echo json_encode($map);
			exit;
			
			
        }
       
		
	}
	// end save list
	
	
	// start save video url	
	public function saveVideoUrl()
	{
		
		$this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;
        $this->form_validation->set_rules('videourl', 'Video URL', 'trim|required');
       
        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
			exit;
        }
		else 
		{
            $price_plan = array();          
            $price_plan['video_url'] = $this->input->post('videourl');
            $price_plan['video_description'] = $this->input->post('video_description');
            $price_plan['user_id'] = $this->session->userdata('paasport_user_id');
        	$ins_experience = $this->common_model->insertRow($price_plan, TABLES::$VIDEO_DETAILS);
			
			if ($ins_experience) {
				$map ['ins_price_id'] = $ins_experience;
				$map ['status'] = 1;
				$map ['msg'] = 'Video URL added successfully.';
			} else {
				$map ['ins_edu_id']='';	
				$map ['status'] = 0;
				$map ['msg'] = "Unable to  add Video URL.";
			}
			echo json_encode($map);
			exit;		
        }
       
		
	}
	// end  save video url

	//start  save portfolio
	public function savePortfolio()
	{
			
		$this->load->helper('utility_helper');
        $this->load->model('common_model');
        $this->load->helper(array('form', 'url', 'email'));
        $errors = array();
        $this->load->library('form_validation');
        $errorMsg = array();
        $err_num = 0;  

		if(!empty($this->input->post('portfolioDiv')) && $this->input->post('portfolioDiv')=='descprining1')
		{
			$this->form_validation->set_rules('videourl_portfolio', 'Video URL', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$map ['status'] = 0;
				$map ['msg'] = validation_errors();
				echo json_encode($map);
				exit;
			}
		}	
        $user = array();
		
            if (isset($_FILES['file-2']) && !empty($_FILES['file-2']['name']))
			{
                $config = array();
                $config['upload_path'] = './uploads/portfolio/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = FALSE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('file-2')) {
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
            } 
            
            if(!empty($this->input->post('videourl_portfolio')))
			{
				$user['video_url'] = $this->input->post('videourl_portfolio');
				$user['user_id'] = $this->session->userdata('paasport_user_id');
			}
            if(!empty($user))
			{
				$ins_experience = $this->common_model->insertRow($user, TABLES::$PORTFOLIO_DETAILS);
				if ($ins_experience) 
				{
					$map['user_img']='';
					if (!empty($user['image']))
					{
						$map['user_img'] = base_url().$user['image'];
					}
					$map ['ins_price_id'] = $ins_experience;
					$map ['status'] = 1;
					$map ['msg'] = 'Portfolio uploaded successfully.';
				} else {
					$map['user_img']='';	
					$map ['ins_edu_id']='';	
					$map ['status'] = 0;
					$map ['msg'] = "Unable to upload Portfolio.";
				}
				echo json_encode($map);
				exit;
			}	
        
        exit;
	}
	// End save portfolio	
}
