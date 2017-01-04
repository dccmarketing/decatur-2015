/**
 * Collapses and expands submenus
 */

( function( $ ) {

	var parents = document.querySelectorAll( '.submenu-widget .menu-item-has-children' );
	if ( ! parents ) { return; }

	/**
	 * Returns the event target.
	 *
	 * @param 		object 		event 		The event.
	 * @return 		object 		target 		The event target.
	 */
	function getEventTarget( event ) {

		event = event || window.event;

		return event.target || event.srcElement;

	} // getEventTarget()

	/**
	 * Processes the event and call the correct
	 * action based on the event target.
	 *
	 * @param 		object 		event 		The event.
	 */
	function processEvent( event ) {

		var target = getEventTarget( event );
		var menuItem = this;

		if ( target.matches( '.show-hide' ) ) {

			event.preventDefault();
			event.stopPropagation();
			event.cancelBubble = true;

			var submenu = menuItem.querySelector( '.sub-menu' );

			$(submenu).slideToggle(250);

			menuItem.classList.toggle( "open" );

			if ( menuItem.classList.contains( "open" ) ) {

				target.innerHTML = '-';

			} else {

				target.innerHTML = '+';

			}

		}

	} // processEvent()

	/**
	 * Checks if the nodes are empty and if not, sets event
	 * listeners on each node.
	 *
	 * @param 		object 		nodes 		A list of nodes.
	 */
	function setEvents( nodes ) {

		if ( ! nodes || 0 >= nodes.length ) { return; }

		for ( var n = 0; n < nodes.length; n++ ) {

			nodes[n].addEventListener( 'click', processEvent );

		}

	} // setEvents()

	setEvents( parents );

} )( jQuery );
