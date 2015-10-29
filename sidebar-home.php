<?php
/**
 * The sidebar for the Sidrbar Content page template
 *
 * @package Decatur_2015
 */

if ( ! is_active_sidebar( 'sidebar-home' ) ) { return; }

?><div id="secondary" class="widget-area sidebar-home sidebar-content" role="complementary"><?php

	do_action( 'tha_sidebar_top' );

	dynamic_sidebar( 'sidebar-home' );

	do_action( 'tha_sidebar_bottom' );

?></div><!-- #secondary -->