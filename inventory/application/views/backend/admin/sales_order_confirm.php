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
		<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/confirm"  style="text-align: left;"
			class="btn btn-<?php if($view_page == 'sales_order_confirm') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block text-left">
			<?php echo get_phrase('order_approval');?>
			<i class="entypo-help"></i>
		</a>
	<?php endif;?>
		<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/overview" style="text-align: left;"  
			class="btn btn-<?php if($view_page == 'sales_order_overview') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0 || $row['order_status'] == 10) echo 'disabled';?>">
			<?php echo get_phrase('overview');?>
			<i class="entypo-info"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/shipment" style="text-align: left;" 
			class="btn btn-<?php if($view_page == 'sales_order_shipment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0 || $row['order_status'] == 10) echo 'disabled';?>">
			<?php echo get_phrase('shipments');?>
			<i class="entypo-flight"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/invoice" style="text-align: left;" 
			class="btn btn-<?php if($view_page == 'sales_order_invoice') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0 || $row['order_status'] == 10) echo 'disabled';?>">
			<?php echo get_phrase('invoice');?>
			<i class="entypo-docs"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/payment" style="text-align: left;" 
			class="btn btn-<?php if($view_page == 'sales_order_payment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0 || $row['order_status'] == 10) echo 'disabled';?>">
			<?php echo get_phrase('payments');?>
			<i class="entypo-credit-card"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/comment" style="text-align: left;" 
			class="btn btn-<?php if($view_page == 'sales_order_comment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0 || $row['order_status'] == 10) echo 'disabled';?>">
			<?php echo get_phrase('comments');?>
			<i class="entypo-comment"></i>
		</a>
	</div>
	<div class="col-md-10">
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

				<p style="font-size: 13px;">
					To process this order, you need to confirm the order first. Before confirming check your stock and customer
					information. After you have confirmed the order, you can create invoice and shipments.
				</p>
				<br>
				<p>
					<a href="#" onclick="confirm_modal_2('<?php echo base_url();?>index.php?admin/sales_order/confirm/<?php echo $row['order_code'];?>' ,
									                        '<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/overview')" 
						class="btn btn-success btn-icon icon-left btn-sm">
						<?php echo get_phrase('confirm_order');?>
						<i class="entypo-check"></i>
					</a>
					<a href="#" onclick="confirm_modal_2('<?php echo base_url();?>index.php?admin/sales_order/cancel/<?php echo $row['order_code'];?>' ,
									                        '<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $row['order_code'];?>/overview')" 
						class="btn btn-danger btn-icon icon-left btn-sm">
						<?php echo get_phrase('cancel_order');?>
						<i class="entypo-cancel"></i>
					</a>
				</p>
			</div>
		</div>
	</div>
</div>

<?php endforeach;?>


<script type="text/javascript">
	
	// custom function for data deletion by ajax and post refreshing call
	function confirm(url , post_refresh_url)
	{
		var confirm_message = '<?php echo get_phrase('information_updated');?>';
		// showing user-friendly pre-loader image
		$('#preloader-delete').html('<img src="assets/preloader.GIF" style="height:15px;margin-top:-10px;" />');
		
		// disables the delete and cancel button during deletion ajax request
		document.getElementById("confirm_link").disabled=true;
		document.getElementById("confirm_cancel_link").disabled=true;
		
		$.ajax({
			url: url,
			success: function(response)
			{
				// remove the preloader 
				$('#preloader-delete').html('');

				// show deletion success msg.
				toastr.success(confirm_message);
				
				// hide the delete dialog box
				$('#modal_confirm').modal('hide');
				
				// enables the delete and cancel button after deletion ajax request success
				document.getElementById("confirm_link").disabled=false;
				document.getElementById("confirm_cancel_link").disabled=false;
		
				// reload the table
				reload_page(post_refresh_url);
			}
		});
	}

	// function for reloading table data
	function reload_page(url)
	{
		$(location).attr('href' , url);
	}

</script>

