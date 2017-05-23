<div class="container vcard-block card wizard-card" data-color="red">
    <div class=" vcard-box">
        <div class="row">
            <div>
                <h1 class="center"> YOUR PAASPORT LIST</h1>
                <h4 class="center" style="color:#8c8c8c">This information will get used to build your PAASPORT.</h4>
            </div>
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                   <!-- <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1default" data-toggle="tab">Basic Information</a></li>
                        <li><a href="#tab2default" data-toggle="tab">Social</a></li>
                        <li><a href="#tab3default" data-toggle="tab">About</a></li>
                        <li><a href="#tab4default" data-toggle="tab">Additional Information</a></li>
                        <li><a href="#tab5default" data-toggle="tab">Lorem Ipsum</a></li>
                    </ul> -->
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
						
						<div class="table-responsive">
						<table class="table preview-table-ex">
							<thead>
								<tr>
									
									<th>First Name</th>
									<th>Last Name</th>
									<th>Contact Number</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php if(!empty($user_data)) { 
								foreach($user_data as $up)
								{
							?>
							<tr>
								 <td><?php echo $up['first_name']; ?></td>
								 <td><?php echo $up['last_name']; ?></td>
								 <td><?php echo $up['mobile']; ?></td>
								 <td><?php echo $up['email']; ?></td>								 
								 <td><a href="<?php echo base_url(); ?>vcard-update/<?php echo $up['id']; ?>" > Edit </a> | <a href="<?php echo base_url(); ?>view/<?php echo $up['slug']; ?>" > View </a> </td>
							</tr>				
							<?php 
								}
							} ?>
								

						  
							<!-- preview content goes here-->
						</table>                                                                      
                         </div>
						
						</div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

<!-- jQuery -->
<script src="<?php echo asset_url(); ?>main_vcard/js/jquery.js"></script>
<script src="<?php echo asset_url(); ?>main_vcard/js/demo.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo asset_url(); ?>main_vcard/js/bootstrap.min.js"></script>
<script src="<?php echo asset_url(); ?>main_vcard/js/form-preview.js"></script>
<script src="<?php echo asset_url(); ?>main_vcard/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<!--Bootstrap Datepicker-->
<script src="<?php echo asset_url(); ?>main_vcard/plugins/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.js"></script>
<!-- custom scrollbar plugin -->
<script src="<?php echo asset_url(); ?>main_vcard/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?php echo asset_url(); ?>main_vcard/js/gsdk-bootstrap-wizard.js"></script>
<script src="<?php echo asset_url(); ?>main_vcard/plugins/ckeditor/ckeditor.js"></script>
<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="<?php echo asset_url(); ?>main_vcard/js/jquery.validate.min.js"></script>
<script>
                                                    jQuery(document).on('click', '.mega-dropdown', function (e) {
                                                        e.stopPropagation()
                                                    })
</script>


									
                 
                                                         