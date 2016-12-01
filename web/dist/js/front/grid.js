/*
* debouncedresize: special jQuery event that happens once after a window resize
*
* latest version and complete README available on Github:
* https://github.com/louisremi/jquery-smartresize/blob/master/jquery.debouncedresize.js
*
* Copyright 2011 @louis_remi
* Licensed under the MIT license.
*/
var $event = $.event,
$special,
resizeTimeout;

$special = $event.special.debouncedresize = {
	setup: function() {
		$( this ).on( "resize", $special.handler );
	},
	teardown: function() {
		$( this ).off( "resize", $special.handler );
	},
	handler: function( event, execAsap ) {
		// Save the context
		var context = this,
			args = arguments,
			dispatch = function() {
				// set correct event type
				event.type = "debouncedresize";
				$event.dispatch.apply( context, args );
			};

		if ( resizeTimeout ) {
			clearTimeout( resizeTimeout );
		}

		execAsap ?
			dispatch() :
			resizeTimeout = setTimeout( dispatch, $special.threshold );
	},
	threshold: 250
};

// ======================= imagesLoaded Plugin ===============================
// https://github.com/desandro/imagesloaded

// $('#my-container').imagesLoaded(myFunction)
// execute a callback when all images have loaded.
// needed because .load() doesn't work on cached images

// callback function gets image collection as argument
//  this is the container

// original: MIT license. Paul Irish. 2010.
// contributors: Oren Solomianik, David DeSandro, Yiannis Chatzikonstantinou

// blank image data-uri bypasses webkit log warning (thx doug jones)
var BLANK = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';

$.fn.imagesLoaded = function( callback ) {
	var $this = this,
		deferred = $.isFunction($.Deferred) ? $.Deferred() : 0,
		hasNotify = $.isFunction(deferred.notify),
		$images = $this.find('img').add( $this.filter('img') ),
		loaded = [],
		proper = [],
		broken = [];

	// Register deferred callbacks
	if ($.isPlainObject(callback)) {
		$.each(callback, function (key, value) {
			if (key === 'callback') {
				callback = value;
			} else if (deferred) {
				deferred[key](value);
			}
		});
	}

	function doneLoading() {
		var $proper = $(proper),
			$broken = $(broken);

		if ( deferred ) {
			if ( broken.length ) {
				deferred.reject( $images, $proper, $broken );
			} else {
				deferred.resolve( $images );
			}
		}

		if ( $.isFunction( callback ) ) {
			callback.call( $this, $images, $proper, $broken );
		}
	}

	function imgLoaded( img, isBroken ) {
		// don't proceed if BLANK image, or image is already loaded
		if ( img.src === BLANK || $.inArray( img, loaded ) !== -1 ) {
			return;
		}

		// store element in loaded images array
		loaded.push( img );

		// keep track of broken and properly loaded images
		if ( isBroken ) {
			broken.push( img );
		} else {
			proper.push( img );
		}

		// cache image and its state for future calls
		$.data( img, 'imagesLoaded', { isBroken: isBroken, src: img.src } );

		// trigger deferred progress method if present
		if ( hasNotify ) {
			deferred.notifyWith( $(img), [ isBroken, $images, $(proper), $(broken) ] );
		}

		// call doneLoading and clean listeners if all images are loaded
		if ( $images.length === loaded.length ){
			setTimeout( doneLoading );
			$images.unbind( '.imagesLoaded' );
		}
	}

	// if no images, trigger immediately
	if ( !$images.length ) {
		doneLoading();
	} else {
		$images.bind( 'load.imagesLoaded error.imagesLoaded', function( event ){
			// trigger imgLoaded
			imgLoaded( event.target, event.type === 'error' );
		}).each( function( i, el ) {
			var src = el.src;

			// find out if this image has been already checked for status
			// if it was, and src has not changed, call imgLoaded on it
			var cached = $.data( el, 'imagesLoaded' );
			if ( cached && cached.src === src ) {
				imgLoaded( el, cached.isBroken );
				return;
			}

			// if complete is true and browser supports natural sizes, try
			// to check for image status manually
			if ( el.complete && el.naturalWidth !== undefined ) {
				imgLoaded( el, el.naturalWidth === 0 || el.naturalHeight === 0 );
				return;
			}

			// cached images don't fire load sometimes, so we reset src, but only when
			// dealing with IE, or image is complete (loaded) and failed manual check
			// webkit hack from http://groups.google.com/group/jquery-dev/browse_thread/thread/eee6ab7b2da50e1f
			if ( el.readyState || el.complete ) {
				el.src = BLANK;
				el.src = src;
			}
		});
	}

	return deferred ? deferred.promise( $this ) : $this;
};

var Grid = (function() {

		// list of items
	var $grid = $( '#og-grid' ),
		// the items
		$items = $grid.children( 'li' ),
		// current expanded item's index
		current = -1,
		// position (top) of the expanded item
		// used to know if the preview will expand in a different row
		previewPos = -1,
		// extra amount of pixels to scroll the window
		scrollExtra = 0,
		// extra margin when expanded (between preview overlay and the next items)
		marginExpanded = 10,
		$window = $( window ), winsize,
		$body = $( 'html, body' ),
		// transitionend events
		transEndEventNames = {
			'WebkitTransition' : 'webkitTransitionEnd',
			'MozTransition' : 'transitionend',
			'OTransition' : 'oTransitionEnd',
			'msTransition' : 'MSTransitionEnd',
			'transition' : 'transitionend'
		},
		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		// support for csstransitions
		support = Modernizr.csstransitions,
		// default settings
		settings = {
			minHeight : 500,
			speed : 350,
			easing : 'ease'
		};

	function init( config ) {
		
		// the settings..
		settings = $.extend( true, {}, settings, config );

		// preload all images
		$grid.imagesLoaded( function() {

			// save item´s size and offset
			saveItemInfo( true );
			// get window´s size
			getWinSize();
			// initialize some events
			initEvents();

		} );

	}

	// add more items to the grid.
	// the new items need to appended to the grid.
	// after that call Grid.addItems(theItems);
	function addItems( $newitems ) {

		$items = $items.add( $newitems );

		$newitems.each( function() {
			var $item = $( this );
			$item.data( {
				offsetTop : $item.offset().top,
				height : $item.height()
			} );
		} );

		initItemsEvents( $newitems );

	}

	// saves the item´s offset top and height (if saveheight is true)
	function saveItemInfo( saveheight ) {
		$items.each( function() {
			var $item = $( this );
			$item.data( 'offsetTop', $item.offset().top );
			if( saveheight ) {
				$item.data( 'height', $item.height() );
			}
		} );
	}

	function initEvents() {
		
		// when clicking an item, show the preview with the item´s info and large image.
		// close the item if already expanded.
		// also close if clicking on the item´s cross
		initItemsEvents( $items );
		
		// on window resize get the window´s size again
		// reset some values..
		$window.on( 'debouncedresize', function() {
			
			scrollExtra = 0;
			previewPos = -1;
			// save item´s offset
			saveItemInfo();
			getWinSize();
			var preview = $.data( this, 'preview' );
			if( typeof preview != 'undefined' ) {
				hidePreview();
			}

		} );

	}

	function initItemsEvents( $items ) {
		$items.on( 'click', 'span.og-close', function() {
			hidePreview();
			return false;
		} ).children( 'a' ).on( 'click', function(e) {

			var $item = $( this ).parent();
			// check if item already opened
			current === $item.index() ? hidePreview() : showPreview( $item );
			return false;

		} );
	}

	function getWinSize() {
		winsize = { width : $window.width(), height : $window.height() };
	}

	function showPreview( $item ) {
        
		var preview = $.data( this, 'preview' ),
			// item´s offset top
			position = $item.data( 'offsetTop' );

		$item.find("img").css('opacity', '1');

		scrollExtra = 0;

		// if a preview exists and previewPos is different (different row) from item´s top then close it
		if( typeof preview != 'undefined' ) {

			// not in the same row
			if( previewPos !== position ) {
				// if position > previewPos then we need to take te current preview´s height in consideration when scrolling the window
				if( position > previewPos ) {
					scrollExtra = preview.height;
				}
				hidePreview();
			}
			// same row
			else {
				preview.update( $item );
				return false;
			}
			
		}

		// update previewPos
		previewPos = position;
		// initialize new preview for the clicked item
		preview = $.data( this, 'preview', new Preview( $item ) );
		// expand preview overlay
		preview.open();

	}

	function hidePreview() {
		current = -1;
		var preview = $.data( this, 'preview' );
		preview.close();
		$.removeData( this, 'preview' );
	}

	// the preview obj / overlay
	function Preview( $item ) {
		this.$item = $item;
		this.expandedIdx = this.$item.index();
		this.create();
		this.update();
	}

	Preview.prototype = {
		create : function() {
			// create Preview structure:
			this.$title = $( '<h3></h3>' );
            this.$director = $( '<h4></h4>');
            this.$year = $( '<p class="dateDeSortie"></p>' );
            this.$country = $( '<p class="pays"></p>');
			this.$description = $( '<p class="synopsis"></p>' );
			this.$href = $( '<a href="#">Voir la fiche</a>' );
			this.$details = $( '<div class="og-details"></div>' ).append( this.$title, this.$director, this.$year, this.$country, this.$description);

            // review tabs

            this.$noteN6NIKITA = $('<p class="rating"></p>');
            this.$noteN6MARZONI = $('<p class="rating"></p>');
            this.$noteN6PALM = $('<p class="rating"></p>');
            this.$noteN6TYRELL = $('<p class="rating"></p>');
            this.$reviewN6NIKITA = $('<p class="review"></p>');
            this.$reviewN6MARZONI = $('<p class="review"></p>');
            this.$reviewN6PALM = $('<p class="review"></p>');
            this.$reviewN6TYRELL = $('<p class="review"></p>');
            this.$reviewContent1 = $('<div class="content-1"></div>').append(this.$reviewN6NIKITA, this.$noteN6NIKITA);
            this.$reviewContent2 = $('<div class="content-2"></div>').append(this.$reviewN6MARZONI, this.$noteN6MARZONI);
            this.$reviewContent3 = $('<div class="content-3"></div>').append(this.$reviewN6PALM, this.$noteN6PALM);
            this.$reviewContent4 = $('<div class="content-4"></div>').append(this.$reviewN6TYRELL, this.$noteN6TYRELL);
            this.$reviewContent = $('<div class="content-review"></div>').append(this.$reviewContent1, this.$reviewContent2, this.$reviewContent3, this.$reviewContent4);
            this.$reviewInputs = $('<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" /><label for="tab-1" class="tab-label-1">N6NIKITA</label><input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" /><label for="tab-2" class="tab-label-2">N6MARZONI</label><input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" /><label for="tab-3" class="tab-label-3">N6PALM</label><input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" /><label for="tab-4" class="tab-label-4">N6TYRELL</label>');
            this.$reviewClearShadow = $('<div class="clear-shadow"></div>');

            this.$reviewTabs = $('<section class="tabs"></section>').append( this.$reviewInputs, this.$reviewClearShadow, this.$reviewContent);

            this.$linkSingle = $( '<div class="og-linkSingle"></div>' ).append(this.$reviewTabs);
			this.$loading = $( '<div class="og-loading"></div>' );
			this.$fullimage = $( '<div class="og-fullimg"></div>' ).append( this.$loading );
			this.$closePreview = $( '<span class="og-close"></span>' );
			this.$previewInner = $( '<div class="og-expander-inner"></div>' ).append( this.$closePreview, this.$fullimage, this.$details, this.$linkSingle);
			this.$previewEl = $( '<div class="og-expander"></div>' ).append( this.$previewInner );



			// append preview element to the item
			this.$item.append( this.getEl() );
			// set the transitions for the preview and the item
			if( support ) {
				this.setTransition();
			}
		},
		update : function( $item ) {

			if( $item ) {
				this.$item = $item;
			}
			
			// if already expanded remove class "og-expanded" from current item and add it to new item
			if( current !== -1 ) {
				var $currentItem = $items.eq( current );
				$currentItem.find("img").css('opacity', '.25');
				$currentItem.removeClass( 'og-expanded' );
				this.$item.addClass( 'og-expanded' );
				// position the preview correctly
				this.positionPreview();
			}

			// update current value
			current = this.$item.index();

			// update preview´s content
			var $itemEl = this.$item.children( 'a' ),
				eldata = {
					href : $itemEl.attr( 'href' ),
					largesrc : $itemEl.data( 'largesrc' ),
					title : $itemEl.data( 'title' ),
                    director: $itemEl.data ('director'),
					description : $itemEl.data( 'description' ),
                    year : $itemEl.data( 'year'),
                    country : $itemEl.data( 'country'),
                    reviewN6Nikita : $itemEl.data('reviewn6nikita'),
                    noteN6Nikita : $itemEl.data('noten6nikita'),
                    reviewN6Marzoni : $itemEl.data('reviewn6marzoni'),
                    noteN6Marzoni : $itemEl.data('noten6marzoni'),
                    reviewN6Palm : $itemEl.data('reviewn6palm'),
                    noteN6Palm : $itemEl.data('noten6palm'),
                    reviewN6Tyrell : $itemEl.data('reviewn6tyrell'),
                    noteN6Tyrell : $itemEl.data('noten6tyrell')
				};

			this.$title.html( eldata.title );

            this.$director.html (eldata.director);
			this.$description.html( eldata.description );
            this.$year.html(eldata.year);
            this.$country.html(eldata.country);
			this.$href.attr( 'href', eldata.href );
            
            // reviews

            this.$reviewN6NIKITA.html(eldata.reviewN6Nikita);
            this.$reviewN6MARZONI.html(eldata.reviewN6Marzoni);
            this.$reviewN6PALM.html(eldata.reviewN6Palm);
            this.$reviewN6TYRELL.html(eldata.reviewN6Tyrell);
			this.$noteN6NIKITA.empty();
			this.$noteN6MARZONI.empty();
			this.$noteN6PALM.empty();
			this.$noteN6TYRELL.empty();


            var ratingTyrell = eldata.noteN6Tyrell;
            var ratingNikita = eldata.noteN6Nikita;
            var ratingMarzoni = eldata.noteN6Marzoni;
            var ratingPalm = eldata.noteN6Palm;

            // reviews rating

            for (var i=1; i<=ratingTyrell; i++){
                this.$noteN6TYRELL.append('<i class="fa fa-star"></i>');
            }

            for(var i=1; i<=(5 - ratingTyrell); i++){
                if (ratingTyrell != 0) {
                    this.$noteN6TYRELL.append('<i class="fa fa-star-o"></i>');
                }else{
                    this.$noteN6TYRELL.hide();
                }
            }

            for (var i=1; i<=ratingNikita; i++){
                this.$noteN6NIKITA.append('<i class="fa fa-star"></i>');
            }

            for(var i=1; i<=(5 - ratingNikita); i++){
                if (ratingNikita != 0) {
                    this.$noteN6NIKITA.append('<i class="fa fa-star-o"></i>');
                }else{
                    this.$noteN6NIKITA.hide();
                }
            }

            for (var i=1; i<=ratingMarzoni; i++){
                this.$noteN6MARZONI.append('<i class="fa fa-star"></i>');
            }

            for(var i=1; i<=(5 - ratingMarzoni); i++) {
                if (ratingNikita != 0) {
                    this.$noteN6MARZONI.append('<i class="fa fa-star-o"></i>');
                } else {
                    this.$noteN6MARZONI.hide();
                }
            }


            for (var i=1; i<=ratingPalm; i++){
                this.$noteN6PALM.append('<i class="fa fa-star"></i>');
            }

            for(var i=1; i<=(5 - ratingPalm); i++){
                if (ratingPalm != 0) {
                    this.$noteN6PALM.append('<i class="fa fa-star-o"></i>');
                }else{
                    this.$noteN6PALM.hide();
                }
            }



			var self = this;
			
			// remove the current image in the preview
			if( typeof self.$largeImg != 'undefined' ) {
				self.$largeImg.remove();
			}

			// preload large image and add it to the preview
			// for smaller screens we don´t display the large image (the media query will hide the fullimage wrapper)
			if( self.$fullimage.is( ':visible' ) ) {
				this.$loading.show();
				$( '<img/>' ).load( function() {
					var $img = $( this );
					if( $img.attr( 'src' ) === self.$item.children('a').data( 'largesrc' ) ) {
						self.$loading.hide();
						self.$fullimage.find( 'img' ).remove();
						self.$largeImg = $img.fadeIn( 200 );
						self.$fullimage.append( self.$largeImg );
					}
				} ).attr( 'src', eldata.largesrc );	
			}

		},
		open : function() {

			setTimeout( $.proxy( function() {	
				// set the height for the preview and the item
				this.setHeights();
				// scroll to position the preview in the right place
				this.positionPreview();
			}, this ), 25 );

		},
		close : function() {

			var self = this,
				onEndFn = function() {
					if( support ) {
						$( this ).off( transEndEventName );
					}
					self.$item.find("img").css('opacity', '.25');
					self.$item.removeClass( 'og-expanded' );
					self.$previewEl.remove();
				};

			setTimeout( $.proxy( function() {

				if( typeof this.$largeImg !== 'undefined' ) {
					this.$largeImg.fadeOut( 'fast' );
				}
				this.$previewEl.css( 'height', 0 );
				// the current expanded item (might be different from this.$item)
				var $expandedItem = $items.eq( this.expandedIdx );
				$expandedItem.css( 'height', $expandedItem.data( 'height' ) ).on( transEndEventName, onEndFn );

				if( !support ) {
					onEndFn.call();
				}

			}, this ), 25 );
			
			return false;

		},
		calcHeight : function() {

			var heightPreview = winsize.height - this.$item.data( 'height' ) - marginExpanded,
				itemHeight = winsize.height;

			if( heightPreview < settings.minHeight ) {
				heightPreview = settings.minHeight;
				itemHeight = settings.minHeight + this.$item.data( 'height' ) + marginExpanded;
			}

			this.height = heightPreview;
			this.itemHeight = itemHeight;

		},
		setHeights : function() {

			var self = this,
				onEndFn = function() {
					if( support ) {
						self.$item.off( transEndEventName );
					}
					self.$item.addClass( 'og-expanded' );
				};

			this.calcHeight();
			this.$previewEl.css( 'height', this.height );
			this.$item.css( 'height', this.itemHeight ).on( transEndEventName, onEndFn );

			if( !support ) {
				onEndFn.call();
			}

		},
		positionPreview : function() {

			// scroll page
			// case 1 : preview height + item height fits in window´s height
			// case 2 : preview height + item height does not fit in window´s height and preview height is smaller than window´s height
			// case 3 : preview height + item height does not fit in window´s height and preview height is bigger than window´s height
			var position = this.$item.data( 'offsetTop' ),
				previewOffsetT = this.$previewEl.offset().top - scrollExtra,
				scrollVal = this.height + this.$item.data( 'height' ) + marginExpanded <= winsize.height ? position : this.height < winsize.height ? previewOffsetT - ( winsize.height - this.height ) : previewOffsetT;
			
			$body.animate( { scrollTop : scrollVal }, settings.speed );

		},
		setTransition  : function() {
			this.$previewEl.css( 'transition', 'height ' + settings.speed + 'ms ' + settings.easing );
			this.$item.css( 'transition', 'height ' + settings.speed + 'ms ' + settings.easing );
		},
		getEl : function() {
			return this.$previewEl;
		}
	}

	return { 
		init : init,
		addItems : addItems
	};

})();