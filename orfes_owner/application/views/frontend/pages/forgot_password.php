<section class="signin">
    <div class="col-md-4 col-md-offset-4">  
        <h3> Forgot Password</h3>   
        <?php echo form_open_multipart(base_url() . 'index.php/restaurant/forgot_password', array('class' => 'sh-signup')); ?> 
        <div class="form-group">
            <label for="email" class="sr-only">Email </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div> 
        <input type="submit" class="btn btn-default btn-sm col-md-12" value="Request">  
        <br/><br/>
        <a href="<?php echo base_url(); ?>index.php/pages/signin">Back to Sign In</a>
        <?php echo form_close(); ?>

        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
    $message  
</div>";
        }
        $this->session->unset_userdata('message');
        ?>
    </div>
</div> 