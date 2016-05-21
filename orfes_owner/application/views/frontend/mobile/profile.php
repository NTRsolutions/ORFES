<div class="modal fade" id="image-gallery1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Image Gallery</em></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <?php
                        foreach ($gallery as $row) {
                            ?>
                            <div class="col-lg-6 col-md-6 col-xs-12 thumb">
                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                                   data-caption="" data-image="<?php echo base_url() . $row['source']; ?>"
                                   data-target="#image-gallery">
                                    <img class="img-responsive" src="<?php echo base_url() . $row['source']; ?>"
                                         alt="Short alt text">
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Image Gallery</em></h4>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive" src="">
            </div>
            <div class="modal-footer">

                <div class="col-md-2">
                    <button type="button" class="btn btn-default" id="show-previous-image">Previous</button>
                </div>

                <div class="col-md-8 text-justify">
                </div>

                <div class="col-md-2">
                    <button type="button" id="show-next-image" class="btn btn-default">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="profile">
    <div class="">
        <div class="restaurant_info">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td style="text-align: center">
                        <?php if (!empty($information->image)) { ?>
                            <img class="banner img-responsive" src="<?php echo base_url() . $information->image; ?>"
                                 alt="banner"/>
                            <?php
                        } else { ?>
                            <img class="banner img-responsive" style="width:100%"
                                 src="<?php echo base_url(); ?>assets/images/banner/banner.jpg"
                                 alt="Restaurant Banner"/>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center"><?php echo $restaurant->name; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center"><?php echo $information->type; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center"><?php echo $information->facilities; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center"><?php echo $information->about; ?></td>
                </tr>
                <tr>
                    <td><?php
                        if (count($gallery) > 0) {
                            ?>
                            <div class="col-md-12">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-8">
                                    <button type="button" class="btn btn-default col-xs-12 col-md-6 col-sm-6 col-lg-6"
                                            data-toggle="modal" data-target="#image-gallery1">Restaurant View
                                    </button>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center"><?php echo "Menu Card Name: " . $restaurant->username; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center"><?php if (isset($information->hotline_number)) echo $information->hotline_number; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center"><?php echo $information->seating_capacity . " Seating Capacity Available"; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center"><?php echo $information->billing_system; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <?php if (isset($information->opening_time)) echo $information->opening_time; ?>
                        <?php if (isset($information->opening_day)) echo $information->opening_day; ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <?php
                        if (isset($information->address) && ($information->address != ''))
                            echo "$information->address, ";
                        if (isset($information->postal_code) && ($information->postal_code != ''))
                            echo "$information->postal_code, ";
                        if (isset($information->police_station) && ($information->police_station != ''))
                            echo "$information->police_station, ";
                        if (isset($information->district_city) && ($information->district_city != ''))
                            echo "$information->district_city, ";
                        if (isset($information->state_division) && ($information->state_division != ''))
                            echo "$information->state_division, ";
                        if (isset($information->country) && ($information->country != ''))
                            echo "$information->country  ";
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="menu_card_info" id="menu">
        <!-- Nav tabs -->
        <h3 class="text-center main_title"><?php echo $restaurant->name; ?>'s Menu Card &nbsp;&nbsp; </h3>
        <!-- Tab panes -->
        <div class="tab-content tab-pane">
            <?php
            if (count($category, COUNT_RECURSIVE) > 0) {
                foreach ($category as $cate) {
                    ?>
                    <div class="category_item">
                        <h4 class="sh_title text-center"><?php echo $cate->category_name; ?></h4>
                        <?php
                        $this->load->database();
                        $query = $this->db->select('*')
                            ->from('tbl_item')
                            ->where('restaurant_id', $cate->restaurant_id)
                            ->where('category', $cate->category_name)
                            ->where('status', 1)
                            ->get();
                        foreach ($query->result() as $value) {
                            if (count($value) > 0) {
                                ?>
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <a href="#">
                                            <img class="media-object" src="<?php echo base_url() . $value->image; ?>"
                                                 alt="Caption" width="64" height="64">
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
                                        <br/>
                                        <?php if ($value->item_type == "2") { ?>
                                            <span
                                                class="text-danger">Special Price: <strong><?php echo $value->special_price; ?></strong></span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="media">
                                    <P>Coming Soon</P>
                                </div>
                                <?php
                            }
                        } ?>
                    </div>
                    <?php
                }
            } ?>
        </div>
    </div>
</section>


<script>
    $(document).ready(function () {

        loadGallery(true, 'a.thumbnail');


        function disableButtons(counter_max, counter_current) {
            $('#show-previous-image, #show-next-image').show();
            if (counter_max == counter_current) {
                $('#show-next-image').hide();
            } else if (counter_current == 1) {
                $('#show-previous-image').hide();
            }
        }


        function loadGallery(setIDs, setClickAttr) {
            var current_image,
                selector,
                counter = 0;

            $('#show-next-image, #show-previous-image').click(function () {
                if ($(this).attr('id') == 'show-previous-image') {
                    current_image--;
                } else {
                    current_image++;
                }

                selector = $('[data-image-id="' + current_image + '"]');
                updateGallery(selector);
            });

            function updateGallery(selector) {
                var $sel = selector;
                current_image = $sel.data('image-id');
                $('#image-gallery-image').attr('src', $sel.data('image'));
                disableButtons(counter, $sel.data('image-id'));
            }

            if (setIDs == true) {
                $('[data-image-id]').each(function () {
                    counter++;
                    $(this).attr('data-image-id', counter);
                });
            }
            $(setClickAttr).on('click', function () {
                updateGallery($(this));
            });
        }
    });
</script>