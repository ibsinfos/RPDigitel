<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CMS extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('cms_model');
    }

    /* Function to list CMS pages start */

    function listCMS() {
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }
        $data = $this->common_model->commonFunction();
        $data['title'] = "Manage CMS";
        $data['get_cms_list'] = $this->cms_model->getCmsList();
    	
  	    $this->template->set('page', 'cms');

        $this->template->set('get_cms_list', $data['get_cms_list']);

       // $this->template->set('user_session', $data['user_session']);

        $this->template->set_theme('default_theme');

        $this->template->set_layout('backend')

                ->title('vCard | Plans List')

                ->set_partial('header', 'partials/header')

                ->set_partial('leftpanel', 'partials/leftpanel')

                ->set_partial('footer', 'partials/footer');

        $this->template->build('cms/cms_list');
    }

    /* Function to list CMS pages end */


    /* Function to edit CMS pages start */

    function editCMS($cms_id = 0) {
       /* if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }*/
        $data = $this->common_model->commonFunction(); 
        $data['edit_id'] = $cms_id;
		
		$arrSliderData = $this->cms_model->getSliderById($cms_id);
		
		$arr_cms_details = $this->common_model->getRecords('trans_cms', '', array('cms_val_id' => $cms_id)); 
		$arr_marketing = $this->common_model->getRecords('tbl_marketing', '', array('id' => $cms_id)); 
		$arr_business = $this->common_model->getRecords('tbl_business_professional', '', array('id' => $cms_id)); 
		
		if ($this->input->post()) {
	
			$this->load->helper("file");
			
			$config['upload_path'] = 'uploads/slider/';
			$config['max_size'] = '9000000';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->set_allowed_types('gif|jpg|png|jpeg|jpe');
        		
			$image_path_1	= $arrSliderData[0]['image1'];
			$image_path_2	= $arrSliderData[0]['image2'];
			$image_path_3	= $arrSliderData[0]['image3'];
			
			$section_image_path_1	= $arr_marketing[0]['section1_image'];
			$section_image_path_2	= $arr_marketing[0]['section2_image'];
			$section_image_path_3	= $arr_marketing[0]['section3_image'];
			
			$section4_image_path_1	= $arr_business[0]['section4_image1'];
			$section4_image_path_2	= $arr_business[0]['section4_image2'];
			$section4_image_path_3	= $arr_business[0]['section4_image3'];
			$section4_image_path_4	= $arr_business[0]['section4_image4'];
			$section4_image_path_5	= $arr_business[0]['section4_image5'];
			$section4_image_path_6	= $arr_business[0]['section4_image6'];
			
			
			if(  false == empty( $_FILES['slider_image_1']['name'] )) {
					
				if( true == $this->upload->do_upload('slider_image_1') ) {
					
					$ar = list($width, $height) = getimagesize($data['full_path']);
					$upload_result1 = $this->upload->data();
					$image_config = array(
						'source_image' => $upload_result1['full_path'],
						'new_image' => "uploads/slider/1366x555",
						'maintain_ratio' => false,
						'width' => 1366,
						'height' => 555
					);
					
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/slider/'.$upload_result1['file_name'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/slider/'.$upload_result1['file_name'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					};
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					$image_path_1 =  $upload_result1['file_name'];
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/slider/'.$arrSliderData[0]['image1'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/slider/'.$arrSliderData[0]['image1'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					}
					
				} else {

					 $error = array('error' => $this->upload->display_errors());
				}
			} 
			if(  false == empty( $_FILES['slider_image_2']['name'] )) {
					
				if( true == $this->upload->do_upload('slider_image_2') ) {
					
					$ar = list($width, $height) = getimagesize($data['full_path']);
					$upload_result2 = $this->upload->data();
					$image_config = array(
						'source_image' => $upload_result2['full_path'],
						'new_image' => "uploads/slider/1366x555",
						'maintain_ratio' => false,
						'width' => 1366,
						'height' => 555
					);
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/slider/'.$upload_result2['file_name'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/slider/'.$upload_result2['file_name'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					};
					
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					$image_path_2 = $upload_result2['file_name'];
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/slider/'.$arrSliderData[0]['image2'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/slider/'.$arrSliderData[0]['image2'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					}
					
				} else {

					 $error = array('error' => $this->upload->display_errors());
				}
			}
			if(  false == empty( $_FILES['slider_image_3']['name'] )) {
					
				if( true == $this->upload->do_upload('slider_image_3') ) {
			
					$ar = list($width, $height) = getimagesize($data['full_path']);
					$upload_result3 = $this->upload->data();
					$image_config = array(
						'source_image' => $upload_result3['full_path'],
						'new_image' => "uploads/slider/1366x555",
						'maintain_ratio' => false,
						'width' => 1366,
						'height' => 555
					);
					
				    /*if( true == file_exists( $data['absolute_path'] . 'uploads/slider/'.$upload_result3['file_name'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/slider/'.$upload_result3['file_name'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					};*/
					
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					$image_path_3 = $upload_result3['file_name'];
					
					/*if( true == file_exists( $data['absolute_path'] . 'uploads/slider/'.$arrSliderData[0]['image3'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/slider/'.$arrSliderData[0]['image3'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					}*/
					
				} else {

					 $error = array('error' => $this->upload->display_errors());
				}
			}
			
			$arr_set_slider_fields = array(
									"image1_title" => $this->input->post('slider_title_1'), 
									"image1_description" => $this->input->post('slider_short_desciption_1'),
									"image1" => $image_path_1, 
									"image2_title" => $this->input->post('slider_title_2'), 
									"image2_description" => $this->input->post('slider_short_desciption_2'),
									"image2" => $image_path_2, 
									"image3_title" => $this->input->post('slider_title_3'), 
									"image3_description" => $this->input->post('slider_short_desciption_3'),
									"image3" => $image_path_3 

									);
			
            $this->common_model->updateRow('tbl_slider', $arr_set_slider_fields, array("id" => $cms_id));				
			
			if(  false == empty( $_FILES['section_image_1']['name'] )) {
					
				if( true == $this->upload->do_upload('section_image_1') ) {
					
					
					$ar = list($width, $height) = getimagesize($data['full_path']);
					$upload_result1 = $this->upload->data();
					$image_config = array(
						'source_image' => $upload_result1['full_path'],
						'new_image' => "uploads/marketing/140x140",
						'maintain_ratio' => false,
						'width' => 140,
						'height' => 140
					);
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/marketing/'.$upload_result1['file_name'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/marketing/'.$upload_result1['file_name'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					};
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					$section_image_path_1 =  $upload_result1['file_name'];
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/marketing/'.$arr_marketing[0]['image1'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/marketing/'.$arr_marketing[0]['image1'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					}
					
				} else {

					 $error = array('error' => $this->upload->display_errors());
				}
			} 
			if(  false == empty( $_FILES['section_image_2']['name'] )) {
					
				if( true == $this->upload->do_upload('section_image_2') ) {
					
					$ar = list($width, $height) = getimagesize($data['full_path']);
					$upload_result2 = $this->upload->data();
					$image_config = array(
						'source_image' => $upload_result2['full_path'],
						'new_image' => "uploads/marketing/140x140",
						'maintain_ratio' => false,
						'width' => 140,
						'height' => 140
					);
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/marketing/'.$upload_result2['file_name'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/marketing/'.$upload_result2['file_name'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					};
					
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					$section_image_path_2 = $upload_result2['file_name'];
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/marketing/'.$arr_marketing[0]['image2'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/marketing/'.$arr_marketing[0]['image2'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					}
					
				} else {

					 $error = array('error' => $this->upload->display_errors());
				}
			}
			if(  false == empty( $_FILES['section_image_3']['name'] )) {
					
				if( true == $this->upload->do_upload('section_image_3') ) {
			
					$ar = list($width, $height) = getimagesize($data['full_path']);
					$upload_result3 = $this->upload->data();
					$image_config = array(
						'source_image' => $upload_result3['full_path'],
						'new_image' => "uploads/marketing/140x140",
						'maintain_ratio' => false,
						'width' => 140,
						'height' => 140
					);
					
					
				    if( true == file_exists( $data['absolute_path'] . 'uploads/marketing/'.$upload_result3['file_name'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/marketing/'.$upload_result3['file_name'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					};
					
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					$section_image_path_3 = $upload_result3['file_name'];
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/marketing/'.$arr_marketing[0]['image3'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/marketing/'.$arr_marketing[0]['image3'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					}
					
				} else {

					 $error = array('error' => $this->upload->display_errors());
				}
			}
			
            $arr_set_section_fields = array(
									"section1_title" => $this->input->post('section_title1'),
									"section1_description" => $this->input->post('section_desc_1'),
									"section1_image" => $section_image_path_1, 
									"section2_description" => $this->input->post('section_desc_2'),
									"section2_image" => $section_image_path_2, 
									"section3_description" => $this->input->post('section_desc_3'),
									"section3_image" => $section_image_path_3 

									);
				
            $this->common_model->updateRow('tbl_marketing', $arr_set_section_fields, array("id" => $cms_id));
			
			if(  false == empty( $_FILES['section4_image_1']['name'] )) {
					
				if( true == $this->upload->do_upload('section4_image_1') ) {
					
					
					$ar = list($width, $height) = getimagesize($data['full_path']);
					$upload_result1 = $this->upload->data();
					$image_config = array(
						'source_image' => $upload_result1['full_path'],
						'new_image' => "uploads/business/104x104",
						'maintain_ratio' => false,
						'width' => 104,
						'height' => 104
					);
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/business/' . $upload_result1['file_name'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/business/' . $upload_result1['file_name'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					};
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					$section4_image_path_1 =  $upload_result1['file_name'];
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/business/'.$arr_business[0]['image1'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/business/'.$arr_business[0]['image1'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					}
					
				} else {

					 $error = array('error' => $this->upload->display_errors());
				}
			} 		
			
			if(  false == empty( $_FILES['section4_image_2']['name'] )) {
					
				if( true == $this->upload->do_upload('section4_image_2') ) {
					
					
					$ar = list($width, $height) = getimagesize($data['full_path']);
					$upload_result1 = $this->upload->data();
					$image_config = array(
						'source_image' => $upload_result1['full_path'],
						'new_image' => "uploads/business/104x104",
						'maintain_ratio' => false,
						'width' => 104,
						'height' => 104
					);
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/business/' . $upload_result1['file_name'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/business/' . $upload_result1['file_name'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					};
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					$section4_image_path_2 =  $upload_result1['file_name'];
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/business/'.$arr_business[0]['image1'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/business/'.$arr_business[0]['image1'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					}
					
				} else {

					 $error = array('error' => $this->upload->display_errors());
				}
			} 		
			
			if(  false == empty( $_FILES['section4_image_3']['name'] )) {
					
				if( true == $this->upload->do_upload('section4_image_3') ) {
					
					
					$ar = list($width, $height) = getimagesize($data['full_path']);
					$upload_result1 = $this->upload->data();
					$image_config = array(
						'source_image' => $upload_result1['full_path'],
						'new_image' => "uploads/business/104x104",
						'maintain_ratio' => false,
						'width' => 104,
						'height' => 104
					);
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/business/' . $upload_result1['file_name'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/business/' . $upload_result1['file_name'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					};
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					$section4_image_path_3 =  $upload_result1['file_name'];
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/business/'.$arr_business[0]['image1'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/business/'.$arr_business[0]['image1'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					}
					
				} else {

					 $error = array('error' => $this->upload->display_errors());
				}
			} 		
			
			if(  false == empty( $_FILES['section4_image_4']['name'] )) {
					
				if( true == $this->upload->do_upload('section4_image_4') ) {
					
					
					$ar = list($width, $height) = getimagesize($data['full_path']);
					$upload_result1 = $this->upload->data();
					$image_config = array(
						'source_image' => $upload_result1['full_path'],
						'new_image' => "uploads/business/104x104",
						'maintain_ratio' => false,
						'width' => 104,
						'height' => 104
					);
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/business/' . $upload_result1['file_name'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/business/' . $upload_result1['file_name'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					};
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					$section4_image_path_4 =  $upload_result1['file_name'];
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/business/'.$arr_business[0]['image1'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/business/'.$arr_business[0]['image1'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					}
					
				} else {

					 $error = array('error' => $this->upload->display_errors());
				}
			}
			
			if(  false == empty( $_FILES['section4_image_5']['name'] )) {
					
				if( true == $this->upload->do_upload('section4_image_5') ) {
					
					
					$ar = list($width, $height) = getimagesize($data['full_path']);
					$upload_result1 = $this->upload->data();
					$image_config = array(
						'source_image' => $upload_result1['full_path'],
						'new_image' => "uploads/business/104x104",
						'maintain_ratio' => false,
						'width' => 104,
						'height' => 104
					);
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/business/' . $upload_result1['file_name'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/business/' . $upload_result1['file_name'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					};
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					$section4_image_path_5 =  $upload_result1['file_name'];
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/business/'.$arr_business[0]['image1'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/business/'.$arr_business[0]['image1'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					}
					
				} else {

					 $error = array('error' => $this->upload->display_errors());
				}
			}
			
			if(  false == empty( $_FILES['section4_image_6']['name'] )) {
					
				if( true == $this->upload->do_upload('section4_image_6') ) {
					
					
					$ar = list($width, $height) = getimagesize($data['full_path']);
					$upload_result1 = $this->upload->data();
					$image_config = array(
						'source_image' => $upload_result1['full_path'],
						'new_image' => "uploads/business/104x104",
						'maintain_ratio' => false,
						'width' => 104,
						'height' => 104
					);
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/business/' . $upload_result1['file_name'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/business/' . $upload_result1['file_name'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					};
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$resize_rc = $this->image_lib->resize();
					$section4_image_path_6 =  $upload_result1['file_name'];
					
					if( true == file_exists( $data['absolute_path'] . 'uploads/business/'.$arr_business[0]['image1'] )) {

						if( false == unlink( $data['absolute_path'] . 'uploads/business/'.$arr_business[0]['image1'] )) {
							$strMsg	.= "Error deleting old file, ";
						}
					}
					
				} else {

					 $error = array('error' => $this->upload->display_errors());
				}
			}
			
			$arr_set_section4_fields = array(
				"section4_title" => $this->input->post('section4_title'),
				"section4_image1" => $section4_image_path_1, 
				"section4_image2" => $section4_image_path_2, 
				"section4_image3" => $section4_image_path_3, 
				"section4_image4" => $section4_image_path_4, 
				"section4_image5" => $section4_image_path_5,
				"section4_image6" => $section4_image_path_6 
			);
			
			$this->common_model->updateRow('tbl_business_professional', $arr_set_section4_fields, array("id" => $cms_id));
			 
            $arr_set_fields = array("status" => $this->input->post('status'), "on_date" => date('Y-m-d H:i:s'));
            $this->common_model->updateRow('mst_cms', $arr_set_fields, array("cms_id" => $cms_id));
			
				/*"link" => $this->input->post('link'),*/
            $arr_trans_set_fields = array(
                "page_content" => $this->input->post('productdescription'),
				"pricing" => $this->input->post('pricing_description'),
				"marketing_description" => $this->input->post('marketing_content'),
                "toll_free_number" => $this->input->post('toll_free_number')
            );
            $this->common_model->updateRow('trans_cms', $arr_trans_set_fields, array("cms_id" => $cms_id));
            $this->session->set_userdata("msg", "<span class='success'>Cms page updated successfully.</span>");
            redirect(base_url() . 'backend/cms/listCMS');
        }
        $cms_id = base64_decode($cms_id);
        $data['title'] = "Edit CMS";
        $data['arr_cms_details'] = $this->cms_model->getCMS($cms_id);
		
       // $data['arr_active_admin_details'] = $this->common_model->getRecords('user', '', array('id' => '1')); 
       /* $data['main'] = 'backend/cms/cms_edit';
        $this->load->view('backend/index', $data);*/
		
		$this->template->set('page', 'cms');
		
		$this->template->set('edit_id', $data['edit_id']);
		$this->template->set('arrSliderData', $arrSliderData);
		$this->template->set('arr_cms_details', $arr_cms_details);
		$this->template->set('arr_marketing', $arr_marketing);
		$this->template->set('arr_business', $arr_business);

        $this->template->set('user_session', $data['user_session']);

        $this->template->set_theme('default_theme');

        $this->template->set_layout('backend')

                ->title('vCard | cms List')

                ->set_partial('header', 'partials/header')

                ->set_partial('leftpanel', 'partials/leftpanel')

                ->set_partial('footer', 'partials/footer');

        $this->template->build('cms/cms_edit');
    }

    /* Function to edit CMS pages end */



    /* This code is used for displaying cms page. */

    public function cmsPage($page_name) {
		$data = array();
       /* $data = $this->common_model->commonFunction();
        $data['global'] = $this->common_model->getGlobalSettings();
        $data['user_session'] = $data['user_account'];

        $data['arr_cms'] = $this->cms_model->getCMSByAlias($page_name, $this->session->userdata('language_id'));

        if (count($data['arr_cms']) == 0) {
            $this->session->set_userdata('success_message', "<strong>Sorry!</strong>  Page content not available.");
            redirect(base_url());
        }
        if ($data['arr_cms'][0]['cms_title'] == 'contact-us') {
            $var_array = array(
                "%%contact_mail%%" => $global['contact_mail'],
                "%%email%%" => $global['email'],
                "%%contact_phone_number%%" => $global['contact_phone_number']
            );
            foreach ($var_array as $k => $v) {
                $data['arr_cms'][0]['page_content'] = str_replace($k, $v, $data['arr_cms'][0]['page_content']);
            }
        }
        if ($data['arr_cms'][0]['page_title'] == '') {
            $data['header']['title'] = ucwords($global['site_title']);
        } else {
            $data['header']['title'] = ucwords($data['arr_cms'][0]['page_title']);
        }*/
       /* $this->load->view("front/includes/header", $data);*/
        // $this->load->view("front/includes/header-2", $data);
       /* $this->load->view('front/cms', $data);
        $this->load->view("front/includes/footer");*/
		
		  $this->template->set('page', 'cms');

       // $this->template->set('arr_price_data', $data['arr_price_data']);

       // $this->template->set('user_session', $data['user_session']);

        $this->template->set_theme('default_theme');

        $this->template->set_layout('backend')

                ->title('vCard | Plans List')

                ->set_partial('header', 'partials/header')

                ->set_partial('leftpanel', 'partials/leftpanel')

                ->set_partial('footer', 'partials/footer');

        $this->template->build('cms/cms_edit');
    }

    /* Function to upload CMS images start */

    public function uploadImage() {
        ob_clean();
        if ($_FILES["imageName"]['name'] != "") {
            $file_destination1 = "media/backend/img/cle-images/" . str_replace(" ", "_", microtime()) . "." . strtolower(end(explode(".", $_FILES["imageName"]['name'])));
            $file_destination = $this->common_model->absolutePath() . $file_destination1;

            move_uploaded_file($_FILES['imageName']['tmp_name'], $file_destination);
            ?> 
            <div id="image"><?php echo base_url() . $file_destination1; ?></div>
            <?php
        } else
            echo "false";
    }

    /* Function to upload CMS images end */


    /* Function to upload editor images start */

    public function editorImageUpload() {
        if ($_FILES['upload']['name'] != '') {
            $filename = time() . "." . strtolower(end(explode(".", $_FILES['upload']["name"])));
            move_uploaded_file($_FILES['upload']["tmp_name"], "media/front/img/" . $filename);
            ?><script type="text/javascript">window.parent.CKEDITOR.tools.callFunction(1, "/p930/phase-IV/media/front/img/<?php echo $filename; ?>", '');</script><?php
        }
    }

    /* Function to upload editor images end */
}
