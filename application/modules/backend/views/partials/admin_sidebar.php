<?php $session_data = $this->session->userdata; ?>
<?php
	$userImg=backend_asset_url()."images/img.jpg";		
?>	
<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
			<!--Start Add navigation -->
			
			<!--End Add navigation -->
			
            <a href="index.html" class="site_title">
                <img src="<?php echo backend_asset_url() ?>images/logo.png" alt="logo" width="30" class=""> <span>SCANDISC</span>
			</a>
		</div>
        <!-- menu profile quick info -->
        <div class="profileInfo">
            <img src="<?php echo $userImg; ?>" alt="" class="img-circle profile_img">
            <h2 class="profileName">Welcome, <?php //echo ucfirst($session_data['username']) ?>
				<?php 
					if(!empty($session_data['user_account']['username']))
					echo ucfirst($session_data['user_account']['username']);
				?>  
			</h2>
			<h4 class="profession">
				
			</h4>
			<!--<ul class="list-unstyled list-inline">
            	<li><a href="<?php echo base_url(); ?>backend/dashboard/edit_profile" class="btn btnRed">Edit</a></li>
            	<li><button class="btn grayBtn" data-toggle="modal" data-target="#myModal">Share</button></li>
			</ul>-->
		</div>
        <!-- /menu profile quick info -->
		
        <!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
				
                <ul class="nav side-menu">
					
					<li class=""><a>
						<div class="menuIcon">
							<i class="iconDashboard-home"></i>
						</div> 
					Home <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="#">Dashboard</a></li>						
					</ul>
					</li>
					<li ><a>
						<div class="menuIcon">
							<i class="iconDashboard-news"></i>
						</div> 
					News <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="<?php echo base_url(); ?>add-news">Create News</a></li>						
						<li><a href="<?php echo base_url(); ?>news">Update News</a></li>						
					</ul>
					</li>
					<li ><a href="<?php echo base_url(); ?>admin-community">
						<div class="menuIcon">
							<i class="iconDashboard-news"></i>
						</div> 
					Community </a>
					</li>
				
					
				
					
					
					
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