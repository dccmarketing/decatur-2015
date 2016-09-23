<?php
/**
 * Template Name: LOIS Embed
 *
 * Description: A full-width template with no sidebar
 *
 * @package Decatur_2015
 */

get_header();

?><div class="wrap wrap-content full-width">
	<div id="primary" class="content-area full-width">
		<main id="main" class="site-main" role="main"><?php

			do_action( 'tha_content_while_before' );

			while ( have_posts() ) : the_post();

				?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="page-content">
						<div class="content-mobile"><?php

							the_content();

						?></div>
						<div class="wrap-lois">
							<iframe class="embed-lois" src="<?php

								$args['username'] = 'IL_EDCofDecaturMac1';
								$args['appsection'] = 'sites';

								echo esc_url( add_query_arg( $args, 'http://www.locationone.com/lois/logon.do' ) );

							?>" width="970" height="1950" scrolling="no" frameborder="0"></iframe>
						</div>
					</div><!-- .entry-content -->

					<footer class="entry-footer"><?php

						edit_post_link( esc_html__( 'Edit', 'decatur-2015' ), '<span class="edit-link">', '</span>' );

					?></footer><!-- .entry-footer -->
				</article><!-- #post-## --><?php

			endwhile; // loop

			do_action( 'tha_content_while_after' );

		?></main><!-- #main -->
	</div><!-- #primary --><?php

get_footer();
