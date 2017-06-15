<?php
	$color_scheme = get_settings('theme_color_scheme');
	$system_name  = get_settings('system_name');
	$system_title = get_settings('system_title');
	
?>
<!doctype html>
<html lang="en">
<head>
	<?php include 'metas.php'; ?>

	<?php $logo = $this->db->get_where('settings' , array('type' =>'logo'))->row()->description; ?>
  <link rel="apple-touch-icon" href="<?php echo base_url('assets/backend/images/'.$logo);?>">
	<!-- favicon -->
	<?php $favicon = $this->db->get_where('settings' , array('type' =>'favicon'))->row()->description; ?>
	<link rel="icon" href="<?php echo base_url('assets/backend/images/'.$favicon);?>">

  <title><?php echo $page_title; ?> | <?php echo $system_title; ?></title>

  <?php include 'includes_top.php'; ?>
</head>

  <?php include $page_name.'.php'; ?>

</html>
