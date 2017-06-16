<?php
  $this->db->where('code', $category_code);
  $category_details = $this->db->get('category')->row_array();
  $array = array(
    'category_code' => $category_code,
    'within_a_pack' => 0
  );
  $this->db->where($array);
  $video_details = $this->db->get('video', $per_page, $this->uri->segment(4))->result_array();
 ?>
<body class="blog-posts">
  <nav class="navbar navbar-<?php echo $color_scheme;?> navbar-transparent navbar-fixed-top navbar-color-on-scroll">
    <?php include 'navigation.php'; ?>
  </nav>
  <div class="page-header header-filter header-small" data-parallax="active"
    style="background-image: url('<?php echo base_url('uploads/category/'.$category_code.'.jpg');?>');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h1 class="title" style="margin-top: -20px; margin-bottom: 0px;">
            <?php echo $category_details['title']; ?>
          </h1>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <div class="row">
          <!-- videos -->
          <div class="col-md-8">
            <div class="row">
              <?php foreach ($video_details as $video): ?>
              <!-- item -->
              <div class="col-md-4">
                <div class="card card-blog card-plain">
                  <a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']);?>">
                    <div class="card-image">
                      <?php if($video['source'] == 1): ?>
                         <img src="<?php echo $video['thumbnail'];?>"/>
                      <?php endif; ?>
                      <?php if($video['source'] == 2): ?>
                         <img src="<?php echo base_url('uploads/video_thumbnail/'.$video['thumbnail']);?>"/>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="content" style="text-align: left;">
                    <p class="card-description" title="<?php echo $video['title']; ?>">
                      <?php echo substr($video['title'], 0, 30).'...'; ?>
                    </p>
                  </div>
                </div>
              </div><!-- item -->
            <?php endforeach; ?>
            <?php if (sizeof($video_details) == 0): ?>
              <h4><?php echo get_phrase('no_videos_found'); ?></h4>
            <?php endif ?>
            </div>
            <div class="row">
              <div class="col-md-6 col-md-offset-4">
                <?php echo $this->pagination->create_links(); ?>
              </div>
            </div>
          </div>
          <!-- videos -->

          <div class="col-md-1"></div>
          <!-- sidebar -->
          <div class="col-md-3">
            <div class="row" style="margin-top: 15px;">
              <?php
              $all_category = $this->db->get('category')->result_array();
              foreach ($all_category as $category): ?>
              <a href="<?php echo site_url('home/videos/'.$category['code']);?>"
                class="btn btn-<?php if ($category['code'] == $category_code) echo $color_scheme; else echo 'white' ;?> btn-block">
                <?php echo $category['title']; ?>
              </a>
            <?php endforeach; ?>
            </div>
            <h3 class="title text-center">Most recent</h3>
            <br />
            <div class="row">
              <?php
                  $this->db->order_by('video_id', 'DESC');
                  $this->db->limit(2);
                  $query = $this->db->get('video');
                  $recent_videos = $query->result_array();
                  foreach ($recent_videos as $video):?>
              <!-- item -->
              <div class="col-md-12">
                <div class="card card-plain">
      						<a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']);?>">
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
      							<a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']);?>">
      								<h4 class="card-title" title="<?php echo $video['title']; ?>"><?php echo substr($video['title'], 0, 100).'...'; ?></h4>
      							</a>
      							<h6 class="category">
                      <?php
                        $this->db->where('code', $video['category_code']);
                        $category_name = $this->db->get('category')->row_array();
                        echo $category_name['title'];
                      ?>
      							</h6>
      						</div>
      					</div>
              </div>
              <!-- item -->
            <?php endforeach; ?>
            </div>
          </div><!-- sidebar -->
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <?php include 'includes_bottom.php'; ?>
</body>
