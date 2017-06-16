<?php
 $this->db->where('code', $param2);
 $video_pack_array = $this->db->get('video_pack')->result_array();
?>
<div class="row">
	<div class="col-md-12">
		<!-- panel containing the video add form  -->
		<div class="panel panel-primary" data-collapsed="0">
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('update_video_pack'); ?>
				</div>
			</div>
			<!-- panel body -->
			<div class="panel-body">
				<!-- form start -->
				<?php echo form_open(site_url('admin/video_packs/do_update/'.$param2), array(
					'class' => 'form-groups form-horizontal', 'id' => 'video-pack-add-form', 'enctype' => 'multipart/form-data'
				)); ?>
        <?php foreach ($video_pack_array as $row):?>
          <div class="form-group">
            <label class="col-sm-3 control-label">
              <?php echo get_phrase('title'); ?>
            </label>
            <div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-video-camera"></i></span>
                <input type="text" class="form-control" name="video_pack_title" id="video_pack_title"
                  value="<?php echo $row['title'];?>" placeholder="<?php echo get_phrase('video_pack_title');?>" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">
              <?php echo get_phrase('description'); ?>
            </label>
            <div class="col-sm-9">
                <textarea type="text" class="form-control" name="video_pack_description" id="video_pack_description"
                 placeholder="<?php echo get_phrase('video_pack_description');?>" required rows="4" cols="50" maxlength="300" style="resize: vertical;"><?php echo $row['description'];?></textarea>
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
									<option value="<?php echo $key['code'];?>" <?php if($key['code'] == $row['category']) echo 'selected = "true"';?>><?php echo $key['title']; ?></option>
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
								<input type="checkbox" name="premium" id="premium" value = 1 onclick="show_price_field()" <?php if($row['premium'] == 1) echo 'checked'; ?>>
							</div>
						</div>
					</div>

          <div class="form-group price_field" style="display: none;">
            <label class="col-sm-3 control-label">
              <?php echo get_phrase('video_pack_price'); ?>
            </label>
            <div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-video-camera"></i></span>
                <input type="text" class="form-control" name="video_pack_price" id="video_pack_price"
                  value="<?php echo $row['price'];?>" placeholder="<?php echo get_phrase('video_pack_price');?>">
              </div>
            </div>
          </div>

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
          <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('video_pack_thumbnail'); ?></label>

            <div class="col-sm-5">
            	<div class="fileinput fileinput-new" data-provides="fileinput">
            		<div class="fileinput-new thumbnail" style="width: 200px; height: 138px;" data-trigger="fileinput">
            			<img src="<?php echo base_url('uploads/video_pack/video_pack_thumbnail_').$row['code'].'.jpg'; ?>" alt="...">
            		</div>
            		<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 138px"></div>
            		<div>
            			<span class="btn btn-white btn-file">
            				<span class="fileinput-new">Select image</span>
            				<span class="fileinput-exists">Change</span>
            				<input type="file" name="video_pack_thumbnail" accept="image/*">
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
            			<img src="<?php echo base_url('uploads/video_pack/video_pack_banner_').$row['code'].'.jpg'; ?>" alt="...">
            		</div>
            		<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 261px; max-height: 150px"></div>
            		<div>
            			<span class="btn btn-white btn-file">
            				<span class="fileinput-new">Select image</span>
            				<span class="fileinput-exists">Change</span>
            				<input type="file" name="video_pack_banner" accept="image/*">
            			</span>
            			<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
            		</div>
            	</div>
            </div>
          </div>
        <?php endforeach; ?>

					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
							<div class="input-group">
								<button type="submit" class="btn btn-info btn-icon btn-sm icon-left submit_button">
									<?php echo get_phrase('update_video_pack'); ?>
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
<!-- neon custom scripts initializers -->
<script src="<?php echo base_url('assets/backend/js/neon-custom.js');?>"></script>
<script type="text/javascript">
$(document).ready(function(){
  if ($('#premium').is(":checked"))
  {
    $('.price_field').show();
  }
});
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
  // SelectBoxIt Dropdown replacement
  if($.isFunction($.fn.selectBoxIt))
  {
    $("select.selectboxit").each(function(i, el)
    {
      var $this = $(el),
        opts = {
          showFirstOption: attrDefault($this, 'first-option', true),
          'native': attrDefault($this, 'native', false),
          defaultText: attrDefault($this, 'text', ''),
        };

      $this.addClass('visible');
      $this.selectBoxIt(opts);
    });
  }

</script>
