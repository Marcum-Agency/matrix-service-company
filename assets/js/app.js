( ( NAMESPACE, _ ) => {
  const PAGE_HEADER_LIST_ITEM_ELEMS = _.getElems('#site-header .nav-menu-item').slice(0, -1);
  const MEGA_MENU_WRAPPER_ELEM = _.viaId('mega-menu-wrapper');
  const SEARCH_TOGGLE_ELEM = document.querySelector('#searchToggle');
  const MOBILE_MENU_BTN = document.querySelector('#trigger-mega-menu');

  // Only add close button if viewport is less than 37.5em (600px)
if (window.matchMedia("(max-width: 48em)").matches) {

    document.addEventListener("click", function(event) {
      const trigger = event.target.closest(".mobile-nav .has-megamenu a, .mobile-nav .has-megamenu span");
      if (!trigger) return;

      if (trigger.classList.contains("has-megamenu")) {
        event.preventDefault();
      }

     
      trigger.parentElement.classList.toggle("activate");
      const subMenu = trigger.parentElement.querySelector(".sub-menu");
      subMenu?.classList.toggle("active");

      // document.body.classList.toggle("locked");

    });

} 

function mobileMenuToggle() {
  const mobileMenu = document.querySelector('#MobileNav');
  const mobileMenuToggleBtn = document.querySelector('#trigger-mega-menu');
  const body = document.body;

  const isClosed = mobileMenu.dataset.mobileMenu === 'closed';

  if (isClosed) {
    // Open mobile menu
    mobileMenu.dataset.mobileMenu = 'open';
    mobileMenu.classList.remove('animated', 'bounceOutUp');
    mobileMenu.classList.add('mobile-menu-is-active');
    body.classList.add('locked');
  } else {
    // Close mobile menu
    mobileMenu.dataset.mobileMenu = 'closed';
    mobileMenu.classList.add('animated', 'bounceOutUp');
    setTimeout(() => {
      mobileMenu.classList.remove('mobile-menu-is-active');
      body.classList.remove('locked');
    }, 500);
  }
}

//Lazy load videos
function lazyVideoLoader() {
  let lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

  if ("IntersectionObserver" in window) {
    let lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(video) {
        if (video.isIntersecting) {
          for (let source in video.target.children) {
            let videoSource = video.target.children[source];
            if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
              videoSource.src = videoSource.dataset.src;
            }
          }

          video.target.load();
          video.target.classList.remove("lazy");
          lazyVideoObserver.unobserve(video.target);
        }
      });
    });

    lazyVideos.forEach(function(lazyVideo) {
      lazyVideoObserver.observe(lazyVideo);
    });
  }
}

function searchToggle() {
  const searchModal = document.querySelector('.search-modal');
  //const searchToggleBtn = document.querySelector('#searchToggle');

  const searchField = document.querySelector('.search-field');
  const closeSearchIcon = document.querySelector('.close-search');
  const searchIcon = document.querySelector('.search-icon');
  const body = document.body;

  const isClosed = SEARCH_TOGGLE_ELEM.dataset.searchToggle === 'closed';

  if (isClosed) {
    // Open search
    SEARCH_TOGGLE_ELEM.dataset.searchToggle = 'open';

    searchModal.classList.remove('animated', 'bounceOutUp');
    searchModal.classList.add('search-is-active');


    setTimeout(() => {
      searchField?.focus();
    }, 500);

  } else {
    // Close search
    SEARCH_TOGGLE_ELEM.dataset.searchToggle = 'closed';

    searchModal.classList.add('animated', 'bounceOutUp');

    setTimeout(() => {
      searchModal.classList.remove('search-is-active');
    }, 500);
  }

  // Icon toggle
  closeSearchIcon?.classList.toggle('hidden');
  searchIcon?.classList.toggle('hidden');

  // Body toggle
  body.classList.toggle('locked');
}




const _initApp = app => {
  Object.defineProperty( app, "name", { value:NAMESPACE } );
  _.w[ NAMESPACE ] = new app();
};

const Block = class Block {
  constructor( blockWrapperElem, blockIdx, blockId ){
    this.id = `${blockId}-${blockIdx + 1}`;
    this.wrapper = blockWrapperElem;
    this.init();
  };
  init(){
    this.wrapper.id = this.id;
  };
  get id(){
    return this._id;
  };
  set id( idValue ){
    this._id = idValue;
  };
  get wrapper(){
    return this._wrapper;
  };
  set wrapper( wrapperElem ){
    this._wrapper = wrapperElem;
  };
};

const HeadlinePlusCtaOverMedia = class HeadlinePlusCtaOverMedia extends Block {

  constructor( ...args ){
    super( args[0], args[1], args[2] );
    super.init();
  };

};

( _initApp )( class {

  constructor(){
    this.init();
  };

  /**
   *  Kick things off for the App
   */
  init(){
    console.log( `init'd ${NAMESPACE} app!` );
    this.yPos = _.w.pageYOffset;
    this.enableEventListeners();
    this.doScrollDetermination();
    this.queueBlocks();
  };

  get blocks(){
    return this._blocks;
  };

  set blocks( blocksVal = new Map() ){
    this._blocks = blocksVal;
  };
  
  get yPos(){
    return this._yPos;
  };
  
  set yPos( yPosValue ){
    this._yPos = yPosValue;
  };

  /**
   *  Method simply instantiates all the page-wide Event Listeners e.g. 'scroll' (where applicable)
   */
  enableEventListeners(){
    _.w.listenTo( 'scroll:30', this.doScrollDetermination.bind( this ) );
    document.addEventListener('facetwp-loaded', function() {if ( ! FWP.loaded ) { fUtil('.facetwp-type-sort select').fSelect( { showSearch: false } );}});
    document.addEventListener("DOMContentLoaded", function() {lazyVideoLoader(); });
    SEARCH_TOGGLE_ELEM.addEventListener( 'click', searchToggle );
    PAGE_HEADER_LIST_ITEM_ELEMS.forEach(
      pageHeaderLink => pageHeaderLink.addEventListener( 'mouseover', this.markActiveMegaMenuIndex.bind(this) )
    );
    MOBILE_MENU_BTN.addEventListener( 'click', mobileMenuToggle );

  };
  
  /**
   *  Mark the site-header if window is scrolled to the threshold
   */
  doScrollDetermination( scrollEvt ){
    const rootElem = _.d.documentElement;
    const CLASS_IS_SCROLLED_DOWN = 'is-scrolled-downward';
    const CLASS_IS_SCROLLED_UP = 'is-scrolled-upward';
    const IS_SCROLLED_DOWN = _.w.pageYOffset >= _.viaId('site-header').offsetHeight;
    const IS_SCROLLED_UPWARD = _.w.pageYOffset < this.yPos;
    if( IS_SCROLLED_DOWN ){
      if( IS_SCROLLED_UPWARD ){
        rootElem.classList.add( CLASS_IS_SCROLLED_UP );
        rootElem.classList.remove( CLASS_IS_SCROLLED_DOWN );
      } else {
        rootElem.classList.add( CLASS_IS_SCROLLED_DOWN );
        rootElem.classList.remove( CLASS_IS_SCROLLED_UP );
      }
    } else {
      rootElem.classList.remove( CLASS_IS_SCROLLED_UP, CLASS_IS_SCROLLED_DOWN );
    }
    this.yPos = _.w.pageYOffset;
  };



  /**
   * Mark the active mega menu index
   */
  markActiveMegaMenuIndex( mouseoverEvt ){
    const pageHeaderListItemElem = mouseoverEvt.currentTarget;

  // If the hovered item doesn't have the mega menu class, hide all mega menu panels
  if (!pageHeaderListItemElem.classList.contains('has-megamenu')) {
    Array.from(MEGA_MENU_WRAPPER_ELEM.children).forEach(
      child => child.classList.remove('is-active')
    );
    return;
  }

    const idx = Array.from( mouseoverEvt.currentTarget.parentElement.children ).findIndex(
      el => el === mouseoverEvt.currentTarget
    );

    Array.from(MEGA_MENU_WRAPPER_ELEM.children).forEach(
      ( megaMenuChildElem, _idx ) => {
        megaMenuChildElem.classList[(_idx === idx ? 'add' : 'remove')]('is-active');
      }
    );
  };

  
  /**
   *  Enqueue custom MSC "Blocks"
   */
  queueBlocks(){
    let blocks = null;
    const map = {
      'headline-plus-cta-over-media': HeadlinePlusCtaOverMedia
    };
    for( const selector in map ){
      const cssSelector = `.block--${selector}`;
      const blockElems = _.getElems( cssSelector );
      const blockId = map[ selector ].name.split('').filter( char => char === char.toUpperCase() ).join('').toLowerCase();
      const blocksArray = [];
      if( !!blockElems.length === false ){
        continue;
      }
      if( blocks === null ){
        blocks = new Map();
      }
      blockElems.forEach(( elem, elemIdx ) => {
        blocksArray.push( new map[ selector ]( elem, elemIdx, blockId ) );
      });
      blocks.set( blockId, blocksArray );
    };
    this.blocks = blocks;
  };

});

})( MAGIC.appName || "App", MRCM || {} );
