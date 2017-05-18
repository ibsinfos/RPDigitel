<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

        <title>Paasport | Forget Passsword</title>

        <link rel="stylesheet" href="<?php echo asset_url() ?>/fontawesome/css/font-awesome.css">

        <link rel="stylesheet" href="<?php echo asset_url() ?>/css/quirk.css">

        <script src="<?php echo asset_url() ?>/modernizr/modernizr.js"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../lib/html5shiv/html5shiv.js"></script>
        <script src="../lib/respond/respond.src.js"></script>
        <![endif]-->
    </head>

    <body class="signwrapper">

        <div class="sign-overlay"></div>
        <div class="signpanel background_login"></div>

        <div class="panel signin">
            <div class="panel-heading">
                <h1>vCard</h1>
            </div>
            <div class="panel-body">
               
                <div class="error"></div>
                <?php if($this->session->flashdata('msg')!=''){ ?>
                <div class="alert alert-success">
                <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>-->
                <strong><?php echo $this->session->flashdata('msg');?></strong>
              </div>
                <?php
                 }?>
                 <?php if($this->session->flashdata('err')!=''){ ?>
                <div class="alert alert-danger">
                <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>-->
                <strong><?php echo $this->session->flashdata('err');?></strong>
              </div>
                <?php
                 }?>
                <?php if(isset($msg) && $msg !=''){ ?>
                <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <strong>Sorry! <?php echo $msg;?></strong>
              </div>
                <?php }?>
                <form action="<?php echo base_url() ?>forget-password" method="POST" id="signin">
                    <div class="form-group mb10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="email" name="email" class="form-control" required placeholder="Enter Your Email ">
                        </div>
                    </div>
                    <div class="form-group">
                        <!--<button class="btn btn-success btn-quirk btn-block" type="submit">Sign In</button>-->
                        <input class="btn btn-success btn-quirk btn-block" type="submit" name="submit" value="Submit">
                    </div>
                </form>
                <hr class="invisible">
                <div class="form-group">
                    <a href="<?php echo base_url()?>login" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">Sign In!</a>
                </div>
            </div>
        </div><!-- panel -->

    </body>
	
</html>
