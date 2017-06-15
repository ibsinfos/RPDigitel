<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pusher_model extends CI_Model {

  // constructor
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

  // method for adding users
  function add_user() {
    // check if the email already exists in user table
    $email = $this->input->post('email');
    $validation = email_validation_on_create($email);

    if ($validation == 1) {
      $data['code']       = substr(md5(rand(0, 1000000)), 0, 7);
      $data['name']       = $this->input->post('name');
      $data['email']      = $this->input->post('email');
      $data['password']   = sha1($this->input->post('password'));
      $data['phone']      = $this->input->post('phone');
      $data['address']    = $this->input->post('address');
      $data['date_added'] = strtotime(date('Y-m-d H:i:s'));
      $this->db->insert('user', $data);
      $user_id = $this->db->insert_id();
      move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/'.$user_id.'.jpg');
      $this->session->set_flashdata('success_message', get_phrase('user_added_successfully'));
    }
    else{
    	$this->session->set_flashdata('error_message', get_phrase('duplicate_email'));
    }
  }
  // method for editing users
  function edit_user($user_id) {
    $data['name']          = $this->input->post('name');
    $data['email']         = $this->input->post('email');
    $data['phone']         = $this->input->post('phone');
    $data['address']       = $this->input->post('address');
    $data['last_modified'] = strtotime(date('Y-m-d H:i:s'));
    $validation = email_validation_on_edit($data['email'], $user_id, 'user');
    if ($validation == 1) {
	    $this->db->where('user_id', $user_id);
	    $this->db->update('user', $data);
	    move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/'.$user_id.'.jpg');
	    $this->session->set_flashdata('success_message', get_phrase('data_updated_successfully'));
    }
    else{
    	$this->session->set_flashdata('error_message', get_phrase('duplicate_email'));
    }
  }

	// method for deleting user
	function delete_user($user_id) {
		// delete the user image if exists
		if (file_exists('uploads/user_image/'.$user_id.'.jpg'))
			unlink('uploads/user_image/'.$user_id.'.jpg');
		// delete user info from database
		$this->db->where('user_id', $user_id);
		$this->db->delete('user');
	}

	// method for adding category
	function add_category($data){
		$data['date_added']    = strtotime(date('Y-m-d H:i:s'));
		$data['last_modified'] = '';
		$this->db->insert('category', $data);
	}
	function update_category($data){
		$data['last_modified'] = strtotime(date('Y-m-d H:i:s'));
		$this->db->where('code', $data['code']);
		$this->db->update('category', $data);
	}

  // System settings
	function system_settings($data2){

		$data['description'] = $data2['system_name'];
    $array = array(
      'type' => 'system_name'
    );
		$this->db->where($array);
    $this->db->update('settings' , $data);

		$data['description'] = $data2['system_title'];
    $array = array(
      'type' => 'system_title'
    );
		$this->db->where($array);
    $this->db->update('settings' , $data);

		$data['description'] = $data2['system_email'];
    $array = array(
      'type' => 'system_email'
    );
		$this->db->where($array);
    $this->db->update('settings' , $data);

    $data['description'] = $data2['language'];
    $array = array(
      'type' => 'language'
    );
    $this->db->where($array);
    $this->db->update('settings' , $data);

		$data['description'] = $data2['text_align'];
    $array = array(
      'type' => 'text_align'
    );
    $this->db->where($array);
    $this->db->update('settings' , $data);

    $data['description'] = $data2['system_currency_id'];
    $array = array(
      'type' => 'system_currency_id'
    );
    $this->db->where($array);
    $this->db->update('settings' , $data);

		$data['description'] = $data2['youtube_data_api_key'];
    $array = array(
      'type' => 'youtube_data_api_key'
    );
		$this->db->where($array);
    $this->db->update('settings' , $data);
	}
  // system logo upload
  function system_logo_upload($image_array){
    $data['description'] = $image_array['logo_name'];
    $array = array(
      'type' => 'logo'
    );

    if($data['description'] != ''){
      $this->db->where($array);
      $this->db->update('settings' , $data);
    }

    $data['description'] = $image_array['favicon_name'];
    $array = array(
      'type' => 'favicon'
    );
    if($data['description'] != ''){
      $this->db->where($array);
      $this->db->update('settings' , $data);
    }
  }

  function update_admin_information($data){
  	$validation = email_validation_on_edit($data['email'], $data['admin_id'], 'admin');
  	if ($validation == 1) {
  		$this->db->where('admin_id', $data['admin_id']);
   		$this->db->update('admin', $data);
   		$this->session->set_flashdata('success_message' , get_phrase('infromation_updated'));
  	}
  	else{
  		$this->session->set_flashdata('error_message' , get_phrase('duplicate_email'));
  	}
    
  }

  function update_admin_password($password){
    $data['admin_id'] = $this->session->userdata('login_user_id');
    $data['password'] = sha1($password);
    $this->db->where('admin_id', $data['admin_id']);
    $this->db->update('admin', $data);
  }

	// Payment information details update function
	function payment_settings_update($payment_information){
		// updating paypal email
		$data['description'] = $payment_information['paypal_email'];
    $array = array(
      'type' => 'paypal_email'
    );
		$this->db->where($array);
    $this->db->update('settings' , $data);

		// updating stripe publishable key
		$data['description'] = $payment_information['stripe_publishable_key'];
    $array = array(
      'type' => 'stripe_publishable_key'
    );
		$this->db->where($array);
    $this->db->update('settings' , $data);

		// updating stripe secret key
		$data['description'] = $payment_information['stripe_secret_key'];
    $array = array(
      'type' => 'stripe_secret_key'
    );
		$this->db->where($array);
    $this->db->update('settings' , $data);
	}

	// Updating user interface function
	function user_interface_settings($interface){
		// updating theme
		$data['description'] = $interface['frontend_theme'];
    $array = array(
      'type' => 'frontend_theme'
    );
		$this->db->where($array);
    $this->db->update('settings' , $data);

		// updating color scheme
		$data['description'] = $interface['theme_color_scheme'];
    $array = array(
      'type' => 'theme_color_scheme'
    );
		$this->db->where($array);
    $this->db->update('settings' , $data);
	}

	// For updating homepage video
	function update_homepage_video($video_code){
		$data['description'] = $video_code;
		$array = array(
      'type' => 'home_page_video_code'
    );
		$this->db->where($array);
    $this->db->update('settings' , $data);
	}
	function varify_logged_in_user($user_credential){
		$this->db->where($user_credential);
		$number_of_rows = $this->db->get('user')->num_rows();
		return $number_of_rows;
	}

	function update_user_information($user_info){
		// $registered_users = $this->db->get('user')->result_array();
		// foreach ($registered_users as $user) {
		// 	if($user['email'] == $user_info['email']){
		// 		if($user['code'] == $this->session->userdata['code']){
		// 		}
		// 		else{
		// 			return 1;
		// 		}
		// 	}
		// }
		$validation = email_validation_on_edit($user_info['email'], $this->session->userdata('user_id'), 'user');
		if ($validation == 0) {
			return 1;
		}
		$user_info['last_modified'] = strtotime(date('Y-m-d H:i:s'));
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->update('user', $user_info);

		$this->db->where('user_id', $this->session->userdata('user_id'));
		$user_details = $this->db->get('user')->row_array();
		$this->session->set_userdata($user_details);

		return 0;
	}
	function user_register($new_user_credential){
		$new_user_credential['date_added'] = strtotime(date('Y-m-d H:i:s'));
		$this->db->insert('user', $new_user_credential);
		return 0;
	}

	// post a comment
	function post_comment($data){
		$data['code']       = substr(md5(rand(0, 10000000)), 0, 8);
		$data['date_added'] = strtotime(date('Y-m-d H:i:s'));
		$this->db->insert('comment', $data);
	}

	// Like Or Unlike function
	function reaction_like($liked_video_ids, $video_id, $react){
		if($react == 'like'){
			$liked_video_ids = implode(',', $liked_video_ids);
			$liked_video_ids = $liked_video_ids.$video_id.',';
			$array = array(
				'liked_video_ids' => $liked_video_ids
			);
			$this->db->where('code', $this->session->userdata('code'));
			$this->db->update('user', $array);
			$this->db->where('video_id', $video_id);
			$total_like = $this->db->get('video')->row()->likes;
			$total_like++;
			$likes = array(
				'likes' => $total_like
			);
			$this->db->where('video_id', $video_id);
			$this->db->update('video', $likes);

			// Checking if the video got previous dislike..... starts
			$this->db->where('video_id', $video_id);
			$new_dislikes_array = $this->db->get('video')->row_array();
			$new_dislikes = $new_dislikes_array['dislikes'];

			$this->db->where('code', $this->session->userdata('code'));
			$user_info = $this->db->get('user')->row_array();
			$disliked_video_ids_array = explode(',', $user_info['disliked_video_ids']);
			for($i = 0; $i < sizeof($disliked_video_ids_array)-1; $i++){
				if($disliked_video_ids_array[$i] == $video_id){
					unset($disliked_video_ids_array[$i]);
					$disliked_video_ids_array = implode(',', $disliked_video_ids_array);
					$array = array(
						'disliked_video_ids' => $disliked_video_ids_array
					);
					$this->db->where('code', $this->session->userdata('code'));
					$this->db->update('user', $array);

					$new_dislikes = $new_dislikes - 1;
					$dislikes_array = array(
						'dislikes' => $new_dislikes
					);
					$this->db->where('video_id', $video_id);
					$this->db->update('video', $dislikes_array);
				}
			}
			// Checking if the video got previous dislike..... ends

			$react_info =$total_like.'-'.$react.'-'.$new_dislikes;
			echo $react_info;
		}
		else if($react == 'unlike'){
			for($i = 0; $i < sizeof($liked_video_ids)-1; $i++){
				if($liked_video_ids[$i] == $video_id){
					unset($liked_video_ids[$i]);
				}
			}
			$liked_video_ids = implode(',', $liked_video_ids);
			$array = array(
				'liked_video_ids' => $liked_video_ids
			);
			$this->db->where('code', $this->session->userdata('code'));
			$this->db->update('user', $array);

			$this->db->where('video_id', $video_id);
			$total_like = $this->db->get('video')->row()->likes;
			$total_like = $total_like - 1;
			$likes = array(
				'likes' => $total_like
			);
			$this->db->where('video_id', $video_id);
			$this->db->update('video', $likes);
			$react_info =$total_like.'-'.$react;
			echo $react_info;
		}
	}


	// DisLike Or Undislike function
	function reaction_dislike($disliked_video_ids, $video_id, $react){
		if($react == 'dislike'){
			$disliked_video_ids = implode(',', $disliked_video_ids);
			$disliked_video_ids = $disliked_video_ids.$video_id.',';
			$array = array(
				'disliked_video_ids' => $disliked_video_ids
			);
			$this->db->where('code', $this->session->userdata('code'));
			$this->db->update('user', $array);
			$this->db->where('video_id', $video_id);
			$total_dislike = $this->db->get('video')->row()->dislikes;
			$total_dislike++;
			$dislikes = array(
				'dislikes' => $total_dislike
			);
			$this->db->where('video_id', $video_id);
			$this->db->update('video', $dislikes);

			// Checking if the video got previous like..... starts
			$this->db->where('video_id', $video_id);
			$new_likes_array = $this->db->get('video')->row_array();
			$new_likes = $new_likes_array['likes'];

			$this->db->where('code', $this->session->userdata('code'));
			$user_info = $this->db->get('user')->row_array();
			$liked_video_ids_array = explode(',', $user_info['liked_video_ids']);
			for($i = 0; $i < sizeof($liked_video_ids_array)-1; $i++){
				if($liked_video_ids_array[$i] == $video_id){
					unset($liked_video_ids_array[$i]);
					$liked_video_ids_array = implode(',', $liked_video_ids_array);
					$array = array(
						'liked_video_ids' => $liked_video_ids_array
					);
					$this->db->where('code', $this->session->userdata('code'));
					$this->db->update('user', $array);

					$new_likes = $new_likes - 1;
					$likes_array = array(
						'likes' => $new_likes
					);
					$this->db->where('video_id', $video_id);
					$this->db->update('video', $likes_array);
				}
			}
			// Checking if the video got previous like..... ends

			$react_info =$total_dislike.'-'.$react.'-'.$new_likes;
			echo $react_info;
		}
		else if($react == 'undislike'){
			for($i = 0; $i < sizeof($disliked_video_ids)-1; $i++){
				if($disliked_video_ids[$i] == $video_id){
					unset($disliked_video_ids[$i]);
				}
			}
			$disliked_video_ids = implode(',', $disliked_video_ids);
			$array = array(
				'disliked_video_ids' => $disliked_video_ids
			);
			$this->db->where('code', $this->session->userdata('code'));
			$this->db->update('user', $array);

			$this->db->where('video_id', $video_id);
			$total_dislike = $this->db->get('video')->row()->dislikes;
			$total_dislike--;
			$dislikes = array(
				'dislikes' => $total_dislike
			);
			$this->db->where('video_id', $video_id);
			$this->db->update('video', $dislikes);
			$react_info =$total_dislike.'-'.$react;
			echo $react_info;
		}
	}


	// Favorite Or UnFavrite function
	function reaction_favorite($favorite_video_ids, $video_id, $react){
		if($react == 'favorite'){
			$favorite_video_ids = implode(',', $favorite_video_ids);
			$favorite_video_ids = $favorite_video_ids.$video_id.',';
			$array = array(
				'favorite_video_ids' => $favorite_video_ids
			);
			$this->db->where('code', $this->session->userdata('code'));
			$this->db->update('user', $array);
			$this->db->where('video_id', $video_id);
			$total_favorite = $this->db->get('video')->row()->favourites;
			$total_favorite++;
			$favorite = array(
				'favourites' => $total_favorite
			);
			$this->db->where('video_id', $video_id);
			$this->db->update('video', $favorite);
			$react_info =$total_favorite.'-'.$react;
			echo $react_info;
		}
		else if($react == 'unfavorite'){
			for($i = 0; $i < sizeof($favorite_video_ids)-1; $i++){
				if($favorite_video_ids[$i] == $video_id){
					unset($favorite_video_ids[$i]);
				}
			}
			$favorite_video_ids = implode(',', $favorite_video_ids);
			$array = array(
				'favorite_video_ids' => $favorite_video_ids
			);
			$this->db->where('code', $this->session->userdata('code'));
			$this->db->update('user', $array);

			$this->db->where('video_id', $video_id);
			$total_favorite = $this->db->get('video')->row()->favourites;
			$total_favorite--;
			$favorite = array(
				'favourites' => $total_favorite
			);
			$this->db->where('video_id', $video_id);
			$this->db->update('video', $favorite);
			$react_info =$total_favorite.'-'.$react;
			echo $react_info;
		}
	}


	// Reation generator
	function reaction_generator($data){
		$this->db->where('code', $data['video_code']);
		$video_id = $this->db->get('video')->row_array();
		if($data['reaction'] == 'like'){
			$this->db->where('code', $this->session->userdata('code'));
	    $reaction_details = $this->db->get('user')->row_array();
	    $liked_video_ids = explode(',', $reaction_details['liked_video_ids']);

			$size = sizeof($liked_video_ids) -1 ;
			if($size > 0){
	    for($i = 0; $i < $size; $i++){
        if($liked_video_ids[$i] == $video_id['video_id']){
					$this->reaction_like($liked_video_ids, $video_id['video_id'], 'unlike');
					die();
        }
	    }
			$this->reaction_like($liked_video_ids, $video_id['video_id'], 'like');
		 }
		 else{
			 $this->reaction_like($liked_video_ids, $video_id['video_id'], 'like');
		 }
		}
		else if($data['reaction'] == 'dislike'){
			$this->db->where('code', $this->session->userdata('code'));
	    $reaction_details = $this->db->get('user')->row_array();
	    $disliked_video_ids = explode(',', $reaction_details['disliked_video_ids']);
			$size = sizeof($disliked_video_ids) -1 ;
			if($size > 0){
	    for($i = 0; $i < sizeof($disliked_video_ids)-1; $i++){
        if($disliked_video_ids[$i] == $video_id['video_id']){
					$this->reaction_dislike($disliked_video_ids, $video_id['video_id'], 'undislike');
					die();
        }
	    }
			$this->reaction_dislike($disliked_video_ids, $video_id['video_id'], 'dislike');
		 }
		 else{
			 $this->reaction_dislike($disliked_video_ids, $video_id['video_id'], 'dislike');
		 }
		}
		else if($data['reaction'] == 'favorite'){
			$this->db->where('code', $this->session->userdata('code'));
	    $reaction_details = $this->db->get('user')->row_array();
	    $favorite_video_ids = explode(',', $reaction_details['favorite_video_ids']);
			$size = sizeof($favorite_video_ids) -1 ;
			if($size > 0){
	    for($i = 0; $i < sizeof($favorite_video_ids)-1; $i++){
        if($favorite_video_ids[$i] == $video_id['video_id']){
					$this->reaction_favorite($favorite_video_ids, $video_id['video_id'], 'unfavorite');
					die();
        }
	    }
			$this->reaction_favorite($favorite_video_ids, $video_id['video_id'], 'favorite');
		 }
		 else{
			 $this->reaction_favorite($favorite_video_ids, $video_id['video_id'], 'favorite');
		 }
		}
	}
}
