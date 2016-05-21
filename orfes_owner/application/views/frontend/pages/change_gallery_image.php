<section>
    <h3 class="sh_title text-center">Gallery Images</h3>

    <p class="text-center">You can Upload Maximum 4 Image</p>
    <?php
    if ($this->session->userdata('message')) {
        echo "<div class=\"alert alert-success alert-dismissible col-md-8 col-md-offset-2\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                            " . $this->session->userdata('message') . "
                        </div><br/>";
    }
    $this->session->unset_userdata(array('message'));
    ?>

    <?php
    if (count($information) == 0 || $check == 1) {
        ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 sh_form">
                <h3>Add Gallery Image</h3>
                <?php echo form_open_multipart(base_url() . 'index.php/gallery/change_gallery'); ?>
                <div class="form-group">
                    <label for="image" class="sr-only"></label>

                    <div class='' id='image'>
                        <img class="banner img-responsive"
                             src="<?php echo base_url(); ?>assets/images/icons/gallery_image.png" alt="Banner"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Upload Restaurant Image To Gallery
                        <span>(Perfect Size: 600 X 400 pixel)</span></label>
                    <input name="image" id="image" type="file"/>

                    <p class="help-block">Image maximum size 200 KB</p>
                </div>
                <input
                    class="btn btn-default col-xs-12 col-md-6 col-sm-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3"
                    type="submit" value="Upload">
                <?php echo form_close(); ?>
            </div>
        </div>
        <?php
    }
    ?>
</section>
<section class="profile">
    <?php
    $i = 0;
    foreach ($information as $row) {
        $i = $i + 1;
        ?>
        <div class="menu_card_info">
            <div class="tab-content tab-pane">
                <h4 class="sh_title"><?php echo $i; ?>.</h4>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2 sh_form">
                        <?php echo form_open_multipart(base_url() . 'index.php/gallery/update_gallery/' . $row['image_id']); ?>
                        <div class="form-group">
                            <label for="image" class="sr-only"></label>

                            <div class='' id='image'>
                                <img class="banner img-responsive" src="<?php echo base_url() . $row['source']; ?>"
                                     alt="Logo / Banner"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">You can change your Image here
                                <span>(Perfect Size: 600 X 400 pixel)</span></label>
                            <input name="image" id="image" type="file"/>
                            <input type="hidden" name="old_photo" value="<?php echo $row['source']; ?>"/>

                            <p class="help-block">Image maximum size 200 KB</p>
                        </div>
                        <input class="btn btn-default col-xs-6 col-md-3 col-sm-3 col-lg-3  pull-left" type="submit"
                               value="Update">
                        <a class="btn btn-danger col-xs-6 col-md-3 col-sm-3 col-lg-3 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 pull-left"
                           href="<?php echo base_url(); ?>index.php/gallery/delete_image/<?php echo $row['image_id']; ?>">Delete
                            Image</a>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <?php
    }
    ?>
</section>
<?php
if (count($information) > 0 && count($information) < 4) {
    ?>
    <section>
        <div class="col-md-12">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <a class="btn btn-default col-xs-12 col-md-6 col-sm-6 col-lg-6"
                   href="<?php echo base_url(); ?>index.php/gallery/add_more/">Add more Image to Gallery</a>
            </div>
        </div>
    </section>
    <?php
}
?>