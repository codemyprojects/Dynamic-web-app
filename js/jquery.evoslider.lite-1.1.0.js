/**
 * Evo Slider Lite v1.1.0 - jQuery slideshow and content slider plugin
 * http://evoslider.com
 * 
 * Copyright 2012, Fikri Rakala
 *
 * Free to use and abuse under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php 
 * 
 * Support us by purchasing the Pro version
 * Date: 11 April 2012
 */ 
(function( $, window, document, undefined ) {    
/**
 * EvoSlider Constructor
 *
 * @class EvoSlider
 * @constructor
 * @param {Object} element
 * @param {Options} options
 * @return instance
 */    
var EvoSlider = function ( element, options ) {
    this._options = options ;
    this._frame = $( element );
    this._slideContainer = this._frame.children("dl");
    this._titles = this._slideContainer.children("dt");
    this._slides = this._slideContainer.children("dd");
    
    this._current = 0;
    this._beforeCurrent;
    this._length = this._titles.length;
    this._isAnimationRunning = false; 
    
    this._frameInnerWidth = 0;
    this._frameInnerHeight = 0;
    
    this._titleWidth = 0;
    this._titleHeight = 0;
    
    this._slideWidth = 0;
    this._slideHeight = 0;
    this._slideSpace = 0;
    
    this._slideWrapper;
    
    this._toggleIcons;
    
    this._arrowNext;
    this._arrowPrev;
    
    this._controlNav;
    this._controlWrapper;
    this._controlWrapWidth;
    this._controlWrapHeight;
    this._controlUl;
    this._controlItems;
       
    this._isPlaying = false ;
    this._isPaused = false;
    
    this._isHover = false; 
        
    this.init();
    return this;
};

/**
 * EvoSlider prototype.
 */
EvoSlider.prototype = {
    
    /**
     * Validate options value
     *
     * @method _validateOptions
     * @return instance
     */
    _validateOptions: function() {
        var o = this._options, 
            i;
                
        
        if ( o.width <= 0 ) {
            o.width = 960;
        }
        
        if ( o.height <= 0 ) {
            o.height = 360;
        }
        
        if ( o.paddingRight < 0 ) {
            o.paddingRight = 0;
        }
        
        if ( o.speed <= 0 ) {
            o.speed = 500;
        }
                
        if ( o.interval <= o.speed ) {
            o.interval = 5000;
        }      
        
        if ( o.mode === "accordion" ) {
            o.directionNav = false;
            o.controlNav = false ;
        }
        
        return this;       
    },
    
    /**
     * Returns the width of an element
     *
     * @method _getWidth
     * @param {Number} width
     * @param {DOM} element
     * @param {Boolean} includeMargin
     */
    _getWidth: function( width, element, includeMargin ) {
        return width - ( element.outerWidth( includeMargin ) - element.width() );
    },
    
    /**
     * Returns the width of an element
     *
     * @method _getWidth
     * @param {Number} width
     * @param {DOM} element
     * @param {Boolean} includeMargin
     */
    _getHeight: function( height, element, includeMargin ) {
        return height - ( element.outerHeight( includeMargin ) - element.height() );
    },     
    
    /**
     * Creates frame
     *
     * @method _createFrame
     * @return instance
     */
    _resizeFrame: function( width, height ) {
        var evo = this;
                
        this._frameInnerWidth = evo._getWidth( width, this._frame, false);
        this._frameInnerHeight = evo._getHeight( height, this._frame, false );
        
        this._frame.css({"width": evo._frameInnerWidth + "px", "height": evo._frameInnerHeight + "px"}); 
        return this;                    
    },
    
    /**
     * Rotates html element using CSS Transform and IE's Filter
     *
     * @method _rotateElement
     * @param {Object} element HTML element
     * @param {Number} length The length of elements
     * @param {Number} height Height of an html element
     * @param {String} degree Degree of rotation (ie. 10deg)
     * @param {String} origin The origin of transform
     * @param {Number} ierotation Filter rotation value
     * @return instance
     */
    _rotateElement: function( element, length, height, degree, origin, ierotation ) {
        element.css({"-moz-transform": "rotate(" + degree + ") translate(" + height + "px, 0px)", "-moz-transform-origin": origin, 
            "-webkit-transform": "rotate(" + degree + ") translate(" + height + "px, 0px)", "-webkit-transform-origin": origin, 
            "-o-transform": "rotate(" + degree + ") translate(" + height + "px, 0px)", "-o-transform-origin": origin,
            "transform": "rotate(" + degree + ") translate(" + height + "px, 0px)", "transform-origin": origin, 
            "filter": "progid:DXImageTransform.Microsoft.BasicImage(rotation=" + ierotation + ")",
            "-ms-filter": "progid:DXImageTransform.Microsoft.BasicImage(rotation=" + ierotation + ")"});                    
                
        return this;    
    },
    
    /**
     * Retrieves the title bar position
     *
     * @method _getTitlePos
     * @param {Number} index Slide index
     * @param {Number} current Current index
     * @return {Number} Left position of slide
     */
    _getTitlePos: function( index, current ) {
        var titlePos = index * this._titleHeight;              
        return index <= current ? titlePos : ( titlePos + this._slideWidth + this._slideSpace ); 
    },
    
    /**
     * Retrieves the slide position
     *
     * @method _getSlidePos
     * @param {Number} index Slide Index
     * @param {Number} current Current index
     * @return {Number} Slide left position
     */
    _getSlidePos: function( index, current ) {
        var pos = 0;
        
        if ( this._options.mode === "accordion" ) {
            var slidePos = this._getTitlePos( index, current ) + this._titleHeight;
                        
            if ( index !== current ) {
                pos = index > 0 ? slidePos : this._titleHeight;
            } else {                
                pos = slidePos;
            }
        } else if ( this._options.mode === "scroller" ) {
            pos = ( index * this._slideWidth ) - ( current * this._slideWidth );
        }         
        
        return pos;
    }, 
    
    /*
     * Creates slider
     *
     * @method _createSlider
     * @return instance
     */
    _createSlider: function() {
        var evo = this,
            i, left,
            padLeft = 0, padRight = 0;
                    
        this._slideSpace = this._options.slideSpace;        
        this._slideHeight = this._frameInnerHeight ;
                
        if ( this._options.mode === "accordion" ) {    
            this._titleHeight = this._titles.height();          
            
            this._setAccordionActiveState( this._current );                
                        
            // fix ie       
            if ( $.browser.msie ) {
                if ( $.browser.version != 7 ) {
                    this._titles.append('<div class="ieFix" style="width:' + evo._titleHeight + 'px; height:' + evo._slideHeight + 'px;"><div class="box"></div></div>');                
                }
            }                                 
            
            this._titleWidth = this._frameInnerHeight ;
            this._slideWidth = this._frameInnerWidth - ( evo._length * this._titleHeight ) - this._slideSpace;
            
            // title padding           
            padLeft = parseInt( this._titles.css("paddingLeft"), 10 );
            padRight = parseInt( this._titles.css("paddingRight"), 10 ); 
                   
            if ( $.browser.msie ) {
                this._titles.find(".ieFix").css({"height": evo._slideHeight + "px"});                
            }
            
            // rotate title bars
            this._rotateElement( evo._titles, evo._length, -evo._titleWidth, "-90deg", "left top", 3 );                    
                       
            // build title bars
            for ( i = 0; i < this._length; i += 1 ){   
                this._titles.eq( i )
                    .bind("click.es", {evo: evo, index: i}, evo._titleClickHandler)
                    .css({"left": evo._getTitlePos(i, evo._current) + "px", "width": (evo._titleWidth - (padLeft + padRight)) + "px", 
                        "paddingLeft": padLeft + "px", "paddingRight": padRight + "px"});               
            }          
        } else {
            this._titles.hide();
            this._slideSpace = 0;
            this._slideWidth = this._frameInnerWidth ;           
            
            if ( this._options.directionNav ) {
                this._createDirectionNav() ;
            }
            
            if ( this._options.controlNav ) {
                this._createControlNav();
            }
        }    
        
        for ( i = 0; i < this._length; i += 1 ) {   
            this._slides.eq( i ).css({"left": ( this._options.mode === "slider" ? 0 : ( this._getSlidePos( i, this._current ) ) ) + "px", "width": evo._slideWidth + "px", "height": evo._slideHeight + "px"});
        }
        
        this._slideContainer.css({"width": ( evo._options.mode === "accordion" ? evo._frameInnerWidth : evo._slideWidth ) + "px", 
            "height": ( evo._options.mode === "accordion" ? evo._frameInnerHeight : evo._slideHeight ) + "px"});
                           
        return this;           
    },
    
    /**
     * Sets the title bar active state
     *
     * @method _setAccordionActiveState
     * @param {Number} index
     * @return instance
     */
    _setAccordionActiveState: function( index ) {
        this._titles.removeClass("active").eq( index ).addClass("active");
        return this;      
    },
    
    /**
     * Runs animation
     *
     * @method _animateSlider
     * @param {Number} index The slide index
     * @param {Object} options EvoSlider options
     * @param {Function} callback Callback function
     * @return instance
     */
    _animateSlider: function( index, callback ) {
        var evo = this,
            i;
        
        if ( !$.isFunction(callback) ) {
            callback = false ;
        }      
        
        if ( this._options.mode === "accordion" || this._options.mode === "scroller" ) {        
            for ( i = 0; i < this._length; i += 1 ){
                if ( this._options.mode === "accordion" ) {
                     this._titles.eq( i ).animate({"left": evo._getTitlePos( i, index ) + "px"}, evo._options.speed, evo._options.easing ); 
                }
                                
                if ( i !== index ) {   
                    this._slides.eq( i ).animate({"left": evo._getSlidePos( i, index ) + "px"}, evo._options.speed, evo._options.easing);                    
                } else {
                    this._slides.eq( i ).animate({"left": evo._getSlidePos( i, index ) + "px"}, evo._options.speed, evo._options.easing, function(){
                        if ( callback ) {
                            callback();
                        }                                             
                    });
                }  
            }       
        } else if ( this._options.mode === "slider" ) {    
            this._slides
                .fadeOut( evo._options.speed )
                .eq( index ).fadeIn( evo._options.speed, evo._options.easing, function(){
                    if ( callback ) {
                        callback();
                    }
                } );           
        } 
        
        return this;        
    }, 
    
    /**
     * Creates directional navigation (prev/next arrow)
     *
     * @method _createDirectionNav
     * @return instance
     */
    _createDirectionNav: function() {
        var evo = this;
                
        this._arrowPrev = $('<div class="arrow_prev"></div>')
            .bind("click.es", {evo: evo}, evo._prevHandler).appendTo( this._frame );
            
        this._arrowNext = $('<div class="arrow_next"></div>')
            .bind("click.es", {evo: evo}, evo._nextHandler).appendTo( this._frame );
        
        if ( this._options.directionNavAutoHide ) {
            this._arrowNext.hide();
            this._arrowPrev.hide();
        }
        
        return this;
    },
    
    /**
     * next event handler
     *
     * @method _nextHandler
     * @param {Event Object} e
     */
    _nextHandler: function( e ) {
        e.data.evo._stopSlideshow().next();
    },
    
    /**
     * prev event handler
     *
     * @method _prevHandler
     * @param {Event Object} e
     */
    _prevHandler: function( e ) {
        e.data.evo._stopSlideshow().prev();
    },
    
    /**
     * Creates control navigation (bullets, thumbnails, rotator)
     *
     * @method _createControlNav
     * @return instance
     */    
    _createControlNav: function() {
        var evo = this,
            i, ul, w, h, controlNavWidth, index;
        
        // create inside control    
        this._frame.append('<div class="controlNav"><div class="control_wrapper"><ul></ul></div></div>');
        
        this._controlNav = this._frame.children(".controlNav");
        this._controlWrapper = this._controlNav.find(".control_wrapper");
        this._controlUl = this._controlNav.find("ul");
        
        for ( i = 0; i < this._length; i += 1 ) {                    
            $('<li class="bullets"></li>')
                .bind("click.es", {evo: evo, index: i}, evo._titleClickHandler)
                .appendTo( this._controlUl );
        }       
        
        this._controlItems = this._controlUl.find("li");
        this._controlItems.eq( this._length - 1 ).addClass("last");
        
        this._setControlActiveState( this._current );
        
        h = this._controlItems.outerHeight( true );
        
        w = 0;
        for ( i = 0; i < this._length; i += 1 ) {
            w += this._controlItems.eq( i ).outerWidth( true );
        }
                
        this._controlUl.css({"width": w + "px", "height": h + "px"});     
                
        if ( this._options.controlNavAutoHide ) {
            this._controlNav.hide();
        }
        
        return this;                    
    },
    
    /**
     * Title bar's click event handler
     *
     * @method _titleClickHandler
     * @param {Event Object} e
     */
    _titleClickHandler: function( e ) {            
        e.data.evo._stopSlideshow().show( e.data.index );
    },
    
    /**
     * Stops slideshow on user interaction
     *
     * @method _stopSlideshow
     * @return instance
     */
    _stopSlideshow: function() {             
        if ( this._isPlaying && this._options.pauseOnClick ) {
            this._pause( false );
        }
        
        return this;
    },
	    
    /**
     * Sets control navigation active state
     *
     * @method _setControlActiveState
     * @param {Number} index
     * @return instance
     */
    _setControlActiveState: function( index ) {        
        this._controlItems
            .removeClass("active")
            .eq( index ).addClass("active");
        
        return this;
    },	
    
    /**
     * Playing slideshow
     *
     * @method _play
     * @param {Number} interval Autoplay interval
     * @return instance
     */
    _play: function( interval ) {
        var evo = this;
        
        if ( !this._isPlaying ) {               
            this._isPlaying = true ;
        }
        
        this._isPaused = false ;        
                    
        autoplay = setInterval(function(){                
            evo.next();
            
            if ( !evo._options.loop && evo._current === evo._length - 1 ){
                evo._pause(false);
                return ;
            }            
        }, interval);
                
        return this;
    },
    
    /**
     * Pause slideshow for a moment (ie. when animation running)
     * 
     * @method _pause
     * @param {Boolean} isHover 
     * @return instance
     */
    _pause: function( isHover ) {
        clearInterval( autoplay );
        
        if ( !isHover ) {
            this._isPlaying = false ;
            this._isPaused = false ;
        }
        
        return this;
    },        
    
    /**
     * Initialize events
     *
     * @method _initEvents
     * @return instance
     */
    _initEvents: function() {
        var evo = this,
            i;
            
        //mousewheel
        if ( this._options.mouse ) {        
            this._slides
                .bind("mousewheel.es", {elem: evo}, evo._mouseScrollSlide)
                .bind("DOMMouseScroll.es", {elem: evo}, evo._mouseScrollSlide);
        }
        
        // keyboard navigation        
        if ( this._options.keyboard ) {
            $( document ).bind("keydown.es", function( e ) {
                if ( e.keyCode === 39 ) {                    
                    evo._stopSlideshow().next();
                    return false ;
                } else if ( e.keyCode === 37 ) { 
                    evo._stopSlideshow().prev();
                    return false ;
                }
            });
        }
                
        // frame mouseenter
        this._frame.bind("mouseenter.es", function(){
            evo._isHover = true;
            
            if ( evo._options.directionNav && evo._options.directionNavAutoHide ) {
                evo._arrowNext.stop( true, true ).fadeIn();
                evo._arrowPrev.stop( true, true ).fadeIn();
            }
            
            if ( evo._options.controlNav && evo._options.controlNavAutoHide ) {
                if ( evo._options.controlNavPosition === "inside" ) {
                    evo._controlNav.stop( true, true ).fadeIn();
                }
            }
            
            if ( evo._isPlaying && evo._options.pauseOnHover ) {
                evo._isPaused = true;
                evo._pause( true );
            }
        });      
        
        // frame mouseleave
        this._frame.bind("mouseleave.es", function(){
            if ( evo._options.directionNav && evo._options.directionNavAutoHide ) {
                evo._arrowNext.stop( true, true ).fadeOut();
                evo._arrowPrev.stop( true, true ).fadeOut();
            }
            
            if ( evo._options.controlNav && evo._options.controlNavAutoHide ) {
                if ( evo._options.controlNavPosition === "inside" ) {
                    evo._controlNav.stop( true, true ).fadeOut();
                }
            }
            
            if ( evo._isPlaying && evo._options.pauseOnHover ) {
                if ( evo._isPaused ) {
                    evo._play( evo._options.interval );
                }
            }
                        
            evo._isHover = false;
        });
        
		return this;      
    },
    
    /**
     * Mousewheel scroll event handler
     *
     * @method _mouseScrollSlide
     * @param {Object} e
     * @return {Boolean} false
     */
    _mouseScrollSlide: function( e ) {
        var evo = e.data.elem,
            delta = ( typeof e.originalEvent.wheelDelta === "undefined" ) ?  -e.originalEvent.detail : e.originalEvent.wheelDelta;
		       
        delta > 0 ? evo.prev() : evo.next();
        evo._stopSlideshow();
		return false;
    },
    
    /**
     * Build EvoSlider
     *
     * @method init
     */
    init: function() {
        var index;
        
        this._validateOptions()
            ._resizeFrame( this._options.width, this._options.height )
            ._initEvents()
            ._createSlider();
                
        if ( this._options.mode === "slider" ) {
            this._slides
                .hide()
                .eq( this._current ).show();
        }    
        
        if ( this._options.autoplay ) {
            this._play( this._options.interval );
        }                                   
    },
    
    /**
     * Shows the current slide (public API)
     * 
     * @method show
     * @param {Number} index The index of slide
     * @return instance
     */
    show: function( index ) {
        var evo = this;
        
        if ( index === this._current ) {
            return ;
        }
        
        if ( this._isAnimationRunning ) { 
            return ;
        }
       
        this._beforeCurrent = this._current;                   
                
        this._current = index ;
        this._isAnimationRunning = true ;
        
        if ( this._options.mode === "accordion" ) {
            this._setAccordionActiveState( index );
        }                
                
        this._animateSlider( index, function(){
            evo._isAnimationRunning = false ;
        });
        
        if ( this._options.controlNav ) {
            this._setControlActiveState( index );
        }
        
        return this;
    },
    
    /**
     * Gets the next index (public API)
     *
     * @method getNext
     * @return Number
     */
    getNext: function() {
        var base = this._current;             
        return base === ( this._length - 1 ) ? 0 : ( base + 1 ); 
    },
    
    /**
     * Gets the previous index (public API)
     * 
     * @method getPrev
     * @return Number
     */
    getPrev: function() {
        var base = this._current;
        return base === 0 ? ( this._length - 1 ) : ( base - 1 );
    },
    
    /**
     * Shows the next slide (public API)
     *
     * @method next
     * @return instance
     */
    next: function() {
        if ( !this._options.loop ) {
            if ( this._current === this._length - 1 ) {
                return this;
            }
        }
        
        this.show( this.getNext() );
        return this;
    },
    
    /**
     * Shows the previous slide (public API)
     *
     * @method prev
     * @return instance
     */
    prev: function() {
        if ( !this._options.loop) {
            if ( this._current === 0 ) {
                return this;
            }
        } 
        
        this.show( this.getPrev() );
        return this;
    }     
};
 
// End of EvoSlider prototype

/**
 * jQuery plugin initializer
 */
$.fn.evoSlider = function( options ) {
    options = $.extend({}, $.fn.evoSlider.options, options);
        
    return this.each(function(key, value){
        var element = $(this);
        // Return early if this element already has a plugin instance
        if (element.data('evoslider')) return element.data('evoslider');
        // Pass options to plugin constructor
        var evoslider = new EvoSlider(this, options);
        // Store plugin object in this element's data
        element.data('evoslider', evoslider);
    });
};

// end plugin initializer.

/**
 * Plugin default parameters
 */
$.fn.evoSlider.options = {
    mode: "accordion",                  // Sets slider mode ("accordion", "slider", or "scroller")
    width: 960,                         // The width of slider
    height: 360,                        // The height of slider
    slideSpace: 5,                      // The space between slides
    
    mouse: true,                        // Enables mousewheel scroll navigation
    keyboard: true,                     // Enables keyboard navigation (left and right arrows)
    speed: 500,                         // Slide transition speed in ms. (1s = 1000ms)
    easing: "swing",                    // Defines the easing effect mode
    loop: true,                         // Rotate slideshow
    
    autoplay: true,                     // Sets EvoSlider to play slideshow when initialized
    interval: 5000,                     // Slideshow interval time in ms
    pauseOnHover: true,                 // Pause slideshow if mouse over the slide
    pauseOnClick: true,                 // Stop slideshow if playing
        
    directionNav: true,                 // Shows directional navigation when initialized
    directionNavAutoHide: false,        // Shows directional navigation on hover and hide it when mouseout
    
    controlNav: true,                   // Enables control navigation
    controlNavAutoHide: false           // Shows control navigation on mouseover and hide it when mouseout  
};
// end plugin parameters
 
})( jQuery, window, document );