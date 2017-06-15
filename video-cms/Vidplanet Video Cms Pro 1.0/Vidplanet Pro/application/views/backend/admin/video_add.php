<!-- breadcrumb start -->
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo site_url('admin/dashboard');?>">
			<i class="fa fa-dashboard"></i>
			<?php echo get_phrase('dashboard'); ?>
		</a>
	</li>
	<li>
    <a href="<?php echo site_url('admin/videos');?>">
			<?php echo get_phrase('videos'); ?>
		</a>
  </li>
  <li class="active">
    <?php echo get_phrase('add_new_video'); ?>
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
					<i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('add_video'); ?>
				</div>
			</div>
			<!-- panel body -->
			<div class="panel-body">
				<!-- form start -->
				<?php echo form_open(site_url('admin/video_add/add_video'), array(
					'class' => 'form-groups form-horizontal', 'id' => 'video-add-form', 'enctype' => 'multipart/form-data'
				)); ?>

					<div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('video_source'); ?>
						</label>
						<div class="col-sm-9">
							<select name="source" class="selectboxit" onchange="handle_video_source(this.value)" id = 'video_source' required="required">
								<option value=""><?php echo get_phrase('select_video_source'); ?></option>
								<option value="1">YouTube</option>
								<option value="2"><?php echo get_phrase('video_file'); ?></option>
							</select>
						</div>
					</div>
					<!-- holder for youtube embed url input -->
					<div id="embed_url_input_holder">
						<div class="form-group">
	          	<label class="col-sm-3 control-label">
	              <?php echo get_phrase('embed_url'); ?>
	            </label>
	          	<div class="col-sm-9">
	          		<div class="input-group">
	          			<span class="input-group-addon"><i class="fa fa-youtube"></i></span>
	          			<input type="text" class="form-control" name="embed_url" id="embed_url"
	                  placeholder="Youtube <?php echo get_phrase('embed_url');?>" >
									<span class="input-group-btn">
										<button class="btn btn-primary" type="button" onclick="validate_youtube_embed_url()">
											<i class="fa fa-check"></i>&nbsp; <?php echo get_phrase('validate'); ?>
										</button>
									</span>
	          		</div>
	          	</div>
	          </div>
					</div>

					<!-- holder for success response of embed url -->
					<div id="url_response_holder"></div>

					<!-- holder for video file inputs -->
					<div id="video_file_input_holder">

						<div class="form-group">
						  <label class="col-sm-3 control-label">
						    <?php echo get_phrase('video_file_link'); ?>
						  </label>
						  <div class="col-sm-9">
						    <div class="input-group">
						      <span class="input-group-addon"><i class="fa fa-video-camera"></i></span>
						      <input type="text" class="form-control" name="video_file_url_mp4" id="video_file_url_mp4"
						        value="" placeholder="https://example.com/videos/video.mp4" >
									<span class="input-group-addon">mp4</span>
						    </div>
						  </div>
						</div>

						<div class="form-group">
						  <label class="col-sm-3 control-label"></label>
						  <div class="col-sm-9">
						    <div class="input-group">
						      <span class="input-group-addon"><i class="fa fa-video-camera"></i></span>
						      <input type="text" class="form-control" name="video_file_url_webm" id="video_file_url_webm"
						        value="" placeholder="https://example.com/videos/video.webm" >
									<span class="input-group-addon">webm</span>
						    </div>
						  </div>
						</div>

						<div class="form-group">
						  <label class="col-sm-3 control-label"></label>
						  <div class="col-sm-9">
						    <div class="input-group">
						      <span class="input-group-addon"><i class="fa fa-video-camera"></i></span>
						      <input type="text" class="form-control" name="video_file_url_ogg" id="video_file_url_ogg"
						        value="" placeholder="https://example.com/videos/video.ovg" >
									<span class="input-group-addon">ogg</span>
						    </div>
						  </div>
						</div>

						<div class="form-group">
						  <label class="col-sm-3 control-label">
						    <?php echo get_phrase('title'); ?>
						  </label>
						  <div class="col-sm-9">
						    <div class="input-group">
						      <span class="input-group-addon"><i class="fa fa-circle"></i></span>
						      <input type="text" class="form-control" name="video_title" id="video_title"
						        value="" placeholder="<?php echo get_phrase('video_title');?>" >
						    </div>
						  </div>
						</div>

						<div class="form-group">
						  <label class="col-sm-3 control-label">
						    <?php echo get_phrase('description'); ?>
						  </label>
						  <div class="col-sm-9">
						    <textarea rows="8" class="form-control" name="video_description" id="video_description" style="resize: vertical;" maxlength="250"></textarea>
						  </div>
						</div>

						<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('video_thumbnail'); ?></label>

							<div class="col-sm-5">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 261px; height: 150px;" data-trigger="fileinput">
										<img src="<?php echo base_url('assets/default_banner.jpg'); ?>" width: '200px' height: '100px' alt="...">
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
									<div>
										<span class="btn btn-white btn-file">
											<span class="fileinput-new">Select image</span>
											<span class="fileinput-exists">Change</span>
											<input type="file" name="video_thumbnail" id="video_thumbnail" accept="image/*">
										</span>
										<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
						  <label class="col-sm-3 control-label">
						    <?php echo get_phrase('duration'); ?>
						  </label>
						  <div class="col-sm-9">
						    <div class="input-group">
						      <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						      <input type="text" class="form-control" name="video_duration" id="video_duration"
						        value="" placeholder="<?php echo strtolower(get_phrase('hh:mm:ss'));?>" >
						    </div>
						  </div>
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
									<option value="<?php echo $key['code'];?>" <?php if($key['code'] == $default_video_category) echo 'selected'; ?> ><?php echo $key['title']; ?></option>
							  <?php endforeach; ?>
							</select>
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
						<label for="field-1" class="col-sm-3 control-label">
							<?php echo get_phrase('within_a_pack'); ?>
						</label>

						<div class="col-sm-8">
							<div class="checkbox checkbox-replace color-blue">
								<input type="checkbox" name="within_a_pack" id="within_a_pack" value = 1 <?php if($default_video_pack != '') echo 'checked';?>>
							</div>
						</div>
					</div>

					<div class="form-group video_pack_list" style="display: <?php if($default_video_pack == '') echo 'none';?>;">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('video_pack'); ?>
						</label>
						<div class="col-sm-9">
							<select name="video_pack" class="select2" id = 'video_pack'>
								<option value=""><?php echo get_phrase('select_video_pack'); ?></option>
								<?php
									$video_pack = $this->db->get('video_pack')->result_array();
									foreach ($video_pack as $key):?>
									<option value="<?php echo $key['code']; ?>" <?php if($key['code'] == $default_video_pack) echo 'selected';?>><?php echo $key['title']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
							<div class="input-group">
								<button type="submit" class="btn btn-info btn-icon btn-sm icon-left submit_button">
									<?php echo get_phrase('add_video'); ?>
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

	$(document).ready(function() {
		// hide the youtube embed url input field
		$('#embed_url_input_holder').hide();
		// hide the video file inputs holder
		$('#video_file_input_holder').hide();
	});

	//method for handling the video source change by selectmenu
	function handle_video_source(source) {
		if (source == 1) {
			$('#video_file_input_holder').hide();
			$('#embed_url_input_holder').fadeIn('slow');

		}
		else if (source == 2) {
			$('#embed_url_input_holder').hide();
			$('#url_response_holder').empty();
			$('#video_file_input_holder').fadeIn('slow');
			$('#embed_url').val('');
		}
		else{
			$('#embed_url_input_holder').hide();
			$('#video_file_input_holder').hide();
		}
	}

	// method for validating url
	function validate_youtube_embed_url() {
		url = $('#embed_url').val();
		if (url == '') {
			toastr.error('<?php echo get_phrase('embed_url_can_not_be_blank');?>', '<?php echo get_phrase('error');?>');
		} else {
			id = matchYoutubeUrl(url);
	    if(id != false){
	      get_video_information_from_video_id(id);
	    } else {
	      toastr.error('<?php echo get_phrase('invalid_embed_url');?>', '<?php echo get_phrase('error');?>');
	    }
		}
	}

	// method for matching url with embed url pattern
	function matchYoutubeUrl(url) {
		p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
    matches = url.match(p);
    if(matches){
      return matches[1];
    }
    return false;
	}

	// method for getting response from video id
	function get_video_information_from_video_id(video_id) {
		$('#url_response_holder').html('<center><img style="width:20px; height:20px;" src="<?php echo base_url('assets/backend/images/preloader.gif'); ?>"></center>');
		// make an ajax call for fetching video information
		$.ajax({
			url: '<?php echo site_url('admin/get_video_information_from_embed_url/');?>' + video_id,
			success: function(response)
			{
				jQuery('#url_response_holder').html(response);
			}
		});
	}

	$('#within_a_pack').click(function(){
		if ($('#within_a_pack').is(":checked"))
		{
			$('.video_pack_list').slideDown();
		}
		else
		{
			$('.video_pack_list').slideUp();
		}
	});

	$('.submit_button').click(function(){
		var video_source   = $('#video_source').val();
		var video_category = $('#video_category').val();
		if(video_source === ''){
			toastr.error('<?php echo $this->session->flashdata('error_message');?>' , '<?php echo get_phrase('select_video_source');?>');
		}
		if(video_category ===''){
			toastr.error('<?php echo $this->session->flashdata('error_message');?>' , '<?php echo get_phrase('select_video_category');?>');
		}
		if ($('#within_a_pack').is(":checked"))
		{
			// $('#video_pack').attr('required', 'required');
			var video_pack_code = $('#video_pack').val();
			if(video_pack_code === ''){
				toastr.error('<?php echo $this->session->flashdata('error_message');?>' , '<?php echo get_phrase('select_video_pack');?>');
			}
		}
		if(video_source === '1'){
			$('#embed_url').attr('required', 'required');
			$('#title').attr('required', 'required');
			$('#description').attr('required', 'required');
			$('#thumbnail').attr('required', 'required');
			$('#duration').attr('required', 'required');
		}
		else if(video_source === '2'){
			$('#video_file_url_mp4').attr('required', 'required');
			$('#video_file_url_webm').attr('required', 'required');
			$('#video_file_url_ogg').attr('required', 'required');
			$('#video_title').attr('required', 'required');
			$('#video_description').attr('required', 'required');
			$('#video_thumbnail').attr('required', 'required');
			$('#video_duration').attr('required', 'required');
		}
	});

</script>
