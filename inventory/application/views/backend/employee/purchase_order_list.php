<?php 
	$logged_in_user_code = $this->db->get_where('user' , array(
		'user_id' => $this->session->userdata('login_user_id')
	))->row()->user_code;
	if($this->user_model->check_permission($logged_in_user_code , 2)):
?>
<div class="row">
	<div class="col-md-9">
		<a href="<?php echo base_url();?>index.php?employee/purchase_order_list/order_all" 
			class="btn btn-<?php if($order_status == 'all') echo 'primary'; else echo 'default';?> btn-sm">
			<?php echo get_phrase('all');?>
		</a>
		<a href="<?php echo base_url();?>index.php?employee/purchase_order_list/order_pending" 
			class="btn btn-<?php if($order_status == 'pending') echo 'primary'; else echo 'default';?> btn-sm">
			<?php echo get_phrase('pending');?>
		</a>
		<a href="<?php echo base_url();?>index.php?employee/purchase_order_list/order_raised" 
			class="btn btn-<?php if($order_status == 'raised') echo 'primary'; else echo 'default';?> btn-sm">
			<?php echo get_phrase('raised');?>
		</a>
		<a href="<?php echo base_url();?>index.php?employee/purchase_order_list/order_received" 
			class="btn btn-<?php if($order_status == 'received') echo 'primary'; else echo 'default';?> btn-sm">
			<?php echo get_phrase('received');?>
		</a>
		<a href="<?php echo base_url();?>index.php?employee/purchase_order_list/order_archived" 
			class="btn btn-<?php if($order_status == 'archived') echo 'gold'; else echo 'default';?> btn-sm">
			<i class="entypo-archive"></i> &nbsp;<?php echo get_phrase('archive');?>
		</a>
	</div>

	<a href="<?php echo base_url();?>index.php?employee/purchase_order_add" 
		class="btn btn-info btn-icon btn-sm icon-left pull-right" style="margin-right: 16px;">
		<?php echo get_phrase('add_new_order');?>
		<i class="entypo-plus"></i>
	</a>

</div>

<br>

<?php include 'purchase_order_list_body.php';?>

<?php endif;?>