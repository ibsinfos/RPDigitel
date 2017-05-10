<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class webservices_model extends MY_Model
{

    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }

    public function register_userModel($post, $filename)
    {
        //including the encryotion library

        require_once dirname(__FILE__) . '/../../libraries/MCrypt.php';
        $mcrypt = new MCrypt();

        //echo "<pre>"; print_r($post);die;
		
        $name = addslashes($post['name']);
        $email = base64_decode(addslashes($post['email']));
        $phone = base64_decode($post['phone']);
        $username = base64_decode(addslashes($post['username']));
        //$password = $this->hash($mcrypt->decrypt(trim($post['password'])));
        $password = $this->hash(base64_decode(trim($post['password'])));
        $device_id = $post['device_id'];
        $last_ip = $this->input->ip_address();
        $user_type = $post['user_type'];
        if ($user_type == 2) {
            $client_type = $post['client_type'];
        } else {
            $client_type = "";
        }

        /*         * **** Checking for the already used email and  phone number  ************* */

        $this->db->select('a.username,a.email,b.mobile');
        $this->db->from('tbl_users as a');
        $this->db->join('tbl_account_details as b', 'a.user_id=b.user_id', 'left');
        $this->db->where('a.username', $username);
        $this->db->or_where('b.phone', $phone);
        $this->db->or_where('a.email', $email);
        $query1 = $this->db->get();
		//echo $this->db->last_query();die;
        $count1 = $query1->row();
        $count = $query1->num_rows();
        if ($count == 0) { //echo "iffffffffff"; die;
            // Condition where emial and phone doesnot exits
            if ($user_type != 2) {

                $data = array("username" => $username,
                    "email" => $email,
                    "password" => $password,
                    "last_ip" => $last_ip,
                    "role_id" => $user_type
                );

                $this->db->insert('tbl_users', $data);
                //echo $this->db->last_query(); die; 
                $user_id = $this->db->insert_id();

                // Inserting the values in tbl_account_details
                $data_detail = array("user_id" => $user_id,
                    "fullname" => $name,
                    "mobile" => $phone,
                    "device_id" => $device_id,
                    "avatar" => 'uploads/' . $filename
                );

                $this->db->insert('tbl_account_details', $data_detail);
                //echo $this->db->last_query(); 
                $row['status'] = true;
                $row['message'] = "User Registered Successfully";
                $row['user_id'] = $user_id;
            } else {
                // IN this case , he user registers as a Company 
                // So we need tosave the Company detils first
                // here there are two conditions ,
                // 1. if the company is already there in the db
                // 2. else adding the new company 

                if ($post['company_email'] != "" && $post['company_phone'] != "" && $post['company_mobile'] != "") {

                    // here in this case the user registers his new company 
                    // saving the company first in tbl_clients

                    $company_name = $post['company_name'];
                    $company_email = base64_decode(addslashes($post['company_email']));
                    $company_phone = base64_decode(addslashes($post['company_phone']));
                    $company_mobile = base64_decode(addslashes($post['company_mobile']));

                    $company_array = array("name" => $company_name,
                        "phone" => $company_phone,
                        "mobile" => $company_mobile,
                        "email" => $company_email
                    );

                    $this->db->insert('tbl_client', $company_array);
                    $company_id = $this->db->insert_id();
                } else if ($post['company_name'] != "" && $post['company_email'] == "" && $post['company_phone'] == "" && $post['company_mobile'] == "") {

                    /// Here in this case the user registers with already existing company
                    $company_id = $post['company_name'];
                } else {

                    // IN this case the client registers as a person
                    $company_array = array("name" => $name,
                        "phone" => '',
                        "mobile" => $phone,
                        "email" => $email
                    );

                    $this->db->insert('tbl_client', $company_array);
                    $company_id = $this->db->insert_id();
                }

                // Mow inserting the  the rest of the data in the user tables
                // relating the data to the company id

                $data = array("username" => $username,
                    "email" => $email,
                    "password" => $password,
                    "last_ip" => $last_ip,
                    "role_id" => $user_type
                );

                $this->db->insert('tbl_users', $data);
                $user_id = $this->db->insert_id();
				

                // Inserting the values in tbl_account_details
                $data_detail = array("user_id" => $user_id,
                    "fullname" => $name,
                    "mobile" => $phone,
                    "device_id" => $device_id,
                    "avatar" => 'uploads/' . $filename,
                    "company" => $company_id
                );

                $this->db->insert('tbl_account_details', $data_detail);

                $row['status'] = true;
                $row['message'] = "User Registered Successfully";
                $row['user_id'] = $user_id;
            }
        } else {
            // error section , where username or email or mobile already exists
            if ($count1->username == $username) {
                $row['status'] = false;
                $row['message'] = "Same Username Already Exists";
            } else if ($count1->email == $email) {
                $row['status'] = false;
                $row['message'] = "Same Email Already Exists";
            } else {
                $row['status'] = false;
                $row['message'] = "Same Mobile Number Already Exists";
            }
        }

        return $row;
    }

    public function login_userModel($post,$filename)
    {
        
        $login_type = $post['login_type'];
        $device_id = $post['device_id'];
        require_once dirname(__FILE__) . '/../../libraries/MCrypt.php';
        $mcrypt = new MCrypt();

        if ($login_type != 1) {
            // This menas this is not normal login 
            // in  this case we  need to register the user if not registered
            //$name = $mcrypt->decrypt(addslashes($post['name']));
            $name = base64_decode(addslashes($post['name']));
            $unique_id = base64_decode(addslashes($post['unique_id']));
            $email = base64_decode(addslashes($post['email']));
            $phone = base64_decode($post['phone']);
            $username = base64_decode(addslashes($post['username']));
            $user_type = $post['user_type'];
            if ($user_type == 2) {
                $client_type = $post['client_type'];
            } else {
                $client_type = "";
            }

            $last_ip = $this->input->ip_address();
        }

        if ($login_type == 1) {

            //echo $mcrypt->encrypt(addslashes($post['username']));
            //echo "</br>";
            //echo $mcrypt->encrypt(addslashes($post['password']));die;
            $username = base64_decode(addslashes($post['username']));
            //$password = $this->hash($mcrypt->decrypt(addslashes($post['password'])));
            $password = $this->hash(base64_decode($post['password']));
           // echo $password; die;
            $where = array("a.username" => $username,
                "a.password" => $password
            );
            /*             * ******** Checking the email and password ******** */



            $this->db->select('a.user_id,a.username,a.role_id,b.fullname,a.email,b.mobile,b.device_id,b.avatar,b.company');
            $this->db->from('tbl_users as a');
            $this->db->join('tbl_account_details as b', 'a.user_id=b.user_id', 'inner');
            //$this->db->join('tbl_client as c','b.company=c.client_id','inner');
            $this->db->where($where);
            $query = $this->db->get();
			//echo $this->db->last_query();die;
            $count = $query->num_rows();
            if ($count != 0) {
                // means username  and password is valid , 
                // updating the devie id here

                $user = $query->row();
                $user_id = $user->user_id;
                $update = array("device_id" => $device_id);
                $this->db->where('user_id', $user_id);
                $this->db->update('tbl_users', $update);

                // Now setting the fetched information in formatted array 

                $row = $query->row();
                if ($row->role_id == 1)
                    $usertype = "Admin";
                else if ($row->role_id == 2)
                    $usertype = "Client";
                else
                    $usertype = "Staff";

                if ($row->role_id == 2) {

                    $this->db->select('a.user_id,a.username,a.role_id,b.fullname,a.email,b.mobile,b.device_id,b.avatar,b.company,c.name as company_name,c.email as company_email,c.phone as company_phone,c.mobile as company_mobile');
                    $this->db->from('tbl_users as a');
                    $this->db->join('tbl_account_details as b', 'a.user_id=b.user_id', 'inner');
                    $this->db->join('tbl_client as c', 'b.company=c.client_id', 'inner');
                    $this->db->where($where);
                    $query = $this->db->get(); //echo $this->db->last_query();die;
                    $row = $query->row();

                    $data = array("user_id" => $row->user_id,
                        "name" => $row->fullname,
                        "email" => $row->email,
                        "phone" => $row->mobile,
                        "profile_image" => $row->avatar,
                        "username" => $row->username,
                        "user_type" => $usertype,
                        "company_id" => $row->company,
                        "company_name" => $row->company_name,
                        "company_email" => $row->company_email,
                        "company_phone" => $row->company_phone,
                        "company_mobile" => $row->company_mobile,
                    );
                } else {
                    $data = array("user_id" => $row->user_id,
                        "name" => $row->fullname,
                        "email" => $row->email,
                        "phone" => $row->mobile,
                        "profile_image" => $row->avatar,
                        "username" => $row->username,
                        "user_type" => $usertype
                    );
                }


                $result['status'] = true;
                $result['message'] = "Success";
                $result['data'] = $data;
            } else {
                $result['status'] = false;
                $result['message'] = "Username Or Password Is Invalid";
            }
        }
        // end if for normal login

        /*         * ******** Start For Login With facebook ******* */

        if ($login_type == 2) {
            /*     * *********** Start For the Facebook Login *********** */


            $profile_image = $filename;

            /* -- Checking whether the unique id already exists ----- */

            $this->db->select('a.user_id,a.email,a.username,a.unique_id,a.role_id,b.fullname,b.mobile,b.device_id,b.avatar,b.company');
            $this->db->from('tbl_users as a');
            $this->db->join('tbl_account_details as b', 'a.user_id=b.user_id', 'inner');
            $this->db->where('a.unique_id', $unique_id);
            $this->db->or_where('a.username', $username);
            $this->db->or_where('a.email', $email);
            //$this->db->or_where('b.mobile',$phone);

            $query1 = $this->db->get();
            //echo $this->db->last_query();die; 
            $count_user = $query1->num_rows();
            if ($count_user == 0) {
                /* ------- This means user recore does not  exist ---- */

                 if ($user_type != 2) {

                    $data = array("username" => $username,
                        "email" => $email,
                        "last_ip" => $last_ip,
                        "role_id" => $user_type,
                        "unique_id" => $unique_id
                    );

                    $this->db->insert('tbl_users', $data);
                    //echo $this->db->last_query(); die; 
                    $user_id = $this->db->insert_id();

                    // Inserting the values in tbl_account_details
                    $data_detail = array("user_id" => $user_id,
                        "fullname" => $name,
                        "mobile" => $phone,
                        "device_id" => $device_id,
                        "avatar" => 'uploads/' . $filename
                    );

                    $this->db->insert('tbl_account_details', $data_detail);
                    //echo $this->db->last_query();

                    if ($user_type == 1) {
                        $user = "Admin";
                    } else if ($user_type == 2) {
                        $user = "Client";
                    } else {
                        $user = "Staff";
                    }
                    $company_name = "";
                    // creating the data for output
                    $full_data = array("user_id" => $user_id,
                        "username" => $username,
                        "name" => $name,
                        "email" => $email,
                        "user_type" => $user,
                        "profile_image" => 'uploads/' . $filename,
                        "company_name" => $company_name,
                        "company_id" => '',
                        "company_email" => '',
                        "company_mobile" => '',
                        "company_phone" => '',
                        "unique_id" => $unique_id,
                        "phone" => $phone
                    );

                    $result['status'] = true;
                    $result['message'] = "Success";
                    $result['data'] = $full_data;
                } else { 
                    // IN this case , he user registers as a Client
                    // May be as Person Or Company
                    // So we need tosave the Company detils first
                    // here there are two conditions ,
                    // 1. if the company is already there in the db
                    // 2. else adding the new company 

                    if ($post['company_email'] != "" && $post['company_phone'] != "" && $post['company_mobile'] != "") {
                        // here in this case the user registers his new company 
                        // saving the company first in tbl_clients
                        
                        $company_name = $post['company_name'];
                        $company_email = base64_decode(addslashes($post['company_email']));
                        $company_phone = base64_decode(addslashes($post['company_phone']));
                        $company_mobile = base64_decode(addslashes($post['company_mobile']));

                        $company_array = array("name" => $company_name,
                            "phone" => $company_phone,
                            "mobile" => $company_mobile,
                            "email" => $company_email
                        );

                        $this->db->insert('tbl_client', $company_array);
                        $company_id = $this->db->insert_id();
                    } else if ($post['company_name'] != "" && $post['company_email'] == "" && $post['company_phone'] == "" && $post['company_mobile'] == "") {
                        /// Here in this case the user registers with already existing company
                        
						$company_id = $post['company_name'];

                        // fetching the data of the company
                        $this->db->select('name,phone,mobile,email');
                        $this->db->from('tbl_client');
                        $this->db->where('client_id', $company_id);
                        $query_company = $this->db->get();
                        $row_company = $query_company->row();

                        $company_name = $row_company->name;
                        $company_mobile = $row_company->mobile;
                        $company_phone = $row_company->phone;
                        $company_email = $row_company->email;
                    } else {
                        
                        // IN this case the client registers as a person
                        $company_array = array("name" => $name,
                            "phone" => '',
                            "mobile" => $phone,
                            "email" => $email
                        );

                        $this->db->insert('tbl_client', $company_array);
						//echo $this->db->last_query();die;
                        $company_id = $this->db->insert_id();

                        // Assingingin the company detials  to be sent 
                        $company_name = $name;
                        $company_mobile = $phone;
                        $company_phone = '';
                        $company_email = $email;
                    }

                    // Mow inserting the  the rest of the data in the user tables
                    // relating the data to the company id

                    $data = array("username" => $username,
                        "email" => $email,
                        "last_ip" => $last_ip,
                        "role_id" => $user_type,
                        "unique_id" => $unique_id
                    );

                    $this->db->insert('tbl_users', $data);
                    $user_id = $this->db->insert_id();

                    // Inserting the values in tbl_account_details
                    $data_detail = array("user_id" => $user_id,
                        "fullname" => $name,
                        "mobile" => $phone,
                        "device_id" => $device_id,
                        "avatar" => 'uploads/' . $filename,
                        "company" => $company_id
                    );

                    $this->db->insert('tbl_account_details', $data_detail);

                    if ($user_type == 1) {
                        $user = "Admin";
                    } else if ($user_type == 2) {
                        $user = "Client";
                    } else {
                        $user = "Staff";
                    }


                    // Preparing the data to be sent to mobile

                   
                    $full_data = array("user_id" => $user_id,
                        "username" => $username,
                        "name" => $name,
                        "email" => $email,
                        "user_type" => $user,
                        "profile_image" => $filename,
                        "company_name" => $company_name,
                        "company_id" => $company_id,
                        "company_email" => $company_email,
                        "company_mobile" => $company_mobile,
                        "company_phone" => $company_phone,
                        "unique_id" => $unique_id,
                        "phone" => $phone
                    );

                    $result['status'] = true;
                    $result['message'] = "Success";
                    $result['data'] = $full_data;
                }
            } // End Iff where the data does not exists
            else { 
                $row1 = $query1->row();
                $user_id = $row1->user_id;
                $name = $row1->fullname;
                $profile_image = $row1->avatar;
                $username_db = $row1->username;
                $mobile = $row1->mobile;
                $unique_id_db = $row1->unique_id;
                $user_type = $row1->role_id;
                $email_db = $row1->email;
                $device_id = $row1->device_id;

                $company_id = $row1->company;

                if ($user_type == 1) {
                    $user = "Admin";
                } else if ($user_type == 2) {
                    $user = "Client";
                } else {
                    $user = "Staff";
                }


                // Here Checking whether the username or email already exists
                // Checking conditions to give specific message

                if (strtolower($username_db) == strtolower($username)) {
                    // In this case the user registers  for  the first time
                    // But the username  is already in our database
                    $result['status'] = false;
                    $result['message'] = "Username already Exists, Please Select Another";
                    $result['data'] = array("null");
                } else if (strtolower($email_db) == strtolower($email)) {
                    // In this case the user registers  for  the first time
                    // But the email  is already in our database
                    $result['status'] = false;
                    $result['message'] = "Email already Exists, Please Select Another";
                    $result['data'] = array("null");
                } else {

                    // fetching the data of the company
                    $this->db->select('name,phone,mobile,email');
                    $this->db->from('tbl_client');
                    $this->db->where('client_id', $company_id);
                    $query_company = $this->db->get();
                    $row_company = $query_company->row();

                    $company_name = $row_company->name;
                    $company_mobile = $row_company->mobile;
                    $company_phone = $row_company->phone;
                    $company_email = $row_company->email;

                    // updating the device id
                    $update = array("device_id" => $device_id);
                    $this->db->where('user_id', $user_id);
                    $this->db->update('tbl_account_details', $update);


                    $full_data = array("user_id" => $user_id,
                        "username" => $username_db,
                        "name" => $name,
                        "email" => $email_db,
                        "user_type" => $user,
                        "profile_image" => $profile_image,
                        "company_name" => $company_name,
                        "company_id" => $company_id,
                        "company_email" => $company_email,
                        "company_mobile" => $company_mobile,
                        "company_phone" => $company_phone,
                        "unique_id" => $unique_id_db,
                        "phone" => $mobile,
                        "phone" => $mobile
                    );


                    $result['status'] = true;
                    $result['message'] = "Success";
                    $result['data'] = $full_data;
                }
            }
        }
        /*         * ******** End For Login With facebook ******* */

        /*         * ******** Start For Login With Google ******* */

        if ($login_type == 4) {

            //$profile_image = $post['profile_image'];
			 $profile_image = $filename;

            /* -- Checking whether the unique id already exists ----- */

            $this->db->select('a.user_id,a.email,a.username,a.unique_id,a.role_id,b.fullname,b.mobile,b.device_id,b.avatar,b.company');
            $this->db->from('tbl_users as a');
            $this->db->join('tbl_account_details as b', 'a.user_id=b.user_id', 'inner');
            $this->db->where('a.unique_id', $unique_id);
            $this->db->or_where('a.username', $username);
            $this->db->or_where('a.email', $email);
            //$this->db->or_where('b.mobile',$phone);

            $query1 = $this->db->get();
            //echo $this->db->last_query();die; 
            $count_user = $query1->num_rows();
            if ($count_user == 0) {
                /* ------- This means user recore does not  exist ---- */

                //$filename = $post['profile_image'];

                /*                 * *********  End Code For Image Upload ********* */

                if ($user_type != 2) {

                    $data = array("username" => $username,
                        "email" => $email,
                        "last_ip" => $last_ip,
                        "role_id" => $user_type,
                        "unique_id" => $unique_id
                    );

                    $this->db->insert('tbl_users', $data);
                    //echo $this->db->last_query(); die; 
                    $user_id = $this->db->insert_id();

                    // Inserting the values in tbl_account_details
                    $data_detail = array("user_id" => $user_id,
                        "fullname" => $name,
                        "mobile" => $phone,
                        "device_id" => $device_id,
                        "avatar" => 'uploads/' . $filename
                    );

                    $this->db->insert('tbl_account_details', $data_detail);
                    //echo $this->db->last_query();

                    if ($user_type == 1) {
                        $user = "Admin";
                    } else if ($user_type == 2) {
                        $user = "Client";
                    } else {
                        $user = "Staff";
                    }

                    // creating the data for output
                    $full_data = array("user_id" => $user_id,
                        "username" => $username,
                        "name" => $name,
                        "email" => $email,
                        "user_type" => $user,
                        "profile_image" => 'uploads/' . $filename,
                        "company_name" => $company_name,
                        "company_id" => '',
                        "company_email" => '',
                        "company_mobile" => '',
                        "company_phone" => '',
                        "unique_id" => $unique_id,
                        "phone" => $phone
                    );

                    $result['status'] = true;
                    $result['message'] = "Success";
                    $result['data'] = $full_data;
                } else {
                    // IN this case , he user registers as a Company 
                    // So we need tosave the Company detils first
                    // here there are two conditions ,
                    // 1. if the company is already there in the db
                    // 2. else adding the new company 

                    if ($post['company_email'] != "" && $post['company_phone'] != "" && $post['company_mobile'] != "") {
                        // here in this case the user registers his new company 
                        // saving the company first in tbl_clients

                        $company_name = $post['company_name'];
                        $company_email = base64_decode(addslashes($post['company_email']));
                        $company_phone = base64_decode(addslashes($post['company_phone']));
                        $company_mobile = base64_decode(addslashes($post['company_mobile']));

                        $company_array = array("name" => $company_name,
                            "phone" => $company_phone,
                            "mobile" => $company_mobile,
                            "email" => $company_email
                        );

                        $this->db->insert('tbl_client', $company_array);
                        $company_id = $this->db->insert_id();
                    } else if ($post['company_name'] != "" && $post['company_email'] == "" && $post['company_phone'] == "" && $post['company_mobile'] == "") {
                        /// Here in this case the user registers with already existing company
                        $company_id = $post['company_name'];

                        // fetching the data of the company
                        $this->db->select('name,phone,mobile,email');
                        $this->db->from('tbl_client');
                        $this->db->where('client_id', $company_id);
                        $query_company = $this->db->get();
                        $row_company = $query_company->row();

                        $company_name = $row_company->name;
                        $company_mobile = $row_company->mobile;
                        $company_phone = $row_company->phone;
                        $company_email = $row_company->email;
                    } else {

                        // IN this case the client registers as a person
                        $company_array = array("name" => $name,
                            "phone" => '',
                            "mobile" => $phone,
                            "email" => $email
                        );

                        $this->db->insert('tbl_client', $company_array);
                        $company_id = $this->db->insert_id();

                        // Assingingin the company detials  to be sent 
                        $company_name = $name;
                        $company_mobile = $phone;
                        $company_phone = '';
                        $company_email = $email;
                    }

                    // Mow inserting the  the rest of the data in the user tables
                    // relating the data to the company id

                    $data = array("username" => $username,
                        "email" => $email,
                        "last_ip" => $last_ip,
                        "role_id" => $user_type,
                        "unique_id" => $unique_id
                    );

                    $this->db->insert('tbl_users', $data);
                    $user_id = $this->db->insert_id();

                    // Inserting the values in tbl_account_details
                    $data_detail = array("user_id" => $user_id,
                        "fullname" => $name,
                        "mobile" => $phone,
                        "device_id" => $device_id,
                        "avatar" => 'uploads/' . $filename,
                        "company" => $company_id
                    );

                    $this->db->insert('tbl_account_details', $data_detail);

                    if ($user_type == 1) {
                        $user = "Admin";
                    } else if ($user_type == 2) {
                        $user = "Client";
                    } else {
                        $user = "Staff";
                    }


                    // Preparing the data to be sent to mobile


                    $full_data = array("user_id" => $user_id,
                        "username" => $username,
                        "name" => $name,
                        "email" => $email,
                        "user_type" => $user,
                        "profile_image" => $filename,
                        "company_name" => $company_name,
                        "company_id" => $company_id,
                        "company_email" => $company_email,
                        "company_mobile" => $company_mobile,
                        "company_phone" => $company_phone,
                        "unique_id" => $unique_id,
                        "phone" => $phone
                    );

                    $result['status'] = true;
                    $result['message'] = "Success";
                    $result['data'] = $full_data;
                }
            } // End Iff where the data does not exists
            else {
                $row1 = $query1->row();
                $user_id = $row1->user_id;
                $name = $row1->fullname;
                $profile_image = $row1->avatar;
                $username_db = $row1->username;
                $mobile = $row1->mobile;
                $unique_id_db = $row1->unique_id;
                $user_type = $row1->role_id;
                $email_db = $row1->email;
                $device_id = $row1->device_id;

                $company_id = $row1->company;

                if ($user_type == 1) {
                    $user = "Admin";
                } else if ($user_type == 2) {
                    $user = "Client";
                } else {
                    $user = "Staff";
                }

                //echo $username_db.' / '.$username; die;
                //echo $email_db.' / '.$email; die;
                // Here Checking whether the username or email already exists
                // Checking conditions to give specific message

                if (strtolower($username_db) == strtolower($username)) { 
                    // In this case the user registers  for  the first time
                    // But the username  is already in our database
                    $result['status'] = false;
                    $result['message'] = "Username already Exists, Please Select Another";
                    $result['data'] = array("null");
                } else if (strtolower($email_db) == strtolower($email)) {
                    // In this case the user registers  for  the first time
                    // But the email  is already in our database
                    $result['status'] = false;
                    $result['message'] = "Email already Exists, Please Select Another";
                    $result['data'] = array("null");
                } else {  
 
                    // fetching the data of the company
                    $this->db->select('name,phone,mobile,email');
                    $this->db->from('tbl_client');
                    $this->db->where('client_id', $company_id);
                    $query_company = $this->db->get();
                    $row_company = $query_company->row();

                    $company_name = $row_company->name;
                    $company_mobile = $row_company->mobile;
                    $company_phone = $row_company->phone;
                    $company_email = $row_company->email;

                    // updating the device id
                    $update = array("device_id" => $device_id);
                    $this->db->where('user_id', $user_id);
                    $this->db->update('tbl_account_details', $update);


                    $full_data = array("user_id" => $user_id,
                        "username" => $username_db,
                        "name" => $name,
                        "email" => $email_db,
                        "user_type" => $user,
                        "profile_image" => $profile_image,
                        "company_name" => $company_name,
                        "company_id" => $company_id,
                        "company_email" => $company_email,
                        "company_mobile" => $company_mobile,
                        "company_phone" => $company_phone,
                        "unique_id" => $unique_id_db,
                        "phone" => $mobile,
                        "phone" => $mobile
                    );


                    $result['status'] = true;
                    $result['message'] = "Success";
                    $result['data'] = $full_data;
                } 
            }
        }

        /*         * ******** End For Login With Google ******* */

        /*         * ******** Start For Login With Twitter ******* */
        if ($login_type == 3) {

            //$profile_image = $post['profile_image'];

            /* -- Checking whether the unique id already exists ----- */

            $this->db->select('a.user_id,a.email,a.username,a.unique_id,a.role_id,b.fullname,b.mobile,b.device_id,b.avatar,b.company');
            $this->db->from('tbl_users as a');
            $this->db->join('tbl_account_details as b', 'a.user_id=b.user_id', 'inner');
            $this->db->where('a.unique_id', $unique_id);
            $this->db->or_where('a.username', $username);
            $this->db->or_where('a.email', $email);
            //$this->db->or_where('b.mobile',$phone);

            $query1 = $this->db->get();
            //echo $this->db->last_query();die; 
            $count_user = $query1->num_rows();
            if ($count_user == 0) {
                /* ------- This means user recore does not  exist ---- */



                /*                 * *********  Code For Image Upload ********* */

                /*
                  $filename = time().'_'.'user_image.jpg';
                  $path = 'uploads/' ;


                  $base=$post['profile_image'];
                  $binary=base64_decode($base);
                  header('Content-Type: bitmap; charset=utf-8');
                  $file = fopen($path.$filename, 'wb');
                  fwrite($file, $binary);
                  fclose($file);

                 */

               // $filename = $post['profile_image'];

                /*                 * *********  End Code For Image Upload ********* */

                if ($user_type != 2) {

                    $data = array("username" => $username,
                        "email" => $email,
                        "last_ip" => $last_ip,
                        "role_id" => $user_type,
                        "unique_id" => $unique_id
                    );

                    $this->db->insert('tbl_users', $data);
                    //echo $this->db->last_query(); die; 
                    $user_id = $this->db->insert_id();

                    // Inserting the values in tbl_account_details
                    $data_detail = array("user_id" => $user_id,
                        "fullname" => $name,
                        "mobile" => $phone,
                        "device_id" => $device_id,
                        "avatar" => 'uploads/' . $filename
                    );

                    $this->db->insert('tbl_account_details', $data_detail);
                    //echo $this->db->last_query();

                    if ($user_type == 1) {
                        $user = "Admin";
                    } else if ($user_type == 2) {
                        $user = "Client";
                    } else {
                        $user = "Staff";
                    }

                    // creating the data for output
                    $full_data = array("user_id" => $user_id,
                        "username" => $username,
                        "name" => $name,
                        "email" => $email,
                        "user_type" => $user,
                        "profile_image" => 'uploads/' . $filename,
                        "company_name" => $company_name,
                        "company_id" => '',
                        "company_email" => '',
                        "company_mobile" => '',
                        "company_phone" => '',
                        "unique_id" => $unique_id,
                        "phone" => $phone
                    );

                    $result['status'] = true;
                    $result['message'] = "Success";
                    $result['data'] = $full_data;
                } else {
                    // IN this case , he user registers as a Company 
                    // So we need tosave the Company detils first
                    // here there are two conditions ,
                    // 1. if the company is already there in the db
                    // 2. else adding the new company 

                    if ($post['company_email'] != "" && $post['company_phone'] != "" && $post['company_mobile'] != "") {
                        // here in this case the user registers his new company 
                        // saving the company first in tbl_clients

                        $company_name = $post['company_name'];
                        $company_email = base64_decode(addslashes($post['company_email']));
                        $company_phone = base64_decode(addslashes($post['company_phone']));
                        $company_mobile = base64_decode(addslashes($post['company_mobile']));

                        $company_array = array("name" => $company_name,
                            "phone" => $company_phone,
                            "mobile" => $company_mobile,
                            "email" => $company_email
                        );

                        $this->db->insert('tbl_client', $company_array);
                        $company_id = $this->db->insert_id();
                    } else if ($post['company_name'] != "" && $post['company_email'] == "" && $post['company_phone'] == "" && $post['company_mobile'] == "") {
                        /// Here in this case the user registers with already existing company
                        $company_id = $post['company_name'];

                        // fetching the data of the company
                        $this->db->select('name,phone,mobile,email');
                        $this->db->from('tbl_client');
                        $this->db->where('client_id', $company_id);
                        $query_company = $this->db->get();
                        $row_company = $query_company->row();

                        $company_name = $row_company->name;
                        $company_mobile = $row_company->mobile;
                        $company_phone = $row_company->phone;
                        $company_email = $row_company->email;
                    } else {

                        // IN this case the client registers as a person
                        $company_array = array("name" => $name,
                            "phone" => '',
                            "mobile" => $phone,
                            "email" => $email
                        );

                        $this->db->insert('tbl_client', $company_array);
                        $company_id = $this->db->insert_id();

                        // Assingingin the company detials  to be sent 
                        $company_name = $name;
                        $company_mobile = $phone;
                        $company_phone = '';
                        $company_email = $email;
                    }

                    // Mow inserting the  the rest of the data in the user tables
                    // relating the data to the company id

                    $data = array("username" => $username,
                        "email" => $email,
                        "last_ip" => $last_ip,
                        "role_id" => $user_type,
                        "unique_id" => $unique_id
                    );

                    $this->db->insert('tbl_users', $data);
                    $user_id = $this->db->insert_id();

                    // Inserting the values in tbl_account_details
                    $data_detail = array("user_id" => $user_id,
                        "fullname" => $name,
                        "mobile" => $phone,
                        "device_id" => $device_id,
                        "avatar" => 'uploads/' . $filename,
                        "company" => $company_id
                    );

                    $this->db->insert('tbl_account_details', $data_detail);

                    if ($user_type == 1) {
                        $user = "Admin";
                    } else if ($user_type == 2) {
                        $user = "Client";
                    } else {
                        $user = "Staff";
                    }


                    // Preparing the data to be sent to mobile


                    $full_data = array("user_id" => $user_id,
                        "username" => $username,
                        "name" => $name,
                        "email" => $email,
                        "user_type" => $user,
                        "profile_image" => $filename,
                        "company_name" => $company_name,
                        "company_id" => $company_id,
                        "company_email" => $company_email,
                        "company_mobile" => $company_mobile,
                        "company_phone" => $company_phone,
                        "unique_id" => $unique_id,
                        "phone" => $phone
                    );

                    $result['status'] = true;
                    $result['message'] = "Success";
                    $result['data'] = $full_data;
                }
            } // End Iff where the data does not exists
            else {
                $row1 = $query1->row();
                $user_id = $row1->user_id;
                $name = $row1->fullname;
                $profile_image = $row1->avatar;
                $username_db = $row1->username;
                $mobile = $row1->mobile;
                $unique_id_db = $row1->unique_id;
                $user_type = $row1->role_id;
                $email_db = $row1->email;
                $device_id = $row1->device_id;

                $company_id = $row1->company;

                if ($user_type == 1) {
                    $user = "Admin";
                } else if ($user_type == 2) {
                    $user = "Client";
                } else {
                    $user = "Staff";
                }


                // Here Checking whether the username or email already exists
                // Checking conditions to give specific message

                if (strtolower($username_db) == strtolower($username)) {
                    // In this case the user registers  for  the first time
                    // But the username  is already in our database
                    $result['status'] = false;
                    $result['message'] = "Username already Exists, Please Select Another";
                    $result['data'] = array("null");
                } else if (strtolower($email_db) == strtolower($email)) {
                    // In this case the user registers  for  the first time
                    // But the email  is already in our database
                    $result['status'] = false;
                    $result['message'] = "Email already Exists, Please Select Another";
                    $result['data'] = array("null");
                } else {

                    // fetching the data of the company
                    $this->db->select('name,phone,mobile,email');
                    $this->db->from('tbl_client');
                    $this->db->where('client_id', $company_id);
                    $query_company = $this->db->get();
                    $row_company = $query_company->row();

                    $company_name = $row_company->name;
                    $company_mobile = $row_company->mobile;
                    $company_phone = $row_company->phone;
                    $company_email = $row_company->email;

                    // updating the device id
                    $update = array("device_id" => $device_id);
                    $this->db->where('user_id', $user_id);
                    $this->db->update('tbl_account_details', $update);


                    $full_data = array("user_id" => $user_id,
                        "username" => $username_db,
                        "name" => $name,
                        "email" => $email_db,
                        "user_type" => $user,
                        "profile_image" => $profile_image,
                        "company_name" => $company_name,
                        "company_id" => $company_id,
                        "company_email" => $company_email,
                        "company_mobile" => $company_mobile,
                        "company_phone" => $company_phone,
                        "unique_id" => $unique_id_db,
                        "phone" => $mobile,
                        "phone" => $mobile
                    );


                    $result['status'] = true;
                    $result['message'] = "Success";
                    $result['data'] = $full_data;
                }
            }
        }

        /*         * ******** End For Login With Twitter ******* */

        return $result;
    }

    public function update_userModel($post, $filename)
    {
        require_once dirname(__FILE__) . '/../../libraries/MCrypt.php';
        $mcrypt = new MCrypt();


        $name = addslashes($post['name']);
        //$email = $mcrypt->decrypt(addslashes($post['email']));
        $email = base64_decode(addslashes($post['email']));
        $phone = base64_decode($post['phone']);
        $username = base64_decode(addslashes($post['username']));

        $device_id = $post['device_id'];
        $last_ip = $this->input->ip_address();
        $user_id = base64_decode(addslashes($post['user_id']));
        $old_image = $post['old_image'];
        /*         * ***   Checking the condition ,  when trying to update the username ******** */

        $this->db->select('COUNT(0) as row_count');
        $this->db->from('tbl_users as a');
        $this->db->join('tbl_account_details as b', 'a.user_id=b.user_id', 'left');
        $this->db->where('a.username', $username);
        $this->db->or_where('b.phone', $phone);
        $this->db->or_where('a.email', $email);
        $this->db->where('a.user_id !=', $user_id);
        $query1 = $this->db->get();
        $count1 = $query1->row();
        $count = $count1->row_count;
        if ($count == 1) {
            /*             * *********** COndition when No user Exists with same values  *********** */
            // Updating all the values in tbl_users
           
            if ($post['password'] != "") {
                $password = $this->hash(base64_decode($post['password']));
                $update1 = array("username" => $username,
                    "password" => $password,
                    "email" => $email,
                    "last_ip" => $last_ip
                );
            } else {
                $update1 = array("username" => $username,
                    "email" => $email,
                    "last_ip" => $last_ip
                );
            }
            $this->db->where('user_id', $user_id);
            $this->db->update('tbl_users', $update1);
            //echo $this->db->last_query(); die;


            // updating the values in the tbl_account_details
            if ($filename != "") {
                $update2 = array("fullname" => $name,
                    "mobile" => $phone,
                    "avatar" => 'uploads/' . $filename,
                    "device_id" => $device_id
                );
            } else {
                $update2 = array("fullname" => $name,
                    "mobile" => $phone,
                    "avatar" => $old_image,
                    "device_id" => $device_id
                );
            }

            $this->db->where('user_id', $user_id);
            $this->db->update('tbl_account_details', $update2);


            // creating an array to send all the information
            if ($filename != "") {
                $data = array("user_id" => $user_id,
                    "name" => $name,
                    "mobile" => $phone,
                    "email" => $email,
                    "profile_image" => 'uploads/' . $filename,
                );
            } else {
                $data = array("user_id" => $user_id,
                    "name" => $name,
                    "mobile" => $phone,
                    "email" => $email,
                    "profile_image" => $old_image,
                );
            }


            $result['status'] = true;
            $result['message'] = "Profile Updated Successfully";
            $result['data'] = $data;
        } else {
            $result['status'] = true;
            $result['message'] = "Duplicate Values Already Exists , Please  Enter Different Values ";
            $result['user_id'] = $user_id;
        }

        return $result;
    }

    public function getCompanyListModel()
    {
        $this->db->select('client_id,name');
        $this->db->from('tbl_client');
        $query = $this->db->get();
        $result1 = $query->result();
        $result['status'] = true;
        $result['message'] = "Profile Updated Successfully";
        $result['data'] = $result1;
        return $result;
    }

    public function getestimateListModel($post)
    {
        $client_id = $post['client_id'];

        // getting the client id from the  tbl_account_details

        $this->db->select('company');
        $this->db->from('tbl_account_details');
        $this->db->where('user_id', $client_id);
        $query_client = $this->db->get();
        //echo $this->db->last_query();die;
        $row_client = $query_client->row();
        $company_id = $row_client->company; // this is the company id ,of hwom we have to send detials

        $sql = "SELECT a.estimates_id, a.reference_no,a.currency, DATE_FORMAT(a.due_date,'%d/%m/%Y') as due_date,a.status,DATE_FORMAT(a.date_saved,'%d/%m/%Y') as date_saved , c.name as client_name 
			       FROM (`tbl_estimates` as a) 
				   INNER JOIN tbl_client as c ON a.client_id = c.client_id
				   WHERE a.client_id =  '$company_id'";
        //echo $sql;die;
        $query = $this->db->query($sql);
        $result1 = $query->result();
        $count = $query->num_rows();

        /* if($result1[0]->estimates_id=="" && $result1[0]->reference_no=="" && $result1[0]->due_date=="")
          {
          $result = array("null");
          } */
        if ($count == 0) {
            $result = array("null");
            //echo "herer"; die;
        } else {
            foreach ($result1 as $data) {
                $estimates_id = $data->estimates_id;
                // now getting the total cost  estimates_id

                $this->db->select('SUM(total_cost) as total_cost');
                $this->db->from('tbl_estimate_items');
                $this->db->where('estimates_id', $estimates_id);
                $query_est = $this->db->get();
                $row_est = $query_est->row();
                $total_cost = $row_est->total_cost;
                if ($total_cost == "") {
                    $total_cost = '0';
                }

                // now creating the array to be sent

                $result[] = array("estimates_id" => $data->estimates_id,
                    "reference_no" => $data->reference_no,
                    "due_date" => $data->due_date,
                    "status" => $data->status,
                    "date_saved" => $data->date_saved,
                    "client_name" => $data->client_name,
                    "total_amount" => $total_cost,
                    "currency" => $data->currency
                );
            }
        }

        $row['status'] = true;
        $row['message'] = "Data Fetched Successfully";
        $row['data'] = $result;

        return $row;
    }

    public function getEstimateDetailModel($post)
    {
        $estimates_id = $post['estimates_id'];
        
		/*
		$this->db->select('a.address,a.mobile,a.phone,b.reference_no,b.due_date,b.currency,b.notes,b.status,b.date_sent,b.date_saved');
        $this->db->from('tbl_client as a');
        $this->db->join('tbl_estimates as b', 'a.client_id=b.client_id', 'inner');
        $this->db->where('b.estimates_id', $estimates_id);
		*/
		
		$sql = "SELECT `a`.`address`, `a`.`mobile`, `a`.`phone`, `b`.`reference_no`, DATE_FORMAT(b.due_date,'%d/%m/%Y') as due_date, `b`.`currency`, `b`.`notes`, `b`.`status`,
		        DATE_FORMAT(b.date_sent,'%d/%m/%Y') as date_sent, DATE_FORMAT(b.date_saved,'%d/%m/%Y') as date_saved
				FROM (`tbl_client` as a)
				INNER JOIN `tbl_estimates` as b ON `a`.`client_id`=`b`.`client_id`
				WHERE `b`.`estimates_id` =  $estimates_id";
        $query = $this->db->query($sql);
        //echo $this->db->last_query();die;
        $row_temp = $query->result();

        // getting the estimate items list

        $this->db->select('item_tax_rate,item_name,item_desc,unit_cost,quantity,item_tax_total,total_cost,item_order');
        $this->db->from('tbl_estimate_items');
        $this->db->where('estimates_id', $estimates_id);
        $query2 = $this->db->get();
        $row_estimates = $query2->result();


        //getting the total cost of the items

        $this->db->select('sum(total_cost) as total_cost');
        $this->db->from('tbl_estimate_items');
        $this->db->where('estimates_id', $estimates_id);
        $query1 = $this->db->get();
        $row_total = $query1->row();
        $total_cost = $row_total->total_cost;


        // Getting the cmpany Name and address

        $sql_company = "Select * from tbl_config where config_key IN('company_address','company_logo','company_name','company_phone')";
        $query_company = $this->db->query($sql_company);
        $row_company = $query_company->result();

        $company = array($row_company[0]->config_key => $row_company[0]->value,
            $row_company[1]->config_key => $row_company[1]->value,
            $row_company[2]->config_key => $row_company[2]->value,
            $row_company[3]->config_key => $row_company[3]->value,
        );


        $row['status'] = true;
        $row['message'] = "Data Fetched Successfully";
        $row['data']['client'] = $row_temp;
        $row['data']['estimates_items'] = $row_estimates;
        $row['data']['total_cost'] = $total_cost;
        $row['data']['own_company'] = $company;

        return $row;
    }

    public function saveUserInfoAndMail($post)
    {
        require_once dirname(__FILE__) . '/../../libraries/MCrypt.php';
        $mcrypt = new MCrypt();

        //echo "<pre>"; print_r($post);die; 
        $name = addslashes($post['name']);
        $email = base64_decode(addslashes($post['email']));
        $phone = base64_decode($post['phone']);
        $subject = addslashes($post['subject']);
        $message = addslashes($post['message']);
        $data['name'] = $name;

        $array = array("name" => $name,
            "email" => $email,
            "phone" => $phone,
            "subject" => $subject,
            "message" => $message
        );

        $this->db->insert('userEmail_Records', $array);

        $insert_id = $this->db->insert_id();

        if ($insert_id == "" || $insert_id == 0) {
            $row['status'] = false;
            $row['message'] = "There was Error In inserting the data";
            $row['data'] = "";
        } else {
            $row['status'] = true;
            $row['message'] = "Thanks For Your Interest , We Will Get Back To You Soon !!!";
            $row['data'] = "";
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
        $message = $this->load->view('mail/dashboard', $data, true);
        $this->load->library('email', $config);
        $this->email->from($company_email, $company_name);
        $this->email->to($email);

        $this->email->subject($subject);
        $this->email->message($message);
        /* if ($params['resourceed_file'] != '') {
          $this->email->resource($params['resourceed_file']);
          } */
        $send = $this->email->send();

        return $row;
    }

    public function getProjectListModel($post)
    {
        $user_id = $post['user_id'];

        // getting the company Id of the client

        $this->db->select('company');
        $this->db->from('tbl_account_details');
        $this->db->where('user_id', $user_id);
        $query1 = $this->db->get();
        $row_company = $query1->row();
        $company_id = $row_company->company;

        //NOw send the project list of only above company

        $this->db->select('project_id,project_name,progress,start_date,end_date,project_status');
        $this->db->from('tbl_project');
        $this->db->where('client_id', $company_id);
        $query = $this->db->get();
        $row['status'] = true;
        $row['message'] = "Data fetched Successfully";
        $row['data'] = $query->result();
        return $row;
    }

    public function getProjectDetailModel($post)
    {
        $project_id = $post['project_id'];

        $this->db->select('project_id,project_name,progress,start_date,end_date,project_cost,demo_url,project_status,permission');
        $this->db->from('tbl_project');
        $this->db->where('project_id', $project_id);
        $query = $this->db->get();
        $row_data = $query->row();

        //decoding the json for participants
        if (is_array(json_decode($row_data->permission, true))) {
            $part = array_keys(json_decode($row_data->permission, true));

            $user_ids = implode(",", $part);

            // Now getting the names of the users
            $sql = "SELECT `b`.`fullname`, `b`.`avatar` FROM (`tbl_users` as a) INNER JOIN `tbl_account_details` as b ON `a`.`user_id`=`b`.`user_id` WHERE `a`.`user_id` IN ($user_ids) ";
            $query1 = $this->db->query($sql);
            $row_part = $query1->result();
        } else {
            $row_part = array();
        }

        // creating the array for the project detail

        $data = array("project_id" => $row_data->project_id,
            "project_name" => $row_data->project_name,
            "progress" => $row_data->progress,
            "start_date" => $row_data->start_date,
            "end_date" => $row_data->end_date,
            "project_cost" => $row_data->project_cost,
            "demo_url" => $row_data->demo_url,
            "project_status" => $row_data->project_status
        );


        $row['status'] = true;
        $row['message'] = "Data Fetched Successfully";
        $row['data'] = $data;
        $row['participants'] = $row_part;

        return $row;
    }

    public function getBuglistsModel($post)
    {

        $company_id = $post['company_id'];
        $user_id = $post['user_id'];


        $this->db->select('a.project_name,b.bug_id,b.bug_title,b.bug_status,b.priority,b.permission');
        $this->db->from('tbl_project as a');
        $this->db->join('tbl_bug as b', 'a.project_id=b.project_id', 'inner');
        $this->db->where('a.client_id', $company_id);
        $this->db->where('b.reporter', $user_id);
        $this->db->or_where('b.reporter', 1);
        $this->db->where('a.client_id', $company_id);
        $this->db->order_by('b.bug_id', 'DESC');
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $row = $query->result();
        if ($query->num_rows()) {
            foreach ($row as $data_row) {
                // checking if the participants are assigned

                if (is_array(json_decode($data_row->permission, true))) {
                    //echo "rererer"; die;
                    //decoding the json for participants

                    $part = array_keys(json_decode($data_row->permission, true));

                    $user_ids = implode(",", $part);

                    // Now getting the names of the users
                    $sql = "SELECT `b`.`fullname` FROM (`tbl_users` as a) INNER JOIN `tbl_account_details` as b ON `a`.`user_id`=`b`.`user_id` WHERE `a`.`user_id` IN ($user_ids) ";
                    $query1 = $this->db->query($sql);
                    $row_part = $query1->result(); // these are the participants for  this bug
                } else {
                    $row_part = array();
                }

                $row_data[] = array("bug_id" => $data_row->bug_id,
                    "bug_title" => $data_row->bug_title,
                    "bug_status" => $data_row->bug_status,
                    "priority" => $data_row->priority,
                    "assigned_to" => $row_part
                );
            }
        } else {
            $row_data = array(null);
        }

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row_data;
        return $result;
    }

    public function getBugDetailsModel($post)
    {
        $bug_id = $post['bug_id'];

        // getting the details of the bug_description

        $this->db->select('a.project_name,b.bug_id,b.bug_title,b.bug_description,b.bug_status,b.priority,b.reporter,b.created_time,b.update_time,b.permission,c.username');
        $this->db->from('tbl_project as a');
        $this->db->join('tbl_bug as b', 'a.project_id=b.project_id', 'inner');
        $this->db->join('tbl_users as c', 'b.reporter=c.user_id', 'inner');
        $this->db->where('b.bug_id', $bug_id);
        $query = $this->db->get(); //echo $this->db->last_query();die;
        $row = $query->row();
		if($row->permission!="all")
		{
			$participants_list_temp = (json_decode($row->permission,true));
			foreach($participants_list_temp as $key=>$temp_list)
			{
				$participants_list[$key] = $temp_list;
			}
		}
		else
		{
			$participants_list = array(null);
		}

        // Checking Whther any participants there or not
        //echo "<pre>"; print_r($row->permission);die;
        if (is_array(json_decode($row->permission, true))) {
            // this means the participants are there
            // getting the participants of this bugs

            $part = array_keys(json_decode($row->permission, true));

            $user_ids = implode(",", $part); // these  sre the user_id of the users
            // fetching the name and profile image of the users
            $sql = "SELECT `b`.`fullname`, `b`.`avatar` FROM (`tbl_users` as a) INNER JOIN `tbl_account_details` as b ON `a`.`user_id`=`b`.`user_id` WHERE `a`.`user_id` IN ($user_ids) ";
            //echo $sql;die;
            $query1 = $this->db->query($sql);
            $row_part = $query1->result(); // these are the participants for  this bug
        } else {
            $row_part = array("all");
        }
		
		$description = str_replace("<p>","",$row->bug_description);
		$description = str_replace("</p>","",$row->bug_description);
        $row_data = array("bug_id" => $row->bug_id,
            "project_name" => $row->project_name,
            "reporter" => ucfirst($row->username),
            "bug_title" => $row->bug_title,
            "bug_status" => $row->bug_status,
            "priority" => $row->priority,
            "bug_description" => $description,
            "created_time" => $row->update_time,
            "update_time" => $row->update_time,
            "participants" => $row_part,
			"participants_list"=>$participants_list,
			"owner"=>$row->reporter
        );



        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row_data;

        return $result;
    }

    public function getBugcommentsModel($post)
    {
        $bug_id = $post['bug_id'];

        // getting the data for the bug_id

        $this->db->select('a.comment,a.comment_datetime,b.fullname,b.avatar,');
        $this->db->from('tbl_task_comment as a');
        $this->db->join('tbl_account_details as b', 'a.user_id=b.user_id', 'inner');
        $this->db->where('a.bug_id', $bug_id);
        $query = $this->db->get();


        $result['status'] = true;
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

        $data = array("user_id" => $user_id,
            "comment" => $comment,
            "bug_id" => $bug_id
        );

        $this->db->insert('tbl_task_comment', $data);

        $insert_id = $this->db->insert_id();

        if ($insert_id != "") {
            $result['status'] = true;
            $result['message'] = "Comment Added Successfully";
            $result['data']['comment_id'] = $insert_id;

            // inserting the data in the tbl_activities

           $data_activity = array("user" => $user_id,
                "module" => "bugs",
                "module_field_id" => $bug_id,
                "icon" => "fa-ticket",
                "activity" => "activity_new_bug_comment",
                "value1" => $comment
            );

            $this->db->insert('tbl_activities', $data_activity);

            // End Inserting the data in the table activities	
            //Now fetching the BUg data to send  email

            $this->db->select('bug_title,permission');
            $this->db->from('tbl_bug');
            $this->db->where('bug_id', $bug_id);
            $query_project = $this->db->get();
            $row_project = $query_project->row();
            $bug_title = $row_project->bug_title;

            $part = array_keys(json_decode($row_project->permission, true));
            $user_ids = implode(",", $part); // these  sre the user_id of the users
            // fetching the Email id Of the users
            $sql = "SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
            $query1 = $this->db->query($sql);
            $row_part = $query1->result(); // these are the participants for  this bug

            /* ##################### Start Of Mail Sending Code ################# */

            foreach ($row_part as $part_email) {
                $email = $part_email->email;
                $config['useragent'] = 'Rebelute Digital Mailing System';
                $config['mailtype'] = "html";
                $config['newline'] = "\r\n";
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $company_email = 'admin@rebelute.com';
                $company_name = 'Rebelute Digital Solutions';
                $subject = 'New Bug Comment';


                $message = '<p>Hi there,</p><p>A new comment has been posted by {POSTED_BY} to bug {BUG_TITLE}.</p><p>You can view the comment using the link below.</p><p><em>' . $mail_comment . '</em></p><p><br /><big><strong><a href="{COMMENT_URL}">View Comment</a></strong></big><br />Regards<br />The {SITE_NAME} Team</p><p>&nbsp;</p>';
                $bug_name = str_replace("{BUG_TITLE}", $bug_title, $message);
                $assigned_by = str_replace("{POSTED_BY}", ucfirst($posted_by), $bug_name);
                $Link = str_replace("{COMMENT_URL}", base_url() . 'admin/bugs/view_bug_details/' . $bug_id . '/' . '2', $assigned_by);
                $comments = str_replace("{COMMENT_MESSAGE}", $mail_comment, $Link);
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
        } else {
            $result['status'] = false;
            $result['message'] = "Comment Not Added, Please Try Again";
            $result['data']['comment_id'] = "";
        }
        return $result;
    }

    public function getInvoicesListModel($post)
    {
        $company_id = $post['company_id'];

        // getting the list of the invlices of that company

        $sql = "Select invoices_id,reference_no,DATE_FORMAT(due_date,'%d/%m/%Y') as due_date,DATE_FORMAT(date_saved,'%d/%m/%Y') as date_saved,notes,currency
			      From tbl_invoices WHERE client_id='$company_id' ORDER BY invoices_id DESC,status DESC";
				
          		  
        $query = $this->db->query($sql);
        $row = $query->result();
        //echo $this->db->last_query();die;

        $data = array();
        // Now getting due amount and total amount for each invoice_number
        foreach ($row as $data_inv) {
            $invoice_id = $data_inv->invoices_id;
            $sql_sum = "Select SUM(total_cost) as total_cost from tbl_items where invoices_id='$invoice_id'";
            $query_sum = $this->db->query($sql_sum);
            $row_sum = $query_sum->row();
            $total_amount = number_format((float)$row_sum->total_cost,2,'.',''); 

            // Now getting the paid amount from the tbl_payments
            $sql_pay = "Select SUM(amount) as amount from tbl_payments where invoices_id='$invoice_id'";
            $query_pay = $this->db->query($sql_pay);
            $row_pay = $query_pay->row();
            if ($query_pay->num_rows() > 0) {
                $paid_amount = $row_pay->amount;
            } else {
                $paid_amount = 0;
            }

            if ($paid_amount == "") {
                $paid_amount = 0;
            }


            $due_amount = number_format((float)$total_amount - $paid_amount,2,'.','');
            if ($due_amount == 0 && $total_amount != 0) {
                $status = "Paid";
            } else if ($due_amount == 0 && $total_amount == 0) {
                $status = "Unpaid";
            } else if ($paid_amount == 0 && $total_amount != 0) {
                $status = "Unpaid";
            } else {
                $status = "Partially Paid";
            }


            $data[] = array("invoices_id" => $data_inv->invoices_id,
                "reference_no" => $data_inv->reference_no,
                "date_saved" => $data_inv->date_saved,
                "due_date" => $data_inv->due_date,
                "notes" => $data_inv->notes,
                "total_amount" => $total_amount,
				"currency" => $data_inv->currency,
                "paid_amount" => "$paid_amount",
                "due_amount" => "$due_amount",
                "pay_status" => $status
            );
        }// end of for each loop

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $data;

        return $result;
    }

    public function getInvoiceDetailsModel($post,$filename)
    {
        $invoices_id = $post['invoices_id'];



        //getting the total cost of the items

        $this->db->select('sum(total_cost) as total_cost');
        $this->db->from('tbl_items');
        $this->db->where('invoices_id', $invoices_id);
        $query1 = $this->db->get();
        $row_total = $query1->row();
        $total_cost = $row_total->total_cost;

        // Now getting the paid amount from the tbl_payments
        $sql_pay = "Select SUM(amount) as amount from tbl_payments where invoices_id='$invoices_id'";
        $query_pay = $this->db->query($sql_pay);
        $row_pay = $query_pay->row();
        if ($query_pay->num_rows() > 0) {
            $paid_amount = $row_pay->amount;
        } else {
            $paid_amount = 0;
        }


        $due_amount = $total_cost - $paid_amount;
        if ($due_amount == 0 && $total_cost != 0) {
			$status = "Paid";
		} else if ($due_amount == 0 && $total_cost == 0) {
			$status = "Unpaid";
		} else if ($paid_amount == 0 && $total_cost != 0) {
			$status = "Unpaid";
		} else {
			$status = "Partially Paid";
		}
		
		$filepath = base_url().'uploads/invoices/'.$filename.'.pdf';
		
        // getting the company details
		
		$sql_company = "SELECT value FROM `tbl_config` WHERE `config_key` ='company_address' or `config_key` = 'company_name' or `config_key` = 'company_phone'";
		$query_company = $this->db->query($sql_company);
		$row_company = $query_company->result();
		foreach($row_company as $values)
		{
			$company_data1[] = $values->value;
		}
		
		// Formating the complete company data
		
		$company_data = array("company_address"=>$company_data1[0],
		                      "company_name"=>$company_data1[1],
							  "company_phone"=>$company_data1[2]
							 );
        

        // Now Updating the the records so that it gets reflected in the the response
        $update = array("status" => $status,"invoice_created"=>1);
        $this->db->where('invoices_id', $invoices_id);
        $this->db->update('tbl_invoices', $update);

        // The above status will me refelected in the response 
        // getting the data  of the invoices_id

       
         $sql_company = "SELECT `a`.`name`, `a`.`phone`, `a`.`address`, `b`.`invoices_id`, 
		                `b`.`reference_no`, DATE_FORMAT(b.due_date,'%d/%m/%Y')  as due_date, 
						DATE_FORMAT(date_saved,'%d/%m/%Y')  as date_saved , `b`.`status`, b.notes , 
						`b`.`currency`
                           FROM (`tbl_client` as a)
                           INNER JOIN `tbl_invoices` as b ON `a`.`client_id`=`b`.`client_id`
                           WHERE `b`.`invoices_id` = $invoices_id";
        $query_main = $this->db->query($sql_company);
        $data_company = $query_main->result();

        // now getting  items of the invoices_id

        /*
		$this->db->select('item_tax_rate,item_tax_total,quantity,total_cost,item_name,item_desc,unit_cost');
        $this->db->from('tbl_items');
        $this->db->where('invoices_id', $invoices_id);
		*/
		$sql_items = "SELECT item_tax_rate, item_tax_total, quantity, total_cost, item_name, SUBSTR(item_desc,1,40) as item_desc, unit_cost
                       FROM (tbl_items) WHERE invoices_id = $invoices_id";
        $query_items = $this->db->query($sql_items); 
		//echo $this->db->last_query(); die;
        $data_items = $query_items->result();



        if ($total_cost == 0 || $total_cost == "") {
            $total_cost = 0;
        }




        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data']['client_data'] = $data_company;
        $result['data']['company_data'] = $company_data;
        $result['data']['items_data'] = $data_items;
        $result['data']['total_cost'] = $total_cost;
        $result['data']['due_amount'] = "$due_amount";
		$result['data']['invoice_pdf_link'] = $filepath;

        return $result;
    }

    public function getTicketsListModel($post)
    {
        $status = $post['msg_status'];
        $user_id = $post['user_id'];

        if ($status == "all") {
            $sql = "Select a.tickets_id,a.ticket_code,a.subject,b.deptname,a.status,DATE_FORMAT(created, '%d/%m/%Y') as date_saved
			       FROM tbl_tickets  as a INNER JOIN tbl_departments as b ON a.departments_id=b.departments_id and a.reporter='$user_id' ORDER BY a.tickets_id DESC";
        }
        if ($status == "answered") {
            $sql = "Select a.tickets_id,a.ticket_code,a.subject,b.deptname,a.status,DATE_FORMAT(created, '%d/%m/%Y') as date_saved
			       FROM tbl_tickets  as a INNER JOIN tbl_departments as b ON a.departments_id=b.departments_id WHERE a.status='answered' and a.reporter='$user_id' ORDER BY a.tickets_id DESC";
        }
        if ($status == "in_progress") {
            $sql = "Select a.tickets_id,a.ticket_code,a.subject,b.deptname,a.status,DATE_FORMAT(created, '%d/%m/%Y') as date_saved
			       FROM tbl_tickets  as a INNER JOIN tbl_departments as b ON a.departments_id=b.departments_id WHERE a.status='in_progress' and a.reporter='$user_id' ORDER BY a.tickets_id DESC";
        }
        if ($status == "open") {
            $sql = "Select a.tickets_id,a.ticket_code,a.subject,b.deptname,a.status,DATE_FORMAT(created, '%d/%m/%Y') as date_saved
			       FROM tbl_tickets  as a INNER JOIN tbl_departments as b ON a.departments_id=b.departments_id WHERE a.status='open' and a.reporter='$user_id' ORDER BY a.tickets_id DESC";
        }
        if ($status == "closed") {
            $sql = "Select a.tickets_id,a.ticket_code,a.subject,b.deptname,a.status,DATE_FORMAT(created, '%d/%m/%Y') as date_saved
			       FROM tbl_tickets  as a INNER JOIN tbl_departments as b ON a.departments_id=b.departments_id WHERE a.status='closed' and a.reporter='$user_id' ORDER BY a.tickets_id DESC";
        }

        //echo $sql; die;

        $query = $this->db->query($sql);
        $row = $query->result();

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row;


        return $result;
    }

    public function getTicketDetailModel($post)
    {
        $tickets_id = $post['tickets_id'];


        // nOw getting the details of the  tickets

        $sql = "Select a.ticket_code,a.subject,a.status,a.body,a.priority,a.upload_file,DATE_FORMAT(a.created, '%d/%m/%Y') as date_saved,c.deptname,b.fullname
			        FROM tbl_tickets as a INNER JOIN tbl_account_details as b ON a.reporter=b.user_id
					INNER JOIN tbl_departments as c on a.departments_id=c.departments_id
					WHERE a.tickets_id='$tickets_id'";

        $query_data = $this->db->query($sql);
        $row_data1 = $query_data->row();

        $str_bug = $row_data1->upload_file;
        $str_bug_array = json_decode($str_bug, true);
        $bug_attachment = $str_bug_array[0]['path'];
        $bug_attachment = str_replace(" ", "_", $bug_attachment);

        $row_data = array("ticket_code" => $row_data1->ticket_code,
            "subject" => $row_data1->subject,
            "status" => $row_data1->status,
            "priority" => $row_data1->priority,
            "date_saved" => $row_data1->date_saved,
            "deptname" => $row_data1->deptname,
            "fullname" => $row_data1->fullname,
            "message" => $row_data1->body,
            "attachement" => $bug_attachment
        );

        // Now sending all the comments  for the ticket


        $this->db->select('a.body,a.attachment,b.fullname,b.avatar');
        $this->db->from('tbl_tickets_replies as a');
        $this->db->join('tbl_account_details as b', 'a.replierid=b.user_id', 'inner');
        $this->db->where('a.tickets_id', $tickets_id);
        $query_comment = $this->db->get();

        if ($query_comment->num_rows() > 0) {
            $row_comment = $query_comment->result();

            // attcahment comes in json ... So need to convert it into array

            foreach ($row_comment as $row_com) {
                $str = $row_com->attachment;
                $str_array = json_decode($str, true);
                $attachment = $str_array[0]['path'];
                $attachment = str_replace(" ", "_", $attachment);
                // Now looping  the other values in the array

                $data_comment[] = array("body" => $row_com->body,
                    "fullname" => $row_com->fullname,
                    "avatar" => $row_com->avatar,
                    "attachment" => $attachment,
                );
            }
        } else {
            $data_comment = null;
        }

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data']['ticket_data'] = $row_data;
        $result['data']['comments'] = $data_comment;

        return $result;
    }

    public function saveAttachmentForBugModel($post, $width, $height, $filesize, $filename)
    {
        $bug_id = $post['bug_id'];
        $description = $post['description'];
        $title = $post['title'];
        $user_id = $post['user_id'];
        $uploaded_by = $post['name'];

        // inserting ther data in the tbl_task_attachment

        $data_task_attachment = array("user_id" => $user_id,
            "description" => $description,
            "title" => $title,
            "bug_id" => $bug_id
        );

        $this->db->insert('tbl_task_attachment', $data_task_attachment);

        $attachment_id = $this->db->insert_id();


        // Now inserting the data in the tbl_task_uploaded_files

        $up_path = $_SERVER['DOCUMENT_ROOT'];
        $data_upload = array("task_attachment_id" => $attachment_id,
            "files" => 'uploads/' . $filename,
            "uploaded_path" => $up_path . '/uploads/' . $filename,
            "file_name" => $filename,
            "size" => $filesize,
            "ext" => 'jpg',
            "is_image" => 1,
            "image_width" => $width,
            "image_height" => $height
        );

        $this->db->insert('tbl_task_uploaded_files', $data_upload);

        $insert_id = $this->db->insert_id();


        // inserting the data in the tbl_activities

        $data_activity = array("user" => $user_id,
            "module" => "bugs",
            "module_field_id" => $bug_id,
            "icon" => "fa-ticket",
            "activity" => "activity_new_bug_attachment",
            "value1" => $title
        );

        $this->db->insert('tbl_activities', $data_activity);

        // End Inserting the data in the table activities	

        if ($insert_id != "") {
            $result['status'] = true;
            $result['message'] = "Attachment Uploaded Successfully";
            $result['data'] = $insert_id;



            // getting the details of the bug_id from tbl_bugs 

            $this->db->select('bug_title,permission');
            $this->db->from('tbl_bug');
            $this->db->where('bug_id', $bug_id);
            $query_bug = $this->db->get();
            $row_bug = $query_bug->row();
            $bug_title = $row_bug->bug_title; // this the bug title
            // getting the participants of this bugs

            $part = array_keys(json_decode($row_bug->permission, true));

            $user_ids = implode(",", $part); // these  sre the user_id of the users
            // fetching the Email id Of the users
            $sql = "SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
            $query1 = $this->db->query($sql);
            $row_part = $query1->result(); // these are the participants for  this bug



            /* ##################### Start Of Mail Sending Code ################# */

            foreach ($row_part as $part_email) {
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
                $Link = str_replace("{BUG_URL}", base_url() . 'admin/bugs/view_bug_details/' . $bug_id . '/' . '3', $assigned_by);
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
        } else {
            $result['status'] = false;
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

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row;

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

        $data_comment = array("user_id" => $user_id,
            "project_id" => $project_id,
            "comment" => $comment
        );
        $this->db->insert('tbl_task_comment', $data_comment);

        $comment_id = $this->db->insert_id();

        if ($comment_id != "") {
            $result['status'] = true;
            $result['message'] = "Comment Posted Successfully";
            $result['data'] = $comment_id;


            // inserting the data in the tbl_activities

            $data_activity = array("user" => $user_id,
                "module" => "project",
                "module_field_id" => 2,
                "icon" => "fa-ticket",
                "activity" => "activity_new_project_comment",
                "value1" => $comment
            );

            $this->db->insert('tbl_activities', $data_activity);

            // End Inserting the data in the table activities	
            //Now fetching the project data

            $this->db->select('project_name,permission');
            $this->db->from('tbl_project');
            $this->db->where('project_id', $project_id);
            $query_project = $this->db->get();
            $row_project = $query_project->row();
            $project_name = $row_project->project_name;

            $part = array_keys(json_decode($row_project->permission, true));
            $user_ids = implode(",", $part); // these  sre the user_id of the users
            // fetching the Email id Of the users
            $sql = "SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
            $query1 = $this->db->query($sql);
            $row_part = $query1->result(); // these are the participants for  this bug

            /* ##################### Start Of Mail Sending Code ################# */

            foreach ($row_part as $part_email) {
                $email = $part_email->email;
                $config['useragent'] = 'Rebelute Digital Mailing System';
                $config['mailtype'] = "html";
                $config['newline'] = "\r\n";
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $company_email = 'admin@rebelute.com';
                $company_name = 'Rebelute Digital Solutions';
                $subject = 'New Project Comment';


                $message = '<p>Hi There,</p><p>A new comment has been posted by <strong>{POSTED_BY}</strong> to project <strong>{PROJECT_NAME}</strong>.</p><p>You can view the comment using the link below:<br /><big><a href="{COMMENT_URL}"><strong>View Project</strong></a></big><br /><br /><em>' . $mail_comment . '</em><br /><br />Best Regards,<br />The {SITE_NAME} Team</p>';
                $projectName = str_replace("{PROJECT_NAME}", $project_name, $message);

                $assigned_by = str_replace("{POSTED_BY}", ucfirst($commented_by), $projectName);
                $Link = str_replace("{COMMENT_URL}", base_url() . 'admin/project/project_details/' . $project_id . '/' . '3', $assigned_by);
                $comments = str_replace("{COMMENT_MESSAGE}", $mail_comment, $Link);
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
        } else {
            $result['status'] = false;
            $result['message'] = "Comment Not Posted , Please Try Again";
            $result['data'] = $insert_id;
        }


        return $result;
    }

    public function saveAttachmentForProjectModel($post, $width, $height, $filesize, $filename)
    {
        $project_id = $post['project_id'];
        $description = $post['description'];
        $title = $post['title'];
        $user_id = $post['user_id'];
        $uploaded_by = $post['name'];

        // inserting ther data in the tbl_task_attachment

        $data_task_attachment = array("user_id" => $user_id,
            "description" => $description,
            "title" => $title,
            "project_id" => $project_id
        );

        $this->db->insert('tbl_task_attachment', $data_task_attachment);

        $attachment_id = $this->db->insert_id();


        // Now inserting the data in the tbl_task_uploaded_files

        $up_path = $_SERVER['DOCUMENT_ROOT'];
        $data_upload = array("task_attachment_id" => $attachment_id,
            "files" => 'uploads/' . $filename,
            "uploaded_path" => $up_path . '/uploads/' . $filename,
            "file_name" => $filename,
            "size" => $filesize,
            "ext" => 'jpg',
            "is_image" => 1,
            "image_width" => $width,
            "image_height" => $height
        );

        $this->db->insert('tbl_task_uploaded_files', $data_upload);

        $insert_id = $this->db->insert_id();

        if ($insert_id != "") {
            $result['status'] = true;
            $result['message'] = "Attachment Uploaded Successfully";
            $result['data'] = $insert_id;


            // inserting the data in the tbl_activities

            $data_activity = array("user" => $user_id,
                "module" => "project",
                "module_field_id" => 2,
                "icon" => "fa-ticket",
                "activity" => "activity_new_project_attachment",
                "value1" => $title
            );

            $this->db->insert('tbl_activities', $data_activity);

            // End Inserting the data in the table activities
            // getting the details of the project_id from tbl_project 

            $this->db->select('project_name,permission');
            $this->db->from('tbl_project');
            $this->db->where('project_id', $project_id);
            $query_bug = $this->db->get();
            $row_bug = $query_bug->row();
            $project_name = $row_bug->project_name; // this the bug title
            // checkingif the participants specified

            if (is_array(json_decode($row_bug->permission, true))) {
                // getting the participants of this bugs

                $part = array_keys(json_decode($row_bug->permission, true));

                $user_ids = implode(",", $part); // these  sre the user_id of the users
                // fetching the Email id Of the users
                $sql = "SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
                $query1 = $this->db->query($sql);
                $row_part = $query1->result(); // these are the participants for  this bug



                /* ##################### Start Of Mail Sending Code ################# */

                foreach ($row_part as $part_email) {
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
                    $Link = str_replace("{PROJECT_URL}", base_url() . 'admin/project/project_details/' . $project_id . '/' . '4', $assigned_by);
                    $message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $Link);
                    //echo $message; die;
                    $this->load->library('email', $config);

                    $this->email->from($company_email, $company_name);
                    $this->email->to($email);

                    $this->email->subject($subject);
                    $this->email->message($message);
                    $send = $this->email->send();
                }
            }// End Iff checking for the participants assigned or not	

            /* ##################### End Of Mail Sending Code ################# */
        } else {
            $result['status'] = false;
            $result['message'] = "Attachment Not Uploaded";
            $result['data'] = $insert_id;
        }


        return $result;
    }

    public function saveTicketCommentModel($post, $width, $height, $filesize, $filename)
    {
        $tickets_id = $post['tickets_id'];
        $body = $post['body'];
        $user_id = $post['user_id'];
        $posted_by = $post['name'];
        $dp = $_SERVER['DOCUMENT_ROOT'];
        // creating the json if the  attachement is found
        if ($filename != "") {
            $att[] = array("fileName" => $filename,
                "path" => 'uploads/' . $filename,
                "fullPath" => $dp . '/uploads/' . $filename,
                "ext" => 'jpg',
                "size" => $filesize,
                "is_image" => true,
                "image_width" => $width,
                "image_height" => $height
            );
            $attachment = json_encode($att);
        } else {
            $attachment = "";
        }

        // Inserting the data in the tbl_ticket_replies
        $data_comment = array("tickets_id" => $tickets_id,
            "body" => $body,
            "replierid" => $user_id,
            "attachment" => $attachment
        );

        $this->db->insert('tbl_tickets_replies', $data_comment);
        //echo $this->db->last_query();die;
        $comment_id = $this->db->insert_id();

        if ($comment_id != "") {
            $result['status'] = true;
            $result['message'] = "Comment Posted Successfully";
            $result['data'] = $comment_id;

            // getting the details of the ticket by ticket id
            $this->db->select('ticket_code,permission,status');
            $this->db->from('tbl_tickets');
            $this->db->where('tickets_id', $tickets_id);
            $query_ticket = $this->db->get();
            $row_ticket = $query_ticket->row();
            $ticket_code = $row_ticket->ticket_code;
            $status = $row_ticket->status;


            // getting the participants of this bugs
            if (is_array(json_decode($row_ticket->permission, true))) {
                $part = array_keys(json_decode($row_ticket->permission, true));

                $user_ids = implode(",", $part); // these  sre the user_id of the users
                // fetching the Email id Of the users
                $sql = "SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
                $query1 = $this->db->query($sql);
                $row_part = $query1->result(); // these are the participants for  this bug

                /* ##################### Start Of Mail Sending Code ################# */

                foreach ($row_part as $part_email) {
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
        } else {
            $result['status'] = false;
            $result['message'] = "Comment Not Posted , Please try Again";
            $result['data'] = $comment_id;
        }

        return $result;
    }

    public function saveInvoiceStatusModel($invoice_number, $transaction_id, $payment_status, $payment_message, $currency, $amount, $user_id, $payer_email)
    {
        // inserting the the data in the tbl_payments tables
        if ($payment_status == "Success") {
            $data = array("invoices_id" => $invoice_number,
                "trans_id" => $transaction_id,
                "payer_email" => $payer_email,
                "amount" => $amount,
                "payment_method" => 6,
                "currency" => $currency,
                "payment_date" => date('Y-m-d'),
                "month_paid" => date('m'),
                "year_paid" => date('Y'),
                "paid_by" => $user_id
            );
            $this->db->insert('tbl_payments', $data);

            //echo $this->db->last_query();
            // updating the values in the tbl_invoices tables

            $updated = array("status" => "Paid");
            $this->db->where('invoices_id', $invoice_number);
            $this->db->update('tbl_invoices', $updated);
        }

        return true;
    }

    public function getTaskListModel($post)
    {
        $project_id = $post['project_id'];

        $this->db->select('task_id,task_name,due_date,task_status,task_progress');
        $this->db->from('tbl_task');
        $this->db->where('project_id', $project_id);
        $query = $this->db->get();
        $row = $query->result();

        $result['status'] = true;
        $result['message'] = "Data fetched Successfully";
        $result['data'] = $row;

        return $result;
    }

    public function getTaskDetailsModel($post)
    {
        $task_id = $post['task_id'];

        // Here first getting the data of the tasks
        $this->db->select('a.project_name,b.task_name,b.task_description,b.task_start_date,b.due_date,b.task_status,b.task_progress,b.permission,b.task_hour,b.timer_status,b.task_created_date,c.fullname');
        $this->db->from('tbl_project as a');
        $this->db->join('tbl_task as b', 'a.project_id=b.project_id', 'inner');
        $this->db->join('tbl_account_details as c', 'b.created_by=c.user_id', 'inner');
        $this->db->where('b.task_id', $task_id);
        $query_data = $this->db->get();
        //echo $this->db->last_query();die;
        $row_data1 = $query_data->row();

        $row_data = array("project_name" => $row_data1->project_name,
            "task_name" => $row_data1->task_name,
            "task_description" => $row_data1->task_description,
            "task_start_date" => $row_data1->task_start_date,
            "due_date" => $row_data1->due_date,
            "task_status" => $row_data1->task_status,
            "task_progress" => $row_data1->task_progress,
            "task_hour" => $row_data1->task_hour,
            "timer_status" => $row_data1->timer_status,
            "task_created_date" => date('Y-m-d', strtotime($row_data1->task_created_date)),
            "fullname" => $row_data1->fullname
        );


        // now  getting the list of  persons  to whom task is assigned
        if ($row_data1->permission != "all") {
            $part = array_keys(json_decode($row_data1->permission, true));

            $user_ids = implode(",", $part); // these  sre the user_id of the users
            // fetching the Email id Of the users
            $sql = "SELECT fullname,avatar FROM (`tbl_account_details`) WHERE user_id IN ($user_ids) ";
            $query1 = $this->db->query($sql);
            $row_part = $query1->result(); // these are the participants for  this bug
        } else {
            $row_part = "";
        }


        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data']['task'] = $row_data;
        $result['data']['users'] = $row_part;


        return $result;
    }

    public function getTaskCommentsModel($post)
    {
        $task_id = $post['task_id'];

        $sql = "SELECT a.comment,SUBSTR(a.comment_datetime,1,10) as save_date ,b.fullname,b.avatar
			        FROM tbl_task_comment as a
					INNER JOIN tbl_account_details as b ON a.user_id=b.user_id
					WHERE a.task_id='$task_id'";

        $query = $this->db->query($sql);
        $row = $query->result();

        // Now getting the users of the task to whom it is assigned

        $this->db->select('permission');
        $this->db->from('tbl_task');
        $this->db->where('task_id', $task_id);
        $query_user = $this->db->get();
        $row_user = $query_user->row();


        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row;

        return $result;
    }

    public function saveNewTaskCommentModel($post)
    {
        $user_id = $post['user_id'];
        $posted_by = $post['name'];
        $task_id = $post['task_id'];
        $comment = $post['comment'];


        $data_comment = array("task_id" => $task_id,
            "user_id" => $user_id,
            "comment" => $comment,
        );

        $this->db->insert('tbl_task_comment', $data_comment);
        $comment_id = $this->db->insert_id();

        if ($comment_id != "") {
            $result['status'] = true;
            $result['message'] = "Data Saved Successfully";
            $result['data'] = $comment_id;


            // inserting the data in the tbl_activities

            $data_activity = array("user" => $user_id,
                "module" => "tasks",
                "module_field_id" => $task_id,
                "icon" => "fa-ticket",
                "activity" => "activity_new_task_comment",
                "value1" => $comment
            );

            $this->db->insert('tbl_activities', $data_activity);

            // End Inserting the data in the table activities
            // getting the users of the tasks 

            $this->db->select('task_name,permission');
            $this->db->from('tbl_task');
            $this->db->where('task_id', $task_id);
            $query_users = $this->db->get();
            $row_user = $query_users->row();
            $task_name = $row_user->task_name;

            if ($row_user->permission != "all") {
                $part = array_keys(json_decode($row_user->permission, true));

                $user_ids = implode(",", $part); // these  sre the user_id of the users
                // fetching the Email id Of the users
                $sql = "SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
                $query1 = $this->db->query($sql);
                $row_part = $query1->result(); // these are the participants for  this bug

                /* ##################### Start Of Mail Sending Code ################# */

                foreach ($row_part as $part_email) {
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
                    $TicketLink = str_replace("{COMMENT_URL}", base_url() . 'admin/tasks/view_task_details/' . $task_id . '/' . '2', $TicketStatus);
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
        } else {
            $result['status'] = false;
            $result['message'] = "Data Not Saved ";
            $result['data'] = "";
        }

        return $result;
    }

    public function saveTaskAttachmentModel($post, $width, $height, $filesize, $filename)
    {
        $task_id = $post['task_id'];
        $description = $post['description'];
        $title = $post['title'];
        $user_id = $post['user_id'];
        $uploaded_by = $post['name'];

        // inserting ther data in the tbl_task_attachment

        $data_task_attachment = array("user_id" => $user_id,
            "description" => $description,
            "title" => $title,
            "task_id" => $task_id
        );

        $this->db->insert('tbl_task_attachment', $data_task_attachment);

        $attachment_id = $this->db->insert_id();


        // Now inserting the data in the tbl_task_uploaded_files

        $up_path = $_SERVER['DOCUMENT_ROOT'];
        $data_upload = array("task_attachment_id" => $attachment_id,
            "files" => 'uploads/' . $filename,
            "uploaded_path" => $up_path . '/uploads/' . $filename,
            "file_name" => $filename,
            "size" => $filesize,
            "ext" => 'jpg',
            "is_image" => 1,
            "image_width" => $width,
            "image_height" => $height
        );

        $this->db->insert('tbl_task_uploaded_files', $data_upload);

        $insert_id = $this->db->insert_id();


        // inserting the data in the tbl_activities

        $data_activity = array("user" => $user_id,
            "module" => "tasks",
            "module_field_id" => $task_id,
            "icon" => "fa-ticket",
            "activity" => "activity_new_task_attachment",
            "value1" => $title
        );

        $this->db->insert('tbl_activities', $data_activity);

        // End Inserting the data in the table activities			

        if ($insert_id != "") {
            $result['status'] = true;
            $result['message'] = "Attachment Uploaded Successfully";
            $result['data'] = $insert_id;



            // getting the details of the task from tbl_task 

            $this->db->select('task_name,permission');
            $this->db->from('tbl_task');
            $this->db->where('task_id', $task_id);
            $query_bug = $this->db->get();
            $row_bug = $query_bug->row();
            $task_name = $row_bug->task_name; // this the bug title


            if (is_array(json_decode($row_bug->permission, true))) {
                // getting the participants of this bugs

                $part = array_keys(json_decode($row_bug->permission, true));

                $user_ids = implode(",", $part); // these  sre the user_id of the users
                // fetching the Email id Of the users
                $sql = "SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
                $query1 = $this->db->query($sql);
                $row_part = $query1->result(); // these are the participants for  this bug



                /* ##################### Start Of Mail Sending Code ################# */

                foreach ($row_part as $part_email) {
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
                    $Link = str_replace("{TASK_URL}", base_url() . 'admin/tasks/view_task_details/' . $task_id . '/' . '3', $assigned_by);
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
            } // End Iff for Checking the permission array
        } else {
            $result['status'] = false;
            $result['message'] = "Attachment Not Uploaded";
            $result['data'] = $insert_id;
        }


        return $result;
    }

    public function getRecentActivitiesBugsModel($post)
    {

        $bug_id = $post['bug_id'];
		
        $this->db->select('a.activity,a.value1,b.fullname,b.avatar');
        $this->db->from('tbl_activities as a');
        $this->db->join('tbl_account_details as b', 'a.user=b.user_id', 'inner');
        $this->db->where('a.module', 'bugs');
		 $this->db->where('a.module_field_id', $bug_id);
        $query = $this->db->get();
		
		if($query->num_rows()!=0)
		{
			$row = $query->result();

			foreach ($row as $temp_row) {
				if ($temp_row->activity == "activity_new_bug")
					$act = "Activity New Bug Added";
				else if ($temp_row->activity == "activity_update_bug")
					$act = "Activity Bug Updated";
				else if ($temp_row->activity == "activity_new_bug_comment")
					$act = "Activity Bug New Comment";
				else
					$act = "Activity Attach New Files";

				$data[] = array("activity" => $act,
					"value1" => $temp_row->value1,
					"fullname" => $temp_row->fullname,
					"avatar" => $temp_row->avatar
				);
			}

			$result['status'] = true;
			$result['message'] = "Message Fetched Successfully";
			$result['data'] = $data;
		}
		else
		{
			$result['status'] = false;
			$result['message'] = "No Data Found";
			$result['data'] = array(null);
		}
        

        return $result;
    }

    public function getRecentActivitiesProjectsModel($post)
    {
		$task_id = $post['task_id'];
        $this->db->select('a.activity,a.value1,b.fullname,b.avatar');
        $this->db->from('tbl_activities as a');
        $this->db->join('tbl_account_details as b', 'a.user=b.user_id', 'inner');
        $this->db->where('a.module', 'tasks');
        $this->db->where('a.module_field_id', $task_id);
        $query = $this->db->get(); 
        
		if($query->num_rows()==0)
		{
			
			$result['status'] = false;
			$result['message'] = "No Data Found";
			$result['data'] = array(null);
		}
		else
		{
		
			$row = $query->result();
			
			

			foreach ($row as $temp_row) {
				if ($temp_row->activity == "activity_save_project")
					$act = "Activity New Project Added";
				else if ($temp_row->activity == "activity_update_project")
					$act = "Activity Project Updated";
				else if ($temp_row->activity == "activity_new_project_comment")
					$act = "Activity Project New Comment";
				else
					$act = "Activity Attach New Files";

				$data[] = array("activity" => $act,
					"value1" => $temp_row->value1,
					"fullname" => $temp_row->fullname,
					"avatar" => $temp_row->avatar
				);
			}

			$result['status'] = true;
			$result['message'] = "Message Fetched Successfully";
			$result['data'] = $data;
		}

        return $result;
    }

    public function getPaymentListClientModel($post)
    {
        $company_id = $post['company_id'];
        $sql = "Select a.name,b.invoices_id,c.trans_id from tbl_client as a 
			         INNER JOIN  tbl_invoices as b ON a.client_id=b.client_id 
					 INNER JOIN tbl_payments as c ON b.invoices_id=c.invoices_id
					 WHERE a.client_id='$company_id' ORDER BY c.payments_id DESC";
        //echo $sql;die;
        $query_main = $this->db->query($sql);
        $row_main = $query_main->result();


        $data = array();

        // now getting the details of the payments
        foreach ($row_main as $data_pay) {
            $invoice_id = $data_pay->invoices_id;
            $trans_id = $data_pay->trans_id;
            // Now Getting the total Amount of the Invlice

            $sql_sum = "Select SUM(total_cost) as total_cost from tbl_items where invoices_id='$invoice_id'";
            $query_sum = $this->db->query($sql_sum);
            $row_sum = $query_sum->row();
            $invoice_amount = $row_sum->total_cost;
             

            // Now getting the  paid date and the transaction id

             $sql_payment = "Select trans_id,amount,currency,payment_date from tbl_payments  where trans_id='$trans_id' and invoices_id='$invoice_id'";
             
            //echo $sql_payment; die;
            $query_pay = $this->db->query($sql_payment);
            $row_sum = $query_pay->row();


            $data[] = array("client_name" => $data_pay->name,
                "total_amount" => $invoice_amount,
                "transaction_id" => $row_sum->trans_id,
                "pay_date" => $row_sum->payment_date,
                "currency" => $row_sum->currency,
                "invoices_id" => $invoice_id
            );
        }// end of for each loop



        $result['status'] = true;
        $result['message'] = "Data Fetched";
        $result['data'] = $data;

        return $result;
    }

    public function getPaymentDetailsModel($post)
    {
        $invoice_id = $post['invoices_id'];
        $trans_id = $post['transaction_id'];
		/*
        $this->db->select('a.invoices_id,a.reference_no,a.notes,SUM(b.total_cost) as total_cost,c.name,d.trans_id,d.amount,d.currency,d.payment_date,e.method_name');
        $this->db->from('tbl_invoices as a');
        $this->db->join('tbl_items as b', 'a.invoices_id=b.invoices_id', 'inner');
        $this->db->join('tbl_client as c', 'a.client_id=c.client_id', 'inner');
        $this->db->join('tbl_payments as d', 'a.invoices_id=d.invoices_id', 'inner');
        $this->db->join('tbl_payment_methods as e', 'd.payment_method=e.payment_methods_id', 'inner');
        $this->db->where('a.invoices_id', $invoice_id);
		$this->db->where('d.trans_id', $trans_id);
		*/
		
		$sql = "SELECT a.invoices_id, a.reference_no, a.notes,SUBSTR(a.date_saved,1,10) as invoice_date, SUM(b.total_cost) as total_cost, `c`.`name`, `d`.`trans_id`, `d`.`amount`, `d`.`currency`, `d`.`payment_date`, `e`.`method_name`
				FROM (tbl_invoices as a)
				INNER JOIN tbl_items as b ON a.invoices_id=b.invoices_id
				INNER JOIN tbl_client as c ON a.client_id=c.client_id
				INNER JOIN tbl_payments as d ON a.invoices_id=d.invoices_id
				INNER JOIN tbl_payment_methods as e ON d.payment_method=e.payment_methods_id
				WHERE a.invoices_id =  '$invoice_id'
				AND `d`.`trans_id` =  '$trans_id'";
				
        $query = $this->db->query($sql);
		//echo $this->db->last_query(); die;
        $row_main = $query->row();

        $data_main = array("invoices_id" => $row_main->invoices_id,
            "reference_no" => $row_main->reference_no,
            "notes" => $row_main->notes,
            "total_cost" => $row_main->total_cost,
            "client_name" => $row_main->name,
            "trans_id" => $row_main->trans_id,
            "amount" => $row_main->amount,
            "currency" => $row_main->currency,
            "amount" => $row_main->amount,
            "payment_date" => $row_main->payment_date,
            "invoice_date" => $row_main->invoice_date,
            "payment_method" => $row_main->method_name
        );

        // Getting the cmpany Name and address

        $sql_company = "Select * from tbl_config where config_key IN('company_address','company_logo','company_name')";
        $query_company = $this->db->query($sql_company);
        $row_company = $query_company->result();

        $company = array($row_company[0]->config_key => $row_company[0]->value,
            $row_company[1]->config_key => $row_company[1]->value,
            $row_company[2]->config_key => $row_company[2]->value,
        );



        $result['status'] = true;
        $result['message'] = "Data Getched Successfully";
        $result['data']['client'] = $data_main;
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

        $data = array("invoices_id" => $invoice_id,
            "trans_id" => $transaction_id,
            "payer_email" => $user_email,
            "payment_method" => $payment_method,
            "amount" => $amount,
            "currency" => $currency,
            "notes" => $description,
            "month_paid" => date('m'),
            "year_paid" => date('Y'),
            "paid_by" => $user_id,
            "payment_date" => date('Y-m-d')
        );


        $this->db->insert('tbl_payments', $data);

        $insert_id = $this->db->insert_id();

        if ($insert_id != "") {
            $result['status'] = true;
            $result['message'] = "Payment Made Successfully";
            $result['data'] = $insert_id;
        } else {
            $result['status'] = false;
            $result['message'] = "Payment Information Not Saved";
            $result['data'] = 0;
        }

        return $result;
    }

    public function changeStatusOfEstimatesModel($post)
    {
        $estimates_id = $post['estimates_id'];
        $status = $post['status'];

        // Now updating the  values in the tbl_estimates

        $update = array("status" => $status);

        $this->db->where('estimates_id', $estimates_id);
        $this->db->update('tbl_estimates', $update);
        $result['status'] = true;
        $result['message'] = "Estimate Updated Successfully";
        $result['data'] = $estimates_id;
        return $result;
    }

    public function register_guestUserModel($post)
    {
        require_once dirname(__FILE__) . '/../../libraries/MCrypt.php';
        $mcrypt = new MCrypt();


        $name = trim(addslashes($post['name']));
        $email = base64_decode(addslashes($post['email']));
        $username = base64_decode(addslashes($post['username']));

        

        //Validation for the username and email
        $this->db->select('COUNT(0) as row_count');
        $this->db->from('tbl_guest_users');
        $this->db->where('username', $username);
        $this->db->or_where('email', $email);
        $query_cehck = $this->db->get(); 
		$row_check = $query_cehck->row();
        $count = $row_check->row_count;

        if ($count == 0) {
			
            $data = array("name" => $name,
                "username" => $username,
                "email" => $email
            );
            $this->db->insert('tbl_guest_users', $data);
            //echo $this->db->last_query(); die; 
            $result['status'] = true;
            $result['message'] = "User Registered Successfully";
            $result['data'] = $username;
        } else {
            $result['status'] = false;
            $result['message'] = "User Already Registered";
            $result['data'] = "";
        }

        return $result;
    }

    public function saveNewTaskModel($post)
    {
        $taskname = trim(addslashes($post['task_name']));
        $project_id = $post['project_id'];
        $start_date = $post['start_date'];
        $due_date = $post['due_date'];
        $estimate_hour = $post['estimate_hour'];
        $progress = $post['progress'];
        $task_status = $post['task_status'];
        $description = trim(addslashes($post['description']));
        $assigned_to = $post['assigned_to'];

        $created_by = $post['user_id'];
        $assigned_by = $post['name'];

        // checking that assigned to is array or not
        // if is array then we ned to create a json and save it in db

        $isarray = is_array($assigned_to);

        if ($isarray == 1) {
            // this means this is assigned to specific users
            // creating the array now to save in db in predefined format;
            $users = array();
            for ($i = 0; $i < count($assigned_to); $i++) {
                $users[$assigned_to[$i]] = array("edit", "view");
            }

            $user_emails = implode(',', $assigned_to);
        } else {
            $users = $assigned_to;
        }

        // Now Inserting the value in the database

        $data = array("project_id" => $project_id,
            "task_name" => $taskname,
            "task_description" => $description,
            "task_start_date" => $start_date,
            "due_date" => $due_date,
            "task_progress" => $progress,
            "task_hour" => $estimate_hour,
            "created_by" => $created_by,
            "permission" => $users
        );

        $this->db->insert('tbl_task', $data);
        $bug_id = $this->db->insert_id(); // this is the bug id 

        if ($bug_id != "" || $bug_id != 0) {
            $result['status'] = true;
            $result['message'] = "Task Added Successfully";
            $result['data'] = $bug_id;

            // checking again for sending emails
            if ($isarray == 1) {
                // fetching the Email id Of the users
                $sql = "SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_emails) ";
                $query1 = $this->db->query($sql);
                $row_part = $query1->result(); // these are the participants for  this bug



                /* ##################### Start Of Mail Sending Code ################# */

                foreach ($row_part as $part_email) {
                    $email = $part_email->email;
                    $config['useragent'] = 'Rebelute Digital Mailing System';
                    $config['mailtype'] = "html";
                    $config['newline'] = "\r\n";
                    $config['charset'] = 'utf-8';
                    $config['wordwrap'] = TRUE;
                    $company_email = 'admin@rebelute.com';
                    $company_name = 'Rebelute Digital Solutions';
                    $subject = 'New Task Attachment Mail';


                    $message = '<p>Hi there,</p><p>A new task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this task by logging in to the portal using the link below.</p><p><br /><big><strong><a href="{TASK_URL}">View Task</a></strong></big><br /><br />Regards<br />The {SITE_NAME} Team</p>';
                    $task_name = str_replace("{TASK_NAME}", $taskname, $message);
                    $assigned_by = str_replace("{ASSIGNED_BY}", ucfirst($assigned_by), $task_name);
                    $Link = str_replace("{TASK_URL}", base_url() . 'admin/tasks/view_task_details/' . $bug_id, $assigned_by);
                    $message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $Link);
                    //echo $message; die;
                    $this->load->library('email', $config);

                    $this->email->from($company_email, $company_name);
                    $this->email->to($email);

                    $this->email->subject($subject);
                    $this->email->message($message);
                    $send = $this->email->send();
                } // End Of For
            } // End Iff for sending emails
        } // end iff for sending tthe finala result variable			   
        else {
            $result['status'] = false;
            $result['message'] = "Task Not Added Due TO Server Error";
            $result['data'] = $bug_id;
        }

        return $result;
    }

    public function getStaffListModel($post)
    {
        $this->db->select('a.user_id,b.fullname');
        $this->db->from('tbl_users as a');
        $this->db->join('tbl_account_details as b', 'a.user_id=b.user_id', 'inner');
        $this->db->where('a.role_id', 3);
        $query = $this->db->get();
        $row = $query->result();

        $result['status'] = true;
        $result['message'] = "users Fetched Successfully";
        $result['data'] = $row;
        return $result;
    }

    public function saveNewTicketModel($post, $width, $height, $filesize, $filename)
    {

        $ticket_code = $post['ticket_code'];
        $subject = $post['subject'];
        $body = $post['ticket_message'];
        $departments_id = $post['department_id'];
        $reporter = $post['user_id'];
        $priority = $post['priority'];


        // need to create a json to save the uploaded fiel i the predined format
        $dp = $_SERVER['DOCUMENT_ROOT'];
        // creating the json if the  attachement is found
        if ($filename != "") {
            $att[] = array("fileName" => $filename,
                "path" => 'uploads/' . $filename,
                "fullPath" => $dp . '/uploads/' . $filename,
                "ext" => 'jpg',
                "size" => $filesize,
                "is_image" => true,
                "image_width" => $width,
                "image_height" => $height
            );
            $file = json_encode($att);
        } else {
            $file = "";
        }

        // Now Inswerting the data in the tbl_tickets
        $data = array("ticket_code" => $ticket_code,
            "subject" => $subject,
            "body" => $body,
            "departments_id" => $departments_id,
            "reporter" => $reporter,
            "priority" => $priority,
            "upload_file" => $file,
            "status" => 'open'
        );

        $this->db->insert('tbl_tickets', $data);

        $ticket_id = $this->db->insert_id();

        if ($ticket_id != "") {
            $result['status'] = true;
            $result['message'] = "Ticket Saved Successfully";
            $result['data'] = $ticket_id;
        } else {
            $result['status'] = false;
            $result['message'] = "Ticket Not Saved";
            $result['data'] = "";
        }

        return $result;
    }

    public function getDepartmentListModel()
    {
        $this->db->select('departments_id,deptname');
        $this->db->from('tbl_departments');
        $query = $this->db->get();
        $row = $query->result();

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row;

        return $result;
    }

    public function getForgotPasswordKeyModel($post)
    {
        require_once dirname(__FILE__) . '/../../libraries/MCrypt.php';
        $mcrypt = new MCrypt();

        $email = base64_decode($post['email']);

        // Checking whether the email is ther in our database 

        $this->db->select('user_id,email');
        $this->db->from('tbl_users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
        $count = $query->num_rows();
        if ($count != 0) {
            // this means the user email is there in the db
            // need to send mail to this db
            // also need to update the unique id in the databse


            $row = $query->row();
            $user_id = $row->user_id;

            //$unique_id = $mcrypt->encrypt($email);
            $unique_id = time() . $user_id;

            $update = array("password_id" => $unique_id);
            $this->db->where('user_id', $user_id);
            $this->db->update('tbl_users', $update);


            /*    ####################   Start Code for  sending Email ##############  */


            $config['useragent'] = 'Rebelute Digital Mailing System';
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $company_email = 'admin@rebelute.com';
            $company_name = 'Rebelute Digital Solutions';
            $subject = 'Forgot Password Recovery Mail';

            //echo $email;die;
            $message = '<p>Hi there,</p><p>A Forgot Password has been Requested by You</p><p>Copy  the below code and enter in the app To generate new password.</p><p><strong>{PASS_KEY}</strong></p><p>If You did not request for the new password, then do not respond to this mail.<br />Regards<br />The {SITE_NAME} Team</p>';
            $task_name = str_replace("{PASS_KEY}", $unique_id, $message);
            $message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $task_name);
            //echo $message; die;
            $this->load->library('email', $config);

            $this->email->from($company_email, $company_name);
            $this->email->to($email);

            $this->email->subject($subject);
            $this->email->message($message);
            $send = $this->email->send();



            /*    ####################   End Code for  sending Email ##############   */


            $result['status'] = true;
            $result['message'] = "Email Send To Registered Email Id";
            $result['data'] = $email;
        } else {
            $result['status'] = false;
            $result['message'] = "Email Not Registered";
            $result['data'] = $email;
        }

        return $result;
    }

    public function validatePasswordKeyModel($post)
    {
        require_once dirname(__FILE__) . '/../../libraries/MCrypt.php';
        $mcrypt = new MCrypt();

        $email = base64_decode($post['email']);
        $password_key = $post['password_key'];
        // first validating the password key

        $this->db->select('user_id,email,password_id');
        $this->db->from('tbl_users');
        $this->db->where('email', $email);
        $this->db->where('password_id', $password_key);
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $count = $query->num_rows();

        if ($count != 0) {
            // password key id is valid
            $result['status'] = true;
            $result['message'] = "Password Key Validated Successfully";
            $result['data'] = $email;
        } else {
            // password key id not valid
            $result['status'] = false;
            $result['message'] = "Invalid Password Key";
            $result['data'] = $email;
        }

        return $result;
    }

    public function setNewUserForgotPasswordModel($post)
    {

        require_once dirname(__FILE__) . '/../../libraries/MCrypt.php';
        $mcrypt = new MCrypt();

        $email = base64_decode($post['email']);
        $new_password = base64_decode($post['password']);
		$new_password = $this->hash($new_password);
        // first validating the password key

        $this->db->select('user_id,email');
        $this->db->from('tbl_users');
        $this->db->where('email', $email);
        $query = $this->db->get();

        $count = $query->num_rows();
        if ($count != 0) {
            //This means the email is there
            $row = $query->row();
            $user_id = $row->user_id;


            // this means  the passkey is valid 
            // then updating the password

            $update = array("password_id" => "",
                "password" => $new_password
            );
            $this->db->where('user_id', $user_id);
            $this->db->update('tbl_users', $update);

            // Now the password is  changed
            $result['status'] = true;
            $result['message'] = "Password Changed Successfully";
            $result['data'] = $user_id;
        } else {
            // email id not valid
            $result['status'] = false;
            $result['message'] = "Email Id is not Registered";
            $result['data'] = $email;
        }

        return $result;
    }

    public function getDashboardClientModel($post)
    {
        $user_id = $post['user_id'];
        $company_id = $post['company_id'];

        // Getting the total invoice amount of this company

        $this->db->select('SUM(b.total_cost) as total_cost, a.currency');
        $this->db->from('tbl_invoices as a');
        $this->db->join('tbl_items as b', 'a.invoices_id=b.invoices_id', 'inner');
        $this->db->where('a.client_id', $company_id);
        $query_total = $this->db->get();
        $row_total = $query_total->row();
        $invoice_amount = $row_total->total_cost;
		$currency = $row_total->currency;

        


        //getting the total paid amount

        $this->db->select('SUM(b.amount)as total_amount');
        $this->db->from('tbl_invoices as a');
        $this->db->join('tbl_payments as b', 'a.invoices_id=b.invoices_id', 'inner');
        $this->db->where('a.client_id', $company_id);
        $query_paid = $this->db->get();
        $row_paid = $query_paid->row();
        $paid_amount = $row_paid->total_amount;

        if ($paid_amount == null) {
            $paid_amount = '0';
        }

        // Calculating the remainnng amount
        if ($invoice_amount != "") {
            $remaing_amount = $invoice_amount - $paid_amount;
            $remaing_amount = (string)$remaing_amount;
        } else {
            $remaing_amount = '0';
        }
        //calculating the  paid percentage amount
        if ($invoice_amount != "") {
            $paid_percentage = round(($paid_amount / $invoice_amount) * 100, 2);
            $paid_percentage = (string)$paid_percentage;
        } else {
            $paid_percentage = '0';
        }



        

        
        // getting the recent invoices

        
        
		$sql_recent_invoice = "SELECT distinct(a.invoices_id),a.reference_no,DATE_FORMAT(a.due_date,'%d/%m/%Y') as due_date,DATE_FORMAT(a.date_saved,'%d/%m/%Y') as invoice_date,a.currency
			                      FROM tbl_invoices as a
								  INNER JOIN tbl_items as b ON a.invoices_id=b.invoices_id
								  WHERE a.client_id='$company_id' ORDER BY a.invoices_id DESC LIMIT 5";
								  
								  
								  
        // echo $sql_recent_invoice; die;

        $query_invoices1 = $this->db->query($sql_recent_invoice);
        $query_invoices = $query_invoices1->result();
        //echo "<pre>"; print_r($query_invoices);die;

        $count_invoice = $query_invoices1->num_rows(); // counting the number of invoices for error

        if ($count_invoice != 0) {

            // loopin through to get the total amount of each invoice
            foreach ($query_invoices as $rec_invoices) {
                $invoices_id = $rec_invoices->invoices_id;
                $sql_sum = "Select SUM(total_cost) as total_cost from tbl_items  where invoices_id='$invoices_id'";
                $query_sum = $this->db->query($sql_sum);
                $row_sum = $query_sum->row();
                $amount = $row_sum->total_cost;

                $recent_invoice[] = array("reference_no" => $rec_invoices->reference_no,
                    "due_date" => $rec_invoices->due_date,
                    "invoice_date" => $rec_invoices->invoice_date,
                    "currency" => $rec_invoices->currency,
                    "amount" => $amount
                );
            }
        } else {
            // this means there is no invoice for this client
            $recent_invoice = array();
        }

        // now getting the recent projects
        
		$sql_projects = "SELECT project_name,DATE_FORMAT(start_date,'%d/%m/%Y') as start_date, project_status FROM (tbl_project) WHERE client_id = $company_id";
        $query_projects = $this->db->query($sql_projects); 
        $recent_projects = $query_projects->result();

        // now  getting the recently  paid invoices

        $this->db->select('a.invoices_id,a.reference_no,b.amount,a.currency');
        $this->db->from('tbl_invoices as a');
        $this->db->join('tbl_payments as b', 'a.invoices_id=b.invoices_id', 'inner');
        $this->db->where('a.client_id', $company_id);
		$this->db->order_by('b.payments_id','DESC');
		$this->db->limit(6);
		$query_recent_paid_invoice = $this->db->get(); 
        $row_recent_paid_invoice = $query_recent_paid_invoice->result();

		if ($invoice_amount == null) {
            $invoice_amount = '0';
        }
		
        $main_data = array("total_invoice_amount" => $invoice_amount,
            "paid_amount" => $paid_amount,
            "due_amount" => $remaing_amount,
            "paid_percentage" => $paid_percentage,
			"currency" =>$currency
        );


        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data']['main_data'] = $main_data;
        $result['data']['recent_invoice'] = $recent_invoice;
        $result['data']['recent_projects'] = $recent_projects;
        $result['data']['recently_paid_invoice'] = $row_recent_paid_invoice;


        return $result;
    }

    public function checkSocialAlreadyRegisteredModel($post)
    {
        $unique_id = $post['unique_id'];

        // Now checking whether this unique id is ther ein our database

        $this->db->select('a.user_id,a.email,a.username,a.unique_id,a.role_id,b.fullname,b.mobile,b.device_id,b.avatar,b.company');
        $this->db->from('tbl_users as a');
        $this->db->join('tbl_account_details as b', 'a.user_id=b.user_id', 'inner');
        $this->db->where('a.unique_id', $unique_id);
        $query = $this->db->get(); 
		//echo $this->db->last_query();die;
        $count = $query->num_rows();

        // Checkng the the value already exists

        if ($count == 0) {
            // thismenas the user is not register with used

            $result['status'] = false;
            $result['message'] = "User Not Registerd With Us";
            $result['data'] = '';
        } else {
            // this means the user is register with us
            $row = $query->row();
            $user_id = $row->user_id;
            $name = $row->fullname;
            $profile_image = $row->avatar;
            $username = $row->username;
            $mobile = $row->mobile;
            $unique_id = $row->unique_id;
            $user_type = $row->role_id;
            $email = $row->email;
            $device_id = $row->device_id;


            if ($user_type == 1) {
                $user = "Admin";
            } else if ($user_type == 2) {
                $user = "Client";
            } else {
                $user = "Staff";
            }


            // Checking whether  the user is Client Or Other

            if ($user_type == 2) {
                $company_id = $row->company;


                // fetching the data of the company
                $this->db->select('name,phone,mobile,email');
                $this->db->from('tbl_client');
                $this->db->where('client_id', $company_id);
                $query_company = $this->db->get();
                $row_company = $query_company->row();

                // These are the company detials

                $company_name = $row_company->name;
                $company_mobile = $row_company->mobile;
                $company_phone = $row_company->phone;
                $company_email = $row_company->email;


                // formatting the the data to be sent to the reponse

                $full_data = array("user_id" => $user_id,
                    "username" => $username,
                    "name" => $name,
                    "email" => $email,
                    "user_type" => $user,
                    "profile_image" => $profile_image,
                    "company_id" => $company_id,
                    "company_name" => $company_name,
                    "company_email" => $company_email,
                    "company_mobile" => $company_mobile,
                    "company_phone" => $company_phone,
                    "unique_id" => $unique_id,
                    "phone" => $mobile
                );
            } else {
                // formatting the the data to be sent to the reponse

                $full_data = array("user_id" => $user_id,
                    "username" => $username,
                    "name" => $name,
                    "email" => $email,
                    "user_type" => $user,
                    "profile_image" => $profile_image,
                    "unique_id" => $unique_id,
                    "phone" => $mobile
                );
            }

            $result['status'] = true;
            $result['message'] = "User Already Registered  With Same ID";
            $result['data'] = $full_data;
        }


        return $result;
    }
	
	public function getBugAttachmentListClientModel($post)
    {
        $bug_id = $post['bug_id'];



        $sql = "Select a.fullname,b.title,b.task_attachment_id,b.description,SUBSTR(b.upload_time,1,10) as upload_time
			        FROM tbl_account_details as a
					INNER JOIN tbl_task_attachment as b on a.user_id=b.user_id
					WHERE b.bug_id=$bug_id
					";

        $query = $this->db->query($sql);
        $row_task = $query->result();

        // The above is the list of tast attachments
        // But we need the files as well which is inside the attachmetns list
        // So looping as , in one list there as can be many attach files

        foreach ($row_task as $task_files) {
            $task_attachment_id = $task_files->task_attachment_id;

            // Now getting the list of files attached to this task atachemt
            $this->db->select('files,size,image_width,image_height');
            $this->db->from('tbl_task_uploaded_files');
            $this->db->where('task_attachment_id', $task_attachment_id);
            $query_attach = $this->db->get();
            $attachments = $query_attach->result();

            // Now creating the final array

            $data[] = array("fullname" => $task_files->fullname,
                "title" => $task_files->title,
                "task_attachment_id" => $task_files->task_attachment_id,
                "description" => $task_files->description,
                "upload_time" => $task_files->upload_time,
                "attachments" => $attachments
            );
        }



        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $data;

        return $result;
    }
	
	public function ProjectAttachmentListClientModel($post)
    {
        $project_id = $post['project_id'];
        $this->db->select('ta.title,ta.description,ta.task_attachment_id,ta.upload_time,tu.file_name,tu.files,(select username from tbl_users where user_id=ta.user_id) as uploaded_by');
        $this->db->from('tbl_task_attachment as ta');
        $this->db->join('tbl_task_uploaded_files as tu', 'ta.task_attachment_id=tu.task_attachment_id', 'inner');
        $this->db->where('ta.project_id', $project_id);
        $query = $this->db->get();
        $data1 = $query->result();

        foreach ($data1 as $data) {
            $data_complete[] = array("title" => $data->title,
                "description" => $data->description,
                "upload_time" => $data->upload_time,
                "file_name" => $data->file_name,
                "files" => base_url() . $data->files,
                "uploaded_by" => $data->uploaded_by,
				"project_attachment_id"=>$data->task_attachment_id
            );
        }
        if (count($data) > 0) {
            $result['status'] = true;
            $result['message'] = "Success";
            $result['data'] = $data_complete;
        } else {
            $result['status'] = false;
            $result['message'] = "Failed";
            $result['data'] = array('null');
        }
        return $result;
    }
	
	 public function getTaskAttachmentListClientModel($post)
    {
        $task_id = $post['task_id'];


        // getting the task attchments details


        $sql = "Select a.fullname,b.title,b.task_attachment_id,b.description,SUBSTR(b.upload_time,1,10) as upload_time
			        FROM tbl_account_details as a
					INNER JOIN tbl_task_attachment as b on a.user_id=b.user_id
					WHERE b.task_id=$task_id
					";

        $query = $this->db->query($sql);
        $row_task = $query->result();

        // The above is the list of tast attachments
        // But we need the files as well which is inside the attachmetns list
        // So looping as , in one list there as can be many attach files

        foreach ($row_task as $task_files) {
            $task_attachment_id = $task_files->task_attachment_id;

            // Now getting the list of files attached to this task atachemt
            $this->db->select('files,size,image_width,image_height');
            $this->db->from('tbl_task_uploaded_files');
            $this->db->where('task_attachment_id', $task_attachment_id);
            $query_attach = $this->db->get();
            $attachments = $query_attach->result();

            // Now creating the final array

            $data[] = array("fullname" => $task_files->fullname,
                "title" => $task_files->title,
                "task_attachment_id" => $task_files->task_attachment_id,
                "description" => $task_files->description,
                "upload_time" => $task_files->upload_time,
                "attachments" => $attachments
            );
        }



        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $data;

        return $result;
    }
	
	public function deleteBugAttachmentClientModel($post)
    {
        $attachment_id = $post['attachment_id'];

        // getting the files from the attachment_id
        $this->db->select('files');
        $this->db->from('tbl_task_uploaded_files');
        $this->db->where('task_attachment_id', $attachment_id);
        $query = $this->db->get();
        $row_file = $query->result();

        // Looping for multiple images for one  attachment
        foreach ($row_file as $data_file) {
            $file = $data_file->files;
            unlink($file);
        }

        // Now deleting the entry from tbl_task_uploaded_files

        $this->db->where('task_attachment_id', $attachment_id);
        $this->db->delete('tbl_task_uploaded_files');

        // Now deleting the entry from tbl_task_attachment

        $this->db->where('task_attachment_id', $attachment_id);
        $this->db->delete('tbl_task_attachment');

        $result['status'] = true;
        $result['message'] = "Bug Attachement Deleted Successfully";
        $result['data'] = array("$attachment_id");

        return $result;
    }
	
	public function deleteTaskAttachmentClientModel($post)
    {
        $task_attachment_id = $post['task_attachment_id'];

        // getting the list of  images for the task atachemt id

        $this->db->select('files');
        $this->db->from('tbl_task_uploaded_files');
        $this->db->where('task_attachment_id', $task_attachment_id);
        $query = $this->db->get();
        $row = $query->result();

        // Now deleting the files from the server in loop

        foreach ($row as $file) {
            @unlink($file->files);
        }


        // Now all the files are deleted 
        // We now need to delete the entries in the databse

        $this->db->where('task_attachment_id', $task_attachment_id);
        $this->db->delete('tbl_task_attachment');

        $this->db->where('task_attachment_id', $task_attachment_id);
        $this->db->delete('tbl_task_uploaded_files');

        $result['status'] = true;
        $result['message'] = "Attachement Deleted Successfully";
        $result['data'] = array(null);

        return $result;
    }
	
	public function deleteProjectAttachmentClientModel($post)
	{
		$task_attachment_id = $post['project_id'];

        // getting the list of  images for the task atachemt id

        $this->db->select('files');
        $this->db->from('tbl_task_uploaded_files');
        $this->db->where('task_attachment_id', $task_attachment_id);
        $query = $this->db->get();
        $row = $query->result();

        // Now deleting the files from the server in loop

        foreach ($row as $file) {
            @unlink($file->files);
        }


        // Now all the files are deleted 
        // We now need to delete the entries in the databse

        $this->db->where('task_attachment_id', $task_attachment_id);
        $this->db->delete('tbl_task_attachment');

        $this->db->where('task_attachment_id', $task_attachment_id);
        $this->db->delete('tbl_task_uploaded_files');

        $result['status'] = true;
        $result['message'] = "Attachement Deleted Successfully";
        $result['data'] = array(null);

        return $result;
	}
	
	public function checkInvoicePdfCreated($invoices_id)
	{
		$this->db->select('invoice_created,reference_no');
		$this->db->from('tbl_invoices');
        $this->db->where('invoices_id',$invoices_id);
        $query_created = $this->db->get();
        $row_created = $query_created->row();
        return $row_created;
	}
	
	/**
     * Function to create New Bug For Project
     * @return array
     */
    public function createNewBugClientModel($post)
    {

        $project_id = $post['project_id'];
        $bug_title = $post['bug_title'];
		
		// Checking whether the Bug title already exists
		
		$this->db->select('COUNT(0) as num_rows');
		$this->db->from('tbl_bug');
		$this->db->where('bug_title',$bug_title);
		$query = $this->db->get();
		
		$row = $query->row();
		$count = $row->num_rows;
		
		if($count==0)
		{
			
				$description = $post['description'];
				$bug_status = $post['bug_status'];
				$priority = $post['priority'];
				$reporter = $post['user_id'];
				$updated_time = date('Y-m-d H:i:s');
				$permission = $post['permission'];

				$posted_by = $post['posted_by']; // Name of the logged in user
				// creating the array to be saved in db

				$data = array("project_id" => $project_id,
					"bug_title" => $bug_title,
					"bug_description" => $description,
					"bug_status" => $bug_status,
					"priority" => $priority,
					"reporter" => $reporter,
					"permission" => $permission
				);

				$this->db->insert('tbl_bug', $data);
				//echo $this->db->last_query();

				$bug_id = $this->db->insert_id();


				// Code for sendingin mail to the users to whom the bug is assigned	
				if ($permission != "All") {

					$part = array_keys(json_decode($permission, true));
					$user_ids = implode(",", $part); // these  sre the user_id of the users
					// fetching the Email id Of the users
					$sql = "SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
					$query1 = $this->db->query($sql);
					$row_part = $query1->result(); // these are the participants for  this bug

					/* ##################### Start Of Mail Sending Code ################# */

					foreach ($row_part as $part_email) {
						$email = $part_email->email;
						$config['useragent'] = 'Rebelute Digital Mailing System';
						$config['mailtype'] = "html";
						$config['newline'] = "\r\n";
						$config['charset'] = 'utf-8';
						$config['wordwrap'] = TRUE;
						$company_email = 'admin@rebelute.com';
						$company_name = 'Rebelute Digital Solutions';
						$subject = 'New Bug Assigned';


						$message = '<p>Hi there,</p><p>A new bug &nbsp;{BUG_TITLE} &nbsp;has been assigned to you by {ASSIGNED_BY}.</p><p>You can view this bug by logging in to the portal using the link below.</p><p><br /><big><strong><a href="{BUG_URL}">View Bug</a></strong></big><br /><br />Regards<br />The {SITE_NAME} Team</p>';
						$bug_name = str_replace("{BUG_TITLE}", $bug_title, $message);
						$assigned_by = str_replace("{ASSIGNED_BY}", ucfirst($posted_by), $bug_name);
						$Link = str_replace("{BUG_URL}", base_url() . 'admin/bugs/view_bug_details/' . $bug_id . '/' . '2', $assigned_by);
						$message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $Link);
						//echo $message; die;
						$this->load->library('email', $config);

						$this->email->from($company_email, $company_name);
						$this->email->to($email);

						$this->email->subject($subject);
						$this->email->message($message);
						$send = $this->email->send();
					}// End Foreach


					/* ##################### End Of Mail Sending Code ################# */
				}// End Iff for permission

				$result['status'] = true;
				$result['message'] = "Bug Created Successfully";
				$result['data'] = $bug_id;
				
		}
		else
		{
			$result['status'] = false;
			$result['message'] = "Bug With Same Title Already Exists";
			$result['data'] = $bug_title;
		}
		return $result;
    }
	
	public function getAllProjectsListByClientMOdel($post)
    {
		$user_id = $post['client_id'];
        
		// getting the company Id of the client

        $this->db->select('company');
        $this->db->from('tbl_account_details');
        $this->db->where('user_id', $user_id);
        $query1 = $this->db->get(); 
        $row_company = $query1->row();
        $company_id = $row_company->company;

        //NOw send the project list of only above company

        $this->db->select('project_id,project_name');
        $this->db->from('tbl_project');
        $this->db->where('client_id', $company_id);
        $query = $this->db->get();
		
		$row = $query->result();

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row;
        return $result;
    }
	



}

//End Of class
?>