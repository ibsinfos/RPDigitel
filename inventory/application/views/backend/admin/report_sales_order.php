
<style type="text/css">

	#chartdiv {
		width		: 100%;
		height		: 500px;
		font-size	: 11px;
	}

</style>

<?php echo form_open(base_url() . 'index.php?admin/report_sales_order_view' , array(
	'class' => 'form-horizontal'));?>
<div class="row well">
	<div class="col-md-1"></div>
	<div class="col-md-1" style="width: 5%;">
		<label class="control-label"><?php echo get_phrase('from');?></label>
	</div>
	<div class="col-md-3">
		<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="timestamp_range[]"
			value="<?php echo date('D, d M Y' , $timestamp_start);?>">
	</div>
	<div class="col-md-1" style="width: 4%;">
		<label class="control-label"><?php echo get_phrase('to');?></label>
	</div>
	<div class="col-md-3">
		<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="timestamp_range[]"
			value="<?php echo date('D, d M Y' , $timestamp_end);?>">
	</div>
	<div class="col-md-3">
		<button type="submit" id="" class="btn btn-green btn-icon icon-left btn-sm">
			<?php echo get_phrase('view_report');?>
			<i class="entypo-paper-plane"></i>
		</button>
	</div>
</div>
<?php echo form_close();?>

<br><br>

<!-- panel for the sales order graph -->
<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-body">				
		<div id="chartdiv"></div>
	</div>
</div>

<!-- panel for the sales order graph -->

<!-- panel for tabular report of the data -->

<div class="row">

    <div class="col-md-12">
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <strong>
                        <?php echo get_phrase('sales_order_report');?>
                    </strong>
                </div>
            </div>
                
            <div class="panel-body with-table">
                
               <table class="table table-bordered datatable" id="table-4">
                    <thead>
                        <tr>
                            <th><?php echo get_phrase('date');?></th>
                            <th><?php echo get_phrase('number_of_orders');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
							$start_date = date('Y-m-d' , $timestamp_start);
							$end_date   = date('Y-m-d' , $timestamp_end);
							$dates      = $this->info_model->get_dates_within_range($start_date , $end_date);					
							foreach($dates as $date):
								// checking the presence of order entry
								$timestamp = strtotime($date->format('Y-m-d'));
								$this->db->like('date_added' , $timestamp);
								$this->db->from('sales_order');
								$sales_order_count = $this->db->count_all_results();

						?>
                        <tr>
                            <td><?php echo $date->format('Y-m-d');?></td>
                            <td><strong><?php echo $sales_order_count;?></strong></td>
                        </tr>
                    <?php endforeach;?>

                    </tbody>
                </table> 

            </div>
        </div>

    </div>
    
</div>

<!-- panel for tabular report of the data -->

<script type="text/javascript">
    jQuery( document ).ready( function( $ ) {
        var $table4 = jQuery( "#table-4" );
        
        $table4.DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );        
</script>


<script type="text/javascript">
	var chart = AmCharts.makeChart( "chartdiv", {
		"type": "serial",
		"theme": "light",
		"dataProvider": [
			<?php 
				$start_date = date('Y-m-d' , $timestamp_start);
				$end_date   = date('Y-m-d' , $timestamp_end);
				$dates      = $this->info_model->get_dates_within_range($start_date , $end_date);					
				foreach($dates as $date):
					// checking the presence of order entry
					$timestamp = strtotime($date->format('Y-m-d'));
					$this->db->like('date_added' , $timestamp);
					$this->db->from('sales_order');
					$sales_order_count = $this->db->count_all_results();

			?>
			{
			"date": "<?php echo $date->format('d M');?>",
			"order": "<?php echo $sales_order_count;?>"
			},
			<?php endforeach;?>

		],

		"valueAxes": [ {
		"gridColor": "#FFFFFF",
		"gridAlpha": 0.2,
		"dashLength": 0
		} ],

		"gridAboveGraphs": true,
		"startDuration": 1,
		"graphs": [ {
		"balloonText": "[[category]] : <b>[[value]] <?php echo get_phrase('orders');?></b>",
		"fillAlphas": 0.8,
		"lineAlpha": 0.2,
		"type": "column",
		"valueField": "order"
		} ],

		"chartCursor": {
		"categoryBalloonEnabled": false,
		"cursorAlpha": 0,
		"zoomable": false
		},

		"categoryField": "date",
		"categoryAxis": {
		"gridPosition": "start",
		"gridAlpha": 0,
		"tickPosition": "start",
		"labelRotation": 2,
		"tickLength": 20
		},

		"export": {
		"enabled": false
		}

	} );
</script>
