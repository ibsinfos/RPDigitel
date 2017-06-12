<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Slider</h3>
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
                    <h2>Slider Image List</h2>
					<a href="<?php echo base_url(); ?>add-slider" class="btn btn-success pull-right" >+ Upload Slider Image</a>
                    <!--ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul-->
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

                          <table id="datatable-keytable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>S. No.</th>
                                <th>Image</th>
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
                                <td><img src="<?php echo base_url().$project['image']; ?>" width="15%" height="15%" ></td>                               
                                <td><a href="<?php echo base_url(); ?>edit-slider/<?php echo  $project['id'];?>" >Edit</a> | <a href="<?php echo base_url(); ?>backend/community_slider/delete_slider/<?php echo  $project['id'];?>" >Delete</a></td>
                              </tr>
                              <?php 
							        $i++;  
								 }
							  ?>
                            </tbody>
                          </table>
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
