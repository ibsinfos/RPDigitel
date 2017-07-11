<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Community extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        $this->load->helper('text');
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model("common_model");
        $this->session = $this->session->userdata('user_account');
        $this->sidebar = 'partials/hosting_sidebar';
        /* if (!$this->common_model->isLoggedIn())  {
          redirect(base_url());
          } */
    }

    public function community() {
        $latest_news = $this->common_model->getRecords(TABLES::$NEWS, '*', array('latest' => '1'), 'id DESC', '5');
        $slider = $this->common_model->getRecords(TABLES::$COMMUNITY_SLIDER, '*', '', 'id DESC');
        $category = $this->common_model->getRecords(TABLES::$NEWS, '*', array('header' => 1), 'id DESC', 2);
        $category_slider = $this->common_model->getRecords(TABLES::$NEWS, '*', array('category_slider' => 1), 'id DESC');
        $other = $this->common_model->getRecords(TABLES::$NEWS, '*', array('category LIKE' => ''), 'id DESC', '3');
        $featured = $this->common_model->getRecords(TABLES::$NEWS, '*', array('featured' => 1), 'id DESC', '3');
        $fashion_category = $this->common_model->getRecords(TABLES::$NEWS, '*', array('category LIKE' => '%1%'), 'id DESC', '2');
        $entertainment_category = $this->common_model->getRecords(TABLES::$NEWS, '*', array('category LIKE' => '%2%'), 'id DESC', '3');
        $events = $this->common_model->getRecords(TABLES::$MST_EVENTS, '*', '', 'id desc');
        $latest_active_users = $this->common_model->getRecords(TABLES::$USERS, 'user_image', array('user_status' => '1'), 'last_visit_date DESC','20');
        


         $query_get_country = $this->db->get('country');
        $data['country_list'] = $query_get_country->result();
        
        $this->template->set('country_list', $data['country_list']);



        $this->template->set('communityClass', $this);
        $this->template->set('latest_users', $latest_active_users);
        $this->template->set('events', $events);
        $this->template->set('fashion_category', $fashion_category);
        $this->template->set('entertainment_category', $entertainment_category);
        $this->template->set('featured', $featured);
        $this->template->set('category_slider', $category_slider);
        $this->template->set('other', $other);
        $this->template->set('category', $category);
        $this->template->set('slider', $slider);
        $this->template->set('latest_news', $latest_news);
        $this->template->set('page', 'community');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('backend_community')
                ->title('Silo | Community')
                ->set_partial('header', 'partials/header_community')
                ->set_partial('footer', 'partials/footer_community');
        $this->template->build('community');
    }

    public function getCategoryName($id = null) {
        $name = '';
        $category = $this->common_model->getRecords(TABLES::$CATEGORY, '*', array('id' => $id));
        $name = $category[0]['name'];
        return $name;
    }

}
