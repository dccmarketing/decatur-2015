<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Decatur_2015
 */

get_header();

?><div class="wrap wrap-content sidebar-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main"><?php

		if ( have_posts() ) :

			do_action( 'tha_content_while_before' );

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				do_action( 'tha_entry_before' );

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'excerpt' );

				do_action( 'tha_entry_after' );

			endwhile;

			do_action( 'tha_content_while_after' );

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		?></main><!-- #main -->
	</div><!-- #primary -->
	<div class="sidebars"><?php

		do_action( 'tha_sidebars_before' );

		get_sidebar();

		do_action( 'tha_sidebars_after' );

	?></div><?php

get_footer();
