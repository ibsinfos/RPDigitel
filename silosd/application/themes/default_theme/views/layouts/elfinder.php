<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $template['title'] ?> </title>

        <!-- Bootstrap -->
        <link href="<?php echo backend_asset_url() ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo backend_asset_url() ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo backend_asset_url() ?>vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php echo backend_asset_url() ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="<?php echo backend_asset_url() ?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="<?php echo backend_asset_url() ?>vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="<?php echo backend_asset_url() ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?php echo backend_asset_url() ?>build/css/custom.min.css" rel="stylesheet">
        <?php if ($page == 'project_list') { ?>
        <link href="<?php echo backend_asset_url() ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo backend_asset_url() ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo backend_asset_url() ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo backend_asset_url() ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo backend_asset_url() ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <?php } ?>
		
		<!-- Dropzone.js -->
        <link href="<?php echo backend_asset_url() ?>vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php if (isset($template['partials']['sidebar'])) echo $template['partials']['sidebar']; ?>
                <?php if (isset($template['partials']['header'])) echo $template['partials']['header']; ?>
                <?php echo $template['body']; ?>
                <?php if (isset($template['partials']['footer'])) echo $template['partials']['footer']; ?>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo backend_asset_url() ?>vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo backend_asset_url() ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <!--script src="<?php echo backend_asset_url() ?>vendors/fastclick/lib/fastclick.js"></script-->
        <!-- NProgress -->
        <!--script src="<?php echo backend_asset_url() ?>vendors/nprogress/nprogress.js"></script-->
        <!-- Chart.js -->
        <!--script src="<?php echo backend_asset_url() ?>vendors/Chart.js/dist/Chart.min.js"></script-->
        <!-- gauge.js -->
        <!--script src="<?php echo backend_asset_url() ?>vendors/gauge.js/dist/gauge.min.js"></script-->
        <!-- bootstrap-progressbar -->
        <script src="<?php echo backend_asset_url() ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo backend_asset_url() ?>vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="<?php echo backend_asset_url() ?>vendors/skycons/skycons.js"></script>
        
        
		<?php if($page=="upload_files"){?>
		
		 <!-- Dropzone.js -->
         <script src="<?php echo backend_asset_url() ?>vendors/dropzone/dist/min/dropzone.min.js"></script>
		
		<?php }?>
		
        <!-- validator -->
        <script src="<?php echo backend_asset_url() ?>vendors/validator/validator.js"></script>
		<!-- Parsley Form Validator -->
         <script src="<?php echo backend_asset_url() ?>vendors/parsleyjs/dist/parsley.min.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="<?php echo backend_asset_url() ?>build/js/custom.min.js"></script>

    </body>
</html>