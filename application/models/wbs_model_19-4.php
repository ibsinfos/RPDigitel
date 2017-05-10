<?php

class Wbs_model extends CI_Model {
    /*     * ********************************** get_free_trial Start ************************************** */

    function get_free_trial($service_id, $days, $org_name) {

        $this->db->where('user_id', $this->session->userdata('user_id'));
        $chk_free_trial = $this->db->get('member_services');

        if ($chk_free_trial->num_rows() > 0) {

            $error_msg = 'This Username already used for Free trial';
            return $error_msg;
        } else {

            //Check for database name is_exists?
            //$org_name = 'rebelute';

            $new_db_name = 'silo_crm_' . $org_name;
            $clone_database = $this->clone_database_schema($new_db_name);

            //insert into database_details table

            $data_database_details = array(
                'user_id' => $this->session->userdata('user_id'),
                'user' => 'root',
                'pass' => 'Fiberrails',
                'database_name' => $new_db_name
            );

            $ins_database_details = $this->db->insert('database_details', $data_database_details);
            //insert into database_tables table end



            if ($clone_database == 1) {
               // $data['message'] = "Free trial activated ";

                /**/
                $data_member_services = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'service_id' => $service_id,
                    'free_trial_start_date' => date("Y-m-d"),
                    'free_trial_period_in_days' => $days,
                    'free_trial_end_date' => date('Y-m-d', strtotime("+" . $days . " days"))
                );

                $ins_service_trial = $this->db->insert('member_services', $data_member_services);


// Commented becouse at the time of db clone we add admin user automatically [comment removed bcoz now we use empty user table]
                //To insert admin user record Start [CRM]

                //*                 * ******************* START CONFIGURATION ******************** 
                $DB_SRC_HOST = 'localhost';
                $DB_SRC_USER = 'root';
                $DB_SRC_PASS = 'Fiberrails';
                $DB_SRC_NAME = $new_db_name;
                //*                 * ********************* INSERT **********************
                $db1 = new mysqli($DB_SRC_HOST, $DB_SRC_USER, $DB_SRC_PASS) or die($db1->error);
                mysqli_select_db($db1, $DB_SRC_NAME) or die($db1->error);
                session_start();
        /*        
                $ins_user_query = "INSERT INTO tbl_users (user_id, username, password, email, unique_id, role_id, activated, banned, ban_reason, new_password_key, new_password_requested, password_id, new_email, new_email_key, last_ip, last_login, created, modified, online_status, permission, org_id) VALUES (NULL, '".$_SESSION['user_name']."','".$_SESSION['password']."', '".$_SESSION['email_address']."', '', '1', '1', '0', '', NULL, NULL, '', '".$_SESSION['email_address']."', '49315fd6116d162eea47a98904e37b9a', '::1', '2017-04-12 19:28:42', '0000-00-00 00:00:00', '2017-04-12 19:28:42', '0', 'all', '1')";
                
                   $ins_user_acc_query = "INSERT INTO tbl_account_details (account_details_id, user_id, fullname, company, city, country, locale, address, phone, mobile, skype, language, departments_id, avatar, device_id) VALUES (NULL, '1', '".$_SESSION['user_name']."', '-', NULL, NULL, 'en_US', '-', '', '0172361125', 'skype', 'english', '0', 'uploads/laelbow-u1333.png', '')";
      */          
                   
                
                         $ins_user_query = "UPDATE tbl_users SET username='".$_SESSION['user_name']."',password='".$_SESSION['password']."' WHERE tbl_users.user_id = '1'";
                
                   
                /*
                $ins_user_query = "INSERT INTO tbl_users (user_id, username, password, email, unique_id, role_id, activated, banned, ban_reason, new_password_key, new_password_requested, password_id, new_email, new_email_key, last_ip, last_login, created, modified, online_status, permission, org_id) VALUES (NULL, 'admin','55677fc54be3b674770b697114ce0730300da0f6783202e2d17d7191ba68ec97cab4b61d3470f298d0ca2435111c29b8d5ad63058b725916336fdab9584829f4', '".$_SESSION['email_address']."', '', '1', '1', '0', '', NULL, NULL, '', '".$_SESSION['email_address']."', '49315fd6116d162eea47a98904e37b9a', '::1', '2017-04-12 19:28:42', '0000-00-00 00:00:00', '2017-04-12 19:28:42', '0', 'all', '1')";
                */
                
                $result = mysqli_query($db1, $ins_user_query) or die($db1->error);
               // $result_acc_user = mysqli_query($db1, $ins_user_acc_query ) or die($db1->error);
//die(0);
                //To insert admin user record end [CRM]


                return $ins_service_trial;
            } else {
//                return "DB Clone Error : ".$data['message'] = $clone_database;
                
            $error_msg = 'DB Clone Error : '.$clone_database;
            return $error_msg;
                
            }
        }
    }

    /*     * ********************************** get_free_trial End ************************************** */


    /*     * ********************************** clone_database_schema Start ************************************** */

    function clone_database_schema($new_db_name) {
        /*
          //This commented code is only for clonig db schema

          //*         * ******************* START CONFIGURATION ********************

          $DB_SRC_HOST = 'localhost';
          $DB_SRC_USER = 'root';
          $DB_SRC_PASS = '';
          $DB_SRC_NAME = 'rebelute_crm';
          $DB_DST_HOST = 'localhost';
          $DB_DST_USER = 'root';
          $DB_DST_PASS = '';
          $DB_DST_NAME = $new_db_name;
          //*         * ********************* GRAB OLD SCHEMA **********************
          $db1 = new mysqli($DB_SRC_HOST, $DB_SRC_USER, $DB_SRC_PASS) or die($db1->error);
          mysqli_select_db($db1, $DB_SRC_NAME) or die($db1->error);
          $result = mysqli_query($db1, "SHOW TABLES;") or die($db1->error);
          $buf = "set foreign_key_checks = 0;\n";
          $constraints = '';
          while ($row = mysqli_fetch_array($result)) {
          $result2 = mysqli_query($db1, "SHOW CREATE TABLE " . $row[0] . ";") or die($db1->error);
          $res = mysqli_fetch_array($result2);
          if (preg_match("/[ ]*CONSTRAINT[ ]+.*\n/", $res[1], $matches)) {
          $res[1] = preg_replace("/,\n[ ]*CONSTRAINT[ ]+.*\n/", "\n", $res[1]);
          $constraints .= "ALTER TABLE " . $row[0] . " ADD " . trim($matches[0]) . ";\n";
          }
          $buf .= $res[1] . ";\n";
          }
          $buf .= $constraints;
          $buf .= "set foreign_key_checks = 1";
          //*         * ************** CREATE NEW DB WITH OLD SCHEMA ***************
          $db2 = new mysqli($DB_DST_HOST, $DB_DST_USER, $DB_DST_PASS) or die($db2->error);
          $sql = 'CREATE DATABASE ' . $DB_DST_NAME;
          if (!mysqli_query($db2, $sql))
          die($db2->error);
          mysqli_select_db($db2, $DB_DST_NAME) or die($db2->error);
          $queries = explode(';', $buf);
          foreach ($queries as $query) {
          if (!mysqli_query($db2, $query))
          die($db2->error);
          }

          return true;
         */


        //************************************** Create copy of Db from sql file(import db)


        $filename = 'database_sql/crm_base.sql';
        $mysql_host = 'localhost';
        $mysql_username = 'root';
        $mysql_password = 'Fiberrails';
        $mysql_database = $new_db_name;

        $con = mysqli_connect($mysql_host, $mysql_username, $mysql_password) or die(mysqli_error($con));
        $sql = 'CREATE DATABASE ' . $mysql_database;
        $create_new_db = mysqli_query($con, $sql)  or die('Error : This organization name already used <br />' . mysqli_error($con) . '<br />');

// Connect to MySQL server
// mysqli_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysqli_error());
// Select database
        mysqli_select_db($con, $mysql_database) or die('Error selecting MySQL database: ' . mysqli_error($con));

// Temporary variable, used to store current query
        $templine = '';
// Read in entire file
        $lines = file($filename);
// Loop through each line
        foreach ($lines as $line) {
// Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;

// Add this line to the current segment
            $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                // Perform the query
                mysqli_query($con, $templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($con) . '<br /><br />');
                // Reset temp variable to empty
                $templine = '';
            }
        }
        return true;
        // echo "Tables imported successfully";
        //************************************** Create copy of Db from sql file(import db)
    }

    /*     * ********************************** clone_database_schema End ************************************** */
}

?>