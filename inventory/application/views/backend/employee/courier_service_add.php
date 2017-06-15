
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-default" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('add_courier_service');?>
				</div>
			</div>
			
			<div class="panel-body">
				
				<?php echo form_open(base_url() . 'index.php?employee/shipment_courier/courier_service_add/' , array(
							'class' => 'form-horizontal form-groups ajax-submit' , 'enctype' => 'multipart/from-data'));?>
					
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
						
						<div class="col-sm-7">
							<input type="text" id="name" class="form-control" name="name"
								placeholder="<?php echo get_phrase('courier_service_name');?>">
						</div>
					</div>

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
	var post_refresh_url	=	'<?php echo base_url();?>index.php?employee/reload_shipment_courier_list';
	var post_message		=	'<?php echo get_phrase('courier_service_added_successfully');?>';
	var success 			=	'<?php echo get_phrase('success');?>';
	var error 				=	'<?php echo get_phrase('error');?>';

</script>
<script src="assets/js/jquery_form.js"></script>

<!-- AJAX FORM SUBMISSION CODES -->
<script type="text/javascript">

	// ajax form plugin calls at each modal loading,
	$(document).ready(function() {

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
		
		var name    =	$('#name').val();
		if (name == '') {
			toastr.error("<?php echo get_phrase('enter_courier_service_name');?>", error);
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
		$.ajax({
			url: url,
			success: function(response)
			{
				jQuery('.main_data').html(response);
			}
		});
	}

</script>