<!-- page content -->
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Browse Files</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<ul class="list-unstyled row storageBtnWrap">
						<li class="col-xs-12 col-sm-4 col-sm-offset-2">
							<a href="<?php echo base_url() ?>cloud-storage" class="panel">
                				<img src="<?php echo backend_asset_url() ?>images/sd-cloud/SiloSd_White.png" alt="sidoSD">
                				<p>SD Storage</p>
                			</a>
						</li>
						<li class="col-xs-12 col-sm-4">
							<a href="" class="panel">
                				<img src="<?php echo backend_asset_url() ?>images/sd-cloud/Silo_Cloud_White.png" alt="silo-cloud">
                				<p>Cloud / Hosting Storage</p>
                			</a>
						</li>
					</ul>
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
	
	
	
	
