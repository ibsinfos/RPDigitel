<!DOCTYPE html>
<html lang="en">
<?php // echo $order_status;die;?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rebelute - Payment Response</title>
	<link rel="shortcut icon" type="image/x-icon" href="http://rebelute.com/assets/main_site/images/favicon.ico"/>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="<?php echo base_url();?>assets/landing_page/response_ccavenue/css2/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/landing_page/response_ccavenue/css2/freelancer2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                
                <!-- <a class="navbar-brand" href="#page-top">Start Bootstrap</a> -->
				
				<img src="<?php echo base_url();?>assets/landing_page/response_ccavenue/img2/logo-dark.png" class="navbar-brand img-responsive"/>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
          
			<div class="row">
				<div class="span12">
				    <div class="hero-unit Thankyou">
						<?php 
						//$order_status="Success";
						if($order_status==="Success")
		                { ?>
						
						<h1>Thankyou</h1>
						<b/>
						<h4>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.<h4>
						<a href="<?php echo base_url();?>mobile/webservices/paymentSuccess" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Back To Home</a>
					   
						<?php 
						}
						else if($order_status==="Aborted")
						{
						?>
					     
						<h4>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail.<h4>
						<a href="<?php echo base_url();?>mobile/webservices/paymentAborted" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Back To Home</a>
                       
                        <?php 

                        }
                        else if($order_status==="Failure")
						{?>							
					    <h4>Thank you for shopping with us.However,the transaction has been declined.<h4>
						<a href="<?php echo base_url();?>mobile/webservices/paymentFail" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Back To Home</a>
                        
						<?php 

                        }
                        else
						{?>
                         <h4>Security Error. Illegal access detected.<h4>
						<a href="<?php echo base_url();?>mobile/webservices/paymentIlegal" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Back To Home</a>

 

                        <?php } ?> 
						 
						 
					
					</div>
									
                      
                </div>
            </div>
              
				
				</div>
</header>
             

<!-- Form Name -->


<!-- Text input-->


<!-- Text input-->



    <!-- Footer -->
	
	<footer class="DarkGreybg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
    <div class="col-md-4 text-center font">
     <h5>Copyrights © Rebelute Digital Solutions 2016.</h5>
     </div>
     <div class="col-md-4 text-center font">
     <h5>www.rebelute.com</h5>
     </div>
     <div class="col-md-4 text-center font">
     <h5>Contact us: (925) 315-5007</h5>
     </div>
        

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


    <script src="<?php echo base_url();?>assets/landing_page/response_ccavenue/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/landing_page/response_ccavenue/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>assets/landing_page/response_ccavenue/js/classie.js"></script>
    <script src="<?php echo base_url();?>assets/landing_page/response_ccavenue/js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url();?>assets/landing_page/response_ccavenue/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url();?>assets/landing_page/response_ccavenue/js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/landing_page/response_ccavenue/js/freelancer.js"></script>

</body>

</html>
