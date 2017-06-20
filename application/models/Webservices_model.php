<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

    class Webservices_model extends CI_Model
    {

		public function uploadSyncFiles($post, $files)
		{
		
			//$campaign_id = $post['campaign_id'];
			$result = array();
			$result['data'] = array();
			
			if( isset( $post['userid'] ) && !empty($post['userid'])) {
			
				if( !empty($files)) {
					
					$paths = json_decode($post['path'], true);
					 
					$this->load->library('upload');
					$counter = 0;
					
					foreach( $files as $key => $file ) {
						echo "sd";
						$name1 = $paths[$counter];
						$filepath1 = trim( $name1,'[,],",/' );
						$fileDir1 = explode("/", $filepath1);
						$flag = false;
						
						foreach($fileDir1 as $value) {
							if (strpos($value, '.') !== false) {
								
								$remove1 = array_pop($fileDir1);
							
								$file_path1 = implode( '/', $fileDir1 );
								
								$fileDetailPath1 = 'uploads/24/SiloSd/'.$file_path1.'/'.$file['name'];
							}
						}	
							
						$this->db->from('tbl_files');
						$this->db->where('user_id', stripslashes($post['userid']));
						$this->db->where('file_name', stripslashes($fileDetailPath1));
						
						if( 0 == $this->db->count_all_results() ) {
							
							$name = $paths[$counter];
							$filepath = trim( $name,'[,],",/' );
							$fileDir = explode("/", $filepath);
							$flag = false;
							$cnt = 0;
							
							foreach($fileDir as $value) {

								if (strpos($value, '.') === false) {
									if($cnt == 0 ) {
										
										if (!is_dir('/uploads/24/SiloSd/'.$value)) {
											mkdir('./uploads/24/SiloSd/' . $value, 0777, TRUE);

										} 
									} else {
										if (!is_dir('/uploads/24/SiloSd/'.$fileDir[$cnt-1]. '/'. $value)) {
											mkdir('./uploads/24/SiloSd/' .$fileDir[$cnt-1]. '/'. $value, 0777, TRUE);
										} 
									}
								
								} else {
									
									$remove = array_pop($fileDir);
							
									$file_path = implode( '/', $fileDir );
									
									$fileDetailPath = 'uploads/24/SiloSd/'.$file_path.'/'.$file['name'];									
									$config['file_name'] = $file['name'];
									$config['upload_path'] = 'uploads/24/SiloSd/'.$file_path.'/';
									$config['allowed_types'] = '*';
									$config['max_size'] = '9000000';
									
									$this->upload->initialize($config);
									
									
									if ($this->upload->do_upload($key)) {  
										$data['upload_data'] = $this->upload->data();
									
										$image_path = $data['upload_data']['file_name'];
										$filedata = array("user_id"=>$post['userid'],
												  "file_name"=> 'uploads/24/SiloSd/'.$file_path.'/'.$image_path
												 );
										$this->db->insert('tbl_files',$filedata);
										//echo $this->db->last_query(); die; 
										$user_id = $this->db->insert_id();
									
										$result['status'] = true;
										
										/* $result['message'] = "Data uploaded Successfully"; */
									} else {
										$error = $this->upload->display_errors();
										
										$result['status'] = false;
										/* $result['message'] = "Failed to upload data."; */
									}
								}
								$cnt++;
							}
							
						} else {
							$result['status'] = true;
							/* $result['message'] = "Recors already exists"; */
						}
						$counter++;
					}	
				
				} else {
					$result['status'] = false;
					/* $result['message'] = "Failed to upload data."; */
					
				}
				
			} else {
				$result['status'] = false;
			}
			return $result;
		}	
		
		public function downloadUserFiles( $post ) {
			
			$result = array();
			$result['data']= array();
			if( isset( $post['userid'] ) && !empty($post['userid'])) {
								
				$this->db->select('file_name');
				$this->db->from('tbl_files');
				$this->db->where('user_id', $post['userid']);
				
				$query1 = $this->db->get(); 
				
				$count_user = $query1->num_rows(); 
				if($count_user > 0)
				{
					$arrResult = $query1->result_array();
					$arrFiles = array();
					
					foreach($arrResult as $key => $value ) {
						$arrFiles[] = stripslashes( base_url(). $value['file_name']);
					}
					$result['status'] = true;
					$result['data'] = $arrFiles; 
				} else {
					$result['status'] = false;
				}	
				
			} else {
				$result['status'] = false;
			}
			return $result;
		}
		
		public function getUserFiles( $post ) {
			
			$result = array();
			$result['data']= array();
			$result['data']['download'] = array();
			$result['data']['upload'] = array();
			
			if( isset( $post['userid'] ) && !empty($post['userid'])) {
				
				$file = json_decode($_POST['path'], true);
                //print_r($file);die;
				$arrUploadedFiles = array();
				$arrDownloadFiles = array();
				
				foreach( $file as $value ) {
					
					$this->db->select('file_name');
					$this->db->from('tbl_files');
					$this->db->where('user_id', $post['userid']);
					$this->db->where('file_name', 'uploads/24/SiloSd/'.$value);
					
					$query1 = $this->db->get(); 
					
					$count_user = $query1->num_rows(); 
					
					
					if($count_user > 0)
					{
						$arrResult = $query1->row();;
						$arrDownloadFiles[] = stripslashes($arrResult->file_name);
						
					} else {
						
						$arrUploadedFiles[] = $value;
						$result['status'] = true;
						$result['data']['upload'] = $arrUploadedFiles; 
					}	
				}
			
				$this->db->select('file_name');
				$this->db->from('tbl_files');
				$this->db->where('user_id', $post['userid']);
				if(!empty($arrDownloadFiles)) {
				//$this->db->where('file_name NOT IN '. $download );
					$this->db->where_not_in('file_name', $arrDownloadFiles);
				}
				$query1 = $this->db->get(); 
				//echo $this->db->last_query();
				$result['status'] = true;
				$result['data']['download'] = $query1->result_array(); 
				
				
			} else {
				$result['status'] = false;
			}
			return $result;
			
		}
		
		public function register_userModel($post,$filename)
		{
			//including the encryotion library
			
			require_once dirname(__FILE__) . '/../../libraries/MCrypt.php';
		    $mcrypt = new MCrypt();
			
			//echo "<pre>"; print_r($post);die; 
			$name = addslashes($post['name']);
			$email = $mcrypt->decrypt(addslashes($post['email']));
			$phone = $mcrypt->decrypt($post['phone']);
			$username=$mcrypt->decrypt(addslashes($post['username']));
			$password = $mcrypt->decrypt(addslashes($post['password']));
			$device_id = $post['device_id'];
			$last_ip = $this->input->ip_address();
			$user_type = $post['user_type'];
			if($user_type==2)
			{
				$client_type = $post['client_type'];
			}
			else
			{
				$client_type = "";
			}
			
			/*  ***** Checking for the already used email and  phone number  ************* */
			
			$this->db->select('a.username,a.email,b.mobile');
			$this->db->from('tbl_users as a');
			$this->db->join('tbl_account_details as b','a.user_id=b.user_id','left');
			$this->db->where('a.username',$username);
			$this->db->or_where('b.phone',$phone);
			$this->db->or_where('a.email',$email);
			$query1 = $this->db->get();
            $count1 = $query1->row();
		    $count = $query1->num_rows(); 
			if($count==0)
			{ //echo "iffffffffff"; die;
				// Condition where emial and phone doesnot exits
				
				if($user_type!=2)
				{
					
					$data = array("username"=>$username,
								  "email"=>$email,
								  "password"=>$password,
								  "last_ip"=>$last_ip,
								  "role_id"=>$user_type
								 );
								 
					$this->db->insert('tbl_users',$data);
					//echo $this->db->last_query(); die; 
					$user_id = $this->db->insert_id();
					
					// Inserting the values in tbl_account_details
					$data_detail = array("user_id"=>$user_id,
										 "fullname"=>$name,
										 "mobile"=>$phone,
										 "device_id"=>$device_id,
										 "avatar"=>'uploads/'.$filename									 
										 );
										 
					$this->db->insert('tbl_account_details',$data_detail);					 
                      //echo $this->db->last_query(); 
					$row['status']=true;
					$row['message']="User Registered Successfully";
					$row['user_id'] = $user_id;
				}
				else
				{
					// IN this case , he user registers as a Company 
					// So we need tosave the Company detils first
					
					
					// here there are two conditions ,
					// 1. if the company is already there in the db
					// 2. else adding the new company 
					
					if($post['company_email']!="" && $post['company_phone']!="" && $post['company_mobile']!="")
					{
						// here in this case the user registers his new company 
						// saving the company first in tbl_clients
						
						$company_name = $post['company_name'];
						$company_email=$mcrypt->decrypt(addslashes($post['company_email']));
						$company_phone = $mcrypt->decrypt(addslashes($post['company_phone']));
						$company_mobile = $mcrypt->decrypt(addslashes($post['company_mobile']));
						
						$company_array = array("name"=>$company_name,
											   "phone"=>$company_phone,
											   "mobile"=>$company_mobile,
											   "email"=>$company_email
											  );
											  
						$this->db->insert('tbl_client',$company_array);
						$company_id = $this->db->insert_id();
                    }
					else if($post['company_name']!="" && $post['company_email']=="" && $post['company_phone']=="" && $post['company_mobile']=="")
					{
						/// Here in this case the user registers with already existing company
						$company_id = $post['company_name'];
					}
					else
					{
						
						// IN this case the client registers as a person
						$company_array = array("name"=>$name,
											   "phone"=>'',
											   "mobile"=>$phone,
											   "email"=>$email
											  );
											  
						$this->db->insert('tbl_client',$company_array);
						$company_id = $this->db->insert_id();
					}
					
					// Mow inserting the  the rest of the data in the user tables
					// relating the data to the company id
					
					$data = array("username"=>$username,
								  "email"=>$email,
								  "password"=>$password,
								  "last_ip"=>$last_ip,
								  "role_id"=>$user_type
								 );
								 
					$this->db->insert('tbl_users',$data);
					$user_id = $this->db->insert_id();
					
					// Inserting the values in tbl_account_details
					$data_detail = array("user_id"=>$user_id,
										 "fullname"=>$name,
										 "mobile"=>$phone,
										 "device_id"=>$device_id,
										 "avatar"=>'uploads/'.$filename,
                                         "company"=> $company_id										 
										 );
										 
					$this->db->insert('tbl_account_details',$data_detail);					 

					$row['status']=true;
					$row['message']="User Registered Successfully";
					$row['user_id'] = $user_id;
					
				}

				
			}
			else
			{ 
				// error section , where username or email or mobile already exists
				if($count1->username==$username)
				{
					$row['status']=false;
					$row['message']="Same Username Already Exists";
				}
				else if($count1->email==$email)
				{
					$row['status']=false;
					$row['message']="Same Email Already Exists";
				}
				else
				{
					$row['status']=false;
					$row['message']="Same Mobile Number Already Exists";
				}
				
			}
			
			return $row;
			
			
		}
		
		public function login_userModel($post)
		{
			
			$login_type = $post['login_type'];
			$device_id = $post['device_id'];
			require_once dirname(__FILE__) . '/../../libraries/MCrypt.php';
		    $mcrypt = new MCrypt();
			
			if($login_type==1)
			{
				
			
			    $username=$mcrypt->decrypt(addslashes($post['username']));
				$password = $mcrypt->decrypt(addslashes($post['password']));
					
				$where = array("a.username"=>$username,
							   "a.password"=>$password
							   );
				/* ********* Checking the email and password ******** */
				
				$this->db->select('a.user_id,a.username,a.role_id,b.fullname,a.email,b.mobile,b.device_id,b.avatar,b.company');
				$this->db->from('tbl_users as a');
				$this->db->join('tbl_account_details as b','a.user_id=b.user_id','inner');
				$this->db->where($where);
				$query = $this->db->get();
				$count = $query->num_rows();
				if($count!=0)
				{
					// means username  and password is valid , 
					// updating the devie id here
					
					$user = $query->row();
					$user_id = $user->user_id;
					$update = array("device_id"=>$device_id);
					$this->db->where('user_id',$user_id);
					$this->db->update('tbl_users',$update);
					
					// Now setting the fetched information in formatted array 
					
					$row = $query->row();
					if($row->role_id==1)
						$usertype = "Admin";
                    else if($row->role_id==2)
                        $usertype = "Client";
                    else
                        $usertype="Staff";
					
					$data = array("user_id"=>$row->user_id,
								  "name"=>$row->fullname,
								  "email"=>$row->email,
								  "phone"=>$row->mobile,
								  "profile_image"=>$row->avatar,
								  "username"=>$row->username,
								  "user_type"=>$usertype,
								  "company_id"=>$row->company
								 );
								 
					$result['status']= true;
					$result['message']= "Success";
					$result['data']= $data;				
				}
				else
				{
					$result['status']= false;
					$result['message']= "Username Or Password Is Invalid";
				}
			} 
			// end if for normal login
			
			/* ********* Start For Login With facebook ******* */
			
			if($login_type==2)
			{
				/* ************ Start For the Facebook Login *********** */
				
				$name = $mcrypt->decrypt(addslashes($post['name']));
				$unique_id = $mcrypt->decrypt(addslashes($post['unique_id']));
				$profile_image = $post['profile_image'];
				
				/* -- Checking whether the unique id already exists ----- */
				
				$this->db->select('a.user_id,b.fullname,b.device_id,b.avatar');
				$this->db->from('tbl_users as a');
				$this->db->join('tbl_account_details as b','a.user_id=b.user_id','inner');
				$this->db->where('a.unique_id',$unique_id);
				$query1 = $this->db->get(); 
				$count_user = $query1->num_rows(); 
				if($count_user==0)
				{
					/* ------- This means user recore does not  exist ----*/
					$data1=array("register_type"=>$login_type,"unique_id"=>$unique_id);
					$this->db->insert('tbl_users',$data1); 
                    $user_id = $this->db->insert_id();

                    $data1_detail=array("fullname"=>$name,
										"device_id"=>$device_id,
										"avatar"=>$profile_image,
										"user_id"=>$user_id
										);
                    $this->db->insert('tbl_account_details',$data1_detail);	

                    // preparing the data to be sent to mobile
					$data = array("user_id"=>$user_id,
				              "name" =>$name,
							  "profile_image"=>$profile_image
							  );					
					
				}
				else
				{
					$row1 = $query1->row();
					$user_id = $row1->user_id;
					$name = $row1->fullname;
					$profile_image = $row1->avatar;
					
					
					// updating the device id
					$update = array("device_id"=>$device_id);
					$this->db->where('user_id',$user_id);
					$this->db->update('tbl_account_details',$update);
					
					
					// preparing the data to be sent to mobile
					$data = array("user_id"=>$user_id,
				              "name" =>$name,
							  "profile_image"=>$profile_image
							  );
					
					
				}
				
				
				$result['status']= true;
				$result['message']= "Success";
				$result['data']= $data;	
				
			}
			/* ********* End For Login With facebook ******* */
			
			/* ********* Start For Login With Google ******* */
			
			if($login_type==4)
			{
				
				$name = $mcrypt->decrypt(addslashes($post['name']));
				$email = $mcrypt->decrypt(addslashes($post['email']));
				$unique_id = $mcrypt->decrypt(addslashes($post['unique_id']));
				$profile_image = $post['profile_image'];
				
				/* -- Checking whether the unique id already exists ----- */
				
				$this->db->select('a.user_id,a.email,b.fullname,b.device_id,b.avatar');
				$this->db->from('tbl_users as a');
				$this->db->join('tbl_account_details as b','a.user_id=b.user_id','inner');
				$this->db->where('a.unique_id',$unique_id);
				$query1 = $this->db->get();
				$count_user = $query1->num_rows();
				if($count_user==0)
				{
					/* ------- This means user recore does not  exist ----*/
					$data1=array("register_type"=>$login_type,"unique_id"=>$unique_id,"email"=>$email);
					$this->db->insert('tbl_users',$data1);
                    $user_id = $this->db->insert_id();

                    $data1_detail=array("fullname"=>$name,
										"device_id"=>$device_id,
										"avatar"=>$profile_image,
										"user_id"=>$user_id
										); 
                    $this->db->insert('tbl_account_details',$data1_detail);	

                    // preparing the data to be sent to mobile
					$data = array("user_id"=>$user_id,
				              "name" =>$name,
							  "profile_image"=>$profile_image,
							  "email"=>$email
							  );										
					
				}
				else
				{
					$row1 = $query1->row();
					$user_id = $row1->user_id;
					$name = $row1->fullname;
					$profile_image = $row1->avatar;
					$email =  $row1->email;
					
					// updating the device id
					$update = array("device_id"=>$device_id);
					$this->db->where('user_id',$user_id);
					$this->db->update('tbl_account_details',$update);
					
					
					// preparing the data to be sent to mobile
					$data = array("user_id"=>$user_id,
				              "name" =>$name,
							  "profile_image"=>$profile_image,
							  "email"=>$email
							  );
					
					
				}
				
				//$data = array("user_id"=>$user_id);
				$result['status']= true;
				$result['message']= "Success";
				$result['data']= $data;	
				
			}
			
			/* ********* End For Login With Google ******* */
			
			/* ********* Start For Login With Twitter ******* */
			if($login_type==3)
			{
				
				$name = $mcrypt->decrypt(addslashes($post['name']));
				$unique_id = $mcrypt->decrypt(addslashes($post['unique_id']));
				$profile_image = $post['profile_image'];
				
				/* -- Checking whether the unique id already exists ----- */
				
				$this->db->select('a.user_id,b.fullname,b.device_id,b.avatar');
				$this->db->from('tbl_users as a');
				$this->db->join('tbl_account_details as b','a.user_id=b.user_id','inner');
				$this->db->where('a.unique_id',$unique_id);
				$query1 = $this->db->get();
				$count_user = $query1->num_rows();
				if($count_user==0)
				{
					/* ------- This means user recore does not  exist ----*/
					$data1=array("register_type"=>$login_type,"unique_id"=>$unique_id);
					$this->db->insert('tbl_users',$data1);
                    $user_id = $this->db->insert_id();

                    $data1_detail=array("fullname"=>$name,
										"device_id"=>$device_id,
										"profile_image"=>$profile_image,
										"user_id"=>$user_id
										); 
                    $this->db->insert('tbl_account_details',$data1_detail);	

                    // preparing the data to be sent to mobile
					$data = array("user_id"=>$user_id,
				              "name" =>$name,
							  "profile_image"=>$profile_image
							  );										
					
				}
				else
				{
					$row1 = $query1->row();
					$user_id = $row1->user_id;
					$name = $row1->fullname;
					$profile_image = $row1->avatar;
					
					
					// updating the device id
					$update = array("device_id"=>$device_id);
					$this->db->where('user_id',$user_id);
					$this->db->update('tbl_account_details',$update);
					
					
					// preparing the data to be sent to mobile
					$data = array("user_id"=>$user_id,
				              "name" =>$name,
							  "profile_image"=>$profile_image
							  );
					
				}
				
				//$data = array("user_id"=>$user_id);
				$result['status']= true;
				$result['message']= "Success";
				$result['data']= $data;	
			}
			
			/* ********* End For Login With Twitter ******* */
			
			return $result;
		}
		
		public function update_userModel($post,$filename)
		{
			require_once dirname(__FILE__) . '/../../libraries/MCrypt.php';
		    $mcrypt = new MCrypt();
			
			
			$name = addslashes($post['name']);
			$email = $mcrypt->decrypt(addslashes($post['email']));
			$phone = $mcrypt->decrypt($post['phone']);
			$username=$mcrypt->decrypt(addslashes($post['username']));
			$password = $mcrypt->decrypt(addslashes($post['password']));
			$device_id = $post['device_id'];
			$last_ip = $this->input->ip_address(); 
			$user_id = $mcrypt->decrypt(addslashes($post['user_id']));
			
			/* ****   Checking the condition ,  when trying to update the username ******** */
			
			$this->db->select('COUNT(0) as row_count');
			$this->db->from('tbl_users as a');
			$this->db->join('tbl_account_details as b','a.user_id=b.user_id','left');
			$this->db->where('a.username',$username);
			$this->db->or_where('b.phone',$phone);
			$this->db->or_where('a.email',$email);
			$this->db->where('a.user_id !=',$user_id);
			$query1 = $this->db->get();   
			$count1 = $query1->row();
			$count = $count1->row_count;
			if($count==1)
			{
				/*  ************ COndition when No user Exists with same values  *********** */
				// Updating all the values in tbl_users
				
				$update1 = array("username"=>$username,
				                "password"=>$password,
								"email" =>$email,
								"last_ip"=>$last_ip
								);
				$this->db->where('user_id',$user_id);
                $this->db->update('tbl_users',$update1);
				
				
				
				// updating the values in the tbl_account_details
				
				$update2 = array("fullname"=>$name,
				                 "mobile"=>$phone,
								 "avatar"=>'uploads/'.$filename,
								 "device_id"=>$device_id
				                 );
								 
				$this->db->where('user_id',$user_id);
                $this->db->update('tbl_account_details',$update2);	

                $result['status']=true;
                $result['message']= "Profile Updated Successfully";
                $result['user_id']=$user_id;				
				
			}
			else
			{
				$result['status']=true;
                $result['message']= "Duplicate Values Already Exists , Please  Enter Different Values ";
                $result['user_id']=$user_id;
			}
			
			return $result;
			
			
		}
		
		public function getCompanyListModel()
		{
			$this->db->select('client_id,name');
			$this->db->from('tbl_client');
			$query = $this->db->get();
			$result1 = $query->result();
			$result['status']=true;
            $result['message']= "Profile Updated Successfully";
			$result['data'] = $result1;
			return $result;
			
		}
		
		public function getestimateListModel($post)
		{
			$client_id = $post['client_id'];
			
			// getting the client id from the  tbl_account_details
			
			$this->db->select('company');
			$this->db->from('tbl_account_details');
			$this->db->where('user_id',$client_id);
			$query_client = $this->db->get();
			$row_client = $query_client->row();
			$company_id = $row_client->company; // this is the company id ,of hwom we have to send detials
			
			$sql ="SELECT `estimates_id`, `reference_no`, `due_date`, SUBSTR(date_saved, 1, 10) as date_saved FROM (`tbl_estimates`) WHERE `client_id` =  '$company_id'";
			//echo $sql;die;
			$query =$this->db->query($sql);
			$result = $query->result();
			
			$row['status']= true;
			$row['message']="Data Fetched Successfully";
			$row['data'] = $result;
			
			return $row;
			
		}
		
		public function getEstimateDetailModel($post)
		{
			$estimates_id = $post['estimates_id'];
			$this->db->select('a.address,a.mobile,a.phone,b.reference_no,b.due_date,b.currency,b.notes,b.status,b.date_sent,b.date_saved');
			$this->db->from('tbl_client as a');
			$this->db->join('tbl_estimates as b','a.client_id=b.client_id','inner');
			//$this->db->join('tbl_estimate_items as c','b.estimates_id=c.estimates_id','inner');
			$this->db->where('b.estimates_id',$estimates_id);
			$query = $this->db->get(); 
			//echo $this->db->last_query();die;
			$row_temp = $query->result();
			
			// getting the estimate items list
			
			$this->db->select('item_tax_rate,item_name,item_desc,unit_cost,quantity,item_tax_total,total_cost,item_order');
			$this->db->from('tbl_estimate_items');
			$this->db->where('estimates_id',$estimates_id);
			$query2 = $this->db->get(); 
			$row_estimates = $query2->result();
			
			
			//getting the total cost of the items
			
			$this->db->select('sum(total_cost) as total_cost');
			$this->db->from('tbl_estimate_items');
			$this->db->where('estimates_id',$estimates_id);
			$query1 = $this->db->get();
			$row_total = $query1->row();
			$total_cost = $row_total->total_cost;
			
			
			$row['status']= true;
			$row['message']="Data Fetched Successfully";
			$row['data']['client']= $row_temp;
			$row['data']['estimates_items']= $row_estimates;
			$row['data']['total_cost']= $total_cost; 
			return $row;
			
			
		}
	
	    public function saveUserInfoAndMail($post)
		{
			require_once dirname(__FILE__) . '/../../libraries/MCrypt.php';
		    $mcrypt = new MCrypt();
			
			//echo "<pre>"; print_r($post);die; 
			$name = addslashes($post['name']);
			$email = $mcrypt->decrypt(addslashes($post['email']));
			$phone = $mcrypt->decrypt($post['phone']);
			$subject = addslashes($post['subject']);
			$message = addslashes($post['message']);
			$data['name'] = $name;
			
			$array = array("name"=>$name,
			               "email"=>$email,
			               "phone"=>$phone,
			               "subject"=>$subject,
			               "message"=>$message
						   );
						   
			$this->db->insert('userEmail_Records',$array);

            $insert_id = $this->db->insert_id();
            
            if($insert_id=="" || $insert_id==0)
			{
				$row['status']= false;
                $row['message']="There was Error In inserting the data";
                $row['data']="";				
			}
            else
			{
				$row['status']= true;
                $row['message']="Thanks For Your Insterest , We Will Get Back To You Soon !!!";
                $row['data']="";	
			}
			
			// Mail Sending Code
			
			$config['useragent'] = 'Rebelute Digital Mailing System';
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$company_email = 'admin@rebelute.com';
			$company_name = 'Rebelute Digital Solutions';
			$subject = 'Response From Rebelute';
			$name = "Admin";
			$message = $this->load->view('mail/dashboard',$data,true);
			$this->load->library('email', $config);
			$this->email->from($company_email, $company_name);
			$this->email->to($email);

			$this->email->subject($subject);
			$this->email->message($message);
			/*if ($params['resourceed_file'] != '') {
				$this->email->resource($params['resourceed_file']);
			}*/
			$send = $this->email->send();
			
			return $row;
			
		}
		
		public function getProjectListModel($post)
		{
			$user_id = $post['user_id'];
			
			// getting the company Id of the client
			
			$this->db->select('company');
			$this->db->from('tbl_account_details');
			$this->db->where('user_id',$user_id);
			$query1 = $this->db->get(); 
			$row_company = $query1->row();
			$company_id = $row_company->company;
			
			//NOw send the project list of only above company
			
			$this->db->select('project_id,project_name,progress,start_date,end_date,project_status');
			$this->db->from('tbl_project');
			$this->db->where('client_id',$company_id);
			$query= $this->db->get();
			$row['status']= true;
			$row['message'] = "Data fetched Successfully";
			$row['data'] = $query->result();
			return $row;
		}
		
		
	
	    public function getProjectDetailModel($post)
		{
			$project_id = $post['project_id'];
			
			$this->db->select('project_id,project_name,progress,start_date,end_date,project_cost,demo_url,project_status,permission');
			$this->db->from('tbl_project');
			$this->db->where('project_id',$project_id);
			$query = $this->db->get();
			$row_data = $query->row();
			
			//decoding the json for participants
			
			$part = array_keys(json_decode($row_data->permission,true));
			
			$user_ids = implode(",",$part);
			
			// Now getting the names of the users
			$sql="SELECT `b`.`fullname`, `b`.`avatar` FROM (`tbl_users` as a) INNER JOIN `tbl_account_details` as b ON `a`.`user_id`=`b`.`user_id` WHERE `a`.`user_id` IN ($user_ids) ";
			$query1 = $this->db->query($sql); 
			$row_part = $query1->result();
			
			// creating the array for the project detail
			
			$data = array("project_id"=>$row_data->project_id,
			              "project_name"=>$row_data->project_name,
			              "progress"=>$row_data->progress,
			              "start_date"=>$row_data->start_date,
			              "end_date"=>$row_data->end_date,
						  "project_cost"=>$row_data->project_cost,
						  "demo_url"=>$row_data->demo_url,
						  "project_status"=>$row_data->project_status
						 );
			
			
			$row['status']= true;
			$row['message']="Data Fetched Successfully";
			$row['data']= $data;
			$row['participants'] = $row_part;
			
			return $row;
			
		}
		
		public function getBuglistsModel($post)
		{
			$project_id = $post['project_id'];
			
			$this->db->select('bug_id,bug_title,bug_status,priority,permission');
			$this->db->from('tbl_bug');
			$this->db->where('project_id',$project_id);
			$query = $this->db->get();
			$row = $query->result();
			
			foreach($row as $data_row)
			{
				//decoding the json for participants
			
				$part = array_keys(json_decode($data_row->permission,true));
				
				$user_ids = implode(",",$part);
				
				// Now getting the names of the users
				$sql="SELECT `b`.`fullname`, `b`.`avatar` FROM (`tbl_users` as a) INNER JOIN `tbl_account_details` as b ON `a`.`user_id`=`b`.`user_id` WHERE `a`.`user_id` IN ($user_ids) ";
				$query1 = $this->db->query($sql); 
				$row_part = $query1->result();// these are the participants for  this bug
				
			    $row_data[]=array("bug_id"=>$data_row->bug_id,
				             "bug_title"=>$data_row->bug_title,
				             "bug_status"=>$data_row->bug_status,
				             "priority"=>$data_row->priority,
							 "assigned_to"=>$row_part
							);
			}
			
			$result['status']= true;
			$result['message']= "Data Getched Successfully";
			$result['data'] = $row_data;
			return $result;
			
		}
		
		public function getBugDetailsModel($post)
		{
			$bug_id = $post['bug_id'];
			
			// getting the details of the bug_description
			
			$this->db->select('bug_id,bug_title,bug_description,bug_status,priority,reporter,created_time,update_time,permission');
			$this->db->from('tbl_bug');
			$this->db->where('bug_id',$bug_id);
			$query = $this->db->get();
			$row = $query->row();
			
			// getting the participants of this bugs
			
			$part = array_keys(json_decode($row->permission,true));
				
			$user_ids = implode(",",$part); // these  sre the user_id of the users
			
			// fetching the name and profile image of the users
			$sql="SELECT `b`.`fullname`, `b`.`avatar` FROM (`tbl_users` as a) INNER JOIN `tbl_account_details` as b ON `a`.`user_id`=`b`.`user_id` WHERE `a`.`user_id` IN ($user_ids) ";
			//echo $sql;die;
			$query1 = $this->db->query($sql); 
			$row_part = $query1->result();// these are the participants for  this bug
			
			$row_data=array("bug_id"=>$row->bug_id,
								"bug_title"=>$row->bug_title,
								"bug_status"=>$row->bug_status,
								"priority"=>$row->priority,
								"bug_description"=>$row->bug_description,
								"created_time"=>$row->created_time,
								"update_time"=>$row->update_time,
								"participants"=>$row_part
								);
			
			
			
			$result['status']= true;
			$result['message']= "Data Fetched Successfully";
			$result['data'] = $row_data;
			
			return $result;
			
		}
		
		public function getBugcommentsModel($post)
		{
			$bug_id = $post['bug_id'];
			
			// getting the data for the bug_id
			
			$this->db->select('a.comment,a.comment_datetime,b.fullname,b.avatar,');
			$this->db->from('tbl_task_comment as a');
			$this->db->join('tbl_account_details as b','a.user_id=b.user_id','inner');
			$this->db->where('a.bug_id',$bug_id);
			$query = $this->db->get();
            
			
			$result['status']= true;
            $result['message'] = "Data fetched Successfully";
            $result['data'] = $query->result();

            return $result;			
			
		}
		
		public function saveNewBugCommentModel($post)
		{
			$user_id = $post['user_id'];
			$bug_id = $post['bug_id'];
			$comment = $post['comment'];
			$posted_by = $post['name'];
			
			$mail_comment = $comment;
			
			$data = array("user_id"=>$user_id,
			              "comment"=>$comment,
						  "bug_id"=>$bug_id
						 );
						 
			$this->db->insert('tbl_task_comment',$data);
  
            $insert_id = $this->db->insert_id();
            
            if($insert_id!="")
			{
				 $result['status']= true;
				 $result['message']= "Comment Added Successfully";
				 $result['data']['comment_id'] = $insert_id;
				 
				 // inserting the data in the tbl_activities
			
			    $data_activity = array("user"=>$user_id,
			                       "module"=>"task",
								   "module_field_id"=>1,
								   "icon"=>"fa-ticket",
								   "activity"=>"activity_new_bug_comment",
								   "value1"=>$comment
								  );
								  
			    $this->db->insert('tbl_activities',$data_activity);	

            // End Inserting the data in the table activities	
				 
				 //Now fetching the BUg data to send  email
				
				$this->db->select('bug_title,permission');
				$this->db->from('tbl_bug');
				$this->db->where('bug_id',$bug_id);
				$query_project = $this->db->get();
				$row_project = $query_project->row();
				$bug_title = $row_project->bug_title;
				
				$part = array_keys(json_decode($row_project->permission,true));
				$user_ids = implode(",",$part); // these  sre the user_id of the users
				
				// fetching the Email id Of the users
				$sql="SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
				$query1 = $this->db->query($sql); 
				$row_part = $query1->result();// these are the participants for  this bug
				
				/* ##################### Start Of Mail Sending Code ################# */
				
				foreach($row_part as $part_email)
				{
					$email = $part_email->email;
					$config['useragent'] = 'Rebelute Digital Mailing System';
					$config['mailtype'] = "html";
					$config['newline'] = "\r\n";
					$config['charset'] = 'utf-8';
					$config['wordwrap'] = TRUE;
					$company_email = 'admin@rebelute.com';
					$company_name = 'Rebelute Digital Solutions';
					$subject = 'New Bug Comment';
					
					
					$message = '<p>Hi there,</p><p>A new comment has been posted by {POSTED_BY} to bug {BUG_TITLE}.</p><p>You can view the comment using the link below.</p><p><em>'.$mail_comment.'</em></p><p><br /><big><strong><a href="{COMMENT_URL}">View Comment</a></strong></big><br />Regards<br />The {SITE_NAME} Team</p><p>&nbsp;</p>';
					$bug_name = str_replace("{BUG_TITLE}", $bug_title, $message);
                    $assigned_by = str_replace("{POSTED_BY}", ucfirst($posted_by), $bug_name);
                    $Link = str_replace("{COMMENT_URL}", base_url() . 'admin/bugs/view_bug_details/' . $bug_id . '/' . '2', $assigned_by);
                    $comments = str_replace("{COMMENT_MESSAGE}",$mail_comment,$Link);
					$message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $Link);
					//echo $message; die;
					$this->load->library('email', $config);
					
					$this->email->from($company_email, $company_name);
					$this->email->to($email);

					$this->email->subject($subject);
					$this->email->message($message);
					$send = $this->email->send();
					
				}
				
				
				 /* ##################### End Of Mail Sending Code ################# */
				
				
				
			}
            else
			{
				$result['status']= false;
				$result['message']= "Comment Not Added, Please Try Again";
				$result['data']['comment_id'] = "";
			}
            return $result;			
		}
		
		public function getInvoicesListModel($post)
		{
			$company_id = $post['company_id'];
			
			// getting the list of the invlices of that company
			
		
			$sql="Select invoices_id,reference_no,due_date,SUBSTR(date_saved, 1, 10) as date_saved,notes
			      From tbl_invoices  WHERE client_id='$company_id'";
			$query= $this->db->query($sql);
			$row = $query->result();
			//echo $this->db->last_query();die;
			
			$data = array();
			// Now getting due amount and total amount for each invoice_number
			foreach($row as $data_inv)
			{
				$invoice_id = $data_inv->invoices_id;
				$sql_sum = "Select SUM(total_cost) as total_cost from tbl_items where invoices_id='$invoice_id'";
				$query_sum =  $this->db->query($sql_sum);
				$row_sum = $query_sum->row();
				$total_amount = $row_sum->total_cost;
				
				// Now getting the paid amount from the tbl_payments
				$sql_pay = "Select amount from tbl_payments where invoices_id='$invoice_id'";
				$query_pay = $this->db->query($sql_pay);
				$row_pay = $query_pay->row();
				if($query_pay->num_rows() > 0)
				{
					$paid_amount = $row_pay->amount;
				}
				else
				{
					$paid_amount = 0;
				}
				
				
				$due_amount = $total_amount - $paid_amount;
				if($due_amount==0)
				{
					$status="Paid";
				}
				else
				{
					$status ="Unpaid";
				}
					
				
				$data[]=array("invoices_id"=>$data_inv->invoices_id,
				              "reference_no"=>$data_inv->reference_no,
				              "date_saved"=>$data_inv->date_saved,
				              "notes"=>$data_inv->notes,
				              "total_amount"=>$total_amount,
				              "paid_amount"=>$paid_amount,
				              "due_amount"=>$due_amount,
							  "pay_status"=>$status
				             );
				
			}// end of for each loop
			
			$result['status']= true;
			$result['message'] = "Data Fetched Successfully";
			$result['data'] = $data;
			
			return $result;
			
			
		}
		
		public function getInvoiceDetailsModel($post)
		{
			$invoices_id = $post['invoices_id'];
			
			// getting the data  of the invoices_id
			
			$this->db->select('a.name,a.phone,a.address,b.invoices_id,b.reference_no,b.due_date,b.date_saved,b.status,b.notes');
			$this->db->from('tbl_client as a');
			$this->db->join('tbl_invoices as b','a.client_id=b.client_id','inner');
			$this->db->where('b.invoices_id',$invoices_id);
			$query_main = $this->db->get();
			$data_company = $query_main->result(); 
			
			// now getting  items of the invoices_id
			
			$this->db->select('item_tax_rate,item_tax_total,quantity,total_cost,item_name,item_desc,unit_cost');
			$this->db->from('tbl_items');
			$this->db->where('invoices_id',$invoices_id);
			$query_items = $this->db->get();
			$data_items = $query_items->result();
			
			//getting the total cost of the items
			
			$this->db->select('sum(total_cost) as total_cost');
			$this->db->from('tbl_items');
			$this->db->where('invoices_id',$invoices_id);
			$query1 = $this->db->get();
			$row_total = $query1->row();
			$total_cost = $row_total->total_cost;
			
			
			$result['status'] = true;
			$result['message'] = "Data Fetched Successfully";
			$result['data']['company_data'] = $data_company;
			$result['data']['items_data']= $data_items;
			$result['data']['total_cost'] = $total_cost;
			
			return $result;
			
		    
			
		}
		
		public function getTicketsListModel($post)
		{
			$status = $post['msg_status'];
			$user_id = $post['user_id'];
			
			if($status=="all")
			{
			    $sql= "Select a.tickets_id,a.ticket_code,a.subject,b.deptname,a.status,SUBSTR(created, 1, 10) as date_saved
			       FROM tbl_tickets  as a INNER JOIN tbl_departments as b ON a.departments_id=b.departments_id and a.reporter='$user_id'";
			}
            if($status=="answered")
			{
				$sql= "Select a.tickets_id,a.ticket_code,a.subject,b.deptname,a.status,SUBSTR(created, 1, 10) as date_saved
			       FROM tbl_tickets  as a INNER JOIN tbl_departments as b ON a.departments_id=b.departments_id WHERE a.status='answered' and a.reporter='$user_id'";
			}				
            if($status=="in_progress")
			{
				$sql= "Select a.tickets_id,a.ticket_code,a.subject,b.deptname,a.status,SUBSTR(created, 1, 10) as date_saved
			       FROM tbl_tickets  as a INNER JOIN tbl_departments as b ON a.departments_id=b.departments_id WHERE a.status='in_progress' and a.reporter='$user_id'";
			}
			if($status=="open")
			{
				$sql= "Select a.tickets_id,a.ticket_code,a.subject,b.deptname,a.status,SUBSTR(created, 1, 10) as date_saved
			       FROM tbl_tickets  as a INNER JOIN tbl_departments as b ON a.departments_id=b.departments_id WHERE a.status='open' and a.reporter='$user_id'";
			}
			if($status=="closed")
			{
				$sql= "Select a.tickets_id,a.ticket_code,a.subject,b.deptname,a.status,SUBSTR(created, 1, 10) as date_saved
			       FROM tbl_tickets  as a INNER JOIN tbl_departments as b ON a.departments_id=b.departments_id WHERE a.status='closed' and a.reporter='$user_id'";
			}
			
			//echo $sql; die;
			
			$query = $this->db->query($sql);
			$row = $query->result();
			
			$result['status']= true;
			$result['message'] = "Data Fetched Successfully";
			$result['data'] = $row ;
			
			
			return $result;

			 
		}
		
		
		public function getTicketDetailModel($post)
		{
			$tickets_id = $post['tickets_id'];
			
			
			// nOw getting the details of the  tickets
			
			$sql= "Select a.ticket_code,a.subject,a.status,a.priority,SUBSTR(a.created, 1, 10) as date_saved,c.deptname,b.fullname
			        FROM tbl_tickets as a INNER JOIN tbl_account_details as b ON a.reporter=b.user_id
					INNER JOIN tbl_departments as c on a.departments_id=c.departments_id
					WHERE a.tickets_id='$tickets_id'"; 
					
			$query_data = $this->db->query($sql);
            $row_data1 = $query_data->row();
			
			$row_data = array("ticket_code"=>$row_data1->ticket_code,
				                  "subject"=>$row_data1->subject,
				                  "status"=>$row_data1->status,
				                  "priority"=>$row_data1->priority,
				                  "date_saved"=>date('D F Y',strtotime($row_data1->date_saved)),
				                  "deptname"=>$row_data1->deptname,
								  "fullname"=>$row_data1->fullname
								 );
								 
			// Now sending all the comments  for the ticket


            $this->db->select('a.body,b.fullname,b.avatar');			
			$this->db->from('tbl_tickets_replies as a');
			$this->db->join('tbl_account_details as b','a.replierid=b.user_id','inner');
			$this->db->where('a.tickets_id',$tickets_id);
			$query_comment = $this->db->get();
			$row_comment = $query_comment->result();
			
			$result['status'] = true;
			$result['message'] = "Data Fetched Successfully";
			$result['data']['ticket_data']= $row_data;
			$result['data']['comments']= $row_comment;
			
			return $result;
			
		}
		
		public function saveAttachmentForBugModel($post,$width,$height,$filesize,$filename)
		{
			$bug_id = $post['bug_id'];
			$description = $post['description'];
			$title = $post['title'];
			$user_id = $post['user_id'];
			$uploaded_by = $post['name'];
			
			// inserting ther data in the tbl_task_attachment
			
			 $data_task_attachment = array("user_id"=>$user_id,
			                               "description"=>$description,
										   "title"=>$title,
                                            "bug_id"=>$bug_id										   
										   );
										   
			$this->db->insert('tbl_task_attachment',$data_task_attachment);							   
										   
			$attachment_id = $this->db->insert_id();


            // Now inserting the data in the tbl_task_uploaded_files
            
			$up_path = $_SERVER['DOCUMENT_ROOT']; 
            $data_upload = array("task_attachment_id"=>$attachment_id,
			                      "files"=>'uploads/'.$filename,
			                      "uploaded_path"=>$up_path.'/uploads/'.$filename,
			                      "file_name"=>$filename,
			                      "size"=>$filesize,
			                      "ext"=>'jpg',
			                      "is_image"=>1,
			                      "image_width"=>$width,
			                      "image_height"=>$height
								  );
								  
			$this->db->insert('tbl_task_uploaded_files',$data_upload);					  
			 
			$insert_id = $this->db->insert_id();
			
			
			// inserting the data in the tbl_activities
			
			$data_activity = array("user"=>$user_id,
			                       "module"=>"bug",
								   "module_field_id"=>1,
								   "icon"=>"fa-ticket",
								   "activity"=>"activity_new_bug_attachment",
								   "value1"=>$title
								  );
								  
			$this->db->insert('tbl_activities',$data_activity);	

            // End Inserting the data in the table activities	
			
			if($insert_id!="")
			{
				$result['status']= true;
				$result['message'] = "Attachment Uploaded Successfully";
				$result['data'] = $insert_id;
				
				
				
				// getting the details of the bug_id from tbl_bugs 
				
				$this->db->select('bug_title,permission');
				$this->db->from('tbl_bug');
				$this->db->where('bug_id',$bug_id);
				$query_bug = $this->db->get();
				$row_bug = $query_bug->row();
				$bug_title = $row_bug->bug_title; // this the bug title
				
				// getting the participants of this bugs
				
				$part = array_keys(json_decode($row_bug->permission,true));
					
				$user_ids = implode(",",$part); // these  sre the user_id of the users
				
				// fetching the Email id Of the users
				$sql="SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
				$query1 = $this->db->query($sql); 
				$row_part = $query1->result();// these are the participants for  this bug
				
				
				
				/* ##################### Start Of Mail Sending Code ################# */
				
				foreach($row_part as $part_email)
				{
					$email = $part_email->email;
					$config['useragent'] = 'Rebelute Digital Mailing System';
					$config['mailtype'] = "html";
					$config['newline'] = "\r\n";
					$config['charset'] = 'utf-8';
					$config['wordwrap'] = TRUE;
					$company_email = 'admin@rebelute.com';
					$company_name = 'Rebelute Digital Solutions';
					$subject = 'New Bug Attachment';
					
					
					$message = '<p>Hi there,</p><p>A new attachment&nbsp;has been uploaded by {UPLOADED_BY} to issue {BUG_TITLE}.</p><p>You can view the bug using the link below.</p><p><br /><big><strong><a href="{BUG_URL}">View Bug</a></strong></big></p><p><br />Regards<br />The {SITE_NAME} Team</p>';
					$bug_name = str_replace("{BUG_TITLE}", $bug_title, $message);
					$assigned_by = str_replace("{UPLOADED_BY}", ucfirst($uploaded_by), $bug_name);
					$Link = str_replace("{BUG_URL}", base_url() . 'admin/bugs/view_bug_details/' . $bug_id .'/'.'3', $assigned_by);
					$message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $Link);
					//echo $message; die;
					$this->load->library('email', $config);
					
					$this->email->from($company_email, $company_name);
					$this->email->to($email);

					$this->email->subject($subject);
					$this->email->message($message);
					$send = $this->email->send();
					
				}
				
				
				 /* ##################### End Of Mail Sending Code ################# */
			}
			else
			{
				$result['status']= false;
				$result['message'] = "Attachment Not Uploaded";
				$result['data'] = $insert_id;
			}
			
			
			return $result;
			
			
		}
	
	    public function getProjectCommentsListModel($post)
		{
			$project_id = $post['project_id'];
			
			// getting the comments from tbl_task_comment
			
			$sql = "Select a.comment,SUBSTR(a.comment_datetime,1,10) as date_saved,b.fullname,b.avatar
			        FROM tbl_task_comment as a INNER JOIN tbl_account_details as b on a.user_id=b.user_id
					WHERE a.project_id='$project_id'";
					
			$query = $this->db->query($sql);

            $row = $query->result();

            $result['status']= true;
            $result['message']="Data Fetched Successfully";
            $result['data'] =  $row;

            return $result;			
		}
		
		public function saveNewProjectCommentModel($post)
		{
			$user_id = $post['user_id'];
			$project_id = $post['project_id'];
			$comment = $post['comment'];
			$commented_by = $post['name'];
			$mail_comment = $comment;
			
			// first saving the data in the tbl_task_comment
			
			$data_comment = array("user_id"=>$user_id,
			                      "project_id"=>$project_id,
								  "comment"=>$comment
			                      );
			$this->db->insert('tbl_task_comment',$data_comment);

            $comment_id = $this->db->insert_id();

            if($comment_id!="")
			{
				$result['status']= true;
				$result['message'] = "Comment Posted Successfully";
				$result['data'] = $insert_id;
				
				
				// inserting the data in the tbl_activities
			
			$data_activity = array("user"=>$user_id,
			                       "module"=>"project",
								   "module_field_id"=>2,
								   "icon"=>"fa-ticket",
								   "activity"=>"activity_new_project_comment",
								   "value1"=>$comment
								  );
								  
			$this->db->insert('tbl_activities',$data_activity);	

            // End Inserting the data in the table activities	
				
				
				//Now fetching the project data
				
				$this->db->select('project_name,permission');
				$this->db->from('tbl_project');
				$this->db->where('project_id',$project_id);
				$query_project = $this->db->get();
				$row_project = $query_project->row();
				$project_name = $row_project->project_name;
				
				$part = array_keys(json_decode($row_project->permission,true));
				$user_ids = implode(",",$part); // these  sre the user_id of the users
				
				// fetching the Email id Of the users
				$sql="SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
				$query1 = $this->db->query($sql); 
				$row_part = $query1->result();// these are the participants for  this bug
				
				/* ##################### Start Of Mail Sending Code ################# */
				
				foreach($row_part as $part_email)
				{
					$email = $part_email->email;
					$config['useragent'] = 'Rebelute Digital Mailing System';
					$config['mailtype'] = "html";
					$config['newline'] = "\r\n";
					$config['charset'] = 'utf-8';
					$config['wordwrap'] = TRUE;
					$company_email = 'admin@rebelute.com';
					$company_name = 'Rebelute Digital Solutions';
					$subject = 'New Project Comment';
					
					
					$message = '<p>Hi There,</p><p>A new comment has been posted by <strong>{POSTED_BY}</strong> to project <strong>{PROJECT_NAME}</strong>.</p><p>You can view the comment using the link below:<br /><big><a href="{COMMENT_URL}"><strong>View Project</strong></a></big><br /><br /><em>'.$mail_comment.'</em><br /><br />Best Regards,<br />The {SITE_NAME} Team</p>';
					$projectName = str_replace("{PROJECT_NAME}",$project_name,$message);

					$assigned_by = str_replace("{POSTED_BY}", ucfirst($commented_by), $projectName);
                    $Link = str_replace("{COMMENT_URL}", base_url() . 'admin/project/project_details/' . $project_id . '/' . '3', $assigned_by);
                    $comments = str_replace("{COMMENT_MESSAGE}",$mail_comment,$Link);
					$message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $Link);
					//echo $message; die;
					$this->load->library('email', $config);
					
					$this->email->from($company_email, $company_name);
					$this->email->to($email);

					$this->email->subject($subject);
					$this->email->message($message);
					$send = $this->email->send();
					
				}
				
				
				 /* ##################### End Of Mail Sending Code ################# */
				
			}
            else
			{
				$result['status']= false;
				$result['message'] = "Comment Not Posted , Please Try Again";
				$result['data'] = $insert_id;
			}


            return $result;			
			
			
		}
		
		
		public function saveAttachmentForProjectModel($post,$width,$height,$filesize,$filename)
		{
			$project_id = $post['project_id'];
			$description = $post['description'];
			$title = $post['title'];
			$user_id = $post['user_id'];
			$uploaded_by = $post['name'];
			
			// inserting ther data in the tbl_task_attachment
			
			 $data_task_attachment = array("user_id"=>$user_id,
			                               "description"=>$description,
										   "title"=>$title,
                                            "project_id"=>$project_id										   
										   );
										   
			$this->db->insert('tbl_task_attachment',$data_task_attachment);							   
										   
			$attachment_id = $this->db->insert_id();


            // Now inserting the data in the tbl_task_uploaded_files
            
			$up_path = $_SERVER['DOCUMENT_ROOT']; 
            $data_upload = array("task_attachment_id"=>$attachment_id,
			                      "files"=>'uploads/'.$filename,
			                      "uploaded_path"=>$up_path.'/uploads/'.$filename,
			                      "file_name"=>$filename,
			                      "size"=>$filesize,
			                      "ext"=>'jpg',
			                      "is_image"=>1,
			                      "image_width"=>$width,
			                      "image_height"=>$height
								  );
								  
			$this->db->insert('tbl_task_uploaded_files',$data_upload);					  
			 
			$insert_id = $this->db->insert_id();
			
			if($insert_id!="")
			{
				$result['status']= true;
				$result['message'] = "Attachment Uploaded Successfully";
				$result['data'] = $insert_id;
				
				
				// inserting the data in the tbl_activities
			
				$data_activity = array("user"=>$user_id,
									   "module"=>"project",
									   "module_field_id"=>2,
									   "icon"=>"fa-ticket",
									   "activity"=>"activity_new_project_attachment",
									   "value1"=>$title
									  );
									  
				$this->db->insert('tbl_activities',$data_activity);	

            // End Inserting the data in the table activities
				
				
				
				// getting the details of the project_id from tbl_project 
				
				$this->db->select('project_name,permission');
				$this->db->from('tbl_project');
				$this->db->where('project_id',$project_id);
				$query_bug = $this->db->get();
				$row_bug = $query_bug->row();
				$project_name = $row_bug->project_name; // this the bug title
				
				// getting the participants of this bugs
				
				$part = array_keys(json_decode($row_bug->permission,true));
					
				$user_ids = implode(",",$part); // these  sre the user_id of the users
				
				// fetching the Email id Of the users
				$sql="SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
				$query1 = $this->db->query($sql); 
				$row_part = $query1->result();// these are the participants for  this bug
				
				
				
				/* ##################### Start Of Mail Sending Code ################# */
				
				foreach($row_part as $part_email)
				{
					$email = $part_email->email;
					$config['useragent'] = 'Rebelute Digital Mailing System';
					$config['mailtype'] = "html";
					$config['newline'] = "\r\n";
					$config['charset'] = 'utf-8';
					$config['wordwrap'] = TRUE;
					$company_email = 'admin@rebelute.com';
					$company_name = 'Rebelute Digital Solutions';
					$subject = 'New Project Attachment';
					
					
					$message = '<p>Hi There,</p><p>A new file has been uploaded by <strong>{UPLOADED_BY}</strong> to project <strong>{PROJECT_NAME}</strong>.<br />You can view the Project using the link below:<br /><big><a href="{PROJECT_URL}"><strong>View Project</strong></a></big><br /><br /><br />Best Regards,<br />The {SITE_NAME} Team</p>';
					$bug_name = str_replace("{PROJECT_NAME}", $project_name, $message);
					$assigned_by = str_replace("{UPLOADED_BY}", ucfirst($uploaded_by), $bug_name);
					$Link = str_replace("{PROJECT_URL}", base_url() . 'admin/project/project_details/' . $project_id . '/' .'4', $assigned_by);
					$message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $Link);
					//echo $message; die;
					$this->load->library('email', $config);
					
					$this->email->from($company_email, $company_name);
					$this->email->to($email);

					$this->email->subject($subject);
					$this->email->message($message);
					$send = $this->email->send();
					
				}
				
				
				 /* ##################### End Of Mail Sending Code ################# */
			}
			else
			{
				$result['status']= false;
				$result['message'] = "Attachment Not Uploaded";
				$result['data'] = $insert_id;
			}
			
			
			return $result;
		}
		
		
		public function saveTicketCommentModel($post)
		{
			$tickets_id = $post['tickets_id'];
			$body = $post['body'];
			$user_id = $post['user_id'];
			$posted_by = $post['name'];
			
			
			// Inserting the data in the tbl_ticket_replies
			$data_comment = array("tickets_id"=>$tickets_id,
			                      "body"=>$body,
                                  "replierid"=>$user_id								   
			                      );
								  
			$this->db->insert('tbl_tickets_replies',$data_comment);
            //echo $this->db->last_query();die;
            $comment_id = $this->db->insert_id();

            if($comment_id!="")
			{
				$result['status']= true;
				$result['message'] = "Comment Posted Successfully";
				$result['data'] = $comment_id;
				
				// getting the details of the ticket by ticket id
				$this->db->select('ticket_code,permission,status');
				$this->db->from('tbl_tickets');
				$this->db->where('tickets_id',$tickets_id);
				$query_ticket = $this->db->get();
				$row_ticket = $query_ticket->row();
				$ticket_code = $row_ticket->ticket_code;
				$status = $row_ticket->status;
				
				
				// getting the participants of this bugs
				if($row_ticket->permission!="all")
				{
					$part = array_keys(json_decode($row_ticket->permission,true));
						
					$user_ids = implode(",",$part); // these  sre the user_id of the users
					
					// fetching the Email id Of the users
					$sql="SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
					$query1 = $this->db->query($sql); 
					$row_part = $query1->result();// these are the participants for  this bug
					
					/* ##################### Start Of Mail Sending Code ################# */
					
					foreach($row_part as $part_email)
					{
						$email = $part_email->email;
						$config['useragent'] = 'Rebelute Digital Mailing System';
						$config['mailtype'] = "html";
						$config['newline'] = "\r\n";
						$config['charset'] = 'utf-8';
						$config['wordwrap'] = TRUE;
						$company_email = 'admin@rebelute.com';
						$company_name = 'Rebelute Digital Solutions';
						$subject = 'New Project Attachment';
						
						
						$message = '<div style="height: 7px; background-color: #535353;"></div><div style="background-color:#E8E8E8; margin:0px; padding:55px 20px 40px 20px; font-family:Open Sans, Helvetica, sans-serif; font-size:12px; color:#535353;"><div style="text-align:center; font-size:24px; font-weight:bold; color:#535353;">Ticket Response</div><div style="border-radius: 5px 5px 5px 5px; padding:20px; margin-top:45px; background-color:#FFFFFF; font-family:Open Sans, Helvetica, sans-serif; font-size:13px;"><p>A new response has been added to Ticket #{TICKET_CODE}<br><br> Ticket : #{TICKET_CODE} <br>Status : {TICKET_STATUS} <br><br></p>To see the response and post additional comments, click on the link below.<br><br>         <big><b><a href="{TICKET_LINK}">View Reply</a> </b></big><br><br>          Note: Do not reply to this email as this email is not monitored.<br><br>     Regards<br>The {SITE_NAME} Team<br></div></div>';
						$TicketCode = str_replace("{TICKET_CODE}", $ticket_code, $message);
						$TicketStatus = str_replace("{TICKET_STATUS}", ucfirst($status), $TicketCode);
						$TicketLink = str_replace("{TICKET_LINK}", base_url() . 'client/tickets/index/tickets_details/' . $tickets_id, $TicketStatus);
						$message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $TicketLink);
						//echo $message; die;
						$this->load->library('email', $config);
						
						$this->email->from($company_email, $company_name);
						$this->email->to($email);

						$this->email->subject($subject);
						$this->email->message($message);
						$send = $this->email->send();
						
					}
					
					
					 /* ##################### End Of Mail Sending Code ################# */
				
				}
				
			}
            else
			{
				$result['status']= false;
				$result['message'] = "Comment Not Posted , Please try Again";
				$result['data'] = $comment_id;
			}

            return $result;			
			
		}
		
		
		public function saveInvoiceStatusModel($invoice_number,$transaction_id,$payment_status,$payment_message,$currency,$amount,$user_id,$payer_email)
		{
			// inserting the the data in the tbl_payments tables
			if($payment_status=="Success")
			{
                $data = array("invoices_id"=>$invoice_number,
			               "trans_id"=>$transaction_id,
			               "payer_email"=>$payer_email, 
			               "amount"=>$amount,
			               "payment_method"=>6, 
			               "currency"=>$currency,
                           "payment_date"=>date('Y-m-d'),
                           "month_paid"=>date('m'),
                           "year_paid"=>date('Y'),
                           "paid_by"=>$user_id						   
			               );
                $this->db->insert('tbl_payments',$data);
				
				//echo $this->db->last_query();
				// updating the values in the tbl_invoices tables
				
				$updated = array("status"=>"Paid");
				$this->db->where('invoices_id',$invoice_number);
				$this->db->update('tbl_invoices',$updated);

            }
			 
			return true;
			
		}
		
		
		public function getTaskListModel($post)
		{
			$project_id = $post['project_id'];
			
			$this->db->select('task_id,task_name,due_date,task_status,task_progress');
			$this->db->from('tbl_task');
			$this->db->where('project_id',$project_id);
			$query = $this->db->get();
			$row = $query->result();
			
			$result['status']=true;
			$result['message']= "Data fetched Successfully";
			$result['data'] = $row;
			
			return $result;
		}
		
		public function getTaskDetailsModel($post)
		{
			$task_id = $post['task_id'];
			
			// Here first getting the data of the tasks
			$this->db->select('a.project_name,b.task_name,b.task_description,b.task_start_date,b.due_date,b.task_status,b.task_progress,b.permission,b.task_hour,b.timer_status,b.task_created_date,c.fullname');
			$this->db->from('tbl_project as a');
			$this->db->join('tbl_task as b','a.project_id=b.project_id','inner');
			$this->db->join('tbl_account_details as c','b.created_by=c.user_id','inner');
			$this->db->where('b.task_id',$task_id);
			$query_data = $this->db->get();
			//echo $this->db->last_query();die;
			$row_data1 = $query_data->row();
			
			$row_data = array("project_name"=>$row_data1->project_name,
			                  "task_name"=>$row_data1->task_name,
			                  "task_description"=>$row_data1->task_description,
			                  "task_start_date"=>$row_data1->task_start_date,
			                  "due_date"=>$row_data1->due_date,
			                  "task_status"=>$row_data1->task_status,
			                  "task_progress"=>$row_data1->task_progress,
			                  "task_hour"=>$row_data1->task_hour,
			                  "timer_status"=>$row_data1->timer_status,
			                  "task_created_date"=>date('Y-m-d',strtotime($row_data1->task_created_date)),
			                  "fullname"=>$row_data1->fullname
			                  );
			
			
			// now  getting the list of  persons  to whom task is assigned
			if($row_data1->permission!="all")
			{
				$part = array_keys(json_decode($row_data1->permission,true));
						
				$user_ids = implode(",",$part); // these  sre the user_id of the users
				
				// fetching the Email id Of the users
				$sql="SELECT fullname,avatar FROM (`tbl_account_details`) WHERE user_id IN ($user_ids) ";
				$query1 = $this->db->query($sql); 
				$row_part = $query1->result();// these are the participants for  this bug
			}
			else
			{
				$row_part="";
			}
			
			
			$result['status'] = true;
			$result['message'] = "Data Fetched Successfully";
			$result['data']['task']= $row_data;
			$result['data']['users']= $row_part;
			
			
			return $result;
			
		}
		
		public function getTaskCommentsModel($post)
		{
			$task_id = $post['task_id'];
			
			$sql = "SELECT a.comment,SUBSTR('a.comment_datetime',1,10) as save_date ,b.fullname,b.avatar
			        FROM tbl_task_comment as a
					INNER JOIN tbl_account_details as b ON a.user_id=b.user_id
					WHERE a.task_id='$task_id'";
					
			$query = $this->db->query($sql);
            $row = $query->result();
			
			// Now getting the users of the task to whom it is assigned
			
			$this->db->select('permission');
			$this->db->from('tbl_task');
			$this->db->where('task_id',$task_id);
			$query_user = $this->db->get();
			$row_user = $query_user->row();
			
			
			$result['status']= true;
			$result['message'] = "Data Fetched Successfully";
			$result['data']= $row;
			
			return $result;
             			
		}
		
		public function saveNewTaskCommentModel($post)
		{
			$user_id = $post['user_id'];
			$posted_by = $post['name'];
			$task_id = $post['task_id'];
			$comment = $post['comment'];
			
			
			$data_comment=array("task_id"=>$task_id,
			                    "user_id"=>$user_id,
								"comment"=>$comment,
							   );
							   
			$this->db->insert('tbl_task_comment',$data_comment);
            $comment_id = $this->db->insert_id();
			
			if($comment_id!="")
			{
				$result['status']=true;
				$result['message']= "Data Saved Successfully";
				$result['data']= $comment_id;
				
				
				// inserting the data in the tbl_activities
			
				$data_activity = array("user"=>$user_id,
									   "module"=>"tasks",
									   "module_field_id"=>2,
									   "icon"=>"fa-ticket",
									   "activity"=>"activity_new_task_comment",
									   "value1"=>$comment
									  );
									  
				$this->db->insert('tbl_activities',$data_activity);	

            // End Inserting the data in the table activities
				
				// getting the users of the tasks 
				
				$this->db->select('task_name,permission');
				$this->db->from('tbl_task');
				$this->db->where('task_id',$task_id);
				$query_users= $this->db->get();
				$row_user = $query_users->row();
				$task_name = $row_user->task_name;
				
				if($row_user->permission!="all")
				{
					$part = array_keys(json_decode($row_user->permission,true));
						
					$user_ids = implode(",",$part); // these  sre the user_id of the users
					
					// fetching the Email id Of the users
					$sql="SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
					$query1 = $this->db->query($sql); 
					$row_part = $query1->result();// these are the participants for  this bug
					
					/* ##################### Start Of Mail Sending Code ################# */
					
					foreach($row_part as $part_email)
					{
						$email = $part_email->email;
						$config['useragent'] = 'Rebelute Digital Mailing System';
						$config['mailtype'] = "html";
						$config['newline'] = "\r\n";
						$config['charset'] = 'utf-8';
						$config['wordwrap'] = TRUE;
						$company_email = 'admin@rebelute.com';
						$company_name = 'Rebelute Digital Solutions';
						$subject = 'New Task Comment Received';
						
						
						$message = '<p>Hi There,</p><p>A new comment has been posted by <strong>{POSTED_BY}</strong> to <strong>{TASK_NAME}</strong>.</p><p>You can view the comment using the link below:<br /><big><strong><a href="{COMMENT_URL}">View Comment</a></strong></big><br /><br /><em>{COMMENT_MESSAGE}</em><br /><br />Best Regards,<br />The {SITE_NAME} Team</p>';
						$TicketCode = str_replace("{POSTED_BY}", $posted_by, $message);
						$TicketStatus = str_replace("{TASK_NAME}", $task_name, $TicketCode);
						$TicketLink = str_replace("{COMMENT_URL}", base_url() . 'admin/tasks/view_task_details/' . $task_id . '/' .'2', $TicketStatus);
						$CommentMessage = str_replace("{COMMENT_MESSAGE}", $comment, $TicketLink);
						$message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $CommentMessage);
						//echo $message; die;
						$this->load->library('email', $config);
						
						$this->email->from($company_email, $company_name);
						$this->email->to($email);

						$this->email->subject($subject);
						$this->email->message($message);
						$send = $this->email->send();
						
					}
					
					
					 /* ##################### End Of Mail Sending Code ################# */
				
				}
				
				
				
			}
			else
			{
				$result['status']=false;
				$result['message']= "Data Not Saved ";
				$result['data']= "";
			}
			
			return $result;
         			
		}
		
		
		public function saveTaskAttachmentModel($post,$width,$height,$filesize,$filename)
		{
			$task_id = $post['task_id'];
			$description = $post['description'];
			$title = $post['title'];
			$user_id = $post['user_id'];
			$uploaded_by = $post['name'];
			
			// inserting ther data in the tbl_task_attachment
			
			 $data_task_attachment = array("user_id"=>$user_id,
			                               "description"=>$description,
										   "title"=>$title,
                                            "task_id"=>$task_id										   
										   );
										   
			$this->db->insert('tbl_task_attachment',$data_task_attachment);							   
										   
			$attachment_id = $this->db->insert_id();


            // Now inserting the data in the tbl_task_uploaded_files
            
			$up_path = $_SERVER['DOCUMENT_ROOT']; 
            $data_upload = array("task_attachment_id"=>$attachment_id,
			                      "files"=>'uploads/'.$filename,
			                      "uploaded_path"=>$up_path.'/uploads/'.$filename,
			                      "file_name"=>$filename,
			                      "size"=>$filesize,
			                      "ext"=>'jpg',
			                      "is_image"=>1,
			                      "image_width"=>$width,
			                      "image_height"=>$height
								  );
								  
			$this->db->insert('tbl_task_uploaded_files',$data_upload);					  
			 
			$insert_id = $this->db->insert_id();
			
			
			// inserting the data in the tbl_activities
			
			$data_activity = array("user"=>$user_id,
			                       "module"=>"task",
								   "module_field_id"=>3,
								   "icon"=>"fa-ticket",
								   "activity"=>"activity_new_task_attachment",
								   "value1"=>$title
								  );
								  
			$this->db->insert('tbl_activities',$data_activity);	

            // End Inserting the data in the table activities			
			
			if($insert_id!="")
			{
				$result['status']= true;
				$result['message'] = "Attachment Uploaded Successfully";
				$result['data'] = $insert_id;
				
				
				
				// getting the details of the task from tbl_task 
				
				$this->db->select('task_name,permission');
				$this->db->from('tbl_task');
				$this->db->where('task_id',$task_id);
				$query_bug = $this->db->get();
				$row_bug = $query_bug->row();
				$task_name = $row_bug->task_name; // this the bug title
				
				// getting the participants of this bugs
				
				$part = array_keys(json_decode($row_bug->permission,true));
					
				$user_ids = implode(",",$part); // these  sre the user_id of the users
				
				// fetching the Email id Of the users
				$sql="SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
				$query1 = $this->db->query($sql); 
				$row_part = $query1->result();// these are the participants for  this bug
				
				
				
				/* ##################### Start Of Mail Sending Code ################# */
				
				foreach($row_part as $part_email)
				{
					$email = $part_email->email;
					$config['useragent'] = 'Rebelute Digital Mailing System';
					$config['mailtype'] = "html";
					$config['newline'] = "\r\n";
					$config['charset'] = 'utf-8';
					$config['wordwrap'] = TRUE;
					$company_email = 'admin@rebelute.com';
					$company_name = 'Rebelute Digital Solutions';
					$subject = 'New Task Attachment Mail';
					
					
					$message = '<p>Hi There,</p><p>A new file has been uploaded by <strong>{UPLOADED_BY} </strong>to Task <strong>{TASK_NAME}</strong>.<br />You can view the Task&nbsp;using the link below:</p><p><br /><big><a href="{TASK_URL}"><strong>View Task</strong></a></big><br /><br />Best Regards,<br />The {SITE_NAME} Team</p>';
					$bug_name = str_replace("{TASK_NAME}", $task_name, $message);
					$assigned_by = str_replace("{UPLOADED_BY}", ucfirst($uploaded_by), $bug_name);
					$Link = str_replace("{TASK_URL}", base_url() . 'admin/tasks/view_task_details/' . $task_id . '/' .'3', $assigned_by);
					$message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $Link);
					//echo $message; die;
					$this->load->library('email', $config);
					
					$this->email->from($company_email, $company_name);
					$this->email->to($email);

					$this->email->subject($subject);
					$this->email->message($message);
					$send = $this->email->send();
					
				}
				
				
				 /* ##################### End Of Mail Sending Code ################# */
			}
			else
			{
				$result['status']= false;
				$result['message'] = "Attachment Not Uploaded";
				$result['data'] = $insert_id;
			}
			
			
			return $result;
		}
		
		public function getRecentActivitiesBugsModel()
		{
			
			$this->db->select('a.activity,a.value1,b.fullname,b.avatar');
			$this->db->from('tbl_activities as a');
			$this->db->join('tbl_account_details as b','a.user=b.user_id','inner');
			$this->db->where('a.module','bugs');
			$query = $this->db->get();
			$row = $query->result();
			
			foreach($row as $temp_row)
			{
				if($temp_row->activity=="activity_new_bug")
					$act = "Activity New Bug Added";
				else if($temp_row->activity=="activity_update_bug")
				    $act = "Activity Bug Updated";
				else if($temp_row->activity=="activity_new_bug_comment")
                    $act = "Activity Bug New Comment";
                else
                    $act ="Activity Attach New Files";					
				   
				 $data[]=array("activity"=>$act,
				               "value1"=>$temp_row->value1,
							   "fullname"=>$temp_row->fullname,
							   "avatar"=>$temp_row->avatar
							   );
			}
			
			$result['status'] = true;
			$result['message'] = "Message Fetched Successfully";
			$result['data'] = $data;
			
			return $result;
			
			
		}
		
		
		public function getRecentActivitiesProjectsModel()
		{
			$this->db->select('a.activity,a.value1,b.fullname,b.avatar');
			$this->db->from('tbl_activities as a');
			$this->db->join('tbl_account_details as b','a.user=b.user_id','inner');
			$this->db->where('a.module','project');
			$query = $this->db->get();
			$row = $query->result();
			
			foreach($row as $temp_row)
			{
				if($temp_row->activity=="activity_save_project")
					$act = "Activity New Project Added";
				else if($temp_row->activity=="activity_update_project")
				    $act = "Activity Project Updated";
				else if($temp_row->activity=="activity_new_project_comment")
                    $act = "Activity Project New Comment";
                else
                    $act ="Activity Attach New Files";					
				   
				 $data[]=array("activity"=>$act,
				               "value1"=>$temp_row->value1,
							   "fullname"=>$temp_row->fullname,
							   "avatar"=>$temp_row->avatar
							   );
			}
			
			$result['status'] = true;
			$result['message'] = "Message Fetched Successfully";
			$result['data'] = $data;
			
			return $result;
		}
		
		
		public function getPaymentListClientModel($post)
		{
			$company_id = $post['company_id'];
			$sql="Select a.name,b.invoices_id from tbl_client as a 
			         INNER JOIN  tbl_invoices as b ON a.client_id=b.client_id 
					 INNER JOIN tbl_payments as c ON b.invoices_id=c.invoices_id
					 WHERE a.client_id='$company_id'";
			//echo $sql;die;
			$query_main = $this->db->query($sql);
			$row_main = $query_main->result();
			
			
			$data = array();
			
			// now getting the details of the payments
			foreach($row_main as $data_pay)
			{
				$invoice_id = $data_pay->invoices_id;
				
				// Now Getting the total Amount of the Invlice
				
				$sql_sum ="Select SUM(total_cost) as total_cost from tbl_items where invoices_id='$invoice_id'";
				$query_sum = $this->db->query($sql_sum);
				$row_sum = $query_sum->row();
				$invoice_amount = $row_sum->total_cost;
				
				
				// Now getting the  paid date and the transaction id
				
				$sql_payment = "Select trans_id,amount,currency,payment_date from tbl_payments  where payments_id=(SELECT MAX(payments_id) from tbl_payments where invoices_id='$invoice_id')";
				//echo $sql_payment; die;
				$query_pay = $this->db->query($sql_payment);
				$row_sum = $query_pay->row();
			
				
				$data[]=array("client_name"=>$data_pay->name,
				              "total_amount"=>$invoice_amount,
				              "transaction_id"=>$row_sum->trans_id, 
				              "pay_date"=>$row_sum->payment_date,
							  "currency"=>$row_sum->currency,
							  "invoices_id"=>$invoice_id
				
				             );
				
				
			}// end of for each loop
			
			
			
			$result['status']= true;
			$result['message']="Data Fetched";
			$result['data'] = $data;
			
			return $result;
			
		}
		
		
	    public function getPaymentDetailsModel($post)
		{
			$invoice_id = $post['invoices_id'];
			
			$this->db->select('a.invoices_id,a.reference_no,a.notes,SUM(b.total_cost) as total_cost,c.name,d.trans_id,d.amount,d.currency,d.payment_date,e.method_name');
			$this->db->from('tbl_invoices as a');
			$this->db->join('tbl_items as b','a.invoices_id=b.invoices_id','inner');
			$this->db->join('tbl_client as c','a.client_id=c.client_id','inner');
			$this->db->join('tbl_payments as d','a.invoices_id=d.invoices_id','inner');
			$this->db->join('tbl_payment_methods as e','d.payment_method=e.payment_methods_id','inner');
			$this->db->where('a.invoices_id',$invoice_id);
			$query= $this->db->get();
			$row_main = $query->row();
			
			$data_main = array("invoices_id"=>$row_main->invoices_id,
			                   "reference_no"=>$row_main->reference_no,
			                   "notes"=>$row_main->notes,
			                   "total_cost"=>$row_main->total_cost,
			                   "client_name"=>$row_main->name,
			                   "trans_id"=>$row_main->trans_id,
			                   "amount"=>$row_main->amount,
			                   "currency"=>$row_main->currency,
			                   "amount"=>$row_main->amount,
			                   "payment_date"=>$row_main->payment_date,
							   "payment_method"=>$row_main->method_name
							   
			                   );
							   
		 	// Getting the cmpany Name and address
			
			$sql_company = "Select * from tbl_config where config_key IN('company_address','company_logo','company_name')";
			$query_company = $this->db->query($sql_company);
			$row_company = 	$query_company->result();
			
			$company = array($row_company[0]->config_key=>$row_company[0]->value,
			                 $row_company[1]->config_key=>$row_company[1]->value,
							 $row_company[2]->config_key=>$row_company[2]->value,
							);
			

            
            $result['status']= true;
            $result['message']="Data Getched Successfully";
            $result['data']['client']= 	$data_main;
            $result['data']['company'] = $company;
			
			return $result;
            			
							   
							   
							   
		}
		
		
		public function saveInvoicePaypalpaymentModel($post)
		{
			$payment_status = $post['payment_status'];
			$invoice_id = $post['invoice_id'];
			$transaction_id = $post['transaction_id'];
			$description = $post['description'];
			$amount = $post['amount'];
			$currency = "USD";
			$user_id = $post['user_id'];
			$user_email = $post['user_email'];
			$payment_method = 7;
			
			// Now saving theese information in tbl_paymetns
			
			$data = array("invoices_id"=>$invoice_id,
			              "trans_id"=>$transaction_id,
			              "payer_email"=>$user_email,
			              "payment_method"=>$payment_method,
			              "amount"=>$amount,
			              "currency"=>$currency,
			              "notes"=>$description,
			              "month_paid"=>date('m'),
						  "year_paid"=>date('Y'),
						  "paid_by"=>$user_id,
						  "payment_date"=>date('Y-m-d')
			              );
						  
						  
			$this->db->insert('tbl_payments',$data);

            $insert_id = $this->db->insert_id();
            
             if($insert_id!="")
			 {
				 $result['status']=true;
				 $result['message']= "Payment Made Successfully";
				 $result['data']= $insert_id;
			 }
             else
			 {
				 $result['status']=false;
				 $result['message']= "Payment Information Not Saved";
				 $result['data']= 0;
			 }

            return $result;			 
						  
			
		}
	   
	
	
	}//End Of class
?>