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
                                    <select name="select-users" id="select-users" id="example-getting-started" style="width: 100%" class="select_box">
										  <?php
                                           // $reporter_info = $this->db->get('tbl_users')get_by->result();
                                            if (!empty($users->result())) {
                                                foreach ($users->result() as $key => $v_reporter) {
                                                    ?>
                                                    <option value="<?= $v_reporter->user_id ?>" <?php
                                                    if (!empty($bug_info->reporter)) {
                                                        echo $v_reporter->user_id == $bug_info->reporter ? 'selected' : '';
                                                    }
                                                    ?>><?= $v_reporter->username?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
									</select>
                                    </div>
                                    <?php if( true == isset( $id )){?>
                                    <input type="hidden" name="allocate_id" id="allocate_id" value="<?php echo $id;?>"  >
                                    <?php } ?>
                                </div>

            <div class="modal-footer" >

                <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close') ?></button>

                <button type="button" class="btn btn-default" onclick="submitForm();">Assign</button>

            </div>

      </div>

</div>
<script>
function submitForm(){
	if ( 0 == $("#form-unallocate input[type='checkbox']:checked").length){
  	  alert( 'Please select at least one checkbox.');
	   		return false;
 	}
	document.getElementById('form-unallocate').submit();
}

$(document).ready(function() {

	$( "#user" ).change(function() {

		$('#form-unallocate #user_id').val( $(this).val() );	

	});

	$('#select-users').change(function(){
	      //brand new array each time
	    var users = [];
	      //fills the array
	    users = $("option:selected", this).map(function(){ return $(this).val() }).get();
	      //fills input with vals, as strings of course
	    //$("input[name='myObjecttype']").val(foo);
	    $('#form-unallocate #user_id').val( users );
	      //logs an array, if needed
	    console.log($('#form-unallocate #user_id').val().split(','));
	});  
	
});
</script>

