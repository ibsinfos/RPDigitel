<!-- page content -->
        <div class="right_col" role="main">
        	<!-- Element where elFinder will be created (REQUIRED) -->
        	<div class="elfinderResponsive">
				<div id="elfinder"></div>
        	</div>
        </div>
    <!-- /page content -->
	
	
<?php $user = $this->session->userdata('user_account');
      $user_id = base64_encode($user['user_id']); 
?>
<script>
    var user_id = '<?php echo $user_id;?>';
</script>	
	
	
	
	
	