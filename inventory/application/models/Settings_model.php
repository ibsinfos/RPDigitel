<?php 
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

    function add_shipping_method()
    {
        $data['name'] = $this->input->post('name');
        $this->db->insert('shipping_method' , $data);
    }

    function edit_shipping_method($shipping_method_id)
    {
        $data['name'] = $this->input->post('name');
        $this->db->where('shipping_method_id' , $shipping_method_id);
        $this->db->update('shipping_method' , $data);
    }

    function delete_shipping_method($shipping_method_id)
    {
        $this->db->where('shipping_method_id' , $shipping_method_id);
        $this->db->delete('shipping_method');
    }

    function add_courier_service()
    {
        $data['name'] = $this->input->post('name');
        $this->db->insert('courier' , $data);
    }

    function edit_courier_service($courier_id)
    {
        $data['name'] = $this->input->post('name');
        $this->db->where('courier_id' , $courier_id);
        $this->db->update('courier' , $data);
    }

    function delete_courier_service($courier_id)
    {
        $this->db->where('courier_id' , $courier_id);
        $this->db->delete('courier');
    }

    function add_tax()
    {
        $data['tax_code']     =   $this->input->post('tax_code');
        $data['name']         =   $this->input->post('name');
        $data['value']        =   $this->input->post('value');
        $data['date_created'] =   strtotime(date("Y-m-d H:i:s"));

        $this->db->insert('tax' , $data);
    }

    function edit_tax($tax_id)
    {
        $data['tax_code']      =   $this->input->post('tax_code');
        $data['name']          =   $this->input->post('name');
        $data['value']         =   $this->input->post('value');
        $data['last_modified'] =   strtotime(date("Y-m-d H:i:s"));

        $this->db->where('tax_id' , $tax_id);
        $this->db->update('tax' , $data);
    }

    function delete_tax($tax_id)
    {
        $this->db->where('tax_id' , $tax_id);
        $this->db->delete('tax');
    }

    function update_system_settings()
    {
        $data['description'] = $this->input->post('system_name');
        $this->db->where('type', 'system_name');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('system_title');
        $this->db->where('type', 'system_title');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('address');
        $this->db->where('type', 'address');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('phone');
        $this->db->where('type', 'phone');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('system_email');
        $this->db->where('type', 'system_email');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('language');
        $this->db->where('type', 'language');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('text_align');
        $this->db->where('type', 'text_align');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('currency_id');
        $this->db->where('type', 'currency_id');
        $this->db->update('settings', $data);

        move_uploaded_file($_FILES['logo']['tmp_name'], 'uploads/logo.png');
    }

    
}

