<?php
	$purchase_order_info	=	$this->db->get_where('purchase_order' , array(
		'purchase_order_code' => $purchase_order_code
	))->result_array();
	foreach($purchase_order_info as $info):
		$ordered_products = json_decode($info['purchase_order_entries']);
?>
<div class="row">
	<div class="col-md-12">
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
							<th width="40%"><?php echo get_phrase('product');?></th>
							<th><?php echo get_phrase('cost_price');?></th>
							<th><?php echo get_phrase('in_stock');?></th>
							<th><?php echo get_phrase('ordered_quantity');?></th>
							<th><?php echo get_phrase('sub_total');?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
							foreach($ordered_products as $product):
								$i++;
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
									<?php echo $product->cost_price;?>
								</td>
								<td>
									<?php echo $in_stock;?>
								</td>
								<td>
									<?php echo $product->ordered_quantity;?>
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
							<td><b><?php echo get_phrase('grand_total');?></b></td>
							<td><b><?php echo $info['total_amount'];?></b></td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
		<!-- panel for ordered products -->
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<!-- panel for ordered products -->
		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-body">

				<?php if($info['order_status'] == 0):?>
					<p style="font-size: 13px;">
						Raising this order will send a mail to the supplier containg the products you have choosen for order. After you have received
						all the products ordered, make sure to mark the order as received which will increase the stock level of the ordered products.
					</p>
					<p>
						<a href="#" onclick="confirm_modal_2('<?php echo base_url();?>index.php?employee/purchase_order/raise/<?php echo $purchase_order_code;?>' ,
									                        '<?php echo base_url();?>index.php?employee/purchase_order_view/<?php echo $purchase_order_code;?>')"
							class="btn btn-green btn-icon icon-left btn-sm">
							<?php echo get_phrase('raise_order');?>
							<i class="entypo-paper-plane"></i>
						</a>
					</p>
				<?php endif;?>

				<!-- Distribute To Warehouse -->
				<?php if($info['order_status'] == 1):?>
					<p style="font-size: 13px;">
						The order has already been raised. You should distribute the products to different Warehouses whenever you recieve the products.
					</p>
					<p>
						<button id = "distribute_to_warehouse" class="btn btn-info btn-icon icon-left btn-sm">
							<?php echo get_phrase('distribute_to_warehouse');?>
							<i class="entypo-check"></i>
						</button>
					</p>
				<?php endif;?>
				<div class="jumbotron" id = "jumbotron" style="display: none; background-color: white; padding: 0px; margin: 0px;">

					<div class="col-md-6 col-lg-6 col-sm-12">

					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th width="60%"><?php echo get_phrase('product');?></th>
								<th width="20%"><?php echo get_phrase('ordered_quantity');?></th>
								<th width="20%"><?php echo get_phrase('distribute_to_warehouse');?></th>
							</tr>
						</thead>
						<tbody>
								<?php
									foreach($ordered_products as $product):
										$code = $this->db->get_where('variant' , array(
											'variant_id' => $product->variant_id
										))->row()->code;
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
											<span class = "<?php echo $code;?>"><?php echo $product->ordered_quantity;?></span>
										</td>
										<td>
											<button id = "emp-<?php echo $code;?>" type="button" class = "btn btn-small btn-info show_warehouse" style="text-align: center; display: flex; align-items: center; justify-content: center; margin-right: 40px; margin-left: 40px;"><i class="fa fa-arrow-circle-right" style="font-size: 20px;" aria-hidden="true"></i></button>
											<button id = "emp-check_<?php echo $code;?>" type="button" class = "btn btn-small btn-green" style="text-align: center; display: flex; align-items: center; justify-content: center; margin-right: 40px; margin-left: 40px; display: none; background-color: #43A047; border-color: #43A047;"><i class="fa fa-check" style="font-size: 19px;" aria-hidden="true"></i></button>
										</td>
									</tr>
								<?php endforeach;?>
						</tbody>
					</table>
				</div>
				<div class="col-md-6 col-lg-6 col-sm-12 warehouse_table" style="display: none;">
				<div class = "row product_heading" style="text-align: center; font-size: 13px; color: #388E3C; background-color: #C8E6C9; padding-top: 7px; padding-bottom: 7px; margin-left: 0px; margin-right: 0px;"></div>
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th width = "50%">Warehouse</th>
								<th width = "50%">Quantity</th>
						</tr>
						</thead>
						<tbody>
							<?php
								$warehouse_name = $this->warehouse_model->get_warehouse_name();
								foreach ($warehouse_name as $key) {
										echo "
												<tr>
													<td>
													".$key['warehouse_title']."
													</td>
													<td class = 'warehouse_product_quantity'>
													<input id = '".$key['warehouse_code']."' type = 'number' class = 'form-control warehouse_quantity' min = 0 max = 0 value = 0  style = 'width: 100%;'>
													</td>
												</tr>
												";
											}
							?>
							<tr>
								<td><span><span style="color: red; font-weight: bold;">Warning:</span> Once you click the <span style="color: black; font-weight: bold;">Add To Warehouse</span> button you will not able to change the data.</span></td>
								<td><button type="button" class = "btn btn-small btn-green form-control" id = "add_to_warehouse" style="background-color: green; pointer-events: none;"><?php echo get_phrase('add_to_warehouse');?></button></td>
							</tr>
						</tbody>
					</table>
				</div>
						<!-- Receive Button -->
						<?php if($info['order_status'] == 1):?>
							<div class="col-md-12 col-lg-12">
								<p id = "received_message" style="font-size: 13px;">
									The order has already been raised. Please check if you have received all the products that you have ordered from the
									supplier. Then mark the order as received. Marking the order as received will increase your stock level of the ordered
									products and will also make the payment status of the order as paid.
								</p>
								<p>
									<a href="#" id = "received_button" onclick="confirm_modal_2('<?php echo base_url();?>index.php?employee/purchase_order/receive/<?php echo $purchase_order_code;?>' ,
																								'<?php echo base_url();?>index.php?employee/purchase_order_view/<?php echo $purchase_order_code;?>')"
										class="btn btn-green btn-icon icon-left btn-sm pull-left">
										<?php echo get_phrase('mark_as_received');?>
										<i class="entypo-check"></i>
									</a>
								</p>
							</div>
						<?php endif;?>
				</div>

				<?php if($info['order_status'] == 2):?>
					<p style="font-size: 13px;">
						<i class="entypo-check" style="color: #00a651"></i> &nbsp; This order is already raised and successfully received.
					</p>
				<?php endif;?>

			</div>
		</div>
		<!-- panel for ordered products -->
	</div>
</div>
<?php endforeach;?>

<script type="text/javascript">
var variant_quantity;
var variant_code;
var button_id;
$('#distribute_to_warehouse').click(function(){
	$("#jumbotron").slideToggle();
});

$('.show_warehouse').click(function(){
	var emp_button_id = $(this).attr('id').split('-');
	button_id = emp_button_id[1]
	$('.warehouse_quantity').val(0);
	 var emp_variant_code = $(this).attr('id').split('-');
	 variant_code = emp_variant_code[1];
	 variant_quantity = $('.'+variant_code).text();
	$('.warehouse_table').slideDown();
	$('.warehouse_quantity').attr('max', variant_quantity);
	$.ajax({
		url: 'index.php?employee/get_product_heading',
		type: 'POST',
		data: {variant_id:variant_code},
		success : function(data){
			$('.product_heading').html(data);
		}
	});
});

$('.warehouse_quantity').bind("keyup change", function(e) {
	var sum = 0;
	// iterate through each td based on class and add the values
	$(".warehouse_quantity").each(function() {
	    var value = $(this).val();
	    // add only if the value is number
	    if(!isNaN(value) && value.length != 0) {
	        sum += parseInt(value);
	    }
	});

	if(sum === parseInt(variant_quantity)){
		// console.log("Done!!!");
		$('#add_to_warehouse').css('pointer-events','auto');
	}
	else{
		// console.log('Invalid quantity');
		$('#add_to_warehouse').css('pointer-events', 'none');
	}
});
$('#add_to_warehouse').click(function(){
	$('.warehouse_quantity').each(function(){
		var warehouse_code = this.id;
		var warehouse_quantity = $('#'+this.id).val();
		//alert(variant_code + '-------' + warehouse_code + '--------' + warehouse_quantity);
		$.ajax({
			type: 'POST',
			url: 'index.php?employee/add_to_different_warehouse',
			data:{variant_code:variant_code, warehouse_code:warehouse_code, warehouse_quantity:warehouse_quantity},
			success:function(data){
				//alert(data);
				$('.warehouse_quantity').val(0);
				$('.warehouse_table').slideUp();
				//$('#'+button_id).css('pointer-events', 'none');
				$('#emp-'+button_id).hide();
				$('#emp-check_'+button_id).show();
			}
		});
	});
});


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
