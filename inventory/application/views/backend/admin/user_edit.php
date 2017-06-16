<ol class="breadcrumb bc-3">

	<li>
		<a href="<?php echo base_url();?>index.php?admin/dashboard">
			<i class="entypo-home"></i>
				<?php echo get_phrase('dashboard');?>
		</a>
	</li>

	<li>
		<a href="<?php echo base_url();?>index.php?admin/user_list/user_all">
			<?php echo get_phrase('user_list');?>
		</a>
	</li>

	<li class="active">
		<strong><?php echo get_phrase('edit_user');?></strong>
	</li>

</ol>

<?php
	$user_type = $this->user_model->get_user_info($user_code , 'type');
	$user_sex  = $this->user_model->get_user_info($user_code , 'gender');
?>


<?php echo form_open(base_url() . 'index.php?admin/user/edit/'.$user_code , array(
		'class' => 'form-horizontal form-groups-bordered validate' , 'enctype' => 'multipart/form-data'));?>

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('user_information');?>
				</div>
			</div>

			<div class="panel-body">

				<div class="col-sm-7">

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
						<div class="col-sm-7">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-user"></i></span>
								<input type="text" id="name" class="form-control" name="name"
									value="<?php echo $this->user_model->get_user_info($user_code , 'name');?>" data-validate="required"
										data-message-required="<?php echo get_phrase('please_insert_a_name');?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
						<div class="col-sm-7">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-mail"></i></span>
								<input type="email" id="email" class="form-control" name="email"
									value="<?php echo $this->user_model->get_user_info($user_code , 'email');?>" data-validate="email">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('user_type');?></label>
						<div class="col-sm-7">
							<select onchange="check_permission(this.value)" name="type" class="selectboxit" id="user_type">
								<option value=""><?php echo get_phrase('select_user_type');?></option>
								<option value="2" <?php if($user_type == 2) echo 'selected';?>><?php echo get_phrase('customer');?></option>
								<option value="3" <?php if($user_type == 3) echo 'selected';?>><?php echo get_phrase('supplier');?></option>
								<option value="4" <?php if($user_type == 4) echo 'selected';?>><?php echo get_phrase('employee');?></option>
								<option value="5" <?php if($user_type == 5) echo 'selected';?>><?php echo get_phrase('warehouse_manager');?></option>
							</select>
						</div>
					</div>

					<div class="form-group" id="permissions">
						<label class="col-sm-3 control-label"><?php echo get_phrase('permissions');?></label>
						<div class="col-sm-7">
							<!-- user permissions -->
							<hr />
								<ul class="icheck-list">
								    <li>
								        <input tabindex="5" type="checkbox" class="icheck-12" id="perm1"
								        	name="user_permission[]" value="1" <?php if($this->user_model->check_permission($user_code , 1)) echo 'checked';?>>
								        <label for="minimal-checkbox-1-12"><?php echo get_phrase('manage_inventory');?></label>
								    </li>

								    <li>
								        <input tabindex="6" type="checkbox" class="icheck-12" id="perm2"
								        	name="user_permission[]" value="2" <?php if($this->user_model->check_permission($user_code , 2)) echo 'checked';?>>
								        <label for="minimal-checkbox-2-12"><?php echo get_phrase('manage_purchase_orders');?></label>
								    </li>

								    <li>
								        <input tabindex="7" type="checkbox" class="icheck-12" id="perm3"
								        	name="user_permission[]" value="3" <?php if($this->user_model->check_permission($user_code , 3)) echo 'checked';?>>
								        <label for="minimal-checkbox-3-12"><?php echo get_phrase('manage_sales_orders');?></label>
								    </li>

								</ul>
							<hr />
							<!-- user permissions -->
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
						<div class="col-sm-7">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-phone"></i></span>
								<input type="text" id="phone" class="form-control" name="phone"
									value="<?php echo $this->user_model->get_user_info($user_code , 'phone');?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>
						<div class="col-sm-7">
							<select name="gender" id="gender" class="selectboxit">
								<option value="1" <?php if($user_sex == 1) echo 'selected';?>><?php echo get_phrase('male');?></option>
								<option value="2" <?php if($user_sex == 2) echo 'selected';?>><?php echo get_phrase('female');?></option>
							</select>
						</div>
					</div>

				</div>

				<div class="col-sm-5">

					<div class="form-group">


						<div class="col-sm-6">

							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
									<?php if(file_exists('uploads/user_image/' . $user_code . '.jpg')):?>
										<img src="uploads/user_image/<?php echo $user_code;?>.jpg" alt="...">
									<?php endif;?>
									<?php if(!(file_exists('uploads/user_image/' . $user_code . '.jpg'))):?>
										<img src="assets/no_image.png" alt="...">
									<?php endif;?>
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new"><?php echo get_phrase('select_image');?></span>
										<span class="fileinput-exists"><?php echo get_phrase('change');?></span>
										<input type="file" name="userfile" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove');?></a>
								</div>
							</div>

						</div>
					</div>


					<button type="submit" id="submit_button" class="btn btn-green btn-icon icon-left">
						<?php echo get_phrase('save_changes');?>
						<i class="entypo-check"></i>
					</button>


				</div>



			</div>

		</div>

	</div>

</div>


<?php echo form_close();?>

<script type="text/javascript">

	$(document).ready(function() {

		//hides the user permission panel
		var user_type = '<?php echo $user_type;?>';
		if(user_type != 4) {
			$('#permissions').hide();
		}

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

		// adds styles to checkboxes
		$('input.icheck-12').iCheck({
			checkboxClass: 'icheckbox_flat-pink'
		});

	});

</script>

<script type="text/javascript">

	function check_permission(value) {
		if(value == 4) {
			$('#permissions').show(500);
		} else {
			$('#permissions').hide(500);
		}
	}

</script>
