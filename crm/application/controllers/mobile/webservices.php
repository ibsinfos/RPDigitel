<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class webservices extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct() {
        parent::__construct();
		//$this->load->library('excel');
		//require_once APPPATH."/libraries/phpToPDF.php";
        		
    }
	
	
	
	public function register_user()
	{
		// first chekecking whether the profile image is there or not
		if(isset($_FILES['profile_image']['name']))
		{
			/*  **********  Code For Image Upload ********* */
			 $filename = time().$_FILES['profile_image']['name'];
			 $filename = str_replace(" ","_",$filename);
			 $filename = str_replace("#","",$filename);
			 $filename = str_replace("-","",$filename);
			 
			 $config['allowed_types']  = '*';
			 $config['upload_path'] = './uploads/';
			 $config['file_name']  = $filename;
			 $this->load->library('upload', $config);
			 $this->upload->do_upload('profile_image');
			
			/*  **********  End Code For Image Upload ********* */
		}
		else
		{
			$filename = "";
		}
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->register_userModel($_POST,$filename);
		echo json_encode($data);
	}
	
	public function test_crm()
	{
	echo "sdsdsd";
	}
	
	public function login_user()
	{
		//require_once dirname(__FILE__) . '/../libraries/MCrypt.php';
		//$mcrypt = new MCrypt();
		#Encrypt
		//$encrypted = $mcrypt->encrypt("Shradha Soni Saha");
		//$decrypted = $mcrypt->decrypt($encrypted);
		
		if(isset($_FILES['profile_image']['name']))
		 {
		
			 $filename = time().$_FILES['profile_image']['name'];
			 $filename = str_replace(" ","_",$filename);
		     $filename = str_replace("#","",$filename);
		     $filename = str_replace("-","",$filename);
			 
			 
			 $config['allowed_types']  = '*';
			 $config['upload_path'] = './uploads/';
			 $config['file_name']  = $filename;
			 $this->load->library('upload', $config);
			 $this->upload->do_upload('profile_image');
			
			/*  **********  End Code For Image Upload ********* */
			
		}
		else
		 {
			$filename=""; 
		 }
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->login_userModel($_POST,$filename);
		echo json_encode($data);
	}
	
	public function update_profile()
	{
		/*  **********  Code For Image Upload ********* */
		
		
		/*
		$filename = time().'_'.'user_image.jpg';
        $path = 'uploads/' ;
		
		
	    $base=$_POST['profile_image'];
		$binary=base64_decode($base);
		header('Content-Type: bitmap; charset=utf-8');
		$file = fopen($path.$filename, 'wb');
		fwrite($file, $binary);
		fclose($file);
		*/
		
		
		 //  checking if the image is beig uploaded or not
		 
		 if(isset($_FILES['profile_image']['name']))
		 {
		
			 $filename = time().$_FILES['profile_image']['name'];
			 $filename = str_replace(" ","_",$filename);
		     $filename = str_replace("#","",$filename);
		     $filename = str_replace("-","",$filename);
			 
			 $config['allowed_types']  = '*';
			 $config['upload_path'] = './uploads/';
			 $config['file_name']  = $filename;
			 $this->load->library('upload', $config);
			 $this->upload->do_upload('profile_image');
			
			/*  **********  End Code For Image Upload ********* */
			
			
			/*  ********* Deleting the old imgage  ********** */
			$old_image = $_POST['old_image'];
			if($old_image!="uploads/no_image.png")
			{
			   @unlink($old_image);
			}
		 }
		 else
		 {
			$filename=""; 
		 }
		
		
		
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->update_userModel($_POST,$filename);
		echo json_encode($data);
	}

    public function showregister_form()
	{
		$this->load->view('mobile/register');
	}
	
	public function showccavenue_form()
	{
		$this->load->view('mobile/ccavenue');
	}

    public function  showlogin_form()
	{
		$payment_status = "Success";
		$data['order_status'] = $payment_status;
		$this->load->view('mobile/payment_response',$data); 
		//echo $_SERVER['DOCUMENT_ROOT'];die;
		/*$dp = $_SERVER['DOCUMENT_ROOT'];
		list($width, $height) = getimagesize("$dp/uploads/22572554-glossy-blue-letter-n-3d-icon.jpg"); echo $width; echo "<br>"; echo $height; echo "<br>";
		$filesize= filesize("$dp/uploads/22572554-glossy-blue-letter-n-3d-icon.jpg"); 
		echo ceil($filesize/1024) ; die;*/
		//$this->load->view('mobile/login');
	}
	
	public function  showMail_form()
	{
		$this->load->view('mobile/send_mail');
	}
	
	public function  showestimate_form()
	{
		$this->load->view('mobile/get_estimate_list');
	}
	
	public function  saveUserInfoAndMail()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->saveUserInfoAndMail($_POST);
		echo json_encode($data);
	}
	
	public function register_guestUser()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->register_guestUserModel($_POST);
		echo json_encode($data);
	}
	
	public function getCompanyList()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getCompanyListModel();
		echo json_encode($data);
	}
	
	public function getestimateList()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getestimateListModel($_POST);
		echo json_encode($data);
	}
	
	public function getEstimateDetail()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getEstimateDetailModel($_POST);
		echo json_encode($data);
	}
	
	public function getProjectList()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getProjectListModel($_POST);
		echo json_encode($data);
	}
	
	public function getProjectDetail()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getProjectDetailModel($_POST);
		echo json_encode($data);
	}
	
	public function getBuglists()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getBuglistsModel($_POST);
		echo json_encode($data);
	}
	
	public function getBugDetails()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getBugDetailsModel($_POST);
		echo json_encode($data);
	}
	
	public function getBugcomments()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getBugcommentsModel($_POST);
		echo json_encode($data);
	}
	
	public function saveNewBugComment()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->saveNewBugCommentModel($_POST);
		echo json_encode($data);
	}
	
	public function getInvoicesList()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getInvoicesListModel($_POST);
		echo json_encode($data);
	}
	
	public function getInvoiceDetails()
	{
		$invoices_id  = $this->input->post('invoices_id');
		$this->load->model('mobile/webservices_model');
		// checking whether invoices pdf is created
		
		$check = $this->webservices_model->checkInvoicePdfCreated($invoices_id); 
		if($check->invoice_created ==0)
		{
			$this->load->model('invoice_model');
			$data['invoice_info'] = $this->invoice_model->check_by(array('invoices_id' => $invoices_id), 'tbl_invoices');
			$data['title'] = "Invoice PDF"; //Page title                             
			$this->load->helper('dompdf');
			$viewfile = $this->load->view('admin/invoice/invoice_pdf', $data, TRUE);
			pdf_download($viewfile, 'Invoice_' . $data['invoice_info']->reference_no);
			
			$filename = 'Invoice_' . $data['invoice_info']->reference_no;
		}
		else
		{
			$filename = 'Invoice_' . $check->reference_no;
		}
		
		$data = $this->webservices_model->getInvoiceDetailsModel($_POST,$filename);
		echo json_encode($data);
	}
	
	public function getTicketsList()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getTicketsListModel($_POST);
		echo json_encode($data);
	}
	public function getTicketDetail()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getTicketDetailModel($_POST);
		echo json_encode($data);
	}
	
	public function saveAttachmentForBug()
	{
		/*  **********  Code For Image Upload ********* */
		
		 $filename = time().$_FILES['image']['name'];
		 $filename = str_replace(" ","_",$filename);
		 $filename = str_replace("#","",$filename);
		 $filename = str_replace("-","",$filename);
		 
		 
		 $config['allowed_types']  = '*';
		 $config['upload_path'] = './uploads/';
		 $config['file_name']  = $filename;
		 $this->load->library('upload', $config);
		 $this->upload->do_upload('image');
		
		/*  **********  End Code For Image Upload ********* */
		
		/*   ********Start OF getting the  width , height of the image that is saved ********  */
		
		$dp = $_SERVER['DOCUMENT_ROOT'];
		list($width, $height) = getimagesize("$dp/uploads/$filename"); 
		$filesize= filesize("$dp/uploads/$filename"); 
		$filesize = ceil($filesize/1024) ;
		
		/*   ********Start OF getting the  width , height of the image that is saved ********  */
		
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->saveAttachmentForBugModel($_POST,$width,$height,$filesize,$filename);
		echo json_encode($data);
		
		
		
	}
	
	public function getProjectCommentsList()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getProjectCommentsListModel($_POST);
		echo json_encode($data);
	}
	
	public function saveNewProjectComment()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->saveNewProjectCommentModel($_POST);
		echo json_encode($data);
	}
	
	public function saveAttachmentForProject()
	{
		/*  **********  Code For Image Upload ********* */
		
		
		 $filename = time().$_FILES['image']['name'];
		 $filename = str_replace(" ","_",$filename);
		 $filename = str_replace("#","",$filename);
		 $filename = str_replace("-","",$filename);
		 
		 
		 $config['allowed_types']  = '*';
		 $config['upload_path'] = './uploads/';
		 $config['file_name']  = $filename;
		 $this->load->library('upload', $config);
		 $this->upload->do_upload('image');
		
		
		/*  **********  End Code For Image Upload ********* */
		
		/*   ********Start OF getting the  width , height of the image that is saved ********  */
		
		$dp = $_SERVER['DOCUMENT_ROOT'];
		list($width, $height) = getimagesize("$dp/uploads/$filename"); 
		$filesize= filesize("$dp/uploads/$filename"); 
		$filesize = ceil($filesize/1024) ;
		
		/*   ********Start OF getting the  width , height of the image that is saved ********  */
		
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->saveAttachmentForProjectModel($_POST,$width,$height,$filesize,$filename);
		echo json_encode($data);
		
		
		
	}
	
	
	public function saveTicketComment()
	{
		if( !empty( $_FILES['image']['name'] ) )
		{
		
				/*  **********  Code For Image Upload ********* */
				 $filename = time().$_FILES['image']['name'];
				 $filename = str_replace(" ","_",$filename);
				 $filename = str_replace("#","",$filename);
				 $filename = str_replace("-","",$filename);
				 
				 $config['allowed_types']  = '*';
				 $config['upload_path'] = './uploads/';
				 $config['file_name']  = $filename;
				 $this->load->library('upload', $config);
				 $this->upload->do_upload('image');
				
				/*  **********  End Code For Image Upload ********* */
				
				/*   ********Start OF getting the  width , height of the image that is saved ********  */
				
				$dp = $_SERVER['DOCUMENT_ROOT'];
				list($width, $height) = getimagesize("$dp/uploads/$filename"); 
				$filesize= filesize("$dp/uploads/$filename"); 
				$filesize = ceil($filesize/1024) ;
				
				/*   ********Start OF getting the  width , height of the image that is saved ********  */
		}
		else
		{
			$width = "";
			$height = "";
			$filesize = "";
			$filename = "";
			
		}
		
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->saveTicketCommentModel($_POST,$width,$height,$filesize,$filename);
		echo json_encode($data);
	}
	
	public function getTicketcommentList()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getTicketcommentListModel($_POST);
		echo json_encode($data);
	}
	
	public function getTaskList()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getTaskListModel($_POST);
		echo json_encode($data);
	}
	
	public function getTaskDetails()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getTaskDetailsModel($_POST);
		echo json_encode($data);
	}
	
	public function getTaskComments()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getTaskCommentsModel($_POST);
		echo json_encode($data);
	}
	
	public function saveNewTaskComment()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->saveNewTaskCommentModel($_POST);
		echo json_encode($data);
	}
	
	public function saveTaskAttachment()
	{
		/*  **********  Code For Image Upload ********* */
		 $filename = time().$_FILES['image']['name'];
		 $filename = str_replace(" ","_",$filename);
		 $filename = str_replace("#","",$filename);
		 $filename = str_replace("-","",$filename);
		 
		 $config['allowed_types']  = '*';
		 $config['upload_path'] = './uploads/';
		 $config['file_name']  = $filename;
		 $this->load->library('upload', $config);
		 $this->upload->do_upload('image');
		
		/*  **********  End Code For Image Upload ********* */
		
		/*   ********Start OF getting the  width , height of the image that is saved ********  */
		
		$dp = $_SERVER['DOCUMENT_ROOT'];
		list($width, $height) = getimagesize("$dp/uploads/$filename"); 
		$filesize= filesize("$dp/uploads/$filename"); 
		$filesize = ceil($filesize/1024) ;
		
		/*   ********Start OF getting the  width , height of the image that is saved ********  */
		
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->saveTaskAttachmentModel($_POST,$width,$height,$filesize,$filename);
		echo json_encode($data);
	}
	
	public function  getRecentActivitiesBugs()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getRecentActivitiesBugsModel($_POST);
		echo json_encode($data);
	}
	
	public function getRecentActivitiesProjects()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getRecentActivitiesProjectsModel($_POST);
		echo json_encode($data);
	}
	
	public function getPaymentListClient()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getPaymentListClientModel($_POST);
		echo json_encode($data);
	}
	
	public function getPaymentDetails()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getPaymentDetailsModel($_POST);
		echo json_encode($data);
	}
	
	public function saveInvoicePaypalpayment()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->saveInvoicePaypalpaymentModel($_POST);
		echo json_encode($data);
	}
	
	public function changeStatusOfEstimates()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->changeStatusOfEstimatesModel($_POST);
		echo json_encode($data);
	}
	
	public function saveNewTask()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->saveNewTaskModel($_POST);
		echo json_encode($data);
	}
	
	public function getStaffList()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getStaffListModel($_POST);
		echo json_encode($data);
	}
	
	public function saveNewTicket()
	{
		if( !empty( $_FILES['image']['name'] ) )
		{
			/*  **********  Code For Image Upload ********* */
			 $filename = time().$_FILES['image']['name'];
			 $filename = str_replace(" ","_",$filename);
		     $filename = str_replace("#","",$filename);
		     $filename = str_replace("-","",$filename);
			 
			 $config['allowed_types']  = '*';
			 $config['upload_path'] = './uploads/';
			 $config['file_name']  = $filename;
			 $this->load->library('upload', $config);
			 $this->upload->do_upload('image');
			
			/*  **********  End Code For Image Upload ********* */
			
			/*   ********Start OF getting the  width , height of the image that is saved ********  */
			
			$dp = $_SERVER['DOCUMENT_ROOT'];
			list($width, $height) = getimagesize("$dp/uploads/$filename"); 
			$filesize= filesize("$dp/uploads/$filename"); 
			$filesize = ceil($filesize/1024) ;
			
			/*   ********Start OF getting the  width , height of the image that is saved ********  */
		}
		else
		{
			$width = "";
			$height = "";
			$filesize = "";
			$filename = "";
		}
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->saveNewTicketModel($_POST,$width,$height,$filesize,$filename);
		echo json_encode($data);
	}
	
	public function getDepartmentList()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getDepartmentListModel();
		echo json_encode($data);
	}
	
	public function getForgotPasswordKey()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getForgotPasswordKeyModel($_POST);
		echo json_encode($data);
	}
	
	public function validatePasswordKey()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->validatePasswordKeyModel($_POST);
		echo json_encode($data);
	}
	
	public function setNewUserForgotPassword()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->setNewUserForgotPasswordModel($_POST);
		echo json_encode($data);
	}
	
	public function getDashboardClient()
	{
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->getDashboardClientModel($_POST);
		echo json_encode($data);
	}
	
	public function checkSocialAlreadyRegistered()
	{ 
		$this->load->model('mobile/webservices_model');
		$data = $this->webservices_model->checkSocialAlreadyRegisteredModel($_POST);
		echo json_encode($data);
	}
	
	public function getBugAttachmentListClient()
    {
        $this->load->model('mobile/webservices_model');
        $data = $this->webservices_model->getBugAttachmentListClientModel($_POST);
        echo json_encode($data);
    }
	
	public function ProjectAttachmentListClient()
    {
        $this->load->model('mobile/webservices_model');
        $data = $this->webservices_model->ProjectAttachmentListClientModel($_POST);
        echo json_encode($data);
    }
	
	public function getTaskAttachmentListClient()
    {
        $this->load->model('mobile/webservices_model');
        $data = $this->webservices_model->getTaskAttachmentListClientModel($_POST);
        echo json_encode($data);
    }
	
	public function deleteBugAttachmentClient()
    {
        $this->load->model('mobile/webservices_model');
        $data = $this->webservices_model->deleteBugAttachmentClientModel($_POST);
        echo json_encode($data);
    }
	
	public function deleteTaskAttachmentClient()
    {
        $this->load->model('mobile/webservices_model');
        $data = $this->webservices_model->deleteTaskAttachmentClientModel($_POST);
        echo json_encode($data);
    }
	
	public function deleteProjectAttachmentClient()
    {
        $this->load->model('mobile/webservices_model');
        $data = $this->webservices_model->deleteProjectAttachmentClientModel($_POST);
        echo json_encode($data);
    }
	
	public function createNewBugClient()
    {
        $this->load->model('mobile/webservices_model');
        $data = $this->webservices_model->createNewBugClientModel($_POST);
        echo json_encode($data);
    }
	
	public function getAllProjectsListByClient()
    {
        $this->load->model('mobile/webservices_model');
        $data = $this->webservices_model->getAllProjectsListByClientMOdel($_POST);
        echo json_encode($data);
    }
	
	
	public function getRSAPayments()
	{
		//echo "<pre>"; print_r($_POST);die;
		$url = "https://secure.ccavenue.com/transaction/getRSAKey";
		$fields = array(
				'access_code'=>"AVYN65DF63AS27NYSA",
				'order_id'=>$_POST['order_id']
		);

		$postvars='';
		$sep='';
		foreach($fields as $key=>$value)
		{
				$postvars.= $sep.urlencode($key).'='.urlencode($value);
				$sep='&';
		}

		$ch = curl_init();

		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POST,count($fields));
		curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'].'cacert.pem');
		curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);

		echo $result;
	}
	
	public function ccavResponseHandler()
	{
		require_once dirname(__FILE__) . '/../../libraries/Crypto.php';
		$crypto = new Crypto();
		
		
		$workingKey='CE9A16FFB41056733FE9FB0B925AD215';		//Working Key should be provided here.
		$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
		$rcvdString=$crypto->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		$order_status="";
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		/*
		echo "<center>";

		for($i = 0; $i < $dataSize; $i++) 
		{
			$information=explode('=',$decryptValues[$i]);
			if($i==3)	$order_status=$information[1];
		}

		if($order_status==="Success")
		{
			echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
			
		}
		else if($order_status==="Aborted")
		{
			echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
		
		}
		else if($order_status==="Failure")
		{
			echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
		}
		else
		{
			echo "<br>Security Error. Illegal access detected";
		
		}

		echo "<br><br>";

		echo "<table cellspacing=4 cellpadding=4>";
		for($i = 0; $i < $dataSize; $i++) 
		{
			$information=explode('=',$decryptValues[$i]);
				echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
		}

		echo "</table><br>";
		echo "</center>";
		*/
		for($i = 0; $i < $dataSize; $i++) 
		{
			$information=explode('=',$decryptValues[$i]);
			//echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
			
			$transaction_array[$information[0]] = $information[1];
		}
		
		//echo "<pre>";print_r($transaction_array);
		
		$invoice_number = $transaction_array['order_id'];
		$transaction_id = $transaction_array['tracking_id'];
		$payment_status = $transaction_array['order_status'];
		$payment_message = $transaction_array['status_message'];
		$currency = $transaction_array['currency'];
		$amount = $transaction_array['amount'];
		$user_id = $transaction_array['merchant_param1'];
		$payer_email = $transaction_array['billing_email'];
		
		
		$this->load->model('mobile/webservices_model');
		$this->webservices_model->saveInvoiceStatusModel($invoice_number,$transaction_id,$payment_status,$payment_message,$currency,$amount,$user_id,$payer_email);
		$data['order_status'] = $payment_status;
		$this->load->view('mobile/payment_response',$data);
		
	
	}
	
	
	
	public function send_mail()
	{
		
		$config['useragent'] = 'Rebelute Digital Mailing System';
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$company_email = 'admin@rebelute.com';
		$company_name = 'Rebelute Digital Solutions';
		$subject = 'New Project Comment';
		$name = "Sam John";
		$data['name'] = $name;
        //$message = $this->load->view('mail/dashboard',$data,true);
		$bug_id = 1;
        
		/*
		$message = '<p>Hi there,</p><p>A new attachment&nbsp;has been uploaded by {UPLOADED_BY} to issue {BUG_TITLE}.</p><p>You can view the bug using the link below.</p><p><br /><big><strong><a href="{BUG_URL}">View Bug</a></strong></big></p><p><br />Regards<br />The {SITE_NAME} Team</p>';
		$bug_name = str_replace("{BUG_TITLE}", 'Test Bug', $message);
		$assigned_by = str_replace("{UPLOADED_BY}", ucfirst('Soumen kumar saha'), $bug_name);
		$Link = str_replace("{BUG_URL}", base_url() . 'admin/bugs/view_bug_details/' . $bug_id .'/'.'3', $assigned_by);
		$message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $Link);
		*/
		$project_name = "Tets Project";
		$commented_by = "soumen kumar saha";
		$mail_comment ="This is a  test comment";
		$project_id = 2;
		$message = '<p>Hi There,</p><p>A new comment has been posted by <strong>{POSTED_BY}</strong> to project <strong>{PROJECT_NAME}</strong>.</p><p>You can view the comment using the link below:<br /><big><a href="{COMMENT_URL}"><strong>View Project</strong></a></big><br /><br /><em>'.$mail_comment.'</em><br /><br />Best Regards,<br />The {SITE_NAME} Team</p>';
		$projectName = str_replace("{PROJECT_NAME}",$project_name,$message);

		$assigned_by = str_replace("{POSTED_BY}", ucfirst($commented_by), $projectName);
		$Link = str_replace("{COMMENT_URL}", base_url() . 'admin/project/project_details/' . $project_id . '/' . '3', $assigned_by);
		$comments = str_replace("{COMMENT_MESSAGE}",$mail_comment,$Link);
		$message = str_replace("{SITE_NAME}", 'Rebelute Digital Solutions', $Link);
		//echo $message; die;
		$this->load->library('email', $config);
		
		$this->email->from($company_email, $company_name);
		$this->email->to('soumens@rebelute.com');

		$this->email->subject($subject);
		$this->email->message($message);
		/*if ($params['resourceed_file'] != '') {
			$this->email->resource($params['resourceed_file']);
		}*/
		$send = $this->email->send();
		if ($send) {
			return $send;
		} else {
			$error = show_error($this->email->print_debugger());
			return $error;
		}
		
		
	}
	
	
	
	
	
	public function send_notification() {
        
		// API access key from Google API's Console
        define( 'API_ACCESS_KEY', 'AIzaSyCAGDI1acoDShl9NSOzXUtXTr7dQjKkx-k');
		$device_id="fhTrs_MFsOc:APA91bEPsji2ruUSxyCPAn48J7FWHdFBzZpw4krPRhAHUHwAIe_9Kuhee6egG9FJm7hCswXFzaq9CYjpM54IfgcMhtsIBSy9GDBRdAxZhg-jXadHxIsC8mV0rV7fIhQmAfWBX-YcGxSC";
		$registrationIds = array($device_id);
		// prep the bundle
		$msg = array
		(
			'message' 	=> 'here is a message. message',
			'title'		=> 'This is a title. title',
			'subtitle'	=> 'This is a subtitle. subtitle',
			'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
			'vibrate'	=> 1,
			'sound'		=> 1,
			'largeIcon'	=> 'large_icon',
			'smallIcon'	=> 'small_icon'
		);
		$fields = array
		(
			'registration_ids' 	=> $registrationIds,
			'data'			=> $msg
		);
		 
		$headers = array
		(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		 
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		echo $result;
    }
	
	public function testFileUpload()
	{
		
		 $filename = "Soumen".$_FILES['file']['name'];
		 
		 // first uploading the video on the server
		 $config['allowed_types']  = '*';
		 $config['upload_path'] = './uploads/';
		 $config['file_name']  = $filename;
		 $this->load->library('upload', $config);
		 $this->upload->do_upload('file');
		 
		//End Code for Video Upload
		
		$image_name = $_POST['filename'];
		$result['status']= true;
		$result['message']= "File Uploaded";
		$result['data'] = $image_name;
		echo json_encode($result);
	}
	
	public function testlanguage()
	{
		$this->load->model('mobile/webservices_model');
		echo "<pre>";
		print_r($this);
	}
	
	public function pdf_invoice()
	{
		$id = $this->uri->segment(4);
		$this->load->model('invoice_model');
		$data['invoice_info'] = $this->invoice_model->check_by(array('invoices_id' => $id), 'tbl_invoices');
		$data['title'] = "Invoice PDF"; //Page title                             
		$this->load->helper('dompdf');
		$viewfile = $this->load->view('admin/invoice/invoice_pdf', $data, TRUE);
		pdf_download($viewfile, 'Invoice_' . $data['invoice_info']->reference_no);
	}
	
	
	
	
	
	
	
	
	
	
}

?>