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
