<!Doctype html>
<html>
	<head>
		<title>FiberRails | Checkout</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="<?php echo main_asset_url(); ?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo main_asset_url(); ?>font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo main_asset_url(); ?>css/style.css">
	</head>
	<body>
		<?php $this->load->view('includes/main_header_home'); ?>
		
		<section class="checkoutHeroWrap">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4 class="heading">Checkout</h4>
					</div>
				</div>
			</div>
		</section>

		<section class="checkoutWrap">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 wizard">
						<!-- Nav tabs -->
					  	<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="member_details active"><a aria-controls="memberDetails" role="tab"><i class="fa fa-edit"></i> Member Details</a></li>
						    <li role="presentation" class="payment_details disabled"><a aria-controls="payment" role="tab"><i class="fa fa-money"></i> Payment</a></li>
						    <li role="presentation" class="status_details disabled"><a aria-controls="status" role="tab"><i class="fa fa-check"></i> Status</a></li>
					  	</ul>
					  	<!-- Tab panes -->
					  	<div class="tab-content">
					  		<div role="tabpanel" class="tab-pane active member_details" id="memberDetails">
					  			<form id="memberDetailsForm" role="form" action="" method="post" novalidate="novalidate">
							    	<div class="row">
										<div class="col-sm-12 form-group">
											<h4>STEP #1: Tell us about yourself <small class="pull-right">or <a href="">Use existing RPDigital account</a></small></h4>
										</div>
										<div class="col-sm-6 form-group">
			                                <label>First Name</label>
			                                <input name="first_name" class="form-control" id="first_name" required="required" type="text" placeholder="First Name" value="">
			                            </div>
			                            <div class="col-sm-6 form-group">
			                                <label>Last Name</label>
			                                <input name="last_name" class="form-control" id="last_name" required="required" type="text" placeholder="Last Name" value="">
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-sm-6 form-group">
			                                <label>Email</label>
			                                <input name="email" class="form-control" id="email" required="required" type="text" placeholder="Email Address" value="">
			                            </div>
			                            <div class="col-sm-6 form-group">
			                                <label>Password</label>
			                                <input name="password" class="form-control" required="required" type="password" placeholder="Password">
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-sm-6 form-group">
			                                <label>Phone Number</label>
			                                <input name="phone" class="form-control" id="phone" required="required" type="text" maxlength="10" onkeydown="return isNumberKey(event);" placeholder="Phone Number" value="">
			                            </div>
										<div class="col-sm-12 form-group">
											<hr>
											<h4>STEP #2: Billing Address</h4>
										</div>
									</div>
			                        <div class="row">
			                            <div class="col-sm-6 form-group">
			                                <label>Address</label>
			                                <input name="address" class="form-control" id="billing_address" required="required" type="text" placeholder="Address" value="">
			                            </div>
			                            <div class="col-sm-6 form-group">
			                                <label>City</label>
			                                <input name="billing_city" class="form-control" id="billing_city" required="required" type="text" placeholder="City" value="">
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-sm-6 form-group">
			                                <label>Country</label>
			                                <select name="billing_country" class="form-control" required="required">
			                                	<option>Select Country</option>
			                                </select>
			                            </div>
			                            <div class="col-sm-6 form-group">
			                                <label>State</label>
			                                <select class="form-control" id="billing_state">
			                                	<option>Select State</option>
			                                </select>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-sm-6 form-group">
			                                <label>Zip</label>
			                                <input name="zip" class="form-control" id="billing_zip" required="required" type="text" onkeydown="return isNumberKey(event);" placeholder="Zip" value="">
			                            </div>
									</div>
									<ul class="list-inline">
			                            <li><button type="submit" class="btn btnRed next-step">Next</button></li>
			                        </ul>
		                    	</form>
						    </div>
						    <div role="tabpanel" class="tab-pane payment_details" id="payment">
						    	<form id="paymentDetailsForm" role="form" action="" method="post" novalidate="novalidate" class="">
							    	<div class="row">
										<div class="col-sm-12 form-group">
											<h4>STEP #3: Enter payment details</h4>
										</div>
										<div class="col-sm-12 form-group">
											<label class="radio-inline">
									          	<input type="radio" name="paymentOption" data-payment-type="card" class="paymentOpt" checked> 
									          	<img src="<?php echo main_asset_url(); ?>images/visa.png" width="40">
									          	<img src="<?php echo main_asset_url(); ?>images/mastercard.png" width="40">
									          	<img src="<?php echo main_asset_url(); ?>images/american-express.png" width="40">
									          	<img src="<?php echo main_asset_url(); ?>images/discover.png" width="40">
									        </label>
									        <label class="radio-inline">
									          	<input type="radio" name="paymentOption" data-payment-type="paypal" class="paymentOpt">
									          	<img src="<?php echo main_asset_url(); ?>images/paypal.png" width="40">
									        </label>
									    </div>
								        <div class="col-sm-6 form-group creaditCardInfo">
			                                <label>Card Number</label>
			                                <input name="credit_number" class="form-control" required="required" type="text" onkeydown="return isNumberKey(event);" placeholder="Card Number">
			                            </div>
			                            <div class="col-sm-6 form-group securityCode creaditCardInfo">
			                                <label>Security Code 
			                                	<span data-toggle="popover" data-trigger="hover" data-html="true" title="CVV" data-content="
			                                	<p>Your card code is a 3 or 4 digit number that is found in these locations:</p>
			                                	<div class='row'>
			                                		<div class='col-sm-7'>
			                                			<p><strong>Visa/Mastercard</strong></p>
			                                			<p>The security code is a 3 digit number on the back of your credit card. It immediately follows your main card number.</p>
			                                			<p><strong>American Express</strong></p>
			                                			<p>The security code is a 4 digit number on the front of your card, just above and to the right of your main card number.</p>
			                                		</div>
			                                		<div class='col-sm-5'>
			                                			<img src='<?php echo main_asset_url(); ?>images/cvv.png' class='img-responsive'>
			                                		</div>
			                                	</div>
			                                	">
			                                		<i class="fa fa-info-circle"></i>
			                                	</span>
			                                </label>
			                                <input name="security_code" class="form-control" required="required" type="text" onkeydown="return isNumberKey(event);" placeholder="Security Code">
			                            </div>
			                            <div class="col-sm-6 form-group creaditCardInfo">
			                                <label>Expiration Date</label>
			                                <input name="exp_date" class="form-control" required="required" type="text" placeholder="MM/YY">
			                            </div>
			                            <div class="col-sm-12 form-group">
			                                <div class="checkbox">
										        <label>
										          <input type="checkbox" name="terms" checked> I accept <a href="" target="_blank">terms and conditions</a>
										        </label>
										    </div>
			                            </div>
			                            <!-- <div class="col-sm-12 form-group">
			                            	<button class="btn btnRed">Continue</button>
			                            </div> -->
									</div>
									<ul class="list-inline">
			                            <!-- <li><button type="button" class="btn btnRed prev-step">Previous</button></li> -->
			                            <li><button type="submit" class="btn btnRed next-step">Submit</button></li>
			                        </ul>
			                    </form>
						    </div>
						    <div role="tabpanel" class="tab-pane status_details" id="status">
						    	<div class="thankYou text-center">
									<h4 class="heading">Thank You</h4>
									<p class="confirmText">Your subscription has been confirmed.</p>
									<p>Dear, [name]</p>
									<p>Welcome to RPDigital.</p>
									<p>We are thrilled to have you here and look forward to serving you often!<br> 
										Please login to RPDigital portal and start enjoying your benefits.<br> 
										We have sent you login details to your email address.<br>
										To begin please <a href="">click here</a>.
									</p>
									<p>We are happy to assist you in any way we can.</p>
									<p>You can reach us at:<br>
										Contact : +123 456 6789<br>
										Email : name@gmail.com 
									</p>
									<p>Regards,<br>
										RPDigital Team.
									</p>	
								</div>
								<!-- <ul class="list-inline">
		                            <li><button type="button" class="btn btnRed prev-step">Previous</button></li>
		                        </ul> -->
						    </div>
					  	</div>
					  	</form>
					</div>
					<div class="col-sm-4">
						<div class="panel panel-default orderSummary">
							<div class="panel-body">
								<h4 class="heading">ORDER SUMMARY</h4>
								<table class="table">
									<tbody>
										<tr>
											<th>Plan:</th>
											<td>Plan1</td>
										</tr>
										<tr>
											<th>Date:</th>
											<td>Wed, 07 Jun 2017</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<th>Total Price:</th>
											<th>$99</th>
										</tr>
									<tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php $this->load->view('includes/main_footer_home'); ?>		
		<script type="text/javascript" src="<?php echo main_asset_url(); ?>js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="<?php echo main_asset_url(); ?>js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo main_asset_url(); ?>js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?php echo main_asset_url(); ?>js/custom.js"></script>
	</body>
</html>