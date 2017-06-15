
<?php 
	$product_info	=	$this->db->get_where('product' , array(
		'product_code' => $product_code
	))->result_array();
	foreach($product_info as $row):
?>

<div class="row">
	<div class="col-md-12">
			
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					<strong>
						<?php echo $row['name'];?>
					</strong>
				</div>
			</div>
				
			<div class="panel-body">
				<div id="product_info">
					<div class="col-sm-4">
						<img src="uploads/product_image/<?php echo $row['product_id'];?>.jpg" class="img-responsive">
						<br>
						<?php echo $row['description'];?>
						<br><br>
						<button type="button" class="btn btn-info btn-icon icon-left btn-sm"
							onclick="get_product_info_edit_form()">
							<?php echo get_phrase('edit_product_info');?>
							<i class="entypo-pencil"></i>
						</button>
					</div>

					<div class="col-sm-1"></div>

					<div class="col-sm-3">
						<table class="table table-responsive">
							<tbody>
								<tr>
									<td style="border: none;">
										<strong><?php echo get_phrase('product_code');?></strong>
									</td>
									<td style="border: none;">
										<strong>:</strong>
									</td>
									<td style="border: none;">
										<strong><?php echo $row['product_code'];?></strong>
									</td>
								</tr>
								<tr>
									<td style="border: none;">
										<strong><?php echo get_phrase('brand');?></strong>
									</td>
									<td style="border: none;">
										<strong>:</strong>
									</td>
									<td style="border: none;">
										<strong><?php echo $row['brand'];?></strong>
									</td>
								</tr>
								<tr>
									<td style="border: none;">
										<strong><?php echo get_phrase('category');?></strong>
									</td>
									<td style="border: none;">	
										<strong>:</strong>
									</td>
									<td style="border: none;">
										<strong>
											<?php echo $this->db->get_where('product_category' , array(
												'product_category_id' => $row['product_category_id']
											))->row()->name;?>
										</strong>
									</td>
								</tr>
								<?php if($row['variant'] == 0):?>
								<tr>
									<td style="border: none;">
										<strong><?php echo get_phrase('cost_price');?></strong>
									</td>
									<td style="border: none;">
										<strong>:</strong>
									</td>
									<td style="border: none;">
										<strong>
											<?php echo $this->info_model->get_currency_symbol();?>
											<?php echo $this->db->get_where('variant' , array(
												'code' => $row['product_code']
											))->row()->cost_price;?>
										</strong>
									</td>
								</tr>
								<tr>
									<td style="border: none;">
										<strong><?php echo get_phrase('selling_price');?></strong>
									</td>
									<td style="border: none;">
										<strong>:</strong>
									</td>
									<td style="border: none;">
										<strong>
											<?php echo $this->info_model->get_currency_symbol();?>
											<?php echo $this->db->get_where('variant' , array(
												'code' => $row['product_code']
											))->row()->selling_price;?>
										</strong>
									</td>
								</tr>
								<?php endif;?>
								<tr>
									<td style="border: none;">
										<strong><?php echo get_phrase('date_created');?></strong>
									</td>
									<td style="border: none;">	
										<strong>:</strong>
									</td>
									<td style="border: none;">
										<strong>
											<?php if($row['date_added'] != '') echo date('D, d M Y' , $row['date_added']);?>
										</strong>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<?php if($row['variant'] == 0):?>
						<div class="col-sm-2">
							<table class="table table-responsive">
								<tbody>
									
									<tr>
										<td style="border: none;">
											<strong><?php echo get_phrase('in_stock');?></strong>
										</td>
										<td style="border: none;">	
											<strong>:</strong>
										</td>
										<td style="border: none;">
											<strong>
												<?php echo $this->db->get_where('variant' , array(
													'code' => $row['product_code']
												))->row()->quantity;?>
											</strong>
										</td>
									</tr>
									<tr>
										<td style="border: none;">
											<strong><?php echo get_phrase('alert_quantity');?></strong>
										</td>
										<td style="border: none;">	
											<strong>:</strong>
										</td>
										<td style="border: none;">
											<strong>
												<?php echo $this->db->get_where('variant' , array(
													'code' => $row['product_code']
												))->row()->alert_quantity;?>
											</strong>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>

	</div>
</div>

<?php if($row['variant'] == 1):?>

	<div class="variant_list">
		<?php include 'product_details_variant_list.php';?>
	</div>

<?php endif;?>

<?php endforeach;?>



<script type="text/javascript">
	var product_code = '<?php echo $product_code;?>'
	function get_product_info_edit_form()
	{
		$.ajax({
			url: '<?php echo base_url();?>index.php?employee/product_info_edit_form/' + product_code,
			success: function(response)
			{
				jQuery('#product_info').html(response);
			}
		});
	}
</script>




