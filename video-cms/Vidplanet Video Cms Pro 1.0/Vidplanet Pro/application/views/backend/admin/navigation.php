<div class="sidebar-menu">
	<div class="sidebar-menu-inner">
		<header class="logo-env">
			<!-- logo -->
			<div class="logo">
				<a href="<?php echo site_url('admin/dashboard');?>">
					<?php $logo = $this->db->get_where('settings' , array('type' =>'logo'))->row()->description; ?>
					<img src="<?php echo base_url('assets/backend/images/'.$logo);?>" width="80" alt="" />
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

			<!-- dashboard -->
			<li class="<?php if ($page_name == 'dashboard') echo 'active'; ?>">
				<a href="<?php echo site_url('admin/dashboard');?>">
					<i class="fa fa-dashboard"></i>
					<span class="title"><?php echo get_phrase('dashboard') ?></span>
				</a>
			</li>

			<!-- users -->
			<li class="<?php if ($page_name == 'user' || $page_name == 'user_profile') echo 'active'; ?>">
				<a href="<?php echo site_url('admin/user');?>">
					<i class="fa fa-users"></i>
					<span class="title"><?php echo get_phrase('users') ?></span>
				</a>
			</li>

			<!-- videos -->
			<li class="<?php if($page_name == 'video_add' ||
				$page_name == 'video_pack_add' ||
					$page_name == 'videos' ||
					$page_name == 'video_packs' ||
						$page_name == 'video_category' ||
						  $page_name == 'show_video_pack_details' ||
						    $page_name == 'single_video_details' ||
							  $page_name == 'show_category_details')
							echo 'opened active has-sub';?>">
				<a href="">
					<i class="fa fa-video-camera"></i>
					<span class="title"><?php echo get_phrase('videos');?></span>
				</a>
				<ul>
					<li class="<?php if($page_name == 'video_add') echo 'active';?>">
						<a href="<?php echo site_url('admin/video_add');?>">
							<i class="fa fa-circle-o"></i>
							<span class="title"><?php echo get_phrase('add_video');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'video_pack_add') echo 'active';?>">
						<a href="<?php echo site_url('admin/video_pack_add');?>">
							<i class="fa fa-circle-o"></i>
							<span class="title"><?php echo get_phrase('add_video_pack');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'videos' || $page_name == 'single_video_details') echo 'active';?>">
						<a href="<?php echo site_url('admin/videos');?>">
							<i class="fa fa-circle-o"></i>
							<span class="title"><?php echo get_phrase('videos');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'video_packs' || $page_name == 'show_video_pack_details') echo 'active';?>">
						<a href="<?php echo site_url('admin/video_packs');?>">
							<i class="fa fa-circle-o"></i>
							<span class="title"><?php echo get_phrase('video_packs');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'video_category' || $page_name == 'show_category_details') echo 'active';?>">
						<a href="<?php echo site_url('admin/video_category');?>">
							<i class="fa fa-circle-o"></i>
							<span class="title"><?php echo get_phrase('categories');?></span>
						</a>
					</li>
				</ul>
			</li>

			<!-- payment option -->
			<li class="<?php if ($page_name == 'payment_information') echo 'active'; ?>">
				<a href="<?php echo site_url('admin/payment_information');?>">
					<i class="fa fa-money"></i>
					<span class="title"><?php echo get_phrase('payment_information') ?></span>
				</a>
			</li>

			<!-- SETTINGS -->
	        <li class="<?php
	        if ($page_name == 'system_settings'    ||
	            $page_name == 'manage_language'    ||
	            $page_name == 'manage_profile'     ||
				$page_name == 'system_settings'    ||
				$page_name == 'payment_settings'   ||
				$page_name == 'front_end_settings' ||
				$page_name == 'front_end_settings')
	                  echo 'opened active';?>">
	            <a href="#">
	                <i class="fa fa-wrench"></i>
	                <span><?php echo get_phrase('settings'); ?></span>
	            </a>
	            <ul>
					<li class="<?php if ($page_name == 'front_end_settings') echo 'active'; ?> ">
	                    <a href="<?php echo site_url('admin/front_end_settings');?>">
	                        <span><i class="fa fa-circle-o"></i> <?php echo get_phrase('user_interface_settings'); ?></span>
	                    </a>
	                </li>

	                <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
	                    <a href="<?php echo site_url('admin/system_settings');?>">
	                        <span><i class="fa fa-circle-o"></i> <?php echo get_phrase('system_settings'); ?></span>
	                    </a>
	                </li>

	                <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
	                    <a href="<?php echo site_url('admin/manage_language');?>">
	                        <span><i class="fa fa-circle-o"></i> <?php echo get_phrase('language_settings'); ?></span>
	                    </a>
	                </li>

	
					<li class="<?php if ($page_name == 'payment_settings') echo 'active'; ?> ">
						<a href="<?php echo site_url('admin/payment_settings');?>">
								<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('payment_settings'); ?></span>
						</a>
					</li>


	                <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
	                    <a href="<?php echo site_url('admin/manage_profile');?>">
	                        <span><i class="fa fa-circle-o"></i> <?php echo get_phrase('manage_profile'); ?></span>
	                    </a>
	                </li>

	            </ul>
	        </li>
		</ul>
	</div>
</div>
