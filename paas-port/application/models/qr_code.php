

<?php
	
	class Qr_code extends CI_Model {
		
		
		function generate_qr_code($qrcode_details) {
			
			$ins_user_qrcode = $this->db->insert('user_qrcode', $qrcode_details);
			
		}
		/*
		function get_qr_code($user_id) {
			
			$this->db->select('qr_code,ext');
            $this->db->from('user_qrcode');
			$this->db->where('id', $user_id);
            return $this->db->get()->result();
			
			$query = $this->db->query("SELECT qr_code,ext FROM user_qrcode WHERE id = '" . $user_id . "'");
			
			if ($query->num_rows == 1) {
				//return true;
				foreach ($query->result() as $user_info) {
					$username = $user_info->qr_code;
				}
				return $username;
			}
			
			
		}
		*/
		
	}
	
?>