<style>
    .danger, .mandatory {
        color: #BD4247;
    }
    .alert{
        padding:8px 0px;
    }
</style> 
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<!-- page content -->
<div class="right_col" role="main"> <!-- top tiles -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Event</small></h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form  id="demo-form2"  class="form-horizontal form-label-left" novalidate action="<?php echo base_url(); ?>backend/event/addEvent/<?php echo $post_id; ?>"  enctype="multipart/form-data"  method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $post_id; ?>" id="edit_id" />
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Event Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $event_data['event_name']?>" name="inputName"  required="required"  id="name">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Event Image <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  dir="ltr"  class="form-control" id="img_file" name="img_file" type="file" accept="image/*" >
                                    <?php if ($event_data["event_image"] != '') { ?>
                                        <input type="hidden" name="old_img_file" id="old_img_file" value="<?php echo stripslashes($event_data["event_image"]); ?>">
                                        <br>
                                        <img width="100" height="100" src="<?php echo base_url(); ?>uploads/events/<?php echo stripslashes($event_data["event_image"]); ?>" id="front_image_tag_id" title="image" > 
                                    <?php } ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Start Date<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="start_date" type="text" class="form-control" value="<?php echo date("m/d/Y",strtotime($event_data['start_date']))?>" id="single_cal1" aria-describedby="inputSuccess2Status2">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">End Date<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input name="end_date" type="text" class="form-control" id="single_cal2" value="<?php echo date("m/d/Y",strtotime($event_data['end_date']))?>"  aria-describedby="inputSuccess2Status2">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Short Description<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="text" class="form-control col-md-7 col-xs-12" name="short_desc"  required="required"  id="name"><?php echo $event_data['short_desc']?></textarea>
                            </div>
                        </div>
                        
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Long Description <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-6 col-xs-12">
                                <textarea class="ckeditor form-control col-md-7 col-xs-12" required="required" id="productdescription" name="inputPostDescription" ><?php echo $event_data['long_desc']?></textarea>
                                <div class="error hidden" id="labelProductError">Enter content length should be greater than 12. </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button id="send" type="submit" class="btn btn-success">Submit</button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end of weather widget -->
</div>
</div>
</div>
</div>


<!-- /page content -->