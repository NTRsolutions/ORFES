<?php
/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 26.Feb.16
 * Time: 03:06 AM
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
                <div class="news-wrapper col-md-8 col-sm-7">

                    <?php
                    $department_id;
                    $departments = $contents["departments"];
                    if ($departments > 0) {
                        foreach ($departments as $row_department) {
                            $department_id = $row_department->id;
                            $department_name = $row_department->name;
                            ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse-<?php echo $department_id; ?>">
                                            <?php echo $department_name; ?>
                                        </a>
                                    </h4>
                                </div><!--//pane-heading-->
                                <div id="collapse-<?php echo $department_id; ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php
                                        $books = $contents["books"];

                                        //$result = count($books);
                                        //echo $result;

                                        if ($books > 0) {
                                            foreach ($books as $row_book) {
                                                $book_id = $row_book->id;
                                                $book_name = $row_book->name;
                                                $book_author = $row_book->author;
                                                $book_edition = $row_book->edition;
                                                $book_department_id = $row_book->department_id;
                                                $file_name = $row_book->file_name;
                                                $thumb_name = $row_book->thumb_name;
                                                if ($book_department_id == $department_id) {


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
                                            }
                                        }
                                        ?>
                                    </div><!--//panel-body-->
                                </div><!--//panel-colapse-->
                            </div><!--//panel-->

                            <?php
                        }
                    }
                    ?>


                    <!--
                    <ul class="pagination">
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                    -->

                </div><!--//news-wrapper-->
                <aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">
                    <section class="widget has-divider">

                        <!-- for Ads -->
                        <script data-cfasync="false" type="text/javascript" src="http://www.adnetworkperformance.com/a/display.php?r=1255197"></script>

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