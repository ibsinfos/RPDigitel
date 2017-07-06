<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payment_gateway extends Admin_Controller

{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
//        $data['subview'] = $this->load->view('admin/account/manage_account', $data, TRUE);

        $this->load->view('admin/payment_gateway_view'); //page load
    }

    
    public function pay_amount()
    {
//        $data['subview'] = $this->load->view('admin/account/manage_account', $data, TRUE);
        //$this->load->view('admin/payment_gateway_view'); //page load
        
        
        
    }

    
}

?>
