<!-- page content -->
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Browse Files</h2>
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
				<div class="x_content">
					<div class="row">
						<div class=""></div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->


<?php $user = $this->session->userdata('user_account');
	$user_id = base64_encode($user['user_id']); 
?>
<script>
    var user_id = '<?php echo $user_id;?>';
	</script>	
	
	
	
	
