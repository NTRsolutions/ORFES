<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
    function togglePasswordFieldClicked() {

        var passwordField = document.getElementById('password');
        var value = passwordField.value;

        if (passwordField.type == 'password') {
            passwordField.type = 'text';
        }
        else {
            passwordField.type = 'password';
        }

        passwordField.value = value;

    }

    function toggleConfirmPasswordFieldClicked() {

        var passwordField = document.getElementById('confirm_password');
        var value = passwordField.value;

        if (passwordField.type == 'password') {
            passwordField.type = 'text';
        }
        else {
            passwordField.type = 'password';
        }

        passwordField.value = value;

    }
</script>
<section class="signup">
    <div class="col-md-8 col-md-offset-2">
        <h3 class="sh_title text-center">Change Password</h3>

        <?php
        if ($this->session->userdata('message')) {
            echo "<div class=\"alert alert-success alert-dismissible \" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                            " . $this->session->userdata('message') . "
                        </div>";
        }
        $this->session->unset_userdata(array('message'));
        ?>

        <?php echo form_open_multipart(base_url() . 'index.php/restaurant/change_password', array('class' => '')); ?>
        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" class="form-control" id="password" name="password"
                   placeholder="New Password" value="">

            <input type="checkbox" data-toggle="toggle"
                   data-size="mini" data-on="Show" data-off="Hide" onchange="togglePasswordFieldClicked()">

            <i> <?php echo form_error('password'); ?></i>
        </div>
        <div class="form-group">
            <label for="conf_password">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                   placeholder="Confirm Password">

            <input type="checkbox" data-toggle="toggle"
                   data-size="mini" data-on="Show" data-off="Hide" onchange="toggleConfirmPasswordFieldClicked()">

            <i> <?php echo form_error('confirm_password'); ?></i>
        </div>
        <input
            class="btn btn-default col-xs-12 col-md-6 col-sm-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3"
            type="submit" value="Submit">
        <?php echo form_close(); ?>
    </div>
</section> 