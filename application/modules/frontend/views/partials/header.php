<?php $session_data = $this->session->userdata; ?>
<div class="topbar dark2 ">
    <div class="container">
        <div class="topbar-left-items">
            <ul class="toplist pull-left">
                <li class="lineright"><a href="#">My Account</a></li>
                <li class="lineright"><a href="#">Shop</a></li>
                <li class="lineright"><a href="#">Blog</a></li>
                <li class="lineright"><a href="<?php echo base_url()?>login">Login</a></li>
                <li style="background: #f52120;">
                    <a href="<?php echo base_url()?>register" style="color: #fff;"> Create a Profile</a>
                </li>
            </ul>
        </div>
        <!--end left-->      
        <div class="topbar-right-items pull-right">
            <ul class="toplist social-icons-1">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li class="last"><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="menu-main">
    <div id="header6">
        <div class="container">
            <div class="navbar navbar-default orange2 yamm dark">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="index.html" class="navbar-brand"><img src="<?php echo frontend_asset_url() ?>images/logo_2.png" alt=""/></a>
                </div>
                <div id="navbar-collapse-grid" class="navbar-collapse collapse pull-right">
                    <ul class="nav orange2 navbar-nav">
                        <li class="dropdown"> <a href="<?php echo base_url()?>" class="dropdown-toggle <?php if($page=='home'){ echo 'active';}?>">Home</a></li>
                        <li class="dropdown"> <a href="<?php echo base_url()?>about-us" class="dropdown-toggle <?php if($page=='about_us') echo 'active';?>">About Us</a></li>
                        <li class="dropdown yamm-fw"> <a href="about2.html" class="dropdown-toggle">BUY A DOMAIN</a></li>
                        <li class="dropdown yamm-fw"> <a href="message-boxes.html" class="dropdown-toggle">ORDER HOSTING</a></li>
                        <li class="dropdown"> <a href="portfolio-three.html" class="dropdown-toggle">MAKE PAYMENT</a></li>
                        <li class="dropdown yamm-fw"> <a href="<?php echo base_url()?>support" class="dropdown-toggle <?php if($page=='support') echo 'active';?>">GET SUPPORT</a></li>
                        <li class="dropdown"> <a href="<?php echo base_url()?>contact-us" class="dropdown-toggle align-1 <?php if($page=='contact_us') echo 'active';?>">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end menu-->