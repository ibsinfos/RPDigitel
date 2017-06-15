<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="assets/images/favicon.png">

	<title><?php echo $page_title;?> | <?php echo $this->info_model->get_settings('system_name');?></title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<!-- RTL SETTINGS -->
    <?php if ($text_align == 'right-to-left') :?>
    	<link rel="stylesheet" href="assets/css/neon-rtl.css">
	<?php endif;?>

	<script src="assets/js/jquery-1.11.3.min.js"></script>



	<!-- AMCHARTS -->
	<script src="assets/amcharts/amcharts.js"></script>
	<script src="assets/amcharts/serial.js"></script>
	<script src="assets/amcharts/pie.js"></script>
	<script src="assets/amcharts/themes/light.js"></script>
	<script src="assets/amcharts/plugins/export/export.js"></script>
	<script src="assets/amcharts/plugins/export/export.css"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
