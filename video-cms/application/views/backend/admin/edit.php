<div class="gallery-env">
  <div class="row">
    <!-- items -->
    <?php
      for ($i=0; $i < $number_of_packs; $i++):
        // get the necessary info about the video pack
        $video_pack_title = get_info_by_id('video_pack', $video_pack_ids[$i], 'title');
        $video_pack_sub_category_id = get_info_by_id('video_pack', $video_pack_ids[$i], 'sub_category_id');
        $video_pack_category_id = get_info_by_id('sub_category', $video_pack_sub_category_id, 'category_id');
        $video_pack_category = get_info_by_id('category', $video_pack_category_id, 'title');
        $videos_in_pack = get_info_by_id('video_pack', $video_pack_ids[$i], 'video_ids');
        $number_of_videos_in_pack = $videos_in_pack == '' ? 0 : ((count(explode(',', $videos_in_pack))) - 1);
        $favs = get_info_by_id('video_pack', $video_pack_ids[$i], 'favourites');
        $price = get_info_by_id('video_pack', $video_pack_ids[$i], 'price');
    ?>
      <div class="col-sm-4">
        <article class="album">
          <header>
            <a href="<?php echo site_url('admin/video_pack_details/'.$video_pack_ids[$i]);?>">
              <img src="<?php echo base_url('assets/backend/images/video_pack.jpg');?>" />
            </a>
          </header>
          <section class="album-info" style="background-color: #FAFAFA;">
            <h3><?php echo $video_pack_title; ?></h3>
            <p><?php echo $video_pack_category; ?></p>
          </section>
          <footer style="background-color: #FAFAFA;">
            <div class="album-images-count">
              <i class="fa fa-video-camera"></i> &nbsp;
              <?php echo $number_of_videos_in_pack; ?>
            </div>
            <div class="album-options">
                <i class="fa fa-heart"></i> &nbsp;
                <?php echo $favs; ?> &nbsp;
                <i class="fa fa-dollar"></i>
                <?php echo $price; ?>
            </div>
          </footer>
        </article>
      </div>
    <?php endfor; ?>
    <!-- items -->
  </div>
</div>
