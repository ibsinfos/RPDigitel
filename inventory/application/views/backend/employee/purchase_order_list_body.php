<?php 
	if($order_status == 'all') {
		$purchase_orders	=	$this->db->get_where('purchase_order' , array(
			'archive_status' => 0
		))->result_array();
	}
	if($order_status == 'pending') {
		$purchase_orders	=	$this->db->get_where('purchase_order' , array(
			'order_status' => 0 , 'archive_status' => 0
		))->result_array();
	}
	if($order_status == 'raised') {
		$purchase_orders	=	$this->db->get_where('purchase_order' , array(
			'order_status' => 1 , 'archive_status' => 0
		))->result_array();
	}
	if($order_status == 'received') {
		$purchase_orders	=	$this->db->get_where('purchase_order' , array(
			'order_status' => 2 , 'archive_status' => 0
		))->result_array();
	}

	if($order_status == 'archived') {
		$purchase_orders	=	$this->db->get_where('purchase_order' , array(
			'archive_status' => 1
		))->result_array();
	}

?>
<div class="row">
	
	<div class="col-md-12">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<strong>
						<?php 
							if($order_status == 'all')
								echo get_phrase('all_orders');
							if($order_status == 'pending')
								echo get_phrase('pending_orders');
							if($order_status == 'raised')
								echo get_phrase('raised_orders');
							if($order_status == 'received')
								echo get_phrase('received_orders');
						?>
					</strong>
				</div>
			</div>
				
			<div class="panel-body with-table">
				
				<table class="table table-bordered datatable" id="table-3">
					<thead>
						<tr class="replace-inputs">
							<th><?php echo get_phrase('order_code');?></th>
							<th><?php echo get_phrase('supplier');?></th>
							<?php if($order_status == 'all'):?>
								<th><?php echo get_phrase('status');?></th>
							<?php endif;?>
							<th><?php echo get_phrase('total');?></th>
							<th><?php echo get_phrase('date_added');?></th>
							<th><?php echo get_phrase('date_raised');?></th>
							<th><?php echo get_phrase('date_received');?></th>
							<th><?php echo get_phrase('options');?></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($purchase_orders as $row):?>
						<tr>
							<td>
								<strong>
									<a href="<?php echo base_url();?>index.php?employee/purchase_order_view/<?php echo $row['purchase_order_code'];?>" style="color: #949494;">
										<?php echo $row['purchase_order_code'];?>
									</a>
								</strong>
							</td>
							<td>
								<?php echo $this->info_model->get_user_info_from_id($row['supplier_user_id'] , 'name');?>
							</td>
							<?php if($order_status == 'all'):?>
								<td align="center">
									<?php if($row['order_status'] == 0):?>
										<i class="entypo-bell" style="color: #fad839"></i> <?php echo get_phrase('pending');?>
									<?php endif;?>
									<?php if($row['order_status'] == 1):?>
										<i class="entypo-paper-plane"></i> <?php echo get_phrase('raised');?>
									<?php endif;?>
									<?php if($row['order_status'] == 2):?>
										<i class="entypo-check" style="color: #00a651"></i> <?php echo get_phrase('received');?>
									<?php endif;?>
								</td>
							<?php endif;?>
							<td><?php echo $row['total_amount'];?></td>
							<td><?php echo date('D, d M Y' , $row['date_added']);?></td>
							<td><?php if($row['date_raised'] != '') echo date('D, d M Y' , $row['date_raised']);?></td>
							<td><?php if($row['date_received'] != '') echo date('D, d M Y' , $row['date_received']);?></td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
										<?php echo get_phrase('action');?> <span class="caret"></span>
									</button>
									<ul class="dropdown-menu dropdown-default" role="menu">
										<li>
											<a href="<?php echo base_url();?>index.php?employee/purchase_order_view/<?php echo $row['purchase_order_code'];?>">
												<i class="entypo-direction"></i> <?php if($row['order_status'] < 2) echo get_phrase('process'); else echo get_phrase('view');?>
											</a>
										</li>
										<?php if($row['order_status'] == 0):?>
											<li>
												<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?employee/purchase_order/delete/<?php echo $row['purchase_order_code'];?>' , 
																			'<?php echo base_url();?>index.php?employee/purchase_order_list/order_all')">
													<i class="entypo-trash"></i> <?php echo get_phrase('delete');?>
												</a>
											</li>
										<?php endif;?>
										<?php if($row['order_status'] == 2):?>
											<li class="divider"></li>
											<li>
												<a href="<?php echo base_url();?>index.php?employee/purchase_order/archive/<?php echo $row['purchase_order_code'];?>"
													<i class="entypo-archive"></i> <?php echo get_phrase('archive');?>
												</a>
											</li>
										<?php endif;?>
									</ul>
								</div>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
					<tfoot>
						<tr>
							<th><?php echo get_phrase('order_code');?></th>
							<th><?php echo get_phrase('supplier');?></th>
							<?php if($order_status == 'all'):?>
								<th><?php echo get_phrase('status');?></th>
							<?php endif;?>
							<th><?php echo get_phrase('total');?></th>
							<th><?php echo get_phrase('date_added');?></th>
							<th><?php echo get_phrase('date_raised');?></th>
							<th><?php echo get_phrase('date_received');?></th>
							<th><?php echo get_phrase('options');?></th>
						</tr>
					</tfoot>
				</table>

			</div>
		</div>

	</div>

</div>


<script type="text/javascript">

	jQuery( document ).ready( function( $ ) {
		var $table3 = jQuery("#table-3");
		
		var table3 = $table3.DataTable( {
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
		} );
		
		// Initalize Select Dropdown after DataTables is created
		$table3.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
			minimumResultsForSearch: -1
		});
		
		// Setup - add a text input to each footer cell
		$( '#table-3 tfoot th' ).each( function () {
			var title = $('#table-3 thead th').eq( $(this).index() ).text();
			$(this).html( '<input id="foot_' + title +'" type="text" class="form-control" placeholder="Search" />' );
		} );

		// disables search in the option column
		$('#foot_Options').attr("disabled",true);
		
		// Apply the search
		table3.columns().every( function () {
			var that = this;
		
			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
						.search( this.value )
						.draw();
				}
			} );
		} );
	} );

</script>


<script type="text/javascript">
	
	// custom function for data deletion by ajax and post refreshing call
	function delete_data(delete_url , post_refresh_url)
	{
		var delete_message = '<?php echo get_phrase('order_deleted');?>';
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
		$(location).attr('href' , url);
	}

</script>