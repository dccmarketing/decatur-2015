<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.me/
 *
 * @package DocBlock
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 *
 * @uses 	add_theme_support()
 */
function decatur_2015_jetpack_setup() {

	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );

} // decatur_2015_jetpack_setup()
add_action( 'after_setup_theme', 'decatur_2015_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function decatur_2015__infinite_scroll_render() {

	while ( have_posts() ) {

		the_post();
		get_template_part( 'template-parts/content', get_post_format() );

	}

} // decatur_2015__infinite_scroll_render