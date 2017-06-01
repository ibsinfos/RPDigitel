<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Silo</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Bootstrap -->
    <link href="<?php echo backend_asset_url() ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo backend_asset_url() ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo backend_asset_url() ?>/css/community.css"  rel="stylesheet" />

	 <!--[if lt IE 9]>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
	  <![endif]-->
<body>
	<header class="headerWrap">
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <a class="navbar-brand" href="#"><img src="<?php echo backend_asset_url() ?>/images/logo.jpg" alt="Scanoiscs" /></a>
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
						<img src='<?php echo backend_asset_url() ?>/images/img.jpg' alt="user" class="img-responsive">
						<span class="">Hi, Kerry</span>
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

	<div class="container-fluid communityWrap">
		<div class="row sliderNewsWrap">
			<div class="col-sm-6">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				    <div class="item active">
				      <img src="images/background1.png" alt="background1" class="img-responsive">
				    </div>
				    <div class="item">
				      <img src="images/background1.png" alt="background1" class="img-responsive">
				    </div>
				  </div>
				</div>
			</div>
			<div class="col-sm-6">
				<a href="" class="newsWrap firstNews">
					<img src="<?php echo backend_asset_url() ?>/images/community/news1.jpg" alt="background1" class="">
					<div class="newsContent">
						<span class="newsType">Technology</span>
						<h4>Force Touch on the iPhone 6S could change the way you launch apps</h4>
					</div>
				</a>
				<a href="" class="newsWrap secondNews">
					<img src="<?php echo backend_asset_url() ?>/images/community/new2.jpg" alt="background1" class="">
					<div class="newsContent">
						<span class="newsType">Technology</span>
						<h4>Force Touch on the iPhone 6S could change the way you launch apps</h4>
					</div>
				</a>
			</div>
		</div>

		<div class="row latestSectionWrap">
			<div class="col-sm-3">
				<div class="panel latestNews">
					<h4 class="heading">Latest News</h4>
					<ul class="list-unstyled listWrap">
						<li class="row">
							<div class="col-md-4 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-8">
								<h5 class="category">Entertainment</h5>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
							</div>
						</li>
						<li class="row">
							<div class="col-md-4 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-8">
								<h5 class="category">Sport</h5>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
							</div>
						</li>
						<li class="row">
							<div class="col-md-4 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-8">
								<h5 class="category">Entertainment</h5>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
							</div>
						</li>
						<li class="row">
							<div class="col-md-4 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-8">
								<h5 class="category">Fashion</h5>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
							</div>
						</li>
						<li class="row">
							<div class="col-md-4 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-8">
								<h5 class="category">Business</h5>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="panel latestActivity topBorderPatch">
					<h4 class="heading2">Latest Activity</h4>
					<ul class="list-unstyled">
						<li class="row">
							<div class="col-md-2 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-8">
								<h5 class="postBy">Jason Chaffetz <span>posted an update</span></h5>
								<p class="duration">4 months, 1 week ago</p>
								<p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
							</div>
							<div class="col-md-2">
								<img src="<?php echo backend_asset_url() ?>/images/community/qr-code.png" alt="" class="img-responsive">
							</div>
						</li>
						<li class="row">
							<div class="col-md-2 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-8">
								<h5 class="postBy">Jason Chaffetz <span>posted an update</span></h5>
								<p class="duration">4 months, 1 week ago</p>
								<p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
							<div class="col-md-2">
								<img src="<?php echo backend_asset_url() ?>/images/community/qr-code.png" alt="" class="img-responsive">
							</div>
						</li>
						<li class="row">
							<div class="col-md-2 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-8">
								<h5 class="postBy">Jason Chaffetz <span>posted an update</span></h5>
								<p class="duration">4 months, 1 week ago</p>
								<p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
							</div>
							<div class="col-md-2">
								<img src="<?php echo backend_asset_url() ?>/images/community/qr-code.png" alt="" class="img-responsive">
							</div>
						</li>
					</ul>
					<p class="text-center text-uppercase"><a href="">Load More</a></p>
				</div>
				<div class="panel featuredNews topBorderPatch">
					<h4 class="heading2">Featured News</h4>
					<div class="row">
						<div class="col-md-6">
							<img src="<?php echo backend_asset_url() ?>/images/community/featured.jpg" alt="" class="img-responsive">
							<br>
							<p class="category">Business</p>
							<h4>Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
							<p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. </p>
						</div>
						<div class="col-md-6">
							<ul class="list-unstyled">
								<li class="row">
									<div class="col-md-3 imageBlock">
										<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
									</div>
									<div class="col-md-9">
										<p class="category">Business</p>
										<h4 class="heading4">Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
									</div>
								</li>
								<li class="row">
									<div class="col-md-3 imageBlock">
										<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
									</div>
									<div class="col-md-9">
										<p class="category">Business</p>
										<h4 class="heading4">Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
									</div>
								</li>
								<li class="row">
									<div class="col-md-3 imageBlock">
										<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
									</div>
									<div class="col-md-9">
										<p class="category">Business</p>
										<h4 class="heading4">Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="panel entertainmentNews">
					<h4 class="heading3">Entertainment</h4>
					<div class="row">
						<div class="col-md-4">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							<p class="category">Business</p>
							<h4 class="heading4">Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
						</div>
						<div class="col-md-4">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							<p class="category">Business</p>
							<h4 class="heading4">Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
						</div>
						<div class="col-md-4">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							<p class="category">Business</p>
							<h4 class="heading4">Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
						</div>
					</div>
				</div>

				<div class="panel fashionNews">
					<h4 class="heading3">Fashion</h4>
					<ul class="list-unstyled">
						<li class="row">
							<div class="col-md-4 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-8">
								<p class="category">Fashion</p>
								<h4 class="heading4">Summer Dresses This Year</h4>
								<p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</li>
						<li class="row">
							<div class="col-md-4 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-8">
								<p class="category">Fashion</p>
								<h4 class="heading4">5 Pieces Everyone Wil Want From 2016</h4>
								<p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</li>
					</ul>
				</div>

				<div class="panel otherNews">
					<div id="carousel-other-news" class="carousel slide" data-ride="carousel">
					  	<!-- Indicators -->
					  	<ol class="carousel-indicators">
						    <li data-target="#carousel-other-news" data-slide-to="0" class="active"></li>
						    <li data-target="#carousel-other-news" data-slide-to="1"></li>
						    <li data-target="#carousel-other-news" data-slide-to="2"></li>
					  	</ol>
					  	<!-- Wrapper for slides -->
					  	<div class="carousel-inner" role="listbox">
						    <div class="item active">
						      <img src="<?php echo backend_asset_url() ?>/images/community/other-news.jpg" alt="..." class="img-responsive">
						      <div class="carousel-caption">
						        <span class="newsType">Entertainment</span>
								<h4>Force Touch on the iPhone 6S could change the way you launch apps</h4>
						      </div>
						    </div>
						    <div class="item">
						      <img src="<?php echo backend_asset_url() ?>/images/community/other-news.jpg" alt="..." class="img-responsive">
						      <div class="carousel-caption">
						        <span class="newsType">Entertainment</span>
								<h4>Force Touch on the iPhone 6S could change the way you launch apps</h4>
						      </div>
						    </div>
						    <div class="item">
						      <img src="<?php echo backend_asset_url() ?>/images/community/other-news.jpg" alt="..." class="img-responsive">
						      <div class="carousel-caption">
						        <span class="newsType">Entertainment</span>
								<h4>Force Touch on the iPhone 6S could change the way you launch apps</h4>
						      </div>
						    </div>
					  	</div>
					</div>
					<br>
					<h4 class="heading3">Other News</h4>
					<ul class="list-unstyled">
						<li class="row">
							<div class="col-md-4 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-8">
								<p class="category">Business</p>
								<h4 class="heading4">Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
								<p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</li>
						<li class="row">
							<div class="col-md-4 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-8">
								<p class="category">Technology</p>
								<h4 class="heading4">Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
								<p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</li>
						<li class="row">
							<div class="col-md-4 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-8">
								<p class="category">Business</p>
								<h4 class="heading4">Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
								<p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="panel joinCommunity">
					<h4 class="heading">Join The Community</h4>
					<form class="">
						<div class="form-group">
							<p class="calloutInfo">Username: demo &nbsp; Password: demo </p>
						</div>
						<div class="form-group">
						    <label class="sr-only" for="userNameEmail">Username Or Email</label>
						    <div class="input-group">
						      <div class="input-group-addon"><i class="fa fa-user"></i></div>
						      <input type="text" class="form-control" id="userNameEmail" placeholder="Username Or Email">
						    </div>
					  	</div>
					  	<div class="form-group">
						    <label class="sr-only" for="password">Password</label>
						    <div class="input-group">
						      <div class="input-group-addon"><i class="fa fa-lock"></i></div>
						      <input type="password" class="form-control" id="password" placeholder="Password">
						    </div>
					  	</div>
					  	<div class="form-group text-right">
					  		<a href="">Forgot your password?</a>
					  	</div>
					  	<div class="form-group text-center">
					  		<button type="submit" class="btn">Login</button>
					  	</div>
					  	<div class="form-group">
						    <label class="checkbox-inline">
						      	<input type="checkbox"> Remember Me
						    </label>
					  	</div>
					  	<div class="form-group">
					  		<ul class="list-unstyled list-inline socialShareWrap">
								<li>
									<a href="" class="facebook"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="" class="twitter"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="" class="googlePlus"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="" class="pinterest"><i class="fa fa-pinterest-p"></i></a>
								</li>
								<li>
									<a href="" class="instagram"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="" class="linkedin"><i class="fa fa-linkedin"></i></a>
								</li>
							</ul>
					  	</div>
					</form>
				</div>

				<div class="panel activeMembers">
					<h4 class="heading">Recently Active Members</h4>
					<div class="row">
						<div class="col-xs-6 col-sm-4 col-md-3">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
						</div>
					</div>
				</div>

				<div class="panel groups">
					<h4 class="heading">Groups</h4>
					<ul class="list-unstyled">
						<li class="row">
							<div class="col-md-3 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-9">
								<h5 class="listHeading">Terminator</h5>
								<span class="totalMembers">13 members</span>
							</div>
						</li>
						<li class="row">
							<div class="col-md-3 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-9">
								<h5 class="listHeading">Source Code</h5>
								<span class="totalMembers">13 members</span>
							</div>
						</li>
						<li class="row">
							<div class="col-md-3 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-9">
								<h5 class="listHeading">Goin in 60 Seconds<h5>
								<span class="totalMembers">13 members</span>
							</div>
						</li>
					</ul>
				</div>

				<div class="panel groups">
					<h4 class="heading">Members</h4>
					<ul class="list-unstyled">
						<li class="row">
							<div class="col-md-3 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-9">
								<h5 class="listHeading">Arnold Greitan John</h5>
								<span class="totalMembers">active 36 minutes ago</span>
							</div>
						</li>
						<li class="row">
							<div class="col-md-3 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-9">
								<h5 class="listHeading">GhostPool</h5>
								<span class="totalMembers">active 1 day, 14 hours ago</span>
							</div>
						</li>
						<li class="row">
							<div class="col-md-3 imageBlock">
								<img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-md-9">
								<h5 class="listHeading">Chynna Phillips<h5>
								<span class="totalMembers">active 3 weeks ago</span>
							</div>
						</li>
					</ul>
				</div>

				<div class="panel events">
					<h4 class="heading">Events</h4>
					<p class="eventName">Omni Expo</p>
					<p class="eventDate">October 13, 2018 - November 8, 2018</p>
					<p class="eventName">E3 Expo</p>
					<p class="eventDate">November 13, 2020 - November 10, 2020</p>
					<div class="text-center"><a href="" class="viewAll">View All Events</a></div>
				</div>

				<div class="panel statistics">
					<h4 class="heading">Statistics</h4>
					<div class="row">
						<div class="col-xs-6 col-sm-12 col-md-6">
							<div class="table">
								<div class="tableCol">
									<span class="iconCircle"><i class="fa fa-pencil"></i></span>
								</div>
								<div class="tableCol">
									<h5 class="colHeading">Posts</h5>
									<span class="count">18</span>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-12 col-md-6">
							<div class="table">
								<div class="tableCol">
									<span class="iconCircle"><i class="fa fa-comments-o"></i></span>
								</div>
								<div class="tableCol">
									<h5 class="colHeading">Comments</h5>
									<span class="count">55</span>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-12 col-md-6">
							<div class="table">
								<div class="tableCol">
									<span class="iconCircle"><i class="fa fa-comments"></i></span>
								</div>
								<div class="tableCol">
									<h5 class="colHeading">Activity</h5>
									<span class="count">1502</span>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-12 col-md-6">
							<div class="table">
								<div class="tableCol">
									<span class="iconCircle"><i class="fa fa-user"></i></span>
								</div>
								<div class="tableCol">
									<h5 class="colHeading">Members</h5>
									<span class="count">16</span>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-12 col-md-6">
							<div class="table">
								<div class="tableCol">
									<span class="iconCircle"><i class="fa fa-users"></i></span>
								</div>
								<div class="tableCol">
									<h5 class="colHeading">Groups</h5>
									<span class="count">12</span>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-12 col-md-6">
							<div class="table">
								<div class="tableCol">
									<span class="iconCircle"><i class="fa fa-comment"></i></span>
								</div>
								<div class="tableCol">
									<h5 class="colHeading">Forums</h5>
									<span class="count">11</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="well adArea">RESPONSIVE  AD AREA</div>
			</div>
		</div>
		<!-- <button class="btn filesBtn">Files</button>
		<div class="cloudStorageWrap">
			<div class="text-center">
				<img src="images/community/sc.png" alt="">
				<h3>Cloud Storage</h3>
				<a href="">Register Now</a>

			</div>
		</div> -->
	</div>
	<footer class="footerWrap communityFooter">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<a class="" href="#"><img src="<?php echo backend_asset_url() ?>/images/footer-logo.jpg" alt="Scanoiscs" /></a>
				</div>
				<div class="col-sm-6">
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
			</div>
		</div>
	</footer>
	<div class="stickyAudioPlayer container-fluid">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
				<div class="audioPlayerWrap table">
					<div class="playerCol">
				    	<div id="play-btn">
				    		<i class="fa fa-play"></i>
				    		<i class="fa fa-pause"></i>
				    	</div>
					</div>
					<div class="playerCol secondCol">
					    <div class="audio-wrapper" id="player-container" href="javascript:;">
					      <audio id="player" ontimeupdate="initProgressBar()">
							  	<source src="http://www.lukeduncan.me/oslo.mp3" type="audio/mp3">
							</audio>
					    </div>
					    <div class="player-controls scrubber">
					      	<p>Oslo <small>by</small> Holy Esque</p>
					      	<span id="seekObjContainer">
						  		<progress id="seekObj" value="0" max="1"></progress>
							</span>
					      	<br>
					      	<small class="start-time pull-left">00.00</small>
					      	<small class="end-time pull-right">00.00</small>
					    </div>
				   	</div>
			  	</div>
	  		</div>
		</div>
  	</div>
  	<!-- jQuery -->
    <script src="<?php echo backend_asset_url() ?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo backend_asset_url() ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Custom -->
	<script src="<?php echo backend_asset_url() ?>/js/community-custom.js"></script>
</body>
</html>