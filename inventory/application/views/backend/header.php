<?php
$login_user_code = $this->db->get_where('user', array('user_id' => $this->session->userdata('login_user_id')))->row()->user_code;
?>
<div class="row">

    <!-- Profile Info and Notifications -->
    <div class="col-md-6 col-sm-8 clearfix">

        <ul class="user-info pull-left pull-none-xsm">

            <!-- Profile Info -->
            <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                <a href="<?php echo base_url(); ?>index.php?<?php echo $this->session->userdata('login_type'); ?>/profile">
                    <img src="uploads/user_image/<?php echo $login_user_code; ?>.jpg" 
                         alt="" class="img-circle" width="44" />
                         <?php
                         echo $this->session->userdata('name'); //$this->db->get_where('user', array(
                             //'user_id' => $this->session->userdata('login_user_')
                         //))->row()->name;
                         ?>

                </a>
            </li>

        </ul>

        <?php
        if ($this->session->userdata('login_type') == 'admin'):
            ?>
            <ul class="user-info pull-left pull-right-xs pull-none-xsm">

                <!-- Raw Notifications -->
                <li class="notifications dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="entypo-bell"></i>
                        <?php
                        // counting the number of pending orders
                        $this->db->where('order_status', 0);
                        $this->db->from('sales_order');
                        $count = $this->db->count_all_results();
                        if ($count != 0):
                            ?>
                            <span class="badge badge-info"><?php echo $count; ?></span>
                        <?php endif; ?>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="top">
                            <p class="small">
                                <a href="<?php echo base_url(); ?>index.php?admin/sales_order_list/order_pending" 
                                   class="pull-right"><?php echo get_phrase('view'); ?></a>
                                <?php echo get_phrase('you_have'); ?> <strong><?php echo $count; ?></strong> <?php echo get_phrase('pending_sales_orders'); ?>
                            </p>
                        </li>
                    </ul>

                </li>

                <li class="notifications dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="entypo-direction"></i>
                    </a>

                    <ul class="dropdown-menu">
                        <li>

                            <ul class="dropdown-menu-list scroller">

                                <li>
                                    <a href="<?php echo base_url(); ?>index.php?admin/sales_order_add">
                                        <i class="entypo-bell"></i> &nbsp; <b><?php echo get_phrase('new_sales_order'); ?></b>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php?admin/purchase_order_add">
                                        <i class="entypo-cc-nc"></i> &nbsp; <b><?php echo get_phrase('new_purchase_order'); ?></b>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php?admin/inventory_add">
                                        <i class="entypo-basket"></i> &nbsp; <b><?php echo get_phrase('new_product'); ?></b>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php?admin/user_add">
                                        <i class="entypo-user"></i> &nbsp; <b><?php echo get_phrase('new_user'); ?></b>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>

                </li>

            </ul>
        <?php endif; ?>

    </div>


    <!-- Raw Links -->
    <div class="col-md-6 col-sm-4 clearfix hidden-xs">

        <ul class="list-inline links-list pull-right">

            <li>
                <a href="<?php echo base_url(); ?>index.php?login/logout">
                    <?php echo get_phrase('log_out'); ?> <i class="entypo-logout right"></i>
                </a>
            </li>

        </ul>

    </div>

</div>

<hr />