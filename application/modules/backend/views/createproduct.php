<!-- page content -->
<div class="right_col" role="main">
	<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create Product</h2>
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
                	<div class="row createProductWrap">
                		<div class="col-md-4">
                			<a href="" class="addProductBtn siloSDBtn">
                				<span>Select from SiloSD</span>
                			</a>
                		</div>
                		<div class="col-md-4">
                			<a href="" class="addProductBtn scanDiscBtn">
                				<span>Select from Silo Scandisc</span>
                			</a>
                		</div>
                		<div class="col-md-4">
                			<a href="" class="addProductBtn cloudBtn">
                				<span>Upload files from Cloud</span>
                			</a>
                		</div>
                	</div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
      	<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              	<div class="x_title">
                	<h2>Add Product</h2>
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
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Select Files <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <a href="" class="addFilePopupLink" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></a>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Category</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <select class="form-control">
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                          </select>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                        	<button class="btn btnRed" data-toggle="collapse" data-target="#addCategorycollapse" aria-expanded="false" aria-controls="addCategorycollapse">Add New</button>
                        </div>
                      </div>
                      <div class="collapse form-group" id="addCategorycollapse">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Add Category</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control">
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <button class="btn btnRed">Add</button>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Digital Download</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                        	<label class="radio-inline">
            							  <input type="radio" name="downloadOption" id="inlineRadio1" value="option1" checked> Yes
            							</label>
            							<label class="radio-inline">
            							  <input type="radio" name="downloadOption" id="inlineRadio2" value="option2"> No
            							</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Price <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input class="form-control" required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btnRed" type="submit">Add Product</button>
						  <button class="btn btnRed" type="button">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
            </div>
      	</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade fileSelectModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Files</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-3">
      			<div class="panel panel-default">
      				<input type="checkbox" class="chkBox">
      				<img src="<?php echo backend_asset_url() ?>images/dedicated_server.jpg" class="img-responsive">
      			</div>
      		</div>
      		<div class="col-md-3">
      			<div class="panel panel-default">
      				<input type="checkbox" class="chkBox">
      				<img src="<?php echo backend_asset_url() ?>images/dedicated_server.jpg" class="img-responsive">
      			</div>
      		</div>
      		<div class="col-md-3">
      			<div class="panel panel-default">
      				<input type="checkbox" class="chkBox">
      				<img src="<?php echo backend_asset_url() ?>images/dedicated_server.jpg" class="img-responsive">
      			</div>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btnRed">Save</button>
      </div>
    </div>
  </div>
</div>