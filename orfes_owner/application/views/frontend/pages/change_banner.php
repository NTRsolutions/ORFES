<section class="signup">
    <?php
    if ($this->session->userdata('message')) {
        echo "<div class=\"alert alert-success alert-dismissible col-md-8 col-md-offset-2\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                            " . $this->session->userdata('message') . "
                        </div>";
    }
    $this->session->unset_userdata(array('message'));
    ?>

    <div class="row">
        <div class="col-md-8 col-md-offset-2 sh_form">
            <h3>Add or Change Banner</h3>

            <?php echo form_open_multipart(base_url() . 'index.php/information/change_banner'); ?>
            <div class="form-group">
                <label for="image" class="sr-only">Hotline Number</label>

                <div class='' id='image'>
                    <?php if (!empty($information->image)) { ?>
                        <img class="banner img-responsive" src="<?php echo base_url() . $information->image; ?>"
                             alt="banner"/>
                    <?php } else { ?>
                        <img class="banner img-responsive"
                             src="<?php echo base_url(); ?>assets/images/banner/banner.jpg" alt="Banner"/>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label for="image">Upload Restaurant Banner <span>(Perfect Size: 950 X 200 pixel)</span></label>
                <input type="file" name="banner" id="banner" />
                <input type="hidden" name="old_photo" value="<?php echo $information->image; ?>"/>

                <p class="help-block">Image maximum size 500 KB</p>
            </div>
            <input
                class="btn btn-default col-xs-12 col-md-6 col-sm-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3"
                type="submit" value="Upload">
            <?php echo form_close(); ?>
        </div>
    </div>
</section>