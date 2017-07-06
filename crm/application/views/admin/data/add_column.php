<?= message_box('success'); ?>
<?= message_box('error'); ?>
<div class="nav-tabs-custom">

    <!-- Tabs within a box -->

    <div class="tab-content no-padding  bg-white">

        <!-- ************** general *************-->

            <form role="form" enctype="multipart/form-data" id="form"

                  action="<?php echo base_url(); ?>custom/data/save_column/<?php echo $formats->id; ?>" method="post" class="form-horizontal" onSubmit="return findDuplicates();">

			
				 
				<div class="form-group">

                    <label class="col-lg-3 control-label"><?= lang('new_table') ?> <span class="text-danger">*</span></label>
                    
                    <div class="col-lg-5">
                            <input type="text" name="table_name" required class="form-control" value="<?php $fields = str_replace('tbl_', ' ', $formats->table_name );
											echo ucwords( str_replace('_', ' ', $fields ) );
                                   			?>"  disabled />

                    </div>

            </div> 
				<div class="form-group">
					<label class="col-lg-3 control-label">Add Table Columns</label><div id="column_msg"></div>
				</div> 
				<div class="form-group">

					<label class="col-lg-3 control-label">Column Name 1 <span class="text-danger">*</span></label>
					
					<div class="col-lg-5">
							<input type="text" name="column_name[]" id="column_name1"  required class="form-control" onchange="myFunction( this.value, this.id );"/>
								
					</div>
					
					<span data-placement="top" data-toggle="tooltip"
                                          title="<?= lang('add_more') ?>">
                                            <a href="javascript:void(0);"
                                               class="add_field_button signup text-default ml"><i class="fa fa-plus"></i>&nbsp Add More</a>
                                                </span>
            </div> 
				
            <div class="input_fields_wrap2"></div> 
			
                <div class="form-group">

                    <label class="col-lg-3 control-label"></label>

                    <div class="col-lg-5">

                        <button type="submit" class="btn btn-sm btn-primary"><i

                                class="fa fa-check"></i> <?= lang('submit') ?></button>
								 <input type="hidden" name="format_id" id="format_id" value="<?php echo $format_id;?>"  >
								 <input type="hidden" name="return_result" id="return_result" value=""  >
                                <button type="button"  class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url();?>custom/data/data_upload/active/3'"> <?= lang('back') ?></button>

                    </div>

                </div>
                
            </form>
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
				'<div class="col-lg-5"><input type="text" name="column_name[]" required class="form-control" id="column_name'+y+'" onchange="myFunction( this.value, this.id );" /></div>'+
            '<a href="#" class="remove_field signup remCF"><i class="fa fa-times"></i>&nbsp;Remove</a></div>');
            y++;
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
	
	
});


function findDuplicatesColumn() {

	
	var format = $("#format_id").val();
	
	$.ajax({
			url:'<?php echo base_url(); ?>custom/data/checkColumn',
			type:'post',
			data:{'column':this.value,'format_id':format},
			success:function(data ){ 
				
				return data;
			 
			}
	});
}

function findDuplicates() {

    var isDuplicate = false;
    $("input[name^='column_name[]']").each(function (i,el1) {
        var current_val = $(el1).val();
        current_val = current_val.trim();
        current_val = current_val.replace(/\s+/g, " ");
        if (current_val != "") {
            $("input[name^='column_name[]']").each(function (i,el2) {
                var next_val = $(el2).val();
                next_val = next_val.trim();
                next_val = next_val.replace(/\s+/g, " ");
                
                if (next_val == current_val && $(el1).attr("id") != $(el2).attr("id") ) {
                    isDuplicate = true;
                    return;
                }
            });
        }
    });
    if (isDuplicate) {
    	$("#column_msg").html( '<font color="red">Duplicate column names found.</font>' );
        return false;
    } else {
    	$("#column_msg").html( '' );
        return true;
    }
}

function myFunction( value, id  ){ 
	
var format = $("#format_id").val();

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
</script>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   