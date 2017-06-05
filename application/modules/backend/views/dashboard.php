
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-lg-9"> 
            <?php
				$msg = $this->session->userdata('msg');
			?>
            <?php if ($msg != '') { ?>
                <div class="msg_box alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" id="msg_close" name="msg_close">X</button>
                    <?php
						echo $msg;
						$this->session->unset_userdata('msg');
					?> 
				</div>
                <?php
				}
			?> 
            <!--<div class="page-title">            
                <div class="title_left">                
				<h3>Dashboard</h3>            
                </div>            
                <div class="title_right">                
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">                    
				<div class="input-group">                        
				<input type="text" class="form-control" placeholder="Search for...">                        
				<span class="input-group-btn">                            
				<button class="btn btn-default" type="button">Go!</button>                        
				</span>                    
				</div>                
				</div>            
                </div>        
				</div> 
				<div class="row">            
                <div class="col-md-12 col-sm-12 col-xs-12">                
				<div class="x_panel">                    
				<div class="x_title">                        
				<h2>Dashboard</h2>                        
				<ul class="nav navbar-right panel_toolbox">                            
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                            
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				<i class="fa fa-wrench"></i>
				</a>                                
				<ul class="dropdown-menu" role="menu">                                    
				<li><a href="#">Settings 1</a></li>                                    
				<li><a href="#">Settings 2</a></li>                                
				</ul>                            
				</li>                            
				<li><a class="close-link"><i class="fa fa-close"></i></a></li>                        
				</ul>                        
				<div class="clearfix"></div>                    
				</div>                    
				<div class="x_content">Dashboard content goes here... :-)</div>                
				</div>            
                </div>        
			</div>  -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="personalInfoWrap text-center">
                        <div class="musicianWrap">
                            <div class="btnColumn">
                               <a href="<?php echo backend_passport_url(); ?>paasport-update/<?php echo $user[0]['id'];  ?>" > <button class="btn subscribeBtn">Edit</button></a>
                                
							</div>
                            <div class="musicianImageName">
								<?php
										$userImg=backend_asset_url()."images/img.jpg";	
										if(!empty($user[0]['user_image']))
											$userImg=backend_passport_url().$user[0]['user_image'];
								?>	
                                <img src="<?php echo $userImg; ?>" alt="" class="img-circle">
                                <p class="musicianName text-muted"><?php echo ($user[0]['first_name'])?$user[0]['first_name']:''; ?> <?php echo ($user[0]['last_name'])?$user[0]['last_name']:''; ?></p>
                                <p class="text-muted"><?php echo ($user[0]['home_address'])?$user[0]['home_address']:''; ?></p>
							</div>
                            <div class="btnColumn">
                                <button class="btn shareBtn" data-toggle="modal" data-target="#myModal">Share</button>
							</div>
						</div>
						<?php if(!empty($user[0]['job_title'])) { ?>
                        <p class="profession"><?php echo ($user[0]['job_title'])?$user[0]['job_title']:''; ?></p>
						<?php } ?>
						<?php if(!empty($user[0]['start_date']) && $user[0]['start_date']!='0000-00-00') { ?>
                        <p>Member Since <?php echo ($user[0]['start_date'])?$user[0]['start_date']:''; ?></p>
						<?php } ?>
					</div>
                    <!-- <div class="audioPlayerWrap row">
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
					</div> -->
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
					
                    <ul class="list-group infoListWrap">
						<li class="list-group-item clearfix">
							<i class="fa fa-eye"></i> Projects views <span class="pull-right">210587</span>
						</li>
						<li class="list-group-item clearfix">
							<i class="fa fa-thumbs-o-up"></i> Appreciations <span class="pull-right">14335</span>
						</li>
						<li class="list-group-item clearfix">
							<i class="fa fa-user-plus"></i> Followers <span class="pull-right">2208</span>
						</li>
						<li class="list-group-item clearfix">
							<i class="fa fa-user-plus"></i> Following <span class="pull-right">0</span>
						</li>
					</ul>
					
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <strong>
											<?php
												
												
												// session_start();
												// $_SESSION['testt']='123';
												
												//print_r($_SESSION);
												// exit;
												
											?>
										About Me</strong>
									</a>
								</h4>
							</div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body mCustomScrollbar">
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
								</div>
							</div>
						</div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <strong>My Values</strong>
										</a>
									</h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									<div class="panel-body mCustomScrollbar">
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
									</div>
									</div>
									</div>
									</div>
									</div>
									<div class="col-sm-8">
									<div class="navTabWrap">
									<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#projects" aria-controls="projects" role="tab" data-toggle="tab">Projects</a></li>
									<li role="presentation"><a href="#media" aria-controls="media" role="tab" data-toggle="tab">Media</a></li>
									<li role="presentation"><a href="#playlist" aria-controls="playlist" role="tab" data-toggle="tab">Playlist</a></li>
									<li role="presentation"><a href="#blog" aria-controls="blog" role="tab" data-toggle="tab">Blog</a></li>
									</ul>
									<button class="btn bg-red">Go Live</button>
									</div>
									<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="projects">
									<div class="row">
									<div class="col-sm-6">
                                    <div class="panel panel-default">
									<div class="panel-heading">
									<img src="<?php echo backend_asset_url() ?>images/cropper.jpg" alt="" class="img-responsive">
									</div>
									<div class="panel-body">
									<p>Interaction Design UI/UX, Web Design</p>
									<div class="table authorWrap">
									<div class="tableCol authorImage"><img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="" class="img-circle img-responsive"></div>
									<div class="tableCol projectBy">by <strong>Hoang Nguyon</strong></div>
									</div>
									</div>
									<div class="panel-footer">
									<div class="row">
									<div class="col-xs-4">
									<i class="fa fa-thumbs-o-up"></i> 360
									</div>
									<div class="col-xs-4">
									<i class="fa fa-eye"></i> 710
									</div>
									<div class="col-xs-4">
									<i class="fa fa-comment-o"></i> 20
									</div>
									</div>
									</div>
                                    </div>
									</div>
									<div class="col-sm-6">
                                    <div class="panel panel-default">
									<div class="panel-heading">
									<img src="<?php echo backend_asset_url() ?>images/cropper.jpg" alt="" class="img-responsive">
									</div>
									<div class="panel-body">
									<p>Interaction Design UI/UX, Web Design</p>
									<div class="table authorWrap">
									<div class="tableCol authorImage"><img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="" class="img-circle img-responsive"></div>
									<div class="tableCol projectBy">by <strong>Hoang Nguyon</strong></div>
									</div>
									</div>
									<div class="panel-footer">
									<div class="row">
									<div class="col-xs-4">
									<i class="fa fa-thumbs-o-up"></i> 360
									</div>
									<div class="col-xs-4">
									<i class="fa fa-eye"></i> 710
									</div>
									<div class="col-xs-4">
									<i class="fa fa-comment-o"></i> 20
									</div>
									</div>
									</div>
                                    </div>
									</div>
									<div class="col-md-12">
                                    <div class="commentsWrap">
									<h4 class="heading">Comments (3)</h4>
									<p class="joinText">You must <a href="">Sign Up</a> to join the conversation.</p>
									<ul class="list-unstyled mCustomScrollbar">
									<li class="row">
									<div class="col-xs-2">
									<img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="" class="img-circle img-responsive">
									</div>
									<div class="col-xs-10">
									<div class="row">
									<div class="col-xs-6">
									<h5>Ravi Sah</h5>
									</div>
									<div class="col-xs-6">
									<small><i class="fa fa-clock-o"></i> May 27, 2015 at 3:14 am</small>
									</div>
									</div>
									<p class="commentDetails">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat.</p>
									</div>
									</li>
									<li class="row">
									<div class="col-xs-2">
									<img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="" class="img-circle img-responsive">
									</div>
									<div class="col-xs-10">
									<div class="row">
									<div class="col-xs-6">
									<h5>Ravi Sah</h5>
									</div>
									<div class="col-xs-6">
									<small><i class="fa fa-clock-o"></i> May 27, 2015 at 3:14 am</small>
									</div>
									</div>
									<p class="commentDetails">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat.</p>
									</div>
									</li>
									<li class="row">
									<div class="col-xs-2">
									<img src="<?php echo backend_asset_url() ?>images/img.jpg" alt="" class="img-circle img-responsive">
									</div>
									<div class="col-xs-10">
									<div class="row">
									<div class="col-xs-6">
									<h5>Ravi Sah</h5>
									</div>
									<div class="col-xs-6">
									<small><i class="fa fa-clock-o"></i> May 27, 2015 at 3:14 am</small>
									</div>
									</div>
									<p class="commentDetails">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat.</p>
									</div>
									</li>
									</ul>
                                    </div>
									</div>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="media">...</div>
									<div role="tabpanel" class="tab-pane" id="playlist">...</div>
									<div role="tabpanel" class="tab-pane" id="blog">...</div>
									</div>
									</div>
									</div>
									</div>
									<div class="col-lg-3 visible-lg musicicListShow">
									<div class="musicListWrap">
									<div class="hidden-lg text-center">
									<a href="javascript:void(0)" class="closeBtn"><i class="fa fa-times"></i></a>
									</div>
									<div id="nowPlay">
									<h4 class="" id="npTitle"></h4>
									</div>
									<div id="audiowrap">
									<div id="audio0">
									<audio preload id="audio1" controls="controls">Your browser does not support HTML5 Audio!</audio>
									</div>
									<div id="tracks">
									<a id="btnPrev" class="btn"><i class="fa fa-backward"></i></a>
									<a id="btnNext" class="btn"><i class="fa fa-forward"></i></a>
									</div>
									</div>
									<div id="plwrap" class="mCustomScrollbar">
									<ul id="plList" class="list-unstyled"></ul>
									</div>
									</div>
									</div>
									</div>
									</div>
									<!-- /page content -->
									
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
							<a href="//www.facebook.com/sharer/sharer.php?u=<?php echo $shorten_url; ?>" class="facebook"><i class="fa fa-facebook"></i></a>
						</li>
					
					
						<li>
							<a href="http://twitter.com/intent/tweet?url=<?php echo $shorten_url; ?>" class="twitter"><i class="fa fa-twitter"></i></a>
						</li>
					
					
						<li>
							<a href="//plus.google.com/share?url=<?php echo $shorten_url; ?>" class="googlePlus"><i class="fa fa-google-plus"></i></a>
						</li>
					
					
						<li>
							<a href="//pinterest.com/pin/create/button/?url=<?php echo $shorten_url; ?>" class="pinterest"><i class="fa fa-pinterest-p"></i></a>
						</li>
					
					
					<!--<li>
						<a href="" class="instagram"><i class="fa fa-instagram"></i></a>
					</li>-->
					
						<li>
							<a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $shorten_url; ?>" class="linkedin"><i class="fa fa-linkedin"></i></a>
						</li>
							
				</ul>
				<h4 class="modalHeading">Short URL for Sharing Page</h4>
				<p><a href=""><?php echo $shorten_url; ?></a></p>
				<?php if(!empty($user[0]['qr_code_image_ext']) && !empty($user[0]['qr_code_image'])) { ?>
					<h4 class="modalHeading">Scan QRCode for Link</h4>
					<img src="<?php echo 'data:' . $user[0]['qr_code_image_ext'] . ';base64,' . base64_encode($user[0]['qr_code_image']); ?>" width="200" />
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!--End Modal -->
								