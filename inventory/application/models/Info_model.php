<?php 
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Info_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

    function get_users($user_type_code)
    {
        $query = $this->db->get_where('user' , array(
            'type' => $user_type_code
        ));
        return $query->result_array();
    }

    function get_settings($settings_type)
    {
        $query = $this->db->get_where('settings' , array(
            'type' => $settings_type
        ))->row()->description;
        return $query;
    }

    function get_currency_symbol()
    {
        $system_currency_id = $this->db->get_where('settings' , array(
            'type' => 'currency_id'
        ))->row()->description;
        $currency_symbol = $this->db->get_where('currency' , array(
            'currency_id' => $system_currency_id
        ))->row()->currency_symbol;
        return $currency_symbol;
    }

    function get_currency_code()
    {
        $system_currency_id = $this->db->get_where('settings' , array(
            'type' => 'currency_id'
        ))->row()->description;
        $currency_code = $this->db->get_where('currency' , array(
            'currency_id' => $system_currency_id
        ))->row()->currency_code;
        return $currency_code;
    }

    function get_user_address($user_id)
    {
        $query  =   $this->db->get_where('address' , array(
            'user_id' => $user_id
        ));
        return $query->result_array();
    }

    function get_user_info_from_id($user_id , $info_type)
    {
        $query  =   $this->db->get_where('user' , array(
            'user_id' => $user_id
        ));
        return $query->row()->$info_type;
    }

    function get_address_info_from_address_id($address_id , $info_type)
    {
        $query  =   $this->db->get_where('address' , array(
            'address_id' => $address_id
        ));
        return $query->row()->$info_type;   
    }

    function get_dates_within_range($time_start , $time_end)
    {
        $begin      = new DateTime($time_start);
        $end        = new DateTime($time_end);

        $interval   = DateInterval::createFromDateString('1 day');
        $period     = new DatePeriod($begin, $interval, $end);

        return $period;
    }

    
}

