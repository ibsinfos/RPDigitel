<?php
  $update = get_results_of_id('user', $param2);
  foreach ($update as $row):
?>
<div class="row">
	<div class="col-md-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-pencil"></i> &nbsp;
          <?php echo get_phrase('edit_user');?>
				</div>
			</div>
      <div class="panel-body">
        <!-- form start -->
				<?php echo form_open(site_url('admin/user/edit/'.$param2), array(
          'class' => 'form-groups form-horizontal ajax-submit', 'enctype' => 'multipart/form-data'
        ));?>

          <div class="form-group">
          	<label class="col-sm-3 control-label">
              <i class="fa fa-asterisk"> &nbsp;</i><?php echo get_phrase('name'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-user"></i></span>
          			<input type="text" class="form-control" name="name" id="name"
                  value="<?php echo $row['name'];?>">
          		</div>
          	</div>
          </div>

          <div class="form-group">
          	<label class="col-sm-3 control-label">
              <i class="fa fa-asterisk"> &nbsp;</i><?php echo get_phrase('email'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
          			<input type="email" class="form-control" name="email" id="email"
                  value="<?php echo $row['email'];?>">
          		</div>
          	</div>
          </div>

          <div class="form-group">
          	<label class="col-sm-3 control-label">
              <?php echo get_phrase('phone'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-phone"></i></span>
          			<input type="text" class="form-control" name="phone"
                  value="<?php echo $row['phone'];?>">
          		</div>
          	</div>
          </div>

          <div class="form-group">
          	<label class="col-sm-3 control-label">
              <?php echo get_phrase('address'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
          			<input type="text" class="form-control" name="address"
                  value="<?php echo $row['address'];?>">
          		</div>
          	</div>
          </div>

          <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('profile_image');?></label>
            <div class="col-sm-7">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="<?php echo get_user_image('user', $row['user_id']);?>">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
										<span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
										<input type="file" name="userfile" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
            <div class="col-sm-7">
							<button type="submit" class="btn btn-info btn-sm btn-icon icon-left">
								<?php echo get_phrase('update');?>
								<i class="entypo-check"></i>
							</button>
						</div>
					</div>

				<?php echo form_close();?>
        <!-- form end -->
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
