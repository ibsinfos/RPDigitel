<?php
  $this->db->like('title', $key);
  $query      = $this->db->get('video');
  $video_list = $query->result_array();
  $total_rows = $query->num_rows();
?>
<body class="blog-posts">
  <nav class="navbar navbar-<?php echo $color_scheme;?> navbar-fixed-top">
    <?php include 'navigation.php'; ?>
  </nav>
  <div class="main main-raised" style="margin-top: 90px;">
    <div class="container">
      <div class="section">
        <div class="row" style="margin-top: -40px;">
          <div class="col-md-8 col-md-offset-2">
            <div class="row">
              <div class="col-md-12">
                <form class="form">
                  <div class="input-group">
          					<span class="input-group-addon">
          						<i class="material-icons">search</i>
          					</span>
          					<div class="form-group is-empty form-<?php echo $color_scheme;?>">
                      <form class="navbar-form navbar-right" role="search" style="margin-left: 20px;"
                        action="<?php echo site_url('home/search');?>">
                      <input type="text" class="form-control" name="search_string" placeholder="Search Videos"
                        value="<?php echo $key;?>">
                      </form>
                        <span class="material-input"></span>
                      </div>
          				</div>
                </form>
              </div>
            </div>
            <div class="row">

              <?php foreach ($video_list as $video): ?>
              <!-- item -->
              <div class="col-md-12">
                <div class="card card-plain card-blog">
                	<div class="row">
                		<div class="col-md-3">
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
                		</div>
                		<div class="col-md-8">
                			<h4 class="card-title">
                				<a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']);?>">
                          <?php echo substr($video['title'], 0, 100).'...'; ?>
                        </a>
                			</h4>
                			<p class="card-description">
                				<?php echo substr($video['description'], 0, 150).'...'; ?>
                			</p>
                    </div>
                	</div>
                </div>
              </div>
              <!-- item --><?php endforeach; ?>
            </div>
            <div class="row">
              <div class="pagination-area text-center">
                <!-- <ul class="pagination pagination-<?php echo $color_scheme;?>">
                  <li><a href="index.html#pablo">&laquo;</a></li>
                  <li><a href="index.html#pablo">1</a></li>
                  <li><a href="index.html#pablo">2</a></li>
                  <li class="active"><a href="index.html#pablo">3</a></li>
                  <li><a href="index.html#pablo">4</a></li>
                  <li><a href="index.html#pablo">5</a></li>
                  <li><a href="index.html#pablo">&raquo;</a></li>
                 </ul> -->
              </div>
            </div>
          </div>
        </div>
        <?php if ($total_rows == 0): ?>
          <h4 style="text-align: center;"><?php echo get_phrase('no_videos_found'); ?></h4>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <?php include 'includes_bottom.php'; ?>
</body>
