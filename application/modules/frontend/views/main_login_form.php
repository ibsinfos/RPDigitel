<div class="container-fluid">
    <div class="row loginPageWrap">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <div class="col-sm-6 col-md-7 redBgCol">
            <a href="" class="logoWrap">
                <img src="<?php echo asset_url(); ?>images/logodigitellg.png" class="img-responsive" alt="logodigitellg">
                <span>Its Digital for Real People!</span>
            </a>
        </div>
        <div class="col-sm-6 col-md-5 whiteBGCol">
            <ul class="list-unstyled list-inline socialIconWrap">
                <li>
                    <a href="" class="facebook"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="" class="twitter"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="" class="googlePlus"><i class="fa fa-google-plus"></i></a>
                </li>
                <li>
                    <a href="" class="pinterest"><i class="fa fa-pinterest-p"></i></a>
                </li>
                <li>
                    <a href="" class="instagram"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                    <a href="" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </li>
            </ul>
            <div class="row formWrap">
                <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                    <a href="" class="rpDigitelLogo">
                        <img src="<?php echo asset_url(); ?>images/rpdigital.png" alt="rpdigital">
                    </a>
                    <p>Sign in to Silo Social Commerce</p>
                    <form role="form" action="<?php echo base_url(); ?>login/validate_credentials" method="post" id="signin_form">
                        <div class="form-group">
                            <input type="text" class="signin_input form-control" id="username" name="username" required="required" placeholder="Enter email or username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="signin_input form-control" id="password" name="password" required="required" placeholder="Password">
                        </div>
                        <div class="form-group text-left">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="" name="password">
                                Remember me
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btnRed btn-block" id="signin_button">Sign In</button>
                        </div>
                        <div class="form-group">
                            <a href="" class="forgetPwdLink">Forgot your password?</a>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12">
                    <p>
                        New to Silo Secured Data?<br>
                        <a href="" class="signUpLink">Sign up for a new merchant account</a>
                    </p>
                    <p class="copyRight">&copy; Copyright Silo Secured Data LLC. 2017. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>

