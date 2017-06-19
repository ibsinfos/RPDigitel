

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
       
									