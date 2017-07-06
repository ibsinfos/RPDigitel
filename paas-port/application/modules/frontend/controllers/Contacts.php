<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('common_model');
        $this->load->model('contact_model');
        $session_data = $this->session->userdata('user_account');
        $this->user_id = $session_data['user_id'];
    }

    /**
     * code for call homepage
     */
    public function index() {
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
//        $lists = $this->common_model->getRecords(TABLES::$OPTIN_LIST, '*', array('user_id' => $this->user_id));
        //pagination settings
		$this->db->where('user_id', $this->user_id);
		$this->db->from(TABLES::$OPTIN_LIST);
		$countall = $this->db->count_all_results();
        $config['base_url'] = site_url('contacts/index');
        $config['total_rows'] = $countall;
        $config['per_page'] = "10";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<<';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '>>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // get books list
        $lists = $this->contact_model->get_contacts($config["per_page"], $page, NULL);

        $pagination = $this->pagination->create_links();
		
		if(!empty($_SESSION['paasport_user_id'])) 
		{
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			$this->template->set('slug',$slug);
        }
		
        $this->template->set('pagination', $pagination);
        $this->template->set('lists', $lists);
        $this->template->set('page', 'contacts');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | Contacts')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('contacts');
    }

   

    /**
     * code for call create new contact
     */
    public function newContact() {
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
		if(!empty($_SESSION['paasport_user_id'])) 
		{
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			$this->template->set('slug',$slug);
        }
        $contacts = $this->common_model->getRecords(TABLES::$CLIENT_CONTACTS, '*', array('user_id' => $this->user_id));
        $this->template->set('contacts', $contacts);
        $this->template->set('page', 'newcontact');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | New Contact')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('add_contact');
    }

    public function addOptinList() {
        if (!$this->common_model->isLoggedIn()) {
            $map ['status'] = 2;
            $map ['msg'] = "Your session has been time out. Please login to continue.";
            echo json_encode($map);
            exit();
        }
        $this->load->library('form_validation');
        $session_data = $this->session->userdata();
        $this->form_validation->set_rules('list_name', 'List name', 'trim|required');
        if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['phone'])) {
            $this->form_validation->set_rules('first_name[]', 'First name', 'trim|required');
            $this->form_validation->set_rules('last_name[]', 'Last name', 'trim|required');
            $this->form_validation->set_rules('phone[]', 'Phone', 'trim|required');
        }

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
        } else {

            $data = array(
                'list_name' => $this->input->post('list_name'),
                'user_id' => $session_data['user_account']['user_id'],
                'created_by' => $session_data['user_account']['user_id'],
                'created_time' => date("Y-m-d H:i:s"),
            );
            $uid = $this->common_model->insertRow($data, TABLES::$OPTIN_LIST);
            $master_id = $this->db->insert_id();
            if (isset($_POST['existing_contacts'])) {
                for ($j = 0; $j < count($_POST['existing_contacts']); $j++) {
                    $data3 = array("list_id" => $master_id, "contact_id" => $_POST['existing_contacts'][$j], "created_date" => date("Y-m-d H:i:s"));
                    $insert3 = $this->db->insert(TABLES::$CONTACT_MAPPING, $data3);
                }
            }
            if (isset($_POST['first_name'])) {
                $count = count($_POST['first_name']);

                for ($i = 0; $i < $count; $i++) {
                    $data1 = array(
                        'first_name' => $this->input->post('first_name')[$i],
                        'last_name' => $this->input->post('last_name')[$i],
                        'email' => $this->input->post('email')[$i],
                        'phone' => $this->input->post('phone')[$i],
                        'user_id' => $session_data['user_account']['user_id'],
                        'created_time' => date("Y-m-d H:i:s"),
                    );
                    $insert = $this->db->insert(TABLES::$CLIENT_CONTACTS, $data1);
                    $lastid = $this->db->insert_id();
                    $data2 = array("list_id" => $master_id, "contact_id" => $lastid, "created_date" => date("Y-m-d H:i:s"));
                    $insert2 = $this->db->insert(TABLES::$CONTACT_MAPPING, $data2);
                }
            }
            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "List created successfully";
                echo json_encode($map);
            }
        }
    }

    /**
     * code for call create new optinlist
     */
    public function optinList() {
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
        $contacts = $this->common_model->getRecords(TABLES::$CLIENT_CONTACTS, '*', array('user_id' => $this->user_id));
		if(!empty($_SESSION['paasport_user_id'])) 
		{
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			$this->template->set('slug',$slug);
        }
		$this->template->set('contacts', $contacts);
        $this->template->set('page', 'newcontact');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | New Contact')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('add_optinlist');
    }

    /**
     * code for call create new optinlist
     */
    public function editOptinList($listid) {
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
        $this->load->model('contact_model');
        $optinlist = $this->contact_model->getListname(decode_url($listid));

        if (empty($optinlist)) {
            $optinlist = $this->common_model->getRecords(TABLES::$OPTIN_LIST, '*', array('id' => decode_url($listid)));
        }
        $contacts = $this->common_model->getRecords(TABLES::$CLIENT_CONTACTS, '*', array('user_id' => $this->user_id));
		
		if(!empty($_SESSION['paasport_user_id'])) 
		{
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			$this->template->set('slug',$slug);
        }
		
        $this->template->set('edit_id', $listid);
        $this->template->set('optinlist', $optinlist);
        $this->template->set('contacts', $contacts);

        $this->template->set('page', 'newcontact');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | New Contact')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('edit_optinlist');
    }

    /**
     * code for call create new optinlist
     */
    public function deleteOptinList($listid) {
        $this->db->delete(TABLES::$CONTACT_MAPPING, array("list_id" => decode_url($listid)));
        $this->db->delete(TABLES::$OPTIN_LIST, array("id" => decode_url($listid), 'user_id' => $this->user_id));
        $this->session->set_flashdata('msg', 'Optin List Deleted Successfully');
        redirect(base_url() . 'contacts');
    }

    /**
     * code for call create new optinlist
     */
    public function deleteOptinListUser($mapping_id) {
        $this->db->delete(TABLES::$CONTACT_MAPPING, array('mapping_id' => decode_url($mapping_id)));
        $this->session->set_flashdata('msg', 'User removed from optin list successfully');
        redirect(base_url() . 'contacts');
    }

    public function updateOptinList() {
        
if (!$this->common_model->isLoggedIn()) {
            $map ['status'] = 2;
            $map ['msg'] = "Your session has been time out. Please login to continue.";
            echo json_encode($map);
            exit();
        }
        $this->load->library('form_validation');
        $session_data = $this->session->userdata();
        $this->form_validation->set_rules('list_name', 'List name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
        } else {

            $data = array(
                'list_name' => $this->input->post('list_name'),
            );
            $uid = $this->common_model->updateRow(TABLES::$OPTIN_LIST, $data, array('id' => decode_url($this->input->post('edit_id'))));
            $master_id = decode_url($this->input->post('edit_id'));
            if (isset($_POST['existing_contacts'])) {
                for ($j = 0; $j < count($_POST['existing_contacts']); $j++) {
                    $this->db->delete(TABLES::$CONTACT_MAPPING, array("contact_id" => $_POST['existing_contacts'][$j], 'list_id' => $master_id));
                    $data3 = array("list_id" => $master_id, "contact_id" => $_POST['existing_contacts'][$j], "created_date" => date("Y-m-d H:i:s"));
                    $insert3 = $this->db->insert(TABLES::$CONTACT_MAPPING, $data3);
                }
            }
            if (isset($_POST['first_name'])) {
                $count = count($_POST['first_name']);

                for ($i = 0; $i < $count; $i++) {
                    $data1 = array(
                        'id' => $this->input->post('id')[$i],
                        'first_name' => $this->input->post('first_name')[$i],
                        'last_name' => $this->input->post('last_name')[$i],
                        'email' => $this->input->post('email')[$i],
                        'phone' => $this->input->post('phone')[$i],
                        'user_id' => $session_data['user_account']['user_id'],
                        'created_time' => date("Y-m-d H:i:s"),
                    );

                    $this->db->delete(TABLES::$CLIENT_CONTACTS, array('id' => $this->input->post('id')[$i]));
                    $insert = $this->db->insert(TABLES::$CLIENT_CONTACTS, $data1);
                    $lastid = $this->db->insert_id();

                    $this->db->delete(TABLES::$CONTACT_MAPPING, array("list_id" => $master_id, "contact_id" => $lastid));
                    $data2 = array("list_id" => $master_id, "contact_id" => $lastid, "created_date" => date("Y-m-d H:i:s"));
                    $insert2 = $this->db->insert(TABLES::$CONTACT_MAPPING, $data2);
                }
            }
            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "List created successfully";
                echo json_encode($map);
            }
        }
    }

    public function optinlistUsers($id) {
        if (!$this->common_model->isLoggedIn()) {
            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');
            redirect("login");
        }
        $this->load->model('contact_model');
        $users = $this->contact_model->getUsers(decode_url($id));
		
		if(!empty($_SESSION['paasport_user_id'])) 
		{
			$slug = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			$this->template->set('slug',$slug);
        }
		
        $this->template->set('users', $users);
        $this->template->set('list_id', $id);
        $this->template->set('page', 'contacts');
        $this->template->set('page_type', 'inner');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('default')
                ->title('Paasport | Home')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
        $this->template->build('optinlist_users');
    }

    public function editUser() {
        $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last name', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = 0;
            $map ['msg'] = validation_errors();
            echo json_encode($map);
        } else {

            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
            );
            $uid = $this->common_model->updateRow(TABLES::$CLIENT_CONTACTS, $data, array('id' => $this->input->post('edit_id')));

            if ($uid) {
                $map ['status'] = 1;
                $map ['msg'] = "User updated successfully";
                echo json_encode($map);
            }
        }
    }

}
