<?php
$this->db->where('code', $video_code);
$inner_video = $this->db->get('video')->row_array();
?>
<span style="margin-right: 5px;"><i class="fa fa-eye" style="margin-right: 3px; color: #BDBDBD;"></i><?php echo $inner_video['views']; ?></span>
<span style="margin-right: 5px;"><i class="fa fa-heart" id = "favorite" style="margin-right: 3px; color: #BDBDBD;"></i><?php echo $inner_video['favourites']; ?></span>
<span style="margin-right: 5px;"><i class="fa fa-thumbs-up" id = "thumbs_up" style="margin-right: 3px; color: #BDBDBD;"></i><?php echo $inner_video['likes']; ?></span>
<span style="margin-right: 5px;"><i class="fa fa-thumbs-down" id = "thumbs_down" style="margin-right: 3px; color: #BDBDBD;"></i><?php echo $inner_video['dislikes']; ?></span>
