
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4 musicListWrap">
			<div class="row">
				<div class="col-xs-6">
					<span class="trackName">Glass Animals</span>
				</div>
				<div class="col-xs-6">
					<small class="trackLoved"><i class="fa fa-heart-o"></i> 60</small>
					<small><i class="fa fa-share-alt"></i> Share</small>
				</div>
			</div>
			<div class="audioPLWrap">
				<div id="mainwrap">
					<div id="nowPlay">
						<!-- <span class="pull-left" id="npAction">Paused...</span> -->
						<h4 class="" id="npTitle"></h4>
					</div>
					<div id="audiowrap">
						<div id="audio0">
							<audio preload id="audio1" controls="controls">Your browser does not support HTML5 Audio!</audio>
						</div>
						<div id="tracks">
							<a id="btnPrev"><i class="fa fa-backward"></i></a>
							<a id="btnNext"><i class="fa fa-forward"></i></a>
						</div>
					</div>
					<div id="plwrap" class="mCustomScrollbar">
						<ul id="plList" class="list-unstyled"></ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 learnMoreAbout text-center">
			<p class="learnMoreText">Learn More about <?php echo $user[0]['first_name'] ?> <?php echo $user[0]['last_name'] ?></p>
			<ul class="list-unstyled list-inline socialShareWrap">
				<?php 
					
					if(!empty($user[0]['facebook_link'])) { ?>
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
					<?php
						$userImg=asset_url()."vcard_detail_view/images/user.png";	
						if(!empty($user[0]['user_image']))
						$userImg=base_url().$user[0]['user_image'];
					?>	
					<img src="<?php echo $userImg; ?>" alt="user"/>
					<p class="musicianName text-muted"><?php echo $user[0]['first_name'] ?> <?php echo $user[0]['last_name'] ?></p>
					<p class="text-muted"><?php echo $user[0]['home_address'] ?></p>
					
				</div>
				
				<button class="btn shareBtn" id="btnshare" data-toggle="modal" data-target="#myModal"  >Share</button>
			</div>
			<?php if(!empty($user[0]['qr_code_image_ext']) && !empty($user[0]['qr_code_image'])) { ?>
				<h4 class="modalHeading">Scan QRCode for Link</h4>
				<img src="<?php echo 'data:' . $user[0]['qr_code_image_ext'] . ';base64,' . base64_encode($user[0]['qr_code_image']); ?>" width="100px"  />
			<?php } ?>
		</div>
		<div class="col-sm-4 memberListWrap">
			<h5 class="heading">Dashboard</h5>
			<h5 class="heading">Member</h5>
			<h4 class="text-center">Recent Messages</h4>
			<div class="mCustomScrollbar">
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
								<!--<div class="panel-heading">
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
								</div>-->
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
										Email  : <?php echo $user[0]['email'] ?><br>
										<?php if(!empty($user[0]['home_address'])) { ?>
											Address  : <?php echo $user[0]['home_address'] ?><br>
										<?php } ?>
										<?php if(!empty($user[0]['home_postal_code'])) { ?>
											Pincode  : <?php echo $user[0]['home_postal_code'] ?><br>
										<?php } ?>
									</p>
									<br>
									<h4>Professional Information </h4>
									<p>
										Company Name : <?php echo $user[0]['company_name'] ?><br>
										Job Title : <?php echo $user[0]['job_title'] ?><br>
										<?php if(!empty($user[0]['start_date'])) { ?>
											Start Date : <?php echo $user[0]['start_date'] ?><br>
										<?php } ?>
										<?php if(!empty($user[0]['work_phone'])) { ?>
											Contact Number : <?php echo $user[0]['work_phone'] ?><br>
										<?php } ?>
										Email : <?php echo $user[0]['work_email'] ?><br>
										Website  : <?php echo $user[0]['work_website'] ?>
									</p>
									<br>
									<h4>About Me </h4>
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										<?php if(!empty($user[0]['short_bio'])) { ?>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
															Short Bio
														</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
														<?php echo $user[0]['short_bio'] ?>
													</div>
												</div>
											</div>
										<?php } ?>
										<?php 
											if(!empty($user_skills)) 
											{
											?>  
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingTwo">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
															Skills & Expertise
														</a>
													</h4>
												</div>
												<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
													<div class="panel-body">
														<p><b>
															Skills you have added: 
														</b></p>
														
														
														
														
														<?php
															$exp_count = 0;
															foreach ($user_skills as $user_skill) {
																$exp_count++;
															?>
															
															
															<?php echo ($user_skill['skill']) ? $user_skill['skill'] : ''; ?><br>
															
															
															
														<?php } ?>
														
														
														
														
													</div>
												</div>
											</div>
										<?php } ?>
										<?php if(!empty($user_experience_data)) { ?>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingThree">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
															Experience
														</a>
													</h4>
												</div>
												<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
													<div class="panel-body">
														<?php
															$exp_count = 0;
															foreach ($user_experience_data as $user_exp) {
																$exp_count++;
															?>
															
															<div id="info-remove<?php echo $user_exp['id']; ?>">
																<div class="content-company div-delete"> 
																	<strong>Company Name: </strong><?php echo ($user_exp['company_name']) ? $user_exp['company_name'] : ''; ?>
																</div>
																<div class="content-position div-delete"><strong>Position Title: </strong><?php echo ($user_exp['position_title']) ? $user_exp['position_title'] : ''; ?>
																</div>
																<div class="start-date div-delete"><strong>Start Date: </strong><?php echo ($user_exp['start_date']) ? $user_exp['start_date'] : ''; ?>
																</div>
																<div class="end-date div-delete"><strong>End Date: </strong><?php echo ($user_exp['end_date']) ? $user_exp['end_date'] : ''; ?>
																</div>
																<hr>
															</div>
															
															
															
														<?php }  ?>
													</div>
												</div>
											</div>
										<?php } ?>
										<?php if(!empty($user_education_data))  { ?>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingFour">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
															Education
														</a>
													</h4>
												</div>
												<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
													<div class="panel-body">
														<?php
															$edu_count = 0;
															foreach ($user_education_data as $user_edu) 
															{
																$edu_count++;
															?>
															
															
															<div id="info-remove<?php echo $user_edu['id']; ?>">
																<div class="content-company div-delete">
																	<strong>Institute Name: </strong><?php echo ($user_edu['institute_name']) ? $user_edu['institute_name'] : ''; ?>
																</div>
																<div class="content-position div-delete"><strong>Degree or Certificate: </strong><?php echo ($user_edu['degree_or_certificate']) ? $user_edu['degree_or_certificate'] : ''; ?>
																	</div><div class="start-date div-delete"><strong>Start Date: </strong><?php echo ($user_edu['start_date']) ? $user_edu['start_date'] : ''; ?>
																	</div><div class="end-date div-delete"><strong>End Date: </strong><?php echo ($user_edu['end_date']) ? $user_edu['end_date'] : ''; ?>
																</div>
																<hr>
															</div>
															
														<?php }  ?>
														
													</div>
												</div>
											</div>
										<?php }  ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 aboutMeWrap">
							<div class="panel">
								<!--<div class="panel-heading">
									<video width="100%" height="250" controls>
									<source src="<?php echo asset_url(); ?>vcard_detail_view/media/Maroon 5 - Sugar.mp4" type="video/mp4">
									<source src="<?php echo asset_url(); ?>vcard_detail_view/media/Maroon 5 - Sugar.ogg" type="video/ogg">
									Your browser does not support the video tag.
									</video>
								</div>-->
								<?php if(!empty($user_blog)) { ?>
									<div class="panel-body">
										<h4>Blog</h4>
										<?php foreach($user_blog as $ub) { 
											if(!empty($ub['cover_image']))
											{
											?>
											<img   width="100%" height="250"  src="<?php echo base_url(); ?><?php echo $ub['cover_image']; ?>" /><br>
										<?php } ?>
										<?php if(!empty($ub['video'])) { ?>
											<video width="100%" height="250" controls>
												<source src="<?php echo base_url(); ?><?php echo $ub['video']; ?>" type="video/mp4">	
											</video>
										<?php } ?>
										<?php if(!empty($ub['video_url'])) { ?>
											<iframe  width="100%" height="250" class="embed-responsive-item" src="<?php echo $ub['video_url']; ?>"></iframe>
											
										<?php } ?>
										<h5><?php echo $ub['title']; ?></h5>
										<p>
											<?php echo $string = character_limiter($ub['short_desc'], 250);  ?>
										</p>
										<p class="text-right"><a href="#" >Read More...</a></p>
										<?php } ?>
									</div>
								<?php } ?>
							</div>
						</div>
						<div class="col-sm-12 col-md-4 facebookCommentWrap">
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
									<div class="col-xs-12">
										<textarea class="form-control"></textarea>
									</div>
									<div class="col-xs-12">
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


<script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail_view/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail_view/js/bootstrap.min.js"></script>
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

<!-- custom scrollbar plugin -->
<script src="<?php echo asset_url(); ?>vcard_detail_view/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo asset_url(); ?>vcard_detail_view/js/vcard-custom.js"></script>

<script type="text/javascript">
	// audio player script start
	// html5media enables <video> and <audio> tags in all major browsers
	// External File: http://api.html5media.info/1.1.8/html5media.min.js
	
	
	// Add user agent as an attribute on the <html> tag...
	// Inspiration: http://css-tricks.com/ie-10-specific-styles/
	var b = document.documentElement;
	b.setAttribute('data-useragent', navigator.userAgent);
	b.setAttribute('data-platform', navigator.platform);
	
	
	// HTML5 audio player + playlist controls...
	// Inspiration: http://jonhall.info/how_to/create_a_playlist_for_html5_audio
	// Mythium Archive: https://archive.org/details/mythium/
	jQuery(function ($) {
		var response_new;
		$.ajax({
			url:"<?php echo base_url();?>getaudiolist",
			type:'POST',
			data:{"slug":"<?php echo $user[0]['slug'];?>"},
			// data:{"slug":"ss"},
			success:function(response){
				var response=JSON.parse(response);
				// console.log(response);
				// response_new=response;
				// for (i=0; i < obj.length; i++){
				// alert(obj.name);
				
				// }
				//**********************************************************************************
				var supportsAudio = !!document.createElement('audio').canPlayType;
				if (supportsAudio) {
					// alert(response);
					
					var index = 0,
					playing = false,
					// mediaPath = 'https://archive.org/download/mythium/',
					mediaPath = 'http://localhost/RPDigitel/paas-port/uploads/media/audio/40/',
					extension = '',
					
					// tracks = [{
					// "track": 1,
					// "name": "1499082702aaaaaaaa",
					// "length": "6:21",
					// "file": "1499082702aaaaaaaa"
					// }],
					// tracks =[{"track":"29","name":"audio_test","file":"audio_test","length":"6:12"},{"track":"30","name":"audio_testsss","file":"audio_testsss","length":"6:12"}],
					tracks =response,
					buildPlaylist = $.each(tracks, function(key, value) {
						var trackNumber = value.track,
						trackName = value.name,
						trackLength = value.length;
						if (trackNumber.toString().length === 1) {
							trackNumber = '0' + trackNumber;
							} else {
							trackNumber = '' + trackNumber;
						}
						$('#plList').append('<li><div class="plItem"><div class="plNum">' + trackNumber + '.</div><div class="plTitle">' + trackName + '</div><div class="plLength">' + trackLength + '</div></div></li>');
					}),
					trackCount = tracks.length,
					npAction = $('#npAction'),
					npTitle = $('#npTitle'),
					audio = $('#audio1').bind('play', function () {
						playing = true;
						npAction.text('Now Playing...');
						}).bind('pause', function () {
						playing = false;
						npAction.text('Paused...');
						}).bind('ended', function () {
						npAction.text('Paused...');
						if ((index + 1) < trackCount) {
							index++;
							loadTrack(index);
							audio.play();
							} else {
							audio.pause();
							index = 0;
							loadTrack(index);
						}
					}).get(0),
					btnPrev = $('#btnPrev').click(function () {
						if ((index - 1) > -1) {
							index--;
							loadTrack(index);
							if (playing) {
								audio.play();
							}
							} else {
							audio.pause();
							index = 0;
							loadTrack(index);
						}
					}),
					btnNext = $('#btnNext').click(function () {
						if ((index + 1) < trackCount) {
							index++;
							loadTrack(index);
							if (playing) {
								audio.play();
							}
							} else {
							audio.pause();
							index = 0;
							loadTrack(index);
						}
					}),
					li = $('#plList li').click(function () {
						var id = parseInt($(this).index());
						if (id !== index) {
							playTrack(id);
						}
					}),
					loadTrack = function (id) {
						$('.plSel').removeClass('plSel');
						$('#plList li:eq(' + id + ')').addClass('plSel');
						npTitle.text(tracks[id].name);
						index = id;
						audio.src = mediaPath + tracks[id].file + extension;
					},
					playTrack = function (id) {
						loadTrack(id);
						audio.play();
					};
					extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';
					loadTrack(index);
				}
				//**********************************************************************************
				
				// alert(response);
			}
			
		});
		
		// alert(response_new);
		
	});
	
	// audio player script end
</script>

