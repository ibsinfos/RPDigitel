<?php



/**

 * Description of Project_Model

 *

 * @author NaYeM

 */

class data_model extends MY_Model {



    public $_table_name;

    public $_order_by;

    public $_primary_key;
	
	
	
	public function save_campaignModel($post)
	{
		$name = addslashes($post['campain_name']);
		$date = $post['date'];
		
		$data =array("campaign_name"=>$name,
		             "campaign_date"=>$date
					);
					
		$data['created_by'] = $this->session->userdata('user_id');
		$this->db->insert('tbl_campaigns',$data);
		 
        //echo $this->db->last_query();die;
        $insert_id = $this->db->insert_id();

        if($insert_id!="")
		{
			return true;
		}
        else
        {
			return false;
		}
	}
	
	public function save_lead( $formatId, $campaignId, $recordId, $leadId )
	{
		$table_name = $this->fetchTableNameById( $formatId );
		$update = array( "leads_id" => $leadId );
		
		$this->db->where("campaign_id", $campaignId );
		$this->db->where("id", $recordId );
		
		return $this->db->update( $table_name ,$update);
        
	}
	
	function check_user_id( $data ){
		
	
		$table_name = $this->fetchTableNameById( $data['table_id']);
		
		$this->db->where('user_id',$data['user_id']);
		$this->db->where('table_id',$data['table_id']);
	    $query = $this->db->get('tbl_users_table');
	   
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}
	
	function check_user_exists( $user_id, $campaign_id, $table_name ){
		
		$this->db->where('user_id',$user_id);
		$this->db->where('campaign_id',$campaign_id);
	    $query = $this->db->get( $table_name );
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}
	
	function save_user_table( $userId, $tableId ) {
		
		$data = array("table_id"	=> $tableId,
		             "user_id"	=> $userId
					);
					
		if( true == $this->check_user_id( $data ) ){
			return true;
		} else {
			 $this->db->insert('tbl_users_table',$data);
			 return true;
		}
	}
	
	function save_user_data( $id, $formatId, $campaignId, $value ) {
		
		$table_name = $this->fetchTableNameById( $formatId );
		$update = array("comments"=> $value);
		$this->db->where("id", $id );
		$this->db->where("campaign_id", $campaignId );
		
     	return $this->db->update( $table_name ,$update);
		
	}
	
	public function save_column($post, $format ) {
		
		$table_name = $format->table_name;
		
		if( true == is_array( $post ) ) {
			//$column = $post['column_name'];
			foreach($post['column_name'] as $column){
				if( $column !="" ) {
					$fields1 = array( strtolower(str_replace(' ', '_',  preg_replace('/\s+/', ' ',trim( $column )) )) => array('type' => 'VARCHAR','constraint' => '100'));
					$this->dbforge->add_column($table_name, $fields1);
				}
			}
	    	
	    	return true;
		} else {
			return false;
		}
    	

	}
	
	public function save_camapign_data($post)
	{
		 $table = trim( $post['table_name'] );
		 $table_name 	= strtolower( preg_replace('/\s/', ' ', $table ) );
      	 $table_name    = str_replace( ' ','_', $table_name );
		 $table_name 	= 'tbl_' . $table_name;
		 $data = array( 
						"table_name"=>$table_name,
						"user"=>$this->session->userdata('user_id')
					);

					
	    $this->db->insert('tbl_campaign_formats',$data);
        $this->dbforge->add_field('id');
        $is_table_created = $this->dbforge->create_table($table_name, TRUE);
		 
		if( TRUE == $is_table_created ){
				$fields = array(
					'campaign_id' => array( 'type' => 'INT', 'constraint' => 11 ),
					'user_id' => array( 'type' => 'INT', 'constraint' => 11, 'default' => '0' )
				);
				$this->dbforge->add_column($table_name, $fields);
					
				foreach($post['column_name'] as $column){
					if( $column !="" ) {
						
						$column = strtolower(str_replace(' ', '_', trim( $column ) ));
						if( 'comments' != $column ) {
							$fields1 = array( $column => array('type' => 'VARCHAR','constraint' => '200','null' => TRUE
							));
						}	
						$this->dbforge->add_column($table_name, $fields1);
						
					}
    			}
    			
    			$commentsFields = array(
					'comments' => array( 'type' => 'VARCHAR','constraint' => '200','null' => TRUE
    			 ),
    				'leads_id' => array( 'type' => 'INT', 'constraint' => 11, 'default' => '0' )
				);
				$this->dbforge->add_column($table_name, $commentsFields);
      }
      return $is_table_created;
		
	}
	
	public function save_camapign_user_data($post, $campaign_id,$table_name ){
		
		
		if( true == isset( $post['user_id'] ) && false == empty( $post['user_id'] )) {
			$user_id = $post['user_id'];
			if( 'unallocate' != $post['allocate_id'] && 'allocate' != $post['allocate_id'] ) {
				
				$update = array("user_id"=> $user_id);
				$this->db->where("id", $post['allocate_id'] );
				$this->db->update( $table_name ,$update);
					
			} else {
				
				foreach($post['selected_id'] as $value){
						
					$update = array("user_id"=> $user_id);
					$this->db->where("id", $value );
					$this->db->update( $table_name ,$update);
				}
			}
		} else {	
			
			foreach($post['selected_id'] as $value){
					
				$update = array("user_id"=> 0);
				$this->db->where("id", $value );
				$this->db->update( $table_name ,$update);
			}
		}
      	return true;
	}
	
	public function remove_user_data($post, $campaign_id,$table_name ){
		
		foreach($post['selected_id'] as $value){
				
			$update = array("user_id"=> 0);
			$this->db->where("id", $value );
			$this->db->update( $table_name ,$update);
		}
		
		if( true == $this->check_user_exists( $post['user_id'], $campaign_id, $table_name ) ){
			return true;
		} else {
				$this->db->where('user_id',$post['user_id'] );
				$this->db->where('campaign_id', $campaign_id );
				$this->db->update($table_name);
		}
      	return true;
	}
	
	public function delete_campaignModel($id)
	{
		$this->db->where('campaign_id',$id);
		$this->db->delete('tbl_campaigns');
		return true;
	}
	
	public function delete_format_column($table_name, $column )
	{
		$this->dbforge->drop_column($table_name, $column);
		return true;
	}
	
	public function edit_format_column($table_name,$old_column_name, $column )
	{
		
		$this->db->query("ALTER TABLE ". $this->db->database.".$table_name CHANGE $old_column_name $column varchar (200)");
				
		return true;
	}
	
	public function setFlagToUpdatedModel($campaign_id)
	{
		$update = array("campaign_id"=>$campaign_id);
		$this->db->where("data_added",1);
		$this->db->update('tbl_campaigns',$update);
		return true;
	}
	
	public function getDataFormats( $format_id = NULL )
	{
		if( false == is_null( $format_id )){ $this->db->where("id", $format_id ); }
		
		$query = $this->db->get('tbl_campaign_formats');
		
		 if ( false == is_null( $format_id )) {
		 	return $query->row();
		 } else {
		 	return $query->result();
		 }
		
	}
	
	public function fetchColumnNamesByTableName( $table_name )
	{
		$arrColumnInfo = array();
		 $objDbResult = $this->db->query("select COLUMN_NAME 
			from information_schema.columns 
			where table_schema =  
 '". $this->db->database."' 
			and table_name = '$table_name'");
       
       		if( true == is_object(  $objDbResult ) ) {
			foreach ( $objDbResult->result() as $row ) {
	            		$arrColumnInfo[]=$row->COLUMN_NAME;
	        	}
	       } 	
       	       return $arrColumnInfo;
		
	}
	
	public function getColumnNamesByTableName( $table_name )
	{
		$arrColumnInfo = array();
		 $objDbResult = $this->db->query("select COLUMN_NAME 
			from information_schema.columns 
			where table_schema =  
 '". $this->db->database."' 
			and table_name = '$table_name'");
       
       		if( true == is_object(  $objDbResult ) ) {
			foreach ( $objDbResult->result() as $row ) {
	            		$arrColumnInfo[]=$row->COLUMN_NAME;
	        	}
	       } 	
       	       return $arrColumnInfo;
		
	}
	
	public function fetchColumnByTableName( $table_name )
	{
		$arrColumnInfo = array();
		 $objDbResult = $this->db->query("select COLUMN_NAME 
			from information_schema.columns 
			where table_name = '$table_name' and COLUMN_NAME NOT IN ('id', 'campaign_id', 'user_id', 'leads_id')");
       		if( true == is_object(  $objDbResult ) ) {
			foreach ( $objDbResult->result() as $row ) {
            			$arrColumnInfo[]=$row->COLUMN_NAME;
       			 }
       		}		 
        	return $arrColumnInfo;
		
	}
	
	public function fetchTableNameById( $formatId )
	{
		$this->db->select( 'table_name' );
    	$this->db->from( 'tbl_campaign_formats' ) ;
    	$this->db->where( 'id', ( int ) $formatId );
    	$objDbResult = $this->db->get();
    	
    	return $objDbResult->row()->table_name;
		
	}
	
	public function get_files_by_campaign_id( $campaign_id  ) {
		
       $objDbResult = $this->db->query("select cf.*,cmf.table_name
			from 
			tbl_campaign_files cf 
			join tbl_campaign_formats cmf ON ( cmf.id = cf.format_id )
			where cf.campaign_id = '". $campaign_id."'
			GROUP By cf.format_id,cf.campaign_id
			");
    
        return $objDbResult;
   }
   
	public function get_files_by_campaign_id_by_user_id( $campaign_id, $user_id  ) {
		
       $objDbResult = $this->db->query("select cf.*,cmf.format_name
			from 
			tbl_campaign_files cf 
			join tbl_campaign_formats cmf ON ( cmf.id = cf.format_id )
			where cf.campaign_id = '". $campaign_id."'
			GROUP By cf.format_id,cf.campaign_id
			");
    
        return $objDbResult;
   }
  
   
	public function get_campaign_data_by_format_table( $campaign_id, $table_name ) {
	  
		$arrTableColumns1 = $this->fetchColumnNamesByTableName( $table_name );
		
		/* ########################   Start Code for  altering the position of coloumns   ################# */
		
		foreach($arrTableColumns1 as $col_data)
		{ 
			if($col_data==="campaign_id" || $col_data==="user_id")
			{ 
		         continue;
			}
			else
			{
				$arrTableColumns[] = $col_data;
			}
		}
		
		 array_push( $arrTableColumns, "user");
		
		/* ########################   End Code for  altering the position of coloumns   ################# */

		$column_order	= $arrTableColumns;
		$order 			= array('id' => 'desc');
		
	/*	$this->db->select( 't.*,u.username as user' );
		$this->db->from( "$table_name as t" );
		$this->db->join( 'tbl_users u', 't.user_id = u.user_id' , 'LEFT' );
		$this->db->where( 't.campaign_id', $campaign_id );*/
			//$objDbResult = $this->db->get();
			//echo $this->db->last_query();die;
			//print_r($objDbResult);die;
			//return $objDbResult->result();
			$sql = "
			select 
				t.*,u.username as user
			from 
				$table_name as t 
				left join tbl_users u on ( t.user_id = u.user_id )
			where t.campaign_id = '". $campaign_id."'";
				
	  /* $objDbResult = $this->db->query("
			select 
				t.*,u.username as user
			from 
				$table_name as t 
				left join tbl_users u on ( t.user_id = u.user_id )
			where campaign_id = '". $campaign_id."'");
				
				return $objDbResult->result(); */
   //print_r($objDbResult);die;
	 	
				
	   //$this->db->from($this->table);
 
        $i = 0;
     
        foreach ( $arrTableColumns as $item ) // loop column 
        {
            if(true == isset( $_POST['search'] ) && $_POST['search']['value']) // if datatable send POST for search
            {
                 
	
                if($i==0) // first loop
                {
                	
					//$or_like = "(";
					$search = $_POST['search']['value'];
					//$or_like.="$item = $search";
					
					//$item = $or_like . $item;
					
					//$or_like.=")";     
					//$this->db->like( $or_like );
					   
                   // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    //$this->db->like($item, $_POST['search']['value']);
                    $sql .= " AND ( t.$item LIKE '%$search%'";
                }
                else
                {
                	$search = $_POST['search']['value'];
                   //	$this->db->or_like($item, $_POST['search']['value']);
                    $sql .= " OR t.$item LIKE '%$search%'";
                   
                }
 
                if( count($arrTableColumns) - 1 == $i ) { //last loop
                	$sql .=' )';
				//	$or_like = ")";
				//	$search = $_POST['search']['value'];
				//	$or_like.="$item = $search";
					
				//	$or_like.=")";  
					
				//	$this->db->or_like($or_like);   
                   // $this->db->group_end(); //close bracket
                }    
            }
            $i++;
        }
         
        if(isset($_POST['order']) && !empty($_POST['order']['0']['column']) ) // here order processing
        {
            //$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            $column = $column_order[$_POST['order']['0']['column']];
            $orderBy  =  $_POST['order']['0']['dir'];
            $sql .= " ORDER BY $column $orderBy ";
        } 
        else if(isset($order))
        {
        	$sql .= " ORDER BY t.id ".$_POST['order']['0']['dir'];
           // $order = $order;
           // $this->db->order_by(key($order), $order[key($order)]);
        }
        		
		if( isset($_POST['length']) && $_POST['length'] != -1) {
			$start = $_POST['start'];
			$length = $_POST['length'];
			$sql .= " LIMIT $start, $length";
      	 	//$this->db->limit($_POST['length'], $_POST['start']);
		} 
        $query = $this->db->query( $sql );
		
		 /* ########################   Start Code for  altering the position of coloumns   ################# */
	   $result_array = $query->result_array();
	   foreach($result_array as $data)
	   {
		  $count = count($data)-1;
		  $sam = 0;
		  $temp_array = array();// initialising the temp array
		  $other_array = array();
		  $sub_final_array = array();
		   foreach($data as $key=>$value)
		   {  
			   if($key=="comments" || $key=="leads_id" || $key=="user")
			   {
				   $temp_array[$key] = $value;
			   }
			   else
			   {
				   
				   $other_array[$key] = $value;
			   }
			  
		   }
		   
		   $sub_final_array= array_merge($other_array,$temp_array);
		   $final_array[] = $sub_final_array;
	   }
	  
	   /* ########################   End Code for  altering the position of coloumns   ################# */
	    
       return $final_array;
      
       //return $query->result_array();
     
   }
   
	public function get_campaign_unallocated_data_by_format_table( $campaign_id, $table_name ) {
	  
		$arrTableColumns = $this->fetchColumnNamesByTableName( $table_name );
		$column_order	= $arrTableColumns;
		$order 			= array('id' => 'desc');
		
	/*	$this->db->select( 't.*,u.username as user' );
		$this->db->from( "$table_name as t" );
		$this->db->join( 'tbl_users u', 't.user_id = u.user_id' , 'LEFT' );
		$this->db->where( 't.campaign_id', $campaign_id );*/
			//$objDbResult = $this->db->get();
			//echo $this->db->last_query();die;
			//print_r($objDbResult);die;
			//return $objDbResult->result();
			$sql = "
			select 
				t.*,u.username as user
			from 
				$table_name as t 
				left join tbl_users u on ( t.user_id = u.user_id )
			where t.campaign_id = '". $campaign_id."'
				and t.user_id = 0";
				
	  /* $objDbResult = $this->db->query("
			select 
				t.*,u.username as user
			from 
				$table_name as t 
				left join tbl_users u on ( t.user_id = u.user_id )
			where campaign_id = '". $campaign_id."'");
				
				return $objDbResult->result(); */
   //print_r($objDbResult);die;
	 	
				
	   //$this->db->from($this->table);
 
        $i = 0;
     
        foreach ( $arrTableColumns as $item ) // loop column 
        {
            if(true == isset( $_POST['search'] ) && $_POST['search']['value']) // if datatable send POST for search
            {
                 
	
                if($i==0) // first loop
                {
                	
					//$or_like = "(";
					$search = $_POST['search']['value'];
					//$or_like.="$item = $search";
					
					//$item = $or_like . $item;
					
					//$or_like.=")";     
					//$this->db->like( $or_like );
					   
                   // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    //$this->db->like($item, $_POST['search']['value']);
                    $sql .= " AND ( t.$item LIKE '%$search%'";
                }
                else
                {
                	$search = $_POST['search']['value'];
                   //	$this->db->or_like($item, $_POST['search']['value']);
                    $sql .= " OR t.$item LIKE '%$search%'";
                   
                }
 
                if( count($arrTableColumns) - 1 == $i ) { //last loop
                	$sql .=' )';
				//	$or_like = ")";
				//	$search = $_POST['search']['value'];
				//	$or_like.="$item = $search";
					
				//	$or_like.=")";  
					
				//	$this->db->or_like($or_like);   
                   // $this->db->group_end(); //close bracket
                }    
            }
            $i++;
        }
         
        if(isset($_POST['order']) && !empty($_POST['order']['0']['column']) ) // here order processing
        {
            //$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            $column = $column_order[$_POST['order']['0']['column']];
            $orderBy  =  $_POST['order']['0']['dir'];
            $sql .= " ORDER BY $column $orderBy ";
        } 
        else if(isset($order))
        {
        	$sql .= " ORDER BY t.id asc";
           // $order = $order;
           // $this->db->order_by(key($order), $order[key($order)]);
        }
        		
		if( isset($_POST['length']) && $_POST['length'] != -1) {
			$start = $_POST['start'];
			$length = $_POST['length'];
			$sql .= " LIMIT $start, $length";
      	 	//$this->db->limit($_POST['length'], $_POST['start']);
		} 
        $query = $this->db->query( $sql );
       //echo $this->db->last_query();die;		
	   
       // return $query->result();
       return $query->result_array();
      //  return $objDbResult->result_array();
   }
   
	public function get_campaign_allocated_data_by_format_table( $campaign_id, $table_name ) {
	  
		$arrTableColumns = $this->fetchColumnNamesByTableName( $table_name );
		$column_order	= $arrTableColumns;
		$order 			= array('id' => 'desc');
		
	/*	$this->db->select( 't.*,u.username as user' );
		$this->db->from( "$table_name as t" );
		$this->db->join( 'tbl_users u', 't.user_id = u.user_id' , 'LEFT' );
		$this->db->where( 't.campaign_id', $campaign_id );*/
			//$objDbResult = $this->db->get();
			//echo $this->db->last_query();die;
			//print_r($objDbResult);die;
			//return $objDbResult->result();
			$sql = "
			select 
				t.*,u.username as user
			from 
				$table_name as t 
				 join tbl_users u on ( t.user_id = u.user_id )
			where t.campaign_id = '". $campaign_id."'
				and t.user_id != 0";
				
	  /* $objDbResult = $this->db->query("
			select 
				t.*,u.username as user
			from 
				$table_name as t 
				left join tbl_users u on ( t.user_id = u.user_id )
			where campaign_id = '". $campaign_id."'");
				
				return $objDbResult->result(); */
   //print_r($objDbResult);die;
	 	
				
	   //$this->db->from($this->table);
 
        $i = 0;
     
        foreach ( $arrTableColumns as $item ) // loop column 
        {
            if(true == isset( $_POST['search'] ) && $_POST['search']['value']) // if datatable send POST for search
            {
                 
	
                if($i==0) // first loop
                {
                	
					//$or_like = "(";
					$search = $_POST['search']['value'];
					//$or_like.="$item = $search";
					
					//$item = $or_like . $item;
					
					//$or_like.=")";     
					//$this->db->like( $or_like );
					   
                   // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    //$this->db->like($item, $_POST['search']['value']);
                    $sql .= " AND ( t.$item LIKE '%$search%'";
                }
                else
                {
                	$search = $_POST['search']['value'];
                   //	$this->db->or_like($item, $_POST['search']['value']);
                    $sql .= " OR t.$item LIKE '%$search%'";
                   
                }
 
                if( count($arrTableColumns) - 1 == $i ) { //last loop
                	$sql .=' )';
				//	$or_like = ")";
				//	$search = $_POST['search']['value'];
				//	$or_like.="$item = $search";
					
				//	$or_like.=")";  
					
				//	$this->db->or_like($or_like);   
                   // $this->db->group_end(); //close bracket
                }    
            }
            $i++;
        }
         
        if(isset($_POST['order']) && !empty($_POST['order']['0']['column']) ) // here order processing
        {
            //$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            $column = $column_order[$_POST['order']['0']['column']];
            $orderBy  =  $_POST['order']['0']['dir'];
            $sql .= " ORDER BY $column $orderBy ";
        } 
        else if(isset($order))
        {
        	$sql .= " ORDER BY t.id asc";
           // $order = $order;
           // $this->db->order_by(key($order), $order[key($order)]);
        }
        		
		if( isset($_POST['length']) && $_POST['length'] != -1) {
			$start = $_POST['start'];
			$length = $_POST['length'];
			$sql .= " LIMIT $start, $length";
      	 	//$this->db->limit($_POST['length'], $_POST['start']);
		} 
        $query = $this->db->query( $sql );
       // echo $this->db->last_query();die;		
       // return $query->result();
       return $query->result_array();
      //  return $objDbResult->result_array();
   }
   
	public function get_campaign_data_by_tables_by_campaign_id_by_user_id( $table, $campaign_id, $user_id ) {
 	       	
	
	  /*	$objDbResult = $this->db->query("
			  SELECT 
			  	*
			  FROM
			  	 ". $table ." dt 
			  WHERE
			  	 dt.campaign_id = '". $campaign_id."'
			  	 AND dt.user_id='".$user_id."'");*/
		
		$arrTableColumns = $this->fetchColumnNamesByTableName( $table );
		$column_order	= $arrTableColumns;
		$order 			= array('id' => 'desc');
		
	 	$sql = " SELECT 
				  	t.*
				  FROM
				  	 $table as t 
				  WHERE
				  	 t.campaign_id = '". $campaign_id."'
				  	 AND t.user_id='".$user_id."'";
		 	
		$i = 0;
     
        foreach ( $arrTableColumns as $item ) // loop column 
        {
            if(true == isset( $_POST['search'] ) && $_POST['search']['value']) // if datatable send POST for search
            {
                 
	
                if($i==0) // first loop
                {
                	
					//$or_like = "(";
					$search = $_POST['search']['value'];
					//$or_like.="$item = $search";
					
					//$item = $or_like . $item;
					
					//$or_like.=")";     
					//$this->db->like( $or_like );
					   
                   // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    //$this->db->like($item, $_POST['search']['value']);
                    $sql .= " AND ( t.$item LIKE '%$search%'";
                }
                else
                {
                	$search = $_POST['search']['value'];
                   //	$this->db->or_like($item, $_POST['search']['value']);
                    $sql .= " OR t.$item LIKE '%$search%'";
                   
                }
 
                if( count($arrTableColumns) - 1 == $i ) { //last loop
                	$sql .=' )';
				//	$or_like = ")";
				//	$search = $_POST['search']['value'];
				//	$or_like.="$item = $search";
					
				//	$or_like.=")";  
					
				//	$this->db->or_like($or_like);   
                   // $this->db->group_end(); //close bracket
                }    
            }
            $i++;
        }
         
        if(isset($_POST['order']) && !empty($_POST['order']['0']['column']) ) // here order processing
        {
            //$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            $column = $column_order[$_POST['order']['0']['column']];
            $orderBy  =  $_POST['order']['0']['dir'];
            $sql .= " ORDER BY $column $orderBy ";
        } 
        else if(isset($order))
        {
        	$sql .= " ORDER BY t.id asc";
           // $order = $order;
           // $this->db->order_by(key($order), $order[key($order)]);
        }
        		
		if( isset($_POST['length']) && $_POST['length'] != -1) {
			$start = $_POST['start'];
			$length = $_POST['length'];
			$sql .= " LIMIT $start, $length";
      	 	//$this->db->limit($_POST['length'], $_POST['start']);
		} 
        $query = $this->db->query( $sql );
      // echo $this->db->last_query();die;		
       // return $query->result();
       return $query->result_array();
					 
   }
   
	public function get_campaign_data_by_tables_by_campaign_id_by_id( $table, $campaign_id, $id ) {
 	       	
	
	  	$objDbResult = $this->db->query("
			  SELECT 
			  	dt.*
			  FROM
			  	 ". $table ." dt 
			  WHERE
			  	 dt.campaign_id = '". $campaign_id."'
			  	 AND dt.id='".$id."'");
		 	
		 	
		 return $objDbResult->row();
					 
   }
   
	public function get_campaign_data_by_tables_by_campaign_id_by_user_id_by_id( $table, $campaign_id, $user_id, $id ) {
 	       	
		$sql = ( 1 != $this->session->userdata('user_type') ) ?  " AND dt.user_id='".$user_id."'" : "";
		
	  	$objDbResult = $this->db->query("
			  SELECT 
			  	*
			  FROM
			  	 ". $table ." dt 
			  WHERE
			  	 dt.campaign_id = '". $campaign_id."'". $sql ."
			  	 AND dt.id ='".$id."'
			  	 ");
		 	
		 	if( $objDbResult->num_rows > 0){
			 	return $objDbResult->result();
		 	} else {
		 		return NULL;
		 	}
					 
   }
 	/*public function get_campaign_data_by_tables_by_campaign_id( $tables, $campaign_id ) {
 		
 		$arrUserRecords = array();
 		
 		foreach( $tables as $key => $table )
        {
        	
		  	$objDbResult = $this->db->query("
				  SELECT 
				  	*
				  FROM
				  	 ". $table->table_name ." dt 
				  WHERE
				  	 dt.campaign_id = '". $campaign_id."'");
			 	
			 	if( false == is_object( $objDbResult->result() ) ) {
			 		$arrUserRecords = $objDbResult->result_array();
			 	}
			   
			return $arrUserRecords;
        }    
   }*/
   
	public function getUserTableLists( $userId ) {
 	
	 	$objDbResult = $this->db->query("
			select 
				cf.table_name
			from 
				tbl_users_table ut  
				left join tbl_campaign_formats cf on ( ut.table_id = cf.id )
			where ut.user_id = '". $userId."'
			GROUP By cf.table_name");
	    
	     return $objDbResult->result();
   
   }	
   public function getUserTableDetails( $userId ) {
 	
	 	$objDbResult = $this->db->query("
			select 
				cf.id, cf.table_name
			from 
				tbl_users_table ut  
				join tbl_campaign_formats cf on ( ut.table_id = cf.id )
			where ut.user_id = '". $userId."'
			GROUP By cf.table_name");
	    
	     return $objDbResult->result();
   
   }	
 	public function getcampaignList( $tables, $userId ) {
 	
 		$arrUserRecords = array();
 		
 		foreach( $tables as $key => $table )
        {
			
		 	$objDbResult = $this->db->query("
			  SELECT 
			  	c.campaign_id, c.campaign_name, c.campaign_date,c.created_date
			  FROM
			  	 ". $table->table_name ." dt JOIN tbl_campaigns c ON ( dt.campaign_id = c.campaign_id )
			  WHERE
			  	 dt.user_id = '". $userId."'
			  	 
			  order by	
			  c.campaign_id");
		 
		 
		 	if( true == is_object($objDbResult) ) {
		 		$arrUserRecords[] = $objDbResult->result_array();
		 	}
		   
		   
        }     
   		return $arrUserRecords;
   }
   
  
	public function getUserFormatList( $tables, $userId, $campaignId ) {
 	
 		$arrUserRecords = array();
 		
 		foreach( $tables as $key => $table )
        {
		 	$objDbResult = $this->db->query("
			select 
				dt.id
			from
				 ". $table->table_name ." dt 
				
			where 
				dt.user_id = '". $userId."' and dt.campaign_id ='". $campaignId ."'
			");
		 	
		 	if( true == is_object($objDbResult) && $objDbResult->num_rows > 0 ) {
		 		$arrUserRecords[] = $tables[$key];
		 	}
        }     
   		return $arrUserRecords;
   }
   
	public function fetchcampaignList() {
 	
 		$arrUserRecords = array();
 		
 		
        $objResult = $this->db->query("
			  SELECT 
			  	c.campaign_id, c.campaign_name, c.campaign_date,c.created_date
			  FROM
			  	 tbl_campaigns c 
			 Order by  
			 	c.campaign_id desc	 
			 "); 
        
			
		 	$arrUserRecords[] = $objResult->result();
		 
          
   		return $arrUserRecords;
   }
   
   public function GetMultipleQueryResult($queryString)
	{
	    if (empty($queryString)) {
	                return false;
	            }
	
	    $index     = 0;
	    $ResultSet = array();
	
	    /* execute multi query */
	    if (mysqli_multi_query($this->db->conn_id, $queryString)) {
	        do {
	            if (false != $result = mysqli_store_result($this->db->conn_id)) {
	                $rowID = 0;
	                while ($row = $result->fetch_assoc()) {
	                    $ResultSet[$index][$rowID] = $row;
	                    $rowID++;
	                }
	            }
	            $index++;
	        } while (mysqli_next_result($this->db->conn_id));
	    }
	
	    return $ResultSet;
	}
	
	 public function checkCampaignExists( $campaign ) {
    	
	 	
    	$this->db->where('campaign_name',$campaign );
		
	    $query = $this->db->get('tbl_campaigns');
	   
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
    	
    }
	
	public function checkTableExists( $format ) {
		
		$objDbResult = $this->db->query("select table_name 
			from information_schema.tables  
			where table_schema = '". $this->db->database."'
			and table_name='$format'");
		
		if ( $objDbResult->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
    	
    }
    
	public function checkLeadExist( $lead_name ) {
		
		$this->db->where('lead_name',$lead_name );
		
	    $query = $this->db->get('tbl_leads');
	   
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
    	
    }
    
	public function checkColumnExist( $format_id, $column_name ) {
		
		 $table_name = $this->fetchTableNameById( $format_id );
				
		 $objDbResult = $this->db->query("select COLUMN_NAME 
			from information_schema.columns 
			where table_name = '$table_name' and COLUMN_NAME = '$column_name'");
		
		
	    if ( $objDbResult->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	    	
	}
	
	public function checkFieldExist( $format_id, $column_name, $old_column ) {
		
		 $table_name = $this->fetchTableNameById( $format_id );
			
		 $objDbResult = $this->db->query("select COLUMN_NAME 
		from information_schema.columns 
		where table_name = '$table_name' and COLUMN_NAME = '$column_name' and COLUMN_NAME != '$old_column'");
		
		
	    if ( $objDbResult->num_rows() > 0){ 
	        return true;
	    }
	    else{
	        return false;
	    }
	    	
	}
	
	private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered( $campaign_id, $table_name )
    {
     
      	/*$arrTableColumns = $this->fetchColumnNamesByTableName( $table_name );
		$column_order	= $arrTableColumns;
		$order 			= array('id' => 'desc');
		
		$this->db->select( 't.*,u.username as user' );
		$this->db->from( "$table_name as t" );
		$this->db->join( 'tbl_users u', 't.user_id = u.user_id' , 'LEFT' );
		$this->db->where( 't.campaign_id', $campaign_id );
			
        $i = 0;
     
        foreach ( $arrTableColumns as $item ) // loop column 
        {
            if(true == isset( $_POST['search'] ) && $_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                  //  $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($arrTableColumns) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($order))
        {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
        		
		if( isset($_POST['length']) && $_POST['length'] != -1) {
      	 	$this->db->limit($_POST['length'], $_POST['start']);
		} 
		
        $query = $this->db->get();*/
    	
    	$arrTableColumns = $this->fetchColumnNamesByTableName( $table_name );
		$column_order	= $arrTableColumns;
		$order 			= array('id' => 'desc');
		
	/*	$this->db->select( 't.*,u.username as user' );
		$this->db->from( "$table_name as t" );
		$this->db->join( 'tbl_users u', 't.user_id = u.user_id' , 'LEFT' );
		$this->db->where( 't.campaign_id', $campaign_id );*/
			//$objDbResult = $this->db->get();
			//echo $this->db->last_query();die;
			//print_r($objDbResult);die;
			//return $objDbResult->result();
			$sql = "
			select 
				t.*,u.username as user
			from 
				$table_name as t 
				left join tbl_users u on ( t.user_id = u.user_id )
			where t.campaign_id = '". $campaign_id."'";
				
	  /* $objDbResult = $this->db->query("
			select 
				t.*,u.username as user
			from 
				$table_name as t 
				left join tbl_users u on ( t.user_id = u.user_id )
			where campaign_id = '". $campaign_id."'");
				
				return $objDbResult->result(); */
   //print_r($objDbResult);die;
	 	
				
	   //$this->db->from($this->table);
 
        $i = 0;
     
        foreach ( $arrTableColumns as $item ) // loop column 
        {
            if(true == isset( $_POST['search'] ) && $_POST['search']['value']) // if datatable send POST for search
            {
                 
	
                if($i==0) // first loop
                {
                	
					//$or_like = "(";
					$search = $_POST['search']['value'];
					//$or_like.="$item = $search";
					
					//$item = $or_like . $item;
					
					//$or_like.=")";     
					//$this->db->like( $or_like );
					   
                   // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    //$this->db->like($item, $_POST['search']['value']);
                    $sql .= " AND ( t.$item LIKE '%$search%'";
                }
                else
                {
                	$search = $_POST['search']['value'];
                   //	$this->db->or_like($item, $_POST['search']['value']);
                    $sql .= " OR t.$item LIKE '%$search%'";
                   
                }
 
                if( count($arrTableColumns) - 1 == $i ) { //last loop
                	$sql .=' )';
				//	$or_like = ")";
				//	$search = $_POST['search']['value'];
				//	$or_like.="$item = $search";
					
				//	$or_like.=")";  
					
				//	$this->db->or_like($or_like);   
                   // $this->db->group_end(); //close bracket
                }    
            }
            $i++;
        }
         
        if(isset($_POST['order']) && !empty($_POST['order']['0']['column']) ) // here order processing
        {
            //$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            $column = $column_order[$_POST['order']['0']['column']];
            $orderBy  =  $_POST['order']['0']['dir'];
            $sql .= " ORDER BY $column $orderBy ";
        } 
        else if(isset($order))
        {
        	$sql .= " ORDER BY t.id asc";
           // $order = $order;
           // $this->db->order_by(key($order), $order[key($order)]);
        }
        		
		if( isset($_POST['length']) && $_POST['length'] != -1 && !empty( $start )) {
			$start = $_POST['start'];
			$length = $_POST['length'];
			$sql .= " LIMIT $start, $length";
      	 	//$this->db->limit($_POST['length'], $_POST['start']);
		} 
        $query = $this->db->query( $sql );
       // echo $this->db->last_query();die;
        return $query->num_rows();
    }
 
	function count_unallocated_filtered( $campaign_id, $table_name )
    {
 
    	$arrTableColumns = $this->fetchColumnNamesByTableName( $table_name );
		$column_order	= $arrTableColumns;
		$order 			= array('id' => 'desc');
		
	
			$sql = "
			select 
				t.*
			from 
				$table_name as t 
				where t.campaign_id = '". $campaign_id."'
				and t.user_id = 0
				";
	
        $i = 0;
     
        foreach ( $arrTableColumns as $item ) // loop column 
        {
            if(true == isset( $_POST['search'] ) && $_POST['search']['value']) // if datatable send POST for search
            {
                if($i==0) // first loop
                {
							$search = $_POST['search']['value'];
							$sql .= " AND ( t.$item LIKE '%$search%'";
                }
                else
                {
							$search = $_POST['search']['value'];
                    $sql .= " OR t.$item LIKE '%$search%'";
                 }
                 if( count($arrTableColumns) - 1 == $i ) { //last loop
                	$sql .=' )';
                }    
            }
            $i++;
        }
         
        if(isset($_POST['order']) && !empty($_POST['order']['0']['column']) ) // here order processing
        {
            $column = $column_order[$_POST['order']['0']['column']];
            $orderBy  =  $_POST['order']['0']['dir'];
            $sql .= " ORDER BY $column $orderBy ";
        } 
        else if(isset($order))
        {
				$sql .= " ORDER BY t.id asc";
        }
        		
		if( isset($_POST['length']) && $_POST['length'] != -1 && !empty( $start )) {
			$start = $_POST['start'];
			$length = $_POST['length'];
			$sql .= " LIMIT $start, $length";
      	 	
		} 
        $query = $this->db->query( $sql );
       // echo $this->db->last_query();die;
        return $query->num_rows();
    }
    
	function count_allocated_filtered( $campaign_id, $table_name )
    {
     
      	/*$arrTableColumns = $this->fetchColumnNamesByTableName( $table_name );
		$column_order	= $arrTableColumns;
		$order 			= array('id' => 'desc');
		
		$this->db->select( 't.*,u.username as user' );
		$this->db->from( "$table_name as t" );
		$this->db->join( 'tbl_users u', 't.user_id = u.user_id' , 'LEFT' );
		$this->db->where( 't.campaign_id', $campaign_id );
			
        $i = 0;
     
        foreach ( $arrTableColumns as $item ) // loop column 
        {
            if(true == isset( $_POST['search'] ) && $_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                  //  $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($arrTableColumns) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($order))
        {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
        		
		if( isset($_POST['length']) && $_POST['length'] != -1) {
      	 	$this->db->limit($_POST['length'], $_POST['start']);
		} 
		
        $query = $this->db->get();*/
    	
    	$arrTableColumns = $this->fetchColumnNamesByTableName( $table_name );
		$column_order	= $arrTableColumns;
		$order 			= array('id' => 'desc');
		
	/*	$this->db->select( 't.*,u.username as user' );
		$this->db->from( "$table_name as t" );
		$this->db->join( 'tbl_users u', 't.user_id = u.user_id' , 'LEFT' );
		$this->db->where( 't.campaign_id', $campaign_id );*/
			//$objDbResult = $this->db->get();
			//echo $this->db->last_query();die;
			//print_r($objDbResult);die;
			//return $objDbResult->result();
			$sql = "
			select 
				t.*,u.username as user
			from 
				$table_name as t 
				 join tbl_users u on ( t.user_id = u.user_id )
				where t.campaign_id = '". $campaign_id."'
					and t.user_id != 0";
				
	  /* $objDbResult = $this->db->query("
			select 
				t.*,u.username as user
			from 
				$table_name as t 
				left join tbl_users u on ( t.user_id = u.user_id )
			where campaign_id = '". $campaign_id."'");
				
				return $objDbResult->result(); */
   //print_r($objDbResult);die;
	 	
				
	   //$this->db->from($this->table);
 
        $i = 0;
     
        foreach ( $arrTableColumns as $item ) // loop column 
        {
            if(true == isset( $_POST['search'] ) && $_POST['search']['value']) // if datatable send POST for search
            {
                 
	
                if($i==0) // first loop
                {
                	
					//$or_like = "(";
					$search = $_POST['search']['value'];
					//$or_like.="$item = $search";
					
					//$item = $or_like . $item;
					
					//$or_like.=")";     
					//$this->db->like( $or_like );
					   
                   // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    //$this->db->like($item, $_POST['search']['value']);
                    $sql .= " AND ( t.$item LIKE '%$search%'";
                }
                else
                {
                	$search = $_POST['search']['value'];
                   //	$this->db->or_like($item, $_POST['search']['value']);
                    $sql .= " OR t.$item LIKE '%$search%'";
                   
                }
 
                if( count($arrTableColumns) - 1 == $i ) { //last loop
                	$sql .=' )';
				//	$or_like = ")";
				//	$search = $_POST['search']['value'];
				//	$or_like.="$item = $search";
					
				//	$or_like.=")";  
					
				//	$this->db->or_like($or_like);   
                   // $this->db->group_end(); //close bracket
                }    
            }
            $i++;
        }
         
        if(isset($_POST['order']) && !empty($_POST['order']['0']['column']) ) // here order processing
        {
            //$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            $column = $column_order[$_POST['order']['0']['column']];
            $orderBy  =  $_POST['order']['0']['dir'];
            $sql .= " ORDER BY $column $orderBy ";
        } 
        else if(isset($order))
        {
        	$sql .= " ORDER BY t.id asc";
           // $order = $order;
           // $this->db->order_by(key($order), $order[key($order)]);
        }
        		
		if( isset($_POST['length']) && $_POST['length'] != -1 && !empty( $start )) {
			$start = $_POST['start'];
			$length = $_POST['length'];
			$sql .= " LIMIT $start, $length";
      	 	//$this->db->limit($_POST['length'], $_POST['start']);
		} 
        $query = $this->db->query( $sql );
       // echo $this->db->last_query();die;
        return $query->num_rows();
    }
	
	function count_user_filtered( $campaign_id, $table_name, $user_id )
    {
     
    	
    	$arrTableColumns = $this->fetchColumnNamesByTableName( $table_name );
		$column_order	= $arrTableColumns;
		$order 			= array('id' => 'desc');
	
		$sql = "
		select 
			t.*,u.username as user
		from 
			$table_name as t 
			 join tbl_users u on ( t.user_id = u.user_id )
			where t.campaign_id = '". $campaign_id."'
				and t.user_id = '". $user_id ."'";

        $i = 0;
     
        foreach ( $arrTableColumns as $item ) // loop column 
        {
            if(true == isset( $_POST['search'] ) && $_POST['search']['value']) // if datatable send POST for search
            {
                if($i==0) // first loop
                {
							$search = $_POST['search']['value'];
                    $sql .= " AND ( t.$item LIKE '%$search%'";
                }
                else
                {
							$search = $_POST['search']['value'];
                    $sql .= " OR t.$item LIKE '%$search%'";
                }
 
                if( count($arrTableColumns) - 1 == $i ) { //last loop
                	$sql .=' )';
                }    
            }
            $i++;
        }
         
        if(isset($_POST['order']) && !empty($_POST['order']['0']['column']) ) // here order processing
        {
            //$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            $column = $column_order[$_POST['order']['0']['column']];
            $orderBy  =  $_POST['order']['0']['dir'];
            $sql .= " ORDER BY $column $orderBy ";
        } 
        else if(isset($order))
        {
				$sql .= " ORDER BY t.id asc";
        }
        		
		if( isset($_POST['length']) && $_POST['length'] != -1 && !empty( $start )) {
			$start = $_POST['start'];
			$length = $_POST['length'];
			$sql .= " LIMIT $start, $length";
		} 
       $query = $this->db->query( $sql );
       // echo $this->db->last_query();die;
        return $query->num_rows();
    }
    
	function count_user_filtered1( $campaign_id, $table_name, $user_id )
    {
     
    	
    	$arrTableColumns = $this->fetchColumnNamesByTableName( $table_name );
		$column_order	= $arrTableColumns;
		$order 			= array('id' => 'desc');
	
		$sql = "
		select 
			t.*,u.username as user
		from 
			$table_name as t 
			 join tbl_users u on ( t.user_id = u.user_id )
			where t.campaign_id = '". $campaign_id."'
				and t.user_id = '". $user_id ."'";

        $i = 0;
     
        foreach ( $arrTableColumns as $item ) // loop column 
        {
            if(true == isset( $_POST['search'] ) && $_POST['search']['value']) // if datatable send POST for search
            {
                if($i==0) // first loop
                {
							$search = $_POST['search']['value'];
                    $sql .= " AND ( t.$item LIKE '%$search%'";
                }
                else
                {
							$search = $_POST['search']['value'];
                    $sql .= " OR t.$item LIKE '%$search%'";
                }
 
                if( count($arrTableColumns) - 1 == $i ) { //last loop
                	$sql .=' )';
                }    
            }
            $i++;
        }
         
        if(isset($_POST['order']) && !empty($_POST['order']['0']['column']) ) // here order processing
        {
            //$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            $column = $column_order[$_POST['order']['0']['column']];
            $orderBy  =  $_POST['order']['0']['dir'];
            $sql .= " ORDER BY $column $orderBy ";
        } 
        else if(isset($order))
        {
				$sql .= " ORDER BY t.id asc";
        }
        		
		if( isset($_POST['length']) && $_POST['length'] != -1 && !empty( $start )) {
			$start = $_POST['start'];
			$length = $_POST['length'];
			$sql .= " LIMIT $start, $length";
		} 
       $query = $this->db->query( $sql );
       // echo $this->db->last_query();die;
        return $query->num_rows();
    }
    
	
    public function count_all( $campaign_id, $table, $id = NULL )
    {
		
        $this->db->from( $table );
        if( !is_null( $id )) {
        	$this->db->where('user_id', $id);
        }	
        $this->db->where('campaign_id',$campaign_id );
      
			return $this->db->count_all_results();
    }
	
	public function count_all_unallocated( $campaign_id, $table )
    {
		
        $this->db->from( $table );
        $this->db->where('user_id', '0');
        $this->db->where('campaign_id',$campaign_id );
      
			return $this->db->count_all_results();
    }
    
	public function count_all_allocated( $campaign_id, $table, $id = NULL )
    {
        $this->db->from( $table );
        if( !is_null( $id )) {
        	$this->db->where('user_id !=',$id);
        }	
        $this->db->where('campaign_id',$campaign_id );
        return $this->db->count_all_results();
    }
	
	
 
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
  
}


?>