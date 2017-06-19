<ol class="breadcrumb bc-3">

	<li>
		<a href="<?php echo base_url();?>index.php?customer/dashboard">
			<i class="entypo-home"></i>
				<?php echo get_phrase('dashboard');?>
		</a>
	</li>

	<li class="active">
		<strong><?php echo get_phrase('add_new_order');?></strong>
	</li>

</ol>

<?php echo form_open(base_url() . 'index.php?customer/sales_order/add/' , array(
		'class' => 'form-horizontal form-groups validate' , 'enctype' => 'multipart/from-data' , 'id' => 'validated_form'));?>

<div class="row">

	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-user"></i> &nbsp;<?php echo get_phrase('customer_information');?>
				</div>
			</div>
			<div class="panel-body">

				<div class="col-sm-5">

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('order_code');?></label>
						<div class="col-sm-8">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-code"></i></span>
								<input type="text" id="order_code" class="form-control" name="order_code"
									value="<?php echo substr(md5(rand(0, 1000000)), 0, 7);?>" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('customer');?></label>
						<div class="col-sm-8">
              <?php
                $this->db->where('user_id', $this->session->userdata('login_user_id'));
                $query_result = $this->db->get('user')->row_array();
              ?>
              <select name="customer_user_id" class = "selectboxit" id="customer" onchange="get_address(this.value)" required>
                <option value=""><?php echo get_phrase('select_a_customer');?></option>
									<option value="<?php echo $this->session->userdata('login_user_id');?>"><?php echo $query_result['name'];?></option>
							</select>
						</div>
					</div>


          <!-- <?php
            $this->db->where('type', '1');
            $admin_array = $this->db->get('user')->result_array();
          ?> -->
					<div class="form-group" style="display: none;">
						<label class="col-sm-3 control-label"><?php echo get_phrase('seller');?></label>
						<div class="col-sm-8">
							<select name="seller_user_id" class="selectboxit" id="seller">
                    <option value=' '>Admin</option>"
							</select>
						</div>
					</div>

				</div>

				<div class="col-sm-7">

					<div id="selected_customer_address">
						<div class="form-group">
							<label class="col-sm-4 control-label"><?php echo get_phrase('billing_address');?></label>
							<div class="col-sm-7">
								<select name="" class="selectboxit" id="">
									<option value=""><?php echo get_phrase('select_customer_first');?></option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label"><?php echo get_phrase('shipping_address');?></label>
							<div class="col-sm-7">
								<select name="" class="selectboxit" id="">
									<option value=""><?php echo get_phrase('select_customer_first');?></option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label"><?php echo get_phrase('date');?></label>
						<div class="col-sm-7">
							<div class="input-group">
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
								<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="date_added"
									value="<?php echo date('D, d M Y');?>">
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

</div>

<div class="row">

	<div class="col-md-12">

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-basket"></i> &nbsp;<?php echo get_phrase('products');?>
				</div>
			</div>

			<div class="panel-body">

				<div class="col-sm-12">
					<div class="col-sm-2" style="width: 30%;">
						<strong><?php echo get_phrase('products');?></strong>
					</div>
					<div class="col-sm-2" style="width: 10%;">
						<strong><?php echo get_phrase('price');?></strong>
					</div>
					<div class="col-sm-2" style="width: 9%; text-align: center;">
						<strong><?php echo get_phrase('in_stock');?></strong>
					</div>
					<div class="col-sm-2" style="width: 9%;">
						<strong><?php echo get_phrase('qty');?></strong>
					</div>
					<div class="col-sm-2" style="width: 12%;">
						<strong><?php echo get_phrase('discount');?> %</strong>
					</div>
					<div class="col-sm-2" style="width: 15%;">
						<strong><?php echo get_phrase('tax');?></strong>
					</div>
					<div class="col-sm-2" style="width: 12%; text-align: center;">
						<strong><?php echo get_phrase('sub_total');?></strong>
					</div>
				</div>

				<div class="col-sm-12"><hr /></div>

				<div class="row">
					<div class="col-sm-12">
						<div id="sales_order_entry_1">
							<div class="col-sm-2" style="width: 30%;">
								<select class="form-control select2" onchange="show_response(this.value)">
									<option value=""><?php echo get_phrase('select_a_product');?></option>
									<?php
										$products = $this->db->get('variant')->result_array();
										foreach($products as $row):
											$archive_status = $this->db->get_where('product' , array(
												'product_id' => $row['product_id']
											))->row()->archive_status;
											$stock_quantity = $row['quantity'];
											if($archive_status == 0):
									?>
										<?php if($row['is_variant'] == 0):?>
											<option value="<?php echo $row['variant_id'];?>"
												<?php if($stock_quantity == 0) echo 'disabled';?>>
												<?php
													echo $this->db->get_where('product' , array(
														'product_id' => $row['product_id']
													))->row()->name;
												?>
												<?php if($stock_quantity == 0) echo '(' . get_phrase('out_of_stock') . ')';?>
											</option>
										<?php endif;?>
										<?php if($row['is_variant'] == 1):?>
											<option value="<?php echo $row['variant_id'];?>"
												<?php if($stock_quantity == 0) echo 'disabled';?>>
												<?php
													echo $this->db->get_where('product' , array(
														'product_id' => $row['product_id']
													))->row()->name . ' - ' . $row['type'] . ' : ' . $row['specification'];
												?>
												<?php if($stock_quantity == 0) echo '(' . get_phrase('out_of_stock') . ')';?>
											</option>
										<?php endif;?>
											<?php endif;?>
									<?php endforeach;?>
								</select>
							</div>
							<div class="col-sm-2" style="width: 10%;">
								<input id="" type="text" class="form-control" disabled="disabled">
							</div>
							<div class="col-sm-2" style="width: 9%;">

							</div>
							<div class="col-sm-2" style="width: 9%;">
								<input id="" type="text" class="form-control" disabled="disabled">
							</div>
							<div class="col-sm-2" style="width: 12%;">
								<input id="" type="text" class="form-control" disabled="disabled">
							</div>
							<div class="col-sm-2" style="width: 15%;">
								<input id="" type="text" class="form-control" disabled="disabled">
							</div>
							<div class="col-sm-2" style="width: 12%;">

							</div>
							<div class="col-sm-2" style="width: 2%;">
								<i class="glyphicon glyphicon-remove" style="color: #676767; cursor: pointer;"
									onclick="deleteParentElement(this)"></i>
							</div>
						</div>
					</div>
				</div>


				<div id="sales_order_entry_append"></div>

				<div class="col-sm-12" style="margin-top: 15px;">
					<button type="button" id="add_entry_button" class="btn btn-info btn-icon icon-left btn-sm"
						onclick="append_sales_order_entry()">
						<?php echo get_phrase('add_another_product');?>
						<i class="entypo-plus"></i>
					</button>
				</div>

			</div>
			<br>
			<div class="well well-sm" style="text-align: right;">
				<strong><?php echo strtoupper(get_phrase('total'));?> : <?php echo $this->info_model->get_currency_code();?></strong>
				<strong id="grand_total"></strong>
			</div>
		</div>

	</div>

</div>

<center>

	<button type="button" id="submit_button" class="btn btn-green btn-icon icon-left">
		<?php echo get_phrase('create_order');?>
		<i class="entypo-check"></i>
	</button>

</center>


<?php echo form_close();?>

<script type="text/javascript">

	$(document).ready(function() {
		// disables the new entry adding button by default
		$('#add_entry_button').prop('disabled' , true);
		// Select2 Dropdown replacement
		if($.isFunction($.fn.select2))
		{
			$(".select2").each(function(i, el)
			{
				var $this = $(el),
					opts = {
						allowClear: attrDefault($this, 'allowClear', false)
					};

				$this.select2(opts);
				$this.addClass('visible');
				//$this.select2("open");
			});

			if($.isFunction($.fn.niceScroll))
			{
				$(".select2-results").niceScroll({
					cursorcolor: '#d4d4d4',
					cursorborder: '1px solid #ccc',
					railpadding: {right: 3}
				});
			}
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
	});

</script>

<script type="text/javascript">

	var count = 1;

	function get_address(user_id)
	{
		$.ajax({
			url: '<?php echo base_url();?>index.php?customer/reload_customer_address/' + user_id,
			success: function(response)
			{
				jQuery('#selected_customer_address').html(response);
			}
		});
	}

	function show_response(variant_id)
	{
		$.ajax({
			url: '<?php echo base_url();?>index.php?customer/sales_order_entry_response/' + variant_id,
			success: function(response)
			{
				jQuery('#sales_order_entry_1').html(response);
			}
		});
	}

	function append_sales_order_entry()
	{
		var selected_variants = '';
		$(".variant").each(function() {
		    selected_variants += $(this).val() + '.';
		    console.log(selected_variants);
		});
		count++;
		$.ajax({
			url: '<?php echo base_url();?>index.php?customer/sales_order_append_entry_response/' + count + '/' + selected_variants,
			success: function(response)
			{
				jQuery('#sales_order_entry_append').append(response);
			}
		});
	}

	function deleteParentElement(n)
	{
		n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
		calculate_grand_total();
	}

</script>

<!-- form validation script -->
<script type="text/javascript">
	$('#submit_button').on('click', function() {
		var selected_customer_id = $('#customer').val();
		if (selected_customer_id == '') {
			toastr.error('You can not create a sales order without selecting customer');
		} else {
			$('#validated_form').submit();
		}
	});
</script>