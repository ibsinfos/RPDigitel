<?php $session_data = $this->session->userdata('user_account'); ?>
<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><span>Silo</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo ucfirst($session_data['username']) ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
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