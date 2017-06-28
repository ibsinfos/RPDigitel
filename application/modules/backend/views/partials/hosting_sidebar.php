<?php $session_data = $this->session->userdata('user_account'); ?>
<?php
	$userImg=backend_asset_url()."images/img.jpg";	
	if(!empty($user[0]['user_image']))
	$userImg=backend_passport_url().$user[0]['user_image'];
?>	
<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
			<!--Start Add navigation -->
			
			<!--End Add navigation -->
			
            <a href="index.html" class="site_title">
                <img src="<?php echo asset_url() ?>backend/images/logo.png" alt="logo" width="30" class=""> <span>SCANDISC</span>
			</a>
		</div>
        <!-- menu profile quick info -->
        <div class="profileInfo">
            <img src="<?php echo $userImg; ?>" alt="" class="img-circle profile_img">
			
            <h2 class="profileName">Welcome, <?php //echo ucfirst($session_data['username']) ?>
				
				<?php 
					if(!empty($user[0]['first_name']))
				echo $user[0]['first_name'] ?>  </h2>
				<h4 class="profession"><?php 
					if(!empty($user[0]['job_title']))
					{
						echo $user[0]['job_title'];
					}
				?> </h4>
				
				<ul class="list-unstyled list-inline">
					<li><a href="<?php echo base_url(); ?>backend/dashboard/edit_profile" class="btn btnRed">Edit</a></li>
					<li><button class="btn grayBtn" data-toggle="modal" data-target="#shareModal">Share</button></li>
				</ul>
				
		</div>
        <!-- /menu profile quick info -->
		
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <!-- <ul class="nav side-menu">
                    <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i> Dashboard </a>
					
                    </li> 
                    <li><a><i class="fa fa-envelope-o"></i> Subscribers <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
					<li><a href="<?php echo base_url() ?>subscriber-list">Subscriber List</a></li>
					<li><a href="<?php echo base_url() ?>add-subscriber">Add new subscriber</a></li>
					</ul>
					</li>
					<li><a><i class="fa fa-suitcase"></i> Project <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
					<li><a href="<?php echo base_url() ?>project-list">Project List</a></li>
					<li><a href="<?php echo base_url() ?>add-project">Add new project</a></li>
					<li><a href="<?php echo base_url() ?>upload-files">Upload files</a></li>
					<li><a href="<?php echo base_url() ?>view-files">Browse Files</a></li>
					</ul>
					</li>
					<li><a href="<?php echo base_url() ?>download-data"><i class="fa fa-download"></i> Download data </a>
					
					</li>
					<li><a><i class="fa fa-shopping-cart"></i> Store <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
					<li><a href="<?php echo base_url() ?>product-list">Products</a></li>
					<li><a href="<?php echo base_url() ?>pending-orders">Pending orders</a></li>
					<li><a href="<?php echo base_url() ?>revenue">Revenue</a></li>
					</ul>
					</li>
					<li><a><i class="fa fa-gear"></i> Setting <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
					<li><a href="<?php echo base_url() ?>set-store-name">Set store name</a></li>
					<li><a href="<?php echo base_url() ?>payment-details">Payment details</a></li>
					</ul>
					</li>
					<li><a href="<?php echo base_url() ?>sync-with-card"><i class="fa fa-exchange"></i> Sync with sd card </a>
					
					</li> 
				</ul> -->
                <ul class="nav side-menu">
					<?php if(!empty($user_menu) && in_array('Home',$user_menu))  { ?>					
						<li class="acive"><a>
							<div class="menuIcon">
								<i class="iconDashboard-home"></i>
							</div> 
						Home <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo backend_passport_url(); ?>dashboard">Create/Edit Paasport</a></li>
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
							
							
							<li><a href="<?php echo $websuit; ?>">ERP (Enterprise Resources)</a></li>
							<li><a href="<?php echo base_url(); ?>dashboard">Silo Web Hosting</a></li>
							<li><a href="<?php echo base_url(); ?>community">Community</a></li>
							
							  <?php
								$this->load->helper('encrypt');
								$compid = $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'];
								
								if (isset($_SESSION['user_account']['login_user_id']) && $_SESSION['user_account']['login_user_id'] != '') {
									$silo_hrm_url = "hrm/index.php?admin/dashboard/" . $_SESSION['user_account']['admin_login'] . "/" . $_SESSION['user_account']['login_user_id'] . "/" . $_SESSION['user_account']['name'] . "/" . $_SESSION['user_account']['login_type'] . "/" . encode_url($compid);
									} else {
									$silo_hrm_url = "login";
								}
							?>
							
							<li><a href="<?php echo base_url() . $silo_hrm_url; ?>">Silo HRM</a></li>
							<?php
								if (isset($_SESSION['user_account']['login_user_id']) && $_SESSION['user_account']['login_user_id'] != '') {
									$silo_inventory_url = "inventory/index.php?admin/dashboard/" . $_SESSION['user_account']['admin_login'] . "/" . $_SESSION['user_account']['login_user_id'] . "/" . $_SESSION['user_account']['name'] . "/" . $_SESSION['user_account']['login_type'] . "/" . encode_url($compid);
									} else {
									$silo_inventory_url = "login";
								}
							?>
							<li><a href="<?php echo base_url() . $silo_inventory_url; ?>">Silo Inventory</a></li>
							
							<?php
								if (isset($_SESSION['user_account']['login_user_id']) && $_SESSION['user_account']['login_user_id'] != '') {
									$silo_video_url = "video-cms/index.php/admin/dashboard/" . $_SESSION['user_account']['admin_login'] . "/" . $_SESSION['user_account']['login_user_id'] . "/" . $_SESSION['user_account']['name'] . "/" . $_SESSION['user_account']['login_type'] . "/" . encode_url($compid);
									} else {
									$silo_video_url = "login";
								}
							?>
                            
							<li><a href="<?php echo base_url() . $silo_video_url; ?>">Silo Video</a></li>
							<li><a href="<?php echo base_url() ."silo-music"; ?>">Silo Music</a></li>
						</ul>
						</li>
					<?php } ?>
					
					
						<li><a href="<?php echo base_url()."dashboard/broadcast"; ?>"><div class="menuIcon">
							<i class="iconDashboard-event"></i>
						</div> Broadcast </a>
						</li>
						
						<li><a href="<?php echo base_url()."dashboard/createpaasport"; ?>"><div class="menuIcon">
							<i class="iconDashboard-event"></i>
						</div> Paasport </a>
						</li>
					 
					<?php if(!empty($user_menu) && in_array('Community',$user_menu))  { ?>	
						<li><a href="<?php echo base_url()."community"; ?>"><div class="menuIcon">
							<i class="iconDashboard-invoice"></i>
						</div> Community</a>
						
						</li>
					<?php } ?>
					
					
					<?php if(!empty($user_menu) && in_array('Calendar',$user_menu))  { ?>	
						<li><a href="<?php echo base_url()."dashboard/calender"; ?>"><div class="menuIcon">
							<i class="iconDashboard-event"></i>
						</div> Calendar </a>
						
						</li>
					<?php } ?>
					
					
					<?php if(!empty($user_menu) && in_array('Services',$user_menu))  { ?>	
						<li><a href="<?php echo base_url()."dashboard/services"; ?>"><div class="menuIcon">
							<i class="iconDashboard-setting"></i>
						</div> Services </a>
						
						</li>
					<?php } ?>
					
					
					<?php if(!empty($user_menu) && in_array('Email_Template',$user_menu))  { ?>	
						<li><a href="<?php echo base_url()."dashboard/email_template"; ?>"><div class="menuIcon">
							<i class="iconDashboard-mail"></i>
						</div> Mail Box </a>
						
						</li>
					<?php } ?>
					
					
					<li><a>
						<div class="menuIcon">
							<i class="iconDashboard-projects"></i>
						</div> 
					Silo SD <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="<?php echo base_url() ?>project-list">Project List</a></li>
						<li><a href="<?php echo base_url() ?>add-project">Add new project</a></li>
						<li><a href="<?php echo base_url() ?>upload-files">Upload files</a></li>
						<!--<li><a href="<?php //echo base_url() ?>view-files">Browse Files</a></li>-->
						<li><a href="<?php echo base_url() ?>cloud-storage">Browse Files</a></li>
					</ul>
					</li>
					
					
					
					<li><a>
						<div class="menuIcon">
							<i class="iconDashboard-projects"></i>
						</div> 
					Silo Cloud <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="#">Project List</a></li>
						<li><a href="#">Add new project</a></li>
						<li><a href="#">Upload files</a></li>
						<li><a href="#">Browse Files</a></li>
					</ul>
					</li>
					
					
					<?php 
						
						
						
						if(!empty($user_menu) && in_array('Store',$user_menu))  { ?>					
						<li class="acive"><a>
							<div class="menuIcon">
								<i class="iconDashboard-store"></i>
							</div> 
						Store <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="">Store Builder</a></li>
							<li><a href="<?php echo base_url()."dashboard/productlist"; ?>">Product List</a></li>
							<li><a href="<?php echo base_url()."dashboard/createproduct"; ?>">Create Product</a></li>
							<li><a href="<?php echo base_url()."dashboard/ordertable"; ?>">Order Table</a></li>
						</ul>
						</li>
					<?php } ?>
					
					
					<?php if(!empty($user_menu) && in_array('Settings',$user_menu))  { ?>	
						<li><a><div class="menuIcon">
							<i class="iconDashboard-setting"></i>
						</div> Settings </a>
						
						</li>
					<?php } ?>
					
					<?php if(!empty($user_menu) && in_array('Invoices',$user_menu))  { ?>	
						<li><a href="<?php echo base_url()."dashboard/invoices"; ?>"><div class="menuIcon">
							<i class="iconDashboard-invoice"></i>
						</div> Invoices</a>
						
						</li>
					<?php } ?>
					
					<?php if(!empty($user_menu) && in_array('Home',$user_menu))  { ?>	
						<li><a><div class="menuIcon">
							<i class="iconDashboard-news"></i>
						</div> News <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
							<li><a href="fixed_footer.html">Fixed Footer</a></li>
						</ul>
						</li>
					<?php } ?>
					
					<!--<li><a>
						<div class="menuIcon">
						<i class="iconDashboard-projects"></i>
						</div> 
						Projects <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
						<li><a href="<?php echo base_url() ?>project-list">Project List</a></li>
						<li><a href="<?php echo base_url() ?>add-project">Add new project</a></li>
						<li><a href="<?php echo base_url() ?>upload-files">Upload files</a></li>
						<li><a href="<?php echo base_url() ?>view-files">Browse Files</a></li>
						</ul>
						</li>
						<li><a><div class="menuIcon">
						<i class="iconDashboard-network"></i>
						</div>  Network <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
						<li><a href="general_elements.html">General Elements</a></li>
						<li><a href="media_gallery.html">Media Gallery</a></li>
						<li><a href="typography.html">Typography</a></li>
						<li><a href="icons.html">Icons</a></li>
						<li><a href="glyphicons.html">Glyphicons</a></li>
						<li><a href="widgets.html">Widgets</a></li>
						<li><a href="invoice.html">Invoice</a></li>
						<li><a href="inbox.html">Inbox</a></li>
						<li><a href="calendar.html">Calendar</a></li>
						</ul>
						</li>
						<li><a><div class="menuIcon">
						<i class="iconDashboard-store"></i>
						</div>  Store <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
						<li><a href="tables.html">Tables</a></li>
						<li><a href="tables_dynamic.html">Table Dynamic</a></li>
						</ul>
						</li>
						<li><a><div class="menuIcon">
						<i class="iconDashboard-playlist"></i>
						</div>  Playlist <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
						<li><a href="chartjs.html">Chart JS</a></li>
						<li><a href="chartjs2.html">Chart JS2</a></li>
						<li><a href="morisjs.html">Moris JS</a></li>
						<li><a href="echarts.html">ECharts</a></li>
						<li><a href="other_charts.html">Other Charts</a></li>
						</ul>
						</li>
						<li><a><div class="menuIcon">
						<i class="iconDashboard-blog"></i>
						</div> Blog <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
						<li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
						<li><a href="fixed_footer.html">Fixed Footer</a></li>
						</ul>
					</li>-->
					
				</ul>
				
			</div>
			
			
		</div>
		<!-- /sidebar menu -->
		
		<!-- /menu footer buttons 
			<div class="sidebar-footer hidden-small">
			<a data-toggle="tooltip" data-placement="top" title="Settings">
			<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="FullScreen">
			<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Lock">
			<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
			<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		</div>-->
		<!-- /menu footer buttons -->
	</div>
</div>				