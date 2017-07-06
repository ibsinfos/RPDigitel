<!DOCTYPE html>
<html lang="en">
	<?php 
		 // echo '<pre>'; print_r($this->session->userdata); 
		 // echo '<pre>'; print_r($_SESSION); die; ?>
    <head>
		
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
		
        <title>Wbs Suite</title>
		
        <style>
            #loader_image_div {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url("<?php echo base_url(); ?>images/loader.gif") center no-repeat #fff;
            }
			
		</style>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico?crc=4022900773"/>
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/wbs-suite.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/class.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/front-end.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
		type="text/css">
		
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
	</head>
	
    <body>
		
		
        <div id="loader_image_div" style="display:none">
		</div>
		
		
        <!-- Navigation -->
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url(); ?>images/wbs-suite/dot-matrix.png" height="30" style="margin-right:10px; margin-left:10px;"></a>
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
								<div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
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
                <!-- Collect the nav links, forms, and other content for toggling -->
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
                        <?php if (!$this->session->userdata('is_logged_in')) { ?>
                            <li>
                                <a href="#" class="top-navlinks" type="button" data-toggle="modal" data-target="#memberLogin"><img src="<?php echo base_url(); ?>images/wbs-suite/cloud-computing.png" alt="" height="27">
								Member Login</a>
							</li>
							
							<?php } else { ?>
							
							
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
									
									<?php if ($this->session->userdata('crm_subscription')) { ?>                          
										<li><a href="<?php echo base_url(); ?>wbs_suite/wbs_subscribe"> Subscribe &nbsp; 
											
											
											<small style="background: #ff0000; color:#ffffff; padding:3px;"> 
												<?php
                                                    if ($this->session->userdata('enterprise') == '1') {
                                                        echo "Enterprise";
														} else if ($this->session->userdata('advanced') == '1') {
                                                        echo "Advanced";
														} 
														else 	
														{
															echo "Free";
														}
											
									
													if ($this->session->userdata('member_service_remaining_days')) {
											
														if ($this->session->userdata('member_service_remaining_days')<0) {
											
														echo " Expired";
														
														}
													}	
												?>
											</small>
											
										</a></li>
										<?php
										}
									?>
									
                                    <?php 
									
										if ($this->session->userdata('member_service_remaining_days')) {
											
											if ($this->session->userdata('member_service_remaining_days')<0) {
											?>
											
											<li><a href=""> Trial Expired Please subscribe</a></li>
											
											<?php }else{ ?>
											
											<li><a href="<?php 
												// echo "http://".$_SERVER['SERVER_NAME']."/aws/crm/login";
												echo base_url()."crm/login";
												
											?>"> Go to Dashboard &nbsp; </a></li>
											
										<?php	}}else if ($this->session->userdata('crm_subscription')) { ?>
										<li><a href="<?php 
											echo base_url()."crm/login";
											
										?>"> Go to Dashboard &nbsp; </a></li>
										<?php }
										
									?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>login/logout" onclick="return confirm('Are you sure?')"><i class="fa fa-sign-out pull-right"></i>Log Out</a>
									</li>
								</ul>
							</li>
							
						<?php } ?>
						
                        <!--<li>-->
                        <!--<a href="#" class="top-navlinks">Welcome [Username]</a>-->
						<!--</li>-->
						<!--<li>-->
						<!--<a href="#" class="top-navlinks" style="background-color: #FF0000; ">Log Out</a>-->
						<!--</li>-->
					</ul>
				</div>
                <!-- /.navbar-collapse -->
			</div>
            <!-- /.container -->
            <div>
                <a href="#demo" class="btn btn-danger btn-block" data-toggle="collapse">Learn More about Fiber Rail Services</a>
				
                <div id="demo" class="collapse">
                    <ul class="list-inline hidden-xs" style="margin-bottom:0px; padding:20px; padding-left:10%">
                        <li class=" padding-left-30"><a class="white" href="#">RPDigital</a></li>
                        <li class=" padding-left-30"><a class="white" href="#">FiberRails</a></li>
                        <li class=" padding-left-30"><a class="white" href="#">SiloSD</a></li>
                        <li class=" padding-left-30"><a class="white" href="#">SiloWebHosting</a></li>
                        <li class=" padding-left-30"><a class="white" href="#">SiloBank</a></li>
                        <li class=" padding-left-30"><a class="white" href="#">ScanDiscs</a></li>
                        <li class=" padding-left-30"><a class="white" href="#">MyScandisc</a></li>
                        <li class=" padding-left-30"><a class="white" href="#">MyScandiscTV</a></li>
                        <li class=" padding-left-30"><a class="white" href="#">NetWork</a></li>
                        <li class=" padding-left-30"><a class="white" href="#">MarketPlace</a></li>
					</ul>
                    <div class="col-md-6">
                        <div class="hidden-xs hidden-sm">
                            <img class="block"
							src="<?php echo base_url(); ?>images/thingorilla_business_135.jpg?crc=290504810" alt=""
						height="300" style="margin:70px 0 60px 100px"></div>
					</div>
                    <div class="col-md-6">
                        <div class="margin-top-25">
                            <h2 class="white center">Try Out Our Business Apps</h2>
                            <div class="col-md-6 col-sm-6">
                                <div class="color-box-1">
                                    <div class="padding-10 padding-left-20">
                                        <a href="#">
                                            <h4 class="white">Retargetting</h4>
                                            <h6 class="white">Real life inspiration music</h6>
										</a>
									</div>
								</div>
                                <div class="color-box-2 margin-top-25">
                                    <div class="padding-10 padding-left-20">
                                        <a href="#">
                                            <h4 class="white">Live Sales</h4>
                                            <h6 class="white">Chat and close sales with key customers</h6>
										</a>
									</div>
								</div>
                                <div class="color-box-3 margin-top-25">
                                    <div class="padding-10 padding-left-20">
                                        <a href="#">
                                            <h4 class="white">Google Shopping</h4>
                                            <h6 class="white">Tap into Google with Product Listing Ads</h6>
										</a>
									</div>
								</div>
							</div>
                            <div class="col-md-6 col-sm-6 ">
                                <div class="color-box-4 ">
                                    <div class="padding-10 padding-left-20">
                                        <a href="#">
                                            <h4 class="white">Facebook Integration</h4>
                                            <h6 class="white">Tap into Facebook Product Listing Ads</h6>
										</a>
									</div>
								</div>
                                <div class="color-box-5 margin-top-25">
                                    <div class="padding-10 padding-left-20">
                                        <a href="#">
                                            <h4 class="white">Fiber Rails</h4>
                                            <h6 class="white">ERP/CRM Platform for Startups & Enterprise</h6>
										</a>
									</div>
								</div>
                                <div class="color-box-6 margin-top-25">
                                    <div class="padding-10 padding-left-20">
                                        <a href="#">
                                            <h4 class="white">Web Optimization</h4>
                                            <h6 class="white">Real life inspiration music</h6>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		
		
        <!-- Header -->
        <div class="intro-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						
                        <div class="intro-message">
                            <img src="<?php echo base_url(); ?>images/wbs-suite/crmt.png" alt="">
                            <h2>Our CRM tool helps you take charge of your business and close more clients in less time.</h2>
                            <p>There are a lot of different approaches to delivering services on top of software defined
                                infrastructure. They range from simple templated app deployments to complex ecosystems to manage
                                your entire application lifecycle. In the same way you don’t really want to be wrangling
                                hardware, you don’t want to get bogged down with the same operational lifecycle overheads as
							your competitors.</p>
							
                            <p>Enlist FiberRails and your platform of empowerment... Using Silo, Paasport and Scandisc allows
                                you to deploy enterprise tools that automate your business and lets you focus on the things that
							matter to you!</p>
						</div>
					</div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 banner-bg-color">
						
                        <div class="intro-message" id="register_with_free_trial">
                            <img src="<?php echo base_url(); ?>images/wbs-suite/sded199x199.jpg" class="center-block" alt="">
                            <div class="text-center">
                                <button class="btn btn-danger margin-10">Scan to Login</button>
							</div>
							<form action="#" method="post" name="signup_with_free_trial" id="signup_with_free_trial">
                                <div id="signup_errors" class="form-group col-md-offset-1 col-md-10" style="color:red;">
								</div>
								
                                <div class="form-group col-md-offset-1 col-md-10">
                                    <input type="text" class="signup_input form-control input-lg" id="username" name="username" required="required" placeholder="Enter Username" >
								</div>
                                <div class="form-group col-md-offset-1 col-md-10">
                                    <input type="email" class="signup_input form-control input-lg" id="email_address" name="email_address" required="required" placeholder="Enter Email Address">
								</div>
								<div class="form-group col-md-offset-1 col-md-5">
									<select name="country" id="country" class="signin_input form-control input-lg">
										<option value="0" label="Select a country" selected="selected">Select a country</option>
										<?php	foreach($country_list as $country){	?>
											
											<option value="<?= $country->phonecode;?>" label="<?= $country->nicename;?>"><?php echo $country->iso."  +".$country->phonecode."";?></option>
											
										<?php } ?>
									</select>							
									</div>
									<div class="form-group col-md-5 phone-no">
										<input type="text" class="form-control input-lg" id="phone_number" name="phone_number" placeholder="Enter Phone Number">
									</div>
									<div class="form-group col-md-offset-1 col-md-10">
										<input type="text" class="form-control input-lg" id="organization_name" name="organization_name" placeholder="Enter Organization Name">
									</div>
									
									<div class="form-group col-md-offset-1 col-md-10">
										<input type="password" class="signup_input form-control input-lg" id="password" name="password" required="required" placeholder="Password">
									</div>
									<div class="form-group col-md-offset-1 col-md-10">
										<input type="password" class="signup_input form-control input-lg" id="confirmpassword" name="confirmpassword" required="required" placeholder="Confirm Password">
									</div>
									
									<div class="form-group col-md-offset-3 col-md-6 text-center">
										<?php if ($this->session->userdata('is_logged_in')) { ?>
											<button type="button" class="btn btn-danger" id="crm_signup_dummy">Create Your Account</button>
											<?php }else{ ?>
											<button type="button" class="btn btn-danger" id="crm_signup">Create Your Account</button>
										<?php } ?>
									</div>
							</form>
							</div>
							</div>
							</div>
							</div>
							<!-- /.container -->
							</div>
							<!-- /.intro-header -->
							<div class="row ">
							<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/wbs-suite/Bg_Screens.png" alt=""  >
							</div>
							<div class="content-section-b">
							
							<div class="container">
							<div class="row">
							<div class="padding-bottom-25">
							<h1 class="center">(CRM) Software For Startups</h1>
							<p class="center">Features that ignite your mobility!</p>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<img src="<?php echo base_url(); ?>images/wbs-suite/13.png" class="center-block" alt="">
							<h4 class="center"><strong>Simple On-boarding Process</strong></h4>
							<p class="center red">Train your team in minutes!<br></p>
							<p class="center">Adaptable to every workplace, FiberRails CRM is secure, scalable and packed with
							features that are fit for startups as they grow into enterprises.</p>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<img src="<?php echo base_url(); ?>images/wbs-suite/12118x117.png" class="center-block" alt="">
							<h4 class="center"><strong>Improved Mobility</strong></h4>
							<p class="center red">Change Order Management on the go!<br></p>
							<p class="center">With the Fiberrails SiloSync option enabled, your fingers can stay on the pulse of
							your business from any terminal around the globe.</p>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<img src="<?php echo base_url(); ?>images/wbs-suite/14116x116.png" class="center-block" alt="">
							<h4 class="center"><strong>Data Accuracy & Security is our focus!</strong></h4>
							<p class="center red">Choose the best option<br></p>
							<p class="center">Adapt and Customize how you collect and deploy key data across your organization with
							the FiberRails. From Contact to close, improve on all conversions in your business.</p>
							</div>
							</div>
							
							</div>
							<!-- /.container -->
							
							</div>
							<!-- /.content-section-b -->
							<!-- Page Content -->
							<div class="content-section-a">
							<div class="container">
							<div class="row">
							<div class="center-block">
							<img src="<?php echo base_url(); ?>images/wbs-suite/frlogo.png" class="center-block" alt="" height="130">
							<h1 class="white center">Your Virtual Assistant is Here!</h1>
							<h3 class="center white">Flexibility, Portability & Reliability - Enhances Mobility<br></h3>
							<div class="center padding-10">
                            <button class="btn btn-danger" style="width: 190px"> Learn More</button>
							</div>
							</div>
							
							</div>
							
							</div>
							<!-- /.container -->
							
							</div>
							<!-- /.content-section-a -->
							<div class="container">
							<div class="row">
							<h1 class="center">Platform-as-a-Service</h1>
							<h3 class="center">Flexibility, Portability & Reliability - Enhances Mobility</h3>
							<div class="center padding-10 margin-bottom-50">
							<button class="btn btn-danger" style="width: 190px"> Learn More</button>
							</div>
							</div>
							</div>
							<!-- /.container -->
							<!--big section start-->
							<div class="row big-img">
							<div class="container">
							<div class="col-lg-6" style="background: rgba(255,255,255,0.85)">
							<img class="img-responsive center-block over-img" src="<?php echo base_url(); ?>images/wbs-suite/diverse_businesspeople.jpg" alt="">
							
							<h2>A New Approach to Managed Cloud Contacts</h2>
							<p>As your business grows it needs to focus on its core strengths, and that isn’t managing IT
							infrastructure. You need platforms that bring you the benefits of the latest advances without getting
							stuck on a huge learning curve.
							Fiberrails can bring those advances to your company in the form of a fully managed cloud platform.</p>
							
							<p>Our managed cloud solution provides a complete hands-off cloud experience, utilizing state of the art
							cloud infrastructure combined with well honed traditionally engineered best practice solutions. From
							cloud planning and strategy, through to migration, testing and optimization – this is the whole package.
							Let us make the most out of your cloud platform, while you get back to working on your core
							business.</p>
							<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/wbs-suite/ps6-crop-u80773.png" alt="">
							<h3>Exchange Contacts and Grow Your Targeted Database!</h3>
							
							<p>Feel free to contact us at any time. We're real people ready to help you
							with any sales or technical support related questions you may have. And
							we love talking about security, privacy, and encryption too.</p>
							
							<p>Enable Dynamic referrals that quickly convert into your customers. Real-time analytics show you where
							your next transaction is coming from.</p>
							<div class="youtube-vid center-block"><!-- custom html -->
							<iframe class="actAsDiv"
							src="https://www.youtube.com/embed/klHzR79pPns?autoplay=0&amp;loop=0&amp;showinfo=0&amp;theme=dark&amp;color=red&amp;controls=1&amp;modestbranding=0&amp;start=0&amp;fs=1&amp;iv_load_policy=1&amp;wmode=transparent&amp;rel=1"
							frameborder="0" allowfullscreen=""></iframe>
							</div>
							<h4 class="padding-bottom-10">Our PaaSPort tool empowers you to focus on your business core values rather than building
							applications.</h4>
							</div>
							
							<div class="col-lg-6 ">
							<div class="margin-top-50">
							<img class="center-block" src="<?php echo base_url(); ?>images/wbs-suite/frlogo.png" alt="">
							</div>
							<h4 class="center white">Learn more about PaaSPort & SiloMerchant Services!</h4>
							<div class="center">
							<button class="btn btn-lg btn-danger margin-bottom-25"> Add Merchant Services </button>
							</div>
							</div>
							</div>
							</div>
							<!--big section end-->
							<div class="content-section-a">
							<div class="container">
							<div class="row">
							<img class="center-block" src="<?php echo base_url(); ?>images/wbs-suite/cloud-red.png" alt="">
							<h1 class="center white">Quick & Easy Integration For Developers</h1>
							<h3 class="center white">Comprehensive integration guides and API references for all popular platform to
							help you at every stage of integration.
							<small>View Developer Resources</small>
							</h3>
							</div>
							</div>
							<!-- /.container -->
							</div>
							<!-- /.content-section-a -->
							<div class="row lightbox-bg">
							<div class="container">
							<div class="lightbox" style="background: rgba(0,0,0,0.6)">
							<h1 class="center white padding-50">Learn more about Your Business daily!</h1>
							</div>
							</div>
							</div>
							
							<div class="row">
							<div class="container margin-bottom-25">
							<h1 class="center">(PaaS) Portal QR Campaign</h1>
							<h4 class="center">Features that make you more than current in the mobile landscape!</h4>
							</div>
							</div>
							<div class="row">
							<div class="container">
							<div class="col-lg-12 ">
							<div class="col-lg-4 padding-bottom-25">
							<p><strong>Successful QR Code campaigns</strong></p>
							<p class="red">Track campaign performance</p>
							<p>After the campaign starts, you can track the scan statistics - how many times, when, where and with
                            what
                            devices the Codes have been scanned. So you can notice any changes in performance immediately. All
                            information is presented in the form of easy-to-understand graphs and charts. The statistics also
							include raw data tables, downloadable in PDF or CSV format.</p>
							<img class="img-responsive margin-top-25 features-img center-block" src="<?php echo base_url(); ?>images/wbs-suite/ps4.png" alt="" height="125">
							</div>
							<div class="col-lg-4 padding-bottom-25">
							<img class="img-responsive padding-top-10 features-img center-block" src="<?php echo base_url(); ?>images/wbs-suite/ps2381x199.png" alt="" height="200">
							<p><strong>Improved flexibility</strong></p>
							<p class="red">Respond to last-minute changes</p>
							<p>With Dynamic QR Codes, you have full flexibility, because only a short URL that points to the content
                            is
                            encoded. Thus you can modify the stored links or files without having to generate and print the
                            Codes
                            again. This will save resources and enable you to respond to any changes in the campaign as quickly
                            as
							possible.</p>
							</div>
							<div class="col-lg-4 padding-bottom-25">
							<p><strong>Four high-quality print formats</strong></p>
							<p class="red">Choose the best option</p>
							<p>You can download the Codes in several pixel and vector file formats: JPEG, PNG, EPS and SVG. All
                            files
                            are high-resolution. Select the best option for printing QR Codes in any size, color and on any
                            medium,
							with no compromises on quality.</p>
							<img class="img-responsive margin-top-25 features-img center-block" src="<?php echo base_url(); ?>images/wbs-suite/ps5.png" alt="" height="150">
							</div>
							</div>
							<div class="col-lg-12">
							<div class="col-lg-4">
							<p><strong>Customer Support</strong></p>
							<p class="red">Get help whenever you need it</p>
							<p>Do you have a question? Get in touch with our friendly Customer Support by email or telephone. Take
                            advantage of our online Support Center with FAQs, How-to guides and ebooks to get advice and
                            creative
                            ideas. We help you to excel at QR Code Marketing.
							</p>
							</div>
							<div class="col-lg-4">
							<img class="img-responsive features-img center-block" src="<?php echo base_url(); ?>images/wbs-suite/ps3381x192.png" alt="" height="180">
							</div>
							<div class="col-lg-4">
							<p><strong>Account sharing</strong></p>
							<p class="red">Work together</p>
							<p>Organize effective teamwork around QR Code campaigns with our flexible account sharing options.
                            Inviting
                            other employees to share your account only takes seconds. You can add several users, either as
                            administrators or just with statistics viewing rights. This way you streamline your campaign
                            planning
                            and make cross-departmental cooperation easier.
							</p>
							</div>
							</div>
							</div>
							</div>
							
							<div class="row" style="background: #dddddd">
							<div class="container">
							<div class="col-lg-3 padding-top-20 padding-bottom-25" style="background: white;">
							<div><img class="center-block" src="<?php echo base_url(); ?>images/wbs-suite/fiberrails.png" alt=""></div>
							<h4 class="padding-top-10">FEATURES</h4>
							<ul class="list-unstyled red">
							<li>Multichannel Communication</li>
							<li>Sales Enhancement Tools</li>
							<li>Sales Productivity</li>
							<li>HR Loading</li>
							<li>Time/Task Management</li>
							<li>Automation</li>
							<li>Enterprise Readiness</li>
							</ul>
							<ul class="list-unstyled red">
							<li>Help Center</li>
							<li>Certified Consultants</li>
							<li>Demo Videos</li>
							<li>Developer API</li>
							<li>User Community</li>
							<li>Discussion Forum</li>
							</ul>
							<ul class="list-unstyled red">
							<li>Pricing</li>
							<li>Customer Stories</li>
							<li>Mobile CRM</li>
							<li>Blogs</li>
							</ul>
							</div>
							<div class="col-lg-offset-1 col-lg-8">
							<div class="form-group  col-md-10">
							<h1 class="center">Start your 30-Day free trial now!</h1>
							
							</div>
							<div class="col-lg-5 col-md-6 col-sm-6">
							<h3 class="center white" style="background: #ff0000; margin-bottom: 0px; padding:10px;">Advanced</h3>
							<div class="plan-box">
                            <h1 class="center">$9.99</h1>
                            <h4 class="center padding-10">As much space as you need with the Fiberrails Admin Cpanel loaded with
							upgradeable features and social analytics</h4>
                            <div class="center padding-bottom-25">
							<!--  <button class="btn btn-danger ">Create Free Trial</button>-->
							<?php if($this->session->userdata('is_logged_in')){?>
							<a href="#myModal" class="btn btn-danger" data-toggle="modal">Create Free Trial</a>
							<?php } else{?>
							<a href="#register_with_free_trial" class="btn btn-danger" id="create_free_trial">Create Free Trial</a>
							<?php }?>
							
							<!-- Modal HTML -->
							<div id="myModal" class="modal fade">
							<div class="modal-dialog">
							<div class="modal-content">
							<form method="post" name="free_trial_modal" id="free_trial_modal">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 class="modal-title">Create Free Trial</h4>
							</div>
							<div class="modal-body">
							<div class="form-group ">
							<label for="inputName">Enter Organization Name</label>
							<input type="text" name="organization_name" id="organization_name" class="form-control" style="width:80%; margin-left:10%; background-color:#f5f5f5; margin-top:5px; border:1px solid #ccc; color:#333333;" placeholder="Enter Organization Name">
							</div>
							<div id="errors" class="form-group" style="color:red;">
							</div>
							</div>
							<div class="modal-footer center">
							<input type="button" name="free_trial" id="free_trial" class="btn btn-danger" value="Proceed">
							</div>
							
							
							</form>
							</div>
							</div>
							</div>
							
							
							</div>
                            <ul>
							<li> Everything in Standard</li>
							<li> Unlimited cloud storage</li>
							<li> Advanced Fiber Rails CPanel</li>
							<li> Tiered Admin Roles</li>
							<li> Project Management Tools</li>
							<li> Business Hours Phone Support</li>
							<li> Enhanced Monitoring and reporting</li>
							<li> SiloSD Card Sync</li>
							<li> Share/Broadcast Enabled</li>
							<li> Enhanced Auditing Platform</li>
							</ul>
							</div>
							</div>
							
							<div class="col-lg-5 col-md-6 col-sm-6">
							<h3 class="center white" style="background: #959595; margin-bottom: 0px; padding:10px;">Enterprise</h3>
							<div class="plan-box">
                            <h1 class="center">$29.99</h1>
                            <h4 class="center padding-10">As much space as you need with the Fiberrails Admin Cpanel loaded with
							upgradeable features and social analytics</h4>
                            <div class="center padding-bottom-25">
							<button class="btn btn-danger btn-o">Contact Us</button>
							</div>
                            <ul>
							<li>Everything in Advanced</li>
							<li>Account Capture</li>
							<li>Network Control</li>
							<li>Domain Insights</li>
							<li>Integration and development support</li>
							<li>Assigned account success manager</li>
							<li>24/7 phone support</li>
							<li>Advance training for end users</li>
							<li>Enterprise Mobility Management</li>
							</ul>
							</div>
							</div>
							</div>
							</div>
							</div>
							
							<div class="row">
							<div class="container">
							<div class="col-lg-4">
							<img class="center-block margin-top-50" src="<?php echo base_url(); ?>images/wbs-suite/silo%20main%20logo.png" alt="" height="100">
							</div>
							<div class="col-lg-8">
							<h2 class="center">Discover the safest sharing and storage solution for your business in the world!</h2>
							<div class="center margin-bottom-10">
							<button type="button" class="btn btn-danger"> Contact Sales </button>
							</div>
							<p class="center">There are a lot of different approaches to delivering services on top of software defined infrastructure.
							They range from simple templated app deployments to complex ecosystems to manage your entire application
							lifecycle. In the same way you don’t really want to be wrangling hardware, you don’t want to get bogged
							down with the same operational lifecycle overheads as your competitors.</p>
							</div>
							</div>
							</div>
							
							
							
							<div class="modal fade" id="memberLogin" role="dialog">
							<div class="modal-dialog">
							<form action="#" method="post" name="member_login" id="member_login">
							<header class="member_login">WbsSuite Login
							<span class="close-custom-btn" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></span>
							</header>
							<!-- Modal content-->
							<div id="login_errors" style="color:red;">
							</div>
							
							
							<div class="input_login_div">
							
							<label class="form-login"><h4 style="margin-top:0px; margin-bottom:0px;">Username<span>*</span></h4></label>
							<input type="text" id="username" name="username" class="member_login input-lg input-login" placeholder="Enter Username" style="height: 40px;">
							<label class="form-login"><h4 style="margin-top:0px; margin-bottom:0px;">Password <span>*</span></h4></label>
							<input type="password" class="member_login input-lg input-login" name="password" id="password" placeholder="Password" style="height: 40px;">
							
							<!--				
							<label class="form-login"><h4 style="margin-top:0px; margin-bottom:0px;">OTP <span>*</span></h4></label>
							<input type="text" class="input-lg input-login" name="otp_input" id="otp_input" placeholder="Enter OTP here" style="height: 40px;">
							-->					
							<!--                    <button type="submit" name="member_login_button" id="member_login_button" class="form-login">Login</button>-->
							
							<input type="button" name="member_login_button" id="member_login_button" class="form-login1" value="Login">
							
							</div>			
							
							<div class="input_otp_div" style="display:none">
							<label class="form-login"><h4 style="margin-top:0px; margin-bottom:0px;">OTP<span>*</span></h4></label>
							<input type="text" id="input_otp" name="input_otp" class="input-lg input-login" placeholder="Enter OTP" style="height: 40px;">
							
							<input type="button" name="resend_otp_button" id="resend_otp_button" class="form-login1" value="Resend">
							<input type="button" name="verify_otp_button" id="verify_otp_button" class="form-login1" value="Verify">
							</div>
							
							</form>
							</div>
							</div>
							
							
							
							<!-- Footer -->
							<footer>
							<div class="container">
							<div class="row">
							<div class="col-lg-12">
							
							<div class="col-md-6">
                            <p class="copyright text-muted small">© 2017 RPDigital Intellectual Property. All rights reserved.
							RPDigital, FiberRails logo, and Scandisc are registered trademarks and Platforms&nbsp; with
							handrails is a service mark of RP Digital Intellectual Property and/or RP Digital affiliated
							companies. All other marks are the property of their respective owners.</p>
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
							
							<script>
							jQuery(document).on('click', '.mega-dropdown', function (e) {
							e.stopPropagation()
							})
							</script>
							</body>
							
							</html>
							
							
							<script>
							$(document).ready(function () {
							/*
							$("#organization_name").keyup(function (event) {
							if (event.keyCode == 13) {
							event.preventDefault();
							$("#free_trial").trigger("click");
							}
							});
							*/
							
							
							
							/******************************** Login Modal Start ********************************/
							
							$('.member_login').keypress(function(e){
							if(e.which == 13){//Enter key pressed
							$('#member_login_button').click();//Trigger search button click event
							}
							});
							
							
							$("#member_login_button").click(function () {
							
							var form_data = $('#member_login').serialize();
							
							$.ajax({
							type: 'POST',
							url: '<?php echo base_url(); ?>user/login/crm_validate_credentials',
							data: form_data,
							datatype: 'text',
							success: function (data) {
							
							if (data == 'otp') {
							
							$(".input_otp_div").show();
							$(".input_login_div").hide();
							
							$("#login_errors").html('Enter OTP');
							$("#input_otp").focus();
							
							}else if (data == 'crm') {
							// window.location = "<?php echo "http://".$_SERVER['SERVER_NAME']."/crm/login"; ?>";
							window.location = "<?php echo base_url(); ?>user/wbs_suite";
							} else if (data == 'true') {
							window.location = "<?php echo base_url(); ?>user/wbs_suite";
							} else {
							$('#member_login #password').val("");
							$("#login_errors").html(data);
							}
							}
							});
							});
							
							
							//Verify otp button
							
							
							$("#input_otp").keyup(function (event) {
							if (event.keyCode == 13) {
							$("#verify_otp_button").click();
							}
							});
							
							
							$("#verify_otp_button").click(function () {
							var form_data = $('#member_login').serialize();
							
							$.ajax({
							type: 'POST',
							url: '<?php echo base_url(); ?>user/otp/verify_otp',
							data: form_data,
							datatype: 'text',
							success: function (data) {
							
							// alert(data);
							if (data == 'true') {
							//                        window.location = "<?php //echo base_url(); ?>user/dashboard";
							window.location = "<?php echo base_url(); ?>wbs_suite";
							} else {
							
							$("#login_errors").html(data);
							
							}
							}
							});
							});
							
							
							
							
							$("#resend_otp_button").click(function () {
							
							$("#login_errors").html('');
							
							$.ajax({
							url: '<?php echo base_url(); ?>user/login/send_otp',
							datatype: 'text',
							success: function (data) {
							
							// if (data == 'true') {
							
							$("#login_errors").html('OTP sent successfully');
							
							// } else {
							
							// $("#login_errors").html(data);
							
							// }
							
							}
							});
							});
							
							
							/******************************** Login Modal End ********************************/
							
							
							/******************************** Free Trial Modal Start ********************************/
							
							
							$('#free_trial_modal').keypress(function(e){
							if(e.which == 13){//Enter key pressed
							$('#free_trial').click();//Trigger search button click event
							}
							});
							
							
							$("#free_trial").click(function () {
							//alert('d');
							//call ajax
							
							var form_data = $('#free_trial_modal').serialize();
							
							$('#loader_image_div').show();
							$.ajax({
							type: 'POST',
							url: '<?php echo base_url(); ?>user/wbs_suite/wbs_trial',
							data: form_data,
							datatype: 'text',
							success: function (data) {
							
							//                    alert(data);
							if (data == true) {
							//                        window.location = "http://localhost/crm/";
							window.location = "<?php echo base_url()."crm/login"; ?>";
							//                        alert("true");
							//                        $('#loader_image_div').hide();
							} else {
							$("#errors").html(data);
							//                        alert("error");
							$('#loader_image_div').hide();
							}
							}
							});
							});
							
							
							
							/******************************** Free Trial Modal End ********************************/
							
							/******************************** Sign up Form Start ********************************/
							
							
							
							$('#signup_with_free_trial').keypress(function(e){
							if(e.which == 13){//Enter key pressed
							$('#crm_signup').click();//Trigger search button click event
							}
							});
							
							$("#crm_signup").click(function () {
							
							var form_data = $('#signup_with_free_trial').serialize();
							
							$('#loader_image_div').show();
							$.ajax({
							type: 'POST',
							url: '<?php echo base_url(); ?>user/wbs_suite/wbs_trial_with_signup',
							data: form_data,
							datatype: 'text',
							success: function (data) {
							
							//                    alert(data);
							if (data == true) {
							//                        window.location = "http://localhost/crm/";
							// window.location = "<?php echo "http://".$_SERVER['SERVER_NAME']."/crm/login"; ?>";
							window.location = "<?php echo base_url(); ?>user/wbs_suite";
							
							// alert("true");
							// $('#loader_image_div').hide();
							} else {
							$("#signup_errors").html(data);
							//                        alert("error");
							$('#loader_image_div').hide();
							}
							}
							});
							});
							
							
							/******************************** Sign up Form End ********************************/
							
							
							/*
							$('#signup_with_free_trial').keypress(function(e){
							if(e.which == 13){//Enter key pressed
							$('#crm_signup').click();//Trigger search button click event
							}
							});
							*/
							
							$("#crm_signup_dummy").click(function () {
							// $("#signup_errors").html("You are already regietered with RPDigitel");
							
							$.toaster({ priority : 'error', title : 'Message', message : 'You are already logged in'});
							
							});
							
							
							
							$("#create_free_trial").click(function(){
							$("#signup_errors").html("Create your account to use free trial");
							});
							
							
							});
							</script>
							
							
							<script>
							function loggedin_successful(){
							$.toaster({ priority : 'success', title : 'Message', message : 'You are logged in successfully'});
							}
							
							function create_free_trial_successful(){
							$.toaster({ priority : 'success', title : 'Message', message : 'You have registered with 30 days free trial successfully'});
							}
							</script>
							
							
							<?php
							$success_message='';
							$success_message=$this->session->flashdata('login_success_msg');
							if($success_message!=''){
							echo '<script type="text/javascript"> loggedin_successful(); </script>';
							}
							
							$free_trial_success_message='';
							$free_trial_success_message=$this->session->flashdata('free_trial_success_msg');
							if($free_trial_success_message!=''){
							echo '<script type="text/javascript"> create_free_trial_successful(); </script>';
							}
							
							?>
														