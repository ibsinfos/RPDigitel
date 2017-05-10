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
	<button type="button"  class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url();?>custom/data/data_upload'"> <?= lang('back') ?></button>
   
   </div>
        <div class="table-responsive">

                <table class="table table-striped DataTables " id="DataTables">

                    <thead>

                    <tr>

                        <th><?= lang('campain_format') ?></th>

                       <!--  <th><?= lang('campain_updated_date') ?></th> -->
							 
						<!-- 	 <th><?= lang('campain_no_records') ?></th> -->

                        <th><?= lang('action') ?></th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php

                   

                    if ( true == is_object( $campaign_info ) ):

                        foreach ($campaign_info->result() as $campaign_data) :

                            

                                ?>

							<tr>

								<td><a href="<?= base_url() ?>custom/data/view_data/<?= $allocate ?>/<?= $campaign_data->format_id ?>/<?= $campaign_data->campaign_id ?>"
										   class="text-info">
										   <?php $fields = str_replace('tbl_', ' ', $campaign_data->table_name );
											echo ucwords( str_replace('_', ' ', $fields ) );
                                   			?>
								 </a>
											
								</td>
								<!--  <td></td> -->
							<!-- <td></td> -->
								<td> <?php	
								
									echo btn_view_format('custom/data/campaign_formats/' . $campaign_data->format_id .'/'. $campaign_data->campaign_id ); 
									 ?></td>
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
