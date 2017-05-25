<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ClientsVcard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('common_model');
    }

    /**
     * code for create clients vcards
     */
    public function index() 	{        $session_data = $this->session->userdata();
        $slug = $this->uri->segment(1);
        $data['user'] = $this->common_model->getRecords(TABLES::$ADMIN_USER, '*', array('slug' => $slug));
        if (count($data['user']) < 1) {
            redirect(base_url() . '404');
        }		
       // $busi_strat = $this->common_model->getRecords(TABLES::$BUSINESS_STRAT, '*', array('user_id' => $arr[0]['id']));
       
        //$tabs = $this->common_model->getRecords(TABLES::$VCARD_TABS, '*', array('user_id' => $arr[0]['id']));
        //$custom_tabs = $this->common_model->getRecords(TABLES::$VCARD_CUSTOM_TABS, '*', array('user_id' => $arr[0]['id']));		
        $this->load->view('vcard_detail',$data);
    }

    public function clientContactForm() {
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

        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|numeric');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comments', 'trim|required');
        $this->form_validation->set_message('comment', 'required', 'The %s is required');

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
            $user['mobile'] = $this->input->post('mobile');
            $user['user_id'] = $this->input->post('hidden_id');
            $user['comments'] = $this->input->post('comment');
            $user['created_time'] = date('Y-m-d H:i:s');

            $uid = $this->common_model->insertRow($user, TABLES::$CONTACTED_USERS);
            if ($uid) {
                $msg = "<p>Hello,</p><p> " . $this->input->post('first_name') . " " . $this->input->post('last_name') . " user has contacted you on the vcard. The details are as below -</p> <p>First name - " . $this->input->post('first_name') . " </p><p>Lat Name - " . $this->input->post('last_name') . "</p>"
                        . "<p>Mobile - " . $this->input->post('mobile') . "</p><p>Comments - " . $this->input->post('comment') . "</p><p> Thanks,</p><p> Team vCards systems.</p>";
                $email = $this->common_model->sendEmail($this->input->post('hidden_email'), array("email"=>"contact@vcard.in","name"=>"vCard Systems"), $this->input->post('first_name') . " contacted you on vcard systems", $msg);
                $map ['status'] = 1;
                $map ['msg'] = "<p style='color:green'>Thanks for contacting me.</p>";
                echo json_encode($map);
                exit;
            }
        }
    }

    /**
     * Load view for share vcard page
     */
    public function share($id) {
        $arr = $this->common_model->getRecords(TABLES::$ADMIN_USER, '*', array('slug' => $id));
        $busi_strat = $this->common_model->getRecords(TABLES::$BUSINESS_STRAT, '*', array('user_id' => $arr[0]['id']));
        //print_r($data['data']);
        $this->template->set('data', $arr);
        $this->template->set('busi_strat', $busi_strat);
        $this->template->set('page', 'newcontact');
        $this->template->set('page_type', 'inner');
        $this->template->title(ucfirst($arr[0]['first_name']) . " " . ucfirst($arr[0]['last_name']) . " | vCard Sharing Dashboard");
        $this->template->build('share_vcard');
    }

}
