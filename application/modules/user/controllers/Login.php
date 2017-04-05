<?php

class Login extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->library('form_validation');
    }

    function index() {
        $data['main_content'] = 'login_form';
        $this->load->view('includes/template', $data);
    }

    function validate_credentials() {
        $this->load->model('membership_model');
        //$username=$this->input->post('username');
        $user = $this->membership_model->get_user_role();
        $query = $this->membership_model->validate_user($user['role']);

        /*
          $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
          $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');


          if ($this->form_validation->run() == FALSE) {
          $this->load->view('login_form');
          } else {
         */

        if ($query) { // if the user's credentials validated...
            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true,
                'role' => $user['role']
            );
            $this->session->set_userdata($data);
            redirect('user/Dashboard/members_area');
        } else { // incorrect username or password
            // $this->index();
            //$data['error_msg']="please enter correct Username and Password";
            //$this->load->view('login_form',$data);
            $this->session->set_userdata('error_msg', 'please enter correct Username and Password');

            //$this->load->view('login_form');

            redirect('user/login/index/');
        }
        // }			
    }

    function signup() {
        $data['main_content'] = 'signup_form';
        $this->load->view('includes/template', $data);
    }

    /*
      //Without AJAX
      function create_member()
      {

      // field name, error message, validation rules
      //$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
      //$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
      $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
      $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
      $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'trim|required|matches[password]');

      if ($this->form_validation->run() == FALSE) {
      $this->load->view('signup_form');
      } else {
      $this->load->model('membership_model');

      if ($query = $this->membership_model->create_member()) {
      //$data['main_content'] = 'signup_successful';
      //	$this->load->view('includes/template', $data);


      $user = $this->membership_model->get_user_role($this->input->post('username'));

      $data = array(
      'username' => $this->input->post('username'),
      'is_logged_in' => true,
      'role' => $user['role']
      );
      $this->session->set_userdata($data);

      redirect('user/Dashboard/members_area');
      } else {
      $this->load->view('signup_form');
      }
      }
      }
     */

    function create_member() {

        // field name, error message, validation rules
        //$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
        //$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {

            echo validation_errors('<p class="error">');
            // $this->load->view('signup_form');
        } else {
            $this->load->model('membership_model');
            $query_result = $this->membership_model->create_member();
            if ($query_result !== TRUE) {

                echo '<p class="error">'.$query_result;

                //$this->load->view('signup_form');
            } else {
                //$data['main_content'] = 'signup_successful';
                //	$this->load->view('includes/template', $data);


                $user = $this->membership_model->get_user_role($this->input->post('username'));

                $data = array(
                    'username' => $this->input->post('username'),
                    'is_logged_in' => true,
                    'role' => $user['role']
                );
                $this->session->set_userdata($data);

                echo 'true';

                //redirect('user/Dashboard/members_area');
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        $this->index();
    }

}
