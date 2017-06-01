<?php 
	$session_data = $this->session->userdata('user_account');
	?>
	<?php
	$userImg=backend_asset_url()."images/img.jpg";	
	if(!empty($user[0]['user_image']))
	$userImg=backend_passport_url().$user[0]['user_image'];
?>
<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">
                <img src="<?php echo backend_asset_url() ?>images/logo.png" alt="logo" width="30" class=""> <span>SCANDISC</span>
			</a>
        </div>

        <!-- menu profile quick info -->
        <div class="profileInfo">
            <img src="<?php echo $userImg; ?>" alt="" class="img-circle profile_img">
            
            <h2 class="profileName">Welcome, <?php //echo ucfirst($session_data['username']) ?><?php echo ($user[0]['first_name'])?$user[0]['first_name']:''; ?>  </h2>
            <h4 class="profession"><?php echo ($user[0]['job_title'])?$user[0]['job_title']:''; ?> </h4>
		</div>
        <!-- /menu profile quick info -->


        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
               
                <ul class="nav side-menu">
                    <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i> Dashboard </a>

                    </li> 
                    <li><a href="<?php echo base_url() ?>my-subscribers"><i class="fa fa-envelope-o"></i> My subscribers </a>

                    </li> 
                    <li><a href="<?php echo base_url() ?>order-history"><i class="fa fa-shopping-cart"></i> Order history </a>

                    </li> 
                    <li><a href="<?php echo base_url() ?>download-center"><i class="fa fa-download"></i> Download center </a>

                    </li> 
                    <li><a href="<?php echo base_url() ?>setting"><i class="fa fa-gear"></i> Setting </a>

                    </li> 
                </ul>
            </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
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
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>