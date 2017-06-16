<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	// constructor
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$models	=	array('pusher_model' => 'pusher', 
							'youtube_model' => 'youtube', 
								'video_model' => 'video');
		$this->load->model($models);
	}

	// default function
	public function index()
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'), 'refresh');
		if ($this->session->userdata('admin_login') == 1)
			redirect(site_url('admin/dashboard'), 'refresh');
		$this->load->view('backend/index');
	}

	// admin dashboard
	function dashboard()
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));
		$page_data['page_name']		=	'dashboard';
		$page_data['page_title']	=	get_phrase('dashboard');
		$this->load->view('backend/index', $page_data);
	}

	// manage users
	function user($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));
		// adding an user
		if ($param1 == 'add') {
			$this->pusher->add_user();
			
			redirect(site_url('admin/user'), 'refresh');
		}
		// editing an user
		if ($param1 == 'edit') {
			$this->pusher->edit_user($param2); // param2 = user id
			redirect(site_url('admin/user'), 'refresh');
		}
		// deleting an user
		if ($param1 == 'delete') {
			$this->pusher->delete_user($param2); // param2 = user id
			$this->session->set_flashdata('success_message', get_phrase('user_deleted_successfully'));
		}
		$page_data['page_name']		=	'user';
		$page_data['page_title']	=	get_phrase('manage_users');
		$this->load->view('backend/index', $page_data);
	}

	function user_profile($user_id = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

		$page_data['page_name']		=	'user_profile';
		$page_data['page_title']	=	get_phrase('user_profile');
		$page_data['user_id']			=	$user_id;
		$this->load->view('backend/index', $page_data);
	}

	// Manage videos
	function videos($param1 = '', $param2 = '', $param3 = '', $param4 = ''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

		if($param1 == 'do_update'){
			$data['code']  = $param2;
			$data['title'] = $this->input->post('video_title');
			$data['description'] = $this->input->post('video_description');
			//$data['thumbnail'] = $this->input->post('thumbnail');
			//$data['duration'] = $this->input->post('duration');
			$data['featured'] = $this->input->post('featured');
			$data['within_a_pack'] = $this->input->post('within_a_pack');
			$data['video_pack_code'] = $this->input->post('video_pack');
			$data['category_code'] = $this->input->post('video_category');
			if($data['featured'] != 1){
				$data['featured'] = 0;
			}

			if($data['within_a_pack'] != 1){
				$data['within_a_pack'] = 0;
				$data['video_pack_code'] = '';
			}
			if($param3 == 'default_video_pack'){
				$this->video->update_video_information($data);
				$this->session->set_flashdata('success_message' , get_phrase('video_information_updated_successfully'));
				redirect(site_url('admin/show_video_pack_details/'.$param4));
			}
			if($param3 == 'default_video_category'){
				$this->video->update_video_information($data);
				$this->session->set_flashdata('success_message' , get_phrase('video_information_updated_successfully'));
				redirect(site_url('admin/show_category_details/'.$param4));
			}
			$this->video->update_video_information($data);
			$this->session->set_flashdata('success_message' , get_phrase('video_information_updated_successfully'));
			redirect(site_url('admin/videos'));
		}
		if($param1 == 'delete'){
			$this->video->delete_video($param2);
			$this->session->set_flashdata('success_message' , get_phrase('video_deleted_successfully'));
		}

		$page_data['page_name']		=	'videos';
		$page_data['page_title']	=	get_phrase('videos');
		$this->load->view('backend/index', $page_data);
	}

	// manage video adding
	function video_add($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

		// For adding videos
		if($param1 == 'add_video'){
			$data['code']          = substr(md5(rand(0, 10000000)), 0, 8);
			$data['source']        = $this->input->post('source');
			if($data['source'] == 1){
				$data['video_file_url']= $this->input->post('embed_url');
				$data['title'] 			   = $this->input->post('title');
				$data['description'] 	 = $this->input->post('description');
				$data['thumbnail'] 	   = $this->input->post('thumbnail');
				$data['duration'] 	   = $this->input->post('duration');
			}
			else if($data['source'] == 2){
				$video_file_url['mp4'] = $this->input->post('video_file_url_mp4');
				$video_file_url['webm']= $this->input->post('video_file_url_webm');
				$video_file_url['ogg'] = $this->input->post('video_file_url_ogg');
				$data['video_file_url']= json_encode($video_file_url);
				$data['title'] 			   = $this->input->post('video_title');
				$data['description'] 	 = $this->input->post('video_description');
				$data['thumbnail'] 	   = $data['code'].'.jpg';
				$data['duration'] 	   = $this->input->post('video_duration');
				move_uploaded_file($_FILES['video_thumbnail']['tmp_name'], 'uploads/video_thumbnail/'.$data['thumbnail']);
				$image_size =  getimagesize('uploads/video_thumbnail/'.$data['thumbnail']);
				// echo 'width: '.$image_size[0];
				// echo 'height: '.$image_size[1];
				// die();

				// image resizing
				$upload_data["full_path"] 	 = base_url('uploads/video_thumbnail/'.$data['thumbnail']);
				$upload_data["file_path"]		 = base_url('uploads/video_thumbnail/');
				$upload_data["file_name"] 	 = $data['thumbnail'];
				$upload_data["image_width"]  = $image_size[0];
				$upload_data["image_height"] = $image_size[1];
				create_thumb($upload_data, 640, 480);
		    // end of image

			}

			$data['category_code'] 	 = $this->input->post('video_category');
			$data['featured'] 	     = $this->input->post('featured');
			$data['within_a_pack'] 	 = $this->input->post('within_a_pack');
			$data['video_pack_code'] = $this->input->post('video_pack');

			$this->db->where('admin_id', $this->session->userdata('login_user_id'));
			$uploader_code 			  = $this->db->get('admin')->row()->code;
			$data['uploader']     = $uploader_code;

			if($data['featured'] != 1)
					$data['featured'] = 0;

			if($data['within_a_pack'] != 1){
				$data['within_a_pack'] = 0;
				$data['video_pack_code'] = '';
			}
			$this->video->add_video($data);
			$this->session->set_flashdata('success_message' , get_phrase('video_added_successfully'));
			redirect(site_url('admin/video_add'));
		}
		if($param1 == 'inside_video_pack'){
			$page_data['default_video_pack']     = $param2;
			$page_data['default_video_category'] = '';
		}
		else if($param1 == 'inside_video_category'){
			$page_data['default_video_category'] = $param2;
			$page_data['default_video_pack']     = '';
		}
		else{
			$page_data['default_video_pack'] = '';
			$page_data['default_video_category'] = '';
		}
		$page_data['page_name']		=	'video_add';
		$page_data['page_title']	=	get_phrase('add_video');
		$this->load->view('backend/index', $page_data);
	}

	// Open Single Video Page
	function single_video_details($param1){
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

		$this->db->where('code', $param1);
		$video_details = $this->db->get('video')->row_array();
		if($video_details['video_pack_code'] == ''){
			$this->db->where('code', $video_details['category_code']);
			$category_title = $this->db->get('category')->row()->title;
			$page_data['category'] = $category_title;
		}
		else{
			$this->db->where('code', $video_details['video_pack_code']);
			$video_pack_title = $this->db->get('video_pack')->row()->title;
			$page_data['video_pack'] = $video_pack_title;
		}
		$page_data['page_name']		=	'single_video_details';
		$page_data['page_title']	=	$video_details['title'];
		$page_data['video_title']	=	$video_details['title'];
		$page_data['video_code']    = $param1;
		$this->load->view('backend/index', $page_data);
	}

	// video pack details
	function show_video_pack_details($param1){
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

		$this->db->where('code', $param1);
		$video_pack_details = $this->db->get('video_pack')->row_array();

		$page_data['searching_string'] = '';
		$page_data['page_name']		    =	'show_video_pack_details';
		$page_data['page_title']	    =	 $video_pack_details['title'];
		$page_data['video_pack_code']	=	 $param1;
		$this->load->view('backend/index', $page_data);
	}
	function searching_by_code(){
		$type 						= $this->input->post('type');
		$page_data['searching_string'] = $this->input->post('searching_string');
		if($type == 'category'){
			$page_data['category_code']	= $this->input->post('code');
			$this->load->view('backend/admin/show_category_details_album', $page_data);
		}
		else if($type == 'video_pack'){
			$page_data['video_pack_code']	= $this->input->post('code');
			$this->load->view('backend/admin/show_video_pack_details_album', $page_data);
		}
	}

	// category details
	function show_category_details($param1){
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

		$this->db->where('code', $param1);
		$category_details = $this->db->get('category')->row_array();

		$page_data['searching_string'] = '';
		$page_data['page_name']		=	'show_category_details';
		$page_data['page_title']	=	 $category_details['title'];
		$page_data['category_code']	=	 $param1;
		$this->load->view('backend/index', $page_data);
	}

	// Manage Video packs
	function video_packs($param1 = '', $param2 = ''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

		if($param1 == 'do_update'){
			$data['code'] = $param2;
			$data['title']= $this->input->post('video_pack_title');
			$data['description']= $this->input->post('video_pack_description');
			$data['category']= $this->input->post('video_category');
			$data['premium']= $this->input->post('premium');
			$data['price']= $this->input->post('video_pack_price');
			$data['featured']= $this->input->post('featured');
			if($data['premium'] != 1){
				$data['premium'] = 0;
				$data['price'] = 0;
			}
			if($data['featured'] != 1){
				$data['featured'] = 0;
			}

			$this->video->update_video_pack($data);
			$video_pack_thumbnail_name = 'video_pack_thumbnail_'.$data['code'];
			$video_pack_banner_name = 'video_pack_banner_'.$data['code'];
			move_uploaded_file($_FILES['video_pack_banner']['tmp_name'], 'uploads/video_pack/' . $video_pack_banner_name . '.jpg');
			move_uploaded_file($_FILES['video_pack_thumbnail']['tmp_name'], 'uploads/video_pack/' . $video_pack_thumbnail_name . '.jpg');
			$this->session->set_flashdata('success_message' , get_phrase('video_pack_updated_successfully'));
			redirect(site_url('admin/video_packs'));
		}

		else if($param1 == 'delete'){
			if (file_exists('uploads/video_pack/video_pack_thumbnail_'.$param2.'.jpg'))
			unlink('uploads/video_pack/video_pack_thumbnail_'.$param2.'.jpg');
		    if (file_exists('uploads/video_pack/video_pack_banner_'.$param2.'.jpg'))
			unlink('uploads/video_pack/video_pack_banner_'.$param2.'.jpg');
			$this->db->where('code', $param2);
			$this->db->delete('video_pack');
			$this->session->set_flashdata('success_message' , get_phrase('video_pack_deleted'));
		}

		$page_data['page_name']		=	'video_packs';
		$page_data['page_title']	=	get_phrase('video pack');
		$this->load->view('backend/index', $page_data);
	}

	// Manage Video packs adding
	function video_pack_add($param1 = ''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

		if($param1 == 'add_video_pack'){
			$data['code']  = substr(md5(rand(0, 10000000)), 0, 8);
			$data['title'] = $this->input->post('video_pack_title');
			$data['description'] = $this->input->post('video_pack_description');
			$data['category'] = $this->input->post('video_category');
			$data['premium'] = $this->input->post('premium');
			$data['price'] = $this->input->post('video_pack_price');
			$data['featured'] = $this->input->post('featured');
			if($data['premium'] != 1){
				$data['premium'] = 0;
				$data['price']   = 0;
			}
			if($data['featured'] != 1){
				$data['featured'] = 0;
			}
			$this->video->video_pack_add($data);
			$video_pack_thumbnail_name = 'video_pack_thumbnail_'.$data['code'];
			$video_pack_banner_name = 'video_pack_banner_'.$data['code'];
			move_uploaded_file($_FILES['video_pack_thumbnail']['tmp_name'], 'uploads/video_pack/' . $video_pack_thumbnail_name . '.jpg');
			move_uploaded_file($_FILES['video_pack_banner']['tmp_name'], 'uploads/video_pack/' . $video_pack_banner_name . '.jpg');
			$this->session->set_flashdata('success_message' , get_phrase('video_pack_added_successfully'));
			redirect(site_url('admin/video_pack_add'));
		}
		$page_data['page_name']	=	'video_pack_add';
		$page_data['page_title']	=	get_phrase('add_video_pack');
		$this->load->view('backend/index', $page_data);
	}

	function get_video_information_from_embed_url($video_id)
	{
		// get video information Array
		$info = $this->youtube->get_video_information($video_id);

		$page_data['info']	=	$info;
		$this->load->view('backend/admin/video_info_from_embed_url', $page_data);
	}

	//  manage video packs
	function video_pack_details($video_pack_id = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));
		$page_data['page_name']	=	'video_pack_details';
		$page_data['page_title']	=	get_phrase('video_pack_details');
		$page_data['video_pack_id']	=	$video_pack_id;
		$this->load->view('backend/index', $page_data);
	}

	function test() {
		print_r($this->youtube->get_video_information('4rkuYhJicjc')) ;
		//echo $this->youtube->get_video_id('https://www.youtube.com/embed/QngozkVH2UE/');
	}

	function video_category($param1 = '', $param2 = ''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

		if($param1 == 'create'){
			$data['code']        = substr(md5(rand(0, 1000000)), 0, 7);
			$data['title'] 		   = $this->input->post('category_title');
			$data['description'] = $this->input->post('category_description');
			$this->pusher->add_category($data);
			$category_banner = 'uploads/category/'.$data['code'].'.jpg';
			move_uploaded_file($_FILES['category_banner']['tmp_name'], $category_banner);
			$this->session->set_flashdata('success_message' , get_phrase('category_added_successfully'));
			redirect(site_url('admin/video_category'));
		}
		if($param1 == 'do_update'){
			$data['code']        = $param2;
			$data['title'] 		   = $this->input->post('category_title');
			$data['description'] = $this->input->post('category_description');
			$this->pusher->update_category($data);
			$category_banner = 'uploads/category/'.$data['code'].'.jpg';
			move_uploaded_file($_FILES['category_banner']['tmp_name'], $category_banner);
			$this->session->set_flashdata('success_message' , get_phrase('category_updated!!'));
			redirect(site_url('admin/video_category'));
		}
		if($param1 == 'delete'){
			if (file_exists('uploads/category/'.$param2.'.jpg'))
			unlink('uploads/category/'.$param2.'.jpg');

			$this->db->where('code', $param2);
			$this->db->delete('category');
			$this->session->set_flashdata('success_message' , get_phrase('category_deleted!!'));
		}
		$page_data['page_name']	=	'video_category';
		$page_data['page_title']	=	get_phrase('video_category');
		$this->load->view('backend/index', $page_data);
	}

	  /*****LANGUAGE SETTINGS*********/
    function manage_language($param1 = '', $param2 = '', $param3 = '')
    {
      if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

		if ($param1 == 'edit_phrase') {
			$page_data['edit_profile'] 	= $param2;
		}
		if ($param1 == 'update_phrase') {
			$language	=	$param2;
			$total_phrase	=	$this->input->post('total_phrase');
			for($i = 1 ; $i < $total_phrase ; $i++)
			{
				//$data[$language]	=	$this->input->post('phrase').$i;
				$this->db->where('phrase_id' , $i);
				$this->db->update('language' , array($language => $this->input->post('phrase'.$i)));
			}
			$this->session->set_flashdata('success_message' , get_phrase('settings_updated'));
			redirect(site_url('admin/manage_language/edit_phrase/').$language, 'refresh');

		}
		if ($param1 == 'do_update') {
			$language        = $this->input->post('language');
			$data[$language] = $this->input->post('phrase');
			$this->db->where('phrase_id', $param2);
			$this->db->update('language', $data);
			$this->session->set_flashdata('success_message' , get_phrase('settings_updated'));
			redirect(site_url('admin/manage_language/'), 'refresh');
		}
		if ($param1 == 'add_phrase') {
			$data['phrase'] = $this->input->post('phrase');
			$this->db->insert('language', $data);
			$this->session->set_flashdata('success_message' , get_phrase('settings_updated'));
			redirect(site_url('admin/manage_language/') , 'refresh');
		}
		if ($param1 == 'add_language') {
			$language = $this->input->post('language');
			$this->load->dbforge();
			$fields = array(
				$language => array(
					'type' => 'LONGTEXT'
				)
			);
			$this->dbforge->add_column('language', $fields);

			$this->session->set_flashdata('success_message' , get_phrase('settings_updated'));
			redirect(site_url('admin/manage_language/'), 'refresh');
		}
		if ($param1 == 'delete_language') {
			$language = $param2;
			$this->load->dbforge();
			$this->dbforge->drop_column('language', $language);
			$this->session->set_flashdata('success_message' , get_phrase('settings_updated'));

			redirect(site_url('admin/manage_language/'), 'refresh');
		}
		$page_data['page_name']        = 'manage_language';
		$page_data['page_title']       = get_phrase('manage_language');
		//$page_data['language_phrases'] = $this->db->get('language')->result_array();
		$this->load->view('backend/index', $page_data);
    }

		// for managing profile
    function manage_profile($param1 = ''){
			if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

			if($param1 == 'do_update'){
				$data['admin_id'] = $this->session->userdata('login_user_id');
				$data['name']     = $this->input->post('name');
				$data['email']    = $this->input->post('email');
				$this->pusher->update_admin_information($data);
				redirect(site_url('admin/manage_profile/'), 'refresh');
			}

			if($param1 == 'change_password'){
				$this->db->where('admin_id', $this->session->userdata('login_user_id'));
				$old_password = $this->db->get('admin')->row()->password;
				$old_password_typed = sha1($this->input->post('old_password'));

				if($old_password != $old_password_typed){
					$this->session->set_flashdata('error_message' , get_phrase('invalid_old_password!!'));
					redirect(site_url('admin/manage_profile/'), 'refresh');
				}

				$new_password = $this->input->post('new_password');
				$confirm_password = $this->input->post('confirm_password');
				if($new_password == $confirm_password){
					$this->pusher->update_admin_password($new_password);
					$this->session->set_flashdata('success_message' , get_phrase('password_updated!!'));
					redirect(site_url('admin/manage_profile/'), 'refresh');
				}
				else{
					$this->session->set_flashdata('error_message' , get_phrase('password_did_not_match!!'));
					redirect(site_url('admin/manage_profile/'), 'refresh');
				}
			}

			if($param1 == 'admin_image'){
				$admin_image = 'uploads/admin_image/'.$this->session->userdata('login_user_id').'.jpg';
				move_uploaded_file($_FILES['admin_image']['tmp_name'], $admin_image);
				$this->session->set_flashdata('success_message' , get_phrase('settings_updated'));
				redirect(site_url('admin/manage_profile/'), 'refresh');
			}

			$page_data['page_name']        = 'manage_profile';
			$page_data['page_title']       = get_phrase('manage_profile');
			$this->load->view('backend/index', $page_data);
    }

		// for basic system settings
		function system_settings($param1 = ''){
			if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

			if($param1 == 'do_update'){
				$data['system_name']          = $this->input->post('system_name');
				$data['system_title']         = $this->input->post('system_title');
				$data['system_email']         = $this->input->post('system_email');
				$data['language']             = $this->input->post('system_language');
				$data['text_align']           = $this->input->post('text_align');
				$data['system_currency_id']   = $this->input->post('system_currency');
				$data['youtube_data_api_key'] = $this->input->post('youtube_data_api_key');
				$this->pusher->system_settings($data);
				$this->session->set_flashdata('success_message' , get_phrase('settings_updated'));
				redirect(site_url('admin/system_settings/'), 'refresh');
			}

			if($param1 == 'logo_upload'){
				$data['logo_name'] = $_FILES['logo']['name'];
				$data['favicon_name'] = $_FILES['favicon']['name'];
				move_uploaded_file($_FILES['logo']['tmp_name'], 'assets/backend/images/'.$data['logo_name']);
				move_uploaded_file($_FILES['favicon']['tmp_name'], 'assets/backend/images/'.$data['favicon_name']);
				$this->pusher->system_logo_upload($data);
				$this->session->set_flashdata('success_message' , get_phrase('settings_updated'));
				redirect(site_url('admin/system_settings/'), 'refresh');
			}

			$page_data['page_name']        = 'system_settings';
			$page_data['page_title']       = get_phrase('system_settings');
			$this->load->view('backend/index', $page_data);
		}

		// for front end settings_updated
		function front_end_settings($param1 = ''){
			if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

			if($param1 == 'update_user_interface'){
				$interface['frontend_theme'] 		 = $this->input->post('theme');
				$interface['theme_color_scheme'] = $this->input->post('color_scheme');
				$this->pusher->user_interface_settings($interface);

				$this->session->set_flashdata('success_message' , get_phrase('user_interface_updated'));
				redirect(site_url('admin/front_end_settings/'), 'refresh');
			}
			else if($param1 == 'home_page_banner'){
				$homepage_banner = 'home';
				move_uploaded_file($_FILES['home_page_banner']['tmp_name'], 'uploads/home_page/'. $homepage_banner . '.jpg');

				$this->session->set_flashdata('success_message' , get_phrase('homepage_banner_updated'));
				redirect(site_url('admin/front_end_settings/'), 'refresh');
			}
			else if($param1 == 'home_page_video'){
				$home_page_video_code = $this->input->post('home_page_video');
				$this->pusher->update_homepage_video($home_page_video_code);

				$this->session->set_flashdata('success_message' , get_phrase('homepage_video_updated'));
				redirect(site_url('admin/front_end_settings/'), 'refresh');
			}

			$page_data['page_name']        = 'front_end_settings';
			$page_data['page_title']       = get_phrase('user_interface');
			$this->load->view('backend/index', $page_data);
		}

		// for payment settings
		function payment_settings($param1 = ''){
			if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

			if($param1 == 'do_update'){
				$payment_information['paypal_email']		   = $this->input->post('paypal_email');
				$payment_information['stripe_publishable_key'] = $this->input->post('stripe_publishable_key');
				$payment_information['stripe_secret_key']      = $this->input->post('stripe_secret_key');

				$this->pusher->payment_settings_update($payment_information);
				$this->session->set_flashdata('success_message' , get_phrase('payment_information_updated'));
				redirect(site_url('admin/payment_settings/'), 'refresh');
			}

			$page_data['page_name']        = 'payment_settings';
			$page_data['page_title']       = get_phrase('payment_settings');
			$this->load->view('backend/index', $page_data);
		}

		function payment_information(){
			if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'));

			if (isset($_POST['date_range'])) {
	           $date_range = $this->input->post('date_range');
	           $date_range = explode(" - ", $date_range);

	           $page_data['timestamp_start']   = strtotime($date_range[0]);
	           $page_data['timestamp_end']     = strtotime($date_range[1]);
	       }
	       else {
	           $page_data['timestamp_start']   = strtotime('-47 years', time());
	           $page_data['timestamp_end']     = strtotime(date('Y-m-d H:i:s'));
	       }

			$page_data['page_name']        = 'payment_information';
			$page_data['page_title']       = get_phrase('payment_information');
			$this->load->view('backend/index', $page_data);
		}

}
