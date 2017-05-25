<script src="<?php echo base_url(); ?>assets/backend/js/select-all-delete.js"></script> 
<script type="text/javascript">
    function changeStatus(newsletter_id, newsletter_status)
    {
        /* changing the newsletter status*/
        var obj_params = new Object();
        obj_params.newsletter_id = newsletter_id;
        obj_params.newsletter_status = newsletter_status;
        jQuery.post("<?php echo base_url(); ?>backend/newsletter/change-status", obj_params, function (msg) {
            alert(msg.error_message);
            document.location.reload();
        }, "json");
    }
</script>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <?php
        $msg = $this->session->userdata('msg');
        ?>
        <?php if ($msg != '') { ?>
            <div class="msg_box alert alert-success">
                <button type="button" class="close" data-dismiss="alert" id="msg_close" name="msg_close">X</button>
                <?php
                echo $msg;
                $this->session->unset_userdata('msg');
                ?> 
            </div>
            <?php
        }
        ?>  
        <section class="panel">
            <header class="panel-heading">
                Email Templates List               
            </header>

            <div class="panel-body">
                <div class="adv-table">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th>Sr No</th>
                                <th>Plan Name</th>
                                <th>Yearly cost</th>
                                <th>Monthly Cost</th>
                                <th>Onetime cost</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sr = 0;
                            foreach ($arr_price_data as $price) {
                                $sr++;
                                ?>
                                <tr>

                                    <td><?php echo $sr; ?></td>
                                    <td><?php echo $price['plan_name']; ?></td>
                                    <td>$<?php echo $price['yearly_cost']; ?></td>
                                    <td>$<?php echo $price['monthly_cost']; ?></td>
                                    <td>$<?php echo $price['setup_cost']; ?></td>

                                    <td>
                                        <a title="Edit Newsletter Details" href="<?php echo base_url(); ?>backend/pricing-plans/edit/<?php echo $price['plan_id']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a> 

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div
        </section>




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