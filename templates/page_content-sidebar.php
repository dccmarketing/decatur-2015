<?php
/**
 * Template Name: Content Sidebar
 *
 * Description: Page template with sidebar on the right-side
 *
 * @package Decatur_2015
 */

get_header();

?><div class="wrap wrap-content content-sidebar">
	<div id="primary" class="content-area content-sidebar">
		<main id="main" class="site-main" role="main"><?php

			do_action( 'tha_content_while_before' );

			while ( have_posts() ) : the_post();

				do_action( 'tha_entry_before' );

				get_template_part( 'template-parts/content', 'page' );

				do_action( 'tha_entry_after' );

					// If comments are open or have more than one comment, load comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;

			endwhile; // loop

			do_action( 'tha_content_while_after' );

		?></main><!-- #main -->
	</div><!-- #primary -->
	<div class="sidebars"><?php

		do_action( 'tha_sidebars_before' );

		get_sidebar();

		do_action( 'tha_sidebars_after' );

	?></div><?php

get_footer();