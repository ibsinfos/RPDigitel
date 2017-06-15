<div class="row">
	<div class="col-sm-12">
		<div id="purchase_order_entry_<?php echo $count;?>" style="margin-top: 10px;">
			<div class="col-sm-2" style="width: 30%;">
				<select id="<?php echo $count;?>" class="form-control" onchange="show_response_for_append(this.value , <?php echo $count;?>)">
					<option value=""><?php echo get_phrase('select_a_product');?></option>
					<?php 
						$products = $this->db->get('variant')->result_array();
						foreach($products as $row):
							$archive_status = $this->db->get_where('product' , array(
								'product_id' => $row['product_id']
							))->row()->archive_status;
							if($archive_status == 0):

							// check if this variant is already selected
							$selected_variants_array = explode("." , $selected_variants);
							if ( in_array($row['variant_id'], $selected_variants_array))
								continue;
					?>
						<?php if($row['is_variant'] == 0):?>
							<option value="<?php echo $row['variant_id'];?>">
								<?php 
									echo $this->db->get_where('product' , array(
										'product_id' => $row['product_id']
									))->row()->name;
								?>
							</option>
						<?php endif;?>
						<?php if($row['is_variant'] == 1):?>
							<option value="<?php echo $row['variant_id'];?>">
								<?php 
									echo $this->db->get_where('product' , array(
										'product_id' => $row['product_id']
									))->row()->name . ' - ' . $row['type'] . ' : ' . $row['specification'];
								?>
							</option>
						<?php endif;?>
					<?php endif;?>
					<?php endforeach;?>
				</select>
			</div>
			<div class="col-sm-2" style="width: 15%;">
				<input id="" type="text" class="form-control" disabled="disabled">
			</div>
			<div class="col-sm-2" style="width: 12%;">
				
			</div>
			<div class="col-sm-2" style="width: 11%;">
				<input id="" type="text" class="form-control" disabled="disabled">
			</div>
			<div class="col-sm-2" style="width: 15%;">
				
			</div>
			<div class="col-sm-2" style="width: 2%;">
				<i class="glyphicon glyphicon-remove" style="color: #676767; cursor: pointer;"
					onclick="deleteParentElement(this)"></i>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">

	$(document).ready(function() {

		$('#add_entry_button').prop('disabled' , true);

		var select_id_count = '<?php echo $count;?>'

		// Select2 Dropdown replacement
		if($.isFunction($.fn.select2))
		{
			$("#" + select_id_count).each(function(i, el)
			{
				var $this = $(el),
					opts = {
						allowClear: attrDefault($this, 'allowClear', false)
					};

				$this.select2(opts);
				$this.addClass('visible');

				//$this.select2("open");
			});


			if($.isFunction($.fn.niceScroll))
			{
				$(".select2-results").niceScroll({
					cursorcolor: '#d4d4d4',
					cursorborder: '1px solid #ccc',
					railpadding: {right: 3}
				});
			}
		}

	});

	function show_response_for_append(variant_id , count)
	{
		$.ajax({
			url: '<?php echo base_url();?>index.php?employee/purchase_order_entry_response/' + variant_id + '/' + count,
			success: function(response)
			{
				jQuery('#purchase_order_entry_' + '<?php echo $count;?>').html(response);
			}
		});
	}

</script>