<?php
	$address_info = $this->db->get_where('address' , array(
		'address_code' => $param2
	))->result_array();
	foreach($address_info as $info):
?>
<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('edit_address');?>
				</div>
			</div>

			<div class="panel-body">

				<?php echo form_open(base_url() . 'index.php?employee/address/edit/' . $param2 , array(
							'class' => 'form-horizontal form-groups ajax-submit' , 'enctype' => 'multipart/from-data'));?>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('address_line_1');?></label>

						<div class="col-sm-7">
							<input type="text" id="address_line_1" class="form-control" name="address_line_1"
								value="<?php echo $info['address_line_1'];?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('address_line_2');?></label>

						<div class="col-sm-7">
							<input type="text" id="address_line_2" class="form-control" name="address_line_2"
								value="<?php echo $info['address_line_2'];?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('city');?></label>

						<div class="col-sm-7">
							<input type="text" id="city" class="form-control" name="city"
								value="<?php echo $info['city'];?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('zip_code');?></label>

						<div class="col-sm-7">
							<input type="text" id="zip_code" class="form-control" name="zip_code"
								value="<?php echo $info['zip_code'];?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('state');?></label>

						<div class="col-sm-7">
							<input type="text" id="state" class="form-control" name="state"
								value="<?php echo $info['state'];?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('country');?></label>

						<div class="col-sm-7">
							<select name="country_id" class="selectboxit" id="country_id">
								<option value=""><?php echo get_phrase('select_a_country');?></option>
								<?php
									$countries = $this->db->get('country')->result_array();
									foreach($countries as $row):
								?>
									<option value="<?php echo $row['country_id'];?>"
										<?php if($row['country_id'] == $info['country_id']) echo 'selected';?>>
											<?php echo $row['country_name'];?>
									</option>
								<?php endforeach;?>
							</select>
						</div>
					</div>

					<input type="hidden" name="user_id" value="<?php echo $info['user_id'];?>">

					<div class="form-group">
						<label class="col-sm-3 control-label"></label>

						<div class="col-sm-7">
							<button type="submit" class="btn btn-info btn-icon icon-left">
								<?php echo get_phrase('update');?>
								<i class="entypo-check"></i>
							</button>
							<span id="preloader-form"></span>
						</div>
					</div>

				<?php echo form_close();?>

			</div>

		</div>

	</div>
</div>
<?php endforeach;?>

<!-- AJAX FORM SUBMISSION CODES -->
<script type="text/javascript">

	// ajax form plugin calls at each modal loading,
	$(document).ready(function() {

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
	});

</script>