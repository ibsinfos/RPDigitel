<!-- constants -->
<?php
	$logged_in_user_type = $this->session->userdata('login_type');
	$logged_in_user_id   = $this->session->userdata('login_user_id');
	if($logged_in_user_type == 'admin'){
		$system_name       =	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
		$system_title      =	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
		$text_align        =	$this->db->get_where('settings' , array('type'=>'text_align'))->row()->description;
	}
?>
<!-- constants -->
<!DOCTYPE html>
<html lang="en" dir="<?php if ($text_align == 'right-to-left') echo 'rtl';?>">
	<head>
		<!-- all the meta tags -->
		<?php include 'metas.php'; ?>
		<!-- favicon -->
		<?php $favicon = $this->db->get_where('settings' , array('type' =>'favicon'))->row()->description; ?>
		<link rel="icon" href="<?php echo base_url('assets/backend/images/'.$favicon);?>">
		<!-- the page title shows on the browser tab -->
		<title><?php echo $page_title; ?> | <?php echo get_settings('system_name'); ?></title>
		<!-- loads the css and base jquery -->
		<?php include 'includes_top.php'; ?>
	</head>
	<body class="page-body" data-url="http://neon.dev">

	<!-- For collapsing the sidebar for certain pages -->
	<div class="page-container <?php if($page_name == '') echo 'sidebar-collapsed';?>">

		<div class="page_preloader"></div> <!--do not delete this div if you want to show page preloader -->
		<div class="page-container">
			<!-- loads the navigation menu for users -->
			<?php include $logged_in_user_type.'/navigation.php';?>
			<div class="main-content">
				<!-- loads the header -->
				<?php include 'header.php';?>
				<hr />
				<!-- the main title of the loaded page -->
				<?php if($page_name != 'single_video_details'):?>
					<h2><?php echo $page_title; ?></h2>
				<?php endif; ?>
				<br />
				<!-- loads the main content of loaded page -->
				<?php include $logged_in_user_type.'/'.$page_name.'.php';?>
				<!-- loads the footer -->
				<?php include 'footer.php';?>
			</div>
		</div>
		<!-- loads the modals -->
		<?php include 'modal.php';?>
		<!-- loads the javascript files -->
		<?php include 'includes_bottom.php';?>
	</body>
</html>
