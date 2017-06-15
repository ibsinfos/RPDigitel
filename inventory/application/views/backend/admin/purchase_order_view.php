<ol class="breadcrumb bc-3">

	<li>
		<a href="<?php echo base_url();?>index.php?admin/dashboard">
			<i class="entypo-home"></i>
				<?php echo get_phrase('dashboard');?>
		</a>
	</li>

	<li>
		<a href="<?php echo base_url();?>index.php?admin/purchase_order_list/order_all">
			<?php echo get_phrase('purchase_orders');?>
		</a>
	</li>

	<li class="active">
		<strong><?php echo get_phrase('view_order');?></strong>
	</li>

</ol>

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="1">
			<div class="panel-heading">
				<div class="panel-title" style="color: #676767; font-size: 14px;">
					<strong><?php echo get_phrase('purchase_order');?> #<?php echo $purchase_order_code;?></strong>
				</div>

				<div class="panel-options">
					<a href="<?php echo base_url();?>index.php?admin/purchase_order_print_view/<?php echo $purchase_order_code;?>"
						class="tooltip-primary" data-toggle="tooltip" target="_blank"
				 		data-placement="top" title="" data-original-title="<?php echo get_phrase('print');?>">
						<i class="glyphicon glyphicon-print" style="color: #676767;"></i>
					</a>
					&nbsp; &nbsp;
					<a href="#" data-rel="collapse">
						<i class="glyphicon glyphicon-info-sign" style="color: #676767;"></i>
					</a>

				</div>
			</div>

			<!-- panel body -->
			<div class="panel-body">

				<div class="col-sm-4">
					<?php
						$supplier_id = $this->order_model->get_purchase_order_info_by_order_code($purchase_order_code , 'supplier_user_id');
						$supplier_address_id = $this->order_model->get_purchase_order_info_by_order_code($purchase_order_code , 'supplier_address_id');
					?>
					<h5 style="color: #707070;"><?php echo get_phrase('supplier_info');?></h5>
					<p>
						<i class="entypo-user"></i> &nbsp;
						<?php echo $this->info_model->get_user_info_from_id($supplier_id , 'name');?>
					</p>
					<p>
						<i class="entypo-mail"></i> &nbsp;
						<?php echo $this->info_model->get_user_info_from_id($supplier_id , 'email');?>
					</p>
					<p>
						<i class="entypo-phone"></i> &nbsp;
						<?php echo $this->info_model->get_user_info_from_id($supplier_id , 'phone');?>
					</p>
				</div>
				<div class="col-sm-4">
					<h5 style="color: #707070;"><?php echo get_phrase('supplier_address');?></h5>
					<p>
						<?php echo $this->info_model->get_address_info_from_address_id($supplier_address_id , 'address_line_1');?>,
						<?php echo $this->info_model->get_address_info_from_address_id($supplier_address_id , 'address_line_2');?>
					</p>
					<p>
						<?php echo get_phrase('city');?> : <?php echo $this->info_model->get_address_info_from_address_id($supplier_address_id , 'city');?>
					</p>
					<p>
						<?php echo get_phrase('zip_code');?> : <?php echo $this->info_model->get_address_info_from_address_id($supplier_address_id , 'zip_code');?>
					</p>
					<p>
						<?php echo get_phrase('state');?> : <?php echo $this->info_model->get_address_info_from_address_id($supplier_address_id , 'state');?>
					</p>
					<p>
						<?php
							$country_id =  $this->info_model->get_address_info_from_address_id($supplier_address_id , 'country_id');
							echo $this->db->get_where('country' , array(
								'country_id' => $country_id
							))->row()->country_name;
						?>
					</p>
				</div>
				<div class="col-sm-4">
					<h5 style="color: #707070;"><?php echo get_phrase('order_info');?></h5>
					<?php
						$date_added     = $this->order_model->get_purchase_order_info_by_order_code($purchase_order_code , 'date_added');
						$date_raised    = $this->order_model->get_purchase_order_info_by_order_code($purchase_order_code , 'date_raised');
						$date_received  = $this->order_model->get_purchase_order_info_by_order_code($purchase_order_code , 'date_received');
						$payment_status = $this->order_model->get_purchase_order_info_by_order_code($purchase_order_code , 'payment_status');
					?>
					<p>
						<strong><?php echo get_phrase('date_added');?> :</strong> <?php echo date('D, d M Y' , $date_added);?>
					</p>
					<p>
						<strong><?php echo get_phrase('date_raised');?> :</strong> <?php if($date_raised != '') echo date('D, d M Y' , $date_raised);?>
					</p>
					<p>
						<strong><?php echo get_phrase('date_received');?> :</strong> <?php if($date_received != '') echo date('D, d M Y' , $date_received);?>
					</p>
					<p>
						<strong><?php echo get_phrase('payment_status');?> :</strong>
					</p>
				</div>

			</div>
		</div>

	</div>
</div>

<?php include 'purchase_order_view_body.php';?>
