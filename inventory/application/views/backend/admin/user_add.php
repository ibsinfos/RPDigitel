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
		<strong><?php echo get_phrase('add_new_user');?></strong>
	</li>

</ol>


<?php echo form_open(base_url() . 'index.php?admin/user/create/' , array(
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
						<div class="col-sm-8">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-user"></i></span>
								<input type="text" id="name" class="form-control" name="name"
									placeholder="<?php echo get_phrase('name');?>" data-validate="required"
										data-message-required="<?php echo get_phrase('please_insert_a_name');?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
						<div class="col-sm-8">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-mail"></i></span>
								<input type="email" id="email" class="form-control" name="email"
									placeholder="<?php echo get_phrase('email');?>" data-validate="email">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('user_type');?></label>
						<div class="col-sm-8">
							<select onchange="check_permission(this.value)" name="type" class="selectboxit" id="user_type">
								<option value=""><?php echo get_phrase('select_user_type');?></option>
								<option value="2"><?php echo get_phrase('customer');?></option>
								<option value="3"><?php echo get_phrase('supplier');?></option>
								<option value="4"><?php echo get_phrase('employee');?></option>
								<option value="5"><?php echo get_phrase('warehouse_manager');?></option>
							</select>
						</div>
					</div>

					<div class="form-group" id="permissions">
						<label class="col-sm-3 control-label"><?php echo get_phrase('permissions');?></label>
						<div class="col-sm-8">
							<!-- user permissions -->
							<hr />
								<ul class="icheck-list">
								    <li>
								        <input tabindex="5" type="checkbox" class="icheck-12" id="perm1"
								        	name="user_permission[]" value="1">
								        <label for="minimal-checkbox-1-12"><?php echo get_phrase('manage_inventory');?></label>
								    </li>

								    <li>
								        <input tabindex="6" type="checkbox" class="icheck-12" id="perm2"
								        	name="user_permission[]" value="2">
								        <label for="minimal-checkbox-2-12"><?php echo get_phrase('manage_purchase_orders');?></label>
								    </li>

								    <li>
								        <input tabindex="7" type="checkbox" class="icheck-12" id="perm3"
								        	name="user_permission[]" value="3">
								        <label for="minimal-checkbox-3-12"><?php echo get_phrase('manage_sales_orders');?></label>
								    </li>

								</ul>
							<hr />
							<!-- user permissions -->
						</div>
					</div>

					<div id="user_password">
						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon"><i class="entypo-lock"></i></span>
									<input type="password" id="password" class="form-control" name="password"
										placeholder="<?php echo get_phrase('user_login_password');?>">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
						<div class="col-sm-8">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-phone"></i></span>
								<input type="text" id="phone" class="form-control" name="phone"
									placeholder="<?php echo get_phrase('phone_number');?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>
						<div class="col-sm-8">
							<select name="gender" id="gender" class="selectboxit">
								<option value="1"><?php echo get_phrase('male');?></option>
								<option value="2"><?php echo get_phrase('female');?></option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>

						<div class="col-sm-8">

							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
									<img src="assets/no_image.png" alt="...">
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

				</div>

				<div class="col-sm-5">

					<div class="form-group" id="address">
						<div class="col-sm-12">
							<!-- user address fields -->

								<div class="col-sm-12">
									<input type="text" id="address_line_1" class="form-control" name="address_line_1"
										placeholder="<?php echo get_phrase('address_line');?>-1">
								</div>

								<div class="col-sm-12">
									<label class="control-label"></label>
									<input type="text" id="address_line_2" class="form-control" name="address_line_2"
										placeholder="<?php echo get_phrase('address_line');?>-2">
								</div>

								<div class="col-sm-6">
									<label class="control-label"><?php echo get_phrase('city');?></label>
									<input type="text" id="city" class="form-control" name="city">
								</div>

								<div class="col-sm-6">
									<label class="control-label"><?php echo get_phrase('zip_code');?></label>
									<input type="text" id="zip_code" class="form-control" name="zip_code">
								</div>

								<div class="col-sm-6">
									<label class="control-label"><?php echo get_phrase('state');?></label>
									<input type="text" id="state" class="form-control" name="state">
								</div>

								<div class="col-sm-6">
									<label class="control-label"><?php echo get_phrase('country');?></label>
									<select name="country_id" id="country" class="selectboxit">
										<option value=""><?php echo get_phrase('select_country');?></option>
										<?php
											$countries = $this->db->get('country')->result_array();
											foreach($countries as $row):
										?>
											<option value="<?php echo $row['country_id'];?>"><?php echo $row['country_name'];?></option>
										<?php endforeach;?>
									</select>
								</div>
							<!-- user address fields -->

								<label class="control-label"></label>
								<div class="col-sm-12" style="margin-top: 15px;">
									<button type="submit" id="submit_button" class="btn btn-green btn-icon icon-left">
										<?php echo get_phrase('save_user');?>
										<i class="entypo-check"></i>
									</button>
								</div>

						</div>
					</div>

				</div>

			</div>

		</div>

	</div>

</div>


<?php echo form_close();?>

<script type="text/javascript">

	$(document).ready(function() {

		//hides the user permission panel by default
		$('#permissions').hide();
		$('#user_password').hide();

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
		if(value == 2 || value == 5) {
			$('#user_password').show(500);
			$('#permissions').hide(500);
			$("input[type='password']").val('');
		} else if(value == 3) {
			$('#user_password').hide(500);
			$('#permissions').hide(500);
			$("input[type='password']").val('');
		} else if(value == 4) {
			$('#user_password').show(500);
			$('#permissions').show(500);
			$("input[type='password']").val('');
		}
	}

</script>
