<body class="blog-posts">
  <nav class="navbar navbar-<?php echo $color_scheme;?> navbar-fixed-top">
    <?php include 'navigation.php'; ?>
  </nav>
  <div class="row" style="margin: 80px 0px 20px 20px;">
    <div class="col-md-12">
      <h3 class="title text-center">Learn Swift The Hardest Way Learn Swift The Hardest Way Learn Swift The Hardest Way</h3>
      <h6 class="text-center text-muted">19 Videos</h6>
    </div>
  </div>
  <div class="main main-raised" style="margin-top: 0px;">
    <div class="container">
      <div class="section">
        <div class="row" style="margin-top: -40px;">
          <div class="col-md-8 col-md-offset-2" id="video-holder">
            <div class="card card-plain">
              <div class="card-image">
                <video class="video-js vjs-big-play-centered vjs-16-9"
                  controls preload="auto" poster="//vjs.zencdn.net/v/oceans.png"
                  data-setup='{"controls": true, "fluid": true}'>
                  <source src="//vjs.zencdn.net/v/oceans.mp4" type="video/mp4"></source>
                  <source src="//vjs.zencdn.net/v/oceans.webm" type="video/webm"></source>
                  <source src="//vjs.zencdn.net/v/oceans.ogv" type="video/ogg"></source>
                </video>
                <!-- <div class="youtube-video-wrapper">
                  <iframe width="560" height="349"
                    src="https://www.youtube.com/embed/DZvlO0LR9b4" frameborder="0" allowfullscreen>
                  </iframe>
                </div> -->
              </div>
              <div class="content">
                <div class="footer" style="margin-top: -10px;">
                  <center>
                    <a href="#" class="btn btn-<?php echo $color_scheme;?> btn-tooltip btn-just-icon btn-round"
                      data-toggle="tooltip" data-placement="left" title="" data-container="body"
                      data-original-title="<?php echo get_phrase('previous');?>">
                      <i class="material-icons">skip_previous</i>
                      <div class="ripple-container"></div>
                    </a>
                    <a href="#" class="btn btn-<?php echo $color_scheme;?> btn-tooltip btn-just-icon btn-round"
                      onclick="toggle_video_list()">
                      <i class="material-icons">view_list</i>
                      <div class="ripple-container"></div>
                    </a>
                    <a href="#" class="btn btn-<?php echo $color_scheme;?> btn-tooltip btn-just-icon btn-round"
                      data-toggle="tooltip" data-placement="right" title="" data-container="body"
                      data-original-title="<?php echo get_phrase('next');?>">
                      <i class="material-icons">skip_next</i>
                      <div class="ripple-container"></div>
                    </a>
                  </center>
                </div>
                <div class="footer">
                  <div class="author">
                    <a href="#" class="card-title" style="font-size: 20px;">
                      <b>The ocean is about to die</b>
                    </a>
                  </div>
                  <div class="stats">
                    <i class="material-icons">remove_red_eye</i> 3422343
							      <i class="material-icons">favorite</i> 2222
                  </div>
                </div>
                <div class="footer">
                  <div class="author">
                    <a href="#">
                      <img src="<?php echo base_url('assets/backend/images/user.jpg');?>"
                        class="avatar img-raised">
                      <span>Lord Alex</span>
                    </a>
                  </div>
                  <div class="stats">
                    Published on 23 March 2017
                  </div>
                </div>
                <div class="footer" style="margin-top: 20px; margin-left: -5px;">
                  <div class="author">
                    <button class="btn btn-just-icon btn-round btn-facebook">
                      <i class="fa fa-facebook"> </i>
                    <div class="ripple-container"></div></button>
                    <button class="btn btn-just-icon btn-round btn-google">
                      <i class="fa fa-google"> </i>
                    <div class="ripple-container"></div></button>
                    <button class="btn btn-just-icon btn-round btn-twitter">
                      <i class="fa fa-twitter"></i>
                    <div class="ripple-container"></div></button>
                    <button class="btn btn-just-icon btn-round btn-pinterest">
                      <i class="fa fa-pinterest"></i>
                    <div class="ripple-container"></div></button>
                  </div>
                </div>
                <hr />
                <a href="#">
                  <h6 class="category text-<?php echo $color_scheme;?>">
                    video category
                  </h6>
                </a>
                <p class="card-description">
                  Material Kit is a Free Bootstrap UI Kit with a fresh, new design inspired by Google's material design.
                  It's a great pleasure to introduce to you the material concepts in an easy to use and beautiful set of
                  components. Material Kit is a Free Bootstrap UI Kit with a fresh, new design inspired by Google's material design.
                  It's a great pleasure to introduce to you the material concepts in an easy to use and beautiful set of
                  components.<a href="#" class="text-<?php echo $color_scheme;?>"> <?php echo get_phrase('show_more'); ?> </a>
                </p>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <h3 class="title">Comments</h3>
                <div class="media media-post">
                  <a class="pull-left author" href="index.html#pablo">
                    <div class="avatar">
                      <img class="media-object" src="<?php echo base_url('assets/backend/images/user.jpg');?>">
                    </div>
                  </a>
                  <div class="media-body">
                    <textarea class="form-control" placeholder="post a public comment" rows="3"></textarea>
                    <div class="media-footer">
                      <button class="btn btn-<?php echo $color_scheme;?> btn-fab btn-fab-mini btn-round pull-right">
        								<i class="material-icons">done_all</i>
        							  <div class="ripple-container"></div>
                      </button>
                    </div>
                  </div>
                </div>
                <hr />
                <div class="media-area">
                  <?php for ($i=0;$i<7;$i++): ?>
                  <!-- item -->
                  <div class="media">
                    <a class="pull-left" href="index.html#pablo">
                      <div class="avatar">
                        <img class="media-object" src="<?php echo base_url('assets/backend/images/user.jpg');?>">
                      </div>
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">Tina Andrew <small>&middot; 7 minutes ago</small></h4>
                      <h6 class="text-muted"></h6>

                      <p>Chance too good. God level bars. I'm so proud of @LifeOfDesiigner #1 song in the country. Panda! Don't be scared of the truth because we need to restart the human foundation in truth I stand with the most humility. We are so blessed!</p>
                      <p>All praises and blessings to the families of people who never gave up on dreams. Don't forget, You're Awesome!</p>

                      <div class="media-footer">
                        <!-- <a href="index.html#pablo" class="btn btn-primary btn-simple pull-right" rel="tooltip" title="Reply to Comment">
                          <i class="material-icons">reply</i> Reply
                        </a> -->
                        <a href="index.html#pablo" class="btn btn-danger btn-simple pull-right">
                          <i class="material-icons">favorite</i> 243
                        </a>
                      </div>
                    </div>
                  </div><!-- item --><?php endfor; ?>
                  <div class="pagination-area text-center">
                    <ul class="pagination pagination-<?php echo $color_scheme;?>">
                      <li><a href="index.html#pablo">&laquo;</a></li>
                      <li><a href="index.html#pablo">1</a></li>
                      <li><a href="index.html#pablo">2</a></li>
                      <li class="active"><a href="index.html#pablo">3</a></li>
                      <li><a href="index.html#pablo">4</a></li>
                      <li><a href="index.html#pablo">5</a></li>
                      <li><a href="index.html#pablo">&raquo;</a></li>
                     </ul>
                  </div>
                </div><!-- end media-post -->
              </div>
            </div>
          </div>
          <div class="col-md-4" id="video-list">
            <div class="row" style="max-height: 420px; overflow-y: auto;">
              <?php for ($i=0;$i<6;$i++): ?>
              <!-- item -->
              <div class="col-md-12">
                <a href="#">
                  <div class="card card-plain card-blog">
                    <div class="row" style="margin-top: -30px;">
                      <a href="<?php echo site_url('home/watch_video/code');?>">
                        <div class="col-md-4">
                          <div class="card-image">
                            <img class="img img-raised" src="<?php echo base_url('image4.jpg');?>" />
                          </div>
                        </div>
                      </a>
                      <div class="col-md-8">
                        <p class="text">
                          video title goes here
                        </p>
                        <?php if ($i==2): ?>
                          <div style="height: 40px; width: 40px;">
                            <img src="<?php echo base_url('assets/frontend/material/images/playing.gif');?>">
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <!-- item -->
            <?php endfor; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <?php include 'includes_bottom.php'; ?>
</body>

<script type="text/javascript">
  $(document).ready(function() {
    $('#video-list').hide();
  });
</script>
