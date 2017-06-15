<style type="text/css">
	.chartdiv {
	width		: 100%;
	height		: 250px;
	font-size	: 11px;
}

</style>

<div class="row">

	<div class="col-md-9">

		<h4 style="color: #797979;"><?php echo get_phrase('sales_order_summary');?></h4>
		<hr />
		<div class="row">
			<!-- tile for last 7 days summary -->
			<div class="col-sm-4">
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-bookmark"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $this->order_model->count_orders('last_7_days' , 'sales');?>"
						data-duration="1500" data-delay="0">
						<?php echo $this->order_model->count_orders('last_7_days' , 'sales');?>
					</div>
					<h3><?php echo get_phrase('last_7_days');?></h3>
				</div>
			</div>
			<!-- tile for last 30 days summary -->
			<div class="col-sm-4">
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-bookmark"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $this->order_model->count_orders('last_30_days' , 'sales');?>"
						data-duration="1500" data-delay="0">
						<?php echo $this->order_model->count_orders('last_30_days' , 'sales');?>
					</div>
					<h3><?php echo get_phrase('last_30_days');?></h3>
				</div>
			</div>
			<!-- tile for last 90 days summary -->
			<div class="col-sm-4">
				<div class="tile-stats tile-purple">
					<div class="icon"><i class="entypo-bookmark"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $this->order_model->count_orders('last_90_days' , 'sales');?>"
						data-duration="1500" data-delay="0">
						<?php echo $this->order_model->count_orders('last_90_days' , 'sales');?>
					</div>
					<h3><?php echo get_phrase('last_90_days');?></h3>
				</div>
			</div>
		</div>

		<h4 style="color: #797979;"><?php echo get_phrase('purchase_order_summary');?></h4>
		<hr />
		<div class="row">
			<!-- tile for last 7 days summary -->
			<div class="col-sm-4">
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-bookmark"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $this->order_model->count_orders('last_7_days' , 'purchase');?>"
						data-duration="1500" data-delay="0">
						<?php echo $this->order_model->count_orders('last_7_days' , 'purchase');?>
					</div>
					<h3><?php echo get_phrase('last_7_days');?></h3>
				</div>
			</div>
			<!-- tile for last 30 days summary -->
			<div class="col-sm-4">
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-bookmark"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $this->order_model->count_orders('last_30_days' , 'purchase');?>"
						data-duration="1500" data-delay="0">
						<?php echo $this->order_model->count_orders('last_30_days' , 'purchase');?>
					</div>
					<h3><?php echo get_phrase('last_30_days');?></h3>
				</div>
			</div>
			<!-- tile for last 90 days summary -->
			<div class="col-sm-4">
				<div class="tile-stats tile-purple">
					<div class="icon"><i class="entypo-bookmark"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $this->order_model->count_orders('last_90_days' , 'purchase');?>"
						data-duration="1500" data-delay="0">
						<?php echo $this->order_model->count_orders('last_90_days' , 'purchase');?>
					</div>
					<h3><?php echo get_phrase('last_90_days');?></h3>
				</div>
			</div>
		</div>

	</div>

	<div class="col-md-3">
		<h4 style="color: #797979;"><?php echo get_phrase('users');?></h4>
		<hr />
		<div class="list-group">
			<a href="<?php echo base_url();?>index.php?admin/user_list/user_all" class="list-group-item">
				<span class="badge badge-primary">
					<?php echo $this->user_model->count_user('all');?>
				</span>
				<?php echo get_phrase('total_users');?>
			</a>
			<a href="<?php echo base_url();?>index.php?admin/user_list/user_customer" class="list-group-item">
				<span class="badge badge-info">
					<?php echo $this->user_model->count_user('customer');?>
				</span>
				<?php echo get_phrase('customers');?>
			</a>
			<a href="<?php echo base_url();?>index.php?admin/user_list/user_employee" class="list-group-item">
				<span class="badge badge-danger">
					<?php echo $this->user_model->count_user('employee');?>
				</span>
				<?php echo get_phrase('employees');?>
			</a>
			<a href="<?php echo base_url();?>index.php?admin/user_list/user_supplier" class="list-group-item">
				<span class="badge badge-success">
					<?php echo $this->user_model->count_user('supplier');?>
				</span>
				<?php echo get_phrase('suppliers');?>
			</a>
			<a href="<?php echo base_url();?>index.php?admin/user_list/user_manager" class="list-group-item">
				<span class="badge badge-success">
					<?php echo $this->user_model->count_user('manager');?>
				</span>
				<?php echo get_phrase('managers');?>
			</a>
		</div>
	</div>


</div>

<br><br>

<div class="row">

	<div class="col-sm-6">
		<h4 style="color: #797979;"><?php echo get_phrase('sales_order_status_summary');?></h4>
		<div class="panel panel-primary" id="charts_env">
			<div class="panel-body">
				<h4 align="center" style="color: #797979;"><?php echo get_phrase('last_30_days');?></h4>
				<div id="chartdiv1" class="chartdiv"></div>
			</div>

		</div>

	</div>

	<div class="col-sm-6">
		<h4 style="color: #797979;"><?php echo get_phrase('purchase_order_status_summary');?></h4>
		<div class="panel panel-primary" id="charts_env">
			<div class="panel-body">
				<h4 align="center" style="color: #797979;"><?php echo get_phrase('last_30_days');?></h4>
				<div id="chartdiv2" class="chartdiv"></div>
			</div>

		</div>

	</div>

</div>

<script type="text/javascript">
	AmCharts.makeChart( "chartdiv1", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "title": "<?php echo get_phrase('partially_shipped');?>",
    "value": <?php echo $this->order_model->count_sales_order_by_status_last_30_days(2);?>
  }, {
    "title": "<?php echo get_phrase('shipped');?>",
    "value": <?php echo $this->order_model->count_sales_order_by_status_last_30_days(3);?>
  }, {
    "title": "<?php echo get_phrase('delivered');?>",
    "value": <?php echo $this->order_model->count_sales_order_by_status_last_30_days(4);?>
  }, {
    "title": "<?php echo get_phrase('pending');?>",
    "value": <?php echo $this->order_model->count_sales_order_by_status_last_30_days(0);?>
  } ],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,

  "radius": "42%",
  "innerRadius": "50%",
  "labelText": "[[title]]",
  "export": {
    "enabled": false
  }
} );

	AmCharts.makeChart( "chartdiv2", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "title": "<?php echo get_phrase('pending');?>",
    "value": <?php echo $this->order_model->count_purchase_order_by_status_last_30_days(0);?>
  }, {
    "title": "<?php echo get_phrase('raised');?>",
    "value": <?php echo $this->order_model->count_purchase_order_by_status_last_30_days(1);?>
  }, {
    "title": "<?php echo get_phrase('received');?>",
    "value": <?php echo $this->order_model->count_purchase_order_by_status_last_30_days(2);?>
  } ],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,

  "radius": "42%",
  "innerRadius": "50%",
  "labelText": "[[title]]",
  "export": {
    "enabled": false
  }
} );
</script>
