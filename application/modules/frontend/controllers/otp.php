<?php
	
	class otp extends CI_Controller {
		
		function __construct() {
			
			parent::__construct();
			
			$this->load->config('twilio', TRUE);
			$this->number = $this->config->item('number', 'twilio');
		}
		
		function index() {
			
			
			$data['main_content'] = 'otp_form';
			$this->load->view('includes/template', $data);
		}

		function verify_otp(){
						
			$condition=array('username'=>$this->session->userdata('username'),'otp'=>$this->input->post('input_otp'));
			$this->db->from('membership');
			$this->db->where($condition);
			
			$sel_user = $this->db->get();
			
			if ( $sel_user->num_rows() > 0 )
			{
				$session_data=array('is_logged_in' => true);
				$this->session->set_userdata($session_data);
				
				echo 'true';
				}else{
				echo 'please enter correct otp';
			}
		}
		
			
		
		
	}
	
?>
