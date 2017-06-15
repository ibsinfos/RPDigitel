<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  @author     : Creativeitem
 *  date        : 10 February, 2017
 *  Human Resource Management System
 *  http://support.creativeitem.com
 */

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('utility');
        /* $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
          $this->output->set_header('Pragma: no-cache'); */
    }

    /*     * *default functin, redirects to login page if no admin logged in yet** */

    // DEFAULT FUNCTION (redirects to login page if no user is logged in)
    public function index() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
        $this->load->view('backend/index');
    }

    // DASHBOARD
    function dashboard($p1 = '', $p2 = '', $p3 = '', $p4 = '', $p5 = '') {
        $this->load->helper('encrypt');
        $compid = $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'];

        if (decode_url($p5) != $compid && $p1 !='') {
            $this->session->set_userdata('last_page', current_url());
            redirect(master_url() . 'login', 'refresh');
        }
        if ($p1 != '' && $p2 != '' && $p3 != '' && $p4 != '' && $p5 != '') {
            $this->session->set_userdata('admin_login', $p1);
            $this->session->set_userdata('login_user_id', $p2);
            $this->session->set_userdata('name', $p3);
            $this->session->set_userdata('login_type', $p4);
        }
       


        if ($this->session->userdata('admin_login') != 1) {
            
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('admin_dashboard');
        $this->load->view('backend/index', $page_data);
    }

    /* ------------------DEPARTMENT--------------------- */

    function department($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ($param1 == 'create') {
            $this->crud_model->create_department();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/department/list', 'refresh');
        }

        if ($param1 == 'edit') {
            $department = $this->crud_model->edit_department($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updted_successfully'));
            redirect(base_url() . 'index.php?admin/department/list', 'refresh');
        }
        if ($param1 == 'delete') {
            $department = $this->crud_model->delete_department($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/department/list', 'refresh');
        }
        if ($param1 == 'list') {
            $page_data['page_name'] = 'department';
            $page_data['page_title'] = get_phrase('department');
            $this->load->view('backend/index', $page_data);
        }
    }

    function delete_designation($designation_id = '') {
        $this->db->where('designation_id', $designation_id);
        $this->db->delete('designation');

        echo 'success';
    }

    /* ------------------EMPLOYEE--------------------- */

    function employee($param1 = '', $param2 = '') {
        if ($param1 == 'employee_add') {
            $page_data['page_name'] = 'employee_add';
            $page_data['page_title'] = get_phrase('add_employee');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'list') {
            $page_data['department_id'] = 'all';
            $page_data['page_name'] = 'employee_list';
            $page_data['page_title'] = get_phrase('employee_list');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'filter') {
            $page_data['department_id'] = $this->input->post('department_id');
            $page_data['page_name'] = 'employee_list';
            $page_data['page_title'] = get_phrase('employee_list');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'create') {
            $employee = $this->crud_model->create_employee();
            if ($employee == 'true') {
                $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
                redirect(base_url() . 'index.php?admin/employee/list', 'refresh');
            }
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
        }
        if ($param1 == 'employee_edit') {
            $page_data['page_name'] = 'employee_edit';
            $page_data['user_code'] = $param2;
            $page_data['page_title'] = get_phrase('edit_employee');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'employee_profile') {
            $page_data['page_name'] = 'employee_profile';
            $page_data['user_code'] = $param2;
            $page_data['page_title'] = get_phrase('employee_profile');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'delete') {
            $employee = $this->crud_model->delete_employee($param2);
            if ($employee == 'true') {
                redirect(base_url() . 'index.php?admin/employee/list', 'refresh');
            }
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
        }
        if ($param1 == 'edit') {
            $employee = $this->crud_model->edit_employee($param2);
            if ($employee == 'true') {
                $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
                redirect(base_url() . 'index.php?admin/employee/employee_edit/' . $param2, 'refresh');
            }
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
        }
    }

    /* ---------------GET DESIGNATION------------ */

    function get_designation($department_id = '') {
        $designation = $this->db->get_where('designation', array('department_id' => $department_id))->result_array();
        foreach ($designation as $row)
            echo '<option value="' . $row['designation_id'] . '">' . $row['name'] . '</option>';
    }

    // PAYROLL
    /* function payroll()
      {
      $page_data['month'] = $month;
      $page_data['year'] = $year;
      $page_data['page_name'] = 'payroll_create';
      $page_data['page_title'] = get_phrase('create_payroll');
      $this->load->view('backend/index', $page_data);
      } */

    function payroll() {
        $page_data['page_name'] = 'payroll_add';
        $page_data['page_title'] = get_phrase('create_payslip');
        $this->load->view('backend/index', $page_data);
    }

    function get_employees($department_id = '') {
        $employees = $this->db->get_where('user', array('type' => 2, 'department_id' => $department_id))->result_array();

        foreach ($employees as $row)
            echo '<option value="' . $row['user_id'] . '">' . $row['name'] . '</option>';
    }

    function payroll_selector() {
        $department_id = $this->input->post('department_id');
        $employee_id = $this->input->post('employee_id');
        $month = $this->input->post('month');
        $year = $this->input->post('year');

        redirect(base_url() . 'index.php?admin/payroll_view/' . $department_id
                . '/' . $employee_id . '/' . $month . '/' . $year, 'refresh');
    }

    function payroll_view($department_id = '', $employee_id = '', $month = '', $year = '') {
        $page_data['department_id'] = $department_id;
        $page_data['employee_id'] = $employee_id;
        $page_data['month'] = $month;
        $page_data['year'] = $year;
        $page_data['page_name'] = 'payroll_add_view';
        $page_data['page_title'] = get_phrase('create_payslip');
        $this->load->view('backend/index', $page_data);
    }

    function create_payroll() {
        $data['payroll_code'] = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $data['user_id'] = $this->input->post('user_id');

        $allowances = array();
        $allowance_types = $this->input->post('allowance_type');
        $allowance_amounts = $this->input->post('allowance_amount');
        $number_of_entries = sizeof($allowance_types);

        for ($i = 0; $i < $number_of_entries; $i++) {
            if ($allowance_types[$i] != "" && $allowance_amounts[$i] != "") {
                $new_entry = array('type' => $allowance_types[$i], 'amount' => $allowance_amounts[$i]);
                array_push($allowances, $new_entry);
            }
        }
        $data['allowances'] = json_encode($allowances);

        $deductions = array();
        $deduction_types = $this->input->post('deduction_type');
        $deduction_amounts = $this->input->post('deduction_amount');
        $number_of_entries = sizeof($deduction_types);

        for ($i = 0; $i < $number_of_entries; $i++) {
            if ($deduction_types[$i] != "" && $deduction_amounts[$i] != "") {
                $new_entry = array('type' => $deduction_types[$i], 'amount' => $deduction_amounts[$i]);
                array_push($deductions, $new_entry);
            }
        }
        $data['deductions'] = json_encode($deductions);
        $data['date'] = $this->input->post('month') . ',' . $this->input->post('year');
        $data['status'] = $this->input->post('status');

        $this->db->insert('payroll', $data);

        $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
        redirect(base_url() . 'index.php?admin/payroll_list/filter2/' . $this->input->post('month') . '/' . $this->input->post('year'), 'refresh');
    }

    function payroll_list($param1 = '', $param2 = '', $param3 = '', $param4 = '') {
        if ($param1 == 'mark_paid') {
            $data['status'] = 1;

            $this->db->update('payroll', $data, array('payroll_id' => $param2));

            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/payroll_list/filter2/' . $param3 . '/' . $param4, 'refresh');
        }

        if ($param1 == 'filter') {
            $page_data['month'] = $this->input->post('month');
            $page_data['year'] = $this->input->post('year');
        } else {
            $page_data['month'] = date('n');
            $page_data['year'] = date('Y');
        }

        if ($param1 == 'filter2') {
            $page_data['month'] = $param2;
            $page_data['year'] = $param3;
        }

        $page_data['page_name'] = 'payroll_list';
        $page_data['page_title'] = get_phrase('payslip_list');
        $this->load->view('backend/index', $page_data);
    }

    function get_employee($department_id) {
        $page_data['department_id'] = $department_id;
        $this->load->view('backend/admin/payroll_employee_select', $page_data);
    }

    function manage_attendance() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $page_data['page_name'] = 'manage_attendance';
        $page_data['page_title'] = get_phrase('manage_attendance');
        $this->load->view('backend/index', $page_data);
    }

    // DAILY ATTENDANCE
    function attendance_selector() {
        $data['department_id'] = $this->input->post('department_id');
        $data['date'] = strtotime($this->input->post('date'));

        $query = $this->db->get_where('attendance', array('date' => $data['date']));

        if ($data['department_id'] == 'all')
            $employees = $this->db->get_where('user', array('type' => 2))->result_array();
        else
            $employees = $this->db->get_where('user', array('type' => 2, 'department_id' => $data['department_id']))->result_array();

        // NEW ATTENDANCE ENTRY
        if ($query->num_rows() < 1)
            foreach ($employees as $row) {
                $attn_data['attendance_code'] = substr(md5(rand(100000000, 20000000000)), 0, 7);
                $attn_data['user_id'] = $row['user_id'];
                $attn_data['date'] = $data['date'];
                $attn_data['status'] = 1;
                $this->db->insert('attendance', $attn_data);
            }

        // NEW ATTENDANCE ENTRY ONLY FOR NEWLY INSERTED EMPLOYEES
        if ($query->num_rows() >= 1) {
            $employee_ids_of_attendance = array();
            $attendance = $query->result_array();

            foreach ($attendance as $row2)
                array_push($employee_ids_of_attendance, $row2['user_id']);

            foreach ($employees as $row)
                if (!in_array($row['user_id'], $employee_ids_of_attendance)) {
                    $attn_data['attendance_code'] = substr(md5(rand(100000000, 20000000000)), 0, 7);
                    $attn_data['user_id'] = $row['user_id'];
                    $attn_data['date'] = $data['date'];
                    $attn_data['status'] = 1;
                    $this->db->insert('attendance', $attn_data);
                }
        }

        redirect(base_url() . 'index.php?admin/manage_attendance_view/' . $data['department_id'] . '/' . $data['date'], 'refresh');
    }

    function manage_attendance_view($department_id = '', $date = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($department_id != 'all')
            $department_name = $this->db->get_where('department', array('department_id' => $department_id))->row()->name . ' ' . get_phrase('department');
        else
            $department_name = get_phrase('all_employees');

        $page_data['department_id'] = $department_id;
        $page_data['date'] = $date;
        $page_data['page_name'] = 'manage_attendance_view';
        $page_data['page_title'] = get_phrase('manage_attendance_of') . ' ' . $department_name;
        $this->load->view('backend/index', $page_data);
    }

    function attendance_update($department_id = '', $date = '') {
        $number_of_attendances = $this->input->post('number_of_attendances');

        for ($i = 1; $i <= $number_of_attendances; $i++) {
            $attendance_id = $this->input->post('attendance_id_' . $i);
            $attendance_status = $this->input->post('status_' . $attendance_id);

            if ($attendance_status == 2)
                $reason = $this->input->post('reason_' . $attendance_id);
            if ($attendance_status == 1)
                $reason = '';

            $this->db->where('attendance_id', $attendance_id);
            $this->db->update('attendance', array('status' => $attendance_status, 'reason' => $reason));
        }

        $this->session->set_flashdata('flash_message', get_phrase('attendance_updated'));
        redirect(base_url() . 'index.php?admin/manage_attendance_view/' . $department_id . '/' . $date, 'refresh');
    }

    // ATTENDANCE REPORT
    function attendance_report() {
        $page_data['month'] = date('m');
        $page_data['year'] = date('Y');
        $page_data['page_name'] = 'attendance_report';
        $page_data['page_title'] = get_phrase('attendance_report');
        $this->load->view('backend/index', $page_data);
    }

    function attendance_report_selector() {
        $data['department_id'] = $this->input->post('department_id');
        $data['year'] = $this->input->post('year');
        $data['month'] = $this->input->post('month');
        redirect(base_url() . 'index.php?admin/attendance_report_view/' . $data['department_id'] . '/' . $data['year'] . '/' . $data['month'], 'refresh');
    }

    function attendance_report_view($department_id = '', $year = '', $month = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($department_id != 'all')
            $department_name = $this->db->get_where('department', array('department_id' => $department_id))->row()->name . ' ' . get_phrase('department');
        else
            $department_name = get_phrase('all_employees');

        $page_data['department_id'] = $department_id;
        $page_data['year'] = $year;
        $page_data['month'] = $month;
        $page_data['page_name'] = 'attendance_report_view';
        $page_data['page_title'] = get_phrase('attendance_report_of') . ' ' . $department_name;
        $this->load->view('backend/index', $page_data);
    }

    function attendance_report_print_view($department_id = '', $year = '', $month = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $page_data['department_id'] = $department_id;
        $page_data['year'] = $year;
        $page_data['month'] = $month;
        $this->load->view('backend/admin/attendance_report_print_view', $page_data);
    }

    // AWARD
    function award($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $award = $this->crud_model->create_award();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/award', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_award($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/award', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_award($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/award', 'refresh');
        }

        $page_data['page_name'] = 'award';
        $page_data['page_title'] = get_phrase('awards_list');
        $this->load->view('backend/index', $page_data);
    }

    // EXPENSE
    function expense($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $expense = $this->crud_model->create_expense();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/expense', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_expense($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/expense', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_expense($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/expense', 'refresh');
        }

        $page_data['page_name'] = 'expense';
        $page_data['page_title'] = get_phrase('manage_expenses');
        $this->load->view('backend/index', $page_data);
    }

    // NOTICEBOARD
    function noticeboard($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $noticeboard = $this->crud_model->create_noticeboard();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/noticeboard', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_noticeboard($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/noticeboard', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_noticeboard($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/noticeboard', 'refresh');
        }

        $page_data['page_name'] = 'noticeboard';
        $page_data['page_title'] = get_phrase('notice_list');
        $this->load->view('backend/index', $page_data);
    }

    // LEAVE
    function leave($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'approve') {
            $data['status'] = 1;

            $this->db->update('leave', $data, array('leave_id' => $param2));

            $this->session->set_flashdata('flash_message', get_phrase('leave_approved_successfully'));
            redirect(base_url() . 'index.php?admin/leave', 'refresh');
        }

        if ($param1 == 'decline') {
            $data['status'] = 2;

            $this->db->update('leave', $data, array('leave_id' => $param2));

            $this->session->set_flashdata('flash_message', get_phrase('leave_declined_successfully'));
            redirect(base_url() . 'index.php?admin/leave', 'refresh');
        }

        if ($param1 == 'delete') {
            $this->crud_model->delete_leave($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/leave', 'refresh');
        }

        $page_data['page_name'] = 'leave';
        $page_data['page_title'] = get_phrase('leave_list');
        $this->load->view('backend/index', $page_data);
    }

    // PRIVATE MESSAGING
    function message($param1 = 'message_home', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'index.php?admin/message/message_read/' . $message_thread_code, 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'index.php?admin/message/message_read/' . $param2, 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name'] = $param1;
        $page_data['page_name'] = 'message';
        $page_data['page_title'] = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }

    // MANAGE OWN PROFILE AND CHANGE PASSWORD
    function manage_profile($param1 = '', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'update_profile_info') {
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');

            $this->db->where('user_id', $this->session->userdata('login_user_id'));
            $this->db->update('user', $data);

            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('login_user_id') . '.jpg');

            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password'] = sha1($this->input->post('password'));
            $data['new_password'] = sha1($this->input->post('new_password'));
            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

            $current_password = $this->db->get_where('user', array('user_id' => $this->session->userdata('login_user_id')))->row()->password;

            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('user_id', $this->session->userdata('login_user_id'));
                $this->db->update('user', array('password' => $data['new_password']));

                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
            }
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }

        $page_data['page_name'] = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data'] = $this->db->get_where('user', array('user_id' => $this->session->userdata('login_user_id')))->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /*     * ***SITE/SYSTEM SETTINGS******** */

    function system_settings($param1 = '', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'do_update') {

            $data['description'] = $this->input->post('system_name');
            $this->db->where('type', 'system_name');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('system_title');
            $this->db->where('type', 'system_title');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('address');
            $this->db->where('type', 'address');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('phone');
            $this->db->where('type', 'phone');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('system_email');
            $this->db->where('type', 'system_email');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('language');
            $this->db->where('type', 'language');
            $this->db->update('settings', $data);

            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }

        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }

        $page_data['page_name'] = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings'] = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /*     * ***LANGUAGE SETTINGS******** */

    function manage_language($param1 = '', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'edit_phrase') {
            $page_data['edit_profile'] = $param2;
        }
        if ($param1 == 'update_phrase') {
            $language = $param2;
            $total_phrase = $this->input->post('total_phrase');
            for ($i = 1; $i < $total_phrase; $i++) {
                //$data[$language]  =   $this->input->post('phrase').$i;
                $this->db->where('phrase_id', $i);
                $this->db->update('language', array($language => $this->input->post('phrase' . $i)));
            }
            redirect(base_url() . 'index.php?admin/manage_language/edit_phrase/' . $language, 'refresh');
        }
        if ($param1 == 'do_update') {
            $language = $this->input->post('language');
            $data[$language] = $this->input->post('phrase');
            $this->db->where('phrase_id', $param2);
            $this->db->update('language', $data);
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
        }
        if ($param1 == 'add_phrase') {
            $data['phrase'] = $this->input->post('phrase');
            $this->db->insert('language', $data);
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
        }
        if ($param1 == 'add_language') {
            $language = $this->input->post('language');
            $this->load->dbforge();
            $fields = array(
                $language => array(
                    'type' => 'LONGTEXT'
                )
            );
            $this->dbforge->add_column('language', $fields);

            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
        }
        if ($param1 == 'delete_language') {
            $language = $param2;
            $this->load->dbforge();
            $this->dbforge->drop_column('language', $language);
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

            redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
        }
        $page_data['page_name'] = 'manage_language';
        $page_data['page_title'] = get_phrase('manage_language');
        //$page_data['language_phrases'] = $this->db->get('language')->result_array();
        $this->load->view('backend/index', $page_data);
    }

    // VACANCY
    function vacancy($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $vacancy = $this->crud_model->create_vacancy();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/vacancy', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_vacancy($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/vacancy', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_vacancy($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/vacancy', 'refresh');
        }

        $page_data['page_name'] = 'vacancy';
        $page_data['page_title'] = get_phrase('vacancy_list');
        $this->load->view('backend/index', $page_data);
    }

    // APPLICATION
    function application($param1 = 'applied', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $status = $this->input->post('status');
            $this->crud_model->create_application();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/application/' . $status, 'refresh');
        }

        if ($param1 == 'update') {
            $status = $this->input->post('status');
            $this->crud_model->update_application($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/application/' . $status, 'refresh');
        }
        if ($param1 == 'delete') {
            $status = $this->db->get_where('application', array('application_id' => $param2))->row()->status;
            $this->crud_model->delete_application($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/application/' . $status, 'refresh');
        }

        if ($param1 != 'applied' && $param1 != 'on_review' && $param1 != 'interview' && $param1 != 'offered' && $param1 != 'hired' && $param1 != 'declined')
            $param1 = 'applied';

        $page_data['status'] = $param1;
        $page_data['page_name'] = 'application';
        $page_data['page_title'] = get_phrase('application_list');
        $this->load->view('backend/index', $page_data);
    }

}
