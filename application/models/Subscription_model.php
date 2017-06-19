<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Subscription_Model extends CI_Model {
		
		
		public function get_all($table_name) {
			
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
			if($plan_id==''){
				$plan_id =0;
			}
			$query = $this->db->query("SELECT * FROM plan_features where id IN (".$plan_id.")");
			return $query->result();
			
		}
		
		function register_features($new_added_feature) {
			
			$feature_ids=array();
			
			foreach($new_added_feature as $feature){
				
				$feature_id=$this->db->insert('plan_features',array('description'=>$feature));
				
				$insert_id=$this->db->insert_id();
				
				array_push($feature_ids,$insert_id);
				
			}
			
			return $feature_ids;
			
		}
		
		
		
		function update_subscription_details($table_name) {
			
			$this->load->model('common_model');
			$services= $this->common_model->getRecords('services', '*', '', '');
			
			$user_subscribed_services= $this->common_model->getRecords($table_name, 'service_id', array('user_id'=>$this->session->userdata('user_id')), '');
			
			$u_services=array();
			foreach ($user_subscribed_services as $us) {
				array_push($u_services,$us['service_id']);
			}
			
			// echo "<pre>";
			// print_r($services);
			// print_r($this->session->all_userdata());
			// echo die();		
			
			foreach ($services as $service) {
				
				$service_id=$service['service_id'];
				$service_cat=$service['category'];
				
				if ($this->session->userdata($service_cat)) {
					
					
			// echo "<pre>";
			// print_r($u_services);
			// print_r($this->session->all_userdata());
			// echo die();		
			
					$plan_id=$this->session->userdata[$service_cat]['plan_id'];
					
					if(!is_null($plan_id)){
						if (!in_array($service_id, $u_services)) {
							
							$plan_details=$this->db->insert($table_name,array('plan_id'=>$plan_id,'start_date'=>date('Y-m-d'),'end_date'=>date('Y-m-d', strtotime("+30 days")),'user_id'=>$this->session->userdata('user_id'),'service_id'=>$service_id,'is_active'=>'1','created_date'=>date('Y-m-d')));
							
							$insert_id=$this->db->insert_id();
							
							}else{
							
							$update_data=array('plan_id'=>$plan_id,
							'start_date'=>date('Y-m-d'),
							'end_date'=>date('Y-m-d', strtotime("+30 days")),
							'is_active'=>'1',
							'created_date'=>date('Y-m-d'));
							
							$this->db->where('user_id',$this->session->userdata('user_id'));
							$this->db->where('service_id',$service_id);
							$insert_id=$this->db->update($table_name,$update_data);
							
						}
					}
				}
			}
			
			
			// die();
			return $insert_id;
		}
		
		
		
	}
?>
