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
            <h3>Add or Change LOGO</h3>

            <?php echo form_open_multipart(base_url() . 'index.php/information/change_logo'); ?>
            <div class="form-group">
                <label for="image" class="sr-only">Hotline Number</label>
                <div class='' id='image'>
                    <?php if (!empty($information->logo)) { ?>
                        <img class="banner img-responsive" src="<?php echo base_url().$information->logo; ?>" alt="logo"/>
                    <?php }else { ?>
                        <img class="banner img-responsive" src="<?php echo base_url(); ?>assets/images/logo/logo.png" alt="Logo"/>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label for="image">Upload Restaurant Logo <span>(Perfect Size: 100 X 100 pixel)</span></label>
                <input type="file" name="logo" id="logo"   />
                <input type="hidden" name="old_photo" value="<?php echo $information->logo; ?>"/>
                <p class="help-block">Image maximum size 50 KB</p>
            </div>
            <input class="btn btn-default col-xs-12 col-md-6 col-sm-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3" type="submit" value="Upload" >
            <?php echo form_close(); ?>
        </div>
    </div>
</section>