<?php

if ($search_item->num_rows() > 0) {
    echo "<div class='row' style='margin:10px 0;color:green'>Total <strong> " . $search_item->num_rows() . "</strong> record found</div>";
    $sl = 1;

    echo "<div class=\"media sh_search\">
                    <div class=\"media-left\"><strong>#</strong></div>
                    <div class=\"media-body media-first\"><strong>Restaurant Name</strong></div>
                    <div class=\"media-body\"><strong>Location</strong></div>
                    <div class=\"media-right\"><strong>Action</strong></div>
                 </div>";

    foreach ($search_item->result() as $value) {
        echo "<div class=\"media sh_search\">";
        echo "<div class=\"media-left\">" . $sl++ . "</div>";
        echo "<div class=\"media-body media-first\"><strong><h4 class=\"media-heading\">$value->name</h4></strong></div>";
        echo "<div class=\"media-body\"> $value->address </div>";
        echo "<div class=\"media-right\" style='padding:5px'>";
        echo "<a class=\"btn btn-default\" href=" .base_url() .'index.php/'. $value->username . ">Details</a>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<div class=\"media sh_search\" style=\"color:red\">No record found</div>";
}