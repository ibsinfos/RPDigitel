<hr />

<?php 
	$sales_order_info = $this->db->get_where('sales_order' , array(
		'order_code' => $order_code
	))->result_array();
	foreach($sales_order_info as $row):
?>
<div class="row" style="font-size: 13px; margin-left: 5px;">

	<?php if($row['order_status'] == 0):?><i class="fa fa-bell" style="color: #fad839;"></i> 
		<?php echo get_phrase('pending');?> &nbsp;
	<i class="fa fa-chevron-right"></i> &nbsp;<?php endif;?>

	<i class="fa fa-circle" <?php if($row['order_status'] >= 1):?> style="color:#00a651;"<?php endif;?>></i> 
		<?php echo get_phrase('confirmed');?> &nbsp;
	<i class="fa fa-chevron-right"></i> &nbsp;

	<i class="fa fa-circle" <?php if($row['order_status'] >= 2):?> style="color:#00a651;"<?php endif;?>></i> 
		<?php echo get_phrase('partially_shipped');?> &nbsp;
	<i class="fa fa-chevron-right"></i> &nbsp;

	<i class="fa fa-circle" <?php if($row['order_status'] >= 3):?> style="color:#00a651;"<?php endif;?>></i> 
		<?php echo get_phrase('shipped');?> &nbsp;
	<i class="fa fa-chevron-right"></i> &nbsp;

	<i class="fa fa-circle" <?php if($row['order_status'] >= 4):?> style="color:#00a651;"<?php endif;?>></i> 
		<?php echo get_phrase('delivered');?>

	<div class="pull-right" style="margin-right: 14px;">
		<?php if($row['payment_status'] == 0):?>
			<i class="fa fa-circle" style="color: #cc2424;"></i> <?php echo get_phrase('not_paid');?>
		<?php endif;?>
		<?php if($row['payment_status'] == 1):?>
			<i class="fa fa-circle" style="color: #00a651;"></i> <?php echo get_phrase('paid');?>
		<?php endif;?>
		<?php if($row['payment_status'] == 2):?>
			<i class="fa fa-circle" style="color: #fad839;"></i> <?php echo get_phrase('partially_paid');?>
		<?php endif;?>
	</div> 

</div>

<hr />

<div class="row">
	
	<div class="col-md-12">
		<div class="tabs-vertical-env">
			<ul class="nav tabs-vertical">
				<?php if($row['order_status'] == 0):?>
					<li class="active">
						<a href="#v-approval" data-toggle="tab"><?php echo get_phrase('approve_order');?></a>
					</li>
				<?php endif;?>
				<li class="<?php if($row['order_status'] == 0) echo 'disabled'; else echo 'active';?>">
					<a href="#v-overview" data-toggle="<?php if($row['order_status'] != 0) echo 'tab';?>"><?php echo get_phrase('overview');?></a>
				</li>
				<li class="<?php if($row['order_status'] == 0) echo 'disabled';?>">
					<a href="#v-shipments" data-toggle="<?php if($row['order_status'] != 0) echo 'tab';?>"><?php echo get_phrase('shipments');?></a>
				</li>
				<li class="<?php if($row['order_status'] == 0) echo 'disabled';?>">
					<a href="#v-invoice" data-toggle="<?php if($row['order_status'] != 0) echo 'tab';?>"><?php echo get_phrase('invoice');?></a>
				</li>
				<li class="<?php if($row['order_status'] == 0) echo 'disabled';?>">
					<a href="#v-payments" data-toggle="<?php if($row['order_status'] != 0) echo 'tab';?>"><?php echo get_phrase('payments');?></a>
				</li>
				<li class="<?php if($row['order_status'] == 0) echo 'disabled';?>">
					<a href="#v-comments" data-toggle="<?php if($row['order_status'] != 0) echo 'tab';?>"><?php echo get_phrase('comments');?></a>
				</li>
			</ul>
			<div class="tab-content">
			<?php if($row['order_status'] == 0):?>
				<?php echo form_open(base_url() . 'index.php?admin/sales_order/confirm/' . $order_code);?>
				<div class="tab-pane active" id="v-approval">
					<div class="panel panel-default" data-collapsed="0">
						<div class="panel-body">
							<table class="table table-bordered table-responsive">
								<thead>
									<tr>
										<th width="35%"><?php echo get_phrase('product');?></th>
										<th width="10%;"><?php echo get_phrase('price');?></th>
										<th width="10%;"><?php echo get_phrase('in_stock');?></th>
										<th width="9%;"><?php echo get_phrase('qty');?></th>
										<th width="12%;"><?php echo get_phrase('discount');?> %</th>
										<th><?php echo get_phrase('tax');?> %</th>
										<th><?php echo get_phrase('sub_total');?></th>
									</tr>
								</thead>
								<tbody>
								<?php 
									$ordered_products = json_decode($row['order_entries']);
									foreach($ordered_products as $product):
										$product_id = $this->db->get_where('variant' , array(
											'variant_id' => $product->variant_id
										))->row()->product_id;
										$type = $this->db->get_where('variant' , array(
											'variant_id' => $product->variant_id
										))->row()->type;
										$specification = $this->db->get_where('variant' , array(
											'variant_id' => $product->variant_id
										))->row()->specification;
										$in_stock = $this->db->get_where('variant' , array(
											'variant_id' => $product->variant_id
										))->row()->quantity;
										$is_variant = $this->db->get_where('variant' , array(
											'variant_id' => $product->variant_id
										))->row()->is_variant;
								?>
									<tr>
										<td>
											<?php 
												if($is_variant == 0)
													echo $this->db->get_where('product' , array('product_id' => $product_id))->row()->name;
												if($is_variant == 1)
													echo $this->db->get_where('product' , array(
														'product_id' => $product_id
													))->row()->name . ' - ' . $type . ' : ' . $specification;
											?>
										</td>
										<td>
											<?php echo $product->selling_price;?>
										</td>
										<td>
											<?php echo $in_stock;?>
										</td>
										<td>
											<?php echo $product->ordered_quantity;?>
										</td>
										<td>
											<?php echo $product->discount;?>
										</td>
										<td>
											<?php echo $product->tax;?>
										</td>
										<td>
											<?php echo $product->sub_total;?>
										</td>
									</tr>
								<?php endforeach;?>
								</tbody>
							</table>
							<p style="font-size: 13px;">
								To process this order, you need to confirm the order first. Before confirming check your stock and customer
								information. After you have confirmed the order, you can create invoice and shipments.
							</p>
							<br>
							<p>
								<button type="submit" class="btn btn-info btn-icon icon-left btn-sm">
									<?php echo get_phrase('confirm_order');?>
									<i class="entypo-check"></i>
								</button>
							</p>
						</div>
					
					</div>
				</div>
				<?php echo form_close();?>
				<?php endif;?>
				<div class="tab-pane <?php if($row['order_status'] != 0) echo 'active';?>" id="v-overview">
					overview goes here
				</div>
				<div class="tab-pane" id="v-shipments">

					<div class="panel panel-default" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-truck"></i> <?php echo get_phrase('shipments');?>
							</div>
						</div>
						<div class="panel-body">
							
							<center>
								<strong>No shipment entry available</strong>
							</center>
							
						</div>
					</div>

					<div class="panel panel-default" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-truck"></i> <?php echo get_phrase('new_shipment');?>
							</div>
						</div>
						<div class="panel-body">
							
							<?php echo form_open(base_url().'index.php?admin/' , array(
								'class' => 'form-horizontal form-groups' , 'enctype' => 'multipart/from-data'));?>

								<div class="form-group" id="tracking_number">
									<label class="col-sm-3 control-label"><?php echo get_phrase('tracking_number');?></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="tracking_number"
											value="<?php echo substr(md5(rand(0, 1000000)), 0, 7);?>">
									</div>
								</div>

								<div class="form-group" id="shipping_methods">
									<label class="col-sm-3 control-label"><?php echo get_phrase('shipping_method');?></label>
									<div class="col-sm-4">
										<select name="shipping_method_id" class="selectboxit" id="shipping_method"
											onchange="check_shipping_method(this.value)">
											<option value=""><?php echo get_phrase('select_a_shipping_method');?></option>
											<?php
												$shipping_methods = $this->db->get('shipping_method')->result_array();
												foreach($shipping_methods as $row):
											?>
											<option value="<?php echo $row['shipping_method_id'];?>"><?php echo $row['name'];?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>

								<div class="form-group" id="courier_companies">
									<label class="col-sm-3 control-label"><?php echo get_phrase('courier_name');?></label>
									<div class="col-sm-4">
										<select name="courier_id" class="selectboxit" id="courier">
											<option value=""><?php echo get_phrase('select_a_courier_name');?></option>
											<?php
												$couriers = $this->db->get('courier')->result_array();
												foreach($couriers as $row):
											?>
											<option value="<?php echo $row['courier_id'];?>"><?php echo $row['name'];?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
									<div class="col-sm-4">
										<div class="input-group">
											<div class="input-group-addon">
												<a href="#"><i class="entypo-calendar"></i></a>
											</div>
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy"
												value="<?php echo date('D, d M Y');?>">
										</div>
									</div>
								</div>

								<!-- products for shipment -->
								<table class="table table-bordered responsive">
									<thead>
										<tr>
											<th width="5%"><b>#</b></th>
											<th width="33%"><b><?php echo get_phrase('product');?></b></th>
											<th><b><?php echo get_phrase('in_stock');?></b></th>
											<th><b><?php echo get_phrase('qty');?></b></th>
											<th><b><?php echo get_phrase('ship_qty');?></b></th>
											<th><b><?php echo get_phrase('price');?></b></th>
											<th><b><?php echo get_phrase('discount');?></b></th>
											<th><b><?php echo get_phrase('tax');?></b></th>
											<th><b><?php echo get_phrase('sub_total');?></b></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Test product</td>
											<td align="center">12</td>
											<td align="center">4</td>
											<td align="center">
												<input class="form-control" type="text" name="" value="4" style="width: 48px;">
											</td>
											<td align="center">123</td>
											<td align="center">5%</td>
											<td align="center">2%</td>
											<td align="center">112</td>
										</tr>
									</tbody>
								</table>
								<div class="well well-sm" style="text-align: right;">
									<strong>
										<?php echo strtoupper(get_phrase('total'));?> (<?php echo $this->info_model->get_currency_code();?>) : 112.00
									</strong>
								</div>
								<!-- products for shipment -->

								<div class="form-group">
									<div class="col-sm-4">
										<button type="submit" class="btn btn-info btn-icon icon-left btn-sm">
											<?php echo get_phrase('create_shipment');?>
											<i class="fa fa-truck"></i>
										</button>
									</div>
								</div>

							<?php echo form_close();?>
							
						</div>
					</div>

				</div>

				<div class="tab-pane" id="v-invoice">

					<div class="panel panel-default" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-file-text-o"></i> <?php echo get_phrase('invoices');?>
							</div>
						</div>
						<div class="panel-body">
							
							<center>
								<strong>No invoice created</strong>
							</center>
							
						</div>
					</div>

					<div class="panel panel-default" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-file-text-o"></i> <?php echo get_phrase('create_invoice');?>
							</div>
						</div>
						<div class="panel-body">
							
							<?php echo form_open(base_url().'index.php?admin/' , array(
								'class' => 'form-horizontal form-groups' , 'enctype' => 'multipart/from-data'));?>

								<div class="form-group">
									<label class="col-sm-3 control-label"><?php echo get_phrase('due_date');?></label>
									<div class="col-sm-4">
										<div class="input-group">
											<div class="input-group-addon">
												<a href="#"><i class="entypo-calendar"></i></a>
											</div>
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy"
												value="<?php echo date('D, d M Y');?>">
										</div>
									</div>
								</div>

								<!-- products for invoice -->
								<table class="table table-bordered responsive">
									<thead>
										<tr>
											<th width="5%"><b>#</b></th>
											<th width="33%"><b><?php echo get_phrase('product');?></b></th>
											<th><b><?php echo get_phrase('in_stock');?></b></th>
											<th><b><?php echo get_phrase('qty');?></b></th>
											<th><b><?php echo get_phrase('invoice_qty');?></b></th>
											<th><b><?php echo get_phrase('price');?></b></th>
											<th><b><?php echo get_phrase('discount');?></b></th>
											<th><b><?php echo get_phrase('tax');?></b></th>
											<th><b><?php echo get_phrase('sub_total');?></b></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Test product</td>
											<td align="center">12</td>
											<td align="center">4</td>
											<td align="center">
												<input class="form-control" type="text" name="" value="4" style="width: 48px;">
											</td>
											<td align="center">123</td>
											<td align="center">5%</td>
											<td align="center">2%</td>
											<td align="center">112</td>
										</tr>
									</tbody>
								</table>
								<div class="well well-sm" style="text-align: right;">
									<strong>
										<?php echo strtoupper(get_phrase('total'));?> (<?php echo $this->info_model->get_currency_code();?>) : 112.00
									</strong>
								</div>
								<!-- products for invoice -->

								<div class="form-group">
									<div class="col-sm-4">
										<button type="submit" class="btn btn-info btn-icon icon-left btn-sm">
											<?php echo get_phrase('create_invoice');?>
											<i class="fa fa-file-text-o"></i>
										</button>
									</div>
								</div>

							<?php echo form_close();?>

						</div>
					</div>

				</div>

				<div class="tab-pane" id="v-payments">

				<div class="row">

					<div class="panel panel-default" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-credit-card"></i> <?php echo get_phrase('payments');?>
							</div>
						</div>
						<div class="panel-body">
							
							<center>
								<strong>No payment entry available</strong>
							</center>
							
						</div>
					</div>

					<div class="panel panel-default" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-credit-card"></i> <?php echo get_phrase('take_payment');?>
							</div>
						</div>
						<div class="panel-body">
							
							<div class="col-md-6">

								<?php echo form_open(base_url().'index.php?admin/' , array(
									'class' => 'form-horizontal form-groups' , 'enctype' => 'multipart/from-data'));?>

									<div class="form-group">
										<label class="col-sm-3 control-label"><?php echo get_phrase('invoice');?></label>
										<div class="col-sm-8">
											<select name="invoice_id" class="selectboxit" id="invoice_id">
												<option value=""><?php echo get_phrase('select_an_invoice');?></option>
												<option value="1">SampleInvoice</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label"><?php echo get_phrase('amount');?></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="amount"
												placeholder="<?php echo get_phrase('enter_payment_amount');?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label"><?php echo get_phrase('method');?></label>
										<div class="col-sm-8">
											<select name="payment_method" class="selectboxit" id="payment_method">
												<option value=""><?php echo get_phrase('select_payment_method');?></option>
												<option value="1"><?php echo get_phrase('cash');?></option>
												<option value="2"><?php echo get_phrase('cheque');?></option>
												<option value="3"><?php echo get_phrase('card');?></option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon">
													<a href="#"><i class="entypo-calendar"></i></a>
												</div>
												<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="timestamp"
													value="<?php echo date('D, d M Y');?>">
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label"><?php echo get_phrase('notes');?></label>
										<div class="col-sm-8">
											<textarea class="form-control" name="notes"></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label"></label>
										<div class="col-sm-8">
											<button type="submit" class="btn btn-info btn-icon icon-left btn-sm">
												<?php echo get_phrase('take_payment');?>
												<i class="fa fa-credit-card"></i>
											</button>
										</div>
									</div>

								<?php echo form_close();?>
							
							</div>

							<div class="col-md-6">
								<div class="payemnt_summary">
									<?php include 'sales_order_invoice_payment_summary.php';?>
								</div>
							</div>
							
						</div>
					</div>

					</div>

				</div>

				<div class="tab-pane" id="v-comments">

					<?php echo form_open(base_url().'index.php?admin/' , array(
							'class' => 'form-horizontal form-groups' , 'enctype' => 'multipart/from-data'));?>

						<div class="form-group">
							<div class="col-sm-12">
								<textarea class="form-control" name="comment" placeholder="<?php echo get_phrase('write_your_comment');?>....."></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-8">
								<button type="submit" class="btn btn-info btn-icon icon-left btn-sm">
									<?php echo get_phrase('post');?>
									<i class="fa fa-comment"></i>
								</button>
							</div>
						</div>

					<?php echo form_close();?>

					<!-- comments -->
					<div class="comments_body">
						<?php include 'sales_order_comments_body.php';?>
					</div>
					<!-- comments -->

				</div>

			</div>
		</div>	
	</div>

</div>

<?php endforeach;?>

<script type="text/javascript">

	$(document).ready(function() {
		
		// hides the courier company selection 
		$('#courier_companies').hide();

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

	function check_shipping_method(value)
	{
		if(value == 2) {
			$('#courier_companies').show(500);
		}else {
			$('#courier_companies').hide(500);
		}
	}

</script>