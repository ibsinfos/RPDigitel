<?php $session_data = $this->session->userdata; ?>
<?php
	$userImg=backend_asset_url()."images/img.jpg";	
	if(!empty($user[0]['user_image']))
	$userImg=backend_passport_url().$user[0]['user_image'];
	
	
	
	
	
?>	
<!-- top navigation -->
<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>
			<form class="navbar-form navbar-left hidden-xs">
                <div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
                <button type="submit" class="btn btn-default">Search Artist</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
                <li class="hidden-lg"><a id="musicToggleBtn"><i class="fa fa-music"></i></a></li>
                <li class="">
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<img src="<?php echo $userImg; ?>" alt="">
						<span class=" fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu pull-right">
						<li>
							<a href="javascript:;">
								
                                
								<img src="<?php echo $userImg; ?>" alt="" class="img-circle" width="35">
								<?php //echo ucfirst($session_data['user_account']['username']);?>
								<?php echo ($user[0]['first_name'])?$user[0]['first_name']:''; ?>
							</a>
						</li>
						<li><a href="<?php echo backend_passport_url(); ?>view/<?php echo $slug; ?>">Profile</a></li>
						<li>
							<a href="javascript:;">
								<span class="badge bg-red pull-right">50%</span>
								<span>Settings</span>
							</a>
						</li>
						<li><a href="javascript:;">Help</a></li>
						<li><a href="<?php echo base_url()?>login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
					</ul>
				</li>
                <li role="presentation" class="dropdown">
					<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-bell-o"></i>
						<span class="badge bg-red">4</span>
					</a>
					<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
						<li>
							<a>
								<span class="image"><img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where<?php echo backend_asset_url() ?>.
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image"><img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where<?php echo backend_asset_url() ?>.
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image"><img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where.
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image"><img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where<?php echo backend_asset_url() ?>.
								</span>
							</a>
						</li>
						<li>
							<div class="text-center">
								<a>
									<strong>See All Alerts</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</li>
					</ul>
				</li>
				<li role="presentation" class="dropdown">
					<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-envelope-o"></i>
						<span class="badge bg-red">6</span>
					</a>
					<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
						<li>
							<a>
								<span class="image"><img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where<?php echo backend_asset_url() ?>.
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image"><img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where<?php echo backend_asset_url() ?>.
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image"><img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where.
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image"><img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where<?php echo backend_asset_url() ?>.
								</span>
							</a>
						</li>
						<li>
							<div class="text-center">
								<a>
									<strong>See All Alerts</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</li>
					</ul>
				</li>
				<li role="presentation" class="dropdown visible-xs">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-search"></i>
					</a>
					<ul id="menu1" class="dropdown-menu list-unstyled searchForm" role="menu">
						<li>
							<form class="navbar-form navbar-left">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Search">
								</div>
								<button type="submit" class="btn btn-default">Search Artist</button>
							</form>
						</li>
					</ul>
				</li>
				
				<li>
					<form id="go_live" name="go_live" action="https://rebelute.net/broadcast/broadcast/broadcast.php" method="POST" target="_blank">
						<input type="text" name="broadcast_list_flag" id="broadcast_list_flag" value="1" hidden>
					<input type="submit" name="broadcast_list" id="broadcast_list" value="Broadcast List" class="btn bg-red"></button>
					
				</form>
			</li>
			
			<li class="createProject">
				<button class="btn bg-red">Create Project</button>
			</li>
		</ul>
	</nav>
</div>
</div>
<!-- /top navigation -->