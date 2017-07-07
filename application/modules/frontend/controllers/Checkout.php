<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Checkout extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('cookie');
			$this->load->model("common_model");
			
			$this->sessdata = $this->session->userdata('user_account');
			//        if ($this->sessdata['purchase_pack'] == '1') {
			//            $this->sidebar = 'partials/marketplace_sidebar';
			//        } else if ($this->sessdata['purchase_pack'] == '2') {
			//            $this->sidebar = 'partials/hosting_sidebar';
			//        } else {
			//            $this->sidebar = 'partials/both_sidebar';
			//        }
		}
		
		public function index() {
                    
                    if (!$this->common_model->isLoggedIn()) {
                        redirect(base_url() . "login");
                    }
			$is_logged_in = $this->session->userdata('is_logged_in');
			$user_role = $this->session->userdata('role');
			
			
			$this->load->model('membership_model');
			$this->load->model('subscription_model');
			
			if (!empty($_SESSION['paasport_user_id'])) {
				$data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
			}
			$data['pricing_plan_total'] = $this->input->post('pricing_plan_total');
			$data['country_list'] = $this->common_model->getRecords('tbl_countries');
			
			if ($this->session->userdata('email')) {
				$data['user_details'] = $this->common_model->getRecords('membership', '*', array('email_address' => $this->session->userdata('email')), '', 1);
				} else {
				$data['user_details'] = '';
			}
			
			
			if ($this->session->userdata('user_id')) {
				$data['billing_address'] = $this->common_model->getRecords('tbl_subscription_billing_address', '*', array('user_id' => $this->session->userdata('user_id')), '', 1);
				}else{
				$data['billing_address'] = '';
			}
			
			if(empty($data['billing_address'])){
			$data['billing_address']='';
				}
				
			$data['country_code_list'] = $this->membership_model->query_get_country();
			
			$data['services'] = $this->common_model->getRecords('services', 'category');
			
			// echo "<pre>";
			// print_r($data['billing_address']);
			// print_r($this->session->all_userdata());
			// echo die();
			
			if ($this->input->post('pricing_plan_total')) {
				
				$data['pricing_plan_total'] = $this->input->post('pricing_plan_total');
				$this->session->set_userdata(array('pricing_plan_total' => $data['pricing_plan_total']));
				} else if ($this->session->userdata('pricing_plan_total')) {
				
				$data['pricing_plan_total'] = $this->session->userdata('pricing_plan_total');
				} else {
				$data['pricing_plan_total'] = '';
			}
			
			if (!empty($_SESSION['paasport_user_id'])) {
				$this->template->set('slug', $data['slug']);
			}
			$this->template->set('services', $data['services']);
			$this->template->set('country_code_list', $data['country_code_list']);
			$this->template->set('country_list', $data['country_list']);
			$this->template->set('user_details', $data['user_details']);
			$this->template->set('billing_address', $data['billing_address']);
			$this->template->set('pricing_plan_total', $data['pricing_plan_total']);
			$this->template->set('page', 'subscription');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('rpdigitel_frontend')
			->title('Home | RPDigitel')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer');
			$this->template->build('checkout');
		}
		
	}
