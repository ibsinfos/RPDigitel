<?= message_box('success'); ?>
<?= message_box('error'); ?>
<div class="nav-tabs-custom">

 
    <!-- Tabs within a box -->

    <div class="tab-content no-padding  bg-white">
      <div class="panel">
                    <div class="panel-heading">
    <div class="panel-body row form-horizontal task_details">
 <?php
                    if (!empty($campaign_data)):

                        foreach ($campaign_data as $campaign ) : ?>
						
							<?php	foreach ($campaign as $key => $value ) :					
							?>
                       
	                      <div class="form-group  col-sm-6">
                            <label class="control-label col-sm-4"><strong><?= ucwords(str_replace('_', ' ', $key)) ?>:</strong></label>
                            <div class="col-sm-8 mt">
                               <?= $value ?>
                            </div>
                        </div>
                       <?php
							endforeach; ?>
							
							
                        <?php endforeach;

                    endif;

                    ?>
                        
                       </div> 
			</div>
			</div>
        <!-- ************** general *************-->

            <form role="form" enctype="multipart/form-data" id="form_lead"
                  action="<?php echo base_url(); ?>custom/data/saved_leads/" method="post" class="form-horizontal" onsubmit="return validateForm();">

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('lead_name') ?> <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="" name="lead_name" id="lead_name"  maxlength="50" required="">
                            <div id="lead_msg"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('lead_source') ?> </label>
                        <div class="col-lg-4">
                            <select name="lead_source_id" class="form-control select_box" style="width: 100%"
                                    >
                                <?php
                                $lead_source_info = $this->db->get('tbl_lead_source')->result();
                                if (!empty($lead_source_info)) {
                                    foreach ($lead_source_info as $v_lead_source) {
                                        ?>
                                        <option
                                            value="<?= $v_lead_source->lead_source_id ?>" ><?= $v_lead_source->lead_source ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('lead_status') ?> </label>
                        <div class="col-lg-4">
                            <select name="lead_status_id" class="form-control select_box" style="width: 100%"
                                    >
                                <?php

                                if (!empty($status_info)) {
                                    foreach ($status_info as $type => $v_leads_status) {
                                        if (!empty($v_leads_status)) {
                                            ?>
                                            <optgroup label="<?= lang($type) ?>">
                                                <?php foreach ($v_leads_status as $v_l_status) { ?>
                                                    <option
                                                            value="<?= $v_l_status->lead_status_id ?>" ><?= $v_l_status->lead_status ?></option>
                                                <?php } ?>
                                            </optgroup>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('organization') ?> </label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="<?php
                            if (!empty($leads_info)) {
                                echo $leads_info->organization;
                            }
                            ?>" name="organization">
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('contact_name') ?> <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="" name="contact_name" maxlength="50" required="">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('email') ?> <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="" name="email" maxlength="50" required="">
                            <div id="err_email"></div>	
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('phone') ?><span
                                class="text-danger"> *</span></label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="" name="phone" maxlength="15" required="">
                        	<div id="err_phone"></div>	
                        </div>

                    </div>
                    <!-- End discount Fields -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('mobile') ?><span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-4">
                            <input type="text" required="" class="form-control" value="" maxlength="12" name="mobile"/>
                       		<div id="err_mobile"></div>	
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('address') ?> </label>
                        <div class="col-lg-4">
                            <textarea name="address" maxlength="255" class="form-control"></textarea>
                        </div>


                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('city') ?> </label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="" name="city" maxlength="20">
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('state') ?> </label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="" name="state" maxlength="20">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('country') ?></label>
                        <div class="col-lg-4">
                            <select name="country" class="form-control person select_box" style="width: 100%">
                                <optgroup label="Default Country">
                                    
                                        <option
                                            value="<?= $this->config->item('company_country') ?>"><?= $this->config->item('company_country') ?></option>
                                    
                                </optgroup>
                                <optgroup label="<?= lang('other_countries') ?>">
                                    <?php
                                    $countries = $this->db->get('tbl_countries')->result();
                                    if (!empty($countries)): foreach ($countries as $country):
                                        ?>
                                        <option value="<?= $country->value ?>"><?= $country->value ?></option>
                                        <?php
                                    endforeach;
                                    endif;
                                    ?>
                                </optgroup>
                            </select>
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('facebook_profile_link') ?> </label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="" name="facebook" maxlength="100">
                        </div>


                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('skype_id') ?> </label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="" name="skype" maxlength="100">
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('twitter_profile_link') ?> </label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="" name="twitter" maxlength="100">
                        </div>

                    </div>
                    <div class="form-group" id="border-none">
                        <label class="col-lg-2 control-label"><?= lang('short_note') ?> </label>
                        <div class="col-lg-8">
                            <textarea name="notes" class="form-control textarea"></textarea>
                        </div>
                    </div>
                    <?php
                    
                    $leads_id = null;
                    ?>
                    <?= custom_form_Fields(5, $leads_id, true); ?>

                    <div class="form-group" id="border-none">
                        <label for="field-1" class="col-sm-2 control-label"><?= lang('assined_to') ?> <span
                                class="required">*</span></label>
                        <div class="col-sm-9">
                            <div class="checkbox c-radio needsclick">
                                <label class="needsclick">
                                    <input id=""  type="radio" name="permission" value="everyone" checked="checked">
                                    <span class="fa fa-circle"></span><?= lang('everyone') ?>
                                    <i title="<?= lang('permission_for_all') ?>"
                                       class="fa fa-question-circle" data-toggle="tooltip"
                                       data-placement="top"></i>
                                </label>
                            </div>
                            <div class="checkbox c-radio needsclick">
                                <label class="needsclick">
                                    <input id="" type="radio" name="permission" value="custom_permission"
                                    >
                                    <span class="fa fa-circle"></span><?= lang('custom_permission') ?> <i
                                        title="<?= lang('permission_for_customization') ?>"
                                        class="fa fa-question-circle" data-toggle="tooltip"
                                        data-placement="top"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group " id="permission_user_1">
                        <label for="field-1"
                               class="col-sm-2 control-label"><?= lang('select') . ' ' . lang('users') ?>
                            <span
                                class="required">*</span></label>
                        <div class="col-sm-9">
                            <?php
                            if (!empty($assign_user)) {
                                foreach ($assign_user as $key => $v_user) {

                                    if ($v_user->role_id == 1) {
                                         $disable = true;
                                         $disable_manager = false;
                                         $disable_staff = false;
                                         $role = '<strong class="badge btn-danger">' . lang('admin') . '</strong>';
                                    } elseif( $v_user->role_id == 4 ) {
                                    	 $disable = false;
                                    	 $disable_staff = false;
                                         $disable_manager = true;
                                         $role = '<strong class="badge btn-primary">Manager</strong>';
                                    } else {
                                         $disable = false;
                                         $disable_manager = false;
                                         $disable_staff= true;
                                         $role = '<strong class="badge btn-primary">' . lang('staff') . '</strong>';
                                    }
                                    ?>
                                    <div class="checkbox c-checkbox needsclick">
                                        <label class="needsclick">
                                            <input type="checkbox"
                                               
                                                   value="<?= $v_user->user_id ?>"
                                                   name="assigned_to[]" 
                                                   class="needsclick">
                                                        <span
                                                            class="fa fa-check"></span><?= $v_user->username . ' ' . $role ?>
                                        </label>

                                    </div>
                                    <div class="action_1 p
                                                
                                                " id="action_1<?= $v_user->user_id ?>">
                                        <label class="checkbox-inline c-checkbox">
                                            <input id="<?= $v_user->user_id ?>" checked type="checkbox"
                                                   name="action_1<?= $v_user->user_id ?>[]" 
                                                   disabled
                                                   value="view">
                                                        <span
                                                            class="fa fa-check"></span><?= lang('can') . ' ' . lang('view') ?>
                                        </label>
                                        <label class="checkbox-inline c-checkbox">
                                            <input <?php if (!empty($disable_staff)) {
                                                echo 'checked';
                                            } ?><?php if (!empty($disable)) {
                                                echo 'disabled' . ' ' . 'checked';
                                            } ?> 
                                             <?php if (!empty($disable_manager)) {
                                                echo 'disabled' . ' ' .'checked';
                                            } ?> id="<?= $v_user->user_id ?>"
                                               
                                                 type="checkbox"
                                                 value="edit" name="action_<?= $v_user->user_id ?>[]">
                                                        <span
                                                            class="fa fa-check"></span><?= lang('can') . ' ' . lang('edit') ?>
                                        </label>
                                        <label class="checkbox-inline c-checkbox">
                                            <input <?php if (!empty($disable_staff)) {
                                                echo 'disabled';
                                            } ?> <?php if (!empty($disable)) {
                                                echo 'disabled' . ' ' . 'checked';
                                            } ?>
                                              <?php if (!empty($disable_manager)) {
                                                echo 'disabled' . ' ' .'checked';
                                            } ?> id="<?= $v_user->user_id ?>"
                                                
                                                 name="action_<?= $v_user->user_id ?>[]"
                                                 type="checkbox"
                                                 value="delete">
                                                        <span
                                                            class="fa fa-check"></span><?= lang('can') . ' ' . lang('delete') ?>
                                        </label>
                                        <input id="<?= $v_user->user_id ?>" type="hidden"
                                               name="action_<?= $v_user->user_id ?>[]" value="view">

                                    </div>


                                    <?php
                                }
                            }
                            ?>
							<div id="err_sel_user"></div>	

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                       
                            <div class="col-lg-5">
                            	<input type="hidden" name="format_id" value="<?php echo $format_id; ?>" />
                            	<input type="hidden" name="campaign_id" value="<?php echo $campaign_id; ?>"/>
                            	<input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                <button type="submit" class="btn btn-sm btn-primary"><?= lang('updates') ?></button>
                            </div>
                        
                    </div>
            </form>
    </div>

</div>
<script>
$(document).ready(function() {
    // validate Main Form
   
	$("#lead_name").change(function() {
		$.ajax({
				url:'<?php echo base_url(); ?>custom/data/checkLead',
				type:'post',
				data:'lead_name='+this.value,
				success:function(data){ 
				   if( 'true' == data ) {
						$("#lead_msg").html( '<font color="red">Lead name already exists.</font>' );
						$("#lead_name").val('');
						$("#lead_name").focus();
				   } else {
					   $("#lead_msg").html( '' );
				   }
				 
				}
		});
	});

	$('input[name="email"]').change(function() {

		$("#err_email").html('');
		
		var email = $(this).val();
		
		if( email != '' ){	
			var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			if(re.test(email)==false){
				$("#err_email").html( "<font color='red'>Please enter a valid email address.</font>" );
				$('input[name="email"]').focus();
			 }
		}	 
	});
		
	$('input[name="phone"]').change(function() {
		var phone = $( this ).val();
		intRegex = /[0-9]+$/;
		$('#err_phone').html( '' );
		
		if( phone.length == '' )	{
		     $('#err_phone').html( "<font color='red'>Please enter phone number.</font>" );
		     $('input[name="phone"]').focus();
		}
		
		if( phone.length < 10 )	{
		     $('#err_phone').html( "<font color='red'>Please enter minimum 10 digits.</font>" );
		     $('input[name="phone"]').focus();
		}

		if( phone.length > 15 )	{
		     $('#err_phone').html( "<font color='red'>Please enter maximum 12 digits.</font>" );
		     $('input[name="phone"]').focus();
		   
		}
		if(!intRegex.test(phone)){
		     $('#err_phone').html( "<font color='red'>Please enter only digits.</font>" );
		     $('input[name="phone"]').focus();
		}
	});	

	$('input[name="mobile"]').change(function() {
		$('#err_mobile').html('');
		var mobile = $(this).val();
	    intRegex = /[0-9]+$/;
	    
	    if( mobile.length == '' ) {
		     $('#err_phone').html( "<font color='red'>Please enter mobile number.</font>" );
		     $('input[name="mobile"]').focus();
		}
	    if( mobile.length < 10 ) {
		     $('#err_mobile').html( "<font color='red'>Please enter minimum 10 digits.</font>" );
		     $('input[name="mobile"]').focus();
		   
		}
		if( mobile.length > 15 ) {
		     $('#err_mobile').html( "<font color='red'>Please enter maximum 12 digits.</font>" );
		     $('input[name="mobile"]').focus();
		}
		
		if(!intRegex.test( mobile )) {
		     $('#err_mobile').html( "<font color='red'>Please enter only digits.</font>" );
		     $('input[name="mobile"]').focus();
		}
	});	

	$('input[name="assigned_to[]"]').click( function(){
		$('#err_sel_user').html( '' );
	});
		
});

function validateForm() {

	//validate phone
	var phone = $('input[name="phone"]').val();
    intRegex = /[0-9]+$/;
    
	$('#err_phone').html( '' );
	$('#err_mobile').html( '' );
	$('#err_email').html( '' );
	$('#err_sel_user').html( '' );

	//validate email
	var email = $('input[name="email"]').val();
	
	if( email != '' ){	
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
				if(re.test(email)==false){
					$("#err_email").html( "<font color='red'>Please enter a valid email address.</font>" );
					$('input[name="email"]').focus();
					return false;
			 }
		}	 

	
	if( phone.length < 10 )
	{
	     $('#err_phone').html( "<font color='red'>Please enter minimum 10 digits.</font>" );
	     $('input[name="phone"]').focus();
	     return false;
	}
	if( phone.length > 15 )
	{
	     $('#err_phone').html( "<font color='red'>Please enter maximum 12 digits.</font>" );
	     $('input[name="phone"]').focus();
	     return false;
	}
	if(!intRegex.test(phone))
	{
	     $('#err_phone').html( "<font color='red'>Please enter only digits.</font>" );
	     $('input[name="phone"]').focus();
	     return false;
	}

	var mobile = $('input[name="mobile"]').val();
    intRegex = /[0-9]+$/;

	if( mobile.length < 10 )
	{
	     $('#err_mobile').html( "<font color='red'>Please enter minimum 10 digits.</font>" );
	     $('input[name="mobile"]').focus();
	     return false;
	}
	if( mobile.length > 15 )
	{
	     $('#err_mobile').html( "<font color='red'>Please enter maximum 12 digits.</font>" );
	     $('input[name="mobile"]').focus();
	     return false;
	}
	
	if(!intRegex.test( mobile ))
	{
	     $('#err_mobile').html( "<font color='red'>Please enter only digits.</font>" );
	     $('input[name="mobile"]').focus();
	     return false;
	}
	
	
	if( 'custom_permission' == $("#form_lead input[name='permission']:checked").val() ) {
		
		if ( 0 == $("#form_lead input[name='assigned_to[]']:checked").length ){
			$('#err_sel_user').html( '<font color="red">Please select users.</font>' );
	  		return false;
	 	}
	}	
 	return true;
}
</script>
