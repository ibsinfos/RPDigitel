<!-- page content -->
<div class="right_col" role="main">
	<div class="row dashboardServicesWrap">
		<!--
			<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			<img class="img-responsive" src="<?php echo base_url(); ?>media/backend/images/services/silo-sd.png" alt="silo">
			</div>
			<div class="panel-body">
			<h4 class="heading">Work Brakdown Structure Suite</h4>
			<p class="description">Not so bold details about the products</p>
			<a href="" class="btn btnRed">Read More</a>
			</div>
			</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			<img class="img-responsive" src="<?php echo base_url(); ?>media/backend/images/services/silo-cloud.png" alt="silo-cloud">
			</div>
			<div class="panel-body">
			<h4 class="heading">Work Brakdown Structure Suite</h4>
			<p class="description">Not so bold details about the products</p>
			<a href="" class="btn btnRed">Read More</a>
			</div>
			</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			<img class="img-responsive" src="<?php echo base_url(); ?>media/backend/images/services/sidoSD.png" alt="sidoSD">
			</div>
			<div class="panel-body">
			<h4 class="heading">Work Brakdown Structure Suite</h4>
			<p class="description">Not so bold details about the products</p>
			<a href="" class="btn btnRed">Read More</a>
			<img class="smallImg" src="<?php echo base_url(); ?>media/backend/images/services/Silo_Card.png" alt="Silo_Card" width="55">
			</div>
		</div>
		</div>
		
		
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<img class="img-responsive" src="<?php echo base_url(); ?>media/backend/images/services/scandisc.png" alt="scandisc">
				</div>
				<div class="panel-body">
					<h4 class="heading">Work Brakdown Structure Suite</h4>
					<p class="description">Not so bold details about the products</p>
					<a href="" class="btn btnRed">Read More</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading rpDigitalImgBox">
					<img class="img-responsive" src="<?php echo base_url(); ?>media/backend/images/services/RPDIGITAL.png" alt="RPDIGITAL" width="165">
				</div>
				<div class="panel-body">
					<h4 class="heading">Work Brakdown Structure Suite</h4>
					<p class="description">Not so bold details about the products</p>
					<a href="" class="btn btnRed">Read More</a>
					<img class="smallImg" src="<?php echo base_url(); ?>media/backend/images/services/RP_Digitel.png" alt="RP_Digitel" width="80">
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<img class="img-responsive" src="<?php echo base_url(); ?>media/backend/images/services/firber-rails.png" alt="fiberrails">
				</div>
				<div class="panel-body">
					<h4 class="heading">Work Brakdown Structure Suite</h4>
					<p class="description">Not so bold details about the products</p>
					<a href="" class="btn btnRed">Read More</a>
					<img class="smallImg" src="<?php echo base_url(); ?>media/backend/images/services/Silo_Fiber_Rails.png" alt="Silo_Fiber_Rails" width="75">
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<img class="img-responsive" src="<?php echo base_url(); ?>media/backend/images/services/WBS-SUITE.png" alt="WBS-SUITE">
				</div>
				<div class="panel-body">
					<h4 class="heading">Work Brakdown Structure Suite</h4>
					<p class="description">Not so bold details about the products</p>
					<a href="" class="btn btnRed">Read More</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading passportImgBox">
					<img class="img-responsive" src="<?php echo base_url(); ?>media/backend/images/services/passport.png" alt="passport" width="200">
				</div>
				<div class="panel-body">
					<h4 class="heading">Work Brakdown Structure Suite</h4>
					<p class="description">Not so bold details about the products</p>
					<a href="" class="btn btnRed">Read More</a>
					<img class="smallImg" src="<?php echo base_url(); ?>media/backend/images/services/Silo_Secured_Data.png" alt="Silo_Secured_Data" width="35">
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<img class="img-responsive" src="<?php echo base_url(); ?>media/backend/images/services/FR_Server.png" alt="FR-Server">
				</div>
				<div class="panel-body">
					<h4 class="heading">Work Brakdown Structure Suite</h4>
					<p class="description">Not so bold details about the products</p>
					<a href="" class="btn btnRed">Read More</a>
				</div>
			</div>
		</div>
		-->
		
		
		
		
		<?php 
			
			function check_subscription($service_id,$user_services_array){
				if(in_array($service_id,$user_services_array)){
					return true;
				}else{ return false; }
			}
			
			// print_r($services_menu);
			// $services_menu=array();
			
			foreach($services_menu as $header_menu){
				
				if($header_menu['service_id']==1){
					
					$css_classes="img-responsive";
					$img_width="";
					$img_width_footer="75";
					$img_height="";
					$img_div_class="";
					$service_description="Create your company-specific portfolio and catalogs with prices and terms, and enhance tracking, global management and order processing.";
					$service_link="fiberrails";
					$button_name="Subscribe Now";
					$service_logo=base_url()."media/backend/images/services/firber-rails.png";
					$service_logo_footer=base_url()."media/backend/images/services/Silo_Fiber_Rails.png";
					
					}else if($header_menu['service_id']==2){
					
					$img_width="";
					$img_width_footer="";
					$img_height="";
					$img_div_class="websuitImgBox";
					$service_description="Our Saas Products Empower IT professionals to adapt to rapid change, utilise resource more
					efficiently and deliver stronger value to organizations.";
					
					$css_classes="img-responsive webSuiteImg";
					$service_logo=base_url()."media/backend/images/services/WBS-SUITE.png";
					$service_logo_footer="";
					
					if ($this->session->userdata('member_service_remaining_days')) {
						if ($this->session->userdata('member_service_remaining_days') < 0) {
							
							$service_link = "wbs_suite";
							$button_name="Subscribe Now";
							} else {
							$service_link = "crm/login";
							$button_name="Go To Dashboard";
						}
						} else if ($this->session->userdata('crm_subscription')) {
						$service_link = "crm/login";
						$button_name="Go To Dashboard";
						} else {
						$service_link = "wbs_suite";
						$button_name="Subscribe Now";
					}
					
					}else if($header_menu['service_id']==3){
					
					$css_classes="img-responsive siloSDImg";
					$img_width="";
					$img_width_footer="";
					$img_height="";
					$img_div_class="siloSDImgBox";
					$service_description="Simplify networking, domain and webhosting with a single secured solution that caters to Startup and small businesses at every stage of growth.";
					$service_logo=base_url()."media/backend/images/services/silo-cloud.png";
					$service_logo_footer="";
					
					if (!$this->session->userdata('is_logged_in')){
						$service_link = "silo_sd";
						$button_name="Subscribe Now";
						}else{
						
						if(check_subscription($header_menu['service_id'],$user_services_array)){
							$service_link = "dashboard";
							$button_name="Go To Dashboard";
							}else{
							$service_link = "silo_sd";
							$button_name="Subscribe Now";
						}
						
					}
					
					
					}else if($header_menu['service_id']==4){
					
					$img_width="";
					$img_width_footer="55";
					$img_height="";
					$img_div_class="scandiscImgBox";
					$service_description="User Generated Content Distribution Platform developed to protect the right and royalty of independent artisans world wide.";
					$css_classes="img-responsive scanDiscImg";
					$service_logo=base_url()."media/backend/images/services/sidoSD.png";
					$service_logo_footer=base_url()."media/backend/images/services/Silo_Card.png";
					
					
					
					if (!$this->session->userdata('is_logged_in')){
						$service_link = "silo_sd";
						$button_name="Subscribe Now";
						}else{
						
						if(check_subscription($header_menu['service_id'],$user_services_array)){
							$service_link = "dashboard";
							$button_name="Go To Dashboard";
							}else{
							$service_link = "silo_sd";
							$button_name="Subscribe Now";
						}
						
					}
					
					
					}else if($header_menu['service_id']==5){
					
					$css_classes="img-responsive paasPortImg";
					$img_width="200";
					$img_width_footer="35";
					$img_height="";
					$img_div_class="passportImgBox";
					$service_description="Try or purchase our latest tools, apps and software to continuously enhance your infrastructure and maintain a competitive advantage.";
					$service_logo=base_url()."media/backend/images/services/passport.png";
					$service_logo_footer=base_url()."media/backend/images/services/Silo_Secured_Data.png";
					
					if (!$this->session->userdata('is_logged_in')){
						$service_link = "paasport";
						$button_name="Subscribe Now";
						}else{
						
						if(check_subscription($header_menu['service_id'],$user_services_array)){
							$service_link = "paas-port/dashboard";
							$button_name="Go To Dashboard";
							}else{
							$service_link = "paasport";
							$button_name="Subscribe Now";
						}
						
						
					}
					
					}else if($header_menu['service_id']==6){
					
					
					$service_link = "silo_bank";
					$button_name="Subscribe Now";
					$css_classes="img-responsive siloBankImg";
					$img_width="";
					$img_width_footer="";
					$img_height="";
					$img_div_class="";
					$service_description="You have earned the right to pay less for transactions between you and your customer, Try silo bank as an option for your next gen payment gateway.";
					$css_classes="img-responsive scanDiscImg";
					$service_logo=base_url()."media/backend/images/services/FR_Server.png";
					$service_logo_footer="";
					
					}else{
					$service_link = "";
					$css_classes="img-responsive";
					
				}
				
			?>
			
			
			
			
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<img class="img-responsive" src="<?php echo $service_logo; ?>" alt="<?php echo $header_menu['service_name'];?>" width="<?php echo $img_width;?>>
						</div>
						<div class="panel-body">
						<h4 class="heading"><?php echo $header_menu['service_name'];?></h4>
						<p class="description"><?php echo $service_description;?></p>
						
						<a href="<?php echo base_url().$service_link;?>" class="btn btnRed">
							<?php echo $button_name;?>
						</a>
						
						<img class="smallImg" src="<?php echo $service_logo_footer; ?>" alt="<?php if($service_logo_footer!=''){echo $header_menu['service_name']; } ?>" width="<?php echo $img_width_footer;?>">
					</div>
				</div>
			</div>
			
			
			
			
			
		<?php } ?>
		
		
		
		
		
		
		
		
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading rpDigitalImgBox">
					<img class="img-responsive" src="<?php echo base_url(); ?>media/backend/images/services/RPDIGITAL.png" alt="RPDIGITAL" width="165">
				</div>
				<div class="panel-body">
					<h4 class="heading">Work Brakdown Structure Suite</h4>
					<p class="description">Not so bold details about the products</p>
					<a href="<?php echo base_url()."main_dashboard";?>" class="btn btnRed">Read More</a>
					<img class="smallImg" src="<?php echo base_url(); ?>media/backend/images/services/RP_Digitel.png" alt="RP_Digitel" width="80">
				</div>
			</div>
		</div>
		
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<img class="img-responsive" src="<?php echo base_url(); ?>media/backend/images/services/silo-sd.png" alt="silo">
				</div>
				<div class="panel-body">
					<h4 class="heading">Work Brakdown Structure Suite</h4>
					<p class="description">Not so bold details about the products</p>
					<a href="" class="btn btnRed">Read More</a>
				</div>
			</div>
		</div>
		
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<img class="img-responsive" src="<?php echo base_url(); ?>media/backend/images/services/scandisc.png" alt="scandisc">
				</div>
				<div class="panel-body">
					<h4 class="heading">Work Brakdown Structure Suite</h4>
					<p class="description">Not so bold details about the products</p>
					<a href="http://54.209.190.106/landingpage/" class="btn btnRed">Go To Site Builder</a>
				</div>
			</div>
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	</div>
	
	<div class="row dashboardServicesBottom">
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-3 col-xs-12">
							<img class="img-responsive" src="<?php echo base_url(); ?>media/backend/images/services/members.png" alt="members">
						</div>
						<div class="col-sm-9">
							<h4 class="heading">Work Brakdown Structure Suite</h4>
							<p class="description">Not so bold details about the products</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-3 col-xs-12">
							<img class="img-responsive siloSDImg" src="<?php echo base_url(); ?>media/backend/images/services/SIloSDS.png" alt="SIloSDS">
						</div>
						<div class="col-sm-9">
							<h4 class="heading">Work Brakdown Structure Suite</h4>
							<p class="description">Not so bold details about the products</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-3 col-xs-12">
							<img class="img-responsive siloSDRailImg" src="<?php echo base_url(); ?>media/backend/images/services/SiloRails.png" alt="SiloRails">
						</div>
						<div class="col-sm-9">
							<h4 class="heading">Work Brakdown Structure Suite</h4>
							<p class="description">Not so bold details about the products</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>