<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Decatur_2015
 */

global $decatur_2015_themekit;

do_action( 'tha_html_before' );

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head><?php

do_action( 'tha_head_top' );

?><meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="always">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php

wp_head();

do_action( 'tha_head_bottom' );

?></head>

<body <?php body_class(); ?>><?php

do_action( 'tha_body_top' );

	?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'decatur-2015' ); ?></a>
	<div id="page" class="hfeed site"><?php

	do_action( 'tha_header_before' );

	?><header id="masthead" class="site-header <?php echo $decatur_2015_themekit->get_header_class(); ?>" role="banner"><?php

		do_action( 'tha_header_top' );

		get_template_part( 'template-parts/content', 'logo' );

		do_action( 'tha_header_bottom' );

	?></header><!-- #masthead --><?php

	do_action( 'tha_header_after' );

	do_action( 'tha_content_before' );

	?><div class="breadcrumbs">
		<div class="wrap-crumbs"><?php

			do_action( 'decatur_2015_breadcrumbs' );

		?></div><!-- .wrap-crumbs -->
	</div><!-- .breadcrumbs -->
	<div id="content" class="site-content"><?php

		do_action( 'tha_content_top' );