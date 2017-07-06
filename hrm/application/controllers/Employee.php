<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*  
 *  @author     : Creativeitem
 *  date        : 10 February, 2017
 *  Human Resource Management System
 *  http://support.creativeitem.com
 */

class Employee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /*     * *default functin, redirects to login page if no admin logged in yet** */

    // DEFAULT FUNCTION (redirects to login page if no user is logged in)
    public function index() {
        if ($this->session->userdata('employee_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('employee_login') == 1)
            redirect(base_url() . 'index.php?employee/dashboard', 'refresh');
        $this->load->view('backend/index');
    }

    // DASHBOARD
    function dashboard()
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(base_url(), 'refresh');

        $page_data['page_name']     = 'dashboard';
        $page_data['page_title']    = get_phrase('employee_dashboard');
        $this->load->view('backend/index', $page_data);
    }

    // ATTENDANCE REPORT
    function attendance_report()
    {
        $page_data['month']         = date('m');
        $page_data['year']          = date('Y');
        $page_data['page_name']     = 'attendance_report';
        $page_data['page_title']    = get_phrase('attendance_report');
        $this->load->view('backend/index', $page_data);
    }

    function attendance_report_selector()
    {
        $data['year']           = $this->input->post('year');
        $data['month']          = $this->input->post('month');
        redirect(base_url() . 'index.php?employee/attendance_report_view/' . $data['year'] . '/' . $data['month'], 'refresh');
    }

    function attendance_report_view($year = '', $month = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(base_url(), 'refresh');
        
        $page_data['year']          = $year;
        $page_data['month']         = $month;
        $page_data['page_name']     = 'attendance_report_view';
        $page_data['page_title']    = get_phrase('attendance_report');
        $this->load->view('backend/index', $page_data);
    }

    function attendance_report_print_view($year = '', $month = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(base_url(), 'refresh');
        
        $page_data['year']          = $year;
        $page_data['month']         = $month;
        $this->load->view('backend/employee/attendance_report_print_view', $page_data);
    }

    // LEAVE
    function leave($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'create') {
            $leave = $this->crud_model->create_leave();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?employee/leave', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_leave($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?employee/leave', 'refresh');
        }
        
        if ($param1 == 'delete') {
            $this->crud_model->delete_leave($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?employee/leave', 'refresh');
        }
        
        $page_data['page_name']     = 'leave';
        $page_data['page_title']    = get_phrase('leave_list');
        $this->load->view('backend/index', $page_data);
    }
    
    function payroll_list()
    {
        $page_data['page_name']     = 'payroll_list';
        $page_data['page_title']    = get_phrase('payslip_list');
        $this->load->view('backend/index', $page_data);
    }

    function get_employee($department_id) {
        $page_data['department_id'] = $department_id;
        $this->load->view('backend/admin/payroll_employee_select', $page_data);
    }

    // AWARD
    function award($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(base_url(), 'refresh');
        
        $page_data['page_name']     = 'award';
        $page_data['page_title']    = get_phrase('awards_list');
        $this->load->view('backend/index', $page_data);
    }

    // NOTICEBOARD
    function noticeboard($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(base_url(), 'refresh');
        
        $page_data['page_name']     = 'noticeboard';
        $page_data['page_title']    = get_phrase('notice_list');
        $this->load->view('backend/index', $page_data);
    }
    
    // PRIVATE MESSAGING
    function message($param1 = 'message_home', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'index.php?employee/message/message_read/' . $message_thread_code, 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'index.php?employee/message/message_read/' . $param2, 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name']   = $param1;
        $page_data['page_name']                 = 'message';
        $page_data['page_title']                = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }
    
    function profile($param1 = '', $param2 = '')
    {
        if ($param1 == 'edit') {
            $employee = $this->crud_model->edit_employee($param2);
            if ($employee == 'true') {
                $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
                redirect(base_url() . 'index.php?employee/profile', 'refresh');
            }
        }
        
        $page_data['page_name']     = 'profile';
        $page_data['page_title']    = get_phrase('edit_profile');
        $this->load->view('backend/index', $page_data);
    }
    
    
    function change_password($param1 = '', $param2 = '')
    {
        if ($param1 == 'change') {
            $data['password']             = sha1($this->input->post('password'));
            $data['new_password']         = sha1($this->input->post('new_password'));
            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));
            
            $current_password = $this->db->get_where('user',
                array('user_id' => $this->session->userdata('login_user_id')))->row()->password;
            
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('user_id', $this->session->userdata('login_user_id'));
                $this->db->update('user', array('password' => $data['new_password']));
                
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
            }
            redirect(base_url() . 'index.php?employee/change_password', 'refresh');
        }
        
        $page_data['page_name']     = 'change_password';
        $page_data['page_title']    = get_phrase('change_password');
        $this->load->view('backend/index', $page_data);
    }
}