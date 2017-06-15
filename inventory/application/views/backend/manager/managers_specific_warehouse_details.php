<br>
<!-- printing seciton -->
<!-- <div class="panel-options pull-right">
  <a href="<?php //echo base_url();?>index.php?admin/warehouse_details_print_view/"
    class="tooltip-primary" data-toggle="tooltip" id ="cmd" target="_blank"
    data-placement="top" title="" data-original-title="<?php //echo get_phrase('print');?>">
    <i class="glyphicon glyphicon-print" style="color: #676767; margin-top: 15px;"></i>
  </a>
  &nbsp; &nbsp;
</div> -->

<div class="row" id = "content">
    <div class="col-md-12 panel-body with-table">
		<table class="table table-bordered responsive datatable table-responsive" id = "warehouse_table_data2">

			<thead>
				<tr class = 'table_heading'>
					<th width ="3%">#</th>
          <th width = "32.33%"><?php echo get_phrase('product_name');?></th>
          <th width = "32.33%"><?php echo get_phrase('specification');?></th>
					<th width = "32.33%"><?php echo get_phrase('quantity');?></th>
				</tr>
			</thead>
			<tbody>
        <?php
          $all_data = $this->warehouse_model->specific_managers_warehouse_table($this->session->userdata('login_user_id'));
          $count = 0;

          foreach ($all_data as $key) {
              $this->db->where('product_id', $key['product_id']);
              $product_name = $this->db->get('product')->row()->name;
              $this->db->where('code', $key['variant_code']);
              $specification = $this->db->get('variant')->row()->specification;
              echo "<tr class = '".$key['warehouse_code']." ".$key['product_status']."' style = 'text-align:center;'>
                    <td>".++$count."</td>
                    <td>".$product_name."</td>
                    <td>".$specification."</td>
                    <td class = 'warehouse_quantity'>".$key['quantity']."</td>
                  </tr>";
            }
        ?>
			</tbody>
      <tr class = 'sum_row' style="background-color:#E8F5E9;">
        <td></td>
        <td></td>
        <td style="font-size: 12px; font-weight: bold; text-align: center; color: #2E7D32;"><?php echo get_phrase('total_quantity');?></td>
        <td class = 'total_warehouse_quantity' style="font-size: 12px; font-weight: bold; color: #2E7D32; text-align: center;"></td>
      </tr>
      <tfoot>
        <tr>
          <th>i</th>
          <th><?php echo get_phrase('product_name');?></th>
          <th><?php echo get_phrase('specification');?></th>
          <th><?php echo get_phrase('quantity');?></th>
        </tr>
      </tfoot>
		</table>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>/index.php/assets/js/jspdf.js"></script>
<script type="text/javascript">
var warehouse_selector;
var sum = 0;
$(document).ready(function(){
  warehouse_selector = $('#select_warehouse').val();
});
$('#select_warehouse').change(function(){
  warehouse_selector = $('#select_warehouse').val();
  if(warehouse_selector === 'all'){
    $('#warehouse_table_data2 tr').show();
  }
  else{
    $('#warehouse_table_data2 tr').show();
    $("#warehouse_table_data2 tr").not('.'+warehouse_selector).hide();
    $("#warehouse_table_data2 .table_heading").show();
  }
});
$(".warehouse_quantity").each(function() {

    var value = $(this).text();
    // add only if the value is number
    if(!isNaN(value) && value.length != 0) {
        sum += parseFloat(value);
    }
});
$('.total_warehouse_quantity').html(sum);
</script>

<script type="text/javascript">
	jQuery( document ).ready( function( $ ) {
    $('.0').hide();
		var $warehouse_table_data2 = jQuery("#warehouse_table_data2");

		var warehouse_table_data2 = $warehouse_table_data2.DataTable( {
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
		} );

		// Initalize Select Dropdown after DataTables is created
		$warehouse_table_data2.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
			minimumResultsForSearch: -1
		});

		// Setup - add a text input to each footer cell
		$( '#warehouse_table_data2 tfoot th' ).each( function () {
			var title = $('#warehouse_table_data2 thead th').eq( $(this).index() ).text();
			$(this).html( '<input id="foot_' + title +'" type="text" class="form-control" placeholder="Search" />' );
		} );

		// disables search in the option column
		$('#foot_Options').attr("disabled",true);
		$('#foot_i').attr("disabled",true);

		// Apply the search
		warehouse_table_data2.columns().every( function () {
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
