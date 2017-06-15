<?php
	$this->db->where('code', $param2);
	$video_array = $this->db->get('video')->result_array();
?>
<div class="row">
	<div class="col-md-12">
		<!-- panel containing the video add form  -->
		<div class="panel panel-primary" data-collapsed="0">
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('update_video_information'); ?>
				</div>
			</div>
			<!-- panel body -->
			<div class="panel-body">
				<!-- form start -->
				<?php echo form_open(site_url('admin/videos/do_update/'.$param2), array(
					'class' => 'form-groups form-horizontal', 'id' => 'video_category-add-form', 'enctype' => 'multipart/form-data'
				)); ?>

				<?php foreach ($video_array as $row):?>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('title'); ?>
						</label>
						<div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-circle"></i></span>
                <input type="text" class="form-control" name="video_title" id="video_title"
                  placeholder="<?php echo get_phrase('video_title') ?>" value="<?php echo $row['title'];?>" required>
              </div>
						</div>
					</div>

          <div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('description'); ?>
						</label>
						<div class="col-sm-9">
                <textarea type="text" class="form-control" name="video_description" id="video_description"
                  placeholder="<?php echo get_phrase('enter_video_description') ?>" rows="5" style="resize: vertical;" maxlength="250" required><?php echo $row['description'];?></textarea>
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
							<select class="selectboxit" name="video_category" id = 'video_category' required="">
								<option value=""><?php echo get_phrase('choose_a_category'); ?></option>
								<?php foreach ($categories_array as $key):?>
									<option value="<?php echo $key['code'];?>" <?php if($key['code'] == $row['category_code']) echo 'selected';?> ><?php echo $key['title'];?></option>
							  <?php endforeach; ?>
							</select>
						</div>
					</div>

          <!-- <div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('thumbnail'); ?>
						</label>
						<div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file-video-o"></i></span>
                <input type="text" class="form-control" name="thumbnail" id="thumbnail"
                  placeholder="<?php echo get_phrase('video_thumbnail') ?>" value="<?php echo $row['thumbnail'];?>" required>
              </div>
						</div>
					</div>

          <div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('duration'); ?>
						</label>
						<div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file-video-o"></i></span>
                <input type="text" class="form-control" name="duration" id="duration"
                  placeholder="<?php echo get_phrase('video_duration') ?>" value="<?php echo $row['duration'];?>" required>
              </div>
						</div>
					</div> -->

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">
              <?php echo get_phrase('featured'); ?>
            </label>

            <div class="col-sm-8">
              <div class="checkbox checkbox-replace color-blue">
                <input type="checkbox" name="featured" id="featured" value = 1 <?php if($row['featured'] == 1) echo 'checked';?>>
              </div>
            </div>
          </div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">
							<?php echo get_phrase('within_a_pack'); ?>
						</label>

						<div class="col-sm-8">
							<div class="checkbox checkbox-replace color-blue">
								<input type="checkbox" name="within_a_pack" id="within_a_pack" value = 1 <?php if($row['within_a_pack'] == 1) echo 'checked'; ?>>
							</div>
						</div>
					</div>

					<div class="form-group video_pack_list" style="display: none;">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('video_pack'); ?>
						</label>
						<div class="col-sm-9">
							<select name="video_pack" class="selectboxit" id = 'video_pack'>
								<!-- <option value=""><?php echo get_phrase('select_video_pack'); ?></option> -->
								<?php
									$video_pack = $this->db->get('video_pack')->result_array();
									foreach ($video_pack as $key):?>
									<option value="<?php echo $key['code'];?>" <?php if($key['code'] == $row['video_pack_code']) echo 'selected'; ?> onemptied=""><?php echo $key['title']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				<?php endforeach; ?>
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-9">
						<div class="input-group">
							<button type="submit" class="btn btn-info btn-icon btn-sm icon-left submit_button">
								<?php echo get_phrase('update_video_information'); ?>
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
<script src="<?php echo base_url('assets/backend/js/neon-custom.js');?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	if ($('#within_a_pack').is(":checked"))
	{
		$('.video_pack_list').show();
	}
});
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
	var video_category = $('#video_category').val();
	if(video_category ===''){
		toastr.error('<?php echo $this->session->flashdata('error_message');?>' , '<?php echo get_phrase('select_video_category');?>');
	}
	if ($('#within_a_pack').is(":checked"))
	{
		var video_pack_code = $('#video_pack').val();
		if(video_pack_code === ''){
			toastr.error('<?php echo $this->session->flashdata('error_message');?>' , '<?php echo get_phrase('select_video_pack');?>');
		}
	}
});
</script>
