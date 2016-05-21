<?php
/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 09.Mar.16
 * Time: 06:17 PM
 */
?>
<!-- ******CONTENT****** -->
<div class="content container">
    <div class="page-wrapper">
        <header class="page-heading clearfix">
            <h1 class="heading-title pull-left">Contact</h1>

            <div class="breadcrumbs pull-right">
                <ul class="breadcrumbs-list">
                    <li class="breadcrumbs-label">You are here:</li>
                    <li><a href="<?php echo base_url(); ?>">Home</a><i class="fa fa-angle-right"></i></li>
                    <li class="current">Contact</li>
                </ul>
            </div><!--//breadcrumbs-->
        </header>
        <div class="page-content">
            <div class="row">
                <article class="contact-form col-md-8 col-sm-7  page-row">
                    <h3 class="title">Get in touch</h3>

                    <p>We’d love to hear from you. Try to keep up with us and leave your valuable feedback.</p>

                    <form>
                        <div class="form-group name">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" placeholder="Enter your name">
                        </div><!--//form-group-->
                        <div class="form-group email">
                            <label for="email">Email<span class="required">*</span></label>
                            <input id="email" type="email" class="form-control" placeholder="Enter your email">
                        </div><!--//form-group-->
                        <div class="form-group phone">
                            <label for="phone">Phone</label>
                            <input id="phone" type="tel" class="form-control" placeholder="Enter your contact number">
                        </div><!--//form-group-->
                        <div class="form-group message">
                            <label for="message">Message<span class="required">*</span></label>
                            <textarea id="message" class="form-control" rows="6"
                                      placeholder="Enter your message here..."></textarea>
                        </div><!--//form-group-->
                        <button type="submit" class="btn btn-theme">Send message</button>
                    </form>
                </article><!--//contact-form-->
                <aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">
                    <section class="widget">
                        <h3 class="title">All Enquiries</h3>

                        <p class="tel"><i class="fa fa-phone"></i>+880 1828 048282</p>

                        <p class="email"><i class="fa fa-envelope"></i>Email: <a href="">info@edukeeping.com</a></p>
                    </section>
                </aside><!--//page-sidebar-->
            </div><!--//page-row-->
        </div><!--//page-content-->
    </div><!--//page-wrapper-->
</div><!--//content-->
