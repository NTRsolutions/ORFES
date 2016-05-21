<?php
/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 19.Feb.16
 * Time: 02:18 PM
 */
?>
<body class="home-page">
<!--
<script type="text/javascript" src="//go.pub2srv.com/apu.php?zoneid=645226"></script>
<script type='text/javascript' src='//clksite.com/adServe/banners?tid=132819_227967_5&type=slider&side=center&size=800x440&position=top&animate=on'></script>
-->
<script type='text/javascript' src='//clksite.com/adServe/banners?tid=132819_227967_6&type=footer&size=468x60'></script>

<script data-cfasync="false" type="text/javascript" src="http://www.adnetworkperformance.com/a/display.php?r=1263221"></script>
<script data-cfasync="false" type="text/javascript" src="http://www.adnetworkperformance.com/a/display.php?r=1263227"></script>
<script data-cfasync="false" type="text/javascript" src="http://www.adnetworkperformance.com/a/display.php?r=1263233"></script>
<script type="text/javascript">
  var ac_content_width = 980;
  var ac_back_followscroll = false;
  var ac_back_zindex = 100;
  var ac_back_changebgcolor = true;
</script>
<script data-cfasync="false" type="text/javascript" src="http://www.adnetworkperformance.com/a/display.php?r=1263239"></script>
<div class="wrapper">
    <!-- ******HEADER****** -->
    <header class="header">
        <div class="top-bar">
            <div class="container">

                <form class="pull-right search-form" role="search">
                    <div class="form-group">
                        <input id="search_text_general" type="text" class="form-control"
                               placeholder="Search the site...">
                    </div>
                    <button id="search_submit_general" type="submit" class="btn btn-theme">Search</button>
                </form>

            </div>
        </div><!--//to-bar-->

        <div class="header-main container">
            <h1 class="logo col-md-4 col-sm-4">
                <a href="<?php echo base_url(); ?>"><img id="logo" src="<?php echo base_url(); ?>assets/images/logo.png"
                                                         alt="Education Keeping Logo"></a>
            </h1><!--//logo-->
        </div><!--//header-main-->
    </header><!--//header-->

    <!-- ******NAV****** -->
    <nav class="main-nav" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><!--//nav-toggle-->
            </div>
            <div class="navbar-collapse collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="<?php echo base_url(); ?>">Home</a></li>

                    <!--<li class="nav-item"><a href="<?php //echo base_url(); ?>">Projects</a></li>-->
                    <?php
                    $degree_id;
                    $degree_name;

                    $degrees = $headerinfo["degrees"];
                    $departments = $headerinfo["departments"];

                    if ($degrees > 0) {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0"
                               data - close - others="false" href=""> Degrees <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <?php
                                if ($degrees > 0) {
                                    foreach ($degrees as $row_degree) {
                                        $degree_id = $row_degree->id;
                                        $degree_name = $row_degree->name;
                                        ?>
                                        <li class="dropdown-submenu">
                                            <a class="trigger" tabindex="-1" href="#"> <?php echo $degree_name; ?>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <?php
                                                if ($departments > 0) {
                                                    foreach ($departments as $row_department) {
                                                        $department_id = $row_department->id;
                                                        $department_degree_id = $row_department->degree_id;
                                                        $department_name = $row_department->name;

                                                        if ($degree_id == $department_degree_id) {
                                                            ?>
                                                            <?php
                                                            $pn = $degree_name;
                                                            $pn = str_replace(" ", "-", trim($pn));
                                                            $dn = $department_name;
                                                            $dn = str_replace(" ", "-", trim($dn));
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo base_url() . "degree/" . $pn . "/" . $dn ?>"> <?php echo $department_name; ?></a>
                                                            </li>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>

                                            </ul>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                    <!--
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0"
                           data-close-others="false" href="#">Universities <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">AUST</a></li>
                        </ul>
                    </li><!--//dropdown
                    -->
                    <li class="nav-item"><a href="<?php echo base_url(); ?>book/">Books</a></li>
                    <!--<li class="nav-item"><a href="<?php echo base_url(); ?>article/">Articles</a></li>-->
                    <li class="nav-item"><a href="<?php echo base_url(); ?>contact">Contact</a></li>
                </ul><!--//nav-->
            </div><!--//navabr-collapse-->
        </div><!--//container-->
    </nav><!--//main-nav-->