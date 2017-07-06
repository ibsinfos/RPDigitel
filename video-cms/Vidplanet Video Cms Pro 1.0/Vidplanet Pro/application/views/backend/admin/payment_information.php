<?php
 $system_currency_id = $this->db->get_where('settings' , array('type' =>'system_currency_id'))->row()->description;
 $this->db->where('currency_id', $system_currency_id);
 $currency_symbol = $this->db->get('currency')->row()->currency_symbol;
?>
<!-- breadcrumb start -->
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo site_url('admin/dashboard');?>">
			<i class="fa fa-dashboard"></i>
			<?php echo get_phrase('dashboard'); ?>
		</a>
	</li>
	<li>
		<a href="#">
			<?php echo get_phrase('payment_section'); ?>
		</a>
  </li>
	<li class="active">
    <?php echo get_phrase('payment_information'); ?>
  </li>
</ol>
<!-- breadcrumb end -->

<?php echo form_open(site_url('admin/payment_information') , array('class' => 'form-horizontal form-groups validate',  'id' => 'date_selector_form'));?>

<!-- REPORT DATE RANGE SELECTOR STARTS-->
   <div class="form-group">

       <div class="col-sm-6 col-sm-offset-3">
           <div style="text-align: center;" class="daterange daterange-inline add-ranges" data-format="D MMMM, YYYY"
               data-start-date="<?php echo date("d F, Y", $timestamp_start); ?>" data-end-date="<?php echo date("d F, Y", $timestamp_end); ?>">
                   <i class="entypo-calendar"></i>
                   <span id="date_range_selector" style="font-weight: 300; font-size: 20px; color:#000;">
                       <?php echo date("d F, Y", $timestamp_start) . " - " . date("d F, Y", $timestamp_end); ?>
                   </span>
                   <input id="date_range" type="hidden" name="date_range" value="<?php echo date("d F, Y", $timestamp_start) . " - " . date("d F, Y", $timestamp_end); ?>">
           </div>
       </div>

       <label class="col-sm-1 control-label" style="text-align:left;">
           <button type="button" class="btn btn-info" id="submit-button"
               onclick="update_date_range();">
                   <?php echo get_phrase('filter'); ?>
           </button>
       </label>
   </div>
<?php echo form_close(); ?>

<!-- datatable of videos -->
<div class="row">
  <div class="col-md-12">
		<table class="table table-bordered datatable" id="table-3">
			<thead>
				<tr class="replace-inputs">
					<th width="3%;" style="color: rgba(221, 221, 221, 0);">i</th>
					<th><?php echo get_phrase('video_pack');?></th>
					<th><?php echo get_phrase('buyer');?></th>
					<th><?php echo get_phrase('price');?></th>
					<th><?php echo get_phrase('type');?></th>
					<th><?php echo get_phrase('date');?></th>
					<th width="12%;"><?php echo get_phrase('options');?></th>
				</tr>
			</thead>
			<tbody>
				<!-- start looping through all the users of 'user' table -->
				<?php
          			$counter = 0;

          			$this->db->where('date_added >=', $timestamp_start);
          			$this->db->where('date_added <=', $timestamp_end);
					      $payment_details = $this->db->get('payment')->result_array();

					foreach ($payment_details as $row):
					$this->db->where('video_pack_id', $row['video_pack_id']);
					$video_pack_info = $this->db->get('video_pack')->row_array();
					?>
					<tr>
						<td>
              <?php echo ++$counter; ?>
						</td>
						<td>
							<a href="<?php echo site_url('admin/show_video_pack_details/'.$video_pack_info['code']);?>" style = "font-weight: bold; color: #A6A7AA"><?php echo $video_pack_info['title'];?></a>
						</td>
						<td>
							<?php
								$this->db->where('code', $row['buyer_code']);
								$buyer_info = $this->db->get('user')->row_array();
							?>
							<a href="<?php echo site_url('admin/user_profile/'.$buyer_info['user_id']);?>" style = "font-weight: bold; color: #A6A7AA"><?php echo $buyer_info['name'];?></a>
						</td>
						<td>
							<?php echo $currency_symbol.''.$video_pack_info['price']; ?>
						</td>

						<td style="text-align: center;">
							<?php if ($row['payment_method'] == 'paypal'): ?>
								<img src="<?php echo base_url('assets/paypal.png');?>" alt="<?php echo get_phrase('paypal');?>" style = "height: 50px; width: 50px;">
							<?php endif ?>
							<?php if ($row['payment_method'] == 'stripe'): ?>
								<img src="<?php echo base_url('assets/stripe.png');?>" alt="<?php echo get_phrase('stripe');?>" style = "height: 40px; width: 40px;">
							<?php endif ?>
						</td>

			            <td>
							<?php echo date('D, d M Y', $row['date_added']); ?>
			           </td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
									<?php echo get_phrase('action');?> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-default" role="menu">
									<li>
										<a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/payment_details_view/'.$row['code']);?>')">
											<i class="entypo-eye"></i> <?php echo get_phrase('view_details');?>
										</a>
									</li>
									<!-- <li class="divider"></li>
									<li>
										<a href="#"
											onclick="confirm_modal('<?php echo site_url('admin/payment_information/delete/'.$row['code']);?>',
												'<?php echo site_url('admin/payment_information');?>')">
											<i class="entypo-trash"></i> <?php echo get_phrase('delete');?>
										</a>
									</li> -->
								</ul>
							</div>
						</td>
					</tr>

				<?php endforeach; ?>

				<!-- end looping through all the users of 'user' table -->
			</tbody>
			<tr style="background-color:#ECEFF1; color: #616161;">
				<td></td>
				<td></td>
				<td style="font-weight: bold;"><?php echo get_phrase('total').':'; ?></td>
				<td style="font-weight: bold;">
				<?php
					$this->db->select_sum('price');
					$this->db->from('payment');
					$query = $this->db->get()->row_array();
					echo $currency_symbol.$query['price'];
				?>
				</td>
				<td></td>
				<td></td>
				<td></td>
		    </tr>
			<tfoot>
				<tr>
					<th>i</th>
					<th><?php echo get_phrase('video_pack');?></th>
					<th><?php echo get_phrase('buyer');?></th>
					<th><?php echo get_phrase('price');?></th>
					<th><?php echo get_phrase('type');?></th>
					<th><?php echo get_phrase('date_added');?></th>
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
		$('#foot_Type').attr("disabled",true);
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

		//var delete_message = '<?php echo get_phrase('video_deleted');?>';
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
				//toastr.success(delete_message);
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
<script>
   function update_date_range()
   {
       var x = $("#date_range_selector").html();
       $("#date_range").val(x);
       $("#date_selector_form").submit();
   }
</script>
