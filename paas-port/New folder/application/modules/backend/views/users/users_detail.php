<?php // echo '<pre>'; print_r($arr_email_template_details['email_template_title']).'SSSSSSS'; die;       ?>
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
          <section class="wrapper site-min-height">
             
              <div class="row">
                  <div class="col-md-12">
                      <section class="panel">
                          <div class="bio-graph-heading project-heading">
                              <strong> User Details</strong>
                          </div>
                          <div class="panel-body bio-graph-info">
                              <!--<h1>New Dashboard BS3 </h1>-->
                              <div class="row p-details">
                                  <div class="bio-row">
                                      <p><span class="bold">Full Name </span>: <?php echo $arr_user_data[0]['first_name']." ".$arr_user_data[0]['last_name'];?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Nick Name </span>: <?php echo $arr_user_data[0]['nick_name']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Email </span>: <?php echo $arr_user_data[0]['email']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Mobile </span>: <?php echo $arr_user_data[0]['mobile']?></p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span class="bold">Gender </span>: <?php echo $arr_user_data[0]['gender']?></p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span class="bold">Birthday </span>: <?php echo $arr_user_data[0]['birthday']?></p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span class="bold">Anniversary </span>: <?php echo $arr_user_data[0]['anniversary']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Referred By</span>: <?php echo $arr_user_data[0]['reffered_by']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Source </span>: <?php echo $arr_user_data[0]['source']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Company Name </span>: <?php echo $arr_user_data[0]['company_name']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Job Title </span>: <?php echo $arr_user_data[0]['job_title']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Work Phone No </span>: <?php echo $arr_user_data[0]['work_phone']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Work Website </span>: <?php echo $arr_user_data[0]['work_website']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Work Address </span>: <?php echo $arr_user_data[0]['work_address']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Work Postal code </span>: <?php echo $arr_user_data[0]['work_postal_code']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Home Address</span>: <?php echo $arr_user_data[0]['home_address']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Home postal code</span>: <?php echo $arr_user_data[0]['home_postal_code']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Facebook Link</span>: <?php echo $arr_user_data[0]['facebook_link']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Twitter Link</span>: <?php echo $arr_user_data[0]['twitter_link']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Linkedin Link</span>: <?php echo $arr_user_data[0]['linkedin_link']?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span class="bold">Last Visit date</span>: <b><?php if($arr_user_data[0]['last_visit_date'] == NULL) echo "Not visited";else echo date("d F Y H:i a",strtotime($arr_user_data[0]['last_visit_date'])); ?></b></p>
                                  </div>
                                  

                                  
                              </div>

                          </div>

                      </section>

<!--                      <section class="panel">
                        <header class="panel-heading">
                          Last Activity
                        </header>
                        <div class="panel-body">
                            <table class="table table-hover p-table">
                          <thead>
                          <tr>
                              <th>Title</th>
                              <th>Start Time</th>
                              <th>End Time</th>
                              <th>Commnets</th>
                              <th>Status</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <td>
                                  Project analysis
                              </td>
                              <td>
                                 18/11/2014 9:28:23
                              </td>
                              <td>
                                  28/11/2014 12:23:03
                              </td>
                              <td>
                                   Ipsum is that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                              </td>
                              <td>
                                  <span class="label label-info">Completed</span>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Requirement Collection
                              </td>
                              <td>
                                  10/11/2014 9:28:23
                              </td>
                              <td>
                                  22/11/2014 12:23:03
                              </td>
                              <td>
                                  Tawseef Ipsum is that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                              </td>
                              <td>
                                  <span class="label label-info">Reported</span>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Design Implement
                              </td>
                              <td>
                                  18/11/2014 9:28:23
                              </td>
                              <td>
                                  28/11/2014 12:23:03
                              </td>
                              <td>
                                  Dism Ipsum is that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                              </td>
                              <td>
                                  <span class="label label-info">Accepted</span>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Widget Management
                              </td>
                              <td>
                                  18/11/2014 9:28:23
                              </td>
                              <td>
                                  28/11/2014 12:23:03
                              </td>
                              <td>
                                  Cosm Ipsum is that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                              </td>
                              <td>
                                  <span class="label label-info">Completed</span>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Contact Info
                              </td>
                              <td>
                                  18/11/2014 9:28:23
                              </td>
                              <td>
                                  28/11/2014 12:23:03
                              </td>
                              <td>
                                  Hello that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                              </td>
                              <td>
                                  <span class="label label-info">Sent</span>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Project analysis
                              </td>
                              <td>
                                  18/11/2014 9:28:23
                              </td>
                              <td>
                                  28/11/2014 12:23:03
                              </td>
                              <td>
                                   Ipsum is that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                              </td>
                              <td>
                                  <span class="label label-info">Completed</span>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Project analysis
                              </td>
                              <td>
                                  18/11/2014 9:28:23
                              </td>
                              <td>
                                  28/11/2014 12:23:03
                              </td>
                              <td>
                                  Orem psum is that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                              </td>
                              <td>
                                  <span class="label label-info">Completed</span>
                              </td>
                          </tr>
                          </tbody>
                          </table>
                        </div>
                      </section>-->

                  </div>
<!--                  <div class="col-md-4">
                      <section class="panel">
                          <header class="panel-heading">
                              Projects Description
                          </header>

                          <div class="panel-body">
                              <a href="#"><img src="img/email-img/vector-lab.jpg" alt=""></a>

                              <p>
                                  Sometimes the simplest things are the hardest to find. I imagined a line of my favorite pieces, the things i would live in every day, all year round. So I stopped looking and started designing. Sometimes the simplest things are the hardest to find. Sometimes the simplest things are the hardest to find. I imagined a line of my favorite pieces, the things i would live in every day, all year round. So I stopped looking and started designing. Sometimes the simplest things are the hardest to find.
                              </p>
                              <br>
                              <h5 class="bold">Priority</h5>
                              <ul class="nav nav-pills nav-stacked labels-info ">
                                  <li><i class=" fa fa-circle text-danger"></i> High Priority<p></p></li>
                              </ul>

                              <br>
                              <h5 class="bold">Project files</h5>
                              <ul class="list-unstyled p-files">
                                  <li><a href=""><i class="fa fa-file-text"></i> Project-document.docx</a></li>
                                  <li><a href=""><i class="fa fa-picture-o"></i> Logo-company.jpg</a></li>
                                  <li><a href=""><i class="fa fa-mail-forward"></i> Email-from-flatbal.mln</a></li>
                                  <li><a href=""><i class="fa fa-file"></i> Contract-10_12_2014.docx</a></li>
                              </ul>
                              <br>

                              <h5 class="bold">Project Tags</h5>
                              <ul class="p-tag-list">
                                  <li><a href=""><i class="fa fa-tag"></i> Dlor</a></li>
                                  <li><a href=""><i class="fa fa-tag"></i> Lorem ipsum</a></li>
                                  <li><a href=""><i class="fa fa-tag"></i> Google</a></li>
                                  <li><a href=""><i class="fa fa-tag"></i> Excellent</a></li>
                                  <li><a href=""><i class="fa fa-tag"></i> Dlor</a></li>
                                  <li><a href=""><i class="fa fa-tag"></i> Lorem ipsum</a></li>
                                  <li><a href=""><i class="fa fa-tag"></i> Google</a></li>
                                  <li><a href=""><i class="fa fa-tag"></i> Excellent</a></li>
                              </ul>

                              <div class="text-center mtop20">
                                  <a href="#" class="btn btn-sm btn-primary">Add files</a>
                                  <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                              </div>
                          </div>

                      </section>
                  </div>-->
              </div>
              <!-- page end-->
          </section>
      </section>
<!--main content end-->


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

