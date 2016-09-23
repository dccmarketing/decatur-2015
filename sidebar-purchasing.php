<?php
/**
 * The sidebar for the Purchasing Sidebar
 *
 * @package Decatur_2015
 */

if ( ! is_active_sidebar( 'sidebar-purchasing' ) ) { return; }

?><div id="secondary" class="widget-area sidebar-purchasing sidebar-content" role="complementary"><?php

	do_action( 'tha_sidebar_top' );

	dynamic_sidebar( 'sidebar-purchasing' );

	do_action( 'tha_sidebar_bottom' );

?></div><!-- #secondary -->
