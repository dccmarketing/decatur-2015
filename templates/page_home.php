<?php
/**
 * Template Name: Home Page
 *
 * Description: Sidebar, content
 *
 * @package Decatur_2015
 */

global $decatur_2015_themekit;

get_header();

?><div class="wrap wrap-content sidebar-content">
	<div id="primary" class="content-area sidebar-content">
		<main id="main" class="site-main" role="main"><?php

			do_action( 'tha_content_while_before' );

			while ( have_posts() ) : the_post();

				do_action( 'tha_entry_before' );

				get_template_part( 'template-parts/content', 'home' );

				do_action( 'tha_entry_after' );

			endwhile; // loop

			wp_reset_postdata();

			$args['category_name'] 	= 'featured';
			$args['posts_per_page'] = 3;
			$news 					= $decatur_2015_themekit->get_posts( 'post', $args, 'home' );

			while ( $news->have_posts() ) : $news->the_post();

				do_action( 'tha_entry_before' );

				get_template_part( 'template-parts/content', 'homenews' );

				do_action( 'tha_entry_after' );

			endwhile; // loop

			wp_reset_postdata();

			do_action( 'tha_content_while_after' );

			get_sidebar( 'homebottom' );

		?></main><!-- #main -->
	</div><!-- #primary -->
	<div class="sidebars"><?php

		do_action( 'tha_sidebars_before' );

		get_sidebar( 'home' );

		do_action( 'tha_sidebars_after' );

	?></div><?php

get_footer();