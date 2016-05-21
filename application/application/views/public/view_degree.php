<?php
/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 10.Apr.16
 * Time: 06:50 PM
 */
?>
<!-- ******CONTENT****** -->
<div class="content container">
    <div class="page-wrapper">
        <header class="page-heading clearfix">
            <h1 class="heading-title pull-left"><?php echo $contents["department_name"]; ?></h1>

            <div class="breadcrumbs pull-right">
                <ul class="breadcrumbs-list">
                    <li class="breadcrumbs-label">You are here:</li>
                    <li><a href="<?php echo base_url(); ?>">Home</a><i class="fa fa-angle-right"></i></li>
                    <li class="current"><?php echo $contents["department_name"]; ?></li>
                </ul>
            </div><!--//breadcrumbs-->
        </header>
        <div class="page-content">
            <div class="row page-row">
                <div class="course-wrapper col-md-8 col-sm-7">
                    <article class="course-item">
                        <!--
                        <p class="featured-image page-row">
                            <img class="img-responsive"
                                 src="http://www.bradleysbookoutlet.com/wp-content/uploads/2013/06/bradleys-book-outlet-books-only-logo.png"
                                 alt=""/>
                        </p>
                        <div class="page-row box box-border">
                            <ul class="list-unstyled no-margin-bottom">
                                <li><strong>Start date:</strong> <em>24 Sep 2014</em></li>
                                <li><strong>Duration: </strong> <em>1 year</em></li>
                                <li><strong>Level: </strong> <em>Beginner</em></li>
                                <li><strong>Location: </strong> <em>Remote(Online)</em></li>
                            </ul>
                        </div><!--//page-row-->
                        <div class="tabbed-info page-row">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">FAQ</a></li>
                                <li><a href="#tab2" data-toggle="tab">Books</a></li>
                                <li><a href="#tab3" data-toggle="tab">Slide/Lectures</a></li>
                                <li><a href="#tab4" data-toggle="tab">Articles</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="page-row">
                                        <div class="panel-group" id="accordion">
                                            <?php
                                            $department_faqs = $contents["department_faqs"];
                                            if (count($department_faqs, COUNT_RECURSIVE) > 0) {
                                                foreach ($department_faqs as $row_department_faq) {
                                                    $department_faq_id = $row_department_faq->id;
                                                    $department_faq_title = $row_department_faq->title;
                                                    $department_faq_body = $row_department_faq->body;
                                                    ?>

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <!--data-parent="#accordion"-->
                                                                <a data-toggle="collapse"
                                                                   href="#collapse-<?php echo $department_faq_id; ?>">
                                                                    <?php echo $department_faq_title; ?>
                                                                </a>
                                                            </h4>
                                                        </div><!--//pane-heading-->
                                                        <div id="collapse-<?php echo $department_faq_id; ?>"
                                                             class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <?php
                                                                echo $department_faq_body;
                                                                ?>
                                                            </div><!--//panel-body-->
                                                        </div><!--//panel-colapse-->
                                                    </div><!--//panel-->

                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <p>Coming Soon.</p>
                                                <?php
                                            }
                                            ?>
                                        </div><!--//panel-group-->
                                    </div><!--//page-row-->
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <div class="page-row">
                                        <div class="panel-group" id="accordion">
                                            <?php
                                            $serialOfBook;
                                            $serial_list_of_books = $contents["serial_list_of_books"];
                                            if (count($serial_list_of_books, COUNT_RECURSIVE) > 0) {
                                                foreach ($serial_list_of_books as $row_serial) {
                                                    $serialOfBook = $row_serial->serial;
                                                    ?>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <!--data-parent="#accordion"-->
                                                                <a data-toggle="collapse"
                                                                   href="#collapse-<?php echo "books" . "-" . $serialOfBook; ?>">
                                                                    <?php
                                                                    if ($serialOfBook == "1") {
                                                                        echo "1st Year, 1st Semester (1.1)";
                                                                    } else if ($serialOfBook == "2") {
                                                                        echo "1st Year, 2nd Semester (1.2)";
                                                                    } else if ($serialOfBook == "3") {
                                                                        echo "2nd Year, 1st Semester (2.1)";
                                                                    } else if ($serialOfBook == "4") {
                                                                        echo "2nd Year, 2nd Semester (2.2)";
                                                                    } else if ($serialOfBook == "5") {
                                                                        echo "3rd Year, 1st Semester (3.1)";
                                                                    } else if ($serialOfBook == "6") {
                                                                        echo "3rd Year, 2nd Semester (3.2)";
                                                                    } else if ($serialOfBook == "7") {
                                                                        echo "4th Year, 1st Semester (4.1)";
                                                                    } else if ($serialOfBook == "8") {
                                                                        echo "4th Year, 2nd Semester (4.2)";
                                                                    }
                                                                    ?>
                                                                </a>
                                                            </h4>
                                                        </div><!--//pane-heading-->
                                                        <div id="collapse-<?php echo "books" . "-" . $serialOfBook; ?>"
                                                             class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <?php
                                                                $books = $contents["books"];
                                                                if ($books > 0) {
                                                                    foreach ($books as $row_book) {
                                                                        $book_id = $row_book->id;
                                                                        $book_name = $row_book->name;
                                                                        $book_author = $row_book->author;
                                                                        $book_edition = $row_book->edition;
                                                                        $book_serial = $row_book->serial;
                                                                        $file_name = $row_book->file_name;
                                                                        $thumb_name = $row_book->thumb_name;

                                                                        if ($book_serial === $serialOfBook) {
                                                                            ?>
                                                                            <article
                                                                                class="news-item page-row has-divider clearfix row">
                                                                                <figure
                                                                                    class="thumb col-md-2 col-sm-3 col-xs-4">
                                                                                    <img class="img-responsive"
                                                                                         src="<?php echo base_url(); ?>books/cover/<?php echo $thumb_name; ?>"
                                                                                         alt=""/>
                                                                                </figure>
                                                                                <div
                                                                                    class="details col-md-10 col-sm-9 col-xs-8">
                                                                                    <h3 class="title">
                                                                                        <a href="#"><?php echo $book_name; ?></a>
                                                                                    </h3>
                                                                                    <h4>

                                                                                    </h4>

                                                                                    <p>
                                                                                        <?php echo "Author: " . $book_author; ?>
                                                                                    </p>

                                                                                    <p>
                                                                                        <?php echo "Edition: " . $book_edition; ?>
                                                                                    </p>
                                                                                    <a class="btn btn-theme"
                                                                                       target="_blank"
                                                                                       href="<?php echo base_url(); ?>books/<?php echo $file_name; ?>">
                                                                                        <i class="fa fa-download"></i>Download
                                                                                        now
                                                                                    </a>
                                                                                </div>
                                                                            </article><!--//news-item-->
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </div><!--//panel-body-->
                                                        </div><!--//panel-colapse-->
                                                    </div><!--//panel-->
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <p>Coming Soon.</p>
                                                <?php
                                            }
                                            ?>

                                        </div><!--//panel-group-->
                                    </div><!--//page-row-->
                                    <!-- ---------------------------------------------------------------------------------------- -->
                                    <?php
                                    /*
                                    $books = $contents["books"];
                                    if ($books > 0) {
                                        foreach ($books as $row_book) {
                                            $book_id = $row_book->id;
                                            $book_name = $row_book->name;
                                            $book_author = $row_book->author;
                                            $book_edition = $row_book->edition;
                                            $book_serial = $row_book->serial;
                                            $file_name = $row_book->file_name;

                                            ?>

                                            <article class="news-item page-row has-divider clearfix row">
                                                <figure class="thumb col-md-2 col-sm-3 col-xs-4">
                                                    <img class="img-responsive"
                                                         src="<?php echo base_url(); ?>books/cover/<?php echo $book_id . ".jpg"; ?>"
                                                         alt=""/>
                                                </figure>
                                                <div class="details col-md-10 col-sm-9 col-xs-8">
                                                    <h3 class="title">
                                                        <a href="#program"><?php echo $book_name; ?></a>
                                                    </h3>
                                                    <h4>

                                                    </h4>

                                                    <p>
                                                        <?php echo "Author: " . $book_author; ?>
                                                    </p>

                                                    <p>
                                                        <?php echo "Edition: " . $book_edition; ?>
                                                    </p>
                                                    <a class="btn btn-theme" target="_blank"
                                                       href="<?php echo base_url(); ?>books/<?php echo $file_name; ?>">
                                                        <i class="fa fa-download"></i>Download now
                                                    </a>
                                                </div>
                                            </article><!--//news-item-->

                                            <?php

                                        }
                                    }
                                    */
                                    ?>
                                    <p class="divider"></p>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <div class="page-row">
                                        <div class="panel-group" id="accordion">
                                            <?php
                                            $serialOfSlide;
                                            $serial_list_of_slides = $contents["serial_list_of_slides"];
                                            if (count($serial_list_of_slides, COUNT_RECURSIVE) > 0) {
                                                foreach ($serial_list_of_slides as $row_serial_slide) {
                                                    $serialOfSlide = $row_serial_slide->serial;
                                                    ?>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <!--data-parent="#accordion"-->
                                                                <a data-toggle="collapse"
                                                                   href="#collapse-<?php echo "slides" . "-" . $serialOfSlide; ?>">
                                                                    <?php
                                                                    if ($serialOfSlide == "1") {
                                                                        echo "1st Year, 1st Semester (1.1)";
                                                                    } else if ($serialOfSlide == "2") {
                                                                        echo "1st Year, 2nd Semester (1.2)";
                                                                    } else if ($serialOfSlide == "3") {
                                                                        echo "2nd Year, 1st Semester (2.1)";
                                                                    } else if ($serialOfSlide == "4") {
                                                                        echo "2nd Year, 2nd Semester (2.2)";
                                                                    } else if ($serialOfSlide == "5") {
                                                                        echo "3rd Year, 1st Semester (3.1)";
                                                                    } else if ($serialOfSlide == "6") {
                                                                        echo "3rd Year, 2nd Semester (3.2)";
                                                                    } else if ($serialOfSlide == "7") {
                                                                        echo "4th Year, 1st Semester (4.1)";
                                                                    } else if ($serialOfSlide == "8") {
                                                                        echo "4th Year, 2nd Semester (4.2)";
                                                                    }
                                                                    ?>
                                                                </a>
                                                            </h4>
                                                        </div><!--//pane-heading-->
                                                        <div
                                                            id="collapse-<?php echo "slides" . "-" . $serialOfSlide; ?>"
                                                            class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div
                                                                    class="course-item-header row-divider hidden-sm hidden-xs">
                                                                    <div class="row">
                                                                        <div class="col-title col-md-4 col-sm-6">
                                                                            <strong>Content name</strong></div>
                                                                        <div class="col-meta col-md-4 col-sm-6">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <strong>Category</strong></div>
                                                                                <div class=" col-md-6">
                                                                                    <strong>Topics</strong></div>
                                                                            </div>
                                                                        </div><!--//col-meta-->
                                                                    </div><!---//row-->
                                                                </div><!--//course-item-header-->
                                                                <?php
                                                                $slides = $contents["slides"];
                                                                if ($slides > 0) {
                                                                    foreach ($slides as $row_slide) {
                                                                        $slide_id = $row_slide->id;
                                                                        $slide_name = $row_slide->name;
                                                                        $category_name = $row_slide->category_name;
                                                                        $slide_topics = $row_slide->topics;
                                                                        $slide_serial = $row_slide->serial;
                                                                        $file_name = $row_slide->file_name;

                                                                        if ($slide_serial === $serialOfSlide) {
                                                                            ?>
                                                                            <article class="row-divider">
                                                                                <div class="details row">
                                                                                    <div
                                                                                        class="col-title col-md-4 col-sm-6">
                                                                                        <a target="_blank"
                                                                                           href="<?php echo base_url(); ?>slides/<?php echo $file_name; ?>">
                                                                                            <?php echo $slide_name ?>
                                                                                        </a>
                                                                                        <!--<span class="label label-success">
                                                                                        New
                                                                                        </span>-->
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-meta col-md-4 col-sm-6">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-md-4"><?php echo $category_name ?></div>
                                                                                            <div
                                                                                                class="col-md-6"><?php echo $slide_topics ?></div>
                                                                                        </div>
                                                                                    </div><!--//col-meta-->
                                                                                </div><!--//details-->
                                                                            </article><!--//course-item-->
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </div><!--//panel-body-->
                                                        </div><!--//panel-colapse-->
                                                    </div><!--//panel-->
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <p>Coming Soon.</p>
                                                <?php
                                            }
                                            ?>

                                        </div><!--//panel-group-->
                                    </div><!--//page-row-->
                                </div>
                                <div class="tab-pane" id="tab4">
                                    <div class="page-row">
                                        <p>Coming Soon.</p>
                                    </div><!--//page-row-->
                                </div>
                            </div>
                        </div><!--//tabbed-info-->
                    </article><!--//course-item-->
                </div><!--//course-wrapper-->

                <aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">
                    <section class="widget has-divider">
                        <h5 class="title">Other <?php echo $contents["degree_name"]; ?> Majors/Departments</h5>
                        <ul class="list-unstyled">
                            <?php
                            $departments = $contents["degree_departments"];
                            if ($departments > 0) {
                                foreach ($departments as $row_department) {
                                    $department_id = $row_department->id;
                                    $department_name = $row_department->name;

                                    $pn = $contents["degree_name"];
                                    $pn = str_replace(" ", "-", trim($pn));
                                    $dn = $department_name;
                                    $dn = str_replace(" ", "-", trim($dn));
                                    ?>
                                    <li><a href="<?php echo base_url() . "degree/" . $pn . "/" . $dn ?>"><i
                                                class="fa fa-book"></i><?php echo $department_name; ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </section><!--//widget-->
                    <section class="widget has-divider">
                        <!-- for Ads -->
                        <script data-cfasync="false" type="text/javascript" src="http://www.adnetworkperformance.com/a/display.php?r=1263209"></script>
                    </section><!--//widget-->
                    <section class="widget has-divider">
                        <!-- for Ads -->
                        <script type='text/javascript' src='//clksite.com/adServe/banners?tid=132819_227967_7'></script>
                    </section><!--//widget-->
                    <section class="widget has-divider">
                        <!-- for Ads -->
                        
                    </section><!--//widget-->
                </aside>
            </div><!--//page-row-->
        </div><!--//page-content-->
    </div><!--//page-->
</div><!--//content-->