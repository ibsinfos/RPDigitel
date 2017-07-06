<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email_template extends CI_Controller
{

    /**
     * constructor used to load all the models used in the controller.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('email_template_model');
        $this->load->model('global_setting_model');
    }

    /**
     * Function to display all the email templates pages
     */
    public function index()
    {
        /* checking admin is logged in or not */
        $session_data = $this->session->userdata('user_account');
        if (!$this->common_model->isLoggedIn()) {

            $this->session->set_flashdata('msg', 'Please login to contninue.');

            redirect(base_url() . "backend/login");

        }
        if ($session_data['role_id'] !='1') {

            $this->session->set_flashdata('msg', 'You are not authorized to access backend');

            redirect(base_url() . "login");

        }
        $data = $this->common_model->commonFunction();
        if ($data['user_account']['role_id'] != 1) {
            $this->session->set_userdata("msg", "<span class='error'>You doesn't have priviliges to manage global settings!</span>");
            redirect(base_url() . "backend/home");
        }

        $data['arr_email_templates'] = $this->email_template_model->getEmailTemplateDetails();
        $data['arr_global_settings'] = $this->common_model->getGlobalSettings();
        $this->template->set('global', $data['arr_global_settings']);
        $this->template->set('page', 'email_template_list');
        $this->template->set('arr_email_templates', $data['arr_email_templates']);
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend')
                ->title('vCard | Manage Email Templates')
                ->set_partial('header', 'partials/header')
                ->set_partial('leftpanel', 'partials/leftpanel')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('email/email_templates_list');
    }



    /**
     * Function to edit email template
     * 
     * @param integer $email_template_id
     */
    public function editEmailTemplate($email_template_id = '')
    {

        $session_data = $this->session->userdata('user_account');
        if (!$this->common_model->isLoggedIn()) {

            $this->session->set_flashdata('msg', 'Please login to contninue.');

            redirect(base_url() . "backend/login");

        }
        if ($session_data['role_id'] !='1') {

            $this->session->set_flashdata('msg', 'You are not authorized to access backend');

            redirect(base_url() . "login");

        }


        $this->load->model('email_template_model');
        $data = $this->common_model->commonFunction();

        if ($this->input->post('input_subject') != '') {
            $arr_to_update = array("email_template_subject" => $this->input->post('input_subject'), "email_template_content" => $this->input->post('text_content'), "date_updated" => date("Y-m-d H:i:s"));

            $email_template_id_to_update = $this->input->post('email_template_hidden_id');
            $this->email_template_model->updateEmailTemplateDetailsById($email_template_id_to_update, $arr_to_update);
            $this->session->set_userdata('msg', 'Email Template details has been updated sucessfully.');
            redirect(base_url() . "backend/email-template/list");
        }
        $data['arr_email_template_details'] = $this->email_template_model->getEmailTemplateDetailsById($email_template_id);
        $data['arr_global_settings'] = $this->common_model->getGlobalSettings();
        $this->template->set('global', $data['arr_global_settings']);
        $this->template->set('page', 'edit_email_template');
        $this->template->set('arr_email_template_details', $data['arr_email_template_details']);
        $this->template->set('email_template_id', $email_template_id);
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend')
                ->title('vCard | Edit Email Templates')
                ->set_partial('header', 'partials/header')
                ->set_partial('leftpanel', 'partials/leftpanel')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('email/email_template_edit');
    }

}
