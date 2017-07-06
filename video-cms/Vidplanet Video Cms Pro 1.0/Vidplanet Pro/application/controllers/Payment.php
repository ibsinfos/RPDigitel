<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        
		$this->load->library('session');
		$models	=	array('pusher_model' => 'pusher', 
							'youtube_model' => 'youtube', 
								'video_model' => 'video');
		$this->load->model($models);
    }

    /***default functin, redirects to login page if no admin logged in yet** */

    public function index() {

    }

    /*
     * 	$method		=	paypal/skrill/2CO/mastercard
     */

    function pay_invoice() {
        if ($this->session->userdata('user_login') != 1)
            redirect(site_url('home/login'), 'refresh');

        $method = $this->input->post('method');

        if ($method == 'paypal')
            $this->paypal_payment();
    }

    // param1 = project_milestone_id
    function paypal_payment($video_pack_code = '') {
      // in video project the project milestone id is video pack code
        $paypal_email           =   $this->db->get_where('settings', array('type' => 'paypal_email'))->row()->description;
        
        $system_currency_id     =   $this->db->get_where('settings' , array('type'=>'system_currency_id'))->row()->description;
        $currency_code          =   $this->db->get_where('currency' , array('currency_id'=>$system_currency_id))->row()->currency_code;

        $video_pack_title       =   $this->db->get_where('video_pack', array('code' => $video_pack_code))->row()->title;
        $total_amount           =   $this->db->get_where('video_pack', array('code' => $video_pack_code))->row()->price;
        

        /** **TRANSFERRING USER TO PAYPAL TERMINAL*** */
        $this->paypal->add_field('rm', 2);
        $this->paypal->add_field('no_note', 0);
        $this->paypal->add_field('item_name', $video_pack_title);
        $this->paypal->add_field('amount', $total_amount);
        $this->paypal->add_field('currency_code', $currency_code);
        $this->paypal->add_field('custom', $video_pack_code);
        $this->paypal->add_field('business', $paypal_email);
        $this->paypal->add_field('notify_url', site_url('payment/paypal_ipn/'));
        $this->paypal->add_field('cancel_return', site_url('home/paypal_transaction_check/'.$video_pack_code.'/payment_cancel'));
        $this->paypal->add_field('return', site_url('home/paypal_transaction_check/'.$video_pack_code.'/payment_success'));
        //$paypal_type = $this->db->get_where('settings' , array('type' => 'paypal_type'))->row()->description;
        //$this->paypal->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        $this->paypal->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
        $this->paypal->submit_paypal_post();
    }

    // confirm paypal payment internally and preserve payment info into db via ipn call
    function paypal_ipn() {
        if ($this->paypal->validate_ipn() == true) {
            $ipn_response = '';
            foreach ($_POST as $key => $value) {
                $value = urlencode(stripslashes($value));
                $ipn_response .= "\n$key=$value";
            }
        }
    }

    function stripe_payment($param1 = '', $param2 = '') {
        if ($this->session->userdata('user_login') != 1) {
            redirect(site_url('home/login'), 'refresh');
        }

         if ($param1 == 'pay') {
            require_once(APPPATH . 'libraries/stripe-php/init.php');
            $stripe_secret_key = $this->db->get_where('settings' , array('type' => 'stripe_secret_key'))->row()->description;
            \Stripe\Stripe::setApiKey($stripe_secret_key); //system payment settings
            try {

                if (!isset($_POST['stripeToken']))
                    throw new Exception("The Stripe Token was not generated correctly");


                //echo $_POST['stripeToken'];
                $currency_id          = $this->db->get_where('settings', array('type' => 'system_currency_id'))->row()->description;
                $currency_code        = $this->db->get_where('currency', array('currency_id' => $currency_id))->row()->currency_code;
                $video_pack_code      = $param2;
                $amount               = $this->db->get_where('video_pack' , array('code' => $video_pack_code))->row()->price;
                $amount              *= 100;
                $user_email           = $this->db->get_where('user' , array('user_id' => $this->session->userdata('user_id')))->row()->email;

                //echo $_POST['stripeToken'];
                //echo $currency_id.'-'.$currency_code.'-'.$video_pack_code.'-'.$amount.'-'.$user_email;
                $customer = \Stripe\Customer::create(array(
                    'email' => $user_email, // user email id
                    'card'  => $_POST['stripeToken']
                ));

                $charge = \Stripe\Charge::create(array(
                    'customer'  => $customer->id,
                    'amount'    => $amount,
                    'currency'  => $currency_code
                ));

                //create new payment entry
                $this->db->where('code', $video_pack_code);
                $video_pack_details_array = $this->db->get('video_pack')->row_array();
                $data2['code']  =   substr(md5(rand(0, 1000000)), 0, 7);
                $data2['video_pack_id']  =   $video_pack_details_array['video_pack_id'];
                $data2['price']         =   $video_pack_details_array['price'];
                $data2['buyer_code']          =   $this->session->userdata('code');
                $data2['payment_method'] =   'stripe';
                $data2['date_added']     =   strtotime(date('Y-m-d H:i:s'));
                $this->db->insert('payment', $data2);

                $this->db->where('code', $video_pack_code);
                $video_pack_id = $this->db->get('video_pack')->row()->video_pack_id;
                $this->db->where('code', $this->session->userdata('code'));
                $user_info = $this->db->get('user')->row_array();
                $new_purchased_video_pack = $user_info['purchased_video_pack_ids'].$video_pack_id.',';
                $data = array(
                'purchased_video_pack_ids' => $new_purchased_video_pack
                );
                $this->db->where('code', $this->session->userdata('code'));
                $this->db->update('user', $data);


                $error = '';

                $this->session->set_flashdata('success_message', get_phrase('your_payment_was_successful.'));
                redirect(site_url('home/video_pack_details/').$video_pack_code, 'refresh');
            } catch (Exception $e) {
                echo $e;
                die();
                $error = $e->getMessage();
                $this->session->set_flashdata('error_message', get_phrase('payment_was_not_completed.'));
                redirect(site_url('home/video_pack_details/').$param2, 'refresh');
            }
        }
        // $page_data['video_pack_code']         = $param2;
        // $page_data['page_name']               = 'video_pack_code_details';
        // $this->load->view('home/index', $page_data);
    }

}
