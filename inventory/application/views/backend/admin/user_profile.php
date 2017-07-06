<ol class="breadcrumb bc-3">

	<li>
		<a href="<?php echo base_url();?>index.php?admin/dashboard">
			<i class="entypo-home"></i>
				<?php echo get_phrase('dashboard');?>
		</a>
	</li>

	<li>
		<a href="<?php echo base_url();?>index.php?admin/user_list/user_all">
			<?php echo get_phrase('user_list');?>
		</a>
	</li>

	<li class="active">
		<strong><?php echo get_phrase('profile');?></strong>
	</li>

</ol>

<div class="main_data">
	<?php include 'user_profile_body.php';?>
</div>

