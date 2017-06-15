<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    function create_new_user()
    {
		$data['user_code']  =   substr(md5(rand(0, 1000000)), 0, 7);
		$data['name']       =   $this->input->post('name');
		$data['email']      =   $this->input->post('email');
		if($this->input->post('type') == 2 || $this->input->post('type') == 4 || $this->input->post('type') == 5) {
			$data['password']   =   sha1($this->input->post('password'));
		}
		$data['phone']      =   $this->input->post('phone');
		$data['gender']     =   $this->input->post('gender');
		$data['type']  		=   $this->input->post('type');
		$data['date_added'] =   strtotime(date("Y-m-d H:i:s"));

		if($data['type'] == 4) {
			// saving the user permissions
			$checked_permissions		=	$this->input->post('user_permission');
			$count_checked_permissions  =   count($checked_permissions);
			if($count_checked_permissions > 0) {
				$permissions = '';
				for($i = 0; $i < $count_checked_permissions; $i++) {
					$permissions .= $checked_permissions[$i] . ',';
				}
				$data['user_permission']	=	$permissions;
			}
		}
		$this->db->insert('user' , $data);
		$user_id = $this->db->insert_id();

		$address_data['address_code']   =	substr(md5(rand(0, 1000000)), 0, 7);
		$address_data['user_id']        =	$user_id;
		$address_data['address_line_1'] =	$this->input->post('address_line_1');
		$address_data['address_line_2'] =	$this->input->post('address_line_2');
		$address_data['city']           =	$this->input->post('city');
		$address_data['zip_code']       =	$this->input->post('zip_code');
		$address_data['state']          =	$this->input->post('state');
		$address_data['country_id']     =	$this->input->post('country_id');
		$this->db->insert('address' , $address_data);

		move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/' . $data['user_code'] . '.jpg');

		// sending an email to the user of newly created account
		if($data['type'] == 2 || $data['type'] == 4) {
			$this->email_model->account_opening_email($data['email'] , $this->input->post('password'));
		}

		return $data['type'];
    }

    function edit_user($user_code)
    {
		$data['name']          =   $this->input->post('name');
		$data['email']         =   $this->input->post('email');
		$data['phone']         =   $this->input->post('phone');
		$data['gender']        =   $this->input->post('gender');
		$data['type']          =   $this->input->post('type');
		$data['last_modified'] =   strtotime(date("Y-m-d H:i:s"));

		if($data['type'] == 4) {
			// saving the user permissions
			$checked_permissions		=	$this->input->post('user_permission');
			$count_checked_permissions  =   count($checked_permissions);
			if($count_checked_permissions > 0) {
				$permissions = '';
				for($i = 0; $i < $count_checked_permissions; $i++) {
					$permissions .= $checked_permissions[$i] . ',';
				}
				$data['user_permission']	=	$permissions;
			}
		}

		$this->db->where('user_code' , $user_code);
		$this->db->update('user' , $data);
		move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/' . $user_code. '.jpg');
    }

    function delete_user($user_code)
    {
    	unlink('uploads/user_image/' . $user_code . '.jpg');
    	$this->db->where('user_code' , $user_code);
    	$this->db->delete('user');
    }

    function check_permission($user_code , $permission_id)
    {
    	$user_permissions	=	$this->db->get_where('user' , array('user_code' => $user_code))->row()->user_permission;
    	if(in_array($permission_id, explode(',', $user_permissions))) {
    		return true;
    	} else {
    		return false;
    	}
    }

    function get_user_info($user_code , $info)
    {
    	$query = $this->db->get_where('user' , array(
    		'user_code' => $user_code
    	));
    	return $query->row()->$info;
    }

    function get_user_info_by_id($user_id , $info)
    {
    	$query = $this->db->get_where('user' , array(
    		'user_id' => $user_id
    	));
    	return $query->row()->$info;
    }

    function create_address()
    {
		$data['address_code']   =	substr(md5(rand(0, 1000000)), 0, 7);
		$data['user_id']        =	$this->input->post('user_id');
		$data['address_line_1'] =	$this->input->post('address_line_1');
		$data['address_line_2'] =	$this->input->post('address_line_2');
		$data['city']           =	$this->input->post('city');
		$data['zip_code']       =	$this->input->post('zip_code');
		$data['state']          =	$this->input->post('state');
		$data['country_id']     =	$this->input->post('country_id');

		$this->db->insert('address' , $data);
    }

    function edit_address($address_code)
    {
    $data['user_id']        =	$this->input->post('user_id');
		$data['address_line_1'] =	$this->input->post('address_line_1');
		$data['address_line_2'] =	$this->input->post('address_line_2');
		$data['city']           =	$this->input->post('city');
		$data['zip_code']       =	$this->input->post('zip_code');
		$data['state']          =	$this->input->post('state');
		$data['country_id']     =	$this->input->post('country_id');

		$this->db->where('address_code' , $address_code);
		$this->db->update('address' , $data);
    }

    function delete_address($address_code)
    {
    	$this->db->where('address_code' , $address_code);
    	$this->db->delete('address');
    }

    function update_user_profile($user_id)
    {
    	$user_code		=	$this->db->get_where('user' , array(
    		'user_id' => $user_id
    	))->row()->user_code;
    	$data['name']	=	$this->input->post('name');
    	$data['email']	=	$this->input->post('email');
    	$data['phone']	=	$this->input->post('phone');
    	$data['gender']	=	$this->input->post('gender');

    	$this->db->where('user_id' , $user_id);
    	$this->db->update('user' , $data);
    	move_uploaded_file($_FILES['profile_image']['tmp_name'], 'uploads/user_image/' . $user_code. '.jpg');
    }

    function update_user_password($user_id)
    {
    	$current_password	=	$this->db->get_where('user' , array(
    		'user_id' => $user_id
    	))->row()->password;
		$data['current_password'] =	$this->input->post('current_password');
		$data['new_password']     =	$this->input->post('new_password');
		$data['confirm_password'] =	$this->input->post('confirm_password');
		if($current_password == sha1($data['current_password']) && $data['new_password'] == $data['confirm_password']) {
			$this->db->where('user_id' , $user_id);
			$this->db->update('user' , array('password' => sha1($data['new_password'])));
			return 1;
		} else {
			return 0;
		}
    }

    function get_user_image($user_code)
    {
    	if(file_exists('uploads/user_image/' . $user_code . '.jpg')) {
    		$image_url = 'uploads/user_image/' . $user_code . '.jpg';
    	}

    	if(!(file_exists('uploads/user_image/' . $user_code . '.jpg'))) {
    		$image_url = 'assets/no_image.png';
    	}

    	return $image_url;
    }

    function count_user($selector)
    {
    	if($selector == 'all') {
    		$result = $this->db->count_all('user');
    		return $result;
    	}
    	if($selector == 'customer') {
    		$this->db->where('type' , 2);
    		$this->db->from('user');
    		$result = $this->db->count_all_results();
    		return $result;
    	}
    	if($selector == 'supplier') {
    		$this->db->where('type' , 3);
    		$this->db->from('user');
    		$result = $this->db->count_all_results();
    		return $result;
    	}
    	if($selector == 'employee') {
    		$this->db->where('type' , 4);
    		$this->db->from('user');
    		$result = $this->db->count_all_results();
    		return $result;
    	}
    	if($selector == 'manager') {
    		$this->db->where('type' , 5);
    		$this->db->from('user');
    		$result = $this->db->count_all_results();
    		return $result;
    	}
    }


}
