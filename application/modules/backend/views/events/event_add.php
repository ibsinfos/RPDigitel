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
                    <form  id="demo-form2"  class="form-horizontal form-label-left" novalidate action="<?php echo base_url(); ?>backend/event/addEvent"  enctype="multipart/form-data"  method="POST">

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Event Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12"name="inputName"  required="required"  id="name">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Event Image <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input class="form-control col-md-7 col-xs-12" id="img_file" required="required" name="img_file" type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Start Date<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="start_date" type="text" class="form-control" id="single_cal1" aria-describedby="inputSuccess2Status2">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">End Date<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input name="end_date" type="text" class="form-control" id="single_cal2"  aria-describedby="inputSuccess2Status2">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Short Description<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12"name="short_desc"  required="required"  id="name">
                            </div>
                        </div>
                        
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Long Description <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-6 col-xs-12">
                                <textarea class="ckeditor form-control col-md-7 col-xs-12" required="required" data-validate-length-range="5,100" id="productdescription" name="inputPostDescription" ></textarea>
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