<?phpdefined('BASEPATH') OR exit('No direct script access allowed');class AutoResponder extends CI_Controller {    public function __construct() {        parent::__construct();        $this->load->helper(array('form', 'url'));        $this->load->library('form_validation');        $this->load->library('pagination');        $this->load->model("common_model");        $this->load->model("responder_model");        $session_data = $this->session->userdata('user_account');        $this->user_id = $session_data['user_id'];    }    public function index() {        if (!$this->common_model->isLoggedIn()) {            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');            redirect("login");        }       // $data = $this->common_model->getRecords(TABLES::$MST_AUTO_RESPONDER, '*', '', 'id desc');        //pagination settings    	$this->db->where('user_id', $this->user_id);		$this->db->from(TABLES::$MST_AUTO_RESPONDER);		$countall = $this->db->count_all_results();        $config['base_url'] = site_url('autoresponder/index');        $config['total_rows'] = $countall;        $config['per_page'] = "10";        $config["uri_segment"] = 3;        $choice = $config["total_rows"] / $config["per_page"];        $config["num_links"] = floor($choice);        // integrate bootstrap pagination        $config['full_tag_open'] = '<ul class="pagination">';        $config['full_tag_close'] = '</ul>';        $config['first_link'] = false;        $config['last_link'] = false;        $config['first_tag_open'] = '<li>';        $config['first_tag_close'] = '</li>';        $config['prev_link'] = '<<';        $config['prev_tag_open'] = '<li class="prev">';        $config['prev_tag_close'] = '</li>';        $config['next_link'] = '>>';        $config['next_tag_open'] = '<li>';        $config['next_tag_close'] = '</li>';        $config['last_tag_open'] = '<li>';        $config['last_tag_close'] = '</li>';        $config['cur_tag_open'] = '<li class="active"><a href="#">';        $config['cur_tag_close'] = '</a></li>';        $config['num_tag_open'] = '<li>';        $config['num_tag_close'] = '</li>';        $this->pagination->initialize($config);        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;        // get books list        $data = $this->responder_model->get_autodata($config["per_page"], $page, NULL);        $pagination = $this->pagination->create_links();        $this->template->set('auto_data', $data);        $this->template->set('pagination', $pagination);        $this->template->set('page', 'autoresponder');        $this->template->set('page_type', 'inner');        $this->template->set_theme('default_theme');        $this->template->set_layout('default')                ->title('Paasport | Auto Responder')                ->set_partial('header', 'partials/inner_header')                ->set_partial('footer', 'partials/inner_footer');        $this->template->build('auto_responder');    }    public function newAutoResponder() {$session_data = $this->session->userdata('user_account');        if (!$this->common_model->isLoggedIn()) {            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');            redirect("login");        }        $opti_lists = $this->common_model->getRecords(TABLES::$OPTIN_LIST, '',array('user_id'=>$session_data['user_id']));        $this->template->set('optindata', $opti_lists);        $this->template->set('page', 'newautoresponder');         $this->template->set('page_type', 'inner');        $this->template->set_theme('default_theme');        $this->template->set_layout('default')                ->title('Paasport | Dashboard')                ->set_partial('header', 'partials/inner_header')                ->set_partial('footer', 'partials/inner_footer');        $this->template->build('new_auto_responder');    }    public function addNewAutoResponder() {if (!$this->common_model->isLoggedIn()) {            $map ['status'] = 2;            $map ['msg'] = "Your session has been time out. Please login to continue.";            echo json_encode($map);            exit();        }        $this->load->library('form_validation');        $session_data = $this->session->userdata();        if(count($this->input->post('msgbody')) == 0){            $map ['status'] = 0;            $map ['msg'] = "You did not insert any text message";            echo json_encode($map);            exit();        }        $this->form_validation->set_rules('msgbody[]', 'Message Body', 'trim|required');        $this->form_validation->set_rules('number[]', 'Opin Number', 'trim|required');        $this->form_validation->set_rules('freq[]', 'Frequency', 'trim|required');        $this->form_validation->set_rules('auto_responder_name', 'Autoresponder name', 'trim|required');        $this->form_validation->set_rules('optin_list_id', 'Optin List', 'trim|required');        if ($this->form_validation->run() == FALSE) {            $map ['status'] = 0;            $map ['msg'] = validation_errors();            echo json_encode($map);        } else {            $count = count($_POST['msgbody']);            $data = array(                'auroresponder_name' => $this->input->post('auto_responder_name'),                'optin_list_id' => $this->input->post('optin_list_id'),                'already_opted' => $this->input->post('already_applied_numbers'),                'created_by' => $session_data['user_account']['user_id'],                'user_id' => $session_data['user_account']['user_id'],                'created_time' => date("Y-m-d H:i:s"),            );            $uid = $this->common_model->insertRow($data, TABLES::$MST_AUTO_RESPONDER);            $master_id = $this->db->insert_id();            for ($i = 0; $i < $count; $i++) {                $data1[] = array(                    'message' => $this->input->post('msgbody')[$i],                    'time' => $this->input->post('number')[$i],                    'hour' => $this->input->post('hour')[$i],                    'frequency' => $this->input->post('freq')[$i],                    'responder_id' => $master_id,                );            }            $insert = $this->db->insert_batch(TABLES::$TRANS_AUTO_RESPONDER, $data1);            if ($insert) {                $map ['status'] = 1;                $map ['msg'] = "Auto responder set successfully.";                echo json_encode($map);            }        }    }    public function updateAutoResponder() {        $this->load->library('form_validation');        $session_data = $this->session->userdata();        $this->form_validation->set_rules('msgbody[]', 'Message Body', 'trim|required');        $this->form_validation->set_rules('msgbody[]', 'Message Body', 'trim|required');        $this->form_validation->set_rules('auto_responder_name', 'Autoresponder name', 'trim|required');        $this->form_validation->set_rules('optin_list_id', 'Optin List', 'trim|required');        if ($this->form_validation->run() == FALSE) {            $map ['status'] = 0;            $map ['msg'] = validation_errors();            echo json_encode($map);        } else {            $count = count($_POST['msgbody']);            $data = array(                'auroresponder_name' => $this->input->post('auto_responder_name'),                'optin_list_id' => $this->input->post('optin_list_id'),                'already_opted' => $this->input->post('already_applied_numbers'),                'created_by' => $session_data['user_account']['user_id'],                'user_id' => $session_data['user_account']['user_id'],                'created_time' => date("Y-m-d H:i:s"),            );            $uid = $this->common_model->updateRow(TABLES::$MST_AUTO_RESPONDER, $data, array('id' => decode_url($this->input->post('id'))));            $this->db->delete(TABLES::$TRANS_AUTO_RESPONDER, array("responder_id" => decode_url($this->input->post('id'))));            for ($i = 0; $i < $count; $i++) {                $data1[] = array(                    'message' => $this->input->post('msgbody')[$i],                    'time' => $this->input->post('number')[$i],                    'hour' => $this->input->post('hour')[$i],                    'frequency' => $this->input->post('freq')[$i],                    'responder_id' => decode_url($this->input->post('id')),                );            }            $insert = $this->db->insert_batch(TABLES::$TRANS_AUTO_RESPONDER, $data1);            $map ['status'] = 1;            $map ['msg'] = "Auto responder updated successfully.";            echo json_encode($map);        }    }    public function editAutoResponder($id) {        if (!$this->common_model->isLoggedIn()) {            $this->session->set_flashdata('msg', 'Your session is time out. Please login to continue.');            redirect("login");        }        $mst_data = $this->common_model->getRecords(TABLES::$MST_AUTO_RESPONDER, '', array('id' => decode_url($id)));        $trans_data = $this->common_model->getRecords(TABLES::$TRANS_AUTO_RESPONDER, '', array('responder_id' => $mst_data[0]['id']));        $opti_lists = $this->common_model->getRecords(TABLES::$OPTIN_LIST, '');        $this->template->set('edit_id', $id);        $this->template->set('mst_data', $mst_data);        $this->template->set('trans_data', $trans_data);        $this->template->set('optindata', $opti_lists);        $this->template->set('page', 'newautoresponder');        $this->template->set('page_type', 'inner');        $this->template->set_theme('default_theme');        $this->template->set_layout('default')                ->title('Paasport | Dashboard')                ->set_partial('header', 'partials/inner_header')                ->set_partial('footer', 'partials/inner_footer');        $this->template->build('edit_auto_responder');    }    public function deleteAutoResponder($id) {        $this->db->delete(TABLES::$TRANS_AUTO_RESPONDER, array('responder_id' => decode_url($id)));        $this->db->delete(TABLES::$MST_AUTO_RESPONDER, array('id' => decode_url($id), 'user_id' => $this->user_id));        $this->session->set_flashdata('msg', 'Autoresponder deleted successfully');        redirect(base_url() . 'autoresponder');    }}