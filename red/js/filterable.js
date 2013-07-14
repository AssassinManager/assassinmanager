// Filterable jQuery

function scaleDown() {

	jQuery('.portfolio .span6.well.well-small').removeClass('current').addClass('not-current');
	jQuery('.portfolio .span4.well.well-small').removeClass('current').addClass('not-current');
	jQuery('.portfolio .span3.well.well-small').removeClass('current').addClass('not-current');
	jQuery('ul.portfolio-categories > li').removeClass('current-li');

}

function show(category) {

	scaleDown();

	jQuery('#' + category).addClass('current-li');
	jQuery('.' + category).removeClass('not-current');
	jQuery('.' + category).addClass('current');

	if (category == "all") {
		jQuery('ul.portfolio-categories > li').removeClass('current-li');
		jQuery('#all').addClass('current-li');
		jQuery('.portfolio .span6.well.well-small').removeClass('current, not-current').addClass('all');
		jQuery('.portfolio .span4.well.well-small').removeClass('current, not-current').addClass('all');
		jQuery('.portfolio .span3.well.well-small').removeClass('current, not-current').addClass('all');
	}

}

jQuery(document).ready(function(){

	jQuery('#all').addClass('current-li');

	jQuery("ul.portfolio-categories > li").click(function(){
		show(this.id);
	});

});