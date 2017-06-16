<body class="login-page">
  <nav class="navbar navbar-<?php echo $color_scheme;?> navbar-transparent navbar-absolute">
    <?php include 'navigation.php'; ?>
  </nav>
  <div class="page-header header-filter"
    style="background-image: url('<?php echo base_url('uploads/home_page/home.jpg') ?>'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
          <div class="card card-signup">
            <form class="form" method="POST" action="<?php echo site_url('home/register/add_user'); ?>">
              <div class="header header-<?php echo $color_scheme;?> text-center">
                <h4 class="card-title"><?php echo get_phrase('register'); ?></h4>
                <!-- <div class="social-line">
                  <a href="login-page.html#pablo" class="btn btn-just-icon btn-simple">
                  <i class="fa fa-facebook-square"></i>
                  </a>
                  <a href="login-page.html#pablo" class="btn btn-just-icon btn-simple">
                  <i class="fa fa-twitter"></i>
                  </a>
                  <a href="login-page.html#pablo" class="btn btn-just-icon btn-simple">
                  <i class="fa fa-google-plus"></i>
                  </a>
                </div> -->
              </div>
              <div class="content">
                <div class="input-group">
                  <span class="input-group-addon">
                  <i class="material-icons">face</i>
                  </span>
                  <input type="text" class="form-control" name="user_name"
                    placeholder="<?php echo get_phrase('full_name');?>" autocomplete="off" required="required">
                </div>
                <div class="input-group">
                  <span class="input-group-addon">
                  <i class="material-icons">email</i>
                  </span>
                  <input type="email" class="form-control" name="user_email"
                    placeholder="<?php echo get_phrase('email');?>" autocomplete="off" required="required">
                </div>
                <div class="input-group">
                  <span class="input-group-addon">
                  <i class="material-icons">lock</i>
                  </span>
                  <input type="password" class="form-control" name="user_password"
                    placeholder="<?php echo get_phrase('password');?>" autocomplete="off" required="required">
                </div>
              </div>
              <div class="footer text-center">
                <button
                  type = 'submit' class="btn btn-<?php echo $color_scheme;?> btn-fab btn-fab-mini btn-round">
                  <i class="material-icons">done_all</i>
                </button>
                <br>
                <a href="<?php echo site_url('home/login');?>"
                  class="btn btn-<?php echo $color_scheme;?> btn-simple">
                  <?php echo get_phrase('already_have_an_account'); ?>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include 'footer.php'; ?>
    <?php include 'includes_bottom.php'; ?>
  </div>
</body>
