<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>RPDigital | Homepage</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico?crc=4022900773"/>
        <link href="<?php echo base_url(); ?>css/custom-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/fiber-rails.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/class.css" rel="stylesheet">

        <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
        <!-- Inline CSS based on choices in "Settings" tab -->
        <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
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
    <body style="overflow-x: hidden;">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top topnav" role="navigation">
            <div class="container topnav">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img class="block mob-brand" src="<?php echo base_url(); ?>images/frlogo.png?crc=100938625" alt="" height="70" style="padding-top: 5px; padding-bottom: 5px;">

                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>

                            <a href="#" class="top-navlinks">Welcome <?php echo $this->session->userdata('username'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>user/Login/logout" class="top-navlinks" style="background-color: #FF0000; ">Log Out</a>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
            <div>
                <a href="#demo" class="btn btn-danger btn-block" data-toggle="collapse">Learn More about Fiber Rail Services</a>

                <div id="demo" class=" collapse" style="background: #ffffff; ">
                    <ul class="list-inline hidden-xs" style="margin-bottom:0px; padding:20px; padding-left:10%">
                        <li class=" padding-left-30"><a class="black" href="#">RPDigital</a></li>
                        <li class=" padding-left-30"><a class="black" href="#">FiberRails</a></li>
                        <li class=" padding-left-30"><a class="black" href="#">SiloSD</a></li>
                        <li class=" padding-left-30"><a class="black" href="#">SiloWebHosting</a></li>
                        <li class=" padding-left-30"><a class="black"  href="#">SiloBank</a></li>
                        <li class=" padding-left-30"><a class="black"  href="#">ScanDiscs</a></li>
                        <li class=" padding-left-30"><a class="black" href="#">MyScandisc</a></li>
                        <li class=" padding-left-30"><a class="black" href="#">MyScandiscTV</a></li>
                        <li class=" padding-left-30"><a class="black" href="#">NetWork</a></li>
                        <li class=" padding-left-30"><a class="black" href="#">MarketPlace</a></li>
                    </ul>
                    <div class="col-md-6 " style="background: #ffffff;">
                        <div class="col-md-2 hidden-xs hidden-sm"> <img class="block"  src="<?php echo base_url(); ?>images/scandisc%20box82x82.png?crc=4246127547" alt="" width="70" height="70" style="margin-left: 30px; margin-top: 80px;"></div>
                        <div class="col-md-6 hidden-xs hidden-sm"><img class="block"  src="<?php echo base_url(); ?>images/thingorilla_business_135.jpg?crc=290504810" alt="" width="330" height="220" style="margin-top:80px; margin-bottom:106px;"></div>
                    </div>
                    <div class="col-md-6 col-xs-12" style="background: #ffffff">
                        <div class="margin-top-25">
                            <div class="col-md-2 mob-center">
                                <img class="block" src="<?php echo base_url(); ?>images/silo-cloud.png" alt="" style="margin-top: 30px;">
                            </div>
                            <div class="col-md-10">
                                <h3>Flexible hosting startups</h3>
                                <p>Easy to use tools, included business mail accounts, and the best dynamic page builder in the business. All to help you make your mark !</p>
                            </div>
                            <div class="col-md-2 mob-center">
                                <img class="block margin-top-10"  src="<?php echo base_url(); ?>images/websuite.png" alt="">
                            </div>
                            <div class="col-md-10">
                                <h3>All the tools you need to hang the OPEN sign...</h3>
                                <p>E-commerce, ERP and CRM centered around your ideas for growth.</p>
                            </div>
                            <div class="col-md-2 mob-center">
                                <img class="block margin-top-10 margin-left-20 "  src="<?php echo base_url(); ?>images/fiber-rails.png" alt="" data-image-width="638" data-image-height="50">
                            </div>
                            <div class="col-md-10">
                                <h3>Introducing FiberRails...</h3>
                                <p>Many solutions offer platforms, our focus is on the Handrails!</p>
                            </div>
                            <div class="col-md-2 mob-center">
                                <img class="block margin-top-25 margin-left-15"  src="<?php echo base_url(); ?>images/payments.png" alt="" data-image-width="638" data-image-height="50">
                            </div>
                            <div class="col-md-10 padding-bottom-40">
                                <h3>Accept Payments !</h3>
                                <p>Mobile Payments, invoicing, sales and banking services just got easier...</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <!-- slider container-->
        <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators hidden-xs">
                <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#bs-carousel" data-slide-to="1"></li>
                <li data-target="#bs-carousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item slides active">
                    <div class="slide-1"></div>
                </div>
                <div class="item slides">
                    <div class="slide-2"></div>
                </div>
                <div class="item slides">
                    <div class="slide-3"></div>
                </div>
            </div>
        </div>
        <!--slider container end-->
        <!-- /.intro-header -->
        <!--Section 1 Start-->
        <div class="row " style="background: #f5f5f5; padding:30px;">
            <div class="container">
                <div class="col-md-6">
                    <h2>
                        Maximize Your Startup Potential with FIberRails ERP/CRM Tools Tailored for Small but Growing Enterprises.
                    </h2>
                    <p>
                        Efficiently manage your entire business life-cycle from one control panel.  Combining the Silo Secured Data Services and Scandisc Web Optimization platform gives any startup or growing enterprise the tools required to perform real-time analytics, track expenses, monitor web campaign, build projects and track and manage human resources.
                    </p>
                    <p>
                        Its what make you a competitive company and what makes us happy to assist you .. Welcome to FiberRails.
                    </p>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="col-md-offset-2 col-md-8 padding-top-10">
                        <form method="post">
                            <div class="form-group ">
                                <input class="form-control" id="username" name="username" placeholder="Username" type="text"/>
                            </div>
                            <div class="form-group ">
                                <input class="form-control" id="email" name="email" placeholder="Email" type="text"/>
                            </div>
                            <div class="form-group ">
                                <input class="form-control" id="tel" name="tel" placeholder="Enter Phone Number" type="text"/>
                            </div>
                            <div class="form-group ">
                                <input class="form-control" id="company" name="company" placeholder="Enter Company Name" type="text"/>
                            </div>
                            <div><input type="checkbox" > I agree to terms & conditions</div>
                            <div class="form-group">
                                <div>
                                    <button class="btn btn-danger " name="submit" type="submit">
                                        Download FR Report
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Section 1 End-->
        <!--Section 2 Start-->
        <div class="row">
            <div class="container">
                <div>
                    <img src="<?php echo base_url(); ?>images/fiber-rails/section2.jpg"  class="mob-img2">
                </div>
                <div class="section3-btn " style="margin-top: -12%; ">
                    <button type="button" class="btn btn-secondary btn-lg col-lg-6 col-md-6 col-xs-12" style=" box-shadow: 5px 6px 5px #9f9f9f;"> Create Your Free Playlist </button>
                    <button type="button" class="btn btn-danger btn-lg btn-light-red col-lg-6 col-md-6 col-xs-12" style=" box-shadow: 5px 6px 5px #9f9f9f;"> Become A Content Provider </button>
                </div>
            </div>
        </div>
        <!--Section 2 End-->
        <!--Section 3 Start-->
        <div class="row" style="background:#f8f8f8; padding:50px;">
            <div class="container hosting col-lg-offset-1 col-lg-10 col-md-offset-0 col-md-12 col-sm-offset-3 col-sm-6">
                <div class="col-lg-3 col-md-4" >
                    <img src="<?php echo base_url(); ?>images/silorails.png" style="padding: 20px ; background: #ffffff; border:1px transparent; border-radius:7px;" class="silorailsimg">
                </div>
                <div class="col-lg-8 col-md-8">
                    <h4 style="color: #ffffff; font-weight:600;">Host your business on Silowebhosting.com !</h4>
                    <div class="input-group ">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button"> Get Your Domain </button>
                        </span>
                    </div>
                    <h6 style="color: #ffffff;">Fiber Rails is the Platform of Choice for Startups and Small Businesses.</h6>

                </div>
            </div>
        </div>
        <!--Section 3 End-->
        <!--Section 4 services Start-->
        <div class="row ">
            <div class="container margin-top-50">
                <div class="card-deck col-md-offset-2" >
                    <div class="card col-md-3 col-sm-4">
                        <img class="card-img-top service1" src="<?php echo base_url(); ?>images/services/fiberrails%20main96x86.png" alt="Card image cap" style="margin-left:55px;">
                        <div class="card-block">
                            <h4 class="card-title">Fiber Rails Portal</h4>
                            <p class="card-text">Create your company-specific portfolio and catalogs with prices and terms, and enhance tracking, global management and order processing.</p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger btn-block" name="submit" type="submit">
                                View Service
                            </button>
                        </div>
                    </div>
                    <div class="card col-md-3 col-sm-4">
                        <img class="card-img-top service2" src="<?php echo base_url(); ?>images/services/silo%20main%20logo.png" alt="Card image cap" height="66" width="133" style="margin-left: 36px; margin-bottom: 19px;">
                        <div class="card-block">
                            <h4 class="card-title">Silo Cloud Services</h4>
                            <p class="card-text">Simplify networking, domain and webhosting with a single secured solution that caters to Startup and small businesses at every stage of growth.</p>
                        </div>
                        <div class="card-footer">
                             <a href="<?php echo base_url(); ?>user/Silo_sd" class="btn btn-danger btn-block">
                                View Service
                            </a>
                        </div>
                    </div>
                    <div class="card col-md-3 col-sm-4">
                        <img class="card-img-top service3" src="<?php echo base_url(); ?>images/services/scandisc%20main%20logo.png" alt="Card image cap" width="189" height="20" style="margin:25px 0px 40px 7px">
                        <div class="card-block">
                            <h4 class="card-title">Scandisc Registry</h4>
                            <p class="card-text">User Generated Content Distribution Platform developed to protect the right and royalty of independent artisans world wide.
                                <br class="hidden-lg">
                                <br class="hidden-lg">
                            </p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger btn-block" name="submit" type="submit">
                                View Service
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container margin-top-50">
                <div class="card-deck col-md-offset-2" >
                    <div class="card col-md-3 col-sm-4">
                        <img class="card-img-top service4" src="<?php echo base_url(); ?>images/services/wbssuite.png" alt="Card image cap" width="177" height="61" style="margin-left:17px;">
                        <div class="card-block">
                            <h4 class="card-title">Fiber Rails Portal</h4>
                            <p class="card-text">Create your company-specific portfolio and catalogs with prices and terms, and enhance tracking, global management and order processing.</p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger btn-block" name="submit" type="submit">
                                View Service
                            </button>
                        </div>
                    </div>
                    <div class="card col-md-3 col-sm-4">
                        <img class="card-img-top service5" src="<?php echo base_url(); ?>images/services/paasport.png" alt="Card image cap" height="39" width="136" style="margin-left: 36px; margin-bottom: 22px;">
                        <div class="card-block">
                            <h4 class="card-title">Silo Cloud Services</h4>
                            <p class="card-text">Simplify networking, domain and webhosting with a single secured solution that caters to Startup and small businesses at every stage of growth.</p>
                        </div>
                        <div class="card-footer">
                           <a href="<?php echo base_url(); ?>user/Silo_wallet" class="btn btn-danger btn-block">
                                View Service
                          
                            </a>
                        </div>
                    </div>
                    <div class="card col-md-3 col-sm-4">
                        <img class="card-img-top service6" src="<?php echo base_url(); ?>images/services/silobank.png" alt="Card image cap" width="77" height="60" style="margin:0px 0px 1px 60px">
                        <div class="card-block">
                            <h4 class="card-title">Scandisc Registry</h4>
                            <p class="card-text">User Generated Content Distribution Platform developed to protect the right and royalty of independent artisans world wide.
                                <br class="hidden-lg">
                                <br class="hidden-lg"></p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger btn-block" name="submit" type="submit">
                                View Service
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container margin-top-50">
            <h5 style="font-weight:700; color:#8c8c8c; text-align:center;">Still have questions?</h5>
            <h6 style="text-align:center">Create your company-specific portfolio and catalogs with prices and terms, and enhance tracking, global management and order processing.</h6>
            <div class="col-lg-offset-4 col-lg-6 ">
                <img src="<?php echo base_url(); ?>images/icons/windows.png" class="col-lg-2 col-xs-3">
                <img src="<?php echo base_url(); ?>images/icons/apple.png" class="col-lg-2 col-xs-3">
                <img src="<?php echo base_url(); ?>images/icons/linux.png" class="col-lg-2 col-xs-3">
                <img src="<?php echo base_url(); ?>images/icons/android.png" class="col-lg-2 col-xs-3">
            </div>
        </div>
        <div class="col-lg-offset-5 hidden-xs hidden-sm"  style="background: #8e8e8e; border:1px transparent; border-top-left-radius: 15px; border-top-right-radius: 15px; width:15%;">
            <img src="<?php echo base_url(); ?>images/logo_2.png">
        </div>

        <!-- Section 4 services End-->

        <!--Section 5 Start-->
        <div class="row" style="background: #8e8e8e">
            <div class="container col-lg-offset-3 col-lg-6" style="margin-bottom: 50px;">

                <div  style="margin-left:46% ">
                    <img src="<?php echo base_url(); ?>images/icn3.png" class="icn3">
                </div>
                <div>
                    <h1 class="center" style="color: #ffffff">Quick & Easy Integration For Developers</h1>
                    <h4 class="center" style="color: #ffffff"> Comprehensive integration guides and API references for all popular platform to help you at every stage of integration. <small style="color: #ffffff">View Developer Resources</small></h4>
                </div>
            </div>
        </div>
        <!--Section 5 End-->
        <!--Section 6 Start-->
        <div class="row hidden-xs hidden-sm">
            <div class="col-md-5" style="background-color: #515151;">
                <div style="position: absolute" class="hover-img1 col-md-offset-4">
                    <img src="<?php echo base_url(); ?>images/projects.jpg">
                </div>
                <div class="hover-img2" style="position: relative">
                    <img src="<?php echo base_url(); ?>images/signup.jpg">
                </div>
                <div class="hover-img3" style="position: absolute">
                    <img src="<?php echo base_url(); ?>images/member.png">
                </div>
                <div class="hover-img4 col-md-offset-7">
                    <img src="<?php echo base_url(); ?>images/invoice.jpg">
                </div>
            </div>
            <div class="col-md-7" style="padding-left: 0px">
                <img src="<?php echo base_url(); ?>images/mesh.jpg" class="mesh">
                <div class=" col-md-12" style="padding-left:70px; background: #ff0000;">
                    <h2 style="margin-top: 0px; color:#ffffff;">Test Drive Our Suite !<br>
                        <small style="color: white">Sign up for your 10 day Trial and see what you have been missing !</small></h2>
                </div>
            </div>
        </div>
        <!--Section 6 End-->
        <!--Section 7 Start-->
        <div class="row">
            <img src="<?php echo base_url(); ?>images/o-women-business-facebook-crop-u1542.jpg" style="position: absolute" width="100%" height="auto" class="hidden-xs hidden-sm">
            <div style="position: relative">
                <div class="col-lg-offset-8 col-lg-4 col-md-offset-8 col-md-4 col-xs-12" >
                    <div class=" padding-bottom-10">
                        <img src="<?php echo base_url(); ?>images/silocloud.png" width="125" height="76" class="silocloud-img">
                    </div>
                    <div class="padding-bottom-25">
                        <img src="<?php echo base_url(); ?>images/words.png">
                    </div>
                    <div class="fiberrails-logo hidden-md">
                        <img src="<?php echo base_url(); ?>images/fiber-rails.png">
                    </div>
                    <div>
                        <h2>Introducing Fibre Rails</h2>
                        <p>Many solutions offer platforms, our focus is on the Handrails!</p>
                    </div>
                    <button class="btn btn-danger btn-lg try-btn" name="submit" type="submit" >
                        Try For Free !
                    </button>
                </div>
                <!--div class="row col-md-offset-5 col-md-2" style="background: #ff0000; height:90px;
             width:180px;
             border-radius: 90px 90px 0 0;
             ">
                    <h3 class="white">Starting at $25 <small class="white">per month</small></h3>
                </div-->
            </div>

        </div>
        <!--Section 7 End-->
        <!--Section 8 Start-->

        <div class="row" style="background: #ff0000; position: relative">

            <div class="container" style="margin-top: 50px; margin-bottom: 50px;">
                <div class="col-lg-offset-1 col-lg-3 col-md-offset-1 col-md-3 col-sm-4">
                    <h3 class="white">Our Products</h3>
                    <ul>
                        <li>Private Domains</li>
                        <li>Secure Storage</li>
                        <li>Business Email</li>
                        <li>Linux App Development</li>
                        <li>CRM Marketing Tools</li>
                        <li>ERP Management Tools</li>
                    </ul>
                </div>
                <div class=" col-lg-3 col-md-offset-1 col-md-3 col-sm-4 hidden-xs">
                    <img src="<?php echo base_url(); ?>images/secure.png">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <h3 class="white">Hosting Packages</h3>
                    <ul>
                        <li>Windows Hosting</li>
                        <li>Linux Hosting</li>
                        <li>VPS Hosting</li>
                        <li>Linux Reseller</li>
                        <li>JAVA Hosting</li>
                        <li>Dedicated Servers</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="container-fluid">
                    <button type="button" class="btn btn-default btn-block" style="background: #f5f5f5;" data-toggle="collapse" data-target="#demo3">
                        <img src="<?php echo base_url(); ?>images/paasport.png" height="25"></button>
                    <div id="demo3" class="collapse">
                        <div class="collapse-img">
                            <img src="<?php echo base_url(); ?>images/icons/pass-services/1.png">
                            <img src="<?php echo base_url(); ?>images/icons/pass-services/2.png">
                            <img src="<?php echo base_url(); ?>images/icons/pass-services/3.png">
                            <img src="<?php echo base_url(); ?>images/icons/pass-services/4.png">
                            <img src="<?php echo base_url(); ?>images/icons/pass-services/5.png">
                            <img src="<?php echo base_url(); ?>images/icons/pass-services/6.png">
                            <img src="<?php echo base_url(); ?>images/icons/pass-services/7.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Section 8 End-->
        <!--Section 9 Start-->
        <div class="row">
            <div class="container" style="margin-bottom: 50px; margin-top:50px;">
                <div class="col-lg-4 col-sm-5">
                    <img src="<?php echo base_url(); ?>images/gi_128600_internetretailergrphccs2.jpg" class="retailer">
                </div>
                <div class="col-lg-6">
                    <p><strong>Do you have a demo or free trial?</strong><br>
                        The best way to find out whether FiberRails is right for you is to try it!</p>

                    <p>Our starter plan has all of the basic features needed to get started, and
                        never expires. We also offer a 30 day money back guarantee on all paid
                        plans. Go PRO risk free today.
                    </p>
                    <p> <strong>Questions?</strong><br>
                        Feel free to contact us at any time. We're real people ready to help you
                        with any sales or technical support related questions you may have. And
                        we love talking about security, privacy, and encryption too.
                    </p>
                    <img src="<?php echo base_url(); ?>images/icons/social/1.png">
                    <img src="<?php echo base_url(); ?>images/icons/social/2.png">
                    <img src="<?php echo base_url(); ?>images/icons/social/3.png">
                    <img src="<?php echo base_url(); ?>images/icons/social/4.png">
                    <img src="<?php echo base_url(); ?>images/icons/social/5.png">
                    <img src="<?php echo base_url(); ?>images/icons/social/6.png">
                </div>
            </div>
        </div>
        <!--Section 9 End-->
        <!--Section 10 Start-->
        <div class="row" style="background: #7a7a7a">
            <div class="container" style="margin-top:50px; margin-bottom:50px;">
                <div class="col-lg-2 col-md-3" style="margin-top: 20px; padding-left:0px;">
                    <img src="<?php echo base_url(); ?>images/white%20rated%20rpdigital.png">
                    <img src="<?php echo base_url(); ?>images/white%20m%20start.png">
                </div>

                <div class="col-lg-5 white">
                    <h4><strong>Learn more about Silo Website Solutions features</strong></h4>
                    <p>
                        We offer two different ways to create and manage a professional-looking business website: Website Plans (build it myself) and Build It For Me plans.
                    </p>
                    <p>
                        All of our Website Plans include powerful website design tools to help you build your own professional-looking website. These plans are perfect for businesses with some experience of website design and development.
                    </p>
                    <p>
                        With Build It For Me plans, your website is built by one of our website design professionals. Build It For Me plans are a great choice if you are busy or not very experienced with website design.
                    </p>
                    <p>
                        For each approach, you can choose one of three different plans tailored to the needs of your business. This helps you manage website costs by only paying for the services and features you need.
                    </p>
                    <div class="col-lg-4 col-md-3 white padding-left-0">
                        <h5><strong>Overview</strong> </h5>
                        <ul style="list-style: none; padding-left:0px;">
                            <li><a href="#">Website Builder</a></li>
                            <li><a href="#">Plans & Pricing</a></li>
                            <li><a href="#">Business Tools</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-3 white padding-left-0">
                        <h5> <strong>Additional Services</strong> </h5>
                        <ul style="list-style: none; padding-left:0px;">
                            <li><a href="#">Private Domains</a></li>
                            <li><a href="#">Business Email</a></li>
                            <li><a href="#">Web Marketing</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-3 white padding-left-0">
                        <h5><strong>Support</strong></h5>
                        <ul style="list-style: none; padding-left:0px;">
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Login</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 footer-server">
                    <img src="<?php echo base_url(); ?>images/02.png">
                </div>
            </div>
        </div>
        <!--Section 10 End-->
        <!-- Footer -->
        <footer >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="col-md-6">

                            <p class="copyright text-muted small">© 2017 RPDigital Intellectual Property. All rights reserved. RPDigital, FiberRails logo, and Scandisc are registered trademarks and Platforms&nbsp; with handrails is a service mark of RP Digital Intellectual Property and/or RP Digital affiliated companies. All other marks are the property of their respective owners.</p>
                        </div>

                        <ul class="col-md-offset-2 col-md-4 padding-top-10 list-inline">
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

    </body>

</html>


<script>
</script>