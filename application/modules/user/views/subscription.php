<!Doctype html>
<html>
	<head>
		<title>FiberRails</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="<?php echo main_asset_url(); ?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo main_asset_url(); ?>font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo main_asset_url(); ?>css/style.css">
	</head>
	<body>
		<?php $this->load->view('includes/main_header_home'); ?>
		
		<section class="subscribeHeroSection">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
						<h4 class="heading">Launch Your Personal Silo Cloud Package</h4>
						<p>Enterprise Solutions built for Startups.</p>
						<a href="" class="btn btnRed">Add the Cloud to Your Bundle</a>
						<p class="viewMore">View more articles ><br>
						Sign up for a new merchant account</p>		
					</div>
				</div>
			</div>
		</section>
		
		<div class="subscribeShowPrice">
			<div class="container">
				<p>Show me prices based on:</p>
			</div>
		</div>
		<div class="subscribeRedStrip">
			<div class="container-fluid text-center">
				<p>Free Scandisc Activation when you have the RP Digital Bundle for Business Wireless plan. - save $49!</p>
			</div>
		</div>
		<section class="subscribePlanSection">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- Nav tabs -->
					  	<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#fiberRails" aria-controls="fiberRails" role="tab" data-toggle="tab">Fiber Rails Portal</a></li>
						    <li role="presentation"><a href="#siloCloud" aria-controls="siloCloud" role="tab" data-toggle="tab">Silo Cloud Services</a></li>
						    <li role="presentation"><a href="#scandiscRegistry" aria-controls="scandiscRegistry" role="tab" data-toggle="tab">Scandisc Registry</a></li>
						    <li role="presentation"><a href="#wbsBusinessSuite" aria-controls="wbsBusinessSuite" role="tab" data-toggle="tab">WBS Business Suite</a></li>
						    <li role="presentation"><a href="#paaSPort" aria-controls="paaSPort" role="tab" data-toggle="tab">PaaSPort</a></li>
						    <li role="presentation"><a href="#siloBank" aria-controls="siloBank" role="tab" data-toggle="tab">Silo Bank</a></li>
						</ul>
				  	 	<!-- Tab panes -->
					  	<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="fiberRails">
						    	<div class="row">
									<div class="col-sm-4">
										<div class="panel plan1">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 1</h4>
												<h4 class="planAmtWrap">$ <span class="amt">49</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>E-Class Data 3-5G</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('fiber','Fiber plan 1','30 days','49')" value="49" id="fiber_rails_portal_1">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="panel plan2">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 2</h4>
												<h4 class="planAmtWrap">$ <span class="amt">79</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>E-Class Data 5G</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('fiber','Fiber plan 2','60 days','79')" value="79" id="fiber_rails_portal_2">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="panel plan3">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 3</h4>
												<h4 class="planAmtWrap">$ <span class="amt">99</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>Unlimited Data</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('fiber','Fiber plan 3','90 days','99')" value="99" id="fiber_rails_portal_3">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
								</div>
						    	<!--<div class="row">
									<div class="col-md-12">
									<div class="table-responsive">
									<table class="table table-striped">
									<thead>
									<tr>
									<th>Plan Name</th>
									<th>Duration</th>
									<th width="200">Price</th>
									</tr>
									</thead>
									<tbody>
									<tr>
									<td>Plan 1</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									<tr>
									<td>Plan 2</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									<tr>
									<td>Plan 3</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									</tbody>
									<tfoot>
									<tr>
									<th colspan="2" class="text-right">Total:</th>
									<th>$200</th>
									</tr>
									<tr>
									<td colspan="2"></td>
									<td>
									<a href="<?php //echo base_url(); ?>check_out" class="btn btnRed">Get Started</a>
									</td>
									</tr>
									</tfoot>
									</table>
									</div>
									</div>
								</div>-->
							</div>
							
						    <div role="tabpanel" class="tab-pane" id="siloCloud">
						    	<div class="row">
									<div class="col-sm-4">
										<div class="panel plan1">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 1</h4>
												<h4 class="planAmtWrap">$ <span class="amt">49</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>E-Class Data 3-5G</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('silo_cloud','silo cloud plan 1','30 days','49')" value="49" id="silo_cloud_services_1">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="panel plan2">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 2</h4>
												<h4 class="planAmtWrap">$ <span class="amt">79</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>E-Class Data 5G</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('silo_cloud','silo cloud plan 2','60 days','79')"  value="79" id="silo_cloud_services_2">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="panel plan3">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 3</h4>
												<h4 class="planAmtWrap">$ <span class="amt">99</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>Unlimited Data</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('silo_cloud','silo cloud plan 3','90 days','99')"  value="99" id="silo_cloud_services_3">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--	<div class="row">
									<div class="col-md-12">
									<div class="table-responsive">
									<table class="table table-striped">
									<thead>
									<tr>
									<th>Plan Name</th>
									<th>Duration</th>
									<th width="200">Price</th>
									</tr>
									</thead>
									<tbody>
									<tr>
									<td>Plan 1</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									<tr>
									<td>Plan 2</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									<tr>
									<td>Plan 3</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									</tbody>
									<tfoot>
									<tr>
									<th colspan="2" class="text-right">Total:</th>
									<th>$200</th>
									</tr>
									<tr>
									<td colspan="2"></td>
									<td>
									<a href="<?php //echo base_url(); ?>check_out" class="btn btnRed">Get Started</a>
									</td>
									</tr>
									</tfoot>
									</table>
									</div>
									</div>
								</div>-->
							</div>
						    <div role="tabpanel" class="tab-pane" id="scandiscRegistry">
						    	<div class="row">
									<div class="col-sm-4">
										<div class="panel plan1">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 1</h4>
												<h4 class="planAmtWrap">$ <span class="amt">49</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>E-Class Data 3-5G</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('scandisc','Scandisc plan 1','30 days','49')" value="49" id="scandisc_registry_1">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="panel plan2">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 2</h4>
												<h4 class="planAmtWrap">$ <span class="amt">79</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>E-Class Data 5G</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('scandisc','Scandisc plan 2','60 days','79')" value="79" id="scandisc_registry_2">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="panel plan3">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 3</h4>
												<h4 class="planAmtWrap">$ <span class="amt">99</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>Unlimited Data</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('scandisc','Scandisc plan 3','90 days','99')" value="99" id="scandisc_registry_3">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
								</div>
						    	<!--<div class="row">
									<div class="col-md-12">
									<div class="table-responsive">
									<table class="table table-striped">
									<thead>
									<tr>
									<th>Plan Name</th>
									<th>Duration</th>
									<th width="200">Price</th>
									</tr>
									</thead>
									<tbody>
									<tr>
									<td>Plan 1</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									<tr>
									<td>Plan 2</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									<tr>
									<td>Plan 3</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									</tbody>
									<tfoot>
									<tr>
									<th colspan="2" class="text-right">Total:</th>
									<th>$200</th>
									</tr>
									<tr>
									<td colspan="2"></td>
									<td>
									<a href="<?php //echo base_url(); ?>check_out" class="btn btnRed">Get Started</a>
									</td>
									</tr>
									</tfoot>
									</table>
									</div>
									</div>
								</div>-->
							</div>
						    <div role="tabpanel" class="tab-pane" id="wbsBusinessSuite">
						    	<div class="row">
									<div class="col-sm-4">
										<div class="panel plan1">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 1</h4>
												<h4 class="planAmtWrap">$ <span class="amt">49</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>E-Class Data 3-5G</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('wbs','WBS plan 1','30 days','49')" value="49" id="wbs-business_suite_1">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="panel plan2">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 2</h4>
												<h4 class="planAmtWrap">$ <span class="amt">79</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>E-Class Data 5G</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('wbs','WBS plan 2','60 days','79')" value="79" id="business_suite_2">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="panel plan3">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 3</h4>
												<h4 class="planAmtWrap">$ <span class="amt">99</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>Unlimited Data</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('wbs','WBS plan 3','90 days','99')" value="99" id="business_suite_3">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
								</div>
						    	<!--<div class="row">
									<div class="col-md-12">
									<div class="table-responsive">
									<table class="table table-striped">
									<thead>
									<tr>
									<th>Plan Name</th>
									<th>Duration</th>
									<th width="200">Price</th>
									</tr>
									</thead>
									<tbody>
									<tr>
									<td>Plan 1</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									<tr>
									<td>Plan 2</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									<tr>
									<td>Plan 3</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									</tbody>
									<tfoot>
									<tr>
									<th colspan="2" class="text-right">Total:</th>
									<th>$200</th>
									</tr>
									<tr>
									<td colspan="2"></td>
									<td>
									<a href="<?php //echo base_url(); ?>check_out" class="btn btnRed">Get Started</a>
									</td>
									</tr>
									</tfoot>
									</table>
									</div>
									</div>
								</div>-->
							</div>
						    <div role="tabpanel" class="tab-pane" id="paaSPort">
						    	<div class="row">
									<div class="col-sm-4">
										<div class="panel plan1">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 1</h4>
												<h4 class="planAmtWrap">$ <span class="amt">49</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>E-Class Data 3-5G</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan"  onclick="add_plan('paasport','Paasport plan 1','30 days','49')" value="49" id="paasport_1">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="panel plan2">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 2</h4>
												<h4 class="planAmtWrap">$ <span class="amt">79</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>E-Class Data 5G</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan"  onclick="add_plan('paasport','Paasport plan 2','60 days','79')"  value="79" id="paasport_2">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="panel plan3">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 3</h4>
												<h4 class="planAmtWrap">$ <span class="amt">99</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>Unlimited Data</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan"  onclick="add_plan('paasport','Paasport plan 3','90 days','99')"  value="99" id="paasport_3">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
								</div>
						    	<!--<div class="row">
									<div class="col-md-12">
									<div class="table-responsive">
									<table class="table table-striped">
									<thead>
									<tr>
									<th>Plan Name</th>
									<th>Duration</th>
									<th width="200">Price</th>
									</tr>
									</thead>
									<tbody>
									<tr>
									<td>Plan 1</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									<tr>
									<td>Plan 2</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									<tr>
									<td>Plan 3</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									</tbody>
									<tfoot>
									<tr>
									<th colspan="2" class="text-right">Total:</th>
									<th>$200</th>
									</tr>
									<tr>
									<td colspan="2"></td>
									<td>
									<a href="<?php //echo base_url(); ?>check_out" class="btn btnRed">Get Started</a>
									</td>
									</tr>
									</tfoot>
									</table>
									</div>
									</div>
								</div>-->
							</div>
						    <div role="tabpanel" class="tab-pane" id="siloBank">
						    	<div class="row">
									<div class="col-sm-4">
										<div class="panel plan1">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 1</h4>
												<h4 class="planAmtWrap">$ <span class="amt">49</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>E-Class Data 3-5G</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan"  onclick="add_plan('silo_bank','silo bank plan 1','30 days','49')" value="49" id="silo_bank_1">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="panel plan2">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 2</h4>
												<h4 class="planAmtWrap">$ <span class="amt">79</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>E-Class Data 5G</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('silo_bank','silo bank plan 2','60 days','79')" value="79" id="silo_bank_2">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="panel plan3">
											<div class="panel-heading text-center">
												<h4 class="planName">Plan 3</h4>
												<h4 class="planAmtWrap">$ <span class="amt">99</span></h4>
											</div>
											<div class="panel-body">
												<ul class="list-unstyled typoList">
													<li>Unlimited Voice</li>
													<li>Unlimited SMS</li>
													<li>Unlimited Data</li>
												</ul>
												<div class="text-center">
													<button class="btn btnRed choose_plan" onclick="add_plan('silo_bank','silo bank plan 3','90 days','99')" value="99" id="silo_bank_3">Choose Plan</button>
												</div>
											</div>
										</div>
									</div>
								</div>
						    	<!--<div class="row">
									<div class="col-md-12">
									<div class="table-responsive">
									<table class="table table-striped">
									<thead>
									<tr>
									<th>Plan Name</th>
									<th>Duration</th>
									<th width="200">Price</th>
									</tr>
									</thead>
									<tbody>
									<tr>
									<td>Plan 1</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									<tr>
									<td>Plan 2</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									<tr>
									<td>Plan 3</td>
									<td>1 Year</td>
									<td>$ 49</td>
									</tr>
									</tbody>
									<tfoot>
									<tr>
									<th colspan="2" class="text-right">Total:</th>
									<th>$200</th>
									</tr>
									<tr>
									<td colspan="2"></td>
									<td>
									<a href="<?php //echo base_url(); ?>check_out" class="btn btnRed">Get Started</a>
									</td>
									</tr>
									</tfoot>
									</table>
									</div>
									</div>
								</div>-->
							</div>
							
							
							
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive">
										<form id='form_subcription_plans' method="post" action="<?php echo base_url(); ?>check_out">
											<table class="table table-striped" id='table_subcription_plans'>
												<thead>
													<tr>
														<th>Plan Name</th>
														<th>Duration</th>
														<th width="200">Price</th>
													</tr>
												</thead>
												<tbody>
													<!--<tr>
														<td>Plan 1</td>
														<td>1 Year</td>
														<td>$ 49</td>
														</tr>
														<tr>
														<td>Plan 2</td>
														<td>1 Year</td>
														<td>$ 49</td>
														</tr>
														<tr>
														<td>Plan 3</td>
														<td>1 Year</td>
														<td>$ 49</td>
														</tr>
													-->
												</tbody>
												<tfoot>
													<tr>
														<th colspan="2" class="text-right">Total:</th>
														<th id="subcription_plans_total">0</th>
													</tr>
													
													<tr>
														<td colspan="2"></td>
														<td>
															<!--<a href="<?php //echo base_url(); ?>check_out" class="btn btnRed">Get Started</a>-->
															<input type="text" name="pricing_plan_total" id="pricing_plan_total" value="0" hidden>
															<input type="submit" name="pricing_plan_submit" id="pricing_plan_submit" class="btn btnRed" value="Get Started">
															
														</td>
													</tr>
												</tfoot>
											</table>
										</form>
									</div>
								</div>
							</div>
							
							
							
						</div>
					</div>
				</div>
				<div class="row wirelesServicesInfo">
					<div class="col-sm-12">
						<div class="text-center">
							<p class="rpDigitelLogo"><img src="<?php echo main_asset_url(); ?>images/subscription/rpdigitel.png"></p>
							<p class="whyRP">Learn Why RP Digi<span class="redText">tel</span> is Wireless Services</p>
							<p class="reImagine">RE-IMAGINED</p>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="imageBlock col-sm-2">
								<img src="<?php echo main_asset_url(); ?>images/subscription/phone.png" class="img-responsive">
							</div>
							<div class="col-sm-10">
								<p>RP Digitel is wireless done differently... Bring Your Own Phone, or Purchase one of ours... No matter what carrier GSM, CDMA or Unlocked, We've got a plan and a device that suits you.</p> 
								<a href="">Click to Get your Unlocked Sim Card</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="imageBlock col-sm-2">
								<img src="<?php echo main_asset_url(); ?>images/subscription/customerservices.png" class="img-responsive">
							</div>
							<div class="col-sm-10">
								<p>At RP Digitel, Customer service comes first. Our support team is USA based and is ready to assist you with any questions you may have about all services and products we offer 24 hours a day. </p>
								<a href="">Learn More about other Services!</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="imageBlock col-sm-2">
								<img src="<?php echo main_asset_url(); ?>images/subscription/wireless.png" class="img-responsive">
							</div>
							<div class="col-sm-10">
								<p>We are not just wireless, We are nationwide data services that expand coverage to both rural and metro communities in order to ensure complete customer satisfaction at a reduced cost. </p>
								<a href="">Learn about our Data Only Plans now!</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="imageBlock col-sm-2">
								<img src="<?php echo main_asset_url(); ?>images/subscription/winningplans.png" class="img-responsive">
							</div>
							<div class="col-sm-10">
								<p>RP Digital Communications Services has a wide variety of wireless plans, data services and cloud services that meets the needs of every customer, at a fraction of the cost. </p>
								<a href="">Visit our corporate site to learn more about the vision of RP Digital. </a>
							</div>
						</div>
					</div>
					<div class="col-sm-12 text-center">
						<p>Get the All New <strong>Scandisc UGC Media Package</strong> when you have the RP Digital Bundle for Business Wireless plan.</p>
						<button class="btn btnRed">Enter</button>
					</div>
				</div>
			</div>
		</section>
		<?php $this->load->view('includes/main_footer_home'); ?>		
		<script type="text/javascript" src="<?php echo main_asset_url(); ?>js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="<?php echo main_asset_url(); ?>js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo main_asset_url(); ?>js/custom.js"></script>
		<script type="text/javascript">
			
			
			var all_records=[];
			var fiber_flag=0;
			function add_plan(cat,name,duration,price){
				
				// var all = [
				// ['fiber_plans','Fiber plan 1'],
				// ['fiber_plans','Fiber plan 2']
				// ['fiber_plans','Fiber plan 3']
				// ];
				
				// var fiber_plans=['Fiber plan 1','Fiber plan 2','Fiber plan 3'];
				
				// if(fiber_flag==0){
				// alert(name);
				// }
				
				// if((fiber_plans.indexOf(name) == -1)){ 
				// alert('ds');
				// }
				
				// alert(cat);
				
				
				if((all_records.indexOf(name) == -1)){ //To check Duplicate
					
					// all_records.push(name);
					
					all_records.push({title:cat,link:name});
					
					// alert(JSON.stringify(all_records));
					
					// delete all_records['fiber'];
					
					
					// const index = all_records.indexOf('Fiber plan 3');
					// array.splice(index, 1);
					// alert(index);
					
					
					
					$("#table_subcription_plans > tbody tr#"+cat).remove();
					
					
					
					$("#table_subcription_plans > tbody").append("<tr id='"+cat+"'><td>"+name+"</td><td>"+duration+"</td><td class='plan_price'>"+price+" <input type='button' value='X' onclick=\"delete_selected_plan('"+cat+"')\" name='del_"+cat+"' id='del_"+cat+"'></td></tr>");
					
					/*AJAX Request to add plan start*/
					$.ajax({
							
							url:'<?php echo base_url();?>user/fiberrails/addToCart_Plan',
							
							method:'post',
							
							async: false,
							
							data:{'plan_cat':cat,'plan_name':name,'plan_duration':duration,'plan_price':price},
							
							success:function(data){
								
								// $("#project_portfolio").empty();
								// alert(data);
								// $("#billing_state").html(data);
								
							}					
							
						});
					/*AJAX Request to add plan end*/
					
					
					var pre_total=$("#subcription_plans_total").text();
					
					
					var new_total=0;
					$( ".plan_price" ).each(function() {
						
						var single_plan_price=($(this).html());
						// alert(strr);
						new_total=parseInt(new_total)+parseInt(single_plan_price);
					});
					
					
					// var new_total=parseInt(pre_total)+parseInt(price);
					
					$("#subcription_plans_total").text(parseInt(new_total));
					$("#pricing_plan_total").val(parseInt(new_total));
					
				}
				
				
				
			}
			
			
			function delete_selected_plan(cat){

					$("#table_subcription_plans > tbody tr#"+cat).remove();

					
						
					var new_total=0;
					$( ".plan_price" ).each(function() {
						
						var single_plan_price=($(this).html());
						new_total=parseInt(new_total)+parseInt(single_plan_price);
						
					});
					
					
					$("#subcription_plans_total").text(parseInt(new_total));
					$("#pricing_plan_total").val(parseInt(new_total));
					
					
					
					/*AJAX Request to remove plan start*/
					$.ajax({
							
							url:'<?php echo base_url();?>user/fiberrails/removeFromCart_Plan',
							
							method:'post',
							
							async: false,
							
							data:{'plan_cat':cat,'plan_name':name,'plan_duration':duration,'plan_price':price},
							
							success:function(data){
								
								// $("#project_portfolio").empty();
								// alert(data);
								// $("#billing_state").html(data);
								
							}					
							
						});
					/*AJAX Request to remove plan end*/
					
					
					
					
					}
			
		</script>
	</body>
</html>