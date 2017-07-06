<?= message_box('success'); ?>
<?= message_box('error'); ?>
<style>
.div-left {
	margin-left:298px;
}
#unallocated_length {
	margin-right: 10px !important;
}
#allocated_length {
	margin-right: 10px !important;
}
</style>
<div class="nav-tabs-custom">

    <!-- Tabs within a box -->

    <ul class="nav nav-tabs">

        <li class="<?= $active == 1 ? 'active' : ''; ?>"><a href="#manage"

                                                            data-toggle="tab"><?= lang('unallocated') ?></a></li>

        <li class="<?= $active == 2 ? 'active' : ''; ?>"><a href="#create"

                                                            data-toggle="tab"><?= lang('allocated') ?></a></li>
		 

    </ul>

    <div class="tab-content no-padding  bg-white">

        <!-- ************** general *************-->

        <div class="tab-pane <?= $active == 1 ? 'active' : ''; ?>" id="manage">
			<form role="form" id="form-unallocate" action="<?php echo base_url(); ?>custom/data/assign_data_user/<?= $campaign_id ?>/<?= $format_id ?>" enctype="multipart/form-data" method="post" class="form-horizontal form-groups-bordered">
         			
         		
         	 <div class="table-responsive">
				<div class="form-group" id='unallocate_btn_div'>
				
		         		 <a data-toggle="modal" data-target="#myModal"
                   href="<?= base_url() ?>custom/data/assign_campaign_data/<?= $campaign_id ?>/<?= $format_id ?>/unallocate"
                   class="btn btn-purple pull-left"></i>Allocate Data</a>
		         			<input type="hidden" name="user_id" id="user_id"  >
         					<input type="hidden" name="allocate_id" id="allocate_id"  >
         		

		         	</div>	
		       
                 <table class="table table-striped" id="unallocated" style="width:100%" > 
				
                    <thead>
							<tr>
							<th>
							 	  <div class="mr-sm">
	                          	 	 <input type="checkbox" id="parent_present"  >
	                       	  	 </div>
							 </th>
							<?php if (!empty($columns)):
		                       		 foreach( $columns as $column ) :	
		                       		 	if( 'user' == $column ) {
											$column = 'Data Allocated To';
										}
		                       		 ?>
		                        		<th style="min-width:200px;"><?php echo ucwords( str_replace('_', ' ', $column ) ); ?></th>
									<?php
		                      		 endforeach;
		                    	endif;
		                  	 ?>
		                  	
                  			
							 </tr>
		                    </thead>
		
		                    

               			 </table>
	
					 </div>  
			</form>

        </div>
        <div class="tab-pane <?= $active == 2 ? 'active' : ''; ?>" id="create">
        <form role="form" id="form-allocate" action="<?php echo base_url(); ?>custom/data/assign_data_user/<?= $campaign_id ?>/<?= $format_id ?>" enctype="multipart/form-data" method="post" class="form-horizontal form-groups-bordered">
			
         <div class="table-responsive">
				<div class="form-group" id='allocate_btn_div'>
		         	
		         <a data-toggle="modal" data-target="#myModal"
                   href="<?= base_url() ?>custom/data/assign_campaign_data/<?= $campaign_id ?>/<?= $format_id ?>/allocate"
                   class="btn btn-purple pull-left"></i>Allocate Data</a>
                   
                   <button data-toggle='tooltip' title='Unallocate' data-placement='top' type='button' onclick="<?= base_url() ?>custom/data/assign_campaign_data/<?= $campaign_id ?>/<?= $format_id ?>/allocate"  class='btn btn-green pull-left' id='btn_unallocate'>Unallocate Data</button>
                   
		         				
         			<input type="hidden" name="user_id" id="user_id"  >
         			<input type="hidden" name="allocate_id" id="allocate_id"  >
		         			
		         	</div>	
                 <table class="table table-striped" id="allocated" style="width:100%"> 
				
                    <thead>
							<tr>
							<th>
							 	<div class="mr-sm">
	                          	 	 <input type="checkbox" id="parent_present">
	                       	  	 </div> 
							 </th>
							<?php if (!empty($columns)):
		                       		 foreach( $columns as $column ) :
										if( 'user' == $column ) {
											$column = 'Data Allocated To';
										}
		                       		 ?>
		                        		<th style="min-width:200px;"><?php echo ucwords( str_replace('_', ' ', $column ) ); ?></th>
									<?php
		                      		 endforeach;
		                    	endif;
		                  	 ?>
		                  	
							 </tr>
		                    </thead>
		
		                   

               			 </table>
	
					 </div>  
					 </form>
           
        </div>
		
    </div>

</div>
<script type="text/javascript">
$(document).ready(function() {
	
	if ( 'Unallocated' == $('.wrapper section .content-wrapper .row .col-lg-12 .nav-tabs-custom ul .active a').text() ) {
		
			$('#unallocated').DataTable( {
				'paging': true,  // Table pagination
		         'ordering': true,  // Column ordering
		         "processing": true, //Feature control the processing indicator.
		         "serverSide": true, //Feature control DataTables' server-side processing mode.
		         'info': true,  // Bottom left status text
		        "scrollX": true,
			   	"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
			   	"iDisplayLength": 25,
			    'dom': 'lBfrtip',  // Bottom left status text
			    'columnDefs': [{
			         'targets': 0,
			         'searchable': false,
			         'orderable': false,
			        /* 'width': '1%',*/
			         'className': 'dt-body-left',
			         'render': function (data, type, full, meta){
			    	
			             return '<input type="checkbox" class="child_present" name="selected_id[]" id="'+data+'" value="'+data+'">';
			         }
			      }],
		       
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
		            "url": '<?php echo base_url();?>custom/data/view_get_data/unallocate/<?php echo $format_id;?>/<?php echo $campaign_id;?>',
		            "type": "POST"
		        },
		     
		   });
				   
	 }

	if ( 'Unallocated' == $('.wrapper section .content-wrapper .row .col-lg-12 .nav-tabs-custom ul .active a').text() ) {
		 $('#allocated').DataTable( {
			 'paging': true,  // Table pagination
	         'ordering': true,  // Column ordering
	         "processing": true, //Feature control the processing indicator.
	         "serverSide": true, //Feature control DataTables' server-side processing mode.
	         'info': true,  // Bottom left status text
		       "scrollX": true,
			   	"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
			   	"iDisplayLength": 25,
			    'dom': 'lBfrtip',  // Bottom left status text
			    'columnDefs': [{
			         'targets': 0,
			         'searchable': false,
			         'orderable': false,
			        /* 'width': '1%',*/
			         'className': 'dt-body-left',
			         'render': function (data, type, full, meta){
			             return '<input type="checkbox" class="child_present" name="selected_id[]" id="'+data+'" value="'+data+'"">';
			         }
			      },
			      { 'targets': -1,
			    	'searchable': false,
				    'orderable': false,
				        /* 'width': '1%',*/
				    'className': 'dt-body-left',
				     'render': function (data, type, full, meta, node ){
					  // alert( 'data : '+data+' full : '+full[0]+' meta : '+meta+ ' : node : ' + node );
			             return ( null !== data ) ? "<a href='<?php echo base_url();?>custom/data/assign_campaign_data/<?php echo $campaign_id; ?>/<?php echo $format_id;?>/"+full[0]+"' title='Edit' data-toggle='modal' data-placement='top' data-target='#myModal'>"+data+"</a>" : "";
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
		            "url": '<?php echo base_url();?>custom/data/view_get_data/allocate/<?php echo $format_id;?>/<?php echo $campaign_id;?>',
		            "type": "POST"
		        },
		});
	}	
	 
	 
	 $("#btn_unallocate").click(function(e){ //on add input button click
	       document.getElementById("form-allocate").submit();
	 });

	 $('#form-allocate #parent_present').on('click',function(){
		
	        if(this.checked){
	            $('#form-allocate .child_present').each(function(){
	                this.checked = true;
	            });
	        }else{
	             $('#form-allocate .child_present').each(function(){
	                this.checked = false;
	            });
	        }
	 });

	
			 
	 $('#form-allocate #btn_unallocate').on('click',function( event ){
		 
		 if ( 0 == $("#form-allocate input[type='checkbox']:checked").length){
 			 alert( 'Please select at least one checkbox.');
 			 event.preventDefault();
			 return false;
				
		}
			
	 });
	 
	 $('ul li a').click(function(){ //alert($(this).text());
		 if ( 0 != $("#form-allocate table .dataTables_empty").length){ 
			 $('#form-allocate table .dataTables_empty').hide();

			 if ( 0 == $("#form-allocate table #empty").length){ 
				  var styleNode = document.createElement('div');
				  styleNode.setAttribute("id", "empty");
				  styleNode.setAttribute("type", "text/css");
				  styleNode.setAttribute("style", "width: 700px;text-align:center");
				  styleNode.innerHTML = "No records found.";
				 
				$("#form-allocate table tbody tr").append( styleNode );
			 }
		 }
	});
	 
	/*if ( 0 != $("#form-allocate table .dataTables_empty").length){ 
 		$("#allocate_btn_div").hide();
	} else {
		$("#allocate_btn_div").show();
	}

	if ( 0 != $("#form-unallocate table .dataTables_empty").length){ 
 		$("#unallocate_btn_div").hide();
	} else {
		$("#unallocate_btn_div").show();
	}	*/
		
});

function submitForm() {
	$(document).ready(function() {
		if ( 0 == $("#form-allocate input[type='checkbox']:checked").length ){
			 alert( 'Please select at least one checkbox.');
				return false;
		}
	});
}


</script>