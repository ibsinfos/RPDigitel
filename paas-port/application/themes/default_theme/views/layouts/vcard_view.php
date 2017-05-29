<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Paasport</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href="<?php echo asset_url(); ?>vcard_detail_view/css/bootstrap.min.css"  rel="stylesheet" />
		<link href="<?php echo asset_url(); ?>vcard_detail_view/font-awesome/css/font-awesome.min.css"  rel="stylesheet" />
		<link href="<?php echo asset_url(); ?>vcard_detail_view/css/jquery.mCustomScrollbar.min.css"  rel="stylesheet" />
		<link href="<?php echo asset_url(); ?>vcard_detail_view/css/vcard-style.css"  rel="stylesheet" />
		
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
		<![endif]-->
		<body>
			<!-- Navigation -->
			<!--Start Header -->
			<?php
				if (isset($template['partials']['header'])) {
					echo $template['partials']['header'];
				}
			?>        
			<!--End Header -->
			<!--Start Body -->
			<?php echo $template['body']; ?>
			<!--End Body -->
			
		</body>
	</html>		