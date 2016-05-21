$(document).ready(function () {
    if ($('#add_item_type').val() == "Add A Special Offer") {
        $('.special-price').show();
    } else {
        $('.special-price').hide();
    }
    $('#add_item_type').change(function () {
        if ($('#add_item_type').val() == "Add A Special Offer") {
            $('.special-price').show();
        } else {
            $('.special-price').hide();
        }
    });
});
//ends of add_menu_item script 

//$('ul.nav li.dropdown').hover(function() {
//  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
//}, function() {
//  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
//});