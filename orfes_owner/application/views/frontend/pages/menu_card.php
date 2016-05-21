<section class="profile">
    <div class="tab-content tab-pane">
        <h3 class="sh_title">Menu Card</h3>

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
                foreach ($query->result() as $value) {
                    ?>
                    <div class="media">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="<?php echo base_url() . $value->image; ?>" alt="Caption"
                                     width="64" height="64">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $value->item_name; ?><?php
                                if ($value->item_type == "2") {
                                    echo '<i class="fa fa-star text-danger"></i>';
                                }
                                ?></h4>
                            <?php echo $value->about; ?>
                            <br/>
                            <span
                                class="text-success">Regular Price: <strong><?php echo $value->regular_price; ?></strong></span>&nbsp;&nbsp;
                            <?php if ($value->item_type == "2") { ?>
                                <span
                                    class="text-danger">Special Price: <strong><?php echo $value->special_price; ?></strong></span>
                            <?php } ?>
                        </div>
                        <div class="media-right">
                            <a href="<?php echo base_url(); ?>index.php/item/update/<?php echo $this->hash_model->encode($value->item_id); ?>"
                               class="btn btn-success btn-xs">Edit</a>
                            <?php if ($value->status == 0) { ?>
                                <a href="<?php echo base_url(); ?>index.php/item/unblock/<?php echo $this->hash_model->encode($value->item_id); ?>"
                                   class="btn btn-danger btn-xs">Unblock</a>
                            <?php }
                            if ($value->status == 1) { ?>
                                <a href="<?php echo base_url(); ?>index.php/item/block/<?php echo $this->hash_model->encode($value->item_id); ?>"
                                   class="btn btn-primary btn-xs">Block</a>
                            <?php } ?>
                            <a href="<?php echo base_url(); ?>index.php/item/delete/<?php echo $this->hash_model->encode($value->item_id); ?>"
                               class="btn btn-danger btn-xs">Delete</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>