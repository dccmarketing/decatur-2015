/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function( $ ) {

	'use strict';

	var parents = $( '.nav-header ul .menu-item-has-children' );

	/*parents.each( function() {

		var $this = $(this);
		var submenu = $this.children( '.sub-menu' );

		$this.on( 'touchstart', function( e ){

			e.preventDefault();

			$this.toggleClass( 'open' );
			submenu.toggleClass( 'open' );

			if ( submenu.is( ':hidden' ) ) {

				submenu.attr( 'aria-hidden', 'true' );

			} else {

				submenu.attr( 'aria-hidden', 'false' );

			}

		});

	});*/

	enquire.register( "screen and (max-width: 680px)", {

		match: function() {

			parents.each( function() {

				var $this = $(this);
				var submenu = $this.children( '.sub-menu' );

				$this.on( 'touchstart', function( e ){

					e.preventDefault();

					$this.toggleClass( 'open' );
					submenu.toggleClass( 'open' );

					//if ( submenu.is( ':hidden' ) ) {
					if ( submenu.hasClass( 'open' ) ) {

						submenu.attr( 'aria-hidden', 'false' );

					} else {

						submenu.attr( 'aria-hidden', 'true' );

					}

				});

			}); // parents

		}, // match

		unmatch: function() {

			parents.each( function() {

				var $this = $(this);
				var submenu = $this.children( '.sub-menu' );

				$this.on( 'click', function( e ){

					e.preventDefault();

					$this.toggleClass( 'open' );
					submenu.toggleClass( 'open' );

					//if ( submenu.is( ':hidden' ) ) {
					if ( submenu.hasClass( 'open' ) ) {

						submenu.attr( 'aria-hidden', 'false' );

					} else {

						submenu.attr( 'aria-hidden', 'true' );

					}

				});

			}); // parents

		} // unmatch

	}); // enquire

	enquire.register( "screen and (min-width: 681px)", {

		match: function() {

			parents.each( function() {

				var $this = $(this);
				var submenu = $this.children( '.sub-menu' );

				$this.on( 'click', function( e ){

					e.preventDefault();

					$this.toggleClass( 'open' );
					submenu.toggleClass( 'open' );

					//if ( submenu.is( ':hidden' ) ) {
					if ( submenu.hasClass( 'open' ) ) {

						submenu.attr( 'aria-hidden', 'false' );

					} else {

						submenu.attr( 'aria-hidden', 'true' );

					}

				});

			}); // parents

		}, // match

		unmatch: function() {

			parents.each( function() {

				var $this = $(this);
				var submenu = $this.children( '.sub-menu' );

				$this.on( 'touchstart', function( e ){

					e.preventDefault();

					$this.toggleClass( 'open' );
					submenu.toggleClass( 'open' );

					//if ( submenu.is( ':hidden' ) ) {
					if ( submenu.hasClass( 'open' ) ) {

						submenu.attr( 'aria-hidden', 'false' );

					} else {

						submenu.attr( 'aria-hidden', 'true' );

					}

				});

			}); // parents

		} // unmatch

	}); // enquire

} )( jQuery );