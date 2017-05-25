<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-light">
    <div class="" style="width:90%;margin:0 auto;">
		<button class="navbar-toggler navbar-toggler-right pull-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand pull-left" href="#">
			<img src="
				<?php echo asset_url()?>img/Novae.png"
			</a>
			<div class="collapse navbar-collapse float-right col-md-8 offset-md-3" id="navbarCollapse">
				    <ul class="navbar-nav mr-auto">
				<?php if ($page == 'home' && !isset($_SERVER['PATH_INFO'])) { ?>
					<li class="nav-item 
						<?php if ($page == 'home') echo 'active'; ?>">
						<a class="nav-link" href="
							<?php echo base_url() ?>">Home 
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item 
						<?php if ($page == 'howitworks') echo 'active'; ?>">
						<a class="nav-link" href="javascript:;" id="works" onclick="">How System works
						</a>
					</li>
					<li class="nav-item 
						<?php if ($page == 'pricing') echo 'active'; ?>">
						<a class="nav-link" href="javascript:;" id="pricing">Pricing
						</a>
					</li>
					<li class="nav-item 
						<?php if ($page == 'contact') echo 'active'; ?>">
						<a class="nav-link" href="
							<?php echo base_url() ?>contact">Contact Us
						</a>
					</li>
				<?php } elseif ($page == 'contact') { ?>
					<li class="nav-item 
						<?php if ($page == 'home') echo 'active'; ?>">
						<a class="nav-link" href="
							<?php echo base_url() ?>">Home 
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item 
						<?php if ($page == 'howitworks') echo 'active'; ?>">
						<a class="nav-link" href="<?php echo base_url() ?>homepage?how-it-works" id="works" onclick="">How System works
						</a>
					</li>
					<li class="nav-item 
						<?php if ($page == 'pricing') echo 'active'; ?>">
						<a class="nav-link" href="<?php echo base_url() ?>homepage?pricing-plan" id="pricing">Pricing
						</a>
					</li>
					<li class="nav-item 
						<?php if ($page == 'contact') echo 'active'; ?>">
						<a class="nav-link" href="
							<?php echo base_url() ?>contact">Contact Us
						</a>
					</li>
				<?php } elseif(isset($_SERVER['PATH_INFO'])){ ?>
					<li class="nav-item 
						<?php if ($page == 'home') echo 'active'; ?>">
						<a class="nav-link" href="
							<?php echo base_url() ?>">Home 
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item 
						<?php if ($page == 'howitworks') echo 'active'; ?>">
						<a class="nav-link" href="<?php echo base_url() ?>homepage?how-it-works" id="works">How System works
						</a>
					</li>
					<li class="nav-item 
						<?php if ($page == 'pricing') echo 'active'; ?>">
						<a class="nav-link" href="<?php echo base_url() ?>homepage?pricing-plan" id="pricing">Pricing
						</a>
					</li>
					<li class="nav-item 
						<?php if ($page == 'contact') echo 'active'; ?>">
						<a class="nav-link" href="
							<?php echo base_url() ?>contact">Contact Us
						</a>
					</li>
				<?php } ?>
				</ul>
				<!-- <input class="form-control mr-sm-2" type="text" placeholder="Search"> -->
				<button onclick="location.href='<?php echo base_url() ?>login';" class="form-inline btn btn-outline btn-outline-warning my-2 my-sm-0" type="submit">SIGN IN
				</button>
			</div>
		</div>
	</nav>