<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('items_model');
        $this->load->model('invoice_model');

        $this->load->helper('ckeditor');
        $this->data['ckeditor'] = array(
            'id' => 'ck_editor',
            'path' => 'asset/js/ckeditor',
            'config' => array(
                'toolbar' => "Full",
                'width' => "99.8%",
                'height' => "400px"
            )
        );
    }

    public function index($id = NULL)
    {
        $data['title'] = lang('all_project');
        // get permission user by menu id
        $data['assign_user'] = $this->items_model->allowad_user('57');

        if (!empty($id)) {
            $data['active'] = 2;
            $can_edit = $this->items_model->can_action('tbl_project', 'edit', array('project_id' => $id));
            if (!empty($can_edit)) {
                //Added by ranjit 11-4-2017
                $data['project_info'] = $this->items_model->check_by(array('project_id' => $id), 'tbl_project');
                
//                $data['project_info'] = $this->items_model->get_where(array('project_id' => $id,'org_id'=>$this->session->userdata('org_id')), 'tbl_project');
                
            }
        } else {
            $data['active'] = 1;
        }
        $data['all_project'] = $this->items_model->get_permission('tbl_project');
        
       
        $data['subview'] = $this->load->view('admin/project/all_project', $data, TRUE);
        $this->load->view('admin/_layout_main', $data); //page load
    }

    public function import()
    {
        $data['title'] = lang('import') . ' ' . lang('project');
        $data['assign_user'] = $this->items_model->allowad_user('57');
        $data['subview'] = $this->load->view('admin/project/import_project', $data, TRUE);
        $this->load->view('admin/_layout_main', $data); //page load
    }

    public function save_imported()
    {
        //load the excel library
        $this->load->library('excel');
        ob_start();
        $file = $_FILES["upload_file"]["tmp_name"];
        $valid = false;
        $types = array('Excel2007', 'Excel5');
        foreach ($types as $type) {
            $reader = PHPExcel_IOFactory::createReader($type);
            if ($reader->canRead($file)) {
                $valid = true;
            }
        }
        if (!empty($valid)) {
            try {
                $objPHPExcel = PHPExcel_IOFactory::load($file);
            } catch (Exception $e) {
                die("Error loading file :" . $e->getMessage());
            }
            //All data from excel
            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

            for ($x = 2; $x <= count($sheetData); $x++) {
                // **********************
                // Save Into tasks table
                // **********************

                $data = $this->items_model->array_from_post(array('client_id'));

                $data['project_name'] = trim($sheetData[$x]["A"]);
                $data['progress'] = trim($sheetData[$x]["B"]);
                $data['start_date'] = date('Y-m-d', strtotime($sheetData[$x]["C"]));
                $data['end_date'] = date('Y-m-d', strtotime($sheetData[$x]["D"]));
                $data['project_cost'] = trim($sheetData[$x]["E"]);
                $data['demo_url'] = trim($sheetData[$x]["F"]);
                $data['description'] = trim($sheetData[$x]["G"]);

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
                }
                $this->items_model->_table_name = 'tbl_project';
                $this->items_model->_primary_key = 'project_id';
                $id = $this->items_model->save($data);
            }

            //save data into table.

            $action = 'activity_save_project';
            $msg = lang('save_project');

            // save into activities
            $activity = array(
                'user' => $this->session->userdata('user_id'),
                'module' => 'project',
                'module_field_id' => $id,
                'activity' => $action,
                'icon' => 'fa-circle-o',
                'value1' => $data['project_name']
            );
            $this->items_model->_table_name = 'tbl_activities';
            $this->items_model->_primary_key = 'activities_id';
            $this->items_model->save($activity);

            $type = "success";
            $message = $msg;

        } else {
            $type = 'error';
            $message = "Sorry your uploaded file type not allowed ! please upload XLS/CSV File ";
        }
        set_message($type, $message);
        redirect($_SERVER['HTTP_REFERER']);

    }

    public function saved_project($id = NULL)
    {
        $this->items_model->_table_name = 'tbl_project';
        $this->items_model->_primary_key = 'project_id';

        $data = $this->items_model->array_from_post(array('project_name', 'client_id', 'progress', 'start_date', 'end_date', 'project_cost', 'demo_url', 'description', 'hourly_rate'));

        $permission = $this->input->post('permission', true);
        if (!empty($permission)) {
            if ($permission == 'everyone') {
                $assigned = 'all';
                $assigned_to['assigned_to'] = $this->items_model->allowad_user_id('57');
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
        if (empty($id)) {
            $data['project_status'] = 'started';
        } else {
            $data['project_status'] = $this->input->post('project_status', TRUE);
        }
        if ($this->input->post('fixed_rate', TRUE) == 'on') {
            $data['fixed_rate'] = 'Yes';
        } else {
            $data['fixed_rate'] = 'No';
        }
        if ($this->input->post('with_tasks', TRUE) == 'on') {
            $data['with_tasks'] = 'yes';
        } else {
            $data['with_tasks'] = 'no';
        }
        $return_id = $this->items_model->save($data, $id);

        if ($assigned == 'all') {
            $assigned_to['assigned_to'] = $this->items_model->allowad_user_id('57');
        }
        if (!empty($id)) {
            $id = $id;
            $action = 'activity_update_project';
            $msg = lang('update_project');
        } else {
            $id = $return_id;
            $action = 'activity_save_project';
            $msg = lang('save_project');
            $this->send_project_notify_client($return_id);
            $this->send_project_notify_assign_user($return_id, $assigned_to['assigned_to']);
        }

        save_custom_field(4, $id);

        $activity = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'project',
            'module_field_id' => $id,
            'activity' => $action,
            'icon' => 'fa-circle-o',
            'value1' => $data['project_name']
        );
        $this->items_model->_table_name = 'tbl_activities';
        $this->items_model->_primary_key = 'activities_id';
        $this->items_model->save($activity);
        // messages for user
        $type = "success";
        if ($this->input->post('progress') == '100') {
            $this->send_project_notify_client($id, TRUE);
        }
        $message = $msg;
        set_message($type, $message);
        redirect('admin/project');
    }

    public function send_project_notify_assign_user($project_id, $users)
    {

        $email_template = $this->items_model->check_by(array('email_group' => 'assigned_project'), 'tbl_email_templates');
        $project_info = $this->items_model->check_by(array('project_id' => $project_id), 'tbl_project');
        $message = $email_template->template_body;

        $subject = $email_template->subject;

        $project_name = str_replace("{PROJECT_NAME}", $project_info->project_name, $message);

        $assigned_by = str_replace("{ASSIGNED_BY}", ucfirst($this->session->userdata('name')), $project_name);
        $Link = str_replace("{PROJECT_LINK}", base_url() . 'admin/project/project_details/' . $project_id, $assigned_by);
        $message = str_replace("{SITE_NAME}", config_item('company_name'), $Link);

        $data['message'] = $message;
        $message = $this->load->view('email_template', $data, TRUE);

        $params['subject'] = $subject;
        $params['message'] = $message;
        $params['resourceed_file'] = '';

        foreach ($users as $v_user) {
            $login_info = $this->items_model->check_by(array('user_id' => $v_user), 'tbl_users');
            $params['recipient'] = $login_info->email;
            $this->items_model->send_email($params);
        }
    }

    public function send_project_notify_client($project_id, $complete = NULL)
    {
        if (!empty($complete)) {
            $email_template = $this->items_model->check_by(array('email_group' => 'complete_projects'), 'tbl_email_templates');
        } else {
            $email_template = $this->items_model->check_by(array('email_group' => 'client_notification'), 'tbl_email_templates');
        }
        $project_info = $this->items_model->check_by(array('project_id' => $project_id), 'tbl_project');
        $client_info = $this->items_model->check_by(array('client_id' => $project_info->client_id), 'tbl_client');
        $message = $email_template->template_body;

        $subject = $email_template->subject;

        $clientName = str_replace("{CLIENT_NAME}", $client_info->name, $message);
        $project_name = str_replace("{PROJECT_NAME}", $project_info->project_name, $clientName);

        $Link = str_replace("{PROJECT_LINK}", base_url() . 'admin/project/project_details/' . $project_id, $project_name);
        $message = str_replace("{SITE_NAME}", config_item('company_name'), $Link);

        $data['message'] = $message;
        $message = $this->load->view('email_template', $data, TRUE);

        $params['subject'] = $subject;
        $params['message'] = $message;
        $params['resourceed_file'] = '';

        $params['recipient'] = $client_info->email;
        $this->items_model->send_email($params);
    }

    public function clone_project($id)
    {

        $this->items_model->_table_name = "tbl_project"; //table name
        $this->items_model->_order_by = "project_id";
        $project_info = $this->items_model->get_by(array('project_id' => $id), TRUE);

        $new_project = array(
            'project_name' => $project_info->project_name,
            'client_id' => $project_info->client_id,
            'progress' => $project_info->progress,
            'start_date' => $project_info->start_date,
            'end_date' => $project_info->end_date,
            'project_cost' => $project_info->project_cost,
            'demo_url' => $project_info->demo_url,
            'description' => $project_info->description,
            'permission' => $project_info->permission,
            'project_status' => $project_info->project_status,
        );

        $this->items_model->_table_name = "tbl_project"; //table name
        $this->items_model->_primary_key = "project_id";
        $new_project_id = $this->items_model->save($new_project);

        //get milestones info by project id
        $this->items_model->_table_name = "tbl_milestones"; //table name
        $this->items_model->_order_by = "project_id";
        $milestones_info = $this->items_model->get_by(array('project_id' => $id), FALSE);

        if (!empty($milestones_info)) {
            foreach ($milestones_info as $v_milestone) {
                $milestone = array(
                    'milestone_name' => $v_milestone->milestone_name,
                    'description' => $v_milestone->description,
                    'project_id' => $new_project_id,
                    'user_id' => $v_milestone->user_id,
                    'start_date' => $v_milestone->start_date,
                    'end_date' => $v_milestone->end_date
                );
                $this->items_model->_table_name = "tbl_milestones"; //table name
                $this->items_model->_primary_key = "milestones_id";
                $this->items_model->save($milestone);
            }
        }
        //get tasks info by project id
        $this->items_model->_table_name = "tbl_task"; //table name
        $this->items_model->_order_by = "project_id";
        $takse_info = $this->items_model->get_by(array('project_id' => $id), FALSE);
        if (!empty($takse_info)) {
            foreach ($takse_info as $v_task) {
                $task = array(
                    'task_name' => $v_task->task_name,
                    'project_id' => $new_project_id,
                    'milestones_id' => $v_task->milestones_id,
                    'permission' => $v_task->permission,
                    'task_description' => $v_task->task_description,
                    'task_start_date' => $v_task->task_start_date,
                    'due_date' => $v_task->due_date,
                    'task_created_date' => $v_task->task_created_date,
                    'task_status' => $v_task->task_status,
                    'task_progress' => $v_task->task_progress,
                    'task_hour' => $v_task->task_hour,
                    'tasks_notes' => $v_task->tasks_notes,
                    'timer_status' => $v_task->timer_status,
                    'client_visible' => $v_task->client_visible,
                    'timer_started_by' => $v_task->timer_started_by,
                    'start_time' => $v_task->start_time,
                    'logged_time' => $v_task->logged_time,
                    'created_by' => $v_task->created_by
                );
                $this->items_model->_table_name = "tbl_task"; //table name
                $this->items_model->_primary_key = "task_id";
                $this->items_model->save($task);
            }
        }
        // save into activities
        $activities = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'project',
            'module_field_id' => $id,
            'activity' => lang('activity_copied_project'),
            'icon' => 'fa-copy',
            'value1' => $project_info->project_name,
        );
        // Update into tbl_project
        $this->items_model->_table_name = "tbl_activities"; //table name
        $this->items_model->_primary_key = "activities_id";
        $this->items_model->save($activities);

        // messages for user
        $type = "success";
        $message = lang('copied_project');
        set_message($type, $message);
        redirect('admin/project');
    }

    public function invoice($id)
    {
        if (config_item('increment_invoice_number') == 'FALSE') {
            $this->load->helper('string');
            $reference_no = config_item('invoice_prefix') . ' ' . random_string('nozero', 6);
        } else {
            $reference_no = config_item('invoice_prefix') . ' ' . $this->items_model->generate_invoice_number();
        }

        $this->items_model->_table_name = "tbl_project"; //table name
        $this->items_model->_order_by = "project_id";
        $project_info = $this->items_model->get_by(array('project_id' => $id), TRUE);

        $currency = $this->items_model->client_currency_sambol($project_info->client_id);
        if (!empty($currency->code)) {
            $curr = $currency->code;
        } else {
            $curr = config_item('default_currency');
        }
        // save into invoice table
        $new_invoice = array(
            'reference_no' => $reference_no,
            'client_id' => $project_info->client_id,
            'currency' => $curr,
            'due_date' => $project_info->end_date,
        );
        $this->items_model->_table_name = "tbl_invoices"; //table name
        $this->items_model->_primary_key = "invoices_id";
        $new_invoice_id = $this->items_model->save($new_invoice);

        $items = array(
            'invoices_id' => $new_invoice_id,
            'item_name' => $project_info->project_name,
            'item_desc' => $project_info->description,
            'unit_cost' => $project_info->project_cost,
            'quantity' => 1,
            'total_cost' => $project_info->project_cost,
        );
        $this->items_model->_table_name = "tbl_items"; //table name
        $this->items_model->_primary_key = "items_id";
        $this->items_model->save($items);

        // save into activities
        $activities = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'invoice',
            'module_field_id' => $new_invoice_id,
            'activity' => lang('activity_new_invoice_form_project'),
            'icon' => 'fa-copy',
            'value1' => $reference_no,
        );
        // Update into tbl_project
        $this->items_model->_table_name = "tbl_activities"; //table name
        $this->items_model->_primary_key = "activities_id";
        $this->items_model->save($activities);

        // messages for user
        $type = "success";
        $message = lang('invoice_created');
        set_message($type, $message);
        redirect('admin/invoice/manage_invoice/invoice_details/' . $new_invoice_id);
    }

    public function project_details($id, $active = NULL, $op_id = NULL)
    {
        $data['title'] = lang('project_details');
        $data['page_header'] = lang('task_management');
        //get all task information
        $data['project_details'] = $this->items_model->check_by(array('project_id' => $id), 'tbl_project');

        $this->items_model->_table_name = "tbl_task_attachment"; //table name
        $this->items_model->_order_by = "project_id";
        $data['files_info'] = $this->items_model->get_by(array('project_id' => $id), FALSE);

        if (!empty($data['files_info'])) {
            foreach ($data['files_info'] as $key => $v_files) {
                $this->items_model->_table_name = "tbl_task_uploaded_files"; //table name
                $this->items_model->_order_by = "task_attachment_id";
                $data['project_files_info'][$key] = $this->items_model->get_by(array('task_attachment_id' => $v_files->task_attachment_id), FALSE);
            }
        }
        if ($active == 2) {
            $data['active'] = 2;
            $data['miles_active'] = 1;
            $data['task_active'] = 1;
            $data['bugs_active'] = 1;
            $data['time_active'] = 1;
        } elseif ($active == 3) {
            $data['active'] = 3;
            $data['miles_active'] = 1;
            $data['task_active'] = 1;
            $data['bugs_active'] = 1;
            $data['time_active'] = 1;
        } elseif ($active == 4) {
            $data['active'] = 4;
            $data['miles_active'] = 1;
            $data['task_active'] = 1;
            $data['bugs_active'] = 1;
            $data['time_active'] = 1;
        } elseif ($active == 5) {
            $data['active'] = 5;
            $data['miles_active'] = 1;
            $data['task_active'] = 1;
            $data['bugs_active'] = 1;
            $data['time_active'] = 1;
        } elseif ($active == 'milestone') {
            $data['active'] = 5;
            $data['miles_active'] = 2;
            $data['task_active'] = 1;
            $data['bugs_active'] = 1;
            $data['time_active'] = 1;
            $data['milestones_info'] = $this->items_model->check_by(array('milestones_id' => $op_id), 'tbl_milestones');
        } elseif ($active == 6) {
            $data['active'] = 6;
            $data['miles_active'] = 1;
            $data['task_active'] = 1;
            $data['bugs_active'] = 1;
            $data['time_active'] = 1;
        } elseif ($active == 7) {
            $data['active'] = 7;
            $data['miles_active'] = 1;
            $data['task_active'] = 1;
            $data['bugs_active'] = 1;
            if (!empty($op_id)) {
                $data['time_active'] = 2;
                $data['project_timer_info'] = $this->items_model->check_by(array('tasks_timer_id' => $op_id), 'tbl_tasks_timer');
            } else {
                $data['time_active'] = 1;
            }
        } elseif ($active == 8) {
            $data['active'] = 8;
            $data['miles_active'] = 1;
            $data['task_active'] = 1;
            $data['bugs_active'] = 1;
            $data['time_active'] = 1;
        } else {
            $data['active'] = 1;
            $data['miles_active'] = 1;
            $data['task_active'] = 1;
            $data['bugs_active'] = 1;
            $data['time_active'] = 1;
        }

        $data['subview'] = $this->load->view('admin/project/project_details', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }

    public function update_users($id)
    {
        // get all assign_user
        $this->items_model->_table_name = 'tbl_users';
        $this->items_model->_order_by = 'user_id';
        $data['assign_user'] = $this->items_model->get_by(array('role_id !=' => '2'), FALSE);

        $data['project_info'] = $this->items_model->check_by(array('project_id' => $id), 'tbl_project');
        $data['modal_subview'] = $this->load->view('admin/project/_modal_users', $data, FALSE);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function update_member($id)
    {
        $project_info = $this->items_model->check_by(array('project_id' => $id), 'tbl_project');

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
        if ($assigned == 'all') {
            $assigned_to['assigned_to'] = $this->items_model->allowad_user_id('57');
        }
//save data into table.
        $this->items_model->_table_name = "tbl_project"; // table name
        $this->items_model->_primary_key = "project_id"; // $id
        $this->items_model->save($data, $id);

        $msg = lang('update_project');
        $activity = 'activity_update_project';
        if (!empty($assigned_to['assigned_to'])) {
            $this->send_project_notify_assign_user($id, $assigned_to['assigned_to']);
        }

// save into activities
        $activities = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'project',
            'module_field_id' => $id,
            'activity' => $activity,
            'icon' => 'fa-ticket',
            'value1' => $project_info->project_name,
        );
// Update into tbl_project
        $this->items_model->_table_name = "tbl_activities"; //table name
        $this->items_model->_primary_key = "activities_id";
        $this->items_model->save($activities);

        $type = "success";
        $message = $msg;
        set_message($type, $message);
        redirect($_SERVER['HTTP_REFERER']);

    }

    public function change_status($project_id, $status)
    {

        $data['project_status'] = $status;
        $this->items_model->_table_name = 'tbl_project';
        $this->items_model->_primary_key = 'project_id';
        $this->items_model->save($data, $project_id);
        // messages for user
        $type = "success";
        $message = lang('change_status');
        set_message($type, $message);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function save_comments()
    {

        $data['project_id'] = $this->input->post('project_id', TRUE);
        $data['comment'] = $this->input->post('comment', TRUE);
        $data['user_id'] = $this->session->userdata('user_id');

        //save data into table.
        $this->items_model->_table_name = "tbl_task_comment"; // table name
        $this->items_model->_primary_key = "task_comment_id"; // $id
        $comment_id = $this->items_model->save($data);

        // save into activities
        $activities = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'project',
            'module_field_id' => $data['project_id'],
            'activity' => 'activity_new_project_comment',
            'icon' => 'fa-ticket',
            'value1' => $data['comment'],
        );
        // Update into tbl_project
        $this->items_model->_table_name = "tbl_activities"; //table name
        $this->items_model->_primary_key = "activities_id";
        $this->items_model->save($activities);

// send notification
        $this->notify_comments_project($comment_id);

        $type = "success";
        $message = lang('project_comment_save');
        set_message($type, $message);
        redirect('admin/project/project_details/' . $data['project_id'] . '/' . '3');
    }

    function notify_comments_project($comment_id)
    {

        $email_template = $this->items_model->check_by(array('email_group' => 'project_comments'), 'tbl_email_templates');
        $comment_info = $this->items_model->check_by(array('task_comment_id' => $comment_id), 'tbl_task_comment');

        $project_info = $this->items_model->check_by(array('project_id' => $comment_info->project_id), 'tbl_project');
        $message = $email_template->template_body;

        $subject = $email_template->subject;

        $projectName = str_replace("{PROJECT_NAME}", $project_info->project_name, $message);
        $assigned_by = str_replace("{POSTED_BY}", ucfirst($this->session->userdata('name')), $projectName);
        $Link = str_replace("{COMMENT_URL}", base_url() . 'admin/project/project_details/' . $project_info->project_id . '/' . $data['active'] = 3, $assigned_by);
        $comments = str_replace("{COMMENT_MESSAGE}", $comment_info->comment, $Link);
        $message = str_replace("{SITE_NAME}", config_item('company_name'), $comments);

        $data['message'] = $message;
        $message = $this->load->view('email_template', $data, TRUE);

        $params['subject'] = $subject;
        $params['message'] = $message;
        $params['resourceed_file'] = '';

        if (!empty($project_info->permission) && $project_info->permission != 'all') {
            $user = json_decode($project_info->permission);
            foreach ($user as $key => $v_user) {
                $allowad_user[] = $key;
            }
        } else {
            $allowad_user = $this->items_model->allowad_user_id('57');
        }

        foreach ($allowad_user as $v_user) {
            $login_info = $this->items_model->check_by(array('user_id' => $v_user), 'tbl_users');
            $params['recipient'] = $login_info->email;
            $this->items_model->send_email($params);
        }
    }

    public function delete_comments($project_id, $task_comment_id)
    {
        //save data into table.
        $this->items_model->_table_name = "tbl_task_comment"; // table name
        $this->items_model->_primary_key = "task_comment_id"; // $id
        $this->items_model->delete($task_comment_id);

        $type = "success";
        $message = lang('task_comment_deleted');
        set_message($type, $message);
        redirect('admin/project/project_details/' . $project_id . '/' . '3');
    }

    public function save_attachment($task_attachment_id = NULL)
    {
        $data = $this->items_model->array_from_post(array('title', 'description', 'project_id'));
        $data['user_id'] = $this->session->userdata('user_id');

        // save and update into tbl_files
        $this->items_model->_table_name = "tbl_task_attachment"; //table name
        $this->items_model->_primary_key = "task_attachment_id";
        if (!empty($task_attachment_id)) {
            $id = $task_attachment_id;
            $this->items_model->save($data, $id);
            $msg = lang('project_file_updated');
        } else {
            $id = $this->items_model->save($data);
            $msg = lang('project_file_added');
        }

        if (!empty($_FILES['task_files']['name']['0'])) {
            $old_path_info = $this->input->post('uploaded_path');
            if (!empty($old_path_info)) {
                foreach ($old_path_info as $old_path) {
                    unlink($old_path);
                }
            }
            $mul_val = $this->items_model->multi_uploadAllType('task_files');

            foreach ($mul_val as $val) {
                $val == TRUE || redirect('admin/project/project_details/' . $data['project_id'] . '/' . '4');
                $fdata['files'] = $val['path'];
                $fdata['file_name'] = $val['fileName'];
                $fdata['uploaded_path'] = $val['fullPath'];
                $fdata['size'] = $val['size'];
                $fdata['ext'] = $val['ext'];
                $fdata['is_image'] = $val['is_image'];
                $fdata['image_width'] = $val['image_width'];
                $fdata['image_height'] = $val['image_height'];
                $fdata['task_attachment_id'] = $id;
                $this->items_model->_table_name = "tbl_task_uploaded_files"; // table name
                $this->items_model->_primary_key = "uploaded_files_id"; // $id
                $this->items_model->save($fdata);
            }
        }
        // save into activities
        $activities = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'project',
            'module_field_id' => $data['project_id'],
            'activity' => 'activity_new_project_attachment',
            'icon' => 'fa-ticket',
            'value1' => $data['title'],
        );
        // Update into tbl_project
        $this->items_model->_table_name = "tbl_activities"; //table name
        $this->items_model->_primary_key = "activities_id";
        $this->items_model->save($activities);
        // send notification message
        $this->notify_attchemnt_project($id);
        // messages for user
        $type = "success";
        $message = $msg;
        set_message($type, $message);
        redirect('admin/project/project_details/' . $data['project_id'] . '/' . '4');
    }

    function notify_attchemnt_project($task_attachment_id)
    {
        $email_template = $this->items_model->check_by(array('email_group' => 'project_attachment'), 'tbl_email_templates');
        $comment_info = $this->items_model->check_by(array('task_attachment_id' => $task_attachment_id), 'tbl_task_attachment');

        $project_info = $this->items_model->check_by(array('project_id' => $comment_info->project_id), 'tbl_project');
        $message = $email_template->template_body;

        $subject = $email_template->subject;
        $projectName = str_replace("{PROJECT_NAME}", $project_info->project_name, $message);
        $assigned_by = str_replace("{UPLOADED_BY}", ucfirst($this->session->userdata('name')), $projectName);
        $Link = str_replace("{PROJECT_URL}", base_url() . 'admin/project/project_details/' . $comment_info->project_id . '/' . $data['active'] = 4, $assigned_by);
        $message = str_replace("{SITE_NAME}", config_item('company_name'), $Link);

        $data['message'] = $message;
        $message = $this->load->view('email_template', $data, TRUE);

        $params['subject'] = $subject;
        $params['message'] = $message;
        $params['resourceed_file'] = '';
        if (!empty($project_info->permission) && $project_info->permission != 'all') {
            $user = json_decode($project_info->permission);
            foreach ($user as $key => $v_user) {
                $allowad_user[] = $key;
            }
        } else {
            $allowad_user = $this->items_model->allowad_user_id('57');
        }
        foreach ($allowad_user as $v_user) {
            $login_info = $this->items_model->check_by(array('user_id' => $v_user), 'tbl_users');
            $params['recipient'] = $login_info->email;
            $this->items_model->send_email($params);
        }
    }

    public function delete_files($project_id, $task_attachment_id)
    {
        $file_info = $this->items_model->check_by(array('task_attachment_id' => $task_attachment_id), 'tbl_task_attachment');
        // save into activities
        $activities = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'project',
            'module_field_id' => $project_id,
            'activity' => 'activity_project_attachfile_deleted',
            'icon' => 'fa-ticket',
            'value1' => $file_info->title,
        );
        // Update into tbl_project
        $this->items_model->_table_name = "tbl_activities"; //table name
        $this->items_model->_primary_key = "activities_id";
        $this->items_model->save($activities);

        //save data into table.
        $this->items_model->_table_name = "tbl_task_attachment"; // table name
        $this->items_model->delete_multiple(array('task_attachment_id' => $task_attachment_id));

        //save data into table.
        $this->items_model->_table_name = "tbl_task_uploaded_files"; // table name
        $this->items_model->delete_multiple(array('task_attachment_id' => $task_attachment_id));

        $type = "success";
        $message = lang('project_attachfile_deleted');
        set_message($type, $message);
        redirect('admin/project/project_details/' . $project_id . '/' . '4');
    }

    public function save_milestones($milestones_id = NULL)
    {
        $data = $this->items_model->array_from_post(array('project_id', 'milestone_name', 'description', 'start_date', 'end_date', 'user_id', 'client_visible'));
        // Update into tbl_project
        $this->items_model->_table_name = "tbl_milestones"; //table name
        $this->items_model->_primary_key = "milestones_id";
        if (!empty($milestones_id)) {
            $id = $milestones_id;
            $this->items_model->save($data, $milestones_id);
            $action = ('activity_updated_milestones');
            $msg = lang('update_milestone');
        } else {
            $id = $this->items_model->save($data);
            $action = 'activity_added_new_milestones';
            $msg = lang('create_milestone');
        }
        // save into activities
        $activities = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'project',
            'module_field_id' => $id,
            'activity' => $action,
            'icon' => 'fa-rocket',
            'value1' => $data['milestone_name'],
        );
        // Update into tbl_project
        $this->items_model->_table_name = "tbl_activities"; //table name
        $this->items_model->_primary_key = "activities_id";
        $this->items_model->save($activities);
        $this->send_project_notify_milestone($id);
        // messages for user
        $type = "success";
        $message = $msg;
        set_message($type, $message);
        redirect('admin/project/project_details/' . $data['project_id'] . '/' . '5');
    }

    public function send_project_notify_milestone($milestones_id)
    {

        $email_template = $this->items_model->check_by(array('email_group' => 'responsible_milestone'), 'tbl_email_templates');
        $milestone_info = $this->items_model->check_by(array('milestones_id' => $milestones_id), 'tbl_milestones');
        $project_info = $this->items_model->check_by(array('project_id' => $milestone_info->project_id), 'tbl_project');
        $user_info = $this->items_model->check_by(array('user_id' => $milestone_info->user_id), 'tbl_users');
        $message = $email_template->template_body;

        $subject = $email_template->subject;

        $milestone = str_replace("{MILESTONE_NAME}", $milestone_info->milestone_name, $message);
        $assigned_by = str_replace("{ASSIGNED_BY}", ucfirst($this->session->userdata('name')), $milestone);
        $project_name = str_replace("{PROJECT_NAME}", $project_info->project_name, $assigned_by);

        $Link = str_replace("{PROJECT_URL}", base_url() . 'admin/project/project_details/' . $milestone_info->project_id . '/' . $data['active'] = 5, $project_name);
        $message = str_replace("{SITE_NAME}", config_item('company_name'), $Link);

        $data['message'] = $message;
        $message = $this->load->view('email_template', $data, TRUE);

        $params['subject'] = $subject;
        $params['message'] = $message;
        $params['resourceed_file'] = '';

        $params['recipient'] = $user_info->email;
        $this->items_model->send_email($params);
    }

    public function delete_milestones($project_id, $milestones_id)
    {

        $this->items_model->_table_name = "tbl_milestones"; //table name
        $this->items_model->_order_by = "milestones_id";
        $milestones_info = $this->items_model->get_by(array('milestones_id' => $milestones_id), TRUE);
        // save into activities
        $activities = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'project',
            'module_field_id' => $project_id,
            'activity' => lang('activity_delete_milestones'),
            'icon' => 'fa-rocket',
            'value1' => $milestones_info->milestone_name,
        );
        // Update into tbl_project
        $this->items_model->_table_name = "tbl_activities"; //table name
        $this->items_model->_primary_key = "activities_id";
        $this->items_model->save($activities);

        //save data into table.
        $this->items_model->_table_name = "tbl_milestones"; // table name
        $this->items_model->delete_multiple(array('milestones_id' => $milestones_id));

        // delete into tbl_milestones
        $this->items_model->_table_name = "tbl_milestones"; //table name
        $this->items_model->_primary_key = "milestones_id";
        $this->items_model->delete($milestones_id);
        // Update into tbl_tasks

        $this->items_model->_table_name = "tbl_task"; //table name
        $this->items_model->delete_multiple(array('milestones_id' => $milestones_id));
        // messages for user
        $type = "success";
        $message = lang('delete_milestone');
        set_message($type, $message);
        redirect('admin/project/project_details/' . $project_id . '/' . '5');
    }

    public function delete_project($id)
    {
        $project_info = $this->items_model->check_by(array('project_id' => $id), 'tbl_project');
        $activity = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'project',
            'module_field_id' => $id,
            'activity' => 'activity_project_deleted',
            'icon' => 'fa-circle-o',
            'value1' => $project_info->project_name
        );
        $this->items_model->_table_name = 'tbl_activities';
        $this->items_model->_primary_key = 'activities_id';
        $this->items_model->save($activity);

        //delete data into table.
        $this->items_model->_table_name = "tbl_task_comment"; // table name
        $this->items_model->delete_multiple(array('project_id' => $id));

        $this->items_model->_table_name = "tbl_task_attachment"; //table name
        $this->items_model->_order_by = "project_id";
        $files_info = $this->items_model->get_by(array('project_id' => $id), FALSE);

        foreach ($files_info as $v_files) {
            //save data into table.
            $this->items_model->_table_name = "tbl_task_uploaded_files"; // table name
            $this->items_model->delete_multiple(array('task_attachment_id' => $v_files->task_attachment_id));
        }
        //save data into table.
        $this->items_model->_table_name = "tbl_task_attachment"; // table name
        $this->items_model->delete_multiple(array('project_id' => $id));

        //save data into table.
        $this->items_model->_table_name = "tbl_milestones"; // table name
        $this->items_model->delete_multiple(array('project_id' => $id));

        //save data into table.
        $this->items_model->_table_name = "tbl_task"; // table name
        $this->items_model->delete_multiple(array('project_id' => $id));
        //save data into table.
        $this->items_model->_table_name = "tbl_bug"; // table name
        $this->items_model->delete_multiple(array('project_id' => $id));

        $this->items_model->_table_name = 'tbl_project';
        $this->items_model->_primary_key = 'project_id';
        $this->items_model->delete($id);

        $type = 'success';
        $message = lang('project_deleted');
        set_message($type, $message);
        redirect('admin/project');
    }

    public function save_project_notes($id)
    {

        $data = $this->items_model->array_from_post(array('notes'));

//save data into table.
        $this->items_model->_table_name = 'tbl_project';
        $this->items_model->_primary_key = 'project_id';
        $id = $this->items_model->save($data, $id);
// save into activities
        $activities = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'project',
            'module_field_id' => $id,
            'activity' => 'activity_update_task',
            'icon' => 'fa-ticket',
            'value1' => $data['notes'],
        );
// Update into tbl_project
        $this->items_model->_table_name = "tbl_activities"; //table name
        $this->items_model->_primary_key = "activities_id";
        $this->items_model->save($activities);

        $type = "success";
        $message = lang('update_task');
        set_message($type, $message);
        redirect('admin/project/project_details/' . $id . '/' . '8');
    }

    public function update_project_timer($id = NULL, $action = NULL)
    {
        if (!empty($action)) {
            $t_data['project_id'] = $this->db->where(array('tasks_timer_id' => $id))->get('tbl_tasks_timer')->row()->project_id;
            $activity = 'activity_delete_tasks_timesheet';
            $msg = lang('delete_timesheet');
        } else {
            $activity = ('activity_update_task_timesheet');
            $msg = lang('timer_update');
        }
        if ($action != 'delete_task_timmer') {
            $t_data = $this->items_model->array_from_post(array('project_id', 'start_date', 'start_time', 'end_date', 'end_time'));

            $data['start_time'] = strtotime($t_data['start_date'] . ' ' . $t_data['start_time']);
            $data['end_time'] = strtotime($t_data['end_date'] . ' ' . $t_data['end_time']);
            $data['reason'] = $this->input->post('reason', TRUE);
            $data['edited_by'] = $this->session->userdata('user_id');

            $data['project_id'] = $t_data['project_id'];
            $data['user_id'] = $this->session->userdata('user_id');

            $this->items_model->_table_name = "tbl_tasks_timer"; //table name
            $this->items_model->_primary_key = "tasks_timer_id";
            if (!empty($id)) {
                $id = $this->items_model->save($data, $id);
            } else {
                $id = $this->items_model->save($data);
            }
        } else {
            $this->items_model->_table_name = "tbl_tasks_timer"; //table name
            $this->items_model->_primary_key = "tasks_timer_id";
            $this->items_model->delete($id);
        }
        $project_info = $this->items_model->check_by(array('project_id' => $t_data['project_id']), 'tbl_project');
        // save into activities
        $activities = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'project',
            'module_field_id' => $id,
            'activity' => $activity,
            'icon' => 'fa-users',
            'value1' => $project_info->project_name,
        );
        $this->items_model->_table_name = "tbl_activities"; //table name
        $this->items_model->_primary_key = "activities_id";
        $this->items_model->save($activities);
        $type = "success";
        $message = $msg;
        set_message($type, $message);
        redirect('admin/project/project_details/' . $t_data['project_id'] . '/7');
    }

    public function tasks_timer($status, $project_id)
    {
        $task_start = $this->items_model->check_by(array('project_id' => $project_id), 'tbl_project');

        if ($status == 'off') {
// check this user start time or this user is admin
// if true then off time
// else do not off time
            $check_user = $this->timer_started_by($project_id);

            if ($check_user == TRUE) {

                $task_logged_time = $this->items_model->task_spent_time_by_id($project_id, true);

                $time_logged = (time() - $task_start->start_time) + $task_logged_time; //time already logged

                $data = array(
                    'timer_status' => $status,
                    'logged_time' => $time_logged,
                    'start_time' => ''
                );
// Update into tbl_task
                $this->items_model->_table_name = "tbl_project"; //table name
                $this->items_model->_primary_key = "project_id";
                $this->items_model->save($data, $project_id);
// save into tbl_task_timer
                $t_data = array(
                    'project_id' => $project_id,
                    'user_id' => $this->session->userdata('user_id'),
                    'start_time' => $task_start->start_time,
                    'end_time' => time()
                );

// insert into tbl_task_timer
                $this->items_model->_table_name = "tbl_tasks_timer"; //table name
                $this->items_model->_primary_key = "tasks_timer_id";
                $this->items_model->save($t_data);

// save into activities
                $activities = array(
                    'user' => $this->session->userdata('user_id'),
                    'module' => 'project',
                    'module_field_id' => $project_id,
                    'activity' => ('activity_tasks_timer_off'),
                    'icon' => 'fa-copy',
                    'value1' => $task_start->project_name,
                );
// Update into tbl_project
                $this->items_model->_table_name = "tbl_activities"; //table name
                $this->items_model->_primary_key = "activities_id";
                $this->items_model->save($activities);
            }
        } else {
            $data = array(
                'timer_status' => $status,
                'timer_started_by' => $this->session->userdata('user_id'),
                'start_time' => time()
            );

// save into activities
            $activities = array(
                'user' => $this->session->userdata('user_id'),
                'module' => 'project',
                'module_field_id' => $project_id,
                'activity' => 'activity_tasks_timer_on',
                'icon' => 'fa-copy',
                'value1' => $task_start->project_name,
            );
// Update into tbl_project
            $this->items_model->_table_name = "tbl_activities"; //table name
            $this->items_model->_primary_key = "activities_id";
            $this->items_model->save($activities);

// Update into tbl_task
            $this->items_model->_table_name = "tbl_project"; //table name
            $this->items_model->_primary_key = "project_id";
            $this->items_model->save($data, $project_id);
        }
// messages for user
        $type = "success";
        $message = lang('task_timer_' . $status);
        set_message($type, $message);
        redirect($_SERVER['HTTP_REFERER']);

    }

    public function timer_started_by($task_id)
    {
        $user_id = $this->session->userdata('user_id');
        $user_info = $this->items_model->check_by(array('user_id' => $user_id), 'tbl_users');
        $timer_started_info = $this->items_model->check_by(array('project_id' => $task_id), 'tbl_project');
        if ($timer_started_info->timer_started_by == $user_id || $user_info->role_id == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function download_files($project_id, $uploaded_files_id)
    {

        $this->load->helper('download');

        $uploaded_files_info = $this->items_model->check_by(array('uploaded_files_id' => $uploaded_files_id), 'tbl_task_uploaded_files');
        if (!empty($uploaded_files_info->uploaded_path)) {

            $data = file_get_contents($uploaded_files_info->uploaded_path); // Read the file's contents
            if (!empty($data)) {
                force_download($uploaded_files_info->file_name, $data);
            } else {
                $type = "error";
                $message = lang('operation_failed');
                set_message($type, $message);
                redirect('admin/project/project_details/' . $project_id . '/3');
            }

        } else {
            $type = "error";
            $message = lang('operation_failed');
            set_message($type, $message);
            redirect('admin/project/project_details/' . $project_id . '/3');

        }

    }
}
