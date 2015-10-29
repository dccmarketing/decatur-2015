<?php
/**
 * The sidebar for the Sidrbar Content page template
 *
 * @package Decatur_2015
 */

if ( ! is_active_sidebar( 'sidebar-homebottom' ) ) { return; }

do_action( 'tha_sidebars_before' );

?><div id="secondary" class="widget-area sidebar-homebottom" role="complementary"><?php

	do_action( 'tha_sidebar_top' );

	dynamic_sidebar( 'sidebar-homebottom' );

	do_action( 'tha_sidebar_bottom' );

?></div><!-- #secondary --><?php

do_action( 'tha_sidebars_after' );