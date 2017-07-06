<br>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered responsive">
			<thead>
				<tr>
					<th width="3%">#</th>
					<th><?php echo get_phrase('warehouse_code');?></th>
					<th><?php echo get_phrase('warehouse_title');?></th>
					<th><?php echo get_phrase('manager');?></th>
					<th><?php echo get_phrase('Address');?></th>
					<th><?php echo get_phrase('phone_numnber');?></th>
					<th><?php echo get_phrase('note');?></th>
					<th><?php echo get_phrase('date_added');?></th>
					<th><?php echo get_phrase('last_modified');?></th>
					<!-- <th width="16%"><?php echo get_phrase('options');?></th> -->
				</tr>
			</thead>
			<tbody>
			<?php
				$count 		=	1;

        $this->db->select('user_code');
        $this->db->where('user_id', $this->session->userdata('login_user_id'));
        $query_result = $this->db->get('user')->row_array();
        $this->db->where('warehouse_user_code', $query_result['user_code']);
				$warehouse	=	$this->db->get('warehouse')->result_array();
				foreach ($warehouse as $row):
        $warehouse_code = $row['warehouse_code'];
			?>
				<tr>
					<td><?php echo $count++;?></td>
					<td><?php echo $row['warehouse_code'];?></td>
					<td><a href = "<?php echo site_url('manager/manager_warehouse_details/').'/'.$warehouse_code ?>" style="color:gray; font-weight: bold;"><?php echo $row['warehouse_title'];?></a></td>
					<td>
						<?php
							$manager_name = $this->warehouse_model->get_manager_name($row['warehouse_user_code']);
							echo $manager_name['name'];
						?>
				  </td>
					<td><?php echo $row['warehouse_address'];?></td>
					<td><?php echo $row['warehouse_phone_number'];?></td>
					<td><?php echo $row['warehouse_note'];?></td>
					<td>
						<?php
							if($row['warehouse_date_added'] != '')
								echo date("D, d M Y" , $row['warehouse_date_added']);
						?>
					</td>
					<td>
						<?php
							if($row['warehouse_last_modified'] != '')
								echo date("D, d M Y" , $row['warehouse_last_modified']);
						?>
					</td>
					<!-- <td>
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
					</td> -->
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>


<script type="text/javascript">

	// custom function for data deletion by ajax and post refreshing call
	function delete_data(delete_url , post_refresh_url)
	{
		var delete_message = '<?php echo get_phrase('product_category_deleted');?>';
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
