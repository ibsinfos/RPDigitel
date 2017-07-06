<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pricing_plan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("common_model");
//        $this->load->library('form_validation');
    }

    /* Frontend : Manage Blog Start */

    public function planList()
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
        $data['global'] = $this->common_model->getGlobalSettings();
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
        #START Action :: Fetch all active Blog added by admin :   
        $data['arr_price_data'] = $this->common_model->getRecords(TABLES::$MST_PLANS, '*');
//        print_r($data['arr_product_data']);


        $this->template->set('page', 'plans_list');
        $this->template->set('arr_price_data', $data['arr_price_data']);
        $this->template->set('user_session', $data['user_session']);
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend')
                ->title('vCard | Plans List')
                ->set_partial('header', 'partials/header')
                ->set_partial('leftpanel', 'partials/leftpanel')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('pricing_plans/plans_list');
    }

    /* Function to add blog post end */

    public function addPlan()
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
        $data = $this->common_model->commonFunction();
        if (count($_POST) > '0') {
            $arr_post_data = array(
                "plan_name" => $this->input->post('plan_name'),
                "yearly_cost" => $_POST['yearly_cost'],
                "monthly_cost" => $_POST['monthly_cost'],
                "setup_cost" => $_POST['setup_cost'],
                "created_by" => $session_data['user_id'],
            );
            $this->common_model->insertRow($arr_post_data, TABLES::$MST_PLANS);
            $this->session->set_userdata('msg', "Plan added successfully");
            redirect(base_url() . 'backend/pricing-plans/list');
        }
        $this->template->set('page', 'add_plan');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend')
                ->title('vCard | Add Coupon')
                ->set_partial('header', 'partials/header')
                ->set_partial('leftpanel', 'partials/leftpanel')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('pricing_plans/add_plan');
    }

    /* Function to add blog post end */

    public function editPlan($edit_id)
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

        $plan_data = $this->common_model->getRecords(TABLES::$MST_PLANS, '*', array('plan_id' => $edit_id));
        $data = $this->common_model->commonFunction();
        if (count($_POST) > '0') {
            $arr_post_data = array(
                "plan_name" => $this->input->post('plan_name'),
                "yearly_cost" => $_POST['yearly_cost'],
                "monthly_cost" => $_POST['monthly_cost'],
                "setup_cost" => $_POST['setup_cost'],
                "created_by" => $session_data['user_id'],
            );
            $this->common_model->updateRow(TABLES::$MST_PLANS,$arr_post_data,array('plan_id'=>$edit_id));
            $this->session->set_userdata('msg', "Plan added successfully");
            redirect(base_url() . 'backend/pricing-plans/list');
        }

        $this->template->set('edit_id', $edit_id);
        $this->template->set('plan_data', $plan_data);
        $this->template->set('page', 'edit_plan');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend')
                ->title('vCard | Edit Plan')
                ->set_partial('header', 'partials/header')
                ->set_partial('leftpanel', 'partials/leftpanel')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('pricing_plans/edit_plan');
    }

    public function validateCoupon()
    {
        $cart_total = $this->cart->total();
        $coupon = $this->common_model->getRecords(TABLES::$MST_COUPON, '*', array('coupon_code' => $this->input->post('code'), 'status' => '1'));
        if (count($coupon) < 1) {
            $map['status'] = '0';
            $map['msg'] = 'Not valid coupon!';
            echo json_encode($map);
            exit();
        }
        $today = date('Y-m-d');
        $today = date('Y-m-d', strtotime($today));

        //echo $paymentDate; // echos today! 
        $valid_from = date('Y-m-d', strtotime($coupon[0]['valid_from']));
        $valid_to = date('Y-m-d', strtotime($coupon[0]['valid_to']));

        if (($today >= $valid_from) && ($today <= $valid_to)) {
            if ($coupon[0]['discount_type'] == '1') {
                $discount_amount = $cart_total - $coupon[0]['discount_rate'];
            } else {
                
            }
            $map['status'] = '1';
            $map['discounted_amount'] = $discount_amount;
            $map['msg'] = 'Success.';
            echo json_encode($map);
            exit();
        } else {
            $map['status'] = '0';
            $map['msg'] = 'This coupon is expired';
            echo json_encode($map);
            exit();
        }
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
