<div class="row">
  <?php for ($i = 0; $i < sizeof($favorites_video)-1; $i++):
    $this->db->where('video_id', $favorites_video[$i]);
    $video_details = $this->db->get('video')->row_array();
  ?>
  <!-- item -->
  <div class="col-md-3">
    <div class="card card-blog card-plain">
      <a href="<?php echo site_url('home/watch_video/'.$video_details['code']);?>">
        <div class="card-image">
          <?php if($video_details['source'] == 1): ?>
             <img src="<?php echo $video_details['thumbnail'];?>"/>
          <?php endif; ?>
          <?php if($video_details['source'] == 2): ?>
             <img src="<?php echo base_url('uploads/video_thumbnail/'.$video_details['thumbnail']);?>"/>
          <?php endif; ?>
        </div>
      </a>
      <div class="content" style="text-align: left;">
        <h6 class="title text-<?php echo $color_scheme;?>"><?php echo substr($video_details['title'], 0, 20).'...'; ?></h6>
        <p class="card-description">
          <?php echo substr($video_details['description'], 0, 25).'...'; ?>
        </p>
      </div>
    </div>
  </div>
  <!-- item -->
<?php endfor; ?>
<?php if (sizeof($favorites_video)-1 == 0): ?>
<h5><?php echo get_phrase('no_video_found'); ?></h5>
<?php endif; ?>
</div>
<!-- <div class="row">
  <div class="col-md-6 col-md-offset-3">
    <ul class="pagination pagination-<?php echo $color_scheme;?>">
			<li><a href="index.html#pablo">«<div class="ripple-container"></div></a></li>
			<li><a href="index.html#pablo">1</a></li>
			<li><a href="index.html#pablo">2</a></li>
			<li class="active"><a href="index.html#pablo">3</a></li>
			<li><a href="index.html#pablo">4</a></li>
			<li><a href="index.html#pablo">5</a></li>
			<li><a href="index.html#pablo">»<div class="ripple-container"></div></a></li>
		</ul>
  </div>
</div> -->
