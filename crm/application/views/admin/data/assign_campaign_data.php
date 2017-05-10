<?= message_box('success'); ?>
<style>
.radio label, .checkbox label {
   margin-left: 250px;
   
}
</style>
<div class="panel panel-custom">

    <div class="panel-heading">

        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <h4 class="modal-title" id="myModalLabel">Assign User</h4>

    </div>

    <div class="modal-body wrap-modal wrap">
         <div class="form-group" id="border-none">
               <label for="field-1" class="col-sm-3 control-label">Users <span  class="required">*</span></label>
                                    <div class="col-sm-5">
                                       <select name="user" id="user" style="width: 100%" class="select_box" required >
                                        <option value="">Select User</option>
                                            <?php
                                           // $reporter_info = $this->db->get('tbl_users')get_by->result();
                                            if (true == is_object($users)) {
                                                foreach ($users->result() as $key => $v_reporter) {
                                                    ?>
                                                    <option value="<?= $v_reporter->user_id ?>"><?= $v_reporter->username?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php //if( true == isset( $id ) && true == is_int( $id )){?>
                                    <input type="hidden" name="form_allocate_id" id="form_allocate_id" value="<?php echo $id;?>"  >
                                    <?php //} ?>
                                </div>

            <div class="modal-footer" >

                <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close') ?></button>

                <button type="button" class="btn btn-default" onclick="submitForm();">Assign</button>

            </div>

      </div>

</div>
<script>
function submitForm(){

	if ( '' == $("#user").val()){
	  	  alert( 'Please select User.');
		  return false;
	}
 	
 	if ( "string" == typeof $("#form_allocate_id").val() ){
		var name = $("#form_allocate_id").val();
		//alert( "#form-"+name);
		if( 'allocate' != name && 'unallocate' != name ){
			if ( 0 == $("#form-allocate input[type='checkbox']:checked").length){
	  	 		 alert( 'Please select at least one checkbox.');
		   		return false;
	 		}
			$( "#form-allocate" ).submit();
		} else {
			if ( 0 == $("#form-"+name+" input[type='checkbox']:checked").length){
	  	 		 alert( 'Please select at least one checkbox.');
		   		return false;
	 		}
	 		
			$( "#form-"+name ).submit();
		}	
 		//document.getElementById($("#form_allocate_id").val()).submit();
 	}
	
}

$(document).ready(function() {

	$( "#user" ).change(function() {
		var name = $("#form_allocate_id").val();
		
		if( 'allocate' != name && 'unallocate' != name ){
			$('#form-allocate #user_id').val( $(this).val() );	
			
		} else {
			$('#form-'+name+' #user_id').val( $(this).val() );	
		}		

		if ( 0 != $("#form_allocate_id").length){
			if( 'allocate' != name && 'unallocate' != name ){
				$('#form-allocate #allocate_id').val( $("#form_allocate_id").val() );
			} else {
				$('#form-'+name+' #allocate_id').val( $("#form_allocate_id").val() );
			}	
		}
	});
	
	
});
</script>

