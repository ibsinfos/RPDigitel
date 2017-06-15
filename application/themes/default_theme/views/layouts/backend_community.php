<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php if (isset($template['title'])) echo $template['title']; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- Bootstrap -->
		<link href="<?php echo backend_asset_url() ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="<?php echo backend_asset_url() ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo backend_asset_url() ?>/css/community.css"  rel="stylesheet" />
                <?php if($page == 'event'){ ?>
		<link href="<?php echo backend_asset_url() ?>/css/news.css"  rel="stylesheet" />
                <?php } ?>
		
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
		<![endif]-->
		<body>
			
		
			<?php if (isset($template['partials']['header'])) echo $template['partials']['header']; ?>
			<?php echo $template['body']; ?>
			<?php if (isset($template['partials']['footer'])) echo $template['partials']['footer']; ?>
			
			
			
			<!-- jQuery -->
			<script src="<?php echo backend_asset_url() ?>/vendors/jquery/dist/jquery.min.js"></script>
			<!-- Bootstrap -->
			<script src="<?php echo backend_asset_url() ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
			<!-- Custom -->
			<script src="<?php echo backend_asset_url() ?>/js/community-custom.js"></script>
		</body>
	</html>