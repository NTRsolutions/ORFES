<section class="signin">
    <div class="col-md-4 col-md-offset-4">  
        <h3 class="sh_title text-center"> Sign In</h3>   
        <?php echo form_open_multipart(base_url() . 'index.php/restaurant/signin', array('class' => '')); ?> 
        <div class="form-group">
            <label for="email" class="sr-only">Email </label>
            <input type="text" class="form-control" id="email" name="email_username" placeholder="Email or Username" >
        </div>
        <div class="form-group">
            <label for="password" class="sr-only">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
        </div>  
        <input class="btn btn-default col-xs-12 col-md-12 col-sm-6 col-sm-offset-3 col-md-offset-0" type="submit" value="Sign In" >
        <br/><br/>
        <a href="<?php echo base_url(); ?>index.php/pages/forgot_password">Forgot Password?</a>
        <br/><br/>
        <?php echo form_close(); ?>

        <?php 
        if ($this->session->userdata('message')) {
            echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                            ".$this->session->userdata('message')."
                        </div>";
        } $this->session->unset_userdata('message');
        ?>
    </div>
</section> 