
<br>
<!-- printing_view -->
<!-- <div class="panel-options pull-right">
  <a href="<?php echo base_url();?>index.php?admin/warehouse_details_print_view/"
    class="tooltip-primary" data-toggle="tooltip" id ="cmd" target="_blank"
    data-placement="top" title="" data-original-title="<?php echo get_phrase('print');?>">
    <i class="glyphicon glyphicon-print" style="color: #676767; margin-top: 15px;"></i>
  </a>
  &nbsp; &nbsp;
</div> -->
<div class="col-md-4 col-md-offset-4" style="margin-bottom: 10px;">
  <select class="form-control selectboxit" name="select_warehouse" id = "select_warehouse" onchange="this_change()">
    <option value="all">All</option>
    <?php
    $all_warehouse = $this->warehouse_model->get_warehouse_name();
    foreach ($all_warehouse as $key) {
      echo "<option  value = '".$key['warehouse_code']."'>".$key['warehouse_title']."</option>";
    }
    ?>
  </select>
</div>

<div class="row" id = "content">
	<div class="col-md-12 panel-body with-table warehouse_details_table_body">
		<?php include 'warehouse_details_table.php'?>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>/index.php/assets/js/jspdf.js"></script>
<script type="text/javascript">
var warehouse_selector;
var sum = 0;

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

function this_change(){
  warehouse_selector = jQuery('#select_warehouse').val();
  $.ajax({
    type: 'POST',
    url: 'index.php?admin/dynamic_change_of_warehouse',
    data:{warehouse_selector:warehouse_selector},
    success:function(data){
      $('.warehouse_details_table_body').html(data);
    }
  });
}

// iterate through each td based on class and add the values
$(".warehouse_quantity").each(function() {

    var value = $(this).text();
    // add only if the value is number
    if(!isNaN(value) && value.length != 0) {
        sum += parseFloat(value);
    }
});
$('.total_warehouse_quantity').html(sum);
</script>
