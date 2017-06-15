<a href="<?php echo base_url();?>index.php?admin/user_list/user_all"
	class="btn btn-<?php if($selector == 'user_all') echo 'primary'; else echo 'default';?> btn-sm">
	<?php echo get_phrase('all');?>
</a>
<a href="<?php echo base_url();?>index.php?admin/user_list/user_customer"
	class="btn btn-<?php if($selector == 'user_customer') echo 'primary'; else echo 'default';?> btn-sm">
	<?php echo get_phrase('customers');?>
</a>
<a href="<?php echo base_url();?>index.php?admin/user_list/user_supplier"
	class="btn btn-<?php if($selector == 'user_supplier') echo 'primary'; else echo 'default';?> btn-sm">
	<?php echo get_phrase('suppliers');?>
</a>
<a href="<?php echo base_url();?>index.php?admin/user_list/user_employee"
	class="btn btn-<?php if($selector == 'user_employee') echo 'primary'; else echo 'default';?> btn-sm">
	<?php echo get_phrase('employees');?>
</a>
<a href="<?php echo base_url();?>index.php?admin/user_list/user_manager"
	class="btn btn-<?php if($selector == 'user_manager') echo 'primary'; else echo 'default';?> btn-sm">
	<?php echo get_phrase('warehouse_managers');?>
</a>
<!-- New user addition link -->
<a href="<?php echo base_url();?>index.php?admin/user_add"
	class="btn btn-info btn-icon icon-left pull-right">
		<?php echo get_phrase('add_new_user');?>
	<i class="entypo-plus"></i>
</a>

<br>

<?php include 'user_list.php';?>
