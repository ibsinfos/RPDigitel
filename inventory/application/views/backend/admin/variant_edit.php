<?php
	$variant_info = $this->db->get_where('variant' , array(
		'variant_id' => $param2
	))->result_array();
	foreach($variant_info as $info):
?>
<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('edit_variant');?>
				</div>
			</div>

			<div class="panel-body">

				<?php echo form_open(base_url() . 'index.php?admin/variant/edit/' . $param2 , array(
							'class' => 'form-horizontal form-groups' , 'enctype' => 'multipart/form-data'));?>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('code');?></label>

						<div class="col-sm-7">
							<input type="text" id="code" class="form-control" name="code"
								value="<?php echo $info['code'];?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('type');?></label>

						<div class="col-sm-7">
							<input type="text" id="type" class="form-control" name="type"
								value="<?php echo $info['type'];?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('specification');?></label>

						<div class="col-sm-7">
							<input type="text" id="specification" class="form-control" name="specification"
								value="<?php echo $info['specification'];?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('cost_price');?></label>

						<div class="col-sm-7">
							<input type="text" id="cost_price" class="form-control" name="cost_price"
								value="<?php echo $info['cost_price'];?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('selling_price');?></label>

						<div class="col-sm-7">
							<input type="number" id="selling_price" class="form-control" name="selling_price"
								value="<?php echo $info['selling_price'];?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('stock');?></label>

						<div class="col-sm-7">
							<input type="text" id="quantity" class="form-control" name="quantity"
								value="<?php echo $info['quantity'];?>" disabled = "true">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('alert_quantity');?></label>

						<div class="col-sm-7">
							<input type="text" id="alert_quantity" class="form-control" name="alert_quantity"
								value="<?php echo $info['alert_quantity'];?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"></label>

						<div class="col-sm-7">
							<button type="submit" class="btn btn-info btn-icon icon-left">
								<?php echo get_phrase('update');?>
								<i class="entypo-check"></i>
							</button>
							<span id="preloader-form"></span>
						</div>
					</div>

				<?php echo form_close();?>

			</div>

		</div>

	</div>
</div>
<?php endforeach;?>
