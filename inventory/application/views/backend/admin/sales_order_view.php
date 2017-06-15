<ol class="breadcrumb bc-3">

	<li>
		<a href="<?php echo base_url();?>index.php?admin/dashboard">
			<i class="entypo-home"></i>
				<?php echo get_phrase('dashboard');?>
		</a>
	</li>

	<li>
		<a href="<?php echo base_url();?>index.php?admin/sales_order_list/order_all">
			<?php echo get_phrase('sales_orders');?>
		</a>
	</li>

	<li class="active">
		<strong><?php echo get_phrase('view_order');?></strong>
	</li>

</ol>

<?php 
	$order_status = $this->order_model->get_sales_order_info_by_order_code($order_code , 'order_status');
	if($order_status == 10):
?>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger">
			<i class="entypo-cancel"></i> <strong><?php echo get_phrase('this_order_has_been_canceled');?></strong>
		</div>
	</div>
</div>
<?php endif;?>

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="1">
			<div class="panel-heading">
				<div class="panel-title" style="color: #676767; font-size: 14px;">
					<strong><?php echo get_phrase('sales_order');?> #<?php echo $order_code;?></strong>
				</div>
				
				<div class="panel-options">

					<?php if($order_status != 10 && $order_status != 0):?>
					
					<a href="#" onclick="confirm_modal_2('<?php echo base_url();?>index.php?admin/sales_order/mark_as_paid/<?php echo $order_code;?>' ,
									                        '<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $order_code;?>/overview')" 
						class="tooltip-primary" data-toggle="tooltip" 
				 		data-placement="top" title="" data-original-title="<?php echo get_phrase('mark_as_paid');?>">
						<i class="glyphicon glyphicon-thumbs-up" style="color: #676767;"></i>
					</a>
					&nbsp; &nbsp;
					<a href="#" onclick="confirm_modal_2('<?php echo base_url();?>index.php?admin/sales_order/mark_as_delivered/<?php echo $order_code;?>' ,
									                        '<?php echo base_url();?>index.php?admin/sales_order_view/<?php echo $order_code;?>/overview')" 
						class="tooltip-primary" data-toggle="tooltip" 
				 		data-placement="top" title="" data-original-title="<?php echo get_phrase('mark_as_delivered');?>">
						<i class="glyphicon glyphicon-ok" style="color: #676767;"></i>
					</a>
					&nbsp; &nbsp;
				<?php endif;?>
					<a href="#" data-rel="collapse" class="tooltip-primary" data-toggle="tooltip"
						data-placement="top" title="" data-original-title="<?php echo get_phrase('info');?>">
						<i class="glyphicon glyphicon-info-sign" style="color: #676767;"></i>
					</a>

				</div>
			</div>
			
			<!-- panel body -->
			<div class="panel-body">
				
				<div class="col-sm-4">
					<?php 
						$customer_id = $this->order_model->get_sales_order_info_by_order_code($order_code , 'customer_user_id');
						$billing_address_id = $this->order_model->get_sales_order_info_by_order_code($order_code , 'billing_address_id');
						$shipping_address_id = $this->order_model->get_sales_order_info_by_order_code($order_code , 'shipping_address_id');
					?>
					<h5 style="color: #949494;"><?php echo $this->info_model->get_user_info_from_id($customer_id , 'name');?></h5>
					<p>
						<i class="entypo-mail"></i> &nbsp;
						<?php echo $this->info_model->get_user_info_from_id($customer_id , 'email');?>
					</p>
					<p>
						<i class="entypo-phone"></i> &nbsp;
						<?php echo $this->info_model->get_user_info_from_id($customer_id , 'phone');?>
					</p>
				</div> 
				<div class="col-sm-4">
					<h5 style="color: #707070;"><?php echo get_phrase('billing_address');?></h5>
					<p>
						<?php echo $this->info_model->get_address_info_from_address_id($billing_address_id , 'address_line_1');?>, 
						<?php echo $this->info_model->get_address_info_from_address_id($billing_address_id , 'address_line_2');?>
					</p>
					<p>
						<?php echo get_phrase('city');?> : <?php echo $this->info_model->get_address_info_from_address_id($billing_address_id , 'city');?>
					</p>
					<p>
						<?php echo get_phrase('zip_code');?> : <?php echo $this->info_model->get_address_info_from_address_id($billing_address_id , 'zip_code');?>
					</p>
					<p>
						<?php echo get_phrase('state');?> : <?php echo $this->info_model->get_address_info_from_address_id($billing_address_id , 'state');?>
					</p>
					<p>
						<?php 
							$country_id =  $this->info_model->get_address_info_from_address_id($billing_address_id , 'country_id');
							echo $this->db->get_where('country' , array(
								'country_id' => $country_id
							))->row()->country_name;
						?>
					</p>
				</div> 
				<div class="col-sm-4">
					<h5 style="color: #707070;"><?php echo get_phrase('shipping_address');?></h5>
					<p>
						<?php echo $this->info_model->get_address_info_from_address_id($shipping_address_id , 'address_line_1');?>, 
						<?php echo $this->info_model->get_address_info_from_address_id($shipping_address_id , 'address_line_2');?>
					</p>
					<p>
						<?php echo get_phrase('city');?> : <?php echo $this->info_model->get_address_info_from_address_id($shipping_address_id , 'city');?>
					</p>
					<p>
						<?php echo get_phrase('zip_code');?> : <?php echo $this->info_model->get_address_info_from_address_id($shipping_address_id , 'zip_code');?>
					</p>
					<p>
						<?php echo get_phrase('state');?> : <?php echo $this->info_model->get_address_info_from_address_id($shipping_address_id , 'state');?>
					</p>
					<p>
						<?php 
							$country_id =  $this->info_model->get_address_info_from_address_id($shipping_address_id , 'country_id');
							echo $this->db->get_where('country' , array(
								'country_id' => $country_id
							))->row()->country_name;
						?>
					</p>
				</div> 

			</div>
		</div>

	</div>
</div>

<div class="main_data">
	<?php include $view_page . '.php';?>
</div>



<script type="text/javascript">
	
	// custom function for data deletion by ajax and post refreshing call
	function confirm(url , post_refresh_url)
	{
		var confirm_message = '<?php echo get_phrase('information_updated');?>';
		// showing user-friendly pre-loader image
		$('#preloader-delete').html('<img src="assets/preloader.GIF" style="height:15px;margin-top:-10px;" />');
		
		// disables the delete and cancel button during deletion ajax request
		document.getElementById("confirm_link").disabled=true;
		document.getElementById("confirm_cancel_link").disabled=true;
		
		$.ajax({
			url: url,
			success: function(response)
			{
				// remove the preloader 
				$('#preloader-delete').html('');

				// show deletion success msg.
				toastr.success(confirm_message);
				
				// hide the delete dialog box
				$('#modal_confirm').modal('hide');
				
				// enables the delete and cancel button after deletion ajax request success
				document.getElementById("confirm_link").disabled=false;
				document.getElementById("confirm_cancel_link").disabled=false;
		
				// reload the table
				reload_page(post_refresh_url);
			}
		});
	}

	// function for reloading table data
	function reload_page(url)
	{
		$(location).attr('href' , url);
	}

</script>
