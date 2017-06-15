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

class Order extends CI_Controller
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
    // DEFAULT FUNCTION
    public function index() {

    }

    function view($purchase_order_encryption_key) {
      $purchase_order_id = $this->db->get_where('purchase_order' , array(
          'encryption_key' => $purchase_order_encryption_key
      ))->row()->purchase_order_id;
      $page_data['purchase_order_id'] = $purchase_order_id;
      $this->load->view('backend/order_view' , $page_data);
    }


}
