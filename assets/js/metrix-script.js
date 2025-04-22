jQuery(document).ready(function() {
	var width1 = jQuery('.hero-slider-block .ctas li:nth-of-type(1)').outerWidth();
	var width2 = jQuery('.hero-slider-block .ctas li:nth-of-type(2)').outerWidth();
	var maxWidth = Math.max(width1, width2);
	
	jQuery('.hero-slider-block .ctas li').width(maxWidth);

	setTimeout(function () {
		if (jQuery('.filter-container .filter-container__inner .fs-dropdown .fs-options').children('.selected').length === 0) {
			jQuery('.filter-container .filter-container__inner .fs-dropdown .fs-options').children().first().addClass('selected');
		}

		if (jQuery('.location-block .location-block__filters .fs-dropdown .fs-options').children('.selected').length === 0) {
			jQuery('.location-block .location-block__filters .fs-dropdown .fs-options').children().first().addClass('selected');
		}

	 }, 1000);



});