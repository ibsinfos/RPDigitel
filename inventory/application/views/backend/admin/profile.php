<?php 
	$profile_info = $this->db->get_where('user' , array(
		'user_id' => $this->session->userdata('login_user_id')
	))->result_array();
	foreach($profile_info as $info):
?>
<div class="row">
	<!-- panel for editing profile information -->
	<?php echo form_open(base_url() . 'index.php?admin/profile/do_update', array(
    		'class' => 'form-horizontal form-groups validate' , 'enctype' => 'multipart/form-data'));
    ?>
	<div class="col-md-6">

		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title"><?php echo get_phrase('edit_profile_information');?></div>
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
					
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon"><i class="entypo-user"></i></span>
							<input type="text" class="form-control" name="name"
								value="<?php echo $info['name'];?>">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
					
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon"><i class="entypo-mail"></i></span>
							<input type="text" class="form-control" name="email"
								value="<?php echo $info['email'];?>">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
					
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon"><i class="entypo-phone"></i></span>
							<input type="text" class="form-control" name="phone"
								value="<?php echo $info['phone'];?>">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>
					
					<div class="col-sm-8">
						<select class="form-control selectboxit" name="gender">
							<option value="1" <?php if($info['gender'] == 1) echo 'selected';?>><?php echo get_phrase('male');?></option>
							<option value="2" <?php if($info['gender'] == 2) echo 'selected';?>><?php echo get_phrase('female');?></option>
						</select>
					</div>
				</div>

				<div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('image'); ?></label>
                    <div class="col-sm-8">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                <img src="uploads/user_image/<?php echo $info['user_code'];?>.jpg" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                <span class="btn btn-default btn-file">
                                    <span class="fileinput-new"><?php echo get_phrase('select_image');?></span>
                                    <span class="fileinput-exists"><?php echo get_phrase('change');?></span>
                                    <input type="file" name="profile_image" accept="image/*">
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group">
					<label class="col-sm-3 control-label"></label>
					
					<div class="col-sm-8">
						<button type="submit" id="submit_button" class="btn btn-green btn-icon icon-left btn-sm">
							<?php echo get_phrase('save_changes');?>		
							<i class="entypo-check"></i>
						</button>
					</div>
				</div>

			</div>
		</div>
		
	</div>
	
	<?php echo form_close();?>
	<!-- panel for changing password -->

	<?php echo form_open(base_url() . 'index.php?admin/profile/change_password', array(
    		'class' => 'form-horizontal form-groups validate' , 'enctype' => 'multipart/form-data'));
    ?>
	<div class="col-md-6">

		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title"><?php echo get_phrase('change_password');?></div>
			</div>
			<div class="panel-body">

			<div class="form-group">
				<label class="col-sm-4 control-label"><?php echo get_phrase('current_password');?></label>
				
				<div class="col-sm-8">
					<input type="password" class="form-control" name="current_password">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-4 control-label"><?php echo get_phrase('new_password');?></label>
				
				<div class="col-sm-8">
					<input type="password" class="form-control" name="new_password">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-4 control-label"><?php echo get_phrase('confirm_password');?></label>
				
				<div class="col-sm-8">
					<input type="password" class="form-control" name="confirm_password">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-4 control-label"></label>
				
				<div class="col-sm-8">
					<button type="submit" id="submit_button" class="btn btn-green btn-icon icon-left btn-sm">
						<?php echo get_phrase('update_password');?>		
						<i class="entypo-check"></i>
					</button>
				</div>
			</div>
				
				
			</div>
		</div>
		
	</div>
	<?php echo form_close();?>


</div>
<?php endforeach;?>

<script type="text/javascript">

	// ajax form plugin calls at each modal loading,
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