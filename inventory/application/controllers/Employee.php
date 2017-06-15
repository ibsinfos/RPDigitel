<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author 	: Creativeitem
 *	date		: 19 November, 2015
 *	Bijoy Stock Inventory Manager ERP
 *	http://codecanyon.net/user/Creativeitem
 *	support@creativeitem.com
 */

class Employee extends CI_Controller
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
        if ($this->session->userdata('employee_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('employee_login') == 1)
            redirect(base_url() . 'index.php?employee/dashboard', 'refresh');
        $this->load->view('backend/index');
    }
    
    // DASHBOARD
    function dashboard()
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('employee_dashboard');
        $this->load->view('backend/index', $page_data);
    }

    
    // MANAGE SALES ORDERS

    function sales_order($param1 = '' , $param2 = '')
    {
        if($param1 == 'add') {
            $this->order_model->sales_order_add();
            $this->session->set_flashdata('success_message' , get_phrase('order_created_successfully'));
            redirect(base_url() . 'index.php?employee/sales_order_list/order_pending' , 'refresh');
        }

        if($param1 == 'confirm') {
            $this->order_model->sales_order_confirm($param2); // param2 = order code
            $this->session->set_flashdata('success_message' , get_phrase('order_confirmed'));
            redirect(base_url() . 'index.php?employee/sales_order_view/' . $param2 . '/overview' , 'refresh');
        }

        if($param1 == 'cancel') {
            $this->order_model->sales_order_cancel($param2); // param2 = order code
            $this->session->set_flashdata('success_message' , get_phrase('order_canceled'));
            redirect(base_url() . 'index.php?employee/sales_order_list/order_canceled' , 'refresh');
        }

        if($param1 == 'create_shipment') {
            $this->order_model->create_sales_order_shipment($param2); // param2 = order code
            $this->session->set_flashdata('success_message' , get_phrase('shipment_created'));
            redirect(base_url() . 'index.php?employee/sales_order_view/' . $param2 . '/shipment' , 'refresh');
        }

        if($param1 == 'create_invoice') {
            $this->order_model->create_sales_order_invoice($param2); // param2 = order code
            $this->session->set_flashdata('success_message' , get_phrase('invoice_created'));
            redirect(base_url() . 'index.php?employee/sales_order_view/' . $param2 . '/invoice' , 'refresh');
        }

        if($param1 == 'take_payment') {
            $this->order_model->take_sales_order_payment($param2); // param2 = order code
            $this->session->set_flashdata('success_message' , get_phrase('payment_successfull'));
            redirect(base_url() . 'index.php?employee/sales_order_view/' . $param2 . '/payment' , 'refresh');
        }

        if($param1 == 'post_comment') {
            $this->order_model->post_sales_order_comment($param2); // param2 = order code
            $this->session->set_flashdata('success_message' , get_phrase('comment_posted'));
            redirect(base_url() . 'index.php?employee/sales_order_view/' . $param2 . '/comment' , 'refresh');
        }

        if($param1 == 'mark_as_paid') {
            $this->order_model->sales_order_mark_paid($param2); // param2 = order code
            $this->session->set_flashdata('success_message' , get_phrase('order_marked_as_paid'));
            redirect(base_url() . 'index.php?employee/sales_order_view/' . $param2 . '/overview' , 'refresh');
        }

        if($param1 == 'mark_as_delivered') {
            $this->order_model->sales_order_mark_delivered($param2); // param2 = order code
            $this->session->set_flashdata('success_message' , get_phrase('order_marked_as_delivered'));
            redirect(base_url() . 'index.php?employee/sales_order_view/' . $param2 . '/overview' , 'refresh');
        }

        if($param1 == 'delete') {
            $this->order_model->delete_sales_order($param2); // param2 = order code 
        }

        if($param1 == 'archive') {
            $this->order_model->archive_sales_order($param2); // param2 = order code
            $this->session->set_flashdata('success_message' , get_phrase('order_archived'));
            redirect(base_url() . 'index.php?employee/sales_order_list/order_all' , 'refresh');
        }
    }

    function get_invoice_info_for_sales_order($invoice_id = '')
    {
        $page_data['invoice_id']    =   $invoice_id;
        $this->load->view('backend/employee/sales_order_invoice_payment_summary' , $page_data);
    }

    function sales_order_add()
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'sales_order_add';
        $page_data['page_title'] = get_phrase('add_new_order');
        $this->load->view('backend/index', $page_data);
    }


    function sales_order_list($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('employee_login') != 1) {
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

    function reload_customer_address($user_id = '')
    {
        $page_data['user_id']   =   $user_id;
        $this->load->view('backend/employee/sales_order_add_customer_address' , $page_data);
    }

    function sales_order_entry_response($variant_id , $count=1)
    {
        $page_data['variant_id']    =   $variant_id;
        $page_data['count']         =   $count;
        $this->load->view('backend/employee/sales_order_entry' , $page_data);
    }

    function sales_order_append_entry_response($count , $selected_variants)
    {
        $page_data['count']                 =   $count;
        $page_data['selected_variants']     =   $selected_variants;
        $this->load->view('backend/employee/sales_order_append_entry' , $page_data);
    }

    function sales_order_view($order_code , $param2 = '')
    {
        if ($this->session->userdata('employee_login') != 1) {
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
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']   = 'sales_order_shipment_print_view';
        $page_data['shipment_id']  = $shipment_id;
        $page_data['page_title']  = get_phrase('print_shipment');
        $this->load->view('backend/employee/sales_order_shipment_print_view', $page_data);
    }

    function sales_order_invoice_print_view($invoice_id)
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']   = 'sales_order_invoice_print_view';
        $page_data['invoice_id']  = $invoice_id;
        $page_data['page_title']  = get_phrase('print_invoice');
        $this->load->view('backend/employee/sales_order_invoice_print_view', $page_data);
    }

    function sales_order_payment_print_view($payment_id)
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']   = 'sales_order_payment_print_view';
        $page_data['payment_id']  = $payment_id;
        $page_data['page_title']  = get_phrase('print_payment');
        $this->load->view('backend/employee/sales_order_payment_print_view', $page_data);
    }

    // MANAGE PURCHASE ORDRES

    function purchase_order($param1 = '' , $param2 = '')
    {
        if($param1 == 'add') {
            $this->order_model->purchase_order_add();
            $this->session->set_flashdata('success_message' , get_phrase('order_created_successfully'));
            redirect(base_url() . 'index.php?employee/purchase_order_list/order_pending' , 'refresh');
        }

        if($param1 == 'raise') {
            $this->order_model->purchase_order_raise($param2);
            $this->session->set_flashdata('success_message' , get_phrase('order_raised_successfully'));
            redirect(base_url() . 'index.php?employee/purchase_order_view/' . $param2 , 'refresh');
        }

        if($param1 == 'receive') {
            $this->order_model->purchase_order_receive($param2);
            $this->session->set_flashdata('success_message' , get_phrase('order_received_successfully'));
            redirect(base_url() . 'index.php?employee/purchase_order_view/' . $param2 , 'refresh');
        }

        if($param1 == 'archive') {
            $this->order_model->archive_purchase_order($param2);
            $this->session->set_flashdata('success_message' , get_phrase('order_archived_successfully'));
            redirect(base_url() . 'index.php?employee/purchase_order_list/order_all' , 'refresh');
        }

        if($param1 == 'delete') {
            $this->order_model->delete_purchase_order($param2);
        }
    }

    function purchase_order_list($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if($param1 == 'order_all') {
            $page_data['order_status']      =   'all';
        }

        if($param1 == 'order_pending') {
            $page_data['order_status']      =   'pending';
        }

        if($param1 == 'order_raised') {
            $page_data['order_status']      =   'raised';
        }

        if($param1 == 'order_received') {
            $page_data['order_status']      =   'received';
        }

        if($param1 == 'order_archived') {
            $page_data['order_status']      =   'archived';
        }

        $page_data['page_name']  = 'purchase_order_list';
        $page_data['page_title'] = get_phrase('purchase_orders');
        $this->load->view('backend/index', $page_data);
    }

    function purchase_order_view($purchase_order_code)
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']           = 'purchase_order_view';
        $page_data['purchase_order_code'] = $purchase_order_code;
        $page_data['page_title']          = get_phrase('process_order');
        $this->load->view('backend/index', $page_data);
    }

    function purchase_order_print_view($purchase_order_code)
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']           = 'purchase_order_print_view';
        $page_data['page_title']          =  get_phrase('purchase_order_print');
        $page_data['purchase_order_code'] = $purchase_order_code;
        $this->load->view('backend/employee/purchase_order_print_view', $page_data);
    }

    function purchase_order_add()
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'purchase_order_add';
        $page_data['page_title'] = get_phrase('add_purchase_order');
        $this->load->view('backend/index', $page_data);
    }

    function reload_supplier_address($user_id = '')
    {
        $page_data['user_id']   =   $user_id;
        $this->load->view('backend/employee/purchase_order_add_supplier_address' , $page_data);
    }

    function purchase_order_entry_response($variant_id , $count = 1)
    {
        $page_data['variant_id'] =   $variant_id;
        $page_data['count']      =   $count;
        $this->load->view('backend/employee/purchase_order_entry' , $page_data);
    }

    function purchase_order_append_entry_response($count , $selected_variants)
    {
        $page_data['count']             =   $count;
        $page_data['selected_variants'] =   $selected_variants;
        $this->load->view('backend/employee/purchase_order_append_entry' , $page_data);
    }

    // MANAGE INVENTORY

    function product($param1 = '' , $param2 = '')
    {
        if($param1 == 'create') {
            $this->product_model->add_new_product();
            $this->session->set_flashdata('success_message' , get_phrase('product_added_succesfully'));
            redirect(base_url() . 'index.php?employee/inventory_list' , 'refresh');
        }

        if($param1 == 'product_info_edit_no_variant') {
            $product_code = $this->product_model->edit_product_info_no_variant($param2); // param2 = product id
            $this->session->set_flashdata('update_message' , get_phrase('product_info_updated'));
            redirect(base_url() . 'index.php?employee/product_details/' . $product_code , 'refresh');
        }

        if($param1 == 'product_info_edit_has_variant') {
            $product_code = $this->product_model->edit_product_info_has_variant($param2); // param2 = product id
            $this->session->set_flashdata('update_message' , get_phrase('product_info_updated'));
            redirect(base_url() . 'index.php?employee/product_details/' . $product_code , 'refresh');
        }

        if($param1 == 'archive') {
            $this->product_model->archive_product($param2); // param2 = product id
            $this->session->set_flashdata('update_message' , get_phrase('product_moved_to_archive'));
            redirect(base_url() . 'index.php?employee/inventory_list/' , 'refresh');
        }

        if($param1 == 'remove_from_archive') {
            $this->product_model->remove_product_from_archive($param2); // param2 = product id
            $this->session->set_flashdata('update_message' , get_phrase('product_removed_from_archive'));
            redirect(base_url() . 'index.php?employee/inventory_list_archived/' , 'refresh');
        }
    }

    function product_details($product_code)
    {
       if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']    = 'product_details';
        $page_data['product_code'] = $product_code;
        $page_data['page_title']   = get_phrase('product_details');
        $this->load->view('backend/index', $page_data); 
    }

    function product_info_edit_form($product_code)
    {
        $page_data['product_code'] = $product_code;
        $this->load->view('backend/employee/product_info_edit_form' , $page_data);
    }

    function inventory_list()
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'inventory_list';
        $page_data['page_title'] = get_phrase('inventory');
        $this->load->view('backend/index', $page_data);
    }

    function inventory_list_archived()
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'inventory_list_archived';
        $page_data['page_title'] = get_phrase('archived_products');
        $this->load->view('backend/index', $page_data);
    }

    function inventory_add()
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'inventory_add';
        $page_data['page_title'] = get_phrase('add_product');
        $this->load->view('backend/index', $page_data);
    }

    function product_category($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if($param1 == 'create') {
            $this->product_model->add_new_product_category();
        }

        if($param1 == 'edit') {
            $this->product_model->edit_product_category($param2); // param2 = product category code
        }

        if($param1 == 'delete') {
            $this->product_model->delete_product_category($param2); // param2 = product category code
        }

        $page_data['page_name']  = 'product_category';
        $page_data['page_title'] = get_phrase('product_categories');
        $this->load->view('backend/index', $page_data);
    }

    function reload_product_category_table()
    {
        $this->load->view('backend/employee/product_category_table');
    }

    function variant($param1 = '' , $param2 = '' , $param3 = '')
    {
        if($param1 == 'add') {
            $product_code   =   $this->product_model->add_variant($param2); // param2 = product id
            $this->session->set_flashdata('success_message' , get_phrase('variant_added_successfully'));
            redirect(base_url() . 'index.php?employee/product_details/' . $product_code , 'refresh');
        }

        if($param1 == 'edit') {
            $product_code   =   $this->product_model->edit_variant($param2); // param2 = variant id
            $this->session->set_flashdata('update_message' , get_phrase('variant_updated_successfully'));
            redirect(base_url() . 'index.php?employee/product_details/' . $product_code , 'refresh');
        }

        if($param1 == 'delete') {
            $this->product_model->delete_variant($param2); // param2 = variant id
        }
    }

    
    // MANAGE PROFILE

    function profile($param1 = '' , $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if($param1 == 'do_update')
        {
            $this->user_model->update_user_profile($this->session->userdata('login_user_id'));
            $this->session->set_flashdata('success_message' , get_phrase('profile_info_updated'));
            redirect(base_url() . 'index.php?employee/profile/' , 'refresh');
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
            redirect(base_url() . 'index.php?employee/profile/' , 'refresh');
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
            redirect(base_url() . 'index.php?employee/profile' , 'refresh');
        }

        if($param1 == 'edit') {
            $this->user_model->edit_address($param2); // param2 = address code
            $this->session->set_flashdata('success_message' , get_phrase('address_updated_successfully'));
            redirect(base_url() . 'index.php?employee/profile' , 'refresh');
        }
    }
     function get_product_heading(){
        $variant_code = $this->input->post('variant_id');
        $product_heading = $this->warehouse_model->get_product_heading($variant_code);
        echo $product_heading;
      }
      function add_to_different_warehouse()
    {
      $i = 0;
      $variant_code       = $this->input->post('variant_code');
      $warehouse_code     = $this->input->post('warehouse_code');
      $warehouse_quantity = $this->input->post('warehouse_quantity');
      $product_id_array = $this->warehouse_model->get_product_id($variant_code);
      $product_id = $product_id_array['product_id'];
      $data = array(
        'warehouse_code' => $warehouse_code,
        'product_id'     => $product_id,
        'variant_code'   => $variant_code,
        'quantity'       => $warehouse_quantity,
        'product_status' => '1',
        'date' => strtotime(date("Y-m-d H:i:s"))
      );
      //echo 'variant code: '.$variant_code.' warehouse code: '.$warehouse_code.' warehouse quantity: '.$warehouse_quantity;
      if($i == 0){
        $this->warehouse_model->add_to_different_warehouse_table($data);
        $i++;
      }
    }

      function assigning_maximum_value_on_warehouse(){
        $variant_id = $this->input->post('variant_id');
        $this->input->post('ordered_quantity');
        $max_quantity = $this->warehouse_model->get_maximum_quantity($variant_id);
        echo json_encode($max_quantity);

      }
      function adding_to_shipment_from_warehouse(){
        $warehouse_code     = $this->input->post('warehouse_code');
        $variant_code       = $this->input->post('variant_code');
        $warehouse_quantity = $this->input->post('warehouse_quantity');
        $result             = $this->warehouse_model->get_product_id($variant_code);
        $product_id         =  $result['product_id'];
        //echo 'Warehouse Code: '.$warehouse_code.' Warehouse Quantity: '.$warehouse_quantity.' Variant Code: '.$variant_code;
        //die();
        $data = array(
          'warehouse_code' => $warehouse_code,
          'product_id'     => $product_id,
          'variant_code'   => $variant_code,
          'quantity'       => $warehouse_quantity,
          'product_status' => '0',
          'date'           => strtotime(date("Y-m-d H:i:s"))
        );
        $this->warehouse_model->adding_to_shipment_from_warehouse($data);
      }

      // SHIPMENT & COURIER
    function shipment_courier($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('employee_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if($param1 == 'shipping_method_add') {
            $this->settings_model->add_shipping_method();
        }

        if($param1 == 'shipping_method_edit') {
            $this->settings_model->edit_shipping_method($param2); // param2 = shipping method id
        }

        if($param1 == 'shipping_method_delete') {
            $this->settings_model->delete_shipping_method($param2); // param2 = shipping method id
        }

        if($param1 == 'courier_service_add') {
            $this->settings_model->add_courier_service();
        }

        if($param1 == 'courier_service_edit') {
            $this->settings_model->edit_courier_service($param2); // param2 = courier id
        }

        if($param1 == 'courier_service_delete') {
            $this->settings_model->delete_courier_service($param2); // param2 = courier id
        }

        $page_data['page_name']  = 'shipment_courier';
        $page_data['page_title'] = get_phrase('shipping_methods_and_courier_services');
        $this->load->view('backend/index', $page_data);
    }

    function reload_shipment_courier_list()
    {
        $this->load->view('backend/admin/shipment_courier_list');
    }    
    
}
