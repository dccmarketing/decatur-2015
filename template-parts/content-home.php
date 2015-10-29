<?php
/**
 * Template used for displaying page content on the home page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Decatur_2015
 */

?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php

	do_action( 'tha_entry_top' );

	if ( is_main_site() ) {

		?><header class="home-header contentpage">
			<h2 class="home-title"><?php esc_html_e( 'Featured Headlines', 'decatur-2015' ); ?></h2>
		</header><!-- .entry-header --><?php

	}

	do_action( 'tha_entry_content_before' );

	?><div class="page-content"><?php

		the_content();

	?></div><!-- .entry-content --><?php

	do_action( 'tha_entry_content_after' );

	do_action( 'tha_entry_bottom' );

?></article><!-- #post-## -->