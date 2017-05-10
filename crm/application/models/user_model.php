<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * 	@author : themetic.net
 * 	date	: 21 April, 2015
 * 	Inventory & Invoice Management System
 * 	http://themetic.net
 *  version: 1.0
 */

class User_Model extends MY_Model {

    public $_table_name;
    public $_order_by;
    public $_primary_key;

    public function select_user_roll_by_id($user_id) {
        $this->db->select('tbl_user_role.*', false);
        $this->db->select('tbl_menu.*', false);
        $this->db->from('tbl_user_role');
        $this->db->join('tbl_menu', 'tbl_user_role.menu_id = tbl_menu.menu_id', 'left');
        $this->db->where('tbl_user_role.user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

    public function get_new_user() {
        $post = new stdClass();
        $post->user_name = '';
        $post->name = '';
        $post->email = '';
        $post->flag = 3;
        $post->employee_login_id = '';

        return $post;
    }
	
	public function select_user_by_role_id( $role_id, $user_id ) {
		
        $this->db->select('tbl_users.*');
        $this->db->from('tbl_users');
        $this->db->where('tbl_users.role_id', $role_id );
         $this->db->where('tbl_users.user_id !=', $user_id );
        $query_result = $this->db->get();
        
       // $result = $query_result->result();

        return $query_result;
    }

}
