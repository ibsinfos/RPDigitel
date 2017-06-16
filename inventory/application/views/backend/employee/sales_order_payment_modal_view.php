<?php 
	$payment_info = $this->db->get_where('payment' , array(
		'payment_id' => $param2
	))->result_array();
	foreach($payment_info as $info):
		$invoice_entries = $this->db->get_where('invoice' , array('invoice_id' => $info['invoice_id']))->row()->invoice_entries;
		$payment_entries = json_decode($invoice_entries);
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
		<b><?php echo get_phrase('payment');?> #<?php echo $info['payment_code'];?></b><br>
		<b><?php echo get_phrase('order');?> #<?php echo $this->db->get_where('sales_order' , array('order_id' => $info['order_id']))->row()->order_code;?></b>
		<br>
		<b><?php echo get_phrase('invoice');?> #<?php echo $this->db->get_where('invoice' , array('invoice_id' => $info['invoice_id']))->row()->invoice_code;?></b><br>
		<?php echo get_phrase('date');?> : <?php echo date('d M Y' , $info['timestamp']);?><br>
		<?php if($info['payment_method'] == 1):?>
			<?php echo get_phrase('payment_method');?> : <?php echo get_phrase('cash');?>
		<?php endif;?>
		<?php if($info['payment_method'] == 2):?>
			<?php echo get_phrase('payment_method');?> : <?php echo get_phrase('cheque');?>
		<?php endif;?>
		<?php if($info['payment_method'] == 3):?>
			<?php echo get_phrase('payment_method');?> : <?php echo get_phrase('card');?>
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
						foreach($payment_entries as $payment_entry):
							$product_id = $this->db->get_where('variant' , array(
									'variant_id' => $payment_entry->variant_id
								))->row()->product_id;
							$is_variant = $this->db->get_where('variant' , array(
									'variant_id' => $payment_entry->variant_id
								))->row()->is_variant;
							$type = $this->db->get_where('variant' , array(
									'variant_id' => $payment_entry->variant_id
								))->row()->type;
							$specification = $this->db->get_where('variant' , array(
									'variant_id' => $payment_entry->variant_id
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
							<td><?php echo $payment_entry->selling_price;?></td>
							<td><?php echo $payment_entry->invoice_quantity;?></td>
							<td><?php echo $payment_entry->discount;?></td>
							<td><?php echo $payment_entry->tax_value;?></td>
							<td><?php echo $payment_entry->sub_total;?></td>
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
		<?php 
			$total_amount = $this->db->get_where('invoice' , array('invoice_id' => $info['invoice_id']))->row()->total_amount;
		?>
		<b>
		<?php echo get_phrase('grand_total');?> : <?php echo $this->info_model->get_currency_symbol() . ' ' . $total_amount;?>
		</b>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<a href="<?php echo base_url();?>index.php?employee/sales_order_payment_print_view/<?php echo $param2;?>" 
			class="btn btn-info btn-icon btn-sm icon-left" target="_blank">
			<?php echo get_phrase('print');?>
			<i class="entypo-print"></i>
		</a>
	</div>
</div>

<?php endforeach;?>