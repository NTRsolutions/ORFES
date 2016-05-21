<section class="signup">
    <?php
    if ($this->session->userdata('message')) {
        echo "<div class=\"alert alert-success alert-dismissible col-md-8 col-md-offset-2\" role=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                " . $this->session->userdata('message') . "
            </div>";
    }
    if ($this->session->userdata('exception')) {
        echo "<div class=\"alert alert-danger alert-dismissible col-md-8 col-md-offset-2\" role=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                " . $this->session->userdata('exception') . "
            </div>";
    }
    $this->session->unset_userdata(array('exception', 'message'));
    ?>

    <div class="row">
        <div class="col-md-8 col-md-offset-2 sh_form">
            <h3>Edit Menu Item <small>(Please first add category)</small></h3>

            <?php echo form_open_multipart(base_url() . 'index.php/item/update/'.$this->uri->segment(3)); ?>
            <div class="form-group">
                <label for="category">Item Category</label>
                <select class="form-control" id="category" name="category"> 
                    <option value="<?php echo $item->category; ?>"><?php echo $item->category; ?></option>
                    <?php
                    foreach ($category as $value) {
                        echo "<option>$value->category_name</option>";
                    }
                    ?>
                </select>
                <i><?php echo form_error('category'); ?></i>
            </div>
            <div class="form-group">
                <label for="item_type">Item Type</label>
                <?php
                $item_type_string = "";
                if($item->item_type == 1){
                    $item_type_string = "A Regular Item";
                } else if($item->item_type == 2){
                    $item_type_string = "A Special Item";
                }
                ?>
                <select name="item_type" id="add_item_type" class="form-control">
                    <option value="<?php echo $item->item_type; ?>"><?php echo $item_type_string; ?></option>
                    <option value="1">A Regular Item</option>
                    <option value="2">A Special Item</option>
                </select>
                <i> <?php echo form_error('item_name'); ?></i>
            </div>
            <div class="form-group">
                <label for="item_name">Item Name</label>
                <input type="text" class="form-control" value="<?php echo $item->item_name; ?>" id="item_name" name="item_name" placeholder="Item Name" >
                <i> <?php echo form_error('item_name'); ?></i>
            </div>
            <div class="form-group">
                <label for="about">About Item</label>
                <textarea class="form-control" id="about" name="about" placeholder="About Item" rows="5" ><?php echo $item->about; ?></textarea>
                <i> <?php echo form_error('about'); ?></i>
            </div>
            <div class="form-group"> 
                <?php $rp = explode(' ', trim($item->regular_price)); ?>
                <label for="reqular_price">Regular Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                Currency <input type="text" name="regular_currency" placeholder="BDT / USD / EUR etc." maxlength="100" value="<?php echo $rp[0]; ?>">
                <input type="text" name="regular_price" placeholder="Regular Price" value="<?php echo $rp[1]; ?>">
                <i> <?php echo form_error('regular_currency'); ?> <?php echo form_error('reqular_price'); ?></i>
            </div>
            <div class="form-group">
                <?php $rs = explode(' ', trim($item->special_price)); ?>
                <label for="new_price">Special Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                Currency <input type="text" name="special_currency" placeholder="BDT / USD / EUR etc." value="<?php echo $rs[0]; ?>">
                <input type="text" name="special_price" placeholder="Special Price" value="<?php if( ! empty($rs[0])) echo $rs[1]; ?>">
                <i> <?php echo form_error('special_currency'); ?> <?php echo form_error('special_price'); ?></i>
            </div>
            <input class="btn btn-default col-xs-12 col-md-6 col-sm-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3" type="submit" value="Save Item" >
            <?php echo form_close(); ?>
        </div>
    </div>
</section>
