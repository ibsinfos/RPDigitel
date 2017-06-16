<title><?php echo $page_title;?></title>
<div id="print">
	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<?php 
		$purchase_order_info = $this->db->get_where('purchase_order' , array(
			'purchase_order_code' => $purchase_order_code
		))->result_array();
		foreach($purchase_order_info as $info):
			$purchase_order_entries = json_decode($info['purchase_order_entries']);
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
		
		<b><?php echo get_phrase('order');?>. #<?php echo $info['purchase_order_code'];?></b><br>
		<b><?php echo get_phrase('invoice');?>. #<?php echo $this->db->get_where('invoice' , array(
			'order_id' => $info['purchase_order_id'] , 'order_type' => 'purchase'))->row()->invoice_code;?></b><br>
		<?php echo get_phrase('date_added');?> : <?php echo date('D, d M Y' , $info['date_added']);?><br><br>
		<?php echo $this->db->get_where('user' , array('user_id' => $info['supplier_user_id']))->row()->name;?>
		<br>
		<?php echo $this->db->get_where('user' , array('user_id' => $info['supplier_user_id']))->row()->email;?>
		<br>
		<?php echo $this->db->get_where('user' , array('user_id' => $info['supplier_user_id']))->row()->phone;?>

	</div>

	<table style="width:100%; border-collapse:collapse;border: 1px solid #000; margin-top: 20px;" border="1">

		<thead>
			<tr>
				<td style="width: 2%;"><strong>#</strong></td>
				<td style="width: 45%;" align="center"><strong><?php echo get_phrase('products');?></strong></td>
				<td style="width: 10%;" align="center"><strong><?php echo get_phrase('price');?></strong></td>
				<td style="width: 17%" align="center"><strong><?php echo get_phrase('ordered_quantity');?></strong></td>
				<td style="width: 17%" align="center"><strong><?php echo get_phrase('sub_total');?></strong></td>
			</tr>
		</thead>

		<tbody>
			<?php
				$count = 1;
				foreach($purchase_order_entries as $purchase_order_entry):
					$product_id = $this->db->get_where('variant' , array(
							'variant_id' => $purchase_order_entry->variant_id
						))->row()->product_id;
					$is_variant = $this->db->get_where('variant' , array(
							'variant_id' => $purchase_order_entry->variant_id
						))->row()->is_variant;
					$type = $this->db->get_where('variant' , array(
							'variant_id' => $purchase_order_entry->variant_id
						))->row()->type;
					$specification = $this->db->get_where('variant' , array(
							'variant_id' => $purchase_order_entry->variant_id
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
					<td align="center"><?php echo $purchase_order_entry->cost_price;?></td>
					<td align="center"><?php echo $purchase_order_entry->ordered_quantity;?></td>
					<td align="center"><?php echo $purchase_order_entry->sub_total;?></td>
				</tr>
			<?php endforeach;?>
		</tbody>

	</table>
	<p style="text-align: right">
		<b><?php echo get_phrase('grand_total');?> : <?php echo $this->info_model->get_currency_symbol() . ' ' . $info['total_amount'];?></b>
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