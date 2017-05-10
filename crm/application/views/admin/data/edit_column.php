<?= message_box('success'); ?>
<?= message_box('error'); ?>

<div class="nav-tabs-custom">

    <!-- Tabs within a box -->

    <div class="tab-content no-padding  bg-white">

        <!-- ************** general *************-->

            <form role="form" enctype="multipart/form-data" id="form"

                  action="<?php echo base_url(); ?>custom/data/update_column/<?php echo $formats->id; ?>" method="post" class="form-horizontal ">

		
				 
				<div class="form-group">

                    <label class="col-lg-3 control-label"><?= lang('new_table') ?> <span class="text-danger">*</span></label>
                    
                    <div class="col-lg-5">
                            <input type="text" name="table_name" required class="form-control" value="<?php $fields = str_replace('tbl_', ' ', $formats->table_name );
											echo ucwords( str_replace('_', ' ', $fields ) );
                                   			?>"  disabled />

                    </div>

            </div> 
				
				<div class="form-group">

					<label class="col-lg-3 control-label">Column Name<span class="text-danger">*</span></label>
					
					<div class="col-lg-5">
					<input type="hidden" name="format_id" id="format_id" value="<?php echo $formats->id;?>"  >
							<input type="text" name="column_name" id="column_name"  required class="form-control" maxlength="30" value="<?php echo ucwords( str_replace('_', ' ', $column ) ); ?>" onchange="checkColumn( this.value, this.id );" />
<input type="hidden" name="old_column_name"  class="form-control" value="<?php echo $column; ?>" />
						<div id="column_msg"></div>
					</div>
					
					
            </div> 
				
            <div class="input_fields_wrap2"></div> 
			
                <div class="form-group">

                    <label class="col-lg-3 control-label"></label>

                    <div class="col-lg-5">

                        <button type="submit" class="btn btn-sm btn-primary"><i

                                class="fa fa-check"></i> <?= lang('submit') ?></button>
                                <button type="button"  class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url();?>custom/data/campaign_formats/<?php echo $formats->id; ?>'"> <?= lang('back') ?></button>

                    </div>

                </div>
                
            </form>
    </div>

</div>
<script>
function checkColumn( value, id  ){ 
	
	var format = $("#format_id").val();
	value = value.trim();
	value = value.replace(/\s+/g, " ");
     
	$.ajax({
			url:'<?php echo base_url(); ?>custom/data/checkColumn',
			type:'post',
			data:{'column':value,'format_id':format},
			success:function(data){ 
			   if( 'true' == data ) {
					$("#column_msg").html( '<font color="red">Column name already exists.</font>' );
					
					$( '#'+id ).val('');
					$( '#'+id ).focus();
			   } else {
				   $("#column_msg").html( '' );
			   }
			 
			}
	});
}
</script>
