<div class="sidebar-menu">

	<div class="sidebar-menu-inner">

		<header class="logo-env">

			<!-- logo -->
			<div class="logo">
				<a href="<?php echo base_url();?>">
					<img src="uploads/logo.png" width="80" alt="" />
				</a>
			</div>

			<!-- logo collapse icon -->
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>


			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>

		</header>


		<ul id="main-menu" class="main-menu">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->


			<!-- CUSTOMER DASHBOARD -->
			<li class="<?php if($page_name == 'dashboard') echo 'active';?>">
				<a href="<?php echo base_url();?>index.php?customer/dashboard">
					<i class="entypo-gauge"></i>
					<span class="title"><?php echo get_phrase('dashboard');?></span>
				</a>
			</li>

			<!-- ORDERS -->
			<li class="<?php if($page_name == 'sales_order_list' ||
									$page_name == 'sales_order_add' ||
										$page_name == 'sales_order_view')
											echo 'opened active has-sub';?>">
				<a href="">
					<i class="entypo-bell"></i>
					<span class="title"><?php echo get_phrase('sales_order');?></span>
				</a>
				<ul>
					<li class="<?php if($page_name == 'sales_order_add') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?customer/sales_order_add">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('add_new_order');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'sales_order_list') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?customer/sales_order_list/order_all">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('sales_order_list');?></span>
						</a>
					</li>
				</ul>
			</li>

			<!-- ACCOUNT -->
			<li class="<?php if($page_name == 'profile') echo 'active';?>">
				<a href="<?php echo base_url();?>index.php?customer/profile">
					<i class="entypo-key"></i>
					<span class="title"><?php echo get_phrase('profile');?></span>
				</a>
			</li>


		</ul>

	</div>

</div>
