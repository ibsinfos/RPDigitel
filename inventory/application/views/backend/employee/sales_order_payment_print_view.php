<title><?php echo $page_title;?></title>
<div id="print">
	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<?php 
		$payment_info = $this->db->get_where('payment' , array(
			'payment_id' => $payment_id
		))->result_array();
		foreach($payment_info as $info):
			$invoice_entries = $this->db->get_where('invoice' , array('invoice_id' => $info['invoice_id']))->row()->invoice_entries;
			$payment_entries = json_decode($invoice_entries);
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
		<b><?php echo get_phrase('payment');?> #<?php echo $info['payment_code'];?></b><br>
		<b><?php echo get_phrase('order');?> : <?php echo $this->db->get_where('sales_order' , array('order_id' => $info['order_id']))->row()->order_code;?></b><br>
		<b><?php echo get_phrase('invoice');?> : <?php echo $this->db->get_where('invoice' , array('invoice_id' => $info['invoice_id']))->row()->invoice_code;?></b><br>
		<?php echo get_phrase('date');?> : <?php echo date('D, d M Y' , $info['timestamp']);?><br>
		<?php if($info['payment_method'] == 1):?>
			<?php echo get_phrase('payment_method');?> : <?php echo get_phrase('cash');?>
		<?php endif;?>
		<?php if($info['payment_method'] == 2):?>
			<?php echo get_phrase('payment_method');?> : <?php echo get_phrase('cheque');?>
		<?php endif;?>
		<?php if($info['payment_method'] == 3):?>
			<?php echo get_phrase('payment_method');?> : <?php echo get_phrase('card');?>
		<?php endif;?>
		<br><br>
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

	<table style="width:100%; border-collapse:collapse;border: 1px solid #000; margin-top: 20px;" border="1">

		<thead>
			<tr>
				<td><strong>#</strong></td>
				<td align="center"><strong><?php echo get_phrase('products');?></strong></td>
				<td align="center"><strong><?php echo get_phrase('price');?></strong></td>
				<td align="center"><strong><?php echo get_phrase('quantity');?></strong></td>
				<td align="center"><strong><?php echo get_phrase('discount');?> %</strong></td>
				<td align="center"><strong><?php echo get_phrase('tax');?> %</strong></td>
				<td align="center"><strong><?php echo get_phrase('sub_total');?> %</strong></td>
			</tr>
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
					<td align="center"><?php echo $payment_entry->selling_price;?></td>
					<td align="center"><?php echo $payment_entry->invoice_quantity;?></td>
					<td align="center"><?php echo $payment_entry->discount;?></td>
					<td align="center"><?php echo $payment_entry->tax_value;?></td>
					<td align="center"><?php echo $payment_entry->sub_total;?></td>
				</tr>
			<?php endforeach;?>
		</tbody>

	</table>
	<p style="text-align: right">
		<?php 
			$total_amount = $this->db->get_where('invoice' , array('invoice_id' => $info['invoice_id']))->row()->total_amount;
		?>
		<b>
		<?php echo get_phrase('grand_total');?> : <?php echo $this->info_model->get_currency_symbol() . ' ' . $total_amount;?>
		</b>
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