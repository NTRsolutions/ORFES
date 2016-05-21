<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('frontend/includes/head'); ?>
    </head>
    <body>
        <!--starts of header-->
        <header>
            <div class="row">
                <div id="header"> 
                    <!--starts of logo-->
                    <?php $this->load->view('frontend/includes/header'); ?>
                    <!--ends of logo-->

                    <!--starts of nav-->
                    <?php $this->load->view('frontend/includes/menu'); ?>
                    <!--ends of nav-->
                </div>
            </div>
        </header>
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
        <footer>
            <div class="row">
                <div id="footer"> 
                    <?php $this->load->view('frontend/includes/footer'); ?>
                </div>
            </div>
            <div class="row">
                <div id="copyright"> 
                    <?php $this->load->view('frontend/includes/copyright'); ?>
                </div>
            </div>
        </footer>
        <!--ends of footer-->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>       
        <script src="<?php echo base_url(); ?>assets/js/script.js"></script> 

    </body>
</html>      



