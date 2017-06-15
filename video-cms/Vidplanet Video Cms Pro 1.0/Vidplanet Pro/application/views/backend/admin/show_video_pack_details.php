<?php
   $this->db->where('code', $video_pack_code);
   $video_pack = $this->db->get('video_pack')->row()->title;
 ?>
<!-- breadcrumb start -->
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo site_url('admin/dashboard');?>">
			<i class="fa fa-dashboard"></i>
			<?php echo get_phrase('dashboard'); ?>
		</a>
	</li>
	<li>
		<a href="<?php echo site_url('admin/video_packs');?>">
			<?php echo get_phrase('video_pack'); ?>
		</a>
  </li>
	<li>
		<a href="<?php echo site_url('admin/video_add/inside_video_pack/').$video_pack_code;?>">
			<strong style="color: #212121;"><?php echo get_phrase('add_video_in_this_pack'); ?></strong>
		</a>
  </li>
	<li class="active">
    <?php echo $video_pack; ?>
  </li>
</ol>
<!-- breadcrumb end -->
<!-- for tracking the category code -->
<input type="text" name="" id = 'video_pack_code' value="<?php echo $video_pack_code; ?>" style="display: none;">

<!-- Search Bar Starts -->
  <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 pull-right" style="margin-right: 25px;">
    <input type="text" name="" value="" class="form-control search_bar" placeholder="<?php echo get_phrase('search').'...';?>">
  </div>
<!-- Search Bar Ends -->
<div class="gallery-env">
  <?php include 'show_video_pack_details_album.php'; ?>
</div>

<!-- Floating Button For Adding Video In This Video Pack Starts -->
<a href="<?php echo site_url('admin/video_add/inside_video_pack/').$video_pack_code;?>">
  <div id="floating-button" data-toggle="tooltip" data-placement="left">
      <p class="plus">+</p>
  </div>
</a>
<!-- Floating Button For Adding Video In This Video Pack Ends -->

<script type="text/javascript">
  $('.search_bar').keyup(function(){
    var video_pack_code = $('#video_pack_code').val();
    var searching_string = $('.search_bar').val();
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('admin/searching_by_code'); ?>',
      data:{"type":"video_pack", "code":video_pack_code, "searching_string":searching_string},
      success:function(response){
        $('.gallery-env').html(response);

      }
    });
  });
</script>
