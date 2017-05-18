<div class="main">
    <div class="main-inner">
		<div class="container">
			<div class="row">
				<!-- /span6 -->
				<div class="span12">
					<!-- /widget -->
					<!-- /widget -->
					<div class="widget widget-table action-table">
						<span>
							<?php if ($this->session->flashdata('msg') != '') { ?>
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>
									<?php echo $this->session->flashdata('msg'); ?>
								</strong>
							</div>
							<?php } ?>
						</span>
						<div class="widget-header">
							<i class="icon-th-list"></i>
							<h3>Auto Responders</h3>
						</div>
						<!-- /widget-header -->
						<div class="widget-content">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th> ID </th>
										<th> NAME </th>
										<th> OPT IN LIST </th>
										<th> DATE CREATED </th>
										<th> MORE </th>
									</tr>
								</thead>
								<tbody>
									<?php     
                                    $sr = 1;   
                                    foreach ($auto_data as $data) {  
                                        $optinlist = $this->common_model->getRecords(TABLES::$OPTIN_LIST,'list_name',array('id'=>$data['optin_list_id']));
                                    ?>
									<tr>
										<td>
											<?php echo $sr++ ?>
										</td>
										<td>
											<?php echo $data['auroresponder_name'] ?>
										</td>
										<td>
											<?php echo $optinlist[0]['list_name']; ?>
										</td>
										<td>
											<?php echo $data['created_time'] ?>
										</td>
										<td class="">
											<a alt="Remove number from this list" href="
												<?php echo base_url() ?>edit-auto-responder/
												<?php echo encode_url($data['id']) ?>" class="btn btn-small btn-warning">
												<i class="btn-icon-only icon-edit"> Edit</i>
											</a>
											<a href="
												<?php echo base_url() ?>delete-auto-responder/
												<?php echo encode_url($data['id']) ?>" class="btn btn-danger btn-small btn-danger" onclick="return confirm('Are you sure to delete?')">
												<i class="btn-icon-only icon-remove"> Delete </i>
											</a>
											<!--<a href="
											<?php echo base_url() ?>view-auto-responder/
											<?php echo encode_url($data['id']) ?>" class="btn btn-danger btn-small btn-success"><i class="btn-icon-only icon-user"> View </i></a>-->
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<?php echo $pagination; ?>
						<div class="Create_New_Btn">
							<a href="
								<?php echo base_url() ?>new-autoresponder">
								<button class="btn btn-warning">CREATE NEW</button>
							</a>
						</div>
						<!-- /widget-content -->
					</div>
					<!-- /widget -->
					<!-- /widget -->
				</div>
				<!-- /span6 -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /main-inner -->
</div>
<script src="
	<?php echo asset_url() ?>inner/js/jquery-1.7.2.min.js">
</script>
<!-- /main -->