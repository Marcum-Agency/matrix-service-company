jQuery(document).ready(function() {
	var width1 = jQuery('.hero-slider-block .ctas li:nth-of-type(1)').outerWidth();
	var width2 = jQuery('.hero-slider-block .ctas li:nth-of-type(2)').outerWidth();
	var maxWidth = Math.max(width1, width2);
	
	jQuery('.hero-slider-block .ctas li').width(maxWidth);
});