<?php
/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 03.Mar.16
 * Time: 05:40 PM
 */
?>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url(); ?>admin">EK Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b
                        class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/logging_out"><i class="fa fa-fw fa-power-off"></i> Log
                            Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="<?php echo base_url(); ?>admin/home"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    <a href="<?php echo base_url(); ?>admin/degrees"><i class="fa fa-fw fa-dashboard"></i> Degrees</a>
                    <a href="<?php echo base_url(); ?>admin/departments"><i class="fa fa-fw fa-dashboard"></i>
                        Departments</a>
                    <a href="<?php echo base_url(); ?>admin/categories"><i class="fa fa-fw fa-dashboard"></i> Categories</a>
                    <a href="<?php echo base_url(); ?>admin/books"><i class="fa fa-fw fa-dashboard"></i> Books</a>
                    <a href="<?php echo base_url(); ?>admin/slides"><i class="fa fa-fw fa-dashboard"></i> Slides</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
