<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
                <h3>Featured News</h3>
			</div>
			
			<div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
					</div>
				</div>
			</div>
		</div>
		
		<div class="clearfix"></div>
		
		<div class="row">
			
			
			
			
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_title">
						<h2>Featured News List</h2>
						<a class="btn btn-success pull-right" href="<?php echo base_url(); ?>add_featured_news" >+ Add Featured News</a>
						<div class="clearfix"></div>
					</div>
					<?php 
						if ($this->session->flashdata('news_message')) {
							echo $this->session->flashdata('news_message');
							
						} 
					?>
					<div class="x_content">
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box table-responsive">
									<!--p class="text-muted font-13 m-b-30">
										KeyTable provides Excel like cell navigation on any table. Events (focus, blur, action etc) can be assigned to individual cells, columns, rows or all cells.
									</p-->
									
									<form action="<?php echo base_url();?>featured_news" method="post" >
										<table id="datatable-keytable" class="table table-striped table-bordered">
											<thead>
												<tr>
													<th>S. No.</th>
													<th>Title</th>
													<th>Description</th>
													<th>Created</th>
													<th>Action</th>
												</tr>
											</thead>
											
											
											<tbody>
												
												<?php 
													
													$i=1; 
													foreach($news as $project)
													{
														
													?>
													<tr>
														<td><?php echo $i;?></td>
														<td><?php echo $project['title'];?></td>
														<td><?php echo $project['description'];?></td>
														<td><?php echo date('d F Y',strtotime($project['created']));?></td>
														<td>
														<input type="checkbox"  value="<?php echo $project['id'];?>" id="newsids" name="newsids[]" />
														</td>
													</tr>
													<?php 
														$i++;  
													}
												?>
												
												
											</tbody>
										</table>
										<div class="form-group">
															<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
																<button class="btn btn-primary" type="reset">Reset</button>
																<button type="submit" class="btn btn-success">Delete</button>
															</div>
														</div>
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		</div>
		</div>
		<!-- /page content -->
				