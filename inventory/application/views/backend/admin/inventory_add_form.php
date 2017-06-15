<?php echo form_open(base_url() . 'index.php?admin/product/create/' , array(
		'class' => 'form-horizontal form-groups-bordered' , 'enctype' => 'multipart/form-data'));?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('product_info');?>
				</div>
			</div>
			<div class="panel-body">

				<div class="col-md-6">

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('code');?></label>
						<div class="col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-code"></i></span>
								<input type="text" id="code" class="form-control" name="product_code"
									value="<?php echo substr(md5(rand(0, 1000000)), 0, 7);?>" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('product_name');?></label>
						<div class="col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-menu"></i></span>
								<input type="text" id="name" class="form-control" name="name" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('brand');?></label>
						<div class="col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-star"></i></span>
								<input type="text" id="brand" class="form-control" name="brand">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('category');?></label>
						<div class="col-sm-9">
							<select class="selectboxit" name="product_category_id" id="category_id">
								<option value=""><?php echo get_phrase('select_a_category');?></option>
								<?php
									$categories = $this->db->get('product_category')->result_array();
									foreach($categories as $row):
								?>
									<option value="<?php echo $row['product_category_id'];?>"><?php echo $row['name'];?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
						<div class="col-sm-9">
							<textarea class="form-control" name="description"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('variants');?></label>
						<div class="col-sm-9">
							<select class="selectboxit" name="variant" id="variant" onchange="get_response_for_variant_selection(this.value)">
								<option value=""><?php echo get_phrase('add_variant');?></option>
								<option value="1">
									<?php echo get_phrase('product_has_variant');?>
								</option>
							</select>
							<label style="color: red; margin-top: 5px; font-weight: normal;" id="variant_alert"><?php echo get_phrase('please_select_variant'); ?></label>
						</div>
					</div>

				</div>

				<div class="col-md-6">

					<!-- <div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('cost_price');?></label>
						<div class="col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-layout"></i></span>
								<input type="text" id="cost_price_single" class="form-control" name="cost_price_single">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('selling_price');?></label>
						<div class="col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-layout"></i></span>
								<input type="text" id="selling_price_single" class="form-control" name="selling_price_single">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('initial_stock');?></label>
						<div class="col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-box"></i></span>
								<input type="text" id="quantity_single" class="form-control" name="quantity_single">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('alert_quantity');?></label>
						<div class="col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-bell"></i></span>
								<input type="text" id="alert_quantity_single" class="form-control" name="alert_quantity_single">
							</div>
						</div>
					</div> -->

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('image');?></label>

						<div class="col-sm-9">

							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
									<img src="assets/no_image.png" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new"><?php echo get_phrase('select_image');?></span>
										<span class="fileinput-exists"><?php echo get_phrase('change');?></span>
										<input type="file" name="product_image" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove');?></a>
								</div>
							</div>

						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>

<div id="variant_holder">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default" data-collapsed="0">
				<div class="panel-heading">
					<div class="panel-title">
						<?php echo get_phrase('variants');?>
					</div>
				</div>
				<div class="panel-body">
					<div id="variant_entry">

						<div class="row">

							<div class="col-sm-2" style="width: 17%;">
								<label class="control-label"><?php echo get_phrase('type');?></label>
								<input type="text" id="type" class="form-control" name="type[]"
									placeholder="Colour/Size" required>
							</div>

							<div class="col-sm-2" style="width: 17%;">
								<label class="control-label"><?php echo get_phrase('specification');?></label>
								<input type="text" id="specification" class="form-control" name="specification[]"
									placeholder="Red/Large" required>
							</div>

							<div class="col-sm-2" style="width: 10%;">
								<label class="control-label"><?php echo get_phrase('initial_stock');?></label>
								<input type="number" id="initial_stock" class="form-control" name="quantity[]" min = 0 max = 0 style="background: none;">
							</div>

							<div class="col-sm-2" style="width: 10%;">
								<label class="control-label"><?php echo get_phrase('alert_quantity');?></label>
								<input type="text" id="alert_quantity" class="form-control" name="alert_quantity[]" required>
							</div>

							<div class="col-sm-2" style="width: 15%;">
								<label class="control-label"><?php echo get_phrase('cost_price');?></label>
								<input type="text" id="cost_price" class="form-control" name="cost_price[]" required>
							</div>

							<div class="col-sm-2" style="width: 15%;">
								<label class="control-label"><?php echo get_phrase('selling_price');?></label>
								<input type="text" id="selling_price" class="form-control" name="selling_price[]" required>
							</div>

							<div class="col-sm-1" style="margin-top: 32px; width: 3%;">
						    	<i class="glyphicon glyphicon-remove" onclick="deleteParentElement(this)" style="color: #696969; cursor: pointer;"></i>
							</div>

					</div>

					</div>
					<div id="variant_entry_append"></div>
					<br>
					<div class="row">
						<div class="col-sm-3">
							<button type="button" class="btn btn-info btn-sm" onclick="append_variant_entry()">
								<i class="entypo-plus"></i> <?php echo get_phrase('add_another_variant');?>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>

<br>

<div class="row">
	<button type="submit" id="submit_button" class="btn btn-green btn-icon icon-left" style="margin-left: 12px;" onclick="show_alert()">
		<?php echo get_phrase('add_product');?>
		<i class="entypo-check"></i>
	</button>
</div>


<?php echo form_close();?>


<script type="text/javascript">

	$(document).ready(function() {

		blank_variant_entry = $('#variant_entry').html();

		$('#alert_quantity_single').prop("disabled" , true);
		$('#quantity_single').prop("disabled" , true);
		$('#selling_price_single').prop("disabled" , true);
		$('#cost_price_single').prop("disabled" , true);

		$('#variant_holder').hide();

		$('#variant_alert').hide();

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

<script type="text/javascript">

	function show_alert() {
		if($('#variant').val() == '')
			$('#variant_alert').show();
		else
			$('#variant_alert').hide();
	}

	function get_response_for_variant_selection(selector)
	{
		show_alert();
		
		if(selector == 1) {
			$('#variant_holder').show(500);
			$('#alert_quantity_single').prop("disabled" , true);
			$('#quantity_single').prop("disabled" , true);
			$('#selling_price_single').prop("disabled" , true);
			$('#cost_price_single').prop("disabled" , true);
		}
	}

	function append_variant_entry()
	{
		$('#variant_entry_append').append(blank_variant_entry);
	}

	function deleteParentElement(n)
	{
		n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
	}

</script>
