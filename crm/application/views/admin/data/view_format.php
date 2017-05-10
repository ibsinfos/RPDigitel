<?= message_box('success'); ?>
<?= message_box('error'); ?>
<style>
.radio label, .checkbox label {
   margin-left: 250px;
   
}
</style>
<!-- <div class="nav-tabs-custom" > -->

    <!-- Tabs within a box -->
 <div class="tab-content no-padding  bg-white">
	   
       <div class="form-group">
						<?php if(false == is_null( $campaign_id ) ) { ?>
                        <button type="button"  class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url();?>custom/data/campaign_list/<?php echo $campaign_id;?>'"> <?= lang('back') ?></button>
                        <?php } else { ?>
                        <button type="button"  class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url();?>custom/data/data_upload/active/3'"> <?= lang('back') ?></button>
                        <?php }?>   
                      <?php  if(false == empty( $table_format ) ) {   ?>               
                        <a href="<?php echo base_url() ?>custom/data/exportTable/<?php echo $format_id; ?>"
                                            class="btn btn-sm btn-primary"><i
                            class="fa fa-download"> <?= lang('download_format') ?></i></a>
                       <?php } ?>     
                    </div>
       <div class="table-responsive">
			
                <table class="table table-striped DataTables " id="DataTables">

                    <thead>
							<tr>
                        <th>Sr. No</th>
							  <th>Fields</th>
							  <th><?= lang('action') ?></th>
							</tr>
                    </thead>

                    <tbody>

                    <?php
                    if (!empty($table_format)):
								$counter = 1;
                        foreach ($table_format as $column ) :
                    ?>

							<tr>

								<td><?= $counter; ?></td>
								<td><?php echo ucwords( str_replace('_', ' ', $column ) ); ?></td>
								<td> <?php 
								if( 'comments' != $column ) { ?>
									<?= btn_delete('custom/data/delete_column/' . $format_id .'/' .$column );   ?>
									&nbsp;
							<?php
							echo btn_edit('custom/data/edit_column/' . $format_id .'/' .$column ); 
							 } ?>
								
								
							</td>
								
							</tr>
                         <?php
								$counter++;
                        endforeach;

                    endif;

                    ?>



                    </tbody>

                </table>

            </div>
           

      </div>

			
    </div>

<!--</div>-->
