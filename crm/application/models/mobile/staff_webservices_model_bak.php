<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class staff_webservices_model extends MY_Model
{

    public function getMenuListStaffModel($post)
    {
        $user_id = $post['user_id'];

        //Getting the list of menus from  tbl_user_role
        $sql = "SELECT tbl_user_role.*,tbl_menu.*
						FROM tbl_user_role
						INNER JOIN tbl_menu
						ON tbl_user_role.menu_id=tbl_menu.menu_id
						WHERE tbl_user_role.user_id=$user_id
						ORDER BY tbl_menu.menu_id";


        $query = $this->db->query($sql);
        $user_menu = $query->result_array();

        // Create a multidimensional array to conatin a list of items and parents
        $menu = array(
            'items' => array(),
            'parents' => array()
        );

        // Builds the array lists with data from the menu table
        foreach ($user_menu as $items) {
            // Creates entry into items array with current menu item id ie. $menu['items'][1]
            $menu['items'][$items['menu_id']] = $items;
            // Creates entry into parents array. Parents array contains a list of all items with children
            $menu['parents'][$items['parent']][] = $items['menu_id'];
        }


        // Now finally iterating throught the parents menu

        foreach ($menu['parents'] as $key => $value) {
            echo $key;
            echo "<br>";
        }

        die;

        //return $output = $this->buildMenu(0, $menu);
    }

    public function buildMenu($parent, $menu, $sub = NULL)
    {
        $html = "";
        if (isset($menu['parents'][$parent])) {
            if (!empty($sub)) {
                $html .= "<ul id=" . $sub . " class='nav sidebar-subnav collapse'><li class=\"sidebar-subnav-header\">" . lang($sub) . "</li>\n";
            } else {
                $html .= "<ul class='nav'>\n";
            }
            foreach ($menu['parents'][$parent] as $itemId) {
                $result = $this->active_menu_id($menu['items'][$itemId]['menu_id']);
                if ($result) {
                    $active = 'active';
                } else {
                    $active = '';
                }

                if (!isset($menu['parents'][$itemId])) { //if condition is false only view menu
                    $html .= "<li class='" . $active . "' >\n  <a title='" . lang($menu['items'][$itemId]['label']) . "' href='" . base_url() . $menu['items'][$itemId]['link'] . "'>\n <em class='" . $menu['items'][$itemId]['icon'] . "'></em><span>" . lang($menu['items'][$itemId]['label']) . "</span></a>\n</li> \n";
                }

                if (isset($menu['parents'][$itemId])) { //if condition is true show with submenu
                    $html .= "<li class='sub-menu " . $active . "'>\n  <a data-toggle='collapse' href='#" . $menu['items'][$itemId]['label'] . "'> <em class='" . $menu['items'][$itemId]['icon'] . "'></em><span>" . lang($menu['items'][$itemId]['label']) . "</span></a>\n";
                    $html .= self::buildMenu($itemId, $menu, $menu['items'][$itemId]['label']);
                    $html .= "</li> \n";
                }
            }
            $html .= "</ul> \n";
        }
        return $html;
    }

    public function active_menu_id($id)
    {
        $CI = &get_instance();
        $activeId = $CI->session->userdata('menu_active_id');

        if (!empty($activeId)) {
            foreach ($activeId as $v_activeId) {
                if ($id == $v_activeId) {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    public function getStaffTaskListsMOdel($post)
    {
        $user_id = $post['user_id'];


        // now fethcng the data for the user_error

        $this->db->select('task_id,project_id,task_name,due_date,task_status,task_progress,permission');
        $this->db->from('tbl_task');
        $this->db->where('permission LIKE', "%$user_id%");
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $row = $query->result();

        // NOw fething the users for the bugs assigned to 
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

                $row_data[] = array("task_id" => $data_row->task_id,
                    "task_name" => $data_row->task_name,
                    "due_date" => $data_row->due_date,
                    "task_status" => $data_row->task_status,
                    "task_progress" => $data_row->task_progress,
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

    public function getAllProjectsListMOdel()
    {
        $this->db->select('project_id,project_name');
        $this->db->from('tbl_project');
        $query = $this->db->get();
        $row = $query->result();

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row;
        return $result;
    }

    public function getAllBugListMOdel()
    {
        $this->db->select('bug_id,bug_title');
        $this->db->from('tbl_bug');
        $query = $this->db->get();
        $row = $query->result();

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row;
        return $result;
    }

    public function addNewTaskModel($post)
    {
        //echo "<pre>"; print_r($post);die;
        $taskname = addslashes($post['task_name']);
        $related_to = strtolower($post['related_to']);
        if ($related_to == "projects") {
            $project_id = $post['project_id'];
        }
        if ($related_to == "bugs") {
            $bug_id = $post['bug_id'];
        }

        $start_date_temp = $post['start_date'];
        $due_date_temp = $post['due_date'];

        $start_date_temp1 = explode("/", $start_date_temp);
        $start_date = $start_date_temp1[2] . "-" . $start_date_temp1[0] . "-" . $start_date_temp1[1];

        $due_date_temp1 = explode("/", $due_date_temp);
        $due_date = $due_date_temp1[2] . "-" . $due_date_temp1[0] . "-" . $due_date_temp1[1];


        $estimate_hour = $post['estimated_hour'];
        $progress = $post['progress'];
        $task_status1 = $post['task_status'];
        $description = addslashes($post['description']);
        $assigned_to = $post['assigned_to'];

        $created_by = $post['user_id'];
        $assigned_by = $post['name'];



        // Need to check whether the assigned to is json or not

        if (is_array(json_decode($assigned_to, true))) {
            $assigned_to = $assigned_to;
        } else {
            $assigned_to = "all";
        }

        if ($task_status1 == "Not Started") {
            $task_status = "not_started";
        } else if ($task_status1 == "In Progress") {
            $task_status = 'in_progress';
        } else if ($task_status1 == "Completed") {
            $task_status = 'completed';
        } else if ($task_status1 == "Deferred") {
            $task_status = 'deferred';
        } else {
            $task_status = "waiting_for_someone";
        }


        //  Now Saving the data in the task table

        if ($related_to == "projects") {
            $data = array("project_id" => $project_id,
                "task_name" => $taskname,
                "task_description" => $description,
                "task_start_date" => $start_date,
                "due_date" => $due_date,
                "task_status" => $task_status,
                "task_progress" => $progress,
                "task_hour" => $estimate_hour,
                "created_by" => $created_by,
                "permission" => $assigned_to
            );
        }
        if ($related_to == "bugs") {
            $data = array("bug_id" => $bug_id,
                "task_name" => $taskname,
                "task_description" => $description,
                "task_start_date" => $start_date,
                "task_status" => $task_status,
                "due_date" => $due_date,
                "task_progress" => $progress,
                "task_hour" => $estimate_hour,
                "created_by" => $created_by,
                "permission" => $assigned_to
            );
        }


        $this->db->insert('tbl_task', $data);
        //echo $this->db->last_query();die;
        $bug_id = $this->db->insert_id(); // this is the task id 
        //echo $this->db->last_query();die;

        if ($bug_id != "" || $bug_id != 0) {
            $result['status'] = true;
            $result['message'] = "Task Added Successfully";
            $result['data'] = $bug_id;

            // checking again for sending emails
            if (is_array(json_decode($assigned_to, true))) {

                $part = array_keys(json_decode($assigned_to, true));

                $user_ids = implode(",", $part);

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
                    $subject = 'New Task Mail Assigned';


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

    public function deleteTaskAttachmentModel($post)
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

    public function getAdminStaffListModel()
    {
        $this->db->select('a.role_id,b.user_id,b.fullname');
        $this->db->from('tbl_users as a');
        $this->db->join('tbl_account_details as b', 'a.user_id=b.user_id', 'inner');
        $this->db->where('a.role_id', 1);
        $this->db->or_where('a.role_id', 3);
        $query = $this->db->get();
        $row = $query->result();

        $final = array();

        // Creating the formatted  data to be sent in webservices
        foreach ($row as $data) {
            if ($data->role_id == 1) {
                $role = "Admin";
            } else {
                $role = "Staff";
            }
            $final[] = array("user_id" => $data->user_id,
                "role" => $role,
                "name" => $data->fullname
            );
        }// end foreach

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $final;

        return $result;
    }

    public function saveTaskAttachmentsModel($post, $width, $height, $filesize, $filename)
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
            "module" => "task",
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
        }



        return $result;
    }

    public function getTaskAttachmentListModel($post)
    {
        $task_id = $post['task_id'];


        // getting the task attchments details

        /*
          $sql = "Select a.fullname,b.title,b.task_attachment_id,b.description,SUBSTR(b.upload_time,1,10) as upload_time,c.files,c.size,c.image_width,c.image_height
          FROM tbl_account_details as a
          INNER JOIN tbl_task_attachment as b on a.user_id=b.user_id
          INNER JOIN tbl_task_uploaded_files as c on b.task_attachment_id=c.task_attachment_id
          WHERE b.task_id=$task_id
          ";
         */

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

    public function getRecentActivityTasksModel($post)
    {
        $task_id = $post['task_id'];

        // NOt getting the recent_activities

        $this->db->select('a.activity,a.value1,b.fullname,b.avatar');
        $this->db->from('tbl_activities as a');
        $this->db->join('tbl_account_details as b', 'a.user=b.user_id', 'inner');
        $this->db->where('a.module', 'tasks');
        $this->db->where('a.module_field_id', $task_id);
        $query = $this->db->get();
        $row = $query->result();


        foreach ($row as $temp_row) {

            $data[] = array("activity" => lang($temp_row->activity),
                "value1" => $temp_row->value1,
                "fullname" => $temp_row->fullname,
                "avatar" => $temp_row->avatar
            );
        }

        $result['status'] = true;
        $result['message'] = "Message Fetched Successfully";
        $result['data'] = $data;

        return $result;
    }

    public function createNewCampaignModel($post)
    {
        $campaign_name = addslashes($post['campaign_name']);
        $campaign_date = $post['campaign_date'];
        $user_id = $post['user_id'];

        // inserting the data in campaign_table

        $data = array("campaign_name" => $campaign_name,
            "campaign_date" => $campaign_date,
            "created_by" => $user_id
        );


        $this->db->insert('tbl_campaigns', $data);
        $campaign_id = $this->db->insert_id();

        if ($campaign_id != "") {
            $result['status'] = true;
            $result['message'] = "Campaing Saved Successfully";
            $result['data'] = $campaign_id;
        } else {
            $result['status'] = false;
            $result['message'] = "Campaing Not Saved";
            $result['data'] = $campaign_id;
        }

        return $result;
    }

    public function getCampaignListsUserModel($post)
    {
        $user_id = $post['user_id'];
        // First getting the table names where the data is stored for the user

        $sql = "SELECT b.table_name FROM tbl_users_table as a
			       INNER JOIN tbl_campaign_formats as b ON a.table_id=b.id
				   WHERE a.user_id=$user_id";
        $query1 = $this->db->query($sql);
        // Counting the number of rows 

        $count = $query1->num_rows();

        if ($count != 0) {
            $row_tables = $query1->result();

            // Now we need to loop the tables for the user data with campaign name

            $row_array = array(); // initialising the array where the camping ids will be stored

            foreach ($row_tables as $data_tables) {
                $table_name = $data_tables->table_name;
                $sql_data = "Select DISTINCT(campaign_id) FROM $table_name where user_id=$user_id ";
                $query_campaign = $this->db->query($sql_data);
                $count_campaign = $query_campaign->num_rows();

                if ($count_campaign != 0) {
                    $row_campaign = $query_campaign->row();

                    // Now storing the campign id in the array

                    $row_array[] = $row_campaign->campaign_id;
                }
            }

            $campaign_ids = implode(',', $row_array);

            if ($campaign_ids != "") {
                // Now getting the campaign name

                $sql_camp_name = "SELECT campaign_id,campaign_name,campaign_date from tbl_campaigns WHERE campaign_id IN($campaign_ids)";
                $query_final = $this->db->query($sql_camp_name);
                $row_final = $query_final->result();
            } else {
                $row_final = array("null");
            }

            // now creating the final data to be sent

            $result['status'] = true;
            $result['message'] = "Data Fetched Successfully";
            $result['data'] = $row_final;
        } else {
            $result['status'] = true;
            $result['message'] = "No Data Found";
            $result['data'] = array("null");
        }

        return $result;
    }

    public function getTableFormatListModel()
    {
        $sql = "SELECT id,table_name,SUBSTR(created_date,1,10) as created_date  FROM tbl_campaign_formats";
        $query = $this->db->query($sql);
        $row = $query->result();

        // Now formatting the data  to sent

        $res = array();

        foreach ($row as $data) {
            $table_name = str_replace("tbl_", "", $data->table_name);
            $table_name = str_replace("_", " ", $table_name);
            $table_name = ucwords($table_name);

            $res[] = array("id" => $data->id,
                "table_name" => $table_name,
                "created_date" => $data->created_date
            );
        }


        // creating the result

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $res;

        return $result;
    }

    public function getTableFormatDetailModel($post)
    {
        $table_name = $post['table_name'];

        // fething the coloumn names fom the tables

        $sql = "Select COLUMN_NAME as coloumns from information_schema.columns
			      WHERE table_name='$table_name' and COLUMN_NAME NOT IN('id','campaign_id','user_id','comments','leads_id') ";
        //echo $sql;die;	  
        $query = $this->db->query($sql);
        $row = $query->result();

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row;
        return $result;
    }

    public function addNewColoumnToTableModel($post)
    {
        $table_name = $post['table_name'];
        $coloumns = $post['coloumns'];

        // Looping in the array to save the fields

        $fields = array();

        foreach ($coloumns as $data) {
            $coloumn = strtolower(str_replace(' ', '_', preg_replace('/\s+/', ' ', trim($data))));
            $fields = array($coloumn => array('type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => TRUE,
                )
            );

            $this->dbforge->add_column($table_name, $fields);
        }



        $result['status'] = true;
        $result['message'] = "Coloumn Added Successfully";
        $result['data'] = true;

        return $result;
    }

    public function createNewFormatModel($post)
    {
        $user_id = $post['user_id'];
        $table_name = $post['table_name'];
        $table_name = strtolower(preg_replace('/\s/', ' ', $table_name));
        $table_name = str_replace(' ', '_', $table_name);
        $table_name = 'tbl_' . $table_name;

        $coloumns1 = $post['coloumns']; // this is coming comma seperated
        // Now converteing this comma separedted to array

        $coloumns = explode(",", $coloumns1);


        // first inserting the data in the tbl_campaign_formats table

        $campaign = array("user" => $user_id,
            "table_name" => $table_name,
        );

        $this->db->insert('tbl_campaign_formats', $campaign);

        //NOw creating the table and inerting the coloumns in the table

        $this->dbforge->add_key('id', TRUE); // Creating the Pimary key

        $is_created = $this->dbforge->create_table($table_name, TRUE); // Creating the New Table

        if ($is_created == true) {
            $fields_part = array();

            // hardcoded to ente these detials at the first position 
            $fields_part[] = array('campaign_id' => array('type' => 'BIGINT', 'constraint' => 22),
                'user_id' => array('type' => 'BIGINT', 'constraint' => 22)
            );
            $this->dbforge->add_column($table_name, $fields);

            // NOw here we come to the dynamic part of the looping

            foreach ($coloumns as $data) {
                $coloumn = strtolower(str_replace(' ', '_', preg_replace('/\s+/', ' ', trim($data))));
                $fields = array($coloumn => array('type' => 'VARCHAR',
                        'constraint' => '255',
                        'null' => TRUE,
                    )
                );

                $this->dbforge->add_column($table_name, $fields);
            }

            // End Of inserting the dynamic part of the coloumns

            $comments_part = array();

            // Now hardcode entring the comments and the leads id atr the bottom

            $comments_part = array('comments' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE),
                'leads_id' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE)
            );
            $this->dbforge->add_column($table_name, $comments_part);

            $result['status'] = true;
            $result['message'] = "Format Added Successfully";
            $result['data'] = $table_name;
        } else {
            $result['status'] = false;
            $result['message'] = "Table Not Created";
            $result['data'] = "";
        }
    }

    public function getAllCampaignsListModel()
    {

        $this->db->select('campaign_id,campaign_name,campaign_date');
        $this->db->from('tbl_campaigns');
        $query = $this->db->get();
        $row = $query->result();

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row;

        return $result;
    }

    public function getFormatListForCampaignModel($post)
    {
        $campaign_id = $post['campaign_id'];

        // Now getting the list of all the tables
        // to fetch whether the data for campign id id trhere or not
    }

    public function uploadCampaignDataModel($post, $filename)
    {
        $campaign_id = $post['campaign_id'];
        //Load excel library.

        if (true != empty($filename["campaign_file"]["name"])) {

            $file = $_FILES["campaign_file"]["tmp_name"];
            $valid = false;
            $types = array('Excel2007', 'Excel5');

            foreach ($types as $type) {

                $reader = PHPExcel_IOFactory::createReader($type);

                if ($reader->canRead($file)) {
                    $valid = true;
                }
            }
            if (true != empty($valid)) {
                try {

                    $objPHPExcel = PHPExcel_IOFactory::load($file);
                } catch (Exception $e) {

                    $result['status'] = false;
                    $result['message'] = "Error loading file :" . $e->getMessage();
                    return $result;
                }
                if (true != empty($filename['campaign_file']['name'])) {
                    $val = $this->uploadAllType('campaign_file');
                }
                //All data from excel

                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

                $format_Id = $_POST['format_type'];

                $table_name = $this->fetchTableNameById($format_Id);
                $data_format['formats'] = $this->fetchColumnNamesByTableName($table_name);

                unset($data_format['formats'][array_search('id', $data_format['formats'])], $data_format['formats'][array_search('campaign_id', $data_format['formats'])], $data_format['formats'][array_search('user_id', $data_format['formats'])], $data_format['formats'][array_search('leads_id', $data_format['formats'])]);

                $tableFieldsCount = count($data_format['formats']);

                if (true == is_array($sheetData) && true == isset($sheetData['1'])) {
                    $sheetData['1'] = array_filter($sheetData['1'], function($val) {
                        return !is_null($val);
                    });
                }
                $SheetColumnCount = count($sheetData['1']);

                if ($tableFieldsCount == $SheetColumnCount) {
                    $arr_formats = array();
                    $arr_formats = $data_format['formats'];

                    foreach ($sheetData[1] as $key => $row) {

                        $row = strtolower(str_replace('_', ' ', $row));
                        $sheetData[1][$key] = $row;
                    }

                    foreach ($data_format['formats'] as $key => $row) {

                        $row = strtolower(str_replace('_', ' ', $row));
                        $data_format['formats'][$key] = $row;
                    }

                    $result = array_diff_assoc(array_values($sheetData[1]), array_values($data_format['formats']));

                    if (true == empty($result)) {

                        $upload_data = array(
                            "format_id" => $format_Id,
                            "file_name" => $val['fileName'],
                            "file_path" => $val['path'],
                            "campaign_id" => $campaign_id
                        );

                        $this->db->insert('tbl_campaign_files', $upload_data);

                        foreach ($sheetData as $key => $row) {

                            $cnt = 1;

                            foreach ($row as $key1 => $row1) {

                                if ($cnt > $tableFieldsCount) {
                                    unset($sheetData[$key][$key1]);
                                }

                                $cnt++;
                            }
                        }

                        for ($x = 2; $x <= count($sheetData); $x++) {

                            $valid = 'false';
                            foreach ($sheetData[$x] as $key1 => $row1) {
                                if (false == empty($row1)) {
                                    $valid = 'false';
                                    break;
                                } else {
                                    $valid = 'true';
                                }
                            }


                            if ('false' == $valid) {

                                $data = array_combine(array_values($arr_formats), array_values($sheetData[$x]));

                                /* Now Setting the value to data uploaded to be 1 to give options to view the data */

                                $data['campaign_id'] = $campaign_id;

                                $this->db->insert($table_name, $data);
                            }
                        }

                        $result['status'] = true;
                        $result['message'] = "Campaign data uploaded Successfully";
                        return $result;
                    } else {
                        $result['status'] = false;
                        $result['message'] = "Sorry your uploaded file has invalid columns.";
                        return $result;
                    }
                } else {
                    $result['status'] = false;
                    $result['message'] = "Sorry your uploaded file column does not match with format column.";
                    return $result;
                }
            } else {
                $result['status'] = false;
                $result['message'] = "Sorry your uploaded file type not allowed ! please upload XLS/CSV File";
                return $result;
            }
        } else {
            $result['status'] = false;
            $result['message'] = "Sorry you have not selected any file. please upload XLS/CSV File ";
            return $result;
        }
    }

    public function fetchTableNameById($formatId)
    {
        $this->db->select('table_name');
        $this->db->from('tbl_campaign_formats');
        $this->db->where('id', (int) $formatId);
        $objDbResult = $this->db->get();

        return ( $objDbResult->num_rows() > 0 ) ? $objDbResult->row()->table_name : NULL;
    }

    public function fetchColumnNamesByTableName($table_name)
    {
        $arrColumnInfo = array();
        $objDbResult = $this->db->query("select COLUMN_NAME 
			from information_schema.columns 	where table_schema =  '" . $this->db->database . "' and table_name = '$table_name'");

        if (true == is_object($objDbResult)) {
            foreach ($objDbResult->result() as $row) {
                $arrColumnInfo[] = $row->COLUMN_NAME;
            }
        }
        return $arrColumnInfo;
    }

    // Upload all file types.
    function uploadAllType($field)
    {
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2024000';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field)) {
            $error = $this->upload->display_errors();
            $type = "error";
            $message = $error;
            set_message($type, $message);
            return FALSE;
            // uploading failed. $error will holds the errors.
        } else {
            $fdata = $this->upload->data();
            $file_data ['fileName'] = $fdata['file_name'];
            $file_data ['path'] = $config['upload_path'] . $fdata['file_name'];
            $file_data ['fullPath'] = $fdata['full_path'];
            $file_data ['ext'] = $fdata['file_ext'];
            $file_data ['size'] = $fdata['file_size'];
            $file_data ['is_image'] = $fdata['is_image'];
            $file_data ['image_width'] = $fdata['image_width'];
            $file_data ['image_height'] = $fdata['image_height'];
            return $file_data;
            // uploading successfull, now do your further actions
        }
    }

    public function getDataFormatsModel()
    {
        $this->db->select('id, table_name');
        $query = $this->db->get('tbl_campaign_formats');

        if ($query->num_rows() > 0) {
            $result['status'] = true;
            $result['message'] = "Formats fetched successfully.";
            $result['data'] = $query->result_array();
        } else {
            $result['status'] = false;
            $result['message'] = "No formats found.";
            $result['data'] = array('null');
        }

        return $result;
    }

    public function getFormatsByCampaignModel($post)
    {

        if (true == isset($post['campaign_id']) && false == empty($post['campaign_id'])) {
            $campaign_id = $post['campaign_id'];

            $objDbResult = $this->db->query("select cf.format_id,cmf.table_name
				from 
				tbl_campaign_files cf 
				join tbl_campaign_formats cmf ON ( cmf.id = cf.format_id )
				where cf.campaign_id = '" . $campaign_id . "'
				GROUP By cf.format_id,cf.campaign_id
				");

            if ($objDbResult->num_rows() > 0) {
                $result['status'] = true;
                $result['message'] = "List of format by campaign.";
                $result['data'] = $objDbResult->result_array();
            } else {
                $result['status'] = false;
                $result['message'] = "No formats found for given campaign.";
                $result['data'] = array('null');
            }
        } else {
            $result['status'] = false;
            $result['message'] = "Campaign Id Required.";
            $result['data'] = array('null');
        }
        return $result;
    }

    public function getFormatFieldsByFormatModel($post)
    {

        if (true == isset($post['format_id']) && false == empty($post['format_id'])) {
            $format_id = $post['format_id'];
            $formatTable = $this->fetchTableNameById($format_id);

            if (false == is_null($formatTable)) {
                $objDbResult = $this->db->query("select COLUMN_NAME 
				from information_schema.columns 
				where table_name = '$formatTable' and COLUMN_NAME NOT IN ('id', 'campaign_id', 'user_id', 'leads_id')");


                if ($objDbResult->num_rows() > 0) {
                    $result['status'] = true;
                    $result['message'] = "List of format fields of given formats.";
                    $result['data'] = $objDbResult->result_array();
                } else {
                    $result['status'] = false;
                    $result['message'] = "No formats fields found for given Format.";
                    $result['data'] = array('null');
                }
            } else {
                $result['status'] = false;
                $result['message'] = "No formats Found.";
                $result['data'] = array('null');
            }
        } else {
            $result['status'] = false;
            $result['message'] = "Format Id is required.";
            $result['data'] = array('null');
        }
        return $result;
    }

    function updateFormatFieldsModel($post)
    {

        if (true == isset($post['column_name']) && true == isset($post['format_id']) && true == isset($post['old_column_name'])) {

            if (false == empty($post['column_name']) && false == empty($post['format_id']) && false == empty($post['old_column_name'])) {

                $formatId = (int) $post['format_id'];
                $column = trim($post['column_name']);
                $column = preg_replace('/\s+/', ' ', $column);

                $columnName = strtolower(str_replace(' ', '_', $column));
                $old_column_name = $post['old_column_name'];

                if (false == $this->checkFieldExist($formatId, $columnName, $old_column_name)) {

                    $this->db->where("id", $formatId);
                    $query = $this->db->get('tbl_campaign_formats');
                    $tableName = ( $query->num_rows() > 0 ) ? $query->row()->table_name : NULL;

                    if (false == is_null($tableName)) {
                        $data = $this->edit_format_column($tableName, $old_column_name, $columnName);

                        if ($data == true) {
                            $result['status'] = true;
                            $result['message'] = "Format name updated successfully.";
                            $result['data'] = $formatId;
                        } else {
                            $result['status'] = false;
                            $result['message'] = "Failed to update format name.";
                            $result['data'] = array('null');
                        }
                    } else {
                        $result['status'] = false;
                        $result['message'] = "Format not found.";
                        $result['data'] = array('null');
                    }
                } else {
                    $result['status'] = false;
                    $result['message'] = "Field not found in format.";
                    $result['data'] = array('null');
                }
            } else {
                $result['status'] = false;
                $result['message'] = "Format Id & Format Field cannot be empty.";
                $result['data'] = array('null');
            }
        } else {
            $result['status'] = false;
            $result['message'] = "Format Id & Format Field is required.";
            $result['data'] = array('null');
        }
        return $result;
    }

    public function checkFieldExist($format_id, $column_name, $old_column)
    {

        $table_name = $this->fetchTableNameById($format_id);

        if (false == is_null($table_name)) {


            $objDbResult = $this->db->query("select COLUMN_NAME 
			from information_schema.columns 
			where table_name = '$table_name' and COLUMN_NAME = '$column_name' and COLUMN_NAME != '$old_column'");

            if ($objDbResult->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function edit_format_column($table_name, $old_column_name, $column)
    {
        $this->db->query("ALTER TABLE " . $this->db->database . ".$table_name CHANGE $old_column_name $column varchar (200)");
        return true;
    }

    public function deleteFormatFieldModel($post)
    {

        if (true == isset($post['format_id']) && true == isset($post['column_name'])) {

            if (false == empty($post['column_name']) && false == empty($post['format_id'])) {

                $formatId = (int) $post['format_id'];
                $column = $post['column_name'];

                $tableName = $this->fetchTableNameById($formatId);

                if (false == is_null($tableName)) {

                    $objDbResult = $this->db->query("select COLUMN_NAME 
					from information_schema.columns 
					where table_name = '$tableName' and COLUMN_NAME = '$column'");

                    if ($objDbResult->num_rows() > 0) {

                        $data = $this->delete_format_column($tableName, $column);

                        if ($data == true) {
                            $result['status'] = true;
                            $result['message'] = "Format deleted successfully.";
                            $result['data'] = $formatId;
                        } else {
                            $result['status'] = false;
                            $result['message'] = "Failed to delete format.";
                            $result['data'] = array('null');
                        }
                    } else {
                        $result['status'] = false;
                        $result['message'] = "Field not found in format";
                        $result['data'] = array('null');
                    }
                } else {

                    $result['status'] = false;
                    $result['message'] = "Format not found.";
                    $result['data'] = array('null');
                }
            } else {
                $result['status'] = false;
                $result['message'] = "Format Id & Format Field cannot be empty.";
                $result['data'] = array('null');
                return $result;
                die;
            }
        } else {

            $result['status'] = false;
            $result['message'] = "Format Id & Format Field is required.";
            $result['data'] = array('null');
            return $result;
        }
        return $result;
    }

    public function delete_format_column($table_name, $column)
    {
        $this->dbforge->drop_column($table_name, $column);
        return true;
    }

    public function getCampaignFormatDataModel($post)
    {

        if (true == isset($post['format_id']) && true == isset($post['campaign_id'])) {

            if (false == empty($post['format_id']) && false == empty($post['campaign_id'])) {

                $format_id = $post['format_id'];
                $campaign_id = $post['campaign_id'];

                $tableName = $this->fetchTableNameById($format_id);

                if (false == is_null($tableName)) {

                    $campaignData = $this->get_campaign_data_by_format_table($campaign_id, $tableName);

                    $columns_values = array();

                    if (true == is_array($campaignData) && false == empty($campaignData)) {

                        foreach ($campaignData as $indexKey => $campaign_data) {

                            foreach ($campaign_data as $columnKey => $values) {

                                if ('user' == $columnKey && empty($values)) {
                                    $values = 'U/A';
                                }

                                if (false == in_array($columnKey, array('campaign_id', 'user_id', 'leads_id'))) {
                                    $data['columns_values'][$indexKey][] = $values;
                                }
                            }
                        }
                        $result['status'] = true;
                        $data['draw'] = isset($_POST['draw']) ? $_POST['draw'] : '';
                        $data['recordsTotal'] = intval($this->count_all($campaign_id, $tableName));
                        $data['recordsFiltered'] = intval($this->count_filtered($campaign_id, $tableName));
                        $result['data'] = $data;
                        $result['message'] = "Data found.";
                    } else {
                        $result['status'] = false;
                        $result['message'] = "No data found.";
                        $result['data'] = array('null');
                    }
                } else {
                    $result['status'] = false;
                    $result['message'] = "Format not found.";
                    $result['data'] = array('null');
                }
            } else {
                $result['status'] = false;
                $result['message'] = "Campaign id & Format Id can not be empty.";
                $result['data'] = array('null');
            }
        } else {
            $result['status'] = false;
            $result['message'] = "Campaign id & Format Id is required.";
            $result['data'] = array('null');
        }
        return $result;
    }

    public function get_campaign_data_by_format_table($campaign_id, $table_name)
    {

        $arrTableColumns = $this->fetchColumnNamesByTableName($table_name);
        $column_order = $arrTableColumns;
        $order = array('id' => 'desc');

        $sql = "
			select 
				t.*,u.username as user
			from 
				$table_name as t 
				left join tbl_users u on ( t.user_id = u.user_id )
			where t.campaign_id = '" . $campaign_id . "'";

        $i = 0;

        foreach ($arrTableColumns as $item) { // loop column 
            if (true == isset($_POST['search']) && $_POST['search']['value']) { // if datatable send POST for search
                if ($i == 0) { // first loop
                    $search = $_POST['search']['value'];
                    $sql .= " AND ( t.$item LIKE '%$search%'";
                } else {
                    $search = $_POST['search']['value'];
                    $sql .= " OR t.$item LIKE '%$search%'";
                }

                if (count($arrTableColumns) - 1 == $i) { //last loop
                    $sql .=' )';
                }
            }
            $i++;
        }

        if (isset($_POST['order']) && !empty($_POST['order']['0']['column'])) { // here order processing
            $column = $column_order[$_POST['order']['0']['column']];
            $orderBy = $_POST['order']['0']['dir'];
            $sql .= " ORDER BY $column $orderBy ";
        } else if (isset($order)) {
            $sql .= " ORDER BY t.id asc";
        }

        if (isset($_POST['length']) && $_POST['length'] != -1) {
            $start = $_POST['start'];
            $length = $_POST['length'];
            $sql .= " LIMIT $start, $length";
        }
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function count_all($campaign_id, $table, $id = NULL)
    {
        $this->db->from($table);
        if (!is_null($id)) {
            $this->db->where('user_id', $id);
        }
        $this->db->where('campaign_id', $campaign_id);
        return $this->db->count_all_results();
    }

    public function count_all_allocated($campaign_id, $table, $id = NULL)
    {
        $this->db->from($table);
        if (!is_null($id)) {
            $this->db->where('user_id !=', $id);
        }
        $this->db->where('campaign_id', $campaign_id);
        return $this->db->count_all_results();
    }

    function count_filtered($campaign_id, $table_name)
    {
        $arrTableColumns = $this->fetchColumnNamesByTableName($table_name);
        $column_order = $arrTableColumns;
        $order = array('id' => 'desc');

        $sql = "
		select 
			t.*,u.username as user
		from 
			$table_name as t 
			left join tbl_users u on ( t.user_id = u.user_id )
		where t.campaign_id = '" . $campaign_id . "'";

        $i = 0;
        foreach ($arrTableColumns as $item) { // loop column 
            if (true == isset($_POST['search']) && $_POST['search']['value']) { // if datatable send POST for search
                if ($i == 0) { // first loop
                    $search = $_POST['search']['value'];
                    $sql .= " AND ( t.$item LIKE '%$search%'";
                } else {
                    $search = $_POST['search']['value'];
                    $sql .= " OR t.$item LIKE '%$search%'";
                }

                if (count($arrTableColumns) - 1 == $i) { //last loop
                    $sql .=' )';
                }
            }
            $i++;
        }

        if (isset($_POST['order']) && !empty($_POST['order']['0']['column'])) { // here order processing
            $column = $column_order[$_POST['order']['0']['column']];
            $orderBy = $_POST['order']['0']['dir'];
            $sql .= " ORDER BY $column $orderBy ";
        } else if (isset($order)) {
            $sql .= " ORDER BY t.id asc";
        }

        if (isset($_POST['length']) && $_POST['length'] != -1 && !empty($start)) {
            $start = $_POST['start'];
            $length = $_POST['length'];
            $sql .= " LIMIT $start, $length";
        }
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    /* webservices created by atul on 22-Sept-2016 */

    /**
     * Function to get all client list.
     * @return array
     */
    public function getAllClientModel()
    {
        $this->db->select('client_id,name');
        $this->db->from('tbl_client');
        $query = $this->db->get();
        $data = $query->result_array();
        $result['status'] = true;
        $result['message'] = "All clients";
        $result['data'] = $data;
        return $result;
    }

    /**
     * Function to get all tasks.
     * @return array
     */
    public function getAllTaskModel()
    {
        $this->db->select('*');
        $this->db->from('tbl_task');
        $query = $this->db->get();
        $data = $query->result_array();
        $result['status'] = true;
        $result['message'] = "Success";
        $result['data'] = $data;
        return $result;
    }

    /**
     * Function to get aproject details by id.
     * @return array
     */
    public function getProjectDetailsByIdModel($post)
    {
//        $this->db->select('project_name,start_date,end_date,demo_url,project_status,permission');
//        $this->db->from('tbl_project');
//        $this->db->where('project_id', $post['project_id']);
//        $query = $this->db->get();
//        $data = $query->result();
//
//        $part = array_keys(json_decode($data[0]['permission'], true));
//
//        $user_ids = implode(",", $part);
//        $sql = "SELECT `b`.`fullname` FROM (`tbl_users` as a) INNER JOIN `tbl_account_details` as b ON `a`.`user_id`=`b`.`user_id` WHERE `a`.`user_id` IN ($user_ids) ";
//        $query1 = $this->db->query($sql);
//        $row_part = $query1->result(); // these are the participants for  this project
//
//        $row_data[] = array("task_id" => $data[0]['project_name'],
//            "start_date" => $data[0]['start_date'],
//            "end_date" => $data[0]['end_date'],
//            "demo_url" => $data[0]['project_name'],
//            "project_status" => $data[0]['project_status'],
//            "participants" => $row_part
//        );
//        if (count($row_data) > 0) {
//            $result['status'] = true;
//            $result['message'] = "Success";
//            $result['data'] = $row_data;
//        } else {
//            $result['status'] = false;
//            $result['message'] = "Failed";
//            $result['data'] = array('null');
//        }
//        return $result;
        //$user_id = $post['user_id'];
        // now fethcng the data for the user_error

        $this->db->select('p.project_name,p.start_date,p.end_date,p.demo_url,p.project_status,p.permission,(select name from tbl_client where client_id=p.client_id) as client_name');
        $this->db->from('tbl_project as p');
        $this->db->where('p.project_id', $post['project_id']);
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $row = $query->result();

        // NOw fething the users for the bugs assigned to 
        if ($query->num_rows()) {
            foreach ($row as $data_row) {
                // checking if the participants are assigned

                if (is_array(json_decode($data_row->permission, true))) {
                    //echo "rererer"; die;
                    //decoding the json for participants

                    $part = array_keys(json_decode($data_row->permission, true));

                    $user_ids = implode(",", $part);

                    // Now getting the names of the users
                    $sql = "SELECT `b`.`fullname`,`b`.`avatar` FROM (`tbl_users` as a) INNER JOIN `tbl_account_details` as b ON `a`.`user_id`=`b`.`user_id` WHERE `a`.`user_id` IN ($user_ids) ";
                    $query1 = $this->db->query($sql);
                    $row_part = $query1->result(); // these are the participants for  this bug
                } else {
                    $row_part = array();
                }

                $row_data[] = array("project_name" => $data_row->project_name,
                    "start_date" => $data_row->start_date,
                    "end_date" => $data_row->end_date,
                    "demo_url" => $data_row->demo_url,
                    "client_name" => $data_row->client_name,
                    "project_status" => $data_row->project_status,
                    "participants" => $row_part
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

    /**
     * Function to create new project.
     * $param array $post
     * @return array
     */
    public function addNewProjectModel($post)
    {
        $insert_data = array('project_name' => $post['project_name'],
            'client_id' => $post['client_id'],
            'start_date' => $post['start_date'],
            'end_date' => $post['end_date'],
            'hourly_rate' => $post['hourly_rate'],
            'demo_url' => $post['demo_url'],
            'description' => $post['description'],
            'permission' => $post['permission'],
            'progress' => '0'
        );
        $insert = $this->db->insert('tbl_project', $insert_data);
        $project_id = $this->db->insert_id();

        $part = array_keys(json_decode($post['permission'], true));
        $user_ids = implode(",", $part); // these  sre the user_id of the users
        // fetching the Email id Of the users
        //print_r($user_ids);
        $sql = "SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids) ";
        //echo $sql;
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


            $message = '<p>Hi There,</p><p>A<strong> {PROJECT_NAME}</strong> has been assigned by <strong>{ASSIGNED_BY} </strong>to you.You can view this project by logging in to the portal using the link below:<br /><big><a href="{PROJECT_URL}"><strong>View Project</strong></a></big><br /><br />Best Regards<br />The {SITE_NAME} Team</p><p>&nbsp;</p>';
            $projectName = str_replace("{PROJECT_NAME}", $post['project_name'], $message);

            $assigned_by = str_replace("{ASSIGNED_BY}", ucfirst($post['assigned_by']), $message);
            $Link = str_replace("{PROJECT_URL}", base_url() . 'admin/project/project_details/' . $project_id, $assigned_by);
            //$comments = str_replace("{COMMENT_MESSAGE}", $mail_comment, $Link);
            $message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $Link);
            //echo $message; die;
            $this->load->library('email', $config);

            $this->email->from($company_email, $company_name);
            $this->email->to($email);

            $this->email->subject($subject);
            $this->email->message($message);
            $send = $this->email->send();
        }
        if ($insert) {
            $result['status'] = true;
            $result['message'] = "Project added Successfully";
        } else {
            $result['status'] = false;
            $result['message'] = "Unable to create project";
        }
        return $result;
    }

    /**
     * Function to add comments on the project.
     * $param array $post
     * @return array
     */
    public function addProjectCommentModel($post)
    {
        $insert_data = array('project_id' => $post['project_id'],
            'comment' => $post['comment'],
            'user_id' => $post['user_id'],
        );
        $insert = $this->db->insert('tbl_task_comment', $insert_data);

        $comment_by_name = "SELECT username FROM (`tbl_users`) WHERE user_id=" . $post['user_id'];
        $comment_by_name1 = $this->db->query($comment_by_name);
        $comment_by_name2 = $comment_by_name1->result_array();

        $perm_ids = "SELECT permission,project_name FROM (`tbl_project`) WHERE project_id=" . $post['project_id'];
        //echo $sql;
        $perm_ids1 = $this->db->query($perm_ids);
        $permission_id = $perm_ids1->result_array();

        $part = array_keys(json_decode($permission_id[0]['permission'], true));
        $user_ids = implode(",", $part); // these  sre the user_id of the users
        // fetching the Email id Of the users
        //print_r($user_ids);
        $sql = "SELECT email FROM (`tbl_users`) WHERE user_id IN ($user_ids)";
        //echo $sql;
        $query1 = $this->db->query($sql);
        $row_part = $query1->result(); // these are the participants for  this comment

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
            $message = '<p>Hi There,</p><p>A new comment has been posted by <strong>{POSTED_BY}</strong> to project <strong>{PROJECT_NAME}</strong>.</p>
                <p>You can view the comment using the link below:<br /><big><a href="{COMMENT_URL}"><strong>View Project</strong></a></big><br /><br />
                <em>{COMMENT_MESSAGE}</em><br /><br />Best Regards,<br />The {SITE_NAME} Team</p>';

            $postedby = str_replace("{POSTED_BY}", $comment_by_name2[0]['username'], $message);
            $projectName = str_replace("{PROJECT_NAME}", $permission_id[0]['project_name'], $postedby);
            $comment_msg = str_replace("{COMMENT_MESSAGE}", ucfirst($post['comment']), $projectName);
            $Link = str_replace("{COMMENT_URL}", base_url() . 'admin/project/project_details/' . $post['project_id'] . '#task_comments', $comment_msg);
            //$comments = str_replace("{COMMENT_MESSAGE}", $mail_comment, $Link);
            $message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $Link);
            //echo $message; die;
            $this->load->library('email', $config);

            $this->email->from($company_email, $company_name);
            $this->email->to($email);

            $this->email->subject($subject);
            $this->email->message($message);
            $send = $this->email->send();
        }
        if ($insert) {
            $result['status'] = true;
            $result['message'] = "Success";
        } else {
            $result['status'] = false;
            $result['message'] = "Failed";
        }
        return $result;
    }

    /**
     * Function to get comment by project id
     * @return array
     */
    public function commentByProjectIdModel($post)
    {
        $this->db->select('*');
        $this->db->from('tbl_task_comment');
        $this->db->where('project_id', $post['project_id']);
        $query = $this->db->get();
        $data = $query->result_array();
        if (count($data) > 0) {
            $result['status'] = true;
            $result['message'] = "Success";
            $result['data'] = $data;
        } else {
            $result['status'] = false;
            $result['message'] = "Failed";
            $result['data'] = array('null');
        }
        return $result;
    }

    /**
     * Function to get all projects by client
     * @return array
     */
    public function getAllProjectsByClientModel($post)
    {
        $user_id = $post['user_id'];

        // Now getting the project list which is assigned to the staff_webservices_model

        $this->db->select('a.project_id,a.project_name,a.progress,a.start_date,a.end_date,a.project_status,a.permission,b.name');
        $this->db->from('tbl_project as a');
        $this->db->join('tbl_client as b', 'a.client_id=b.client_id', 'inner');
        $this->db->where('permission LIKE', "%$user_id%");

        $query = $this->db->get();
        $row = $query->result();

        // NOw fething the users for the bugs assigned to 



        if ($query->num_rows()) {
            // Now looping the data fetched , to get the list of users per project
            $row_data = array();
            foreach ($row as $data_row) {

                // now formating the data to be sent inarray 

                $row_data[] = array("project_id" => $data_row->project_id,
                    "project_name" => $data_row->project_name,
                    "progress" => $data_row->progress,
                    "start_date" => $data_row->start_date,
                    "end_date" => $data_row->end_date,
                    "project_status" => $data_row->project_status,
                    "client_name" => $data_row->name,
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

    /**
     * Function to get bug list of staff
     * @return array
     */
    public function bugListStaffModel($post)
    {

        $user_id = $post['user_id'];

        $this->db->select('a.bug_id,a.bug_title,a.bug_status,a.priority,a.reporter,a.permission,b.fullname,b.avatar');
        $this->db->from('tbl_bug as a');
        $this->db->join('tbl_account_details as b', 'a.reporter=b.user_id', 'inner');
        $this->db->where('a.permission LIKE', "%$user_id%");
        $this->db->order_by('a.bug_id', 'DESC');
        $query = $this->db->get();



        if ($query->num_rows()) {
            $row = $query->result();
            foreach ($row as $data_row) {
                // checking if the participants are assigned

                if (is_array(json_decode($data_row->permission, true))) {
                    //echo "rererer"; die;
                    //decoding the json for participants

                    $part = array_keys(json_decode($data_row->permission, true));

                    $user_ids = implode(",", $part);

                    // Now getting the names of the users
                    $sql = "SELECT b.fullname,b.avatar FROM (`tbl_users` as a) INNER JOIN `tbl_account_details` as b ON `a`.`user_id`=`b`.`user_id` WHERE `a`.`user_id` IN ($user_ids) ";
                    $query1 = $this->db->query($sql);
                    $row_part = $query1->result(); // these are the participants for  this bug
                } else {
                    $row_part = array();
                }

                $row_data[] = array("bug_id" => $data_row->bug_id,
                    "bug_title" => $data_row->bug_title,
                    "bug_status" => $data_row->bug_status,
                    "priority" => $data_row->priority,
                    "reporter" => $data_row->fullname,
                    "assigned_to" => $row_part
                );
            }//End For Each
        } else {
            $row_data = array(null);
        }

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row_data;
        return $result;
    }

    /**
     * Function to create New Bug For Project
     * @return array
     */
    public function createNewBugStaffModel($post)
    {

        $project_id = $post['project_id'];
        $bug_title = $post['bug_title'];
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
        $result['message'] = "Data Saved Successfully";
        $result['data'] = $bug_id;
        return $result;
    }

    /**
     * Function to Get the list of TImesheets
     * @return array
     */
    public function getTimesheetProjectModel($post)
    {

        $project_id = $post['project_id'];

        $this->db->select('a.start_time,a.end_time,b.project_name,c.fullname,c.avatar');
        $this->db->from('tbl_tasks_timer as a');
        $this->db->join('tbl_project as b', 'a.project_id=b.project_id', 'inner');
        $this->db->join('tbl_account_details as c', 'c.user_id=a.user_id', 'inner');
        $this->db->where('a.project_id', $project_id);
        $query = $this->db->get();

        if ($query->num_rows()) {
            $row = $query->result();
            $row_data = array();
            foreach ($row as $data) {

                // calculating the time difference

                $start_time = $data->start_time;
                $end_time = $data->end_time;
                $total_time = $end_time - $start_time;

                /* Start Time Calculation */
                $init = $total_time;
                $hours = floor($init / 3600);
                $minutes = floor(($init / 60) % 60);
                $seconds = $init % 60;

                /*  End Of time Calculation */

                $formatted_time = $hours . ":" . $minutes . ":" . $seconds;

                $row_data [] = array("fullname" => $data->fullname,
                    "avatar" => $data->avatar,
                    "start_time" => $data->start_time,
                    "end_time" => $data->end_time,
                    "project_name" => $data->project_name,
                    "time_spent" => $formatted_time
                );
            }//End Foreach
        } else {
            $row_data = array(null);
        }

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row_data;
        return $result;
    }

    public function saveTimesheetManualEntryModel($post)
    {
        $start_time = strtotime($post['start_date'] . ' ' . $post['start_time']);
        $end_time = strtotime($post['end_date'] . ' ' . $post['end_time']);
        
        $reason = $post['reason'];
        $project_id = $post['project_id'];
        $user_id = $post['user_id'];

        $insert_data = array('project_id' => $project_id,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'reason' => $reason,
            'task_id'=>'0',
            'user_id' => $user_id);
        //print_r($insert_data);
        $insert = $this->db->insert('tbl_tasks_timer', $insert_data);
        $insert1 = $this->db->insert_id();
        if ($insert1 !='') {
            $result['status'] = true;
            $result['message'] = "Data Saved Successfully";
            return $result;
        }else{
            $result['status'] = false;
            $result['message'] = "Unable to save data";
            return $result;
        }
    }

    public function saveProjectAttachmentsModel($post, $width, $height, $filesize, $filename)
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


        // inserting the data in the tbl_activities

        $data_activity = array("user" => $user_id,
            "module" => "task",
            "module_field_id" => $project_id,
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

            $this->db->select('project_name,permission');
            $this->db->from('tbl_project');
            $this->db->where('project_id', $project_id);
            $query_bug = $this->db->get();
            $row_bug = $query_bug->row();
            $project_name = $row_bug->project_name; // this the bug title


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


                    $message = '<p>Hi There,</p><p>A new file has been uploaded by <strong>{UPLOADED_BY} </strong>to Project <strong>{PROJECT_NAME}</strong>.<br />You can view the Task&nbsp;using the link below:</p><p><br /><big><a href="{TASK_URL}"><strong>View Task</strong></a></big><br /><br />Best Regards,<br />The {SITE_NAME} Team</p>';
                    $pr_name = str_replace("{PROJECT_NAME}", $project_name, $message);
                    $assigned_by = str_replace("{UPLOADED_BY}", ucfirst($uploaded_by), $pr_name);
                    $Link = str_replace("{TASK_URL}", base_url() . 'admin/tasks/view_task_details/' . $project_id . '/' . '3', $assigned_by);
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
        }



        return $result;
    }

    public function ProjectAttachmentListModel($post)
    {
        $project_id = $post['project_id'];
        $this->db->select('ta.title,ta.description,ta.upload_time,tu.file_name,tu.files,(select username from tbl_users where user_id=ta.user_id) as uploaded_by');
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
                "uploaded_by" => $data->uploaded_by
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
    
    /**
     * Function to get bug list of project
     * @return array
     */
    public function bugListByProjectModel($post)
    {

        $project_id = $post['project_id'];

        $this->db->select('a.bug_id,a.bug_title,a.bug_status,a.priority,a.reporter,a.permission,b.fullname,b.avatar');
        $this->db->from('tbl_bug as a');
        $this->db->join('tbl_account_details as b', 'a.reporter=b.user_id', 'inner');
        $this->db->where('project_id', "$project_id");
        $this->db->order_by('a.project_id', 'DESC');
        $query = $this->db->get();



        if ($query->num_rows()) {
            $row = $query->result();
            foreach ($row as $data_row) {
                // checking if the participants are assigned

                if (is_array(json_decode($data_row->permission, true))) {
                    //echo "rererer"; die;
                    //decoding the json for participants

                    $part = array_keys(json_decode($data_row->permission, true));

                    $user_ids = implode(",", $part);

                    // Now getting the names of the users
                    $sql = "SELECT b.fullname,b.avatar FROM (`tbl_users` as a) INNER JOIN `tbl_account_details` as b ON `a`.`user_id`=`b`.`user_id` WHERE `a`.`user_id` IN ($user_ids) ";
                    $query1 = $this->db->query($sql);
                    $row_part = $query1->result(); // these are the participants for  this bug
                } else {
                    $row_part = array();
                }

                $row_data[] = array("bug_id" => $data_row->bug_id,
                    "bug_title" => $data_row->bug_title,
                    "bug_status" => $data_row->bug_status,
                    "priority" => $data_row->priority,
                    "reporter" => $data_row->fullname,
                    "assigned_to" => $row_part
                );
            }//End For Each
        } else {
            $row_data = array(null);
        }

        $result['status'] = true;
        $result['message'] = "Data Fetched Successfully";
        $result['data'] = $row_data;
        return $result;
    }

}

//End Of class
?>