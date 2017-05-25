<?php $session_data = $this->session->userdata();?>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="<?php echo base_url()?>dashboard">vCard </a>
            <div class="nav-collapse">
                <ul class="nav pull-right">
<!--                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon-cog"></i> Account <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:;">Settings</a></li>
                            <li><a href="javascript:;">Help</a></li>
                        </ul>
                    </li>-->
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon-user"></i> <?php echo "Hello " . ucfirst($session_data['user_account']['first_name']); ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <!--<li><a href="<?php echo base_url() ?>vcard-edit">Update vCard</a></li>-->
                            <!--<li><a href="javascript:;">Profile</a></li>-->
                            <li><a href="<?php echo base_url() ?>logout" onclick="return confirm('Are you sure?')">Logout</a></li>
                        </ul>
                    </li>
                </ul>
<!--                <form class="navbar-search pull-right">
                    <input type="text" class="search-query" placeholder="Search">
                </form>-->
            </div>
            <!--/.nav-collapse --> 
        </div>
        <!-- /container --> 
    </div>
    <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li class="<?php if ($page == 'dashboard' || $page == 'textmsg' || $page == 'appointment' || $page == 'autoresponder' || $page =='newautoresponder' || $page =='add_oppointment' || $page =='mmslist') echo 'active'; ?>"><a href="<?php echo base_url() ?>dashboard"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                <!--<li class="<?php if ($page == 'features') echo 'active'; ?>"><a href="#"><i class="icon-list-alt"></i><span>Features</span> </a> </li>-->
                <li class="<?php if ($page == 'contacts') echo 'active'; ?>"><a href="<?php echo base_url() ?>contacts"><i class="icon-phone-sign"></i><span>Contacts</span> </a></li>
                <!--<li class="<?php if ($page == 'reports') echo 'active'; ?>"><a href="#"><i class="icon-bar-chart"></i><span>Reports</span> </a> </li>-->
                
<!-- Below code Added and commented by ranjit on 26 april 2017 to vcard-manage menu in inner header -->                
				<!--
				<li class="<?php //if ($page == 'vcard-edit') echo 'active'; ?>"><a href="<?php //echo base_url() ?>vcard-edit"><i class="icon-file"></i><span>Update vcard</span> </a> </li>
                <li class="<?php //if ($page == 'reports') echo 'active'; ?>"><a target="_blank" href="<?php //echo base_url(). $session_data['user_account']['slug']?>"><i class="icon-file"></i><span>View vcard</span> </a> </li>
				-->

				<li class="<?php if ($page == 'vcard-manage' || $page == 'vcard-edit' || $page == 'reports' || $page == 'vcard-steps') echo 'active'; ?>"><a href="<?php echo base_url() ?>vcard-manage"><i class="icon-file"></i><span>Manage vcard</span> </a> </li>


                </li>
            </ul>
        </div>
        <!-- /container --> 
    </div>
    <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->