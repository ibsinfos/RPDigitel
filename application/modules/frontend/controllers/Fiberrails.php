<?php

class Fiberrails extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('membership_model');
    }

    function index() {

        if (!isset($_SESSION)) {
            session_start();
        }


        $query_get_country = $this->db->get('country');
        $data['country_list'] = $query_get_country->result();
        $this->load->model('common_model');
        $data['slug'] = '';
        if (!empty($_SESSION['paasport_user_id'])) {
            $data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
        }
        $this->template->set('country_list', $data['country_list']);
        $this->template->set('page', 'fiber-rails');
        $this->template->set('slug', $data['slug']);
        $this->template->set_theme('default_theme');
        $this->template->set_layout('rpdigitel_frontend')
                ->title('Home | RPDigitel')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('fiber-rails');
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $user_role = $this->session->userdata('role');
        // print_r($this->session->userdata);
        if (!isset($is_logged_in) || $is_logged_in != true || $user_role != 'user') {
            //            redirect('user/login');
            redirect('login');

            die();
        }
    }

    function wbs_trial() {

        /*
          //****************************** Without AJAX
          if ($this->input->post('organization_name')) {
          $org_name = $this->input->post('organization_name');
          $this->load->model('wbs_model');
          $free_trial = $this->wbs_model->get_free_trial('1', '30', $org_name);
          if ($free_trial == 1) {
          $data['message'] = "Free trial activated";
          redirect('http://localhost/crm/');
          } else {
          $data['message'] = $free_trial;

          $data['main_content'] = 'free_trial_success';
          $this->load->view('includes/template', $data);
          }
          }
          //****************************** Without AJAX
         */

        //For AJAX call Start
        if (!isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION['user_name'])) {
            $user = $this->membership_model->get_user_details($_SESSION['user_id']);
        } else {
            $user = $this->membership_model->get_user_details($this->input->post('username'));
        }

        // print_r($user);
        // die('ddd');

        $data = array(
            'username' => $this->input->post('username'),
            'is_logged_in' => true,
            'role' => $user['role'],
            'user_id' => $user['user_id']
        );


        // $_SESSION['user_name'] = $this->input->post('username');
        //                $_SESSION['user_name']="admin";
        if (!isset($_SESSION['password'])) {
            $_SESSION['password'] = $this->membership_model->hash($this->input->post('password'));
        }
        //                $_SESSION['password']="55677fc54be3b674770b697114ce0730300da0f6783202e2d17d7191ba68ec97cab4b61d3470f298d0ca2435111c29b8d5ad63058b725916336fdab9584829f4";

        $this->session->set_userdata($data);

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['crm_db_id'] = $user['crm_db_id'];
        $_SESSION['email_address'] = $user['email_address'];
        $_SESSION['wbs_trial'] = 'set';
        $_SESSION['member_service_remaining_days'] = 30;
        $_SESSION['crm_subscription'] = 'yes';

        // print_r($_SESSION);
        // die('dd');

        $org_name = $this->input->post('organization_name');
        $this->load->model('wbs_model');
        $free_trial = $this->wbs_model->get_free_trial('1', '30', $org_name);
        if ($free_trial == 1) {
            //echo $data['message'] = "Free trial activated";
            echo true;
            //redirect('http://localhost/crm/');
            $this->session->set_flashdata('free_trial_success_msg', 'You have registered with 30 days free trial successfully');
        } else {
            echo $data['message'] = $free_trial;

            //$data['main_content'] = 'free_trial_success';
            //$this->load->view('includes/template', $data);
        }
    }

    //For AJAX call End    



    function wbs_trial_with_signup() {


        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
//			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{4,}/]');
        $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'trim|required|matches[password]');

        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['user_name'] = $this->input->post('username');

        if ($this->form_validation->run() == FALSE) {

            echo validation_errors('<p class="error">');
            // $this->load->view('signup_form');
        } else {

            $query_result = $this->membership_model->create_member();
            if ($query_result !== TRUE) {

                echo '<p class="error">' . $query_result;

                //$this->load->view('signup_form');
            } else {
                //$data['main_content'] = 'signup_successful';
                //	$this->load->view('includes/template', $data);


                /* clone db start */


                $crmfree_subscription = $this->wbs_trial();


                if ($crmfree_subscription == true) {

                    //To get crm membership details
                    $crm_membership = $this->membership_model->get_database_details($_SESSION['crm_db_id']);
                    if ($crm_membership != 'errror') {
                        //echo 'true';
                        // echo $crm_membership;
                    } else {
                        echo 'Error while registering with CRM';
                    }
                    /*                     * ********************* */


                    echo "true";
                } else {

                    //To get crm membership details
                    $crm_membership = $this->membership_model->get_database_details($_SESSION['crm_db_id']);
                    if ($crm_membership != 'errror') {
                        //echo 'true';
                        // echo $crm_membership;
                    } else {
                        echo 'Error while registering with CRM';
                    }
                    /*                     * ********************* */

                    echo $crmfree_subscription;
                }

                // echo 'true';
                /* clone db start */

                //redirect('user/Dashboard/members_area');
            }
        }
    }

    function wbs_subscribe() {

        $this->is_logged_in();

        $data['main_content'] = 'wbs-subscribe';
        $this->load->view('includes/template', $data);
    }

    function wbs_payment() {
        /*
          $session = $this->session->userdata('user_account');
          if ($session['user_id'] == "") {
          $userid = "";
          } else {
          $userid = $session['user_id'];
          }
         */

        // $donat_data = array("user_id" => $userid, "name" => $this->input->post('name'), "email" => $this->input->post('name'), "phone" => $this->input->post('phone'), "amount" => $this->input->post('amount'), "message" => $this->input->post('message'));


        $userid = 'ranjit001';
        $name = 'Ranjit';
        $email = 'paritosh@rebelute.com';
        $phone = '8806725624';
        $amount = '100';
        $message = 'Test Paypal integration';

        $donat_data = array("user_id" => $userid, "name" => $name, "email" => $email, "phone" => $phone, "amount" => $amount, "message" => $message);

        //        $lastid = $this->common_model->insertRow($donat_data, TABLES::$DONATIONS);
        //        $product_name = 'Donation';
        $product_name = 'RPDigitel';
        $product_currency = 'USD';
        $product_id = 4;
        //        $product_price = $_POST['amount'];
        $product_price = $amount;
        //Here we can use paypal url or sanbox url.
        $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        //Here we can used seller email id. 
        //        $merchant_email = 'vrishalidemo@gmail.com';
        $merchant_email = 'atuls@rebelute.com';
        //here we can put cancle url when payment is not completed.
        //        $cancel_return = "http://localhost/donate-with-paypal/index.php";
        $cancel_return = base_url() . "user/wbs_suite/wbs_subscribe";
        //here we can put cancle url when payment is Successful.
        //        $success_return = base_url() . "backend/donate/success/" . $lastid;
        $success_return = base_url() . "user/wbs_suite/wbs_subscription_succesful";
        ?>
        <div style="margin-left: 38%"><img src="images/ajax-loader.gif"/><img src="images/processing_animation.gif"/></div>
        <form name = "myform" action = "<?php echo $paypal_url; ?>" method = "post" target = "_top">
        <!--<input type = "hidden" name = "cmd" value = "_donations">-->
            <input type = "hidden" name = "cmd" value = "_donations">
            <input type = "hidden" name = "cancel_return" value = "<?php echo $cancel_return ?>">
            <input type = "hidden" name = "return" value = "<?php echo $success_return; ?>">
            <input type = "hidden" name = "business" value = "<?php echo $merchant_email; ?>">
            <input type = "hidden" name = "lc" value = "C2">
            <input type = "hidden" name = "item_name" value = "<?php echo $product_name; ?>">
            <input type = "hidden" name = "item_number" value = "<?php echo $product_id; ?>">
            <input type = "hidden" name = "amount" value = "<?php echo $product_price; ?>">
            <input type = "hidden" name = "currency_code" value = "<?php echo $product_currency; ?>">
            <input type = "hidden" name = "button_subtype" value = "services">
            <input type='hidden' name='rm' value='2'>
            <input type = "hidden" name = "no_note" value = "0">
        </form>
        <script type="text/javascript">
            document.myform.submit();
        </script>
        <?php
    }

    function wbs_subscribe_payment_success() {

        $this->is_logged_in();

        $data['main_content'] = 'payment-success';
        $this->load->view('includes/template', $data);
    }

    function wbs_subscribe_payment_fail() {

        $this->is_logged_in();

        $data['main_content'] = 'payment-failure';
        $this->load->view('includes/template', $data);
    }

}
?>
										