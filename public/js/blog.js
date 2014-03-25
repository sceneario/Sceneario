$(document).ready(function() {

    $('.widget_avh_extendedcategories_top ul li').each(function(i) {
	if (i < 9) $(this).show();
	return;
    });

    $('.widget_avh_extendedcategories_top').append('<a href="#" class="more-link">Plus de catégories</a>');
    $('.widget_avh_extendedcategories_top .more-link').click(function(e) {
	$(this).hide();
	$('.widget_avh_extendedcategories_top ul li').show();
	e.preventDefault();
    });

});