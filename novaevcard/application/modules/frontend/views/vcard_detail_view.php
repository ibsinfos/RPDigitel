<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Paasport</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="<?php echo asset_url(); ?>vcard_detail_view/css/bootstrap.min.css"  rel="stylesheet" />
	<link href="<?php echo asset_url(); ?>vcard_detail_view/font-awesome/css/font-awesome.min.css"  rel="stylesheet" />
	<link href="<?php echo asset_url(); ?>vcard_detail_view/css/vcard-style.css"  rel="stylesheet" />
	<script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail_view/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail_view/js/bootstrap.min.js"></script>
	<script src="<?php echo asset_url(); ?>vcard_detail_view/js/wavesurfer.min.js"></script>
	<script src="<?php echo asset_url(); ?>vcard_detail_view/js/vcard-custom.js"></script>
	 <!--[if lt IE 9]>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
	  <![endif]-->
<body>
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
						<img src='<?php echo asset_url(); ?>vcard_detail_view/images/user.png' alt="user" class="img-responsive">
						<span class="">Hi, <?php echo $user[0]['first_name'] ?></span>
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

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 musicListWrap">
				<div class="row">
					<div class="col-xs-6">
						<span class="trackName">Glass Animals</span>
					</div>
					<div class="col-xs-6">
						<small class="trackLoved"><i class="fa fa-heart-o"></i> 60</small>
						<small><i class="fa fa-share-alt"></i> Share</small>
					</div>
				</div>
				<h4>Behind closed black doors</h4>
				<ul class="list-unstyled">
					<li>
						<div id="waveform"></div>
						<button class="btn" onclick="wavesurfer.playPause()">
    						<i class="fa fa-play"></i>
    					</button>
						<!-- <audio controls>
							<source src="media/Raabta.ogg" type="audio/ogg">
						  	<source src="media/Raabta.mp3" type="audio/mpeg">
							Your browser does not support the audio element.
						</audio> -->
					</li>
				</ul>
			</div>
			<div class="col-sm-12 col-md-5 col-lg-4 learnMoreAbout text-center">
				<p class="learnMoreText">Learn More about <?php echo $user[0]['first_name'] ?> <?php echo $user[0]['last_name'] ?></p>
				<ul class="list-unstyled list-inline">
				<?php if(!empty($user[0]['facebook_link'])) { ?>
					<li>
						<a href="<?php echo $user[0]['facebook_link']; ?>" class="facebook"><i class="fa fa-facebook"></i></a>
					</li>
				<?php } ?>	
				<?php if(!empty($user[0]['twitter_link'])) { ?>
					<li>
						<a href="<?php echo $user[0]['twitter_link']; ?>" class="twitter"><i class="fa fa-twitter"></i></a>
					</li>
				<?php } ?>	
				<?php if(!empty($user[0]['google_plus_link'])) { ?>	
					<li>
						<a href="<?php echo $user[0]['google_plus_link']; ?>" class="googlePlus"><i class="fa fa-google-plus"></i></a>
					</li>
				<?php } ?>	
				<?php if(!empty($user[0]['pinterest_link'])) { ?>	
					<li>
						<a href="<?php echo $user[0]['pinterest_link']; ?>" class="pinterest"><i class="fa fa-pinterest-p"></i></a>
					</li>
				<?php } ?>	
				
					<!--<li>
						<a href="" class="instagram"><i class="fa fa-instagram"></i></a>
					</li>-->
				<?php if(!empty($user[0]['linkedin_link'])) { ?>	
					<li>
						<a href="<?php echo $user[0]['linkedin_link']; ?>" class="linkedin"><i class="fa fa-linkedin"></i></a>
					</li>
				<?php } ?>		
				</ul>
				<div class="musicianWrap">
					<button class="btn subscribeBtn">Subscribe</button>
					<div class="musicianImageName">
						<img src="<?php echo base_url(); ?>/<?php echo $user[0]['user_image'] ?>" alt="user"/>
						<p class="musicianName text-muted"><?php echo $user[0]['first_name'] ?> <?php echo $user[0]['last_name'] ?></p>
						<p class="text-muted"><?php echo $user[0]['home_address'] ?></p>
					</div>
					<button class="btn shareBtn">Share</button>
				</div>
			</div>
			<div class="col-sm-6 col-sm-offset-3 col-md-3 col-md-offset-0 col-lg-3 col-lg-offset-1 memberListWrap">
				<h5 class="heading">Dashboard</h5>
				<h5 class="heading">Member</h5>
				<ul class="list-unstyled">
					<li class="active">
						<div class="memberCol imageBlock">
							<img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician.jpg" alt="musician" class="img-circle img-responsive"/>
						</div>
						<div class="memberCol clearfix">
							<h5 class="pull-left">John Doe</h5>
							<small class="pull-right">Just Now</small>
							<div class="clearfix"></div>
							<p>Hello, Are you there </p>
							<span class="badge">1</span>
						</div>
					</li>
					<li class="">
						<div class="memberCol imageBlock">
							<img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician.jpg" alt="musician" class="img-circle img-responsive"/>
						</div>
						<div class="memberCol clearfix">
							<h5 class="pull-left">John Doe</h5>
							<small class="pull-right">Just Now</small>
							<div class="clearfix"></div>
							<p>Hello, Are you there </p>
							<span class="badge">1</span>
						</div>
					</li>
					<li class="active">
						<div class="memberCol imageBlock">
							<img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician.jpg" alt="musician" class="img-circle img-responsive"/>
						</div>
						<div class="memberCol clearfix">
							<h5 class="pull-left">John Doe</h5>
							<small class="pull-right">Just Now</small>
							<div class="clearfix"></div>
							<p>Hello, Are you there </p>
							<span class="badge">1</span>
						</div>
					</li>
					<li class="">
						<div class="memberCol imageBlock">
							<img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician.jpg" alt="musician" class="img-circle img-responsive"/>
						</div>
						<div class="memberCol clearfix">
							<h5 class="pull-left">John Doe</h5>
							<small class="pull-right">Just Now</small>
							<div class="clearfix"></div>
							<p>Hello, Are you there </p>
							<span class="badge">1</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-4">
				<!-- Nav tabs -->
			  	<ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
				    <li role="presentation"><a href="#merchant" aria-controls="merchant" role="tab" data-toggle="tab">Merchant</a></li>
				    <li role="presentation"><a href="#network" aria-controls="network" role="tab" data-toggle="tab">Network</a></li>
				    <li role="presentation"><a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab">Gallery</a></li>
				    <li role="presentation"><a href="#playlist" aria-controls="playlist" role="tab" data-toggle="tab">Playlist</a></li>
			  	</ul>
			</div>
			<div class="col-md-12">
			  	<!-- Tab panes -->
			  	<div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="profile">
				    	<div class="row">
							<div class="col-sm-6 col-md-4 postWrap">
								<div class="panel">
									<div class="panel-heading">
										<img src="<?php echo asset_url(); ?>vcard_detail_view/images/post-1.jpg" alt="post-1" class="img-responsive">
										<ul class="list-unstyled list-inline socialMedia">
											<li>
												<a href=""><i class="fa fa-facebook"></i></a>
											</li>
											<li>
												<a href=""><i class="fa fa-google-plus"></i></a>
											</li>
											<li>
												<a href=""><i class="fa fa-twitter"></i></a>
											</li>
											<li>
												<a href=""><i class="fa fa-linkedin"></i></a>
											</li>
											<li>
												<a href=""><i class="fa fa-instagram"></i></a>
											</li>
											<li>
												<a href=""><i class="fa fa-behance"></i></a>
											</li>
											<li>
												<a href=""><i class="fa fa-share-alt"></i></a>
											</li>
										</ul>
									</div>
								  	<div class="panel-body">
								    	<div class="row">
								    		<h4 class="col-md-12">Basic Information</h4>
								    		<!--<div class="col-md-7 googleBtn">
								    			<button class=""><i class="fa fa-google-plus"></i>1</button>
								    			<small>Recommend this on Google</small>
								    		</div> -->
								    	</div>

								    	<p>
										First Name : <?php echo $user[0]['first_name'] ?><br>
										Last Name : <?php echo $user[0]['last_name'] ?><br>
										Contact Number : <?php echo $user[0]['mobile'] ?><br>
										Email  : <?php echo $user[0]['email'] ?>
										</p>
								    	<br>
								    	<h4>Professional Information </h4>
								    	<p>
										Company Name : <?php echo $user[0]['company_name'] ?><br>
										Job Title : <?php echo $user[0]['job_title'] ?><br>
										Email : <?php echo $user[0]['work_email'] ?><br>
										Website  : <?php echo $user[0]['work_website'] ?>
										</p>
								  	</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4 aboutMeWrap">
								<div class="panel">
									<div class="panel-heading">
										<video width="100%" height="250" controls>
										  	<source src="<?php echo asset_url(); ?>vcard_detail_view/media/Maroon 5 - Sugar.mp4" type="video/mp4">
										  	<source src="<?php echo asset_url(); ?>vcard_detail_view/media/Maroon 5 - Sugar.ogg" type="video/ogg">
											Your browser does not support the video tag.
										</video>
									</div>
								  	<div class="panel-body">
								    	<h4>About Me</h4>
								    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								    	<p>IN THESE GROUPS</p>
								    	<p>Synopsis</p>
								    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								  	</div>
								</div>
							</div>
							<div class="col-md-4 facebookCommentWrap">
								<h4>Popular Posts</h4>
								<div class="row">
									<div class="col-xs-6">
										<p>SELECT ALL</p>
									</div>
									<div class="col-xs-6">
										<p>ACTIONS</p>
									</div>
								</div>
								<ul class="list-unstyled">
									<li>
										<div class="commentCol">
											<input type="checkbox" class="">
										</div>
										<div class="commentCol imageBlock">
											<img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician.jpg" alt="musician" class="img-circle img-responsive pull-left"/>
										</div>
										<div class="commentCol">
											<h5 class="pull-left">Lael Alexander</h5>
											<small class="pull-left">May 27, 2017</small>
											<div class="clearfix"></div>
											<p>Award-winning actress Kerry Taylor has earned raves for such</p>
										</div>
									</li>
									<li>
										<div class="commentCol">
											<input type="checkbox" class="">
										</div>
										<div class="commentCol imageBlock">
											<img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician.jpg" alt="musician" class="img-circle img-responsive pull-left"/>
										</div>
										<div class="commentCol">
											<h5 class="pull-left">Lael Alexander</h5>
											<small class="pull-left">May 27, 2017</small>
											<div class="clearfix"></div>
											<p>Award-winning actress Kerry Taylor has earned raves for such</p>
										</div>
									</li>
									<li>
										<div class="commentCol">
											<input type="checkbox" class="">
										</div>
										<div class="commentCol imageBlock">
											<img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician.jpg" alt="musician" class="img-circle img-responsive pull-left"/>
										</div>
										<div class="commentCol">
											<h5 class="pull-left">Lael Alexander</h5>
											<small class="pull-left">May 27, 2017</small>
											<div class="clearfix"></div>
											<p>Award-winning actress Kerry Taylor has earned raves for such</p>
										</div>
									</li>
								</ul>
								<form method="">
									<div class="row">
										<div class="col-xs-6">
											<h4>0 Comments</h4>
										</div>
										<div class="col-xs-6">
											<span>Sort By</span>
											<div class="btn-group">
												<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												    Oldest <span class="caret"></span>
											  	</button>
											  	<ul class="dropdown-menu">
												    <li><a href="#">New</a></li>
												    <li><a href="#">Another</a></li>
											  	</ul>
											</div>
										</div>
										<div class="col-md-12">
											<textarea class="form-control"></textarea>
										</div>
										<div class="col-md-12">
											<div class="pluginText">
												<i class="fa fa-facebook-square"></i> Facebook Comments Plugin
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="merchant">...</div>
				    <div role="tabpanel" class="tab-pane" id="network">...</div>
				    <div role="tabpanel" class="tab-pane" id="gallery">...</div>
				    <div role="tabpanel" class="tab-pane" id="playlist">...</div>
			  	</div>
			</div>
		</div>
	</div>
</body>
</html>