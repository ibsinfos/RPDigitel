<?php 
	$invoice_info = $this->db->get_where('invoice' , array(
		'invoice_id' => $invoice_id
	))->result_array();
	foreach($invoice_info as $info):
?>
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo get_phrase('amount');?></label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="amount"
			value="<?php echo $info['total_amount'];?>" readonly>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo get_phrase('method');?></label>
	<div class="col-sm-8">
		<select class="selectboxit" id="payment_method" name="payment_method">
			<option value=""><?php echo get_phrase('select_payment_method');?></option>
			<option value="1"><?php echo get_phrase('cash');?></option>
			<option value="2"><?php echo get_phrase('cheque');?></option>
			<option value="3"><?php echo get_phrase('card');?></option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo get_phrase('notes');?></label>
	<div class="col-sm-8">
		<textarea class="form-control" id="notes" name="notes"></textarea>
	</div>
</div>
<?php endforeach;?>

<script type="text/javascript">

	$(document).ready(function() {

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

</script>