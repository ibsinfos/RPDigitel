<div class="main">

    <div class="main-inner">

        <div class="container">

            <div class="row">

                <div class="span12">      		

                    <div class="widget ">
                        <span><?php if ($this->session->flashdata('msg') != '') { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                            </div>
                            <?php } ?>
                        </span>
                        <div class="widget-header">
                            <i class="icon-time"></i>
                            <h3>Schedule Task List</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">



                            <div id="Keywords_Search" class="tabbable">
                               




                                <br>

                                <div class="tab-content">


                                        <table class="table table-striped table-bordered">


                                            <thead>
                                                <tr>
                                                    <th> Type </th>
                                                    <th> Scheduled To (EST) </th>
                                                    <th style="width:60px"> Opt-in Lists </th>
                                                    <th> Number </th>
                                                    <th style="width:60px"> Message Preview </th>
                                                    <th> Status </th>
                                                    <th> Recur </th>
                                                    <th> Edit </th>
                                                    <th class="td-actions"> Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($tasklist as $t) {
                                                    $lid = unserialize($t['optin_list']);
                                                    ?>
                                                    <tr>
                                                        <td>Message  </td>
                                                        <td> <?php echo $t['send_time']; ?> </td>
                                                        <td><?php
                                                            if (!empty($lid))
                                                                foreach ($lid as $l) {
                                                                    $optinlist = $this->common_model->getRecords(TABLES::$OPTIN_LIST, 'list_name', array('id' => $l));
                                                                    echo $str =  $optinlist[0]['list_name'].",";
                                                                    
                                                                }
                                                                
                                                            ?>  </td>
                                                        <td><?php echo $t['additional_number']; ?>  </td>
                                                        <td> <?php echo $t['text_body']; ?> </td>

                                                        <td> Active</td>
                                                        <td><?php
                                                        if($t['frequency'] == '1') echo 'Daily'; elseif($t['frequency'] == '2') echo 'Weekly'; elseif($t['frequency'] == '3')
                                                            echo 'Biweekly';elseif($t['frequency'] == '4')echo 'Monthly';elseif($t['frequency'] == '6')echo 'yearly';else echo 'None';
                                                         ?>  </td>
                                                        <td> <a alt="Remove number from this list" href="<?php echo base_url() ?>edit-textmsg/<?php echo encode_url($t['id']) ?>" class="btn btn-small btn-warning"><i class="btn-icon-only icon-edit"> Edit</i></a> </td>
                                                        <td class="td-actions"><a onclick="return confirm('Are you sure to delete?')" href="<?php echo base_url() ?>delete_sendtextsms/<?php echo encode_url($t['id']) ?>" class="btn btn-danger btn-small btn-danger"><i class="btn-icon-only icon-remove"> Delete </i></a></td>
                                                    </tr>
<?php } ?>

                                            </tbody>
                                        </table>
                                 
                                    <?php echo $pagination; ?>


                                    <div class="tab-pane" id="jscontrols">
                                        
                                    </div>

                                </div>

                                <div class="Create_New_Btn">

                                    <!--<a href="#"><button class="btn btn-warning">Refresh</button></a>-->
                                </div>


                            </div>





                        </div> <!-- /widget-content -->

                    </div> <!-- /widget -->

                </div> <!-- /span8 -->




            </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->

<script src="<?php echo asset_url() ?>inner/js/jquery-1.7.2.min.js"></script>