
<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('add_address');?>
				</div>
			</div>

			<div class="panel-body">

				<?php echo form_open(base_url() . 'index.php?admin/address/create/' , array(
							'class' => 'form-horizontal form-groups ajax-submit' , 'enctype' => 'multipart/form-data'));?>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('address_line_1');?></label>

						<div class="col-sm-7">
							<input type="text" id="address_line_1" class="form-control" name="address_line_1" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('address_line_2');?></label>

						<div class="col-sm-7">
							<input type="text" id="address_line_2" class="form-control" name="address_line_2">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('city');?></label>

						<div class="col-sm-7">
							<input type="text" id="city" class="form-control" name="city" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('zip_code');?></label>

						<div class="col-sm-7">
							<input type="text" id="zip_code" class="form-control" name="zip_code" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('state');?></label>

						<div class="col-sm-7">
							<input type="text" id="state" class="form-control" name="state">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('country');?></label>

						<div class="col-sm-7">
							<select name="country_id" class="selectboxit" id="country_id">
								<option value=""><?php echo get_phrase('select_a_country');?></option>
								<?php
									$countries = $this->db->get('country')->result_array();
									foreach($countries as $row):
								?>
									<option value="<?php echo $row['country_id'];?>"><?php echo $row['country_name'];?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>

					<input type="hidden" name="user_id" value="<?php echo $this->user_model->get_user_info($param2 , 'user_id');?>">

					<div class="form-group">
						<label class="col-sm-3 control-label"></label>

						<div class="col-sm-7">
							<button type="submit" class="btn btn-green btn-icon icon-left">
								<?php echo get_phrase('save');?>
								<i class="entypo-check"></i>
							</button>
							<span id="preloader-form"></span>
						</div>
					</div>

				<?php echo form_close();?>

			</div>

		</div>

	</div>
</div>

<script type="text/javascript">

	// url for refresh data after ajax form submission
	var post_refresh_url	=	'<?php echo base_url();?>index.php?admin/reload_user_profile_body/<?php echo $param2;?>';
	var post_message		=	'<?php echo get_phrase('address_added_successfully');?>';
	var success 			=	'<?php echo get_phrase('success');?>';
	var error 				=	'<?php echo get_phrase('error');?>';

</script>
<script src="assets/js/jquery_form.js"></script>

<!-- AJAX FORM SUBMISSION CODES -->
<script type="text/javascript">

	// ajax form plugin calls at each modal loading,
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

		$.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
	    	options.async = true;
		});

		// configuration for ajax form submission
		var options = {
			beforeSubmit		:	validate,
			success				:	showResponse,
			resetForm			:	true
		};

		// binding the form for ajax submission
		$('.ajax-submit').submit(function() {
			$(this).ajaxSubmit(options);

			// prevents normal form submission
			return false;
		});
	});

	// form validation
	function validate(formData, jqForm, options) {

		var address_line_1    =	$('#address_line_1').val();
		var zip_code 		  =	$('#zip_code').val();
		var country_id        =	$('#country_id').val();
		if (address_line_1 == '' || zip_code == '' || country_id == '') {
			toastr.error("<?php echo get_phrase('enter_sufficient_info');?>", error);
			return false;

		}
		// sends ajax request after passing validation, showing a user-friendly preloader
		$('#preloader-form').html('<img src="assets/preloader.GIF" style="height:15px;margin-left:20px;" />');


	}

	// ajax success response after form submission, post_refresh_url is sent from modal body
	function showResponse(responseText, statusText, xhr, $form)  {

		// hides the preloader
		$('#preloader-form').html('');

		// showing success message
		toastr.success(post_message, success);

		// hides modal that holds the form
		$('#modal_ajax').modal('hide');

		// reload table data after data update
		reload_data(post_refresh_url);
	}



	// function for reloading table data
	function reload_data(url)
	{
		$('div.main_data').block({ message: '<img src="assets/preloader.GIF" style="height:25px;" />' });
		$.ajax({
			url: url,
			success: function(response)
			{
				jQuery('.main_data').html(response);
				$('div.main_data').unblock();
			}
		});
	}

</script>
