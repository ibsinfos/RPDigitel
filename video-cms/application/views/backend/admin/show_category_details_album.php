<div class="row">
<?php
  $this->db->where('category_code', $category_code);
  $this->db->like('title', $searching_string);
  $video_details = $this->db->get('video')->result_array();

  foreach ($video_details as $video):?>
		<div class="col-sm-3">

			<article class="album">

				<header>
					<a href="<?php echo site_url('admin/single_video_details/').$video['code']; ?>">
            <?php if ($video['source'] == 1): ?>
              <img src="<?php echo $video['thumbnail']; ?>" />
            <?php endif; ?>

            <?php if ($video['source'] == 2): ?>
              <img src="<?php echo base_url('uploads/video_thumbnail/').$video['code'].'.jpg'; ?>" style="height: 100%;"/>
            <?php endif; ?>
					</a>
				</header>

				<footer>
          <div class="col-sm-12">
					<div class="album-images-count col-sm-9">
            <a href="<?php echo site_url('admin/single_video_details/').$video['code']; ?>">
              <?php
               $video_title = substr($video['title'],0,18).'...';
               echo strtolower($video_title);
              ?>
           </a>
					</div>

			<div class="album-options col-sm-3">
				<div class="row">
					<div class="col-sm-1">
						<a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/video_edit_with_default_video_category/'.$video['code']);?>')">
							<i class="entypo-cog"></i>
						</a>
					</div>
          <div class="col-sm-1"></div>
					<div class="col-sm-1">
						<a href="#" onclick="confirm_modal('<?php echo site_url('admin/videos/delete/'.$video['code']);?>',
							'<?php echo site_url('admin/show_category_details/'.$category_code);?>')">
							<i class="entypo-trash"></i>
						</a>
					</div>
				</div>
			</div>
         </div>
				</footer>

			</article>
		</div>
<?php endforeach; ?>
<?php
  if (sizeof($video_details) == 0):?>

  <h4 style="text-align: center;"><?php echo get_phrase('no_video_found'); ?></h4>

<?php endif; ?>
  </div>


<style media="screen">
  .search_bar{
    position: absolute;
    margin-top: -61px;
  }
</style>
<script type="text/javascript">
jQuery(document).ready(function($)
{
	// Handle the Change Cover
	$(".gallery-env").on("click", ".album header .album-options", function(ev)
	{
		ev.preventDefault();

		// Sample Modal
		$("#album-cover-options").modal('show');

		// Sample Crop Instance
		var image_to_crop = $("#album-cover-options .croppable-image img"),
			img_load = new Image();

		img_load.src = image_to_crop.attr('src');
		img_load.onload = function()
		{
			if(image_to_crop.data('loaded'))
				return false;

			image_to_crop.data('loaded', true);

			image_to_crop.Jcrop({
				boxWidth: 410,
				boxHeight: 265,
				onSelect: function(cords)
				{
					// you can use these vars to save cropping of the image coordinates
					var h = cords.h,
						w = cords.w,

						x1 = cords.x,
						x2 = cords.x2,

						y1 = cords.w,
						y2 = cords.y2;

				}
			}, function()
			{
				var jcrop = this;

				jcrop.animateTo([800, 600, 150, 50]);
			});
		}
	});
});

 // custom function for data deletion by ajax and post refreshing call
  function delete_data(delete_url , post_refresh_url) {

		//var delete_message = '<?php echo get_phrase('video_deleted');?>';
		// showing user-friendly pre-loader image
		$('#preloader-delete').html('<img src="<?php echo base_url('assets/backend/images/preloader.gif');?>" style="height:15px;margin-top:-10px;" />');
    // disables the delete and cancel button during deletion ajax request
		document.getElementById("delete_link").disabled=true;
		document.getElementById("delete_cancel_link").disabled=true;
    // make the ajax call
		$.ajax({
			url: delete_url,
			success: function(response) {
				// remove the preloader
				$('#preloader-delete').html('');
        // hide the delete dialog box
				$('#modal_delete').modal('hide');
				// show deletion success msg.
				//toastr.success(delete_message);
        // enables the delete and cancel button after deletion ajax request success
				document.getElementById("delete_link").disabled=false;
				document.getElementById("delete_cancel_link").disabled=false;
        // reload the table
				reload_data(post_refresh_url);
			}
		});
	}

	// function for reloading table data
	function reload_data(url) {
		$(location).attr('href' , url);
	}
</script>
