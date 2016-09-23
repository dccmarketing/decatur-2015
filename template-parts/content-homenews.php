<?php
/**
 * Template part for displaying post excerpts on the home page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Decatur_2015
 */

?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php

	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'homethumb' );
	}

	do_action( 'tha_entry_top' );

	/*?><div class="wrap-entry-content"><?php */
		?><header class="entry-header justcontent"><?php

			the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );

		?></header><!-- .entry-header --><?php

		do_action( 'tha_entry_content_before' );

		?><div class="entry-content"><?php

				the_excerpt();

		?></div><!-- .entry-content --><?php

		do_action( 'tha_entry_content_after' );

	/*?></div><?php*/

	do_action( 'tha_entry_bottom' );

?></article><!-- #post-## -->