/**
 * subsite-expand.js
 *
 * Expands departments on subsites
 */
( function( $ ) {

	var header, logo, menu, depts, wrap, submenu, parents, current;

	header = $( '#masthead' );
	if ( ! header ) { return; }

	logo = $( '.site-title' );
	if ( ! logo ) { return; }

	if ( $( 'body' ).hasClass( 'fire' ) ) {

		menu = $( '.fire-menu' );
		current = '.fire';

	} else if ( $( 'body' ).hasClass( 'police' ) ) {

		menu = $( '.police-menu' );
		current = '.police';

	}
	if ( ! menu ) { return; }

	parents = menu.children( '.menu-item-has-children' );
	if ( ! parents ) { return; }

	depts = menu.children( '.departments' );
	if ( ! parents ) { return; }

	wrap = depts.children( '.wrap-submenu' );
	submenu = wrap.children( '.sub-menu' );

	/**
	 * Removes all classes from other parents
	 *
	 * @param 	object 		parent 		The parent object
	 */
	function removeAllFromOtherParents() {

		var subparents = submenu.children( '.menu-item' );
		var others = subparents.not( current );

		others.each( function() {

			var item = $(this);

			item.removeClass( 'current-menu-ancestor' );
			item.removeClass( 'current_page_ancestor' );
			item.removeClass( 'current-menu-parent' );
			item.removeClass( 'current_page_parent' );
			item.removeClass( 'current_page_item' );
			item.removeClass( 'current-menu-item' );

		}); // others.each

	} // removeAllFromOtherParents()

	enquire.register( "screen and (min-width: 620px)" , {

		match: function() {

			if ( $( 'body' ).hasClass( 'fire' ) || $( 'body' ).hasClass( 'police' ) ) {

				removeAllFromOtherParents();

				header.addClass( 'open-dept' );
				logo.addClass( 'open-dept' );
				depts.addClass( 'open-dept' );
				depts.addClass( 'current-menu-ancestor' );
				submenu.attr( 'aria-expanded', 'true' );

			}

			if ( $( 'body' ).hasClass( 'fire' ) ) {

				$( 'li.fire' ).addClass( 'current-menu-item' );
				$( 'li.fire' ).addClass( 'current-menu-ancestor' );

			} else if ( $( 'body' ).hasClass( 'police' ) ) {

				$( 'li.police' ).addClass( 'current-menu-item' );
				$( 'li.police' ).addClass( 'current-menu-ancestor' );

			}

		}, // match

		unmatch: function() {

			header.removeClass( 'open-dept' );
			header.removeClass( 'open-biz' );
			logo.removeClass( 'open-biz' );
			logo.removeClass( 'open-dept' );

			parents.each( function() {

				var parent = $(this);

				parent.removeClass( 'open-dept' );
				parent.removeClass( 'open-biz' );

				var parentwrap = parent.children( '.wrap-submenu' );
				var parentsub = parentwrap.children( '.sub-menu' );

				parentsub.attr( 'aria-expanded', 'false' );

			}); // parents.each

		} // unmatch

	}); // enquire

} )( jQuery );