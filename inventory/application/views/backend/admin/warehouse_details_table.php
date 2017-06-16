<?php $count = 0;?>
		<table class="table table-bordered responsive datatable" id = "warehouse_table_data">
			<thead>
				<tr class = 'table_heading' style="text-align: center;">
					<th width ="3%">#</th>
          <th width = "13.86%"><?php echo get_phrase('product_name');?></th>
          <th width = "13.86%"><?php echo get_phrase('specification');?></th>
					<th width = "13.86%"><?php echo get_phrase('quantity');?></th>
					<th width = "13.86%"><?php echo get_phrase('warehouse_title');?></th>
					<th width = "13.86%"><?php echo get_phrase('manager');?></th>
					<th width = "13.86%"><?php echo get_phrase('phone_numnber');?></th>
					<th width = "13.86%"><?php echo get_phrase('Address');?></th>
				</tr>
			</thead>
			<tbody>
        <?php foreach ($warehouse_details as $key):?>
            <tr>
              <td style="text-align: center;"><?php echo ++$count;?></td>
              <td style="text-align: center;">
                <?php
                  $product_name = $this->warehouse_model->get_product_name($key['product_id']);
                  echo $product_name['name'];
                 ?>
              </td>
              <td style="text-align: center;">
                <?php
                $product_specification =  $this->warehouse_model->get_product_specification($key['variant_code']);
                echo $product_specification['specification'];
                ?>
              </td>
              <td style="text-align: center;" class="warehouse_quantity">
                <?php
                $product_quantity = $this->warehouse_model->get_product_quantity_for_warehouse_table($key['warehouse_code'], $key['variant_code']);
                echo $product_quantity['quantity'];
                ?>
              </td>
              <td style="text-align: center;">
                <?php
                $warehouse_name = $this->warehouse_model->get_warehouse_name_on_table($key['warehouse_code']);
                echo $warehouse_name['warehouse_title'];
                ?>
              </td>
              <td style="text-align: center;">
                <?php
                $manager_name = $this->warehouse_model->get_warehouse_manager_name($key['warehouse_code']);
                echo $manager_name['name'];
                ?>
              </td>
              <td style="text-align: center;">
                <?php
                $phone_numnber = $this->warehouse_model->get_warehouse_phone_number($key['warehouse_code']);
                echo $phone_numnber['warehouse_phone_number'];
                ?>
              </td>
              <td style="text-align: center;">
                <?php
                $address = $this->warehouse_model->get_warehouse_address($key['warehouse_code']);
                echo $address['warehouse_address'];
                ?>
              </td>
            </tr>
          <?php endforeach; ?>
			</tbody>
      <tr class = 'sum_row' style="background-color:#E8F5E9;">
        <td></td>
        <td></td>
        <td style="font-size: 12px; font-weight: bold; text-align: center; color: #2E7D32;"><?php echo get_phrase('total_quantity');?></td>
        <td class = 'total_warehouse_quantity' style="font-size: 12px; font-weight: bold; color: #2E7D32; text-align: center;"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tfoot class = "table_footer">
        <tr>
          <th>i</th>
          <th><?php echo get_phrase('product_name');?></th>
          <th><?php echo get_phrase('specification');?></th>
          <th><?php echo get_phrase('quantity');?></th>
          <th><?php echo get_phrase('warehouse_title');?></th>
          <th><?php echo get_phrase('manager');?></th>
          <th><?php echo get_phrase('phone_numnber');?></th>
          <th><?php echo get_phrase('address');?></th>
        </tr>
      </tfoot>
		</table>
<script type="text/javascript">
  $(document).ready(function(){
    var sum = 0;
    // iterate through each td based on class and add the values
    $(".warehouse_quantity").each(function() {

        var value = $(this).text();
        // add only if the value is number
        if(!isNaN(value) && value.length != 0) {
            sum += parseFloat(value);
        }
    });
    $('.total_warehouse_quantity').html(sum);
  });
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
