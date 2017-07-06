<!-- breadcrumb start -->
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo site_url('admin/dashboard');?>">
			<i class="fa fa-dashboard"></i>
			<?php echo get_phrase('dashboard'); ?>
		</a>
	</li>
	<li>
		<a href="<?php echo site_url('admin/system_settings');?>">
			<?php echo get_phrase('settings'); ?>
		</a>
	</li>
	<li class="active">
    <?php echo get_phrase('manage_profile'); ?>
  </li>
</ol>
<!-- breadcrumb end -->
<div class="row">
	<div class="col-md-6">
		<!-- panel containing the video add form  -->
		<div class="panel panel-primary" data-collapsed="0">
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-wrench"></i> &nbsp; <?php echo get_phrase('manage_profile'); ?>
				</div>
			</div>
			<!-- panel body -->
			<div class="panel-body">
				<!-- form start -->
				<?php echo form_open(site_url('admin/manage_profile/do_update'), array(
					'class' => 'form-groups form-horizontal', 'id' => 'manage-profile-form', 'enctype' => 'multipart/form-data'
				)); ?>

				<?php
					 $this->db->where($this->session->userdata('login_type').'_id', $this->session->userdata('login_user_id'));
					 $admin_details = $this->db->get($this->session->userdata('login_type'))->row_array();
				?>
						<div class="form-group">
	          	<label class="col-sm-3 control-label">
	             <?php echo get_phrase('name'); ?>
	            </label>
	          	<div class="col-sm-9">
	          		<div class="input-group">
	          			<span class="input-group-addon"><i class="fa fa-user"></i></span>
	          			<input type="text" class="form-control" name="name" id="name"
	                  placeholder="<?php echo get_phrase('name');?>" required="required"
	                  value = "<?php echo $admin_details['name'];?>">
	          		</div>
	          	</div>
	          </div>

						<div class="form-group">
	          	<label class="col-sm-3 control-label">
	              <?php echo get_phrase('email'); ?>
	            </label>
	          	<div class="col-sm-9">
	          		<div class="input-group">
	          			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
	          			<input type="email" class="form-control" name="email" id="email"
	                  placeholder="<?php echo get_phrase('email');?>" required="required"
	                  value = "<?php echo $admin_details['email'];?>">
	          		</div>
	          	</div>
	          </div>

			<div class="form-group">
				<label class="col-sm-3 control-label"></label>
				<div class="col-sm-9">
					<div class="input-group">
						<button type="submit" class="btn btn-info btn-icon btn-sm icon-left submit_button">
							<?php echo get_phrase('update_profile'); ?>
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
		<div class="panel panel-primary" data-collapsed="0">
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-wrench"></i> &nbsp; <?php echo get_phrase('admin_image'); ?>
				</div>
			</div>
			<!-- panel body -->
			<div class="panel-body">
				<!-- form start -->
				<?php echo form_open(site_url('admin/manage_profile/admin_image'), array(
					'class' => 'form-groups form-horizontal', 'id' => 'system-settings-form', 'enctype' => 'multipart/form-data'
				)); ?>
				<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('admin_image'); ?></label>

					<div class="col-sm-5">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								<img src="<?php echo base_url('uploads/admin_image/').$this->session->userdata('login_user_id').'.jpg'; ?>" width: '100px' height: '100px' alt="...">
							</div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
							<div>
								<span class="btn btn-white btn-file">
									<span class="fileinput-new">Select image</span>
									<span class="fileinput-exists">Change</span>
									<input type="file" name="admin_image" id="admin_image" accept="image/*">
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
								<?php echo get_phrase('upload_admin_image'); ?>
								<i class="fa fa-check"></i>
							</button>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
				<!-- form end -->
			</div>
		</div>

	</div>
	<div class="col-md-6">
	<!-- panel containing the system logo add form -->
	<!-- panel containing the system logo add form -->
	<div class="panel panel-primary" data-collapsed="0">
		<!-- panel head -->
		<div class="panel-heading">
			<div class="panel-title">
				<i class="fa fa-wrench"></i> &nbsp; <?php echo get_phrase('change_password'); ?>
			</div>
		</div>
		<!-- panel body -->
		<div class="panel-body">
			<!-- form start -->
			<?php echo form_open(site_url('admin/manage_profile/change_password'), array(
				'class' => 'form-groups form-horizontal', 'id' => 'system-settings-form', 'enctype' => 'multipart/form-data'
			)); ?>
			<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('old_password'); ?>
					</label>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="password" class="form-control" name="old_password" id="old_password"
								placeholder="<?php echo get_phrase('old_password');?>" required="required">
						</div>
					</div>
			</div>
			<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('new_password'); ?>
					</label>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="password" class="form-control" name="new_password" id="new_password"
								placeholder="<?php echo get_phrase('new_password');?>" required="required">
						</div>
					</div>
			</div>
			<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('confirm_password'); ?>
					</label>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="password" class="form-control" name="confirm_password" id="confirm_password"
								placeholder="<?php echo get_phrase('confirm_password');?>" required="required">
						</div>
					</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label"></label>
				<div class="col-sm-9">
					<div class="input-group">
						<button type="submit" class="btn btn-info btn-icon btn-sm icon-left submit_button">
							<?php echo get_phrase('update_password'); ?>
							<i class="fa fa-check"></i>
						</button>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
			<!-- form end -->
		</div>
	</div>
</div>
</div>

<script type="text/javascript">

</script>
