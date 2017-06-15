<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
    if ($this->session->userdata('admin_login') == 1)
      redirect(site_url('admin/dashboard'), 'refresh');
    $this->load->view('backend/login');
  }

  // ajax login function
  function ajax_login()
  {
    $response = array();
    // recieving post input of email, password from ajax request
    $email      = $_POST["email"];
    $password   = $_POST["password"];

    $response['submitted_data'] = $_POST;
    // validating login
    $login_status = $this->validate_login($email, $password);
    $response['login_status'] = $login_status;
    if ($login_status == 'success') {
      $response['redirect_url'] = site_url('login');
    }
    // replying ajax request with validation response
    echo json_encode($response);
  }

  //Validating login from ajax request
  function validate_login($email = '', $password = '')
  {
    $credential = array('email' => $email, 'password' => sha1($password));
    // Checking login credential for admin
    $query = $this->db->get_where('admin', $credential);
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $this->session->set_userdata('admin_login', '1');
      $this->session->set_userdata('login_user_id', $row->admin_id);
      $this->session->set_userdata('name', $row->name);
      $this->session->set_userdata('login_type', 'admin');
      return 'success';
    }
    return 'invalid';
  }

  // loads forgot password view
  function forgot_password()
  {
    $this->load->view('backend/forgot_password');
  }

  // password reset method by ajax
  function ajax_forgot_password()
  {
    $resp = array();
    $resp['status'] = 'false';
    $email = $_POST["email"];
    $reset_account_type = '';
    //resetting user password here
    $new_password = substr(md5(rand(100000000, 20000000000)), 0, 7);
    $new_hashed_password = sha1($new_password);
    // Checking credential for admin
    $query = $this->db->get_where('admin', array('email' => $email));
    if ($query->num_rows() > 0) {
      $reset_account_type = 'admin';
      $this->db->where('email', $email);
      $this->db->update('admin', array('password' => $new_hashed_password));
      $resp['status'] = 'true';
      // send new password to user email
      //$this->email_model->notify_email('password_reset_confirmation', $reset_account_type, $email, $new_password);
    }
    $resp['submitted_data'] = $_POST;
    echo json_encode($resp);
  }

  // logout function
  function logout()
  {
    $this->session->sess_destroy();
    redirect(site_url('login') , 'refresh');
  }

}
