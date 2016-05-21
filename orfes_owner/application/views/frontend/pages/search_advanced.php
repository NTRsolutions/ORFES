<section class="search_advanced">
    <div class="col-sm-8 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
        <h3 class="sh_title text-center">Get Restaurant Information</h3>
        <form action="<?php echo base_url(); ?>index.php/search/search" method="post">
            <div class="form-group">
                <label for="search" class="sr-only">Search</label>
                <input type="search" name="search" class="form-control" id="search" placeholder="Type Text" required>
            </div>
            <div class="form-group">
                <input class="btn btn-default col-xs-12 col-md-6 col-sm-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3" type="submit" value="Search" >
            </div>
        </form>
    </div>
</section>

<section  id="finalResult"></section>
 