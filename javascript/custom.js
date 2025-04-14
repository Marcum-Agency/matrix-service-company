jQuery(document).on("click", ".header--site .nav-menu-item .arrow" , function() {
	jQuery(this).parent().toggleClass('activate');
	jQuery(this).next('.sub-menu').toggleClass('active');
	jQuery('html').toggleClass('locked');
});




/*jQuery('.accordion h3').click(function(e) {
    jQuery(this).parent('.accordion_group').siblings().find('.accordion-panel').hide();
    jQuery(this).next('.accordion-panel').slideToggle();
});*/

/*
jQuery(document).ready(function () {
  jQuery(".accordion h3").click(function () {
    jQuery(this)
      .toggleClass("active")
      .next(".accordion_group")
      .slideToggle()
      .parent()
      .siblings()
      .find(".accordion_group")
      .slideUp()
      .prev()
      .removeClass("active");
  });
});
*/




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
if(jQuery( window ).width() > 1023){

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



/*scroll to reveal*/
/*
var rafId = null;
var delay = 200;
var lTime = 0;

function scroll() {
  var scrollTop = jQuery(window).scrollTop();
  var height = jQuery(window).height()
  var visibleTop = scrollTop + height;
  jQuery('.reveal').each(function() {
    var $t = jQuery(this);
    if ($t.hasClass('reveal_visible')) { return; }
    var top = $t.offset().top;
    if (top <= visibleTop) {
      if (top + $t.height() < scrollTop) {
        $t.removeClass('reveal_pending').addClass('reveal_visible');
      } else {
        $t.addClass('reveal_pending');
        if (!rafId) requestAnimationFrame(reveal);  
      }
    }
  });
}
function reveal() {
  rafId = null;
  var now = performance.now();
  
  if (now - lTime > delay) {
    lTime = now;
    var $ts = jQuery('.reveal_pending');
    jQuery($ts.get(0)).removeClass('reveal_pending').addClass('reveal_visible');  
  }
  
  
  if (jQuery('.reveal_pending').length >= 1) rafId = requestAnimationFrame(reveal);
}

jQuery(scroll);
jQuery(window).scroll(scroll);
jQuery(window).click(function() {
  jQuery('.reveal').removeClass('reveal_visible').removeClass('reveal_pending');
  lTime = performance.now() + 500;
  var top = jQuery(window).scrollTop();
  jQuery(window).scrollTop(top === 0 ? 1 : top-1);
});
*/


jQuery(document).ready(function(){
  jQuery(window).scroll(function(){
    jQuery(".reveal").each(function(){
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




/*prlx*/
/*
if(jQuery( window ).width() > 1023){
var controller = new ScrollMagic.Controller();
jQuery(".image-slots__slot").each(function() {
   var tlImg = new TimelineMax().from(jQuery(this).find("img"), 1, {
      yPercent: -30,
      transformOrigin: "top right",
      ease: Linear.easeNone
   });
   var sceneimg = new ScrollMagic.Scene({
      triggerElement: this,
      duration: 2000,
      triggerHook: 1
   })
      .setTween(tlImg)
      .addTo(controller);
});


("use strict");
var SmoothScroll = (function() {
   function e(e) {
      var t = this;
      (this._onResize = function(e) {
         t.resizeRequest++,
            t.requestId || (t.requestId = requestAnimationFrame(t._update));
      }),
         (this._onScroll = function(e) {
            t.scrollRequest++,
               t.requestId || (t.requestId = requestAnimationFrame(t._update));
         }),
         (this._update = function() {
            var e = t.resizeRequest > 0,
               s = window.pageYOffset;
            if (e) {
               var r = t.target.clientHeight;
               (document.body.style.height = r + "px"),
                  (t.scrollHeight = r),
                  (t.viewHeight = window.innerHeight),
                  (t.halfViewHeight = t.viewHeight / 2),
                  (t.maxDistance = 2 * t.viewHeight),
                  (t.resizeRequest = 0);
            }
            (t.endScroll = s),
               (t.currentScroll += (s - t.currentScroll) * t.scrollEase),
               (Math.abs(s - t.currentScroll) < t.endThreshold || e) &&
                  ((t.currentScroll = s), (t.scrollRequest = 0));
            var i = t.currentScroll + t.halfViewHeight;
            t.target.style.transform =
               "translate3d(0px,-" + t.currentScroll + "px,0px)";
            for (var l = 0; l < t.scrollItems.length; l++) {
               var n = t.scrollItems[l],
                  a = i - n.top,
                  o = a / t.maxDistance;
               (n.endOffset = Math.round(t.maxOffset * n.depthRatio * o)),
                  Math.abs(n.endOffset - n.currentOffset < t.endThreshold)
                     ? (n.currentOffset = n.endOffset)
                     : (n.currentOffset +=
                          (n.endOffset - n.currentOffset) * t.scrollEase),
                  (n.target.style.transform =
                     "translate3d(0px,-" + n.currentOffset + "px,0px)");
            }
            t.requestId =
               t.scrollRequest > 0 ? requestAnimationFrame(t._update) : null;
         }),
         (this.target = e.target),
         (this.scrollEase = null != e.scrollEase ? e.scrollEase : 0.1),
         (this.maxOffset = null != e.maxOffset ? e.maxOffset : 500),
         (this.endThreshold = 0.05),
         (this.requestId = null),
         (this.maxDepth = 10),
         (this.viewHeight = 0),
         (this.halfViewHeight = 0),
         (this.maxDistance = 0),
         (this.scrollHeight = 0),
         (this.endScroll = 0),
         (this.currentScroll = 0),
         (this.resizeRequest = 1),
         (this.scrollRequest = 0),
         (this.scrollItems = []),
         this.addItems(),
         window.addEventListener("resize", this._onResize),
         window.addEventListener("scroll", this._onScroll),
         this._update();
   }
   return (
      (e.prototype.addItems = function() {
         this.scrollItems = [];
         for (
            var e = document.querySelectorAll("*[data-depth]"), t = 0;
            t < e.length;
            t++
         ) {
            var s = e[t],
               r = +s.getAttribute("data-depth"),
               i = s.getBoundingClientRect(),
               l = {
                  target: s,
                  depth: r,
                  top: i.top + window.pageYOffset,
                  depthRatio: r / this.maxDepth,
                  currentOffset: 0,
                  endOffset: 0
               };
            this.scrollItems.push(l);
         }
         return this;
      }),
      e
   );
})();

var scroller = new SmoothScroll({
   target: document.querySelector(".image-slots__slot picture"), // element container to scroll
   scrollEase: 0.08, // scroll speed
   maxOffset: 1000
});
}
*/



/*jQuery('.split-content .overflow-area+.js-expand').click(function(e) {

	jQuery('html, body').animate({
		scrollTop: jQuery(this).parents('section.split-content').offset().top - 20
	}, 500); 
    
});*/



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




