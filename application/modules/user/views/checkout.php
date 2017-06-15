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
			                                <input name="first_name" class="form-control" id="first_name" required="required" type="text" placeholder="First Name" value="<?php if($user_details!==''){ echo $user_details[0]['first_name'];}?>">
										</div>
			                            <div class="col-sm-6 form-group">
			                                <label>Last Name</label>
			                                <input name="last_name" class="form-control" id="last_name" required="required" type="text" placeholder="Last Name" value="<?php if($user_details!==''){ echo $user_details[0]['last_name'];}?>">
										</div>
									</div>
									
									<div class="row">
			                            <div class="col-sm-6 form-group">
			                                <label>Country code</label>
											
											
											
											<select name="country" id="country" class="signin_input form-control -lg">
												<option value="0" label="Select a country" selected="selected">Select Country Code</option>
												<?php	foreach($country_code_list as $country){	?>
													
													<option value="<?= $country->phonecode;?>" label="<?= $country->nicename;?>"><?php echo $country->iso."  +".$country->phonecode."";?></option>
													
												<?php } ?>
											</select>
											
											
										</div>
										
			                            <div class="col-sm-6 form-group">
			                                <label>Phone Number</label>
			                                <input name="phone" class="form-control" id="phone" required="required" type="text" maxlength="10" onkeydown="return isNumberKey(event);" placeholder="Phone Number" value="<?php if($user_details!==''){ echo $user_details[0]['phone_no'];}?>">
											</div>
										
										
									</div>
									
									
									
			                        <div class="row">
			                            <div class="col-sm-6 form-group">
			                                <label>Email</label>
			                                <input name="email" class="form-control" id="email" required="required" type="text" placeholder="Email Address" value="<?php if($user_details!==''){ echo $user_details[0]['email_address'];}?>">
										</div>
										
										<?php if($user_details==''){ ?>
										<div class="col-sm-6 form-group">
			                                <label>Password</label>
			                                <input name="password" class="form-control" required="required" type="password" placeholder="Password" >
										</div>
										<?php } ?>
										
									</div>
									
									
			                        <div class="row">
										
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
			                                <select name="billing_country" id="billing_country" class="form-control" required="required">
			                                	
												
												<option value="select">Select Country</option>
												
												<?php 
													foreach($country_list as $country){
														
														echo "<option value='".$country['id']."'>".$country['name']."</option>";
														
													} ?>
													
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
			                            <li><button type="submit" class="btn btnRed next-step" >Next</button></li>
									</ul>
								</form>
							</div>
						    <div role="tabpanel" class="tab-pane payment_details" id="payment">
								<div class="row">
									<form id="paymentDetailsForm" role="form" action="" method="post" novalidate="novalidate" class="">
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
									</form>
								</div>
								<ul class="list-inline">
									<!-- <li><button type="button" class="btn btnRed prev-step">Previous</button></li> -->
									<!--<li><button type="submit" class="btn btnRed next-step">Submit</button></li>-->
									
									
									<li>
										
										<form method="POST" action="<?php echo base_url(); ?>user/multi_plan_checkout/SetExpressCheckout">
											
											<div class="center padding-bottom-25">
												<input type="hidden" value="<?php echo $pricing_plan_total;?>" name="amount">
												<input type="hidden" value="1" name="plan_id">
												<input type="hidden" value="<?php echo $this->session->userdata('user_id')?>" name="user_id">
												
												<input type="hidden" value="<?php echo base_url().'subscription';?>" name="success_url">
												
												<input type="hidden" value="<?php echo base_url().'subscription';?>" name="fail_url">
												
												
												<input type="submit" class="btn btnRed" value="Submit">
												
											</div>
											
										</form>
										
									</li>
									
									
								</ul>
								
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
										<th>Plan Name</th>
										<th>Price</th>
									</tr>
									<?php
										
										$services=array('fiber','silo_cloud','scandisc','wbs','paasport','silo_bank');
										
										foreach($services as $service){
											if($this->session->userdata($service)){
												echo "<tr><td>".$this->session->userdata[$service]['name']."</td><td>$ ".$this->session->userdata[$service]['price']."</td></tr>";
											}
										}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>Total Price:</th>
										<!--<th>$99</th>-->
										<th>$ <?php
											echo $pricing_plan_total;
										?></th>
									</tr>
								</tfoot>
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
	
	<script type="text/javascript">
		
		
		$("#billing_country").on('change',function (e) {
			
			if(this.value!='select'){
				$.ajax({
					
					url:'<?php echo base_url();?>user/fiberrails/getcities',
					
					method:'post',
					
					async: false,
					
					data:{'country_id':this.value},
					
					success:function(data){ 
						
						// $("#project_portfolio").empty();
						// alert(data);
						$("#billing_state").html(data);
						
					}					
					
				});
				}else{
				
				$("#billing_state").html("<option value='select'>Select State</option>");
				
			}
			
		});
		
		
		
		
		var payment_successful="<?php if($this->session->userdata('payment_successfull')){ echo $this->session->userdata('payment_successfull');
			$this->session->unset_userdata('payment_successfull');
		}
		else{echo '';}?>";
		
		if(payment_successful!=''){
			$('li[role=presentation]').removeClass('active');
			$('.tab-pane').removeClass('active');
			$('.status_details').removeClass('disabled').addClass('active');
		}
		
		// var memberDetailsForm_save_URL="<?php echo base_url().'checkout_save_member';?>";
	</script>
	
</body>
</html>									