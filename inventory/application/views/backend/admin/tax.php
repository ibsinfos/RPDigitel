<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/tax_add')" 
	class="btn btn-info btn-sm btn-icon icon-left">
		<?php echo get_phrase('add_tax');?>
	<i class="entypo-plus"></i>
</a>

<div class="main_data">
	<?php include 'tax_list.php';?>
</div>