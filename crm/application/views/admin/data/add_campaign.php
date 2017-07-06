<?= message_box('success'); ?>
<?= message_box('error'); ?>
<div class="nav-tabs-custom">

    <!-- Tabs within a box -->

    <ul class="nav nav-tabs">

        <li class="<?= $active == 1 ? 'active' : ''; ?>"><a href="#manage"

                                                            data-toggle="tab"><?= lang('all_campaign') ?></a></li>
            <?php if (false == isset($view)) { ?>

            <li class="<?= $active == 2 ? 'active' : ''; ?>"><a href="#create"

                                                                data-toggle="tab"><?= lang('new_campaign') ?></a></li>
            <li class="<?= $active == 3 ? 'active' : ''; ?>"><a href="#format"

                                                                data-toggle="tab"><?= lang('format_campaign') ?></a></li>
            <?php } ?>

    </ul>

    <div class="tab-content no-padding  bg-white">

        <!-- ************** general *************-->

        <div class="tab-pane <?= $active == 1 ? 'active' : ''; ?>" id="manage">

            <div class="table-responsive">

                <table class="table table-striped DataTables" id="DataTables1" style="width:100%;">

                    <thead>

                        <tr>

                            <th><?= lang('campain_date') ?></th>

                            <th><?= lang('campain_name') ?></th>

                            <th><?= lang('action') ?></th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        if (!empty($all_deposit_info)):

                            foreach ($all_deposit_info as $v_deposit) :
                                ?>

                                <tr>

                                    <td><?= strftime(config_item('date_format'), strtotime($v_deposit->campaign_date)); ?></td>

                                    <td><?= $v_deposit->campaign_name ?></td>

                                    <td>
                                        <?php if (false == isset($view)) { ?>

                                            <?= btn_delete('custom/data/delete_campaign/' . $v_deposit->campaign_id) ?>
                                            &nbsp;

                                            <?php
                                            /* echo btn_upload('custom/data/upload_campaign_file/' . $v_deposit->campaign_id); */

                                            echo btn_upload_data('custom/data/upload_campaign/' . $v_deposit->campaign_id);
                                        }
                                        ?> 
                                        &nbsp;
                                        <?php
                                        if (false == isset($view)) {
                                            echo btn_view_list('custom/data/campaign_list/' . $v_deposit->campaign_id);
                                        } else {
                                            echo btn_view_list('custom/data/data_campaign_formats/' . $v_deposit->campaign_id);
                                        }
                                        ?>
                                    </td>



                                </tr>



                                <?php
                            endforeach;

                        endif;
                        ?>



                    </tbody>

                </table>

            </div>

        </div>



        <div class="tab-pane <?= $active == 2 ? 'active' : ''; ?>" id="create">

            <form role="form" enctype="multipart/form-data" id="form"

                  action="<?php echo base_url(); ?>custom/data/save_campaign" method="post" class="form-horizontal" >



                <div class="form-group">

                    <label class="col-lg-3 control-label"><?= lang('campain_name') ?> <span class="text-danger">*</span></label>

                    <div class="col-lg-5">
                        <input type="text" name="campain_name" id="campain_name" required class="form-control" maxlength="30"/>
                        <div id="campaign_msg"></div>
                    </div>

                </div> 



                <div class="form-group">

                    <label class="col-lg-3 control-label"><?= lang('campain_date') ?></label>

                    <div class="col-lg-5">

                        <div class="input-group">

                            <input type="text" name="date" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>" data-date-format="<?= config_item('date_picker_format'); ?>">

                            <div class="input-group-addon">

                                <a href="#"><i class="fa fa-calendar"></i></a>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="form-group">

                    <label class="col-lg-3 control-label"></label>

                    <div class="col-lg-5">

                        <button type="submit" class="btn btn-sm btn-primary"><i

                                class="fa fa-check"></i> <?= lang('submit') ?></button>

                    </div>

                </div>

            </form>

        </div>

        <div class="tab-pane <?= $active == 3 ? 'active' : ''; ?>" id="format">

            <form role="form" enctype="multipart/form-data" id="form"

                  action="<?php echo base_url(); ?>custom/data/save_data_format" method="post" class="form-horizontal" onSubmit="return findDuplicates();">


                <div class="form-group">

                    <label class="col-lg-3 control-label"><?= lang('new_table') ?> <span class="text-danger">*</span></label>

                    <div class="col-lg-5">
                        <input type="text" name="table_name" id="table_name" required class="form-control"  maxlength="30" />
                        <div id="format_msg"></div>
                    </div>

                </div> 
                <div class="form-group">
                    <label class="col-lg-3 control-label">Add Table Columns</label><div id="column_msg"></div>
                </div> 
                <div class="form-group">

                    <label class="col-lg-3 control-label">Column Name 1 <span class="text-danger">*</span></label>

                    <div class="col-lg-5">
                        <input type="text" name="column_name[]" id="column_name1"  required class="form-control" maxlength="30"  />

                    </div>
                    <span data-placement="top" data-toggle="tooltip"
                          title="<?= lang('add_more') ?>">
                        <a href="javascript:void(0);"
                           class="add_field_button signup text-default ml"><i class="fa fa-plus"></i>&nbsp Add More</a>
                    </span>

                </div> 

                <div class="input_fields_wrap2"></div> 

                <div class="form-group">

                    <label class="col-lg-3 control-label"></label>

                    <div class="col-lg-5">

                        <button type="submit" class="btn btn-sm btn-primary"><i

                                class="fa fa-check"></i> <?= lang('submit') ?></button>

                    </div>

                </div>

                <div class="table-responsive">

                    <table class="table table-striped DataTables" id="DataTables" style="width:100%;">

                        <thead>

                            <tr>

                                <th><?= lang('new_table') ?></th>

                                <th><?= lang('format_date') ?></th>

                                <th><?= lang('action') ?></th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            if (!empty($formats)):

                                foreach ($formats as $format) :
                                    ?>

                                    <tr>

                                                                   <!-- <td><?= $format->format_name ?></td> -->
                                        <td> <?php
                                            $fields = str_replace('tbl_', ' ', $format->table_name);
                                            echo ucwords(str_replace('_', ' ', $fields));
                                            ?></td>

                                        <td><?= strftime(config_item('date_format'), strtotime($format->created_date)); ?></td>

                                        <td>
                                            <?php echo btn_view_column('custom/data/campaign_formats/' . $format->id); ?>
                                            <?php echo btn_add_column('custom/data/add_column/' . $format->id);
                                            ?>
                                        </td>


                                    </tr>



                                    <?php
                                endforeach;

                            endif;
                            ?>



                        </tbody>

                    </table>

                </div>


            </form>

        </div>
    </div>

</div>


<script type="text/javascript">
    $(document).ready(function () {
        var max_fields = 30; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap2"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        var y = 2;
        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment	
                $(wrapper).append('<div class="form-group">' +
                        '<label class="col-lg-3 control-label">Column Name ' + y + '<span class="text-danger">*</span></label>' +
                        '<div class="col-lg-5"><input type="text" name="column_name[]" required class="form-control" maxlength="30" id="column_name' + y + '" /></div>' +
                        '<a href="#" class="remove_field signup remCF"><i class="fa fa-times"></i>&nbsp;Remove</a></div>'); //add input box
                y++;
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })

    });

    $(document).ready(function () {
        // validate Main Form

        $("#campain_name").change(function () {
            var campaign = this.value;
            campaign = campaign.trim();
            campaign = campaign.replace(/\s+/g, " ");
            campaign = campaign.toLowerCase();

            if ('' != campaign) {
                $.ajax({
                    url: '<?php echo base_url(); ?>custom/data/checkCampaign',
                    type: 'post',
                    data: 'campaign=' + campaign,
                    success: function (data) {
                        if ('true' == data) {
                            $("#campaign_msg").html('<font color="red">Campaign already exists.</font>');
                            $("#campain_name").val('');
                            $("#campain_name").focus();
                        } else {
                            $("#campaign_msg").html('');
                        }

                    }
                });
            } else {
                $("#campaign_msg").html('<font color="red">Campaign name is empty.</font>');
                $("#campain_name").val('');
                $("#campain_name").focus();
            }
        });

        $("#table_name").change(function () {

            var format = this.value;
            format = format.trim();
            format = format.replace(/\s+/g, " ");
            format = format.toLowerCase();

            if ('' != format) {
                $.ajax({
                    url: '<?php echo base_url(); ?>custom/data/checkformat',
                    type: 'post',
                    data: 'format=' + format,
                    success: function (data) {
                        if ('true' == data) {
                            $("#format_msg").html('<font color="red">Table name already exists.</font>');
                            $("#table_name").val('');
                            $("#table_name").focus();
                        } else {
                            $("#format_msg").html('');
                        }

                    }
                });
            } else {
                $("#format_msg").html('<font color="red">Table name is empty.</font>');
                $("#table_name").val('');
                $("#table_name").focus();
            }
        });

    });

    function findCampaign() {
        var isValid = false;
		var campaign = $("#campain_name").val();

        $.ajax({
            url: '<?php echo base_url(); ?>custom/data/checkCampaign',
            type: 'post',
            data: 'campaign=' + campaign,
            success: function (data, isValid) {

                if ('true' == data) {
                    var isValid = true;
                    return isValid;
                }

            }

        });

    }

    function findTable() {

        var isTable = false;
        var table_name = $("#table_name").val();

        $.ajax({
            url: '<?php echo base_url(); ?>custom/data/checkformat',
            type: 'post',
            data: 'format=' + table_name,
            success: function (data, isTable) {

                if ('true' == data) {
                    isTable = true;
                    return;
                }
            }
        });

        return isTable;
    }

    function findDuplicates() {

        var isDuplicate = false;
		var isEmpty = false;
        $("input[name^='column_name[]']").each(function (i, el1) {
            var current_val = $(el1).val();
            current_val = current_val.trim();
            current_val = current_val.replace(/\s+/g, " ");
            if (current_val != "") {
                $("input[name^='column_name[]']").each(function (i, el2) {
                    var next_val = $(el2).val();
                    next_val = next_val.trim();
                    next_val = next_val.replace(/\s+/g, " ");

                    if (next_val == current_val && $(el1).attr("id") != $(el2).attr("id")) {
                        isDuplicate = true;
                        return;
                    }
                });
            }
			else
			{
				isEmpty = true;
				return 
			}
        });
        if (isDuplicate) {
			$("#column_msg").html( '<font color="red">Duplicate column names found.</font>' );
			return false;
		} 
		else if(isEmpty)
		{
			   $("#column_msg").html('');
				$("#column_msg").html( '<font color="red"> Column names Cannot Be Empty.</font>' );
				return false;
		}
		
		else {
			$("#column_msg").html( '' );
			return true;
		}
    }
</script>
