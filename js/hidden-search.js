/**
 * hidden-search.js
 *
 * Handles toggling the appearance of a hidden search field
 */
( function( $ ) {

	var search, button;

	search = $( '#hidden-search-top' );
	button = $( '.btn-search' );

	search.attr( 'aria-hidden', 'true' );

	button.on( 'click', function( e ){

		e.preventDefault();

		search.toggleClass( 'open' );

		if ( search.is( ':hidden' ) ) {

			search.attr( 'aria-hidden', 'true' );

		} else {

			search.attr( 'aria-hidden', 'false' );

		}

	});

	button.on( 'touchstart', function( e ){

		e.preventDefault();

		search.toggleClass( 'open' );

		if ( search.is( ':hidden' ) ) {

			search.attr( 'aria-hidden', 'true' );

		} else {

			search.attr( 'aria-hidden', 'false' );

		}

	});

} )( jQuery );