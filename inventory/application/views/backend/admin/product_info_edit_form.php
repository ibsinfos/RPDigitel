<?php 
	$has_variant = $this->db->get_where('product' , array(
		'product_code' => $product_code
	))->row()->variant;
	$product_id  = $this->db->get_where('product' , array(
		'product_code' => $product_code
	))->row()->product_id;
	if($has_variant == 0):
?>

<?php echo form_open(base_url() . 'index.php?admin/product/product_info_edit_no_variant/' . $product_id , array(
		'class' => 'form-horizontal form-groups' , 'enctype' => 'multipart/form-data'));?>

	<div class="col-md-3">
		
		<div class="fileinput fileinput-new" data-provides="fileinput">
			<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
				<?php if(file_exists('uploads/product_image/' . $product_id . '.jpg')):?>
					<img src="uploads/product_image/<?php echo $product_id;?>.jpg" alt="...">
				<?php endif;?>
				<?php if(!(file_exists('uploads/product_image/' . $product_id . '.jpg'))):?>
					<img src="assets/no_image.png" alt="...">
				<?php endif;?>
			</div>
			<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
			<div>
				<span class="btn btn-default btn-file">
					<span class="fileinput-new"><?php echo get_phrase('select_image');?></span>
					<span class="fileinput-exists"><?php echo get_phrase('change');?></span>
					<input type="file" name="product_image" accept="image/*">
				</span>
				<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove');?></a>
			</div>
		</div>

	</div>

	<div class="col-md-3">

		<label class="control-label"><?php echo get_phrase('product_code');?></label>
		<input type="text" name="product_code" id="product_code" class="form-control" 
			value="<?php echo $product_code;?>">

		<label class="control-label"><?php echo get_phrase('product_name');?></label>
		<input type="text" name="name" id="name" class="form-control" 
			value="<?php echo $this->product_model->get_info_by_product_code($product_code , 'name');?>">

		<label class="control-label"><?php echo get_phrase('brand');?></label>
		<input type="text" name="brand" id="brand" class="form-control" 
			value="<?php echo $this->product_model->get_info_by_product_code($product_code , 'brand');?>">

		<label class="control-label"><?php echo get_phrase('category');?></label>
		<select class="selectboxit" name="product_category_id" id="category_id">
			<option value=""><?php echo get_phrase('select_a_category');?></option>
			<?php 
				$categories = $this->db->get('product_category')->result_array();
				foreach($categories as $row):
			?>
				<option value="<?php echo $row['product_category_id'];?>"
					<?php if($row['product_category_id'] == $this->product_model->get_info_by_product_code($product_code , 'product_category_id'))
						echo 'selected';?>>
							<?php echo $row['name'];?>
				</option>
			<?php endforeach;?>
		</select>

	</div>

	<div class="col-md-3">
		
		<label class="control-label"><?php echo get_phrase('cost_price');?></label>
		<input type="text" name="cost_price" id="cost_price" class="form-control" 
			value="<?php echo $this->db->get_where('variant' , array('code' => $product_code))->row()->cost_price;?>">

		<label class="control-label"><?php echo get_phrase('selling_price');?></label>
		<input type="text" name="selling_price" id="selling_price" class="form-control" 
			value="<?php echo $this->db->get_where('variant' , array('code' => $product_code))->row()->selling_price;?>">

		<label class="control-label"><?php echo get_phrase('in_stock');?></label>
		<input type="text" name="quantity" id="quantity" class="form-control" 
			value="<?php echo $this->db->get_where('variant' , array('code' => $product_code))->row()->quantity;?>">

		<label class="control-label"><?php echo get_phrase('alert_quantity');?></label>
		<input type="text" name="alert_quantity" id="alert_quantity" class="form-control" 
			value="<?php echo $this->db->get_where('variant' , array('code' => $product_code))->row()->alert_quantity;?>">

	</div>

	<div class="col-md-3">
		
		<label class="control-label"><?php echo get_phrase('description');?></label>
		<textarea class="form-control" name="description" id="description"><?php echo $this->product_model->get_info_by_product_code($product_code , 'description');?></textarea>
		<br>
		<button type="submit" class="btn btn-info btn-icon icon-left btn-sm">
			<?php echo get_phrase('update_product_info');?>
			<i class="entypo-check"></i>
		</button>
		<span id="preloader-form"></span>

	</div>

<?php echo form_close();?>

<?php endif;?>

<?php if($has_variant == 1):?>

<?php echo form_open(base_url() . 'index.php?admin/product/product_info_edit_has_variant/' . $product_id , array(
		'class' => 'form-horizontal form-groups' , 'enctype' => 'multipart/form-data'));?>

	<div class="col-md-3">
		
		<div class="fileinput fileinput-new" data-provides="fileinput">
			<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
				<?php if(file_exists('uploads/product_image/' . $product_id . '.jpg')):?>
					<img src="uploads/product_image/<?php echo $product_id;?>.jpg" alt="...">
				<?php endif;?>
				<?php if(!(file_exists('uploads/product_image/' . $product_id . '.jpg'))):?>
					<img src="assets/no_image.png" alt="...">
				<?php endif;?>
			</div>
			<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
			<div>
				<span class="btn btn-default btn-file">
					<span class="fileinput-new"><?php echo get_phrase('select_image');?></span>
					<span class="fileinput-exists"><?php echo get_phrase('change');?></span>
					<input type="file" name="product_image" accept="image/*">
				</span>
				<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove');?></a>
			</div>
		</div>

	</div>

	<div class="col-md-3">

		<label class="control-label"><?php echo get_phrase('product_code');?></label>
		<input type="text" name="product_code" id="product_code" class="form-control" 
			value="<?php echo $product_code;?>">

		<label class="control-label"><?php echo get_phrase('product_name');?></label>
		<input type="text" name="name" id="name" class="form-control" 
			value="<?php echo $this->product_model->get_info_by_product_code($product_code , 'name');?>">

		<label class="control-label"><?php echo get_phrase('brand');?></label>
		<input type="text" name="brand" id="brand" class="form-control" 
			value="<?php echo $this->product_model->get_info_by_product_code($product_code , 'brand');?>">

		<label class="control-label"><?php echo get_phrase('category');?></label>
		<select class="selectboxit" name="product_category_id" id="category_id">
			<option value=""><?php echo get_phrase('select_a_category');?></option>
			<?php 
				$categories = $this->db->get('product_category')->result_array();
				foreach($categories as $row):
			?>
				<option value="<?php echo $row['product_category_id'];?>"
					<?php if($row['product_category_id'] == $this->product_model->get_info_by_product_code($product_code , 'product_category_id'))
						echo 'selected';?>>
							<?php echo $row['name'];?>
				</option>
			<?php endforeach;?>
		</select>

	</div>

	<div class="col-md-3">
		
		<label class="control-label"><?php echo get_phrase('description');?></label>
		<textarea class="form-control" name="description" id="description"><?php echo $this->product_model->get_info_by_product_code($product_code , 'description');?></textarea>
		<br>
		<button type="submit" class="btn btn-info btn-icon icon-left btn-sm">
			<?php echo get_phrase('update_product_info');?>
			<i class="entypo-check"></i>
		</button>
		<span id="preloader-form"></span>

	</div>

<?php echo form_close();?>

<?php endif;?>



<script type="text/javascript">

	$(document).ready(function() {

		// SelectBoxIt Dropdown replacement
		if($.isFunction($.fn.selectBoxIt))
		{
			$("select.selectboxit").each(function(i, el)
			{
				var $this = $(el),
					opts = {
						showFirstOption: attrDefault($this, 'first-option', true),
						'native': attrDefault($this, 'native', false),
						defaultText: attrDefault($this, 'text', ''),
					};

				$this.addClass('visible');
				$this.selectBoxIt(opts);
			});
		}

	});

</script>