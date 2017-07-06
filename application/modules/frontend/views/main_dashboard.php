
<section class="mainDashboardServices servicesPanelWrap">
    <div class="container">
		
		<div class="row" >
			
			<?php 
				
				foreach($services_menu as $header_menu){
					
					if($header_menu['service_id']==1){
						
						$css_classes="img-responsive";
						$img_width="";
						$img_height="";
						$img_div_class="";
						$service_description="Create your company-specific portfolio and catalogs with prices and terms, and enhance tracking, global management and order processing.";
						$service_link="fiberrails";
						$button_name="Subscribe Now";
						
						}else if($header_menu['service_id']==2){
						
						$img_width="177";
						$img_height="61";
						$img_div_class="websuitImgBox";
						$service_description="Our Saas Products Empower IT professionals to adapt to rapid change, utilise resource more
						efficiently and deliver stronger value to organizations.";
						
						$css_classes="img-responsive webSuiteImg";
						
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
						$img_width="100";
						$img_height="";
						$img_div_class="siloSDImgBox";
						$service_description="Simplify networking, domain and webhosting with a single secured solution that caters to Startup and small businesses at every stage of growth.";
						
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
						
						$img_width="158";
						$img_height="";
						$img_div_class="scandiscImgBox";
						$service_description="User Generated Content Distribution Platform developed to protect the right and royalty of independent artisans world wide.";
						$css_classes="img-responsive scanDiscImg";
						
						
						
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
						$img_width="136";
						$img_height="39";
						$img_div_class="passportImgBox";
						$service_description="Try or purchase our latest tools, apps and software to continuously enhance your infrastructure and maintain
						a competitive advantage.";
						
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
						$img_width="109";
						$img_height="";
						$img_div_class="";
						$service_description="You have earned the right to pay less for transactions between you and your customer, Try silo bank as an option for your next gen payment gateway.";
						$css_classes="img-responsive scanDiscImg";
						
						}else{
						$service_link = "";
						$css_classes="img-responsive";
						
					}
					
				?>
				
				<div class="col-md-4 col-sm-6">
					<div class="panel panel-default">
						
						<div class="panel-heading <?php echo $img_div_class;?>">
							<img class="img-responsive center-block" src="<?php echo main_asset_url().$header_menu['service_logo_path']?>" alt="<?php echo $header_menu['service_name'];?>" height="<?php echo $img_height;?>" width="<?php echo $img_width;?>">
						</div>
						
						<div class="panel-body">
							<h4 class="heading"><?php echo $header_menu['service_name'];?>
							</h4>
							
							<p class="description">
								<?php echo $service_description;?>
							</p>
							
							<div class="text-center">
								<a href="<?php echo base_url().$service_link;?>" class="btn btnRed"><?php echo $button_name;?></a>
							</div>
							
						</div>
						
					</div>
				</div>
				
			<?php } ?>
		</div>
		
	</div>
</section>


<script>
    function loggedin_successful() {
        $.toaster({priority: 'success', title: 'Message', message: 'You are logged in successfully'});
	}
</script>


<?php
	$success_message = '';
	$success_message = $this->session->flashdata('login_success_msg');
	if ($success_message != '') {
		echo '<script type="text/javascript"> loggedin_successful(); </script>';
	}
?>
