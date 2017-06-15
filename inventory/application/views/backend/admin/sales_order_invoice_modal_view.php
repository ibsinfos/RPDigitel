<?php
	$invoice_info = $this->db->get_where('invoice' , array(
		'invoice_id' => $param2
	))->result_array();
	foreach($invoice_info as $info):
		$invoice_entries = json_decode($info['invoice_entries']);
?>

<div class="row">
	<div class="col-md-6">
		<img src="uploads/logo.png" width="60">
		<br>
		<h5><?php echo $this->info_model->get_settings('system_name');?></h5>
		<?php echo $this->info_model->get_settings('system_email');?><br>
		<?php echo $this->info_model->get_settings('phone');?><br>
		<?php echo $this->info_model->get_settings('address');?>
	</div>
	<div class="col-md-6" style="text-align: right;">
		<b><?php echo get_phrase('order');?> #<?php echo $this->db->get_where('sales_order' , array('order_id' => $info['order_id']))->row()->order_code;?></b>
		<br>
		<b><?php echo get_phrase('invoice');?> #<?php echo $info['invoice_code'];?></b><br>
		<?php echo get_phrase('date_created');?> : <?php echo date('d M Y' , $info['date_added']);?><br>
		<?php if($info['status'] == 0):?>
			<i class="fa fa-circle" style="color: #ee4749;"></i> <?php echo get_phrase('unpaid');?>
		<?php endif;?>
		<?php if($info['status'] == 1):?>
			<i class="fa fa-circle" style="color: #00a651;"></i> <?php echo get_phrase('paid');?>
		<?php endif;?>
		<h4><?php echo get_phrase('billing_address');?></h4>
		<?php
			$customer_id = $this->db->get_where('sales_order' , array(
				'order_id' => $info['order_id']
			))->row()->customer_user_id;
			echo $this->db->get_where('user' , array(
				'user_id' => $customer_id
			))->row()->name;
		?>
		<br>
		<?php
			$billing_address_id = $this->db->get_where('sales_order' , array(
				'order_id' => $info['order_id']
			))->row()->billing_address_id;
		?>
		<?php echo $this->info_model->get_address_info_from_address_id($billing_address_id , 'address_line_1');?>,
		<?php echo $this->info_model->get_address_info_from_address_id($billing_address_id , 'address_line_2');?>
		<br>
		<?php echo get_phrase('city');?> : <?php echo $this->info_model->get_address_info_from_address_id($billing_address_id , 'city');?>
		<br>
		<?php echo get_phrase('zip_code');?> : <?php echo $this->info_model->get_address_info_from_address_id($billing_address_id , 'zip_code');?>
		<br>
		<?php echo get_phrase('state');?> : <?php echo $this->info_model->get_address_info_from_address_id($billing_address_id , 'state');?>
		<br>
		<?php
			$country_id =  $this->info_model->get_address_info_from_address_id($billing_address_id , 'country_id');
			echo $this->db->get_where('country' , array(
				'country_id' => $country_id
			))->row()->country_name;
		?>
	</div>
</div>

<hr />

<div class="row">
	<div class="col-md-12">

	<!-- panel for invoiced products -->
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-docs"></i> &nbsp;<?php echo get_phrase('invoice_entries');?>
				</div>
			</div>

			<div class="panel-body with-table">

				<table class="table table-bordered table-responsive">
					<thead>
						<th width="4%;"><strong>#</strong></th>
						<th><strong><?php echo get_phrase('product');?></strong></th>
						<th><strong><?php echo get_phrase('price');?></strong></th>
						<th><strong><?php echo get_phrase('quantity');?></strong></th>
						<th><strong><?php echo get_phrase('discount');?> %</strong></th>
						<th><strong><?php echo get_phrase('tax');?> %</strong></th>
						<th><strong><?php echo get_phrase('sub_total');?></strong></th>
					</thead>
					<tbody>
					<?php
						$count = 1;
						foreach($invoice_entries as $invoice_entry):
							$product_id = $this->db->get_where('variant' , array(
									'variant_id' => $invoice_entry->variant_id
								))->row()->product_id;
							$is_variant = $this->db->get_where('variant' , array(
									'variant_id' => $invoice_entry->variant_id
								))->row()->is_variant;
							$type = $this->db->get_where('variant' , array(
									'variant_id' => $invoice_entry->variant_id
								))->row()->type;
							$specification = $this->db->get_where('variant' , array(
									'variant_id' => $invoice_entry->variant_id
								))->row()->specification;
					?>
						<tr>
							<td><?php echo $count++;?></td>
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
							<td><?php echo $invoice_entry->selling_price;?></td>
							<td><?php echo $invoice_entry->invoice_quantity;?></td>
							<td><?php echo $invoice_entry->discount;?></td>
							<td><?php echo $invoice_entry->tax_value;?></td>
							<td><?php echo $invoice_entry->sub_total;?></td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>

			</div>
		</div>
		<!-- panel for invoiced products -->

	</div>
</div>

<div class="row">
	<div class="col-md-12" style="text-align: right;">
		<b>
			<?php echo get_phrase('grand_total');?> : <?php echo $this->info_model->get_currency_symbol() . ' ' . $info['total_amount'];?>
		</b>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<a href="<?php echo base_url();?>index.php?admin/sales_order_invoice_print_view/<?php echo $param2;?>"
			class="btn btn-info btn-icon btn-sm icon-left" target="_blank">
			<?php echo get_phrase('print');?>
			<i class="entypo-print"></i>
		</a>
	</div>
</div>

<?php endforeach;?>
