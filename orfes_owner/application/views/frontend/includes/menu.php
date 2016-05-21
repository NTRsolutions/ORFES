<nav class="navbar navbar-default">
    <div class="x_container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
           

            <ul class="nav navbar-nav navbar-right">
                <?php if ($this->session->userdata('isLogIn') == FALSE) { ?>
                    <li><a class="<?php if (isset($menu_signup)) echo $menu_signup; ?>" href="<?php echo base_url(); ?>index.php/pages/signup">Sign Up</a></li>
                    <li><a class="<?php if (isset($menu_signin)) echo $menu_signin; ?>" href="<?php echo base_url(); ?>index.php/pages/signin">Sign In</a></li>
                <?php } ?>

                <?php if ($this->session->userdata('isLogIn') == TRUE) { ?>
                <li class="dropdown">
                    <a class="<?php if (isset($menu_settings)) echo $menu_settings; ?>" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Settings <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>index.php/<?php echo $this->session->userdata('username'); ?>">Restaurant Profile</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/restaurant/change_restaurant_name">Change Restaurant Name</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/information/change_information">Change Information</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/information/change_logo">Add or Change Logo</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/information/change_banner">Add or Change Banner</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/offer/change_offer">Add or Change Offer</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/gallery/change_gallery">Change Image Gallery</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/item/change_item_image">Change Item Images</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/restaurant/change_password">Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>index.php/item/add_item">Add Item</a></li>  
                        <li><a href="<?php echo base_url(); ?>index.php/item/menu_card">Menu Card</a></li> 
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>index.php/category/view_category">Category Management</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>index.php/restaurant/signout">Sign Out</a></li> 
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>