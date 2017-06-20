<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>FiberRails</title>
		<!-- Bootstrap Core CSS -->
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico?crc=4022900773"/>
		<link href="<?php echo base_url(); ?>css/custom.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/custom-responsive.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/fiber-rails.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/class.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/front-end.css" rel="stylesheet">
		
		<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
		<!-- Inline CSS based on choices in "Settings" tab -->
		<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;} .panel { min-height: 242px; border-color: #ddd; } </style>
		<!-- Custom Fonts -->
		<link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		</head>
	<body style="overflow-x: hidden;">
		<?php //$this->load->view('includes/main_header'); ?>
		 <nav class="navbar navbar-inverse navbar-fixed-top topnav" role="navigation">
			<div class="container-fluid topnav">
							
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url(); ?>images/wbs-suite/dot-matrix.png" height="30" style="margin-right:10px; margin-left: 10px;"></a>
					
						<ul class="col-lg-6 dropdown-menu mega-dropdown-menu row">
						<li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="card-deck container col-lg-12 col-md-12 col-sm-12 col-xs-12" >
								<div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<a href="<?php echo base_url(); ?>fiberrails">
										<img class="card-img-top img-responsive center-block card-img" src="<?php echo base_url(); ?>images/services/fiberrails%20main96x86.png" alt="Card image cap" style="height: 77px;">
										<div class="card-block" style="border:none;">
											<h4 class="card-title center black">Fiber Rails Portal</h4>
										</div>
									</a>
								</div>
								<div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<a href="<?php echo base_url(); ?>silo_sd">
										<img class="card-img-top img-responsive center-block card-img" src="<?php echo base_url(); ?>images/services/silo%20main%20logo.png" alt="Card image cap" height="66" width="133" style="margin-top:10px; margin-bottom: 9px;">
										<div class="card-block" style="border:none;">
											<h4 class="card-title center black">Silo Cloud Services</h4>
										</div>
									</a>
								</div>
								<div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4" >
									<img class="card-img-top img-responsive center-block card-img" src="<?php echo base_url(); ?>images/services/scandisc%20main%20logo.png" alt="Card image cap" width="189" height="20" style="margin-top:25px; margin-bottom:40px;">
									<div class="card-block" style="border:none;">
										<h4 class="card-title center black">Scandisc Registry</h4>
									</div>
								</div>
							</div>
							<div class="card-deck container col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-25" >
								<div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<?php 
									if ($this->session->userdata('member_service_remaining_days')) 
									{
										if ($this->session->userdata('member_service_remaining_days')<0) {
											
											$websuit=base_url()."wbs_suite";
										}
										else
										{
											$websuit=base_url()."crm/login";	
										}
									}	
									else if ($this->session->userdata('crm_subscription')) 
									{
										$websuit=base_url()."crm/login";	
									}
									else
									{
										$websuit=base_url()."wbs_suite";
									}	
										
									?>
									
									<a href="<?php echo $websuit; ?>">
										<img class="card-img-top img-responsive center-block card-img" src="<?php echo base_url(); ?>images/services/wbssuite.png" alt="Card image cap" width="177" height="61" style="margin-bottom: 10px;">
										<div class="card-block" style="border:none;">
											<h4 class="card-title center black">WBS Business Suite</h4>
										</div>
									</a>
								</div>
								<div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<a href="<?php echo base_url(); ?>paas-port/dashboard">
										<img class="card-img-top img-responsive center-block card-img" src="<?php echo base_url(); ?>images/services/paasport.png" alt="Card image cap" height="39" width="136" style="margin-top:10px; margin-bottom: 22px;">
										<div class="card-block" style="border:none;">
											<h4 class="card-title center black">PaaSPort</h4>
										</div>
									</a>
								</div>
								
								<div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<a href="<?php echo base_url(); ?>silo_bank">
										<img class="card-img-top img-responsive center-block card-img" src="<?php echo base_url(); ?>images/services/silobank.png" alt="Card image cap" width="77" height="60"  >
										<div class="card-block" style="border:none;">
											<h4 class="card-title center black">Silo Bank</h4><br>
										</div>
									</a>
								</div>
							</div>
						</li>
					</ul>
					
					<img class="block mob-brand" src="<?php echo base_url(); ?>images/frlogo.png?crc=100938625" alt="" height="70"
					style="padding-top: 5px; padding-bottom: 5px;">
					
				</div>
				
				
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#" class="top-navlinks">HOME</a>
						</li>
						<li>
							<a href="#" class="top-navlinks">FEATURES</a>
						</li>
						<li>
							<a href="#" class="top-navlinks">PRICING</a>
						</li>
						<li>
							<a href="#" class="top-navlinks">MODULES</a>
						</li>
						
						<?php  if(!$this->session->userdata('is_logged_in')){   ?>
							<li>
								
								<a href="<?php echo base_url(); ?>login" class="top-navlinks" type="button" ><img src="<?php echo base_url(); ?>images/wbs-suite/cloud-computing.png" alt="" height="27">
								Member Login</a>
							</li>
							
							<?php }else{  ?>
							
							
							<li role="presentation" class="dropdown">
								<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-bell-o" aria-hidden="true"></i>
									<span class="badge bg-red">6</span>
								</a>
								<ul id="menu2" class="dropdown-menu list-unstyled msg_list" role="menu">
									<li>
										<a>
											<span class="image"><img src="<?php echo base_url(); ?>images/favicon.ico" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
									</li>
									<li>
										<a>
											<span class="image"><img src="<?php echo base_url(); ?>images/favicon.ico" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
									</li>
									<li>
										<a>
											<span class="image"><img src="<?php echo base_url(); ?>images/favicon.ico" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
									</li>
									<li>
										<a>
											<span class="image"><img src="<?php echo base_url(); ?>images/favicon.ico" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
									</li>
									<li>
										<div class="text-center">
											<a>
												<strong>See All Alerts</strong>
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>
								</ul>
							</li>
							<li role="presentation" class="dropdown">
								<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-envelope-o"></i>
									<span class="badge bg-red">6</span>
								</a>
								<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
									<li>
										<a>
											<span class="image"><img src="<?php echo base_url(); ?>images/favicon.ico" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
									</li>
									<li>
										<a>
											<span class="image"><img src="<?php echo base_url(); ?>images/favicon.ico" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
									</li>
									<li>
										<a>
											<span class="image"><img src="<?php echo base_url(); ?>images/favicon.ico" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
									</li>
									<li>
										<a>
											<span class="image"><img src="<?php echo base_url(); ?>images/favicon.ico" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
									</li>
									<li>
										<div class="text-center">
											<a>
												<strong>See All Alerts</strong>
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>
								</ul>
							</li>
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<img src="<?php echo base_url(); ?>images/icons-about-user.png" style="margin-right: 4px; width: 24px;   height: 24px;" alt=""><?php echo $this->session->userdata('username'); ?>
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="<?php echo backend_passport_url(); ?>view/<?php echo $slug; ?>"> Profile</a></li>
									<li>
										<a href="<?php echo base_url(); ?>login/logout" onclick="return confirm('Are you sure?')"><i class="fa fa-sign-out pull-right"></i>Log Out</a>
									</li>
								</ul>
							</li>
							
						<?php } ?>
                        
						
					</ul>
				</div>
			</div>
	</nav>
		
		
		
		<!--Section 3 Start-->
		<div class="row" style="background:#f8f8f8; padding:50px;">
			
		</div>
		<!--Section 3 End-->
		<!--Section 4 services Start-->
		<div class="row ">
			
			<div class="container margin-top-50">
				<div class="row" >
					<div class="col-md-4 col-sm-4">
						<div class="panel">
							<div class="panel-heading">
								<img class="card-img-top img-responsive center-block" src="<?php echo base_url(); ?>images/services/wbssuite.png" alt="Card image cap" width="177" height="61">
							</div>
							<div class="panel-body">
								<h4 class="card-title">WBS Business Suite</h4>
								<p class="card-text">Our Saas Products Empower IT professionals to adapt to rapid change, utilise resource more
								efficiently and deliver stronger value to organizations.</p>
								<div class="text-center">
									<?php 
									if ($this->session->userdata('member_service_remaining_days')) {
										if ($this->session->userdata('member_service_remaining_days')<0) {
											
											$websuit=base_url()."wbs_suite";
										}
										else
										{
											$websuit=base_url()."crm/login";	
										}
									} else if ($this->session->userdata('crm_subscription')) {
										$websuit=base_url()."crm/login";	
									}
									else
									{
										$websuit=base_url()."wbs_suite";
									}	
									
									?>
									<a href="<?php echo $websuit; ?>" class="btn btn-danger">
		                                Go To Dashboard / Subscribe Now
										
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="panel">
							<div class="panel-heading">
								<img class="card-img-top img-responsive center-block" src="<?php echo base_url(); ?>images/services/paasport.png" alt="Card image cap" height="39" width="136" style="margin-top:21px;">
							</div>
							<div class="panel-body">
								<h4 class="card-title">PaaSPort</h4>
								<p class="card-text">Try or purchase our latest tools, apps and software to continuously enhance your infrastructure and maintain
								a competitive advantage.</p>
								<div class="text-center">
									<a href="<?php echo base_url(); ?>paas-port/dashboard" class="btn btn-danger">Go To Dashboard / Subscribe Now</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="panel">
							<div class="panel-heading">
								<img class="card-img-top img-responsive center-block" src="<?php echo base_url(); ?>images/services/silo%20main%20logo.png" alt="Card image cap" width="80" style="margin-top:20px;">
							</div>
							<div class="panel-body">
								<h4 class="card-title">Silo Cloud Services</h4>
								<p class="card-text">Simplify networking, domain and webhosting with a single secured solution that caters to Startup and small businesses at every stage of growth.</p>
								<div class="text-center">
									<a href="<?php echo base_url(); ?>dashboard" class="btn btn-danger">
		                                Go To Dashboard / Subscribe Now
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="col-md-4 col-sm-4">
						<div class="panel">
							<div class="panel-heading">
								<img class="card-img-top img-responsive center-block" src="<?php echo base_url(); ?>images/services/fiberrails%20main96x86.png" alt="Card image cap">
							</div>
							<div class="panel-body">
								<h4 class="card-title">Fiber Rails Portal</h4>
								<p class="card-text">Create your company-specific portfolio and catalogs with prices and terms, and enhance tracking, global management and order processing.</p>
								<div class="text-center">
									<a href="<?php echo base_url(); ?>dashboard" class="btn btn-danger">
		                                Go To Dashboard / Subscribe Now
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="panel">
							<div class="panel-heading">
								<img class="card-img-top img-responsive center-block" src="<?php echo base_url(); ?>images/services/scandisc%20main%20logo.png" alt="Card image cap" width="158" style="margin: 34px auto;">
							</div>
							<div class="panel-body">
								<h4 class="card-title">Scandisc Registry</h4>
								<p class="card-text">User Generated Content Distribution Platform developed to protect the right and royalty of independent artisans world wide.</p>
								<div class="text-center">
									<a href="<?php echo base_url(); ?>dashboard" class="btn btn-danger">
		                                Go To Dashboard / Subscribe Now
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="panel">
							<div class="panel-heading">
								<img class="card-img-top img-responsive center-block" src="<?php echo base_url(); ?>images/services/silobank.png" alt="Card image cap" width="109">
							</div>
							<div class="panel-body">
								<h4 class="card-title">Silo Bank</h4>
								<p class="card-text">You have earned the right to pay less for transactions between you and your customer, Try silo bank as an option for your next gen payment gateway.</p>
								<div class="text-center">
									<a href="<?php echo base_url(); ?>dashboard" class="btn btn-danger">
		                                Go To Dashboard / Subscribe Now
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
	
			
		</div>
		<!--Section 8 End-->
		<!--Section 9 Start-->
		<div class="row">
			<div class="container" style="margin-bottom: 50px; margin-top:50px;">
				
			</div>
		</div>
		<!--Section 9 End-->
		
	
		
		<!-- Footer -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						
						<div class="col-md-6">
							<p class="copyright text-muted small">© 2017 RPDigital Intellectual Property. All rights reserved. RPDigital, FiberRails logo, and Scandisc are registered trademarks and Platforms&nbsp; with handrails is a service mark of RP Digital Intellectual Property and/or RP Digital affiliated companies. All other marks are the property of their respective owners.</p>
						</div>
						
						<ul class="col-md-offset-2 col-md-4 padding-top-10 list-inline">
							<li id="facebook"></li>
							<li id="google-plus"></li>
							<li id="twitter"></li>
							<li id="instagram"></li>
							<li id="linkedin"></li>
							<li id="behance"></li>
							<li id="share"></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		
		<!-- jQuery -->
		<script src="<?php echo base_url(); ?>js/jquery.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.toaster.js"></script>
		
	</body>
	
</html>


<script>
	function loggedin_successful(){
		$.toaster({ priority : 'success', title : 'Message', message : 'You are logged in successfully'});
	}
</script>


<?php
	$success_message='';
	$success_message=$this->session->flashdata('login_success_msg');
	if($success_message!=''){
		echo '<script type="text/javascript"> loggedin_successful(); </script>';
	}
	
?>
