<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<meta name="description" content="GMC is Online Restaurant Menu Card Service Providing Company in Dhaka, Bangladesh & around the Whole World. Search Nearest Restaurant Service is Available Here">
<meta name="keywords" content="Online Restaurant Menu Card, Restaurant Menu Card, Restaurant in Dhaka, All Restaurant List in Dhaka, Restaurant Service Company in Dhaka">
<title>Get Menu Card & Search Nearest Restaurant :: <?php if (isset($title)) echo $title; ?></title> 
<link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/icons/favicon.ico" />
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style-mobile.css" rel="stylesheet">
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
//    var method = 'check_data';
//    var controller = 'restaurant';
    var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function            ?>';
    function jquery_ajax_search_mobile(controller, method, type) {
        $.ajax({
            //if remove $config['index_page'] = 'index.php' add index.php with url
            'url': base_url + '/index.php/' + controller + '/' + method + '/' + type,
            'type': 'POST', //the way you want to send data to your URL
            'data': {'type': type},
            'cache': false,
            'success': function (data) { //probably this request will return anything, it'll be put in var "data"
                var container = $('#search_result_mobile'); //jquery selector (get element by id)
                if (data) {
                    container.html(data);
                }
            }
            //,error: function (data) {
            //alert('failed');
            //}
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#search_mobile').keyup(function () {
            var type = $('#search_mobile').val();
            var method = 'jquery_search_mobile';
            var controller = 'mobile';
            var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function              ?>';
            if ($("#search_mobile").val().length > 0) {
                $.ajax({
                    //if remove $config['index_page'] = 'index.php' add index.php with url
                    'url': base_url + '/index.php/' + controller + '/' + method + '/' + type,
                    'type': 'POST', //the way you want to send data to your URL
                    'data': {'type': type},
                    'cache': false,
//                        'dataType': 'json',
                    'success': function (data) { //probably this request will return anything, it'll be put in var "data"
                        var container = $('#finalResult_mobile'); //jquery selector (get element by id)
                        if (data) {
                            container.html(data);
                        }
                    }
                    , error: function (data) {
                        alert('failed');
                    }
                });
            }
        });
    });
</script>