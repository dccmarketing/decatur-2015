<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Decatur_2015
 */

get_header();

?><div class="wrap wrap-content sidebar-content">
	<div id="primary" class="content-area sidebar-content">
		<main id="main" class="site-main" role="main"><?php

		do_action( 'tha_content_while_before' );

		while ( have_posts() ) : the_post();

			do_action( 'tha_entry_before' );

			get_template_part( 'template-parts/content', 'single' );

			do_action( 'tha_entry_after' );

		endwhile; // End of the loop.

		do_action( 'tha_content_while_after' );

		?></main><!-- #main -->
	</div><!-- #primary -->
	<div class="sidebars"><?php

		do_action( 'tha_sidebars_before' );

		get_sidebar();

		do_action( 'tha_sidebars_after' );

	?></div><?php

get_footer();