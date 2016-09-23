/**
 * Collapses and expands submenus
 */

( function( $ ) {

	var parents = document.querySelectorAll( '.submenu-widget .menu-item-has-children' );
	if ( ! parents ) { return; }

	for ( var i = 0; i < parents.length; i++ ) {

		var parent = parents[i];
		var clicker = parent.querySelector( '.show-hide' );
		if ( ! clicker ) { return; }

		var submenu = parent.querySelector( '.sub-menu' );
		if ( ! submenu ) { return; }

		var current = submenu.querySelector( '.current-menu-item' );

		if ( current ) {

			$(submenu).slideToggle(250);

			parent.classList.toggle( "open" );

			if ( parent.classList.contains( "open" ) ) {

				clicker.innerHTML = '-';

			} else {

				clicker.innerHTML = '+';

			}

		}

		clicker.addEventListener( 'click', function( event ){

			event.preventDefault();

			$(submenu).slideToggle(250);

			parent.classList.toggle( "open" );

			if ( parent.classList.contains( "open" ) ) {

				this.innerHTML = '-';

			} else {

				this.innerHTML = '+';

			}

		});

	}


} )( jQuery );
