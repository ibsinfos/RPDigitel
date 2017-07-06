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


			<!-- Manager DASHBOARD -->
			<li class="<?php if($page_name == 'dashboard') echo 'active';?>">
				<a href="<?php echo base_url();?>index.php?manager/dashboard">
					<i class="entypo-gauge"></i>
					<span class="title"><?php echo get_phrase('dashboard');?></span>
				</a>
			</li>

			<!-- Warehouse -->
			<li class="<?php if($page_name == 'warehouse' ||
									$page_name == 'warehouse_stocks')
										 echo 'opened active has-sub';?>">
				<a href="">
					<i class="fa fa-stack-overflow" style="margin-left:6px;"></i>
					<span class="title"><?php echo get_phrase('warehouse');?></span>
				</a>
				<ul>
					
					 <?php
					 $this->db->where('user_id', $this->session->userdata('login_user_id'));
					 $user_code = $this->db->get('user')->row_array();
					 $this->db->where('warehouse_user_code', $user_code['user_code']);
					 $warehouses_array = $this->db->get('warehouse')->result_array();
					 foreach ($warehouses_array as $key):?>
					<li class="<?php if($page_name == 'warehouse_stocks') echo 'active';?>">
						<a href="<?php echo base_url();?>index.php?manager/manager_warehouse_details/<?php echo $key['warehouse_code']; ?>">
							<i class="entypo-dot"></i>
							<span class="title"><?php echo get_phrase($key['warehouse_title']); ?></span>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</li>

			<!-- ACCOUNT -->
			<li class="<?php if($page_name == 'profile') echo 'active';?>">
				<a href="<?php echo base_url();?>index.php?manager/profile">
					<i class="entypo-key"></i>
					<span class="title"><?php echo get_phrase('profile');?></span>
				</a>
			</li>


		</ul>

	</div>

</div>
