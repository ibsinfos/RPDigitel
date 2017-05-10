    
<script type="text/javascript">
    jQuery(document).ready(function(e) {
    jQuery("#frm_edit_global_setting_parameter").validate({
    errorClass: "danger",
            rules: {
            lang_id:{
            required:true
            },
                    value:{
                    required:true
<?php
if ($arr_global_settings['name'] == "site_email" || $arr_global_settings['name'] == "contact_email") {
    echo ",email:true,emailspecialchars:true";
}

if ($arr_global_settings['name'] == "contactus_telephone_number") {
    echo ",number:true";
}
if ($arr_global_settings['name'] == "contactus_company_number") {
    echo ",number:true";
}
if ($arr_global_settings['name'] == "facebook_link") {
    echo ",required:true";
    echo ",url:true";
}
if ($arr_global_settings['name'] == "google_link") {
    echo ",required:true";
    echo ",url:true";
}
if ($arr_global_settings['name'] == "youtube_link") {
    echo ",required:true";
    echo ",url:true";
}
if ($arr_global_settings['name'] == "twitter_link") {
    echo ",required:true";
    echo ",url:true";
}
if ($arr_global_settings['name'] == 'zip_code') {
    echo ",number:true";
    echo ",minlength:3";
    echo ",maxlength:7";
}
if ($arr_global_settings['name'] == 'contact_us_text') {
    echo ",required:true";
}
?>
                    }
            },
            messages:{
            lang_id:{
            required:"Please select language."
            },
                    value:{
<?php
if ($arr_global_settings['name'] == "site_email" || $arr_global_settings['name'] == "contact_email") {
    echo 'required:"Please enter an email address."';
} else if ($arr_global_settings['name'] == "site_title") {
    echo 'required:"Please enter a site title."';
} else if ($arr_global_settings['name'] == "date_format") {
    echo 'required:"Please select a date format."';
} else if ($arr_global_settings['name'] == "contactus_telephone_number") {
    echo 'required:"Please enter telephone number"';
} else if ($arr_global_settings['name'] == "contactus_company_number") {
    echo 'required:"Please enter company number"';
} else if ($arr_global_settings['name'] == "facebook_link") {
    echo 'required:"Please enter facebook link.",';
    echo 'url:"Please enter valid facebook link."';
} else if ($arr_global_settings['name'] == "google_link") {
    echo 'required:"Please enter google link.",';
    echo 'url:"Please enter valid google link."';
} else if ($arr_global_settings['name'] == "twitter_link") {
    echo 'required:"Please enter twitter link.",';
    echo 'url:"Please enter valid twitter link."';
} else if ($arr_global_settings['name'] == "youtube_link") {
    echo 'required:"Please enter youtube link.",';
    echo 'url:"Please enter valid youtube link."';
} else if ($arr_global_settings['name'] == 'address') {
    echo 'required:"Please enter an address."';
} else if ($arr_global_settings['name'] == 'city') {
    echo 'required:"Please enter city."';
} else if ($arr_global_settings['name'] == 'zip_code') {
    echo 'required:"please enter zip code.",';
    echo 'number:"Please enter zip code in numbers only.",';
    echo 'minlength:"Please enter at least 3 numbers long zip code.",';
    echo 'maxlength:"Please enter a only 7 numbers long zip code."';
} else if ($arr_global_settings['name'] == 'state') {
    echo 'required:"Please enter state."';
} else if ($arr_global_settings['name'] == 'country') {
    echo 'required:"Please enter country."';
} else if ($arr_global_settings['name'] == 'country') {
    echo 'required:"Please enter contact us text."';
}

if ($arr_global_settings['name'] == "site_email" || $arr_global_settings['name'] == "contact_mail") {
    echo ',email:"Please enter a valid email address."';
}
?>
                    }
            },
            submitHandler: function (form) {
            if ((jQuery.trim(jQuery("#cke_1_contents iframe").contents().find("body").html())).length < 12)
            {
            jQuery("#labelProductError").removeClass("hidden");
            jQuery("#labelProductError").show();
            }
            else {
            jQuery("#labelProductError").addClass("hidden");
            }
            form.submit();
            }
    });
    jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[A-Z]+$/i.test(value);
    }, "");
    CKEDITOR.replace('its_easy',
    {
    filebrowserUploadUrl: '<?php echo base_url(); ?>media/backend/editor-image-upload'
    });
    });</script>
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
                        Add Remarks
                    </h3>
                    <div class="panel-body">
                        <div class=" form">
                            <form class="cmxform form-horizontal tasi-form" name="frm_edit_global_setting_parameter" id="frm_edit_global_setting_parameter" action="<?php echo base_url(); ?>backend/global-settings/edit/<?php echo $edit_id; ?>" method="POST" enctype="multipart/form-data" >

                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2">Parameter Name</label>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control" readonly="readonly" name="name" id="name" value="<?php echo $arr_global_settings['name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-2">Parameter Value</label>
                                    <div class="col-lg-5">
                                       <?php if ($arr_global_settings['name'] == "date_format") { ?>
                                        <select name="value" id="value" >
                                            <option <?php if ($arr_global_settings['value'] == "Y-m-d") { ?> selected="selected"<?php } ?> value="Y-m-d"><?php echo date("Y-m-d"); ?></option>
                                            <option <?php if ($arr_global_settings['value'] == "Y/m/d") { ?> selected="selected"<?php } ?> value="Y/m/d"><?php echo date("Y/m/d"); ?></option>
                                            <option <?php if ($arr_global_settings['value'] == "Y-m-d H:i:s") { ?> selected="selected"<?php } ?> value="Y-m-d H:i:s"><?php echo date("Y-m-d H:i:s"); ?></option>
                                            <option <?php if ($arr_global_settings['value'] == "Y/m/d H:i:s") { ?> selected="selected"<?php } ?> value="Y/m/d H:i:s"><?php echo date("Y-m-d H:i:s"); ?></option>
                                            <option <?php if ($arr_global_settings['value'] == "F j, Y, g:i a") { ?> selected="selected"<?php } ?> value="F j, Y, g:i a"><?php echo date("F j, Y, g:i a"); ?></option>
                                            <option <?php if ($arr_global_settings['value'] == "m.d.y") { ?> selected="selected"<?php } ?> value="m.d.y"><?php echo date("m.d.y"); ?></option>
                                        </select>	
                                    <?php } else if ($arr_global_settings['name'] == 'site_logo') { ?>
                                        <input type="file" dir="ltr"  class="form-control" name="value" id="value"  /><br>
                                    <?php } else if ($arr_global_settings['name'] == 'address') { ?>
                                        <textarea dir="ltr"  class="form-control" name="value" id="value" ><?php echo $arr_global_settings['value']; ?></textarea>
                                    <?php } else { ?>
                                        <input type="text" dir="ltr"  class="form-control" name="value" id="value" value="<?php echo $arr_global_settings['value']; ?>" />
                                    <?php } ?> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-5">
                                        <button class="btn btn-danger" type="submit" name="btn_edit" id="btn_edit" >Update</button>
                                        
                                <input type="hidden" id="edit_id" name="edit_id" value="<?php echo $edit_id; ?>">
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
