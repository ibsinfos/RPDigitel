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
                    <div class="card-deck container col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img class="card-img-top img-responsive center-block card-img"
                                 src="<?php echo base_url(); ?>images/services/fiberrails%20main96x86.png" alt="Card image cap"
                                 style="height: 77px;">
                            <div class="card-block">
                                <h4 class="card-title center">Fiber Rails Portal</h4>
                            </div>
                        </div>
                        <div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img class="card-img-top img-responsive center-block card-img"
                                 src="<?php echo base_url(); ?>images/services/silo%20main%20logo.png" alt="Card image cap" height="66"
                                 width="133" style="margin-top:10px; margin-bottom: 9px;">
                            <div class="card-block">
                                <h4 class="card-title center">Silo Cloud Services</h4>
                            </div>
                        </div>
                        <div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img class="card-img-top img-responsive center-block card-img"
                                 src="<?php echo base_url(); ?>images/services/scandisc%20main%20logo.png" alt="Card image cap" width="189"
                                 height="20" style="margin-top:25px; margin-bottom:40px;">
                            <div class="card-block">
                                <h4 class="card-title center">Scandisc Registry</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck container col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-25">
                        <div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img class="card-img-top img-responsive center-block card-img"
                                 src="<?php echo base_url(); ?>images/services/wbssuite.png" alt="Card image cap" width="177" height="61"
                                 style="margin-bottom: 10px;">
                            <div class="card-block">
                                <h4 class="card-title center">WBS Business Suite</h4>
                            </div>
                        </div>
                        <div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img class="card-img-top img-responsive center-block card-img"
                                 src="<?php echo base_url(); ?>images/services/paasport.png" alt="Card image cap" height="39" width="136"
                                 style="margin-top:10px; margin-bottom: 22px;">
                            <div class="card-block">
                                <h4 class="card-title center">PaaSPort</h4>
                            </div>
                        </div>
                        <div class="card col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img class="card-img-top img-responsive center-block card-img"
                                 src="<?php echo base_url(); ?>images/services/silobank.png" alt="Card image cap" width="77" height="60">
                            <div class="card-block">
                                <h4 class="card-title center">Silo Bank</h4><br>
                            </div>

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
                <li class=" padding-left-30"><a  href="#">RPDigital</a></li>
                <li class=" padding-left-30"><a  href="#">FiberRails</a></li>
                <li class=" padding-left-30"><a  href="#">SiloSD</a></li>
                <li class=" padding-left-30"><a  href="#">SiloWebHosting</a></li>
                <li class=" padding-left-30"><a  href="#">SiloBank</a></li>
                <li class=" padding-left-30"><a  href="#">ScanDiscs</a></li>
                <li class=" padding-left-30"><a  href="#">MyScandisc</a></li>
                <li class=" padding-left-30"><a  href="#">MyScandiscTV</a></li>
                <li class=" padding-left-30"><a  href="#">NetWork</a></li>
                <li class=" padding-left-30"><a  href="#">MarketPlace</a></li>
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
                  <h3 class="center white">Sign In</h3>
                <form role="form">
                    <div class="form-group col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10">
                        <input type="text" class="form-control " id="userId" placeholder="Enter Username">
                    </div>
                    <div class="form-group col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10">
                        <input type="password" class="form-control  " id="password" placeholder="Password">
                    </div>
                    <div class="form-group col-md-offset-3 col-md-6 text-center">
                        <button type="submit" class="btn btn-danger">Sign In</button>
                    </div>
                </form>
                <p class="center white" ><a href="#" style="color:#f5f5f5">Forgot Your Password?</a></p>
                <p class="center white">New to Silo Secured Data? <br>
               <a href="#" style="color:#ff4747">Sign up for a new merchant account</a></p>
            </div>
            
            
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding:30px 0 0 0;">
                <div>
                    <img src="<?php echo base_url(); ?>images/paasport-login/sded199x199.jpg" alt="" class="center-block img-responsive" style="height: 160px; margin-top:30px;">
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

<!-- Modal -->
<div class="modal fade" id="memberLogin" role="dialog">
    <div class="modal-dialog">
        <form action="#" method="post" name="member_login" id="member_login">
            <header class="member_login">WbsSuite Login
			<span class="close-custom-btn" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></span>
			</header>
            <!-- Modal content-->
            <div id="login_errors" style="color:red;">
            </div>
            <label class="form-login"><h4 style="margin-top:0px; margin-bottom:0px;">Username<span>*</span></h4></label>
            <input type="text" id="username" name="username" class="input-lg input-login" placeholder="Enter Username" style="height: 40px;">
            <label class="form-login"><h4 style="margin-top:0px; margin-bottom:0px;">Password <span>*</span></h4></label>
            <input type="password" class="input-lg input-login" name="password" id="password" placeholder="Password" style="height: 40px;">
            <input type="button" name="member_login_button" id="member_login_button" class="form-login1" value="Login">
            <!--div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div-->
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
