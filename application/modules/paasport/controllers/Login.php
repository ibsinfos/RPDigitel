<?php

class Login extends CI_Controller {
	
	function index()
	{
        $this->template->set_theme('default_theme');
        $this->template->set_layout('frontend')
                ->title('Pasasport | Login')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('paasport-login');
	}
        
	
        
	function validate_credentials()
	{		
		$this->load->model('membership_model');
                
		$user= $this->membership_model->get_user_role($this->input->post('username'));
                
		$query = $this->membership_model->validate($user['role']);
		
		if($query) // if the user's credentials validated...
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true,
                                'role'=>$user['role']
			);
			$this->session->set_userdata($data);
			redirect('Admin/Dashboard');
		}
		else // incorrect username or password
		{
			$this->index();
		}
	}	
	/*
	function signup()
	{
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}
	
	function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup_form');
		}
		
		else
		{			
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->create_member())
			{
				$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);
			}
			else
			{
				$this->load->view('signup_form');			
			}
		}
		
	}
	*/
	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

}