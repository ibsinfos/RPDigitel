<?php
	if($order_status == 'all') {
		$sales_orders	=	$this->db->get_where('sales_order' , array('customer_user_id' => $this->session->userdata('login_user_id')))->result_array();
	}
	if($order_status == 'pending') {
		$sales_orders	=	$this->db->get_where('sales_order' , array(
			'order_status' => 0 , 'customer_user_id' => $this->session->userdata('login_user_id')))->result_array();
	}
	if($order_status == 'confirmed') {
		$sales_orders	=	$this->db->get_where('sales_order' , array(
			'order_status' => 1 , 'customer_user_id' => $this->session->userdata('login_user_id')))->result_array();
	}
	if($order_status == 'partially_shipped') {
		$sales_orders	=	$this->db->get_where('sales_order' , array(
			'order_status' => 2 , 'customer_user_id' => $this->session->userdata('login_user_id')))->result_array();
	}
	if($order_status == 'shipped') {
		$sales_orders	=	$this->db->get_where('sales_order' , array(
			'order_status' => 3 , 'customer_user_id' => $this->session->userdata('login_user_id')))->result_array();
	}
	if($order_status == 'delivered') {
		$sales_orders	=	$this->db->get_where('sales_order' , array(
			'order_status' => 4 , 'customer_user_id' => $this->session->userdata('login_user_id')))->result_array();
	}
	if($order_status == 'archived') {
		$sales_orders	=	$this->db->get_where('sales_order' , array(
			'archive_status' => 1 , 'customer_user_id' => $this->session->userdata('login_user_id')))->result_array();
	}
	if($order_status == 'canceled') {
		$sales_orders	=	$this->db->get_where('sales_order' , array(
			'order_status' => 10 , 'customer_user_id' => $this->session->userdata('login_user_id')
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
							if($order_status == 'confirmed')
								echo get_phrase('confirmed_orders');
							if($order_status == 'partially_shipped')
								echo get_phrase('partially_shipped_orders');
							if($order_status == 'shipped')
								echo get_phrase('shipped_orders');
							if($order_status == 'delivered')
								echo get_phrase('delivered_orders');
						?>
					</strong>
				</div>
			</div>

			<div class="panel-body with-table">

				<table class="table table-bordered datatable" id="table-3">
					<thead>
						<tr class="replace-inputs">
							<th><?php echo get_phrase('order_code');?></th>
							<?php if($order_status == 'all'):?>
								<th><?php echo get_phrase('confirmed');?></th>
								<th><?php echo get_phrase('shipped');?></th>
								<th><?php echo get_phrase('delivered');?></th>
							<?php endif;?>
							<th><?php echo get_phrase('total');?></th>
							<th><?php echo get_phrase('date_added');?></th>
							<th><?php echo get_phrase('last_modified');?></th>
							<th><?php echo get_phrase('options');?></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($sales_orders as $row):?>
						<?php
							//finding redirection of view page
							if($row['order_status'] == 0) {
								$redirect = 'confirm';
							} else {
								$redirect = 'overview';
							}
						?>
						<tr>
							<td>
								<strong>
									<a href="<?php echo base_url();?>index.php?customer/sales_order_view/<?php echo $row['order_code'];?>/<?php echo $redirect;?>" style="color: #949494;">
										<?php echo $row['order_code'];?>
									</a>
								</strong>
							</td>
							<?php if($order_status == 'all'):?>
								<td align="center">
									<i class="fa fa-circle"
										<?php if($row['order_status'] >= 1):?>	style="color: #00a651;"<?php endif;?>>
									</i>
								</td>
								<td align="center">
								<?php if($row['order_status'] == 2):?>
									<i class="fa fa-circle-o-notch fa-spin" style="color: #fad839;"></i>
								<?php endif;?>
								<?php if($row['order_status'] != 2):?>
									<i class="fa fa-circle" <?php if($row['order_status'] >= 3):?>style="color: #00a651;"<?php endif;?>></i>
								<?php endif;?>
								</td>
								<td align="center">
									<i class="fa fa-circle"
										<?php if($row['order_status'] >= 4):?>	style="color: #00a651;"<?php endif;?>>
									</i>
								</td>
							<?php endif;?>
							<td><?php echo $row['total_amount'];?></td>
							<td><?php echo date('D, d M Y' , $row['date_added']);?></td>
							<td><?php if($row['last_modified'] != '') echo date('D, d M Y' , $row['last_modified']);?></td>
							<td>
								<a href="<?php echo base_url();?>index.php?customer/sales_order_view/<?php echo $row['order_code'];?>/<?php echo $redirect;?>"
									class="btn btn-default btn-icon icon-left btn-sm">
									<?php echo get_phrase('view');?>
									<i class="entypo-eye"></i>
								</a>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
					<tfoot>
						<tr>
							<th><?php echo get_phrase('order_code');?></th>
							<?php if($order_status == 'all'):?>
								<th><?php echo get_phrase('confirmed');?></th>
								<th><?php echo get_phrase('shipped');?></th>
								<th><?php echo get_phrase('delivered');?></th>
							<?php endif;?>
							<th><?php echo get_phrase('total');?></th>
							<th><?php echo get_phrase('date_added');?></th>
							<th><?php echo get_phrase('last_modified');?></th>
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
		$('#foot_Pending').attr("disabled",true);
		$('#foot_Confirmed').attr("disabled",true);
		$('#foot_Total').attr("disabled",true);
		$('#foot_Shipped').attr("disabled",true);
		$('#foot_Delivered').attr("disabled",true);

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

</script>
