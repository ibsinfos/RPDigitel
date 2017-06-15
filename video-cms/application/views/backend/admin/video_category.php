<!-- breadcrumb start -->
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo site_url('admin/dashboard');?>">
			<i class="fa fa-dashboard"></i>
			<?php echo get_phrase('dashboard'); ?>
		</a>
	</li>
	<li class="active">
    <?php echo get_phrase('category'); ?>
  </li>
</ol>
<!-- breadcrumb end -->

<!-- new user addition link -->
<a href="#" class="btn btn-info btn-icon icon-left" style="margin-bottom: 20px;"
	onclick="showAjaxModal('<?php echo site_url('modal/popup/category_add');?>')">
		<?php echo get_phrase('add_new_category');?>
	<i class="fa fa-plus"></i>
</a>

<!-- datatable of users -->
<div class="row">
  <div class="col-md-12">
		<table class="table table-bordered datatable" id="table-3">
			<thead>
				<tr class="replace-inputs">
					<th width="3%;" style="color: rgba(221, 221, 221, 0);">i</th>
					<th><?php echo get_phrase('category');?></th>
					<th><?php echo get_phrase('date_added');?></th>
					<th><?php echo get_phrase('last_modified');?></th>
					<th width="12%;"><?php echo get_phrase('options');?></th>
				</tr>
			</thead>
			<tbody>
				<!-- start looping through all the users of 'user' table -->
				<?php
          $counter = 0;
					$users = get_table_data_with_sort('category', 'DESC');
					foreach ($users as $row):
				?>
					<tr>
						<td>
              <?php echo ++$counter; ?>
						</td>
						<td>
							<a href="<?php echo site_url('admin/show_category_details/').$row['code'] ;?>">
								<b style="color: #7a7981;"><?php echo $row['title']; ?></b>
							</a>
						</td>
            <td>
              <?php if ($row['date_added'] != ''): ?>
              <p>
                <?php echo date('D, d M Y', $row['date_added']); ?>
              </p>
            <?php endif; ?>
           </td>
            <td>
              <?php if ($row['last_modified'] != ''): ?>
              <p>
                <?php echo date('D, d M Y', $row['date_added']); ?>
              </p>
            <?php endif; ?>
            </td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
									<?php echo get_phrase('action');?> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-default" role="menu">
									<li>
										<a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/category_edit/'.$row['code']);?>')">
											<i class="entypo-pencil"></i> <?php echo get_phrase('edit');?>
										</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="#"
											onclick="confirm_modal('<?php echo site_url('admin/video_category/delete/'.$row['code']);?>',
												'<?php echo site_url('admin/video_category');?>')">
											<i class="entypo-trash"></i> <?php echo get_phrase('delete');?>
										</a>
									</li>
								</ul>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
				<!-- end looping through all the users of 'user' table -->
			</tbody>
			<tfoot>
				<tr>
					<th>i</th>
					<th><?php echo get_phrase('category');?></th>
					<th><?php echo get_phrase('date_added');?></th>
					<th><?php echo get_phrase('last_modified');?></th>
					<th><?php echo get_phrase('options');?></th>
				</tr>
			</tfoot>
		</table>
	</div>

</div>


<script type="text/javascript">

  // datatable initializer with footer search
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

  // custom function for data deletion by ajax and post refreshing call
  function delete_data(delete_url , post_refresh_url) {

		var delete_message = '<?php echo get_phrase('user_deleted');?>';
		// showing user-friendly pre-loader image
		$('#preloader-delete').html('<img src="<?php echo base_url('assets/backend/images/preloader.gif');?>" style="height:15px;margin-top:-10px;" />');
    // disables the delete and cancel button during deletion ajax request
		document.getElementById("delete_link").disabled=true;
		document.getElementById("delete_cancel_link").disabled=true;
    // make the ajax call
		$.ajax({
			url: delete_url,
			success: function(response) {
				// remove the preloader
				$('#preloader-delete').html('');
        // hide the delete dialog box
				$('#modal_delete').modal('hide');
				// show deletion success msg.
				toastr.success(delete_message);
        // enables the delete and cancel button after deletion ajax request success
				document.getElementById("delete_link").disabled=false;
				document.getElementById("delete_cancel_link").disabled=false;
        // reload the table
				reload_data(post_refresh_url);
			}
		});
	}

	// function for reloading table data
	function reload_data(url) {
		$(location).attr('href' , url);
	}

</script>
