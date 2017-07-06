<div class="panel panel-custom">

    <div class="panel-heading">

        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <h4 class="modal-title" id="myModalLabel"><?= lang('upload_excel_file') ?></h4>

    </div>

    <div class="modal-body wrap-modal wrap">



        <form role="form" id="ban_reason" action="<?php echo base_url(); ?>custom/data/saveCampainFromExcel/<?= $user_id ?>" enctype="multipart/form-data" method="post" class="form-horizontal form-groups-bordered">



            <div class="form-group">            

                <div class="col-sm-12">                         

                   <input type="file"  class="form-control" name="camp_file" id="camp_file" required/>

                </div>

            </div>

            <div class="modal-footer" >

                <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close') ?></button>

                <button type="submit" class="btn btn-primary"><?= lang('save') ?></button>

            </div>

        </form>

    </div>

</div>



<script type="text/javascript">

    // This is only for Image validation 
	var myfile="";

	$('#camp_file').on( 'change', function() { 
	   myfile= $( this ).val();
	   var ext = myfile.split('.').pop();
	   if(ext=="xls" || ext=="xlsx")
		{
			return true;
		} 
		else
		{
		   alert("You can only upload .xls Or .xlsx files");
		   var $el = $('#camp_file');
		   $el.wrap('<form>').closest('form').get(0).reset();
		   $el.unwrap(); 
			return false;
	   }
	});
	

   $(document).ready(function() { 

        $("#ban_reason").validate({

            rules: {

                camp_file: {

                    required: true,

                }

            }

        });

    });
	
	
	
	
	
	</script>

<script src="<?php echo base_url(); ?>asset/js/custom-validation.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>asset/js/jquery.validate.js" type="text/javascript"></script>

