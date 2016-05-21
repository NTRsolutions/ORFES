<section class="profile">
    <div class="tab-content tab-pane">
        <h3 class="sh_title">Menu Card Item Images</h3>

        <?php
        if ($this->session->userdata('message')) {
            echo "<div class=\"alert alert-success alert-dismissible \" role=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                " . $this->session->userdata('message') . "
            </div>";
        }
        if ($this->session->userdata('exception')) {
            echo "<div class=\"alert alert-danger alert-dismissible \" role=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                " . $this->session->userdata('exception') . "
            </div>";
        }
        $this->session->unset_userdata(array('exception', 'message'));
        ?>

        <?php
        foreach ($category as $cate) {
            ?>
            <div class="category_item">
                <h3 class="sh_title text-center"><?php echo $cate->category_name; ?></h3>
                <?php
                $this->load->database();
                $query = $this->db->select('*')
                    ->from('tbl_item')
                    ->where('restaurant_id', $cate->restaurant_id)
                    ->where('category', $cate->category_name)
                    ->get();
                foreach ($query->result() as $row) {
                    ?>

                    <div class="">
                        <div class="tab-content tab-pane">
                            <div class="row">

                                <div class="col-md-8">
                                    <?php echo form_open_multipart(base_url() . 'index.php/item/update_item_image/' . $row->item_id); ?>
                                    <div class="form-group">
                                        <h3 class="sh_title"><?php echo $row->item_name; ?></h3>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="sr-only"><?php echo $row->item_name; ?></label>

                                        <div class='' id='image'>
                                            <img class="banner img-responsive"
                                                 src="<?php echo base_url() . $row->image; ?>"
                                                 alt="Logo / Banner"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">You can change your Image here
                                            <span>(Perfect Size: 100 X 100 pixel)</span></label>
                                        <input name="image" id="image" type="file"/>
                                        <input type="hidden" name="old_photo" value="<?php echo $row->image; ?>"/>

                                        <p class="help-block">Image maximum size 200 KB</p>
                                    </div>
                                    <input class="btn btn-default col-xs-6 col-md-3 col-sm-3 col-lg-3  pull-left"
                                           type="submit"
                                           value="Update">
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>
        <?php } ?>
    </div>
</section>