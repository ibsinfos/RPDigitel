<?php
	$system_currency_id = $this->db->get_where('settings' , array('type' =>'system_currency_id'))->row()->description;
	$this->db->where('currency_id', $system_currency_id);
	$currency_symbol = $this->db->get('currency')->row()->currency_symbol;

	$this->db->where('code', $param2);
	$payment_details = $this->db->get('payment')->row_array();
	$this->db->where('video_pack_id', $payment_details['video_pack_id']);
	$video_pack_details = $this->db->get('video_pack')->row_array();
	$this->db->where('code', $payment_details['buyer_code']);
	$user_details = $this->db->get('user')->row_array();
	$this->db->where('video_pack_code', $video_pack_details['code']);
	$number_of_videos = $this->db->get('video')->num_rows();
?>
<div class="row">
	<div class="col-md-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-pencil"></i> &nbsp;
          <?php echo get_phrase('payment_details');?>
				</div>
			</div>
      <div class="panel-body">
        <!-- form start -->
				<?php echo form_open(site_url('admin/user/edit/'.$param2), array(
          'class' => 'form-groups form-horizontal ajax-submit', 'enctype' => 'multipart/form-data'
        ));?>

          <div class="form-group">
          	<label class="col-sm-3 control-label">
              <?php echo get_phrase('payment_code'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-code"></i></span>
          			<input type="text" class="form-control" value="<?php echo $payment_details['code'];?>" disabled style = "background: none; cursor: auto;">
          		</div>
          	</div>
          </div>

          <div class="form-group">
          	<label class="col-sm-3 control-label">
              <?php echo get_phrase('video_pack'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-play"></i></span>
          			<input type="text" class="form-control" value="<?php echo $video_pack_details['title'];?>" disabled style = "background: none; cursor: auto;">
          		</div>
          	</div>
          </div>

          <div class="form-group">
          	<label class="col-sm-3 control-label">
              <?php echo get_phrase('number_of_videos'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-video-camera"></i></span>
          			<input type="text" class="form-control" value="<?php echo $number_of_videos;?>" disabled style = "background: none; cursor: auto;">
          		</div>
          	</div>
          </div>

          <div class="form-group">
          	<label class="col-sm-3 control-label">
              <?php echo get_phrase('price'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-money"></i></span>
          			<input type="text" class="form-control" value="<?php echo $currency_symbol.' '.$video_pack_details['price'];?>" disabled style = "background: none; cursor: auto;">
          		</div>
          	</div>
          </div>

          <div class="form-group">
          	<label class="col-sm-3 control-label">
              <?php echo get_phrase('payment_method'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
          			<input type="text" class="form-control" value="<?php echo $payment_details['payment_method'];?>" disabled style = "background: none; cursor: auto;">
          		</div>
          	</div>
          </div>

		<div class="form-group">
          	<label class="col-sm-3 control-label">
              <?php echo get_phrase('buyer_name'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-user"></i></span>
          			<input type="text" class="form-control" value="<?php echo $user_details['name'];?>" disabled style = "background: none; cursor: auto;">
          		</div>
          	</div>
          </div>

          <div class="form-group">
          	<label class="col-sm-3 control-label">
              <?php echo get_phrase('buyer_phone'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-phone"></i></span>
          			<input type="text" class="form-control" value="<?php echo $user_details['phone'];?>" disabled style = "background: none; cursor: auto;">
          		</div>
          	</div>
          </div>

          <div class="form-group">
          	<label class="col-sm-3 control-label">
              <?php echo get_phrase('buyer_email'); ?>
            </label>
          	<div class="col-sm-7">
          		<div class="input-group">
          			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
          			<input type="text" class="form-control" value="<?php echo $user_details['email'];?>" disabled style = "background: none; cursor: auto;">
          		</div>
          	</div>
          </div>

          <div class="form-group">
					<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('user_image'); ?></label>
						<?php echo $user_details['user_id']; ?>
						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 300px; height: 100px;" data-trigger="fileinput">
									<img src="<?php echo base_url('uploads/user_image/'.$user_details['user_id'].'.jpg'); ?>" width: '250px' height: '100px' alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
							</div>
						</div>
					</div>



				<?php echo form_close();?>
        <!-- form end -->
			</div>
		</div>
	</div>
</div>
