<?php

/**
 * A class of actions and filters to alter the appearance of the Now Hiring plugin
 *
 * @package Decatur_2015
 * @author Slushman <chris@slushman.com>
 */
class decatur_2015_Now_Hiring {

	/**
	 * Constructor
	 */
	public function __construct() {

		if ( is_main_site() ) {

			$this->loader();

		}

	} // __construct()

	/**
	 * Loads all filter and action calls
	 */
	private function loader() {

		$now_hiring_templates = Now_Hiring_Template_Functions::this();

		remove_action( 'now-hiring-single-content', array( $now_hiring_templates, 'single_post_title' ), 10 );

		add_action( 'now-hiring-after-single', array( $this, 'single_job_sidebar' ) );
		add_action( 'now-hiring-before-single-content', array( $this, 'single_job_before' ) );
		add_action( 'now-hiring-after-single', array( $this, 'single_job_after' ), 10 );

	} // loader()

	/**
	 * [single_job_after description]
	 * @return [type] [description]
	 */
	public function single_job_after() {

			?></main>
		</div><?php

	} // single_job_after()

	/**
	 * [single_job_before description]
	 * @return [type] [description]
	 */
	public function single_job_before() {

		?><div class="wrap wrap-content sidebar-content">
		<header class="page-header contentpage"><?php

			the_title( '<h1 class="page-title title-job">', '</h1>' );

		?></header><!-- .entry-header -->
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main"><?php

	} // single_job_before()

	/**
	 * Adds a sidebar to the single job page.
	 *
	 * @return [type] [description]
	 */
	public function single_job_sidebar() {

			?><div class="sidebars"><?php

				do_action( 'tha_sidebars_before' );

				get_sidebar( 'now-hiring' );

				do_action( 'tha_sidebars_after' );

			?></div>
		</div><?php

	} // single_job_sidebar()

} // class

/**
 * Make an instance so its ready to be used
 */
$decatur_2015_now_hiring = new decatur_2015_Now_Hiring();