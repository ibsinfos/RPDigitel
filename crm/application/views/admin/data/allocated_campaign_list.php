<?= message_box('success'); ?>
<style>
.radio label, .checkbox label {
   margin-left: 250px;
   
}
.tab-content .btn-back {
	margin-bottm:2px !important;
}
</style>
<!-- <div class="nav-tabs-custom" > -->

    <!-- Tabs within a box -->
 <div class="tab-content no-padding  bg-white">
  <div class="form-group">     
	<button type="button"  class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url();?>custom/data/view_user_data'"> <?= lang('back') ?></button>
	
   </div> 
        <div class="table-responsive">

                <table class="table table-striped DataTables " id="DataTables">

                    <thead>

                    <tr>

                        <th><?= lang('campain_format') ?></th>

                       
                    </tr>

                    </thead>

                    <tbody>

                    <?php

                   

                    if (!empty($campaign_info)):

                        foreach ($campaign_info as $campaign_data) :

                            

                                ?>

							<tr>

								<td><a href="<?= base_url() ?>custom/data/view_allocated_data/<?= $campaign_data->id ?>/<?= $campaign_id ?>"
										   class="text-info">
										    <?php $fields = str_replace('tbl_', ' ', $campaign_data->table_name );
											echo ucwords( str_replace('_', ' ', $fields ) );
                                   			?>
								</a>
											
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

<!--</div>-->
