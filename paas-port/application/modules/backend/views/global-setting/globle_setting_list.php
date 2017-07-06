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
               Global Parameters
               
            </header>
            
            <div class="panel-body">
                <div class="adv-table">
                   <table class="table table-bordered" id="example1">
                            <thead>
                            <th>No.</th>
                            <th>Parameter Name</th>
                            <th>Parameter Value</th>
                            <th>Action</th>
                            </thead>

                            <tbody>
                                <?php
                                $cnt = 1;
                                foreach ($arr_global_settings as $global) {
                                    ?>
                                    <tr class="">
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $global['name']; ?></td>
                                        <td><?php echo $global['value']; ?></td>
                                        <td><a href="<?php echo base_url(); ?>backend/global-settings/edit/<?php echo base64_encode($global['global_id']); ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a> </td>
                                    </tr>
                                    <?php
                                    $cnt++;
                                }
                                ?>
                            </tbody>
                        </table>
                </div>
            </div
        </section>




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
