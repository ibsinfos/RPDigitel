<!-- page content -->
        <div class="right_col" role="main">
			<script data-main="<?php echo backend_asset_url()?>elfinder/main.default.js" src="<?php echo backend_asset_url()?>elfinder/require.min.js"></script>
			<!-- Element where elFinder will be created (REQUIRED) -->
			<div id="elfinder"></div>
        </div>
    <!-- /page content -->
	
	
<?php $user = $this->session->userdata('user_account');
      $user_id = base64_encode($user['user_id']); 
?>
<script>
    var user_id = '<?php echo $user_id;?>';
</script>	
	
	
	
	
	