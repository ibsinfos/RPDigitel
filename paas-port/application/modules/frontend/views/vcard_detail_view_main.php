<!Doctype html>
<html>
	<head>
		<title>Paasport</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>vcard_detail_view/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>vcard_detail_view/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>vcard_detail_view/css/vcard-style.css">
		<script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail_view/js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail_view/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail_view/js/vcard-custom.js"></script>
		<!-- <script src="js/linkedin.js" type="text/javascript"> lang: en_US</script> -->
	</head>
	<body class="">
		<header class="headerWrap">
			<nav class="navbar navbar-default">
				<div class="container">
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
		
		<div class="memberLinkWrap">
			<div class="container-fluid">
				<ul class="row list-unstyled">
					<li class="col-sm-4 col-sm-offset-4">
						<a href=""> Member Profile </a>
					</li>
					<li class="col-sm-4">
						<a href=""> Dashboard </a>
					</li>
				</ul>
			</div>
			<div class="container">
				<p class="membershipDate">Member Since Jan 2, 2017</p>
			</div>
		</div>
		<div class="bannerWrap">
			<?php
			$cover_img=asset_url()."vcard_detail_view/images/banner.jpg";
			if(!empty($user[0]['cover_image']))
			{
				$cover_img=base_url().$user[0]['cover_image'];
			}
			?>
			<img src="<?php echo $cover_img; ?>" />
		</div>
		<div class="versionWrap">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 versionDetails">
						<button class="btn versionBtn">Enter Beta 1.3</button>
						<!-- <audio controls>
						  	<source src="media/Raabta.mp3" type="audio/mpeg">
							Your browser does not support the audio element.
						</audio> -->
						<div class="audioPlayerWrap row">
							<div class="playerCol col-xs-2 col-sm-3">
						    	<div id="play-btn">
						    		<i class="fa fa-play"></i>
						    		<i class="fa fa-pause"></i>
								</div>
							</div>
							<div class="playerCol secondCol col-xs-10 col-sm-9">
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
					<div class="col-sm-6">
						<div class="musicianWrap">
							<div class="btnColumn">
								<button class="btn subscribeBtn">Subscribe</button>
							</div>
							<?php
								$userImg=asset_url()."vcard_detail_view/images/musician.jpg";	
								if(!empty($user[0]['user_image']))
								$userImg=base_url().$user[0]['user_image'];
							?>	
							<div class="musicianImageName">
								<img src="<?php echo $userImg; ?>" alt="musician"/>
								<p class="musicianName"><?php echo ucfirst($user[0]['first_name']).' '.ucfirst($user[0]['last_name']); ?></p>
								<p><?php echo $user[0]['home_address']; ?></p>
							</div>
							<div class="btnColumn">
								<button class="btn shareBtn" id="btnshare" data-toggle="modal" data-target="#myModal"  >Share</button>
							</div>
						</div>
					</div>
					<div class="col-sm-3 followShare">
						<button class="btn followBtn"><i class="fa fa-user-circle"></i>Follow</button>
						<div class="example counter-top clearfix"></div>
						<!-- <div class="linkedInBtn">
							<script type="IN/Share" data-counter="top"></script>
						</div> -->
					</div>
				</div>
			</div>
		</div>
		
		<div class="musicianListWrap">
			<div class="container">
				<ul class="row list-unstyled">
					<li class="col-sm-4 col-md-3">
						<div class="panel">
							<div id="myCarousel-1" class="carousel slide musicianSlider">
							    <div class="carousel-inner">
							        <div class="item active">
							            <img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician-image.jpg" alt="musician" class="img-responsive"/>
									</div>
							        <div class="item">
							            <img src="<?php echo asset_url(); ?>vcard_detail_view/images/post-1.jpg" alt="musician" class="img-responsive"/>
									</div>
							        <div class="item">
							            <img src="<?php echo asset_url(); ?>vcard_detail_view/images/banner.jpg" alt="musician" class="img-responsive"/>
									</div>
								</div> 
							    <a class="left carousel-control hidden" href="#myCarousel-1" data-slide="prev">‹</a>
 								<a class="right carousel-control hidden" href="#myCarousel-1" data-slide="next">›</a>
							</div>
							<div class="followWrap">
								<div class="circleImage">
									<img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician.jpg" alt="musician" class="img-responsive"/>
									<button class="btn followBtn"><i class="fa fa-user-circle"></i>Follow</button>
								</div>
								<p>Roxy Talent</p>
							</div>
							<div class="panel-body">
								<div class="star-rating">
									<input type="radio" id="5-stars" name="rating" value="5" />
									<label for="5-stars" class="star">&#9733;</label>
									<input type="radio" id="4-stars" name="rating" value="4" />
									<label for="4-stars" class="star">&#9733;</label>
									<input type="radio" id="3-stars" name="rating" value="3" />
									<label for="3-stars" class="star">&#9733;</label>
									<input type="radio" id="2-stars" name="rating" value="2" />
									<label for="2-stars" class="star active">&#9733;</label>
									<input type="radio" id="1-star" name="rating" value="1" />
									<label for="1-star" class="star active">&#9733;</label>
								</div>
								<h4>Fitness Workout Tracks</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tristique condimentum velit eu mollis. Ut eu luctus elit. Curabitur non dolor ac diam blandit auctor sed id elit.</p>
								<div class="text-center">
									<button class="btn subscribeBtn">Subscribe</button>
								</div>
							</div>
						</div>
					</li>
					<li class="col-sm-4 col-md-3">
						<div class="panel">
							<div id="myCarousel-2" class="carousel slide musicianSlider">
							    <div class="carousel-inner">
							        <div class="item active">
							            <img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician-image.jpg" alt="musician" class="img-responsive"/>
									</div>
							        <div class="item">
							            <img src="<?php echo asset_url(); ?>vcard_detail_view/images/post-1.jpg" alt="musician" class="img-responsive"/>
									</div>
							        <div class="item">
							            <img src="<?php echo asset_url(); ?>vcard_detail_view/images/banner.jpg" alt="musician" class="img-responsive"/>
									</div>
								</div> 
							    <a class="left carousel-control hidden" href="#myCarousel-2" data-slide="prev">‹</a>
 								<a class="right carousel-control hidden" href="#myCarousel-2" data-slide="next">›</a>
							</div>
							<div class="followWrap">
								<div class="circleImage">
									<img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician.jpg" alt="musician" class="img-responsive"/>
									<button class="btn followBtn"><i class="fa fa-user-circle"></i>Follow</button>
								</div>
								<p>Roxy Talent</p>
							</div>
							<div class="panel-body">
								<div class="star-rating">
									<input type="radio" id="5-stars" name="rating" value="5" />
									<label for="5-stars" class="star">&#9733;</label>
									<input type="radio" id="4-stars" name="rating" value="4" />
									<label for="4-stars" class="star">&#9733;</label>
									<input type="radio" id="3-stars" name="rating" value="3" />
									<label for="3-stars" class="star">&#9733;</label>
									<input type="radio" id="2-stars" name="rating" value="2" />
									<label for="2-stars" class="star active">&#9733;</label>
									<input type="radio" id="1-star" name="rating" value="1" />
									<label for="1-star" class="star active">&#9733;</label>
								</div>
								<h4>Fitness Workout Tracks</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tristique condimentum velit eu mollis. Ut eu luctus elit. Curabitur non dolor ac diam blandit auctor sed id elit.</p>
								<div class="text-center">
									<button class="btn subscribeBtn">Subscribe</button>
								</div>
							</div>
						</div>
					</li>
					<li class="col-sm-4 col-md-3">
						<div class="panel">
							<div id="myCarousel-3" class="carousel slide musicianSlider">
							    <div class="carousel-inner">
							        <div class="item active">
							            <img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician-image.jpg" alt="musician" class="img-responsive"/>
									</div>
							        <div class="item">
							            <img src="<?php echo asset_url(); ?>vcard_detail_view/images/post-1.jpg" alt="musician" class="img-responsive"/>
									</div>
							        <div class="item">
							            <img src="<?php echo asset_url(); ?>vcard_detail_view/images/banner.jpg" alt="musician" class="img-responsive"/>
									</div>
								</div> 
							    <a class="left carousel-control hidden" href="#myCarousel-3" data-slide="prev">‹</a>
 								<a class="right carousel-control hidden" href="#myCarousel-3" data-slide="next">›</a>
							</div>
							<div class="followWrap">
								<div class="circleImage">
									<img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician.jpg" alt="musician" class="img-responsive"/>
									<button class="btn followBtn"><i class="fa fa-user-circle"></i>Follow</button>
								</div>
								<p>Roxy Talent</p>
							</div>
							<div class="panel-body">
								<div class="star-rating">
									<input type="radio" id="5-stars" name="rating" value="5" />
									<label for="5-stars" class="star">&#9733;</label>
									<input type="radio" id="4-stars" name="rating" value="4" />
									<label for="4-stars" class="star">&#9733;</label>
									<input type="radio" id="3-stars" name="rating" value="3" />
									<label for="3-stars" class="star">&#9733;</label>
									<input type="radio" id="2-stars" name="rating" value="2" />
									<label for="2-stars" class="star active">&#9733;</label>
									<input type="radio" id="1-star" name="rating" value="1" />
									<label for="1-star" class="star active">&#9733;</label>
								</div>
								<h4>Fitness Workout Tracks</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tristique condimentum velit eu mollis. Ut eu luctus elit. Curabitur non dolor ac diam blandit auctor sed id elit.</p>
								<div class="text-center">
									<button class="btn subscribeBtn">Subscribe</button>
								</div>
							</div>
						</div>
					</li>
					<li class="col-sm-4 col-md-3">
						<div class="panel">
							<div id="myCarousel-4" class="carousel slide musicianSlider">
							    <div class="carousel-inner">
							        <div class="item active">
							            <img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician-image.jpg" alt="musician" class="img-responsive"/>
									</div>
							        <div class="item">
							            <img src="<?php echo asset_url(); ?>vcard_detail_view/images/post-1.jpg" alt="musician" class="img-responsive"/>
									</div>
							        <div class="item">
							            <img src="<?php echo asset_url(); ?>vcard_detail_view/images/banner.jpg" alt="musician" class="img-responsive"/>
									</div>
								</div> 
							    <a class="left carousel-control hidden" href="#myCarousel-4" data-slide="prev">‹</a>
 								<a class="right carousel-control hidden" href="#myCarousel-4" data-slide="next">›</a>
							</div>
							<div class="followWrap">
								<div class="circleImage">
									<img src="<?php echo asset_url(); ?>vcard_detail_view/images/musician.jpg" alt="musician" class="img-responsive"/>
									<button class="btn followBtn"><i class="fa fa-user-circle"></i>Follow</button>
								</div>
								<p>Roxy Talent</p>
							</div>
							<div class="panel-body">
								<div class="star-rating">
									<input type="radio" id="5-stars" name="rating" value="5" />
									<label for="5-stars" class="star">&#9733;</label>
									<input type="radio" id="4-stars" name="rating" value="4" />
									<label for="4-stars" class="star">&#9733;</label>
									<input type="radio" id="3-stars" name="rating" value="3" />
									<label for="3-stars" class="star">&#9733;</label>
									<input type="radio" id="2-stars" name="rating" value="2" />
									<label for="2-stars" class="star active">&#9733;</label>
									<input type="radio" id="1-star" name="rating" value="1" />
									<label for="1-star" class="star active">&#9733;</label>
								</div>
								<h4>Fitness Workout Tracks</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tristique condimentum velit eu mollis. Ut eu luctus elit. Curabitur non dolor ac diam blandit auctor sed id elit.</p>
								<div class="text-center">
									<button class="btn subscribeBtn">Subscribe</button>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="signLoadBtnWrap">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<button class="btn redBtn">Sign Up</button>
						<button class="btn blackBtn">Load More...</button>
					</div>
				</div>
			</div>
		</div>
		<footer class="footerWrap">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<a class="" href="#"><img src="<?php echo asset_url(); ?>vcard_detail_view/images/footer-logo.jpg" alt="Scanoiscs" /></a>
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
	</body>
</html>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Share </h4>
			</div>
			<form>
				<div class="err_mailsend" ></div>
				<div class="modal-body text-center">
					<h4 class="modalHeading">Share by Text or Email</h4>
					
					<div class="form-group text-left">
						<input id="shorten_url" name="shorten_url" type="hidden" value="<?php echo ($shorten_url)?$shorten_url:current_url(); ?>" >
						<label for="to">To <small>(required)</small></label>
						<input id="to" name="to" type="text" class="form-control" placeholder="Recipients Email" >
						<span id="err_to" ></span>    
					</div>
					<div class="form-group text-left">
						<label for="from">From <small>(required)</small></label>
						<input id="fromid" name="fromid" type="text"  class="form-control"  placeholder="Senders Email/Name" >
						<span id="err_from" ></span>      
					</div>
					<div class="form-group">
						<button type="button" class="btn" id="btnemailsend">Send</button>
					</div>
				</form> 
				<h4 class="modalHeading">Sharing by Social Network</h4>
				
				<ul class="list-unstyled list-inline socialShareWrap">
					
						<li>
							<a href="//www.facebook.com/sharer/sharer.php?u=<?php echo ($shorten_url)?$shorten_url:current_url(); ?>" class="facebook"><i class="fa fa-facebook"></i></a>
						</li>
					
					
						<li>
							<a href="http://twitter.com/intent/tweet?url=<?php echo ($shorten_url)?$shorten_url:current_url(); ?>" class="twitter"><i class="fa fa-twitter"></i></a>
						</li>
					
					
						<li>
							<a href="//plus.google.com/share?url=<?php echo ($shorten_url)?$shorten_url:current_url(); ?>" class="googlePlus"><i class="fa fa-google-plus"></i></a>
						</li>
					
					
						<li>
							<a href="//pinterest.com/pin/create/button/?url=<?php echo ($shorten_url)?$shorten_url:current_url(); ?>" class="pinterest"><i class="fa fa-pinterest-p"></i></a>
						</li>
					
					
					<!--<li>
						<a href="" class="instagram"><i class="fa fa-instagram"></i></a>
					</li>-->
					
						<li>
							<a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo ($shorten_url)?$shorten_url:current_url(); ?>" class="linkedin"><i class="fa fa-linkedin"></i></a>
						</li>
							
				</ul>
				<h4 class="modalHeading">Short URL for Sharing Page</h4>
				<p><a href=""><?php echo ($shorten_url)?$shorten_url:current_url(); ?></a></p>
				<?php if(!empty($user[0]['qr_code_image_ext']) && !empty($user[0]['qr_code_image'])) { ?>
					<h4 class="modalHeading">Scan QRCode for Link</h4>
					<img src="<?php echo 'data:' . $user[0]['qr_code_image_ext'] . ';base64,' . base64_encode($user[0]['qr_code_image']); ?>" width="200" />
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!--End Modal -->

<script type="text/javascript"  >
	$(document).ready(function () {
		$('#btnemailsend').click(function() {
			
			$(".err_mailsend").html('<div class="loader"><div class="title">Sending...</div><div class="load"><div class="bar"></div></div></div>');	
			
			$("#err_to").html('');
			$("#err_from").html('');
			
			$.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/sendmail",
                type: "POST",
                data: {
					to:$('#to').val(),
					fromid:$('#fromid').val(),
					shorten_url:$('#shorten_url').val()
				},
                success: function (data)
                {
					$(".err_mailsend").html('');	
                    var json = JSON.parse(data);
                    if (json.status === 1) 
					{						
						
						$("#err_to").html('');
						$("#err_from").html('');						
                        $(".err_mailsend").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
					}
					else 
					{
						
						//$(".err_mailsend").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
						$("#err_to").html('<div class="text-danger">' + json.msg.to + '</div>');
						$("#err_from").html('<div class="text-danger">' + json.msg.from + '</div>');
						
						
                        return false;
					}
				}
			});     
		});
	});
</script>