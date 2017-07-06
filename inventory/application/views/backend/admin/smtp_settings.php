<br>
<div class="row">
    <div class="col-md-2"></div>
	<div class="col-md-8">

        <div class="panel panel-default" >

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-cog"></i> SMTP <?php echo get_phrase('configurations'); ?>
                </div>
            </div>

            <div class="panel-body">
                <?php echo form_open(base_url() . 'index.php?admin/save_smtp_settings' , array(
                    'class' => 'form-horizontal','target'=>'_top' , 'enctype' => 'multipart/form-data'
                        ));
                ?>
                <?php
                $smtp       =   $this->db->get_where('settings' , array('type' => 'smtp_settings'))->row()->description;
                $smtp_entries = json_decode($smtp);

                ?>

                <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('smtp_email'); ?></label>

                        <div class="col-sm-7 controls">
                           <?php $v = $smtp_entries->smtp_email; ?>
                            <?php $options = array('Disable'=>'Disable[ if disabled php mail() function will be used]','Enable'=>'Enable');?>
                            <select class="form-control selectboxit" name="smtp_email" id="enable_smtp">
                                <?php foreach ($options as $key => $value) {
                                    $sel = ($v==$key)?'selected="selected"':'';
                                ?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $value;?></option>
                                <?php
                                }?>
                            </select>
                            <input type="hidden" name="smtp_email_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('smtp_email'); ?>
                        </div>
                    </div>

                    <span id="enable-panel">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('smtp_host'); ?></label>

                        <div class="col-sm-7 controls">
                            <?php $v = $smtp_entries->smtp_host;?>
                            <input type="text" name="smtp_host" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>" class="form-control" >
                            <input type="hidden" name="smtp_host_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('smtp_host'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('smtp_port'); ?></label>

                        <div class="col-sm-7 controls">
                            <?php $v = $smtp_entries->smtp_port;?>
                            <input type="text" name="smtp_port" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>" class="form-control" >
                            <input type="hidden" name="smtp_port_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('smtp_port'); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('smtp_timeout'); ?></label>

                        <div class="col-sm-7 controls">
                            <?php $v = $smtp_entries->smtp_timeout;?>
                            <input type="text" name="smtp_timeout" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>" class="form-control" >
                            <input type="hidden" name="smtp_timeout_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('smtp_timeout'); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('smtp_user'); ?></label>

                        <div class="col-sm-7 controls">
                            <?php $v = $smtp_entries->smtp_user;?>
                            <input type="text" name="smtp_user" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>" class="form-control" >
                            <input type="hidden" name="smtp_user_rules" value="required|valid_email">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('smtp_user'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('smtp_password'); ?></label>

                        <div class="col-sm-7 controls">
                            <?php $v = $smtp_entries->smtp_pass;?>
                            <input type="text" name="smtp_pass" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>" class="form-control" >
                            <input type="hidden" name="smtp_pass_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('smtp_pass'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('charset'); ?></label>

                        <div class="col-sm-7 controls">
                           <?php $v = $smtp_entries->char_set;?>
                            <input type="text" name="char_set" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>" class="form-control" >
                            <input type="hidden" name="char_set_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('char_set'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('New Line'); ?></label>

                        <div class="col-sm-7 controls">
                           <?php $v = $smtp_entries->new_line;?>
                            <input type="text" name="new_line" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>" class="form-control" >
                            <input type="hidden" name="new_line_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('new_line'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('Mail Type'); ?></label>

                        <div class="col-sm-7 controls">
                           <?php $v = $smtp_entries->mail_type;?>
                            <input type="text" name="mail_type" value="<?php echo $v;?>" placeholder="<?php echo get_phrase('type_something');?>" class="form-control" >
                            <input type="hidden" name="mail_type_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('mail_type'); ?>
                        </div>
                    </div>
                    </span>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info btn-sm"><?php echo get_phrase('update'); ?></button>
                        </div>
                    </div>

                <?php echo form_close(); ?>


            </div>

        </div>

    </div>


</div>


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

        jQuery('#enable_smtp').change(function(){
            var val = jQuery(this).val();
            if(val=='Enable')
            {
                jQuery('#enable-panel').show();
            }
            else
            {
                jQuery('#enable-panel').hide();
            }
        }).change();

	});

</script>
