<?= message_box('success'); ?>
<?= message_box('error'); ?>
<div class="nav-tabs-custom">

    <!-- Tabs within a box -->

    

    <div class="tab-content no-padding  bg-white">

        <!-- ************** general *************-->

       



            <div class="table-responsive">

                <table class="table table-striped DataTables " id="DataTables">

                    <thead>

                    <tr>

                        <th><?= lang('campain_date') ?></th>

                        <th><?= lang('campain_name') ?></th>

                        <th><?= lang('action') ?></th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php
                    if (!empty($all_deposit_info)):

                        foreach ($all_deposit_info as $v_deposit) :
                                ?>

                                <tr>

                                    <td><?= strftime(config_item('date_format'), strtotime($v_deposit->campaign_date)); ?></td>

                                    <td><?= $v_deposit->campaign_name ?></td>
                                    <td>
										 <?php /* echo btn_upload('custom/data/upload_campaign_file/' . $v_deposit->campaign_id); */
										 echo btn_view_list('custom/data/campaign_list/allocate/' . $v_deposit->campaign_id);
										 ?>
									</td>
                                </tr>
                                <?php
                        endforeach;

                    endif;

                    ?>
                    </tbody>

                </table>

            </div>
      
    </div>

</div>
<script type="text/javascript">
$(document).ready(function() {
    var max_fields      = 30; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap2"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   var y=2;
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment	
            $(wrapper).append('<div class="form-group">'+
				'<label class="col-lg-3 control-label">Column Name '+y+'<span class="text-danger">*</span></label>'+
				'<div class="col-lg-5"><input type="text" name="column_name[]" required class="form-control"/></div>'+
				'<a href="#" class="remove_field signup">Remove</a></div>'); //add input box
            y++;
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
	
	
});
</script>