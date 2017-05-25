<?php // echo '<pre>'; print_r($arr_email_template_details['email_template_title']).'SSSSSSS'; die;             ?>

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

                } else {

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




                    <span class="frmerror"></span>

                    <h3 class="panel-heading">

                        Add User

                    </h3>



                    <div class="panel-body">

                        <div class=" form">

                            <form class="cmxform form-horizontal tasi-form" id="frmstep-1" enctype="multipart/form-data" name="frm_email_template"  action="<?php echo base_url(); ?>backend/users/updateDefaultContent" method="POST" >

                                <div class="form-group ">

                                    <label for="inputEmail3" class="col-sm-2 control-label">Company Name<sup class="mandatory">*</sup> : </label>

                                    <div class="col-sm-6">

                                        <input type="text" name="company_name" required  value="<?php echo $data[0]['company_name'] ?>" class="form-control" id="inputTitle" size="100"  placeholder="">
                                        <input type="hidden" value="<?php echo $data[0]['id'] ?>" name="edit_id">
                                    </div>

                                </div>
                                <div class="form-group ">

                                    <label for="inputEmail3" class="col-sm-2 control-label">Company Logo<sup class="mandatory">*</sup> : </label>

                                    <div class="col-sm-6">

                                        <input type="file" name="company_logo"  class="form-control" id=input_subject"  placeholder="">
                                        <img src="<?php echo $data[0]['company_logo'] ?>">
                                        <input type="hidden" value="<?php echo $data[0]['company_logo'] ?>" name="company_logo_old">
                                    </div>

                                </div>
                                <div class="form-group ">

                                    <label for="inputEmail3" class="col-sm-2 control-label">User Image<sup class="mandatory">*</sup> : </label>

                                    <div class="col-sm-6">

                                        <input type="file"  name="user_image" class="form-control" id=input_subject"  placeholder="">
                                        <img style="width:30%" src="<?php echo $data[0]['user_image'] ?>">
                                        <input type="hidden" value="<?php echo $data[0]['user_image'] ?>" name="user_image_old">
                                    </div>

                                </div>


                                <div class="form-group ">

                                    <label for="inputEmail3" class="col-sm-2 control-label">Job Title<sup class="mandatory">*</sup> : </label>

                                    <div class="col-sm-6">

                                        <input type="text" name="job_title" required="required" value="<?php echo $data[0]['job_title'] ?>" class="form-control" id=input_subject"  placeholder="">

                                    </div>

                                </div>

                                <div class="form-group ">

                                    <label for="inputEmail3" class="col-sm-2 control-label">Work Phone<sup class="mandatory">*</sup> : </label>

                                    <div class="col-sm-6">

                                        <input type="text" name="work_phone"  required="required" value="<?php echo $data[0]['work_phone'] ?>" class="form-control" id=input_subject"  placeholder="">

                                    </div>

                                </div>

                                <div class="form-group ">

                                    <label for="inputEmail3" class="col-sm-2 control-label">Why Choose Image<sup class="mandatory">*</sup> : </label>

                                    <div class="col-sm-6">

                                        <input type="file" name="why_choose_image" class="form-control">
                                        <img src="<?php echo $data[0]['why_choose_image'] ?>">
                                        <input type="hidden" value="<?php echo $data[0]['why_choose_image'] ?>" name="why_choose_image_old">

                                    </div>

                                </div>
                                <div class="form-group ">

                                    <label for="inputEmail3" class="col-sm-2 control-label">Why Choose Video<sup class="mandatory">*</sup> : </label>

                                    <div class="col-sm-6">

                                        <input type="file" name="why_choose_video"  class="form-control">
                                        <video width="320" height="240" controls>
                                            <source src="<?php echo $data[0]['why_choose_video'] ?>" type="video/mp4">
                                            <source src="<?php echo $data[0]['why_choose_video'] ?>" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                        <input type="hidden" value="<?php echo $data[0]['why_choose_video'] ?>" name="why_choose_video_old">
                                    </div>

                                </div>
                                <div class="form-group ">

                                    <label for="inputEmail3" class="col-sm-2 control-label">Why Choose Description<sup class="mandatory">*</sup> : </label>

                                    <div class="col-sm-6">

                                        <textarea name="why_choose_desc"  class="form-control" ><?php echo $data[0]['why_choose_desc'] ?></textarea>

                                    </div>

                                </div>
                                <div class="form-group ">

                                    <label for="inputEmail3" class="col-sm-2 control-label">Business Opportunity Video<sup class="mandatory">*</sup> : </label>

                                    <div class="col-sm-6">

                                        <input type="file" name="business_opportunity_video" class="form-control">
                                        <video width="320" height="240" controls>
                                            <source src="<?php echo $data[0]['business_opportunity_video'] ?>" type="video/mp4">
                                            <source src="<?php echo $data[0]['business_opportunity_video'] ?>" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                        <input type="hidden" value="<?php echo $data[0]['business_opportunity_video'] ?>" name="business_opportunity_video_old">
                                    </div>

                                </div>


                                <div class="form-group ">

                                    <label for="inputEmail3" class="col-sm-2 control-label">Product Page URL<sup class="mandatory">*</sup> : </label>

                                    <div class="col-sm-6">

                                        <input type="text" name="product_page_url" required="required" class="form-control" value="<?php echo $data[0]['product_page_url'] ?>" id=input_subject"  placeholder="">

                                    </div>

                                </div>
                                <div class="form-group ">

                                    <label for="inputEmail3" class="col-sm-2 control-label">Increase your credit description<sup class="mandatory">*</sup> : </label>

                                    <div class="col-sm-6">

                                        <textarea name="increase_your_credit_desc" required="required" class="form-control" ><?php echo $data[0]['increase_your_credit_desc'] ?></textarea>

                                    </div>

                                </div>

                                <div class="form-group ">

                                    <label for="inputEmail3" class="col-sm-2 control-label">Tabs<sup class="mandatory">*</sup> : </label>

                                    <div class="col-sm-6">
                                        <?php foreach (unserialize($data[0]['tabs']) as $tab) { ?>
                                        <input type="text" class="form-control" name="tabs[]" value="<?php echo  $tab;?>"><br>
<!--                                            <input type="text" class="form-control" name="tabs[]" value="What Is Novae powered by myEcon?"><br>
                                            <input type="text" class="form-control" name="tabs[]" value="What is Income Shifting ?"><br>
                                            <input type="text" class="form-control" name="tabs[]" value="Full Novae Business Overview"><br>
                                            <input type="text" class="form-control" name="tabs[]" value="Get More Information"><br>
                                            <input type="text" class="form-control" name="tabs[]" value="Increase Your Credit"><br>
                                            <input type="text" class="form-control" name="tabs[]" value="Contact Me Today"><br>-->
                                        <?php } ?>

                                    </div>

                                </div>










                                <div class="form-group">

                                    <div class="col-lg-offset-2 col-lg-5">

                                        <button class="btn btn-danger" type="button" name="btn_edit" id="updateinfo" >Update</button>





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
        $('#updateinfo').on('click', function (e) {
            e.preventDefault();
            $('#updateinfo').attr('disabled', true);
            $('#updateinfo').html('Updating data...');
            var url = "<?php echo base_url() ?>backend/users/updateDefaultContents"; // the script where you handle the form input.

            var formData = new FormData($("#frmstep-1")[0]);
//alert(formData);
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: "multipart/form-data",
                dataType: 'json',
                success: function (data)
                {
                    //alert(data);
                    $('#updateinfo').attr('disabled', false);
                    $('#updateinfo').html('Update');
                    if (data.status === 1) {

                        $(".frmerror").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                        $("html, body").animate({
                            scrollTop: 0
                        }, 600);
                        return true;
                    } else {
                        $(".frmerror").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                        $("html, body").animate({
                            scrollTop: 0
                        }, 600);
                        return false;
                    }
                }
            });

        });







    });
</script>


