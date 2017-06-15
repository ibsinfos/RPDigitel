<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Neon Admin Panel" />
		<meta name="author" content="" />
		<?php $favicon = $this->db->get_where('settings' , array('type' =>'favicon'))->row()->description; ?>
		<link rel="icon" href="<?php echo base_url('assets/backend/images/'.$favicon);?>">

		<title><?php echo get_phrase('login'); ?> | <?php echo get_settings('system_name'); ?></title>

	<link rel="stylesheet"
		href="<?php echo base_url('assets/backend/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css');?>">
	<link rel="stylesheet"
		href="<?php echo base_url('assets/backend/css/font-icons/entypo/css/entypo.css');?>">
	<link rel="stylesheet"
		href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet"
		href="<?php echo base_url('assets/backend/css/bootstrap.css');?>">
	<link rel="stylesheet"
		href="<?php echo base_url('assets/backend/css/neon-core.css');?>">
	<link rel="stylesheet"
		href="<?php echo base_url('assets/backend/css/neon-theme.css');?>">
	<link rel="stylesheet"
		href="<?php echo base_url('assets/backend/css/neon-forms.css');?>">

	<script src="<?php echo base_url('assets/backend/js/jquery-1.11.3.min.js');?>"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
	//var baseurl = '<?php echo base_url();?>';
	var site_url = '<?php echo site_url();?>';
</script>

<div class="login-container">

	<div class="login-header login-caret">

		<div class="login-content">

			<a href="#" class="logo">
				<?php $logo = $this->db->get_where('settings' , array('type' =>'logo'))->row()->description; ?>
					<img src="<?php echo base_url('assets/backend/images/'.$logo);?>" width="100" alt="" />
			</a>

			<h4 style="color: #ccc; font-weight: 100; font-size: 20px;"><?php echo get_settings('system_name'); ?></h4>

			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>

	</div>

	<div class="login-progressbar">
		<div></div>
	</div>

	<div class="login-form">

		<div class="login-content">

			<form method="post" role="form" id="form_forgot_password">

				<div class="form-forgotpassword-success">
					<i class="entypo-check"></i>
					<h3>Reset email has been sent.</h3>
					<p>Please check your email, reset password link will expire in 24 hours.</p>
				</div>

				<div class="form-steps">

					<div class="step current" id="step-1">

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-mail"></i>
								</div>

								<input type="text" class="form-control" name="email" id="email" placeholder="Email" data-mask="email" autocomplete="off" />
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-info btn-block btn-login">
								<?php echo get_phrase('reset_password');?>
								<i class="entypo-right-open-mini"></i>
							</button>
						</div>

					</div>

				</div>

			</form>


			<div class="login-bottom-links">

				<a href="<?php echo site_url('login');?>" class="link">
					<i class="entypo-lock"></i>
					<?php echo get_phrase('return_to_login_page');?>
				</a>

			</div>

		</div>

	</div>

</div>


	<!-- Bottom scripts (common) -->
	<script src="<?php echo base_url('assets/backend/js/gsap/TweenMax.min.js');?>"></script>
	<script src="<?php echo base_url('assets/backend/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js');?>"></script>
	<script src="<?php echo base_url('assets/backend/js/bootstrap.js');?>"></script>
	<script src="<?php echo base_url('assets/backend/js/joinable.js');?>"></script>
	<script src="<?php echo base_url('assets/backend/js/resizeable.js');?>"></script>
	<script src="<?php echo base_url('assets/backend/js/neon-api.js');?>"></script>
	<script src="<?php echo base_url('assets/backend/js/jquery.validate.min.js');?>"></script>
	<script src="<?php echo base_url('assets/backend/js/neon-forgotpassword.js');?>"></script>
	<script src="<?php echo base_url('assets/backend/js/jquery.inputmask.bundle.js');?>"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo base_url('assets/backend/js/neon-custom.js');?>"></script>


	<!-- Demo Settings -->

	<script src="<?php echo base_url('assets/backend/js/neon-demo.js'); ?>"></script>

</body>
</html>
