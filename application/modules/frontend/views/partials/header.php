<?php
	$session_data = $this->session->userdata;
	//echo '<pre>'; print_r($session_data); exit;
	$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
	$path .=$_SERVER["SERVER_NAME"];
?>
<header class="headerWrap navbar-fixed-top">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed visible-xs" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
                <a class="logoWrap" href="#">
                    <span data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-target=".dotMatrixDropdown">
                        <img src="<?php echo main_asset_url(); ?>images/dot-matrix.png" alt="Dot Matrix" class="dotMatrixImg" />
					</span>
                    <img src="<?php echo main_asset_url(); ?>images/rpdigitel.png" alt="rpdegitel" />
				</a>
                <div class="dropdown-menu dotMatrixDropdown">
					<!--   <ul class="list-unstyled row">
                        <li class="col-xs-2">
						<a href="<?php //echo base_url(); ?>fiberrails">
						<img src="<?php //echo main_asset_url(); ?>images/home/fiberrails-main96x86.png" class="img-responsive">
						<h4>Fiber Rails Portal</h4>
						</a>
						</li>
                        <li class="col-xs-2">
						<?php
							// if (!$this->session->userdata('is_logged_in'))
							// $silo_sd = base_url() . "silo_sd";
							// else
							// $silo_sd = base_url() . "dashboard";
						?>
						<a href="<?php // echo $silo_sd; ?>">
						<img src="<?php //echo main_asset_url(); ?>images/home/silo-main-logo.png" class="img-responsive siloSDImg">
						<h4>Silo Cloud Services</h4>
						</a>
						</li>
                        <li class="col-xs-2">
						<a href="">
						<img src="<?php //echo main_asset_url(); ?>images/home/scandisc-main-logo.png" class="img-responsive scanDiscImg">
						<h4>Scandisc Registry</h4>
						</a>
						</li>
						
                        <li class="col-xs-2">
						<?php
							// if ($this->session->userdata('member_service_remaining_days')) {
							// if ($this->session->userdata('member_service_remaining_days') < 0) {
							
							// $websuit = base_url() . "wbs_suite";
							// } else {
							// $websuit = base_url() . "crm/login";
							// }
							// } else if ($this->session->userdata('crm_subscription')) {
							// $websuit = base_url() . "crm/login";
							// } else {
							// $websuit = base_url() . "wbs_suite";
							// }
						?>
						
						<a href="<?php //echo $websuit; ?>">				  			
						<img src="<?php //echo main_asset_url(); ?>images/home/wbssuite.png" class="img-responsive webSuiteImg">
						<h4>WBS Business Suite</h4>
						</a>
						</li>
                        <li class="col-xs-2">
						<?php
							// if (!$this->session->userdata('is_logged_in'))
							// $paasport_url = base_url() . "paasport";
							// else
							// $paasport_url = base_url() . "paas-port/dashboard";
						?>	
						
						<a href="<?php //echo $paasport_url; ?>">
						<img src="<?php //echo main_asset_url(); ?>images/home/paasport.png" class="img-responsive paasPortImg">
						<h4>PaaSPort</h4>
						</a>
						</li>
                        <li class="col-xs-2">
						
						<a href="<?php //echo base_url(); ?>silo_bank">
						<img src="<?php //echo main_asset_url(); ?>images/home/silobank.png" class="img-responsive siloBankImg">
						<h4>Silo Bank</h4>
						</a>
						</li>
						</ul>
						
					-->
					
					
					<ul class="list-unstyled row">
						
						<?php
							
							$this->load->model('common_model');			
							$services_menu = $this->common_model->getRecords('services', '*', '', '');
							$user_subscribed_services= $this->common_model->getRecords('tbl_services_subscription', '*', array('user_id'=>$this->session->userdata('user_id')), '');
							
							// echo "<pre>";
							$user_services_array=array();
							foreach($user_subscribed_services as $u_services){
								array_push($user_services_array,$u_services['service_id']);
							}
							
							// print_r($user_services_array);
							
							function check_subscription($service_id,$user_services_array){
								if(in_array($service_id,$user_services_array)){
									return true;
								}else{ return false; }
							}
							
							foreach($services_menu as $header_menu){
								
								
								
								if($header_menu['service_id']==1){
									$css_classes="img-responsive";
									$service_link="fiberrails";
									}else if($header_menu['service_id']==3){
									$css_classes="img-responsive siloSDImg";
									
									if (!$this->session->userdata('is_logged_in')){
										$service_link = "silo_sd";
										}else{
										
										if(check_subscription($header_menu['service_id'],$user_services_array)){
											$service_link = "dashboard";
											}else{
											$service_link = "silo_sd";
										}
										
									}
									
									
									}else if($header_menu['service_id']==4){
									
									$css_classes="img-responsive scanDiscImg";
									
									
									
									if (!$this->session->userdata('is_logged_in')){
										$service_link = "silo_sd";
										}else{
										
										if(check_subscription($header_menu['service_id'],$user_services_array)){
											$service_link = "dashboard";
											}else{
											$service_link = "silo_sd";
										}
										
									}
									
									
									}else if($header_menu['service_id']==2){
									$css_classes="img-responsive webSuiteImg";
									
									if ($this->session->userdata('member_service_remaining_days')) {
										if ($this->session->userdata('member_service_remaining_days') < 0) {
											
											$service_link = "wbs_suite";
											} else {
											$service_link = "crm/login";
										}
										} else if ($this->session->userdata('crm_subscription')) {
										$service_link = "crm/login";
										} else {
										$service_link = "wbs_suite";
									}
									
									}else if($header_menu['service_id']==5){
									$css_classes="img-responsive paasPortImg";
									
									if (!$this->session->userdata('is_logged_in')){
										$service_link = "paasport";
										}else{
										
										if(check_subscription($header_menu['service_id'],$user_services_array)){
											$service_link = "paas-port/dashboard";
											}else{
											$service_link = "paasport";
										}
										
									}
									
									}else if($header_menu['service_id']==6){
									$service_link = "silo_bank";
									$css_classes="img-responsive siloBankImg";
									}else{
									$service_link = "";
									$css_classes="img-responsive";
								}
								
							?>
							
							
							<li class="col-xs-2">
								<a href="<?php echo base_url().$service_link;?>">
									<img src="<?php echo main_asset_url().$header_menu['service_logo_path']?>" class="<?php echo $css_classes?>">
									<h4><?php echo $header_menu['service_name'];?></h4>
								</a>
							</li>
							
							
							
							<?php 
							}
							
						?>
						
					</ul>
					
					
					
					
					
					
					
					
					
					<ul class="list-unstyled row">
                        <li class="col-xs-2">
                          
                            <a href="<?php echo base_url()."community"; ?>">
                                <img src="<?php echo main_asset_url(); ?>images/home/silobank.png" class="img-responsive siloBankImg">
                                <h4>Community</h4>
							</a>
						</li>
                        <li class="col-xs-2">
                            <?php
								$this->load->helper('encrypt');
								$compid = $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'];
								
								if (isset($_SESSION['user_account']['login_user_id']) && $_SESSION['user_account']['login_user_id'] != '') {
									$url = "hrm/index.php?admin/dashboard/" . $_SESSION['user_account']['admin_login'] . "/" . $_SESSION['user_account']['login_user_id'] . "/" . $_SESSION['user_account']['name'] . "/" . $_SESSION['user_account']['login_type'] . "/" . encode_url($compid);
									} else {
									$url = "login";
								}
							?>
                            <a href="<?php echo base_url() . $url; ?>">
                                <img src="<?php echo main_asset_url(); ?>images/home/silobank.png" class="img-responsive siloBankImg">
                                <h4>Silo HRM</h4>
							</a>
						</li>
                        <li class="col-xs-2">
                            <?php
								if (isset($_SESSION['user_account']['login_user_id']) && $_SESSION['user_account']['login_user_id'] != '') {
									$url = "inventory/index.php?admin/dashboard/" . $_SESSION['user_account']['admin_login'] . "/" . $_SESSION['user_account']['login_user_id'] . "/" . $_SESSION['user_account']['name'] . "/" . $_SESSION['user_account']['login_type'] . "/" . encode_url($compid);
									} else {
									$url = "login";
								}
							?>
                            <a href="<?php echo base_url() . $url; ?>">
                                <img src="<?php echo main_asset_url(); ?>images/home/silobank.png" class="img-responsive siloBankImg">
                                <h4>Silo Inventory</h4>
							</a>
						</li>
                        <li class="col-xs-2">
                            <?php
								if (isset($_SESSION['user_account']['login_user_id']) && $_SESSION['user_account']['login_user_id'] != '') {
									$url = "video-cms/index.php/admin/dashboard/" . $_SESSION['user_account']['admin_login'] . "/" . $_SESSION['user_account']['login_user_id'] . "/" . $_SESSION['user_account']['name'] . "/" . $_SESSION['user_account']['login_type'] . "/" . encode_url($compid);
									} else {
									$url = "login";
								}
							?>
                            <a href="<?php echo base_url() . $url; ?>">
                                <img src="<?php echo main_asset_url(); ?>images/home/silobank.png" class="img-responsive siloBankImg">
                                <h4>Silo Video</h4>
							</a>
						</li>
					</ul>
				</div>
			</div>
			
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($page == 'fiberrails' || $page=='main_dashboard') { ?>
                        <li>
                            <a href="#">HOME</a>
						</li>
                        <li>
                            <a href="#">FEATURES</a>
						</li>
                        <li>
                            <a href="#">PRICING</a>
						</li>
                        <li>
                            <a href="#">MODULES</a>
						</li>
                        <?php
						}
						if (!$this->session->userdata('is_logged_in')) {
							if ($page == 'login') {
							?>
                            <li>
                                <a href="<?php echo base_url(); ?>login/signup" class="top-navlinks">Sign Up</a>
							</li>
							<?php } else { ?>
                            <li>
								<!--<a href="#" class="top-navlinks" type="button" data-toggle="modal" data-target="#memberLogin"><img src="<?php echo base_url(); ?>images/wbs-suite/cloud-computing.png" alt="" height="27">
								Member Login</a>-->
                                <a href="<?php echo base_url(); ?>login" class="top-navlinks" type="button" >
                                    <img src="<?php echo base_url(); ?>images/wbs-suite/cloud-computing.png" alt="" height="27">
                                    Member Login
								</a>
							</li>
                            <?php
							}
							} else {
						?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <img src='<?php echo main_asset_url(); ?>images/user.png' alt="user" class="userImage"> <?php echo ucfirst($session_data['username']); ?>
                                <span class="caret"></span>
							</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo backend_passport_url(); ?>view/<?php echo $slug; ?>">Profile</a></li>
                                <li><a href="#">Go to Dashboard</a></li>
                                <li>
                                    <a href="<?php echo base_url(); ?>login/logout">
                                        <i class="fa fa-sign-out pull-right"></i>
                                        Log Out
									</a>
								</li>
							</ul>
						</li>
					<?php } ?>	
                    <li>
                        <button type="button" class="navbar-toggle collapsed hidden" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
						</button>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
    <!--
		<div class="learnMoreAbout">
		<button class="btn btnRed btn-block dropdown-toggle" type="button" id="learnMoreAbout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Learn More about Fiber Rail Services</button>
		<div class="dropdown-menu" aria-labelledby="learnMoreAbout">
		<div class="container">
		<div class="row">
		<div class="col-md-12 text-center">
		<p>Get the All New Scandisc UGC Media Package when you have the RP Digital Bundle for Business Wireless plan.</p>
		<ul class="list-unstyled list-inline">
		<li>
		<p>Phone</p>
		<img src="<?php echo main_asset_url(); ?>images/home/phone.png">
		</li>
		<li>
		<p>Tablet</p>
		<img src="<?php echo main_asset_url(); ?>images/home/tablet.png">
		</li>
		<li>
		<p>Laptops</p>
		<img src="<?php echo main_asset_url(); ?>images/home/laptop.png">
		</li>
		<li>
		<p>PCs</p>
		<img src="<?php echo main_asset_url(); ?>images/home/pc.png">
		</li>
		<li>
		<p>Audio</p>
		<img src="<?php echo main_asset_url(); ?>images/home/audio.png">
		</li>
		<li>
		<p>Drones</p>
		<img src="<?php echo main_asset_url(); ?>images/home/drone.png">
		</li>
		<li>
		<p>Cameras</p>
		<img src="<?php echo main_asset_url(); ?>images/home/camera.png">
		</li>
		</ul>
		</div>
		</div>
		</div>
		</div>
		</div>
	-->
    <?php if ($page != 'main_dashboard') { ?>
		<div class="learnMoreAbout">
			<button class="btn btnRed btn-block dropdown-toggle" type="button" id="learnMoreAbout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Learn More about Fiber Rail Services</button>
			<div class="dropdown-menu" aria-labelledby="learnMoreAbout">
				<div class="container">
					<div class="row">
						
                        <div class="col-md-12 text-center">
                            <ul class="list-unstyled list-inline">
                                <li><a href="#">RPDigital</a></li>
                                <li><a href="#">FiberRails</a></li>
                                <li><a href="#">SiloSD</a></li>
                                <li><a href="#">SiloWebHosting</a></li>
                                <li><a href="#">SiloBank</a></li>
                                <li><a href="#">ScanDiscs</a></li>
                                <li><a href="#">MyScandisc</a></li>
                                <li><a href="#">MyScandiscTV</a></li>
                                <li><a href="#">NetWork</a></li>
                                <li><a href="#">MarketPlace</a></li>
							</ul>
						</div>
						
						<div class="col-sm-6">
							<div class="col-md-2 hidden-xs hidden-sm"> <img class="block"  src="<?php echo base_url(); ?>images/scandisc%20box82x82.png?crc=4246127547" alt="" width="70" height="70" style=" margin-top: 80px;"></div>
							<div class="col-md-6 hidden-xs hidden-sm"><img class="block"  src="<?php echo base_url(); ?>images/thingorilla_business_135.jpg?crc=290504810" alt="" width="330" height="220" style="margin-top:80px; margin-bottom:66px;"></div>
						</div>
						<div class="col-sm-6">
							<div class="margin-top-25" style="margin-top: 25px;">
								<div class="col-md-2 ">
									<img class="center-block img-responsive" src="<?php echo base_url(); ?>images/silo-cloud.png" alt="" style="margin-top: 25px;">
								</div>
								<div class="col-md-10">
									<h4>Flexible hosting startups</h4>
									<p>Easy to use tools, included business mail accounts, and the best dynamic page builder in the business. All to help you make your mark !</p>
								</div>
								<div class="col-md-2 ">
									<img class="center-block img-responsive margin-top-10"  src="<?php echo base_url(); ?>images/websuite.png" alt="">
								</div>
								<div class="col-md-10">
									<h4>All the tools you need to hang the OPEN sign...</h4>
									<p>E-commerce, ERP and CRM centered around your ideas for growth.</p>
								</div>
								<div class="col-md-2 ">
									<img class="center-block img-responsive  "  src="<?php echo base_url(); ?>images/fiber-rails.png" alt="">
								</div>
								<div class="col-md-10">
									<h4>Introducing FiberRails...</h4>
									<p style="margin-bottom: 20px;">Many solutions offer platforms, our focus is on the Handrails!</p>
								</div>
								<div class="col-md-2 ">
									<img class="center-block img-responsive  margin-top-25 "  src="<?php echo base_url(); ?>images/payments.png" alt="">
								</div>
								<div class="col-md-10 padding-bottom-40">
									<h4>Accept Payments !</h4>
									<p style="margin-bottom: 45px;">Mobile Payments, invoicing, sales and banking services just got easier...</p>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</header>