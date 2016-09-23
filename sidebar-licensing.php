<?php
/**
 * The sidebar for the Licensing Sidebar
 *
 * @package Decatur_2015
 */

if ( ! is_active_sidebar( 'sidebar-licensing' ) ) { return; }

?><div id="secondary" class="widget-area sidebar-licensing sidebar-content" role="complementary"><?php

	do_action( 'tha_sidebar_top' );

	dynamic_sidebar( 'sidebar-licensing' );

	do_action( 'tha_sidebar_bottom' );

?></div><!-- #secondary -->
