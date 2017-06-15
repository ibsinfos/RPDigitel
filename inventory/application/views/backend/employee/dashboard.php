<?php if($this->user_model->check_permission($logged_in_user_code , 3)):?>

	<h4 style="color: #797979"><?php echo get_phrase('sales_order_status');?></h4>
	<hr />
	<div class="row">
		<div class="col-sm-3">
			<div class="tile-stats tile-gray">
				<a href="<?php echo base_url();?>index.php?employee/sales_order_list/order_pending">
					<div class="icon"><i class="entypo-bell"></i></div>
					<div class="num">
						<?php 
							$this->db->where('order_status' , 0);
							$this->db->from('sales_order');
							echo $this->db->count_all_results();
						?>
					</div>
					<h3><?php echo get_phrase('pending');?></h3>
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="tile-stats tile-gray">
				<a href="<?php echo base_url();?>index.php?employee/sales_order_list/order_delivered">
					<div class="icon"><i class="entypo-check"></i></div>
					<div class="num">
						<?php 
							$this->db->where('order_status' , 4);
							$this->db->from('sales_order');
							echo $this->db->count_all_results();
						?>
					</div>
					<h3><?php echo get_phrase('delivered');?></h3>
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="tile-stats tile-gray">
				<a href="<?php echo base_url();?>index.php?employee/sales_order_list/order_canceled">
					<div class="icon"><i class="entypo-cancel"></i></div>
					<div class="num">
						<?php 
							$this->db->where('order_status' , 10);
							$this->db->from('sales_order');
							echo $this->db->count_all_results();
						?>
					</div>
					<h3><?php echo get_phrase('cancelled');?></h3>
				</a>
			</div>
		</div>
	</div>

<?php endif;?>

<?php if($this->user_model->check_permission($logged_in_user_code , 2)):?>

	<h4 style="color: #797979"><?php echo get_phrase('purchase_order_status');?></h4>
	<hr />
	<div class="row">
		<div class="col-sm-3">
			<div class="tile-stats tile-gray">
				<a href="<?php echo base_url();?>index.php?employee/purchase_order_list/order_pending">
					<div class="icon"><i class="entypo-bell"></i></div>
					<div class="num">
						<?php 
							$this->db->where('order_status' , 0);
							$this->db->from('purchase_order');
							echo $this->db->count_all_results();
						?>
					</div>
					<h3><?php echo get_phrase('pending');?></h3>
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="tile-stats tile-gray">
				<a href="<?php echo base_url();?>index.php?employee/purchase_order_list/order_raised">
					<div class="icon"><i class="entypo-paper-plane"></i></div>
					<div class="num">
						<?php 
							$this->db->where('order_status' , 1);
							$this->db->from('purchase_order');
							echo $this->db->count_all_results();
						?>
					</div>
					<h3><?php echo get_phrase('raised');?></h3>
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="tile-stats tile-gray">
				<a href="<?php echo base_url();?>index.php?employee/purchase_order_list/order_received">
					<div class="icon"><i class="entypo-check"></i></div>
					<div class="num">
						<?php 
							$this->db->where('order_status' , 2);
							$this->db->from('purchase_order');
							echo $this->db->count_all_results();
						?>
					</div>
					<h3><?php echo get_phrase('received');?></h3>
				</a>
			</div>
		</div>
	</div>

<?php endif;?>