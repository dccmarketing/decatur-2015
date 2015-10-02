/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	wp.customize( 'address_1', function( value ) {
		value.bind( function( to ) {
			$( '.address1' ).text( to );
		} );
	} );

	wp.customize( 'address_2', function( value ) {
		value.bind( function( to ) {
			$( '.address2' ).text( to );
		} );
	} );

	wp.customize( 'city', function( value ) {
		value.bind( function( to ) {
			$( '.city' ).text( to );
		} );
	} );

	wp.customize( 'us_state', function( value ) {
		value.bind( function( to ) {
			$( '.state' ).text( to );
		} );
	} );

	wp.customize( 'zip_code', function( value ) {
		value.bind( function( to ) {
			$( '.zip' ).text( to );
		} );
	} );
	wp.customize( 'phone_number', function( value ) {
		value.bind( function( to ) {
			$( '.phone-number' ).text( to );
		} );
	} );

/*
	wp.customize( 'color_field', function( value ) {
		value.bind( function( to ) {
			$( '.color_field' ).css( {
				'color': to,
			} );
		} );
	} );

	wp.customize( 'image_field', function( value ) {
		value.bind( function( to ) {
			$( '.image_field' ).css( {
				'color': to,
			} );
		} );
	} );
*/
} )( jQuery );
