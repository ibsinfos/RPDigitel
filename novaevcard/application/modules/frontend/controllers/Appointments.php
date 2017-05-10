<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {

    protected $_ci;

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('common_model');
        $this->_ci = & get_instance();
        $this->_ci->load->config('twilio', TRUE);
        $this->number = $this->_ci->config->item('number', 'twilio');
    }

    /**
     * code for call homepage
     */
    public function index() {
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
        $this->template->set('page', 'appointment');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('vCard | Home')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('appointment');
    }

    /*
     * Code for calling add appointment page
     */

    public function addNewAppointment($date) {
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
        
        $session_data = $this->session->userdata('user_account');
        $opti_lists = $this->common_model->getRecords(TABLES::$OPTIN_LIST, '',array('user_id'=>$session_data['user_id']));
        $sms_templates = $this->common_model->getRecords(TABLES::$SMS_TEMPLATE, '');
        $this->template->set('page', 'add_oppointment');
        $this->template->set('optindata', $opti_lists);
        $this->template->set('sms_templates', $sms_templates);
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('vCard | Home')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('add_appointment');
    }

    public function saveAppointment() {
        if (!$this->common_model->isLoggedIn()) {
           $map ['status'] = 2;
            $map ['msg'] = "Your session has been time out. Please login to continue.";
            echo json_encode($map);
            exit();
        }
        $session_data = $this->session->userdata();
        $error = array();
        $app = date("Y-m-d",strtotime($this->input->post('appointment_time')));
        if($app < date('Y-m-d')){
             $map ['status'] = 0;
            $map ['msg'] = "Please select future date for appointment.";
            echo json_encode($map);
            exit();
        }
        if ($this->input->post('optin_list') != '') {
            $data1 = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('client_mobile_number'),
                'user_id' => $session_data['user_account']['user_id'],
                'created_time' => date("Y-m-d H:i:s"),
            );
            $insert = $this->db->insert(TABLES::$CLIENT_CONTACTS, $data1);
            $lastid = $this->db->insert_id();
            $data2 = array("list_id" => $this->input->post('optin_list'), "contact_id" => $lastid, "created_date" => date("Y-m-d H:i:s"));
            $insert2 = $this->db->insert(TABLES::$CONTACT_MAPPING, $data2);
        }
        $this->form_validation->set_rules('msg_body', 'Message Body', 'trim|required');
        $this->form_validation->set_rules('client_mobile_number', 'Client Mobile Number', 'trim|required');
        $data = array();

        if ($this->form_validation->run() == FALSE) {
            $data ['status'] = 0;
            $data ['msg'] = validation_errors();
            echo json_encode($data);
            exit;
        }
        if ($this->input->post('send_option') == 'send_now') {
            $response = $this->common_model->twilioSms($this->number, $this->input->post('client_mobile_number'), $this->input->post('msg_body'));
            if ($response === true) {
                $data ['status'] = 1;
                $data ['msg'] = 'SMS sent successfully.';
            } else {
                $data ['status'] = 0;
                $data ['msg'] = $response;
            }
            $indata['is_complete'] = '1';
        }
        $indata['appointment_date'] = date("Y-m-d H:i:s", strtotime($this->input->post('appointment_time')));
        $indata['text_msg'] = $this->input->post('msg_body');
        $indata['client_mobile'] = $this->input->post('client_mobile_number');
        $indata['client_first_name'] = $this->input->post('first_name');
        $indata['client_last_name'] = $this->input->post('last_name');
        $indata['notify_number'] = $this->input->post('notify_number');
        $indata['prior_time'] = $this->input->post('prior_time');
        $indata['notify_email'] = $this->input->post('notify_email');

        $indata['user_id'] = $session_data['user_account']['user_id'];
        $indata['created_time'] = date("Y-m-d h:i:s");
//        $indata['send_time'] = date("Y-m-d H:i:s", strtotime($this->input->post('schedule_time')));
        $setcrone = $this->common_model->insertRow($indata, TABLES::$APPOINTMENTS);
        if ($setcrone) {
            $data ['status'] = 1;
            $data ['msg'] = 'SMS Sceduled successfully.';
        } else {
            $data ['status'] = 0;
            $data ['msg'] = "Unable to scedule sms.";
        }
        echo json_encode($data);
        exit;
    }

}
