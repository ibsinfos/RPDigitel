<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

        <title>Paasport</title>

        <link rel="stylesheet" href="<?php echo asset_url() ?>/fontawesome/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo asset_url() ?>/select2/select2.css">

        <link rel="stylesheet" href="<?php echo asset_url() ?>/css/quirk.css">

        <script src="<?php echo asset_url() ?>/modernizr/modernizr.js"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../lib/html5shiv/html5shiv.js"></script>
        <script src="../lib/respond/respond.src.js"></script>
        <![endif]-->
    </head>

    <body class="signwrapper2">

        <div class="sign-overlay"></div>

        <div class="signpanel background_signup"></div>

        <div class="signup">
            <div class="row">
                <div class="col-sm-5">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1>Paasport</h1>
                            <h4 class="panel-title">Create an Account!</h4>
                        </div>
                        <div class="panel-body">
                            <div class="error"></div>
                            <form action="" method="POST" id="signup">
                                <div class="form-group mb15">
                                    <input type="text" class="form-control" id="firstname" name="first_name" required placeholder="Enter Your First Name">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                </div>
                                <div class="form-group mb15">
                                    <input type="text" class="form-control" id="lastname" name="last_name"  required placeholder="Enter Your Last Name">
                                </div>
                                <div class="form-group mb15">
                                    <input type="email" class="form-control" id="email" name="email"  required placeholder="Enter Your Email Address">
                                </div>
                                <div class="form-group mb15">
                                    <input type="text" class="form-control" id="mobile" name="mobile"  required placeholder="Enter Your Mobile number">
                                </div>
                                <div class="form-group mb15">
                                    <select name="source" class="form-control" required>
                                        <option value="Select One">Select One</option>
                                        <option value="From a Colleague">From a Colleague</option>
                                        <option value="A Link On a vCard">A Link On a Paasport</option>
                                        <option value="Ad/Flyer/Brochure">Ad/Flyer/Brochure</option>
                                        <option value="Received an Email">Received an Email</option>
                                        <option value="Search Engine">Search Engine</option>
                                        <option value="Our Acct Manager">Our Acct Manager</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group mb15">
                                    <input type="radio" name="plan_id" required  value="yearly"> Yearly Cost($<?php echo $plan_data[0]['yearly_cost'];?>/Year)
                                </div>
                                 <div class="form-group mb15">
                                    <input type="radio" name="plan_id" required value="monthly"> Monthly Cost($<?php echo $plan_data[0]['monthly_cost'];?>/Month + $<?php echo $plan_data[0]['setup_cost'];?>setup cost)
                                </div>
                                <div class="form-group mb15">
                                    <input type="text" class="form-control" id="reffered_by" name="reffered_by"  placeholder="Who referred you?">
                                </div>



                                <div class="form-group mb20">
                                    <label class="ckbox">
                                        <input type="checkbox" id="agree" name="agree" required name="checkbox">
                                        <span>Accept terms and conditions</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-success btn-vCard btn-block" type="submit" value="Submit">
                                </div>
                            </form>
                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-sm-5 -->
                <div class="col-sm-7">
                    <div class="sign-sidebar">
                        <h3 class="signtitle mb20">Two Good Reasons to Love vCard</h3>
                        <p>When it comes to websites or apps, one of the first impression you consider is the design. It needs to be high quality enough otherwise you will lose potential users due to bad design.</p>
                        <p>Below are some of the reasons why you love Paasport.</p>

                        <br>

                        <h4 class="reason">1. Attractive</h4>
                        <p>When your website or app is attractive to use, your users will not simply be using it, theyâ€™ll look forward to using it. This means that you should fashion the look and feel of your interface for your users.</p>

                        <br>

                        <h4 class="reason">2. Responsive</h4>
                        <p>Responsive Web design is the approach that suggests that design and development should respond to the userâ€™s behavior and environment based on screen size, platform and orientation. This would eliminate the need for a different design and development phase for each new gadget on the market.</p>

                        <hr class="invisible">

                        <div class="form-group">
                            <a href="<?php echo base_url() ?>login" class="btn btn-default btn-vCard btn-stroke btn-stroke-thin btn-block btn-sign">Already a member? Sign In Now!</a>
                        </div>
                    </div><!-- sign-sidebar -->
                </div>
            </div>
        </div><!-- signup -->



        <script src="<?php echo asset_url() ?>js/jquery_signup.js"></script>
        <script src="<?php echo asset_url() ?>/js/bootstrap.js"></script>
        <script src="<?php echo asset_url() ?>/select2/select2.js"></script>
        <script src="<?php echo asset_url() ?>/js/validations/signup.js"></script>
        <script src="<?php echo asset_url() ?>/js/jquery.validate.js"></script>

        <script>

            $(function () {

                // Select2 Box
                $("select.form-control").select2({minimumResultsForSearch: Infinity});

            });
        </script>

    </body>
</html>
