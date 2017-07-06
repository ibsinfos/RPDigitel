<!DOCTYPE html>
<html lang="en">
	
    <head>
		
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
		
        <title>Upgrade Subscription</title>
		
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico?crc=4022900773"/>
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/wbs-suite.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/class.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
		type="text/css">
		
	</head>
	
    <body>
		
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top topnav" role="navigation">
            <div class="container-fluid topnav">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
					</button>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url(); ?>images/wbs-suite/dot-matrix.png" height="30" style="margin-right:10px;"></a>
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
									<a href="<?php echo base_url(); ?>wbs_suite">
										<img class="card-img-top img-responsive center-block card-img" src="<?php echo base_url(); ?>images/services/wbssuite.png" alt="Card image cap" width="177" height="61" style="margin-bottom: 10px;">
										<div class="card-block" style="border:none;">
											<h4 class="card-title center black">WBS Business Suite</h4>
										</div>
									</a>
								</div>
								<div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<a href="<?php echo base_url(); ?>paasport">
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
                                    <li><a href="javascript:;"> Profile</a></li>
									<li>
                                        <a href="<?php echo base_url(); ?>login/logout" onclick="return confirm('Are you sure?')"><i class="fa fa-sign-out pull-right"></i>Log Out</a>
									</li>
								</ul>
							</li>
							
						<?php } ?>
						
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
        <!--body content Start-->
        <div class="subscribe-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-2 col-lg-9">
                        <div class="form-group padding-top-20">
                            <h1 class="center" style="font-weight: 300">Upgrade Your Subscription Plan Now !</h1>
						</div>
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <h3 class="center white" style="background: #ff0000; margin-bottom: 0px; padding:10px;">
							Advanced</h3>
                            <div class="plan-box">
                                <h1 class="center">$9.99</h1>
                                <h4 class="center padding-10">As much space as you need with the Fiberrails Admin Cpanel loaded
                                    with
								upgradeable features and social analytics</h4>
								<form method="POST" action="<?php echo base_url(); ?>user/express_checkout/SetExpressCheckout">
                                    <div class="center padding-bottom-25">
                                        <input type="hidden" value="9.99" name="amount">
                                        <input type="hidden" value="1" name="plan_id">
										<input type="hidden" value="<?php echo $this->session->userdata('user_id')?>" name="user_id">
                                        
										<!--<button type="submit" class="btn btn-danger ">Upgrade</button>-->
                                        
										
										<?php if ($this->session->userdata('crm_subscription')) {
											
											if($this->session->userdata('advanced')=='1') { ?>
											<button type="submit" class="btn btn-danger ">Renewal</button>
											
											<?php }else if($this->session->userdata('enterprise')=='1') { ?>
											<button type="submit" class="btn btn-danger ">Upgrade</button>
											
											<?php }else{ ?>
											
											<button type="submit" class="btn btn-danger ">Upgrade</button>
											
										<?php }  ?>
										
										<?php  }else{ ?>
										<button type="submit" class="btn btn-danger ">Upgrade</button>
										
										<?php }
										
										?>
										
										
										
									</div>
								</form>
                                <ul >
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
                            <h3 class="center white" style="background: #959595; margin-bottom: 0px; padding:10px;">
							Enterprise</h3>
                            <div class="plan-box">
                                <h1 class="center">$29.99</h1>
                                <h4 class="center padding-10">As much space as you need with the Fiberrails Admin Cpanel loaded
                                    with
								upgradeable features and social analytics</h4>
                                <form method="POST" action="<?php echo base_url(); ?>user/express_checkout/SetExpressCheckout">
                                    <div class="center padding-bottom-25">
                                        <input type="hidden" value="29.99" name="amount">
                                        <input type="hidden" value="2" name="plan_id">
                                        <input type="hidden" value="<?php echo $this->session->userdata('user_id')?>" name="user_id">
                                        <!--<button type="submit" class="btn btn-danger ">Upgrade</button>-->
                                        
                                        
										
										
										<?php if ($this->session->userdata('crm_subscription')) {
											
											if($this->session->userdata('enterprise')=='1') { ?>
											<button type="submit" class="btn btn-danger ">Renewal</button>
											<?php }else{ ?>
											<button type="submit" class="btn btn-danger ">Upgrade</button>
										<?php }  ?>
										
										<?php  }else{ ?>
										<button type="submit" class="btn btn-danger ">Upgrade</button>     
										<?php }
										
										?>
										
										
										
									</div>
								</form>
                                <ul class="padding-bottom-20">
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
		</div>
        <!--BOdy Content End-->
        <!-- Footer -->
        <footer class="subscribe-footer">
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
						<script>
						jQuery(document).on('click', '.mega-dropdown', function (e) {
						e.stopPropagation()
						})
						</script>
						</body>
						
						</html>
												