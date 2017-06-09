<!Doctype html>
<html>
    <head>
        <title>FiberRails | Sign In</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo main_asset_url(); ?>css/bootstrap.min.css">
        <!-- Fontawesome Core CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo main_asset_url(); ?>font-awesome/css/font-awesome.min.css">
        <!-- Custom CSS -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico?crc=4022900773"/>
        <link rel="stylesheet" type="text/css" href="<?php echo main_asset_url(); ?>css/style.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php $this->load->view('includes/main_header_home'); ?>

        <div id="carousel" class="carousel slide carousel-fade loginCarousel" data-ride="carousel">
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item"></div>
                <div class="item"></div>
                <div class="item"></div>
			</div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#carousel" data-slide="prev"></a>
            <a class="carousel-control right" href="#carousel" data-slide="next"></a>
		</div>
		
        <div class="container loginFormWrap">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="well text-center">
                        <div class="row">
                            <div class="col-sm-12 logo">
                                <img class="" id="u45288_img" src="<?php echo main_asset_url(); ?>images/rpdigitel-white.png?crc=4229791891" >
                            </div>
                            <div class="col-sm-12">
                                <span id="errors" class="redText"></span>
                            </div>
                        </div>
                        <!-- Sign In Form start -->
                        <form role="form" action="<?php echo base_url(); ?>login/validate_credentials" method="post" id="signin_form">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                <?php
                                    //  echo validation_errors('<p class="error">');
                                    if ($this->session->flashdata('verification_message')) {
                                        echo $this->session->flashdata('verification_message');
                                    } 
                                ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-offset-1 col-sm-10">
                                    <input type="text" class="signin_input form-control" id="username" name="username" required="required" placeholder="Enter email or username">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-offset-1 col-sm-10">
                                    <input type="password" class="signin_input form-control" id="password"  name="password" required="required" placeholder="Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-offset-3 col-sm-6">
                                    <button type="button" class="btn btnRed btn-block" id="signin_button">Sign In</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="<?php echo base_url(); ?>login/signup" class="signUpLink">Sign Up For Fibre Rails</a>
                                </div>
                            </div>
                        </form>
                        <!-- Sign In Form end -->

                        <!-- OTP Form Start -->
                        <form role="form" method="post" id="otp_form">
                            <div class="row">
                                <div class="form-group col-sm-offset-1 col-sm-10">
                                    <input type="text" class="otp_input form-control" id="input_otp" name="input_otp" required="required" placeholder="Enter OTP here">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-offset-3 col-sm-6">
                                    <button type="button" class="btn btnRed btn-block" id="verify_otp_button">Verify</button>
                                    <button type="button" class="btn btnRed btn-block" id="resend_otp_button">Resend OTP</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="<?php echo base_url(); ?>login" class="signUpLink">Sign in with another account</a>
                                </div>
                            </div>
                        </form>
                        <!-- OTP Form end -->
                    </div>
                </div>
            </div>
        </div>
       

        <?php $this->load->view('includes/main_footer_home'); ?>  
        <!-- jQuery Core library -->
        <script type="text/javascript" src="<?php echo main_asset_url(); ?>js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script type="text/javascript" src="<?php echo main_asset_url(); ?>js/bootstrap.min.js"></script>
        <!-- jQuery Validation Core JavaScript -->
        <script type="text/javascript" src="<?php echo main_asset_url(); ?>js/jquery.validate.min.js"></script>
        <!-- Custom JavaScript -->
        <script type="text/javascript" src="<?php echo main_asset_url(); ?>js/custom.js"></script>
        <script>
            var checkLoginURL = '<?php echo base_url(); ?>user/login/validate_credentials';
            var createPaasportURL = "<?php echo backend_passport_url(); ?>create-paasport";
            var mainDashboardURL = "<?php echo base_url(); ?>main_dashboard";
            var loginOtpURL = "<?php echo base_url(); ?>otp";
            var otpRedirectDashboard ="<?php echo base_url(); ?>fiberrails";
            var resendOtp = '<?php echo base_url(); ?>user/login/send_otp';
            var verifyOtp = '<?php echo base_url(); ?>user/otp/verify_otp';
        </script>
	</body>
</html>


													