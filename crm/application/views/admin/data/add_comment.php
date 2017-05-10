<?= message_box('success'); ?>
<style>
.radio label, .checkbox label {
   margin-left: 250px;
   
}
</style>
<div class="panel panel-custom">

    <div class="panel-heading">

        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <h4 class="modal-title" id="myModalLabel"><?php if('add' == $show){ echo 'Add'; } else { echo 'View'; } ?> Comments</h4>

    </div>

    <div class="modal-body wrap-modal wrap">
    
         <div class="form-group" id="border-none">
               <label for="field-1" class="col-sm control-label">Comments <span  class="required">*</span></label>
                     <div class="col-lg">
                            <textarea name="comments" id="comments" class="form-control" required ><?php echo $campaign_data->comments;?></textarea>
                        </div>
                        <input type="hidden" name="format_id" id="format_id" value="<?php echo $format_id;?>"  >
                        <input type="hidden" name="campaign_id" id="campaign_id" value="<?php echo $campaign_id;?>"  >
                        <input type="hidden" name="id" id="id" value="<?php echo $id;?>"  >
                     </div>

            <div class="modal-footer" >

                <button type="button" class="btn btn-default" id="close-btn" data-dismiss="modal"><?= lang('close') ?></button>

                <button type="button" class="btn btn-default" id="save-btn" onclick="submitForm();">Save</button>

            </div>
		
      </div>
      <div id="toast-container" class="toast-bottom-left" aria-live="polite" role="alert">
			<div class="toast toast-error" style="display:none;">
				<div class="toast-progress" style="width: 0%;"></div>
					<div class="toast-message"></div>
			</div>
			<div class="toast toast-success" style="display:none;">
				<div class="toast-progress" style="width: 0%;"></div>
					<div class="toast-message"></div>
			</div>
		</div>
      

</div>
<script>
function submitForm(){
	var comment 	= $("#comments").val();
	var id		 	= $("#id").val();
	var format_id 	= $("#format_id").val();
	var campaign_id = $("#campaign_id").val();
	
	if ( '' == comment ){
	  	  alert( 'Please add comments.');
		  return false;
	} else {
 	
		$.ajax({  
			type: "POST",  
			url: "<?php echo base_url();?>custom/data/save_user_comment",
			data: {'format_id':format_id,'id':id,'campaign_id':campaign_id,'value':comment},  
			success: function(msg){  
			
				if(msg == 'true')
				{  
					$(".toast-success").show();
					$(".toast-message").html("Comments saved succesfully.");
					$( ".toast-success" ).fadeOut( 3000 );

					location.reload();
					
				}  
				else 
				{  
					$(".toast-error").show();;
					$(".toast-message").html("Comments not saved.");
					$( ".toast-error" ).fadeOut( 3000 );
				} 
			} 
		
		}); 
	}
}
</script>
