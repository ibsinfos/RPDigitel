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


			<!-- ADMIN DASHBOARD -->
			<li class="<?php if($page_name == 'dashboard') echo 'active';?>">
				<a href="<?php echo base_url();?>index.php?admin/dashboard">
					<i class="entypo-gauge"></i>
					<span class="title"><?php echo get_phrase('dashboard');?></span>
				</a>
			</li>

			<!-- USERS -->
			<li class="<?php if($page_name == 'user' ||
									$page_name == 'user_add' ||
										$page_name == 'user_edit' ||
											$page_name == 'user_profile')
												echo 'active';?>">
				<a href="<?php echo base_url();?>index.php?admin/user_list/user_all">
					<i class="entypo-users"></i>
					<span class="title"><?php echo get_phrase('users');?></span>
				</a>
			</li>

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
						<a href="<?php echo base_url();?>index.php?admin/sales_order_add">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('add_new_order');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'sales_order_list') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?admin/sales_order_list/order_all">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('order_list');?></span>
						</a>
					</li>
				</ul>
			</li>

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
						<a href="<?php echo base_url();?>index.php?admin/purchase_order_add">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('add_new_order');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'purchase_order_list') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?admin/purchase_order_list/order_all">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('order_list');?></span>
						</a>
					</li>
				</ul>
			</li>

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
						<a href="<?php echo base_url();?>index.php?admin/inventory_list">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('products');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'product_category') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?admin/product_category">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('product_category');?></span>
						</a>
					</li>
				</ul>
			</li>

			<!-- Warehouse -->
			<li class="<?php if($page_name == 'warehouse' ||
									$page_name == 'warehouse_details')
										 echo 'opened active has-sub';?>">
				<a href="">
					<i class="fa fa-stack-overflow" style="margin-left:6px;"></i>
					<span class="title"><?php echo get_phrase('warehouse');?></span>
				</a>
				<ul>
					<li class="<?php if($page_name == 'warehouse') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?admin/warehouse">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('warehouses');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'warehouse_details') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?admin/warehouse_details">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('warehouse_stocks');?></span>
						</a>
					</li>
				</ul>
			</li>

			<!-- REPORTS -->
			<li class="<?php if($page_name == 'report_sales_order' ||
									$page_name == 'report_product_order')
										 echo 'opened active has-sub';?>">
				<a href="">
					<i class="entypo-chart-area"></i>
					<span class="title"><?php echo get_phrase('reports');?></span>
				</a>
				<ul>
					<li class="<?php if($page_name == 'report_sales_order') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?admin/report_sales_order">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('sales_order_report');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'report_product_order') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?admin/report_product_order">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('product_order_report');?></span>
						</a>
					</li>
				</ul>
			</li>

			<!-- SETTINGS -->
			<li class="<?php if($page_name == 'system_settings' ||
									$page_name == 'shipment_courier' ||
										$page_name == 'tax' ||
											$page_name == 'manage_language' ||
												$page_name == 'smtp_settings')
													echo 'opened active has-sub'; ?>">
				<a href="">
					<i class="entypo-cog"></i>
					<span class="title"><?php echo get_phrase('settings');?></span>
				</a>
				<ul>
					<li class="<?php if($page_name == 'system_settings') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?admin/system_settings">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('system_settings');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'manage_language') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?admin/manage_language">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('language_settings');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'smtp_settings') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?admin/smtp_settings">
							<i class="entypo-dot"></i>
							<span class="title">SMTP <?php echo get_phrase('settings');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'shipment_courier') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?admin/shipment_courier">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('shipment');?> & <?php echo get_phrase('courier');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'tax') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?admin/tax">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase('tax');?></span>
						</a>
					</li>
				</ul>
			</li>

			<!-- ACCOUNT -->
			<li class="<?php if($page_name == 'profile') echo 'active';?>">
				<a href="<?php echo base_url();?>index.php?admin/profile">
					<i class="entypo-key"></i>
					<span class="title"><?php echo get_phrase('profile');?></span>
				</a>
			</li>


		</ul>

	</div>

</div>
