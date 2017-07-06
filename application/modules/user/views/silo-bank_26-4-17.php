<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Silo Bank</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico?crc=4022900773"/>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/silo-bank.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/class.css" rel="stylesheet">

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
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="<?php echo base_url(); ?>images/silo-bank/silobank-u3927-fr.png" class=" logo">
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="form-group col-lg-offset-1 col-xs-offset-0 col-lg-4 col-sm-8 col-xs-12 margin-top-25">
                <input type="text" class="form-control" id="usr" placeholder="Enter Amount to be added in wallet">
            </div>
            <div class="margin-top-25 col-lg-4">
                <div class="col-lg-6 col-sm-3 col-xs-6 promo">
            <button type="button" class="btn btn-default">Have a Promo Code</button>
                </div>
                <div class="col-sm-3 col-xs-5 wallet">
            <button type="button" class="btn btn-danger">Add Money to Wallet</button>
                </div>
            </div>
        <div class=" col-xs-12 collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li>
                    <a href="#">About Us</a>
                </li>
                <li>
                    <a href="#">Products</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact Us</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
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

<!-- Page Content -->

<div class="content-section-a">

    <div class="container">
        <div class="row">
            <div class="col-lg-offset-1 col-lg-5 col-sm-6">
                <h2 class="section-heading">Simplifying Mobile Banking!</h2>
                <p class="lead">More than 250 core Startups use SiloBank to pay for their online and retail purchases and subscriptions.  Learn how you can add the Power of SiloBank to your business.</p>
                <form class="col-lg-offset-1 col-lg-8" method="post">
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
                    <div><input type="checkbox"> I agree to terms & conditions</div>
                    <div class="form-group">
                        <div>
                            <button class="btn btn-danger " name="submit" type="submit">
                                Download SiloBank APK
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <img src="<?php echo base_url(); ?>images/silo-bank/phone.png" class="phone-img">
                <div class="phone-btn">
                    <div class="col-lg-4 col-xs-4 padding-right-0 explore" >
                        <button class="btn btn-danger btn-lg " style="box-shadow: 5px 5px 5px #6e6e6e"> Explore </button>
                    </div>
                    <div class="col-lg-5 col-xs-6 sign-up">
                        <button class="btn btn-default btn-lg" style="box-shadow: 5px 5px 5px #6e6e6e"> Sign Up  </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
</div>
<!-- /.content-section-a -->

<div class="row padding-top-20 padding-bottom-20 relative" style="background: #ff0000">
    <div class="container">
        <div class="col-lg-offset-3 col-lg-5">
        <h5 class="white" >Finally, a program that understands how to handle your privacy and protect your pockets.</h5>
        </div>
        <div class="col-xs-1">
        <button type="button" class="btn btn-danger" style="border:1px solid #ffffff">Register Now</button>
        </div>
    </div>
</div>

<div class="row relative" style="background: #f5f5f5">
    <hr class="red-thick-line margin-top-50">
    <!--hr class="red-block col-lg-offset-1 col-lg-1"-->
    <div class="container beyond">
        <img src="<?php echo base_url(); ?>images/silo-bank/beyond.jpg">

    </div>
    <div class="container beyond-services">
        <hr>

        <div class="col-lg-offset-1 col-lg-10">
        <div class="col-lg-6 col-sm-6">
            <div>
                <h4><img src="<?php echo base_url(); ?>images/icons/1.png" height="32"> Point-of-Sale Software</h4>

                <p>The power of virtual terminal, cash register,recurring billing solution
                and invoicing software in the simplicity of a Point-of-Sale interface.</p>
                <br>

                <a href="">Learn More >></a>
            </div>
            <div class=" margin-top-25">
                <h4><img src="<?php echo base_url(); ?>images/icons/3.png" height="40">
                Sales & Order Reporting</h4>
                <p>Seeing business performance has never been easier, payment customer, and even custom field data
                is at your fingertips in our intuitive report builder.</p>
                <a href="">Learn More >></a>
            </div>
        </div>
            <div class="col-lg-6">
                <div>
                    <h4><img src="<?php echo base_url(); ?>images/icons/2.png" height="40">
                   Recurring Billing</h4>
                    <p>Setup Recurring Billing schedules for any product or service. Customers can even purchase
                        a recurring product or service package from your website.</p>
                    <a href="">Learn More >></a>
                </div>
                <div class="margin-top-25">
                    <h4><img src="<?php echo base_url(); ?>images/icons/4.png" height="40">
                    Electronic Invoicing</h4>
                    <p>Send email invoice instantly, get paid online. Customers can log-in to their secure accounts,
                        with saved payment information, or pay as guests.
                       </p>
                    <a href="">Learn More >></a>
                </div>
            </div>

            <div class="container hidden-xs hidden-sm">
                <div class="row ">
                    <div class="col-md-10 margin-top-25" >
                        <div id="Carousel4" class=" carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#Carousel4" data-slide-to="0" class="active"></li>
                                <li data-target="#Carousel4" data-slide-to="1"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                    </div><!--.row-->
                                </div><!--.item-->

                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                    </div><!--.row-->
                                </div><!--.item-->

                            </div><!--.carousel-inner-->
                            <a data-slide="prev" href="#Carousel4" class="left carousel-control"></a>
                            <a data-slide="next" href="#Carousel4" class="right carousel-control"></a>
                        </div><!--.Carousel-->

                    </div>
                </div>
            </div>
            <!--.container-->
            <div class="container hidden-lg hidden-md hidden-sm">
                <div class="row ">
                    <div class="col-md-10 margin-top-25" >
                        <div id="Carousel5" class=" carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#Carousel5" data-slide-to="0" class="active"></li>
                                <li data-target="#Carousel5" data-slide-to="1"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-xs-12"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                    </div><!--.row-->
                                </div><!--.item-->

                                <div class="item">
                                    <div class="row">
                                        <div class="col-xs-12"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                    </div><!--.row-->
                                </div><!--.item-->

                            </div><!--.carousel-inner-->
                            <a data-slide="prev" href="#Carousel5" class="left carousel-control"></a>
                            <a data-slide="next" href="#Carousel5" class="right carousel-control"></a>
                        </div><!--.Carousel-->

                    </div>
                </div>
            </div><!--.container-->
            <!--.container-->
            <div class="container hidden-lg hidden-md hidden-xs">
                <div class="row ">
                    <div class="col-md-10 margin-top-25" >
                        <div id="Carousel6" class=" carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#Carousel6" data-slide-to="0" class="active"></li>
                                <li data-target="#Carousel6" data-slide-to="1"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-sm-6"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                        <div class="col-sm-6"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                    </div><!--.row-->
                                </div><!--.item-->

                                <div class="item">
                                    <div class="row">
                                        <div class="col-sm-6"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                        <div class="col-sm-6"><a href="#" class="thumbnail"><img src="http://placehold.it/200x150" alt="Image" style="max-width:100%;"></a></div>
                                    </div><!--.row-->
                                </div><!--.item-->

                            </div><!--.carousel-inner-->
                            <a data-slide="prev" href="#Carousel6" class="left carousel-control" style="top:37px;"></a>
                            <a data-slide="next" href="#Carousel6" class="right carousel-control" style="top:37px;"></a>
                        </div><!--.Carousel-->

                    </div>
                </div>
            </div><!--.container-->




        </div>
    </div>
</div>

<!--Section 3 Start-->
<div class="row section3-bg relative">
    <div class="container-fluid ">
        <div class="col-lg-offset-7 col-lg-4">
            <img src="<?php echo base_url(); ?>images/silo-bank/usp_ses_authentication_single_sign_on.jpg">
        <h2>Customers Are the Heart of Service Businesses</h2>
        <p>Forget retail systems built for faceless transactions — Silo Bank provides something better.</p>

        <p>Our Service Commerce platform is designed to function the way you think about your business — starting with the customer. It's a smart, professional experience for your customers, with rich customer profiles (linked to revenue) for you.</p>
        </div>
    </div>
</div>
<!--Section 3 ENd-->

<!--Section 4 Start-->
<div class="row relative" style="background:#e3e3e3">
    <div class="container padding-top-20 padding-bottom-25 margin-bottom-50 margin-top-50" style="background: #333">
        <div class="col-lg-6">
            <h1 class="white margin-top-50" style="font-weight: 400">Why More Than
               <strong style="color: #FF4F4F"> 21,00,000 </strong>  Merchants Trust Us?</h1>
        </div>
        <div class="col-lg-6">
            <p class="white">Variety of Payment Choices <br>
            Accept money using Credit Card, Debit Card, Net Banking and Silo Wallet.</p>

            <p class="white">Saved Cards<br>
            50 Mn+ Wallets with Saved Cards for easier checkout experience.</p>

            <p class="white">Widest Reach<br>
            Access customers you wouldn’t reach otherwise Silo Wallets is the mobile payment choice of startups</p>

            <p class="white">Highest Success Rate<br>
            Our focus on frictionless user experience ensures lower user drop, reduction in unnecessary re-directions and resulting in the highest transaction success rate in industry.</p>
        </div>
    </div>
</div>
<!--Section 4 End-->
<!--Section 5 Start-->
<div class="row relative" style="background: #a62b31">
    <div class="container">
        <h2 class="white center">Quick & Easy Integration For Developers</h2>
        <h5 class="center white">Comprehensive integration guides and API references for all popular platform to help you at every stage of integration. <small class="white">View Developer Resources</small></h5>
       <div class="col-lg-12">
        <div class="col-lg-offset-5 col-sm-offset-4 col-xs-offset-1 padding-top-10 padding-bottom-25 "><img src="<?php echo base_url(); ?>images/silo-bank/white%20m%20start.png" alt=""></div>
       </div>
        <h3 class="center white padding-top-30">Social Commerce Platforms</h3>
        <hr width="40%">
       <div class="col-lg-offset-2 col-lg-8 padding-bottom-25">
        <div class="col-lg-6 col-sm-6 white">
            <h3><strong >Entertainment & Media</strong></h3>
               <p> Scandisc Marketplace</p>
               <p> Scandiscs IPTV</p>
        </div>
        <div class="col-lg-6 col-sm-6 white">
            <h3><strong>  Social Commerce Platforms</strong></h3>
            <p> Scandiscs Content Registry</p>
            <p> Fiber Rails Enterprise Tools</p>
        </div>
       </div>
    </div>
</div>
<!-- Section 5 End-->
<!--footer-section-->
<div class="row padding-top-20 relative" style="background: #931d22">
    <div class="container">
<p class="small white center margin-10">| My Account | Track Your Order |&nbsp; Return Your Order | Cancel Your Order | Product Support&nbsp; | Product Registration | My Wishlist | Shopping Cart | Checkout | Phones | Accessories | Prepaid /NO Contract | Trade In | Upgrade | Accidental Coverage | About Geaux Public | FAQ | Get Support | Manuals and Downloads | Help with Order | Authorized Retailers | Careers</p>
<h6 class="center white small">Registered Agent: 15015 West Airport Blvd, Sugar Land Texas 832.886.7422
</h6>
    </div>
</div>
<script>
$(document).ready(function() {
$('#carousel4').carousel({
interval: 5000
})
});
</script>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

</body>

</html>
