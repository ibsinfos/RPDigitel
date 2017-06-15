<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="assets/images/favicon.png">

	<title><?php echo $this->info_model->get_settings('system_name');?></title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container horizontal-menu">


	<header class="navbar navbar-fixed-top">


	</header>

	<?php
		$purchase_order_info = $this->db->get_where('purchase_order' , array(
			'purchase_order_id' => $purchase_order_id
		))->result_array();
		foreach($purchase_order_info as $info):
			$invoice_code = $this->db->get_where('invoice' , array(
				'order_id' => $purchase_order_id , 'order_type' => 'purchase'
			))->row()->invoice_code;
	?>

	<div class="main-content">

		<br class="hidden-print" />
		<div class="invoice">
			<div class="row">
				<div class="col-sm-5 invoice-left" style="font-size: 16px; font-weight: 100; color: #626262;">
					<a href="#">
						<img src="uploads/logo.png" width="60" alt="" />
					</a>
					<?php echo $this->info_model->get_settings('system_name');?>
				</div>

				<div class="col-sm-3 invoice-left">
					<i class="entypo-user"></i> &nbsp;<?php echo $this->info_model->get_user_info_from_id($info['supplier_user_id'] , 'name');?>
					<br />
					<i class="entypo-mail"></i> &nbsp;<?php echo $this->info_model->get_user_info_from_id($info['supplier_user_id'] , 'email');?>
					<br />
					<i class="entypo-phone"></i> &nbsp;<?php echo $this->info_model->get_user_info_from_id($info['supplier_user_id'] , 'phone');?>
				</div>

				<div class="col-sm-4 invoice-right">
					<h3><?php echo get_phrase('order');?>. #<?php echo $info['purchase_order_code'];?></h3>
					<h3><?php echo get_phrase('invoice');?>. #<?php echo $invoice_code;?></h3>
					<span><?php echo date('D, d M Y' , $info['date_raised']);?></span>
				</div>

			</div>


			<hr class="margin" />

			<div class="margin"></div>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th width="3%" class="text-center">#</th>
						<th width="50%"><?php echo get_phrase('products');?></th>
						<th><?php echo get_phrase('price');?></th>
						<th class="text-center" width="7%"><?php echo get_phrase('quantity');?></th>
						<th class="text-right"><?php echo get_phrase('sub_total');?></th>
					</tr>
				</thead>

				<tbody>
				<?php
					$count = 1;
					$ordered_products = json_decode($info['purchase_order_entries']);
					foreach($ordered_products as $product):
						$product_id = $this->db->get_where('variant' , array(
							'variant_id' => $product->variant_id
						))->row()->product_id;
						$type = $this->db->get_where('variant' , array(
							'variant_id' => $product->variant_id
						))->row()->type;
						$specification = $this->db->get_where('variant' , array(
							'variant_id' => $product->variant_id
						))->row()->specification;
						$in_stock = $this->db->get_where('variant' , array(
							'variant_id' => $product->variant_id
						))->row()->quantity;
						$is_variant = $this->db->get_where('variant' , array(
							'variant_id' => $product->variant_id
						))->row()->is_variant;
				?>
					<tr>
						<td class="text-center"><?php echo $count++;?></td>
						<td>
							<?php
								if($is_variant == 0)
									echo $this->db->get_where('product' , array('product_id' => $product_id))->row()->name;
								if($is_variant == 1)
									echo $this->db->get_where('product' , array(
										'product_id' => $product_id
									))->row()->name . ' - ' . $type . ' : ' . $specification;
							?>
						</td>
						<td><?php echo $product->cost_price;?></td>
						<td class="text-center"><?php echo $product->ordered_quantity;?></td>
						<td class="text-right">
							<?php echo $this->info_model->get_currency_symbol();?> <?php echo $product->sub_total;?>
						</td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>

			<div class="margin"></div>

			<div class="row">

				<div class="col-sm-6">

					<div class="invoice-left">
						<i class="entypo-location"></i> &nbsp;<?php echo $this->info_model->get_settings('address');?>
						<br />
						<i class="entypo-phone"></i> &nbsp;<?php echo $this->info_model->get_settings('phone');?>
						<br />
						<i class="entypo-mail"></i> &nbsp;<?php echo $this->info_model->get_settings('system_email');?>
					</div>

				</div>

				<div class="col-sm-6">

					<div class="invoice-right">

						<ul class="list-unstyled">
							<li>
								<?php echo get_phrase('total_amount');?> : <strong><?php echo $this->info_model->get_currency_symbol();?> <?php echo $info['total_amount'];?></strong>
							</li>
						</ul>
					</div>

				</div>

			</div>

		</div>


		<footer class="main">
			&copy; 2016 <strong>BIJOY</strong> | <a href="http://creativeitem.com" target="_blank">Creativeitem</a>
		</footer>

	</div>

<?php endforeach;?>

</div>


	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>
