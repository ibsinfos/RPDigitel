<?php
	$info = $this->db->get_where('warehouse' , array(
		'warehouse_code' => $param2
	))->result_array();
	foreach($info as $row):
?>
<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('edit_warehouse');?>
				</div>
			</div>

			<div class="panel-body">

				<!-- <?php echo form_open(base_url() . 'index.php?admin/product_category/edit/'.$param2 , array(
							'class' => 'form-horizontal form-groups ajax-submit' , 'enctype' => 'multipart/from-data'));?> -->
          <div class="form-horizontal form-groups ajax-submit">

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('code');?></label>

						<div class="col-sm-7">
							<input type="text" id="warehouse_code" class="form-control" name="warehouse_code"
								value="<?php echo $row['warehouse_code'];?>">
								<span><?php echo get_phrase('the_code_must_be_unique'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('warehouse_title');?></label>

						<div class="col-sm-7">
							<input type="text" id="warehouse_title" class="form-control" name="warehouse_title"
								value="<?php echo $row['warehouse_title'];?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('manager');?></label>

						<div class="col-sm-7">
						 <select class="form-control selectboxit" name="warehouse_manager" id = "warehouse_manager">
               <option value=""><?php echo get_phrase('choose_warehouse_manager'); ?></option>
               <?php
               $manager_code = $row['warehouse_user_code'];
               $this->db->where('type',5);
               $query = $this->db->get('user');
               $query_result = $query->result_array();
               foreach ($query_result as $key) {
                 if($key['user_code'] == $manager_code){
                   echo "<option value='".$key['user_code']."' selected>".$key['name']."</option>";
                 }
                 else{
                   echo "<option value='".$key['user_code']."'>".$key['name']." </option>";
                 }
               }
               ?>
						 </select>
						</div>
					</div>

          <div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>

						<div class="col-sm-7">
							<input type="text" id="warehouse_address" class="form-control" name="warehouse_address" value="<?php echo $row['warehouse_address'];?>">
						</div>
					</div>

          <div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('phone_numnber');?></label>

						<div class="col-sm-7">
							<input type="text" id="warehouse_phone_number" class="form-control" name="warehouse_phone_numnber" value="<?php echo $row['warehouse_phone_number'];?>">
						</div>
					</div>

          <div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('note');?></label>

						<div class="col-sm-7">
							<textarea class = "form-control" id = "warehouse_note" name="warehouse_note" rows="5" style="resize:none;" ><?php echo $row['warehouse_note'];?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"></label>

						<div class="col-sm-7">
							<button type="submit" id = "update_warehouse" class="btn btn-green btn-icon icon-left">
								<?php echo get_phrase('update');?>
								<i class="entypo-check"></i>
							</button>
							<span id="preloader-form"></span>
						</div>
					</div>

				<!-- <?php echo form_close();?> -->

			</div>

		</div>

	</div>
</div>
</div>
<?php endforeach;?>

<script type="text/javascript">
var warehouse_code         = $('#warehouse_code').val();
var warehouse_title        = $('#warehouse_title').val();
var manager                = $('#warehouse_manager').val();
var warehouse_address      = $('#warehouse_address').val();
var warehouse_phone_number = $('#warehouse_phone_number').val();
var warehouse_note         = $('#warehouse_note').val();;
$('#warehouse_title').keyup(function(){
   warehouse_title = $('#warehouse_title').val();
});
$('#warehouse_manager').change(function(){
   manager = $('#warehouse_manager').val();
});
$('#warehouse_address').keyup(function(){
   warehouse_address = $('#warehouse_address').val();
});
$('#warehouse_phone_number').keyup(function(){
   warehouse_phone_number = $('#warehouse_phone_number').val();
});
$('#warehouse_note').keyup(function(){
   warehouse_note = $('#warehouse_note').val();
});
$('#update_warehouse').click(function(){
  if($.trim(warehouse_title) === "" || $.trim(warehouse_address) === "" || $.trim(warehouse_phone_number) === "" || manager === ""){
    alert("Fill Every Field!!!");
  }
  else{
    if($.trim(warehouse_note) === "")
    {
      warehouse_note = "(No Note Available)";
    }
    $.ajax({
      type: 'POST',
      url: 'index.php?admin/warehouse',
      data:{warehouse_code:warehouse_code, warehouse_title:warehouse_title, manager:manager, warehouse_address:warehouse_address, warehouse_phone_number:warehouse_phone_number, warehouse_note:warehouse_note, action:'edit'},
      success:function(data){
        location.reload();
      }

    });
    //alert(warehouse_title+warehouse_address+warehouse_phone_number+manager+warehouse_note);
  }
});
</script>

<script type="text/javascript">
	$(document).ready(function(){
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
