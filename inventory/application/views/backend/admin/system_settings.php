<br>
<div class="row">
    <div class="col-md-2"></div>
	<div class="col-md-8">

        <div class="panel panel-default" >

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-cog"></i> <?php echo get_phrase('system_settings'); ?>
                </div>
            </div>

            <div class="panel-body">
                <?php echo form_open(base_url() . 'index.php?admin/system_settings/do_update', array(
                		'class' => 'form-horizontal form-groups validate' , 'enctype' => 'multipart/form-data'));
                ?>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('system_name'); ?></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="system_name"
                               value="<?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('system_title'); ?></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="system_title"
                               value="<?php echo $this->db->get_where('settings', array('type' => 'system_title'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('address'); ?></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="address"
                               value="<?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="phone"
                               value="<?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('system_email'); ?></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="system_email"
                               value="<?php echo $this->db->get_where('settings', array('type' => 'system_email'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('language'); ?></label>
                    <div class="col-sm-7">
                        <select name="language" class="selectboxit">
                            <?php
                            $fields = $this->db->list_fields('language');
                            foreach ($fields as $field) {
                                if ($field == 'phrase_id' || $field == 'phrase')
                                    continue;

                                $current_default_language = $this->db->get_where('settings', array('type' => 'language'))->row()->description;
                                ?>
                                <option value="<?php echo $field; ?>"
                                        <?php if ($current_default_language == $field) echo 'selected'; ?>> <?php echo $field; ?> </option>
                                        <?php
                                    }
                                    ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('text_align'); ?></label>
                    <div class="col-sm-7">
                        <select name="text_align" class="selectboxit">
                            <?php $text_align = $this->db->get_where('settings', array('type' => 'text_align'))->row()->description; ?>
                            <option value="left-to-right" <?php if ($text_align == 'left-to-right') echo 'selected'; ?>> left-to-right (LTR)</option>
                            <option value="right-to-left" <?php if ($text_align == 'right-to-left') echo 'selected'; ?>> right-to-left (RTL)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('system_currency'); ?></label>
                    <div class="col-sm-7">
                        <select name="currency_id" class="selectboxit">
                            <?php $system_currency_id = $this->db->get_where('settings', array('type' => 'currency_id'))->row()->description; ?>
                            <?php
                                $currencies = $this->db->get('currency')->result_array();
                                foreach($currencies as $row):
                            ?>
                            <option value="<?php echo $row['currency_id'];?>"
                                <?php if($system_currency_id == $row['currency_id']) echo 'selected';?>><?php echo $row['currency_name'];?> - <?php echo $row['currency_code'];?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('logo'); ?></label>
                    <div class="col-sm-7">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                <img src="uploads/logo.png" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="logo" accept="image/*">
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info btn-sm"><?php echo get_phrase('save'); ?></button>
                    </div>
                </div>

                <?php echo form_close(); ?>


            </div>

        </div>

    </div>


</div>

<div class="row">

    <div class="col-md-offset-2 col-md-8">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('update_product');?>
                </div>
            </div>


            <div class="panel-body form-horizontal form-groups-bordered">
                <?php echo form_open(base_url().'index.php?updater/update' , array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'));?>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('file'); ?></label>

                        <div class="col-sm-5">

                            <input type="file" name="file_name" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse" />

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <input type="submit" class="btn btn-info" value="<?php echo get_phrase('install_update'); ?>" />
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
	});

</script>
