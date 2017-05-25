<div class="container-fluid topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url() ?>images/paasport-login/dot-matrix.png" height="30" style="margin-right:10px;"></a>
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
            <img class="block mob-brand" src="<?php echo base_url() ?>images/paasport-login/paasport.png" alt="" height="45" style="padding-top: 5px; padding-bottom: 5px;">

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" class="top-navlinks">HOW IT WORKS</a>
                </li>
                <li>
                    <a href="#" class="top-navlinks">PLATFORM AS A SERVICE</a>
                </li>
                <li>
                    <a href="#" class="top-navlinks">PRICING</a>
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


                                    <?php // if ($this->session->userdata('crm_subscription')) { ?>
                                        <li><a href="<?php echo base_url()."paas-port/login_from_rpdigitel/"; ?>"> Go to Dashboard &nbsp; </a></li>
    <?php // } ?>
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