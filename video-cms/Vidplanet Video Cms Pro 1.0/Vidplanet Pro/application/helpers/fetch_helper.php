<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// get settings of particular type
if (! function_exists('get_settings')) {
  function get_settings($type = '') {
    $CI	=&	get_instance();
    $CI->load->database();

    $CI->db->where('type', $type);
    $result = $CI->db->get('settings')->row()->description;
    return $result;
  }
}

// get user info of particular type by user id
if (! function_exists('get_info_by_id')) {
  function get_info_by_id($table = '', $id = '', $info_type = '') {
    $CI	=&	get_instance();
    $CI->load->database();

    $CI->db->where($table.'_id', $id);
    $result = $CI->db->get($table)->row()->$info_type;
    return $result;
  }
}

// get all results from a particular table with soerting order
if (! function_exists('get_table_data_with_sort')) {
  function get_table_data_with_sort($table = '', $sort_order = '') {
    $CI	=&	get_instance();
    $CI->load->database();

    $CI->db->order_by('date_added', $sort_order);
    $result = $CI->db->get($table)->result_array();
    return $result;
  }
}

// get all columns of a particular table of particular id
if (! function_exists('get_results_of_id')) {
  function get_results_of_id($table = '', $id = '') {
    $CI	=&	get_instance();
    $CI->load->database();

    $CI->db->where($table.'_id', $id);
    $result = $CI->db->get($table)->result_array();
    return $result;
  }
}

// get user image by user id
if (! function_exists('get_user_image')) {
  function get_user_image($user_type = '', $user_id = '') {
    $CI	=&	get_instance();
    $CI->load->helper('url');

    $expected_image_path    = 'uploads/'.$user_type.'_image/'.$user_id.'.jpg';
    $placeholder_image_path = 'assets/backend/images/user_placeholder.jpg';
    if (file_exists($expected_image_path)) {
      return base_url($expected_image_path);
    }
    return base_url($placeholder_image_path);
  }
}
