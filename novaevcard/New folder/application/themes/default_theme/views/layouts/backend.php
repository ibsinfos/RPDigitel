<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title><?php echo $template['title']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo asset_url();?>backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>backend/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo asset_url();?>backend/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo asset_url();?>backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo asset_url();?>backend/css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?php echo asset_url();?>backend/css/style.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>backend/css/style-responsive.css" rel="stylesheet" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>backend/assets/bootstrap-datepicker/css/datepicker.css" />    
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>backend/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    
    <link href="<?php echo asset_url();?>backend/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?php echo asset_url();?>backend/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <?php if(isset($template['partials']['header']))echo $template['partials']['header']; ?>
      <!--header end-->
      
      <!--sidebar start-->
      <?php if(isset($template['partials']['leftpanel']))echo $template['partials']['leftpanel']; ?>
      <!--sidebar end-->
      
      <!--main content start-->
      <?php echo $template['body']; ?>
      <!--main content end-->
      
      <!--footer start-->
      <?php if(isset($template['partials']['footer']))echo $template['partials']['footer']; ?>
      <!--footer end-->
  </section>

    
    
  

    <!--script for this page-->
    <script src="<?php echo asset_url();?>backend/js/sparkline-chart.js"></script>
    <script src="<?php echo asset_url();?>backend/js/easy-pie-chart.js"></script>
    <script src="<?php echo asset_url();?>backend/js/count.js"></script>

  <script>


      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
      
  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>

