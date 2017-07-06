<?php
	$system_theme       		=	$this->db->get_where('settings' , array('type'=>'frontend_theme'))->row()->description;
	$system_color_scheme  	=	$this->db->get_where('settings' , array('type'=>'theme_color_scheme'))->row()->description;
	$system_home_page_video =	$this->db->get_where('settings' , array('type'=>'home_page_video_code'))->row()->description;
?>

<!-- breadcrumb start -->
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo site_url('admin/dashboard');?>">
			<i class="fa fa-dashboard"></i>
			<?php echo get_phrase('dashboard'); ?>
		</a>
	</li>
	<li>
    <a href="<?php echo site_url('admin/front_end_settings');?>">
			<?php echo get_phrase('settings'); ?>
		</a>
  </li>
  <li class="active">
    <?php echo get_phrase('user_interface_settings'); ?>
  </li>
</ol>
<!-- breadcrumb end -->

<div class="row">
	<div class="col-md-6">

    <!-- User interface Changing Form -->
		<!-- panel containing the video add form  -->
		<div class="panel panel-primary" data-collapsed="0">
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('theme_settings'); ?>
				</div>
			</div>
			<!-- panel body -->
			<div class="panel-body">
				<!-- form start -->
				<?php echo form_open(site_url('admin/front_end_settings/update_user_interface'), array(
					'class' => 'form-groups form-horizontal', 'id' => 'front-end-settings-form', 'enctype' => 'multipart/form-data'
				)); ?>

        <div class="form-group">
          <label class="col-sm-3 control-label">
            <?php echo get_phrase('theme'); ?>
          </label>
          <div class="col-sm-9">
            <select class="selectboxit" name="theme" id = 'theme' required="">
              <option value=""><?php echo get_phrase('choose_a_theme');?></option>
              <option value="material" <?php if($system_theme == 'material') echo 'selected'; ?>><?php echo get_phrase('material');?></option>
            </select>
          </div>
        </div>

					<div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('color_scheme'); ?>
						</label>
						<div class="col-sm-9">
							<select class="selectboxit" name="color_scheme" id = 'color_scheme' required="">
								<option value=""><?php echo get_phrase('choose_a_color_scheme');?></option>
								<option value="primary" <?php if($system_color_scheme == 'primary') echo 'selected'; ?>><?php echo get_phrase('purple');?></option>
								<option value="success" <?php if($system_color_scheme == 'success') echo 'selected'; ?>><?php echo get_phrase('material_green');?></option>
								<option value="info" 		<?php if($system_color_scheme == 'info') echo 'selected'; ?>><?php echo get_phrase('material_blue');?></option>
								<option value="warning" <?php if($system_color_scheme == 'warning') echo 'selected'; ?>><?php echo get_phrase('material_yellow');?></option>
								<option value="danger"  <?php if($system_color_scheme == 'danger') echo 'selected'; ?>><?php echo get_phrase('material_red');?></option>
								<option value="rose"    <?php if($system_color_scheme == 'rose') echo 'selected'; ?>><?php echo get_phrase('pink');?></option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
							<div class="input-group">
								<button type="submit" class="btn btn-info btn-icon btn-sm icon-left submit_button" id = "update_user_interface_button">
									<?php echo get_phrase('update_user_interface'); ?>
									<i class="fa fa-check"></i>
								</button>
							</div>
						</div>
					</div>

				<?php echo form_close(); ?>
				<!-- form end -->
			</div>
		</div>

		<!-- Home page video uploading form -->
		<!-- panel containing the video add form  -->
		<div class="panel panel-primary" data-collapsed="0">
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('update_homepage_video'); ?>
				</div>
			</div>
			<!-- panel body -->
			<div class="panel-body">
				<!-- form start -->
				<?php echo form_open(site_url('admin/front_end_settings/home_page_video'), array(
					'class' => 'form-groups form-horizontal', 'id' => 'front-end-settings-form', 'enctype' => 'multipart/form-data'
				)); ?>

					<div class="form-group">
					<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('home_page_video'); ?></label>

						<div class="col-sm-9">
						 <select class="select2" name="home_page_video" required="required" id = 'home_page_video'>
							 <option value=""><?php echo get_phrase('choose_a_video'); ?></option>
								<?php $video_array = $this->db->get('video')->result_array();
											foreach ($video_array as $key):?>
											<option value="<?php echo $key['code'];?>" <?php if($key['code'] == $system_home_page_video) echo "selected";?>><?php echo $key['title'];?></option>
								<?php endforeach; ?>
						</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
							<div class="input-group">
								<button type="submit" class="btn btn-info btn-icon btn-sm icon-left submit_button" id = "home_page_video_button">
									<?php echo get_phrase('upload'); ?>
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

  <div class="col-md-6">

    <!-- Homepage Banner Uploading Form -->
    <!-- panel containing the video add form  -->
    <div class="panel panel-primary" data-collapsed="0">
      <!-- panel head -->
      <div class="panel-heading">
        <div class="panel-title">
          <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('update_homepage_banner'); ?>
        </div>
      </div>
      <!-- panel body -->
      <div class="panel-body">
        <!-- form start -->
        <?php echo form_open(site_url('admin/front_end_settings/home_page_banner'), array(
          'class' => 'form-groups form-horizontal', 'id' => 'front-end-settings-form', 'enctype' => 'multipart/form-data'
        )); ?>

          <div class="form-group">
          <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('home_page_banner'); ?></label>

            <div class="col-sm-5">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 100px;" data-trigger="fileinput">
                  <img src="<?php echo base_url('uploads/home_page/home.jpg'); ?>" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                <div>
                  <span class="btn btn-white btn-file">
                    <span class="fileinput-new">Select image</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="file" name="home_page_banner" id="home_page_banner" accept="image/*">
                  </span>
                  <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-9">
              <div class="input-group">
                <button type="submit" class="btn btn-info btn-icon btn-sm icon-left submit_button">
                  <?php echo get_phrase('upload'); ?>
                  <i class="fa fa-check"></i>
                </button>
              </div>
            </div>
          </div>
					<span class="col-md-offset-3 col-md-9" style="color: #388E3C;"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: #1B5E20;"></i> &nbsp;<?php echo get_phrase('we_prefer_1920_X_1080_pixel_(_16_:_9_)_resolution_photo'); ?></span>
        <?php echo form_close(); ?>
        <!-- form end -->
      </div>
    </div>
    <!-- panel containing the video add form -->
  </div>
</div>

<script type="text/javascript">
$('#home_page_video_button').click(function(){
  var home_page_video = $('#home_page_video').val();
  if(home_page_video === ''){
    toastr.error('<?php echo $this->session->flashdata('error_message');?>' , '<?php echo get_phrase('homepage_video_can_not_be_empty');?>');
  }
});
$('#update_user_interface_button').click(function(){
  var theme = $('#theme').val();
  var color_scheme = $('#color_scheme').val();
  if(theme === ''){
    toastr.error('<?php echo $this->session->flashdata('error_message');?>' , '<?php echo get_phrase('select_a_theme_first');?>');
  }
  if(color_scheme === ''){
    toastr.error('<?php echo $this->session->flashdata('error_message');?>' , '<?php echo get_phrase('select_a_color_scheme_first');?>');
  }
});
</script>
