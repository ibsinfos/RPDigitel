<div class="slider">
    <div class="titlebar">
        <div class="container">
            <div class="breadcrumb">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6"><h1>Contact Us</h1></div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="pagenation">
                            <a href="index.html">Home</a> 

                            <i class="fa fa-angle-double-right"></i> Contact Us</div></div>
                </div></div></div>

        <img src="<?php echo frontend_asset_url()?>/images/contact-us-banner.png" class="img-responsive"> 

    </div>
</div>

<div class="margin-top2"></div> 

<div class="clearfix"></div>

<section class="sec-padding">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="smart-forms bmargin">

                    <h3>Get in Touch</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent mattis commodo augue. Aliquam ornare hendrerit consectetuer adipiscing elit. Suspendisse et justo. augue.</p>
                    <br/>
                    <br/>

                    <form method="post" action="php/smartprocess.php" id="smart-form">

                        <div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section">
                                        <label class="field prepend-icon">
                                            <input type="text" name="sendername" id="sendername" class="gui-input" placeholder="Enter name">
                                            <span class="field-icon"><i class="fa fa-user"></i></span> </label>
                                    </div></div>
                                <!-- end section -->


                                <div class="col-md-6">
                                    <div class="section">
                                        <label class="field prepend-icon">
                                            <input type="email" name="emailaddress" id="emailaddress" class="gui-input" placeholder="Email address">
                                            <span class="field-icon"><i class="fa fa-envelope"></i></span> </label>
                                    </div></div>
                                <!-- end section -->

                                <div class="col-md-6">
                                    <div class="section colm colm6">
                                        <label class="field prepend-icon">
                                            <input type="tel" name="telephone" id="telephone" class="gui-input" placeholder="Telephone">
                                            <span class="field-icon"><i class="fa fa-phone-square"></i></span> </label>
                                    </div></div>
                                <!-- end section -->

                                <div class="col-md-6">
                                    <div class="section">
                                        <label class="field prepend-icon">
                                            <input type="text" name="sendersubject" id="sendersubject" class="gui-input" placeholder="Enter subject">
                                            <span class="field-icon"><i class="fa fa-lightbulb-o"></i></span> </label>
                                    </div></div>
                                <!-- end section -->
                                <div class="col-md-12">
                                    <div class="section">
                                        <label class="field prepend-icon">
                                            <textarea class="gui-textarea" id="sendermessage" name="sendermessage" placeholder="Enter message"></textarea>
                                            <span class="field-icon"><i class="fa fa-comments"></i></span> <span class="input-hint"> <strong>Hint:</strong> Please enter between 80 - 300 characters.</span> </label>
                                    </div></div>
                                <!-- end section --> 



                                <div class="result"></div>
                                <!-- end .result  section --> 

                            </div></div>
                        <!-- end .form-body section -->
                        <div class="form-footer">
                            <button type="submit" data-btntext-sending="Sending..." class="button btn-primary">Submit</button>
                            <button type="reset" class="button"> Cancel </button>
                        </div>
                        <!-- end .form-footer section -->
                    </form>
                </div>
                <!-- end .smart-forms section --> 
            </div>


            <div class="col-md-4">
                <div class="address_1">
                    <h4>Address Info</h4>

                    <div id="map" class="map">
                        <img src="<?php echo frontend_asset_url()?>/images/map_1.png" class="img-responsive"/>
                    </div>
                    <div class="clearfix"></div>

                    <div class="contact-address">
                        Lorem ipsum dolor sit amet.<br /><br />
                        <p><i class="fa fa-phone"></i> +1 1234-567-89000<br />
                            <i class="fa fa-print"></i> +1 0123-4567-8900<br />
                            <i class="fa fa-envelope"></i> <a href="mailto:mail@companyname.com">mail@companyname.com</a><br />
                            <i class="fa fa-globe"></i> <a href="index.html">www.yoursitename.com</a></p>



                    </div>
                </div>

            </div>  
        </div>
    </div>
</section>