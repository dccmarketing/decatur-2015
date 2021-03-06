<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Decatur_2015
 */

?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php

	do_action( 'tha_entry_top' );

	?><header class="entry-header contentsingle"><?php

		the_title( '<h1 class="entry-title">', '</h1>' );

	?></header><!-- .entry-header --><?php

	do_action( 'tha_entry_content_before' );

	?><div class="entry-content"><?php

		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'decatur-2015' ),
			'after'  => '</div>',
		) );

	?></div><!-- .entry-content --><?php

	do_action( 'tha_entry_content_after' );

	?><footer class="entry-footer"><?php

		decatur_2015_posted_on();

	?></footer><!-- .entry-footer --><?php

	do_action( 'tha_entry_bottom' );

?></article><!-- #post-## -->