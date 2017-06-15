<button type="button" class="btn btn-info btn-icon icon-left btn-sm"
	onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/variant_add/<?php echo $row['product_id'];?>')">
	<?php echo get_phrase('add_variant');?>
	<i class="entypo-plus"></i>
</button>
<br><br>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<strong>
						<i class="entypo-flow-tree"></i> &nbsp;<?php echo get_phrase('variants');?>
					</strong>
				</div>
			</div>
				
			<div class="panel-body with-table">
				<table class="table table-bordered table-responsive">
					<thead>
						<tr>
							<th width="4%">#</th>
							<th><?php echo get_phrase('code');?></th>
							<th><?php echo get_phrase('type');?></th>
							<th><?php echo get_phrase('specification');?></th>
							<th><?php echo get_phrase('cost_price');?></th>
							<th><?php echo get_phrase('selling_price');?></th>
							<th><?php echo get_phrase('in_stock');?></th>
							<th><?php echo get_phrase('alert_qauntity');?></th>
							<th><?php echo get_phrase('options');?></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$count	=	1;
						$variants	=	$this->db->get_where('variant' , array(
							'product_id' => $row['product_id']
						))->result_array();
						foreach($variants as $variant):
					?>
						<tr>
							<td><?php echo $count++;?></td>
							<td><?php echo $variant['code'];?></td>
							<td><?php echo $variant['type'];?></td>
							<td><?php echo $variant['specification'];?></td>
							<td><?php echo $variant['cost_price'];?></td>
							<td><?php echo $variant['selling_price'];?></td>
							<td><?php echo $variant['quantity'];?></td>
							<td><?php echo $variant['alert_quantity'];?></td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
										<?php echo get_phrase('action');?> <span class="caret"></span>
									</button>
									<ul class="dropdown-menu dropdown-default" role="menu">
										<li>
											<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/variant_edit/<?php echo $variant['variant_id'];?>')">
												<i class="entypo-pencil"></i> <?php echo get_phrase('edit');?>
											</a>
										</li>
										<li>
											<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/variant/delete/<?php echo $variant['variant_id'];?>' , 
												'<?php echo base_url();?>index.php?admin/product_details/<?php echo $row['product_code'];?>')">
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
		var delete_message = '<?php echo get_phrase('variant_deleted');?>';
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