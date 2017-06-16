<?php
$total_customers 			= $this->db->get_where('user', array('type' => 2))->num_rows();
$total_suppliers 			= $this->db->get_where('user', array('type' => 3))->num_rows();
$total_employees 			= $this->db->get_where('user', array('type' => 4))->num_rows();
$total_warehouse_managers	= $this->db->get_where('user', array('type' => 5))->num_rows();
?>

<br>
<?php if ($selector == 'user_all'): ?>
<div class="panel panel-primary">

	<div class="panel-body">

		<div class="row">

			<div class="col-md-3">
				<div class="tile-stats tile-white tile-white-primary" style="border: none; text-align: center; padding: 0px;">
					<div class="num" data-start="0" data-end="<?php echo $total_customers; ?>"
						data-duration="1000" data-delay="0">
							<?php echo $total_customers; ?>
					</div>
					<h3><?php echo get_phrase('customers'); ?></h3>
				</div>
			</div>

			<div class="col-md-3">
				<div class="tile-stats tile-white tile-white-primary" style="border: none; text-align: center; padding: 0px;">
					<div class="num" data-start="0" data-end="<?php echo $total_suppliers; ?>"
						data-duration="1000" data-delay="0">
							<?php echo $total_suppliers; ?>
					</div>
					<h3><?php echo get_phrase('suppliers'); ?></h3>
				</div>
			</div>

			<div class="col-md-3">
				<div class="tile-stats tile-white tile-white-primary" style="border: none; text-align: center; padding: 0px;">
					<div class="num" data-start="0" data-end="<?php echo $total_employees; ?>"
						data-duration="1000" data-delay="0">
							<?php echo $total_employees; ?>
					</div>
					<h3><?php echo get_phrase('employees'); ?></h3>
				</div>
			</div>

			<div class="col-md-3">
				<div class="tile-stats tile-white tile-white-primary" style="border: none; text-align: center; padding: 0px;">
					<div class="num" data-start="0" data-end="<?php echo $total_warehouse_managers; ?>"
						data-duration="1000" data-delay="0">
							<?php echo $total_warehouse_managers; ?>
					</div>
					<h3><?php echo get_phrase('warehouse_managers'); ?></h3>
				</div>
			</div>

		</div>

	</div>

</div>
<?php endif; ?>

<div class="row">

	<div class="col-md-12">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<strong>
						<?php
							if($selector == 'user_all')
								echo get_phrase('all_users');
							if($selector == 'user_customer')
								echo get_phrase('customers');
							if($selector == 'user_supplier')
								echo get_phrase('suppliers');
							if($selector == 'user_employee')
								echo get_phrase('employees');
							if($selector == 'user_manager')
								echo get_phrase('warehouse_managers');
						?>
					</strong>
				</div>
			</div>

			<div class="panel-body with-table">

				<table class="table table-bordered datatable" id="table-3">
					<thead>
						<tr class="replace-inputs">
							<th width="7%;" style="color: rgba(221, 221, 221, 0);">i</th>
							<th><?php echo get_phrase('name');?></th>
							<th><?php echo get_phrase('contact');?></th>
							<th><?php echo get_phrase('options');?></th>
						</tr>
					</thead>
					<tbody>
						<?php
							if($selector == 'user_all') {
								$this->db->where('user_id!=' , $this->session->userdata('login_user_id'));
								$users = $this->db->get('user')->result_array();
							}
							if($selector == 'user_customer') {
								$this->db->where('type' , 2);
								$users = $this->db->get('user')->result_array();
							}
							if($selector == 'user_supplier') {
								$this->db->where('type' , 3);
								$users = $this->db->get('user')->result_array();
							}
							if($selector == 'user_employee') {
								$this->db->where('type' , 4);
								$users = $this->db->get('user')->result_array();
							}
							if($selector == 'user_manager') {
								$this->db->where('type' , 5);
								$users = $this->db->get('user')->result_array();
							}
							foreach($users as $row):
						?>
							<tr>
								<td>
									<img src="<?php echo $this->user_model->get_user_image($row['user_code']);?>" class="img-circle"
										width="44">
								</td>
								<td>
									<strong>
										<a href="<?php echo base_url();?>index.php?admin/user_profile/<?php echo $row['user_code'];?>" style="color: #949494;">
											<?php echo $row['name'];?>
										</a>
									</strong>
									<p style="color: #ccc;">
										<?php
											if($row['type'] == 2) {
												echo get_phrase('customer');
											} else if($row['type'] == 3) {
												echo get_phrase('supplier');
											} else if($row['type'] == 4){
												echo get_phrase('employee');
											}
											else if($row['type'] == 5){
												echo get_phrase('warehouse_manager');
											}
										?>
									</p>
								</td>
								<td>
									<?php if($row['email'] != ''):?>
										<i class="entypo-mail"></i> &nbsp;<?php echo $row['email'];?> <br />
									<?php endif;?>
									<?php if($row['phone'] != ''):?>
										<i class="entypo-phone"></i> &nbsp;<?php echo $row['phone'];?> <br />
									<?php endif;?>
								</td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
											<?php echo get_phrase('action');?> <span class="caret"></span>
										</button>
										<ul class="dropdown-menu dropdown-default" role="menu">
											<li>
												<a href="<?php echo base_url();?>index.php?admin/user_profile/<?php echo $row['user_code'];?>">
													<i class="entypo-user"></i> <?php echo get_phrase('profile');?>
												</a>
											</li>
											<li>
												<a href="<?php echo base_url();?>index.php?admin/user_edit/<?php echo $row['user_code'];?>">
													<i class="entypo-pencil"></i> <?php echo get_phrase('edit');?>
												</a>
											</li>
											<li class="divider"></li>
											<li>
												<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/user/delete/<?php echo $row['user_code'];?>' ,
																			'<?php echo base_url();?>index.php?admin/user_list/<?php echo $selector;?>')">
													<i class="entypo-trash"></i> <?php echo get_phrase('delete');?>
												</a>
											</li>
										</ul>
									</div>
								</td>
							</tr>
						<?php endforeach;?>
					</tbody>
					<tfoot>
						<tr>
							<th>i</th>
							<th><?php echo get_phrase('name');?></th>
							<th><?php echo get_phrase('contact');?></th>
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
		$('#foot_i').attr("disabled",true);

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
		var delete_message = '<?php echo get_phrase('user_deleted');?>';
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
