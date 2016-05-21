<?php
/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 10.May.16
 * Time: 12:34 AM
 */
?>
<!-- ******CONTENT****** -->
<div class="content container">
    <div class="page-wrapper">
        <header class="page-heading clearfix">
            <h1 class="heading-title pull-left"><?php echo $contents["header"]; ?></h1>

            <div class="breadcrumbs pull-right">
                <ul class="breadcrumbs-list">
                    <li class="breadcrumbs-label">You are here:</li>
                    <li><a href="<?php echo base_url(); ?>">Home</a><i class="fa fa-angle-right"></i></li>
                    <li class="current"><?php echo $contents["header"]; ?></li>
                </ul>
            </div><!--//breadcrumbs-->
        </header>

        <div class="page-content">
            <div class="row page-row">
                <div class="col-md-8 col-sm-7">

                    <?php
                    $books = $contents["books"];
                    if (count($books, COUNT_RECURSIVE) > 0) {
                        foreach ($books as $row_book) {
                            $book_id = $row_book->id;
                            $book_name = $row_book->name;
                            $book_author = $row_book->author;
                            $book_edition = $row_book->edition;
                            $file_name = $row_book->file_name;
                            $thumb_name = $row_book->thumb_name;
                            ?>

                            <article class="news-item page-row has-divider clearfix row">
                                <figure class="thumb col-md-2 col-sm-3 col-xs-4">
                                    <img class="img-responsive"
                                         src="<?php echo base_url(); ?>books/cover/<?php echo $thumb_name; ?>"
                                         alt=""/>
                                </figure>
                                <div class="details col-md-10 col-sm-9 col-xs-8">
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
                                    <a class="btn btn-theme" target="_blank"
                                       href="<?php echo base_url(); ?>books/<?php echo $file_name; ?>">
                                        <i class="fa fa-download"></i>Download now
                                    </a>
                                </div>
                            </article><!--//news-item-->

                            <?php

                        }
                    } else {
                        ?>
                        <p>No Books Found</p>
                        <?php
                    }
                    ?>

                </div><!--//news-wrapper-->
                <aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">
                    <section class="widget has-divider">

                        <!-- for Adsense -->

                    </section><!--//widget-->

                    <section class="links">
                        <h1 class="section-heading text-highlight"><span class="line">Quick Links</span></h1>

                        <div class="section-content">
                            <p><a href="<?php echo base_url(); ?>book"><i class="fa fa-caret-right"></i>Books</a></p>

                            <p><a href="<?php echo base_url(); ?>article"><i class="fa fa-caret-right"></i>Articles</a>
                            </p>

                            <p><a href="<?php echo base_url(); ?>contact"><i class="fa fa-caret-right"></i>Contact</a>
                            </p>
                        </div><!--//section-content-->
                    </section><!--//links-->

                </aside>
            </div><!--//page-row-->
        </div><!--//page-content-->
    </div><!--//page-->
</div><!--//content-->