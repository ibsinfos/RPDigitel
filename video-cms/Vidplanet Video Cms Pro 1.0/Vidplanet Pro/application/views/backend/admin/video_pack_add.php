17<!-- breadcrumb start -->
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo site_url('admin/dashboard');?>">
			<i class="fa fa-dashboard"></i>
			<?php echo get_phrase('dashboard'); ?>
		</a>
	</li>
	<li>
    <a href="#">
			<?php echo get_phrase('videos'); ?>
		</a>
  </li>
  <li class="active">
    <?php echo get_phrase('add_video_pack'); ?>
  </li>
</ol>
<!-- breadcrumb end -->

<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<!-- panel containing the video add form  -->
		<div class="panel panel-primary" data-collapsed="0">
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('add_video_pack'); ?>
				</div>
			</div>
			<!-- panel body -->
			<div class="panel-body">
				<!-- form start -->
				<?php echo form_open(site_url('admin/video_pack_add/add_video_pack'), array(
					'class' => 'form-groups form-horizontal', 'id' => 'video-pack-add-form', 'enctype' => 'multipart/form-data'
				)); ?>
          <div class="form-group">
            <label class="col-sm-3 control-label">
              <?php echo get_phrase('title'); ?>
            </label>
            <div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-video-camera"></i></span>
                <input type="text" class="form-control" name="video_pack_title" id="video_pack_title"
                  value="" placeholder="<?php echo get_phrase('video_pack_title');?>" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">
              <?php echo get_phrase('description'); ?>
            </label>
            <div class="col-sm-9">

                <textarea type="text" class="form-control" name="video_pack_description" id="video_pack_description"
                  placeholder="<?php echo get_phrase('video_pack_description');?>" required rows="4" cols="50" maxlength="300" style="resize: vertical;"></textarea>
            </div>
          </div>

					<?php
						$categories_array = $this->db->get('category')->result_array();
					 ?>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('category'); ?>
						</label>
						<div class="col-sm-9">
							<select class="select2" name="video_category" id = 'video_category' required="">
								<option value=""><?php echo get_phrase('choose_a_category'); ?></option>
								<?php foreach ($categories_array as $key):?>
									<option value="<?php echo $key['code'];?>"><?php echo $key['title']; ?></option>
							  <?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">
							<?php echo get_phrase('premium'); ?>
						</label>

						<div class="col-sm-8">
							<div class="checkbox checkbox-replace color-blue">
								<input type="checkbox" name="premium" id="premium" value = 1 onclick="show_price_field()">
							</div>
						</div>
					</div>

          <div class="form-group price_field" style="display: none;">
            <label class="col-sm-3 control-label">
              <?php echo get_phrase('video_pack_price'); ?>
            </label>
            <div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <input type="text" class="form-control" name="video_pack_price" id="video_pack_price"
                  value="" placeholder="<?php echo get_phrase('video_pack_price');?>">
              </div>
            </div>
          </div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">
							<?php echo get_phrase('featured'); ?>
						</label>

						<div class="col-sm-8">
							<div class="checkbox checkbox-replace color-blue">
								<input type="checkbox" name="featured" id="featured" value = 1>
							</div>
						</div>
					</div>

					<div class="form-group">
					<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('video_pack_thumbnail'); ?></label>

						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 200px; height: 117px;" data-trigger="fileinput">
									<img src="<?php echo base_url('assets/default_thumbnail.jpg'); ?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 138px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="video_pack_thumbnail" id="video_pack_thumbnail" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
						</div>

					</div>

					<div class="form-group">
					<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('video_pack_banner'); ?></label>

						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 261px; height: 150px;" data-trigger="fileinput">
									<img src="<?php echo base_url('assets/default_banner.jpg'); ?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 261px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="video_pack_banner" id="video_pack_banner" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
						</div>
						<span class="col-md-offset-3 col-md-9" style="color: grey;"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: #1B5E20;"></i> &nbsp;<?php echo get_phrase('we_prefer_1920_X_1080_pixel_(_16_:_9_)_resolution_photo'); ?></span>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
							<div class="input-group">
								<button type="submit" class="btn btn-info btn-icon btn-sm icon-left submit_button">
									<?php echo get_phrase('add_video_pack'); ?>
									<i class="fa fa-check"></i>
								</button>
							</div>
						</div>
					</div>

				<?php echo form_close(); ?>
				<!-- form end -->
			</div>
		</div>
		<!-- panel containing the video add form -->
	</div>
</div>

<script type="text/javascript">
function show_price_field(){

  if ($('#premium').is(":checked"))
  {
    $('.price_field').slideDown();
  }
  else{
    $('.price_field').slideUp();
  }
}
	$('.submit_button').click(function(){
		var video_category = $('#video_category').val();
		if(video_category ===''){
			toastr.error('<?php echo $this->session->flashdata('error_message');?>' , '<?php echo get_phrase('select_video_category');?>');
		}
		if ($('#premium').is(":checked"))
		{
			$('#video_pack_price').attr('required', 'required');
		}
	});

</script>
