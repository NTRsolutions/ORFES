<section class="signup"> 
    <div class="col-md-8 col-md-offset-2"> 
        <h3 class="sh_title text-center">Sign Up</h3>

        <?php
        if ($this->session->userdata('message')) {
            echo "<div class=\"alert alert-success alert-dismissible \" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                            " . $this->session->userdata('message') . "
                        </div>";
        }
        $this->session->unset_userdata(array('message'));
        ?>

        <?php echo form_open_multipart(base_url() . 'index.php/restaurant/signup', array('class' => '')); ?>
        <div class="form-group">
            <label for="name">Restaurant Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Restaurant Name" >
            <i> <?php echo form_error('name'); ?></i>   
        </div>   
        <div class="form-group">
            <label for="restaurant_username">Restaurant Username</label>
            <input type="text" class="form-control" id="restaurant_username" onkeyup="jquery_ajax_search('restaurant','filter_data',this.value)" name="username" placeholder="Restaurant Username" >
            <p class="help-block" id="search_result"></p>
            <i> <?php echo form_error('username'); ?></i>   
        </div>   
        <div class="form-group">
            <label for="email">Email </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" >
            <i> <?php echo form_error('email'); ?></i>   
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
            <i> <?php echo form_error('password'); ?></i>              
        </div>
        <div class="form-group"> 
            <label for="conf_password">Confirm Password</label>
            <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Confirm Password" >
            <i> <?php echo form_error('conf_password'); ?></i>   
        </div>
        <input class="btn btn-default col-xs-12 col-md-6 col-sm-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3" type="submit" value="Sign Up" >
        <?php echo form_close(); ?>
    </div>
</section> 