<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('frontend/includes/head_mobile'); ?>
    </head>
    <body>
        <!--starts of header-->
        
        <!--ends of header-->

        <!--starts of main_wrapper-->
        <div id="main_wrapper">
            <div class="row">
                <div id="content" class="col-md-12"> 
                    <?php if (isset($content)) echo $content; ?>
                </div>
            </div>
        </div>
        <!--ends of main_wrapper-->

        <!--starts of footer-->
        
        <!--ends of footer-->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>       
        <script src="<?php echo base_url(); ?>assets/js/script.js"></script> 

    </body>
</html>      



