<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class data extends Admin_Controller
{
    function __construct() 
	{
        parent::__construct();
         ini_set('memory_limit', "-1");
			
		$this->load->dbforge();
        $this->load->model('data_model');
        $this->load->library('form_validation');
		
    }
	
	public function data_upload( $active = NULL, $tabId = NULL )
	{
		
		$data['title'] = lang('all_campaign');
		// get permission user by menu id
		$role = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('user_id'); 
		 
		if( true == isset( $active ) && true == isset( $tabId ) ) {
			$data['active'] = $tabId;
		} else {
			$data['active'] = 1; // setting the first tab as active tab
		}
			
		if( 1 != $role ) {
			$data['table_list'] = $this->data_model->getUserTableLists( $user_id );
		//	print_r($data['table_list']); die;
			$data['campaign_data'] = $this->data_model->fetchcampaignList();
			
			$arrCampaigns = array();
			
			if( false == empty( $data['campaign_data'] )) {
				foreach( $data['campaign_data'] as $index => $arrUserData ) {
					foreach( $arrUserData as $campaign ) {
							$arrCampaigns[$campaign->campaign_id] = $arrUserData;
					}	
					
				}
			}
			
			$data['arrUserCampaigns'] = array();
			$count = 0;
			if( false == empty( $arrCampaigns )) {
				foreach( $arrCampaigns as $index => $userData ) {
					foreach( $userData as $key => $campaign_user ) {
						if( $index != $campaign_user->campaign_id ) {
							unset( $arrCampaigns[$index][$key] );
						}  
					}	
					
				}
			}
	
			
			if( false == empty( $arrCampaigns )) {
				foreach( $arrCampaigns as $index => $userData ) {
					foreach( $userData as $key => $campaign_user ) {
						if( $index == $campaign_user->campaign_id ) {
							$data['arrUserCampaigns'][$index] = $campaign_user;
						}  
					}	
					
				}
			}	
			
			$data['all_deposit_info'] = $data['arrUserCampaigns'];
			
			$data['formats'] = $this->data_model->getDataFormats( NULL );
			
			
			
			$data['subview'] = $this->load->view('admin/data/add_campaign', $data, TRUE);
		 

       		 $this->load->view('admin/_layout_main', $data); //page load
		} else {

			$data['permission_user'] = $this->data_model->all_permission_user('72');
			
			$data['all_deposit_info'] = $this->data_model->get_permission('tbl_campaigns');
						
			$data['formats'] = $this->data_model->getDataFormats( NULL );
			
			$data['subview'] = $this->load->view('admin/data/add_campaign', $data, TRUE);
	
	        $this->load->view('admin/_layout_main', $data); //page load
		}    
	}
	
	public function view_user_data( $active = NULL, $tabId = NULL ) { //echo 'Hello';die;
		
		$data['title'] = lang('all_campaign');
		$role = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('user_id'); 
		 
		if( 1 != $role ) { 
			$data['table_list'] = $this->data_model->getUserTableLists( $user_id );
			$data['campaign_data'] = array();
		//	print_r($data['table_list']); die;
			$data['campaign_data'] = $this->data_model->getcampaignList( $data['table_list'], $user_id );
			
			$arrCampaigns = array();
			$data['arrUserCampaigns'] = array();
			if( false == empty( $data['campaign_data'] )) {
				foreach( $data['campaign_data'] as $index => $arrUserData ) {
					foreach( $arrUserData as $campaign ) {
							$arrCampaigns[$campaign['campaign_id']] = $arrUserData;
					}	
					
				}
			}
			
			$count = 0;
			if( false == empty( $arrCampaigns )) {
				foreach( $arrCampaigns as $index => $userData ) {
					foreach( $userData as $key => $campaign_user ) {
						if( $index != $campaign_user['campaign_id'] ) {
							unset( $arrCampaigns[$index][$key] );
						}  
					}	
					
				}
			}
	
			if( false == empty( $arrCampaigns )) {
				foreach( $arrCampaigns as $index => $userData ) {
					foreach( $userData as $key => $campaign_user ) {
						if( $index == $campaign_user['campaign_id'] ) {
							$data['arrUserCampaigns'][$index] = $campaign_user;
						}  
					}	
					
				}
			}	
			
			$data['active'] = 1; // setting the first tab as active tab
			
			$data['subview'] = $this->load->view('admin/data/view_user_campaign', $data, TRUE);
		 
     		 $this->load->view('admin/_layout_main', $data); //page load
     		 
		} else { //die('else');
			$data['view'] = 'view';
			//$this->data_upload();
			$data['title'] = lang('all_campaign');
		// get permission user by menu id

	        $data['permission_user'] = $this->data_model->all_permission_user('70');
			$data['all_deposit_info'] = $this->data_model->get_permission('tbl_campaigns');
			
			$data['formats'] = $this->data_model->getDataFormats( NULL );
			
			//print_r( $data['formats'] ); die;
			if( true == isset( $active ) && true == isset( $tabId ) ) {
				$data['active'] = $tabId;
			} else {
				$data['active'] = 1; // setting the first tab as active tab
			}
			
			$data['subview'] = $this->load->view('admin/data/add_campaign', $data, TRUE);
	
	        $this->load->view('admin/_layout_main', $data); //page load
		}
	}

	public function add_column( $formatId = NULL )
	{
		if (!empty( $formatId )) {
			$data['title'] = lang('all_campaign');
			// get permission user by menu id
			
			$data['format_id'] = $formatId;
			$data['formats'] = $this->data_model->getDataFormats( $formatId );
			
			//print_r( $data['formats'] ); die;
			
			$data['subview'] = $this->load->view('admin/data/add_column', $data, TRUE);
	
	        $this->load->view('admin/_layout_main', $data); //page load
	    } else {
    		  redirect('custom/data/data_upload/active/3' );
    	}      
	}
	
	public function delete_column( $formatId , $column )
	{
		
		$data['title'] = lang('all_campaign');
		// get permission user by menu id
		
		$data['format_id'] = $formatId;
		$data['format_table'] = $this->data_model->fetchTableNameById( $formatId );
		$data = $this->data_model->delete_format_column( $data['format_table'], $column );
		
		if($data==true)
		{
		    $type = 'success';
            $message = lang('column_delete_success');
			
		}
        else
		{
			$type = 'error';
            $message = lang('column_delete_error');
		}	
		
        set_message($type, $message);

        redirect('custom/data/campaign_formats/'. $formatId );
	}
	
	public function edit_column( $formatId = NULL, $column = NULL )
	{
		if (!empty( $formatId ) && !empty( $column ) ) {
			
			$data['title'] = lang('all_campaign');
			// get permission user by menu id
			
			$data['format_id'] = $formatId;
			$data['column'] = $column;
			$data['formats'] = $this->data_model->getDataFormats( $formatId );
			
			$data['subview'] = $this->load->view('admin/data/edit_column', $data, TRUE);
	
	        $this->load->view('admin/_layout_main', $data); //page load
		} else {
    		  redirect('custom/data/data_upload/active/3' );
    	}       
        
	}
	
	public function update_column( $formatId )
	{
		$column = trim( $this->input->post('column_name') );
		$column = preg_replace('/\s+/', ' ',$column ); 
		 
		$columnName = strtolower(str_replace(' ', '_', $column )); 
		$old_column_name = $this->input->post('old_column_name');
		

		if( false == $this->data_model->checkFieldExist( $formatId, $columnName, $old_column_name ) ) {	
			
			$data['format_table'] = $this->data_model->fetchTableNameById( $formatId );
			$data['formats'] = $this->data_model->getDataFormats( $formatId );
			//print_r( $data['formats'] );die;
			$data = $this->data_model->edit_format_column( $data['format_table'], $old_column_name, $columnName );
			
			if($data==true)
			{
			    $type = 'success';
	            $message = lang('update_saved_success');
				
			}
	        else
			{
				$type = 'error';
	            $message = lang('update_save_error');
			}	
		} else {
			$type = 'error';
	        $message = 'Column name already exists.';
		}
        set_message($type, $message);

        redirect('custom/data/campaign_formats/'. $formatId );
	}
	
	public function data_allocation(){
		
		$data['title'] = lang('all_campaign');
		// get permission user by menu id
		$role = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('user_id'); 
		
		if( 1 != $role ) {
			//	print_r($data['table_list']); die;
			$data['campaign_data'] = $this->data_model->fetchcampaignList();
			
			$arrCampaigns = array();
			
			if( false == empty( $data['campaign_data'] )) {
				foreach( $data['campaign_data'] as $index => $arrUserData ) {
					foreach( $arrUserData as $campaign ) {
							$arrCampaigns[$campaign->campaign_id] = $arrUserData;
					}	
					
				}
			}
			
			$data['arrUserCampaigns'] = array();
			$count = 0;
			if( false == empty( $arrCampaigns )) {
				foreach( $arrCampaigns as $index => $userData ) {
					foreach( $userData as $key => $campaign_user ) {
						if( $index != $campaign_user->campaign_id ) {
							unset( $arrCampaigns[$index][$key] );
						}  
					}	
					
				}
			}
	
			
			if( false == empty( $arrCampaigns )) {
				foreach( $arrCampaigns as $index => $userData ) {
					foreach( $userData as $key => $campaign_user ) {
						if( $index == $campaign_user->campaign_id ) {
							$data['arrUserCampaigns'][$index] = $campaign_user;
						}  
					}	
					
				}
			}	
			
			$data['all_deposit_info'] = $data['arrUserCampaigns'];
			
			$data['active'] = 1; // setting the first tab as active tab
			
			$data['subview'] = $this->load->view('admin/data/view_campaigns', $data, TRUE);
		 

       		 $this->load->view('admin/_layout_main', $data); //page load
		} else {
	        $data['permission_user'] = $this->data_model->all_permission_user('73');
			$data['all_deposit_info'] = $this->data_model->get_permission('tbl_campaigns');
			
			//$data['active'] = 1; // setting the first tab as active tab
			
			$data['subview'] = $this->load->view('admin/data/view_campaigns', $data, TRUE);
	
	        $this->load->view('admin/_layout_main', $data); //page load
		}   
	}
	
	public function save_campaign()
	{
	
		 $campaign_value = trim( $this->input->post( 'campain_name' ) );
		 $campaign_value = preg_replace('/\s+/', ' ',$campaign_value); 
	    $campaign_value = strtolower( $campaign_value );
		 
		 if(!empty( $campaign_value ) ) {
			 
			 if( false == $this->data_model->checkCampaignExists( $campaign_value ) ) { 
				
			 
				$data = $this->data_model->save_campaignModel($_POST);
				
				if($data==true)
				{
					$type = 'success';
					$message = lang('campaign_saved_success');
					
				}
				else
				{
					$type = 'error';
					$message = lang('campaign_saved_error');
				}
			 } else {
				
					$type = 'error';
					$message = 'Campaign name already exists.';
			 }
		 } else {
			 $type = 'error';
		    $message = 'Campaign name is empty.';
		 }		
        set_message($type, $message);

        redirect('custom/data/data_upload/');
	}
	
	public function save_data_format()
	{
		
		$format_value = trim( $this->input->post( 'table_name' ) );
		$format_value = preg_replace('/\s+/', ' ',$format_value);
		$format_value = strtolower(str_replace(' ', '_', $format_value ));
		$format_value = 'tbl_'.$format_value;
		
		if(!empty( $format_value ) ) {
			 if( false == $this->data_model->checkTableExists( $format_value ) ) {
				 
				$data = $this->data_model->save_camapign_data($_POST);
				
				if($data == true)
				{
					 $type = 'success';
				   $message = lang('format_saved_success');
					
				}else {
					$type = 'error';
				 $message = lang('format_saved_error');
				}	
			
			 } else {
				$type = 'error';
				 $message = 'Table name already exists.';
			 }
		} else {
			 $type = 'error';
		    $message = 'Format name is empty.';
		}	 
		 	
        set_message($type, $message);

        redirect('custom/data/data_upload/active/3');
	}
	
	public function save_column( $formatId )
	{
		$format_id = $this->input->post( 'format_id' );
		
		$data['formats'] = $this->data_model->getDataFormats( $formatId );
		$data = $this->data_model->save_column($_POST, $data['formats']);
		
		if($data == true)
		{
		     $type = 'success';
           	  $message = lang('column_saved_success');
			
		} else {
			$type = 'error';
            $message = lang('column_saved_error');
		}	
		
        set_message($type, $message);

        redirect('custom/data/add_column/'. $formatId);
	}
	
	public function delete_campaign()
	{
		$id=$this->uri->segment(4);
		$data = $this->data_model->delete_campaignModel($id);
		
		if($data==true)
		{
		    $type = 'success';
            $message = "Campaign Deleted Successfully";
			
		}
        else
		{
			$type = 'error';
            $message = "Campaign Id Does Not Exists";
		}	
		
        set_message($type, $message);

        redirect('custom/data/data_upload/');
		
	}
	
	public function upload_campaign_file($id)
    {
        $data['user_id'] = $id; 
        $data['modal_subview'] = $this->load->view('admin/data/campaign_upload_modal', $data, FALSE);
        $this->load->view('admin/_layout_modal', $data);

    }
	
	public function assign_campaign_data( $campaign_id, $format_id, $id = NULL )
    {
     
		$data['campaign_id'] = $campaign_id;
		$data['format_id'] = $format_id;
		
   		if( false == is_null( $id ) ) {
   			
   			$data['id'] = ( 'unallocate' != $id && 'allocate' != $id ) ? (int) $id : $id;
		} 
		
		$data['table_name'] = $this->data_model->fetchTableNameById( $format_id );
		 
		//$data['assign_user'] = $this->data_model->allowad_user('73');
		//$data['permission_user'] = $this->data_model->all_permission_user('70');
		//$data['campaign_info'] = $this->data_model->get_permission( $data['table_name']);
		$this->load->model('user_model');
		$user_id = $this->session->userdata('user_id');  
		$data['users'] = $this->user_model->select_user_by_role_id( 3, $user_id );
		
        $data['modal_subview'] = $this->load->view('admin/data/assign_campaign_data', $data, FALSE);
		
        $this->load->view('admin/_layout_modal', $data);

    }
    
	public function add_comment( $format_id, $campaign_id, $id )
    {
     
		$data['campaign_id'] = $campaign_id;
		$data['format_id'] = $format_id;
		$data['id'] = $id;
		$data['show'] = 'add';

		$data['format_table'] = $this->data_model->fetchTableNameById( $data['format_id'] );
		$data['campaign_data'] = $this->data_model->get_campaign_data_by_tables_by_campaign_id_by_id( $data['format_table'], $campaign_id, $id );
		
        $data['modal_subview'] = $this->load->view('admin/data/add_comment', $data, FALSE);
		
        $this->load->view('admin/_layout_modal', $data);

    }
    
	public function view_comment( $format_id, $campaign_id, $id )
    {
     
		$data['campaign_id'] = $campaign_id;
		$data['format_id'] = $format_id;
		$data['id'] = $id;
		$data['show'] = 'view';
		
		$data['format_table'] = $this->data_model->fetchTableNameById( $data['format_id'] );
		$data['campaign_data'] = $this->data_model->get_campaign_data_by_tables_by_campaign_id_by_id( $data['format_table'], $campaign_id, $id );
		
        $data['modal_subview'] = $this->load->view('admin/data/add_comment', $data, FALSE);
		
        $this->load->view('admin/_layout_modal', $data);

    }
    
	public function assign_user_campaign_data( $campaign_id, $format_id, $id = NULL )
    {
      
		$data['campaign_id'] = $campaign_id;
		$data['format_id'] = $format_id;
		if( false == is_null( $id )) {
			$data['id']	= $id;
		}
		$data['table_name'] = $this->data_model->fetchTableNameById( $format_id );
		 
		$data['assign_user'] = $this->data_model->allowad_user('73');
		$data['permission_user'] = $this->data_model->all_permission_user('70');
		$data['campaign_info'] = $this->data_model->get_permission( $data['table_name']);
		$this->load->model('user_model');
		$user_id = $this->session->userdata('user_id'); 
		$data['users'] = $this->user_model->select_user_by_role_id( 3, $user_id );
		  
        $data['modal_subview'] = $this->load->view('admin/data/assign_user_campaign_data', $data, FALSE);
		
        $this->load->view('admin/_layout_modal', $data);

    }
	
	public function unallocate_data( $campaign_id, $format_id )
    {
    
		$data['campaign_id'] = $campaign_id;
		$data['format_id'] = $format_id;
		
		$data['table_name'] = $this->data_model->fetchTableNameById( $format_id );
		 
		//$data['assign_user'] = $this->data_model->allowad_user('73');
		//$data['permission_user'] = $this->data_model->all_permission_user('70');
		//$data['campaign_info'] = $this->data_model->get_permission( $data['table_name']);
				
		$data = $this->data_model->remove_user_data($_POST,$campaign_id, $data['table_name']);
		
		if($data == true)
		{
		     $type = 'success';
             $message = lang('data_allocated_success');
			
		}else {
			$type = 'error';
         $message = lang('data_allocated_error');
		}	
		
        set_message($type, $message);

        redirect('custom/data/data_allocation/');
		  
       // $data['modal_subview'] = $this->load->view('admin/data/assign_user_campaign_data', $data, FALSE);
		
   }
    
	public function assign_data_user( $campaign_id, $format_id )
    {
		
		
    	$data['campaign_id'] = $campaign_id;

		$data['table_name'] = $this->data_model->fetchTableNameById( $format_id );
		 
		if( true == isset( $_POST['selected_id'] ) ) {
			
			$data = $this->data_model->save_camapign_user_data($_POST,$campaign_id, $data['table_name']);
			
			if($data == true)
			{ 	
				$type = 'success';
				 if( $this->data_model->save_user_table( $this->input->post('user_id'), $format_id )) {
					
			     	if( 'unallocate' == $this->input->post('allocate_id') ) { 
	             		$message = lang('data_allocated_success');
			     	}	
					if( 'allocate' == $this->input->post('allocate_id') ) {
	             		$message = lang('data_changed_user_success');
			     	}
				 	if( 'unallocate' !=  $this->input->post('allocate_id') && 'allocate' != $this->input->post('allocate_id')  && '' == $this->input->post('allocate_id' )) {
				 	
	             		$message = lang('unallocated_success');
			     	}
			     	if( 'unallocate' !=  $this->input->post('allocate_id') && 'allocate' != $this->input->post('allocate_id')  && '' !=  $this->input->post('allocate_id' )) {
						
			     		$message = "User has been changed for data successfully";
			     	}
			     	
				 }
				
			} else {
				
				$type = 'error';
				if( 'allocate' == $this->input->post('allocate_id') ) {
	         		$message = lang('data_allocated_error');
				}	
	         	if( 'unallocate' == $this->input->post('allocate_id') ) {
					$message = lang('data_changed_user_error');
				}	
				if( 'unallocate' !=  $this->input->post('allocate_id') && 'allocate' != $this->input->post('allocate_id') ) {
	             	//$message = lang('unallocated_error');
						$message = 'Data unallocated successfully';
			     }
			}	
		} else {
			$type = 'error';
			$message = lang('select_error');
		}
	
        set_message($type, $message);
    	
        redirect('custom/data/view_data/allocate/'. $format_id .'/'.$campaign_id);
        
   }
	
	public function upload_campaign($id = NULL)
    {
    	if (!empty($id)) {
			$data['campaign_id'] = $id; 
			$data['title'] = lang('all_campaign');
			// get permission user by menu id
	
	     	//$data['permission_user'] = $this->data_model->all_permission_user('70');
			//$data['all_deposit_info'] = $this->data_model->get_permission('tbl_campaigns');
			$data['formats'] = $this->data_model->getDataFormats( NULL );
			
			$data['active'] = 1; // setting the first tab as active tab
			$data['subview'] = $this->load->view('admin/data/upload_campaign', $data, TRUE);
	
	       $this->load->view('admin/_layout_main', $data); //page load
    	} else {
    		  redirect('custom/data/data_upload/' );
    	}   

    }
	
	public function campaign_list($id, $campaign_id = NULL )
    {
		if (!empty($id)) {
    	
			if( 'allocate' == $id ) {
				$data['allocate']	= 'allocate';
				$data['campaign_id'] = $campaign_id = ( int) $campaign_id; 
			} else {
				$data['allocate']	= 'upload';
				 $data['campaign_id'] = $campaign_id = ( int) $id; 
			}	
			$data['title'] = lang('all_campaign');
			// get permission user by menu id
	
	      	$data['permission_user'] = $this->data_model->all_permission_user('70');
			$data['all_deposit_info'] = $this->data_model->get_permission('tbl_campaigns');
			
			$data['campaign_info'] = $this->data_model->get_files_by_campaign_id(  $data['campaign_id'] );
			
			$data['subview'] = $this->load->view('admin/data/campaign_list', $data, TRUE);
	
	        $this->load->view('admin/_layout_main', $data); //page load
        } else {
    		  redirect('custom/data/data_upload/' );
    	} 

    }
    
	public function data_campaign_formats($id = NULL, $campaign_id = NULL )
    {
    	if (!empty($id)) {
			if( 'allocate' == $id ) {
				$data['allocate']	= 'allocate';
				$data['campaign_id'] = $campaign_id = ( int) $campaign_id; 
			} else {
				$data['allocate']	= 'upload';
				 $data['campaign_id'] = $campaign_id = ( int) $id; 
			}	
			$data['title'] = lang('all_campaign');
			// get permission user by menu id
	
	      	$data['permission_user'] = $this->data_model->all_permission_user('70');
			$data['all_deposit_info'] = $this->data_model->get_permission('tbl_campaigns');
			
			$data['campaign_info'] = $this->data_model->get_files_by_campaign_id(  $data['campaign_id'] );
			
			$data['subview'] = $this->load->view('admin/data/view_campaign_list', $data, TRUE);
	
	        $this->load->view('admin/_layout_main', $data); //page load
	   } else {
    	    redirect('custom/data/view_user_data/' );
       }      

    }
	
	public function view_data( $id = NULL, $campaign_id = NULL, $c_id = NULL )
    {
    	if (!empty($id)) {
    		
	    	$data['title'] = lang('all_campaign');
	    	
			if( 'allocate' == $id ) {
				$data['allocate']	= 'allocate';
				$data['format_id'] = $format_id = ( int) $campaign_id; 
				$data['campaign_id'] = $campaign_id = ( int) $c_id; 
			} else {
				$data['format_id'] = $format_id = ( int) $campaign_id; 
				$data['campaign_id'] = $campaign_id = ( int) $c_id;  
			}	
			if (!empty($campaign_id) && !empty($campaign_id) ) {
			
				// get permission user by menu id
		    	
				$data['active'] = 1; // setting the first tab as active tab
				
				$data['format_table'] = $this->data_model->fetchTableNameById( $data['format_id'] );
				$data['columns'] = array();
				if( 'unallocate' == $id ) {
					$data['columns'] = $this->data_model->fetchColumnNamesByTableName( $data['format_table'] );
				} elseif( 'allocate' == $id ){
					$data['columns'] = $this->data_model->fetchColumnNamesByTableName( $data['format_table'] );
				} else {
					$data['columns'] = $this->data_model->fetchColumnNamesByTableName( $data['format_table'] );
				}
				
				//$data['campaign_data'] = $this->data_model->get_campaign_data_by_format_table( $data['campaign_id'], $data['format_table'] );
				/*$data['columns'] = array();
				
				if( is_array( $data['columns'] ) && !empty( $data['columns'] ) ) {
					unset($data['columns'][array_search('campaign_id', $data['columns'])],
						$data['columns'][array_search('user_id', $data['columns'])],
						$data['columns'][array_search('leads_id', $data['columns'])]);
				}	*/	
					
				/*$data['unallocated_data']	= array();
				$data['allocated_data']		= array();
		   		
				foreach($data['campaign_data'] as $key => $row ) {
					if( false == empty( $row->user )) {
						$data['allocated_data'][]	= $row;
					} else {
						$data['unallocated_data'][]	= $row;
					}
					    
				}*/
				
				
				if( true == is_array( $data['columns'] ) && false == empty( $data['columns'] ) ) {	
					$data['columns'][] = 'user';
					unset($data['columns'][array_search('campaign_id', $data['columns'])],
					$data['columns'][array_search('user_id', $data['columns'])],
					$data['columns'][array_search('leads_id', $data['columns'])]);
					
					/*foreach( $data['campaign_data'] as $indexKey => $campaign_data ) {
						unset(	$campaign_data->campaign_id );
						unset(	$campaign_data->user_id );
						unset(	$campaign_data->leads_id );
						
					}*/
		
				}	
				
				if( 'allocate' != $id ) {
					$data['subview'] = $this->load->view('admin/data/view_campaign_data', $data, TRUE);
				} else {
					// $data['campaign_id'] = $campaign_id;
				  $data['table_name'] = $this->data_model->fetchTableNameById( $format_id );
				
				  $this->load->model('user_model');
				  $user_id = $this->session->userdata('user_id'); 
				  $data['users'] = $this->user_model->select_user_by_role_id( 3, $user_id );
				
				  //$data['subview'] = $this->load->view('admin/data/allocate_campaign_data', $data, TRUE);
				 $data['subview'] = $this->load->view('admin/data/campaign_data', $data, TRUE);
				
			  }
		      $this->load->view('admin/_layout_main', $data); //page load
		  } else {
		  		redirect('custom/data/data_allocation/' );
		  }   
	   } else {
    		  redirect('custom/data/data_allocation/' );
        }    

   }
   
	public function view_get_data( $id = NULL, $campaign_id = NULL, $c_id = NULL )
    {
    	if (!empty($id)) {
    		
	    	$data['title'] = lang('all_campaign');
	    	
			if( 'unallocate' == $id || 'allocate' == $id ) {
				
				$data['allocate']	= 'allocate';
				$data['format_id'] = $format_id = ( int) $campaign_id; 
				$data['campaign_id'] = $campaign_id = ( int) $c_id; 
				
			} else {

				$data['format_id'] = $format_id = ( int) $campaign_id; 
				$data['campaign_id'] = $campaign_id = ( int) $c_id; 
				 
			}	
			if (!empty($campaign_id) && !empty($campaign_id) ) {
			
				// get permission user by menu id
		    	
				$data['active'] = 1; // setting the first tab as active tab
				
				$data['format_table'] = $this->data_model->fetchTableNameById( $data['format_id'] );
				if( 'unallocate' == $id ) {
					
					$data['campaign_data'] = $this->data_model->get_campaign_unallocated_data_by_format_table( $data['campaign_id'], $data['format_table'] );
					
				} elseif( 'allocate' == $id ){
					
					$data['campaign_data'] = $this->data_model->get_campaign_allocated_data_by_format_table( $data['campaign_id'], $data['format_table'] );
					
				} else {
					$data['campaign_data'] = $this->data_model->get_campaign_data_by_format_table( $data['campaign_id'], $data['format_table'] );
				}
				
				//$list = $this->data_model->get_datatables();
				$data['columns_values'] 	= array();
				$data['unallocated_data']	= array();
				$data['allocated_data']		= array();
				
				/*$data['columns'] = array();
				if( true == is_array( $data['campaign_data'] ) && false == empty( $data['campaign_data'] ) ) {	
					foreach( $data['campaign_data'][0] as $indexKey => $campaign_data ) {
						
						$data['columns'][] = $indexKey;
					}
					
					
					unset($data['columns'][array_search('campaign_id', $data['columns'])],
					$data['columns'][array_search('user_id', $data['columns'])],
					$data['columns'][array_search('leads_id', $data['columns'])]);
					
				} */	
				
				if( true == is_array( $data['campaign_data'] ) && false == empty( $data['campaign_data'] ) ) {	
						
					foreach( $data['campaign_data'] as $indexKey => $campaign_data ) {
						
						foreach( $campaign_data as $columnKey => $values ) {
						
							if( 'user' == $columnKey &&  empty( $values ) ) {
								$values = 'U/A'; 
							} 
					
							if( false == in_array($columnKey, array('campaign_id', 'user_id', 'leads_id') ) ) {		
								$data['columns_values'][$indexKey][] = $values;
							}
						}
						
						if( 'unallocate' == $id || 'allocate' == $id ) {
							unset(	$campaign_data['campaign_id'] );
							unset(	$campaign_data['user_id'] );
							unset(	$campaign_data['leads_id'] );
								
							if( !empty( $campaign_data['user'] )) {
									
								foreach( $campaign_data as $columnKey => $values ) {
									$data['allocated_data'][$indexKey][]	= $values;
								}
								
							} else {
								
								foreach( $campaign_data as $columnKey => $values ) {
									if( 'user' == $columnKey && empty( $values )) {
										$values = 'U/A'; 
									}
									$data['unallocated_data'][$indexKey][]	= $values;
								}
							}
						}
					}
				}	
				
				if( 'unallocate' == $id ) {
					
					foreach( $data['unallocated_data'] as $columnKey => $values ) {
						array_unshift( $data['unallocated_data'][$columnKey], $values[0] );
					}
					$data['draw']	 = isset( $_POST['draw'] ) ? $_POST['draw'] : '';
					$data['recordsTotal']		= $this->data_model->count_all_unallocated( $data['campaign_id'], $data['format_table'], '0' );
					$data['recordsFiltered']	= $this->data_model->count_unallocated_filtered( $data['campaign_id'], $data['format_table'] );
					
 			  		echo json_encode(  array(  "draw" => $data['draw'], "recordsTotal" => $data['recordsTotal'], "recordsFiltered" => $data['recordsFiltered'],"data" => array_values( $data['unallocated_data']) ));
 			  		 
				} elseif( 'allocate' == $id ){
					
					foreach( $data['allocated_data'] as $columnKey => $values ) {
						array_unshift( $data['allocated_data'][$columnKey], $values[0] );
					}
					$data['draw']	 = isset( $_POST['draw'] ) ? $_POST['draw'] : '';
					$data['recordsTotal']		= $this->data_model->count_all_allocated( $data['campaign_id'], $data['format_table'], '0' );
					$data['recordsFiltered']	= $this->data_model->count_allocated_filtered( $data['campaign_id'], $data['format_table'] );
					
					//echo json_encode(  array(  $data['draw'], "recordsTotal" => $data['recordsTotal'], "recordsFiltered" => $data['recordsFiltered'], "data" => array_values( $data['allocated_data']))); 
					echo json_encode(  array( "draw" => $data['draw'], "recordsTotal" => $data['recordsTotal'], "recordsFiltered" => $data['recordsFiltered'], "data" => array_values( $data['allocated_data'])));
					
				} else {
					
					$data['draw']	 = isset( $_POST['draw'] ) ? $_POST['draw'] : '';
					$data['recordsTotal']		= intval( $this->data_model->count_all( $data['campaign_id'], $data['format_table'] ) );
					$data['recordsFiltered']	= intval( $this->data_model->count_filtered( $data['campaign_id'], $data['format_table'] ) );
					//echo json_encode( array( "draw" => $data['draw'], "recordsTotal" => $data['recordsTotal'], "recordsFiltered" => $data['recordsFiltered'], "data" => array_values( $data['columns_values']) )); 
					echo json_encode( array( "draw" => $data['draw'], "recordsTotal" => $data['recordsTotal'], "recordsFiltered" => $data['recordsFiltered'], "data" => array_values( $data['columns_values']) ));
				}	
		  } 
	   }    

   }
   
	public function show_data( $id = NULL, $campaign_id = NULL, $c_id = NULL )
    {
    	if (!empty($id)) {
	    	$data['title'] = lang('all_campaign');
	    	
			if( 'allocate' == $id ) {
				$data['allocate']	= 'allocate';
				$data['format_id'] = $format_id = ( int) $campaign_id; 
				$data['campaign_id'] = $campaign_id = ( int) $c_id; 
			} else {
				$data['format_id'] = $format_id = ( int) $campaign_id; 
				$data['campaign_id'] = $campaign_id = ( int) $c_id;  
			}	
			
			if ( !empty( $campaign_id ) && !empty( $c_id ) ) {
			// get permission user by menu id
	    	
				$data['active'] = 1; // setting the first tab as active tab
				
				$data['format_table'] = $this->data_model->fetchTableNameById( $data['format_id'] ); 
				//$data['campaign_data'] = $this->data_model->get_campaign_data_by_format_table( $data['campaign_id'], $data['format_table'] );
				$data['columns'] = $this->data_model->fetchColumnNamesByTableName( $data['format_table'] );
		   					
				if( true == is_array( $data['columns'] ) && false == empty( $data['columns'] ) ) {	
					$data['columns'][] = 'user';
					unset($data['columns'][array_search('campaign_id', $data['columns'])],
					$data['columns'][array_search('user_id', $data['columns'])]);
				}	
				
				if( 'allocate' != $id ) {
					$data['subview'] = $this->load->view('admin/data/show_campaign_data', $data, TRUE);
				} else {
					// $data['campaign_id'] = $campaign_id;
				  $data['table_name'] = $this->data_model->fetchTableNameById( $format_id );
				
				  $this->load->model('user_model');
				  $user_id = $this->session->userdata('user_id'); 
				  $data['users'] = $this->user_model->select_user_by_role_id( 3, $user_id );
				
				  //$data['subview'] = $this->load->view('admin/data/allocate_campaign_data', $data, TRUE);
				 $data['subview'] = $this->load->view('admin/data/campaign_data', $data, TRUE);
				
				}
		        $this->load->view('admin/_layout_main', $data); //page load
			} else {
				redirect('custom/data/view_user_data/' );
			}    
	   } else {
    		  redirect('custom/data/view_user_data/' );
       }        

   }
   
	public function get_show_data( $id = NULL, $campaign_id = NULL, $c_id = NULL )
    {
    	if (!empty($id)) {
	    	$data['title'] = lang('all_campaign');
	    	
			if( 'allocate' == $id ) {
				$data['allocate']	= 'allocate';
				$data['format_id'] = $format_id = ( int) $campaign_id; 
				$data['campaign_id'] = $campaign_id = ( int) $c_id; 
			} else {
				$data['format_id'] = $format_id = ( int) $campaign_id; 
				$data['campaign_id'] = $campaign_id = ( int) $c_id;  
			}	
			if ( !empty( $campaign_id ) && !empty( $c_id ) ) {
			// get permission user by menu id
	    	
				$data['active'] = 1; // setting the first tab as active tab
				
				$data['format_table'] = $this->data_model->fetchTableNameById( $data['format_id'] ); 
				$data['campaign_data'] = $this->data_model->get_campaign_data_by_format_table( $data['campaign_id'], $data['format_table'] );
				
				$data['columns_values'] 	= array();
				
				if( true == is_array( $data['campaign_data'] ) && false == empty( $data['campaign_data'] ) ) {	

					foreach( $data['campaign_data'] as $indexKey => $campaign_data ) {
					
						foreach( $campaign_data as $columnKey => $values ) {
							
							if( 'user' == $columnKey &&  empty( $values ) ) {
								$values = 'U/A'; 
							} 
					
							if( false == in_array($columnKey, array('campaign_id', 'user_id' ) ) ) {		
								$data['columns_values'][$indexKey][] = $values;
							}
							
						}
					}
				}	
				$data['draw']	 = isset( $_POST['draw'] ) ? $_POST['draw'] : '';
				$data['recordsTotal']		= $this->data_model->count_all( $data['campaign_id'], $data['format_table']);
				$data['recordsFiltered']	= $this->data_model->count_filtered( $data['campaign_id'], $data['format_table'] );
			
				echo json_encode( array( "draw" => $data['draw'], "recordsTotal" => $data['recordsTotal'], "recordsFiltered" => $data['recordsFiltered'], "data" => array_values( $data['columns_values'] ) )); 
			}  
    	} 
   }
   
	public function view_allocated_data( $format_id = NULL, $campaign_id = NULL )
    {
    	if ( !empty( $format_id ) && !empty( $campaign_id ) ) {
			$data['title'] = lang('all_campaign');
			// get permission user by menu id
			$data['active'] = 1; // setting the first tab as active tab
			$data['format_id'] 	= $format_id;
			$data['campaign_id'] = $campaign_id;
			$user_id = $this->session->userdata('user_id'); 
			$data['format_table'] = $this->data_model->fetchTableNameById( $format_id );
			
			//$data['campaign_data'] = $this->data_model->get_campaign_data_by_tables_by_campaign_id_by_user_id( $data['format_table'], $campaign_id, $user_id );
			$data['columns'] = array();
			$data['columns'] = $this->data_model->fetchColumnNamesByTableName( $data['format_table'] );
		   					
			if( true == is_array( $data['columns'] ) && false == empty( $data['columns'] ) ) {	
				//$data['columns'][] = 'user';
				unset($data['columns'][array_search('campaign_id', $data['columns'])],
				$data['columns'][array_search('user_id', $data['columns'])],
				$data['columns'][array_search('comments', $data['columns'])],
				$data['columns'][array_search('leads_id', $data['columns'])]
				);
				
				$data['columns'][] = 'comments';
				$data['columns'][] = 'leads_id';
			}	
			
			/*if( true == is_array( $data['campaign_data'] ) && false == empty( $data['campaign_data'] ) ) {	
				foreach( $data['campaign_data'][0] as $indexKey => $campaign_data ) {
					
					$data['columns'][] = $indexKey;
				}
				unset($data['columns'][1],
				$data['columns'][array_search('user_id', $data['columns'])] );
			
				foreach( $data['campaign_data'] as $indexKey => $campaign_data ) {
					unset(	$campaign_data->campaign_id );
					unset(	$campaign_data->user_id );
				}
			}	*/
    		
			/*if ( true == in_array("id", $data['columns'] ) && true == in_array("leads_id", $data['columns'] ) && 2 == count( $data['columns'] ) ) {
			  	$data['columns'] 		= array();
			}*/
			
		    $data['subview'] = $this->load->view('admin/data/view_user_campaign_data', $data, TRUE);
	        $this->load->view('admin/_layout_main', $data); //page load
	        
	    } else {
    		  redirect('custom/data/view_user_data/' );
    	}       

   }
   
	public function get_user_data( $format_id = NULL, $campaign_id = NULL )
    {
    	if ( !empty( $format_id ) && !empty( $campaign_id ) ) {
    		
			$data['title'] = lang('all_campaign');
			// get permission user by menu id
			$data['active'] = 1; // setting the first tab as active tab
			$data['format_id'] 	= $format_id;
			$data['campaign_id'] = $campaign_id;
			$user_id = $this->session->userdata('user_id'); 
			$data['format_table'] = $this->data_model->fetchTableNameById( $format_id ); 
						
			$data['campaign_data'] = $this->data_model->get_campaign_data_by_tables_by_campaign_id_by_user_id( $data['format_table'], $campaign_id, $user_id );
			
			$data['columns_values'] 	= array();
			
			if( true == is_array( $data['campaign_data'] ) && false == empty( $data['campaign_data'] ) ) {	
			
				foreach( $data['campaign_data'] as $indexKey => $campaign_data ) {
					
					foreach( $campaign_data as $columnKey => $values ) {

						if( 'user' == $columnKey &&  empty( $values ) ) {
							$values = 'U/A'; 
						} 
						if( 'companyname' == $columnKey &&  !empty( $values ) ) {
							$values = str_replace(',', '', $values);; 
						} 
				
						if( false == in_array($columnKey, array('campaign_id', 'user_id' ) ) ) {		
							$data['columns_values'][$indexKey][] = $values;
						}
					}
				}
			}	
			
    		$user_id = $this->session->userdata('user_id'); 
			$data['draw']	 = isset( $_POST['draw'] ) ? $_POST['draw'] : '';
			$data['recordsTotal']		= $this->data_model->count_all( $data['campaign_id'], $data['format_table'], $user_id );
			$data['recordsFiltered']	= $this->data_model->count_user_filtered( $data['campaign_id'], $data['format_table'], $user_id );
			
				echo json_encode( array( "draw" => $data['draw'], "recordsTotal" => $data['recordsTotal'], "recordsFiltered" => $data['recordsFiltered'], "data" => array_values( $data['columns_values'] ) )); 
			//echo json_encode( array( "data" => array_values( $data['columns_values'] ) )); 
	    }
   }
   
	function insertBefore($input, $index, $element) {
		
	    if (!array_key_exists($index, $input)) {
	        throw new Exception("Index not found");
	    }
	    $tmpArray = array();
	    $originalIndex = 0;
	    foreach ($input as $key => $value) {
	        if ($key === $index) {
	            $tmpArray[] = $element;
	            break;
	        }
	        $tmpArray[$key] = $value;
	        $originalIndex++;
	    }
	    array_splice($input, 0, $originalIndex, $tmpArray);
	    return $input;
	}

	public function save_user_comment()
    {
    	//echo $format_id.' : '.$id.' : '. $value;
    	//die;
    	$format_id 		= $this->input->post('format_id');
    	$campaign_id 	= $this->input->post('campaign_id');
    	$id 			= $this->input->post('id');
    	$value 			= $this->input->post('value');
    	
		//$data['campaign_id'] = $campaign_id;
		$user_id = $this->session->userdata('user_id'); 

		if( true == $this->data_model->save_user_data( $id, $format_id, $campaign_id, $value ) ) {
			echo 'true';die;
		} else {
			echo 'false';die;
		}
   }
   
	public function view_allocated_formats( $campaign_id = NULL )
    {
    	if (!empty($campaign_id)) {
			$data['title'] = lang('all_campaign');
			// get permission user by menu id
			$data['active'] = 1; // setting the first tab as active tab
			
			$data['campaign_id'] = $campaign_id;
			$user_id = $this->session->userdata('user_id'); 
	
			$data['table_list'] = $this->data_model->getUserTableDetails( $user_id );
			
			$data['campaign_info'] = $this->data_model->getUserFormatList( $data['table_list'], $user_id, $data['campaign_id'] );
			
		    $data['subview'] = $this->load->view('admin/data/allocated_campaign_list', $data, TRUE);
			
		
	      $this->load->view('admin/_layout_main', $data); //page load
       } else {
       		redirect('custom/data/view_user_data/' );
       }   

   }
	
	public function allocate_data( $id, $campaign_id )
    {
		$data['format_id'] = $format_id = ( int) $id; 
		$data['campaign_id'] = $campaign_id = ( int) $campaign_id; 
		
		$data['title'] = lang('all_campaign');
		// get permission user by menu id

      $data['permission_user'] = $this->data_model->all_permission_user('70');
		$data['all_deposit_info'] = $this->data_model->get_permission('tbl_campaigns');
		
		$data['format_table'] = $this->data_model->fetchTableNameById( $format_id );
				
		$data['campaign_data'] = $this->data_model->get_campaign_data_by_format_table( $campaign_id, $data['format_table'] );
		
		$data['columns'] = array();
			
		foreach( $data['campaign_data'][0] as $indexKey => $campaign_data ) {
			
			$data['columns'][] = ucfirst( $indexKey );
		}
		//unset($data['columns'][0],$data['columns'][1]);
		
		$data['subview'] = $this->load->view('admin/data/allocate_campaign_data', $data, TRUE);

      $this->load->view('admin/_layout_main', $data); //page load

   }
   
    public function create_leads( $format_id = NULL, $campaign_id = NULL, $id = NUll ){
		
    	if ( !empty( $format_id ) && !empty( $campaign_id ) && !empty( $id ) ) {
    		
	   		$data['format_id'] 	= $format_id;
			$data['campaign_id'] = $campaign_id;
			$data['id'] = $id;
			$user_id = $this->session->userdata('user_id'); 
			$data['format_table'] = $this->data_model->fetchTableNameById( $format_id );
			
			$data['campaign_data'] = $this->data_model->get_campaign_data_by_tables_by_campaign_id_by_user_id_by_id( $data['format_table'], $campaign_id, $user_id, $id );
	   		$data['columns'] = array();
			
			if( true == is_array( $data['campaign_data'] ) && false == empty( $data['campaign_data'] ) ) {	
				foreach( $data['campaign_data'][0] as $indexKey => $campaign_data ) {
					
					$data['columns'][] = $indexKey;
				}
				unset($data['columns'][1],
				$data['columns'][array_search('user_id', $data['columns'])],
				$data['columns'][array_search('leads_id', $data['columns'])] );
			
				foreach( $data['campaign_data'] as $indexKey => $campaign_data ) {
					unset(	$campaign_data->campaign_id );
					unset(	$campaign_data->user_id );
					unset(	$campaign_data->leads_id );
				}
			}	
			
			$data['title'] = lang('all_campaign');
	   		$this->load->model('items_model');
	   		
	   		// get all leads status
	        // $data['title'] = lang('all_leads');
	        /*if (!empty($id)) {
	            $data['active'] = 2;
	            $can_edit = $this->items_model->can_action('tbl_leads', 'edit', array('leads_id' => $id));
	            if (!empty($can_edit)) {
	               // $data['leads_info'] = $this->items_model->check_by(array('leads_id' => $id), 'tbl_leads');
	            }
	        } else {*/
	            $data['active'] = 1;
	        /* } */
	        // get all leads status
	        $status_info = $this->db->get('tbl_lead_status')->result();
	        if (!empty($status_info)) {
	            foreach ($status_info as $v_status) {
	                $data['status_info'][$v_status->lead_type][] = $v_status;
	            }
	        }
	        $data['assign_user'] = $this->items_model->allowad_user('55');
	        $data['all_leads'] = $this->items_model->get_permission('tbl_leads');
	        
	        $data['subview'] = $this->load->view('admin/data/create_lead', $data, TRUE);
	
	      $this->load->view('admin/_layout_main', $data); //page load
	      
	   } else {
    		  redirect('custom/data/view_user_data/' );
       }     
   	
   }
	public function campaign_formats( $id = NULL, $campaign_id = NULL ){
		
		if (!empty($id)) {
			$format_id = ( int) $id; 
			
			$data['title'] = lang('all_campaign');
			// get permission user by menu id
			$data['format_id'] = $format_id;
			$data['campaign_id'] = $campaign_id;
	       // $data['permission_user'] = $this->data_model->all_permission_user('70');
			//$data['all_deposit_info'] = $this->data_model->get_permission('tbl_campaigns');
			
			$data['format_table'] = $this->data_model->fetchTableNameById( $format_id );
					
			$data['table_format'] = $this->data_model->fetchColumnByTableName( $data['format_table'] );
			
			$data['subview'] = $this->load->view('admin/data/view_format', $data, TRUE);
	
	     	$this->load->view('admin/_layout_main', $data); //page load
		} else {
    		  redirect('custom/data/data_upload/active/3' );
    	}   	
	}
					
	public function saveCampainFromExcel()
	{
		//load the excel library
		
	
		$campaign_id = $this->uri->segment(4);
		
        $this->load->library('excel');

        ob_start();
           
        if( true != empty( $_FILES["camp_file"]["name"] ) ) {
        	
       
        $file = $_FILES["camp_file"]["tmp_name"];

        $valid = false;

        $types = array('Excel2007', 'Excel5');

        foreach ($types as $type) {

            $reader = PHPExcel_IOFactory::createReader($type);

            if ($reader->canRead($file)) {

                $valid = true;

            }

        }

        if ( true != empty( $valid ) ) {

            try {

                $objPHPExcel = PHPExcel_IOFactory::load($file);
                

            } catch (Exception $e) {

                die("Error loading file :" . $e->getMessage());

            }
				
			if (  true != empty( $_FILES['camp_file']['name'] ) ) {  
					 
				$val = $this->data_model->uploadAllType('camp_file');
            }
			
            //All data from excel

            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
			
			$format_Id = $_POST['format_type'];
			
			$table_name = $this->data_model->fetchTableNameById( $format_Id );
			$data_format['formats'] = $this->data_model->fetchColumnNamesByTableName( $table_name );
			
			unset($data_format['formats'][array_search('id', $data_format['formats'])], $data_format['formats'][array_search('campaign_id', $data_format['formats'])],
			$data_format['formats'][array_search('user_id', $data_format['formats'])],
			$data_format['formats'][array_search('leads_id', $data_format['formats'])]  );
			
				
			$this->data_model->_table_name = $table_name;
			$this->data_model->_primary_key = $format_Id;
			
			 $tableFieldsCount = count( $data_format['formats'] );
						
			if(true == is_array( $sheetData ) && true == isset( $sheetData['1'] )) {
				$sheetData['1'] = array_filter($sheetData['1'], function($val){
				    return !is_null($val);
				});
				
			}
			
			$SheetColumnCount = count( $sheetData['1'] );
			
			if( $tableFieldsCount == $SheetColumnCount ) {
				$arr_formats = array();
				$arr_formats = $data_format['formats'];
				
				foreach($sheetData[1] as $key => $row) { 
						
					$row = strtolower(str_replace('_', ' ', $row ) );
					$sheetData[1][$key] = $row;
				}
				
				foreach($data_format['formats'] as $key => $row) { 
						
					$row = strtolower(str_replace('_', ' ', $row ) );
					$data_format['formats'][$key] = $row;
					
				}
				
				$result = array_diff_assoc( array_values($sheetData[1]), array_values( $data_format['formats']) );
			
			 	if( true == empty( $result ) ) { 
			 		
					$upload_data =array( 
						 "format_id"=>$format_Id,
						 "file_name"=>$val['fileName'],
						 "file_path"=> $val['path'],
						 "campaign_id"=>$campaign_id
					);
					
					$this->data_model->_table_name = 'tbl_campaign_files';
					$this->data_model->_primary_key = 'id';
					//$this->data_model->save($data);
				
					$this->db->insert('tbl_campaign_files',$upload_data );
					
					foreach($sheetData as $key => $row) { 
					
						$cnt = 1 ;
						
						foreach( $row as $key1 => $row1 ) {
							
							if( $cnt > $tableFieldsCount ) {
								 unset($sheetData[$key][$key1]);
							}
							
							$cnt++;
						}
					}
			 	
			
	            	for ($x = 2; $x <= count( $sheetData ); $x++) {
						
	            		$valid = 'false';
	            		foreach( $sheetData[$x] as $key1 => $row1 ) {
			            	if( false == empty($row1) ) {
								$valid = 'false';
								break;
							} else {
								$valid = 'true';
							}
	            		}
	            		
							
		            	if( 'false' == $valid ) {   
		            		
							$data = array_combine( array_values( $arr_formats ), array_values( $sheetData[$x] ));
							
							/* Now Setting the value to data uploaded to be 1 to give options to view the data */
								
							$data['campaign_id'] = $campaign_id;	
							$this->data_model->_table_name = $table_name;
							$this->data_model->_primary_key = 'id';
							$this->data_model->save($data);
							
							$update =  $this->data_model->setFlagToUpdatedModel($campaign_id);
		            	}
			           }
		           	   $type = 'success';
		               $message = lang('campaign_data_uploaded');
		               
			 		} else {
			 			$type = 'error';
	           			$message = "Sorry your uploaded file has invalid columns.";
			 		}
	               
				} else {
					
					$type = 'error';
	           		$message = "Sorry your uploaded file column does not match with format column.";
				}
	        } else {

            $type = 'error';

            $message = "Sorry your uploaded file type not allowed ! please upload XLS/CSV File ";

       	 }
        } else {
        	$type = 'error';
        	$message = "Sorry you have not selected any file. please upload XLS/CSV File ";
        }
        set_message($type, $message);

        redirect('custom/data/upload_campaign/'. $campaign_id );
	}

	
	public function exportTable( $format_id )
	{
		$data['format_table'] = $this->data_model->fetchTableNameById( $format_id );
		
		$query = $this->db->get( $data['format_table'] );
 		
      	if(!$query) {
      		$type = 'error';
        	$message = "Sorry, There is no field in the format. ";
        	set_message($type, $message);
        	redirect('custom/data/campaign_formats/'. $format_id );
      	}
           
        $this->load->library('excel');
 
        ob_start();

       // if (!empty($valid)) {
            
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
 
       	$objPHPExcel->setActiveSheetIndex(0);
 
		// Field names in the first row
		$fields = $query->list_fields();
		unset($fields[array_search('id', $fields)], $fields[array_search('campaign_id', $fields)],$fields[array_search('user_id', $fields)], $fields[array_search('leads_id', $fields)]   );
		
		$col = 0;
		foreach ($fields as $field)
		{
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
			$col++;
		}
		$objWorksheet = $objPHPExcel->getActiveSheet();
		$num_rows = $objPHPExcel->getActiveSheet()->getHighestRow();
		$objWorksheet->insertNewRowBefore($num_rows + 1, 1);
		//$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow( 0, 2, '');
		//$objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                $col++;
            }
 
            $row++;
        }
				
        $objPHPExcel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="format_'.time().'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');
  		  
		//}
	}	
	public function isRowEmpty($row)
	{
	    foreach ($row->getCellIterator() as $cell) {
	        if ($cell->getValue()) {
	            return false;
	        }
	    }
	
	    return true;
	}

	public function checkCampaign(){
		
		$campaign_value = trim( $this->input->post( 'campaign' ) );
		$campaign_value = preg_replace('/\s+/', ' ',$campaign_value);
		$campaign_value = strtolower( $campaign_value );
		
		 if( true == $this->data_model->checkCampaignExists( $campaign_value ) ) {
			 echo 'true';die;
		 } else {
			 echo 'false';die;
		 }
	}
	
	public function checkformat(){
		
		$format_value = trim( $this->input->post( 'format' ) );
		$format_value = preg_replace('/\s+/', ' ',$format_value);
		$format_value = strtolower(str_replace(' ', '_', $format_value ));
		$format_value = 'tbl_'.$format_value;
		
		 if( true == $this->data_model->checkTableExists( $format_value ) ) {
			 echo 'true';die;
		 } else {
			 echo 'false';die;
		 }
	}
	
	public function checkLead(){
		
		$lead_name = trim( $this->input->post( 'lead_name' ));
		$lead_name = preg_replace('/\s+/', ' ',$lead_name);
		
		 if( true == $this->data_model->checkLeadExist( $lead_name ) ) {
			 echo 'true';die;
		 } else {
			 echo 'false';die;
		 }
	}
	
	public function checkColumn(){
		
		$format_id = $this->input->post( 'format_id' );
		
		$column_name = trim( $this->input->post( 'column' ) );
		$column_name = preg_replace('/\s+/', ' ',$column_name);
		$column_name = strtolower(str_replace(' ', '_', $column_name ));
		
		 if( true == $this->data_model->checkColumnExist( $format_id, $column_name ) ) {
			 echo 'true';die;
		 } else {
			 echo 'false';die;
		 }
	}
	
    public
    function saved_leads($id = NULL)
    {
			$this->load->model('items_model');
        $this->items_model->_table_name = 'tbl_leads';
        $this->items_model->_primary_key = 'leads_id';

   	 	$lead_name = $this->input->post( 'lead_name' );
			$lead_name = preg_replace('/\s+/', ' ',$lead_name);
		
		  $role = $this->session->userdata('user_type');
		
		if( false == $this->data_model->checkLeadExist( $lead_name ) ) {
			 
		
	        $data = $this->items_model->array_from_post(array( 'lead_name', 'organization', 'lead_status_id', 'lead_source_id', 'contact_name', 'email', 'phone', 'mobile', 'address', 'city', 'state', 'country', 'facebook', 'skype', 'twitter', 'notes'));
	        // update root category
	        $where = array('lead_name' => $data['lead_name']);
	        // duplicate value check in DB
	        if (!empty($id)) { // if id exist in db update data
	            $leads_id = array('leads_id !=' => $id);
	        } else { // if id is not exist then set id as null
	            $leads_id = null;
	        }

        // check whether this input data already exist or not
	        $check_leads = $this->items_model->check_update('tbl_leads', $where, $leads_id);
	        if (!empty($check_leads)) { // if input data already exist show error alert
	            // massage for user
	            $type = 'error';
	            $msg = "<strong style='color:#000'>" . $data['lead_name'] . '</strong>  ' . lang('already_exist');
	        } else {  // save and update query 
	            $permission = $this->input->post('permission', true);
					
	            if (!empty($permission)) { 
	
	                if ($permission == 'everyone') {
	                    $assigned = 'all';
	                } else {
	                    $assigned_to = $this->items_model->array_from_post(array('assigned_to'));
	                   
	                    if (!empty($assigned_to['assigned_to'])) {
	                        foreach ($assigned_to['assigned_to'] as $assign_user) {
	                            $assigned[$assign_user] = $this->input->post('action_' . $assign_user, true);
	                        }
	                    }
	                }
	                if ($assigned != 'all') {
	                    $assigned = json_encode($assigned);
	                }
	                $data['permission'] = $assigned;
	            } else { 
	                set_message('error', lang('assigned_to') . ' Field is required');
	                redirect($_SERVER['HTTP_REFERER']);
	            }
	            $return_id = $this->items_model->save($data, $id);
				
	            if (!empty($return_id)) {    
	            	if( is_array( $this->input->post())) {
			         	if( !is_null( $this->input->post('format_id') ) && !is_null( $this->input->post( 'campaign_id' ) ) && !is_null( $this->input->post( 'id' ) ) ) {
			            	$this->data_model->save_lead( $this->input->post('format_id'), $this->input->post( 'campaign_id' ), $this->input->post( 'id' ), $return_id );
			            }
	            	}    
	            }
	                
	            if (!empty($id)) {
	                $id = $id;
	                $action = 'activity_update_leads';
	                $msg = lang('update_leads');
	            } else {
	                $id = $return_id;
	                $action = 'activity_save_leads';
	                $msg = lang('save_leads');
	            }
	            save_custom_field(5, $id);
	            $activity = array(
	                'user' => $this->session->userdata('user_id'),
	                'module' => 'leads',
	                'module_field_id' => $id,
	                'activity' => $action,
	                'icon' => 'fa-circle-o',
	                'value1' => $data['lead_name']
	            );
	            $this->items_model->_table_name = 'tbl_activities';
	            $this->items_model->_primary_key = 'activities_id';
	            $this->items_model->save($activity);
	           
	            // messages for user
	            $type = "success";
	        }
		 } else {
			$type = 'error';
        	$message = "Lead title already exists.";
		 }   
		
        $message = $msg;
        set_message($type, $message);
        if( 'success' == $type ) {
        	if( 1 == $role ) {
        		redirect('custom/data/show_data/upload/'.$this->input->post('format_id').'/'. $this->input->post( 'campaign_id' ));
        	} else {
        		redirect('custom/data/view_allocated_data/'.$this->input->post('format_id').'/'. $this->input->post( 'campaign_id' ));
        	}
        	
        } else {

        	redirect('custom/data/create_leads/'.$this->input->post('format_id').'/'. $this->input->post( 'campaign_id' ) .'/'.$this->input->post( 'id' ));
        }	
    }
}

?>