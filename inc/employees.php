<?php

/**
 * A class of actions and filters to alter the appearance of the Employees plugin
 *
 * @package Decatur_2015
 * @author Slushman <chris@slushman.com>
 */
class decatur_2015_Employees {

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->loader();

	}

	/**
	 * Loads all filter and action calls
	 *
	 * @return [type] [description]
	 */
	private function loader() {

		add_action( 'employees-before-loop', array( $this, 'change_employees' ) );
		add_action( 'employees-single-after-loop', array( $this, 'single_employee_sidebar' ) );
		add_action( 'employees-before-single', array( $this, 'single_employee_before' ) );
		add_action( 'employees-after-single', array( $this, 'single_employee_after' ), 10 );
		add_action( 'employees-loop-content', array( $this, 'employee_loop_phone' ), 25, 2 );
		add_action( 'employees-loop-content', array( $this, 'employee_loop_no_h3' ), 15, 2 );
		add_action( 'employees-loop-content', array( $this, 'employee_loop_add_content' ), 25, 2 );
		add_action( 'employees-loop-content', array( $this, 'employee_loop_add_email' ), 25, 2 );
		add_action( 'employees-loop-content', array( $this, 'employee_loop_override_image' ), 11, 2 );
		add_action( 'employees-unordered-query-args', array( $this, 'employee_loop_sort_by_job_title' ) );

	} // loader()

	/**
	 * Changes Employees plugin conditionally
	 */
	public function change_employees() {

		//global $post;

		$templates = Employees_Template_Functions::this();

		if ( is_main_site() ) {

			if ( is_page( 'administration-and-staff' ) ) { // finance > admin & staff

				remove_action( 'employees-before-loop-content', array( $templates, 'loop_content_link_start' ), 15 );
				remove_action( 'employees-after-loop-content', array( $templates, 'loop_content_link_end' ), 10 );
				remove_action( 'employees-loop-content', array( $templates, 'loop_content_image' ), 10 );
				remove_action( 'employees-loop-content', array( $templates, 'loop_content_name' ), 15 );

			}

			if ( is_page( 'staff-contacts' ) ) { // DevServ > Staff Contacts

				remove_action( 'employees-before-loop-content', array( $templates, 'loop_content_link_start' ), 15 );
				remove_action( 'employees-after-loop-content', array( $templates, 'loop_content_link_end' ), 10 );
				remove_action( 'employees-loop-content', array( $templates, 'loop_content_name' ), 15 );

			}

			if ( is_page( 'contact-us' ) ) { // HR > Contact Us

				remove_action( 'employees-loop-content', array( $templates, 'loop_content_image' ), 10 );
				remove_action( 'employees-loop-content', array( $templates, 'loop_content_name' ), 15 );

			}

		} // city site

		if ( ! is_main_site() ) {

			if ( is_page( 'contact-us' ) ) { // police > ECS > contact us

				remove_action( 'employees-before-loop-content', array( $templates, 'loop_content_link_start' ), 15 );
				remove_action( 'employees-after-loop-content', array( $templates, 'loop_content_link_end' ), 10 );
				remove_action( 'employees-loop-content', array( $templates, 'loop_content_image' ), 10 );
				remove_action( 'employees-loop-content', array( $this, 'employee_loop_override_image' ), 11 );
				remove_action( 'employees-loop-content', array( $this, 'employee_loop_no_h3' ), 15 );

			}

		} // police & fire sites

	} // change_employees()

	/**
	 * Adds the post content to the loop
	 *
	 * @param  [type] $item [description]
	 * @param 	array 		$meta 			The employee metadata
	 * @return [type]       [description]
	 */
	public function employee_loop_add_content( $item, $meta ) {

		if ( ! is_page( 'staff-contacts' ) ) { return; }
		if ( empty( $item->post_content ) ) { return; }

		?><div class="employee-content"><?php

		echo apply_filters( 'the_content', $item->post_content );

		?></div><?php

	} // employee_loop_add_content()

	/**
	 * Adds email to the loop display
	 *
	 * @param  [type] $item [description]
	 * @param 	array 		$meta 			The employee metadata
	 * @return [type]       [description]
	 */
	public function employee_loop_add_email( $item, $meta ) {

		//if ( ! is_page( 'contact-us' ) || ( ! is_main_site() && ! is_page( 'administration' ) ) ) { return; }
		if ( empty( $meta['email-address'][0] ) ) { return; }

		$email = sanitize_email( $meta['email-address'][0] );

		?><p class="employee-loop-email"><a href="mailto:<?php echo $email; ?>"><?php echo $email ?></a></p><?php

	} // employee_loop_add_email()

	/**
	 * Overrides the employee loop image view
	 *
	 * @param  [type] $item [description]
	 * @param 	array 		$meta 			The employee metadata
	 * @return [type]       [description]
	 */
	public function employee_loop_override_image( $item, $meta ) {

		if ( ! is_page( 'contact-us' ) ) { return; }

		global $decatur_2015_themekit;

		$images = $decatur_2015_themekit->get_featured_images( $item->ID );

		if ( empty( $images ) ) {

			?><div class="employee-list-thumb"></div><?php
			return;

		}

		if ( array_key_exists( 'medium', $images['sizes'] ) ) {

			$source = apply_filters( 'employees-list-image', $images['sizes']['medium']['url'], $images );

		} else {

			$source = apply_filters( 'employees-list-image', $images['sizes']['full']['url'], $images );

		}

		?><div class="employee-list-thumb" style="background-image:url(<?php echo esc_url( $source ); ?>)"></div><?php

	} // employee_loop_override_image()

	/**
	 * Replaces the default Employees job title view
	 *
	 * @param 	array 		$meta 			The employee metadata
	 * @return 	mixed 						The new markup
	 */
	public function employee_loop_phone( $item, $meta ) {

		if ( empty( $meta['phone-office'][0] ) ) { return; }

		global $decatur_2015_themekit;

		?><p class="employee-list-phone"><?php

		echo $decatur_2015_themekit->make_phone_link( $meta['phone-office'][0] );

		?></p><?php

	} // employee_loop_phone()

	/**
	 * Replaces the default loop employees name view
	 *
	 * @param 	array 		$meta 			The employee metadata
	 * @return 	mixed 						The new markup
	 */
	public function employee_loop_no_h3( $item, $meta ) {

		if ( ! is_page( array( 'staff-contacts', 'contact-us', 'administration-and-staff' ) ) ) { return; }

		?><p class="employee-list-name" itemprop="name"><?php echo $item->post_title; ?></p><?php

	} // employee_loop_no_h3()

	/**
	 * Changes the query args to sort by job title
	 *
	 * @param  [type] $args [description]
	 * @return [type]       [description]
	 */
	public function employee_loop_sort_by_job_title( $args ) {

		$args['meta_key'] 	= 'job-title';
		$args['orderby'] 	= 'meta_value';

		return $args;

	} // employee_loop_sort_by_job_title()

	/**
	 * [single_employee_before description]
	 * @return [type] [description]
	 */
	public function single_employee_after() {

			?></main>
		</div><?php

	} // single_employee_after()

	/**
	 * [single_employee_before description]
	 * @return [type] [description]
	 */
	public function single_employee_before() {

		?><div class="wrap wrap-content sidebar-content">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main"><?php

	} // single_employee_before()

	/**
	 * Adds a sidebar to the single employee page.
	 *
	 * @return [type] [description]
	 */
	public function single_employee_sidebar() {

			?><div class="sidebars"><?php

				do_action( 'tha_sidebars_before' );

				get_sidebar();

				do_action( 'tha_sidebars_after' );

			?></div>
		</div><?php

	} // single_employee_sidebar()

} // class

/**
 * Make an instance so its ready to be used
 */
$decatur_2015_employees = new decatur_2015_Employees();
