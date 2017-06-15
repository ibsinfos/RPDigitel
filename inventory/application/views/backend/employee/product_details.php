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
		<strong><?php echo get_phrase('product_details');?></strong>
	</li>

</ol>

<div class="main_data">
	<?php include 'product_details_body.php';?>
</div>