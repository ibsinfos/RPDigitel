<?php
  $user_code = $this->session->userdata('code');
  $this->db->where('code', $user_code);
  $users_video_details = $this->db->get('user')->row_array();
  $favorites_video = explode(',', $users_video_details['favorite_video_ids']);
  $purchased_video = explode(',', $users_video_details['purchased_video_pack_ids']);
 ?>
<body class="profile-page">
  <nav class="navbar navbar-<?php echo $color_scheme;?> navbar-transparent navbar-fixed-top navbar-color-on-scroll">
    <?php include 'navigation.php'; ?>
  </nav>
  <div class="page-header header-filter" data-parallax="active"
    style="background-image: url('<?php echo base_url('assets/profile_banner.png');?>');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-xs-6 col-xs-offset-3">
            <div class="profile">
              <div class="avatar">
                <img src="<?php echo base_url('uploads/user_image/'.$this->session->userdata('user_id').'.jpg');?>"
                  class="img-circle img-responsive img-raised">
              </div>
              <div class="name">
                <h3 class="title"><?php echo $this->session->userdata('name'); ?></h3>
              </div>
            </div>
          </div>
        </div>
        <div class="section">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-nav-tabs">
								<div class="header header-<?php echo $color_scheme;?>">
									<div class="nav-tabs-navigation">
										<div class="nav-tabs-wrapper">
											<ul class="nav nav-tabs" data-tabs="tabs">
												<li class="active">
                          <a href="#tab1" data-toggle="tab">
                            <i class="material-icons">favorite</i>
                            <?php echo get_phrase('favorites'); ?>
                          </a>
                        </li>
												<li>
                          <a href="#tab2" data-toggle="tab">
                            <i class="material-icons">add_shopping_cart</i>
                            <?php echo get_phrase('purchased'); ?>
                          </a>
                        </li>
												<li>
                          <a href="#tab3" data-toggle="tab">
                            <i class="material-icons">settings</i>
                            <?php echo get_phrase('settings'); ?>
                          </a>
                        </li>
											</ul>
										</div>
									</div>
								</div>
								<div class="content">
									<div class="tab-content text-center">
										<div class="tab-pane active" id="tab1">
                      <?php include 'profile_favorites.php'; ?>
										</div>
										<div class="tab-pane" id="tab2">
                      <?php include 'profile_purchased.php'; ?>
										</div>
										<div class="tab-pane" id="tab3">
                      <?php include 'profile_settings.php'; ?>
										</div>
									</div>
								</div>
							</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <?php include 'includes_bottom.php'; ?>
</body>
