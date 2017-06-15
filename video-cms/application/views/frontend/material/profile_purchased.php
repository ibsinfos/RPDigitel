
<div class="row">
  <?php for ($i = 0; $i < sizeof($purchased_video)-1; $i++):
    $this->db->where('video_pack_id', $purchased_video[$i]);
    $video_pack_details = $this->db->get('video_pack')->row_array();
  ?>
  <!-- item -->
  <div class="col-md-4">
    <div class="card card-background"
      style="background-image: url('<?php echo base_url('uploads/video_pack/video_pack_thumbnail_'.$video_pack_details['code'].'.jpg');?>')">
      <div class="content">
        <a href="<?php echo site_url('home/video_pack_details/'.$video_pack_details['code']);?>">
          <h3 class="card-title"><?php echo $video_pack_details['title']; ?></h3>
        </a>
        <p class="card-description">
          <?php echo substr($video_pack_details['description'], 0, 30).'...'; ?>
        </p>
        <a href="<?php echo site_url('home/video_pack_details/'.$video_pack_details['code']);?>" class="btn btn-white btn-simple">
          <i class="material-icons">subject</i> <?php echo get_phrase('view_details'); ?>
        </a>
      </div>
    </div>
  </div><!-- item -->
<?php endfor; ?>
<?php if (sizeof($purchased_video)-1 == 0): ?>
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
