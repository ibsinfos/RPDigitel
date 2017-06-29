<!-- page content -->
<div class="right_col" role="main">
	<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Product List</h2>
                        <ul class="nav navbar-right panel_toolbox">
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
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    	<!--<div class="row">
                    		<div class="col-md-3">
                    			<select class="form-control">
                                    <option>Select Category</option>
                                    <option>Option1</option>
                    				<option>Option2</option>
                    			</select>
                                <br>
                    		</div>
                    	</div>
						-->
                        <table id="datatable" class="table table-striped table-bordered bulk_action">
	                      <thead>
	                        <tr>
	                          <th><input type="checkbox" id="checkAll"></th>
	                          <!--<th>Product Name</th>
	                          <th>Product Description</th>
	                          <th>Last Ordered</th>
	                          <th>Action</th>-->
							  
							  <th>Application No</th>
	                          <th>user Name</th>
	                          <th>Email</th>
	                          <th>Category</th>
	                          <th>Action</th>
	                        </tr>
	                      </thead>
	                      <tbody>
						  
						  <?php
							  				  foreach($application_list as $application){
							  						  ?>
						  
	                        <tr>
                        	  <td><input type="checkbox"></td>
	                          <td><?php echo $application['id'];?></td>
	                          <td><?php echo $_SESSION['user_account']['name'];?></td>
	                          <td><?php echo $application['business_email'];?></td>
	                          <td><?php echo $application['category'];?></td>
	                          <td>
	                          	<a href="" class="btn btnRed btn-sm">Edit</a>
	                          	<a href="" class="btn btnRed btn-sm">Hide</a>
	                          	<a href="" class="btn btnRed btn-sm">Delete</a>
	                          </td>
	                        </tr>
							
							
							<?php
							  }
							  ?>
							  
						  <?php
							  				  foreach($application_list as $application){
							  						  ?>
						  
	                        <tr>
                        	  <td><input type="checkbox"></td>
	                          <td><?php echo $application['id'];?></td>
	                          <td><?php echo $_SESSION['user_account']['name'];?></td>
	                          <td><?php echo $application['business_email'];?></td>
	                          <td><?php echo $application['category'];?></td>
	                          <td>
	                          	<a href="" class="btn btnRed btn-sm">Edit</a>
	                          	<a href="" class="btn btnRed btn-sm">Hide</a>
	                          	<a href="" class="btn btnRed btn-sm">Delete</a>
	                          </td>
	                        </tr>
							
							
							<?php
							  }
							  ?>
							  
                      	  </tbody>
                    	</table>
                    </div>
                </div>
            </div>
        </div>
</div>
