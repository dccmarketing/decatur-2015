<?php
/**
 * The sidebar for the City Clerk Sidebar
 *
 * @package Decatur_2015
 */

if ( ! is_active_sidebar( 'sidebar-cityclerk' ) ) { return; }

?><div id="secondary" class="widget-area sidebar-cityclerk sidebar-content" role="complementary"><?php

	do_action( 'tha_sidebar_top' );

	dynamic_sidebar( 'sidebar-cityclerk' );

	do_action( 'tha_sidebar_bottom' );

?></div><!-- #secondary -->