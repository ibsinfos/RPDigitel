<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PaasPort</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url()?>images/favicon.ico?crc=4022900773"/>
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>css/paasport.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/paasport-login.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/wbs-suite.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/class.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
          type="text/css">
 <script src="<?php echo base_url(); ?>js/jquery.js"></script>
 
<script src="<?php echo base_url(); ?>js/jquery.toaster.js"></script>
		
</head>

<body>

<!-- Navigation -->


<!--Slider Start-->

<!-- Carousel
================================================== -->

<!-- /.carousel -->
<!--Slider End-->
<!--Section 1 Start-->

<!--Section 1 End-->
<?php
        if (isset($template['body'])) {
            echo $template['body'];
        }
        ?>
<!-- Modal -->

<!-- Footer -->
<?php
        if (isset($template['partials']['footer'])) {
            echo $template['partials']['footer'];
        }
        ?>
<!-- jQuery -->
<script src="<?php echo base_url()?>js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.toaster.js"></script>
		
<script>
    jQuery(document).on('click', '.mega-dropdown', function (e) {
        e.stopPropagation()
    })
</script>
</body>

</html>
