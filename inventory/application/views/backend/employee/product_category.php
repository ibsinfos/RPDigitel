<ol class="breadcrumb bc-3">

	<li>
		<a href="<?php echo base_url();?>index.php?employee/dashboard">
			<i class="entypo-home"></i>
				<?php echo get_phrase('dashboard');?>
		</a>
	</li>

	<li>
		<a href="<?php echo base_url();?>index.php?employee/inventory_list/">
			<?php echo get_phrase('inventory');?>
		</a>
	</li>

	<li class="active">
		<strong><?php echo get_phrase('product_category');?></strong>
	</li>

</ol>

<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/product_category_add')" 
	class="btn btn-info btn-sm btn-icon icon-left">
		<?php echo get_phrase('add_product_category');?>
	<i class="entypo-plus"></i>
</a>

<br>

<div class="main_data">
	<?php include 'product_category_table.php';?> 
</div>