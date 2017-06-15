<h3 class="title text-center"><?php echo get_phrase('profile_information'); ?></h3>
<hr />
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form class="form" action="<?php echo site_url('home/user_profile_settings/profile_info');?>" method="POST" enctype="multipart/form-data">
      <div class="col-sm-12">
        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
          <div class="fileinput-new thumbnail img-circle img-raised">
            <img src="<?php echo base_url('uploads/user_image/'.$this->session->userdata('user_id').'.jpg');?>">
          </div>
          <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
          <div>
            <span class="btn btn-raised btn-round btn-default btn-file">
              <span class="fileinput-new"><?php echo get_phrase('add_photo'); ?></span>
              <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
              <input type="file" name='user_image' id="profile" accept="image/*">
           </span>
            <br />
            <a href="index.html#pablo"
              class="btn btn-<?php echo $color_scheme;?> btn-round fileinput-exists" data-dismiss="fileinput">
              <i class="fa fa-times"></i> <?php echo get_phrase('remove'); ?>
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons">face</i>
					</span>
					<div class="form-group is-empty form-<?php echo $color_scheme;?>">
            <input type="text" class="form-control" name="user_name" placeholder="Full Name"
              value="<?php echo $this->session->userdata('name');?>" required="required">
              <span class="material-input"></span>
            </div>
				</div>
			</div>
      <div class="col-sm-12">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons">email</i>
					</span>
					<div class="form-group is-empty form-<?php echo $color_scheme;?>">
            <input type="text" class="form-control" name="user_email" placeholder="Email"
              value="<?php echo $this->session->userdata('email');?>" required="required">
              <span class="material-input"></span>
            </div>
				</div>
			</div>
      <div class="col-sm-12">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons">phone</i>
					</span>
					<div class="form-group is-empty form-<?php echo $color_scheme;?>">
            <input type="text" class="form-control" name="user_phone" placeholder="Phone Number"
              value="<?php echo $this->session->userdata('phone');?>" required="required">
              <span class="material-input"></span>
            </div>
				</div>
			</div>
      <div class="col-sm-12">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons">location_on</i>
					</span>
					<div class="form-group is-empty form-<?php echo $color_scheme;?>">
            <input type="text" class="form-control" name="user_address" placeholder="Address"
              value="<?php echo $this->session->userdata('address');?>" required="required">
              <span class="material-input"></span>
            </div>
				</div>
			</div>
      <div class="col-sm-12">
        <button class="btn btn-<?php echo $color_scheme;?> btn-round">
					<i class="material-icons">done_all</i>&nbsp; <?php echo get_phrase('update'); ?>
				  <div class="ripple-container"></div>
        </button>
      </div>
    </form>
  </div>
</div>

<div class="vertical-spacing"></div>
<h3 class="title text-center"><?php echo get_phrase('change_password'); ?></h3>
<hr />
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form class="form" action="<?php echo site_url('home/user_profile_settings/change_password');?>" method="POST">
      <div class="col-sm-12">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons">lock</i>
					</span>
					<div class="form-group is-empty form-<?php echo $color_scheme;?>">
            <input type="password" class="form-control" name="old_password" placeholder="Your Old Password"
              value="">
              <span class="material-input"></span>
            </div>
				</div>
			</div>
      <div class="col-sm-12">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons">done</i>
					</span>
					<div class="form-group is-empty form-<?php echo $color_scheme;?>">
            <input type="password" class="form-control" name="new_password" placeholder="New Password"
              value="">
              <span class="material-input"></span>
            </div>
				</div>
			</div>
      <div class="col-sm-12">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons">done_all</i>
					</span>
					<div class="form-group is-empty form-<?php echo $color_scheme;?>">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password"
              value="">
              <span class="material-input"></span>
            </div>
				</div>
			</div>
      <div class="col-sm-12">
        <button class="btn btn-<?php echo $color_scheme;?> btn-round" type="submit">
					<i class="material-icons">done_all</i>&nbsp; <?php echo get_phrase('update'); ?>
				  <div class="ripple-container"></div>
        </button>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">
  function test() {
    iziToast.show({
    title: 'Hey',
    message: 'What would you like to add?',
    position: 'topRight',
    color: 'green'
    });
  }
</script>
