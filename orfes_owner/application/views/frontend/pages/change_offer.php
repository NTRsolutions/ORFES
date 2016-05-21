<script type="text/javascript">
    counter = function () {
        var value = $('#offer_text').val();

        if (value.length == 0) {
            $('#totalChars').html(0);
            return;
        }

        var regex = /\s+/gi;
        //var wordCount = value.trim().replace(regex, ' ').split(' ').length;
        var totalChars = value.length;
        //var charCount = value.trim().length;
        //var charCountNoSpace = value.replace(regex, '').length;

        if (totalChars <= 200) {
            //$('#wordCount').html(wordCount);
            $('#totalChars').html(totalChars);
            $('#totalChars').css('color', 'green');
            //$('#charCount').html(charCount);
            //$('#charCountNoSpace').html(charCountNoSpace);
        } else if (totalChars > 200) {
            $('#totalChars').html(totalChars);
            $('#totalChars').css('color', 'red');
        }
    };

    $(document).ready(function () {
        $('#offer_text').change(counter);
        $('#offer_text').keydown(counter);
        $('#offer_text').keypress(counter);
        $('#offer_text').keyup(counter);
        $('#offer_text').blur(counter);
        $('#offer_text').focus(counter);
        counter();
    });
</script>
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
            <h3>Add or Change Offer</h3>

            <?php echo form_open_multipart(base_url() . 'index.php/offer/change_offer'); ?>
            <div class="form-group">
                <label for="image" class="sr-only">Hotline Number</label>

                <div class='' id='image'>
                    <?php if (!empty($offer->banner)) { ?>
                        <img class="banner img-responsive" src="<?php echo base_url() . $offer->banner; ?>" alt="Banner"/>
                    <?php } else { ?>
                        <img class="banner img-responsive" src="<?php echo base_url(); ?>assets/images/offer/banner.jpg"
                             alt="Banner"/>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label for="image">Upload Offer Banner <span>(Perfect Size: 950 X 200 pixel)</span></label>
                <input type="file" name="offer_banner" id="offer_banner"/>
                <input type="hidden" name="old_photo" value="<?php echo $offer->banner; ?>"/>

                <p class="help-block">Image maximum size 100 KB</p>
            </div>
            <div class="form-group">
                <label for="about">Offer Text (200 Character)</label>
                <textarea class="form-control" rows="2" id="offer_text" name="offer_text"
                          placeholder="Offer Text in 200 Character!"><?php echo trim($offer->text); ?></textarea>
                Total Characters(including trails): <span id="totalChars">0</span>
                <i> <?php echo form_error('offer_text'); ?></i>
            </div>
            <input
                class="btn btn-default col-xs-12 col-md-6 col-sm-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3"
                type="submit" value="Submit">
            <?php echo form_close(); ?>
        </div>
    </div>
</section>