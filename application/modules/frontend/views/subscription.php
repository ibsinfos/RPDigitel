
<section class="subscribeHeroSection">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                <h4 class="heading">Launch Your Personal Silo Cloud Package</h4>
                <p>Enterprise Solutions built for Startups.</p>
                <a href="" class="btn btnRed">Add the Cloud to Your Bundle</a>
                <p class="viewMore">View more articles ><br>
				Sign up for a new merchant account</p>		
			</div>
		</div>
	</div>
</section>

<div class="subscribeShowPrice">
    <div class="container">
        <p>Show me prices based on:</p>
	</div>
</div>
<div class="subscribeRedStrip">
    <div class="container-fluid text-center">
        <p>Free Scandisc Activation when you have the RP Digital Bundle for Business Wireless plan. - save $49!</p>
	</div>
</div>
<section class="subscribePlanSection">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
					
					
                    <?php
						// $ser_count=0;
						
						$ser_count = 0;
						foreach ($services as $service) {
							/*
								if($service['service_name']=='WBS Business Suite'){
								$service_link='siloCloud';
							} */
						?>
                        <li role="presentation" class="<?php
							if ($ser_count == 0) {
								echo 'active';
							}
							?>"><a href="#<?php echo $service['category'] . '_tab'; ?>" aria-controls="<?php echo $service['category'] . '_tab'; ?>" role="tab" data-toggle="tab">
								<?php
                                    echo $service['service_name'];
								?></a></li>
								
								<?php
									$ser_count++;
								}
					?>
					
				</ul>
                <!-- Tab panes -->
                <div class="tab-content">
					
                    <?php
						$ser_tab_count = 0;
						foreach ($services as $service) {
							
							
							$plan_details = $this->common_model->getPlanDetails($service['service_id']);
							
							// echo "<pre>";
							// print_r($plan_details);
							// die();
						?>
						
                        <div role="tabpanel" class="tab-pane <?php
							if ($ser_tab_count == 0) {
								echo 'active';
							}
							?>" id="<?php echo $service['category'] . '_tab'; ?>">
                            <div class="row">
								
								
                                <?php
									$plan_count = 0;
									foreach ($plan_details as $plan_detail) {
										$plan_count++;
										// echo "<pre>";
										// print_r($plan_detail->name);
									?>
                                    <div class="col-sm-4">
                                        <div class="panel plan<?php echo $plan_count; ?>">
                                            <div class="panel-heading text-center">
                                                <h4 class="planName"><?php echo $plan_detail->name; ?></h4>
                                                <h4 class="planAmtWrap">$ <span class="amt"><?php echo $plan_detail->price; ?></span></h4>
											</div>
                                            <div class="panel-body">
                                                <ul class="list-unstyled typoList">
													
                                                    <?php
														$feature_details = $this->common_model->getFeatureDetails($plan_detail->features);
														foreach ($feature_details as $feature) {
															
															echo "<li>" . $feature->description . "</li>";
														}
													?>
													
                                                    <!--<li>Unlimited SMS</li>
													<li>E-Class Data 3-5G</li>-->
												</ul>
                                                <div class="text-center">
													
													<?php 
														
														
														// echo "<pre>";
														// print_r($purchased_plans);
														if(isset($plan_purchased_flag)){
															unset($plan_purchased_flag);
														}
														if(isset($plan_expired)){
															unset($plan_expired);
														}
														
														foreach ($purchased_plans as $purchased) {
															
															if($plan_detail->id==$purchased['plan_id']){
																
																$plan_purchased_flag=1;
																$today=date_create(date('Y-m-d'));
																$e_date=date_create($purchased['end_date']);
																
																$diff=date_diff($today,$e_date);
																$date_diff=$diff->format('%r%a days');;
																
																if($date_diff<0){
																	$plan_expired=1;
																}
																
																}else{
																// plan_purchased_flag unset
															}
															
														}
														
														// if(in_array($plan_detail->id,$purchased_plans)){
														if(isset($plan_purchased_flag)){
															
															if(isset($plan_expired)){
																
																
															?>
															<button class="btn btnRed choose_plan" onclick="add_plan( '<?php echo $plan_detail->id; ?>','<?php echo $service['category']; ?>', '<?php echo $plan_detail->name; ?>', '30 days', '<?php echo $plan_detail->price; ?>')" value="<?php echo $plan_detail->price; ?>" id="fiber_rails_portal_1">Renew Plan</button>
															
															<?php
																}else{
																
															?>
															<!--
															<a href="<?php //echo base_url().$service['url'];?>"><button class="btn btnRed choose_plan" id="fiber_rails_portal_1" >Go To Dashboard</button></a>
															-->
															
															<button class="btn btnRed choose_plan" id="fiber_rails_portal_1" disabled>Purchased Plan</button>
															
															<?php
															}													
															
															}else{
														?>
														
														<button class="btn btnRed choose_plan" onclick="add_plan( '<?php echo $plan_detail->id; ?>','<?php echo $service['category']; ?>', '<?php echo $plan_detail->name; ?>', '30 days', '<?php echo $plan_detail->price; ?>')" value="<?php echo $plan_detail->price; ?>" id="fiber_rails_portal_1">Choose Plan</button>
														<?php
														}
													?>		
													
												</div>
											</div>
										</div>
									</div>
									
								<?php } ?>
								
							</div>
							
						</div>
						
						
						<?php
							$ser_tab_count++;
						}
					?>
					
					
					
					
					
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<form id='form_subcription_plans' method="post" action="<?php echo base_url(); ?>check_out">
									<table class="table table-striped" id='table_subcription_plans'>
										<thead>
											<tr>
												<th>Plan Name</th>
												<th>Duration</th>
												<th width="200">Price</th>
											</tr>
										</thead>
										<tbody>
											
										</tbody>
										<tfoot>
											<tr>
												<th colspan="2" class="text-right">Total:</th>
												<th id="subcription_plans_total">0</th>
											</tr>
											
											<tr>
												<td colspan="2"></td>
												<td>
													<!--<a href="<?php //echo base_url();              ?>check_out" class="btn btnRed">Get Started</a>-->
													<input type="text" name="pricing_plan_total" id="pricing_plan_total" value="0" hidden>
													<input type="submit" name="pricing_plan_submit" id="pricing_plan_submit" class="btn btnRed" value="Get Started">
													
												</td>
											</tr>
										</tfoot>
									</table>
								</form>
							</div>
						</div>
					</div>
					
					
					
				</div>
			</div>
		</div>
		<div class="row wirelesServicesInfo">
			<div class="col-sm-12">
				<div class="text-center">
					<p class="rpDigitelLogo"><img src="<?php echo main_asset_url(); ?>images/subscription/rpdigitel.png"></p>
					<p class="whyRP">Learn Why RP Digi<span class="redText">tel</span> is Wireless Services</p>
					<p class="reImagine">RE-IMAGINED</p>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="imageBlock col-sm-2">
						<img src="<?php echo main_asset_url(); ?>images/subscription/phone.png" class="img-responsive">
					</div>
					<div class="col-sm-10">
						<p>RP Digitel is wireless done differently... Bring Your Own Phone, or Purchase one of ours... No matter what carrier GSM, CDMA or Unlocked, We've got a plan and a device that suits you.</p> 
						<a href="">Click to Get your Unlocked Sim Card</a>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="imageBlock col-sm-2">
						<img src="<?php echo main_asset_url(); ?>images/subscription/customerservices.png" class="img-responsive">
					</div>
					<div class="col-sm-10">
						<p>At RP Digitel, Customer service comes first. Our support team is USA based and is ready to assist you with any questions you may have about all services and products we offer 24 hours a day. </p>
						<a href="">Learn More about other Services!</a>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="imageBlock col-sm-2">
						<img src="<?php echo main_asset_url(); ?>images/subscription/wireless.png" class="img-responsive">
					</div>
					<div class="col-sm-10">
						<p>We are not just wireless, We are nationwide data services that expand coverage to both rural and metro communities in order to ensure complete customer satisfaction at a reduced cost. </p>
						<a href="">Learn about our Data Only Plans now!</a>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="imageBlock col-sm-2">
						<img src="<?php echo main_asset_url(); ?>images/subscription/winningplans.png" class="img-responsive">
					</div>
					<div class="col-sm-10">
						<p>RP Digital Communications Services has a wide variety of wireless plans, data services and cloud services that meets the needs of every customer, at a fraction of the cost. </p>
						<a href="">Visit our corporate site to learn more about the vision of RP Digital. </a>
					</div>
				</div>
			</div>
			<div class="col-sm-12 text-center">
				<p>Get the All New <strong>Scandisc UGC Media Package</strong> when you have the RP Digital Bundle for Business Wireless plan.</p>
				<button class="btn btnRed">Enter</button>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	
	
	var all_records = [];
	var fiber_flag = 0;
	function add_plan(plan_id,cat, name, duration, price) {
		
		// var all = [
		// ['fiber_plans','Fiber plan 1'],
		// ['fiber_plans','Fiber plan 2']
		// ['fiber_plans','Fiber plan 3']
		// ];
		
		// var fiber_plans=['Fiber plan 1','Fiber plan 2','Fiber plan 3'];
		
		// if(fiber_flag==0){
		// alert(name);
		// }
		
		// if((fiber_plans.indexOf(name) == -1)){ 
		// alert('ds');
		// }
		
		// alert(cat);
		
		
		if ((all_records.indexOf(name) == -1)) { //To check Duplicate
			
			// all_records.push(name);
			
			all_records.push({title: cat, link: name});
			
			// alert(JSON.stringify(all_records));
			
			// delete all_records['fiber'];
			
			
			// const index = all_records.indexOf('Fiber plan 3');
			// array.splice(index, 1);
			// alert(index);
			
			
			
			$("#table_subcription_plans > tbody tr#" + cat).remove();
			
			
			
			$("#table_subcription_plans > tbody").append("<tr id='" + cat + "'><td>" + name + "</td><td>" + duration + "</td><td class='plan_price'>" + price + " <input type='button' value='X' onclick=\"delete_selected_plan('" + cat + "')\" name='del_" + cat + "' id='del_" + cat + "'></td></tr>");
			
			/*AJAX Request to add plan start*/
			$.ajax({
				url: '<?php echo base_url(); ?>frontend/subscription/addToCart_Plan',
				method: 'post',
				async: false,
				data: {'plan_id':plan_id,'plan_cat': cat, 'plan_name': name, 'plan_duration': duration, 'plan_price': price},
				success: function (data) {
					
					// $("#project_portfolio").empty();
					// alert(data);
					// $("#billing_state").html(data);
					
				}
				
			});
			/*AJAX Request to add plan end*/
			
			
			var pre_total = $("#subcription_plans_total").text();
			
			
			var new_total = 0;
			$(".plan_price").each(function () {
				
				var single_plan_price = ($(this).html());
				// alert(strr);
				new_total = parseInt(new_total) + parseInt(single_plan_price);
			});
			
			
			// var new_total=parseInt(pre_total)+parseInt(price);
			
			$("#subcription_plans_total").text(parseInt(new_total));
			$("#pricing_plan_total").val(parseInt(new_total));
			
		}
		
		
		
	}
	
	
	function delete_selected_plan(cat) {
		
		$("#table_subcription_plans > tbody tr#" + cat).remove();
		
		
		
		var new_total = 0;
		$(".plan_price").each(function () {
			
			var single_plan_price = ($(this).html());
			new_total = parseInt(new_total) + parseInt(single_plan_price);
			
		});
		
		
		$("#subcription_plans_total").text(parseInt(new_total));
		$("#pricing_plan_total").val(parseInt(new_total));
		
		
		
		/*AJAX Request to remove plan start*/
		$.ajax({
			url: '<?php echo base_url(); ?>frontend/subscription/removeFromCart_Plan',
			method: 'post',
			async: false,
			data: {'plan_cat': cat},
			success: function (data) {
				
				// alert(data);
				
			}
			
		});
		/*AJAX Request to remove plan end*/
		
		
		
		
	}
	
</script>
