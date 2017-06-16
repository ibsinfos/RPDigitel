<!-- videojs -->
<link href="<?php echo base_url('assets/frontend/material/plugins/videojs/videojs.css');?>" rel="stylesheet">
<script src="<?php echo base_url('assets/frontend/material/plugins/videojs/videojs.js');?>"></script>
<style media="screen">
.youtube-video-wrapper {
  position: relative;
  padding-bottom: 56.25%; /* 16:9 */
  padding-top: 25px;
  height: 0;
}
.youtube-video-wrapper iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
#video_details_panel div{
  padding-bottom: 10px;
}
#video_details_panel span{
  padding-right: 10px;
}
</style>
<!-- breadcrumb start -->
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo site_url('admin/dashboard');?>">
			<i class="fa fa-dashboard"></i>
			<?php echo get_phrase('dashboard'); ?>
		</a>
	</li>
	<li>
		<a href="<?php echo site_url('admin/videos');?>">
			<?php echo get_phrase('videos'); ?>
		</a>
  </li>
	<li class="active">
    <?php echo get_phrase('watch_video'); ?>
  </li>
</ol>
<!-- breadcrumb end -->
  <?php
    $this->db->where('code', $video_code);
    $video_details = $this->db->get('video')->row_array();

    if($video_details['source'] == 1){
    	$video_id = $this->youtube->get_video_id($video_details['video_file_url']);
    }
    else if($video_details['source'] == 2){
    	$video_thumbnail     = $video_details['thumbnail'];
    	$video_urls_json 	 = $video_details['video_file_url'];
    	$video_urls_array    = json_decode($video_urls_json);
    	$mp4_file 			 = $video_urls_array->mp4;
    	$webm_file 			 = $video_urls_array->webm;
    	$ogv_file 			 = $video_urls_array->ogg;
    }
  ?>
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <?php if($video_details['source'] == 1):?>
      <div class="youtube-video-wrapper">
        <iframe width="560" height="349"
          src="https://www.youtube.com/embed/<?php echo $video_id;?>" frameborder="0" allowfullscreen>
        </iframe>
      </div>
    <?php endif; ?>

    <?php if($video_details['source'] == 2):?>
      <video class="video-js vjs-big-play-centered vjs-16-9"
        controls preload="auto" poster="//vjs.zencdn.net/v/oceans.png"
        data-setup='{"controls": true, "fluid": true}'>
        <source src="<?php echo $mp4_file;?>" type="video/mp4"></source>
				<source src="<?php echo $webm_file;?>" type="video/webm"></source>
				<source src="<?php echo $ogv_file;?>" type="video/ogg"></source>
      </video>
    <?php endif; ?>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <!-- panel containing the video add form  -->
    <div class="panel panel-default" data-collapsed="0">
      <!-- panel head -->
      <div class="panel-heading">
        <div class="panel-title">
          <i class="fa fa-info-circle"></i> &nbsp; <?php echo get_phrase('video_details'); ?>
        </div>
      </div>
      <!-- panel body -->
      <div class="panel-body" id = "video_details_panel">
          <div class="col-md-12">
            <strong><?php echo get_phrase('video_title');?>&nbsp;:</strong>
            <span><?php echo $video_details['title']; ?></span>
          </div>
          <div class="col-md-12">
            <strong><?php echo get_phrase('duration');?>&nbsp;:</strong>
            <span><?php echo $video_details['duration']; ?></span>
          </div>
          <div class="col-md-12">
            <strong><?php echo get_phrase('video_source');?>&nbsp;:</strong>
            <span>
              <?php
                if($video_details['source'] == 1)
                  echo 'YouTube';
                else
                  echo 'Video';
                ?>
            </span>
          </div>
          <div class="col-md-12">
            <strong><?php echo get_phrase('video_category');?>&nbsp;:</strong>
            <span>
              <?php
                $this->db->where('code', $video_details['category_code']);
                $category = $this->db->get('category')->row_array();
                echo $category['title'];
               ?>
            </span>
          </div>
          <div class="col-md-12">
            <strong><?php echo get_phrase('video_pack');?>&nbsp;:</strong>
            <span>
              <?php
              $this->db->where('code', $video_details['video_pack_code']);
              $video_pack = $this->db->get('video_pack')->row_array();
              echo $video_pack['title'];
             ?>
           </span>
          </div>
          <div class="col-md-12">
            <strong><?php echo get_phrase('views');?>&nbsp;:</strong>
            <span><?php echo $video_details['views']; ?></span>
          </div>
          <div class="col-md-12">
            <strong><?php echo get_phrase('likes');?>&nbsp;:</strong>
            <span><?php echo $video_details['likes']; ?></span>
          </div>
          <div class="col-md-12">
            <strong><?php echo get_phrase('dislikes');?>&nbsp;:</strong>
            <span><?php echo $video_details['dislikes']; ?></span>
          </div>
          <div class="col-md-12">
            <strong><?php echo get_phrase('rate');?>&nbsp;:</strong>
            <span><?php echo $video_details['age_rating']; ?></span>
          </div>
          <div class="col-md-12">
            <strong><?php echo get_phrase('last_modified');?>&nbsp;:</strong>
            <span>
              <?php
              if ($video_details['last_modified'] == '') {
                echo '';
              }
              else{
                echo date('D, d M Y', $video_details['last_modified']);
              }
              ?>
          </span>
          </div>
      </div>
    </div>
    <!-- panel containing the video add form -->
  </div>
</div>
