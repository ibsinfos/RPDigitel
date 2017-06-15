<?php
 $system_currency_id = $this->db->get_where('settings' , array('type' =>'system_currency_id'))->row()->description;
 $this->db->where('currency_id', $system_currency_id);
 $currency_symbol = $this->db->get('currency')->row()->currency_symbol;
 $first_day = strtotime('-7 days', time());
 $last_day  = strtotime(date('Y-m-d H:i:s'));
?>
<html>
<head>
  <!-- Styles -->
  <style>
  #bar_graph {
    width: 100%;
    height: 500px;
  }
  #line_graph {
  width   : 100%;
  height    : 500px;
  font-size : 11px;
}
  </style>
  <!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/none.js"></script>
</head>
<body>
  <div class="row">
      <div class="col-sm-3">
        <div class="tile-stats tile-red">
          <div class="icon"><i class="entypo-users"></i></div>
          <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('user'); ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
          <h3><?php echo get_phrase('users') ?></h3>
        </div>
      </div>

      <div class="col-sm-3">
          <div class="tile-stats tile-green">
            <div class="icon"><i class="entypo-video"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('video'); ?>" data-postfix="" data-duration="1500" data-delay="600">0</div>
            <h3><?php echo get_phrase('videos') ?></h3>
         </div>
      </div>

      <div class="col-sm-3">
          <div class="tile-stats tile-aqua">
            <div class="icon"><i class="entypo-play"></i></div>
            <div class="num" data-start="0" data-end="<?php
                              $array = array('premium' => 1);
                              $this->db->where($array);
                              $premium_video_pack = $this->db->get('video_pack')->num_rows();
                              echo  $premium_video_pack;
                            ?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>

             <h3><?php echo get_phrase('premium_videos') ?></h3>
          </div>
      </div>

      <div class="col-sm-3">
          <div class="tile-stats tile-blue">
        <div class="icon"><i class="entypo-basket"></i></div>
        <div class="num" data-start="0"
                            data-end="<?php
                             $seven_days_payment = 0;
                             $this->db->where('date_added >=', $first_day);
                             $this->db->where('date_added <=', $last_day);
                             $number_of_video_pack = $this->db->get('payment')->num_rows();
                             echo $number_of_video_pack;
                            ?>"

                   data-duration="1500" data-delay="0">0</div>

        <h3><?php echo get_phrase('weekely_purchases') ?></h3>
      </div>
      </div>
    </div>
    <div class="col-md-12" id="bar_graph" style="padding-top: 50px; margin-bottom: 20px; "></div>
    <div class="col-md-12" id="line_graph" style="padding-top: 50px; margin-bottom: 100px;"></div>
    <?php
    $time = date('H:i:s');
    $i = 13;
    $month = date('m');
    $year = date('Y');
    $timestamp  = strtotime($year.'-'.$month.'-'.$i.' '.$time);
    ?>
  </body>
</html>
<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("bar_graph", {
    "theme": "none",
    "type": "serial",
  "startDuration": 2,
    "dataProvider":
    [
      <?php
        $array = array(
          'premium' => 1
        );
        $this->db->where($array);
        $premium_video_pack = $this->db->get('video_pack')->result_array();
        foreach ($premium_video_pack as $video_pack):?>
        {
          "video_pack_name": "<?php echo $video_pack['title'];?>",
          "sold_times": "<?php
            $start_time = strtotime(date('Y-m-d H:i:s'));
            $end_time   = strtotime(date('Y-m-d H:i:s'));

            $array = array(
              'video_pack_id' => $video_pack['video_pack_id']
            );
            $timestamp = strtotime(date('Y-m-d H:i:s'));
            $beginOfDay = strtotime("midnight", $timestamp);
            $endOfDay   = strtotime("tomorrow", $beginOfDay) - 1;
            $this->db->where('date_added >=', $beginOfDay);
            $this->db->where('date_added <=', $endOfDay);
           $this->db->where($array);
           $sold_times = $this->db->get('payment')->num_rows();
           echo $sold_times;
           ?>",
          "color": "#616161"
        },
        <?php endforeach; ?>
   ],
    "valueAxes": [{
        "position": "left",
        "title": "Number Of Video Pack Sold"
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "fillColorsField": "color",
        "fillAlphas": 1,
        "lineAlpha": 0.0,
        "type": "column",
        "valueField": "sold_times"
    }],
    "depth3D": 20,
  "angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "video_pack_name",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 45
    },
    "export": {
      "enabled": true
     }

});

var chart = AmCharts.makeChart("line_graph", {
    "type": "serial",
    "theme": "none",
    "marginRight": 80,
    "dataProvider":
    [
      <?php
      $days = 0;
      $time = date('H:i:s');
      $month = date('m');
      $year = date('Y');
      if ($month == 01 || $month == 03 || $month == 05 || $month == 07 || $month == 08 || $month == 10 || $month == 12) {
        $days = 31;
      }
      else if ($month == 02) {
          if ($year % 4 == 0) {
            $days = 29;
          }
          else{
            $days = 29;
          }
      }
      else if($month == 04 || $month == 06 || $month == 09 || $month == 11){
        $days = 30;
      }

      
      for($i = 1; $i <= $days; $i++):
        $timestamp  = strtotime($year.'-'.$month.'-'.$i.' '.$time);
        $beginOfDay = strtotime("midnight", $timestamp);
        $endOfDay   = strtotime("tomorrow", $beginOfDay) - 1;
        $this->db->where('date_added >=', $beginOfDay);
        $this->db->where('date_added <=', $endOfDay);
        $number_of_video_pack_sold = $this->db->get('payment')->num_rows();
      ?>
      {
        "lineColor": "#b7e021",
        "date": "<?php echo date('Y m ').$i;?>",
        "number_of_video_pack_sold": "<?php echo $number_of_video_pack_sold;?>"
      },
      <?php endfor; ?>
    ],
    "balloon": {
        "cornerRadius": 6,
        "horizontalPadding": 15,
        "verticalPadding": 10
    },
    "valueAxes": [{
        "axisAlpha": 0,
        "position": "left",
        "title": "Number Of Video Pack Sold"
    }],
    "graphs": [{
        "bullet": "square",
        "bulletBorderAlpha": 1,
        "bulletBorderThickness": 1,
        "fillAlphas": 0.3,
        "fillColorsField": "lineColor",
        "legendValueText": "[[value]]",
        "lineColorField": "lineColor",
        "title": "number_of_video_pack_sold",
        "valueField": "number_of_video_pack_sold"
    }],
    "chartScrollbar": {

    },
    "chartCursor": {
        "categoryBalloonDateFormat": "YYYY MMM DD",
        "cursorAlpha": 0,
        "fullWidth": true
    },
    "dataDateFormat": "YYYY-MM-DD",
    "categoryField": "date",
    "categoryAxis": {
        "dateFormats": [{
            "period": "DD",
            "format": "DD"
        }, {
            "period": "WW",
            "format": "MMM DD"
        }, {
            "period": "MM",
            "format": "MMM"
        }, {
            "period": "YYYY",
            "format": "YYYY"
        }],
        "parseDates": true,
        "autoGridCount": false,
        "axisColor": "#555555",
        "gridAlpha": 0,
        "gridCount": 50
    },
    "export": {
        "enabled": true
    }
});



chart.addListener("dataUpdated", zoomChart);

function zoomChart() {
    //chart.zoomToDates(new Date(2012, 0, 3), new Date(2012, 0, 11));
}
</script>
