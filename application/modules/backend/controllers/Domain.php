<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Domain extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("common_model");
        $this->load->model("blog_model");
//        $this->load->library('form_validation');
    }

    /* Frontend : Manage Blog Start */

    public function dashboard() {
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "admin/login");
        }

        $data['global'] = $this->common_model->getGlobalSettings();
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
        #START Action :: Fetch all active Blog added by admin :   
        $data['event_list'] = $this->common_model->getRecords(TABLES::$MST_EVENTS, '*', '', 'id desc');
        $this->template->set('global', $data['global']);
        $this->template->set('page', 'event_list');
        $this->template->set('event_list', $data['event_list']);
        $this->template->set_theme('default_theme');
         $this->template->set_layout('admin_silo')
                ->title('Admin Dashboard | Silo')
                ->set_partial('header', 'partials/admin_header')
                ->set_partial('sidebar', 'partials/admin_sidebar')
                ->set_partial('footer', 'partials/admin_footer');
        $this->template->build('domainlist');
    }
    
    public function eventDetail($id){
        $event = $this->common_model->getRecords(TABLES::$MST_EVENTS, '*', array('id'=>$id));
        $recent_event = $this->common_model->getRecords(TABLES::$MST_EVENTS, '*', '', 'id desc','2');
        $this->template->set('event', $event[0]);
        $this->template->set('recent_event', $recent_event);
        $this->template->set('page', 'event');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend_community')
                ->title($event[0]['event_name'].' | Silo')
                 ->set_partial('header','partials/header_community');             
//                ->set_partial('footer','partials/footer_community');
        $this->template->build('events/event-detail');
    }

    /* function to change Blog Status */

    public function changeStatus() {
        if ($this->input->post('post_id') != "") {
            #updating the user status.
            $arr_to_update = array(
                "status" => $this->input->post('post_status')
            );
            #condition to update record	for the user status
            $condition_array = array('id' => intval($this->input->post('post_id')));
            $this->common_model->updateRow(TABLES::$MST_TESTIMONIAL, $arr_to_update, $condition_array);
            echo json_encode(array("error" => "0", "error_message" => "Status has changed successflly."));
        } else {
            #if something going wrong providing error message. 
            echo json_encode(array("error" => "1", "error_message" => "Sorry, your request can not be fulfilled this time. Please try again later"));
        }
    }

    /* Function to add and update blog post start */

    public function addEvent($id = '') {
        $this->load->model("common_model");

        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "admin/login");
        }

        $data = $this->common_model->commonFunction();

        $post_title = $this->input->post("inputName");

        if ($post_title != "") {

            $edit_id = $this->input->post("edit_id");
            if ($edit_id != "") {
                if ($_FILES['img_file']['name'] != '') {
                    $_FILES['img_file']['name'];
                    $_FILES['img_file']['type'];
                    $_FILES['img_file']['tmp_name'];
                    $_FILES['img_file']['error'];
                    $_FILES['img_file']['size'];
                    $config['file_name'] = time() . rand();
                    $config['upload_path'] = 'uploads/events';
                    $config['allowed_types'] = 'jpg|jpeg|gif|png';
                    $config['max_size'] = '9000000';
                    $old_image = $this->input->post("old_img_file");
                    @unlink('uploads/users/' . $old_image);
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('img_file')) {
                        $data = $this->upload->data();
                        $ar = list($width, $height) = getimagesize($data['full_path']);
                        $upload_result = $this->upload->data();


                        $img_path = $upload_result['file_name'];
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                    }
                } else {
                    $img_path = $this->input->post('old_img_file');
                }
                $update_data = array(
                    "event_name" => $this->input->post('inputName'),
                    "start_date" => date("Y-m-d", strtotime($this->input->post('start_date'))),
                    "end_date" => date("Y-m-d", strtotime($this->input->post('end_date'))),
                    "short_desc" => $this->input->post('short_desc'),
                    "long_desc" => $this->input->post('inputPostDescription'),
                    "event_image" => $img_path,
                    'updated_by' => $data['user_account']['user_id'],
                    'updated_time' => date("Y-m-d H:i:s")
                );
                $condition = array("id" => $edit_id);
                $this->common_model->updateRow(TABLES::$MST_EVENTS, $update_data, $condition);

                $this->session->set_userdata("msg", "<span class='success'>Event updated successfully!</span>");
                redirect(base_url() . "event-list");
            } else {
                if ($_FILES['img_file']['name'] != '') {
                    $_FILES['img_file']['name'];
                    $_FILES['img_file']['type'];
                    $_FILES['img_file']['tmp_name'];
                    $_FILES['img_file']['error'];
                    $_FILES['img_file']['size'];
                    $config['file_name'] = time() . rand();
                    $config['upload_path'] = FCPATH . 'uploads/events/';
                    $config['allowed_types'] = 'jpg|jpeg|gif|png';
                    $config['max_size'] = '9000000';
                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('img_file')) {
                        $data['upload_data'] = $this->upload->data();
                        $ar = list($width, $height) = getimagesize($data['full_path']);
                        $upload_result = $this->upload->data();
                        $img_path = $upload_result['file_name'];
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                    }
                    $arr_post_data = array(
                        "event_name" => $this->input->post('inputName'),
                        "start_date" => date("Y-m-d", strtotime($this->input->post('start_date'))),
                        "end_date" => date("Y-m-d", strtotime($this->input->post('end_date'))),
                        "short_desc" => $this->input->post('short_desc'),
                        "long_desc" => $this->input->post('inputPostDescription'),
                        'created_by' => $data['user_account']['user_id'],
                        "event_image" => $img_path,
                        'created_time' => date("Y-m-d H:i:s")
                    );
                    $new_post_id = $this->common_model->insertRow($arr_post_data, TABLES::$MST_EVENTS);
                }
            }
            $this->session->set_userdata("msg", "<span class='success'>Event added successfully!</span>");
            redirect(base_url() . "event-list");
        }

        $data["post_id"] = $id;
        $arr_post_info = $this->common_model->getRecords(TABLES::$MST_EVENTS, "*", array("id" => $id));
        if ($id != '') {
            $this->template->set('post_id', $id);
            $data["title"] = "Update Event";
        } else {
            $data["title"] = "Add Event";
        }
        if (!empty($arr_post_info[0])) {
            $data["post_info"] = $arr_post_info[0];
            $this->template->set('event_data', $data["post_info"]);
        }
        $data['arr_active_admin_details'] = $this->common_model->getRecords(TABLES::$MST_EVENTS, '', array('id' => '1'));
        if ($id != '') {
            $data['main'] = 'event_edit';
        } else {
            $data['main'] = 'event_add';
        }


        $this->template->set('page', 'add_testimonial');


        $this->template->set_theme('default_theme');
        $this->template->set_layout('admin_silo')
                ->title('Admin Dashboard | Silo')
                ->set_partial('header', 'partials/admin_header')
                ->set_partial('sidebar', 'partials/admin_sidebar')
                ->set_partial('footer', 'partials/admin_footer');
        $this->template->build('events/' . $data['main']);
    }

    public function delete_post() {
        $post_id = $this->input->post("post_id");
        $post_ids[] = $this->input->post("post_ids");
        if ($post_id != "") {
            $this->blog_model->deleteBlogPost($post_id);
            $this->blog_model->deleteTransBlogPost($post_id);
        } elseif ($post_ids != "") {
            foreach ($post_ids as $post_id) {
                $this->common_model->deleteRows($post_id, "mst_blog_posts", "post_id");
                $this->common_model->deleteRows($post_id, "trans_blog_posts", "post_id");
            }
        }
        $this->session->set_userdata("msg", "<span class='error'>Blog deleted successfully.</span>");
        echo json_encode(array("msg" => "success", "error" => "0"));
    }

    /* Backend : Manage Blog End */

    public function submitTestimonial() {
        $this->load->library('form_validation');
        $session_data = $this->session->userdata();
        if (isset($session_data['user_account']['user_id']) && $session_data['user_account']['user_id'] != '') {
            $userid = $session_data['user_account']['user_id'];
        } else {
            $userid = NULL;
        }
        $this->form_validation->set_rules('client_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('service', 'Service', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $map ['status'] = '0';
            $map ['msg'] = validation_errors();
            echo json_encode($map);
            exit;
        } else {
            $data = array(
                "client_name" => $this->input->post('client_name'),
                "service" => $this->input->post('service'),
                'description' => $this->input->post('comment'),
                'created_by' => $userid,
                'created_time' => date("Y-m-d H:i:s"),
                'is_active' => '0',
                'is_featured' => '0'
            );
            $uid = $this->common_model->insertRow($data, TABLES::$MST_TESTIMONIAL);
            if ($uid) {
                $map ['status'] = '1';
                $map ['msg'] = "Comment submitted successfully.";
                echo json_encode($map);
            }
        }
    }

    public function loadMoreTestimonials() {
        if (isset($_POST['page'])):
            $paged = $_POST['page'];
            $resultsPerPage = 3;
            $sql = "SELECT * FROM " . TABLES::$MST_TESTIMONIAL . " where status='1' ORDER BY `id` DESC";
            if ($paged > 0) {
                $page_limit = $resultsPerPage * ($paged - 1);
                $pagination_sql = " LIMIT  $page_limit, $resultsPerPage";
            } else {
                $pagination_sql = " LIMIT 0 , $resultsPerPage";
            }

            $query = $this->db->query($sql . $pagination_sql);
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $data) {
                    ?>
                    <div class="col-md-4 col-sm-6 Border_Grid">
                        <div class="testimonials">
                            <div class="active item">
                                <blockquote><p><?php echo substr($data['description'], '0', '150'); ?></p></blockquote>
                                <div class="carousel-info">
                                    <img alt="" src="<?php
                                    if ($data['client_image'] != NULL && file_exists(FCPATH . "uploads/testimonial_users/" . $data['client_image'])) {
                                        echo base_url() . "uploads/testimonial_users/" . $data['client_image'];
                                    } else {
                                        echo base_url() . "uploads/testimonial_users/default-avatar.jpg";
                                    }
                                    ?>" class="pull-left">
                                    <div class="pull-left">
                                        <span class="testimonials-name"><?php echo $data['client_name']; ?></span>
                                        <!--<span class="testimonials-post">Commercial Director</span>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            if ($query->num_rows() == $resultsPerPage) {
                ?>

                <div style='text-align: center;'><button class="loadmore" data-page="<?php echo $paged + 1; ?>">Load More</button></div>
                <?php
            } else {
                echo "<div style='clear:both;margin:20px'></div> <div  class='loadbutton'><h3 style='text-align: center;margin-top: 40px;'>No More Testimonials</h3></li>";
            }
        endif;
    }

    public function getEventsOnCalendar() {
        $event = $this->common_model->getRecords(TABLES::$MST_EVENTS, '');
        $events = array();
        foreach ($event as $event) {
            $data = array();
            $data['id'] = $event['id'];
            $data['title'] = $event['event_name'];
            $data['start'] = $event['start_date'];
            $data['end'] = $event['end_date'];
            $data['short_desc'] = $event['short_desc'];
            $data['long_desc'] = $event['long_desc'];
            array_push($events, $data);
        }
        echo json_encode($events);
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
