<!Doctype html>
<html>
    <head>
        <title>FiberRails | Sign In</title>
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
        <?php $this->load->view('includes/main_header_home'); ?>

		<section class="mainDashboardServices">
			<div class="container">
				<div class="row" >
					<div class="col-md-4 col-sm-6">
						<div class="panel panel-default">
							<div class="panel-heading websuitImgBox">
								<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/services/wbssuite.png" alt="wbssuite" width="177" height="61">
							</div>
							<div class="panel-body">
								<h4 class="heading">WBS Business Suite</h4>
								<p class="description">Our Saas Products Empower IT professionals to adapt to rapid change, utilise resource more
								efficiently and deliver stronger value to organizations.</p>
								<div class="text-center">
									<?php 
									if ($this->session->userdata('member_service_remaining_days')) {
										if ($this->session->userdata('member_service_remaining_days')<0) {
											
											$websuit=base_url()."wbs_suite";
										}
										else
										{
											$websuit=base_url()."crm/login";	
										}
									} else if ($this->session->userdata('crm_subscription')) {
										$websuit=base_url()."crm/login";	
									}
									else
									{
										$websuit=base_url()."wbs_suite";
									}	
									
									?>
									<a href="<?php echo $websuit; ?>" class="btn btnRed">
		                                Go To Dashboard / Subscribe Now
										
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="panel panel-default">
							<div class="panel-heading passportImgBox">
								<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/services/paasport.png" alt="paasport" height="39" width="136">
							</div>
							<div class="panel-body">
								<h4 class="heading">PaaSPort</h4>
								<p class="description">Try or purchase our latest tools, apps and software to continuously enhance your infrastructure and maintain
								a competitive advantage.</p>
								<div class="text-center">
									<a href="<?php echo base_url(); ?>paas-port/dashboard" class="btn btnRed">Go To Dashboard / Subscribe Now</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="panel panel-default">
							<div class="panel-heading siloSDImgBox">
								<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/services/silo%20main%20logo.png" alt="silo" width="100">
							</div>
							<div class="panel-body">
								<h4 class="heading">Silo Cloud Services</h4>
								<p class="description">Simplify networking, domain and webhosting with a single secured solution that caters to Startup and small businesses at every stage of growth.</p>
								<div class="text-center">
									<a href="<?php echo base_url(); ?>dashboard" class="btn btnRed">
		                                Go To Dashboard / Subscribe Now
									</a>
								</div>
							</div>
						</div>
					</div>
				
					<div class="col-md-4 col-sm-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/services/fiberrails%20main96x86.png" alt="fiberrails">
							</div>
							<div class="panel-body">
								<h4 class="heading">Fiber Rails Portal</h4>
								<p class="description">Create your company-specific portfolio and catalogs with prices and terms, and enhance tracking, global management and order processing.</p>
								<div class="text-center">
									<a href="<?php echo base_url(); ?>dashboard" class="btn btnRed">
		                                Go To Dashboard / Subscribe Now
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="panel panel-default">
							<div class="panel-heading scandiscImgBox">
								<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/services/scandisc%20main%20logo.png" alt="scandisc" width="158">
							</div>
							<div class="panel-body">
								<h4 class="heading">Scandisc Registry</h4>
								<p class="description">User Generated Content Distribution Platform developed to protect the right and royalty of independent artisans world wide.</p>
								<div class="text-center">
									<a href="<?php echo base_url(); ?>dashboard" class="btn btnRed">
		                                Go To Dashboard / Subscribe Now
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/services/silobank.png" alt="silobank" width="109">
							</div>
							<div class="panel-body">
								<h4 class="heading">Silo Bank</h4>
								<p class="description">You have earned the right to pay less for transactions between you and your customer, Try silo bank as an option for your next gen payment gateway.</p>
								<div class="text-center">
									<a href="<?php echo base_url(); ?>dashboard" class="btn btnRed">
		                                Go To Dashboard / Subscribe Now
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<?php $this->load->view('includes/main_footer_home'); ?>  
        <!-- jQuery Core library -->
        <script type="text/javascript" src="<?php echo main_asset_url(); ?>js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script type="text/javascript" src="<?php echo main_asset_url(); ?>js/bootstrap.min.js"></script>
        <!-- jQuery Validation Core JavaScript -->
        <script type="text/javascript" src="<?php echo main_asset_url(); ?>js/jquery.validate.min.js"></script>
        <!-- Custom JavaScript -->
        <script type="text/javascript" src="<?php echo main_asset_url(); ?>js/custom.js"></script>

		<script src="<?php echo base_url(); ?>js/jquery.toaster.js"></script>
		
	</body>
</html>


<script>
	function loggedin_successful(){
		$.toaster({ priority : 'success', title : 'Message', message : 'You are logged in successfully'});
	}
</script>


<?php
	$success_message='';
	$success_message=$this->session->flashdata('login_success_msg');
	if($success_message!=''){
		echo '<script type="text/javascript"> loggedin_successful(); </script>';
	}
	
?>
