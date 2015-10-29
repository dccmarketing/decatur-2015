<?php
/**
 * The sidebar for the City Admin Sidebar
 *
 * @package Decatur_2015
 */

if ( ! is_active_sidebar( 'sidebar-water' ) ) { return; }

do_action( 'tha_sidebars_before' );

?><div id="secondary" class="widget-area sidebar-water sidebar-content" role="complementary"><?php

	do_action( 'tha_sidebar_top' );

	dynamic_sidebar( 'sidebar-water' );

	do_action( 'tha_sidebar_bottom' );

?></div><!-- #secondary --><?php

do_action( 'tha_sidebars_after' );