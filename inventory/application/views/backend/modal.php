    <script type="text/javascript">
	function showAjaxModal(url)
	{
		// SHOWING AJAX PRELOADER IMAGE
		//jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" style="height:25px;" /></div>');

		// LOADING THE AJAX MODAL
		jQuery('#modal_ajax').modal('show', {backdrop: 'true'});

		// SHOW AJAX RESPONSE ON REQUEST SUCCESS
		$.ajax({
			url: url,
			success: function(response)
			{
				jQuery('#modal_ajax .modal-body').html(response);
			}
		});
	}
	</script>

    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax">
        <div class="modal-dialog" >
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo $this->info_model->get_settings('system_name');?></h4>
                </div>

                <div class="modal-body" style="height:500px; overflow:auto;">



                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript">
	function confirm_modal(delete_url , post_refresh_url)
	{

		$('#preloader-delete').html('');
		jQuery('#modal_delete').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute("onClick" , "delete_data('" + delete_url + "' , '" + post_refresh_url + "')" );
		document.getElementById('delete_link').focus();
	}
	</script>

    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal_delete">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;"><?php echo get_phrase('are_you_sure_to_delete_this_information');?> ?</h4>
                </div>


                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                	<span id="preloader-delete"></span>
                    </br>
                	  <button type="button" class="btn btn-danger" id="delete_link" onClick=""><?php echo get_phrase('delete');?></button>
                    <button type="button" class="btn btn-info" data-dismiss="modal" id="delete_cancel_link"><?php echo get_phrase('cancel');?></button>

                </div>
            </div>
        </div>
    </div>





    <!-- confirmation modal -->
    <script type="text/javascript">
    function confirm_modal_2(url , post_refresh_url)
    {
        $('#preloader-delete').html('');
        jQuery('#modal_confirm').modal('show', {backdrop: 'static'});
        document.getElementById('confirm_link').setAttribute("onClick" , "confirm('" + url + "' , '" + post_refresh_url + "')" );
        document.getElementById('confirm_link').focus();
    }

    </script>

    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal_confirm">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" style="text-align:center;"><?php echo get_phrase('are_you_sure');?> ?</h3>
                    <p style="text-align: center; font-size: 14px;">
                        Please check and recheck before confirming. Some actions can't be altered later !!!
                    </p>
                </div>


                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <span id="preloader-delete"></span>
                    </br>
                      <button type="button" class="btn btn-success btn-sm" id="confirm_link" onClick=""><i class="entypo-check"></i> &nbsp;<?php echo get_phrase('confirm');?></button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="confirm_cancel_link"><i class="entypo-cancel"></i> &nbsp;<?php echo get_phrase('cancel');?></button>
                </div>
            </div>
        </div>
    </div> 

   