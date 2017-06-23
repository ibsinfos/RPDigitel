<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class create_pdf extends CI_Controller {
		
		public function index() {	
			
			
			$this->load->library('fpdf_gen');
			
			
				
			$this->load->model('common_model');

				$user = $this->common_model->getRecords(TABLES::$VCARD_BASIC_DETAILS, '*', array('user_id'=>$_SESSION['paasport_user_id']),'',1);
							
			$pdf = new FPDI();
			$pdf->AddPage();
			
			// $filename='fpdf/ARAWALI APPLICATION FORM DOWNLOAD.pdf';
			// $filename=base_url().'assets/ARAWALI APPLICATION FORM DOWNLOAD.pdf';
			// $filename='C:/xampp/htdocs/RPDigitel/assets/ADD_PRODUCT_PDF.pdf';
			$filename='./assets/ADD_PRODUCT_PDF.pdf';
			
			$pdf->setSourceFile($filename); 
			
			// import page 1 
			$tplIdx = $pdf->importPage(1); 
			//use the imported page and place it at point 0,0; calculate width and height
			//automaticallay and ajust the page size to the size of the imported page 
			$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 
			
			// now write some text above the imported page 
			$pdf->SetFont('Arial', '', '13'); 
			$pdf->SetTextColor(0,0,0);
			
			
			$pdf->AddPage(); 
			
			$pdf->setSourceFile($filename); 
			// import page 1 
			$tplIdx = $pdf->importPage(2); 
			//use the imported page and place it at point 0,0; calculate width and height
			//automaticallay and ajust the page size to the size of the imported page 
			$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 
			
			// now write some text above the imported page 
			$pdf->SetFont('Arial', '', '13'); 
			$pdf->SetTextColor(0,0,0);
			
			
			$pdf->AddPage(); 
			
			$pdf->setSourceFile($filename); 
			// import page 1 
			$tplIdx = $pdf->importPage(3); 
			//use the imported page and place it at point 0,0; calculate width and height
			//automaticallay and ajust the page size to the size of the imported page 
			$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 
			
			// now write some text above the imported page 
			$pdf->SetFont('Arial', '', '13'); 
			$pdf->SetTextColor(0,0,0);
			
			$pdf->AddPage(); 
			
			$pdf->setSourceFile($filename); 
			// import page 1 
			$tplIdx = $pdf->importPage(4); 
			//use the imported page and place it at point 0,0; calculate width and height
			//automaticallay and ajust the page size to the size of the imported page 
			$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 
			
			// now write some text above the imported page 
			$pdf->SetFont('Arial', '', '13'); 
			$pdf->SetTextColor(0,0,0);
			
			/* ########## Starting the code for  adding the 2nd page ######################*/
			$pdf->AddPage();
			$pdf->setSourceFile($filename); 
			$tplIdx = $pdf->importPage(5); 
			$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 
			
			// now write some text above the imported page 
			$pdf->SetFont('Arial', '', '11'); 
			$pdf->SetTextColor(0,0,0);
			
			$date = date('d F Y');
			//set position in pdf document
			$pdf->SetXY(172, 75);
			//first parameter defines the line height
			$pdf->Write(0, $date);
			
			// setting the serial number
			$insert_id=44;
			$serial_number = '00'.$insert_id;
			
			$pdf->SetXY(183, 20);
			$pdf->Write(0, $serial_number);
			
			//setting the amoutn in figures
			$pdf->SetFont('Arial', '', '11');
			$pdf->SetXY(70, 193);
			$pdf->Write(0, '86,560/-');
			
			//setting the ampunt in words
			$pdf->SetFont('Arial', '', '9');
			$pdf->SetXY(120, 193);
			$pdf->Write(0, $user[0]['home_address']);
			
			//setting the carpet area
			$pdf->SetXY(150, 216);
			$pdf->Write(0, '43.37');
			
			
			
			/* ########## Starting the code for  adding the 3rd page ######################*/
			
			$pdf->AddPage();
			$pdf->setSourceFile($filename);
			$tplIdx = $pdf->importPage(6); 
			$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 
			$pdf->SetFont('Arial', '', '11'); 
			$pdf->SetTextColor(85,85,85);
			
			/*   ##############   Setting the values here to be shown in the form   ################  */
			
			
			
			$pdf->Output('ADD_PRODUCT_PDF_OUTPUT.pdf', 'D');
			
			
		}
	}
