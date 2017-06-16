<?php
    $system_currency_id = $this->db->get_where('settings' , array('type' =>'system_currency_id'))->row()->description;
    $this->db->where('currency_id', $system_currency_id);
    $currency_symbol = $this->db->get('currency')->row()->currency_symbol;
    $system_name         =	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
    $system_title        =	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
    $homepage_video_code =	$this->db->get_where('settings' , array('type'=>'home_page_video_code'))->row()->description;
    $this->db->where('code', $homepage_video_code);
    $homepage_video_details = $this->db->get('video')->row_array();
?>
<body class="landing-page">
  <nav class="navbar navbar-<?php echo $color_scheme;?> navbar-transparent navbar-fixed-top navbar-color-on-scroll">
    <?php include 'navigation.php'; ?>
  </nav>
  <div class="page-header header-filter" data-parallax="active"
    style="background-image: url('<?php echo base_url('uploads/home_page/home.jpg');?>');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h1 class="title" title = "<?php echo $homepage_video_details['title'];?>"><?php echo $homepage_video_details['title'];?></h1>
          <h4 title = "<?php echo $homepage_video_details['description']; ?>"><?php echo substr($homepage_video_details['description'], 0, 200).'...'; ?></h4>
          <br />
          <a href="<?php echo site_url('home/watch_video/'.slugify($homepage_video_details['title']).'/'.$homepage_video_code);?>"
            class="btn btn-<?php echo $color_scheme;?> btn-raised btn-lg">
            <i class="fa fa-play"></i>&nbsp; <?php echo get_phrase('watch_now'); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Featured Videos -->
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="title"><?php echo get_phrase('featured_videos'); ?></h2>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="slick-regular-slider">

                <?php
                    $this->db->order_by('video_id', 'DESC');
                    $this->db->limit(10);
                    $array = array(
                      'featured' => 1,
                      'within_a_pack' => 0
                    );
                    $this->db->where($array);
                    $query = $this->db->get('video');
                    $featured_videos = $query->result_array();
                    foreach ($featured_videos as $video):
                    $video['title'] = slugify($video['title']);
                    ?>
              <!-- item -->
              <div class="col-md-4">
      					<div class="card card-plain">
      						<a href="<?php echo site_url('home/watch_video/'.$video['title'].'/'.$video['code']);?>" style="outline: none;">
      						<div class="card-image">
                    <?php if($video['source'] == 1): ?>
      							   <img src="<?php echo $video['thumbnail'];?>"/>
                    <?php endif; ?>
                    <?php if($video['source'] == 2): ?>
      							   <img src="<?php echo base_url('uploads/video_thumbnail/'.$video['thumbnail']);?>"/>
                    <?php endif; ?>
      						</div>
      						</a>
      						<div class="content">
      							<a href="<?php echo site_url('home/watch_video/'.$video['code']);?>">
      								<h4 class="card-title" title = "<?php echo $video['title'];?>"><?php echo substr($video['title'], 0, 30).'....'; ?></h4>
      							</a>
      							<h6 class="category">
                      <?php
                        $this->db->where('code', $video['category_code']);
                        $category_name = $this->db->get('category')->row_array();
                        echo substr($category_name['title'],0 ,30);
                      ?>
                    </h6>
      							<p class="card-description" title = "<?php echo $video['description'];?>">
      								<?php echo substr($video['description'], 0, 50).'...';?>
      							</p>
      						</div>
      					</div>
      				</div><!-- item -->
            <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Just Arrived -->
      <div class="section">
        <h2 class="title text-center"><?php echo get_phrase('just_arrived'); ?></h2>
        <div class="row">
          <div class="col-md-12">
            <?php
            $this->db->order_by('video_id', 'DESC');
            $this->db->limit(6);
            $array = array(
              'within_a_pack' => 0
            );
            $this->db->where($array);
            $query = $this->db->get('video');
            $just_arrived_videos = $query->result_array();
            $i = 0;
            foreach ($just_arrived_videos as $video):
              $i++;
              if ($i%2 != 0):
            ?>
            <!-- item left -->
            <div class="card card-plain card-blog">
  						<div class="row">
  							<div class="col-md-5">
  								<div class="card-image">
                    <a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']);?>">
                      <?php if($video['source'] == 1):?>
    									   <img class="img img-raised" src="<?php echo $video['thumbnail'];?>" />
                      <?php endif; ?>
                      <?php if($video['source'] == 2):?>
    									   <img class="img img-raised" src="<?php echo base_url('uploads/video_thumbnail/'.$video['thumbnail']);?>" />
                      <?php endif; ?>
                    </a>
  								</div>
  							</div>
  							<div class="col-md-7">
  								<h6 class="category text-<?php echo $color_scheme;?>">
                    <?php
                      $this->db->where('code', $video['category_code']);
                      $category_name = $this->db->get('category')->row_array();
                      echo $category_name['title'];
                    ?>
                  </h6>
  								<h3 class="card-title">
  									<a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']);?>"><?php echo $video['title']; ?></a>
  								</h3>
  								<p class="card-description" title = "<?php echo $video['description'];?>">
                    <?php echo substr($video['description'], 0, 250); ?>
  								</p>
                  <p class="author">
  									<?php echo get_phrase('by'); ?>
                      <a href="#">
                        <b>
                         <?php
                         $this->db->where('code', $video['uploader']);
                         $uploader = $this->db->get('admin')->row()->name;
                         echo $uploader;
                         ?>
                        </b>
                      </a>,
                      <?php echo date('D, d M Y', $video['date_added']); ?>
  								</p>
  							</div>
  						</div>
  					</div>
            <!-- item left -->
          <?php endif;?>
          <?php if ($i%2 == 0): ?>
            <!-- item right -->
            <div class="card card-plain card-blog">
  						<div class="row">
  							<div class="col-md-7">
  								<h6 class="category text-<?php echo $color_scheme;?>">
                    <?php
                      $this->db->where('code', $video['category_code']);
                      $category_name = $this->db->get('category')->row_array();
                      echo $category_name['title'];
                    ?>
                  </h6>
  								<h3 class="card-title">
  									<a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']);?>"><?php echo $video['title']; ?></a>
  								</h3>
  								<p class="card-description" title = "<?php echo $video['description'];?>">
                    <?php echo substr($video['description'], 0, 250); ?>
  								</p>
  								<p class="author">
  									<?php echo get_phrase('by'); ?>
                      <a href="#">
                        <b>
                         <?php
                         $this->db->where('code', $video['uploader']);
                         $uploader = $this->db->get('admin')->row()->name;
                         echo $uploader;
                         ?>
                        </b>
                      </a>,
                      <?php echo date('D, d M Y', $video['date_added']); ?>
  								</p>
  							</div>
  							<div class="col-md-5">
                  <div class="card-image">
                    <a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']);?>">
                      <?php if($video['source'] == 1):?>
    									   <img class="img img-raised" src="<?php echo $video['thumbnail'];?>" />
                      <?php endif; ?>
                      <?php if($video['source'] == 2):?>
    									   <img class="img img-raised" src="<?php echo base_url('uploads/video_thumbnail/'.$video['thumbnail']);?>" />
                      <?php endif; ?>
                    </a>
  								</div>
  							</div>
  						</div>
  					</div>
            <!-- item right -->
          <?php endif; ?>
        <?php endforeach; ?>
          </div>
        </div>
        <div class="" style="text-align: center;">
          <a href="<?php echo site_url('home/most_recent_videos');?>"
            class="btn btn-<?php echo $color_scheme;?> btn-raised btn-lg">
            <i class="fa fa-play"></i>&nbsp; <?php echo get_phrase('watch_more'); ?>
          </a>
        </div>
      </div>
      <!-- People are watching -->
      <div class="section">
				<h2 class="title text-center"><?php echo get_phrase('what_people_are_watching'); ?></h2>
				<br />
				<div class="row">
          <?php
          $this->db->order_by('views', 'DESC');
          $this->db->limit(8);
          $array = array(
            'within_a_pack' => 0
          );
          $this->db->where($array);
          $query = $this->db->get('video');
          $liked_videos = $query->result_array();
          foreach ($liked_videos as $video):
          ?>
          <!-- item -->
					<div class="col-md-3">
						<div class="card card-plain card-blog">
							<div class="card-image">
								<a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']);?>">
                  <?php if($video['source'] == 1):?>
                     <img class="img img-raised" src="<?php echo $video['thumbnail'];?>" />
                  <?php endif; ?>
                  <?php if($video['source'] == 2):?>
                     <img class="img img-raised" src="<?php echo base_url('uploads/video_thumbnail/'.$video['thumbnail']);?>" />
                  <?php endif; ?>
								</a>
							</div>
							<div class="content">
								<h6 class="category text-<?php echo $color_scheme;?>">
                  <?php
                    $this->db->where('code', $video['category_code']);
                    $category_name = $this->db->get('category')->row_array();
                    echo $category_name['title'];
                  ?>
                </h6>
								<h4 class="card-title" title = "<?php echo $video['title']; ?>">
									<a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']);?>"><?php echo substr($video['title'], 0, 25).'...'; ?></a>
								</h4>
							</div>
						</div>
					</div><!-- item -->
        <?php endforeach; ?>
				</div>
        <div class="" style="text-align: center;">
          <a href="<?php echo site_url('home/most_watched_videos');?>"
            class="btn btn-<?php echo $color_scheme;?> btn-raised btn-lg">
            <i class="fa fa-play"></i>&nbsp; <?php echo get_phrase('watch_more'); ?>
          </a>
        </div>
			</div>
      <!-- Video Pack Showing Worth Every Penny  -->
      <div class="section">
        <h2 class="title text-center"><?php echo get_phrase('worth_every_penny'); ?></h2>
        <br />
        <div class="row">
          <?php
          $this->db->where('premium', 1);
          $this->db->order_by('price', 'DESC');
          $this->db->limit(8);
          $query = $this->db->get('video_pack');
          $premium_video_video_pack = $query->result_array();
          foreach ($premium_video_video_pack as $video_pack):
          ?>
          <!-- item -->
          <div class="col-md-6">
            <div class="card card-background"
              style="background-image: url('<?php echo base_url('uploads/video_pack/video_pack_thumbnail_').$video_pack['code'].'.jpg';?>')">
              <div class="content">
                <h6 class="category text-info"><?php echo $currency_symbol.' '.$video_pack['price'];?></h6>
                <a href="<?php echo site_url('home/video_pack_details/'.$video_pack['code']);?>">
                  <h3 class="card-title" title = "<?php echo $video_pack['title']; ?>"><?php echo $video_pack['title']; ?></h3>
                </a>
                <p class="card-description" title = "<?php echo $video_pack['description']; ?>">
                  <?php
                  echo substr($video_pack['description'], 0, 100).'...';
                  ?>
                </p>
                <a href="<?php echo site_url('home/video_pack_details/'.$video_pack['code']);?>" class="btn btn-white btn-simple">
                  <i class="material-icons">subject</i> <?php echo get_phrase('view_details'); ?>
                </a>
                <a href="<?php echo site_url('home/video_pack_details/'.$video_pack['code']);?>" class="btn btn-white btn-simple">
                  <i class="material-icons">add_shopping_cart</i> <?php echo get_phrase('purchase_now'); ?>
                </a>
              </div>
            </div>
          </div><!-- item -->
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <?php include 'includes_bottom.php'; ?>
</body>

<script type="text/javascript">
  $(document).ready(function() {
    // initialize slick carousel
    initialize_slick();
  });
</script>
