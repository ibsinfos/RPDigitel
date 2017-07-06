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
		<strong><?php echo get_phrase('add_product');?></strong>
	</li>

</ol>

<div class="main_data">
	<?php include 'inventory_add_form.php';?>
</div>
