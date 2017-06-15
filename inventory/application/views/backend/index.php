<?php
    $text_align         =   $this->db->get_where('settings' , array('type'=>'text_align'))->row()->description;

	// setting the common variables to be used throughout the system
	$logged_in_user_type	=	$this->session->userdata('login_type');
	$loggd_in_user_id       =   $this->session->userdata('login_user_id');
?>

<!DOCTYPE html>
<html lang="en">

<!-- INCLUDES THE CSS FILES AND MAIN JQUERY LIBRARY -->
	<?php include 'includes_top.php';?>

<body class="page-body" data-url="http://neon.dev">

	<div class="page-container <?php if($page_name == 'sales_order_add' ||
											$page_name == 'sales_order_list' ||
												$page_name == 'inventory_add' ||
													$page_name == 'product_details' ||
														$page_name == 'sales_order_view' ||
															$page_name == 'purchase_order_add' ||
																$page_name == 'manager_warehouse_details')
		echo 'sidebar-collapsed';?>">

		<!-- INCLUDES THE NAVIGATION MENU FOR USERS -->
			<?php include $logged_in_user_type . '/navigation.php';?>

		<div class="main-content">

			<!-- INCLUDES THE HEADER -->
				<?php include 'header.php';?>

			<h2><?php echo $page_title;?></h2>
<br />

<!-- INCLUDES THE MAIN BODY FOR EACH PAGE -->
	<?php include $logged_in_user_type . '/' . $page_name . '.php';?>

<!-- INCLUDES THE FOOTER -->
	<?php include 'footer.php';?>

	</div>

</div>

<!-- INCLUDES ALL JAVASCRIPT FILES -->
	<?php include 'modal.php';?>
	<?php include 'includes_bottom.php';?>

</body>
</html>
