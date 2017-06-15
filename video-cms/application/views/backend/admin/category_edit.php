<?php
	$this->db->where('code', $param2);
	$categories_array = $this->db->get('category')->result_array();
?>
<div class="row">
	<div class="col-md-12">
		<!-- panel containing the video add form  -->
		<div class="panel panel-primary" data-collapsed="0">
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('update_category'); ?>
				</div>
			</div>
			<!-- panel body -->
			<div class="panel-body">
				<!-- form start -->
				<?php echo form_open(site_url('admin/video_category/do_update/'.$param2), array(
					'class' => 'form-groups form-horizontal', 'id' => 'video_category-add-form', 'enctype' => 'multipart/form-data'
				)); ?>

				<?php foreach ($categories_array as $row):?>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('title'); ?>
						</label>
						<div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-circle"></i></span>
                <input type="text" class="form-control" name="category_title" id="category_title"
                  placeholder="<?php echo get_phrase('enter_category_title') ?>" value="<?php echo $row['title'];?>" required>
              </div>
						</div>
					</div>

          <div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('description'); ?>
						</label>
						<div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-circle"></i></span>
                <textarea type="text" class="form-control" name="category_description" id="category_description"
                  placeholder="<?php echo get_phrase('enter_category_description') ?>" required><?php echo $row['description'];?></textarea>
              </div>
						</div>
					</div>

					<div class="form-group">
					<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('category_banner'); ?></label>

						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 200px; height: 100px;" data-trigger="fileinput">
									<img src="<?php echo base_url('uploads/category/'.$row['code'].'.jpg'); ?>" width: '250px' height: '100px' alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="category_banner" id="category_banner" accept="image/*">
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
								<button type="submit" class="btn btn-info btn-icon btn-sm icon-left">
									<?php echo get_phrase('update_category'); ?>
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
