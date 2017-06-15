<title><?php echo get_phrase('warehouse_details');?></title>
<div id="print">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered responsive" id = "warehouse_table_data">
				<thead>
					<tr class = 'table_heading'>
						<th width="3%">#</th>
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
	        <?php
	        $all_data = $this->warehouse_model->dynamic_warehouse_table();

	        foreach ($all_data as $key) {
	          echo "<tr class = '".$key['warehouse_code']."'>
	                <td><i class='fa fa-circle' aria-hidden='true' style = 'margin-left:9px; margin-top: 7px;'></i></td>
	                <td>".$this->warehouse_model->get_product_name($key['product_id'])['name']."</td>
	                <td>".$this->warehouse_model->get_product_specification($key['variant_code'])['specification']."</td>
	                <td>".$key['quantity']."</td>
	                <td>".$this->warehouse_model->get_warehouse_name_on_table($key['warehouse_code'])['warehouse_title']."</td>
	                <td>".$this->warehouse_model->get_warehouse_manager_name($key['warehouse_code'])['name']."</td>
	                <td>".$this->warehouse_model->get_warehouse_phone_number($key['warehouse_code'])['warehouse_phone_number']."</td>
	                <td>".$this->warehouse_model->get_warehouse_address($key['warehouse_code'])['warehouse_address']."</td>
	                </tr>";
	        }
	        ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		var elem = $('#print');
		PrintElem(elem);
		Popup(data);

	});

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title></title>');
        //mywindow.document.write('<link rel="stylesheet" href="assets/css/print.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        //mywindow.document.write('<style>.print{border : 1px;}</style>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>
