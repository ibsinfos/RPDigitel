<?= message_box('success'); ?>
<?= message_box('error'); ?>
<div class="nav-tabs-custom">

    <!-- Tabs within a box -->

    <ul class="nav nav-tabs">

        <li class="<?= $active == 1 ? 'active' : ''; ?>"><a href="#manage"

                                                            data-toggle="tab"><?= lang('all_campaign') ?></a></li>
    </ul>

    <div class="tab-content no-padding  bg-white">

        <!-- ************** general *************-->

        <div class="tab-pane <?= $active == 1 ? 'active' : ''; ?>" id="manage">

            <div class="table-responsive">

                <table class="table table-striped DataTables " id="DataTables">

                    <thead>

                    <tr>

                        <th><?= lang('campain_date') ?></th>

                        <th><?= lang('campain_name') ?></th>

                        <th><?= lang('action') ?></th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php
                  

                    if (!empty($arrUserCampaigns)):

                        foreach ($arrUserCampaigns as $campaign ) :

                                ?>

                                <tr>

                                    <td><?= strftime(config_item('date_format'), strtotime($campaign['campaign_date'])); ?></td>

                                    <td><?= $campaign['campaign_name']; ?></td>

                                    
                                    <td>
<?php 
										
                                        echo btn_view_list('custom/data/view_allocated_formats/' . $campaign['campaign_id']);
                                       
										
										/*echo btn_view_list('custom/data/view_allocated_data/' . $campaign['campaign_id']);*/
										 ?>
									</td>

                                </tr>
                   

                                <?php

                        endforeach;

                    endif;

                    ?>
	                   </tbody>

                </table>

            </div>

        </div>
    </div>
</div>
