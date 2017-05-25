<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller
{

    private $stripeSecretKey = "sk_test_TSinCwEc7vZNsRCqozPQ5DmE"; // Stripe Secret Key
    private $stripePublishKey = "pk_test_Q5EEVATtiOtsgVgPgRglKRgR"; // Stripe Publishable Key

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('common_model');
    }

    public function index()
    {
        $session_data = $this->session->userdata();
        $data = $this->common_model->commonFunction();
        $arr['title'] = 'Stripe Payment | Secure Payment Form';
        $arr['stripePublishKey'] = $this->stripePublishKey;
        $arr['error'] = '';
        $arr['success'] = '';
        $this->form_validation->set_rules('cardholdername', "Card Holder's Name", 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $stripeToken = $this->input->post('stripeToken');
            $plan_data = $this->common_model->getRecords(TABLES::$MST_PLANS, '*', array('plan_name' => 'vcard_plan'));
           if($session_data['user_account']['plan_id'] == 'yearly'){
               $price = $plan_data[0]['yearly_cost']; 
           }else{
               $price = $plan_data[0]['monthly_cost'] + $plan_data[0]['setup_cost']; 
           }
            $this->load->library('stripe_payment'); // load stripe payment libaray
            $response = $this->stripe_payment->makePayment($this->stripeSecretKey, $stripeToken, $price); // call the stripe payment function
            if ($response['success'] == 1) {  // stripe success
                $salt = "abcdldkfldfknsdfkl123456789";
                $encrypted_id = base64_encode($session_data['user_account']['user_id'] . $salt);
                $activation_link = base_url() . "email_activation/" . $encrypted_id;
                $reserved_words = array
                    (
                    "||USER_NAME||" => $session_data['user_account']['email'],
                    "||FIRST_NAME||" => $session_data['user_account']['first_name'],
                    "||LAST_NAME||" => $session_data['user_account']['last_name'],
                    "||USER_EMAIL||" => $session_data['user_account']['email'],
                    "||USER_PASSWORD||" => $session_data['user_account']['pass'],
                    "||ACTIVATION_LINK||" => $activation_link,
                    "||SITE_URL||" => base_url(),
                    "||SITE_TITLE||" => stripslashes($data['global']['site_title'])
                );
                $template_title = 'registration';
                $arr_emailtemplate_data = $this->common_model->getEmailTemplateInfo($template_title, $reserved_words);

                $recipeinets = $session_data['user_account']['email'];
                $from = array("email" => stripslashes($data['global']['site_email']), "name" => stripslashes($data['global']['site_title']));

                $subject = $arr_emailtemplate_data['subject'];
                $message = $arr_emailtemplate_data['content'];

                $mail = $this->common_model->sendEmail($recipeinets, $from, $subject, $message);
                 
                $msg= 'Your payment was successful.We have sent you the activation link on your email. Please activate your account and continue...';
                $this->session->unset_userdata('user_account');
                $this->session->set_flashdata('msg', $msg);
                redirect(base_url().'login');
            } else if ($response['error'] == 1) {  // stripe error
                $data['error'] = $response['msg'];
                $this->load->view('dashboard', $data);
            } else {
                $data['error'] = 'Something goes wrong';
                $this->load->view('payment', $data);
            }
        } else {
            $this->load->view('payment', $arr, false);
        }
        
    }

}
