<?php
	
	class Membership_model extends CI_Model {
		
		function validate_user($user_role) {
			
			/*
				$this->db->where('username', $this->input->post('username'));
				$this->db->or_where('email_address', $this->input->post('username'));
				$this->db->where('password', md5($this->input->post('password')));
				$this->db->where('role', $user_role);
				$query = $this->db->get('membership');
			*/
			
			$query = $this->db->query("SELECT * FROM membership WHERE (username = '" . $this->input->post('username') . "' OR email_address = '" . $this->input->post('username') . "') AND password = '" . $this->hash($this->input->post('password')) . "' AND role='" . $user_role . "' AND verified=1");
			
			if ($query->num_rows == 1) {
				//return true;
				foreach ($query->result() as $user_info) {
					$username = $user_info->username;
				}
				return $username;
				} else {
				//$error_msg = 'Please Enter valid Username and Password';
				return "error";
			}
		}
		
		function get_user_role() {
			$this->db->where('username', $this->input->post('username'));
			$this->db->or_where('email_address', $this->input->post('username'));
			$this->db->where('password', md5($this->input->post('password')));
			$query = $this->db->get('membership');
			
			if ($query->num_rows() > 0) {
				// Get the last row if there are more than one
				$row = $query->last_row();
				// Assign the row to our return array
				$data['user_id'] = $row->user_id;
				$data['role'] = $row->role;
				$data['first_name'] = $row->first_name;
				$data['last_name'] = $row->last_name;
				$data['email_address'] = $row->email_address;
				$data['crm_db_id'] = $row->crm_db_id;
				$data['paasport_user_id'] = $row->paasport_user_id;
				$data['phone_no'] = $row->phone_no;
				$data['two_way_authentication'] = $row->two_way_authentication;
				$data['role_id'] = $row->role_id;
				$data['purchase_pack'] = $row->purchase_pack;
				$data['last_loggedin'] = $row->last_loggedin;
				// Return the user found
				return $data;
			}
		}
		
		function create_member() {
			
			$username = $this->input->post('username');
			//      $password = $this->input->post('password');
			$password = $this->hash($this->input->post('password'));
			
			$country= $this->input->post('country');
			$phone_number= $this->input->post('phone_number');
			$phone_number_with_country_code= "+".$country.$phone_number;

			
			$send_mail_to = $this->input->post('email_address');
			
			$this->db->where('username', $username);
			$chk_uname = $this->db->get('membership');
			//$this->db->or_where('email_address',$send_mail_to);
			
			
			$this->db->where('email_address', $send_mail_to);
			$chk_email = $this->db->get('membership');
			
			if ($chk_uname->num_rows() > 0) {
				//$this->session->set_userdata('error_msg', 'This Username already in use');
				
				$error_msg = 'This Username already in use';
				return $error_msg;
				} else if ($chk_email->num_rows() > 0) {
				//  $this->session->set_userdata('error_msg', 'This Email already in use');
				
				$error_msg = 'This Email already in use';
				return $error_msg;
				} else {
				
				$new_member_insert_data = array(
                //'first_name' => $this->input->post('first_name'),
                //'last_name' => $this->input->post('last_name'),
                'email_address' => $this->input->post('email_address'),
                'username' => $this->input->post('username'),
                'phone_no' => $phone_number_with_country_code,
				//                'password' => md5($this->input->post('password')),
                'password' => $this->hash($this->input->post('password')),
                'role' => 'user'
				);
				
				$insert = $this->db->insert('membership', $new_member_insert_data);
				$membership_user_id=$this->db->insert_id();
				
				
			
				
				
				/*             * **************** Insert into novaecard.users table Start***************************** */
				/*$VC_DB_SRC_HOST = 'localhost';
					$VC_DB_SRC_USER = 'root';
					$VC_DB_SRC_PASS = '';
					$VC_DB_SRC_NAME = 'novaevcard';
				*/
				//*                 * ********************* INSERT **********************
				/*          $vc_con = new mysqli($VC_DB_SRC_HOST, $VC_DB_SRC_USER, $VC_DB_SRC_PASS) or die($vc_con->error);
					mysqli_select_db($vc_con, $VC_DB_SRC_NAME) or die($vc_con->error);
				*/
				/*
					$vc_email_address =$this->input->post('email_address');
					$vc_username =$this->input->post('username');
					$vc_phone_no =$this->input->post('phone_no');
					$vc_password=$this->input->post('password');
					
					$ins_user_query = "INSERT INTO tbl_users (first_name, last_name, email, password, mobile, created_time, role_id, user_status, vcard_complete_status, plan_id) VALUES ('".$vc_username."', '', '".$vc_email_address."', '".$vc_password."', '".$vc_phone_no."','".date('Y-m-d H:i:s', time())."','0', '1', '0', 'monthly')";
					
					$result = mysqli_query($vc_con, $ins_user_query) or die($vc_con->error);
				*/          
				
				$new_vcuser_insert_data = array(
                'email' => $this->input->post('email_address'),
                'first_name' => $this->input->post('username'),
                // 'mobile' => $this->input->post('phone_number'),
                'mobile' => $phone_number_with_country_code,
                'verified' =>'1',
                'email_verify' =>'1',
                'password' => $this->hash($this->input->post('password'))
				);
				
				$insert_vc_user = $this->db->insert('tbl_users', $new_vcuser_insert_data);
				$paasport_user_id=$this->db->insert_id();
				$paasport_user_data = array('paasport_user_id' => $paasport_user_id);
				
				//Code to update paasport_user_id value in rpdigitel.membership table
				$this->db->where('user_id', $membership_user_id);
				$this->db->update('membership', $paasport_user_data);
				
				/*             * **************** Insert into novaecard.users table End***************************** */
				
				/* start add user map entry in tbl_users_map */
				$this->create_user_map($membership_user_id);
				/* end add user map entry in tbl_users_map */
				
				/* Send mail Start */
				
				$config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'rpdigitel@gmail.com', // change it to yours
                'smtp_pass' => 'Rebelute@905', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
				);
				
				$message = "Hello " . $username . ", <br /> <br /> &nbsp;&nbsp;&nbsp;&nbsp; Welcome to RP Digital. <br /><br /> &nbsp;&nbsp;&nbsp;&nbsp; Please click on below link to verify your account : <br><br> &nbsp;&nbsp;&nbsp;&nbsp;" . base_url() . "user/login/verification/".urlencode($this->input->post('email_address'))." <br><br> Thanks & Regards, <br> RPDigitel Team";
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('rpdigitel@gmail.com'); // change it to yours
				$this->email->to($send_mail_to); // change it to yours
				$this->email->subject('Welcome to RP Digital');
				$this->email->message($message);
				
				
				
				if ($this->email->send()) {
					//  echo 'Email sent.';
					} else {
					show_error($this->email->print_debugger());
				}
				
				
				/* Send mail End */
				
				return $insert;
			}
		}
		public function create_user_map($user_id=null)
		{
			
			$menuid = $this->db->get('tbl_menu')->result_array();
			if($menuid)
			{
				foreach($menuid as $m)
				{
					$ins_arr=array();
					$ins_arr['user_id']=$user_id;
					$ins_arr['menu_id']=$m['id'];				
					$insert_vc_user = $this->db->insert('tbl_user_map',$ins_arr); 
				}
			}
		}
		public function hash($string) {
			
			return hash('sha512', $string . config_item('encryption_key'));
		}
		
		function get_database_details($crm_db_id) {
			
			$query = $this->db->query("SELECT * FROM database_details WHERE id= '" . $crm_db_id . "'");
			
			if ($query->num_rows == 1) {
				//return true;
				foreach ($query->result() as $db_info) {
					$user_id = $db_info->user_id;
					$database_name = $db_info->database_name;
					$advanced = $db_info->advanced;
					$enterprise = $db_info->enterprise;
					$max_allowed_users = $db_info->max_allowed_users;
					$no_of_registered_users = $db_info->no_of_registered_users;
				}
				
				$this->session->set_userdata('advanced', $advanced);
				$this->session->set_userdata('enterprise', $enterprise);
				$this->session->set_userdata('crm_subscription', 'yes');
				$_SESSION['crm_subscription']='yes';
				/* To check whether free trial period completed or not Start*/
				
				if($advanced=='0' && $enterprise=='0'){
					//User is registered with free trial
					$service_id=1;//Becoz we have set service id =1 for crm
					$member_service_remaining_days=$this->member_service_remaining_days($user_id,$service_id);
					// if($member_service_remaining_days<0){
						$this->session->set_userdata('member_service_remaining_days',$member_service_remaining_days);
						$_SESSION['member_service_remaining_days']=$member_service_remaining_days;
						// }
				}
				else
				{
					$_SESSION['member_service_remaining_days']=1;
				}
				
				/* To check whether free trial period completed or not End*/
				
				//    $this->session->set_userdata('max_allowed_users',$max_allowed_users);
				//    $this->session->set_userdata('no_of_registered_users',$no_of_registered_users);
				
				if (!isset($_SESSION)) {
					session_start();
				}
				//$_SESSION['no_of_registered_users']=$no_of_registered_users;
				//$_SESSION['max_allowed_users']=$max_allowed_users;
				
				return $database_name;
				} else {
				//            $this->session->set_userdata('crm_subscription', 'no');
				return "error";
			}
		}
		
		
		//To send SMS using Twilio library Start
		
		public function twilioSms($from, $to, $msg) {
			
			$this->load->library('twilio');
			
			$response = $this->twilio->sms($from, $to, $msg);
			
			if ($response->IsError)
			
            return $response->ErrorMessage;
			
			else
			
            return true;
			
		}
		
		//To send SMS using Twilio library End
		
		//To Update SMS otp at rpdigitel.membership Start
		
		function update_otp($otp){
			
			$update_data=array('otp'=>$otp);
			$this->db->where('username',$this->session->userdata('username'));
			$q=$this->db->update('membership',$update_data);
			
		}
		
		//To Update SMS otp at rpdigitel.membership End
		
		
		
		/* To get any service free trial remaining days Start*/
		
		function member_service_remaining_days($user_id,$service_id){
			
			$query_service=$this->db->query("select datediff(`free_trial_end_date`,now()) as remaining_days from member_services where user_id='".$user_id."' and service_id='".$service_id."'");
			
			$row=$query_service->row();
			
			return $row->remaining_days;
			
		}
		/* To get any service free trial remaining days End*/
		
		
		public function get_paasport_slug($id=null)
		{
			$this->db->where('user_id',$id);
			$query = $this->db->get('tbl_vcard_basic');
			if ($query->num_rows() > 0) 
			{
				$row =  $query->first_row();
				
				return $row->slug;				
			}	
		}
		public function update_lastlogged_in($id=null)
		{
			$update_data=array('last_loggedin'=>date('Y-m-d h:i:s'));
			$this->db->where('user_id',$id);
			$q=$this->db->update('membership',$update_data);
			
		}
		public function update_verification($email){
			
			if(!empty($email))
			{
				$update_data=array('verified'=>1);
				$this->db->where('email_address',$email);
				$q=$this->db->update('membership',$update_data);
				return $q;
			}	
			
		}
		
		function get_user_details($user_id) {
			$this->db->where('user_id', $user_id);
			// $this->db->or_where('email_address', $this->input->post('username'));
			// $this->db->where('password', md5($this->input->post('password')));
			$query = $this->db->get('membership');
			
			if ($query->num_rows() > 0) {
				// Get the last row if there are more than one
				$row = $query->last_row();
				// Assign the row to our return array
				$data['user_id'] = $row->user_id;
				$data['role'] = $row->role;
				$data['first_name'] = $row->first_name;
				$data['last_name'] = $row->last_name;
				$data['email_address'] = $row->email_address;
				$data['crm_db_id'] = $row->crm_db_id;
				$data['paasport_user_id'] = $row->paasport_user_id;
				$data['phone_no'] = $row->phone_no;
				$data['two_way_authentication'] = $row->two_way_authentication;
				$data['role_id'] = $row->role_id;
				$data['purchase_pack'] = $row->purchase_pack;
				$data['last_loggedin'] = $row->last_loggedin;
				// Return the user found
				return $data;
			}
		}
		
		
		}
	
?>
