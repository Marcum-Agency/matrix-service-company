/* Total Capabilities animation */
const controller = new ScrollMagic.Controller();
const list = document.querySelector('.scroll-list');
const items = document.querySelectorAll('.scroll-list li');

const totalSlides = items.length;
const liHeight = 90;
const scrollPerItem = window.innerHeight;
const initialOffset = 90;


const tl = new TimelineMax();
tl.set(list, { y: initialOffset });

items.forEach((_, index) => {
  const targetY = initialOffset - (liHeight * (index + 1));
  tl.to(list, 1, { y: targetY });
});


new ScrollMagic.Scene({
  triggerElement: ".split-list",
  triggerHook: 0,
  duration: scrollPerItem * totalSlides
})
.setPin(".split-list")
.setTween(tl)
.addTo(controller);


items.forEach((li, index) => {
  new ScrollMagic.Scene({
    triggerElement: ".split-list",
    triggerHook: 0.5,
    offset: (index + 1) * scrollPerItem,
    duration: scrollPerItem
  })
  .on("enter", () => {
    items.forEach(el => el.classList.remove("active"));
    li.classList.add("active");
  })
  .addTo(controller);
});


new ScrollMagic.Scene({
  triggerElement: ".split-list",
  triggerHook: 0.5,
  offset: 0,
  duration: scrollPerItem

})
.on("leave", (event) => {
  if (event.scrollDirection === "REVERSE") {
    items.forEach(el => el.classList.remove("active"));
  }
})
.addTo(controller);






  

/* image slot  animation */
if(jQuery( window ).width() > 1023 && (jQuery(".image-slots__container").length > 0) && jQuery(window).height() < jQuery(window).width()){

  var controller2 = new ScrollMagic.Controller();
    var tween2 = TweenMax.staggerFromTo(".image-slots__container .image-slots__slot", 1, {top: 100+'%'}, {top: 0+'%'},1);
    
    var scene2 = new ScrollMagic.Scene({triggerElement: ".image-slots__container", duration: 50+"%",triggerHook: 0})
    .setPin(".image-slots__container")
    //.addIndicators({name: "1 (duration: 100)"})
    .addTo(controller2);
    
    
    var scene2 = new ScrollMagic.Scene({triggerElement: ".image-slots__container", duration:50+"%",offset: -100})
    .setTween(tween2)              
    .addTo(controller2);

  }


/* ctabox animation */

var controller3 = new ScrollMagic.Controller();
var tween3 = TweenMax.staggerFromTo(".block--cta-image-banner .media-wrapper img", 1, {opacity: 1}, {opacity: 0.4},1);
var tween4 = TweenMax.staggerFromTo(".block--cta-image-banner .content__inner", 1, {opacity: 0}, {opacity: 1},1);

var scene3 = new ScrollMagic.Scene({triggerElement: ".block--cta-image-banner", duration: 60+"%",triggerHook: 0})
.setPin(".block--cta-image-banner")
//.addIndicators({name: "1 (duration: 100)"})
.addTo(controller3);


var scene3 = new ScrollMagic.Scene({triggerElement: ".block--cta-image-banner", duration:120+"%",offset: 400})
.setTween(tween3)              
.addTo(controller3);

var scene4 = new ScrollMagic.Scene({triggerElement: ".block--cta-image-banner", duration:120+"%",offset: 400})
.setTween(tween4)              
.addTo(controller3);

/* all elements */
jQuery(window).on("scroll", () => {
  jQuery(".mrcm-block:last-of-type").each(function() {
    var offset = jQuery(this).offset().top - jQuery(window).scrollTop() - 400;
    if (offset <= 0) {
      jQuery(this).addClass('animate_arrow')
    } 
  })
}).trigger("scroll")


jQuery(document).ready(function(){
  
  /*animate_arrow*/
  jQuery(window).scroll(function(){
    jQuery(".mrcm-block").each(function(){
      var x = jQuery(window).scrollTop() + jQuery(window).height();


			if (jQuery(window).width() < 768) {
			  var y = jQuery(this).offset().top + (jQuery(this).height() / 4);
			}
			else {
			  var y = jQuery(this).offset().top + (jQuery(this).height() / 1.5);
			}

      if (x >= y) {
        jQuery(this).addClass('animate_arrow');
      };
    });
  });
  
  
  
  jQuery(window).scroll(function(){
    jQuery(".reveal").each(function(){
      var x = jQuery(window).scrollTop() + jQuery(window).height();


			if (jQuery(window).width() < 768) {
			  var y = jQuery(this).offset().top + (jQuery(this).height() / 4);
			}
			else {
			  var y = jQuery(this).offset().top + (jQuery(this).height() / 2.5);
			}

      if (x >= y) {
        jQuery(this).addClass('reveal_visible');
      };
    });
  });



/*id*/
  jQuery(window).scroll(function(){
    jQuery("[data-class='reveal']").each(function(){
      var x = jQuery(window).scrollTop() + jQuery(window).height();


			if (jQuery(window).width() < 768) {
			  var y = jQuery(this).offset().top + (jQuery(this).height() / 4);
			}
			else {
			  var y = jQuery(this).offset().top + (jQuery(this).height() / 2);
			}

      if (x >= y) {
        jQuery(this).addClass('reveal_visible');
      };
    });
  });

});



jQuery('.testimonial blockquote p strong').each(function() {
  var text = jQuery(this).text();
  var wrappedText = '';
  for (var i = 0; i < text.length; i++) {
    wrappedText 	= '<span>' + text + '</span>';
  }
  jQuery(this).html(wrappedText);
});



var x = 1;

function updateClass() {
  let a = jQuery(".view--capabilities #hero-slider h2 strong.active");
  a.removeClass("active");
  a = a.next(".view--capabilities #hero-slider h2 strong");
  if (a.length == 0)
    a = jQuery(".view--capabilities #hero-slider h2 strong").first();
  a.addClass("active");
}

jQuery(document).ready(function() {
  setInterval(function() {
    updateClass();
  }, x * 4000);
});




setTimeout(function () {
	jQuery('.view--contact .category-tab-block .nf-field-element input[type=checkbox]').after('<span class="checkbox_label"></span>');
}, 1000);



/*for post quote*/
jQuery(".archive-container.testimony-archive article.testimony").addClass('reveal');

  jQuery(window).scroll(function(){
    jQuery(".archive-container.testimony-archive article.testimony").each(function(){
      var x = jQuery(window).scrollTop() + jQuery(window).height();


			if (jQuery(window).width() < 768) {
			  var y = jQuery(this).offset().top + (jQuery(this).height() / 4);
			}
			else {
			  var y = jQuery(this).offset().top + (jQuery(this).height() / 2);
			}

      if (x >= y) {
        jQuery(this).addClass('reveal_visible');
      };
    });
  });




  jQuery(window).scroll(function(){
    jQuery(".single--post .single blockquote").each(function(){
      var x = jQuery(window).scrollTop() + jQuery(window).height();


			if (jQuery(window).width() < 768) {
			  var y = jQuery(this).offset().top + (jQuery(this).height() / 4);
			}
			else {
			  var y = jQuery(this).offset().top + (jQuery(this).height() / 2);
			}

      if (x >= y) {
        jQuery(this).addClass('animate_quote');
      };
    });
  });