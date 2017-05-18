<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TextMsg extends CI_Controller {

    protected $_ci;

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('google_url_api');
        $this->load->model('common_model');
        $this->_ci = & get_instance();
        $this->_ci->load->config('twilio', TRUE);
        $this->number = $this->_ci->config->item('number', 'twilio');
    }

    /**
     * code for call homepage
     */
    public function index($id = "") {
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
        $session_data = $this->session->userdata('user_account');

        if ($id != '') {
            $this->template->set('phone', $id);
        }
        $opti_lists = $this->common_model->getRecords(TABLES::$OPTIN_LIST, '', array('user_id' => $session_data['user_id']));
        $sms_templates = $this->common_model->getRecords(TABLES::$SMS_TEMPLATE, '');
        $this->template->set('optindata', $opti_lists);
        $this->template->set('sms_templates', $sms_templates);
        $this->template->set('page', 'textmsg');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('vCard | Home')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('text_message');
    }

    /**
     * code for call homepage
     */
    public function editTxtmsg($id) {
        $session_data = $this->session->userdata('user_account');
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
        $dd = $this->common_model->getRecords(TABLES::$CRON_TEXTMSG, '', array('id' => decode_url($id)));
        $opti_lists = $this->common_model->getRecords(TABLES::$OPTIN_LIST, '', array('user_id' => $session_data['user_id']));
        $sms_templates = $this->common_model->getRecords(TABLES::$SMS_TEMPLATE, '');
        $this->template->set('edit_id', $id);
        $this->template->set('data', $dd);
        $this->template->set('optindata', $opti_lists);
        $this->template->set('sms_templates', $sms_templates);
        $this->template->set('page', 'textmsg');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('vCard | Home')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('edit_text_message');
    }

    public function shortUrl() {
        $url = $this->input->post('longurl');
        $data = array();
        $this->form_validation->set_rules('longurl', 'Url', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data ['status'] = 0;
            $data ['error'] = validation_errors();
            echo json_encode($data);
            exit;
        } else {
            $this->google_url_api->enable_debug(FALSE);
            $data['status'] = $this->google_url_api->get_http_status();
            $data['shorturl'] = $this->google_url_api->shorten($url);
            echo json_encode($data);
            exit;
        }
    }

    public function saveSmsTemplate() {
        $this->form_validation->set_rules('template_name', 'Template Name', 'trim|required');
        $this->form_validation->set_rules('template_body', 'Template body', 'trim|required');
        $session_data = $this->session->userdata();
        if ($this->form_validation->run() == FALSE) {
            $data ['status'] = 0;
            $data ['msg'] = validation_errors();
            echo json_encode($data);
            exit;
        } else {
            $save = $this->common_model->insertRow(array('template_name' => $this->input->post('template_name'), 'template_body' => $this->input->post('template_body'), 'user_id' => $session_data['user_account']['user_id'], 'created_by' => $session_data['user_account']['user_id']), TABLES::$SMS_TEMPLATE);
            if ($save) {
                $data['status'] = 1;
                $data['msg'] = 'Template Added Successfully';
            }
            echo json_encode($data);
            exit;
        }
    }

    public function updateSmsTemplate() {
        $this->form_validation->set_rules('template_body', 'Template body', 'trim|required');
        $session_data = $this->session->userdata();
        if ($this->form_validation->run() == FALSE) {
            $data ['status'] = 0;
            $data ['msg'] = validation_errors();
            echo json_encode($data);
            exit;
        } else {
            $save = $this->common_model->updateRow(TABLES::$SMS_TEMPLATE, array('template_body' => $this->input->post('template_body')), array('id' => $this->input->post('template_id')));
            if ($save) {
                $data['status'] = 1;
                $data['msg'] = 'Template Updated Successfully';
            }
            echo json_encode($data);
            exit;
        }
    }

    public function deleteSmsTemplate() {

        $delete = $this->common_model->deleteRows(array('id' => $this->input->post('template_id')), TABLES::$SMS_TEMPLATE, array('id' => $this->input->post('template_id')));
        if ($delete) {
            $data['status'] = 1;
            $data['msg'] = 'Template Deleted Successfully';
        }
        echo json_encode($data);
        exit;
    }

    public function sendTextMsg() {
        if (!$this->common_model->isLoggedIn()) {
            $map ['status'] = 2;
            $map ['msg'] = "Your session has been time out. Please login to continue.";
            echo json_encode($map);
            exit();
        }
        $session_data = $this->session->userdata();
        $error = array();
        if ($this->input->post('is_recurring') == '1') {
            if (($this->input->post('endon') == '' && $this->input->post('ongoing') != '1')) {
                $data ['status'] = 0;
                $data ['msg'] = "Please select either end date or check ongoing option";
                echo json_encode($data);
                exit;
            }
            if (($this->input->post('endon') != '' && $this->input->post('ongoing') == '1')) {
                $data ['status'] = 0;
                $data ['msg'] = "Please select either end date or check ongoing option";
                echo json_encode($data);
                exit;
            }
        }
        if (!isset($_POST['list_name']) && $this->input->post('to_additional_number') == '') {
            $data ['status'] = 0;
            $data ['msg'] = "Please select atleast one optin list or enter additional number";
            echo json_encode($data);
            exit;
        }
        if ($this->input->post('ongoing') != NULL) {
            $is_ongoing = $this->input->post('ongoing');
            $endon = null;
        } else {
            $endon = date("Y-m-d", strtotime($this->input->post('endon')));
            $is_ongoing = '0';
        }
        if ($this->input->post('is_recurring') != '1') {
            $is_recurring = '0';
        } else {
            $is_recurring = '1';
        }
        if ($this->input->post('send_time') == 'schedule') {
            $this->form_validation->set_rules('schedule_time', 'Scedule Time', 'trim|required');
        }
        $this->form_validation->set_rules('msg_body', 'Message Body', 'trim|required');
        $this->form_validation->set_rules('send_time', 'Send Option', 'trim|required');
        $data = array();

        if ($this->form_validation->run() == FALSE) {
            $data ['status'] = 0;
            $data ['msg'] = validation_errors();
            echo json_encode($data);
            exit;
        }
        if ($this->input->post('send_time') == 'send_now') {
            $contact1 = array();
            if (isset($_POST['list_name'])) {
                foreach ($this->input->post('list_name') as $opt) {
                    $contact = $this->common_model->getRecords(TABLES::$CONTACT_MAPPING, "contact_id", array('list_id' => $opt));
                    foreach ($contact as $key => $c) {
                        $mobile = $this->common_model->getRecords(TABLES::$CLIENT_CONTACTS, "phone", array('id' => $c['contact_id']));
                        foreach ($mobile as $mp) {
                            $contact1[] = $mp['phone'];
                        }
                    }
                }
            }
            if ($this->input->post('to_additional_number') != '') {
                $contact1[] = $this->input->post('to_additional_number');
            }

            foreach ($contact1 as $to_number) {
                $response = $this->common_model->twilioSms($this->number, $to_number, $this->input->post('msg_body'));
            }

            //$response = $this->common_model->twilioSms($this->number, $this->input->post('to_additional_number'), $this->input->post('msg_body'));
            if ($response === true) {
                $data ['status'] = 1;
                $data ['msg'] = 'SMS sent successfully.';
            } else {
                $data ['status'] = 0;
                $data ['msg'] = $response;
            }
            echo json_encode($data);
            exit;
        } else {
            $indata['text_body'] = $this->input->post('msg_body');
            $indata['additional_number'] = $this->input->post('to_additional_number');
            $indata['frequency'] = $this->input->post('frequency');
            $indata['endon'] = $endon;
            $indata['optin_list'] = serialize($this->input->post('list_name'));
            $indata['is_ongoing'] = $is_ongoing;
            $indata['is_recurring'] = $is_recurring;
            $indata['user_id'] = $session_data['user_account']['user_id'];
            $indata['created_time'] = date("Y-m-d h:i:s");
            $indata['send_time'] = date("Y-m-d H:i:s", strtotime($this->input->post('schedule_time')));
            $setcrone = $this->common_model->insertRow($indata, TABLES::$CRON_TEXTMSG);
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

    public function updateTxtmsg() {
        if (!$this->common_model->isLoggedIn()) {
            $map ['status'] = 2;
            $map ['msg'] = "Your session has been time out. Please login to continue.";
            echo json_encode($map);
            exit();
        }
        $session_data = $this->session->userdata();
        $error = array();
        if ($this->input->post('is_recurring') == '1') {
            if (($this->input->post('endon') == '' && $this->input->post('ongoing') != '1')) {
                $data ['status'] = 0;
                $data ['msg'] = "Please select either end date or check ongoing option";
                echo json_encode($data);
                exit;
            }
            if (($this->input->post('endon') != '' && $this->input->post('ongoing') == '1')) {
                $data ['status'] = 0;
                $data ['msg'] = "Please select either end date or check ongoing option";
                echo json_encode($data);
                exit;
            }
        }
        if (!isset($_POST['list_name']) && $this->input->post('to_additional_number') == '') {
            $data ['status'] = 0;
            $data ['msg'] = "Please select atleast one optin list or enter additional number";
            echo json_encode($data);
            exit;
        }
        if ($this->input->post('ongoing') != NULL) {
            $is_ongoing = $this->input->post('ongoing');
            $endon = null;
        } else {
            $endon = date("Y-m-d", strtotime($this->input->post('endon')));
            $is_ongoing = '0';
        }
        if ($this->input->post('is_recurring') != '1') {
            $is_recurring = '0';
        } else {
            $is_recurring = '1';
        }
        if ($this->input->post('send_time') == 'schedule') {
            $this->form_validation->set_rules('schedule_time', 'Scedule Time', 'trim|required');
        }
        $this->form_validation->set_rules('msg_body', 'Message Body', 'trim|required');
        $this->form_validation->set_rules('send_time', 'Send Option', 'trim|required');
        $data = array();

        if ($this->form_validation->run() == FALSE) {
            $data ['status'] = 0;
            $data ['msg'] = validation_errors();
            echo json_encode($data);
            exit;
        }
        if ($this->input->post('send_time') == 'send_now') {
            $contact1 = array();
            if (isset($_POST['list_name'])) {
                foreach ($this->input->post('list_name') as $opt) {
                    $contact = $this->common_model->getRecords(TABLES::$CONTACT_MAPPING, "contact_id", array('list_id' => $opt));
                    foreach ($contact as $key => $c) {
                        $mobile = $this->common_model->getRecords(TABLES::$CLIENT_CONTACTS, "phone", array('id' => $c['contact_id']));
                        foreach ($mobile as $mp) {
                            $contact1[] = $mp['phone'];
                        }
                    }
                }
            }
            if ($this->input->post('to_additional_number') != '') {
                $contact1[] = $this->input->post('to_additional_number');
            }

            foreach ($contact1 as $to_number) {
                $response = $this->common_model->twilioSms($this->number, $to_number, $this->input->post('msg_body'));
            }

            //$response = $this->common_model->twilioSms($this->number, $this->input->post('to_additional_number'), $this->input->post('msg_body'));
            if ($response === true) {
                $data ['status'] = 1;
                $data ['msg'] = 'SMS sent successfully.';
            } else {
                $data ['status'] = 0;
                $data ['msg'] = $response;
            }
            echo json_encode($data);
            exit;
        } else {
            $indata['text_body'] = $this->input->post('msg_body');
            $indata['additional_number'] = $this->input->post('to_additional_number');
            $indata['frequency'] = $this->input->post('frequency');
            $indata['endon'] = $endon;
            $indata['optin_list'] = serialize($this->input->post('list_name'));
            $indata['is_ongoing'] = $is_ongoing;
            $indata['is_recurring'] = $is_recurring;
            $indata['user_id'] = $session_data['user_account']['user_id'];
            $indata['created_time'] = date("Y-m-d h:i:s");
            $indata['send_time'] = date("Y-m-d H:i:s", strtotime($this->input->post('schedule_time')));
            $setcrone = $this->common_model->updateRow(TABLES::$CRON_TEXTMSG, $indata, array('id' => decode_url($this->input->post('edit_id'))));
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

    public function deleteTxtmsg($id) {
        $this->db->delete(TABLES::$CRON_TEXTMSG, array('id' => decode_url($id)));
        $this->session->set_flashdata('msg', 'Scheduled task deleted successfully');
        redirect(base_url() . 'scheduled-task');
    }

}
