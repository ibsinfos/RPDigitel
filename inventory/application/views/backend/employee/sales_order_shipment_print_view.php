<title><?php echo $page_title;?></title>
<div id="print">
	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<?php 
		$shipment_info = $this->db->get_where('shipment' , array(
			'shipment_id' => $shipment_id
		))->result_array();
		foreach($shipment_info as $info):
			$shipment_entries = json_decode($info['shipment_entries']);
	?>
	
	<div style="width: 50%; float: left;">
		<img src="uploads/logo.png" width="80">
		<br>
		<?php echo $this->info_model->get_settings('system_name');?>
		<br>
		<?php echo $this->info_model->get_settings('system_email');?>
		<br>
		<?php echo $this->info_model->get_settings('phone');?>
		<br>
		<?php echo $this->info_model->get_settings('address');?>
	</div>
	<div style="width: 50%; float: left; text-align: right; margin-bottom: 20px;">
		
		<b><?php echo get_phrase('order');?> : <?php echo $this->db->get_where('sales_order' , array('order_id' => $info['order_id']))->row()->order_code;?></b><br>
		<b><?php echo get_phrase('tracking_number');?> : <?php echo $info['tracking_number'];?></b><br>
		<?php if($info['courier_id'] > 0):?>
			<b><?php echo $this->db->get_where('courier' , array('courier_id' => $info['courier_id']))->row()->name;?></b><br>
		<?php endif;?>
		<?php echo date('D, d M Y' , $info['shipment_timestamp']);?><br><br>
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

	<table style="width:100%; border-collapse:collapse;border: 1px solid #000; margin-top: 20px;" border="1">

		<thead>
			<tr>
				<td style="width: 2%;"><strong>#</strong></td>
				<td style="width: 45%;" align="center"><strong><?php echo get_phrase('products');?></strong></td>
				<td style="width: 10%;" align="center"><strong><?php echo get_phrase('price');?></strong></td>
				<td style="width: 17%" align="center"><strong><?php echo get_phrase('ordered_quantity');?></strong></td>
				<td style="width: 17%" align="center"><strong><?php echo get_phrase('shipment_quantity');?></strong></td>
			</tr>
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
					<td align="center">
						<?php 
							if($is_variant == 0)
								echo $this->db->get_where('product' , array('product_id' => $product_id))->row()->name;
							if($is_variant == 1)
								echo $this->db->get_where('product' , array(
									'product_id' => $product_id
								))->row()->name . ' - ' . $type . ' : ' . $specification;
						?>
					</td>
					<td align="center"><?php echo $shipment_entry->selling_price;?></td>
					<td align="center"><?php echo $shipment_entry->ordered_quantity;?></td>
					<td align="center"><?php echo $shipment_entry->shipment_quantity;?></td>
				</tr>
			<?php endforeach;?>
		</tbody>

	</table>
	<p style="text-align: right">
		<b><?php echo get_phrase('shipping_cost');?> : <?php echo $this->info_model->get_currency_symbol() . ' ' . $info['shipping_cost'];?></b>
	</p>

<?php endforeach;?>

</div>


<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		var elem = $('#print');
		PrintElem(elem);
		Popup(data);

	});

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title></title>');
        //mywindow.document.write('<link rel="stylesheet" href="assets/css/print.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        //mywindow.document.write('<style>.print{border : 1px;}</style>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>