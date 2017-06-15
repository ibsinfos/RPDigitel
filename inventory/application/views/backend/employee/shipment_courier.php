
<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/shipping_method_add')" 
	class="btn btn-info btn-sm btn-icon icon-left">
		<?php echo get_phrase('add_shipping_method');?>
	<i class="entypo-plus"></i>
</a>

<div class="main_data">
	<?php include 'shipment_courier_list.php';?>
</div>