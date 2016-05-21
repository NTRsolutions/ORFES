<section class="search_restaurant">
    <div class="col-md-12">
        <div class="result" >
            Total <strong><?php echo count($restaurant) ?> </strong> record found
            <a class="btn btn-default pull-right" href="<?php echo base_url();?>index.php/pages/search_nearest_restaurant">Search Again</a>
        </div>  

        <?php
        if (count($restaurant) > 0) {
            ?>
            <div class="media sh_search">
                <div class="media-left"><strong>#</strong></div>
                <div class="media-body media-first"><strong>Restaurant Name</strong></div>
                <div class="media-body"><strong>Location</strong></div>
                <div class="media-right"><strong>Action</strong></div>
            </div> 

            <?php
            $sl = 1;
            foreach ($restaurant as $value) {
                echo "<div class=\"media sh_search\">";
                echo "<div class=\"media-left\">" . $sl++ . "</div>";               
                echo "<div class=\"media-body media-first\">";
                echo "$value->name <br/>";                
                echo "<strong>Hotline Number </strong>- $value->hotline_number <br/>";
                echo "</div>";
                echo "<div class=\"media-body\">";
                echo "$value->address, $value->postal_code, $value->police_station, ";
                echo "$value->district_city, $value->state_division, $value->country. ";
                echo "</div>";
                echo "<div class=\"media-right\" style='padding:5px'>";
                echo "<a class=\"btn btn-default\" href=" .base_url() .'index.php/'.$value->username . ">Details</a>";
                echo "</div>";
                echo "</div>";
            }
        } //ends of if
        ?>   
    </div>
</section>