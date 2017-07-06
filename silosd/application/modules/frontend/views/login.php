<div class="slider">
    <div class="titlebar">
        <div class="container">
            <div class="breadcrumb">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6"><h1>Member Login</h1></div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="pagenation">
                            <a href="index.html">Home</a> 

                            <i class="fa fa-angle-double-right"></i> Member Login</div></div>
                </div></div></div>

        <img src="<?php echo frontend_asset_url() ?>/images/register-bg.jpg" class="img-responsive"> 

    </div>
</div>

<div class="margin-top2"></div> 
<div class="clearfix"></div>

<section class="sec-padding mb-35">
    <div class="container">
        <div class="row">
            <form method="post" action="<?php echo base_url() ?>submitlogin" id="contact">
                <div class="col-md-7 col-centered">
                    <div class="text-box padding-4 border" style="    border: 7px double #d2d1d1;    border-radius: 4px;">
                        <div class="smart-forms smart-container wrap-3">
                            <h4 class="uppercase">Login Form</h4>

                            <div>

                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input name="user_name" id="user_name" class="gui-input" placeholder="Enter username" type="text">
                                        <span class="field-icon"><i class="fa fa-user"></i></span>  
                                    </label>
                                </div><!-- end section -->                    

                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input name="user_password" id="user_password" class="gui-input" placeholder="Enter password" type="password">
                                        <span class="field-icon"><i class="fa fa-lock"></i></span>  
                                    </label>
                                </div><!-- end section -->  

                                <div class="section">
                                    <label class="switch block">
                                        <input name="remember" id="remember" checked="" type="checkbox">
                                        <span class="switch-label" for="remember" data-on="YES" data-off="NO"></span> 
                                        <span> Keep me logged in ?</span>
                                    </label>
                                </div><!-- end section -->                                                           

                            </div><!-- end .form-body section -->
                            <div class="form-footer">
                                <button type="submit" class="button btn-primary">Sign in</button>
                            </div><!-- end .form-footer section -->

                            <div class="spacer-t30 spacer-b30">
                                <div class="tagline"><span> OR  Sign in  With </span></div><!-- .tagline -->
                            </div>

                            <div class="section">
                                <a href="#" class="button btn-social facebook span-left"> <span><i class="fa fa-facebook"></i></span> Facebook </a>
                                <a href="#" class="button btn-social twitter span-left">  <span><i class="fa fa-twitter"></i></span> Twitter </a>
                                <a href="#" class="button btn-social googleplus span-left"> <span><i class="fa fa-google-plus"></i></span> Google+ </a>
                            </div><!-- end section -->





                        </div></div></div>
            </form>

        </div>
        <!--end item-->

    </div>
</section>