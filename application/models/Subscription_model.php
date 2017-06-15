<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Subscription_Model extends CI_Model {
		
		
		function get_all($table_name) {
			
			$query = $this->db->query("SELECT * FROM ".$table_name);
			
			return $query->result();
			
		}
		
		function get_service_details($service_id) {
			
			$query = $this->db->query("SELECT p.* FROM services s, services_plan_mapping spm,member_services_plans p WHERE s.service_id=spm.service_id and p.id=spm.plan_id and spm.service_id='$service_id'");
			
			return $query->result();
			
		}
		
		
		function get_plan_list() {
			
			$query = $this->db->query("SELECT * FROM member_services_plans");
			
			return $query->result();
			
		}
		
		function get_plan_details($plan_id) {
			
			$query = $this->db->query("SELECT * FROM member_services_plans where id='$plan_id'");
			
			return $query->result();
			
		}
		
		function get_features_list() {
			
			$query = $this->db->query("SELECT * FROM plan_features");
			
			return $query->result();
			
		}
		
		
		function get_plan_features_list($plan_id) {
			
			$query = $this->db->query("SELECT * FROM plan_features where id IN (".$plan_id.")");
			
			return $query->result();
			
		}
		
		
	}
?>
