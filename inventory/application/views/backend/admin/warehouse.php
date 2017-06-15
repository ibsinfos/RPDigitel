<ol class="breadcrumb bc-3">

	<li>
		<a href="<?php echo base_url();?>index.php?admin/dashboard">
			<i class="entypo-home"></i>
				<?php echo get_phrase('dashboard');?>
		</a>
	</li>

	<li class="active">
		<strong><?php echo get_phrase('warehouse');?></strong>
	</li>

</ol>

<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/warehouse_adding')"
	class="btn btn-info btn-sm btn-icon icon-left">
		<?php echo get_phrase('create_new_warehouse');?>
	<i class="entypo-plus"></i>
</a>

<br>

<div class="main_data">
	<?php include 'warehouse_table.php';?>
</div>
