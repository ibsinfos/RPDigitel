
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<!-- panel containing the video add form  -->
		<div class="panel panel-primary" data-collapsed="0">
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-pencil"></i> &nbsp; <?php echo get_phrase('update_payment_information'); ?>
				</div>
			</div>
			<!-- panel body -->
			<div class="panel-body">
				<!-- form start -->
				<?php echo form_open(site_url('admin/payment_settings/do_update'), array(
					'class' => 'form-groups form-horizontal', 'id' => 'payment-settings-form', 'enctype' => 'multipart/form-data'
				)); ?>

					<div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('paypal_email'); ?>
						</label>
						<div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control" name="paypal_email" id="paypal_email"
                  placeholder="<?php echo get_phrase('paypal_email'); ?>" required
                  value = "<?php echo $this->db->get_where('settings' , array('type'=>'paypal_email'))->row()->description;?>">
              </div>
						</div>
					</div>
<br>
<hr>
<br>
          <div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('stripe_publishable_key'); ?>
						</label>
						<div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type = "text" class="form-control" name="stripe_publishable_key" id="stripe_publishable_key" placeholder="<?php echo get_phrase('stripe_publishable_key'); ?>"required
                value = "<?php echo $this->db->get_where('settings' , array('type'=>'stripe_publishable_key'))->row()->description;?>">
              </div>
						</div>
					</div>

          <div class="form-group">
						<label class="col-sm-3 control-label">
						 <?php echo get_phrase('stripe_secret_key'); ?>
						</label>
						<div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type = "text" class="form-control" name="stripe_secret_key" id="stripe_secret_key" placeholder="<?php echo get_phrase('stripe_secret_key'); ?>" required
                value = "<?php echo $this->db->get_where('settings' , array('type'=>'stripe_secret_key'))->row()->description;?>">
              </div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
							<div class="input-group">
								<button type="submit" class="btn btn-info btn-icon btn-sm icon-left">
									<?php echo get_phrase('update_payment_informtaion'); ?>
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
