<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.metisMenu.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#search').keyup(function () {
            var type = $('#search').val();
            var method = 'admin_search';
            var controller = 'search';
            var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function              ?>';
            if ($("#search").val().length > 0) {
                $.ajax({
                    //if remove $config['index_page'] = 'index.php' add index.php with url
                    'url': base_url + '/index.php/' + controller + '/' + method + '/' + type,
                    'type': 'POST', //the way you want to send data to your URL
                    'data': {'type': type},
                    'cache': false,
//                        'dataType': 'json',
                    'success': function (data) { //probably this request will return anything, it'll be put in var "data"
                        var container = $('#finalResult'); //jquery selector (get element by id)
                        if (data) {
                            container.html(data);
                        }
                    }
                    , error: function (data) {
                        alert('Invalid Input!');
                    }
                });
            }
        });
    });
</script>