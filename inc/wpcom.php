<?php
/**
 * WordPress.com-specific functions and definitions.
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package Decatur_2015
 */

/**
 * Adds support for wp.com-specific theme functions.
 *
 * @global array $themecolors
 */
function decatur_2015_wpcom_setup() {

	global $themecolors;

	// Set theme colors for third party services.
	if ( ! isset( $themecolors ) ) {

		$themecolors = array(
			'bg'     => '',
			'border' => '',
			'text'   => '',
			'link'   => '',
			'url'    => '',
		);

	}

} // decatur_2015_wpcom_setup()
add_action( 'after_setup_theme', 'decatur_2015_wpcom_setup' );
