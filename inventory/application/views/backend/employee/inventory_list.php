<a href="<?php echo base_url();?>index.php?employee/inventory_list_archived" 
	class="btn btn-default btn-sm btn-icon icon-left">
		<?php echo get_phrase('archived_products');?>
	<i class="entypo-archive"></i>
</a>

<a href="<?php echo base_url();?>index.php?employee/inventory_add" 
	class="btn btn-info btn-sm btn-icon icon-left pull-right">
		<?php echo get_phrase('add_product');?>
	<i class="entypo-plus"></i>
</a>



<br><br>

<div class="main_data">
	<?php include 'inventory_list_table.php';?>
</div>
