<?php
	if(!isset($_SESSION)){
		session_start();
	}
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class multi_plan_checkout extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			
			// Load helpers
			$this->load->helper('url');
			
			// Load session library
			$this->load->library('session');
			
			// Load PayPal library config
			$this->config->load('paypal');
			//        $this->load->model('common_model');
			//        $this->load->library('cart');
			//        $this->load->library('M_pdf');
			//        $this->global_setting = $this->common_model->getGlobalSettings();
			
			$config = array(
            'Sandbox' => $this->config->item('Sandbox'), // Sandbox / testing mode option.
            'APIUsername' => $this->config->item('APIUsername'), // PayPal API username of the API caller
            'APIPassword' => $this->config->item('APIPassword'), // PayPal API password of the API caller
            'APISignature' => $this->config->item('APISignature'), // PayPal API signature of the API caller
            'APISubject' => '', // PayPal API subject (email address of 3rd party user that has granted API permission for your app)
            'APIVersion' => $this->config->item('APIVersion'), // API version you'd like to use for your call.  You can set a default version in the class and leave this blank if you want.
            'DeviceID' => $this->config->item('DeviceID'),
            'ApplicationID' => $this->config->item('ApplicationID'),
            'DeveloperEmailAccount' => $this->config->item('DeveloperEmailAccount')
			);
			
			// Show Errors
			if ($config['Sandbox']) {
				error_reporting(E_ALL);
				ini_set('display_errors', '1');
			}
			
			// Load PayPal library
			$this->load->library('paypal/paypal_pro', $config);
		}
		
		/**
			* Cart Review page
		*/
		function index() {
			// Clear PayPalResult from session userdata
			//$this->session->unset_userdata('PayPalResult');
			// Clear cart from session userdata
			// $this->session->unset_userdata('shopping_cart');
			// For demo purpose, we create example shopping cart data for display on sample cart review pages
			// Example Data - cart item
			$cart['items'][0] = array(
            'id' => '123-ABC',
            'name' => 'Widget',
            'qty' => '2',
            'price' => '9.99',
			);
			
			// Example Data - cart item
			$cart['items'][1] = array(
            'id' => 'XYZ-456',
            'name' => 'Gadget',
            'qty' => '1',
            'price' => '4.99',
			);
			
			// Example Data - cart variable with items included
			$cart['shopping_cart'] = array(
            'items' => $cart['items'],
            'subtotal' => 24.97,
            'shipping' => 0,
            'handling' => 0,
            'tax' => 0,
			);
			
			// Example Data - grand total
			$cart['shopping_cart']['grand_total'] = number_format($cart['shopping_cart']['subtotal'], 2);
			
			// Load example cart data to variable
			$this->load->vars('cart', $cart);
			
			// Set example cart data into session
			$this->session->set_userdata('shopping_cart', $cart);
			
			// Example - Load Review Page
			$this->load->view('paypal/demos/multi_plan_checkout/index', $cart);
		}
		
		/**
			* SetExpressCheckout
		*/
		function SetExpressCheckout() {
			$this->load->library('session');
			//		echo '<pre/>';
			//		print_r($_POST['amount']);
			//		die('Here');
			// Clear PayPalResult from session userdata
			//$this->session->unset_userdata('PayPalResult');
			/**
				* Here we are setting up the parameters for a basic Express Checkout flow.
				*
				* The template provided at /vendor/angelleye/paypal-php-library/templates/SetExpressCheckout.php
				* contains a lot more parameters that we aren't using here, so I've removed them to keep this clean.
				*
				* $domain used here is set in the config file.
			*/
			$SECFields = array(
            'maxamt' => $_POST['amount'], // The expected maximum total amount the order will be, including S&H and sales tax.
            'returnurl' => site_url('user/multi_plan_checkout/GetExpressCheckoutDetails'), // Required.  URL to which the customer will be returned after returning from PayPal.  2048 char max.
            'cancelurl' => site_url('user/multi_plan_checkout/OrderCancelled'), // Required.  URL to which the customer will be returned if they cancel payment on PayPal's site.
            'hdrimg' => base_url().'images/frlogo.png?crc=100938625', // URL for the image displayed as the header during checkout.  Max size of 750x90.  Should be stored on an https:// server or you'll get a warning message in the browser.
            'logoimg' => base_url().'images/frlogo.png?crc=100938625', // A URL to your logo image.  Formats:  .gif, .jpg, .png.  190x60.  PayPal places your logo image at the top of the cart review area.  This logo needs to be stored on a https:// server.
            'brandname' => 'RPDigitel', // A label that overrides the business name in the PayPal account on the PayPal hosted checkout pages.  127 char max.
            'customerservicenumber' => '816-555-5555', // Merchant Customer Service number displayed on the PayPal Review page. 16 char max.
			);
			
			// print_r($SECFields);
			// die('ddd');
			/**
				* Now we begin setting up our payment(s).
				*
				* Express Checkout includes the ability to setup parallel payments,
				* so we have to populate our $Payments array here accordingly.
				*
				* For this sample (and in most use cases) we only need a single payment,
				* but we still have to populate $Payments with a single $Payment array.
				*
				* Once again, the template file includes a lot more available parameters,
				* but for this basic sample we've removed everything that we're not using,
				* so all we have is an amount.
			*/
			$Payments = array();
			$Payment = array(
            'amt' => $_POST['amount'], // Required.  The total cost of the transaction to the customer.  If shipping cost and tax charges are known, include them in this value.  If not, this value should be the current sub-total of the order.
            'shiptoname' => 'test', // Required if shipping is included.  Person's name associated with this address.  32 char max.
            'shiptostreet' => 'test', // Required if shipping is included.  First street address.  100 char max.
            'shiptostreet2' => 'test', // Second street address.  100 char max.
            'shiptocity' => 'test', // Required if shipping is included.  Name of city.  40 char max.
            'shiptostate' => 'test', // Required if shipping is included.  Name of state or province.  40 char max.
            'shiptozip' => '555555', // Required if shipping is included.  Postal code of shipping address.  20 char max.
            'shiptophonenum' => '8989898989',      // Phone number for shipping address.  20 char max.
            
			);
			
			
			/**
				* Here we push our single $Payment into our $Payments array.
			*/
			array_push($Payments, $Payment);
			
			/**
				* Now we gather all of the arrays above into a single array.
			*/
			$PayPalRequestData = array(
            'SECFields' => $SECFields,
            'Payments' => $Payments,
			);
			
			/**
				* Here we are making the call to the SetExpressCheckout function in the library,
				* and we're passing in our $PayPalRequestData that we just set above.
			*/
			$PayPalResult = $this->paypal_pro->SetExpressCheckout($PayPalRequestData);
			// echo "<pre>";
			// print_r($PayPalResult);
			// die('heree');
			/**
				* Now we'll check for any errors returned by PayPal, and if we get an error,
				* we'll save the error details to a session and redirect the user to an
				* error page to display it accordingly.
				*
				* If all goes well, we save our token in a session variable so that it's
				* readily available for us later, and then redirect the user to PayPal
				* using the REDIRECTURL returned by the SetExpressCheckout() function.
			*/
			
			
			/* Added by ranjit Pasale on 13june17 to get success-url and fail-url from user input start*/
			// if($this->input->post('success_url') && $this->input->post('fail_url')){
				// $success_url = $this->input->post('success_url');
				// $fail_url = $this->input->post('fail_url');
			// }else{
				// $success_url = base_url().'wbs_suite/wbs_subscribe_payment_success';
				// $fail_url = base_url().'wbs_suite/wbs_subscribe_payment_fail';
			// }
			
			/* Added by ranjit Pasale on 13june17 to get success-url and fail-url from user input end*/
			
			$PayPalResult['plan_id'] = $this->input->post('plan_id');
            $PayPalResult['user_id']  = $this->input->post('user_id');
			if (!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK'])) {
				$errors = array('Errors' => $PayPalResult['ERRORS']);
				
				// Load errors to variable
				$this->load->vars('errors', $errors);
				
				$this->load->view('paypal/demos/multi_plan_checkout/paypal_error');
				} else {
				//print_r($PayPalResult);die();
				// Successful call.
				// Set PayPalResult into session userdata (so we can grab data from it later on a 'payment complete' page)
				$_SESSION['PayPalResult'] = $PayPalResult;
				
				// In most cases you would automatically redirect to the returned 'RedirectURL' by using: redirect($PayPalResult['REDIRECTURL'],'Location');
				// Move to PayPal checkout
				redirect($PayPalResult['REDIRECTURL'], 'Location');
			}
		}
		
		/**
			* GetExpressCheckoutDetails
		*/
		function GetExpressCheckoutDetails() {
			$this->load->library('session');
			// Get cart data from session userdata
			//$cart = $this->session->userdata('shopping_cart');
			// Get PayPal data from session userdata
			$SetExpressCheckoutPayPalResult = $_SESSION['PayPalResult'];
			//print_r($_SESSION['PayPalResult']); die();
			$PayPal_Token = $SetExpressCheckoutPayPalResult['TOKEN'];
			
			/**
				* Now we pass the PayPal token that we saved to a session variable
				* in the SetExpressCheckout.php file into the GetExpressCheckoutDetails
				* request.
			*/
			$PayPalResult = $this->paypal_pro->GetExpressCheckoutDetails($PayPal_Token);
			
			/**
				* Now we'll check for any errors returned by PayPal, and if we get an error,
				* we'll save the error details to a session and redirect the user to an
				* error page to display it accordingly.
				*
				* If the call is successful, we'll save some data we might want to use
				* later into session variables.
			*/
			// echo "failed";
			// die('ss');  
			if (!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK'])) {
				$errors = array('Errors' => $PayPalResult['ERRORS']);
				
				// Load errors to variable
				$this->load->vars('errors', $errors);
				
				$data['main_content'] = 'paypal/demos/multi_plan_checkout/paypal_error';
				$this->load->view('includes/template', $data);
				$this->template->build('paypal/demos/multi_plan_checkout/paypal_error');
				} else {
				// Successful call.
				
				/**
					* Here we'll pull out data from the PayPal response.
					* Refer to the PayPal API Reference for all of the variables available
					* in $PayPalResult['variablename']
					*
					* https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/
					*
					* Again, Express Checkout allows for parallel payments, so what we're doing here
					* is usually the library to parse out the individual payments using the GetPayments()
					* method so that we can easily access the data.
					*
					* We only have a single payment here, which will be the case with most checkouts,
					* but we will still loop through the $Payments array returned by the library
					* to grab our data accordingly.
				*/
				$payment_data = array("token" => $PayPalResult['TOKEN'],
                "checkout_status" => $PayPalResult['CHECKOUTSTATUS'],
                "payment_date" => $PayPalResult['TIMESTAMP'],
                "ack" => $PayPalResult['ACK'],
                "payer_id" => $PayPalResult['PAYERID'],
                "total_amount_paid" => $PayPalResult['AMT'],
                "user_id" => $_SESSION['user_id'],
                "created_time" => date('Y-m-d')
				);
				
				
				$this->db->insert('subscribe_payments',$payment_data);
				
				/*Added by Ranjit on 24 April 2017 to update max_allowed users plan,counter in databasedetails table Start*/
			
			
			/*
			if($_SESSION['PayPalResult']['plan_id'] == '1'){
					$udata = array('advanced'=>'1','enterprise'=>'0','max_allowed_users'=>'10');
					}else{
					$udata = array('advanced'=>'0','enterprise'=>'1','max_allowed_users'=>'30');
				}
				$this->db->where('user_id',$_SESSION['PayPalResult']['user_id']);
				$this->db->update('database_details',$udata);
				*/
				
				
				/*Added by Ranjit on 24 April 2017 to update max_allowed users plan,counter in databasedetails table End*/
				
				// $payment_data['ack']='fail';
				if($payment_data['ack']=='Success'){
					
					// redirect('http://'.$_SERVER['SERVER_NAME'].'/crm/login');
					$this->session->set_userdata('payment_successfull','1');
					redirect(base_url().'check_out');
					
					// redirect($success_url);
					// redirect($this->input->post('success_url'));
					
					
				}else 
				if($payment_data['ack']=='Fail'){
					
					// redirect('http://'.$_SERVER['SERVER_NAME'].'/crm/login');
					redirect(base_url().'subscription');
					// redirect($fail_url);
					// redirect($this->input->post('fail_url'));
					
				}
				/**
					* At this point, we now have the buyer's shipping address available in our app.
					* We could now run the data through a shipping calculator to retrieve rate
					* information for this particular order.
					*
					* This would also be the time to calculate any sales tax you may need to
					* add to the order, as well as handling fees.
					*
					* We're going to set static values for these things in our static
					* shopping cart, and then re-calculate our grand total.
				*/
				/* $cart['shopping_cart']['shipping'] = 10.00;
					$cart['shopping_cart']['handling'] = 2.50;
				$cart['shopping_cart']['tax'] = 1.50; */
				
				// Set example cart data into session
				
				// Load example cart data to variable
				/*
					$data['main_content'] = 'subscribe-success';
					$this->load->view('includes/template', $data);
				*/
				redirect(base_url().'wbs_suite/wbs_subscribe_payment_fail');
			}
		}
		
		/**
			* DoExpressCheckoutPayment
		*/
		function DoExpressCheckoutPayment() {
			/**
				* Now we'll setup the request params for the final call in the Express Checkout flow.
				* This is very similar to SetExpressCheckout except that now we can include values
				* for the shipping, handling, and tax amounts, as well as the buyer's name and
				* shipping address that we obtained in the GetExpressCheckoutDetails step.
				*
				* If this information is not included in this final call, it will not be
				* available in PayPal's transaction details data.
				*
				* Once again, the template for DoExpressCheckoutPayment provides
				* many more params that are available, but we've stripped everything
				* we are not using in this basic demo out.
			*/
			// Get cart data from session userdata
			$cart = $this->session->userdata('shopping_cart');
			
			// Get cart data from session userdata
			$SetExpressCheckoutPayPalResult = $this->session->userdata('PayPalResult');
			//        print_r($SetExpressCheckoutPayPalResult); die();
			$PayPal_Token = $SetExpressCheckoutPayPalResult['TOKEN'];
			
			$DECPFields = array(
            'token' => $PayPal_Token, // Required.  A timestamped token, the value of which was returned by a previous SetExpressCheckout call.
            'payerid' => $cart['paypal_payer_id'], // Required.  Unique PayPal customer id of the payer.  Returned by GetExpressCheckoutDetails, or if you used SKIPDETAILS it's returned in the URL back to your RETURNURL.
			);
			
			/**
				* Just like with SetExpressCheckout, we need to gather our $Payment
				* data to pass into our $Payments array.  This time we can include
				* the shipping, handling, tax, and shipping address details that we
				* now have.
			*/
			$Payments = array();
			$Payment = array(
            'amt' => number_format($cart['shopping_cart']['grand_total'], 2), // Required.  The total cost of the transaction to the customer.  If shipping cost and tax charges are known, include them in this value.  If not, this value should be the current sub-total of the order.
            'itemamt' => number_format($cart['shopping_cart']['subtotal'], 2), // Subtotal of items only.
            'currencycode' => 'USD', // A three-character currency code.  Default is USD.
            'shippingamt' => number_format($cart['shopping_cart']['shipping'], 2), // Total shipping costs for this order.  If you specify SHIPPINGAMT you mut also specify a value for ITEMAMT.
            'handlingamt' => number_format($cart['shopping_cart']['handling'], 2), // Total handling costs for this order.  If you specify HANDLINGAMT you mut also specify a value for ITEMAMT.
            'taxamt' => number_format($cart['shopping_cart']['tax'], 2), // Required if you specify itemized L_TAXAMT fields.  Sum of all tax items in this order.
            'shiptoname' => 'kiran', // Required if shipping is included.  Person's name associated with this address.  32 char max.
            'shiptostreet' => $cart['shipping_details']['ord_bill_address_01'], // Required if shipping is included.  First street address.  100 char max.
            'shiptocity' => 'Pune', // Required if shipping is included.  Name of city.  40 char max.
            'shiptostate' => 'Maharashtra', // Required if shipping is included.  Name of state or province.  40 char max.
            'shiptozip' => '422105', // Required if shipping is included.  Postal code of shipping address.  20 char max.
            'shiptocountrycode' => $cart['shipping_country_code'], // Required if shipping is included.  Country code of shipping address.  2 char max.
            'shiptophonenum' => $cart['phone_number'], // Phone number for shipping address.  20 char max.
            'paymentaction' => 'Sale', // How you want to obtain the payment.  When implementing parallel payments, this field is required and must be set to Order.
			);
			// Required if shipping is included.  Name of state or province.  40 char
			/**
				* Here we push our single $Payment into our $Payments array.
			*/
			array_push($Payments, $Payment);
			
			/**
				* Now we gather all of the arrays above into a single array.
			*/
			$PayPalRequestData = array(
            'DECPFields' => $DECPFields,
            'Payments' => $Payments,
			);
			
			/**
				* Here we are making the call to the DoExpressCheckoutPayment function in the library,
				* and we're passing in our $PayPalRequestData that we just set above.
			*/
			$PayPalResult = $this->paypal_pro->DoExpressCheckoutPayment($PayPalRequestData);
			
			/**
				* Now we'll check for any errors returned by PayPal, and if we get an error,
				* we'll save the error details to a session and redirect the user to an
				* error page to display it accordingly.
				*
				* If the call is successful, we'll save some data we might want to use
				* later into session variables, and then redirect to our final
				* thank you / receipt page.
			*/
			if (!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK'])) {
				$errors = array('Errors' => $PayPalResult['ERRORS']);
				
				// Load errors to variable
				$this->load->vars('errors', $errors);
				
				$this->load->view('paypal/demos/multi_plan_checkout/paypal_error');
				} else {
				
				
				
				// Successful call.
				/**
					* Once again, since Express Checkout allows for multiple payments in a single transaction,
					* the DoExpressCheckoutPayment response is setup to provide data for each potential payment.
					* As such, we need to loop through all the payment info in the response.
					*
					* The library helps us do this using the GetExpressCheckoutPaymentInfo() method.  We'll
					* load our $payments_info using that method, and then loop through the results to pull
					* out our details for the transaction.
					*
					* Again, in this case we are you only working with a single payment, but we'll still
					* loop through the results accordingly.
					*
					* Here, we're only pulling out the PayPal transaction ID and fee amount, but you may
					* refer to the API reference for all the additional parameters you have available at
					* this point.
					*
					* https://developer.paypal.com/docs/classic/api/merchant/DoExpressCheckoutPayment_API_Operation_NVP/
				*/
				$cart[] = 'paypal_transaction_id';
				foreach ($PayPalResult['PAYMENTS'] as $payment) {
					$cart['paypal_transaction_id'] = isset($payment['TRANSACTIONID']) ? $payment['TRANSACTIONID'] : '';
					$cart['paypal_fee'] = isset($payment['FEEAMT']) ? $payment['FEEAMT'] : '';
				}
				
				// Set example cart data into session
				$this->session->set_userdata('shopping_cart', $cart);
				
				// Successful Order
				redirect('frontend/multi_plan_checkout/OrderComplete');
			}
		}
		
		/**
			* Order Complete - Pay Return Url
		*/
		function OrderComplete() {
			// Get cart from session userdata
			$cart = $this->session->userdata('shopping_cart');
			
			if (empty($cart))
            redirect('frontend/multi_plan_checkout');
			
			// Set cart data into session userdata
			$this->load->vars('cart', $cart);
			$this->template->set_layout('frontend')
			->title($this->global_setting['site_title'] . ' | Review Order')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer');
			$this->template->build('paypal/demos/multi_plan_checkout/payment_complete');
			
			//unset($_SESSION['PayPalResult']);
			unset($_SESSION['shopping_cart']);
			// unset($_SESSION['cart_contents']);
		}
		
		/**
			* Order Cancelled - Pay Cancel Url
		*/
		function OrderCancelled() {
			// Clear PayPalResult from session userdata
			$this->session->unset_userdata('PayPalResult');
			
			// Clear cart from session userdata
			$this->session->unset_userdata('shopping_cart');
			
			$this->template->set('page', 'order_review');
			$this->template->set_theme('default_theme');
			$this->template->set_layout('frontend')
			->title($this->global_setting['site_title'] . ' | Review Order')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer');
			$this->template->build('paypal/demos/multi_plan_checkout/order_cancelled');
		}
		
	}
