( ( NAMESPACE, _ ) => {

  document.addEventListener("click", function(event) {
    if (event.target.closest(".has-megamenu .arrow")) {
        document.querySelector(".mega-menu-wrapper")?.classList.add("active");
        document.documentElement.classList.add("locked");
    }
});

// Only add close button if viewport is less than 37.5em (600px)
if (window.matchMedia("(max-width: 37.5em)").matches) {
    document.querySelectorAll(".mega-menu-wrapper .mega-menu").forEach(menu => {
        let closeButton = document.createElement("span");
        closeButton.className = "m-menu-close";
        closeButton.textContent = "x";
        menu.parentNode.insertBefore(closeButton, menu);
    });
}

document.addEventListener("click", function(event) {
    if (event.target.classList.contains("m-menu-close")) {
        document.querySelector(".mega-menu-wrapper")?.classList.remove("active");
        document.documentElement.classList.remove("locked");
    }
});



const PAGE_HEADER_LIST_ITEM_ELEMS = _.getElems('#site-header .nav-menu-item').slice(0, -1);
const MEGA_MENU_WRAPPER_ELEM = _.viaId('mega-menu-wrapper');
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
    PAGE_HEADER_LIST_ITEM_ELEMS.forEach(
      pageHeaderLink => pageHeaderLink.addEventListener( 'mouseover', this.markActiveMegaMenuIndex.bind(this) )
    );
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
   *
   */
  markActiveMegaMenuIndex( mouseoverEvt ){
    const pageHeaderListItemElem = mouseoverEvt.currentTarget;
    const idx = Array.from( mouseoverEvt.currentTarget.parentElement.children ).findIndex(
      el => el === mouseoverEvt.currentTarget
    );
    MEGA_MENU_WRAPPER_ELEM.children.forEach(
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