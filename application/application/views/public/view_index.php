<?php
/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 19.Feb.16
 * Time: 02:24 PM
 */
?>
<!-- ******CONTENT****** -->
<div class="content container">
    <div id="promo-slider" class="slider flexslider">
        <ul class="slides">
            <?php
            $sliders = $contents["sliders"];
            if ($sliders > 0) {
                foreach ($sliders as $row_slider) {
                    $slider_id = $row_slider->id;
                    $slider_image_name = $row_slider->image_name;
                    $slider_h1 = $row_slider->h1;
                    $slider_h2 = $row_slider->h2;
                    ?>
                    <li>
                        <img
                            src="<?php echo base_url(); ?>assets/images/slides/<?php echo $slider_image_name; ?>.jpg"
                            alt=""/>

                        <p class="flex-caption">
                            <span class="main"><?php echo $slider_h1; ?></span>
                            <br/>
                            <span class="secondary clearfix"><?php echo $slider_h2; ?></span>
                        </p>
                    </li>
                    <?php
                }
            }
            ?>
        </ul><!--//slides-->
    </div><!--//flexslider-->

    <?php
    $promo = $contents["promo"];
    if ($promo > 0) {
        foreach ($promo as $row_promo) {
            $promo_id = $row_promo->id;
            $promo_heading = $row_promo->heading;
            $promo_content = $row_promo->content;
        }
        ?>

        <section class="promo box box-dark">
            <div class="col-md-12">
                <h1 class="section-heading"><?php echo $promo_heading; ?></h1>

                <p><?php echo $promo_content; ?></p>
            </div>
        </section><!--//promo-->
        <?php
    }
    ?>

    <div class="row cols-wrapper">
		<div class="col-md-3">
			<section>
				<div class="section-content">
					
					<!-- for Ad -->
					<script data-cfasync="false" type="text/javascript" src="http://www.adnetworkperformance.com/a/display.php?r=1255191"></script>
					
				</div><!--//section-content-->
			</section><!--//events-->
		</div><!--//col-md-3-->
        <div class="col-md-6">
            <section class="course-finder">
                <h1 class="section-heading text-highlight"><span class="line">e-Book Finder</span></h1>

                <div class="section-content">

                    <form class="course-finder-form" action="<?php echo base_url(); ?>search/" method="post">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 subject">
                                <select name="department_id" class="form-control subject">
                                    <option>Choose a subject area</option>
                                    <?php
                                    $departments = $headerinfo["departments"];
                                    if ($departments > 0) {
                                        foreach ($departments as $row_department) {
                                            $department_id = $row_department->id;
                                            $department_name = $row_department->name;
                                            ?>
                                            <option
                                                value="<?php echo $department_id; ?>"><?php echo $department_name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-7 col-sm-7 keywords">
                                <input id="search_text_home" name="keyword" class="form-control pull-left" type="text"
                                       placeholder="Search keywords"/>
                                <button id="search_submit_home" type="submit" class="btn btn-theme"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form><!--//course-finder-form-->

                    <a class="read-more" href="<?php echo base_url(); ?>book">View all our e-books<i
                            class="fa fa-chevron-right"></i></a>
                </div><!--//section-content-->
            </section><!--//course-finder-->

            <?php
            $video = $contents["video"];
            if ($video > 0) {
                foreach ($video as $row_video) {
                    $video_id = $row_video->id;
                    $video_heading = $row_video->heading;
                    $video_src = $row_video->src;
                    $video_description = $row_video->description;
                }
                ?>

                <!--<section class="video">
                    <h1 class="section-heading text-highlight"><span class="line"><?php echo $video_heading; ?></span></h1>

                    <!--<div class="carousel-controls">
                        <a class="prev" href="#videos-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
                        <a class="next" href="#videos-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
                    </div><!--//carousel-controls
                    <div class="section-content">
                        <div id="videos-carousel" class="videos-carousel carousel slide">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <iframe class="video-iframe"
                                            src="<?php echo $video_src; ?>"
                                            frameborder="0" allowfullscreen=""></iframe>
                                </div><!--//item
                            </div><!--//carousel-inner
                        </div><!--//videos-carousel
                        <p class="description"><?php echo $video_description; ?></p>
                    </div><!--//section-content
                </section><!--//video-->

                <?php
            }
            ?>
        </div>

        <div class="col-md-3">
            <section>
				<div class="section-content">
                    <!-- for Ad -->
		<script data-cfasync="false" type="text/javascript" src="http://www.adnetworkperformance.com/a/display.php?r=1255185"></script>		
                </div><!--//section-content-->
            </section><!--//testimonials-->
        </div><!--//col-md-3-->
    </div><!--//cols-wrapper-->
</div><!--//content-->