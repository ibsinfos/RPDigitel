<?php $session_data=$this->session->userdata; ?>
<nav class="navbar navbar-inverse navbar-fixed-top topnav">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#" class="dropdown-toggle dotMatrixWrap" data-toggle="dropdown">
				<img src="<?php echo base_url(); ?>images/wbs-suite/dot-matrix.png" height="30">
			</a>
			<div class="dropdown-menu dotMatrixDropdown">
				<div class="row">
					<div class="col-xs-4">
						<a href="<?php echo base_url(); ?>fiberrails">
							<img class="card-img-top img-responsive center-block card-img" src="<?php echo base_url(); ?>images/services/fiberrails%20main96x86.png" alt="Card image cap" style="height: 77px;">
							<div class="card-block" style="border:none;">
								<h4 class="card-title center black">Fiber Rails Portal</h4>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<a href="<?php echo base_url(); ?>dashboard">
							<!--<a href="<?php echo base_url(); ?>silo_sd">-->
							<img class="card-img-top img-responsive center-block card-img" src="<?php echo base_url(); ?>images/services/silo%20main%20logo.png" alt="Card image cap" height="66" width="133" style="margin-top:10px; margin-bottom: 9px;">
							<div class="card-block" style="border:none;">
								<h4 class="card-title center black">Silo Cloud Services</h4>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" >
						<img class="card-img-top img-responsive center-block card-img" src="<?php echo base_url(); ?>images/services/scandisc%20main%20logo.png" alt="Card image cap" width="189" height="20" style="margin-top:25px; margin-bottom:40px;">
						<div class="card-block" style="border:none;">
							<h4 class="card-title center black">Scandisc Registry</h4>
						</div>
					</div>
				</div>
				<div class="row margin-top-25" >
					<div class="col-xs-4">
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
					<div class="col-xs-4">
						<!--<a href="<?php echo base_url(); ?>paasport">-->
						<a href="<?php echo base_url(); ?>paas-port/dashboard">
							<img class="card-img-top img-responsive center-block card-img" src="<?php echo base_url(); ?>images/services/paasport.png" alt="Card image cap" height="39" width="136" style="margin-top:10px; margin-bottom: 22px;">
							<div class="card-block" style="border:none;">
								<h4 class="card-title center black">PaaSPort</h4>
							</div>
						</a>
					</div>
					<div class="col-xs-4">
						<a href="<?php echo base_url(); ?>silo_bank">
							<img class="card-img-top img-responsive center-block card-img" src="<?php echo base_url(); ?>images/services/silobank.png" alt="Card image cap" width="77" height="60"  >
							<div class="card-block" style="border:none;">
								<h4 class="card-title center black">Silo Bank</h4><br>
							</div>
						</a>
					</div>
				</div>
			</div>
			<?php if($page == 'fiberrails') { ?>
				<a class="" href="#">
					<img class="block mob-brand" src="<?php echo base_url(); ?>images/frlogo.png?crc=100938625" alt="" height="70" style="padding-top: 5px; padding-bottom: 5px;">
				</a>
			<?php } ?>
			<?php if($page == 'silo_sd') { ?>
				<a class="" href="#" style="display: inline-block; margin: 12px 0px 0px;">
					<img src=" <?php echo base_url(); ?>images/silo-sd/silo.png" height="30">
				</a>
			<?php } ?>
		</div>
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<?php if($page == 'fiberrails') { ?>
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
				<?php } ?>
				<?php if($page == 'silo_sd') { ?>
					<li>
						<a href="#">BUY A DOMAIN</a>
					</li>
					<li>
						<a href="#">ORDER HOSTING</a>
					</li>
					<li>
						<a href="#">MARKETPLACE</a>
					</li>
					
				<?php } ?>
				<?php  if(!$this->session->userdata('is_logged_in')){   ?>
					<li>
						<!--<a href="#" class="top-navlinks" type="button" data-toggle="modal" data-target="#memberLogin"><img src="<?php echo base_url(); ?>images/wbs-suite/cloud-computing.png" alt="" height="27">
						Member Login</a>-->
						<a href="<?php echo base_url(); ?>login" class="top-navlinks" type="button" >
							<img src="<?php echo base_url(); ?>images/wbs-suite/cloud-computing.png" alt="" height="27">
							Member Login
						</a>
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
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<img src="<?php echo base_url(); ?>images/icons-about-user.png" style="margin-right: 4px; width: 24px;   height: 24px;" alt="">
							<?php echo $this->session->userdata('username'); ?> 
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo backend_passport_url(); ?>view/<?php echo $slug; ?>"> Profile</a>
							</li>
							<?php if($page=='silo_sd') { ?>
							<li><a href="<?php 
												echo base_url()."dashboard";
												//echo base_url()."Silo/dashboard";
												// echo base_url()."silosd/backend/login/adminlogin";
												
											?>"> Go to Dashboard &nbsp; </a>
							</li>
							<?php } ?>
							<li>
								<a href="<?php echo base_url(); ?>login/logout" onclick="return confirm('Are you sure?')">
									<i class="fa fa-sign-out pull-right"></i>Log Out
								</a>
							</li>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
