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
                        <div id="success" style="color:green;">
                        </div>
                    </div>
                </div>

                <form role="form" action="<?php echo base_url(); ?>login/create_member" method="post" id="signup_form">
                    <div class="row">
                        <div class="form-group col-sm-offset-1 col-sm-10">
                            <input type="text" class="signup_input form-control input-lg" id="username" name="username" required="required" placeholder="Enter Username" >
                        </div>
                        <div class="form-group col-sm-offset-1 col-sm-10">
                            <input type="email" class="signup_input form-control input-lg" id="email_address" name="email_address" required="required" placeholder="Enter email address">
                        </div>
                        <div class="form-group col-sm-offset-1 col-sm-5">
                            <select name="country" id="country" class="signin_input form-control input-lg">
                                <option value="0" label="Select a country" selected="selected">Country</option>
                                <?php foreach ($country_list as $country) { ?>

                                    <option value="<?= $country->phonecode; ?>" label="<?= $country->nicename; ?>"><?php echo $country->iso . "  +" . $country->phonecode . ""; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5 phone-no">
                            <input type="text" class="signin_input form-control input-lg" id="phone_number" name="phone_number" placeholder="Phone">
                        </div>
                        <div class="form-group col-md-offset-1 col-md-10">
                            <input type="password" class="signup_input form-control input-lg" id="password" name="password" required="required" placeholder="Password">
                        </div>
                        <div class="form-group col-md-offset-1 col-md-10">
                            <input type="password" class="signup_input form-control input-lg" id="confirmpassword" name="confirmpassword" required="required" placeholder="Confirm Password">
                        </div>
                        <div class="form-group col-md-offset-3 col-md-6">
                            <button type="button" class="btn btnRed btn-block" id="signup_button">Sign Up</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="<?php echo base_url(); ?>login" class="signUpLink">Sign In For Fibre Rails</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

