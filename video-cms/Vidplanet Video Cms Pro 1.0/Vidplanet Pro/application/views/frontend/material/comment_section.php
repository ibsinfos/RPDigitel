<?php
  $uri_segment_2 = $this->uri->segment(5);
  $color_scheme = get_settings('theme_color_scheme');
  if($item_type == 'video'){
    $this->db->where('commented_item', $video_code);
  }
  else if($item_type == 'video_pack'){
    $this->db->where('commented_item', $video_pack_code);
  }
  $total_rows = $this->db->get('comment')->num_rows();
  $config_2 = array();
  $config_2 = pagintaion($total_rows, 10);
  if($item_type == 'video'){
    $config_2['base_url']  = site_url('home/watch_video/'.$video_code.'/');
  }
  else if($item_type == 'video_pack'){
    $config_2['base_url']  = site_url('home/video_pack_details/'.$video_pack_code.'/'.$uri_segment_1.'/');
  }
  $this->pagination->initialize($config_2);

  if($item_type == 'video'){
    $this->db->where('commented_item', $video_code);
  }
  else if($item_type == 'video_pack'){
    $this->db->where('commented_item', $video_pack_code);
  }
  $this->db->order_by('comment_id', 'DESC');
  if($item_type == 'video'){
    $comment_details = $this->db->get('comment', $config_2['per_page'], $this->uri->segment(4))->result_array();
  }
  if($item_type == 'video_pack'){
    $comment_details = $this->db->get('comment', $config_2['per_page'], $uri_segment_2)->result_array();
  }

  foreach ($comment_details as $comment):
  $this->db->where('code', $comment['commented_user']);
  $user_details = $this->db->get('user')->row_array();
?>
<!-- item -->
<div class="media">
  <a class="pull-left" href="#">
    <div class="avatar">
      <img class="media-object" src="<?php echo base_url('uploads/user_image/'.$user_details['user_id'].'.jpg');?>">
    </div>
  </a>
  <div class="media-body">
    <h4 class="media-heading"><?php echo $user_details['name']; ?>&nbsp;<small style="font-size: 11px;"> <?php echo date('D, d M Y', $comment['date_added']);?></small></h4>
    <h6 class="text-muted"></h6>

    <p><?php echo $comment['comment']; ?></p>
  </div>
</div><!-- item -->
<?php endforeach; ?>
<div class="pagination-area text-center">
  <?php echo $this->pagination->create_links(); ?>
</div>
