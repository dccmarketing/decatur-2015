/**
 * main-menu-expand.js
 *
 * Handles toggling the expansion of the main menu ubermenus.
 */
( function( $ ) {

	var header, logo, menu, parents, current, clicked;

	header = $( '#masthead' );
	if ( ! header ) { return; }

	logo = $( '.site-title' );
	if ( ! logo ) { return; }

	menu = $( '#primary-menu' );
	if ( ! menu ) { return; }

	parents = menu.children( '.menu-item-has-children' );
	if ( ! parents ) { return; }

	current = menu.children( '.current-menu-ancestor' );

	/**
	 * Returns the other parent's class data
	 *
	 * @param 	string 		classToCheck 		The class name to check
	 * @return 	string 							The other class name
	 */
	function getOther( classToCheck ) {

		if ( 'open-dept' === classToCheck ) {

			return 'open-biz';

		}

		return 'open-dept';

	} // getOther()

	/**
	 * Returns true if logo and header have the class
	 *
	 * @param 	string 		classToCheck 		The class name to check
	 * @return 	bool 							true if the class is present, otherwise false
	 */
	function isShowing( classToCheck ) {

		if ( logo.hasClass( classToCheck ) && header.hasClass( classToCheck ) ) {

			return true;

		}

		return false;

	} // isShowing

	/**
	 * Removes all classes from other parents
	 *
	 * @param 	object 		parent 		The parent object
	 */
	function removeAllFromOtherParents( parent ) {

		var others = parents.not( parent );

		others.each( function() {

			var item = $(this);

			item.removeClass( 'open-dept' );
			item.removeClass( 'open-biz' );

			var itemwrap = item.children( '.wrap-submenu' );
			var itemsub = itemwrap.children( '.sub-menu' );

			itemsub.attr( 'aria-expanded', 'false' );

		}); // others.each

	} // removeAllFromOtherParents()

	/**
	 * Swaps classes on the logo and header
	 *
	 * @param 	string 		remove 		Class to remove
	 * @param 	string 		add 		Class to add
	 */
	function swapClasses( remove, add ) {

		header.removeClass( remove );
		logo.removeClass( remove );

		header.addClass( add );
		logo.addClass( add );

	} // swapClasses

	enquire.register( "screen and (min-width: 620px)" , {

		match: function() {

			parents.each( function() {

				var parent = $(this);
				var link = parent.children( 'a' );
				var wrap = parent.children( '.wrap-submenu' );
				var submenu = wrap.children( '.sub-menu' );
				var child = submenu.children( 'li' );
				//var childlink = child.children( 'a' );
				//var childlabel = childlink.children( '.menu-label' );

				if ( parent.hasClass( 'open-dept' ) || parent.hasClass( 'open-biz' ) ) {

					submenu.attr( 'aria-expanded', 'true' );

				} else {

					submenu.attr( 'aria-expanded', 'false' );

				}

				if ( current.hasClass( 'current-menu-ancestor' ) ) {

					var cursub, curchild, curchildlabel;

					cursub = current.find( '.sub-menu' );

					if ( current.find( '.current-referrer' ).length !== 0 ) {

						curchild = cursub.children( '.current-referrer' );

					} else {

						curchild = cursub.children( '.current-menu-ancestor' );

						if ( curchild.length === 0 ) {

							curchild = cursub.children( '.current-menu-item' );

						}

					}

					//console.log( curchild );

					curchildlabel = curchild.find( 'a .menu-label' );

					//console.log( curchildlabel );

				}

				link.on( 'click', function(e){

					e.preventDefault();

					var data = link.attr( 'data-id' );

					if ( ! parent.hasClass( data ) && isShowing( getOther( data ) ) ) { // if parent is not showing, but other is, remove other, add parent

						removeAllFromOtherParents( parent );
						swapClasses( getOther( data ), data );

						parent.addClass( data );
						submenu.attr( 'aria-expanded', 'true' );

					} else if ( parent.hasClass( data ) /*&& isShowing( data )*/ ) { // if parent is showing, remove

						if ( ! parent.hasClass( 'current-menu-ancestor' ) && current.hasClass( 'current-menu-ancestor' ) ) { // if parent is not current, but there is a current, swap and show current

							swapClasses( data, getOther( data ) );
							parent.removeClass( data );
							submenu.attr( 'aria-expanded', 'false' );

							current.addClass( getOther( data ) );
							cursub.attr( 'aria-expanded', 'true' );

						} else if ( ! parent.hasClass( 'current-menu-ancestor' ) && ! current.hasClass( 'current-menu-ancestor' ) ) { // only remove if parent isn't current or if no parents are current

							header.removeClass( data );
							logo.removeClass( data );
							parent.removeClass( data );
							submenu.attr( 'aria-expanded', 'false' );

						}

					} /*else if ( parent.hasClass( data ) ) { // parent is showing, but header isn't labelled as such

						//

					} */else { // if parent is not showing, add

						header.addClass( data );
						logo.addClass( data );
						parent.addClass( data );
						submenu.attr( 'aria-expanded', 'true' );

					}

				}); // parent.click

				// Hover to display other parent labels
				// child.hover(
				// 	function() { // mousein
				//
				// 		if ( ! curchildlabel ) { return; }
				// 		if ( $(this).hasClass( 'current-referrer' ) ) { return; }
				// 		if ( $(this).hasClass( 'current-referrer' ) || $(this).hasClass( 'current-menu-ancestor' ) ) { return; }
				//
				// 		var $this = $(this);
				//
				// 		curchildlabel.addClass( 'hide' );
				// 		$this.find('.menu-label').addClass( 'show' );
				//
				// 	},
				// 	function() { // mouseout
				//
				// 		if ( ! curchildlabel ) { return; }
				//
				// 		var $this = $(this);
				//
				// 		curchildlabel.removeClass( 'hide' );
				// 		$this.find('.menu-label').removeClass( 'show' );
				//
				// 	}
				// );

			}); // parent.each

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
