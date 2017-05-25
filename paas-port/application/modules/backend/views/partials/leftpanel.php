<?php echo "page is" . $page; ?>
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu" id="nav-accordion">
			<li>
				<a 
					<?php if ($page == 'dashboard') echo 'class="active"'; ?> href="
					<?php echo base_url() ?>backend/dashboard">
					<i class="icon-dashboard"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li>
				<a 
					<?php if ($page == 'email_template_list') echo 'class="active"'; ?> href="
					<?php echo base_url() ?>backend/email-template/list">
					<i class="icon-dashboard"></i>
					<span>Email Templates</span>
				</a>
			</li>
			<li>
				<a 
					<?php if ($page == 'global_setting') echo 'class="active"'; ?> href="
					<?php echo base_url() ?>backend/global-setting">
					<i class="icon-dashboard"></i>
					<span>Global Config</span>
				</a>
			</li>
            <li class="sub-menu dcjq-parent-li">

                <a href="javascript:;" class="dcjq-parent <?php if ($page == 'plans_list' || $page == 'add_plan' || $page == 'edit_plan') echo 'active'; ?>">

                    <i class="icon-dashboard"></i>

                    <span>CMS Section</span>

                    <span class="dcjq-icon"></span></a>

    				<ul class="sub" style="display: none;">

                    <li <?php if ($page == 'cms_list') echo 'class="active"'; ?>><a href="<?php echo base_url() ?>backend/cms/listCMS">CMS Pages</a></li>

                    <!--<li <?php if ($page == 'edit_cms') echo 'class="active"'; ?>><a href="<?php echo base_url() ?>backend/pricing-plans/add">Add Page</a></li> -->

                <!--</ul>

            </li>
			<li class="sub-menu dcjq-parent-li">
				<a href="javascript:;" class="dcjq-parent 
					<?php if ($page == 'plans_list' || $page == 'add_plan' || $page == 'edit_plan') echo 'active'; ?>">
					<i class="icon-dashboard"></i>
					<span>Manage Plans</span>
					<span class="dcjq-icon"></span>
				</a>
				<ul class="sub" style="display: none;">
					<li 
						<?php if ($page == 'plans_list') echo 'class="active"'; ?>>
						<a href="
							<?php echo base_url() ?>backend/pricing-plans/list">Plans List
						</a>
					</li>
					<!--<li 
					<?php if ($page == 'add_plan') echo 'class="active"'; ?>><a href="
					<?php echo base_url() ?>backend/pricing-plans/add">Add Plan</a></li>-->
				</ul>
			</li>
			<li  class="sub-menu dcjq-parent-li">
				<a href="javascript:;" class="dcjq-parent 
					<?php if ($page == 'users_list' || $page=='add_user') echo 'active'; ?>">
					<i class="icon-dashboard"></i>
					<span>Manage Users</span>
					<span class="dcjq-icon"></span>
				</a>
				<ul class="sub" style="display: none;">
					<li 
						<?php if ($page == 'users_list') echo 'class="active"'; ?>>
						<a href="
							<?php echo base_url() ?>backend/users/list">Users List
						</a>
					</li>
					<li 
						<?php if ($page == 'add_user') echo 'class="active"'; ?>>
						<a href="
							<?php echo base_url() ?>backend/users/add">Add User
						</a>
                        
					</li>
                    
				</ul>
			</li>
            <li>
						<a <?php if ($page == 'updateinfo') echo 'class="active"'; ?> href="<?php echo base_url() ?>backend/users/updateDefaultContent">
						
                        <i class="icon-dashboard"></i>
                        <span>Update Default Info</span>
                        </a>
					</li>
			<!--                  <li class="sub-menu"><a href="javascript:;" ><i class="icon-laptop"></i><span>Reports</span></a><ul class="sub"><li><a  href="#">Daily Expense</a></li><li><a  href="#">Income</a></li></ul></li>-->
		</ul>
		<!-- sidebar menu end-->
	</div>
</aside>
<!--sidebar end-->