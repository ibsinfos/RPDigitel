<div class="row">
    <div class="col-md-12 col-sm-12 clearfix" style="text-align:center;">
        <h2 style="font-weight:200; margin:0px;">
            <?php
            if ($this->session->userdata('admin_login') == 1) {
                echo $system_name;
            }
            ?>
        </h2>
    </div>
    <div class="col-md-6 col-sm-8 clearfix">
        <ul class="user-info pull-left pull-none-xsm">
            <!-- Profile Info -->
            <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
                <a href="<?php echo site_url('admin/manage_profile/') . $this->session->userdata('login_user_id'); ?>">
                    <img src="<?php echo get_user_image($logged_in_user_type, $logged_in_user_id); ?>"
                         alt="" class="img-circle" width="44" />
                         <?php
                         echo $this->session->userdata('name')." (".$this->session->userdata('login_type').")"; // get_info_by_id($logged_in_user_type, $logged_in_user_id, 'name');
                         ?>
                </a>
            </li>
        </ul>
    </div>
    <!-- logout link -->
    <div class="col-md-6 col-sm-4 clearfix hidden-xs">
        <ul class="list-inline links-list pull-right">
            <li>
                <a href="<?php echo site_url('home'); ?>" target = "_blank">
                    <?php echo get_phrase('frontend'); ?> <i class="fa fa-desktop"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('login/logout'); ?>">
                    <?php echo get_phrase('logout'); ?> <i class="entypo-logout right"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
