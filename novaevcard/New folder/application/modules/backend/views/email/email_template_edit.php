<?php // echo '<pre>'; print_r($arr_email_template_details['email_template_title']).'SSSSSSS'; die; ?>
<style>
    .danger, .mandatory {
        color: #BD4247;
    }
    .alert{
        padding:8px 0px;
    }
</style>
<script src="<?php echo base_url(); ?>assets/backend/js/jquery.validate.min.js"></script> 
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script type="text/javascript" language="javascript">

            $(document).ready(function () {


                jQuery("#frm_email_template").validate({
                    errorClass: 'danger',
                    rules: {
                        input_subject: {
                            required: true
                        },
                        text_content: {
                            required: true
                        }
                    },
                    messages: {
                        input_subject: {
                            required: "Please enter the email template subject."
                        },
                        text_content: {
                            required: "Please enter the email template content."
                        }
                    },
                    submitHandler: function (form) {

                        if ((jQuery.trim(jQuery("#cke_productdescription iframe").contents().find("body").html())).length < 12)
                        {
                            jQuery("#labelProductError").removeClass("hidden");
                            jQuery("#labelProductError").show();
                        }
                        else {
                            jQuery("#labelProductError").addClass("hidden");
                            form.submit();
                        }
                    },
                    // set this class to error-labels to indicate valid fields
                    success: function (label) {
                        // set &nbsp; as text for IE
                        label.hide();
                    }
                });
                CKEDITOR.replace('productdescription',
                        {
                            filebrowserUploadUrl: '<?php echo base_url(); ?>media/backend/editor-image-upload'
                        });
            });

        </script>

<script>
    function showblock()
    {
        $(".passblock").show();
    }
</script>



 
<style>
    .danger {
        color: #BD4247;
    }
    .alert{
        padding:8px 0px;
    }
</style>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--booking form start-->
        <div class="row">
            
            <div class="col-lg-12">
                <section class="panel">
                    <h3 class="panel-heading">
                       Edit Email Template
                    </h3>
                    <div class="panel-body">
                        <div class=" form">
                            <form class="cmxform form-horizontal tasi-form" name="frm_email_template" id="frm_email_template" action="<?php echo base_url(); ?>backend/edit-email-template/<?php echo(isset($email_template_id)) ? $email_template_id : ''; ?>" method="POST" >
<input type="hidden" name="email_template_hidden_id" id="email_template_hidden_id" value="<?php echo(isset($email_template_id)) ? $email_template_id : ''; ?>">
                                <div class="form-group ">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Title<sup class="mandatory">*</sup> : </label>
                                <div class="col-sm-9">
                                    <input type="text" name="inputTitle" readonly value="<?php echo stripslashes($arr_email_template_details[0]['email_template_title']); ?>" class="form-control" id="inputTitle" size="100"  placeholder="">
                                </div>
                                </div>
                                <div class="form-group ">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Subject<sup class="mandatory">*</sup> : </label>
                                <div class="col-sm-9">
                                    <input type="text" name="input_subject" value="<?php echo stripslashes($arr_email_template_details[0]['email_template_subject']); ?>" class="form-control" id=input_subject"  placeholder="">
                                </div>
                                </div>
                                <div class="form-group ">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Content<sup class="mandatory">*</sup> : </label>
                                <div class="col-sm-9">
                                   <textarea  class="ckeditor" name="text_content" id="productdescription" dir="ltr"  class="cleditor" style="width:100%" ><?php echo set_value('input_content'); ?><?php echo stripslashes($arr_email_template_details[0]['email_template_content']); ?></textarea>
                                    <div class="error hidden" id="labelProductError">Enter Message length should be greater than 12 .</div>
                                </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-5">
                                        <button class="btn btn-danger" type="submit" name="btn_edit" id="btn_edit" >Update</button>
                                        
                               
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    
                </section>
            </div>
        </div>
        <!--booking form end-->
    </section>
</section>

<!--main content end--><!-- js placed at the end of the document so the pages load faster -->   <!--<script src="js/jquery.js"></script>-->
<!--common script for all pages-->
<script type="text/javascript" language="javascript" src="<?php echo asset_url(); ?>backend/assets/advanced-datatable/media/js/jquery.js"></script>
<script src="<?php echo asset_url(); ?>backend/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo asset_url(); ?>backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo asset_url(); ?>backend/js/jquery.scrollTo.min.js"></script>
<!--<script src="<?php echo asset_url(); ?>backend/js/jquery.nicescroll.js" type="text/javascript"></script>-->
<script src="<?php echo asset_url(); ?>backend/js/respond.min.js" ></script>
<script type="text/javascript" language="javascript" src="<?php echo asset_url(); ?>backend/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>


<!--common script for all pages-->
<script src="<?php echo asset_url(); ?>backend/js/common-scripts.js"></script>

<script src="<?php echo asset_url(); ?>backend/js/advanced-form-components.js"></script>

<script type="text/javascript" src="<?php echo asset_url(); ?>backend/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>backend/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script>
    $(document).ready(function () {
        $('#example1').DataTable();
    });
</script>
<script>
    function showblock()
    {
    $(".passblock").show();
    }
</script>