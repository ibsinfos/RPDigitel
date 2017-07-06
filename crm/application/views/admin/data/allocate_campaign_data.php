<?= message_box('success'); ?>
<?= message_box('error'); ?>

<style>

.table{

  margin: 0 auto;

  width: 100%;

  clear: both;

  border-collapse: collapse;

  table-layout: fixed; 

  word-wrap:break-word;

}
</style>
<div class="nav-tabs-custom" > 

    <!-- Tabs within a box -->
 <div class="tab-content no-padding  bg-white">
     <div class="tab-pane <?= $active == 1 ? 'active' : ''; ?>" id="manage">
		<form role="form" id="ban_reason" action="<?php echo base_url(); ?>custom/data/assign_data_user/<?= $campaign_id ?>/<?= $format_id ?>" enctype="multipart/form-data" method="post" class="form-horizontal form-groups-bordered">
			<div>
                    <div class="mailbox-controls">

                        
					     <div class="modal-body wrap-modal wrap">

							<div class="form-group" id="border-none">
                                    <label for="field-1" class="col-sm-3 control-label">Users <span
                                            class="required">*</span></label>
                                    <div class="col-sm-5">
                                        <select name="user" id="user" style="width: 100%" class="select_box" required="">
                                            <?php
                                           // $reporter_info = $this->db->get('tbl_users')get_by->result();
                                            if (!empty($users->result())) {
                                                foreach ($users->result() as $key => $v_reporter) {
                                                    
                                                    ?>
                                                    <option value="<?= $v_reporter->user_id ?>" <?php
                                                    if (!empty($bug_info->reporter)) {
                                                        echo $v_reporter->user_id == $bug_info->reporter ? 'selected' : '';
                                                    }
                                                    ?>><?= $v_reporter->username?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
									<button type="submit" class="btn btn-primary"><?= lang('save') ?></button>
                      </div>
					  <!-- Check all button -->
                        
      

							</div>
								
                    </div>
					
                      
                </div>
          
				<div class="table-responsive">
				
                 <table class="table table-striped" id="mytable" > 
				<!--<table id="DataTables" class="display nowrap" cellspacing="0" width="100%"> -->
                    <thead>
							<tr>
							<th><!--<input class="child_present" type="checkbox" name="selected_id[]"
									  id="selectAll" value=""/> -->
							 	 <div class="mr-sm">
	                          	 	 <input type="checkbox" id="parent_present">
	                       	  	 </div>
							 </th>
							<?php if (!empty($columns)):
		                       		 foreach( $columns as $column ) :	?>
		                        		<th><?php echo $column; ?></th>
									<?php
		                      		 endforeach;
		                    	endif;
		                  	 ?>
		                  	
                  			
							 </tr>
		                    </thead>
		
		                    <tbody>

			                  <?php
			                    if (!empty($campaign_data)):
			
			                        foreach ($campaign_data as $campaign ) :
			                    ?>
									<tr>
										<td><input class="child_present" type="checkbox" name="selected_id[]" id="<?php echo $campaign->id; ?>" value="<?php echo $campaign->id; ?>"
									<?php if( false == empty( $campaign->user ) ){ echo 'disabled="disabled"';}?>
									/></td>
									<?php foreach ($campaign as $key => $value ) :   ?>	
										<td><?= $value; ?></td>
										
			                         <?php
											endforeach; ?>
									</tr>
			                        <?php endforeach;
			
			                    endif;
			
			                    ?>
			
			                    </tbody>

               			 </table>
	
					 </div>  
           </form>
			</div>
		 
 </div>

			
    </div>
	<script>
	/*$(document).ready(function() {
		$('#selectAll').click(function(e){
			var table= $(e.target).closest('table');
			$('td input:checkbox',table).attr('checked',e.target.checked);
		});
  });*/

  $(document).ready(function() {
     $('#mytable').DataTable( {
            "scrollX": true,
           "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
           "iDisplayLength": 25
 	} ); 
	      
    $('form').on('submit', function (e) {
	 	   
   		if ( 0 == $("input[type='checkbox']:checked").length){
        	  alert( 'Please select at least one checkbox.');
   	   		return false;
       }
	    
	 });
	    
  });
	
 
  </script>

