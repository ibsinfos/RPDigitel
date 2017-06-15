<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Order_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    function sales_order_add()
    {
        $data['order_code']          =   $this->input->post('order_code');
        $data['customer_user_id']    =   $this->input->post('customer_user_id');
        $data['seller_user_id']      =   $this->input->post('seller_user_id');
        $data['billing_address_id']  =   $this->input->post('billing_address_id');
        $data['shipping_address_id'] =   $this->input->post('shipping_address_id');
        $data['date_added']          =   strtotime($this->input->post('date_added'));
        $data['order_status']        =   0;
        $data['payment_status']      =   0;

        $variant_ids        =   $this->input->post('variant_id');
        $selling_prices     =   $this->input->post('selling_price');
        $ordered_quantities =   $this->input->post('qty');
        $discounts          =   $this->input->post('discount');
        $tax_values         =   $this->input->post('tax_value');

        $number_of_entries   =   sizeof($variant_ids);
        $sales_order_entries =   array();
        $total_amount        =   0;
        for($i = 0; $i < $number_of_entries; $i++) {
            $entry_amount    =   $selling_prices[$i] * $ordered_quantities[$i];
            $amount_with_tax =   $entry_amount + ($entry_amount * ($tax_values[$i] / 100));
            $sub_total       =   $amount_with_tax - ($amount_with_tax * ($discounts[$i] / 100));
            $new_order_entry    =   array(
                'variant_id' => $variant_ids[$i],
                'selling_price' => $selling_prices[$i],
                'ordered_quantity' => $ordered_quantities[$i],
                'shipment_quantity' =>'0',
                'invoice_quantity' => '0',
                'discount' => $discounts[$i],
                'tax' => $tax_values[$i],
                'sub_total' => $sub_total
            );
            $total_amount += $sub_total;
            array_push($sales_order_entries , $new_order_entry);
        }
        $data['total_amount']   =   round($total_amount , 2);
        $data['order_entries']  =   json_encode($sales_order_entries);
        $this->db->insert('sales_order' , $data);

        // mail sending to customer about the newly created sales order
        $customer_email = $this->db->get_where('user' , array(
            'user_id' => $data['customer_user_id']
        ))->row()->email;
        $order_status   = 'Pending';
        $order_code     = $data['order_code'];
        $this->email_model->new_sales_order_creation_email_to_customer($order_code , $order_status , $customer_email);
    }

    function sales_order_confirm($order_code)
    {
        // getting the ordered products form order code
        $order_entries = $this->db->get_where('sales_order' , array(
            'order_code' => $order_code
        ))->row()->order_entries;
        $ordered_products = json_decode($order_entries);
        // decreasing stock quantity of the ordered products
        // foreach($ordered_products as $row) {
        //     $this->db->where('variant_id' , $row->variant_id);
        //     $this->db->set('quantity', 'quantity - ' . $row->ordered_quantity, FALSE);
        //     $this->db->update('variant');
        // }

        // changing order status
        $this->db->where('order_code' , $order_code);
        $this->db->update('sales_order' , array('order_status' => 1 , 'last_modified' => strtotime(date("Y-m-d H:i:s"))));

        // sending order confirming email to customer
        $customer_id    = $this->db->get_where('sales_order' , array(
            'order_code' => $order_code
        ))->row()->customer_user_id;
        $customer_email = $this->db->get_where('user' , array(
            'user_id' => $customer_id
        ))->row()->email;
        $this->email_model->sales_order_confirmation_email_to_customer($order_code , $customer_email);
    }

    function sales_order_cancel($order_code)
    {
        // changing order status
        $this->db->where('order_code' , $order_code);
        $this->db->update('sales_order' , array('order_status' => 10 , 'last_modified' => strtotime(date("Y-m-d H:i:s"))));
    }

    function create_sales_order_shipment($order_code)
    {
        // create a shipment entry
        $data['order_id']           =   $this->get_sales_order_info_by_order_code($order_code , 'order_id');
        $data['tracking_number']    =   $this->input->post('tracking_number');
        $data['shipping_cost']      =   $this->input->post('shipping_cost');
        $data['shipping_method_id'] =   $this->input->post('shipping_method_id');
        if($this->input->post('courier_id') != '') {
            $data['courier_id']     =   $this->input->post('courier_id');
        }
        $data['shipment_timestamp'] =   strtotime($this->input->post('shipment_timestamp'));

        $variant_ids         =   $this->input->post('variant_id');
        $selling_prices      =   $this->input->post('selling_price');
        $ordered_quantities  =   $this->input->post('ordered_quantity');
        $shipment_quantities =   $this->input->post('shipment_quantity');
        // print_r($shipment_quantities);
        // die();
        $entries = sizeof($variant_ids);
        $shipment_entries = array();
        for($i = 0; $i < $entries; $i++) {
            $new_shipment_entry = array(
                'variant_id' => $variant_ids[$i],
                'selling_price' => $selling_prices[$i],
                'ordered_quantity' => $ordered_quantities[$i],
                'shipment_quantity' => $shipment_quantities[$i]
            );
            array_push($shipment_entries , $new_shipment_entry);
        }
        $data['shipment_entries']   =   json_encode($shipment_entries);
        $this->db->insert('shipment' , $data);

        // checking the order quantity and shipment quantity relevance for changing order status
        $total_ordered_quantity = $this->get_total_ordered_quantity_of_sales_order($data['order_id']);
        $total_shipped_quantity = $this->get_all_shipped_quantity_of_sales_order($data['order_id']);

        // changing the order status
        $this->db->where('order_code' , $order_code);
        if($total_shipped_quantity < $total_ordered_quantity) {
            $this->db->update('sales_order' , array('order_status' => 2 , 'last_modified' => strtotime(date("Y-m-d H:i:s"))));
        }
        if($total_shipped_quantity == $total_ordered_quantity) {
            $this->db->update('sales_order' , array('order_status' => 3 , 'last_modified' => strtotime(date("Y-m-d H:i:s"))));
        }

        // sending email to customer about the shipment
        $tracking_number = $data['tracking_number'];
        $shipping_cost   = $data['shipping_cost'];
        $customer_id     = $this->db->get_where('sales_order' , array(
            'order_code' => $order_code
        ))->row()->customer_user_id;
        $customer_email  = $this->db->get_where('user' , array(
            'user_id' => $customer_id
        ))->row()->email;
        $currency_symbol = $this->info_model->get_currency_symbol();
        $this->email_model->sales_order_shipment_email_to_customer($order_code , $tracking_number , $shipping_cost , $customer_email , $currency_symbol);
    }


    function create_sales_order_invoice($order_code)
    {
        $data['order_id']      =   $this->get_sales_order_info_by_order_code($order_code , 'order_id');
        $data['invoice_code']  =   $this->input->post('invoice_code');
        $data['order_type']    =   'sales';
        $data['status']        =   0;
        $data['date_added']    =   strtotime(date("Y-m-d H:i:s"));
        $data['due_timestamp'] =   strtotime($this->input->post('due_timestamp'));

        $variant_ids         =   $this->input->post('variant_id');
        $selling_prices      =   $this->input->post('selling_price');
        $ordered_quantities  =   $this->input->post('ordered_quantity');
        $invoice_quantities  =   $this->input->post('invoice_quantity');
        $tax_values          =   $this->input->post('tax_value');
        $discounts           =   $this->input->post('discount');
        $entries = sizeof($variant_ids);
        $invoice_entries = array();
        $total_amount   =   0;
        for($i = 0; $i < $entries; $i++) {
            $entry_amount    =   $selling_prices[$i] * $invoice_quantities[$i];
            $amount_with_tax =   $entry_amount + ($entry_amount * ($tax_values[$i] / 100));
            $sub_total       =   $amount_with_tax - ($amount_with_tax * ($discounts[$i] / 100));
            $new_invoice_entry = array(
                'variant_id' => $variant_ids[$i],
                'selling_price' => $selling_prices[$i],
                'ordered_quantity' => $ordered_quantities[$i],
                'invoice_quantity' => $invoice_quantities[$i],
                'discount'  => $discounts[$i],
                'tax_value' => $tax_values[$i],
                'sub_total' => $sub_total
            );
            $total_amount += $sub_total;
            array_push($invoice_entries , $new_invoice_entry);
        }
        $data['total_amount']      =   round($total_amount , 2);
        $data['invoice_entries']   =   json_encode($invoice_entries);
        $this->db->insert('invoice' , $data);

        // changing the order status
        $this->db->where('order_code' , $order_code);
        $this->db->update('sales_order' , array('last_modified' => strtotime(date("Y-m-d H:i:s"))));
    }

    function delete_sales_order_invoice($invoice_id)
    {
        $this->db->where('invoice_id' , $invoice_id);
        $this->db->delete('invoice');
    }

    function take_sales_order_payment($order_code)
    {
        $data['payment_code']   =   substr(md5(rand(0, 1000000)), 0, 7);
        $data['order_id']       =   $this->get_sales_order_info_by_order_code($order_code , 'order_id');
        $data['invoice_id']     =   $this->input->post('invoice_id');
        $data['payment_method'] =   $this->input->post('payment_method');
        $data['notes']          =   $this->input->post('notes');
        $data['timestamp']      =   strtotime($this->input->post('timestamp'));
        $data['payment_type']   =   'sales';

        $this->db->insert('payment' , $data);

        // changing the invoice status
        $this->db->where('invoice_id' , $data['invoice_id']);
        $this->db->update('invoice' , array('status' => 1));

        // changing the order payment status
        $this->db->where('order_code' , $order_code);
        $this->db->update('sales_order' , array('payment_status' => 2 , 'last_modified' => strtotime(date("Y-m-d H:i:s"))));

        // sending email to customer about the payment
        $payment_code    = $data['payment_code'];
        $invoice_code    = $this->db->get_where('invoice' , array(
            'invoice_id' => $data['invoice_id'] , 'order_type' => 'sales'
        ))->row()->invoice_code;
        $customer_id     = $this->db->get_where('sales_order' , array(
            'order_code' => $order_code
        ))->row()->customer_user_id;
        $customer_email  = $this->db->get_where('user' , array(
            'user_id' => $customer_id
        ))->row()->email;
        $this->email_model->sales_order_payment_email_to_customer($order_code , $payment_code , $invoice_code , $customer_email);
    }

    function post_sales_order_comment($order_code)
    {
        $data['order_comment_code'] =   substr(md5(rand(0, 1000000)), 0, 7);
        $data['order_id']           =   $this->get_sales_order_info_by_order_code($order_code , 'order_id');
        $data['user_id']            =   $this->session->userdata('login_user_id');
        $data['comment']            =   $this->input->post('comment');
        $data['timestamp']          =   strtotime(date("Y-m-d H:i:s"));
        $data['type']               =   'sales';

        $this->db->insert('order_comment' , $data);
    }

    function sales_order_mark_paid($order_code)
    {
        $this->db->where('order_code' , $order_code);
        $this->db->update('sales_order' , array('payment_status' => 1 , 'last_modified' => strtotime(date("Y-m-d H:i:s"))));
    }

    function sales_order_mark_delivered($order_code)
    {
        $this->db->where('order_code' , $order_code);
        $this->db->update('sales_order' , array('order_status' => 4 , 'last_modified' => strtotime(date("Y-m-d H:i:s"))));
    }

    function delete_sales_order($order_code)
    {
        $this->db->where('order_code' , $order_code);
        $this->db->delete('sales_order');
    }

    function archive_sales_order($order_code)
    {
        $this->db->where('order_code' , $order_code);
        $this->db->update('sales_order' , array('archive_status' => 1 , 'last_modified' => strtotime(date("Y-m-d H:i:s"))));
    }

    function purchase_order_add()
    {
        $data['purchase_order_code'] =   $this->input->post('order_code');
        $data['supplier_user_id']    =   $this->input->post('supplier_user_id');
        $data['ordering_user_id']    =   $this->input->post('ordering_user_id');
        $data['supplier_address_id'] =   $this->input->post('supplier_address_id');
        $data['date_added']          =   strtotime($this->input->post('date_added'));
        $data['order_status']        =   0;
        $data['payment_status']      =   0;
        $data['encryption_key']      =   substr(md5(rand(0, 100000000)), 0, 8);

        $variant_ids        =   $this->input->post('variant_id');
        $cost_prices     =   $this->input->post('cost_price');
        $ordered_quantities =   $this->input->post('qty');

        $number_of_entries   =   sizeof($variant_ids);
        $purchase_order_entries =   array();
        $total_amount        =   0;
        for($i = 0; $i < $number_of_entries; $i++) {
            $sub_total    =   $cost_prices[$i] * $ordered_quantities[$i];
            $new_order_entry    =   array(
                'variant_id' => $variant_ids[$i],
                'cost_price' => $cost_prices[$i],
                'ordered_quantity' => $ordered_quantities[$i],
                'sub_total' => $sub_total
            );
            $total_amount += $sub_total;
            array_push($purchase_order_entries , $new_order_entry);
        }
        $data['total_amount']   =   round($total_amount , 2);
        $data['purchase_order_entries']  =   json_encode($purchase_order_entries);
        $this->db->insert('purchase_order' , $data);
    }

    function purchase_order_raise($purchase_order_code)
    {
        $purchase_order_encryption_key = $this->db->get_where('purchase_order' , array(
            'purchase_order_code' => $purchase_order_code
        ))->row()->encryption_key;
        // creating an invoice entry for the purchase order
        $data['invoice_code']       = substr(md5(rand(0, 1000000)), 0, 7);
        $data['order_id']           = $this->db->get_where('purchase_order' , array(
            'purchase_order_code' => $purchase_order_code
        ))->row()->purchase_order_id;
        $data['order_type']         = 'purchase';
        $data['invoice_entries']    = $this->db->get_where('purchase_order' , array(
            'purchase_order_code' => $purchase_order_code
        ))->row()->purchase_order_entries;
        $data['total_amount']       =   $this->db->get_where('purchase_order' , array(
            'purchase_order_code' => $purchase_order_code
        ))->row()->total_amount;
        $data['date_added']         =   strtotime(date("Y-m-d H:i:s"));
        $this->db->insert('invoice' , $data);

        $this->db->where('purchase_order_code' , $purchase_order_code);
        $this->db->update('purchase_order' , array(
            'order_status' => 1 , 'date_raised' => strtotime(date("Y-m-d H:i:s"))
        ));

        // sending link to supplier email about the raise
        $supplier_id = $this->db->get_where('purchase_order' , array(
            'purchase_order_code' => $purchase_order_code
        ))->row()->supplier_user_id;
        $supplier_email = $this->db->get_where('user' , array(
            'user_id' => $supplier_id
        ))->row()->email;
        $order_view_url = base_url() . 'index.php?order/view/' . $purchase_order_encryption_key;
        $this->email_model->purchase_order_raise_email_to_supplier($order_view_url , $supplier_email);
    }

    function purchase_order_receive($purchase_order_code)
    {
        $ordered_products_json   =   $this->db->get_where('purchase_order' , array(
            'purchase_order_code' => $purchase_order_code
        ))->row()->purchase_order_entries;
        $ordered_products        =   json_decode($ordered_products_json);
        // increasing the stock level of the ordered products
        // foreach($ordered_products as $row) {
        //     $this->db->where('variant_id' , $row->variant_id);
        //     $this->db->set('quantity', 'quantity + ' . $row->ordered_quantity, FALSE);
        //     $this->db->update('variant');
        // }
        // changing the purchase order status
        $this->db->where('purchase_order_code' , $purchase_order_code);
        $this->db->update('purchase_order' , array(
            'order_status' => 2,
                'date_received' => strtotime(date("Y-m-d H:i:s")),
                    'payment_status' => 1
        ));
    }

    function delete_purchase_order($purchase_order_code)
    {
        $this->db->where('purchase_order_code' , $purchase_order_code);
        $this->db->delete('purchase_order');
    }

    function archive_purchase_order($purchase_order_code)
    {
        $this->db->where('purchase_order_code' , $purchase_order_code);
        $this->db->update('purchase_order' , array('archive_status' => 1));
    }

    function get_sales_order_info_by_order_code($order_code , $info_type)
    {
        $query  =   $this->db->get_where('sales_order' , array(
            'order_code' => $order_code
        ));
        return $query->row()->$info_type;
    }

    function get_purchase_order_info_by_order_code($purchase_order_code , $info_type)
    {
        $query  =   $this->db->get_where('purchase_order' , array(
            'purchase_order_code' => $purchase_order_code
        ));
        return $query->row()->$info_type;
    }

    function get_all_shipped_quantity_of_sales_order($order_id)
    {
        $shipped_quantity = 0;
        $shipment_history   =   $this->db->get_where('shipment' , array('order_id' => $order_id))->result_array();
        foreach ($shipment_history as $row) {
            $shipment_entries =  json_decode($row['shipment_entries']);

            foreach ($shipment_entries as $key){
                $shipped_quantity += $key->shipment_quantity;
            }
        }
        return $shipped_quantity;
    }

    function get_shipped_quantity_of_variant_of_sales_order($order_id , $variant_id)
    {
        $shipped_quantity = 0;
        $shipment_history   =   $this->db->get_where('shipment' , array('order_id' => $order_id))->result_array();
        foreach ($shipment_history as $row) {
            $shipment_entries =  json_decode($row['shipment_entries']);

            foreach ($shipment_entries as $key){
                $current_variant_id = $key->variant_id;
                if ($current_variant_id == $variant_id) {
                    $shipped_quantity += $key->shipment_quantity;
                }
            }
        }
        return $shipped_quantity;
    }

    function get_total_ordered_quantity_of_sales_order($order_id)
    {
        $order_entries = $this->db->get_where('sales_order' , array('order_id' => $order_id))->row()->order_entries;
        $order_entries = json_decode($order_entries);
        $ordered_quantity = 0;
        foreach($order_entries as $row) {
            $ordered_quantity += $row->ordered_quantity;
        }
        return $ordered_quantity;
    }

    function get_invoice_quantity_of_variant_of_sales_order($order_id , $variant_id)
    {
        $invoiced_quantity = 0;
        $invoice_history   =   $this->db->get_where('invoice' , array('order_id' => $order_id , 'order_type' => 'sales'))->result_array();
        foreach ($invoice_history as $row) {
            $invoice_entries =  json_decode($row['invoice_entries']);

            foreach ($invoice_entries as $key){
                $current_variant_id = $key->variant_id;
                if ($current_variant_id == $variant_id) {
                    $invoiced_quantity += $key->invoice_quantity;
                }
            }
        }
        return $invoiced_quantity;
    }

    function get_all_invoiced_quantity_of_sales_order($order_id)
    {
        $invoiced_quantity = 0;
        $invoice_history   =   $this->db->get_where('invoice' , array('order_id' => $order_id , 'order_type' => 'sales'))->result_array();
        foreach ($invoice_history as $row) {
            $invoice_entries =  json_decode($row['invoice_entries']);

            foreach ($invoice_entries as $key){
                $invoiced_quantity += $key->invoice_quantity;
            }
        }
        return $invoiced_quantity;
    }

    function count_orders($range_selector , $order_type)
    {
        if($range_selector == 'last_7_days') {
            $timestamp_start = strtotime('-7 days', time());
            $timestamp_end   = strtotime(date("Y-m-d H:i:s"));
        }
        if($range_selector == 'last_30_days') {
            $timestamp_start = strtotime('-30 days', time());
            $timestamp_end   = strtotime(date("Y-m-d H:i:s"));
        }
        if($range_selector == 'last_90_days') {
            $timestamp_start = strtotime('-90 days', time());
            $timestamp_end   = strtotime(date("Y-m-d H:i:s"));
        }
        if($order_type == 'sales') {
            $this->db->where('date_added >=' , $timestamp_start);
            $this->db->where('date_added <=' , $timestamp_end);
            $this->db->from('sales_order');
            $result = $this->db->count_all_results();
            return $result;
        }
        if($order_type == 'purchase') {
            $this->db->where('date_added >=' , $timestamp_start);
            $this->db->where('date_added <=' , $timestamp_end);
            $this->db->from('purchase_order');
            $result = $this->db->count_all_results();
            return $result;
        }
    }

    function count_sales_order_by_status_last_30_days($status)
    {
        $timestamp_start = strtotime('-30 days', time());
        $timestamp_end   = strtotime(date("Y-m-d H:i:s"));

        $this->db->where('date_added >=' , $timestamp_start);
        $this->db->where('date_added <=' , $timestamp_end);
        $this->db->where('order_status' , $status);
        $this->db->from('sales_order');
        $result = $this->db->count_all_results();
        return $result;
    }

    function count_purchase_order_by_status_last_30_days($status)
    {
        $timestamp_start = strtotime('-30 days', time());
        $timestamp_end   = strtotime(date("Y-m-d H:i:s"));

        $this->db->where('date_added >=' , $timestamp_start);
        $this->db->where('date_added <=' , $timestamp_end);
        $this->db->where('order_status' , $status);
        $this->db->from('purchase_order');
        $result = $this->db->count_all_results();
        return $result;
    }


}
