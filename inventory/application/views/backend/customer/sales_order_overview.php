<hr />

<?php
	$sales_order_info = $this->db->get_where('sales_order' , array(
		'order_code' => $order_code
	))->result_array();
	foreach($sales_order_info as $row):
		$ordered_products = json_decode($row['order_entries']);
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
<?php endif;?>

<div class="row">
	<div class="col-md-2">
	<?php if($row['order_status'] == 0):?>
		<a href="<?php echo base_url();?>index.php?customer/sales_order_view/<?php echo $row['order_code'];?>/confirm"
			class="btn btn-<?php if($view_page == 'sales_order_confirm') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block">
			<?php echo get_phrase('approve_order');?>
			<i class="entypo-help"></i>
		</a>
	<?php endif;?>
		<a href="<?php echo base_url();?>index.php?customer/sales_order_view/<?php echo $row['order_code'];?>/overview"
			class="btn btn-<?php if($view_page == 'sales_order_overview') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('overview');?>
			<i class="entypo-info"></i>
		</a>
		<?php if($row['order_status'] != 10):?>
		<a href="<?php echo base_url();?>index.php?customer/sales_order_view/<?php echo $row['order_code'];?>/shipment"
			class="btn btn-<?php if($view_page == 'sales_order_shipment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('shipments');?>
			<i class="entypo-flight"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?customer/sales_order_view/<?php echo $row['order_code'];?>/invoice"
			class="btn btn-<?php if($view_page == 'sales_order_invoice') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('invoice');?>
			<i class="entypo-docs"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?customer/sales_order_view/<?php echo $row['order_code'];?>/payment"
			class="btn btn-<?php if($view_page == 'sales_order_payment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('payments');?>
			<i class="entypo-credit-card"></i>
		</a>
	<?php endif;?>
	</div>
	<div class="col-md-10">

		<div class="col-sm-3">
			<?php
				// calculating number of products ordered
				$ordered_product_count = 0;
				foreach($ordered_products as $ordered_product) {
					$ordered_product_count += $ordered_product->ordered_quantity;
				}
			?>
			<div class="tile-stats tile-cyan">
				<div class="icon"><i class="entypo-basket"></i></div>
				<div class="num" data-start="0" data-end="<?php echo $ordered_product_count;?>" data-prefix="" data-postfix="" data-duration="1500" data-delay="0"><?php echo $ordered_product_count;?></div>

				<h3><?php echo get_phrase('products_ordered');?></h3>
			</div>
		</div>
		<div class="col-sm-3">
			<?php
				// claculating number of shipped products
				$shipped_quantity = $this->order_model->get_all_shipped_quantity_of_sales_order($row['order_id']);
			?>
			<div class="tile-stats tile-blue">
				<div class="icon"><i class="entypo-flight"></i></div>
				<div class="num" data-start="0" data-end="<?php echo $shipped_quantity;?>" data-prefix=""
					data-postfix="" data-duration="1500" data-delay="0"><?php echo $shipped_quantity;?></div>

				<h3><?php echo get_phrase('products_shipped');?></h3>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="tile-stats tile-red">
				<div class="icon"><i class="entypo-suitcase"></i></div>
				<div class="num" data-start="0" data-end="<?php echo $row['total_amount'];?>" data-prefix="<?php echo $this->info_model->get_currency_symbol();?>"
					data-postfix="" data-duration="1500" data-delay="0"><?php echo $row['total_amount'];?></div>

				<h3><?php echo get_phrase('total_amount');?></h3>
			</div>
		</div>
		<div class="col-sm-3">
			<?php
				// calculating paid amount
				$payments_of_order = $this->db->get_where('payment' , array('order_id' => $row['order_id'], 'payment_type' => 'sales'))->result_array();
				$paid_amount = 0;
				foreach($payments_of_order as $order_payment) {
					$amount = $this->db->get_where('invoice' , array('invoice_id' => $order_payment['invoice_id']))->row()->total_amount;
					$paid_amount += $amount;
				}
			?>
			<div class="tile-stats tile-green">
				<div class="icon"><i class="entypo-credit-card"></i></div>
				<div class="num" data-start="0" data-end="<?php echo $paid_amount;?>" data-prefix="<?php echo $this->info_model->get_currency_symbol();?>"
					data-postfix="" data-duration="1500" data-delay="0"><?php echo $paid_amount;?></div>

				<h3><?php echo get_phrase('paid_amount');?></h3>
			</div>
		</div>

		<div class="col-sm-12">
		<!-- panel for ordered products -->
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-bag"></i> &nbsp;<?php echo get_phrase('ordered_products');?>
				</div>
			</div>
			<div class="panel-body with-table">

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
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><b><?php echo get_phrase('grand_total');?></b></td>
							<td><b><?php echo $row['total_amount'];?></b></td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
		<!-- panel for ordered products -->
		</div>
		<div class="col-sm-12">
		<!-- panel for ordered shipments -->
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-flight"></i> &nbsp;<?php echo get_phrase('shipments');?>
				</div>
				<?php
					$query_shipment = $this->db->get_where('shipment' , array(
						'order_id' => $row['order_id']
					));
					if($query_shipment->num_rows() < 1):
				?>
				<div class="panel-options">
					<a href="#" style="color: #949494;">
						<?php echo get_phrase('no_shipment_entry_available');?>
					</a>
				</div>
			<?php endif;?>
			</div>

			<div class="panel-body with-table">

				<?php if($query_shipment->num_rows() > 0):?>

					<table class="table table-bordered table-responsive">
						<thead>
							<th width="4%;"><strong>#</strong></th>
							<th><strong><?php echo get_phrase('tracking_number');?></strong></th>
							<th><strong><?php echo get_phrase('shipping_cost');?></strong></th>
							<th><strong><?php echo get_phrase('shipping_method');?></strong></th>
							<th><strong><?php echo get_phrase('courier');?></strong></th>
							<th><strong><?php echo get_phrase('date_created');?></strong></th>
							<th><strong><?php echo get_phrase('options');?></strong></th>
						</thead>
						<tbody>
						<?php
							$count = 1;
							$shipments = $this->db->get_where('shipment' , array(
								'order_id' => $row['order_id']
							))->result_array();
							foreach($shipments as $shipment):
						?>
							<tr>
								<td><?php echo $count++;?></td>
								<td><?php echo $shipment['tracking_number'];?></td>
								<td><?php echo $shipment['shipping_cost'];?></td>
								<td>
									<?php if($shipment['shipping_method_id'] > 0)
											echo $this->db->get_where('shipping_method' , array(
												'shipping_method_id' => $shipment['shipping_method_id']
											))->row()->name;
									?>
								</td>
								<td>
									<?php if($shipment['courier_id'] > 0)
											echo $this->db->get_where('courier' , array(
												'courier_id' => $shipment['courier_id']
											))->row()->name;
									?>
								</td>
								<td><?php echo date('D, d M Y' , $shipment['shipment_timestamp']);?></td>
								<td>
									<a href="<?php echo base_url();?>index.php?customer/sales_order_shipment_print_view/<?php echo $shipment['shipment_id'];?>"
										class="btn btn-default btn-xs tooltip-primary" target="_blank"
											data-toggle="tooltip" data-original-title="<?php echo get_phrase('print');?>">
										<i class="entypo-print" style="color: #949494;"></i>
									</a>
									<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/sales_order_shipment_modal_view/<?php echo $shipment['shipment_id'];?>')"
										class="btn btn-default btn-xs tooltip-primary"
											data-toggle="tooltip" data-original-title="<?php echo get_phrase('view');?>">
										<i class="entypo-eye" style="color: #949494;"></i>
									</a>
								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>

				<?php endif;?>

			</div>
		</div>
		<!-- panel for ordered shipments -->
		</div>
		<div class="col-sm-12">
		<!-- panel for ordered invoice -->
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-docs"></i> &nbsp;<?php echo get_phrase('invoice');?>
				</div>
				<?php
					$query_invoice = $this->db->get_where('invoice' , array(
						'order_id' => $row['order_id'], 'order_type' => 'sales'
					));
					if($query_invoice->num_rows() < 1):
				?>
				<div class="panel-options">
					<a href="#" style="color: #949494;">
						<?php echo get_phrase('no_invoice_available');?>
					</a>
				</div>
			<?php endif;?>
			</div>

			<div class="panel-body with-table">

				<?php if($query_invoice->num_rows() > 0):?>

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
							$invoices = $query_invoice->result_array();
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
									<a href="<?php echo base_url();?>index.php?customer/sales_order_invoice_print_view/<?php echo $invoice['invoice_id'];?>"
										class="btn btn-default btn-xs tooltip-primary" target="_blank"
											data-toggle="tooltip" data-original-title="<?php echo get_phrase('print');?>">
										<i class="entypo-print" style="color: #949494;"></i>
									</a>
									<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/sales_order_invoice_modal_view/<?php echo $invoice['invoice_id'];?>')"
										class="btn btn-default btn-xs tooltip-primary"
											data-toggle="tooltip" data-original-title="<?php echo get_phrase('view');?>">
										<i class="entypo-eye" style="color: #949494;"></i>
									</a>
								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>

				<?php endif;?>

			</div>
		</div>
		<!-- panel for ordered invoice -->
		</div>
		<div class="col-sm-12">
		<!-- panel for ordered payments -->
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-credit-card"></i> &nbsp;<?php echo get_phrase('payments');?>
				</div>
				<?php
					$query_payment = $this->db->get_where('payment' , array(
						'order_id' => $row['order_id'] , 'payment_type' => 'sales'
					));
					if($query_payment->num_rows() < 1):
				?>
				<div class="panel-options">
					<a href="#" style="color: #949494;">
						<?php echo get_phrase('no_payment_entry_available');?>
					</a>
				</div>
			<?php endif;?>
			</div>

			<div class="panel-body with-table">

				<?php if($query_payment->num_rows() > 0):?>

					<table class="table table-bordered table-responsive">
						<thead>
							<th width="4%;"><strong>#</strong></th>
							<th><strong><?php echo get_phrase('payment_code');?></strong></th>
							<th><strong><?php echo get_phrase('invoice_code');?></strong></th>
							<th><strong><?php echo get_phrase('amount');?></strong></th>
							<th><strong><?php echo get_phrase('payment_method');?></strong></th>
							<th><strong><?php echo get_phrase('notes');?></strong></th>
							<th><strong><?php echo get_phrase('date');?></strong></th>
							<th><strong><?php echo get_phrase('options');?></strong></th>
						</thead>
						<tbody>
						<?php
							$count = 1;
							$payments = $query_payment->result_array();
							foreach($payments as $payment):
						?>
							<tr>
								<td><?php echo $count++;?></td>
								<td><?php echo $payment['payment_code'];?></td>
								<td>
									<?php echo $this->db->get_where('invoice' , array(
										'invoice_id' => $payment['invoice_id']
										))->row()->invoice_code;?>
								</td>
								<td>
									<?php echo $this->db->get_where('invoice' , array(
										'invoice_id' => $payment['invoice_id']
										))->row()->total_amount;?>
								</td>
								<td>
									<?php
										if($payment['payment_method'] == 1)
											echo get_phrase('cash');
										if($payment['payment_method'] == 2)
											echo get_phrase('cheque');
										if($payment['payment_method'] == 3)
											echo get_phrase('card');

									?>
								</td>
								<td><?php echo $payment['notes'];?></td>
								<td><?php if($payment['timestamp'] != '') echo date('D, d M Y' , $payment['timestamp']);?></td>
								<td>
									<a href="<?php echo base_url();?>index.php?customer/sales_order_payment_print_view/<?php echo $payment['payment_id'];?>"
										class="btn btn-default btn-xs tooltip-primary" target="_blank"
											data-toggle="tooltip" data-original-title="<?php echo get_phrase('print');?>">
										<i class="entypo-print" style="color: #949494;"></i>
									</a>
									<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/sales_order_payment_modal_view/<?php echo $payment['payment_id'];?>')"
										class="btn btn-default btn-xs tooltip-primary"
											data-toggle="tooltip" data-original-title="<?php echo get_phrase('view');?>">
										<i class="entypo-eye" style="color: #949494;"></i>
									</a>
								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>

				<?php endif;?>

			</div>
		</div>
		<!-- panel for ordered payments -->
		</div>
	</div>
</div>

<?php endforeach;?>
