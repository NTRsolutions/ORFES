<script type="text/javascript">
    counter = function () {
        var value = $('#about').val();

        if (value.length == 0) {
            $('#totalChars').html(0);
            return;
        }

        var regex = /\s+/gi;
        //var wordCount = value.trim().replace(regex, ' ').split(' ').length;
        var totalChars = value.length;
        //var charCount = value.trim().length;
        //var charCountNoSpace = value.replace(regex, '').length;

        if (totalChars <= 150) {
            //$('#wordCount').html(wordCount);
            $('#totalChars').html(totalChars);
            $('#totalChars').css('color', 'green');
            //$('#charCount').html(charCount);
            //$('#charCountNoSpace').html(charCountNoSpace);
        } else if (totalChars > 150) {
            $('#totalChars').html(totalChars);
            $('#totalChars').css('color', 'red');
        }
    };

    $(document).ready(function () {
        $('#about').change(counter);
        $('#about').keydown(counter);
        $('#about').keypress(counter);
        $('#about').keyup(counter);
        $('#about').blur(counter);
        $('#about').focus(counter);
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
            <h3>Profile Information</h3>
            <h5 style="color: #CC0000">All fields are required* for good searching by customers</h5>

            <?php echo form_open_multipart(base_url() . 'index.php/information/change_information'); ?>
            <div class="form-group">
                <label for="type">Restaurant Type</label>
                <input type="text" class="form-control" id="type" name="type" value="<?php echo $info->type; ?>"
                       placeholder="Bangla-Indian-Thai-Chinese" required>
                <i> <?php echo form_error('type'); ?></i>
            </div>
            <div class="form-group">
                <label for="type">Restaurant Facilities</label>
                <input type="text" class="form-control" id="facilities" name="facilities"
                       value="<?php echo $info->facilities; ?>"
                       placeholder="Home Deliver-Dinner-Bar-Smoking Zone-AC-WiFi" required>
                <i> <?php echo form_error('facilities'); ?></i>
            </div>

            <div class="form-group">
                <label for="about">About (150 Character)</label>
                <textarea class="form-control" rows="2" id="about" name="about" placeholder="Restaurant About Details in 150 Character!"><?php echo trim($info->about); ?></textarea>
                Total Characters(including trails): <span id="totalChars">0</span>
                <i> <?php echo form_error('about'); ?></i>
            </div>
            <div class="form-group">
                <label for="hotline_number">Hotline Number</label>
                <input type="text" class="form-control" id="contact_number" name="hotline_number"
                       value="<?php echo $info->hotline_number; ?>"
                       placeholder="00880XXXXXXXXXX" required>
                <i> <?php echo form_error('hotline_number'); ?></i>
            </div>
            <div class="form-group">
                <label for="seating_capacity">Seating Capacity (Numeric)</label>
                <input type="number" class="form-control" id="seating_capacity" name="seating_capacity"
                       value="<?php echo $info->seating_capacity; ?>" placeholder="10" required>
                <i> <?php echo form_error('seating_capacity'); ?></i>
            </div>
            <div class="form-group">
                <label for="billing_system">Billing System</label>
                <select class="form-control" name="billing_system" required>
                    <option value="<?php echo $info->billing_system; ?>"><?php echo $info->billing_system; ?></option>
                    <option value="Cash Only">Cash Only</option>
                    <option value="Cash & Card Accepted">Cash & Card Accepted</option>
                    <option value="Card Only">Card Only</option>
                </select>
                <i> <?php echo form_error('seating_capacity'); ?></i>
            </div>
            <div class="form-group">
                <label for="opening_time">Opening Day</label>

                <?php
                $starting_day = "";
                $end_day = "";
                if ($info->opening_day != '') {
                    $opening_day = explode("-", $info->opening_day);

                    $starting_day = $opening_day[0];
                    $end_day = $opening_day[1];
                }
                ?>

                <select class="form-control" name="start_day" required>
                    <option
                        value="<?php echo trim($starting_day); ?>"><?php echo trim($starting_day); ?></option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                </select>
                to
                <select class="form-control" name="end_day" required>
                    <option
                        value="<?php echo trim($end_day); ?>"><?php echo trim($end_day); ?></option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                </select>
            </div>
            <div class="form-group">
                <label for="opening_time">Opening Time</label>

                <?php
                $starting_time = "";
                $end_time = "";
                if ($info->opening_time != '') {
                    $opening_time = explode("-", $info->opening_time);

                    $starting_time = $opening_time[0];
                    $end_time = $opening_time[1];
                }
                ?>

                <input type="time" class="form-control" name="start_time" placeholder="00:00 AM/PM" maxlength="20"
                       value="<?php echo trim($starting_time); ?>" required>
                to
                <input type="time" class="form-control" name="end_time" placeholder="00:00 AM/PM" maxlength="20"
                       value="<?php echo trim($end_time); ?>" required>
            </div>
            <div class="form-group">
                <label for="address"> Flat / Plot / Tower / Floor / Road Name or No.</label>
                <textarea class="form-control" id="address" rows="5" name="address" placeholder="Flat / Plot / Tower / Floor / Road Name or No."><?php echo $info->address; ?></textarea>
                <i> <?php echo form_error('address'); ?></i>
            </div>
            <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code"
                       value="<?php echo $info->postal_code; ?>" required>
                <i> <?php echo form_error('postal_code'); ?></i>
            </div>
            <div class="form-group">
                <label for="police_station">Area / Police Station</label>
                <input type="text" class="form-control" id="police_station" name="police_station"
                       value="<?php echo $info->police_station; ?>" required>
                <i> <?php echo form_error('police_station'); ?></i>
            </div>
            <div class="form-group">
                <label for="district_city">District / City</label>
                <input type="text" class="form-control" id="postal_code" name="district_city"
                       value="<?php echo $info->district_city; ?>" required>
                <i> <?php echo form_error('district_city'); ?></i>
            </div>
            <div class="form-group">
                <label for="state_division">State / Division</label>
                <input type="text" class="form-control" id="postal_code" name="state_division"
                       value="<?php echo $info->state_division; ?>" required>
                <i> <?php echo form_error('state_division'); ?></i>
            </div>

            <div class="form-group">
                <label for="country">Select Country</label>
                <?php require 'country.php'; ?>
                <i> <?php echo form_error('country'); ?></i>
            </div>
            <input
                class="btn btn-default col-xs-12 col-md-6 col-sm-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3"
                type="submit" value="Save Information">
            <?php echo form_close(); ?>
        </div>
    </div>
</section>