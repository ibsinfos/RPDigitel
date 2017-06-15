<br>
<div class="row">
	<div class="col-md-12 panel-body with-table">
		<table class="table table-bordered responsive" id = "warehouse_table_data">
			<thead>
				<tr>
					<th width="3%">#</th>
					<th><?php echo get_phrase('code');?></th>
					<th><?php echo get_phrase('warehouse_title');?></th>
					<th><?php echo get_phrase('manager');?></th>
					<th><?php echo get_phrase('phone_numnber');?></th>
					<th><?php echo get_phrase('date_added');?></th>
					<th width="16%"><?php echo get_phrase('options');?></th>
				</tr>
			</thead>
			<tbody>
			<?php
				$count 		=	1;
				$warehouse	=	$this->db->get('warehouse')->result_array();
				foreach ($warehouse as $row):
			?>
				<tr>
					<td><?php echo $count++;?></td>
					<td><?php echo $row['warehouse_code'];?></td>
					<td><?php echo $row['warehouse_title'];?></td>
					<td>
						<?php
							$manager_name = $this->warehouse_model->get_manager_name($row['warehouse_user_code']);
							echo $manager_name['name'];
						?>
				  </td>
					<td><?php echo $row['warehouse_phone_number'];?></td>
					<td>
						<?php
							if($row['warehouse_date_added'] != '')
								echo date("D, d M Y" , $row['warehouse_date_added']);
						?>
					</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
								<?php echo get_phrase('action');?> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu dropdown-default" role="menu">
								<li>
									<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/warehouse_edit/<?php echo $row['warehouse_code'];?>')">
										<i class="entypo-pencil"></i> <?php echo get_phrase('edit');?>
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/warehouse_delete/<?php echo $row['warehouse_code'];?>' ,
																			'<?php echo base_url();?>index.php?admin/reload_warehouse_table')">
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
					<th><?php echo get_phrase('code');?></th>
					<th><?php echo get_phrase('warehouse_title');?></th>
					<th><?php echo get_phrase('manager');?></th>
					<th><?php echo get_phrase('phone_numnber');?></th>
					<th><?php echo get_phrase('date_added');?></th>
					<th><?php echo get_phrase('action');?></th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>


<script type="text/javascript">

	// custom function for data deletion by ajax and post refreshing call
	function delete_data(delete_url , post_refresh_url)
	{
		var delete_message = '<?php echo get_phrase('warehouse_deleted');?>';
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

<script type="text/javascript">
	jQuery( document ).ready( function( $ ) {
		var $warehouse_table_data = jQuery("#warehouse_table_data");

		var warehouse_table_data = $warehouse_table_data.DataTable( {
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
		} );

		// Initalize Select Dropdown after DataTables is created
		$warehouse_table_data.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
			minimumResultsForSearch: -1
		});

		// Setup - add a text input to each footer cell
		$( '#warehouse_table_data tfoot th' ).each( function () {
			var title = $('#warehouse_table_data thead th').eq( $(this).index() ).text();
			$(this).html( '<input id="foot_' + title +'" type="text" class="form-control" placeholder="Search" />' );
		} );

		// disables search in the option column
		$('#foot_Options').attr("disabled",true);
		$('#foot_i').attr("disabled",true);

		// Apply the search
		warehouse_table_data.columns().every( function () {
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
