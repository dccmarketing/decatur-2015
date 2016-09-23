<?php
/**
 * Template Name: Bill Pay
 *
 * Description: Displays the bill pay forms or links to bill pay sites.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Decatur_2015
 */

get_header();

?><div class="wrap wrap-content sidebar-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main"><?php

			do_action( 'tha_content_while_before' );

			while ( have_posts() ) : the_post();

				do_action( 'tha_entry_before' );

				get_template_part( 'template-parts/content', 'page' );

				do_action( 'tha_entry_after' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {

					comments_template();

				}

			endwhile; // End of the loop.

			?><iframe id="frmCOD" src="https://webpay.1tech.net/COD/Default.aspx?f=t" style="width: 668px; min-height: 620px; border: none;"></iframe><?php

			do_action( 'tha_content_while_after' );

		?></main><!-- #main -->
	</div><!-- #primary -->
	<div class="sidebars"><?php

		do_action( 'tha_sidebars_before' );

		get_sidebar();

		do_action( 'tha_sidebars_after' );

	?></div><?php

get_footer();
