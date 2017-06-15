
<style type="text/css">
	
	#chartdiv {
		width: 100%;
		height: 500px;
		font-size: 11px;
}

.amcharts-pie-slice {
	transform: scale(1);
	transform-origin: 50% 50%;
	transition-duration: 0.3s;
	transition: all .3s ease-out;
	-webkit-transition: all .3s ease-out;
	-moz-transition: all .3s ease-out;
	-o-transition: all .3s ease-out;
	cursor: pointer;
	box-shadow: 0 0 30px 0 #000;
}

.amcharts-pie-slice:hover {
	transform: scale(1.1);
    filter: url(#shadow);
}							

</style>



<?php echo form_open(base_url() . 'index.php?admin/report_product_order_view' , array(
    'class' => 'form-horizontal'));?>
<div class="row well">
    <div class="col-md-1" style="width: 4%;">
        <label class="control-label"><?php echo get_phrase('from');?></label>
    </div>
    <div class="col-md-2">
        <input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="timestamp_range[]"
            value="<?php echo date('D, d M Y' , $timestamp_start);?>">
    </div>
    <div class="col-md-1" style="width: 4%;">
        <label class="control-label"><?php echo get_phrase('to');?></label>
    </div>
    <div class="col-md-2">
        <input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="timestamp_range[]"
            value="<?php echo date('D, d M Y' , $timestamp_end);?>">
    </div>
    <div class="col-md-3">
        <select class="form-control selectboxit" name="category_id" id="category_id"
            onchange="get_products(this.value)">
            <option value=""><?php echo get_phrase('select_category');?></option>
            <?php 
                $categories = $this->db->get('product_category')->result_array();
                foreach($categories as $row):
            ?>
            <option value="<?php echo $row['product_category_id'];?>"
                <?php if($row['product_category_id'] == $category_id) echo 'selected';?>><?php echo $row['name'];?></option>
            <?php endforeach;?>
        </select>
    </div>

    <div id="product_holder">
        <div class="col-md-4">
            <select class="form-control selectpicker" name="" id="product_list" multiple data-actions-box="true">
               
            </select>
        </div>
    </div>

    
    <center>
        <button type="submit" id="submit_button" class="btn btn-green btn-icon icon-left btn-sm" style="margin-top: 20px;">
            <?php echo get_phrase('view_report');?>
            <i class="entypo-paper-plane"></i>
        </button>
    </center>

</div>
<?php echo form_close();?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">
            <p style="font-size: 14px;">
                Select a category and products to view report
            </p>
        </div>
    </div>
</div>

<br>


<!-- panel for the product order pie diagram -->
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-body">        
        <div id="chartdiv"></div>
    </div>
</div>

<!-- panel for the product order pie diagram -->



<!-- panel for tabular report of the data -->

<div class="row">

    <div class="col-md-12">
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <strong>
                        <?php echo get_phrase('product_order_report');?>
                        <?php if($category_id != ''):?>
                            (<?php echo get_phrase('category');?> : <?php echo $this->db->get_where('product_category' , array('product_category_id' => $category_id))->row()->name;?>)
                        <?php endif;?>
                    </strong>
                </div>
            </div>
                
            <div class="panel-body with-table">
                
               <table class="table table-bordered datatable" id="table-4">
                    <thead>
                        <tr>
                            <th width="4%;">#</th>
                            <th><?php echo get_phrase('product');?></th>
                            <th><?php echo get_phrase('number_of_orders');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($variant_ids != ''):
                                $count = 1; 
                                $number_of_variants = sizeof($variant_ids);
                                for($i = 0; $i < $number_of_variants; $i++):
                                    $is_variant = $this->db->get_where('variant' , array(
                                        'variant_id' => $variant_ids[$i]
                                    ))->row()->is_variant;
                                    $product_id = $this->db->get_where('variant' , array(
                                        'variant_id' => $variant_ids[$i]
                                    ))->row()->product_id;
                                    $type = $this->db->get_where('variant' , array(
                                        'variant_id' => $variant_ids[$i]
                                    ))->row()->type;
                                    $specification = $this->db->get_where('variant' , array(
                                        'variant_id' => $variant_ids[$i]
                                    ))->row()->specification;

                                    if($is_variant == 0) {
                                        $name = $this->db->get_where('product' , array(
                                            'product_id' => $product_id
                                        ))->row()->name;
                                    } else {
                                        $name = $this->db->get_where('product' , array(
                                            'product_id' => $product_id
                                        ))->row()->name . ' - ' . $type . ' - ' . $specification;
                                    }

                                    // find the total ordered number within the date range from json value of sales_order table
                                    $total_orders_of_this_variant = 0;

                                    $this->db->where('date_added >' , $timestamp_start);
                                    $this->db->where('date_added <' , $timestamp_end);
                                    $orders_within_date_range   =   $this->db->get('sales_order')->result_array();
                                    foreach ($orders_within_date_range as $row1) {
                                        $order_entries_json      =   $row1['order_entries'];
                                        $order_entries           =   json_decode( $order_entries_json );
                                        foreach ($order_entries as $row2) {
                                            if ($row2->variant_id == $variant_ids[$i])
                                                $total_orders_of_this_variant += $row2->ordered_quantity;
                                        }

                                    }
                        ?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $name;?></td>
                            <td><strong><?php echo $total_orders_of_this_variant;?></strong></td>
                        </tr>
                        <?php endfor;?>
                    <?php endif;?>

                    </tbody>
                </table> 

            </div>
        </div>

    </div>
    
</div>

<!-- panel for tabular report of the data -->

<script type="text/javascript">
    jQuery( document ).ready( function( $ ) {
        var $table4 = jQuery( "#table-4" );
        
        $table4.DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );        
</script>

<script type="text/javascript">

    // ajax form plugin calls at each modal loading,
    $(document).ready(function() {

        category_id = $('#category_id').val();
        if(category_id != '') {
            get_products(category_id);
        }

        //disables the product selector and submit button
        $('#product_list').prop('disabled' , true);

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

    function get_products(category_id)
    {
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/report_get_products/' + category_id,
            success: function(response)
            {
                jQuery('#product_holder').html(response);
            }
        });
    } 

</script>


<script type="text/javascript">
	
	var chart = AmCharts.makeChart("chartdiv", {
  "type": "pie",
  "startDuration": 0,
   "theme": "light",
  "addClassNames": true,
  "labelsEnabled": false,
  "legend":{
   	"position":"right",
    "marginRight":100,
    "autoMargins":false
  },
  "innerRadius": "30%",
  "defs": {
    "filter": [{
      "id": "shadow",
      "width": "200%",
      "height": "200%",
      "feOffset": {
        "result": "offOut",
        "in": "SourceAlpha",
        "dx": 0,
        "dy": 0
      },
      "feGaussianBlur": {
        "result": "blurOut",
        "in": "offOut",
        "stdDeviation": 5
      },
      "feBlend": {
        "in": "SourceGraphic",
        "in2": "blurOut",
        "mode": "normal"
      }
    }]
  },

  "dataProvider": [

    <?php
        for($i = 0; $i < $number_of_variants; $i++):
            $is_variant = $this->db->get_where('variant' , array(
                'variant_id' => $variant_ids[$i]
            ))->row()->is_variant;
            $product_id = $this->db->get_where('variant' , array(
                'variant_id' => $variant_ids[$i]
            ))->row()->product_id;
            $type = $this->db->get_where('variant' , array(
                'variant_id' => $variant_ids[$i]
            ))->row()->type;
            $specification = $this->db->get_where('variant' , array(
                'variant_id' => $variant_ids[$i]
            ))->row()->specification;

            if($is_variant == 0) {
                $name = $this->db->get_where('product' , array(
                    'product_id' => $product_id
                ))->row()->name;
            } else {
                $name = $this->db->get_where('product' , array(
                    'product_id' => $product_id
                ))->row()->name . ' - ' . $type . ' - ' . $specification;
            }

            // find the total ordered number within the date range from json value of sales_order table
            $total_orders_of_this_variant = 0;

            $this->db->where('date_added >' , $timestamp_start);
            $this->db->where('date_added <' , $timestamp_end);
            $orders_within_date_range   =   $this->db->get('sales_order')->result_array();
            foreach ($orders_within_date_range as $row1) {
                $order_entries_json      =   $row1['order_entries'];
                $order_entries           =   json_decode( $order_entries_json );
                foreach ($order_entries as $row2) {
                    if ($row2->variant_id == $variant_ids[$i])
                        $total_orders_of_this_variant += $row2->ordered_quantity;
                }

            }
    ?>
       {
        "variant": "<?php echo $name;?>",
        "quantity": <?php echo $total_orders_of_this_variant;?>
       },
    <?php endfor;?>

  ],

  "valueField": "quantity",
  "titleField": "variant",
  "export": {
    "enabled": false
  }
});

chart.addListener("init", handleInit);

chart.addListener("rollOverSlice", function(e) {
  handleRollOver(e);
});

function handleInit(){
  chart.legend.addListener("rollOverItem", handleRollOver);
}

function handleRollOver(e){
  var wedge = e.dataItem.wedge.node;
  wedge.parentNode.appendChild(wedge);  
}

</script>