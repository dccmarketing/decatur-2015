<?php
/**
 * Template part for displaying the site logo.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Decatur_2015
 */

global $decatur_2015_themekit;

?><div class="wrap wrap-header">
	<div class="site-branding"><?php

	if ( is_front_page() && is_home() ) {

		?><h1 class="site-title <?php echo $decatur_2015_themekit->get_header_class(); ?>">
			<a href="<?php echo esc_url( network_site_url( '/' ) ); ?>" rel="home">
				<span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span><?php

				decatur_2015_the_svg( 'logo' );

			?></a>
		</h1><?php

	} else {

		?><p class="site-title <?php echo $decatur_2015_themekit->get_header_class(); ?>">
			<a href="<?php echo esc_url( network_site_url( '/' ) ); ?>" rel="home">
				<span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span><?php

				decatur_2015_the_svg( 'logo' );

			?></a>
		</p><?php

	}

	?></div><!-- .site-branding -->
</div><!-- .header_wrap -->
