<?php 
	$variant_info = $this->db->get_where('variant' , array(
		'variant_id' => $variant_id
	))->result_array();
	foreach($variant_info as $info):
?>
	<!-- VARIANT ID OF SELECTED PRODUCT -->
	<div class="col-sm-2" style="width: 35%;">
		<?php if($info['is_variant'] == 0):?>
			<strong>
				<?php echo $this->db->get_where('product' , array('product_id' => $info['product_id']))->row()->name;?>
			</strong>
		<?php endif;?>
		<?php if($info['is_variant'] == 1):?>
			<strong>
				<?php 
					echo $this->db->get_where('product' , array(
						'product_id' => $info['product_id']
					))->row()->name . ' - ' . $info['type'] . ' : ' . $info['specification'];
				?>
			</strong>
		<?php endif;?>
		<input id="" class="variant" type="hidden" name="variant_id[]" value="<?php echo $info['variant_id'];?>">
	</div>

	<!-- PRICE OF SELECTED VARIANT -->
	<div class="col-sm-2" style="width: 15%;">
		<input id="cost_price_<?php echo $count;?>" type="text" class="form-control" name="cost_price[]"
			value="<?php echo $info['cost_price'];?>" readonly>
	</div>

	<!-- STOCK QUANTITY -->
	<div class="col-sm-2" style="width: 12%; text-align: center;">
		<strong><?php echo $info['quantity'];?></strong>
	</div>

	<!-- ORDER QUANTITY -->
	<div class="col-sm-2" style="width: 11%;">
		<input id="ordered_quantity_<?php echo $count;?>" type="number" class="form-control" name="qty[]" value="1" min="1"
			onchange="calculate_subtotal(<?php echo $count;?>)" onkeyup="calculate_subtotal(<?php echo $count;?>)">
	</div>

	<!-- SUBTOTAL OF AN ENTRY-->
	<div class="col-sm-2" style="width: 15%; text-align: center;">
		<strong id="subtotal_<?php echo $count;?>"></strong>
	</div>
	<div class="col-sm-2" style="width: 2%;">
		<i class="glyphicon glyphicon-remove" style="color: #676767; cursor: pointer;"
			onclick="deleteParentElement(this)"></i>
	</div>
<?php endforeach;?>


<script type="text/javascript">

	// calculating single entry total
	function calculate_subtotal(count) {
		cost_price = Number($('#cost_price_' + count).val());
		ordered_quantity = Number($('#ordered_quantity_' + count).val());

		subtotal = (cost_price * ordered_quantity);

		subtotal = subtotal.toFixed(2);

		$('#subtotal_' + count).html(subtotal);

		// calling the function for calculating grand total
		calculate_grand_total();
		
	}

	// calculating the grand total
	function calculate_grand_total() {
		count = '<?php echo $count;?>';
		grand_total = 0;
		for(i = 1; i <= count; i++) {
			if ($('#subtotal_'+ i).length) {
		    	grand_total += Number( $('#subtotal_'+ i).html() );
			}
		}

		grand_total = grand_total.toFixed(2);
		$('#grand_total').html(grand_total);
	}

	$(document).ready(function() {

		calculate_subtotal(count);

		$('#add_entry_button').prop('disabled' , false);

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