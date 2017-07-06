<?php
class UserCampaigns{
	 
	protected $ci;
	
	public function __construct(){
		
		if( false == isset( $ci->session ) ) {
			
			$this->ci =& get_instance();
			$this->ci->load->library('session');
		}
		 
	}
	
	public function checkUserCampaigns() {

		echo $strClassName 		= $this->ci->router->fetch_class();
		echo $strMethodName		= $this->ci->uri->segment(3);
			
		if( 'view_user_data' == $strMethodName ) {
				
			$this->ci->db->select('table_id, user_id, campaign_id');
			$this->ci->db->from('tbl_users_table');        
		      
			$user_id = $this->session->userdata('user_id'); 
			
			$query = $this->ci->db->get();
			echo '<pre/>';
			print_r( $query->result() );
			echo '<pre/>';
			die;
			
			if( false == empty( $query->result() ) ) {
				foreach( $query->result() as $key => $table ) {
					
					$table_name = $this->fetchTableNameById( $table->table_id );
					
				 	$objDbResult = $this->db->query("
					  SELECT 
					  	c.campaign_id, c.campaign_name, c.campaign_date,c.created_date
					  FROM
					  	 ". $table_name ." dt JOIN tbl_campaigns c ON ( dt.campaign_id = c.campaign_id )
					  WHERE
					  	 dt.user_id = '". $userId."'");
				 	
				 	if( false == empty( $objDbResult->result() ) ) {
				 		$arrUserRecords[] = $objDbResult->result_array();
				 	}
		        } 
			}  
			

		}
		
		die;
			
		
		    
	}

}
?>