<?php
   $this->db->where('code', $category_code);
   $category = $this->db->get('category')->row()->title;
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
		<a href="<?php echo site_url('admin/video_category');?>">
			<?php echo get_phrase('video_category'); ?>
		</a>
  </li>
	<li>
		<a href="<?php echo site_url('admin/video_add/inside_video_category/').$category_code;?>">
			<strong style="color: #212121;"><?php echo get_phrase('add_video_in_this_category'); ?></strong>
		</a>
  </li>
	<li class="active">
    <?php echo $category; ?>
  </li>
</ol>
<!-- breadcrumb end -->

<!-- for tracking the category code -->
<input type="text" name="" id = 'category_code' value="<?php echo $category_code; ?>" style="display: none;">

<!-- Search Bar Starts -->
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 pull-right" style="margin-right: 25px;">
  <input type="text" name="" value="" class="form-control search_bar" placeholder="<?php echo get_phrase('search').'...';?>">
</div>
<!-- Search Bar Ends -->

<!-- Album -->
<div class="gallery-env">
  <?php include 'show_category_details_album.php'; ?>
</div>

<!-- Floating Button For Adding Video In This Category Starts -->
<a href="<?php echo site_url('admin/video_add/inside_video_category/').$category_code;?>">
  <div id="floating-button" data-toggle="tooltip" data-placement="left">
      <p class="plus">+</p>
  </div>
</a>
<!-- Floating Button For Adding Video In This Category Ends -->

<script type="text/javascript">
  $('.search_bar').keyup(function(){
    var category_code = $('#category_code').val();
    var searching_string = $('.search_bar').val();
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('admin/searching_by_code'); ?>',
      data:{"type":"category", "code":category_code, "searching_string":searching_string},
      success:function(response){
        $('.gallery-env').html(response);

      }
    });
  });
</script>
