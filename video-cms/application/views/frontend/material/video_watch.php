<?php
  $liked ='';
  $disliked = '';
  $favorite = '';
  // For increasing views
  $this->db->where('code', $video_code);
  $views = $this->db->get('video')->row()->views;
  $views = $views + 1;
  $new_view = array(
    'views' => $views
  );
  $this->db->where('code', $video_code);
  $this->db->update('video', $new_view);
  // Ending of view codes

  // Video Details
  $this->db->where('code', $video_code);
  $video_details = $this->db->get('video')->row_array();
  if($video_details['source'] == 1){
    $video_id = $this->youtube->get_video_id($video_details['video_file_url']);
  }
  else if($video_details['source'] == 2){
    $video_thumbnail  = $video_details['thumbnail'];
    $video_urls_json 	= $video_details['video_file_url'];
    $video_urls_array = json_decode($video_urls_json);
    $mp4_file 			  = $video_urls_array->mp4;
    $webm_file 			  = $video_urls_array->webm;
    $ogv_file 			  = $video_urls_array->ogg;
  }

  // User liked / favorite / dislike info
  if($this->session->userdata('user_login') == 1){
    $this->db->where('code', $this->session->userdata('code'));
    $reaction_details = $this->db->get('user')->row_array();

    if($reaction_details['liked_video_ids'] != ''){
      $liked_video_ids = explode(',', $reaction_details['liked_video_ids']);
      for($i = 0; $i < sizeof($liked_video_ids)-1; $i++){
        if($liked_video_ids[$i] == $video_details['video_id']){
          $liked = 1;
        }
      }
    }
    if($reaction_details['disliked_video_ids'] != ''){
      $disliked_video_ids = explode(',', $reaction_details['disliked_video_ids']);
      for($i = 0; $i < sizeof($disliked_video_ids)-1; $i++){
        if($disliked_video_ids[$i] == $video_details['video_id']){
          $disliked = 1;
        }
      }
    }
    if($reaction_details['favorite_video_ids'] != ''){
      $favorite_video_ids = explode(',', $reaction_details['favorite_video_ids']);
      for($i = 0; $i < sizeof($favorite_video_ids)-1; $i++){
        if($favorite_video_ids[$i] == $video_details['video_id']){
          $favorite = 1;
        }
      }
    }
  }

  // Side video list
  $sort_video_array  = array();
  $first_part        = array();
  $second_part       = array();
  $play_list         = array();
  $i = 0;
  $j = 0;
  if($video_details['within_a_pack'] == 1){ 
    $this->db->where('video_pack_code', $video_details['video_pack_code']);
    $video_list = $this->db->get('video')->result_array();
    foreach ($video_list as $single_video) {
        $this->db->where('code', $single_video['code']);
        $single_video_id = $this->db->get('video')->row()->video_id;
          $sort_video_array[$i] = $single_video_id;
          $i++;
    }
    $size = sizeof($sort_video_array);
    $key = array_search($video_details['video_id'], $sort_video_array);
    for ($i=0; $i < $key; $i++) { 
      $first_part[$i] = $sort_video_array[$i];
    }
    for ($i=$key+1; $i < $size; $i++) { 
      $second_part[$j] = $sort_video_array[$i];
      $j++;
    }
    $play_list = array_merge($second_part, $first_part);
    // print_r($sort_video_array);
    // echo '<br/>';
    // print_r($first_part);
    // echo '<br/>';
    // print_r($second_part);
    // echo '<br/>';
    // print_r($play_list);
    // die();
  }
  else{
    $array = array(
      'category_code'=> $video_details['category_code'],
      'within_a_pack'=> 0
    );
    $this->db->where($array);
    $video_list = $this->db->get('video')->result_array();
    foreach ($video_list as $single_video) {
        $this->db->where('code', $single_video['code']);
        $single_video_id = $this->db->get('video')->row()->video_id;
          $sort_video_array[$i] = $single_video_id;
          $i++;
    }
    $size = sizeof($sort_video_array);
    $key = array_search($video_details['video_id'], $sort_video_array);
    for ($i=0; $i < $key; $i++) { 
      $first_part[$i] = $sort_video_array[$i];
    }
    for ($i=$key+1; $i < $size; $i++) { 
      $second_part[$j] = $sort_video_array[$i];
      $j++;
    }
    $play_list = array_merge($second_part, $first_part);
    // print_r($sort_video_array);
    // echo '<br/>';
    // print_r($first_part);
    // echo '<br/>';
    // print_r($second_part);
    // echo '<br/>';
    // print_r($play_list);
    // die();
  }
?>
<?php include 'includes_top.php'; ?>
<body class="blog-posts">
  <nav class="navbar navbar-<?php echo $color_scheme;?> navbar-fixed-top">
    <?php include 'navigation.php'; ?>
  </nav>
  <div style="margin-top: 82px; text-align: center;">
    <?php if ($video_details['video_pack_code'] != ''):
      $this->db->where('code', $video_details['video_pack_code']);
      $video_pack_details = $this->db->get('video_pack')->row_array();
      $video_pack_videos_array = explode(',', $video_pack_details['video_ids']);
      $number_of_videos = sizeof($video_pack_videos_array) - 1;
    ?>
      <h3 style="font-weight: bold; color: #424242; margin-bottom: -3px;">
        <?php echo $video_pack_details['title']; ?>
      </h3>
      <span style="font-size: 11px; margin-top: 1px;">
        <?php
        if($number_of_videos > 1)
          echo $number_of_videos.' '.get_phrase('videos');
        else
          echo $number_of_videos.' '.get_phrase('video');
        ?>
      </span>
    <?php endif;?>
  </div>
  <div class="main main-raised" style="<?php if($video_details['video_pack_code'] == '') echo 'margin-top: 90px '; else echo 'margin-top:10px;';?>">
    <div class="container">
      <div class="section">
        <div class="row" style="margin-top: -40px;">
          <div class="col-md-8">
            <div class="card card-plain">
              <div class="card-image" id = <?php echo $video_details['code'];?>>
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
              <input type="text" value = '<?php echo ($video_array_1);?>' id = 'next_video_play' style = 'display: none;'>
              <input type="text" value = '<?php echo ($video_array_2);?>' id = 'previous_video_play' style = 'display: none;'>
              <?php if ($size > 0): ?>
              <!-- Next button starts-->
              <?php if ($size > 1): ?>
              <div class="row">
                <div class="next_previous_button col-md-offset-9 col-md-3 col-xs-offset-4 col-xs-4 pull-right" style="display: inline-flex; text-align: center; margin-top: 15px; padding-left: 11%;">

                  <span class = "next_button" style="margin-left: 30px;">
                    <?php 
                      $this->db->where('video_id', $play_list[0]);
                      $next_video = $this->db->get('video')->row_array();
                      $next_video_code = $next_video['code'];
                      $next_video_title= $next_video['title'];
                    ?>
                    <a href="<?php echo site_url('home/watch_video/'.slugify($next_video_title).'/'.$next_video_code)?>">
                      <div class="btn btn-<?php echo $color_scheme;?> btn-xs" data-toggle="tooltip" data-placement="left">
                          <p class="next"><?php echo get_phrase('next');?></p>
                      </div>
                    </a>
                  </span>
                </div>
              </div>
              <?php endif ?>
              <!-- Next button ends-->
              <?php endif ?>
              <div class="content">
                <div class="footer">
                  <div class="author">
                    <a href="#" class="card-title" style="font-size: 20px;">
                      <b><?php echo substr($video_details['title'], 0, 55).'...'; ?></b>
                    </a>
                  </div>
                  <div class="stats">
                    <span style="margin-right: 5px;"><i class="fa fa-eye" style="margin-right: 3px;"></i><?php echo $video_details['views']; ?></span>
                    <span style="margin-right: 5px;"><i class="fa fa-heart" id = "favorite" style="margin-right: 3px; color:<?php if($favorite == 1) echo '#E91E63';?>"></i><span id = "number_of_favorites"><?php echo $video_details['favourites'];?></span></span>
                    <span style="margin-right: 5px;"><i class="fa fa-thumbs-up" id = "thumbs_up" style="margin-right: 3px; color:<?php if($liked == 1) echo '#388E3C';?>"></i><span id = "number_of_likes"><?php echo $video_details['likes']; ?></span></span>
                    <span style="margin-right: 5px;"><i class="fa fa-thumbs-down" id = "thumbs_down" style="margin-right: 3px; color:<?php if($disliked == 1) echo '#f44336';?>"></i><span id = "number_of_dislikes"><?php echo $video_details['dislikes']; ?></span></span>
                  </div>
                </div>
                <div class="footer">
                  <div class="author">
                    <a href="#">
                      <?php $this->db->where('code', $video_details['uploader']);
                            $admin_details = $this->db->get('admin')->row_array();
                      ?>
                      <img src="<?php echo base_url('uploads/admin_image/'.$admin_details['admin_id'].'.jpg');?>"
                        class="avatar img-raised">
                      <span>
                        <?php
                        $this->db->where('code', $video_details['uploader']);
                        $uploader = $this->db->get('admin')->row()->name;
                        echo $uploader;
                        ?>
                      </span>
                    </a>
                  </div>
                  <div class="stats">
                    <?php echo get_phrase('published_on_').date('D, d M Y', $video_details['date_added']);?>
                  </div>
                </div>
                <div class="footer" style="margin-top: 20px; margin-left: -5px;">
                  <div class="author">
                    <a href = "https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url();?>"  target="_blank"
                      class="btn btn-just-icon btn-round btn-facebook">
                      <i class="fa fa-facebook" style="color: #fff;"> </i>
                    <div class="ripple-container"></div></a>
                    <a href = "https://plus.google.com/share?url=<?php echo current_url();?>" target = "_blank" class="btn btn-just-icon btn-round btn-google">
                      <i class="fa fa-google" style="color: #fff;"></i>
                    <div class="ripple-container"></div></button>
                    <a target="_blank" href="https://twitter.com/share?url=<?php echo current_url();?>" class="btn btn-just-icon btn-round btn-twitter">
                      <i class="fa fa-twitter" style="color: #fff;"></i>
                    <div class="ripple-container"></div></a>
                    <a href = "http://www.pinterest.com/pin/create/button/?url=<?php echo current_url();?>" target = "_blank" class="btn btn-just-icon btn-round btn-pinterest">
                      <i class="fa fa-pinterest" style="color: #fff;"></i>
                    <div class="ripple-container"></div></a>
                  </div>
                </div>
                <hr />
                <a href="#">
                  <h6 class="category text-<?php echo $color_scheme;?>">
                    <?php
                        $this->db->where('code', $video_details['category_code']);
                        $category = $this->db->get('category')->row()->title;
                        echo $category;
                     ?>
                  </h6>
                </a>
                <p class="card-description video_description" style="height: 150px; overflow-y: auto; text-align: justify;">
                  <?php echo $video_details['description']; ?>
                </p>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <h3 class="title"><?php echo get_phrase('comments') ?></h3>
                <div class="media media-post">
                  <a class="pull-left author" href="#">
                    <div class="avatar">
                      <?php if ($this->session->userdata('user_login') == 1): ?>
                        <img class="media-object" src="<?php echo base_url('uploads/user_image/'.$this->session->userdata['user_id'].'.jpg');?>">
                      <?php endif; ?>
                      <?php if ($this->session->userdata('user_login') != 1): ?>
                        <img class="media-object" src="<?php echo base_url('assets/backend/images/user.jpg');?>">
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="media-body">
                    <textarea class="form-control comment_box" placeholder="<?php echo get_phrase('post_a_public_comment');?>" rows="3"></textarea>
                    <div class="media-footer">
                      <button type = "submit" class="post_comment_button btn btn-<?php echo $color_scheme;?> btn-fab btn-fab-mini btn-round pull-right">
                        <i class="material-icons">done_all</i>
                        <div class="ripple-container"></div>
                      </button>
                    </div>
                  </div>
                </div>
                <hr />
                <div class="media-area" id = "comment_section">
                  <?php
                  include 'comment_section.php';
                  ?>
                </div>
                <!-- end media-post -->
              </div>
            </div>

          </div>
          <!-- right side video thumbnails -->
          <div class="col-md-4" style="margin-top: 5px;">
            <div class="row">
              <?php
                for ($j = 0; $j < sizeof($play_list); $j++):
                $this->db->where('video_id', $play_list[$j]);
                $side_video_details = $this->db->get('video')->result_array();
                foreach ($side_video_details as $video):?>
              <!-- item -->
              <div class="col-md-12">
                <a href="#">
                  <div class="card card-plain card-blog">
                    <div class="row" style="margin-top: -35px;">
                      <a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']);?>">
                        <div class="col-md-7">
                          <div class="card-image">
                            <?php if($video['source'] == 1): ?>
                               <img src="<?php echo $video['thumbnail'];?>"/>
                            <?php endif; ?>
                            <?php if($video['source'] == 2): ?>
                               <img src="<?php echo base_url('uploads/video_thumbnail/'.$video['thumbnail']);?>"/>
                            <?php endif; ?>
                          </div>
                        </div>
                      </a>
                      <div class="col-md-5">
                      <a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']);?>" style = 'color: #717171;'>
                        <p class="text" title = "<?php echo $video['title'];?>">
                          <?php echo substr($video['title'], 0, 70).'...'; ?>
                        </p>
                      </a>
                        <div class="foot">
                          <?php echo $video['views'].' '.get_phrase('views'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <!-- item -->
            <?php endforeach;?>
            <?php endfor; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <?php include 'includes_bottom.php'; ?>
<style media="screen">

</style>
</body>
<script type="text/javascript">
var reaction;
var video_code = '<?php echo $video_code; ?>'
function post_reaction(reaction){
  $.ajax({
    type: 'POST',
    url: "<?php echo site_url('home/reaction')?>",
    data: { 'reaction' : reaction, 'video_code' : video_code },
    success : function(response){
      // console.log(response);
      if(response == 'login'){
        window.location.href = "<?php echo site_url('home/login');?>";
      }
      else{
        var response = response.split('-');
        if(response[1] === 'like'){
          $('#number_of_likes').text(response[0]);
          $('#thumbs_up').css('color','#388E3C');
          $('#number_of_dislikes').text(response[2]);
          $('#thumbs_down').css('color','#999999');
        }
        if(response[1] === 'unlike'){
          $('#number_of_likes').text(response[0]);
          $('#thumbs_up').css('color','#999999');
        }
        if(response[1] === 'dislike'){
          $('#number_of_dislikes').text(response[0]);
          $('#thumbs_down').css('color','#f44336');
          $('#number_of_likes').text(response[2]);
          $('#thumbs_up').css('color','#999999');
        }
        if(response[1] === 'undislike'){
          $('#number_of_dislikes').text(response[0]);
          $('#thumbs_down').css('color','#999999');
        }
        if(response[1] === 'favorite'){
          $('#number_of_favorites').text(response[0]);
          $('#favorite').css('color','#E91E63');
        }
        if(response[1] === 'unfavorite'){
          $('#number_of_favorites').text(response[0]);
          $('#favorite').css('color','#999999');
        }
    }
  }
  });
}
$('#thumbs_up').mouseenter(function(){
  $('#thumbs_up').css('cursor','pointer');
});
$('#thumbs_down').mouseenter(function(){
  $('#thumbs_down').css('cursor','pointer');
});
$('#favorite').mouseenter(function(){
  $('#favorite').css('cursor','pointer');
});
$('#thumbs_up').click(function(){
    post_reaction('like');
});
$('#thumbs_down').click(function(){
  post_reaction('dislike');
});
$('#favorite').click(function(){
  post_reaction('favorite');
});

// FOr posting comment
$('.post_comment_button').click(function(){
  <?php if($this->session->userdata('user_login') == 1){ ?>
    var comment = jQuery.trim($('.comment_box').val());
    if(comment == ''){
    }
    else{
      var item_code = '<?php echo $video_code; ?>';
      var user_code = '<?php echo $this->session->userdata("code");?>';
      $.ajax({
        type: 'POST',
        url :'<?php echo site_url('home/post_comment/');?>',
        data: {'comment' : comment, 'item_code' : item_code, 'user_code' : user_code, 'item_type' : 'video' },
        success: function(response){
        $('#comment_section').html(response);
        $('.comment_box').val('');
        }
      });
    }
    <?php } else { ?>
      window.location.href = "<?php echo site_url('home/login');?>";
      <?php } ?>
});

function previous_video(){
  var video_list = $('#previous_video_play').val();
  var video_list_array = video_list.split('-');
  var size = video_list_array.length - 1;
  var running_video_code = $('.card-image').attr('id');
}

function next_video(){
  var video_list = $('#next_video_play').val();
  var video_list_array = video_list.split('-');
  var size = video_list_array.length - 1;
  var running_video_code = $('.card-image').attr('id');
  if(video_list_array[0] !== ''){
    $.ajax({
      type: 'POST',
      url : '<?php echo site_url('home/watch_video/');?>',
      data: {'video_id' : video_list_array[0]},
      success: function(data){
        alert(data);
      }

    });
  }
  else{

  }
}
</script>
