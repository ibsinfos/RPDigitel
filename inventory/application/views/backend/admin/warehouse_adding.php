<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('add_new_warehouse');?>
				</div>
			</div>

			<div class="panel-body">

				<!-- <?php echo form_open(base_url() . 'index.php?admin/warehouse/create/' , array(
							'class' => 'form-horizontal form-groups ajax-submit' , 'enctype' => 'multipart/from-data'));?> -->
        <div class="form-horizontal form-groups">
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('warehouse_title');?></label>

						<div class="col-sm-7">
							<input type="text" id="warehouse_title" class="form-control" name="warehouse_title" value="" required="true" autofocus="true">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('manager');?></label>

						<div class="col-sm-7">
							<select class="form-control selectboxit" name="" id = "manager_list" required="true">
							   <option value=""><?php echo get_phrase('choose_warehouse_manager'); ?></option>
							   <?php
								 		$get_all_manager = $this->warehouse_model->get_all_manager();
										foreach ($get_all_manager as $key) {
											echo "<option value = '".$key['user_code']."'>".$key['name']."</option>";
										}
								 ?>
							</select>
						</div>
					</div>

          <div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>

						<div class="col-sm-7">
							<input type="text" id="warehouse_address" class="form-control" name="warehouse_address" placeholder = "<?php echo get_phrase('warehouse_address');?>" value = "" required="true">
						</div>
					</div>

          <div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('phone_numnber');?></label>

						<div class="col-sm-7">
							<input type="text" id="phone_numnber" class="form-control" name="phone_number" placeholder = "Enter phone number" value = "" required="true">
						</div>
					</div>

          <div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('notes');?></label>

						<div class="col-sm-7">
							<textarea class="form-control" rows="5" id="note" style="resize: none;" value = "" placeholder = "Notes"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"></label>

						<div class="col-sm-7">
							<button type="submit" id = "warehouse_adding_button" class="btn btn-blue btn-icon icon-left">
								<?php echo get_phrase('save');?>
								<i class="entypo-check"></i>
							</button>
							<span id="preloader-form"></span>
						</div>
					</div>
        </div>
				<!-- <?php echo form_close();?> -->

			</div>

		</div>

	</div>
</div>
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

      var warehouse_title;
      var manager;
      var warehouse_address;
      var phone_number;
      var note;

			$('#warehouse_title').keyup(function(){
			 warehouse_title = $('#warehouse_title').val();
		  });
			$('#warehouse_address').keyup(function(){
			 warehouse_address = $('#warehouse_address').val();
		  });
			$('#phone_numnber').keyup(function(){
			 phone_number = $('#phone_numnber').val();
		  });
			$('#note').keyup(function(){
			 note = $('#note').val();
		  });
			$('#manager_list').change(function(){
			 manager = $('#manager_list').val();
		  });

      $("#warehouse_adding_button").click(function()
			{
        if($.trim(warehouse_title) === "" || $.trim(warehouse_address) === "" || $.trim(phone_numnber) === "" || manager === ""){
						toastr.error('Fill all the fields');
				}
				else{
					if($.trim(note) === "")
					{
						note = "(No Note Available)";
					}
					//alert(warehouse_title+"--"+warehouse_address+"--"+manager+"--"+phone_numnber+"--"+note);
					$.ajax({
						type:    'POST',
						url:     'index.php?admin/warehouse',
						data:    { warehouse_title:warehouse_title, warehouse_address:warehouse_address, phone_number:phone_number, note:note, manager:manager, action:'create' },
						success: function(data){
							location.reload();
						}
					});
				}
      });
    });
</script>
