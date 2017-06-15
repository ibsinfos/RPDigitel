<?php
	$system_currency = $this->db->get_where('settings' , array('type' =>'system_currency_id'))->row()->description;
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
		<a href="<?php echo site_url('admin/system_settings');?>">
			<?php echo get_phrase('settings'); ?>
		</a>
	</li>
	<li class="active">
    <?php echo get_phrase('system_settings'); ?>
  </li>
</ol>
<!-- breadcrumb end -->
<div class="row">
	<div class="col-md-offset-1 col-md-10">
		<!-- panel containing the video add form  -->
		<div class="panel panel-primary" data-collapsed="0">
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-wrench"></i> &nbsp; <?php echo get_phrase('system_settings'); ?>
				</div>
			</div>
			<!-- panel body -->
			<div class="panel-body">
				<!-- form start -->
				<?php echo form_open(site_url('admin/system_settings/do_update'), array(
					'class' => 'form-groups form-horizontal', 'id' => 'system-settings-form', 'enctype' => 'multipart/form-data'
				)); ?>

						<div class="form-group">
	          	<label class="col-sm-3 control-label">
	              <?php echo get_phrase('system_name'); ?>
	            </label>
	          	<div class="col-sm-9">
	          		<div class="input-group">
	          			<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
	          			<input type="text" class="form-control" name="system_name" id="system_name"
	                  placeholder="<?php echo get_phrase('system_name');?>" required="required"
	                  value = "<?php echo $this->db->get_where('settings' , array('type' =>'system_name'))->row()->description;?>">
	          		</div>
	          	</div>
	          </div>

						<div class="form-group">
	          	<label class="col-sm-3 control-label">
	              <?php echo get_phrase('system_title'); ?>
	            </label>
	          	<div class="col-sm-9">
	          		<div class="input-group">
	          			<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
	          			<input type="text" class="form-control" name="system_title" id="system_title"
	                  placeholder="<?php echo get_phrase('system_title');?>" required="required"
	                  value = "<?php echo $this->db->get_where('settings' , array('type' =>'system_title'))->row()->description;?>">
	          		</div>
	          	</div>
	          </div>

						<div class="form-group">
	          	<label class="col-sm-3 control-label">
	              <?php echo get_phrase('system_email'); ?>
	            </label>
	          	<div class="col-sm-9">
	          		<div class="input-group">
	          			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
	          			<input type="email" class="form-control" name="system_email" id="system_email"
	                  placeholder="<?php echo get_phrase('system_email');?>" required="required"
	                  value = "<?php echo $this->db->get_where('settings' , array('type' =>'system_email'))->row()->description;?>">
	          		</div>
	          	</div>
	          </div>

						<div class="form-group">
                <label  class="col-sm-3 control-label"><?php echo get_phrase('language');?></label>
                <div class="col-sm-9">
                    <select name="system_language" class="form-control selectboxit">
                          <?php
													$current_default_language = $this->db->get_where('settings' , array('type' =>'language'))->row()->description;
													$fields = $this->db->list_fields('language');
													foreach ($fields as $field)
													{
														if ($field == 'phrase_id' || $field == 'phrase')continue;
														//$current_default_language	=	$json->language;
														?>
                      		<option value="<?php echo $field;?>"
                              	<?php if ($current_default_language == $field)echo 'selected';?>> <?php echo $field;?> </option>
                              <?php
													}
													?>
                     </select>
                </div>
           </div>

					 <div class="form-group">
              <label  class="col-sm-3 control-label"><?php echo get_phrase('text_align');?></label>
              <div class="col-sm-9">
                  <select name="text_align" class="form-control selectboxit">
                  	  <?php $text_align	=	$this->db->get_where('settings' , array('type'=>'text_align'))->row()->description;?>
                      <option value="left-to-right" <?php if ($text_align == 'left-to-right')echo 'selected';?>> Left-to-Right</option>
                      <option value="right-to-left" <?php if ($text_align == 'right-to-left')echo 'selected';?>> Right-to-Left</option>
                  </select>
              </div>
          </div>

           <div class="form-group">
                <label  class="col-sm-3 control-label"><?php echo get_phrase('system_currency');?></label>
                <div class="col-sm-9">
                    <select name="system_currency" class="form-control selectboxit">
                    	<?php $currency_array = $this->db->get('currency')->result_array();
                    		foreach ($currency_array as $currency):?>
							<option value="<?php echo $currency['currency_id'];?>" <?php if($currency['currency_id'] == $system_currency) echo "selected";?> ><?php echo $currency['currency_name'];?></option>
                    		<?php endforeach; ?>							?>
                     </select>
                </div>
           </div>

					 <div class="form-group">
						 <label class="col-sm-3 control-label">
							 <?php echo get_phrase('youtube_data_api_key'); ?>
						 </label>
						 <div class="col-sm-6">
							 <div class="input-group">
								 <span class="input-group-addon"><i class="fa fa-key"></i></span>
								 <input type="text" class="form-control" name="youtube_data_api_key" id="youtube_data_api_key"
									 placeholder="<?php echo get_phrase('youtube_data_api_key');?>" required="required"
									 value = "<?php echo $this->db->get_where('settings' , array('type' =>'youtube_data_api_key'))->row()->description;?>">
							 </div>
						 </div>
						 <div class="col-sm-3" style="margin-top: 8px; margin-left: -23px;">
								<a href="https://www.youtube.com/watch?v=Im69kzhpR3I" target="_blank"><span style="color: #f44336;"><i class = "fa fa-info-circle"></i>&nbsp;<?php echo get_phrase('how_to_get_youTube_API_key'); ?></span></a>
						 </div>
					 </div>

					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
							<div class="input-group">
								<button type="submit" class="btn btn-info btn-icon btn-sm icon-left submit_button">
									<?php echo get_phrase('update'); ?>
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

		<!-- panel containing the system logo add form -->
		<div class="panel panel-primary" data-collapsed="0">
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-wrench"></i> &nbsp; <?php echo get_phrase('system_logo'); ?>
				</div>
			</div>
			<!-- panel body -->
			<div class="panel-body">
				<!-- form start -->
				<?php echo form_open(site_url('admin/system_settings/logo_upload'), array(
					'class' => 'form-groups form-horizontal', 'id' => 'system-settings-form', 'enctype' => 'multipart/form-data'
				)); ?>
				<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('system_logo'); ?></label>

					<div class="col-sm-5">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								<?php $logo = $this->db->get_where('settings' , array('type' =>'logo'))->row()->description; ?>
								<img src="<?php echo base_url('assets/backend/images/'.$logo); ?>" width: '100px' height: '100px' alt="...">
							</div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
							<div>
								<span class="btn btn-white btn-file">
									<span class="fileinput-new">Select image</span>
									<span class="fileinput-exists">Change</span>
									<input type="file" name="logo" id="logo" accept="image/*">
								</span>
								<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('favicon'); ?></label>

					<div class="col-sm-5">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 40px; height: 40px;" data-trigger="fileinput">
								<?php $favicon = $this->db->get_where('settings' , array('type' =>'favicon'))->row()->description; ?>
								<img src="<?php echo base_url('assets/backend/images/'.$favicon); ?>" width: '40px' height: '40px' alt="...">
							</div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
							<div>
								<span class="btn btn-white btn-file">
									<span class="fileinput-new">Select image</span>
									<span class="fileinput-exists">Change</span>
									<input type="file" name="favicon" id="favicon" accept="image/*">
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
								<?php echo get_phrase('upload_system_logo'); ?>
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
