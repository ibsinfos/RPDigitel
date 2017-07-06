<?= message_box('success'); ?>
<?= message_box('error'); ?>
<style>
.radio label, .checkbox label {
   margin-left: 250px;
}
.download-div {
 	margin-left:294px;
}
</style>
<div class="nav-tabs-custom" >

    <!-- Tabs within a box -->
 <div class="tab-content no-padding  bg-white">
       

        <li class="<?= $active == 1 ? 'active' : ''; ?>"><a href="#manage"
		
                                                            data-toggle="tab"><?= lang('select_format') ?></a></li>
																
            <form role="form" enctype="multipart/form-data" id="form"

                  action="<?php echo base_url(); ?>custom/data/saveCampainFromExcel/<?php echo $campaign_id;?>" method="post" class="form-horizontal ">

                <div class="form-group">

                  
						<div class="form-group">
						<div class="modal-body wrap-modal wrap">

							<div class="form-group" id="border-none">
                                    <label for="field-1" class="col-sm-3 control-label">Select Format <span
                                            class="required">*</span></label>
							<div class="col-sm-5">
                             <select name="format_type" id="format_type" style="width: 100%" class="select_box" required="">
                             <?php
                                         
						 		if (!empty($formats)):

                      				 foreach ($formats as $format ) :
								?>
                                                    <option value="<?= $format->id; ?>" <?php
                                                    if ( '1' == $format->id ) {
                                                        echo 'selected="selected"';
                                                    }
                                                  
                                                    ?>><?php $fields = str_replace('tbl_', ' ', $format->table_name );
											echo ucwords( str_replace('_', ' ', $fields ) );
                                   			?></option>
                                                   <?php
			                        endforeach;
			
			                    endif;
			
			                    ?>
                               </select>
                         	</div>
                         	<?php echo btn_create('custom/data/data_upload/active/3');
										 ?>
                         </div>
                         </div><div class="download-div"><a id="link" href="<?php echo base_url();?>custom/data/exportTable/1">Download Format</a></div>
                         </div>
					  <div class="form-group">
	                    <label for="field-1" class="col-sm-3 control-label">
	                        <?= lang('choose_file') ?><span class="required">*</span></label>
	                        
	                    <div class="col-sm-5">
	                        <div style="display: inherit;margin-bottom: inherit" class="fileinput fileinput-new"
	                             data-provides="fileinput">
	                    <span class="btn btn-default btn-file"><span
	                            class="fileinput-new"><?= lang('select_file') ?></span>
										<span class="fileinput-exists"><?= lang('change') ?></span>
										<input type="file" name="camp_file" id="camp_file"  >
										</span>
	                            <span class="fileinput-filename"></span>
	                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput"
	                               style="float: none;">&times;</a>
	                        </div>
	                         
	                    </div>
	                    
                </div>
              
                <div class="form-group">

                    <label class="col-lg-3 "></label>

                    <div class="col-lg-5">

                        <button type="submit" class="btn btn-sm btn-primary"><i

                                class="fa fa-check"></i> <?= lang('submit') ?></button>
                        <button type="button" class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url();?>custom/data/data_upload'"> <?= lang('back') ?></button>

                    </div>

                </div>

            </form>

      </div>

			
    </div>

</div>
<script>
$(document).ready(function() {
    $('#format_type').on('change' , function() {
        var $anchor = $('#link');
        var currVal = $(this).find('option:selected').val();
        var  url = "<?php echo base_url()?>";
       // alert('Old href is : ' + $anchor.attr('href'));
        $anchor.attr('href' , url+ "custom/data/exportTable/" + currVal);
      
        
    });
});
</script>