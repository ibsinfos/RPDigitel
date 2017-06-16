<!Doctype html>
<html>
    <head>
        <title>test</title>
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
        <?php
        if (isset($template['partials']['header'])) {
            echo $template['partials']['header'];
        }
        if (isset($template['body'])) {
            echo $template['body'];
        }
        if (isset($template['partials']['footer'])) {
            echo $template['partials']['footer'];
        }
        ?>
        <!-- jQuery Core library -->
        <script type="text/javascript" src="<?php echo main_asset_url(); ?>js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script type="text/javascript" src="<?php echo main_asset_url(); ?>js/bootstrap.min.js"></script>
        <!-- jQuery Validation Core JavaScript -->
        <script type="text/javascript" src="<?php echo main_asset_url(); ?>js/jquery.validate.min.js"></script>
        <script src="<?php echo main_asset_url(); ?>js/jquery.toaster.js"></script>
        <!-- Custom JavaScript -->
        <script type="text/javascript" src="<?php echo main_asset_url(); ?>js/custom.js"></script>
        <script>
            var checkLoginURL = '<?php echo base_url(); ?>user/login/validate_credentials';
            var createPaasportURL = "<?php echo backend_passport_url(); ?>create-paasport";
            var mainDashboardURL = "<?php echo base_url(); ?>main_dashboard";
            var loginOtpURL = "<?php echo base_url(); ?>otp";
            var otpRedirectDashboard = "<?php echo base_url(); ?>fiberrails";
            var resendOtp = '<?php echo base_url(); ?>user/login/send_otp';
            var verifyOtp = '<?php echo base_url(); ?>user/otp/verify_otp';
        </script>
    </body>
</html>