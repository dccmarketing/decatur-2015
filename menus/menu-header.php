<?php if ( has_nav_menu( 'header' ) ) {

	?><div class="menu-header"><?php


	$menu['theme_location']		= 'header';
	$menu['container'] 			= 'div';
	$menu['container_id']    	= 'menu-header';
	$menu['container_class'] 	= 'menu nav-header';
	$menu['menu_id']         	= 'menu-header-items';
	$menu['menu_class']      	= 'menu-items';
	$menu['depth']           	= 1;
	$menu['fallback_cb']     	= '';

	wp_nav_menu( $menu );

	?></div><?php

}