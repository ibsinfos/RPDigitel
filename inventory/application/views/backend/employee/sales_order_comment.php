<?php 
	$logged_in_user_code = $this->db->get_where('user' , array(
		'user_id' => $this->session->userdata('login_user_id')
	))->row()->user_code;
	if($this->user_model->check_permission($logged_in_user_code , 3)):
?>
<hr />

<?php 
	$sales_order_info = $this->db->get_where('sales_order' , array(
		'order_code' => $order_code
	))->result_array();
	foreach($sales_order_info as $row):
?>
<?php if($row['order_status'] != 10):?>
<div class="row" style="font-size: 13px; margin-left: 5px;">

	<?php if($row['order_status'] == 0):?><i class="fa fa-bell" style="color: #fad839;"></i> 
		<?php echo get_phrase('pending');?> &nbsp;
	<i class="fa fa-chevron-right"></i> &nbsp;<?php endif;?>

	<i class="fa fa-circle" <?php if($row['order_status'] >= 1):?> style="color:#00a651;"<?php endif;?>></i> 
		<?php echo get_phrase('confirmed');?> &nbsp;
	<i class="fa fa-chevron-right"></i> &nbsp;

	<i class="fa fa-circle" <?php if($row['order_status'] >= 2):?> style="color:#00a651;"<?php endif;?>></i> 
		<?php echo get_phrase('partially_shipped');?> &nbsp;
	<i class="fa fa-chevron-right"></i> &nbsp;

	<i class="fa fa-circle" <?php if($row['order_status'] >= 3):?> style="color:#00a651;"<?php endif;?>></i> 
		<?php echo get_phrase('shipped');?> &nbsp;
	<i class="fa fa-chevron-right"></i> &nbsp;

	<i class="fa fa-circle" <?php if($row['order_status'] >= 4):?> style="color:#00a651;"<?php endif;?>></i> 
		<?php echo get_phrase('delivered');?>

	
	<div class="pull-right" style="margin-right: 14px;">
		<?php if($row['payment_status'] == 0):?>
			<i class="fa fa-circle" style="color: #cc2424;"></i> <?php echo get_phrase('not_paid');?>
		<?php endif;?>
		<?php if($row['payment_status'] == 1):?>
			<i class="fa fa-circle" style="color: #00a651;"></i> <?php echo get_phrase('paid');?>
		<?php endif;?>
		<?php if($row['payment_status'] == 2):?>
			<i class="fa fa-circle" style="color: #fad839;"></i> <?php echo get_phrase('partially_paid');?>
		<?php endif;?>
	</div>


</div>


<hr />
<?php endif;?> 

<div class="row">
	<div class="col-md-2">
	<?php if($row['order_status'] == 0):?>
		<a href="<?php echo base_url();?>index.php?employee/sales_order_view/<?php echo $row['order_code'];?>/confirm" 
			class="btn btn-<?php if($view_page == 'sales_order_confirm') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block">
			<?php echo get_phrase('approve_order');?>
			<i class="entypo-help"></i>
		</a>
	<?php endif;?>
		<a href="<?php echo base_url();?>index.php?employee/sales_order_view/<?php echo $row['order_code'];?>/overview"  
			class="btn btn-<?php if($view_page == 'sales_order_overview') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('overview');?>
			<i class="entypo-info"></i>
		</a>
		<?php if($row['order_status'] != 10):?>
		<a href="<?php echo base_url();?>index.php?employee/sales_order_view/<?php echo $row['order_code'];?>/shipment" 
			class="btn btn-<?php if($view_page == 'sales_order_shipment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('shipments');?>
			<i class="entypo-flight"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?employee/sales_order_view/<?php echo $row['order_code'];?>/invoice" 
			class="btn btn-<?php if($view_page == 'sales_order_invoice') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('invoice');?>
			<i class="entypo-docs"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?employee/sales_order_view/<?php echo $row['order_code'];?>/payment" 
			class="btn btn-<?php if($view_page == 'sales_order_payment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('payments');?>
			<i class="entypo-credit-card"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?employee/sales_order_view/<?php echo $row['order_code'];?>/comment" 
			class="btn btn-<?php if($view_page == 'sales_order_comment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('comments');?>
			<i class="entypo-comment"></i>
		</a>
	<?php endif;?>
	</div>
	<?php if($row['order_status'] == 10):?>
		<div class="col-md-10">
			<center>
				<i class="fa fa-ban fa-4x"></i>
				<h3 style="color: #626262;">You can not comment on a canceled order</h3>
			</center>
		</div>
	<?php endif;?>
	<?php if($row['order_status'] != 10):?>
	<div class="col-md-10">

		<?php echo form_open(base_url().'index.php?employee/sales_order/post_comment/' . $order_code , array(
				'class' => 'form-horizontal form-groups' , 'enctype' => 'multipart/from-data'));?>

			<div class="form-group">
				<div class="col-sm-12">
					<textarea class="form-control autogrow" name="comment" placeholder="<?php echo get_phrase('write_your_comment');?>....." autofocus></textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-8">
					<button type="submit" class="btn btn-info btn-icon icon-left btn-sm">
						<?php echo get_phrase('post');?>
						<i class="fa fa-comment"></i>
					</button>
				</div>
			</div>

		<?php echo form_close();?>

		<!-- comments -->
		<?php
			$this->db->order_by('timestamp' , 'desc'); 
			$order_comments = $this->db->get_where('order_comment' , array(
				'order_id' => $row['order_id'] , 'type' => 'sales'
			))->result_array();
			foreach($order_comments as $comment):
		?>
			<div class="alert alert-minimal" style="color: #676767;">
				<strong><?php echo $this->db->get_where('user' , array('user_id' => $comment['user_id']))->row()->name;?> : </strong>
				<?php echo $comment['comment'];?>
				<p align="right" style="color: #bababa; font-size: 10px;"><?php echo date('D, d M Y' , $comment['timestamp']);?></p>
			</div>
		<?php endforeach;?>
		<!-- comments -->
		
	</div>
<?php endif;?>
</div>

<?php endforeach;?>

<?php endif;?>
