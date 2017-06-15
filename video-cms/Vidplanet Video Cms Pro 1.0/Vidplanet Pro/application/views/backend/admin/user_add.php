<div class="row">
	<div class="col-md-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-plus"></i> &nbsp;
          <?php echo get_phrase('add_new_user');?>
				</div>
			</div>
      <div class="panel-body">
        <!-- form start -->
				<?php echo form_open(site_url('admin/user/add'), array(
          'class' => 'form-groups form-horizontal', 'enctype' => 'multipart/form-data'
        ));?>

          <div class="form-group">
          	<label class="col-sm-3 control-label">
              <i class="fa fa-asterisk"> &nbsp;</i><?php echo get_phrase('name'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-user"></i></span>
          			<input type="text" class="form-control" name="name" id="name"
                  value="" autofocus required="required">
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
                  value="" required="required">
          		</div>
          	</div>
          </div>

          <div class="form-group">
          	<label class="col-sm-3 control-label">
              <i class="fa fa-asterisk"> &nbsp;</i><?php echo get_phrase('password'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-lock"></i></span>
          			<input type="password" class="form-control" name="password" id="password"
                  value="" required="required">
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
          			<input type="text" class="form-control" name="phone" required="required">
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
          			<input type="text" class="form-control" name="address" required="required">
          		</div>
          	</div>
          </div>

          <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('profile_image');?></label>
            <div class="col-sm-7">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="<?php echo base_url('assets/backend/images/user_placeholder.jpg');?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
										<span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
										<input type="file" name="userfile" accept="image/*" required="required">
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
								<?php echo get_phrase('save_user');?>
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
