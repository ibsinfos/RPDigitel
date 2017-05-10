<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $template['title']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo asset_url(); ?>main_vcard/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo asset_url(); ?>main_vcard/images/favicon.ico?crc=4022900773"/>
    <!-- Custom CSS -->
    <link href="<?php echo asset_url(); ?>main_vcard/css/vcard.css" rel="stylesheet">
    <link href="<?php echo asset_url(); ?>main_vcard/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo asset_url(); ?>main_vcard/css/class.css" rel="stylesheet">
    <!--<link href="css/style.css" rel="stylesheet">-->
    <link href="<?php echo asset_url(); ?>main_vcard/css/gsdk-bootstrap-wizard.css" rel="stylesheet"/>
    <!-- custom scrollbar stylesheet -->
    <link rel="stylesheet" href="<?php echo asset_url(); ?>main_vcard/css/jquery.mCustomScrollbar.css">
    <link href="<?php echo asset_url(); ?>main_vcard/css/about-vcard.css" rel="stylesheet"/>
    <link href="<?php echo asset_url(); ?>main_vcard/plugins/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <!-- Custom Fonts -->
    <link href="<?php echo asset_url(); ?>main_vcard/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
          type="text/css">

</head>

<body>
<!-- Navigation -->
<!--Start Header -->
<?php
	if (isset($template['partials']['header'])) {
		echo $template['partials']['header'];
	}
?>        
<!--End Header -->
<!--Start Body -->
<?php echo $template['body']; ?>
<!--End Body -->



</body>

</html>
