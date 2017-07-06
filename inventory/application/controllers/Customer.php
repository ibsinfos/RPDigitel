<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  @author     : Creativeitem
 *  date        : 19 November, 2015
 *  Bijoy Stock Inventory Manager ERP
 *  http://codecanyon.net/user/Creativeitem
 *  support@creativeitem.com
 */

class Customer extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

       /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }

    // DEFAULT FUNCTION (redirects to login page if no user is logged in)
    public function index()
    {
        if ($this->session->userdata('customer_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('customer_login') == 1)
            redirect(base_url() . 'index.php?customer/dashboard', 'refresh');
        $this->load->view('backend/index');
    }

    // DASHBOARD
    function dashboard()
    {
        if ($this->session->userdata('customer_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('customer_dashboard');
        $this->load->view('backend/index', $page_data);
    }

    // MANAGE SALES ORDERS

    function sales_order_list($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('customer_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if($param1 == 'order_all') {
            $page_data['order_status']      =   'all';
        }

        if($param1 == 'order_pending') {
            $page_data['order_status']      =   'pending';
        }

        if($param1 == 'order_confirmed') {
            $page_data['order_status']      =   'confirmed';
        }

        if($param1 == 'order_partially_shipped') {
            $page_data['order_status']      =   'partially_shipped';
        }

        if($param1 == 'order_shipped') {
            $page_data['order_status']      =   'shipped';
        }

        if($param1 == 'order_delivered') {
            $page_data['order_status']      =   'delivered';
        }

        if($param1 == 'order_archived') {
            $page_data['order_status']      =   'archived';
        }

        if($param1 == 'order_canceled') {
            $page_data['order_status']      =   'canceled';
        }

        $page_data['page_name']  = 'sales_order_list';
        $page_data['page_title'] = get_phrase('sales_orders');
        $this->load->view('backend/index', $page_data);
    }

    function sales_order_view($order_code , $param2 = '')
    {
        if ($this->session->userdata('customer_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if($param2 == 'confirm')
            $page_data['view_page'] =   'sales_order_confirm';
        if($param2 == 'overview')
            $page_data['view_page'] =   'sales_order_overview';
        if($param2 == 'shipment')
            $page_data['view_page'] =   'sales_order_shipment';
        if($param2 == 'invoice')
            $page_data['view_page'] =   'sales_order_invoice';
        if($param2 == 'payment')
            $page_data['view_page'] =   'sales_order_payment';
        if($param2 == 'comment')
            $page_data['view_page'] =   'sales_order_comment';

        $page_data['page_name']   = 'sales_order_view';
        $page_data['order_code']  = $order_code;
        $page_data['page_title']  = get_phrase('process_order');
        $this->load->view('backend/index', $page_data);
    }

    function sales_order_shipment_print_view($shipment_id)
    {
        if ($this->session->userdata('customer_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']   = 'sales_order_shipment_print_view';
        $page_data['shipment_id']  = $shipment_id;
        $page_data['page_title']  = get_phrase('print_shipment');
        $this->load->view('backend/customer/sales_order_shipment_print_view', $page_data);
    }

    function sales_order_invoice_print_view($invoice_id)
    {
        if ($this->session->userdata('customer_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']   = 'sales_order_invoice_print_view';
        $page_data['invoice_id']  = $invoice_id;
        $page_data['page_title']  = get_phrase('print_invoice');
        $this->load->view('backend/customer/sales_order_invoice_print_view', $page_data);
    }

    function sales_order_payment_print_view($payment_id)
    {
        if ($this->session->userdata('customer_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']   = 'sales_order_payment_print_view';
        $page_data['payment_id']  = $payment_id;
        $page_data['page_title']  = get_phrase('print_payment');
        $this->load->view('backend/customer/sales_order_payment_print_view', $page_data);
    }

    // MANAGE PROFILE

    function profile($param1 = '' , $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('customer_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if($param1 == 'do_update')
        {
            $this->user_model->update_user_profile($this->session->userdata('login_user_id'));
            $this->session->set_flashdata('success_message' , get_phrase('profile_info_updated'));
            redirect(base_url() . 'index.php?customer/profile/' , 'refresh');
        }

        if($param1 == 'change_password')
        {
            $success_status = $this->user_model->update_user_password($this->session->userdata('login_user_id'));
            if($success_status == 1) {
                $this->session->set_flashdata('success_message' , get_phrase('password_updated'));
            }
            if($success_status == 0) {
                $this->session->set_flashdata('error_message' , get_phrase('password_update_failed'));
            }
            redirect(base_url() . 'index.php?customer/profile/' , 'refresh');
        }


        $page_data['page_name']  = 'profile';
        $page_data['page_title'] = get_phrase('profile');
        $this->load->view('backend/index', $page_data);
    }

    function address($param1 = '' , $param2 = '')
    {
        if($param1 == 'create') {
            $this->user_model->create_address();
            $this->session->set_flashdata('success_message' , get_phrase('address_added_successfully'));
            redirect(base_url() . 'index.php?customer/profile' , 'refresh');
        }

        if($param1 == 'edit') {
            $this->user_model->edit_address($param2); // param2 = address code
            $this->session->set_flashdata('success_message' , get_phrase('address_updated_successfully'));
            redirect(base_url() . 'index.php?customer/profile' , 'refresh');
        }
    }

    function sales_order($param1 = '' , $param2 = '')
    {
        if($param1 == 'add') {
            $this->order_model->sales_order_add();
            $this->session->set_flashdata('success_message' , get_phrase('order_created_successfully'));
            redirect(base_url() . 'index.php?customer/sales_order_add' , 'refresh');
        }
    }

    function sales_order_add()
    {
        if ($this->session->userdata('customer_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'sales_order_add';
        $page_data['page_title'] = get_phrase('add_new_order');
        $this->load->view('backend/index', $page_data);
    }

    function reload_customer_address($user_id = '')
    {
        $page_data['user_id']   =   $user_id;
        $this->load->view('backend/customer/sales_order_add_customer_address' , $page_data);
    }

    function sales_order_entry_response($variant_id , $count=1)
    {
        $page_data['variant_id']    =   $variant_id;
        $page_data['count']         =   $count;
        $this->load->view('backend/customer/sales_order_entry' , $page_data);
    }

    function sales_order_append_entry_response($count , $selected_variants)
    {
        $page_data['count']                 =   $count;
        $page_data['selected_variants']     =   $selected_variants;
        $this->load->view('backend/customer/sales_order_append_entry' , $page_data);
    }


}
