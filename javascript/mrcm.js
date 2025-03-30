const _initMrcm = mrcm => {
  Object.defineProperty( mrcm, "name", { value:'MRCM' } );
  window.MRCM = new mrcm();
};





const w = window;
const d = w.document;
const viaId = elemId => new MrcmElem( d.getElementById( elemId ) );
const getElems = function getElems( querySelectorMulti ){
  const parent = this instanceof HTMLElement ? this : d;
  return Array.from(
    parent.querySelectorAll( querySelectorMulti )
  ).map(
    elem => new MrcmElem( elem )
  );
};
const getElem = function getElem( querySelectorSingle ){
  const parent = this instanceof HTMLElement ? this : d;
  return new MrcmElem( parent.querySelector( querySelectorSingle ) );
};
const listenTo = function( evtName, evtListener, evtDelayType = 'throttle' ){
  const that = this;
  const isDelayed = evtName.includes(':');
  const eventName = isDelayed && evtName.split(':').at(0);
  const ms = isDelayed && +evtName.split(':').at(1);
  const onDelay = function onDelay( listener, ms, delayMethod ){
    let timeoutId;
    function debouncedEvt( ...args ){
      clearTimeout( timeoutId );
      timeoutId = setTimeout(
        () => {
          listener.apply( this, args );
        }, ms
      );
    };
    function throttledEvt( ...args ){
      if( !timeoutId ){
        timeoutId = setTimeout(
          () => {
            listener.apply(this, [
              {
                target: args[0].target,
                currentTarget: that
              }
            ]);
            timeoutId = null;
          }, ms
        );
      }
    };
    if( delayMethod === 'throttle' ){
      return throttledEvt;
    } else if( delayMethod === 'debounce' ){
      return debouncedEvt;
    }
  };
  if( isDelayed ){
    return this.addEventListener(eventName, onDelay( evtListener, ms, evtDelayType ) );
  } else {
    return this.addEventListener(evtName, evtListener);
  }
};
[ window, document ].forEach( entity => entity.listenTo = listenTo.bind( entity ) );





const doMrcmElemClassList = mrcmElem => {
  const elem = mrcmElem;
  const MrcmElemClassList = class MrcmElemClassList {
    constructor(){};
    add( ...classNames ){
      classNames.forEach( className =>
        elem.classList.add( className )
      );
    };
    remove( ...classNames ){
      classNames.forEach( className =>
        elem.classList.remove( className )
      );
    };
    contains( className ){
      return elem.classList.contains( className );
    };
    toggle( className ){
      if( elem.classList.contains( className ) ){
        elem.classList.remove( className );
      } else {
        elem.classList.add( className );
      }
    };
    replace( oldClassName, newClassName ){
      if( elem.classList.contains( oldClassName ) ){
        elem.classList.replace( oldClassName, newClassName );
      }
    };
  };
  return new MrcmElemClassList();
};





const MrcmElem = class MrcmElem {

  constructor( nativeElem ){
    if( !nativeElem ) return null;
    this.elem = nativeElem;
    this.classList = doMrcmElemClassList( this.elem );
    this.children = Array.from( this.elem.children ).map( elem => new MrcmElem( elem ) );
  };

  getElem( selector ){
    return getElem.call( this.elem, selector );
  };

  getElems( selector ){
    return getElems.call( this.elem, selector );
  };

  getAttribute( attributeKey ){
    return this.elem[ attributeKey ];
  }

  setAttribute( attributeKey, attributeValue ){
    this.elem.setAttribute( attributeKey, attributeValue );
  };

  setProperty( cssVariableProperty, cssVariableValue ){
    this.elem.style.setProperty( cssVariableProperty, cssVariableValue );
  };

  removeProperty( cssVariableProperty ){
    this.elem.style.removeProperty( cssVariableProperty );
  };

  addEventListener( evtName, evtListener, config = {
    capture: false,
    once: false
  }){
    return this.elem.addEventListener( evtName, evtListener, config );
  };

  listenTo( ...args ){
    return listenTo.apply( this.elem, [ args[0], args[1], args[2] ] );
  };

  get elem(){
    return this._elem;
  };

  set elem( elemValue ){
    this._elem = elemValue;
  };

  get children(){
    return this._children;
  };

  set children( childrenValue ){
    this._children = childrenValue;
  };

  get classList(){
    return this._classList;
  };

  set classList( classListValue ){
    this._classList = classListValue;
  };

  get id(){
    return this.elem.id;
  };

  set id( idValue ){
    this.elem.id = idValue;
  };

  get offsetHeight(){
    return this.elem.offsetHeight;
  }

};





const Lightbox = class Lightbox {

  static className = {
    hidden: 'is-hidden'
  };
  static idString = {
    closeBtnElem : 'lightbox-close-btn'
  };

  constructor( lightboxElemId ){
    this._elem = viaId( lightboxElemId );
    this._closeBtnElem = viaId( Lightbox.idString.closeBtnElem );
    this.init();
  };

  get elem(){ return this._elem; };
  get closeBtnElem(){ return this._closeBtnElem; };
  get isLocked(){ return this._isLocked; };
  set isLocked( isLockedValue ){ this._isLocked = isLockedValue };

  /**
   *  Kick things off for the Lightbox component
   */
  init(){
    this.closeBtnElem.addEventListener( 'click', evt => !this.isLocked && this.hide() );
    d.addEventListener( 'keydown', this.handleUiEvt.bind( this ) );
  };

  /**
   *  @description Method handles keyboard events fired if lightbox
   *    component is open/visible
   */
  handleUiEvt( evt ){
    const _isInvalid = typeof evt === 'undefined' || !this.elem.open;
    const _isEscapeKey = evt?.key.toLowerCase() === 'escape';
    if( _isInvalid || !_isEscapeKey ) return;
    evt.preventDefault();
    evt.stopPropagation();
    if( _isEscapeKey && !this.isLocked ){
      this.hide();
    }
  };

  /**
   *  @description Shows/reveals lightbox component
   *  @param {boolean} [isLocked=false] - If true, removes ability for
   *    dialog to be closed by escape key or 'close' icon click
   */
  show( isLocked = false ){
    this.isLocked = isLocked;
    if( isLocked ){
      this.closeBtnElem.classList.add( Lightbox.className.hidden );
    }
    this.elem.showModal();
  };

  /**
   *  @description Method hides the lightbox component and resets
   *    config settings to default
   */
  hide(){
    this.closeBtnElem.classList.remove( Lightbox.className.hidden );
    this.elem.close();
    this.isLocked = false;
  };

};





( _initMrcm )( class {

  /**
   *  If visitor's using an outdated browser by intention, allow access
   */
  #checkForOutdatedBrowser(){
    if( this.getCookie('outdated-browser--disregard') === 'true' ){
      this.d.getElementById('check-browser').style.display = 'none';
    }
  };

  constructor(){
    this._w = w;
    this._d = w.document;
    this._Lightbox = new Lightbox( 'lightbox' );
    this.init();
  };

  get w(){ return this._w; };
  get d(){ return this._d; };
  get Lightbox(){ return this._Lightbox };

  /**
   *  Kick things off for the MRCM Utility
   */
  init(){
    console.log( `init'd MRCM utility!` );
    this.#checkForOutdatedBrowser();
  };

  /**
   *  @description Method grabs the document's current cookies and
   *    if a 'key' is passed, returns that specific cookie
   *  @param {string} cookieName - Name of cookie you want returned
   *  @returns {string}
   */
  getCookie( cookieName ){
    if( typeof cookieName === 'undefined' ) return '';
    const _allCookies = this.d.cookie;
    return _allCookies.split(';')
      .map(
        cookiePair => {
          const [ cName, cValue ] = cookiePair.split('=');
          return {
            name: cName,
            value: cValue
          };
        }
      )
      .find(
        ({ name: _cookieName }) => _cookieName === cookieName
      )?.value || ''
    ;
  };

  /**
   *  @description Method saves a cookie w/supplied name and value
   *  @param {string} cookieName - Name of the cookie to save
   *  @param {string} cookieValue - Value of the cookie to be saved
   */
  setCookie( cookieName, cookieValue ){
    if( typeof cookieName === 'undefined' || typeof cookieValue === 'undefined' ){
      throw new TypeError( 'Both \'cookieName\' and \'cookieValue\' parameters are required' )
    }
    this.d.cookie = `${cookieName}=${cookieValue}`;
  };

  /**
   *  @description Alias for `document.getElementById(' elementId' )`
   */
  viaId = viaId;

  /**
   *   @description Alias for `document.querySelectorAll( 'CSS-selector-string' )`
   */
  getElems = getElems;

  /**
   *   @description Alias for `document.querySelector( 'CSS-selector-string' )`
   */
  getElem = getElem;

});





