<?php
/**
 * Template part for displaying post excerpts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Decatur_2015
 */

$info = get_blog_details();

?><nav id="site-navigation" class="main-navigation" role="navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'decatur-2015' ); ?></button><?php

	if ( '/fire/' === $info->path ) {

		$args['menu_class'] = 'menu nav-menu fire-menu';

	} elseif ( '/police/' === $info->path ) {

		$args['menu_class'] = 'menu nav-menu police-menu';

	}

	$args['depth'] 			= 2;
	$args['menu_id'] 		= 'primary-menu';
	$args['theme_location'] = 'primary';
	$args['walker']  		= new Main_Menu_Walker();

	wp_nav_menu( $args );

/*	if ( ! is_main_site( $info->blog_id ) ) {

		switch_to_blog( 1 );

		wp_nav_menu( $args );

		restore_current_blog();

	} else {

		wp_nav_menu( $args );

	}*/

?></nav><!-- #site-navigation -->