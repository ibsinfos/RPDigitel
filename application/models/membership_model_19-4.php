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
        
        $query = $this->db->query("SELECT * FROM membership WHERE (username = '" . $this->input->post('username') . "' OR email_address = '" . $this->input->post('username') . "') AND password = '" . $this->hash($this->input->post('password')) . "' AND role='" . $user_role . "'");

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
            // Return the user found
            return $data;
        }
    }

    function create_member() {

        $username = $this->input->post('username');
//      $password = $this->input->post('password');
        $password  = $this->hash($this->input->post('password'));
         
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
				'phone_no' => $this->input->post('phone_number'),
//                'password' => md5($this->input->post('password')),
                'password' => $this->hash($this->input->post('password')),
                'role' => 'user'
            );

            $insert = $this->db->insert('membership', $new_member_insert_data);




            /* Send mail Start */

            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'ranjitp@rebelute.com', // change it to yours
                'smtp_pass' => 'Rebelute@905', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $message = "Hello " . $username . " Welcome to RP Digital your Username :" . $username . " and Password : " . $password . " ";
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('ranjitp@rebelute.com'); // change it to yours
            $this->email->to($send_mail_to); // change it to yours
            $this->email->subject('Welcome to RP Digital');
            $this->email->message($message);

            /*
              if ($this->email->send()) {
              echo 'Email sent.';
              } else {
              show_error($this->email->print_debugger());
              }
             */

            /* Send mail End */

            return $insert;
        }
    }

    public function hash($string) {

        return hash('sha512', $string . config_item('encryption_key'));

    }

    
    function get_database_details($user_id){
        
         $query = $this->db->query("SELECT * FROM database_details WHERE user_id= '" .$user_id. "'");

        if ($query->num_rows == 1) {
            //return true;
            foreach ($query->result() as $db_info) {
                $database_name= $db_info->database_name;
                $advanced= $db_info->advanced;
                $enterprise= $db_info->enterprise;
            }
            
            $this->session->set_userdata('advanced',$advanced);
            $this->session->set_userdata('enterprise',$enterprise);
            $this->session->set_userdata('crm_subscription', 'yes');

            return $database_name;
        } else {
//            $this->session->set_userdata('crm_subscription', 'no');
            return "error";
        }
        
        
    }

}
