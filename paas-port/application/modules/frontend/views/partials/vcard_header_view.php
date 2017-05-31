	<header class="headerWrap">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							
						
							<a class="navbar-brand" href="#"><img src="<?php echo asset_url(); ?>vcard_detail_view/images/logo.jpg" alt="Scanoiscs" /></a>
							<button type="button" class="navbar-toggle collapsed visible-xs visible-sm" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							
							<!--Start Add navigation -->
							
							<!--End Add navigation -->
							
							
						</div>
						
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class=""><a href="#">Charts</a></li>
								<li><a href="#">Playlist</a></li>
								<li><a href="#">Marketplace</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#"><i class="fa fa-file"></i></a></li>
								<li class="searchWrap"><a href="#"><i class="fa fa-search"></i></a></li>
								<li><a href="#" class="userImage">
									<?php
										$userImg=asset_url()."vcard_detail_view/images/user.png";	
										if(!empty($user[0]['user_image']))
										$userImg=base_url().$user[0]['user_image'];
									?>	
									<img src='<?php echo $userImg; ?>' alt="user" class="img-responsive">
									<span class="">Hi, <?php echo ucfirst($user[0]['first_name']); ?></span>
								</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-envelope-o"></i>
										<span class="badge">6</span>
									</a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-bell-o"></i>
										<span class="badge">4</span>
									</a>
									<ul class="dropdown-menu">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Separated link</a></li>
									</ul>
								</li>
								<li>
									<button type="button" class="navbar-toggle collapsed visible-md" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</header>
		