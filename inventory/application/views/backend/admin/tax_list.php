<br>
<div class="row">
	
	<div class="col-md-12">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<strong>
						<i class="fa fa-dollar"></i> &nbsp;<?php echo get_phrase('tax_rates');?>
					</strong>
				</div>
			</div>
				
			<div class="panel-body with-table">
				
				<table class="table table-bordered table-responsive">
					<thead>
						<tr class="replace-inputs">
							<th width="3%;">#</th>
							<th><?php echo get_phrase('tax_code');?></th>
							<th><?php echo get_phrase('name');?></th>
							<th><?php echo get_phrase('percentage_value');?></th>
							<th><?php echo get_phrase('date_added');?></th>
							<th><?php echo get_phrase('last_modified');?></th>
							<th><?php echo get_phrase('options');?></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$count = 1; 
							$taxes = $this->db->get('tax')->result_array();
							foreach($taxes as $row):
						?>	
							<tr>
								<td><?php echo $count++;?></td>
								<td><?php echo $row['tax_code'];?></td>
								<td><?php echo $row['name'];?></td>
								<td align="center"><?php echo $row['value'];?> %</td>
								<td><?php if($row['date_created'] != '') echo date('D, d M Y' , $row['date_created']);?></td>
								<td><?php if($row['last_modified'] != '') echo date('D, d M Y' , $row['last_modified']);?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
											<?php echo get_phrase('action');?> <span class="caret"></span>
										</button>
										<ul class="dropdown-menu dropdown-default" role="menu">
											<li>
												<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/tax_edit/<?php echo $row['tax_id'];?>')">
													<i class="entypo-pencil"></i> <?php echo get_phrase('edit');?>
												</a>
											</li>
											<li>
												<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/tax/delete/<?php echo $row['tax_id'];?>' , 
																			'<?php echo base_url();?>index.php?admin/reload_tax_list')">
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



<script type="text/javascript">
	
	// custom function for data deletion by ajax and post refreshing call
	function delete_data(delete_url , post_refresh_url)
	{
		var delete_message = '<?php echo get_phrase('data_deleted');?>';
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
			}
		});
	}

</script>
