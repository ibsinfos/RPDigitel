<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  protected $theme;

  // constructor
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->theme = get_settings('frontend_theme');
    
	$this->load->library('session');
	$models	=	array('pusher_model' => 'pusher', 
							'youtube_model' => 'youtube', 
								'video_model' => 'video');
	$this->load->model($models);
  }

  // default function
  public function index() {
    $page_data['page_name']  = 'home';
    $page_data['page_title'] = get_phrase('home');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  // videos
  function videos($category_code = '') {
    $this->db->where('code', $category_code);
    $category_details = $this->db->get('category')->row_array();

    $array = array(
    'category_code' => $category_code,
    'within_a_pack' => 0
    );
    $this->db->where($array);
    $total_rows = $this->db->get('video')->num_rows();
    $config = array();
    $config = pagintaion($total_rows, 9);
    $config['base_url']  = site_url('home/videos/'.$category_code.'/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']   = 'videos';
    $page_data['page_title']  = $category_details['title'];
    $page_data['category_code'] = $category_code;
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }
  function all_videos(){
    $array = array(
    'within_a_pack' => 0
    );
    $this->db->where($array);
    $total_rows = $this->db->get('video')->num_rows();
    $config = array();
    $config = pagintaion($total_rows, 9);
    $config['base_url']  = site_url('home/all_videos/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']   = 'all_videos';
    $page_data['page_title']  = get_phrase('all_videos');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }
  function watch_video($vide_title = '', $video_code = '', $video_type = '') {
    $eligible_for_watch = 0;
    $this->db->where('code', $video_code);
    $video_details = $this->db->get('video')->row_array();
    if($video_details['video_pack_code'] != ''){
      $this->db->where('code', $video_details['video_pack_code']);
      $video_pack_details_array = $this->db->get('video_pack')->row_array();
      $premium = $video_pack_details_array['premium'];
    }
    else{
      $premium = 0;
    }
   if($video_type == 'inside_video_pack'){
      $page_data['video_type'] = 'inside_video_pack';
    }
    else if($video_type == 'inside_category'){
      $page_data['video_type'] = 'inside_category';
    }
    else {
      $page_data['video_type'] = 'single_video';
    }
    if($premium == 1){
      if($this->session->userdata('user_login') != 1)
        redirect('home/login','refresh');
      else{
        $this->db->where('code', $this->session->userdata('code'));
        $user_details = $this->db->get('user')->row_array();
        if($user_details['purchased_video_pack_ids'] == ''){
          $this->session->set_flashdata('error_message', get_phrase('buy_first_for_better_experience'));
          redirect(site_url('home/video_pack_details/'.$video_details['video_pack_code']), 'refresh');
        }
        else{
          $purchased_video_pack_ids_array = explode(',', $user_details['purchased_video_pack_ids']);
          for($i = 0; $i < sizeof($purchased_video_pack_ids_array) - 1; $i++){
            if($purchased_video_pack_ids_array[$i] == $video_pack_details_array['video_pack_id']){
              $eligible_for_watch++;
            }
          }
          if($eligible_for_watch == 0){
            $this->session->set_flashdata('error_message', get_phrase('buy_first_for_better_experience'));
            redirect(site_url('home/video_pack_details/'.$video_details['video_pack_code']), 'refresh');
          }
          else if($eligible_for_watch == 1){
            $page_data['page_name']       = 'video_watch';
            $page_data['item_type']       = 'video';
            $page_data['video_code']      = $video_code;
            $page_data['page_title']  = get_phrase('watch');
            $this->load->view('frontend/'.$this->theme.'/index', $page_data);
          }
        }
      }
    }
  else{
      $page_data['page_name']       = 'video_watch';
      $page_data['item_type']       = 'video';
      $page_data['video_code']      = $video_code;
      $page_data['page_title']      = $video_details['title'];
      $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }
  }

  // video packs
  function video_pack() {
    $total_rows = $this->db->get('video_pack')->num_rows();
    $config = array();
    $config = pagintaion($total_rows, 9);
    $config['base_url']  = site_url('home/video_pack/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']   = 'video_pack';
    $page_data['page_title']  = get_phrase('video_packs');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function video_pack_details($video_pack_code = '') {
    $this->db->where('video_pack_code', $video_pack_code);
    $total_rows = $this->db->get('video')->num_rows();
    $config = array();
    $config = pagintaion($total_rows, 5);
    $config['base_url']  = site_url('home/video_pack_details/'.$video_pack_code.'/');
    $this->pagination->initialize($config);

    $page_data['per_page_item']    = $config['per_page'];
    $page_data['item_type']        = 'video_pack';
    $page_data['page_name']        = 'video_pack_details';
    $page_data['page_title']       = get_phrase('video_pack_details');
    $page_data['video_pack_code']  = $video_pack_code;
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  // login/signup page
  function register($param1 = '') {
    if ($param1 == 'add_user') {
      $new_user_credential = array(
        'code'     => substr(md5(rand(0, 10000000)), 0, 7),
        'name'     => $this->input->post('user_name'),
        'email'    => $this->input->post('user_email'),
        'password' => sha1($this->input->post('user_password'))
      );
      $duplication = email_validation_on_create($new_user_credential['email']);
      if($duplication == 0){
        $this->session->set_flashdata('error_message', get_phrase('this_email_id_is_not_available'));
        redirect(site_url('home/register'), 'refresh');
      }
      else if($duplication == 1){
        $this->pusher->user_register($new_user_credential);
        $this->session->set_flashdata('success_message', get_phrase('user_created'));
        redirect(site_url('home/login'), 'refresh');
      }

    }
    $page_data['page_name']  = 'register';
    $page_data['page_title'] = get_phrase('register');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function login() {
    if ($this->session->userdata('user_login') == 1)
			redirect(site_url('home'), 'refresh');

    $page_data['page_name']  = 'login';
    $page_data['page_title'] = get_phrase('login');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function varify_user(){
    $user_credential = array(
      'email'    => $this->input->get_post('email'),
      'password' => sha1($this->input->get_post('password'))
    );

    $validation_message = $this->pusher->varify_logged_in_user($user_credential);
    if($validation_message == 1){
      $this->db->where($user_credential);
      $user_details = $this->db->get('user')->row_array();
      $this->session->set_userdata('user_login', 1);
      $this->session->set_userdata($user_details);

      $this->session->set_flashdata('success_message', get_phrase('welcome_back'));
      redirect(site_url('home'), 'refresh');
    }
    else if($validation_message == 0){
      $this->session->set_flashdata('error_message', get_phrase('user_credential_didnt_match'));

      $page_data['page_name']  = 'login';
      $page_data['page_title'] = get_phrase('login');
      $this->load->view('frontend/'.$this->theme.'/index', $page_data);
    }
  }

  // profile page
  function profile() {
    if ($this->session->userdata('user_login') != 1)
			redirect(site_url('home/login'), 'refresh');

    $page_data['page_name']  = 'profile';
    $page_data['page_title'] = get_phrase('profile');
    $page_data['user_id']    = $this->session->userdata('login_user_id');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  // Manage user profile
  function user_profile_settings($param1 = ''){
    if ($this->session->userdata('user_login') != 1)
			redirect(site_url('home'), 'refresh');

    if($param1 == 'profile_info'){
      $user_info = array(
        'name'    => $this->input->get_post('user_name'),
        'email'   => $this->input->get_post('user_email'),
        'phone'   => $this->input->get_post('user_phone'),
        'address' => $this->input->get_post('user_address')
      );
      move_uploaded_file($_FILES["user_image"]['tmp_name'], 'uploads/user_image/'.$this->session->userdata('user_id').'.jpg');
  }
  else if($param1 == 'change_password'){
    $old_password     = sha1($this->input->get_post('old_password'));
    $new_password     = sha1($this->input->get_post('new_password'));
    $confirm_password = sha1($this->input->get_post('confirm_password'));
    if($old_password == $this->session->userdata('password') && $new_password == $confirm_password){
      $user_info = array(
        'password' => $new_password
      );
    }
    else{
      $this->session->set_flashdata('error_message', get_phrase('you_entered_wrong_password'));
			redirect(site_url('home/profile'), 'refresh');
    }
  }
  $duplication_check = $this->pusher->update_user_information($user_info);

  if($duplication_check == 1){
    $this->session->set_flashdata('error_message', get_phrase('this_email_id_is_not_available'));
    redirect(site_url('home/profile'), 'refresh');
  }
  if($duplication_check == 0){
    $this->session->set_flashdata('success_message', get_phrase('user_information_updated'));
    redirect(site_url('home/profile'), 'refresh');
  }
  }

  // search page
  function search($key = '') {
    $key = $this->input->get_post('search_string');
    $page_data['page_name']   = 'search';
    $page_data['page_title']  = get_phrase('search_results');
    $page_data['key']         = $key;
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  // like dislike and favorite videos
  function reaction(){
    if ($this->session->userdata('user_login') != 1){
      echo 'login';
      die();
    }
    $data['reaction']   =  $this->input->post('reaction');
    $data['video_code'] =  $this->input->post('video_code');
    $react_info = $this->pusher->reaction_generator($data);
    //echo $react_info;
  }

  // Post comments
  function post_comment(){
    $item_type              = $this->input->post('item_type');
    $data['comment']        = $this->input->post('comment');
    $data['commented_item'] = $this->input->post('item_code');
    $data['commented_user'] = $this->input->post('user_code');
    $this->pusher->post_comment($data);
    if($item_type == 'video'){
      $data2['video_code'] = $data['commented_item'];
      $data2['item_type']  = $item_type;
    }
    else{
      $data2['video_pack_code'] = $data['commented_item'];
      $data2['item_type']       = $item_type;
    }
    $this->load->view('frontend/'.$this->theme.'/comment_section.php', $data2);
  }

  // paypal transaction status checking
  function paypal_transaction_check($video_pack_code = '', $transaction = ''){
    if ($this->session->userdata('user_login') != 1)
      redirect(site_url('home'), 'refresh');

    if($transaction == 'payment_cancel'){ // checking the purchase status starts
      $this->session->set_flashdata('error_message', get_phrase('payment_cancel'));
      redirect(site_url('home/video_pack_details/'.$video_pack_code), 'refresh');
    }
    else if($transaction == 'payment_success'){
      $this->db->where('code', $video_pack_code);
      $video_pack_id = $this->db->get('video_pack')->row()->video_pack_id;
      $this->db->where('code', $this->session->userdata('code'));
      $user_info = $this->db->get('user')->row_array();
      $new_purchased_video_pack = $user_info['purchased_video_pack_ids'].$video_pack_id.',';
      $data = array(
        'purchased_video_pack_ids' => $new_purchased_video_pack
      );
      $this->db->where('code', $this->session->userdata('code'));
      $this->db->update('user', $data);

      //create new payment entry
      $this->db->where('code', $video_pack_code);
      $video_pack_details_array = $this->db->get('video_pack')->row_array();
      $data2['code']  =   substr(md5(rand(0, 1000000)), 0, 7);
      $data2['video_pack_id']  =   $video_pack_details_array['video_pack_id'];
      $data2['price']         =   $video_pack_details_array['price'];
      $data2['buyer_code']          =   $this->session->userdata('code');
      $data2['payment_method'] =   'paypal';
      $data2['date_added']     =   strtotime(date('Y-m-d H:i:s'));
      $this->db->insert('payment', $data2);

      $this->session->set_flashdata('success_message', get_phrase('payment_success'));
      redirect(site_url('home/video_pack_details/'.$video_pack_code), 'refresh');
    }
  }

  function most_recent_videos(){
    $config = array();
    $this->db->order_by('video_id', 'DESC');
    $this->db->limit(27);
    $array = array(
      'within_a_pack' => 0
    );
    $this->db->where($array);
    $total_rows = $this->db->get('video')->num_rows();
    $config = pagintaion($total_rows, 9);
    $config['base_url']  = site_url('home/most_recent_videos/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'most_recent_videos';
    $page_data['page_title'] = get_phrase('most_recent_videos');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }
  function most_watched_videos(){
    $config = array();
    $this->db->order_by('views', 'DESC');
    $this->db->limit(27);
    $array = array(
      'within_a_pack' => 0
    );
    $this->db->where($array);
    $total_rows = $this->db->get('video')->num_rows();
    $config = pagintaion($total_rows, 9);
    $config['base_url']  = site_url('home/most_watched_videos/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'most_watched_videos';
    $page_data['page_title'] = get_phrase('most_watched_videos');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  // logout function
  function logout()
  {
    $this->session->sess_destroy();
    redirect(site_url('home') , 'refresh');
  }
}
