<!-- THE BASIC AJAX MODAL -->
<script type="text/javascript">

	function showAjaxModal(url) {
		// show the preloader image
		jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo site_url('assets/backend/images/preloader.gif'); ?>" style="height:25px;"/></div>');
    // load the modal
		jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
    // show the ajax response within the modal body
		$.ajax({
			url: url,
			success: function(response) {
				jQuery('#modal_ajax .modal-body').html(response);
			}
		});
	}

</script>

<div class="modal fade" id="modal_ajax">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
				<?php $logo = $this->db->get_where('settings' , array('type' =>'logo'))->row()->description; ?>
				<img src="<?php echo base_url('assets/backend/images/'.$logo);?>" width="44">
        <strong class="modal-title" style="color: #7a7981;">
					<?php echo get_settings('system_name'); ?>
				</strong>
      </div>
      <div class="modal-body" style="height:600px; overflow:auto;">
        <!-- the main content of the modal will be loaded here by ajax -->
      </div>
			<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- THE BASIC AJAX MODAL -->


<!-- THE BASIC DELETE CONFIRMATION MODAL -->
<script type="text/javascript">

  function confirm_modal(delete_url , post_refresh_url) {
    $('#preloader-delete').html('');
    jQuery('#modal_delete').modal('show', {backdrop: 'static'});
    document.getElementById('delete_link').setAttribute("onClick" , "delete_data('" + delete_url + "' , '" + post_refresh_url + "')" );
    document.getElementById('delete_link').focus();
  }

</script>

<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <h4 class="modal-title" style="text-align:center;">
        	<?php echo get_phrase('this_will_premanently_delete_the_information'); ?>
        </h4>
      </div>
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
      	<span id="preloader-delete"></span>
        </br>
    	  <button type="button" class="btn btn-danger" id="delete_link" onClick="">
    	  	<?php echo get_phrase('delete'); ?>
    	  </button>
        <button type="button" class="btn btn-info" data-dismiss="modal" id="delete_cancel_link">
        	<?php echo get_phrase('cancel'); ?>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- THE BASIC DELETE CONFIRMATION MODAL -->
