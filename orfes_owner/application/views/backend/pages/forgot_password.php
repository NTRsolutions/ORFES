<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="shortcut icon" href="<?php echo base_url(); ?>index.php/assets/images/icons/favicon.ico">
        <title>Admin Panel :: Forgot Password </title>
        <link href="<?php echo base_url(); ?>index.php/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>index.php/assets/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>index.php/assets/css/dashboard.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            <form class="login-form " action="<?php echo base_url(); ?>admin/forgot_password" method="post">        
                <div class="login-wrap">
                    <p class="login-img"><i class="fa fa-key lite"></i></p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o "></i></span>
                        <input type="text" name="email" class="form-control" placeholder="Email" autofocus> 
                    </div> 
                         <?php echo form_error('email'); ?> 
                    <div class="form-group">
                        <label for="captcha"><?php if (isset($image)) echo $image; ?></label>
                        <input type="text" class="form-control" id="password" name="captcha" placeholder="Capcha Code">
                        <i> <?php echo form_error('captcha'); ?></i>              
                    </div>  
                    <div class="input-group">
                        <label class="checkbox"> 
                            <span class="pull-right"> <a href="<?php echo base_url(); ?>index.php/admin"> Sign In</a></span>
                        </label>
                    </div>
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Request">
                </div>
                <div class="login-wrap">
                    <?php
                    $message = $this->session->userdata('message');
                    if (isset($message)) {
                        echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
                                     <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                        $message  
                                    </div>";
                    }
                    $this->session->unset_userdata('message');
                    ?>
                </div>
            </form>
        </div>
    </body>
</html>
