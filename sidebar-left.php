<?php
/**
 * The sidebar for the Sidrbar Content page template
 *
 * @package DocBlock
 */

if ( ! is_active_sidebar( 'sidebar-left' ) ) { return; }

do_action( 'tha_sidebars_before' );

?><div id="secondary" class="widget-area sidebar-left" role="complementary"><?php

	do_action( 'tha_sidebar_top' );

	dynamic_sidebar( 'sidebar-left' );

	do_action( 'tha_sidebar_bottom' );

?></div><!-- #secondary --><?php

do_action( 'tha_sidebars_after' );