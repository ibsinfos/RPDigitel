<!-- page content -->
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Calendar Events <small>Sessions</small></h2>
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
					<div class="responsiveSection">
						<div id='calendar'></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- calendar modal -->
<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
			</div>
			<div class="modal-body">
				<div id="testmodal">
					<form id="antoform" class="form-horizontal calender" role="form">
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label">Title</label>
							<div class="col-xs-12 col-sm-9">
								<input type="text" class="form-control" id="title" name="title">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label">Description</label>
							<div class="col-xs-12 col-sm-9">
								<textarea class="form-control" rows="5" id="descr" name="descr"></textarea>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btnRed antosubmit">Save</button>
			</div>
		</div>
	</div>
</div>
<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
			</div>
			<div class="modal-body">

				<div id="testmodal2">
					<form id="antoform2" class="form-horizontal calender" role="form">
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label">Title</label>
							<div class="col-xs-12 col-sm-9">
								<input type="text" class="form-control" id="title2" name="title2">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label">Description</label>
							<div class="col-xs-12 col-sm-9">
								<textarea class="form-control" rows="5" id="descr2" name="descr"></textarea>
							</div>
						</div>

					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btnRed antosubmit2">Save</button>
			</div>
		</div>
	</div>
</div>

<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
<!-- /calendar modal -->