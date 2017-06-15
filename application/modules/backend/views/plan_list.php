<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Plan List</h3>
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
                        <h2>Plan List</h2>
						<a href="<?php echo base_url(); ?>add-plan" class="btn btn-success pull-right" >+ Add New Plan</a>
						
                       <!-- <ul class="nav navbar-right panel_toolbox">
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
                        </ul>-->
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
							
			// echo "<pre>";
			// print_r($plan_list);
			// die();
			
							?>
									
									
									
							
							<table id="datatable-keytable" class="table table-striped table-bordered">
						  
                            <thead>
                              <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>                               
                                <th>Price</th>
                                <th>features</th>
                                <th>Action</th>
                              </tr>
                            </thead>


                            <tbody>
							
							 <?php 
							  
							    $i=1; 
								foreach($plan_list as $plan)
								 {
							 
							 ?>
                              <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $plan->name;?></td>
                                <td><?php echo $plan->price;?></td>
                                <td><?php 
								
								// echo $plan->features;
								$this->load->model('Common_model');
								$features_list = $this->Common_model->getFeatureDetails($plan->features);
												// print_r($features_list);
												$f_count=1;
												foreach($features_list as $feature){
													echo " ".$f_count.") ".$feature->description."  ";
													$f_count++;
													}
									?></td>
                                <td><a href="<?php echo base_url(); ?>edit-plan/<?php echo  $plan->id;?>" >Edit</a> | <a href="<?php echo base_url(); ?>delete-plan/<?php echo  $plan->id;?>" >Delete</a></td>
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
<!-- /page content -->