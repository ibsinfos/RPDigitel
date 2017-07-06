<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

        <title>Paasport | Login</title>

        <link rel="stylesheet" href="<?php echo asset_url() ?>/fontawesome/css/font-awesome.css">

        <link rel="stylesheet" href="<?php echo asset_url() ?>/css/quirk.css">

        <script src="<?php echo asset_url() ?>/modernizr/modernizr.js"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../lib/html5shiv/html5shiv.js"></script>
        <script src="../lib/respond/respond.src.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>

    <body class="signwrapper">

        <div class="sign-overlay"></div>
        <div class="signpanel background_login"></div>

        <div class="panel signin">
            <div class="panel-heading">
                <h1>Paasport</h1>
            </div>
            <div class="panel-body">
               
                <div class="error"></div>
                <?php if($this->session->flashdata('msg')!=''){ ?>
                <div class="alert alert-success">
                
                <strong><?php echo $this->session->flashdata('msg');?></strong>
              </div>
              
                <?php
                 }?>
                <?php if(isset($msg) && $msg !=''){ ?>
                <div class="alert alert-danger">
                
                <strong><?php echo $msg;?></strong>
              </div>
                <?php }?>
                <form action="<?php echo base_url() ?>submitlogin" method="POST" id="signin">
                    <div class="form-group mb10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="email" name="username" class="form-control" required placeholder="Enter Username">
                        </div>
                    </div>
                    <div class="form-group nomargin">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="password" class="form-control"  placeholder="Enter Password" required>
                        </div>
                    </div>
                    <div><a href="<?php echo base_url()?>forget-password" class="forgot">Forgot password?</a></div>
                    <div class="form-group">
                        <!--<button class="btn btn-success btn-quirk btn-block" type="submit">Sign In</button>-->
                        <input class="btn btn-success btn-quirk btn-block" type="submit" value="Submit">
                    </div>
                </form>
                <hr class="invisible">
                <div class="form-group">
                    <a href="signup" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">Not a member? Sign up now!</a>
                </div>
            </div>
        </div><!-- panel -->
<script>
$(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
});
$(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-danger").slideUp(500);
});
</script>
    </body>
	
</html>
