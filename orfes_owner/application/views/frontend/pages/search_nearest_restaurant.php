<section class="search_restaurant">
    <div class="col-sm-8 col-md-8 col-lg-8 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
        <h3 class="sh_title text-center">Search Nearest Restaurant </h3>
        <form action="<?php echo base_url(); ?>index.php/search/search_nearest_restaurant_result" method="post">
            <div class="form-group">
                <label for="country">Select Country</label>
                <?php $this->load->view('frontend/pages/country'); ?>
            </div>
            <div class="form-group">
                <label for="state_division">State / Division</label>
                <input type="text" class="form-control" name="state_division" id="state_division" placeholder="State / Division">
            </div>
            <div class="form-group">
                <label for="district_city">District / City</label>
                <input type="text" class="form-control" name="district_city" id="district_city" placeholder="District / City">
            </div>
            <div class="form-group">
                <label for="police_station">Police Station</label>
                <input type="text" class="form-control" name="police_station" id="police_station" placeholder="Police Station">
            </div> 
            <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Optional">
            </div> 

            <div class="form-group">
                <label for="search" class="sr-only">Search</label>
                <input class="btn btn-default col-xs-12 col-md-6 col-sm-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3" type="submit" value="Search" >
            </div> 
        </form>
    </div>
</section>