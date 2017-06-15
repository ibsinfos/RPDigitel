<div class="row">
	<div class="col-md-2">
		<a href="<?php echo base_url();?>index.php?admin/user_edit/<?php echo $user_code;?>" class="member-img">
			<?php if(file_exists('uploads/user_image/'.$user_code.'.jpg')):?>
				<img src="uploads/user_image/<?php echo $user_code;?>.jpg" class="img-rounded img-responsive"/>
			<?php endif;?>
			<?php if(!file_exists('uploads/user_image/'.$user_code.'.jpg')):?>
				<img src="assets/no_image.png" class="img-rounded img-responsive"/>
			<?php endif;?>
		</a>
	</div>
	<div class="col-md-4" style="padding: 30px;">
		<h4>
			<a href="<?php echo base_url();?>index.php?admin/user_edit/<?php echo $user_code;?>" style="color: #676767;">
				<?php echo $this->user_model->get_user_info($user_code , 'name');?>
			</a>
		</h4>
		<p style="color: #ccc;">
			<?php
				if($this->user_model->get_user_info($user_code , 'type') == 2) echo get_phrase('customer');
				if($this->user_model->get_user_info($user_code , 'type') == 3) echo get_phrase('supplier');
				if($this->user_model->get_user_info($user_code , 'type') == 4) echo get_phrase('employee');
				if($this->user_model->get_user_info($user_code , 'type') == 5) echo get_phrase('warehouse_manager');
			?>
		</p>
	</div>
	<div class="col-md-6">
		<ul>
			<li>
				<strong><?php echo get_phrase('user_code');?> : </strong>
					<?php echo $this->user_model->get_user_info($user_code , 'user_code');?>
			</li>
			<li>
				<strong><?php echo get_phrase('email');?> : </strong>
					<?php echo $this->user_model->get_user_info($user_code , 'email');?>
			</li>
			<li>
				<strong><?php echo get_phrase('phone');?> : </strong>
					<?php echo $this->user_model->get_user_info($user_code , 'phone');?>
			</li>
			<li>
				<strong><?php echo get_phrase('account_created');?> : </strong>
					<?php echo date('D, d M Y' , $this->user_model->get_user_info($user_code , 'date_added'));?>
			</li>
			<li>
				<strong><?php echo get_phrase('last_modified');?> : </strong>
					<?php if($this->user_model->get_user_info($user_code , 'last_modified') != '') {
						echo date('D, d M Y' , $this->user_model->get_user_info($user_code , 'last_modified'));
					}
					?>
			</li>
		</ul>
	</div>
</div>

<br /> <br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-location-arrow"></i> &nbsp;<?php echo get_phrase('addresses');?>
				</div>
			</div>
			<div class="panel-body">

				<button type="button" class="btn btn-info btn-icon icon-left btn-sm"
					onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/address_add/<?php echo $user_code;?>')">
					<?php echo get_phrase('add_new_address');?>
					<i class="entypo-plus"></i>
				</button>

				<br><br>

				<table class="table table-bordered responsive">
					<thead>
						<tr>
							<th width="3%">#</th>
							<th><?php echo get_phrase('address_line_1');?></th>
							<th><?php echo get_phrase('address_line_2');?></th>
							<th><?php echo get_phrase('city');?></th>
							<th><?php echo get_phrase('zip_code');?></th>
							<th><?php echo get_phrase('state');?></th>
							<th><?php echo get_phrase('country');?></th>
							<th><?php echo get_phrase('options');?></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$count = 1;
						$this->db->where('user_id' , $this->user_model->get_user_info($user_code , 'user_id'));
						$addresses = $this->db->get('address')->result_array();
						foreach($addresses as $row):
					?>
						<tr>
							<td><?php echo $count++;?></td>
							<td><?php echo $row['address_line_1'];?></td>
							<td><?php echo $row['address_line_2'];?></td>
							<td><?php echo $row['city'];?></td>
							<td><?php echo $row['zip_code'];?></td>
							<td><?php echo $row['state'];?></td>
							<td>
								<?php echo $this->db->get_where('country' , array(
									'country_id' => $row['country_id']
								))->row()->country_name;?>
							</td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
										<?php echo get_phrase('action');?> <span class="caret"></span>
									</button>
									<ul class="dropdown-menu dropdown-default" role="menu">
										<li>
											<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/address_edit/<?php echo $row['address_code'];?>/<?php echo $user_code;?>')">
												<i class="entypo-pencil"></i> <?php echo get_phrase('edit');?>
											</a>
										</li>
										<li>
											<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/address/delete/<?php echo $row['address_code'];?>' ,
																			'<?php echo base_url();?>index.php?admin/reload_user_profile_body/<?php echo $user_code;?>')">
												<i class="entypo-trash"></i> <?php echo get_phrase('delete');?>
											</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>

			</div>
		</div>

	</div>
</div>

<?php
	$user_type = $this->user_model->get_user_info($user_code , 'type');
	if($user_type == 2):
?>

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-history"></i> &nbsp;<?php echo get_phrase('sales_order_history');?>
				</div>
			</div>
			<div class="panel-body">

				<table class="table table-bordered responsive">
					<thead>
						<tr>
							<th width="3%">#</th>
							<th><?php echo get_phrase('order_code');?></th>
							<th><?php echo get_phrase('date_created');?></th>
							<th><?php echo get_phrase('last_modified');?></th>
							<th><?php echo get_phrase('status');?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$count = 1;
						// getting the orders associated with the current user profile
						$user_id = $this->user_model->get_user_info($user_code , 'user_id');
						$this->db->order_by('date_added' , 'desc');
						$sales_orders = $this->db->get_where('sales_order' , array('customer_user_id' => $user_id))->result_array();
						foreach($sales_orders as $sales_order):
							if($sales_order['order_status'] == 0) {
								$redirect = 'confirm';
							} else {
								$redirect = 'overview';
							}
					?>
						<tr>
							<td><?php echo $count++;?></td>
							<td>
								<strong>
									<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $sales_order['order_code'];?>/<?php echo $redirect;?>" style="color: #949494;">
										<?php echo $sales_order['order_code'];?>
									</a>
								</strong>
							</td>
							<td><?php if($sales_order['date_added'] != '') echo date('D, d M Y' , $sales_order['date_added']);?></td>
							<td><?php if($sales_order['last_modified'] != '') echo date('D, d M Y' , $sales_order['last_modified']);?></td>
							<td>
								<?php if($sales_order['order_status'] == 0):?>
									<i class="fa fa-bell" style="color: #ffd78a;"></i> <?php echo get_phrase('pending');?>
								<?php endif;?>
								<?php if($sales_order['order_status'] == 1):?>
									<i class="fa fa-thumbs-o-up" style="color: #008d45;"></i> <?php echo get_phrase('confirmed');?>
								<?php endif;?>
								<?php if($sales_order['order_status'] == 2):?>
									<i class="fa fa-circle-o-notch fa-spin" style="color: #008d45;"></i> <?php echo get_phrase('partially_shipped');?>
								<?php endif;?>
								<?php if($sales_order['order_status'] == 3):?>
									<i class="fa fa-plane" style="color: #008d45;"></i> <?php echo get_phrase('shipped');?>
								<?php endif;?>
								<?php if($sales_order['order_status'] == 4):?>
									<i class="fa fa-check" style="color: #008d45;"></i> <?php echo get_phrase('delivered');?>
								<?php endif;?>
								<?php if($sales_order['order_status'] == 10):?>
									<i class="fa fa-times" style="color: #cd0422;"></i> <?php echo get_phrase('canceled');?>
								<?php endif;?>
							</td>
							<td>
								<a href="<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $sales_order['order_code'];?>/<?php echo $redirect;?>"
									class="btn btn-default btn-icon icon-left btn-sm">
									<?php echo get_phrase('view_order');?>
									<i class="entypo-target"></i>
								</a>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>

			</div>
		</div>

	</div>
</div>

<?php endif;?>

<?php if($user_type == 4):?>

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-star"></i> &nbsp;<?php echo get_phrase('permissions');?>
				</div>
			</div>
			<div class="panel-body">

				<div class="col-sm-4">
					<i class="fa fa-circle" <?php if($this->user_model->check_permission($user_code , 3)):?> style="color: #0c9e41;"<?php endif;?>></i> &nbsp;<strong><?php echo get_phrase('manage_sales_orders');?></strong>
					<hr />
					This permission will allow the user to add and process sales orders. He/she will be able to view and edit
					the stages of order processing including invoice creation and taking payments.
				</div>
				<div class="col-sm-4">
					<i class="fa fa-circle" <?php if($this->user_model->check_permission($user_code , 2)):?> style="color: #0c9e41;"<?php endif;?>></i> &nbsp;<strong><?php echo get_phrase('manage_purchase_orders');?></strong>
					<hr />
					This permission will allow the user to add and process purchase orders. He/she will be able to raise the purchase
					orders and receive the products ordered which will increase the stock of that product automatically.
				</div>
				<div class="col-sm-4">
					<i class="fa fa-circle" <?php if($this->user_model->check_permission($user_code , 1)):?> style="color: #0c9e41;"<?php endif;?>></i> &nbsp;<strong><?php echo get_phrase('manage_inventory');?></strong>
					<hr />
					This permission will allow the user to add products to the system. Also he/she can keep track of the stock
					quantity of the products and also can edit them.
				</div>

			</div>
		</div>

	</div>
</div>

<?php endif;?>


<script type="text/javascript">

	$(document).ready(function() {

		// calls the tooltip again on ajax success
        $('[data-toggle="tooltip"]').each(function(i, el)
        {
            var $this = $(el),
                placement = attrDefault($this, 'placement', 'top'),
                trigger = attrDefault($this, 'trigger', 'hover'),
                popover_class = $this.hasClass('tooltip-secondary') ? 'tooltip-secondary' : ($this.hasClass('tooltip-primary') ? 'tooltip-primary' : ($this.hasClass('tooltip-default') ? 'tooltip-default' : ''));

            $this.tooltip({
                placement: placement,
                trigger: trigger
            });

            $this.on('shown.bs.tooltip', function(ev)
            {
                var $tooltip = $this.next();

                $tooltip.addClass(popover_class);
            });
        });
	});

</script>

<script type="text/javascript">

	// custom function for data deletion by ajax and post refreshing call
	function delete_data(delete_url , post_refresh_url)
	{
		var delete_message = '<?php echo get_phrase('address_deleted');?>';
		// showing user-friendly pre-loader image
		$('#preloader-delete').html('<img src="assets/preloader.GIF" style="height:15px;margin-top:-10px;" />');

		// disables the delete and cancel button during deletion ajax request
		document.getElementById("delete_link").disabled=true;
		document.getElementById("delete_cancel_link").disabled=true;

		$.ajax({
			url: delete_url,
			success: function(response)
			{
				// remove the preloader
				$('#preloader-delete').html('');

				// show deletion success msg.
				toastr.info(delete_message);

				// hide the delete dialog box
				$('#modal_delete').modal('hide');

				// enables the delete and cancel button after deletion ajax request success
				document.getElementById("delete_link").disabled=false;
				document.getElementById("delete_cancel_link").disabled=false;

				// reload the table
				reload_data(post_refresh_url);
			}
		});
	}

	// function for reloading table data
	function reload_data(url)
	{
		$('div.main_data').block({ message: '<img src="assets/preloader.GIF" style="height:25px;" />' });
		$.ajax({
			url: url,
			success: function(response)
			{
				jQuery('.main_data').html(response);
				$('div.main_data').unblock();
			}
		});
	}

</script>
