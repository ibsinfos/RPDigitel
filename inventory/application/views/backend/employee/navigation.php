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
			
			
			<!-- employee DASHBOARD -->
			<li class="<?php if($page_name == 'dashboard') echo 'active';?>">
				<a href="<?php echo base_url();?>index.php?employee/dashboard">
					<i class="entypo-gauge"></i>
					<span class="title"><?php echo get_phrase('dashboard');?></span>
				</a>
			</li>

			<?php 
				$logged_in_user_code = $this->db->get_where('user' , array(
					'user_id' => $this->session->userdata('login_user_id')
				))->row()->user_code;
			?>

			<?php if($this->user_model->check_permission($logged_in_user_code , 3)):?>
			<!-- SALES ORDERS -->
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
						<a href="<?php echo base_url();?>index.php?employee/sales_order_add">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('add_new_order');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'sales_order_list') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?employee/sales_order_list/order_all">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('order_list');?></span>
						</a>
					</li>
				</ul>
			</li>
			<?php endif;?>


			<?php if($this->user_model->check_permission($logged_in_user_code , 2)):?>
			<!-- PURCHASE ORDERS -->
			<li class="<?php if($page_name == 'purchase_order' ||
									$page_name == 'purchase_order_add' ||
										$page_name == 'purchase_order_list' ||
											$page_name == 'purchase_order_view') 
												echo 'opened active has-sub';?>">
				<a href="">
					<i class="entypo-cc-nc"></i>
					<span class="title"><?php echo get_phrase('purchase_order');?></span>
				</a>
				<ul>
					<li class="<?php if($page_name == 'purchase_order_add') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?employee/purchase_order_add">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('add_new_order');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'purchase_order_list') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?employee/purchase_order_list/order_all">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('order_list');?></span>
						</a>
					</li>
				</ul>
			</li>
			<?php endif;?>


			<?php if($this->user_model->check_permission($logged_in_user_code , 1)):?>
			<!-- INVENTORY -->
			<li class="<?php if($page_name == 'inventory_list'||
									$page_name == 'inventory_add' ||
										$page_name == 'product_category' ||
											$page_name == 'product_details' ||
												$page_name == 'inventory_list_archived') 
													echo 'opened active has-sub';?>">
				<a href="">
					<i class="entypo-bag"></i>
					<span class="title"><?php echo get_phrase('inventory');?></span>
				</a>
				<ul>
					<li class="<?php if($page_name == 'inventory_list' ||
											$page_name == 'inventory_list_archived' ||
												$page_name == 'inventory_add') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?employee/inventory_list">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('products');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'product_category') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?employee/product_category">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('product_category');?></span>
						</a>
					</li>
				</ul>
			</li>
			<?php endif;?>

			<!-- ACCOUNT -->
			<li class="<?php if($page_name == 'profile') echo 'active';?>">
				<a href="<?php echo base_url();?>index.php?employee/profile">
					<i class="entypo-key"></i>
					<span class="title"><?php echo get_phrase('profile');?></span>
				</a>
			</li>

			
		</ul>
		
	</div>

</div>