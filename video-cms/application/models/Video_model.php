<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model {

  // constructor
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

  // for adding video
  function add_video($data){
    $data['date_added'] 	 = strtotime(date('Y-m-d H:i:s'));
    $data['last_modified'] = '';
    $data['views']         = 0;
    $data['favourites']    = 0;
    $data['dislikes']      = 0;
    $data['age_rating']    = 0;
    $this->db->insert('video', $data);

		// For adding video id on video_ids in video_pack table
		if($data['video_pack_code'] != ''){
			$this->db->where('code', $data['video_pack_code']);
			$query_result_array = $this->db->get('video_pack')->row_array();

			$this->db->where('code', $data['code']);
			$video_information = $this->db->get('video')->row_array();

			$video_pack_id = $video_information['video_id'].',';
			$video_array   = $query_result_array['video_ids'];
			$new_video_list['video_ids'] = $video_array.$video_pack_id;
			$this->db->where('code', $data['video_pack_code']);
			$this->db->update('video_pack', $new_video_list);
		}

  }

	// Adding video packs
	function video_pack_add($data){
		$data['video_ids']    = '';
		$data['date_added']   = strtotime(date('Y-m-d H:i:s'));
		$data['last_modified']= '';
		$this->db->insert('video_pack', $data);
	}

	// Updating Video Pack
	function update_video_pack($data){
		$code = $data['code'];
		$data['last_modified'] = strtotime(date('Y-m-d H:i:s'));
		$this->db->where('code', $code);
		$this->db->update('video_pack', $data);
	}

	// edit video list on video pack
	function edit_video_list_on_video_pack($data, $previous_video_pack_code){
		if($previous_video_pack_code == $data['video_pack_code']){

		}
		else{
			$video_code = $data['code'];
			$new_video_pack_code = $data['video_pack_code'];
			$this->db->where('code', $video_code);
			$video_id = $this->db->get('video')->row()->video_id;

			$this->db->where('code', $previous_video_pack_code);
			$previous_video_ids = $this->db->get('video_pack')->row_array();
			$previous_video_ids_array = explode(',', $previous_video_ids['video_ids']);
			$size = sizeof($previous_video_ids_array)-1;
			for($i = 0; $i < $size; $i++){
				if($previous_video_ids_array[$i] == $video_id){
					unset($previous_video_ids_array[$i]);
				}
			}
			$this->db->where('code', $new_video_pack_code);
			$new_video_list_array = $this->db->get('video_pack')->row_array();
			$new_video_list['video_ids'] = $new_video_list_array['video_ids'].$video_id.',';

			$previous_video_list['video_ids'] = implode(',', $previous_video_ids_array);
			$this->db->where('code', $previous_video_pack_code);
			$this->db->update('video_pack', $previous_video_list);

			$this->db->where('code', $new_video_pack_code);
			$this->db->update('video_pack', $new_video_list);
		}
	}

	// Update Video information
	function update_video_information($data){
		$this->db->where('code', $data['code']);
		$previous_video_pack_code_array = $this->db->get('video')->row_array();
		$previous_video_pack_code = $previous_video_pack_code_array['video_pack_code'];

		$data['last_modified'] = strtotime(date('Y-m-d H:i:s'));
		$this->db->where('code', $data['code']);
		$this->db->update('video', $data);
		//print_r($data);
		if($data['video_pack_code'] != ''){
			$this->edit_video_list_on_video_pack($data, $previous_video_pack_code);
		}
		if($previous_video_pack_code != '' && $data['within_a_pack'] == 0){
			$video_id = $previous_video_pack_code_array['video_id'];
			$this->delete_video_from_video_list($video_id, $previous_video_pack_code);
		}
	}

	// Deleting video id from video list on video_pack table
	function delete_video_from_video_list($video_id, $video_pack_code){
		$previous_video_code = $video_pack_code;
		$this->db->where('code', $previous_video_code);
		$query_result = $this->db->get('video_pack')->row_array();
		$previous_video_ids = $query_result['video_ids'];

		$previous_video_ids_array = explode(',', $previous_video_ids);
		$size = sizeof($previous_video_ids_array)-1;

		for($i = 0; $i < $size; $i++){
			if($previous_video_ids_array[$i] == $video_id){
				unset($previous_video_ids_array[$i]);
			}
		}
		$previous_video_list['video_ids'] = implode(',', $previous_video_ids_array);

		$this->db->where('code', $previous_video_code);
		$this->db->update('video_pack', $previous_video_list);
	}

	// Deleting video function
	function delete_video($param2){

		$this->db->where('code', $param2);
		$query_result 	 = $this->db->get('video')->row_array();
		$video_id    		 = $query_result['video_id'];
		$video_pack_code = $query_result['video_pack_code'];
		$this->db->where('code', $param2);
		$this->db->delete('video');
		if (file_exists('uploads/video_thumbnail/'.$param2.'.jpg'))
			unlink('uploads/video_thumbnail/'.$param2.'.jpg');
		if($video_pack_code){
			$this->delete_video_from_video_list($video_id, $video_pack_code);
		}
	}

}
