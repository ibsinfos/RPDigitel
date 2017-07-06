<?= message_box('success'); ?>
<?= message_box('error'); ?>
<style>
.radio label, .checkbox label {
   margin-left: 250px;
   
}
#show_data_length {
	margin-right: 10px !important;
}
</style>
<!-- <div class="nav-tabs-custom" > -->

    <!-- Tabs within a box -->
 <div class="tab-content no-padding  bg-white">
   <div class="form-group">        
 	 <button type="button"  class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url();?>custom/data/view_allocated_formats/<?php echo $campaign_id;?>'"> <?= lang('back') ?></button>
	</div>

        <div class="table-responsive div-scroll">

                <table class="table table-striped" id="show_user_data" style="width:100%">
               		 <thead>
							<tr>
						<?php if (!empty($columns)):
                        foreach( $columns as $column ) :   ?>
                        <th><?php
						if( 'leads_id' == $column ) {
							$column = 'lead status';
						}
                        echo ucwords( str_replace('_', ' ', $column ) );
							 ?></th>
						<?php
                        endforeach;
                    endif;
                   ?>
					 </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
      </div>
  
<script>
$(document).ready(function () {

	$('#show_user_data').DataTable( {
		'paging': true,  // Table pagination
        'ordering': true,  // Column ordering
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        'info': true,  // Bottom left status text
	   	"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
	   	"iDisplayLength": 25,
	    'dom': 'lBfrtip',  // Bottom left status text
	    'columnDefs': [{
	         'targets': -1,
	         'searchable': false,
	         'orderable': false,
	        
	         'className': 'dt-body-center',
	         'render': function (data, type, full, meta){
			//alert( ' data : ' +data+ 'type : ' +type+ 'full : '+full+' meta :'+meta );
	    	 	return ( '0' === data ) ? "<a href='<?php echo base_url() ?>custom/data/create_leads/<?php echo $format_id ?>/<?php echo $campaign_id ?>/"+full[0]+"' class='btn btn-xs btn-purple'>Convert To Lead</a>" : "Converted To Lead";
	           
	         }
	      },
	      { 'targets': -2,
		    	'searchable': false,
			    'orderable': false,
			     'className': 'dt-body-center',
			     'render': function (data, type, full, meta){
					
			    	 return ( null == data ) ? "<a data-toggle='modal' data-target='#myModal' href='<?php echo base_url() ?>custom/data/add_comment/<?php echo $format_id ?>/<?php echo $campaign_id ?>/"+full[0]+"' class='btn btn-xs btn-purple'>Add comment</a>" : "<a data-toggle='modal' data-target='#myModal' href='<?php echo base_url() ?>custom/data/view_comment/<?php echo $format_id ?>/<?php echo $campaign_id ?>/"+full[0]+"' class='btn btn-xs btn-green'>View comment</a>";
			     }
			  }
	      ],
       buttons: [

           {
               extend: 'print',
               text: "<i class='fa fa-print'> </i>",
               className: 'btn btn-danger btn-xs mr'
           },
           {
               extend: 'print',

               text: '<i class="fa fa-print"> </i> &nbsp;selected',
               className: 'btn btn-success mr btn-xs'
           },
           {
               extend: 'excel',
               text: '<i class="fa fa-file-excel-o"> </i>',
               className: 'btn btn-purple mr btn-xs'
           },
           {
               extend: 'csv',
               text: '<i class="fa fa-file-excel-o"> </i>',
               className: 'btn btn-primary mr btn-xs'
           },
           {
               extend: 'pdf',
               text: '<i class="fa fa-file-pdf-o"> </i>',
               className: 'btn btn-info mr btn-xs'
           }
       ],
       "ajax": {
           "url": '<?php echo base_url();?>custom/data/get_user_data/<?php echo $format_id;?>/<?php echo $campaign_id;?>',
           "type": "POST"
       }
	 });	
});
</script>

