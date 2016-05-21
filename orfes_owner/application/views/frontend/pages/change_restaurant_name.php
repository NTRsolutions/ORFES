<section class="signup">
    <div class="col-md-8 col-md-offset-2">
        <h3 class="sh_title text-center">Change Restaurant Name</h3>

        <?php
        if ($this->session->userdata('message')) {
            echo "<div class=\"alert alert-success alert-dismissible \" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                            " . $this->session->userdata('message') . "
                        </div>";
        }
        $this->session->unset_userdata(array('message'));
        ?>

        <?php echo form_open(base_url() . 'index.php/restaurant/change_restaurant_name'); ?>
        <div class="form-group">
            <label for="name">Restaurant Name</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="Restaurant Name"
                   value="<?php echo $restaurant->name; ?>">
            <i> <?php echo form_error('name'); ?></i>
        </div>
        <input
            class="btn btn-default col-xs-12 col-md-6 col-sm-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3"
            type="submit" value="Submit">
        <?php echo form_close(); ?>
    </div>
</section> 