jQuery(document).on("click", ".header--site .nav-menu-item .arrow" , function() {
	jQuery(this).parent().toggleClass('active');
	jQuery(this).next('.sub-menu').toggleClass('active');
	jQuery('html').toggleClass('locked');
});



/* Total Capabilities animation */

  var controller = new ScrollMagic.Controller();
  var tween1 = TweenMax.staggerFromTo(".split-list .scroll-list li", 1, {opacity: 0}, {opacity: 100},1);
  
  var scene = new ScrollMagic.Scene({triggerElement: ".split-list", duration: 200+"%",triggerHook: 0})
  .setPin(".split-list")
   //.addIndicators({name: "1 (duration: 100)"})
  .addTo(controller);
  
  
  var scene = new ScrollMagic.Scene({triggerElement: ".split-list", duration:200+"%",offset: 400})
  .setTween(tween1)              
  .addTo(controller);
  

/* image slot  animation */
if(jQuery( window ).width() > 1023){

  var controller2 = new ScrollMagic.Controller();
    var tween2 = TweenMax.staggerFromTo(".image-slots__container .image-slots__slot", 1, {top: 100+'%'}, {top: 0+'%'},1);
    
    var scene2 = new ScrollMagic.Scene({triggerElement: ".image-slots__container", duration: 200+"%",triggerHook: 0})
    .setPin(".image-slots__container")
    //.addIndicators({name: "1 (duration: 100)"})
    .addTo(controller2);
    
    
    var scene2 = new ScrollMagic.Scene({triggerElement: ".image-slots__container", duration:200+"%",offset: 400})
    .setTween(tween2)              
    .addTo(controller2);

  }


/* ctabox animation */

var controller3 = new ScrollMagic.Controller();
var tween3 = TweenMax.staggerFromTo(".block--cta-image-banner .media-wrapper img", 1, {opacity: 1}, {opacity: 0},1);
var tween4 = TweenMax.staggerFromTo(".block--cta-image-banner .content__inner", 1, {opacity: 0}, {opacity: 1},1);

var scene3 = new ScrollMagic.Scene({triggerElement: ".block--cta-image-banner", duration: 200+"%",triggerHook: 0})
.setPin(".block--cta-image-banner")
//.addIndicators({name: "1 (duration: 100)"})
.addTo(controller3);


var scene3 = new ScrollMagic.Scene({triggerElement: ".block--cta-image-banner", duration:400+"%",offset: 100})
.setTween(tween3)              
.addTo(controller3);

var scene4 = new ScrollMagic.Scene({triggerElement: ".block--cta-image-banner", duration:400+"%",offset: 400})
.setTween(tween4)              
.addTo(controller3);




/* Total Capabilities animation */

jQuery(window).on("scroll", () => {
  jQuery(".mrcm-block").each(function() {
    var offset = jQuery(this).offset().top - jQuery(window).scrollTop();
    if (offset <= 0) {
      jQuery(this).addClass('animate_this')
    } else {
      jQuery(this).removeClass('animate_this')
    }
  })
}).trigger("scroll")


jQuery(window).on("scroll", () => {
  jQuery(".mrcm-block").each(function() {
    var offset = jQuery(this).offset().top - jQuery(window).scrollTop() -100;
    if (offset <= 0) {
      jQuery(this).addClass('animate_arrow')
    }
  })
}).trigger("scroll")


/* all elements */
jQuery(window).on("scroll", () => {
  jQuery(".mrcm-block:last-of-type").each(function() {
    var offset = jQuery(this).offset().top - jQuery(window).scrollTop() - 400;
    if (offset <= 0) {
      jQuery(this).addClass('animate_arrow')
    } 
  })
}).trigger("scroll")








