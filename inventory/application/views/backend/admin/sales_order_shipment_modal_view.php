<?php 
	$shipment_info = $this->db->get_where('shipment' , array(
		'shipment_id' => $param2
	))->result_array();
	foreach($shipment_info as $info):
		$shipment_entries = json_decode($info['shipment_entries']);
?>

<div class="row">
	<div class="col-md-6">
		<h4><?php echo get_phrase('ship_to');?></h4>
		<?php 
			$customer_id = $this->db->get_where('sales_order' , array(
				'order_id' => $info['order_id']
			))->row()->customer_user_id;
			echo $this->db->get_where('user' , array(
				'user_id' => $customer_id
			))->row()->name;
		?>
		<br>
		<i class="entypo-mail"></i> <?php echo $this->db->get_where('user' , array('user_id' => $customer_id))->row()->email;?>
		<br>
		<i class="entypo-phone"></i> <?php echo $this->db->get_where('user' , array('user_id' => $customer_id))->row()->phone;?>
	</div>
	<div class="col-md-6">
		<h4><?php echo get_phrase('shipping_address');?></h4>
		<?php 
			$shipping_address_id = $this->db->get_where('sales_order' , array(
				'order_id' => $info['order_id']
			))->row()->shipping_address_id;
		?>
		<?php echo $this->info_model->get_address_info_from_address_id($shipping_address_id , 'address_line_1');?>, 
		<?php echo $this->info_model->get_address_info_from_address_id($shipping_address_id , 'address_line_2');?>
		<br>
		<?php echo get_phrase('city');?> : <?php echo $this->info_model->get_address_info_from_address_id($shipping_address_id , 'city');?>
		<br>
		<?php echo get_phrase('zip_code');?> : <?php echo $this->info_model->get_address_info_from_address_id($shipping_address_id , 'zip_code');?>
		<br>
		<?php echo get_phrase('state');?> : <?php echo $this->info_model->get_address_info_from_address_id($shipping_address_id , 'state');?>
		<br>
		<?php 
			$country_id =  $this->info_model->get_address_info_from_address_id($shipping_address_id , 'country_id');
			echo $this->db->get_where('country' , array(
				'country_id' => $country_id
			))->row()->country_name;
		?>
	</div>
</div>

<hr />

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td><b><?php echo get_phrase('tracking_number');?></b></td>
					<td><?php echo $info['tracking_number'];?></td>
					<td><b><?php echo get_phrase('shipping_cost');?></b></td>
					<td>
						<?php echo $this->info_model->get_currency_code();?> <?php echo $info['shipping_cost'];?>
					</td>
				</tr>
				<tr>
					<td><b><?php echo get_phrase('shipping_method');?></b></td>
					<td>
						<?php echo $this->db->get_where('shipping_method' , array(
								'shipping_method_id' => $info['shipping_method_id']
							))->row()->name;
						?>
					</td>
					<td><b><?php echo get_phrase('shipment_date');?></b></td>
					<td><?php if($info['shipment_timestamp'] != '') echo date('d M Y' , $info['shipment_timestamp']);?></td>
				</tr>
				<tr>
					<td><b><?php echo get_phrase('courier_service');?></b></td>
					<td>
						<?php if($info['courier_id'] > 0) echo $this->db->get_where('courier' , array(
								'courier_id' => $info['courier_id']
							))->row()->name;
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">

	<!-- panel for ordered shipments -->
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-basket"></i> &nbsp;<?php echo get_phrase('shipment_entries');?>
				</div>
			</div>
			
			<div class="panel-body with-table">

				<table class="table table-bordered table-responsive">
					<thead>
						<th width="4%;"><strong>#</strong></th>
						<th><strong><?php echo get_phrase('product');?></strong></th>
						<th><strong><?php echo get_phrase('price');?></strong></th>
						<th><strong><?php echo get_phrase('ordered_quantity');?></strong></th>
						<th><strong><?php echo get_phrase('shipment_quantity');?></strong></th>
					</thead>
					<tbody>
					<?php
						$count = 1;
						foreach($shipment_entries as $shipment_entry):
							$product_id = $this->db->get_where('variant' , array(
									'variant_id' => $shipment_entry->variant_id
								))->row()->product_id;
							$is_variant = $this->db->get_where('variant' , array(
									'variant_id' => $shipment_entry->variant_id
								))->row()->is_variant;
							$type = $this->db->get_where('variant' , array(
									'variant_id' => $shipment_entry->variant_id
								))->row()->type;
							$specification = $this->db->get_where('variant' , array(
									'variant_id' => $shipment_entry->variant_id
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
							<td><?php echo $shipment_entry->selling_price;?></td>
							<td><?php echo $shipment_entry->ordered_quantity;?></td>
							<td><?php echo $shipment_entry->shipment_quantity;?></td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
				
			</div>
		</div>
		<!-- panel for ordered shipments -->

	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<a href="<?php echo base_url();?>index.php?admin/sales_order_shipment_print_view/<?php echo $param2;?>" 
			class="btn btn-info btn-icon btn-sm icon-left" target="_blank">
			<?php echo get_phrase('print');?>
			<i class="entypo-print"></i>
		</a>
	</div>
</div>

<?php endforeach;?>