

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo get_phrase('address');?></label>
	<div class="col-sm-7">
		<select name="supplier_address_id" class="selectboxit" id="supplier_address_id" required>
			<option value=""><?php echo get_phrase('select_supplier_address');?></option>
			<?php
				$addresses = $this->info_model->get_user_address($user_id);
				foreach($addresses as $row):
			?>
				<option value="<?php echo $row['address_id'];?>">
					<?php echo $row['address_line_1'];?>, <?php echo $row['city'];?>, <?php echo $row['state'];?>,
					<?php echo $this->db->get_where('country' , array('country_id' => $row['country_id']))->row()->country_name;?>
				</option>
			<?php endforeach;?>
		</select>
	</div>
</div>


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

