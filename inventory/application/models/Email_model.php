<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Email_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getvalues($key)
    {
        $query = $this->db->get_where('settings', array('type' => $key));
        if($query->num_rows() > 0)
        {
            $row = $query->row();
            return json_decode($row->description);
        }
        else
            return '';  
    }
    function addvalues($data)
    {
        $this->db->insert('settings' , $data);
    }
    function updatevalues($key , $data)
    {
        $this->db->update('settings' , $data , array('type' => $key));
    }

    // DECLARATION: NEW ACCOUNT OPENING EMAIL 
    function account_opening_email($email_to, $password_unhashed)
    {
        $system_url = base_url();
        $email_sub  = "New Account Opening";
        $email_to   = $email_to;
        $email_msg  = "Congratulations! Your account has been created.<br \>";
        $email_msg .= "Your password for new account is " . $password_unhashed . "<br \>";
        $email_msg .= "Login here " . $system_url . " to continue. <br \>";
        $email_msg .= "You can change your password after logging in from your profile settings.";
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: NEW SALES ORDER CREATING EMAIL TO CUSTOMER BY ADMIN
    function new_sales_order_creation_email_to_customer($order_code, $order_status, $email_to)
    {
        $system_url = base_url();
        $email_sub  = "New Order Created";
        $email_to   = $email_to;
        $email_msg  = "A new order for you has been created.<br \>";
        $email_msg .= "Order code: " . $order_code . "<br \>";
        $email_msg .= "Order status: " . $order_status . "<br \>";
        $email_msg .= "Check the details of the order by logging in to" . $system_url;
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: SALES ORDER CONFIRMATION EMAIL TO CUSTOMER BY ADMIN
    function sales_order_confirmation_email_to_customer($order_code, $email_to)
    {
        $system_url = base_url();
        $email_sub  = "Order Confirmation";
        $email_to   = $email_to;
        $email_msg  = "Congratulations! Your order has been confirmed.<br \>";
        $email_msg .= "Order code: " . $order_code . "<br \>";
        $email_msg .= "Check the details of the order by logging in to" . $system_url;
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: SALES ORDER SHIPMENT EMAIL TO CUSTOMER BY ADMIN
    function sales_order_shipment_email_to_customer($order_code, $tracking_number , $shipping_cost , $email_to , $currency_sysmbol)
    {
        $system_url = base_url();
        $email_sub  = "Order Shipment";
        $email_to   = $email_to;
        $email_msg  = "A new shipemnt for your order has been made.<br \>";
        $email_msg .= "Order code: " . $order_code . "<br \>";
        $email_msg .= "Tracking number: " . $tracking_number . "<br \>";
        $email_msg .= "Shipping cost: " . $currency_sysmbol . ' ' . $shipping_cost . "<br \>";
        $email_msg .= "Check the details of the shipment by logging in to" . $system_url;
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: SALES ORDER PAYMENT EMAIL TO CUSTOMER BY ADMIN
    function sales_order_payment_email_to_customer($order_code, $payment_code , $invoice_code , $email_to)
    {
        $system_url = base_url();
        $email_sub  = "Order Payment";
        $email_to   = $email_to;
        $email_msg  = "A new payment has been made for your order.<br \>";
        $email_msg .= "Order code: " . $order_code . "<br \>";
        $email_msg .= "Invoice code: " . $invoice_code . "<br \>";
        $email_msg .= "Payment code: " . $payment_code . "<br \>";
        $email_msg .= "Check the details of the payment by logging in to" . $system_url;
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: PURCHASE ORDER RAISE EMAIL TO SUPPLIER
    function purchase_order_raise_email_to_supplier($order_view_url , $email_to)
    {
        $order_url = base_url();
        $email_sub  = "New Order";
        $email_to   = $email_to;
        $email_msg  = "An order has been raised to you.<br \>";
        $email_msg .= "Click the link below to view the order.<br \>";
        $email_msg .= "<a href=" .$order_url ."> . $order_url . </a>";
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: MESSAGE NOTIFICATION EMAIL FROM ADMIN TO USERS
    function message_notification_email_sender_admin($email_to)
    {
        $system_url = base_url();
        $email_sub  = "New Message";
        $email_to   = $email_to;
        $email_msg  = "You have a new message from admin.<br \>";
        $email_msg .= "Check the message at " . $system_url;
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: MESSAGE NOTIFICATION EMAIL FROM USERS TO ADMIN
    function message_notification_email_sender_user($sender_account_type, $email_from)
    {
        $system_url          = base_url();
        $sender_account_type = $sender_account_type;
        $email_from          = $email_from;
        $email_to            = $this->db->get_where('admin', array(
            'admin_id' => 1
        ))->row()->email;
        $email_sub           = "New Message";
        $email_msg           = "You have a new message from " . $sender_account_type . ".<br \>";
        $email_msg .= "Check the message at " . $system_url;
        $this->do_email($email_msg, $email_sub, $email_to, $email_from);
    }

    // DECLARATION: PASSWORD RESET EMAIL
    function reset_password_email($new_password, $email_to)
    {
        $system_url   = base_url();
        $email_to     = $email_to;
        $new_password = $new_password;
        $email_sub    = "New Password for your Account";
        $email_msg    = "Your request for password reset is successful.<br \>";
        $email_msg .= "Your new password is: " . $new_password . "<br \>";
        $email_msg .= "Please log in here " . $system_url . " with your email and new password.<br \>";
        $email_msg .= "You can change the password after logging in from your profile settings.";
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: CUSTOM EMAIL SENDER
    function do_email($msg = NULL, $sub = NULL, $to = NULL, $from = NULL, $attachment_url = NULL)
    {
        $config              = array();
        $config['useragent'] = "CodeIgniter";
        $config['mailpath']  = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']  = "smtp";
        $config['smtp_host'] = "localhost";
        $config['smtp_port'] = "25";
        $config['mailtype']  = 'html';
        $config['charset']   = 'utf-8';
        $config['newline']   = "\r\n";
        $config['wordwrap']  = TRUE;
        $this->load->library('email');
        $this->email->initialize($config);
        $system_name = $this->db->get_where('settings', array(
            'type' => 'system_name'
        ))->row()->description;
        if ($from == NULL)
            $from = $this->db->get_where('settings', array(
                'type' => 'system_email'
            ))->row()->description;
        // attachment
        if ($attachment_url != NULL)
            $this->email->attach($attachment_url);
        $this->email->from($from, $system_name);
        $this->email->from($from, $system_name);
        $this->email->to($to);
        $this->email->subject($sub);
        $this->email->message($msg);
        $this->email->send();
        //echo $this->email->print_debugger();
    }
}

/* End of file Email_model.php */
/* Location: ./application/models/Email_model.php */