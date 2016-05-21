<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a  class="navbar-brand" href="<?php echo base_url(); ?>index.php/">Restaurant Menu Card </a>
    </div>

    <div class="notifications-wrapper">
        <ul class="nav">  
            <li class="dropdown pull-right">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user-plus"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?php echo base_url(); ?>index.php/admin/profile"><i class="fa fa-user-plus"></i> My Profile</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/edit_profile"><i class="fa fa-edit"></i> Edit Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/sign_out"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </li>
            <li> 
                <div style="padding:0 10px">               
                    <strong>Current User : </strong><?php echo $this->session->userdata('name'); ?> <br/>
                    <strong>Email : </strong><?php echo $this->session->userdata('email'); ?> <br/>
                    <strong>Ip Address : </strong><?php echo $this->session->userdata('ip_address'); ?> <br/>
                </div>
            </li>
        </ul>
    </div> 
</nav>