<hr />

<?php
	$sales_order_info = $this->db->get_where('sales_order' , array(
		'order_code' => $order_code
	))->result_array();
	foreach($sales_order_info as $row):
?>
<?php if($row['order_status'] != 10):?>
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
			<div class="label label-danger"><?php echo get_phrase('not_paid');?></div>
		<?php endif;?>
		<?php if($row['payment_status'] == 1):?>
			<div class="label label-success"><?php echo get_phrase('paid');?></div>
		<?php endif;?>
		<?php if($row['payment_status'] == 2):?>
			<div class="label label-warning"><?php echo get_phrase('partially_paid');?></div>
		<?php endif;?>
	</div>


</div>


<hr />
<?php endif;?>

<div class="row">
	<div class="col-md-2">
	<?php if($row['order_status'] == 0):?>
		<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/confirm" style="text-align: left;"
			class="btn btn-<?php if($view_page == 'sales_order_confirm') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block">
			<?php echo get_phrase('approve_order');?>
			<i class="entypo-help"></i>
		</a>
	<?php endif;?>
		<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/overview" style="text-align: left;"
			class="btn btn-<?php if($view_page == 'sales_order_overview') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('overview');?>
			<i class="entypo-info"></i>
		</a>
		<?php if($row['order_status'] != 10):?>
		<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/shipment" style="text-align: left;"
			class="btn btn-<?php if($view_page == 'sales_order_shipment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('shipments');?>
			<i class="entypo-flight"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/invoice" style="text-align: left;"
			class="btn btn-<?php if($view_page == 'sales_order_invoice') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('invoice');?>
			<i class="entypo-docs"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/payment" style="text-align: left;"
			class="btn btn-<?php if($view_page == 'sales_order_payment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('payments');?>
			<i class="entypo-credit-card"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/comment" style="text-align: left;"
			class="btn btn-<?php if($view_page == 'sales_order_comment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('comments');?>
			<i class="entypo-comment"></i>
		</a>
	<?php endif;?>
	</div>
	<?php if($row['order_status'] == 10):?>
		<div class="col-md-10">
			<center>
				<i class="fa fa-ban fa-4x"></i>
				<h3 style="color: #626262;">You can not add invoices to a canceled order</h3>
			</center>
		</div>
	<?php endif;?>
	<?php if($row['order_status'] != 10):?>
	<div class="col-md-10">

		<!-- panel for ordered invoice -->
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-docs"></i> &nbsp;<?php echo get_phrase('invoice');?>
				</div>
				<?php
					$query = $this->db->get_where('invoice' , array(
						'order_id' => $row['order_id'], 'order_type' => 'sales'
					));
					if($query->num_rows() < 1):
				?>
				<div class="panel-options">
					<a href="#" style="color: #949494;">
						<?php echo get_phrase('no_invoice_available');?>
					</a>
				</div>
				<?php endif;?>
			</div>

			<div class="panel-body with-table">

				<?php if($query->num_rows() > 0):?>

					<table class="table table-bordered table-responsive">
						<thead>
							<th width="4%;"><strong>#</strong></th>
							<th><strong><?php echo get_phrase('invoice_code');?></strong></th>
							<th><strong><?php echo get_phrase('amount');?></strong></th>
							<th><strong><?php echo get_phrase('date_added');?></strong></th>
							<th><strong><?php echo get_phrase('due_date');?></strong></th>
							<th><strong><?php echo get_phrase('status');?></strong></th>
							<th><strong><?php echo get_phrase('options');?></strong></th>
						</thead>
						<tbody>
						<?php
							$count = 1;
							$invoices = $query->result_array();
							foreach($invoices as $invoice):
						?>
							<tr>
								<td><?php echo $count++;?></td>
								<td><?php echo $invoice['invoice_code'];?></td>
								<td><?php echo $invoice['total_amount'];?></td>
								<td>
									<?php if($invoice['date_added'] != '') echo date('D, d M Y' , $invoice['date_added']);?>
								</td>
								<td>
									<?php if($invoice['due_timestamp'] != '') echo date('D, d M Y' , $invoice['due_timestamp']);?>
								</td>
								<td>
									<?php if($invoice['status'] == 0):?>
										<div class="label label-danger">
											<?php echo get_phrase('unpaid');?>
										</div>
									<?php endif;?>
									<?php if($invoice['status'] == 1):?>
										<div class="label label-success">
											<?php echo get_phrase('paid');?>
										</div>
									<?php endif;?>
								</td>
								<td>
									<a href="<?php echo base_url();?>index.php?admin/sales_order_invoice_print_view/<?php echo $invoice['invoice_id'];?>"
										class="btn btn-default btn-xs tooltip-primary" target="_blank"
											data-toggle="tooltip" data-original-title="<?php echo get_phrase('print');?>">
										<i class="entypo-print" style="color: #949494;"></i>
									</a>
									<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/sales_order_invoice_modal_view/<?php echo $invoice['invoice_id'];?>')"
										class="btn btn-default btn-xs tooltip-primary"
											data-toggle="tooltip" data-original-title="<?php echo get_phrase('view');?>">
										<i class="entypo-eye" style="color: #949494;"></i>
									</a>
									<?php if($invoice['status'] != 1):?>
										<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/sales_order/delete_invoice/<?php echo $invoice['invoice_id'];?>' ,
																	'<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $order_code;?>/invoice')"
											class="btn btn-default btn-xs tooltip-primary"
												data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>">
											<i class="entypo-trash" style="color: #949494;"></i>
										</a>
									<?php endif;?>
								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>

				<?php endif;?>


			</div>
		</div>
		<!-- panel for ordered invoice -->

		<?php
			$total_ordered_quantity  = $this->order_model->get_total_ordered_quantity_of_sales_order($row['order_id']);
			$total_invoiced_quantity = $this->order_model->get_all_invoiced_quantity_of_sales_order($row['order_id']);
		?>

		<button type="button" class="btn btn-info btn-icon icon-left btn-sm" id="add_new_invoice"
			onclick="show_new_invoice_form()">
			<?php echo get_phrase('add_new_invoice');?>
			<i class="fa fa-plus"></i>
		</button>

		<!-- panel for new invoice -->
		<div class="panel panel-default" data-collapsed="0" id="new_invoice_form">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-plus"></i> &nbsp;<?php echo get_phrase('create_invoice');?>
				</div>
			</div>
			<div class="panel-body">

				<?php echo form_open(base_url().'index.php?admin/sales_order/create_invoice/' . $order_code , array(
					'class' => 'form-horizontal form-groups' , 'enctype' => 'multipart/from-data'));?>

					<div class="form-group" id="invoice_code">
						<label class="col-sm-3 control-label"><?php echo get_phrase('invoice_code');?></label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="invoice_code"
								value="<?php echo substr(md5(rand(0, 1000000)), 0, 7);?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('due_date');?></label>
						<div class="col-sm-4">
							<div class="input-group">
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
								<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="due_timestamp"
									value="<?php echo date('D, d M Y');?>">
							</div>
						</div>
					</div>

					<!-- products for shipment -->
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th width="32%"><strong><?php echo get_phrase('product');?></strong></th>
								<th><strong><?php echo get_phrase('price');?></strong></th>
								<th><strong><?php echo get_phrase('ordered_qty');?></strong></th>
								<th><strong><?php echo get_phrase('invoiced_qty');?></strong></th>
								<th><strong><?php echo get_phrase('discount');?> %</strong></th>
								<th><strong><?php echo get_phrase('tax');?> %</strong></th>
								<th><strong><?php echo get_phrase('new_invoice_qty');?></strong></th>
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
									<input type="hidden" name="variant_id[]" value="<?php echo $product->variant_id;?>">
								</td>
								<td>
									<?php echo $product->selling_price;?>
									<input type="hidden" name="selling_price[]" value="<?php echo $product->selling_price;?>">
								</td>
								<td align="center">
									<?php echo $product->ordered_quantity;?>
									<input type="hidden" name="ordered_quantity[]" value="<?php echo $product->ordered_quantity;?>">
								</td>
								<td align="center">
									<?php
										$invoiced_quantity =  $this->order_model->get_invoice_quantity_of_variant_of_sales_order($row['order_id'] , $product->variant_id);
										echo $invoiced_quantity;
									?>
								</td>
								<td>
									<?php echo $product->discount;?>
									<input type="hidden" name="discount[]" value="<?php echo $product->discount;?>">
								</td>
								<td>
									<?php echo $product->tax;?>
									<input type="hidden" name="tax_value[]" value="<?php echo $product->tax;?>">
								</td>
								<td>
									<?php $allowed_quantity = $product->ordered_quantity - $invoiced_quantity;?>
									<select class="form-control selectboxit" name="invoice_quantity[]">
										<?php for($x = $allowed_quantity; $x >= 0; $x--):?>
											<option value="<?php echo $x;?>"><?php echo $x;?></option>
										<?php endfor;?>
									</select>
								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
					<!-- products for shipment -->

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
<?php endif;?>
</div>

<?php endforeach;?>

<script type="text/javascript">

	$(document).ready(function() {

		// hides the new invoice form
		$('#new_invoice_form').hide();

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

	function show_new_invoice_form()
	{
		$('#add_new_invoice').hide(500);
		$('#new_invoice_form').show(500);
	}

	// custom function for data deletion by ajax and post refreshing call
	function delete_data(delete_url , post_refresh_url)
	{
		var delete_message = '<?php echo get_phrase('order_deleted');?>';
		// showing user-friendly pre-loader image
		$('#preloader-delete').html('<img src="assets/preloader.GIF" style="height:15px;margin-top:-10px;" />');

		// disables the delete and cancel button during deletion ajax request
		document.getElementById("delete_link").disabled=true;
		document.getElementById("delete_cancel_link").disabled=true;

		$.ajax({
			url: delete_url,
			success: function(response)
			{
				// remove the preloader
				$('#preloader-delete').html('');

				// show deletion success msg.
				toastr.info(delete_message);

				// hide the delete dialog box
				$('#modal_delete').modal('hide');

				// enables the delete and cancel button after deletion ajax request success
				document.getElementById("delete_link").disabled=false;
				document.getElementById("delete_cancel_link").disabled=false;

				// reload the table
				reload_data(post_refresh_url);
			}
		});
	}

	// function for reloading table data
	function reload_data(url)
	{
		$(location).attr('href' , url);
	}

</script>
