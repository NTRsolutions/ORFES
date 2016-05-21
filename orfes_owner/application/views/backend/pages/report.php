<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">Report</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12"> 
        <script src="https://www.google.com/jsapi" type="text/javascript"></script>
        <script type="text/javascript">
            google.load("visualization", "1", {packages: ["geochart"]});
            google.setOnLoadCallback(drawRegionsMap);

            function drawRegionsMap() {
                var data = google.visualization.arrayToDataTable([
                    ['Country', 'Restaurant'],
<?php foreach ($country_visitor as $visitors) { ?>
                        ['<?php echo $visitors->country ?>', <?php echo $visitors->country_users ?>],
<?php } ?>
                ]);
                var options = {
                    displayMode: 'text',
                    sizeAxis: {minSize: 14, maxSize: 18},
                    colors: ['#017700', '#E82E38', '#3399FF', '#BBC3C7', '#EBF0F1', '#3366CC', '#000000', '#FF9900'],
                    magnifyingGlass: {enable: true, zoomFactor: 10}
                };
                var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
                chart.draw(data, options);
            }
        </script>
        <div id="regions_div" style="width: 100%; height: 500px;"></div>
    </div>



    <div class="col-md-12"> 
        <script>
            google.load("visualization", "1", {packages: ["corechart"]});
            google.setOnLoadCallback(drawVisualization);
            function drawVisualization() {

                var data = google.visualization.arrayToDataTable([
                    ['Month', 'Restaurant'],
                    ['Total', <?php echo $count_in_year->count_users; ?>],
                    ['Jan', <?php echo $count_in_month->jan; ?>],
                    ['Feb', <?php echo $count_in_month->feb; ?>],
                    ['Mar', <?php echo $count_in_month->mar; ?>],
                    ['Apr', <?php echo $count_in_month->apr; ?>],
                    ['May', <?php echo $count_in_month->may; ?>],
                    ['Jun', <?php echo $count_in_month->jun; ?>],
                    ['Jul', <?php echo $count_in_month->jul; ?>],
                    ['Aug', <?php echo $count_in_month->aug; ?>],
                    ['Sep', <?php echo $count_in_month->sep; ?>],
                    ['Oct', <?php echo $count_in_month->oct; ?>],
                    ['Nov', <?php echo $count_in_month->nov; ?>],
                    ['Dec', <?php echo $count_in_month->de; ?>]
                ]);
                var options = {
                    height: 600,
                    title: 'Final Reports - Monthly restaurant registration',
                    colors: ['#017700', '#E82E38', '#3399FF', '#BBC3C7', '#EBF0F1', '#3366CC', '#000000', '#FF9900'],
                    vAxis: {title: "Restaurant"},
                    hAxis: {title: "Year - 2015"},
                    seriesType: "bars",
                    series: {13: {type: "line"}}
                };
                var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
        <div id="chart_div" class="img-responsive"></div>  
    </div> 
</div>
