<?php

$menu 						= array();
$menu['theme_location'] 	= 'header';
$menu['container'] 			= 'div';
$menu['container_id'] 		= 'menu-header';
$menu['container_class'] 	= 'menu nav-header';
$menu['menu_id'] 			= 'menu-header-items';
$menu['menu_class'] 		= 'menu-items';
$menu['fallback_cb'] 		= '';

?><div class="menu-header"><?php

wp_nav_menu( $menu );

?></div>