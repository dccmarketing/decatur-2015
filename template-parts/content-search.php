<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Decatur_2015
 */

?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php

	do_action( 'tha_entry_top' );

	?><header class="page-header contentsearch"><?php

		the_title( sprintf( '<h2 class="page-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

	?></header><!-- .entry-header --><?php

	do_action( 'tha_entry_content_before' );

	?><div class="entry-summary"><?php

		the_excerpt();

	?></div><!-- .entry-summary --><?php

	do_action( 'tha_entry_content_after' );

	?><footer class="entry-footer"><?php

		if ( 'post' == get_post_type() ) :
			?><div class="entry-meta"><?php

				decatur_2015_posted_on();

			?></div><!-- .entry-meta --><?php

		endif;

	?></footer><!-- .entry-footer --><?php

	do_action( 'tha_entry_bottom' );

?></article><!-- #post-## -->