
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
				<strong>Project Added Successfully
				</div>
				
				<?php
					
				}
				if($msg=="exists")
				{
				?>
				
				<div class="alert alert-warning alert-dismissible fade in" role="alert" onclick="ChangeUrl('Page1', '<?php echo base_url();?>add-project');">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>
					<strong>This Project Is Already Added
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
							<h3>News</h3>
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
									<h2>Edit Slider Image</h2>                  
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<?php 
										if ($this->session->flashdata('news_message')) {
											echo $this->session->flashdata('news_message');
											
										} 
									?>
									<form id="demo-form2" enctype="multipart/form-data"  method="post" action="<?php echo base_url().'edit-slider/'.$news[0]['id'];  ?>" data-parsley-validate class="form-horizontal form-label-left">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cover Image 
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div id="image-holder"> 
													
												<?php
													if(!empty($news[0]['image']))  
													{
													?>
													<img src="<?php echo base_url().$news[0]['image']; ?>" class="thumb-image" />
												<?php } ?>
												</div>
												<input type="file" name="image" id="fileUpload" />
												<input type="hidden" id="id" name="id" value="<?php echo $news[0]['id']  ?>">
											</div>
										</div>									
										<div class="ln_solid"></div>
										<div class="form-group">
											<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
												<button class="btn btn-primary" type="reset">Reset</button>
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