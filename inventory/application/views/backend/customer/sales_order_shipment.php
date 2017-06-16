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
		
	</div>
<?php endif;?>
</div>

<?php endforeach;?>


<script type="text/javascript">

	$(document).ready(function() {

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

</script>
