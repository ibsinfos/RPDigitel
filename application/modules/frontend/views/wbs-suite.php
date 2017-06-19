

<style>
    #loader_image_div {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url("<?php echo base_url(); ?>images/loader.gif") center no-repeat #fff;
    }

</style>

<div id="loader_image_div" style="display:none">
</div>


<!-- Header -->
<div class="intro-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                <div class="intro-message">
                    <img src="<?php echo base_url(); ?>images/wbs-suite/crmt.png" alt="">
                    <h2>Our CRM tool helps you take charge of your business and close more clients in less time.</h2>
                    <p>There are a lot of different approaches to delivering services on top of software defined
                        infrastructure. They range from simple templated app deployments to complex ecosystems to manage
                        your entire application lifecycle. In the same way you don’t really want to be wrangling
                        hardware, you don’t want to get bogged down with the same operational lifecycle overheads as
                        your competitors.</p>

                    <p>Enlist FiberRails and your platform of empowerment... Using Silo, Paasport and Scandisc allows
                        you to deploy enterprise tools that automate your business and lets you focus on the things that
                        matter to you!</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 banner-bg-color">

                <div class="intro-message" id="register_with_free_trial">
                    <img src="<?php echo base_url(); ?>images/wbs-suite/sded199x199.jpg" class="center-block" alt="">
                    <div class="text-center">
                        <button class="btn btn-danger margin-10">Scan to Login</button>
                    </div>
                    <form action="#" method="post" name="signup_with_free_trial" id="signup_with_free_trial">
                        <div id="signup_errors" class="form-group col-md-offset-1 col-md-10" style="color:red;">
                        </div>

                        <div class="form-group col-md-offset-1 col-md-10">
                            <input type="text" class="signup_input form-control input-lg" id="username" name="username" required="required" placeholder="Enter Username" >
                        </div>
                        <div class="form-group col-md-offset-1 col-md-10">
                            <input type="email" class="signup_input form-control input-lg" id="email_address" name="email_address" required="required" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group col-md-offset-1 col-md-5">
                            <select name="country" id="country" class="signin_input form-control input-lg">
                                <option value="0" label="Select a country" selected="selected">Select a country</option>
                                <?php foreach ($country_list as $country) { ?>

                                    <option value="<?= $country->phonecode; ?>" label="<?= $country->nicename; ?>"><?php echo $country->iso . "  +" . $country->phonecode . ""; ?></option>

                                <?php } ?>
                            </select>							
                        </div>
                        <div class="form-group col-md-5 phone-no">
                            <input type="text" class="form-control input-lg" id="phone_number" name="phone_number" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group col-md-offset-1 col-md-10">
                            <input type="text" class="form-control input-lg" id="organization_name" name="organization_name" placeholder="Enter Organization Name">
                        </div>

                        <div class="form-group col-md-offset-1 col-md-10">
                            <input type="password" class="signup_input form-control input-lg" id="password" name="password" required="required" placeholder="Password">
                        </div>
                        <div class="form-group col-md-offset-1 col-md-10">
                            <input type="password" class="signup_input form-control input-lg" id="confirmpassword" name="confirmpassword" required="required" placeholder="Confirm Password">
                        </div>

                        <div class="form-group col-md-offset-3 col-md-6 text-center">
                            <?php if ($this->session->userdata('is_logged_in')) { ?>
                                <button type="button" class="btn btn-danger" id="crm_signup_dummy">Create Your Account</button>
                            <?php } else { ?>
                                <button type="button" class="btn btn-danger" id="crm_signup">Create Your Account</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>
<!-- /.intro-header -->
<div class="row ">
    <img class="img-responsive center-block" src="<?php echo base_url(); ?>images/wbs-suite/Bg_Screens.png" alt=""  >
</div>
<div class="content-section-b">

    <div class="container">
        <div class="row">
            <div class="padding-bottom-25">
                <h1 class="center">(CRM) Software For Startups</h1>
                <p class="center">Features that ignite your mobility!</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <img src="<?php echo base_url(); ?>images/wbs-suite/13.png" class="center-block" alt="">
                <h4 class="center"><strong>Simple On-boarding Process</strong></h4>
                <p class="center red">Train your team in minutes!<br></p>
                <p class="center">Adaptable to every workplace, FiberRails CRM is secure, scalable and packed with
                    features that are fit for startups as they grow into enterprises.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <img src="<?php echo base_url(); ?>images/wbs-suite/12118x117.png" class="center-block" alt="">
                <h4 class="center"><strong>Improved Mobility</strong></h4>
                <p class="center red">Change Order Management on the go!<br></p>
                <p class="center">With the Fiberrails SiloSync option enabled, your fingers can stay on the pulse of
                    your business from any terminal around the globe.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <img src="<?php echo base_url(); ?>images/wbs-suite/14116x116.png" class="center-block" alt="">
                <h4 class="center"><strong>Data Accuracy & Security is our focus!</strong></h4>
                <p class="center red">Choose the best option<br></p>
                <p class="center">Adapt and Customize how you collect and deploy key data across your organization with
                    the FiberRails. From Contact to close, improve on all conversions in your business.</p>
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-b -->
<!-- Page Content -->
<div class="content-section-a">
    <div class="container">
        <div class="row">
            <div class="center-block">
                <img src="<?php echo base_url(); ?>images/wbs-suite/frlogo.png" class="center-block" alt="" height="130">
                <h1 class="white center">Your Virtual Assistant is Here!</h1>
                <h3 class="center white">Flexibility, Portability & Reliability - Enhances Mobility<br></h3>
                <div class="center padding-10">
                    <button class="btn btn-danger" style="width: 190px"> Learn More</button>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-a -->
<div class="container">
    <div class="row">
        <h1 class="center">Platform-as-a-Service</h1>
        <h3 class="center">Flexibility, Portability & Reliability - Enhances Mobility</h3>
        <div class="center padding-10 margin-bottom-50">
            <button class="btn btn-danger" style="width: 190px"> Learn More</button>
        </div>
    </div>
</div>
<!-- /.container -->
<!--big section start-->
<div class="row big-img">
    <div class="container">
        <div class="col-lg-6" style="background: rgba(255,255,255,0.85)">
            <img class="img-responsive center-block over-img" src="<?php echo base_url(); ?>images/wbs-suite/diverse_businesspeople.jpg" alt="">

            <h2>A New Approach to Managed Cloud Contacts</h2>
            <p>As your business grows it needs to focus on its core strengths, and that isn’t managing IT
                infrastructure. You need platforms that bring you the benefits of the latest advances without getting
                stuck on a huge learning curve.
                Fiberrails can bring those advances to your company in the form of a fully managed cloud platform.</p>

            <p>Our managed cloud solution provides a complete hands-off cloud experience, utilizing state of the art
                cloud infrastructure combined with well honed traditionally engineered best practice solutions. From
                cloud planning and strategy, through to migration, testing and optimization – this is the whole package.
                Let us make the most out of your cloud platform, while you get back to working on your core
                business.</p>
            <img class="img-responsive center-block" src="<?php echo base_url(); ?>images/wbs-suite/ps6-crop-u80773.png" alt="">
            <h3>Exchange Contacts and Grow Your Targeted Database!</h3>

            <p>Feel free to contact us at any time. We're real people ready to help you
                with any sales or technical support related questions you may have. And
                we love talking about security, privacy, and encryption too.</p>

            <p>Enable Dynamic referrals that quickly convert into your customers. Real-time analytics show you where
                your next transaction is coming from.</p>
            <div class="youtube-vid center-block"><!-- custom html -->
                <iframe class="actAsDiv"
                        src="https://www.youtube.com/embed/klHzR79pPns?autoplay=0&amp;loop=0&amp;showinfo=0&amp;theme=dark&amp;color=red&amp;controls=1&amp;modestbranding=0&amp;start=0&amp;fs=1&amp;iv_load_policy=1&amp;wmode=transparent&amp;rel=1"
                        frameborder="0" allowfullscreen=""></iframe>
            </div>
            <h4 class="padding-bottom-10">Our PaaSPort tool empowers you to focus on your business core values rather than building
                applications.</h4>
        </div>

        <div class="col-lg-6 ">
            <div class="margin-top-50">
                <img class="center-block" src="<?php echo base_url(); ?>images/wbs-suite/frlogo.png" alt="">
            </div>
            <h4 class="center white">Learn more about PaaSPort & SiloMerchant Services!</h4>
            <div class="center">
                <button class="btn btn-lg btn-danger margin-bottom-25"> Add Merchant Services </button>
            </div>
        </div>
    </div>
</div>
<!--big section end-->
<div class="content-section-a">
    <div class="container">
        <div class="row">
            <img class="center-block" src="<?php echo base_url(); ?>images/wbs-suite/cloud-red.png" alt="">
            <h1 class="center white">Quick & Easy Integration For Developers</h1>
            <h3 class="center white">Comprehensive integration guides and API references for all popular platform to
                help you at every stage of integration.
                <small>View Developer Resources</small>
            </h3>
        </div>
    </div>
    <!-- /.container -->
</div>
<!-- /.content-section-a -->
<div class="row lightbox-bg">
    <div class="container">
        <div class="lightbox" style="background: rgba(0,0,0,0.6)">
            <h1 class="center white padding-50">Learn more about Your Business daily!</h1>
        </div>
    </div>
</div>

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
                <img class="img-responsive margin-top-25 features-img center-block" src="<?php echo base_url(); ?>images/wbs-suite/ps4.png" alt="" height="125">
            </div>
            <div class="col-lg-4 padding-bottom-25">
                <img class="img-responsive padding-top-10 features-img center-block" src="<?php echo base_url(); ?>images/wbs-suite/ps2381x199.png" alt="" height="200">
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
                <img class="img-responsive margin-top-25 features-img center-block" src="<?php echo base_url(); ?>images/wbs-suite/ps5.png" alt="" height="150">
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
                <img class="img-responsive features-img center-block" src="<?php echo base_url(); ?>images/wbs-suite/ps3381x192.png" alt="" height="180">
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

<div class="row" style="background: #dddddd">
    <div class="container">
        <div class="col-lg-3 padding-top-20 padding-bottom-25" style="background: white;">
            <div><img class="center-block" src="<?php echo base_url(); ?>images/wbs-suite/fiberrails.png" alt=""></div>
            <h4 class="padding-top-10">FEATURES</h4>
            <ul class="list-unstyled red">
                <li>Multichannel Communication</li>
                <li>Sales Enhancement Tools</li>
                <li>Sales Productivity</li>
                <li>HR Loading</li>
                <li>Time/Task Management</li>
                <li>Automation</li>
                <li>Enterprise Readiness</li>
            </ul>
            <ul class="list-unstyled red">
                <li>Help Center</li>
                <li>Certified Consultants</li>
                <li>Demo Videos</li>
                <li>Developer API</li>
                <li>User Community</li>
                <li>Discussion Forum</li>
            </ul>
            <ul class="list-unstyled red">
                <li>Pricing</li>
                <li>Customer Stories</li>
                <li>Mobile CRM</li>
                <li>Blogs</li>
            </ul>
        </div>
        <div class="col-lg-offset-1 col-lg-8">
            <div class="form-group  col-md-10">
                <h1 class="center">Start your 30-Day free trial now!</h1>

            </div>
            <div class="col-lg-5 col-md-6 col-sm-6">
                <h3 class="center white" style="background: #ff0000; margin-bottom: 0px; padding:10px;">Advanced</h3>
                <div class="plan-box">
                    <h1 class="center">$9.99</h1>
                    <h4 class="center padding-10">As much space as you need with the Fiberrails Admin Cpanel loaded with
                        upgradeable features and social analytics</h4>
                    <div class="center padding-bottom-25">
                        <!--  <button class="btn btn-danger ">Create Free Trial</button>-->
                        <?php if ($this->session->userdata('is_logged_in')) { ?>
                            <a href="#myModal" class="btn btn-danger" data-toggle="modal">Create Free Trial</a>
                        <?php } else { ?>
                            <a href="#register_with_free_trial" class="btn btn-danger" id="create_free_trial">Create Free Trial</a>
                        <?php } ?>

                        <!-- Modal HTML -->
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" name="free_trial_modal" id="free_trial_modal">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 class="modal-title">Create Free Trial</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group ">
                                                <label for="inputName">Enter Organization Name</label>
                                                <input type="text" name="organization_name" id="organization_name" class="form-control" style="width:80%; margin-left:10%; background-color:#f5f5f5; margin-top:5px; border:1px solid #ccc; color:#333333;" placeholder="Enter Organization Name">
                                            </div>
                                            <div id="errors" class="form-group" style="color:red;">
                                            </div>
                                        </div>
                                        <div class="modal-footer center">
                                            <input type="button" name="free_trial" id="free_trial" class="btn btn-danger" value="Proceed">
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                    <ul>
                        <li> Everything in Standard</li>
                        <li> Unlimited cloud storage</li>
                        <li> Advanced Fiber Rails CPanel</li>
                        <li> Tiered Admin Roles</li>
                        <li> Project Management Tools</li>
                        <li> Business Hours Phone Support</li>
                        <li> Enhanced Monitoring and reporting</li>
                        <li> SiloSD Card Sync</li>
                        <li> Share/Broadcast Enabled</li>
                        <li> Enhanced Auditing Platform</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-5 col-md-6 col-sm-6">
                <h3 class="center white" style="background: #959595; margin-bottom: 0px; padding:10px;">Enterprise</h3>
                <div class="plan-box">
                    <h1 class="center">$29.99</h1>
                    <h4 class="center padding-10">As much space as you need with the Fiberrails Admin Cpanel loaded with
                        upgradeable features and social analytics</h4>
                    <div class="center padding-bottom-25">
                        <button class="btn btn-danger btn-o">Contact Us</button>
                    </div>
                    <ul>
                        <li>Everything in Advanced</li>
                        <li>Account Capture</li>
                        <li>Network Control</li>
                        <li>Domain Insights</li>
                        <li>Integration and development support</li>
                        <li>Assigned account success manager</li>
                        <li>24/7 phone support</li>
                        <li>Advance training for end users</li>
                        <li>Enterprise Mobility Management</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="col-lg-4">
            <img class="center-block margin-top-50" src="<?php echo base_url(); ?>images/wbs-suite/silo%20main%20logo.png" alt="" height="100">
        </div>
        <div class="col-lg-8">
            <h2 class="center">Discover the safest sharing and storage solution for your business in the world!</h2>
            <div class="center margin-bottom-10">
                <button type="button" class="btn btn-danger"> Contact Sales </button>
            </div>
            <p class="center">There are a lot of different approaches to delivering services on top of software defined infrastructure.
                They range from simple templated app deployments to complex ecosystems to manage your entire application
                lifecycle. In the same way you don’t really want to be wrangling hardware, you don’t want to get bogged
                down with the same operational lifecycle overheads as your competitors.</p>
        </div>
    </div>
</div>



<div class="modal fade" id="memberLogin" role="dialog">
    <div class="modal-dialog">
        <form action="#" method="post" name="member_login" id="member_login">
            <header class="member_login">WbsSuite Login
                <span class="close-custom-btn" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></span>
            </header>
            <!-- Modal content-->
            <div id="login_errors" style="color:red;">
            </div>


            <div class="input_login_div">

                <label class="form-login"><h4 style="margin-top:0px; margin-bottom:0px;">Username<span>*</span></h4></label>
                <input type="text" id="username" name="username" class="member_login input-lg input-login" placeholder="Enter Username" style="height: 40px;">
                <label class="form-login"><h4 style="margin-top:0px; margin-bottom:0px;">Password <span>*</span></h4></label>
                <input type="password" class="member_login input-lg input-login" name="password" id="password" placeholder="Password" style="height: 40px;">

                <!--				
                <label class="form-login"><h4 style="margin-top:0px; margin-bottom:0px;">OTP <span>*</span></h4></label>
                <input type="text" class="input-lg input-login" name="otp_input" id="otp_input" placeholder="Enter OTP here" style="height: 40px;">
                -->					
                <!--                    <button type="submit" name="member_login_button" id="member_login_button" class="form-login">Login</button>-->

                <input type="button" name="member_login_button" id="member_login_button" class="form-login1" value="Login">

            </div>			

            <div class="input_otp_div" style="display:none">
                <label class="form-login"><h4 style="margin-top:0px; margin-bottom:0px;">OTP<span>*</span></h4></label>
                <input type="text" id="input_otp" name="input_otp" class="input-lg input-login" placeholder="Enter OTP" style="height: 40px;">

                <input type="button" name="resend_otp_button" id="resend_otp_button" class="form-login1" value="Resend">
                <input type="button" name="verify_otp_button" id="verify_otp_button" class="form-login1" value="Verify">
            </div>

        </form>
    </div>
</div>




<script>
    jQuery(document).on('click', '.mega-dropdown', function (e) {
        e.stopPropagation()
    })
</script>

<script>
    $(document).ready(function () {
        /*
         $("#organization_name").keyup(function (event) {
         if (event.keyCode == 13) {
         event.preventDefault();
         $("#free_trial").trigger("click");
         }
         });
         */



        /******************************** Login Modal Start ********************************/

        $('.member_login').keypress(function (e) {
            if (e.which == 13) {//Enter key pressed
                $('#member_login_button').click();//Trigger search button click event
            }
        });


        $("#member_login_button").click(function () {

            var form_data = $('#member_login').serialize();

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>user/login/crm_validate_credentials',
                data: form_data,
                datatype: 'text',
                success: function (data) {

                    if (data == 'otp') {

                        $(".input_otp_div").show();
                        $(".input_login_div").hide();

                        $("#login_errors").html('Enter OTP');
                        $("#input_otp").focus();

                    } else if (data == 'crm') {
                        // window.location = "<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/crm/login"; ?>";
                        window.location = "<?php echo base_url(); ?>user/wbs_suite";
                    } else if (data == 'true') {
                        window.location = "<?php echo base_url(); ?>user/wbs_suite";
                    } else {
                        $('#member_login #password').val("");
                        $("#login_errors").html(data);
                    }
                }
            });
        });


        //Verify otp button


        $("#input_otp").keyup(function (event) {
            if (event.keyCode == 13) {
                $("#verify_otp_button").click();
            }
        });


        $("#verify_otp_button").click(function () {
            var form_data = $('#member_login').serialize();

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>user/otp/verify_otp',
                data: form_data,
                datatype: 'text',
                success: function (data) {

                    // alert(data);
                    if (data == 'true') {
                        //                        window.location = "<?php //echo base_url();           ?>user/dashboard";
                        window.location = "<?php echo base_url(); ?>wbs_suite";
                    } else {

                        $("#login_errors").html(data);

                    }
                }
            });
        });




        $("#resend_otp_button").click(function () {

            $("#login_errors").html('');

            $.ajax({
                url: '<?php echo base_url(); ?>user/login/send_otp',
                datatype: 'text',
                success: function (data) {

                    // if (data == 'true') {

                    $("#login_errors").html('OTP sent successfully');

                    // } else {

                    // $("#login_errors").html(data);

                    // }

                }
            });
        });


        /******************************** Login Modal End ********************************/


        /******************************** Free Trial Modal Start ********************************/


        $('#free_trial_modal').keypress(function (e) {
            if (e.which == 13) {//Enter key pressed
                $('#free_trial').click();//Trigger search button click event
            }
        });


        $("#free_trial").click(function () {
            //alert('d');
            //call ajax

            var form_data = $('#free_trial_modal').serialize();

            $('#loader_image_div').show();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>user/wbs_suite/wbs_trial',
                data: form_data,
                datatype: 'text',
                success: function (data) {

                    //                    alert(data);
                    if (data == true) {
                        //                        window.location = "http://localhost/crm/";
                        window.location = "<?php echo base_url() . "crm/login"; ?>";
                        //                        alert("true");
                        //                        $('#loader_image_div').hide();
                    } else {
                        $("#errors").html(data);
                        //                        alert("error");
                        $('#loader_image_div').hide();
                    }
                }
            });
        });



        /******************************** Free Trial Modal End ********************************/

        /******************************** Sign up Form Start ********************************/



        $('#signup_with_free_trial').keypress(function (e) {
            if (e.which == 13) {//Enter key pressed
                $('#crm_signup').click();//Trigger search button click event
            }
        });

        $("#crm_signup").click(function () {

            var form_data = $('#signup_with_free_trial').serialize();

            $('#loader_image_div').show();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>user/wbs_suite/wbs_trial_with_signup',
                data: form_data,
                datatype: 'text',
                success: function (data) {

                    //                    alert(data);
                    if (data == true) {
                        //                        window.location = "http://localhost/crm/";
                        // window.location = "<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/crm/login"; ?>";
                        window.location = "<?php echo base_url(); ?>user/wbs_suite";

                        // alert("true");
                        // $('#loader_image_div').hide();
                    } else {
                        $("#signup_errors").html(data);
                        //                        alert("error");
                        $('#loader_image_div').hide();
                    }
                }
            });
        });


        /******************************** Sign up Form End ********************************/


        /*
         $('#signup_with_free_trial').keypress(function(e){
         if(e.which == 13){//Enter key pressed
         $('#crm_signup').click();//Trigger search button click event
         }
         });
         */

        $("#crm_signup_dummy").click(function () {
            // $("#signup_errors").html("You are already regietered with RPDigitel");

            $.toaster({priority: 'error', title: 'Message', message: 'You are already logged in'});

        });



        $("#create_free_trial").click(function () {
            $("#signup_errors").html("Create your account to use free trial");
        });


    });
</script>


<script>
    function loggedin_successful() {
        $.toaster({priority: 'success', title: 'Message', message: 'You are logged in successfully'});
    }

    function create_free_trial_successful() {
        $.toaster({priority: 'success', title: 'Message', message: 'You have registered with 30 days free trial successfully'});
    }
</script>


<?php
$success_message = '';
$success_message = $this->session->flashdata('login_success_msg');
if ($success_message != '') {
    echo '<script type="text/javascript"> loggedin_successful(); </script>';
}

$free_trial_success_message = '';
$free_trial_success_message = $this->session->flashdata('free_trial_success_msg');
if ($free_trial_success_message != '') {
    echo '<script type="text/javascript"> create_free_trial_successful(); </script>';
}
?>
														