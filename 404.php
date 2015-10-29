<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Pagex
 *
 * @package Decatur_2015
 */

get_header();

?><div class="wrap wrap-content sidebar-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'decatur-2015' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'decatur-2015' ); ?></p>
					<p><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Info A-to-Z' ) ), 'decatur-2015' ); ?>"><?php esc_html_e( 'Info A-to-Z (site map)', 'decatur-2015' ); ?></a></p><?php

					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );

					if ( decatur_2015_categorized_blog() ) : // Only show the widget if site has multiple categories.

					?><div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'decatur-2015' ); ?></h2>
						<ul><?php

							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );

						?></ul>
					</div><!-- .widget --><?php

					endif;

					/* translators: %1$s: smiley */
					$archive_content = '<p>' . esc_html__( 'Try looking in the monthly archives. %1$s', 'decatur-2015' ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

				?></div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="sidebars"><?php

		do_action( 'tha_sidebars_before' );

		get_sidebar();

		do_action( 'tha_sidebars_after' );

	?></div><?php

get_footer();