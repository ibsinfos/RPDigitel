<div class="row">
	<div class="col-md-9">
		<a href="<?php echo base_url();?>index.php?customer/sales_order_list/order_all"
			class="btn btn-<?php if($order_status == 'all') echo 'primary'; else echo 'default';?> btn-sm">
			<i class="entypo-folder"></i> &nbsp;<?php echo get_phrase('all');?>
		</a>
		<a href="<?php echo base_url();?>index.php?customer/sales_order_list/order_pending"
			class="btn btn-<?php if($order_status == 'pending') echo 'primary'; else echo 'default';?> btn-sm">
			<i class="entypo-bell"></i> &nbsp;<?php echo get_phrase('pending');?>
		</a>
		<a href="<?php echo base_url();?>index.php?customer/sales_order_list/order_confirmed"
			class="btn btn-<?php if($order_status == 'confirmed') echo 'primary'; else echo 'default';?> btn-sm">
			<i class="entypo-thumbs-up"></i> &nbsp;<?php echo get_phrase('confirmed');?>
		</a>
		<a href="<?php echo base_url();?>index.php?customer/sales_order_list/order_partially_shipped"
			class="btn btn-<?php if($order_status == 'partially_shipped') echo 'primary'; else echo 'default';?> btn-sm">
			<i class="entypo-arrows-ccw"></i> &nbsp;<?php echo get_phrase('partially_shipped');?>
		</a>
		<a href="<?php echo base_url();?>index.php?customer/sales_order_list/order_shipped"
			class="btn btn-<?php if($order_status == 'shipped') echo 'primary'; else echo 'default';?> btn-sm">
			<i class="entypo-flight"></i> &nbsp;<?php echo get_phrase('shipped');?>
		</a>
		<a href="<?php echo base_url();?>index.php?customer/sales_order_list/order_delivered"
			class="btn btn-<?php if($order_status == 'delivered') echo 'primary'; else echo 'default';?> btn-sm">
			<i class="entypo-check"></i> &nbsp;<?php echo get_phrase('delivered');?>
		</a>
		<a href="<?php echo base_url();?>index.php?customer/sales_order_list/order_archived"
			class="btn btn-<?php if($order_status == 'archived') echo 'gold'; else echo 'default';?> btn-sm">
			<i class="entypo-archive"></i> &nbsp;<?php echo get_phrase('archive');?>
		</a>
		<a href="<?php echo base_url();?>index.php?customer/sales_order_list/order_canceled"
			class="btn btn-<?php if($order_status == 'canceled') echo 'danger'; else echo 'default';?> btn-sm">
			<i class="entypo-cancel-circled"></i> &nbsp;<?php echo get_phrase('canceled_orders');?>
		</a>
	</div>

	<a href="<?php echo base_url();?>index.php?customer/sales_order_add"
		class="btn btn-info btn-icon btn-sm icon-left pull-right" style="margin-right: 16px;">
		<?php echo get_phrase('add_new_order');?>
		<i class="entypo-plus"></i>
	</a>

</div>

<br>

<?php include 'sales_order_list_body.php';?>
