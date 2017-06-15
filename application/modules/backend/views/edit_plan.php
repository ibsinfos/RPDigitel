
<script src="<?php echo backend_passport_url(); ?>media/main_vcard/plugins/ckeditor/ckeditor.js"></script>
<!-- page content -->
<div class="right_col" role="main">
	
	<?php
		
		if(isset($_GET['msg']))
		{
			
			$msg = $_GET['msg'];
			if($msg=="success")
			{
			?>
			
			<div class="alert alert-success alert-dismissible fade in" role="alert" onclick="ChangeUrl('Page1', '<?php echo base_url();?>add-project');">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<strong>Plan Added Successfully
				</div>
				
				<?php
					
				}
				if($msg=="exists")
				{
				?>
				
				<div class="alert alert-warning alert-dismissible fade in" role="alert" onclick="ChangeUrl('Page1', '<?php echo base_url();?>add-project');">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>
					<strong>This Plan Is Already Added
					</div>
					
					<?php
						
					}		
					
					if($msg=="invalid")
					{
					?>
					
					<div class="alert alert-danger alert-dismissible fade in" role="alert" onclick="ChangeUrl('Page1', '<?php echo base_url();?>add-project');">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
						</button>
						<strong>Please Enter Valid Data
						</div>
						
						<?php
							
						}		
						
						
						
					}
				?>
				
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Edit Plan</h3>
						</div>
						
						<div class="title_right">
							<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Edit Plan</h2>                  
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<?php 
										if ($this->session->flashdata('news_message')) {
											echo $this->session->flashdata('news_message');
											
										} 
									?>
									<form id="demo-form2" enctype="multipart/form-data"  method="post" action="<?php echo base_url()."edit-plan/".$plan_details['0']->id;?>" data-parsley-validate class="form-horizontal form-label-left">
										
										<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Plan Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input type="text" id="name" name="name" value="<?php echo $plan_details['0']->name;?>" class="form-control col-md-7 col-xs-12" >
												
												<input type="hidden" id="plan_id" name="plan_id" value="<?php echo $plan_details['0']->id;?>" class="form-control col-md-7 col-xs-12">
												
												<span style="color:red;" ><?php echo form_error('name'); ?></span>
											</div>
										</div>	
										
										
										<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Price <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												
												
												<input type="text" id="price" name="price" value="<?php echo $plan_details['0']->price;?>" class="form-control col-md-7 col-xs-12">
												
												<span style="color:red;" ><?php echo form_error('name'); ?></span>
											</div>
										</div>	
										
										
										<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Features <span class="required">*</span>
											</label>
											
											<div class="col-md-6 col-sm-6 col-xs-12">
												
												
												
												<table class="table table-striped" id='table_plan_features'>
												<thead>
													<tr>
														<th>Feature Name</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												
												<?php 
													 foreach($plan_features_list as $feature){
														
														echo "<tr  id='".$feature->id."'><td> <input type='hidden' name='feature[]' value='".$feature->id."'> ".$feature->description."</td><td><input type='button' value='X' onclick=\"delete_selected_feature('".$feature->id."')\" name='del_".$feature->id."' id='del_".$feature->id."'></td></tr>";
														
														// print_r($a);
													 }
													
													
														
														
												?>
												
													
												</tbody>
												<tfoot>
												<?php
													
														echo "<tr><td> <input type='text' name='add_new_feature[]' id='add_new_feature' value=''></td><td><input type='button' value='Add' onclick=\"add_feature()\" name='add_new' id='add_new'></td></tr>";
														?>
												</tfoot>
<!--												<tfoot>
													<tr>
														<th colspan="2" class="text-right">Total:</th>
														<th id="subcription_plans_total">0</th>
													</tr>
													
													<tr>
														<td colspan="2"></td>
														<td>
															<input type="text" name="pricing_plan_total" id="pricing_plan_total" value="0" hidden>
															<input type="submit" name="pricing_plan_submit" id="pricing_plan_submit" class="btn btnRed" value="Get Started">
															
														</td>
													</tr>
												</tfoot>-->
											</table>
											
											
											
												<span style="color:red;" ><?php echo form_error('name'); ?></span>
											</div>
										</div>	
										
										
										<div class="form-group">
											<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
												<!--<button class="btn btn-primary" type="reset">Reset</button>-->
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page content -->
			
			
			
			<script>
			
				CKEDITOR.replace('description');		
				
				
				function ChangeUrl(page, url) 
				{
					if (typeof (history.pushState) != "undefined") {
						var obj = {Page: page, Url: url};
						history.pushState(obj, obj.Page, obj.Url);
						} else {
						window.location.href = "homePage";
						// alert("Browser does not support HTML5.");
					}
				}
				
				
			</script>