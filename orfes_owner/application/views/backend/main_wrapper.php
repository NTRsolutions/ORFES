<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('backend/includes/head'); ?>
    </head>
    <body>
        <div id="wrapper"> 
            <?php $this->load->view('backend/includes/navbar'); ?>
            <!-- /. NAV TOP  -->
            <?php $this->load->view('backend/includes/sidebar'); ?>
            <!-- /. SIDEBAR MENU (navbar-side) -->
            <div id="page-wrapper" class="page-wrapper-cls">
                <div id="page-inner"><?php echo $content; ?></div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->

        <?php $this->load->view('backend/includes/footer'); ?>
        <!-- /. FOOTER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <?php $this->load->view('backend/includes/js'); ?>

    </body>
</html>
