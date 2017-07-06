<ol class="breadcrumb bc-3">

	<li>
		<a href="<?php echo base_url();?>index.php?admin/dashboard">
			<i class="entypo-home"></i>
				<?php echo get_phrase('dashboard');?>
		</a>
	</li>

	<li>
		<a href="<?php echo base_url();?>index.php?admin/inventory_list">
			<?php echo get_phrase('inventory');?>
		</a>
	</li>

	<li class="active">
		<strong><?php echo get_phrase('archived_products');?></strong>
	</li>

</ol>

<div class="row">
	
	<div class="col-md-12">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<strong>
						<?php echo get_phrase('archived_products');?>
					</strong>
				</div>
			</div>
				
			<div class="panel-body with-table">
				
				<table class="table table-bordered datatable" id="table-3">
					<thead>
						<tr class="replace-inputs">
							<th><?php echo get_phrase('code');?></th>
							<th><?php echo get_phrase('product');?></th>
							<th><?php echo get_phrase('category');?></th>
							<th><?php echo get_phrase('in_stock');?></th>
							<th><?php echo get_phrase('date_added');?></th>
							<th><?php echo get_phrase('options');?></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$products = $this->db->get_where('product' , array(
								'archive_status' => 1
							))->result_array();
							foreach($products as $row):
						?>	
							<tr>
								<td><?php echo $row['product_code'];?></td>
								<td>
									<?php 
										// counting number of variants available
										$this->db->where('product_id' , $row['product_id']);
										$this->db->from('variant');
										$variant = $this->db->count_all_results();
									?>
									<strong>
										<a href="<?php echo base_url();?>index.php?admin/product_details/<?php echo $row['product_code'];?>" style="color: #949494;">
											<?php echo $row['name'];?>
										</a>
									</strong>
									<?php if($variant > 1):?>
									<br>
									<div style="color: #949494; font-size: 10px;">
										<?php echo get_phrase('available_in') . ' ' . $variant . ' ' . get_phrase('variants');?>
									</div>
								<?php endif;?>
								</td>
								<td>
									<?php if($row['product_category_id'] != 0)
											echo $this->db->get_where('product_category' , array(
												'product_category_id' => $row['product_category_id']
											))->row()->name;
									?>
								</td>
								<?php 
									if($row['variant'] == 0):
									$quantity = $this->db->get_where('variant' , array(
										'code' => $row['product_code']
									))->row()->quantity;
								?>
									<td align="center"><b><?php echo $quantity;?></b></td>
								<?php endif;?>
								<?php 
									if($row['variant'] == 1):
									// counting total stock including all variants
									$count = 0;
									$variants = $this->db->get_where('variant' , array(
										'product_id' => $row['product_id']
									))->result_array();
									foreach($variants as $row2) {
										$count += $row2['quantity'];
									}
									
								?>
									<td align="center">
										<b><?php echo $count;?></b>
									</td>
								<?php endif;?>
								<td>
									<?php if($row['date_added'] != '') echo date('D, d M Y' , $row['date_added']);?>
								</td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
											<?php echo get_phrase('action');?> <span class="caret"></span>
										</button>
										<ul class="dropdown-menu dropdown-default" role="menu">
											<li>
												<a href="<?php echo base_url();?>index.php?admin/product_details/<?php echo $row['product_code'];?>">
													<i class="entypo-menu"></i> <?php echo get_phrase('details');?>
												</a>
											</li>
											<li>
												<a href="<?php echo base_url();?>index.php?admin/product_details/<?php echo $row['product_code'];?>">
													<i class="entypo-pencil"></i> <?php echo get_phrase('edit');?>
												</a>
											</li>
											<li class="divider"></li>
											<li>
												<a href="#" onclick="confirm_modal_2('<?php echo base_url();?>index.php?admin/product/remove_from_archive/<?php echo $row['product_id'];?>' ,
									                        '<?php echo base_url();?>index.php?admin/inventory_list')">
													<i class="entypo-archive"></i> <?php echo get_phrase('remove_from_archive');?>
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
							<th><?php echo get_phrase('code');?></th>
							<th><?php echo get_phrase('product');?></th>
							<th><?php echo get_phrase('category');?></th>
							<th><?php echo get_phrase('in_stock');?></th>
							<th><?php echo get_phrase('date_added');?></th>
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
