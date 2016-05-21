<nav  class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu"> 
            <li>
                <a class="<?php if(isset($menu_dashboard))echo $menu_dashboard; ?>" href="<?php echo base_url(); ?>index.php/dashboard/index"><i class="fa fa-dashboard "></i>Dashboard</a>
            </li>
            <li>
                <a class="<?php if(isset($menu_report))echo $menu_report; ?>" href="<?php echo base_url(); ?>index.php/dashboard/report"><i class="fa fa-bar-chart "></i>Reports </a>
            </li>
            <li>
                <a class="<?php if(isset($menu_restaurant))echo $menu_restaurant; ?>" href="<?php echo base_url(); ?>index.php/dashboard/all_restaurant"><i class="fa fa-cutlery "></i>Restaurant </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/dashboard/all_restaurant"><i class="fa fa-cutlery "></i>All Restaurant </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/dashboard/search_restaurant"><i class="fa fa-search"></i>Search</a>
                    </li> 
                </ul>
            </li>
            <li>
                <a  class="<?php if(isset($menu_admin))echo $menu_admin; ?>"  href="#"><i class="fa fa-user "></i>Admin <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/admin/registration"><i class="fa fa-user-plus "></i>Add Admin</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/admin/all_admin"><i class="fa fa-users "></i>View Admin</a>
                    </li> 
                </ul>
            </li>  
            <li>
                <a href="<?php echo base_url(); ?>index.php/admin/sign_out"><i class="fa fa-sign-out "></i>Log Out</a>
            </li>

        </ul>
    </div>

</nav>