<?php
	
	class Generate_qrcode extends CI_Controller {
		
		function __construct() {
			
			parent::__construct();
			
			$this->load->helper(array('form', 'url'));
			// header('Content-Length: '.strlen($data_qrcode[0]->qr_code));
			// header('Content-type: image/png');
			// $this->load->library('form_validation');
			// $this->load->model("common_model");
			// ini_set('memory_limit', '360M');
		}
		
		function index() {
			
			/* qr code image generation Start */
			
			$this->load->library('ciqrcode');
			
			// $params['data'] = 'http://rebelute.in';
			$params['data'] =$_SESSION['user_account']['email'];
			$params['level'] = 'H';
			$params['size'] = 5;
			$params['savename'] = FCPATH.'vcard_qrcode_file/vcard_qrcode.png';
			$this->ciqrcode->generate($params);
			
			/* qr code image generation end */
			
			
			
			// echo '<img src="'.base_url().'vcard_qrcode_file/vcard_qrcode.png" />';
			
			
			$content=file_get_contents(base_url()."vcard_qrcode_file/vcard_qrcode.png");
			 //$content=mysql_escape_string($content);
			
			@list(, , $imtype, ) = getimagesize(base_url()."vcard_qrcode_file/vcard_qrcode.png");
			
			if ($imtype == 3){
				$ext="png"; 
				}elseif ($imtype == 2){
				$ext="jpeg";
				}elseif ($imtype == 1){
				$ext="gif";
			}
			
			
			$qrcode_details = array(
			'name' => $params['data'],
			'qr_code' => $content,
			'ext' => $ext
			);
			
			
			$this->load->model('qr_code');
			
			$result_ins_qrc=$this->qr_code->generate_qr_code($qrcode_details);
			
			
			
			if($result_ins_qrc){
			
				$this->template->set('page', 'view_qrcode');
				$this->template->set('page_type', 'inner');
				$this->template->set('data_qrcode',$data_qrcode);
				$this->template->set_theme('default_theme');
				$this->template->set_layout('default')
                ->title('Paasport | view_qrcode')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
				$this->template->build('view_qrcode');
			
			}	
			
		}
		
		function view_qr_code(){
			
			// $this->load->model('qr_code');
			
			 // $data_qrcode=$this->qr_code->get_qr_code($user_id);
			// print_r($qr_code_data);
			
			
			
// $data=$qr_code_data['qr_code'];	//actual image data from db for qr code 

/*display qr code start*/

// header('Content-Length: '.strlen($data));
// header("Content-type: image/".$qr_code_data['ext']);
// echo $data;

/*display qr code end*/			
			
			
			
			
				$this->template->set('page', 'view_qrcode');
				$this->template->set('page_type', 'inner');
				$this->template->set('data_qrcode',$data_qrcode);
				$this->template->set_theme('default_theme');
				$this->template->set_layout('default')
                ->title('Paasport | view_qrcode')
                ->set_partial('header', 'partials/inner_header')
                ->set_partial('footer', 'partials/inner_footer');
				$this->template->build('view_qrcode');
			
			
			// $this->load->view('testpage',$data);
			
			
			
			
			}
	}
