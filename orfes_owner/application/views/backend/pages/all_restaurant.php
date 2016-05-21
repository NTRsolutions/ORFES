<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">All Restaurant</h1>
    </div>
</div>
<div class="row"> 
    <section class="search_restaurant">
        <div class="col-md-12">  
            <div class="media sh_search">
                <div class="media-left"><strong>#</strong></div>
                <div class="media-body media-first"><strong>Restaurant Information</strong></div>
                <div class="media-body"><strong>Location</strong></div>
                <div class="media-right"><strong>Action</strong></div>
            </div>   
            <?php
            $sl = 1;
            foreach ($restaurant as $value) {
                echo "<div class=\"media sh_search\">";
                echo "<div class=\"media-left\"> " . $sl++ . "</div>";
                echo "<div class=\"media-body media-first\">";
                echo "$value->name <br/>";
                echo "<strong>Hotline </strong>- $value->hotline_number <br/>";
                echo "<strong>Join Date </strong>- $value->date <br/>";
                echo "</div>";
                echo "<div class=\"media-body\">";
                echo "$value->address, $value->postal_code, $value->police_station, ";
                echo "$value->district_city, $value->state_division, $value->country. ";
                echo "</div>";
                echo "<div class=\"media-right\" style='padding:5px'>";
                if ($value->status == 1) {
                    echo "<a class=\"btn btn-default\" href=" . base_url() . $value->username . ">View</a>";
                    echo "<a class=\"btn btn-default\" href=" . base_url() . 'dashboard/block/' . $this->hash_model->encode($value->restaurant_id) . ">Block</a>";
                }
                if ($value->status == 5) {
                    echo "<i style='color:red'>Pending Email Activation</i><br/>";
                    echo "<a class=\"btn btn-default\" href=" . base_url() . 'dashboard/unblock/' . $this->hash_model->encode($value->restaurant_id) . ">Active</a>";
                }
                if ($value->status == 0) {
                    echo "<i style='color:red'>To view please un-block first</i><br/>";
                    echo "<a class=\"btn btn-default\" href=" . base_url() . 'dashboard/unblock/' . $this->hash_model->encode($value->restaurant_id) . ">Un-block</a>";
                }
                echo "<a class=\"btn btn-default\" href=" . base_url() . 'dashboard/delete/' . $this->hash_model->encode($value->restaurant_id) . ">Delete</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>   
        </div>
        <div class="col-md-12"><p class="pull-right">
                <?php echo $links; ?>  
            </p> </div>
    </section> 
</div>
 