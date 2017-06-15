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
				<h3 style="color: #626262;">You can not add shipments to a canceled order</h3>
			</center>
		</div>
	<?php endif;?>
	<?php if($row['order_status'] != 10):?>
	<div class="col-md-10">

		<!-- panel for ordered shipments -->
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-flight"></i> &nbsp;<?php echo get_phrase('shipments');?>
				</div>
				<?php
					$query = $this->db->get_where('shipment' , array(
						'order_id' => $row['order_id']
					));
					if($query->num_rows() < 1):
				?>
				<div class="panel-options">
					<a href="#" style="color: #949494;">
						<?php echo get_phrase('no_shipment_entry_available');?>
					</a>
				</div>
				<?php endif;?>
			</div>

			<div class="panel-body with-table">

				<?php if($query->num_rows() > 0):?>

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
									<a href="<?php echo base_url();?>index.php?admin/sales_order_shipment_print_view/<?php echo $shipment['shipment_id'];?>"
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

		<?php
			$total_ordered_quantity = $this->order_model->get_total_ordered_quantity_of_sales_order($row['order_id']);
			$total_shipped_quantity = $this->order_model->get_all_shipped_quantity_of_sales_order($row['order_id']);
			if($total_shipped_quantity < $total_ordered_quantity):
		?>
			<button type="button" class="btn btn-info btn-icon icon-left btn-sm" id="create_new_shipment"
				onclick="show_new_shipment_form()">
				<?php echo get_phrase('create_new_shipment');?>
				<i class="fa fa-plus"></i>
			</button>

		<!-- panel for new shipment -->
		<div class="panel panel-default" data-collapsed="0" id="new_shipment_form">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-plus"></i> &nbsp;<?php echo get_phrase('new_shipment');?>
				</div>
			</div>
			<div class="panel-body">

				<?php echo form_open(base_url().'index.php?admin/sales_order/create_shipment/' . $order_code , array(
					'class' => 'form-horizontal form-groups' , 'enctype' => 'multipart/from-data'));?>

					<div class="form-group" id="tracking_number">
						<label class="col-sm-3 control-label"><?php echo get_phrase('tracking_number');?></label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="tracking_number"
								value="<?php echo substr(md5(rand(0, 1000000)), 0, 7);?>">
						</div>
					</div>

					<div class="form-group" id="shipping_methods">
						<label class="col-sm-3 control-label"><?php echo get_phrase('shipping_method');?></label>
						<div class="col-sm-4">
							<select name="shipping_method_id" class="selectboxit" id="shipping_method"
								onchange="check_shipping_method(this.value)">
								<option value=""><?php echo get_phrase('select_a_shipping_method');?></option>
								<?php
									$shipping_methods = $this->db->get('shipping_method')->result_array();
									foreach($shipping_methods as $row2):
								?>
								<option value="<?php echo $row2['shipping_method_id'];?>"><?php echo $row2['name'];?></option>
								<?php endforeach;?>
							</select>
						</div>
						<a href="<?php echo base_url();?>index.php?admin/shipment_courier"
							class="btn btn-default btn-sm tooltip-primary" data-toggle="tooltip"
							data-placement="top" title="" data-original-title="<?php echo get_phrase('edit_shipping_methods');?>">
							<i class="glyphicon glyphicon-edit" style="color: #969696;"></i>
						</a>
					</div>

					<div class="form-group" id="courier_companies">
						<label class="col-sm-3 control-label"><?php echo get_phrase('courier_name');?></label>
						<div class="col-sm-4">
							<select name="courier_id" class="selectboxit" id="courier">
								<option value=""><?php echo get_phrase('select_a_courier_name');?></option>
								<?php
									$couriers = $this->db->get('courier')->result_array();
									foreach($couriers as $row3):
								?>
								<option value="<?php echo $row3['courier_id'];?>"><?php echo $row3['name'];?></option>
								<?php endforeach;?>
							</select>
						</div>
						<a href="<?php echo base_url();?>index.php?admin/shipment_courier"
							class="btn btn-default btn-sm tooltip-primary" data-toggle="tooltip"
							data-placement="top" title="" data-original-title="<?php echo get_phrase('edit_courier');?>">
							<i class="glyphicon glyphicon-edit" style="color: #969696;"></i>
						</a>
					</div>

					<div class="form-group" id="shipping_cost">
						<label class="col-sm-3 control-label"><?php echo get_phrase('shipping_cost');?></label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="shipping_cost">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
						<div class="col-sm-4">
							<div class="input-group">
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
								<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="shipment_timestamp"
									value="<?php echo date('D, d M Y');?>">
							</div>
						</div>
					</div>

					<!-- products for shipment -->
					<div class="col-md-7" style="margin-top:1px;">

					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th width="40%"><strong><?php echo get_phrase('product');?></strong></th>
								<th><strong><?php echo get_phrase('price');?></strong></th>
								<th><strong><?php echo get_phrase('ordered_quantity');?></strong></th>
								<th><strong><?php echo get_phrase('shipped_quantity');?></strong></th>
								<th><strong><?php echo get_phrase('new_shipment_quantity');?></strong></th>
								<th width= "10%"><strong><?php echo get_phrase('select_from_warehouse');?></strong></th>
							</tr>
						</thead>
						<tbody id = "myTable">
						<?php
							$ordered_products = json_decode($row['order_entries']);
							foreach($ordered_products as $product):
								$variant_code = $this->db->get_where('variant' , array(
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
										$shipped_quantity =  $this->order_model->get_shipped_quantity_of_variant_of_sales_order($row['order_id'] , $product->variant_id);
										echo $shipped_quantity;
									?>
									<input type="hidden" id="shipped_quantity_<?php echo $variant_code; ?>" value="<?php echo $shipped_quantity; ?>" />
								</td>
								<td style="pointer-events: none;">
									<?php $allowed_quantity = $product->ordered_quantity - $shipped_quantity;?>
									<select class="form-control dropdown" id = "shipped_quantity" name="shipment_quantity[]">
										<?php for($x = $allowed_quantity; $x >= 0; $x--):?>
										  <option id = "<?php echo 'new_shipped_quantity_variant_code_'.$variant_code;?>" value="0">0</option>
									  <?php endfor;?>
									</select>
								</td>
								<td>
									<button type="button" name="button" class = "warehouse_to_shipment_button btn btn-small" id = "<?php echo $variant_code.'_'.$product->ordered_quantity;?>" style="text-align: center; display: flex; align-items: center; justify-content: center; outline: 0 !important; background-color: #21a9e1; border-color: #1a8fbf; color: #fff; margin-left: ç%;"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
									<button id = "<?php echo 'check_'.$variant_code.'_'.$product->ordered_quantity;?>"  type="button" class = "btn btn-small btn-green" style="text-align: center; display: flex; align-items: center; justify-content: center; margin-right: 22%; margin-left: 22%; display: none; background-color: #43A047; border-color: #43A047;"><i class="fa fa-check" style="font-size: 19px;" aria-hidden="true"></i></button>
								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				</div>
				<div class="col-md-5" id = "shipment_warehouse_distribution" style="display: none;">
					<div class = "row product_heading" style="text-align: center; font-size: 13px; color: #388E3C; background-color: #C8E6C9; padding-top: 7px; padding-bottom: 7px; margin-left: 0px; margin-right: 0px;"></div>
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th width="50%"><strong><?php echo get_phrase('select_warehouse (Available_quantity)');?></strong></th>
								<th width="50%"><strong><?php echo get_phrase('quantity');?></strong></th>
							</tr>
						</thead>
						<tbody>
							<?php

							$all_warehouse_array = $this->warehouse_model->get_warehouse_name();
							foreach ($all_warehouse_array as $key) {

								echo "
								<tr>
									<td class = 'warehouse_label_".$key['warehouse_code']."'>".$key['warehouse_title']."<span class = '".$key['warehouse_code']."_stock' style = 'color: #424242; font-weight: bold' id = 'testing'></span></td>
									<td class = 'warehouse_to_shipment' id = ''><input type = 'number' id = '".$key['warehouse_code']."' class = 'form-control warehouse_shipment_quantity' value = 0 min = 0 max = 0></td>
								</tr>
								";
							}
							?>
							<tr>
								<td><span><span style="color: red; font-weight: bold;">Warning:</span> Once you click the <span style="color: black; font-weight: bold;">Add To Shipment</span> button you will not able to alter the data.</span>
								</td>
								<td class = 'btn btn-success form-control add_to_shipment' style = "padding-bottom: 26px;"><?php echo get_phrase('add_to_shipment');?></td>
							</tr>
						</tbody>
					</table>
				</div>

					<!-- products for shipment -->

					<div class="form-group row col-md-12">
						<div class="col-sm-4">
							<button type="submit" class="btn btn-info btn-icon icon-left btn-sm create_shipment" style="pointer-events: none;">
								<?php echo get_phrase('create_shipment');?>
								<i class="fa fa-truck"></i>
							</button>
						</div>
					</div>

				<?php echo form_close();?>

				<blockquote class="blockquote-default row col-md-11" style="margin-left: 10px;">
					<p>
						<strong><?php echo get_phrase('shipment_notes');?></strong>
					</p>
					<p>
						Please check and recheck the shipment info that you have provided before creating the shipment.
						The shipment once created can not be altered later.
					</p>
				</blockquote>

			</div>
		</div>
		<!-- panel for new shipment -->

	<?php endif;?>

	</div>
<?php endif;?>
</div>

<?php endforeach;?>

<style media="screen">
select {
	-webkit-appearance: none;
	-moz-appearance: none;
	text-indent: 1px;
	text-overflow: '';
}
</style>

<script type="text/javascript">
var both_id;
var rowCount = $('#myTable tr').length;
var counting_added_row = 0;
//alert(rowCount);
var ordered_quantity;
	$(document).ready(function() {
		// hides the courier company selection
		$('#courier_companies').hide();

		// hides the new shipment form
		$('#new_shipment_form').hide();

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



	function check_shipping_method(value)
	{
		if(value == 2) {
			$('#courier_companies').show(500);
		}else {
			$('#courier_companies').hide(500);
		}
	}

	function show_new_shipment_form()
	{
		$('#create_new_shipment').hide(500);
		$('#new_shipment_form').show(500);
	}

	$('.warehouse_to_shipment_button').click(function(){
		$('#shipment_warehouse_distribution').slideDown();
		$('.warehouse_to_shipment input').val("0");
		$('.create_shipment').css('pointer-events','none');
		both_id = $(this).attr('id');
		var both_id_array = both_id.split('_');
		var variant_id = both_id_array[0];
		ordered_quantity = both_id_array[1];
		//alert(variant_id);
		shipped_quantity = $('#shipped_quantity_' + variant_id).val();
		remaining_quantity = ordered_quantity - shipped_quantity;
		$.ajax({
			type: 'POST',
			url: 'index.php?admin/get_product_heading',
			data: {variant_id:variant_id},
			success: function(data){
				$('.product_heading').html(data);
			}
		});
		$.ajax({
			type: 'POST',
			datatype:'json',
			url: 'index.php?admin/assigning_maximum_value_on_warehouse',
			data: { variant_id:variant_id, ordered_quantity:ordered_quantity },
			success:function(data){
					var arr = $.parseJSON(data);

						for(var i = 0; i < arr.length; i++){
							//alert("#"+arr[i].warehouse_code);

							$('#'+arr[i].warehouse_code).attr('max',arr[i].quantity);
							$('.'+arr[i].warehouse_code+'_stock').html(' ('+arr[i].quantity+') ');
							$('.warehouse_to_shipment').attr('id',arr[i].variant_code);
					}
			}
		});
	});

	$('.warehouse_shipment_quantity').bind("keyup change", function(e) {
		//alert($(this).parent().attr('id'));
		//$('#new_shipped_quantity_variant_code_'+$(this).parent().attr('id')).text('Mobin');
		//alert(ordered_quantity);
		var sum = 0;
		// iterate through each td based on class and add the values
		$(".warehouse_shipment_quantity").each(function() {
		    var value = $(this).val();
		    // add only if the value is number
		    if(!isNaN(value) && value.length != 0) {
		        sum += parseInt(value);
		    }
		});
		if(remaining_quantity >= sum){
			$('.add_to_shipment').css('pointer-events','auto');
			$('#new_shipped_quantity_variant_code_'+$(this).parent().attr('id')).val(sum);
			$('#new_shipped_quantity_variant_code_'+$(this).parent().attr('id')).text(sum);

		}
		else{
			$('.add_to_shipment').css('pointer-events','none');
			toastr.error('<?php echo get_phrase("shipped_quantity_exceeds_ordered_quantity_!"); ?>' , '<?php echo get_phrase("error"); ?>');
		}

	});

		$('.add_to_shipment').click(function(){

			$('.warehouse_shipment_quantity').each(function(){
				var variant_code =$(this).parent().attr('id');
				var warehouse_code = this.id;
				var warehouse_quantity = $('#'+this.id).val();
				$.ajax({
					type: 'POST',
					url: 'index.php?admin/adding_to_shipment_from_warehouse',
					data: {warehouse_code:warehouse_code, variant_code:variant_code, warehouse_quantity:warehouse_quantity},
					success:function(data){
						//alert(data);
						$('#'+both_id).hide();
						$('#check_'+both_id).show();
						$('#shipment_warehouse_distribution').slideUp();
					}
				});
				//alert(warehouse_code+'--'+warehouse_quantity+'--'+variant_code);
			});
			counting_added_row++;
			if(counting_added_row >= rowCount){
				$('.create_shipment').css('pointer-events','auto');
			}
			else if(counting_added_row < rowCount){

				$('.create_shipment').css('pointer-events','none');
			}
		});

</script>
