<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
    <span class="sr-only"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
      <div class="logo">
      <a class="navbar-brand" href="<?php echo site_url('home');?>">
        <?php $logo = $this->db->get_where('settings' , array('type' =>'logo'))->row()->description; ?>
        <img src="<?php echo base_url('assets/backend/images/'.$logo);?>" width="80" alt="" />
      </a>
    </div>
  </div>
  <div class="collapse navbar-collapse" id="navigation-example">
    <ul class="nav navbar-nav navbar-right">
      <!-- navigation items -->
      <li class="<?php if ($page_name == 'home') echo 'active';?>">
        <a href="<?php echo site_url('home');?>">
          <i class="material-icons">home</i>
          <?php echo get_phrase('home'); ?>
        </a>
      </li>
      <li class=" dropdown <?php if ($page_name == 'videos' || $page_name == 'all_videos') echo 'active'; ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="material-icons">videocam</i>
          <?php echo get_phrase('category'); ?>
        </a>
        <ul class="dropdown-menu">
          <?php $category_array = $this->db->get('category')->result_array();
          foreach ($category_array as $category):?>
          <li><a href="<?php echo site_url('home/videos/'.$category['code']);?>"><?php echo $category['title'];?></a></li>
          <?php endforeach; ?>
<!--           <li class="divider"></li> -->
          <li style="background-color: #E0E0E0;"><a href="<?php echo site_url('home/all_videos/');?>"><?php echo get_phrase('all_videos');?></a></li>
        </ul>
      </li>
      <li class="<?php if ($page_name == 'video_pack' || $page_name == 'video_pack_details') echo 'active'; ?>">
        <a href="<?php echo site_url('home/video_pack');?>">
          <i class="material-icons">folder_special</i>
          <?php echo get_phrase('video_pack'); ?>
        </a>
      </li>
      <!-- For login icon on navigation before login -->
      <?php if ($this->session->userdata('name') == ''): ?>
      <li class="<?php if ($page_name == 'register' || $page_name == 'login') echo 'active';?>">
        <a href="<?php echo site_url('home/login');?>">
          <i class="fa fa-sign-in"></i>
          <?php echo get_phrase('register'); ?> / <?php echo get_phrase('login'); ?>
        </a>
      </li>
      <?php endif; ?>
      <!-- For profile icon on navigation after login -->
      <?php if ($this->session->userdata('name') != ''): ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="material-icons">account_circle</i><?php echo $this->session->userdata('name'); ?>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="<?php echo site_url('home/profile');?>">
              <i class="material-icons">face</i> &nbsp; <?php echo get_phrase('profile'); ?>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('home/logout');?>">
              <i class="material-icons">power_settings_new</i> &nbsp; <?php echo get_phrase('logout'); ?>
            </a>
          </li>
        </ul>
      </li>
      <?php endif; ?>
      <!-- navigation items -->
    </ul>
    <!-- search -->
    <form class="navbar-form navbar-right" role="search" style="margin-left: 20px;"
      action="<?php echo site_url('home/search');?>">
      <div class="form-group form-white">
        <input type="text" class="form-control" name = 'search_string' placeholder="<?php echo get_phrase('search');?>">
      </div>
      <button type="submit" class="btn btn-simple btn-raised btn-fab btn-fab-mini">
        <i class="material-icons" style="color: #fff;">search</i>
      </button>
    </form>
    <!-- search -->
  </div>
</div>
