<script type="text/javascript">

    function changeStatus(post_id, post_status)
    {
        /* changing the user status*/
        var obj_params = new Object();
        obj_params.post_id = post_id;
        obj_params.post_status = post_status;
        jQuery.post("<?php echo base_url(); ?>backend/testimonial/changeStatus", obj_params, function (msg) {
            if (msg.error == "1")
            {
                alert(msg.error_message);
            } else
            {
                /* togling the Active and Inactive div of user*/
                if (post_status == '0')
                {
                    $("#inactive_div" + post_id).css('display', 'inline-block');
                    $("#active_div" + post_id).css('display', 'none');
                } else
                {
                    $("#active_div" + post_id).css('display', 'inline-block');
                    $("#inactive_div" + post_id).css('display', 'none');
                }
            }
        }, "json");
    }
</script>







<!-- page content -->
<div class="right_col" role="main">

    <!-- /top tiles -->


    <br />



    <?php
    $msg = $this->session->userdata('msg');
   
    if ($msg != '') {
        ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            <?php echo $msg; ?>
        </div>
    <?php }  $this->session->unset_userdata('msg'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Events List</h2>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" >
                    <thead>
                        <tr role="row">
                            <th>Sr No.</th>
                            <th>Event Name</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>


                    </thead>
                    <tbody>
                        <?php
                        $cnt = 1;
                        if (!empty($event_list)) {
                            foreach ($event_list as $event_list) {
                                ?>
                                <tr>

                                    <td class="worktd"  align="left"><?php echo $cnt++; ?></td>
                                    <td class="worktd"  align="left"><?php echo stripslashes($event_list['event_name']); ?></td>
                                    <td>
                                        <?php echo $event_list['start_date']; ?>
                                       
                                    </td>
                                    <td>
                                         <?php echo $event_list['end_date']; ?>
                                       
                                    </td>
                                    <td class="worktd"  align="left"><?php echo substr($event_list['short_desc'], 0, 30); ?></td>
                                    
                                    <td class="worktd" style="text-align:left">
                                        <a class="btn btn-info btn-xs" title="Event Edit" href="<?php echo base_url(); ?>edit-event/<?php echo $event_list['id']; ?>">
                                            <i class="fa fa-edit"></i>Edit</a>

                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <?php // if (!empty($blog_posts)) {  ?>
                    <!--<input type="submit" id="btn_delete_all" name="btn_delete_all" class="btn btn-danger" onClick="return deleteConfirm();"  value=" Delete Selected">-->
<?php //}  ?>


            </div>
        </div>
    </div>
</div>
<!-- /page content -->