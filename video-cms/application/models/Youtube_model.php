<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Youtube_model extends CI_Model {

  // constructor
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	// parse video id from youtube embed url
	function get_video_id($embed_url = '') {
		preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $embed_url, $match);
		$video_id = $match[1];
		return $video_id;
	}

	// fetch video information from youtube video id
	function get_video_information($video_id = '') {
		// api base url
		$url = 'https://www.googleapis.com/youtube/v3/videos';
		// get api key from system settings
		$api_key = get_settings('youtube_data_api_key');
		// specify the parts that are needed from response_json
		$parts = 'snippet,contentDetails';
		// make a request to youtube api with video id and api key
		$response_json = file_get_contents($url.'?id='.$video_id.'&key='.$api_key.'&part='.$parts);
		$response = json_decode($response_json);
		// keep the data in own associative Array
		$data['title']	=	$response->items[0]->snippet->title;
		$data['description']	=	$response->items[0]->snippet->description;
		if(!isset($response->items[0]->snippet->thumbnails->standard->url)){
			$data['thumbnail']	=	$response->items[0]->snippet->thumbnails->default->url;
		}
		else{
			$data['thumbnail']	=	$response->items[0]->snippet->thumbnails->standard->url;

		}
		//$duration	=	$response->items[0]->contentDetails->duration;
		$duration 			  = new DateInterval($response->items[0]->contentDetails->duration);
		$data['duration'] = $duration->format('%H:%I:%S');
		return $data;
	}
}
