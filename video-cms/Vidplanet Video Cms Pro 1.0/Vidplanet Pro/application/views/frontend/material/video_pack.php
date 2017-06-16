<?php
$system_currency_id = $this->db->get_where('settings' , array('type' =>'system_currency_id'))->row()->description;
$this->db->where('currency_id', $system_currency_id);
$currency_symbol = $this->db->get('currency')->row()->currency_symbol;
 ?>
<body class="blog-posts">
  <nav class="navbar navbar-<?php echo $color_scheme;?> navbar-transparent navbar-fixed-top navbar-color-on-scroll">
    <?php include 'navigation.php'; ?>
  </nav>
  <div class="page-header header-filter header-small" data-parallax="active"
    style="background-image: url('<?php echo base_url('assets/frontend/material/images/video_pack.jpg');?>'); height: 65vh;">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h1 class="title">
          Crafted only for YOU
          </h1>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <div class="row">
          <?php
           $all_video_pack = $this->db->get('video_pack', $per_page, $this->uri->segment(3))->result_array();
           foreach ($all_video_pack as $video_pack):?>
          <!-- item -->
          <div class="col-md-4">
            <div class="card card-background"
              style="background-image: url('<?php echo base_url('uploads/video_pack/video_pack_thumbnail_').$video_pack['code'].'.jpg';?>')">
              <div class="content">
                <h6 class="category text-info">
                  <?php
                    if($video_pack['price'] == 0 || $video_pack['price'] == '' ){
                      echo get_phrase('free');
                    }
                    else{
                      if ($this->session->userdata('user_login') == 1) {
                        $validation = 0;
                        $this->db->where('code', $this->session->userdata('code'));
                        $user_info = $this->db->get('user')->row_array();
                        $purchased_video_pack = $user_info['purchased_video_pack_ids'];
                        $purchased_video_pack_array = explode(',', $purchased_video_pack);
                        for($i = 0; $i < sizeof($purchased_video_pack_array) - 1; $i++){
                          if($purchased_video_pack_array[$i] == $video_pack['video_pack_id']){
                            $validation++;
                          }
                        }
                        if ($validation > 0) {
                          echo '<span class="btn btn-white" style = "color: #9E9E9E;">'.get_phrase("purchased").'</span>';
                        }
                        else{
                          echo $currency_symbol.' '.$video_pack['price'];
                        }
                    }
                    else{
                      echo $currency_symbol.' '.$video_pack['price'];
                    }
                  }
                   ?>
                </h6>
                <a href="<?php echo site_url('home/video_pack_details/'.$video_pack['code']);?>">
                  <h3 class="card-title"><?php echo $video_pack['title']; ?></h3>
                </a>
                <a href="<?php echo site_url('home/video_pack_details/'.$video_pack['code']);?>" class="btn btn-white btn-simple">
                  <i class="material-icons">subject</i> <?php echo get_phrase('view_details'); ?>
                </a>
              </div>
            </div>
          </div>
          <!-- item -->
        <?php endforeach; ?>
        <?php 
          $number_of_video_pack = sizeof($all_video_pack);
          if ($number_of_video_pack == 0):?>
          <h4><?php echo get_phrase('no_video_pack_found'); ?></h4>
        <?php endif;?>
        </div>
      </div>
      <div class="row" style="text-align: center;">
        <div class="col-md-12">
          <?php echo $this->pagination->create_links(); ?>
          <!-- <ul class="pagination pagination-<?php echo $color_scheme;?>">
            <li><a href="index.html#pablo">«<div class="ripple-container"></div></a></li>
            <li><a href="index.html#pablo">1</a></li>
            <li><a href="index.html#pablo">2</a></li>
            <li class="active"><a href="index.html#pablo">3</a></li>
            <li><a href="index.html#pablo">4</a></li>
            <li><a href="index.html#pablo">5</a></li>
            <li><a href="index.html#pablo">»<div class="ripple-container"></div></a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>
  <?php include 'includes_bottom.php'; ?>
</body>
