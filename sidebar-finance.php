<?php
/**
 * The sidebar for the Finance Sidebar
 *
 * @package Decatur_2015
 */

if ( ! is_active_sidebar( 'sidebar-finance' ) ) { return; }

?><div id="secondary" class="widget-area sidebar-finance sidebar-content" role="complementary"><?php

	do_action( 'tha_sidebar_top' );

	dynamic_sidebar( 'sidebar-finance' );

	do_action( 'tha_sidebar_bottom' );

?></div><!-- #secondary -->
