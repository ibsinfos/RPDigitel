<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    function add_new_product()
    {
        $data['product_code']            =   $this->input->post('product_code');
        $data['name']                    =   $this->input->post('name');
        $data['brand']                   =   $this->input->post('brand');
        $data['description']             =   $this->input->post('description');
        $data['product_category_id']     =   $this->input->post('product_category_id');
        $data['variant']                 =   $this->input->post('variant');
        $data['date_added']              =   strtotime(date("Y-m-d H:i:s"));

        $this->db->insert('product' , $data);
        $product_id = $this->db->insert_id();

        move_uploaded_file($_FILES['product_image']['tmp_name'], 'uploads/product_image/' . $product_id . '.jpg');

        if($data['variant'] == 0) {

            $data2['code']               =   $data['product_code'];
            $data2['product_id']         =   $product_id;
            $data2['quantity']           =   $this->input->post('quantity_single');
            $data2['alert_quantity']     =   $this->input->post('alert_quantity_single');
            $data2['cost_price']         =   $this->input->post('cost_price_single');
            $data2['selling_price']      =   $this->input->post('selling_price_single');
            $data2['is_variant']         =   0;

            $this->db->insert('variant' , $data2);
        }

        if($data['variant'] == 1) {
            $types            =   $this->input->post('type');
            $specifications   =   $this->input->post('specification');
            $cost_prices      =   $this->input->post('cost_price');
            $selling_prices   =   $this->input->post('selling_price');
            $quantities       =   $this->input->post('quantity');
            $alert_quantities =   $this->input->post('alert_quantity');
            $variant_entries  =   sizeof($types);
            for($i = 0; $i < $variant_entries; $i++) {
                $var_data['code']           =   substr(md5(rand(0, 1000000)), 0, 7);
                $var_data['product_id']     =   $product_id;
                $var_data['type']           =   $types[$i];
                $var_data['specification']  =   $specifications[$i];
                $var_data['quantity']       =   $quantities[$i];
                $var_data['alert_quantity'] =   $alert_quantities[$i];
                $var_data['cost_price']     =   $cost_prices[$i];
                $var_data['selling_price']  =   $selling_prices[$i];
                $var_data['is_variant']     =   1;

                $this->db->insert('variant' , $var_data);
            }
        }
    }


    function edit_product_info_no_variant($product_id)
    {
        $data['product_code']        =   $this->input->post('product_code');
        $data['name']                =   $this->input->post('name');
        $data['brand']               =   $this->input->post('brand');
        $data['product_category_id'] =   $this->input->post('product_category_id');
        $data['description']         =   $this->input->post('description');
        $data['last_modified']       =   strtotime(date("Y-m-d H:i:s"));

        $this->db->where('product_id' , $product_id);
        $this->db->update('product' , $data);

        $data2['cost_price']     =   $this->input->post('cost_price');
        $data2['selling_price']  =   $this->input->post('selling_price');
        $data2['quantity']       =   $this->input->post('quantity');
        $data2['alert_quantity'] =   $this->input->post('alert_quantity');
        $data2['code']           =   $data['product_code'];

        $this->db->where('product_id' , $product_id);
        $this->db->update('variant' , $data2);

        move_uploaded_file($_FILES['product_image']['tmp_name'], 'uploads/product_image/' . $product_id . '.jpg');

        return $data['product_code'];
    }

    function edit_product_info_has_variant($product_id)
    {
        $data['product_code']        =   $this->input->post('product_code');
        $data['name']                =   $this->input->post('name');
        $data['brand']               =   $this->input->post('brand');
        $data['product_category_id'] =   $this->input->post('product_category_id');
        $data['description']         =   $this->input->post('description');
        $data['last_modified']       =   strtotime(date("Y-m-d H:i:s"));

        $this->db->where('product_id' , $product_id);
        $this->db->update('product' , $data);

        move_uploaded_file($_FILES['product_image']['tmp_name'], 'uploads/product_image/' . $product_id . '.jpg');

        return $data['product_code'];
    }


    function add_new_product_category()
    {
    	$data['product_category_code']	=	substr(md5(rand(0, 1000000)), 0, 7);
    	$data['name']					=	$this->input->post('name');
    	$data['description']			=	$this->input->post('description');
    	$data['date_added']				=	strtotime(date("Y-m-d H:i:s"));

    	$this->db->insert('product_category' , $data);
    }

    function edit_product_category($product_category_code)
    {
    	$data['name']					=	$this->input->post('name');
    	$data['description']			=	$this->input->post('description');
    	$data['last_modified']			=	strtotime(date("Y-m-d H:i:s"));

    	$this->db->where('product_category_code' , $product_category_code);
    	$this->db->update('product_category' , $data);
    }

    function delete_product_category($product_category_code)
    {
		$this->db->where('product_category_code' , $product_category_code);
    	$this->db->delete('product_category');
    }

    function add_new_product_sub_category()
    {
        $data['product_sub_category_code'] =   substr(md5(rand(0, 1000000)), 0, 7);
        $data['name']                      =   $this->input->post('name');
        $data['description']               =   $this->input->post('description');
        $data['product_category_id']       =   $this->input->post('product_category_id');
        $data['branch_id']                 =   $this->session->userdata('login_branch_id');
        $data['date_added']                =   strtotime(date("Y-m-d H:i:s"));

        $this->db->insert('product_sub_category' , $data);
    }

    function edit_product_sub_category($product_sub_category_code)
    {
        $data['name']                   =   $this->input->post('name');
        $data['description']            =   $this->input->post('description');
        $data['product_category_id']    =   $this->input->post('product_category_id');
        $data['last_modified']          =   strtotime(date("Y-m-d H:i:s"));

        $this->db->where('product_sub_category_code' , $product_sub_category_code);
        $this->db->update('product_sub_category' , $data);
    }

    function delete_product_sub_category($product_sub_category_code)
    {
        $this->db->where('product_sub_category_code' , $product_sub_category_code);
        $this->db->delete('product_sub_category');
    }

    function get_info_by_product_code($product_code , $info)
    {
        $result = $this->db->get_where('product' , array(
            'product_code' => $product_code
        ))->row()->$info;
        return $result;
    }

    function add_variant($product_id)
    {
        $data['product_id']     =   $product_id;
        $data['code']           =   substr(md5(rand(0, 1000000)), 0, 7);
        $data['type']           =   $this->input->post('type');
        $data['specification']  =   $this->input->post('specification');
        $data['cost_price']     =   $this->input->post('cost_price');
        $data['selling_price']  =   $this->input->post('selling_price');
        $data['quantity']       =   $this->input->post('quantity');
        $data['alert_quantity'] =   $this->input->post('alert_quantity');
        $data['is_variant']     =   1;

        $this->db->insert('variant' , $data);
        return $this->db->get_where('product' , array('product_id' => $product_id))->row()->product_code;
    }

    function edit_variant($variant_id)
    {
        $product_id   = $this->db->get_where('variant' , array('variant_id' => $variant_id))->row()->product_id;
        $product_code = $this->db->get_where('product' , array('product_id' => $product_id))->row()->product_code;

        $data['code']           =   $this->input->post('code');
        $data['type']           =   $this->input->post('type');
        $data['specification']  =   $this->input->post('specification');
        $data['cost_price']     =   $this->input->post('cost_price');
        $data['selling_price']  =   $this->input->post('selling_price');
        $data['quantity']       =   $this->input->post('quantity');
        $data['alert_quantity'] =   $this->input->post('alert_quantity');
        $data['is_variant']     =   1;

        $this->db->where('variant_id' , $variant_id);
        $this->db->update('variant' , $data);
        return $product_code;
    }

    function delete_variant($variant_id)
    {
        $this->db->where('variant_id' , $variant_id);
        $this->db->delete('variant');
    }


    function archive_product($product_id)
    {
        $this->db->where('product_id' , $product_id);
        $this->db->update('product' , array('archive_status' => 1 , 'last_modified' => strtotime(date("Y-m-d H:i:s"))));
    }

    function remove_product_from_archive($product_id)
    {
        $this->db->where('product_id' , $product_id);
        $this->db->update('product' , array('archive_status' => 0 , 'last_modified' => strtotime(date("Y-m-d H:i:s"))));
    }


}
