<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Silo Sd </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico?crc=4022900773"/>
    <!-- Custom CSS -->

    <link href="<?php echo base_url(); ?>css/silo-sd.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/custom-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/class.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>css/front-end.css" rel="stylesheet">
    <!--plugins css-->
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url(); ?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body style="overflow-x: hidden">
<!-- Navigation -->
<?php $this->load->view('includes/main_header'); ?>
<!--<nav class="navbar navbar-inverse navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
       <div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url(); ?>images/wbs-suite/dot-matrix.png" height="30" style="margin-right:10px; margin-left: 10px;"></a>
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
								<div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
									
									<a href="<?php echo base_url(); ?>paas-port/dashboard">
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
					
					
				</div>
						
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav " href="#"><img src=" <?php echo base_url(); ?>images/silo-sd/silo.png" height="30"></a>
        </div>
       
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">BUY A DOMAIN</a>
                </li>
                <li>
                    <a href="#">ORDER HOSTING</a>
                </li>
                <li>
                    <a href="#">MARKETPLACE</a>
                </li>

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
                        <img src="https://placehold.it/25x25" alt="">John Doe
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="<?php echo base_url().'paas-port/view/'.$slug; ?>"> Profile</a></li>
									<li><a href="<?php 
												echo base_url()."dashboard";
												//echo base_url()."Silo/dashboard";
												// echo base_url()."silosd/backend/login/adminlogin";
												
											?>"> Go to Dashboard &nbsp; </a></li>
                        <li><a href="<?php echo base_url(); ?>login/logout" onclick="return confirm('Are you sure?')"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
						
                    </ul>
                </li>
            </ul>

        </div>
       
    </div> -->
    <!-- Main container -->
    <div class="learnMoreAbout" style="top: 54px">
        <a href="#demo" class="btn btn-danger btn-block" data-toggle="collapse">Member Profile</a>
        <div id="demo" class="collapse" style="background: #ffffff; ">
            <div class="container-fluid">
                <div class="margin-top-25">
                    <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                        <div class="card">
                            <img class="card-img-top img-responsive" src="<?php echo base_url(); ?>images/silo-sd/background1.png">
                            <div class="card-block">
                                <h5 class="card-title">Real Life Inspiration Music</h5>

                                <div class="card-text">
                                    Areas tackled in the most fundamental parts of medical research include cellular and molecular biology, medical genetics,
                                </div>
                            </div>
                            <div class="card-footer">
                                <span class="col-md-4"> <button class="btn btn-danger">Subscribe</button></span>
                                <span class="col-md-8"> <input id="input-21d" value="4" type="text" class="rating " data-min=0 data-max=5 data-step=0.5 data-size="xs"
                                              title=""></span>

                            </div>
                        </div>
                    </div>
                </div>
            <div class="main_container col-lg-9">
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="dashboard_graph">
                                <div class="row x_title">
                                    <div class="col-md-6">
                                        <h3>Network Activities <small>Graph title sub-title</small></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div id="chart_plot_01" class="demo-placeholder"></div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                                    <div class="x_title">
                                        <h2>Top Campaign Performance</h2>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-6">
                                        <div>
                                            <p>Facebook Campaign</p>
                                            <div class="">
                                                <div class="progress progress_sm" style="width: 76%;">
                                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p>Twitter Campaign</p>
                                            <div class="">
                                                <div class="progress progress_sm" style="width: 76%;">
                                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-6">
                                        <div>
                                            <p>Conventional Media</p>
                                            <div class="">
                                                <div class="progress progress_sm" style="width: 76%;">
                                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p>Bill boards</p>
                                            <div class="">
                                                <div class="progress progress_sm" style="width: 76%;">
                                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    <br />

                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="x_panel tile fixed_height_320">
                                <div class="x_title">
                                    <h2>App Versions</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <h4>App Usage across versions</h4>
                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.2</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>123k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.3</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>53k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.4</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>23k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.5</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>3k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.6</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>1k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="x_panel tile fixed_height_320 overflow_hidden">
                                <div class="x_title">
                                    <h2>Device Usage</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table class="" style="width:100%">
                                        <tr>
                                            <th style="width:37%;">
                                                <p>Top 5</p>
                                            </th>
                                            <th>
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                    <p class="">Device</p>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                                    <p class="">Progress</p>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                                            </td>
                                            <td>
                                                <table class="tile_info">
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square blue"></i>IOS </p>
                                                        </td>
                                                        <td>30%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square green"></i>Android </p>
                                                        </td>
                                                        <td>10%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square purple"></i>Blackberry </p>
                                                        </td>
                                                        <td>20%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square aero"></i>Symbian </p>
                                                        </td>
                                                        <td>15%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square red"></i>Others </p>
                                                        </td>
                                                        <td>30%</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="x_panel tile fixed_height_320">
                                <div class="x_title">
                                    <h2>Quick Settings</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="dashboard-widget-content">
                                        <ul class="quick-list">
                                            <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
                                            </li>
                                            <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
                                            </li>
                                            <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                                            <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                                            </li>
                                            <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                                            <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                                            </li>
                                            <li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
                                            </li>
                                        </ul>

                                        <div class="sidebar-widget">
                                            <h4>Profile Completion</h4>
                                            <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
                                            <div class="goal-wrapper">
                                                <span id="gauge-text" class="gauge-value pull-left">0</span>
                                                <span class="gauge-value pull-left">%</span>
                                                <span id="goal-text" class="goal-value pull-right">100%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- /page content -->
        </div>
    </div>
</nav>
<!-- Header -->
<div class="intro-header">
    <div class="container">

        <div class="row">
            <div class="col-lg-offset-2 col-lg-6">
                <div class="intro-message">
                    <h1>Silo MicroSD Cards</h1>
                    <h4 class="padding-bottom-10">Extra storage for your mobile phone and other devices</h4>
                    <a href="" class="btn btn-danger ">Where to Buy SiloSD Memory Cards</a>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.intro-header -->

<!-- Page Content -->
<!--Section 1 Start-->
<div class="row" style="background: #595959;">
    <div class="container padding-top-20 padding-bottom-20">
            <div class="col-lg-8">
            <h3 class="white col-lg-12"> NAME YOUR PERSONAL CLOUD <small class="white">Starting from $9.99</small></h3>
                <div class="form-group col-lg-6 col-md-6">
                <input type="text" class="form-control" id="usr" placeholder="Enter your domain name here....">
                 </div>
                <div class="col-lg-6 col-md-6">
                    <button type="button" class="col-lg-6 col-md-6 col-xs-12 btn btn-default">Have a Promo Code ?</button>
                    <button type="button" class="col-lg-6 col-md-6 col-xs-12 btn btn-danger">SEARCH DOMAIN</button>
                </div>
             </div>
            <div class="col-lg-4 card-img hidden-xs hidden-sm hidden-md">
                <img src=" <?php echo base_url(); ?>images/silo-sd/card.png" >
            </div>
    </div>
</div>
<!--Section 1 End-->

<!--Section 2 Start-->
<div class="row">
    <div class="container">
        <div class="col-lg-12">
        <div class="col-lg-offset-3 col-lg-1 col-md-offset-2 col-md-1"> <img src=" <?php echo base_url(); ?>images/silo-sd/silosecureddata.png" height="100" width="60" class="img-responsive center-block"></div>
        <h1 class="red col-lg-6 col-md-8 margin-bottom-0 security-service">Security As A Service</h1>
        <h4 class="red col-lg-6 col-md-8 security-sub">Your Privacy, Your Data, Fully-encrypted, Forever Yours.</h4>
        </div>
        <div class="col-lg-12">
        <div class="col-lg-offset-2 col-lg-8 col-md-12">
            <h3 class=" center">Get Expanded Auxiliary Storage for More Music, Photos,
            and Videos from Your SiloSD™ Cloud Enabled Device!</h3>
        </div>
        </div>
        <div class="col-lg-12 padding-top-20">
            <div class="col-lg-offset-3 col-lg-8 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
                <div class="col-lg-3  col-sm-4 col-xs-12 ">
                    <img src=" <?php echo base_url(); ?>images/silo-sd/domain.png" class="img-responsive center-block">
                    <h6 class="center">Choose Your Domain</h6>
                </div>
                <div class="col-lg-3 col-sm-4 col-xs-12 ">
                    <img src=" <?php echo base_url(); ?>images/silo-sd/hosting.png" class="center-block img-responsive">
                    <h6 class="center">Personal Secured Webspace and Storage to be used as you wish...</h6>
                </div>
                <div class="col-lg-3 col-sm-4 col-xs-12 ">
                    <img src=" <?php echo base_url(); ?>images/silo-sd/website.png" class="img-responsive center-block">
                    <h6 class="center">Upload your website in your Secured Space</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Section 2 End-->
<!--Section 3 Start-->
<div class="row">
    <hr class="hr-red hidden-xs hidden-sm hidden-md">
    <div class="container margin-top-25">
        <div class=" col-xs-12 center">
            <a href="" class="btn bnt-block btn-danger btn-lg margin-bottom-25">Take Free Trial</a>
        </div>
        <div class="col-lg-6 col-md-6">
            <p><strong> 99.9% Uptime Guarantee
            We are confident in our backup contingency plans that we offer a 99.9%.</strong></p>

            <p><strong>Blazing Fast Site Load Time</strong>
            Host your website with us and experience blazing fast site load speed.</p>

            <p><strong>Easy to Use Control Panel</strong>
            Our online control panel is designed to be very easy to use.</p>

            <p><strong>Free Migration</strong>
            Buy any shared, reseller or VPS and our migration expert will migrate your site.</p>
        </div>
        <div class="col-lg-6 col-md-6">
            <p><strong>Auto Installed Apps</strong>
            All of our hosting plans include a number of free server-side applications.</p>

            <p><strong>Best Infrastructure</strong>
            A network that is wrapped with better quality and uptime!</p>

            <p><strong>Free 24×7/365 Support</strong>
            Support specialists are available via e-mail, support tickets and telephone.</p>

            <p><strong>Lowest price in Industry</strong>
            Our prices are lowest but we do not compromise in service and quality.</p>
        </div>
    </div>
</div>
<!--Section 3 End-->
<!--Section 4 Start-->
<div class="row margin-top-25" style=" background: #0f0f0f">
    <div class="col-lg-2 col-md-2 col-sm-2 padding-left-0" >
        <img src="<?php echo base_url(); ?>images/silo-sd/black-sd.jpg" class="img-responsive">
    </div>
    <div class=" col-lg-8 col-md-8 padding-top-15">
        <h2 class="white center">Extend your mobile device storage to your silocloud... <a href="" class="btn btn-danger btn-lg">Learn More</a></h2>
    </div>

</div>
<!--Section 4 End-->
<!--Section 5 Start-->
<div class="row">
    <div class="container-fluid">
        <div class="">
            <img src="<?php echo base_url(); ?>images/fiber-rails/our%20platform.png" class="img-responsive center-block">
        </div>
        <div class="col-lg-12">
           <ul class=" list-inline ">
               <li class="col-lg-2 col-sm-3 col-xs-6">
                   <img src="<?php echo base_url(); ?>images/silo-sd/logos/WINDOWS.png" class="img-responsive center-block">
               </li>
               <li class="col-lg-2 col-sm-3  col-xs-6">
                   <img src="<?php echo base_url(); ?>images/silo-sd/logos/APPLE.png" class="img-responsive center-block">
               </li>
               <li class="col-lg-2 col-sm-3  col-xs-6">
                   <img src="<?php echo base_url(); ?>images/silo-sd/logos/lINUX.png" class="img-responsive center-block">
               </li>
               <li class="col-lg-2 col-sm-3  col-xs-6">
                   <img src="<?php echo base_url(); ?>images/silo-sd/logos/ANDROID.png" class="img-responsive center-block">
               </li>
               <li class="col-lg-2 col-sm-3  col-xs-6">
                   <img src="<?php echo base_url(); ?>images/silo-sd/logos/AMAZON.png" class="img-responsive center-block">
               </li>
               <li class="col-lg-2 col-sm-3  col-xs-6">
                   <img src="<?php echo base_url(); ?>images/silo-sd/logos/lG.png" class="img-responsive center-block">
               </li>
               <li class="col-lg-2 col-sm-3  col-xs-6 hidden-lg" >
                   <img src="<?php echo base_url(); ?>images/silo-sd/logos/SAMSUNG.png" class="img-responsive center-block">
               </li>
               <li class="col-lg-2 col-sm-3  col-xs-6 hidden-lg">
                   <img src="<?php echo base_url(); ?>images/silo-sd/logos/NVIDIA.png" class="img-responsive center-block">
               </li>

           </ul>
        </div>
    </div>
</div>
<!--Section 5 End-->
<!-- Section 6 Start-->
<div class="row" style="background: #8c8c8c">
        <div class="col-lg-6  padding-left-0 padding-right-0">
            <img src="<?php echo base_url(); ?>images/silo-sd/datasecurityonredkeyboar_137471-752x471.jpg" style="height: 100%; width: 100%;" class="center-block img-responsive">
        </div>
        <div class="col-lg-6  padding-top-5 ">
            <p class="white">The SiloSd micro SDCG (Secured Data Cloud Gate) cards offer an easy, affordable way to expand your mobile device's on-board memory. Available in native 8GB to 32GB, these cards give you additional storage space for your favorite photos, music and even HD videos by uniquly optimizing stored data from your mobile device to the cloud.</p>

            <p class="white">SiloSD micro SDCG cards are new to the landscape of expanded RAM cards due to its patent pending capabilities that extends storage and runtime activities of your mobile device to the Silo Cloud, where your moments and memories are stored and accessible from any network enabled device when you need it.</p>

            <p class="white">SiloSD goes a step further with its embedded solution that conditions and optimizes your mobile device by removing damaging cache from your phones internal memory and compressing it in a security auxiliary silo for restoration or future backup.</p>

            <p class="white">SiloSD’s Hybrid Data Access allows a user to unlock the unlimited storage potential of our SiloCloud while improving the performance of your mobile device.</p>

            <p class="white">SiloSD boast a revolutionary change to traditional storage extenders:
            Optimization</p>

            <p class="white">Restoration/Backup to the Cloud</p>

            <p class="white">Anti-Virus Security</p>
            <p class="white">The shock proof, x-ray proof, X-ray proof, temperature proof and waterproof SiloSD is guaranteed assurance that your data is secured along with your call logs, text, and
            applications that operate in Hyper V environments.
            Extra storage for your mobile phone and other devices</p>
        </div>
</div>
<!-- Section 6 End-->
<!-- Section 7 Start-->
<div class="row">
        <img src="<?php echo base_url(); ?>images/silo-sd/section-memory.jpg" class="center-block img-responsive">
</div>
<!-- Section 7 End-->
<!-- Section 8 Start-->
<div class="row">
    <div class="container">
        <div class="col-lg-4">
            <img src="<?php echo base_url(); ?>images/silo-sd/device.png" class="img-responsive center-block">
        </div>
        <div class="col-lg-8  hidden-xs">
            <img src="<?php echo base_url(); ?>images/cards.png" class="center-block img-responsive">
        </div>
    </div>    
</div>
<!-- Section 8 End-->
<!-- Section 9 Start-->
<div class="row" style="background: #808080">
    <div class="container-fluid">
            <div class="center">
        <button type="button" class="btn btn-danger"><a href="" class="white"><h3>ORDER  NOW</h3>
            <h6>Get started with 5GB free.  Upgrade anytime.</h6>
        </a></button>
            </div>
    </div>
</div>
<!-- Section 9 End-->
<!-- Section 10 Start-->
<div class="row">
    <div class="container">
        <div>
            <h3 class="center">SILOSD FOUND AT PARTICIPATING RETAILERS (USA)</h3>
        </div>
        <div class="col-lg-offset-1 col-lg-12 col-md-offset-2 col-md-10 ">
        <div class="col-lg-3 col-sm-4  margin-10">
            <img src="<?php echo base_url(); ?>images/silo-sd/metropcs-logo.png" class="img-responsive center-block">
        </div>
        <div class="col-lg-3 col-sm-3 margin-10">
            <img src="<?php echo base_url(); ?>images/silo-sd/cricket-logo2.png" class="img-responsive center-block">
        </div>
        <div class="col-lg-3 col-sm-3 margin-10">
            <img src="<?php echo base_url(); ?>images/silo-sd/staples-crop-u20681.png" class="img-responsive center-block">
        </div>
        </div>
    </div>
</div>
<!-- Section 10 End-->
<!-- Section 11 Start-->
<div class="row margin-top-25">
    <div class="container">
        <div class="col-lg-12">
        <div>
            <img src="<?php echo base_url(); ?>images/silo-sd/silocloud.png"  class="img-responsive center-block" style="height:100px;">
        </div>
        </div>
        <div class="padding-top-10">
        <h2 class="center">Get started with 5GB free.  Upgrade anytime.</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="container">
        <div class="col-lg-3 col-md-3 col-sm-3 pricing-table">
            <h2 class="center">Starter<br>
                Try Scandisc free
            <br><small>$</small>0<br><small>NEVER EXPIRES</small>
            </h2>
            <div class="center">
            <button type="button" class="btn btn-danger pricing-btn">FREE SIGNUP</button>
            </div>
            <p class="padding-top-10">
            <strong>Cloud storage:</strong><br>
            5 GB secure storage
            </p>
            <p><strong>Features:</strong> </p>
            <p>
                <strong>Apps and devices</strong>
                <br>· Desktop (Windows and Mac)
                <br>· Mobile (iPhone, iPad and Android)
                <br>· Web access
                <br>· End-to-end, zero-knowledge encryption
            </p>
            <p><strong>
            Sharing</strong>
                <br>· Send links to files and folders
                <br>· Recipients of links do not need a Sync account
                <br>· Password protection
            </p>
            <p><strong>
            Collaboration</strong>
                <br>· Create shared folders
                <br>· Invite anyone to shared folders
            </p>
            <p><strong>
            Backup and restore</strong>
                <br>· Sync or restore to any computer
                <br> · Real time backup
                <br> · Selectively sync folders
                <br> · Deleted file recovery (30-day)
                <br>  · File version history (30-day)
            </p>
            <p><strong>
            Support</strong>
                <br> · Help guides and knowledge base
            </p>
        </div>

        <div class="margin-left-70 col-lg-3 col-md-3 col-sm-3 pricing-table">
            <h2 class="center">Starter<br>
                Try Scandisc free
                <br><small>$</small>9<sup>99</sup><br><small>NEVER EXPIRES</small>
            </h2>
            <div class="center">
            <button type="button" class="btn btn-danger pricing-btn" >CUSTOMIZE</button>
            </div>
            <p class="padding-top-10">
                <strong>Cloud storage:</strong><br>
                1TB secure storage
                <br>
                Includes all Starter features plus:
            </p>
            <p><strong>Features:</strong> </p>
            <p>
                <strong>Apps and devices</strong>
                <br>· Desktop (Windows and Mac)
                <br>· Mobile (iPhone, iPad and Android)
                <br>· Web access
                <br>· End-to-end, zero-knowledge encryption
            </p>
            <p><strong>
                Sharing</strong>
                <br>· Send links to files and folders
                <br>· Recipients of links do not need a Sync account
                <br>· Password protection
            </p>
            <p><strong>
                Collaboration</strong>
                <br>· Create shared folders
                <br>· Invite anyone to shared folders
            </p>
            <p><strong>
                Backup and restore</strong>
                <br>· Sync or restore to any computer
                <br> · Real time backup
                <br> · Selectively sync folders
                <br> · Deleted file recovery (30-day)
                <br>  · File version history (30-day)
            </p>
            <p><strong>
                Support</strong>
                <br> · Help guides and knowledge base
            </p>
        </div>

        <div class="margin-left-70 col-lg-3 col-md-3 col-sm-3 pricing-table">
            <h2 class="center">Starter<br>
                Try Scandisc free
                <br><small>$</small>5 <sup>99</sup><br><small>NEVER EXPIRES</small>
            </h2>
            <div class="center">
            <button type="button" class="btn btn-danger pricing-btn">ENROLL</button>
            </div>
            <p class="padding-top-10">
                <strong>Cloud storage:</strong><br>
                1TB secure storage
                <br>
                Each user gets all Starter and<br>
                PRO features, plus account owner gets:
            </p>
            <p style="font-size:12px;"><strong>Fiber Rails Account Management</strong>
            <br>· Administrative console to provision multiple users
            <br>· Transfer in existing Scandisc accounts
            <br>· Per user, per folder access controls and permission
            <br>management with advanced collaboration tools
            <br>· Offboard users per folder or per account
            <br>· Transfer account ownership
            </p>
            <p>Desktop Application - Server management</p>
            <p><strong>Centralized billing</strong>
            <br>
            · Single invoice billing for all users
            </p>
            <p><strong>Support</strong></p>
            <br>· Priority email (first in line)
            <br>· 99.9% uptime SLA
            Support
            <br>
            <p>
            Includes all Starter features plus:
            </p>
        </div>
    </div>
</div>
<!--Section 11 End-->
<!--Section 12 Start-->
<div class="row margin-top-25" style="background: #ff0000">
    <h2 class="center white">Need help? Call us at 832 886 7422 (USA)</h2>
</div>
<!--Section 12 End-->
<!--Section 13 Start-->
<div class="row margin-top-25">
    <div class="container">
        <div class="col-lg-6 col-md-6 p-size">
           <p><strong>No hardware or software costs</strong>
            No upfront investment and you only pay for the mailboxes you create.</p>

            <p><strong>Virtualized mailboxes</strong>
            Use our cloud solution and free up server space.</p>

            <p><strong>Easy deployment</strong>
            With our turn-key product you will be up and running in no time.</p>
        </div>
        <div class="col-lg-6 col-md-6 p-size">
            <p><strong>In-house 24/7 abuse team</strong>
            Let us worry about blacklist mitigation while you focus on your business.</p>

            <p><strong>Secure data centers</strong>
            We are committed to stringent security.</p>

            <p><strong> Affordable</strong>
            Full mailboxes start at Rs 49/- per month*.</p>
        </div>
    </div>
</div>
<div class="row margin-top-25">
    <div class="container">
        <div class="center">
        <button type="button" class="btn btn-danger btn-lg margin-bottom-25">Features</button>
        </div>
        <div class="col-lg-12 landscape-feature">
            <ul class="list-inline ">
                <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                    <img src="<?php echo base_url(); ?>images/silo-sd/1.png" class="img-responsive center-block">
                </li>
                <li class="col-lg-2 col-md-2 col-sm-2  col-xs-6">
                    <img src="<?php echo base_url(); ?>images/silo-sd/2.png" class="img-responsive center-block">
                </li>
                <li class="col-lg-2 col-md-2 col-sm-2  col-xs-6">
                    <img src="<?php echo base_url(); ?>images/silo-sd/3.png" class="img-responsive center-block">
                </li>
                <li class="col-lg-2 col-md-2 col-sm-2  col-xs-6">
                    <img src="<?php echo base_url(); ?>images/silo-sd/4.png" class="img-responsive center-block">
                </li>
                <li class="col-lg-2 col-md-2 col-sm-2  col-xs-6">
                    <img src="<?php echo base_url(); ?>images/silo-sd/5.png" class="img-responsive center-block">
                </li>
                <li class="col-lg-2 col-md-2 col-sm-2  col-xs-6 hidden-sm">
                    <img src="<?php echo base_url(); ?>images/silo-sd/6.png" class="img-responsive center-block">
                </li>
            </ul>
        </div>

    </div>
</div>

<!--Section 13 End-->
<!--Section 14 End-->
<div class="row">
        <img src="<?php echo base_url(); ?>images/silo-sd/fibrails.png" style="height:100%; width: 100%;" alt="" class="img-responsive center-block">
</div>
<!--Section 14 End-->


<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <p class="white"><strong class="white">Do you have a demo or free trial?</strong>
                    The best way to find out whether Sync is right for you is to use it - for free!
                    Our starter plan has all of the basic features needed to get started, and
                    never expires. We also offer a 30 day money back guarantee on all paid
                    plans. Go PRO risk free today.</p>

                    <p class="white"><strong class="white">Questions?</strong>
                    Feel free to contact us at any time. We're real people ready to help you
                    with any sales or technical support related questions you may have. And
                    we love talking about security, privacy, and encryption too.</p>
                </div>
                <div class="col-lg-6">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <ul>
                        <li>Windows Hosting</li>
                        <li>Linux Hosting</li>
                        <li>VPS Hosting</li>
                        <li>Linux Reseller</li>
                        <li>Java Hosting</li>
                        <li>Dedicated Servers</li>
                    </ul>
                   </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <ul>
                        <li>About Us</li>
                        <li>Client Area</li>
                        <li>Support</li>
                        <li>Privacy Policy</li>
                        <li>Payment Options</li>
                        <li>Testimonials</li>
                        <li>Terms & Conditions</li>
                    </ul>
                     </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <ul>
                        <li>Website Builder</li>
                        <li>Web Design</li>
                        <li>Logo/Campaign Design</li>
                        <li>Domain Register</li>
                        <li>Advertisement</li>
                        <li>Search Optimization</li>
                    </ul>
                     </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class="center white copyright text-muted small">Copyright © 2017 Scandiscs.com, SiloSd.com, Silo Cloud Services and RP Digital LLC. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery -->
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/star-rating.js" type="text/javascript"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<!-- jQuery -->
<!-- jQuery -->

<!--script src="./vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo base_url(); ?>vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo base_url(); ?>vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url(); ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>vendors/iCheck/icheck.min.js"></script>

<!-- Flot -->
<script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url(); ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url(); ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo base_url(); ?>vendors/DateJS/build/date.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url(); ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Custom Theme Scripts -->
<script src="js/custom.min.js"></script>
</body>
</html>
