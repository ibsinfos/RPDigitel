<?php 
	$products = $this->db->get_where('product' , array(
		'product_category_id' => $product_category_id
	))->result_array();
?>
<div class="col-md-4">
    <select class="form-control selectpicker" id="product_list" multiple data-actions-box="true"
    	name="variant_id[]">
    	<?php 
    		foreach($products as $product):
    			$variants = $this->db->get_where('variant' , array('product_id' => $product['product_id']))->result_array();
    				foreach($variants as $variant):
    	?>
       					<option value="<?php echo $variant['variant_id'];?>">
       						<?php 
       							if($variant['is_variant'] == 0) {
       								echo $this->db->get_where('product' , array('product_id' => $variant['product_id']))->row()->name;
       							} else {
       								echo $this->db->get_where('product' , array('product_id' => $variant['product_id']))->row()->name .
       								 ' - ' . $variant['type'] . ' - ' . $variant['specification'];
       							}

       						?>
       					</option>

       				<?php endforeach;?>
   		<?php endforeach;?>
    </select>
</div>

<script type="text/javascript">

	// ajax form plugin calls at each modal loading,
    $(document).ready(function() {
    	$('.selectpicker').selectpicker();
	});

</script>