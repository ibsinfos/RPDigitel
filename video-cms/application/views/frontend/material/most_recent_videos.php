<?php
$this->db->order_by('video_id', 'DESC');
$this->db->limit(27);
$array = array(
  'within_a_pack' => 0
);
$this->db->where($array);
$query = $this->db->get('video', $per_page, $this->uri->segment(3));
$video_details = $query->result_array();
?>
<body class="blog-posts">
  <nav class="navbar navbar-<?php echo $color_scheme;?> navbar-transparent navbar-fixed-top navbar-color-on-scroll">
    <?php include 'navigation.php'; ?>
  </nav>
  <div class="page-header header-filter header-small" data-parallax="active"
    style="background-image: url('<?php echo base_url('uploads/most_recent_videos.jpg');?>');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h1 class="title" style="margin-top: -60px; margin-bottom: 0px;">
            <?php echo get_phrase('most_recent_videos'); ?>
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
          <div class="col-md-offset-1 col-md-10">
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
                      <?php echo substr($video['title'], 0, 25).'...'; ?>
                    </p>
                  </div>
                </div>
              </div><!-- item -->
            <?php endforeach; ?>
            <?php if (sizeof($video_details) == 0): ?>
              <h4><?php echo get_phrase('no_videos_found'); ?></h4>
            <?php endif ?>
            </div>
          </div>
          <!-- videos -->

        </div>
        <div class="row">
          <div class="col-md-4 col-md-offset-4" style="text-align: center;">
            <?php echo $this->pagination->create_links(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <?php include 'includes_bottom.php'; ?>
</body>
