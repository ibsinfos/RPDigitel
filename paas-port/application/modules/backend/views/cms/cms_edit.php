<!--main content start-->

<section id="main-content">

    <section class="wrapper">

        <!--booking form start-->

        <div class="row">

    		<div class="col-md-12">

                <section class="panel">
				
				<div class="panel-body bio-graph-info">
					<div class="row p-details">
					
						<form class="cmxform form-horizontal tasi-form" name="edit_cms_form" id="edit_cms_form" action="<?php echo base_url(); ?>backend/cms/editCMS/<?php echo $edit_id;?>" enctype="multipart/form-data" method="POST" >
						
						<input type="hidden" value="<?php echo $edit_id;?>">
						
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								  <div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
												Home Page Slider</a>
										</h4>
									</div>
									<div id="collapse1" class="panel-collapse collapse in">
										<section class="panel">
										 
										  <div class="panel-body">
											 
												 
												  <div class="form-group">
													  <label class="control-label col-lg-2">Slider 1 Title</label>
													  <div class="col-lg-10">
														  <input type="text" placeholder="" id="slider_title_1" name="slider_title_1" class="form-control" minlength="2" value="<?php echo $arrSliderData[0]['image1_title']; ?>">
														 
													  </div>
												  </div>
												  <div class="form-group">
													  <label class="control-label col-lg-2">Slider 1 description</label>
													  <div class="col-lg-10">
														<textarea class="form-control" id="slider_short_desciption_1" name="slider_short_desciption_1" minlength="2" ><?php echo $arrSliderData[0]['image1_description']; ?></textarea>
														  
														  
													  </div>
												  </div>

												 <div class="form-group">
													  <label class="control-label col-lg-2">Slider 1 Image</label>
													  <div class="col-lg-10">
														  <input type="file" placeholder="" name="slider_image_1" id="slider_image_1" class="form-control" accept="image/*">
														  <a href="<?php echo base_url().'uploads/slider/1366x555/'.$arrSliderData[0]['image1']; ?>" target="_blank"><?php echo $arrSliderData[0]['image1']; ?></a>
													  </div>
												  </div>
												  
												  <div class="form-group">
													  <label class="control-label col-lg-2">Slider 2 Title</label>
													  <div class="col-lg-10">
														  <input type="text" placeholder="" id="slider_title_2" name="slider_title_2" class="form-control"  minlength="2"  value="<?php echo $arrSliderData[0]['image2_title']; ?>"  >
														 
													  </div>
												  </div>
												  <div class="form-group">
													  <label class="control-label col-lg-2">Slider 2 description</label>
													  <div class="col-lg-10">
														<textarea class="form-control " id="slider_short_desciption_2" name="slider_short_desciption_2"  minlength="2"  ><?php echo $arrSliderData[0]['image2_description']; ?></textarea>
													  
													  </div>
												  </div>

												 <div class="form-group">
													  <label class="control-label col-lg-2">Slider 2 Image</label>
													  <div class="col-lg-10">
														  <input type="file" placeholder="" name="slider_image_2" id="slider_image_2" class="form-control" accept="image/*">
														  <a href="<?php echo base_url().'uploads/slider/1366x555/'.$arrSliderData[0]['image2']; ?>" target="_blank"><?php echo $arrSliderData[0]['image2']; ?></a>
													  </div>
												  </div>
												  
												  <div class="form-group">
													  <label class="control-label col-lg-2">Slider 3 Title</label>
													  <div class="col-lg-10">
														  <input type="text" placeholder="" id="slider_title_3" name="slider_title_3" class="form-control"  minlength="2"  value="<?php echo $arrSliderData[0]['image3_title']; ?>">
														 
													  </div>
												  </div>
												  <div class="form-group">
													  <label class="control-label col-lg-2">Slider 3 description</label>
													  <div class="col-lg-10">
														  
														  <textarea class="form-control " id="slider_short_desciption_3" name="slider_short_desciption_3" 
 minlength="2"  ><?php echo $arrSliderData[0]['image3_description']; ?></textarea>
													  </div>
												  </div>

												 <div class="form-group">
													  <label class="control-label col-lg-2">Slider 3 Image</label>
													  <div class="col-lg-10">
														  <input type="file" placeholder="" name="slider_image_3" id="slider_image_3" class="form-control" accept="image/*">
														  <a href="<?php echo base_url().'uploads/slider/1366x555/'.$arrSliderData[0]['image3']; ?>" target="_blank"><?php echo $arrSliderData[0]['image3']; ?></a>
													  </div>
												  </div>
												  
											 
										  </div>
										</section>
									</div>
								</div>	
								
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
												 Section 2</a>
										</h4>
									</div>
									<div id="collapse2" class="panel-collapse collapse">
										<section class="panel">
							 
							  <div class="panel-body">
									<div class="form-group ">
										<label for="ccomment" class="control-label col-lg-2">Description</label>
										<div class="col-lg-10">
										  <textarea class="ckeditor" id="productdescription" name="productdescription"  minlength="2" ><?php echo trim($arr_cms_details[0]['page_content']); ?></textarea>
										  
										</div>
									</div>
								</div>
							</section>
									</div>
								</div>		
								
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
												 How it Works</a>
										</h4>
									</div>
									<div id="collapse3" class="panel-collapse collapse">
										<section class="panel">
									  <header class="panel-heading">
										
									  </header>
									<div class="panel-body">
									 <div class="form-group">
										  <label class="control-label col-lg-2">Title</label>
										  <div class="col-lg-10">
											  <input type="text" placeholder="" id="section_title1" name="section_title1" class="form-control"  minlength="2"  value="<?php echo $arr_marketing[0]['section1_title']; ?>"  >
											 
										  </div>
									  </div>
									<div class="form-group">
										  <label class="control-label col-lg-2">Icon 1</label>
										  <div class="col-lg-10">
											  <input type="file" placeholder="" name="section_image_1" id="section_image_1" class="form-control" accept="image/*">
											   <a href="<?php echo base_url().'uploads/marketing/140x140/'.$arr_marketing[0]['section1_image']; ?>" target="_blank"><?php echo $arr_marketing[0]['section1_image']; ?></a>
										  </div>
									</div>
									
									 <div class="form-group">
										  <label class="control-label col-lg-2">Description</label>
										  <div class="col-lg-10">
											  <textarea class="ckeditor" id="section_desc_1" name="section_desc_1" minlength="2" ><?php echo trim($arr_marketing[0]['section1_description']); ?></textarea>
											  
										  </div>
									</div>
									
									<div class="form-group">
										  <label class="control-label col-lg-2">Icon 2</label>
										  <div class="col-lg-10">
											  <input type="file" placeholder="" name="section_image_2" id="section_image_2" class="form-control" accept="image/*" >
											  <a href="<?php echo base_url().'uploads/marketing/140x140/'.$arr_marketing[0]['section2_image']; ?>" target="_blank"><?php echo $arr_marketing[0]['section2_image']; ?></a>
										  </div>
									</div>
									
									 <div class="form-group">
										  <label class="control-label col-lg-2">Description</label>
										  <div class="col-lg-10">
											  <textarea class="ckeditor" id="section_desc_2" name="section_desc_2"  minlength="2" ><?php echo trim($arr_marketing[0]['section2_description']); ?></textarea>
											  
										  </div>
									</div>
									
									<div class="form-group">
										  <label class="control-label col-lg-2">Icon 3</label>
										  <div class="col-lg-10">
											  <input type="file" placeholder="" name="section_image_3" id="section_image_3" class="form-control" accept="image/*">
											  
											  <a href="<?php echo base_url().'uploads/marketing/140x140/'.$arr_marketing[0]['section3_image']; ?>" target="_blank" ><?php echo $arr_marketing[0]['section3_image']; ?></a>
										  </div>
									</div>
									
									 <div class="form-group">
										  <label class="control-label col-lg-2">Description</label>
										  <div class="col-lg-10">
											  <textarea class="ckeditor" id="section_desc_3" name="section_desc_3"  minlength="2"  ><?php echo trim($arr_marketing[0]['section3_description']); ?></textarea>
											  
										  </div>
									</div>
									  
								</div>
							</section>
									</div>
								</div>		
								
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
												 Section 4</a>
										</h4>
									</div>
									<div id="collapse4" class="panel-collapse collapse">
										<section class="panel">
							
							  <div class="panel-body">
									<div class="form-group ">
										<label for="ccomment" class="control-label col-lg-2">Description</label>
										<div class="col-lg-10">
										  <textarea class="ckeditor" id="marketing_content" name="marketing_content"  minlength="2"  ><?php echo trim($arr_cms_details[0]['marketing_description']); ?></textarea>
										  
										</div>
									</div>
									
									<!--<div class="form-group">
										  <label class="control-label col-lg-2">Link</label>
										  <div class="col-lg-10">
											  <input type="text" placeholder="" name="link" id="link" class="form-control" size="100"  value="<?php echo $arr_cms_details[0]['link']; ?>">
											  
										  </div>
									  </div>-->
									  
								</div>
							</section>
									</div>
								</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
											 Pricing Plan</a>
									</h4>
								</div>
								<div id="collapse5" class="panel-collapse collapse">
									<section class="panel">
							 
										 <div class="panel-body">
											<div class="form-group ">
												<label for="ccomment" class="control-label col-lg-2">Description</label>
												<div class="col-lg-10">
												  <textarea class="ckeditor" id="pricing_description" name="pricing_description"  minlength="2" ><?php echo trim($arr_cms_details[0]['pricing']); ?></textarea>
												  
												</div>
											</div>
										</div>
									</section>
									</div>
								</div>			
								
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
												Business Professional</a>
										</h4>
									</div>
									<div id="collapse6" class="panel-collapse collapse">
										<section class="panel">
							 
							  <div class="panel-body">
									<div class="form-group ">
										<label for="ccomment" class="control-label col-lg-2">Title</label>
										<div class="col-lg-10">
										  <textarea class="ckeditor" id="section4_title" name="section4_title"  minlength="2" ><?php echo $arr_business[0]['section4_title']; ?></textarea>
										  
										</div>
									</div>
									
									<div class="form-group">
										  <label class="control-label col-lg-2">Image 1</label>
										  <div class="col-lg-10">
											  <input type="file" placeholder="" name="section4_image_1" id="section4_image_1" class="form-control" accept="image/*">
											  <a href="<?php echo base_url().'uploads/business/104x104/'.$arr_business[0]['section4_image1']; ?>" target="_blank"><?php echo $arr_business[0]['section4_image1']; ?></a>
										  </div>
									</div>
									
									<div class="form-group">
										  <label class="control-label col-lg-2">Image 2</label>
										  <div class="col-lg-10">
											  <input type="file" placeholder="" name="section4_image_2" id="section4_image_2" class="form-control" accept="image/*">
											   <a href="<?php echo base_url().'uploads/business/104x104/'.$arr_business[0]['section4_image2']; ?>" target="_blank"><?php echo $arr_business[0]['section4_image2']; ?></a>
										  </div>
									</div>
									
									<div class="form-group">
										  <label class="control-label col-lg-2">Image 3</label>
										  <div class="col-lg-10">
											  <input type="file" placeholder="" name="section4_image_3" id="section4_image_3" class="form-control" accept="image/*">
											   <a href="<?php echo base_url().'uploads/business/104x104/'.$arr_business[0]['section4_image3']; ?>" target="_blank"><?php echo $arr_business[0]['section4_image3']; ?></a>
										  </div>
									</div>
									
									<div class="form-group">
										  <label class="control-label col-lg-2">Image 4</label>
										  <div class="col-lg-10">
											  <input type="file" placeholder="" name="section4_image_4" id="section4_image_4" class="form-control" accept="image/*">
											  <a href="<?php echo base_url().'uploads/business/104x104/'.$arr_business[0]['section4_image4']; ?>" target="_blank"><?php echo $arr_business[0]['section4_image4']; ?></a>
										  </div>
									</div>
									<div class="form-group">
										  <label class="control-label col-lg-2">Image 5</label>
										  <div class="col-lg-10">
											  <input type="file" placeholder="" name="section4_image_5" id="section4_image_5" class="form-control" accept="image/*">
											  <a href="<?php echo base_url().'uploads/business/104x104/'.$arr_business[0]['section4_image5']; ?>" target="_blank"><?php echo $arr_business[0]['section4_image5']; ?></a>
										  </div>
									</div>
									<div class="form-group">
										  <label class="control-label col-lg-2">Image 6</label>
										  <div class="col-lg-10">
											  <input type="file" placeholder="" name="section4_image_6" id="section4_image_6" class="form-control" accept="image/*" >
											  <a href="<?php echo base_url().'uploads/business/104x104/'.$arr_business[0]['section4_image6']; ?>" target="_blank"><?php echo $arr_business[0]['section4_image6']; ?></a>
										  </div>
									</div>
									
									<div class="form-group ">
										<label for="ccomment" class="control-label col-lg-2">Toll Free Number</label>
										<div class="col-lg-10">
										  <input type="text" placeholder="" name="toll_free_number" id="toll_free_number" class="form-control" size="100"  value="<?php echo $arr_cms_details[0]['toll_free_number']; ?>">
										  
										</div>
									</div>
								</div>
							</section>
									</div>
								</div>
								

								<section class="panel">

								<div class="panel-body">

									<div class=" form">
											<div class="form-group">

												<div class="col-lg-offset-2 col-lg-5">

													<button class="btn btn-danger" type="submit" name="btn_edit" id="btn_edit" >Update</button>

												</div>

											</div>

										</form>

									</div>



								</div>



							</section>

						</div>
						</form>
					</div>
				</div>
				
        <!--booking form end-->
				</section>

            </div>
    </section>

</section>
<style>
    .danger, .mandatory {

        color: #BD4247;

    }

    .alert{

        padding:8px 0px;

    }

</style>

<script src="<?php echo base_url(); ?>media/backend/assets/ckeditor/ckeditor.js"></script>
<!--main content end--><!-- js placed at the end of the document so the pages load faster -->   <!--<script src="js/jquery.js"></script>-->
<!--common script for all pages-->
<script type="text/javascript" language="javascript" src="<?php echo asset_url(); ?>backend/assets/advanced-datatable/media/js/jquery.js"></script>
<script src="<?php echo asset_url(); ?>backend/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo asset_url(); ?>backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo asset_url(); ?>backend/js/jquery.scrollTo.min.js"></script>
<!--<script src="<?php echo asset_url(); ?>backend/js/jquery.nicescroll.js" type="text/javascript"></script>-->
<script src="<?php echo asset_url(); ?>backend/js/respond.min.js" ></script>
<script type="text/javascript" language="javascript" src="<?php echo asset_url(); ?>backend/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>


<!--common script for all pages-->
<script src="<?php echo asset_url(); ?>backend/js/common-scripts.js"></script>

<script src="<?php echo asset_url(); ?>backend/js/advanced-form-components.js"></script>

<script type="text/javascript" src="<?php echo asset_url(); ?>backend/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>backend/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script>
    $(document).ready(function () {
        $('#example1').DataTable();
    });
</script>
<!--main content end-->