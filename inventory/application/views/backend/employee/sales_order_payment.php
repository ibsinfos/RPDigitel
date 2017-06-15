<?php
	$logged_in_user_code = $this->db->get_where('user' , array(
		'user_id' => $this->session->userdata('login_user_id')
	))->row()->user_code;
	if($this->user_model->check_permission($logged_in_user_code , 3)):
?>

<hr />

<?php
	$sales_order_info = $this->db->get_where('sales_order' , array(
		'order_code' => $order_code
	))->result_array();
	foreach($sales_order_info as $row):
?>
<?php if($row['order_status'] != 10):?>
<div class="row" style="font-size: 13px; margin-left: 5px;">

	<?php if($row['order_status'] == 0):?><i class="fa fa-bell" style="color: #fad839;"></i>
		<?php echo get_phrase('pending');?> &nbsp;
	<i class="fa fa-chevron-right"></i> &nbsp;<?php endif;?>

	<i class="fa fa-circle" <?php if($row['order_status'] >= 1):?> style="color:#00a651;"<?php endif;?>></i>
		<?php echo get_phrase('confirmed');?> &nbsp;
	<i class="fa fa-chevron-right"></i> &nbsp;

	<i class="fa fa-circle" <?php if($row['order_status'] >= 2):?> style="color:#00a651;"<?php endif;?>></i>
		<?php echo get_phrase('partially_shipped');?> &nbsp;
	<i class="fa fa-chevron-right"></i> &nbsp;

	<i class="fa fa-circle" <?php if($row['order_status'] >= 3):?> style="color:#00a651;"<?php endif;?>></i>
		<?php echo get_phrase('shipped');?> &nbsp;
	<i class="fa fa-chevron-right"></i> &nbsp;

	<i class="fa fa-circle" <?php if($row['order_status'] >= 4):?> style="color:#00a651;"<?php endif;?>></i>
		<?php echo get_phrase('delivered');?>


	<div class="pull-right" style="margin-right: 14px;">
		<?php if($row['payment_status'] == 0):?>
			<div class="label label-danger"><?php echo get_phrase('not_paid');?></div>
		<?php endif;?>
		<?php if($row['payment_status'] == 1):?>
			<div class="label label-success"><?php echo get_phrase('paid');?></div>
		<?php endif;?>
		<?php if($row['payment_status'] == 2):?>
			<div class="label label-warning"><?php echo get_phrase('partially_paid');?></div>
		<?php endif;?>
	</div>


</div>


<hr />
<?php endif;?>

<div class="row">
	<div class="col-md-2">
	<?php if($row['order_status'] == 0):?>
		<a href="<?php echo base_url();?>index.php?employee/sales_order_view/<?php echo $row['order_code'];?>/confirm" style="text-align: left;"
			class="btn btn-<?php if($view_page == 'sales_order_confirm') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block">
			<?php echo get_phrase('approve_order');?>
			<i class="entypo-help"></i>
		</a>
	<?php endif;?>
		<a href="<?php echo base_url();?>index.php?employee/sales_order_view/<?php echo $row['order_code'];?>/overview" style="text-align: left;"
			class="btn btn-<?php if($view_page == 'sales_order_overview') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('overview');?>
			<i class="entypo-info"></i>
		</a>
		<?php if($row['order_status'] != 10):?>
		<a href="<?php echo base_url();?>index.php?employee/sales_order_view/<?php echo $row['order_code'];?>/shipment" style="text-align: left;"
			class="btn btn-<?php if($view_page == 'sales_order_shipment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('shipments');?>
			<i class="entypo-flight"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?employee/sales_order_view/<?php echo $row['order_code'];?>/invoice" style="text-align: left;"
			class="btn btn-<?php if($view_page == 'sales_order_invoice') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('invoice');?>
			<i class="entypo-docs"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?employee/sales_order_view/<?php echo $row['order_code'];?>/payment" style="text-align: left;"
			class="btn btn-<?php if($view_page == 'sales_order_payment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('payments');?>
			<i class="entypo-credit-card"></i>
		</a>
		<a href="<?php echo base_url();?>index.php?employee/sales_order_view/<?php echo $row['order_code'];?>/comment" style="text-align: left;"
			class="btn btn-<?php if($view_page == 'sales_order_comment') echo 'primary'; else echo 'default';?> btn-icon icon-left btn-block <?php if($row['order_status'] == 0) echo 'disabled';?>">
			<?php echo get_phrase('comments');?>
			<i class="entypo-comment"></i>
		</a>
	<?php endif;?>
	</div>
	<?php if($row['order_status'] == 10):?>
		<div class="col-md-10">
			<center>
				<i class="fa fa-ban fa-4x"></i>
				<h3 style="color: #626262;">You can not take payments for a canceled order</h3>
			</center>
		</div>
	<?php endif;?>
	<?php if($row['order_status'] != 10):?>
	<div class="col-md-10">

		<!-- panel for ordered payments -->
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-credit-card"></i> &nbsp;<?php echo get_phrase('payments');?>
				</div>
				<?php
					$query = $this->db->get_where('payment' , array(
						'order_id' => $row['order_id'], 'payment_type' => 'sales'
					));
					if($query->num_rows() < 1):
				?>
				<div class="panel-options">
					<a href="#" style="color: #949494;">
						<?php echo get_phrase('no_payment_entry_available');?>
					</a>
				</div>
				<?php endif;?>
			</div>

			<div class="panel-body with-table">

				<?php if($query->num_rows() > 0):?>

					<table class="table table-bordered table-responsive">
						<thead>
							<th width="4%;"><strong>#</strong></th>
							<th><strong><?php echo get_phrase('payment_code');?></strong></th>
							<th><strong><?php echo get_phrase('invoice_code');?></strong></th>
							<th><strong><?php echo get_phrase('amount');?></strong></th>
							<th><strong><?php echo get_phrase('payment_method');?></strong></th>
							<th><strong><?php echo get_phrase('notes');?></strong></th>
							<th><strong><?php echo get_phrase('date');?></strong></th>
							<th><strong><?php echo get_phrase('options');?></strong></th>
						</thead>
						<tbody>
						<?php
							$count = 1;
							$payments = $query->result_array();
							foreach($payments as $payment):
						?>
							<tr>
								<td><?php echo $count++;?></td>
								<td><?php echo $payment['payment_code'];?></td>
								<td>
									<?php echo $this->db->get_where('invoice' , array(
										'invoice_id' => $payment['invoice_id']
										))->row()->invoice_code;?>
								</td>
								<td>
									<?php echo $this->db->get_where('invoice' , array(
										'invoice_id' => $payment['invoice_id']
										))->row()->total_amount;?>
								</td>
								<td>
									<?php
										if($payment['payment_method'] == 1)
											echo get_phrase('cash');
										if($payment['payment_method'] == 2)
											echo get_phrase('cheque');
										if($payment['payment_method'] == 3)
											echo get_phrase('card');

									?>
								</td>
								<td><?php echo $payment['notes'];?></td>
								<td><?php if($payment['timestamp'] != '') echo date('D, d M Y' , $payment['timestamp']);?></td>
								<td>
									<a href="<?php echo base_url();?>index.php?employee/sales_order_payment_print_view/<?php echo $payment['payment_id'];?>"
										class="btn btn-default btn-xs tooltip-primary" target="_blank"
											data-toggle="tooltip" data-original-title="<?php echo get_phrase('print');?>">
										<i class="entypo-print" style="color: #949494;"></i>
									</a>
									<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/sales_order_payment_modal_view/<?php echo $payment['payment_id'];?>')"
										class="btn btn-default btn-xs tooltip-primary"
											data-toggle="tooltip" data-original-title="<?php echo get_phrase('view');?>">
										<i class="entypo-eye" style="color: #949494;"></i>
									</a>
								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>

				<?php endif;?>

			</div>
		</div>
		<?php if($row['payment_status'] != 1):?>
			<button type="button" class="btn btn-info btn-icon icon-left btn-sm" id="take_payment_button"
				onclick="show_take_payment_form()">
				<?php echo get_phrase('take_payment');?>
				<i class="fa fa-plus"></i>
			</button>
		<?php endif;?>

		<div id="take_payment_panel">
		<!-- panel for ordered payments -->
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-plus"></i> <?php echo get_phrase('take_payment');?>
				</div>
			</div>
			<div class="panel-body">

				<div class="col-md-6">

					<?php echo form_open(base_url().'index.php?employee/sales_order/take_payment/' . $order_code , array(
						'class' => 'form-horizontal form-groups' , 'enctype' => 'multipart/from-data'));?>

						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo get_phrase('invoice');?></label>
							<div class="col-sm-8">
								<select name="invoice_id" class="selectboxit" id="invoice_id"
									onchange="get_invoice_info(this.value)">
									<option value=""><?php echo get_phrase('select_an_invoice');?></option>
									<?php
										$invoices = $this->db->get_where('invoice' , array(
											'order_id' => $row['order_id'] , 'status' => 0
										))->result_array();
										foreach($invoices as $invoice):
									?>
									<option value="<?php echo $invoice['invoice_id'];?>">
									<?php echo $invoice['invoice_code'];?>
									</option>
									<?php endforeach;?>
								</select>
							</div>
							<a href="<?php echo base_url();?>index.php?employee/sales_order_view/<?php echo $order_code;?>/invoice"
								class="btn btn-default btn-sm tooltip-primary" data-toggle="tooltip"
								data-placement="top" title="" data-original-title="<?php echo get_phrase('add_invoice');?>">
								<i class="glyphicon glyphicon-plus" style="color: #969696;"></i>
							</a>
						</div>

						<div class="invoice_info">

							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('amount');?></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="amount"
										value="<?php echo get_phrase('select_an_invoice_first');?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('method');?></label>
								<div class="col-sm-8">
									<select class="selectboxit" id="payment_method">
										<option value=""><?php echo get_phrase('select_an_invoice_first');?></option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('notes');?></label>
								<div class="col-sm-8">
									<textarea class="form-control" id="notes"></textarea>
								</div>
							</div>

						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">
										<a href="#"><i class="entypo-calendar"></i></a>
									</div>
									<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="timestamp"
										value="<?php echo date('D, d M Y');?>">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label"></label>
							<div class="col-sm-8">
								<button type="submit" class="btn btn-info btn-icon icon-left btn-sm">
									<?php echo get_phrase('take_payment');?>
									<i class="fa fa-credit-card"></i>
								</button>
							</div>
						</div>

					<?php echo form_close();?>



				</div>

				<div class="col-md-6">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td><?php echo get_phrase('total_order_amount');?></td>
								<td align="right">
									<?php echo $this->info_model->get_currency_code();?> <?php echo round($row['total_amount'] , 2);?>
								</td>
							</tr>
							<tr>
								<!-- calculating total paid amount -->
								<?php
									$paid_amount = 0;
									$payments = $this->db->get_where('payment' , array(
										'order_id' => $row['order_id'] , 'payment_type' => 'sales'
									))->result_array();
									foreach($payments as $payment) {
										$invoice_amount = $this->db->get_where('invoice' , array(
											'invoice_id' => $payment['invoice_id']
										))->row()->total_amount;
										$paid_amount += $invoice_amount;
									}
								?>
								<!-- calculating total paid amount -->
								<td><?php echo get_phrase('total_paid_amount');?></td>
								<td align="right">
									<?php echo $this->info_model->get_currency_code();?> <?php echo round($paid_amount , 2);?>
								</td>
							</tr>
							<tr>
								<td><?php echo get_phrase('due');?></td>
								<td align="right">
									<?php $due = round($row['total_amount'] , 2) - round($paid_amount , 2);?>
									<?php echo $this->info_model->get_currency_code();?> <?php echo round($due , 2);?>
								</td>
							</tr>
						</tbody>
					</table>
					<blockquote class="blockquote-default">
						<p>
							<strong><?php echo get_phrase('payment_notes');?></strong>
						</p>
						<p>
							Please check and recheck the payment info that you have provided before taking the payment.
							The payment once made can't be altered later.
						</p>
					</blockquote>
				</div>

			</div>
		</div>

		</div>

	</div>
<?php endif;?>
</div>

<?php endforeach;?>

<script type="text/javascript">

	$(document).ready(function() {

		$('#amount').prop('disabled' , true);
		$('#payment_method').prop('disabled' , true);
		$('#notes').prop('disabled' , true);
		$('#take_payment_panel').hide();

		// SelectBoxIt Dropdown replacement
		if($.isFunction($.fn.selectBoxIt))
		{
			$("select.selectboxit").each(function(i, el)
			{
				var $this = $(el),
					opts = {
						showFirstOption: attrDefault($this, 'first-option', true),
						'native': attrDefault($this, 'native', false),
						defaultText: attrDefault($this, 'text', ''),
					};

				$this.addClass('visible');
				$this.selectBoxIt(opts);
			});
		}

	});

	function get_invoice_info(invoice_id)
	{
		$.ajax({
			url: '<?php echo base_url();?>index.php?employee/get_invoice_info_for_sales_order/' + invoice_id,
			success: function(response)
			{
				jQuery('.invoice_info').html(response);
			}
		});
	}

	function show_take_payment_form()
	{
		$('#take_payment_panel').show(400);
		$('#take_payment_button').hide(400);
	}

</script>

<?php endif;?>
