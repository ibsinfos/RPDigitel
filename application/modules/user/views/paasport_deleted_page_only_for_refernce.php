<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PaasPort</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico?crc=4022900773"/>
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/paasport.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/paasport-login.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/wbs-suite.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/class.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
          type="text/css">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container-fluid topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url(); ?>images/paasport-login/dot-matrix.png"
                                                                            height="30" style="margin-right:10px;"></a>
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
            <img class="block mob-brand" src="<?php echo base_url(); ?>images/paasport-login/paasport.png" alt="" height="45"
                 style="padding-top: 5px; padding-bottom: 5px;">

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
                <li>
                    <a href="#" class="top-navlinks" type="button" data-toggle="modal" data-target="#memberLogin"><img
                            src="<?php echo base_url(); ?>images/wbs-suite/cloud-computing.png" alt="" height="27">
                        Member Login</a>
                </li>
                <!--<li role="presentation" class="dropdown">-->
                    <!--<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"-->
                       <!--aria-expanded="false">-->
                        <!--<i class="fa fa-bell-o" aria-hidden="true"></i>-->
                        <!--<span class="badge bg-red">6</span>-->
                    <!--</a>-->
                    <!--<ul id="menu2" class="dropdown-menu list-unstyled msg_list" role="menu">-->
                        <!--<li>-->
                            <!--<a>-->
                                <!--<span class="image"><img src="images/favicon.ico" alt="Profile Image"/></span>-->
                                <!--<span>-->
                          <!--<span>John Smith</span>-->
                          <!--<span class="time">3 mins ago</span>-->
                        <!--</span>-->
                                <!--<span class="message">-->
                          <!--Film festivals used to be do-or-die moments for movie makers. They were where...-->
                        <!--</span>-->
                            <!--</a>-->
                        <!--</li>-->
                        <!--<li>-->
                            <!--<a>-->
                                <!--<span class="image"><img src="images/favicon.ico" alt="Profile Image"/></span>-->
                                <!--<span>-->
                          <!--<span>John Smith</span>-->
                          <!--<span class="time">3 mins ago</span>-->
                        <!--</span>-->
                                <!--<span class="message">-->
                          <!--Film festivals used to be do-or-die moments for movie makers. They were where...-->
                        <!--</span>-->
                            <!--</a>-->
                        <!--</li>-->
                        <!--<li>-->
                            <!--<a>-->
                                <!--<span class="image"><img src="images/favicon.ico" alt="Profile Image"/></span>-->
                                <!--<span>-->
                          <!--<span>John Smith</span>-->
                          <!--<span class="time">3 mins ago</span>-->
                        <!--</span>-->
                                <!--<span class="message">-->
                          <!--Film festivals used to be do-or-die moments for movie makers. They were where...-->
                        <!--</span>-->
                            <!--</a>-->
                        <!--</li>-->
                        <!--<li>-->
                            <!--<a>-->
                                <!--<span class="image"><img src="images/favicon.ico" alt="Profile Image"/></span>-->
                                <!--<span>-->
                          <!--<span>John Smith</span>-->
                          <!--<span class="time">3 mins ago</span>-->
                        <!--</span>-->
                                <!--<span class="message">-->
                          <!--Film festivals used to be do-or-die moments for movie makers. They were where...-->
                        <!--</span>-->
                            <!--</a>-->
                        <!--</li>-->
                        <!--<li>-->
                            <!--<div class="text-center">-->
                                <!--<a>-->
                                    <!--<strong>See All Alerts</strong>-->
                                    <!--<i class="fa fa-angle-right"></i>-->
                                <!--</a>-->
                            <!--</div>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</li>-->
                <!--<li role="presentation" class="dropdown">-->
                    <!--<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"-->
                       <!--aria-expanded="false">-->
                        <!--<i class="fa fa-envelope-o"></i>-->
                        <!--<span class="badge bg-red">6</span>-->
                    <!--</a>-->
                    <!--<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">-->
                        <!--<li>-->
                            <!--<a>-->
                                <!--<span class="image"><img src="images/favicon.ico" alt="Profile Image"/></span>-->
                                <!--<span>-->
                          <!--<span>John Smith</span>-->
                          <!--<span class="time">3 mins ago</span>-->
                        <!--</span>-->
                                <!--<span class="message">-->
                          <!--Film festivals used to be do-or-die moments for movie makers. They were where...-->
                        <!--</span>-->
                            <!--</a>-->
                        <!--</li>-->
                        <!--<li>-->
                            <!--<a>-->
                                <!--<span class="image"><img src="images/favicon.ico" alt="Profile Image"/></span>-->
                                <!--<span>-->
                          <!--<span>John Smith</span>-->
                          <!--<span class="time">3 mins ago</span>-->
                        <!--</span>-->
                                <!--<span class="message">-->
                          <!--Film festivals used to be do-or-die moments for movie makers. They were where...-->
                        <!--</span>-->
                            <!--</a>-->
                        <!--</li>-->
                        <!--<li>-->
                            <!--<a>-->
                                <!--<span class="image"><img src="images/favicon.ico" alt="Profile Image"/></span>-->
                                <!--<span>-->
                          <!--<span>John Smith</span>-->
                          <!--<span class="time">3 mins ago</span>-->
                        <!--</span>-->
                                <!--<span class="message">-->
                          <!--Film festivals used to be do-or-die moments for movie makers. They were where...-->
                        <!--</span>-->
                            <!--</a>-->
                        <!--</li>-->
                        <!--<li>-->
                            <!--<a>-->
                                <!--<span class="image"><img src="images/favicon.ico" alt="Profile Image"/></span>-->
                                <!--<span>-->
                          <!--<span>John Smith</span>-->
                          <!--<span class="time">3 mins ago</span>-->
                        <!--</span>-->
                                <!--<span class="message">-->
                          <!--Film festivals used to be do-or-die moments for movie makers. They were where...-->
                        <!--</span>-->
                            <!--</a>-->
                        <!--</li>-->
                        <!--<li>-->
                            <!--<div class="text-center">-->
                                <!--<a>-->
                                    <!--<strong>See All Alerts</strong>-->
                                    <!--<i class="fa fa-angle-right"></i>-->
                                <!--</a>-->
                            <!--</div>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</li>-->
                <!--<li class="">-->
                    <!--<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"-->
                       <!--aria-expanded="false">-->
                        <!--<img src="https://placehold.it/25x25" alt="">John Doe-->
                        <!--<span class=" fa fa-angle-down"></span>-->
                    <!--</a>-->
                    <!--<ul class="dropdown-menu dropdown-usermenu pull-right">-->
                        <!--<li><a href="javascript:;"> Profile</a></li>-->
                        <!--<li><a href="subscribe.html"> Subscribe &nbsp;-->
                            <!--<small style="background: #ff0000; color:#ffffff; padding:3px;"> Free</small>-->
                        <!--</a></li>-->
                        <!--<li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>-->
                    <!--</ul>-->
                <!--</li>-->

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
    <div>
        <a href="#demo" class="btn btn-collapse btn-block" data-toggle="collapse">Learn More about Fiber Rail
            Services</a>

        <div id="demo" class="collapse">
            <ul class="list-inline hidden-xs" style="margin-bottom:0px; padding:20px; padding-left:10%">
                <li class=" padding-left-30"><a href="#">RPDigital</a></li>
                <li class=" padding-left-30"><a href="#">FiberRails</a></li>
                <li class=" padding-left-30"><a href="#">SiloSD</a></li>
                <li class=" padding-left-30"><a href="#">SiloWebHosting</a></li>
                <li class=" padding-left-30"><a href="#">SiloBank</a></li>
                <li class=" padding-left-30"><a href="#">ScanDiscs</a></li>
                <li class=" padding-left-30"><a href="#">MyScandisc</a></li>
                <li class=" padding-left-30"><a href="#">MyScandiscTV</a></li>
                <li class=" padding-left-30"><a href="#">NetWork</a></li>
                <li class=" padding-left-30"><a href="#">MarketPlace</a></li>
            </ul>
            <div class="col-md-6">
                <div class="hidden-xs hidden-sm">
                    <img class="block"
                         src="<?php echo base_url(); ?>images/thingorilla_business_135.jpg?crc=290504810" alt=""
                         height="300" style="margin:70px 0 60px 100px"></div>
            </div>
            <div class="col-md-6">
                <div class="margin-top-25">
                    <h2 class="center">Try Out Our Business Apps</h2>
                    <div class="col-md-6 col-sm-6">
                        <div class="color-box-1">
                            <div class="padding-10 padding-left-20">
                                <a href="#">
                                    <h4 class="white">Retargetting</h4>
                                    <h6 class="white">Real life inspiration music</h6>
                                </a>
                            </div>
                        </div>
                        <div class="color-box-2 margin-top-25">
                            <div class="padding-10 padding-left-20">
                                <a href="#">
                                    <h4 class="white">Live Sales</h4>
                                    <h6 class="white">Chat and close sales with key customers</h6>
                                </a>
                            </div>
                        </div>
                        <div class="color-box-3 margin-top-25">
                            <div class="padding-10 padding-left-20">
                                <a href="#">
                                    <h4 class="white">Google Shopping</h4>
                                    <h6 class="white">Tap into Google with Product Listing Ads</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <div class="color-box-4 ">
                            <div class="padding-10 padding-left-20">
                                <a href="#">
                                    <h4 class="white">Facebook Integration</h4>
                                    <h6 class="white">Tap into Facebook Product Listing Ads</h6>
                                </a>
                            </div>
                        </div>
                        <div class="color-box-5 margin-top-25">
                            <div class="padding-10 padding-left-20">
                                <a href="#">
                                    <h4 class="white">Fiber Rails</h4>
                                    <h6 class="white">ERP/CRM Platform for Startups & Enterprise</h6>
                                </a>
                            </div>
                        </div>
                        <div class="color-box-6 margin-top-25">
                            <div class="padding-10 padding-left-20">
                                <a href="#">
                                    <h4 class="white">Web Optimization</h4>
                                    <h6 class="white">Real life inspiration music</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!--Slider Start-->

<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item ">
            <img src="<?php echo base_url(); ?>images/paasport-login/Slide1.jpg" class="img-responsive">
            <div class="container">
                <div class="carousel-caption">
                    <p class="img-paas img-responsive">
                    </p>
                    <h1 style="color:#000000">SignIn To (Paas) Portal</h1>

                </div>
            </div>
        </div>
        <div class="item active">
            <img src="<?php echo base_url(); ?>images/paasport-login/Slide1.jpg" class="img-responsive">
            <div class="container">
                <div class="carousel-caption">
                    <p class="img-face img-responsive">
                    </p>
                    <h1 style="color:#000000">Platform-as-a-Service</h1>
                    <p style="color:#000000">Flexibility, Portability & Reliability - Enhances Mobility</p>
                    <p><a class="btn btn-large btn-danger" href="#">Learn more</a></p>
                </div>
            </div>
        </div>

    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>
<!-- /.carousel -->
<!--Slider End-->
<!--Section 1 Start-->
<div class="row" style="background: #f2f2f2">
    <div class="container">
        <div class="col-lg-6 col-md-6 " style="padding:30px 0 0 0;">
            <h2>Our PaaSPort tool empowers you to focus on your business core values rather than building
                applications.</h2>

            <p> There are a lot of different approaches to delivering services on top of software defined
                infrastructure. They range from simple templated app deployments to complex ecosystems to manage your
                entire application lifecycle. In the same way you don’t really want to be wrangling hardware, you don’t
                want to get bogged down with the same operational lifecycle overheads as your competitors.</p>


            <p> Enlist FiberRails and your platform of empowerment... Using Silo, Paasport and Scandisc allows you to
                deploy enterprise tools that automate your business and lets you focus on the things that matter to
                you!</p>

        </div>
        <div class="col-lg-6 col-md-6">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background: rgba(0,0,0,0.7); padding:50px 0;">
                <h3 class="center white">Sign Up</h3>
                <form role="form">
                    <div class="form-group col-md-offset-1 col-md-10 col-xs-offset-2 col-xs-8">
                        <input type="text" class="form-control " id="userId" placeholder="Enter Username">
                    </div>
                    <div class="form-group col-md-offset-1 col-md-10 col-xs-offset-2 col-xs-8">
                        <input type="text" class="form-control " id="userEmail"
                               placeholder="Enter email address">
                    </div>
                    <div class="form-group col-md-offset-1 col-md-10 col-xs-offset-2 col-xs-8">
                        <input type="tel" class="form-control " id="phoneNumber"
                               placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group col-md-offset-1 col-md-10 col-xs-offset-2 col-xs-8">
                        <input type="text" class="form-control " id="companyName"
                               placeholder="Enter Company Name">
                    </div>
                    <div class="form-group col-md-offset-1 col-md-10 col-xs-offset-2 col-xs-8">
                        <input type="password" class="form-control " id="password" placeholder="Password">
                    </div>
                    <div class="form-group col-md-12 col-xs-12 center ">
                        <button type="submit" class="btn btn-danger">Sign Up </button>
                    </div>
                    <div class="form-group  col-md-12 center">
                        <button type="submit" class="btn btn-danger btn-o">Already a Member? Login</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding:30px 0 0 0;">
                <div>
                    <img src="<?php echo base_url(); ?>images/paasport-login/sded199x199.jpg" alt="" class="center-block img-responsive"
                         style="height: 160px; margin-top:30px;">
                </div>
                <div class="center">
                    <button class="btn btn-danger margin-top-10">Create QR Code</button>
                    <p class="margin-top-10"><a href="">Embed QR Code</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Section 1 End-->
<!--Section 2 Start-->
<div class="container-fluid big-bg">
    <div class="row">
        <div class="col-lg-6 padding-30" style="background:rgba(255,255,255,0.95);">
            <img src="<?php echo base_url(); ?>images/paasport-login/paasport.png" alt="" class="img-responsive center-block"
                 style="opacity: 0.7; height:60px; margin-bottom:20px;">

            <h3>A New Approach to Managed Cloud Contacts</h3>
            <p>As your business grows it needs to focus on its core strengths, and that isn’t managing IT
                infrastructure. You need platforms that bring you the benefits of the latest advances without getting
                stuck on a huge learning curve.</p>
            <p>Fiberrails can bring those advances to your company in the form of a fully managed cloud platform.</p>
            <p>Our managed cloud solution provides a complete hands-off cloud experience, utilizing state of the art
                cloud infrastructure combined with well honed traditionally engineered best practice solutions. From
                cloud planning and strategy, through to migration, testing and optimization – this is the whole
                package.</p>
            <p>Let us make the most out of your cloud platform, while you get back to working on your core business.</p>
            <img src="<?php echo base_url(); ?>images/paasport-login/ps6-crop-u71465.png" alt="" class="img-responsive center-block">
            <h4>Exchange Contacts and Grow Your Targeted Database!</h4>
            <p>Feel free to contact us at any time. We're real people ready to help you
                with any sales or technical support related questions you may have. And
                we love talking about security, privacy, and encryption too.</p>
            <p>Enable Dynamic referrals that quickly convert into your customers. Real-time analytics show you where
                your next transaction is coming from.</p>
        </div>
        <div>
        </div>
    </div>
</div>
<!--Section 2 End-->
<!--Section 3 Start-->
<div class="container-fluid" style="background-color:#333333;">
    <div class="row">
        <div class="container">
            <img src="<?php echo base_url(); ?>images/paasport-login/3dglobe.png" alt="" class="center-block img-responsive"
                 style="position: relative; top:-30px;">

            <h2 class="center white">Quick & Easy Integration For Developers</h2>
            <h4 class="white center" style="width:80%; margin-left:10%;">Comprehensive integration guides and API
                references for all popular platform to help you at every stage of integration.
                <small class="white"> View Developer Resources</small>
            </h4>
        </div>
    </div>
</div>
<!--Section 3 End-->
<!--Section 4 Start -->
<div class="row">
    <div class="container margin-bottom-25">
        <h1 class="center">(PaaS) Portal QR Campaign</h1>
        <h4 class="center">Features that make you more than current in the mobile landscape!</h4>
    </div>
</div>
<div class="row">
    <div class="container">
        <div class="col-lg-12 ">
            <div class="col-lg-4 padding-bottom-25">
                <p><strong>Successful QR Code campaigns</strong></p>
                <p class="red">Track campaign performance</p>
                <p>After the campaign starts, you can track the scan statistics - how many times, when, where and with
                    what
                    devices the Codes have been scanned. So you can notice any changes in performance immediately. All
                    information is presented in the form of easy-to-understand graphs and charts. The statistics also
                    include raw data tables, downloadable in PDF or CSV format.</p>
                <img class="img-responsive margin-top-25 features-img center-block" src="<?php echo base_url(); ?>images/wbs-suite/ps4.png"
                     alt="" height="125">
            </div>
            <div class="col-lg-4 padding-bottom-25">
                <img class="img-responsive padding-top-10 features-img center-block"
                     src="<?php echo base_url(); ?>images/wbs-suite/ps2381x199.png" alt="" height="200">
                <p><strong>Improved flexibility</strong></p>
                <p class="red">Respond to last-minute changes</p>
                <p>With Dynamic QR Codes, you have full flexibility, because only a short URL that points to the content
                    is
                    encoded. Thus you can modify the stored links or files without having to generate and print the
                    Codes
                    again. This will save resources and enable you to respond to any changes in the campaign as quickly
                    as
                    possible.</p>
            </div>
            <div class="col-lg-4 padding-bottom-25">
                <p><strong>Four high-quality print formats</strong></p>
                <p class="red">Choose the best option</p>
                <p>You can download the Codes in several pixel and vector file formats: JPEG, PNG, EPS and SVG. All
                    files
                    are high-resolution. Select the best option for printing QR Codes in any size, color and on any
                    medium,
                    with no compromises on quality.</p>
                <img class="img-responsive margin-top-25 features-img center-block" src="<?php echo base_url(); ?>images/wbs-suite/ps5.png"
                     alt="" height="150">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="col-lg-4">
                <p><strong>Customer Support</strong></p>
                <p class="red">Get help whenever you need it</p>
                <p>Do you have a question? Get in touch with our friendly Customer Support by email or telephone. Take
                    advantage of our online Support Center with FAQs, How-to guides and ebooks to get advice and
                    creative
                    ideas. We help you to excel at QR Code Marketing.
                </p>
            </div>
            <div class="col-lg-4">
                <img class="img-responsive features-img center-block" src="<?php echo base_url(); ?>images/wbs-suite/ps3381x192.png" alt=""
                     height="180">
            </div>
            <div class="col-lg-4">
                <p><strong>Account sharing</strong></p>
                <p class="red">Work together</p>
                <p>Organize effective teamwork around QR Code campaigns with our flexible account sharing options.
                    Inviting
                    other employees to share your account only takes seconds. You can add several users, either as
                    administrators or just with statistics viewing rights. This way you streamline your campaign
                    planning
                    and make cross-departmental cooperation easier.
                </p>
            </div>
        </div>
    </div>
</div>
<!--Section 4 End-->
<!--Section 5 Start-->
<div class="container-fluid red-world">
    <h3 class="center white margin-top-50">Learn more about PaaSPort & SiloMerchant Services!</h3>
    <div class="center">
        <a href="#" type="button" class="btn btn-danger btn-lg">Merchant Login</a>
    </div>
    <div>
        <img src="<?php echo base_url(); ?>images/paasport-login/qrpayments.png" alt="" class="img-responsive center-block qrpayment-img">
    </div>
    <div>
        <img src="<?php echo base_url(); ?>images/paasport-login/secure.png" alt="" class="img-responsive center-block"
             style="height: 200px; position: relative; top:-40px;">
    </div>

</div>
<!--Section 5 End-->
<!--Section 6 Start-->
<div class="container-fluid" style="background: #7f7f7f">
    <div class="row">
        <div class="container">
            <h3 class="center white">Learn more about PaaSPort Campaign Solutions features</h3>
            <img src="<?php echo base_url(); ?>images/paasport-login/worksheet3.png" alt="" class="center-block img-responsive">
            <p class="white center margin-top-25" style="width:80%; margin-left: 10%;">Choose from a variety of
                functions: from displaying an interactive Facebook Like
                button to encoding a price list in PDF format. These innovative functions will surprise users and
                motivate them to scan the Codes. In the next step, customize the generated QR Codes by selecting colors
                and shapes and inserting your company logo. Or simply by using one of our ready-made design
                templates.</p>
        </div>
    </div>
</div>
<!--Section 6 End-->
<!--Section 7 Start-->
<div class="container">
    <div class="row">
        <h2 class="center margin-10 padding-10">Learn more about PaaSPort QR Codes!</h2>
        <h3 class="center"> Frequently Asked Questions</h3>
        <h4 class="center">What you need to know about Qr codes</h4>

        <div class="col-lg-6 col-md-6 col-sm-6 padding-30 padding-bottom-25">
            <h4>1. What is a QR code?</h4>
            <p class="margin-bottom-25">A QR Code is a two-dimensional barcode consisting of a black and white pixel pattern which allows to
                encode up to a few hundred characters. Today's smartphones and tablets are able to recognize and decode
                them exceptionally fast - it's not surprising that QR stands for Quick Response.</p>
            <h4>3. How can I create a QR code?</h4>
            <p class="margin-bottom-25">With a QR Code Generator a QR Code can be created within seconds and in three simple steps. At first,
                choose the function for your Code. Secondly, enter the content that you want to provide your customers
                and optionally give it a unique look by adjusting the colors and uploading a logo into it. Finished with
                that, Then your Code is ready for downloading and printing.</p>
            <h4>5. What are static and dynamic QR codes?</h4>
            <p class="margin-bottom-25">With dynamic QR Codes it is possible to edit their functions and target addresses - even when they have
                already been printed. They also allow the collection of statistics conceming scan numbers and locations,
                as well as the exact date and time of accesses. Dynamic Codes use a so-called short URL which forwards
                users to your target address. Static Codes do not provide these features but link directly to your
                content without any short URL.</p>
            <h4>7. What do I have to consider before printing?</h4>
            <p> We recommend to use high resolution file formats for printing. Besides JPG and PNG files, vector formats
                such as EPS and SVG are also suitable. The latter two are especially useful for bigger print sizes as
                they can be enlarged without any quality losses. To be on the safe side always do a practical test
                before publishing.</p>
            <h4>9. How can QR codes be scanned?</h4>
            <p class="margin-bottom-25"> Decoding QR Codes needs nothing more than a mobile phone or tablet and a QR Code reader that is
                installed on that device. These QR Code readers are freely available to download from all App Stores. To
                scan the Code, simply launch the App and wait until the camera automatically detects it. Within seconds
                the encoded content is dispalyed on the screen. As a benchmark for the quality of the app, you may refer
                to the average review rating in the App Stores.</p>
            <h4>11. History of QR Codes</h4>
            <p class="margin-bottom-25">As early as 1994 people took advantage of the QR Code's practical features: Denso Wave, a Japanese
                subsidary of the Toyota supplier Denso, developed them for marking components in order to accellerate
                logistic processes for their automobile production. In their country of origin the use of QR Codes is so
                well established that even the Japanese Immigration Office put them on their residence permits. In the
                meantime, QR Codes found their way to Europe over the past couple of years and are intemationally
                standardized now. What makes QR Codes particularly advantageous is that up to 30 percent of their
                surface may be damaged, dirty or altered in other ways without effecting their legibility and
                functionality at all.</p>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 padding-30 padding-bottom-25">
            <h4>2. How are QR codes used?</h4>
            <p class="margin-bottom-25">Due to the widespread use of smartphones, QR Codes are mosly used for mobile marketing purposes these
                days. Marketers benefit from QR Codes by being able to add digital content like websites, videos, PDFs,
                image galleries or contact details to printed media such as flyers, posters, catalogues and business
                cards.</p>
            <h4>4. Is it possible to customize QR Codes?</h4>
            <p class="margin-bottom-25">Yes. Thanks to a high error tolerance level, it is possible to modify QR Codes to a certain degree
                without influencing its legibility at all. For example, you can choose new fore- and background colours,
                place your company logo right in the middle of the Code and change the design of the three distinctive
                corner points. Remember to rnake sure that your Code actually works by testing it practically with
                several smartphones and QR Code readers.</p>
            <h4>6. How can I measure the number of scans of QR codes?</h4>
            <p class="margin-bottom-25">The measurement or 'tracking'. of scans is possible with dynamic QR codes. A forwarding URL which is
                connected to the respective providers' server collects the relevant data. All this real time information
                is then available for you directly in the account.</p>
            <h4>8. What other aspects are important in connection with printing QR Codes?</h4>
            <p class="margin-bottom-25">Apart from the relevant file format, further aspects need to be considered. In general, the print size
                should be determined in relation to the number of characters encoded. If rather much content is encoded,
                accordingly more space is required. A size of approximately 2 x 2 cm should be sufficient in most cases.
                Better avoid uneven surfaces. Wrinkles on leaflets and flyers might also impact the Codes' legibility in
                a negative way.</p>
            <h4>10. How can I use QR codes successfully?</h4>
            <p class="margin-bottom-25">Put yourself in the shoes of your target audience and ask yourself whether you would scan the Code you're
                looking at. Are you excited about what the Code might reveal, Do you expect value or helpful information
                from it, Users put effort into interacting with your advertisement and expect something in return for
                that. Ideally present your content using a mobile website that is adapt. to the respective display size
                and makes it more comfortable for users to navigate through it. Provide value added content and make
                your Code attract people by making use of the various customization options. A simple call to action
                like 'Scan this Code to find out more" has also proven successful and will surely encourage more people
                to see what's behind the Code.</p>
            <h4>12. Application possibilities of QR Codes</h4>
            <p class="margin-bottom-25">The conceivable applications are almost infinite. Especially when encoding URI, many different contents
                are possible. These include homepages, product sites, videos, picture galleries, coupon codes,
                competitions, contact forms or any other types of online forms, social media sites and so on. Many other
                contents do not even require an active internet connection of the used phone. Those are e.g. calendar
                events, WiFi connections or vCards that contain personal contact information which then can easily be
                added to the address book. QR Codes may be placed on web pages, print ads, products or any other flat
                surfaces.</p>

        </div>


    </div>
</div>
<!--Section 7 End-->
<!-- Modal -->
<div class="modal fade" id="memberLogin" role="dialog">
    <div class="modal-dialog">
        <form action="#" method="post" name="member_login" id="member_login">
            <header class="member_login">WbsSuite Login</header>
            <!-- Modal content-->
            <div id="login_errors" style="color:red;">
            </div>
            <label class="form-login"><h4 style="margin-top:0px; margin-bottom:0px;">Username<span>*</span></h4></label>
            <input type="text" id="username" name="username" class="input-lg input-login" placeholder="Enter Username" style="height: 40px;">
            <label class="form-login"><h4 style="margin-top:0px; margin-bottom:0px;">Password <span>*</span></h4></label>
            <input type="password" class="input-lg input-login" name="password" id="password" placeholder="Password" style="height: 40px;">
            <input type="button" name="member_login_button" id="member_login_button" class="form-login1" value="Login">
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
<!-- Footer -->
<footer style="background: red; padding:20px 0 ;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="col-md-6 ">
                    <p class="copyright text-muted small white">© 2017 RPDigital Intellectual Property. All rights
                        reserved.
                        RPDigital, FiberRails logo, and Scandisc are registered trademarks and Platforms&nbsp; with
                        handrails is a service mark of RP Digital Intellectual Property and/or RP Digital affiliated
                        companies. All other marks are the property of their respective owners.</p>
                </div>

                <ul class="col-md-offset-2 col-md-4 padding-top-20 list-inline">
                    <li id="facebook"></li>
                    <li id="google-plus"></li>
                    <li id="twitter"></li>
                    <li id="instagram"></li>
                    <li id="linkedin"></li>
                    <li id="behance"></li>
                    <li id="share"></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script>
    jQuery(document).on('click', '.mega-dropdown', function (e) {
        e.stopPropagation()
    })
</script>
</body>

</html>
