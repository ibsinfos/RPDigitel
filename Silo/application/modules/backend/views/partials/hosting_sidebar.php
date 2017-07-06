<?php $session_data = $this->session->userdata('user_account'); ?>
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
            <img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="" class="img-circle profile_img">
            
            <h2 class="profileName">Welcome, <?php echo ucfirst($session_data['username']) ?></h2>
            <h4 class="profession">Music Maker</h4>
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
                  <li class="acive"><a>
                      <div class="menuIcon">
                        <i class="iconDashboard-home"></i>
                      </div> 
                      Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li>
                  <li><a>
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
                  </li>
                  <li><a><div class="menuIcon">
                        <i class="iconDashboard-news"></i>
                      </div> News <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
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