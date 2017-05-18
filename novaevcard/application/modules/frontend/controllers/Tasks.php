<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tasks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'form',
            'url'
        ));
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model("common_model");
        $this->load->model("task_model");
        $session_data  = $this->session->userdata('user_account');
        $this->user_id = $session_data['user_id'];
    }
    public function index()
    {
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
        //        $tasklist = $this->common_model->getRecords(TABLES::$CRON_TEXTMSG, '*', array('user_id' => $this->user_id));
        //pagination settings
        $this->db->where('user_id', $this->user_id);
        $this->db->from(TABLES::$CRON_TEXTMSG);
        $countall                  = $this->db->count_all_results();
        $config['base_url']        = site_url('scheduled-task/index');
        $config['total_rows']      = $countall;
        $config['per_page']        = "10";
        $config["uri_segment"]     = 3;
        $choice                    = $config["total_rows"] / $config["per_page"];
        $config["num_links"]       = floor($choice);
        // integrate bootstrap pagination
        $config['full_tag_open']   = '<ul class="pagination">';
        $config['full_tag_close']  = '</ul>';
        $config['first_link']      = false;
        $config['last_link']       = false;
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link']       = '<<';
        $config['prev_tag_open']   = '<li class="prev">';
        $config['prev_tag_close']  = '</li>';
        $config['next_link']       = '>>';
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        $this->pagination->initialize($config);
        $page       = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        // get books list
        $tasklist   = $this->task_model->get_tasks($config["per_page"], $page, NULL);
        $pagination = $this->pagination->create_links();
        $this->template->set('pagination', $pagination);
        $this->template->set('page', 'mmslist');
        $this->template->set('tasklist', $tasklist);
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')->title('Paasport | MMS List')->set_partial('header', 'partials/inner_header')->set_partial('footer', 'partials/inner_footer');
        $this->template->build('schedule_task_list');
    }
}