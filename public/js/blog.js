$(document).ready(function() {
    $('.widget_avh_extendedcategories_top ul li').each(function(i) {
    if (i < 9) $(this).show();
        return;
    });

    $('.sidebar .widget').addClass('block white');

    $('.widget_avh_extendedcategories_top').append('<a href="#" class="btn">Plus de catégories</a>');
    $('.widget_avh_extendedcategories_top .btn').click(function(e) {
        e.preventDefault();
        $(this).hide();
        $('.widget_avh_extendedcategories_top ul li').show();
    });

});