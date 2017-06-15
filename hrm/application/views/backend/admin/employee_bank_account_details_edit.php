<?php
$bank = $this->db->get_where('bank',array('bank_id'=>$row['bank_id']))->result_array();
foreach ($bank as $row4):
?>
<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('account_holder_name'); ?></label>

    <div class="col-sm-7">
        <input type="text" class="form-control" name="account_holder_name" value="<?php echo $row4['account_holder_name'] ?>" required />
    </div>
</div>
<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('account_number'); ?></label>

    <div class="col-sm-7">
        <input type="text" class="form-control" name="account_number" value="<?php echo $row4['account_number'] ?>" required />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('bank_name'); ?></label>

    <div class="col-sm-7">
        <input type="text" class="form-control" name="bank_name" value="<?php echo $row4['name'] ?>" required>
    </div> 
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('branch'); ?></label>

    <div class="col-sm-7">
        <input type="text" class="form-control" name="branch" value="<?php echo $row4['branch'] ?>" >
    </div> 
</div>
<?php endforeach; ?>