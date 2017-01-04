<?php

/**
 * A class of helpful menu-related functions
 *
 * @package Decatur_2015
 * @author Slushman <chris@slushman.com>
 */
class decatur_2015_Menukit {

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->loader();

	} // __construct()

	/**
	 * Loads all filter and action calls
	 *
	 * @return 		void
	 */
	private function loader() {

		//add_filter( 'walker_nav_menu_start_el', array( $this, 'dashicon_before_menu_item' ), 10, 4 );
		//add_filter( 'walker_nav_menu_start_el', array( $this, 'dashicon_after_menu_item' ), 10, 4 );
		//add_filter( 'walker_nav_menu_start_el', array( $this, 'dashicon_only_menu_item' ), 10, 4 );
		add_filter( 'walker_nav_menu_start_el', array( $this, 'menu_caret' ), 10, 4 );
		add_filter( 'walker_nav_menu_start_el', array( $this, 'add_data_atts' ), 10, 4 );
		//add_filter( 'walker_nav_menu_start_el', array( $this, 'add_hidden_checkbox' ), 10, 4 );
		add_filter( 'walker_nav_menu_start_el', array( $this, 'svg_before_menu_item' ), 10, 4 );
		//add_filter( 'walker_nav_menu_start_el', array( $this, 'svg_after_menu_item' ), 10, 4 );
		add_filter( 'walker_nav_menu_start_el', array( $this, 'svg_only_menu_item' ), 10, 4 );
		add_filter( 'walker_nav_menu_start_el', array( $this, 'search_icon_only' ), 10, 4 );
		add_shortcode( 'listmenu', array( $this, 'list_menu' ) );
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'add_menu_title_as_class' ), 10, 1 );
		add_filter( 'nav_menu_css_class', array( $this, 'maybe_add_dept_classes' ), 10, 3 );
		add_filter( 'nav_menu_css_class', array( $this, 'maybe_add_biz_classes' ), 10, 3 );
		add_filter( 'nav_menu_css_class', array( $this, 'maybe_add_submenu_item_classes' ), 10, 3 );
		add_filter( 'walker_nav_menu_start_el', array( $this, 'add_collapse_menu_handle' ), 10, 4 );

	} // loader()

	public function add_data_atts( $item_output, $item, $depth, $args ) {

		if ( 'primary' !== $args->theme_location ) { return $item_output; }
		if ( ! in_array( 'menu-item-has-children', $item->classes ) ) { return $item_output; }

		if ( 'Departments' === $item->title ) {

			$data = 'open-dept';

		} else if ( 'Doing Business' === $item->title ) {

			$data = 'open-biz';

		} else {

			$data = '';

		}

		$atts 	= $this->get_attributes( $item );
		$output = '';

		$output .= '<a data-id="' . $data . '" href="' . $item->url . '" ' . $atts . '>' .  $item->title . '</a>';

		return $output;

	} // add_data_atts()

	/**
	 * Add Down Caret to Menus with Children
	 *
	 * @global 		 			$decatur_2015_themekit 			Themekit class
	 *
	 * @param 		string 		$item_output		//
	 * @param 		object 		$item				//
	 * @param 		int 		$depth 				//
	 * @param 		array 		$args 				//
	 *
	 * @return 		string 							modified menu
	 */
	public function add_hidden_checkbox( $item_output, $item, $depth, $args ) {

		if ( 'header' !== $args->theme_location ) { return $item_output; }
		if ( ! in_array( 'menu-item-has-children', $item->classes ) ) { return $item_output; }

		$atts 	= $this->get_attributes( $item );
		$output = '';

		$output .= '<div class="wrap-parent">';
		$output .= '<input class="hidden-checkbox" type="checkbox">';
		$output .= '<label class="text">' . $item->title . '</label>';
		$output .= '<span class="children">' . decatur_2015_get_svg( 'arrow-down' ) . '</span>';
		$output .= '</div>';

		return $output;

	} // add_hidden_checkbox()

	/**
	 * Adds the Menu Item Title as a class on the menu item
	 *
	 * @param 	object 		$menu_item 			A menu item object
	 */
	public function add_menu_title_as_class( $menu_item ) {

		$title = sanitize_title( $menu_item->title );

		if ( empty( $menu_item->classes ) || ! in_array( $title, $menu_item->classes ) ) {

			$menu_item->classes[] = $title;

		}

		return $menu_item;

	} // add_menu_title_as_class()

	/**
	 * Adds an Dashicon icon before the menu item text
	 *
	 * @link 	http://www.billerickson.net/customizing-wordpress-menus/
	 *
	 * @param 	string 		$item_output		//
	 * @param 	object 		$item				//
	 * @param 	int 		$depth 				//
	 * @param 	array 		$args 				//
	 *
	 * @return 	string 							modified menu
	 */
	public function dashicon_before_menu_item( $item_output, $item, $depth, $args ) {

		if ( 'footer' !== $args->theme_location ) { return $item_output; }

		$atts 	= $this->get_attributes( $item );
		$class 	= $item->classes[0];

		if ( empty( $class ) ) { return $item_output; }

		$output = '';

		$output .= '<a href="' . $item->url . '" class="icon-menu" ' . $atts . '>';
		$output .= '<span class="dashicons dashicons-' . $class . '"></span>';
		$output .= '<span class="menu-label">';
		$output .= $item->title;
		$output .= '</span>';
		$output .= '</a>';

		return $output;

	} // dashicon_before_menu_item()

	/**
	 * Adds a Dashicon after the menu item text
	 *
	 * @link 	http://www.billerickson.net/customizing-wordpress-menus/
	 *
	 * @param 	string 		$item_output		//
	 * @param 	object 		$item				//
	 * @param 	int 		$depth 				//
	 * @param 	array 		$args 				//
	 *
	 * @return 	string 							modified menu
	 */
	public function dashicon_after_menu_item( $item_output, $item, $depth, $args ) {

		if ( '' !== $args->theme_location || '' !== $args->theme_location ) { return $item_output; }

		$atts 	= $this->get_attributes( $item );
		$class 	= $item->classes[0];

		if ( empty( $class ) ) { return $item_output; }

		$output = '';

		$output .= '<a href="' . $item->url . '" class="icon-menu" ' . $atts . '>';
		$output .= '<span class="menu-label">';
		$output .= $item->title;
		$output .= '</span>';
		$output .= '<span class="dashicons dashicons-' . $class . '"></span>';
		$output .= '</a>';

		return $output;

	} // dashicon_after_menu_item()

	/**
	 * Replaces menu item text with an Dashicon
	 *
	 * @link 	http://www.billerickson.net/customizing-wordpress-menus/
	 *
	 * @param 	string 		$item_output		//
	 * @param 	object 		$item				//
	 * @param 	int 		$depth 				//
	 * @param 	array 		$args 				//
	 *
	 * @return 	string 							modified menu
	 */
	public function dashicon_only_menu_item( $item_output, $item, $depth, $args ) {

		if ( '' !== $args->theme_location ) { return $item_output; }

		$atts 	= $this->get_attributes( $item );
		$class 	= $item->classes[0];

		if ( empty( $class ) ) { return $item_output; }

		$output = '';

		$output .= '<a href="' . $item->url . '" class="icon-menu" ' . $atts . '>';
		$output .= '<span class="screen-reader-text">' . $item->title . '</span>';
		$output .= '<span class="dashicons dashicons-' . $class . '"></span>';
		$output .= '</a>';

		return $output;

	} // dashicon_only_menu_item()

	/**
	 * Add Down Caret to Menus with Children
	 *
	 * @global 		 			$decatur_2015_themekit 			Themekit class
	 *
	 * @param 		string 		$item_output		//
	 * @param 		object 		$item				//
	 * @param 		int 		$depth 				//
	 * @param 		array 		$args 				//
	 *
	 * @return 		string 							modified menu
	 */
	public function menu_caret( $item_output, $item, $depth, $args ) {

		if ( 'header' !== $args->theme_location ) { return $item_output; }
		if ( ! in_array( 'menu-item-has-children', $item->classes ) ) { return $item_output; }

		$atts 	= $this->get_attributes( $item );
		$output = '';

		$output .= '<a href="' . $item->url . '">';
		$output .= '<span class="text">' . $item->title . '</span>';
		//$output .= '<span class="dashicons dashicons-arrow-down"></span>';
		$output .= '<span class="children">' . decatur_2015_get_svg( 'arrow-down' ) . '</span>';
		$output .= '</a>';

		return $output;

	} // menu_caret()

	/**
	 * Adds an SVG icon before the menu item text
	 *
	 * @link 	http://www.billerickson.net/customizing-wordpress-menus/
	 *
	 * @param 	string 		$item_output		//
	 * @param 	object 		$item				//
	 * @param 	int 		$depth 				//
	 * @param 	array 		$args 				//
	 *
	 * @return 	string 							modified menu
	 */
	public function svg_before_menu_item( $item_output, $item, $depth, $args ) {

		if ( 'primary' !== $args->theme_location ) { return $item_output; }

		$atts 	= $this->get_attributes( $item );
		$class 	= $this->get_svg_by_class( $item->classes );

		if ( empty( $class ) ) { return $item_output; }

		$output = '';

		$output .= '<a href="' . $item->url . '" class="icon-menu" ' . $atts . '>';
		$output .= $class;
		$output .= '<span class="menu-label">';
		$output .= $item->title;
		$output .= '</span>';
		$output .= '</a>';

		return $output;

	} // svg_before_menu_item()

	/**
	 * Adds an SVG icon after the menu item text
	 *
	 * @link 	http://www.billerickson.net/customizing-wordpress-menus/
	 *
	 * @param 	string 		$item_output		//
	 * @param 	object 		$item				//
	 * @param 	int 		$depth 				//
	 * @param 	array 		$args 				//
	 *
	 * @return 	string 							modified menu
	 */
	public function svg_after_menu_item( $item_output, $item, $depth, $args ) {

		if ( '' !== $args->theme_location || 'subheader' !== $args->theme_location ) { return $item_output; }

		$atts 	= $this->get_attributes( $item );
		$class 	= $this->get_svg_by_class( $item->classes );

		if ( empty( $class ) ) { return $item_output; }

		$output = '';

		$output .= '<a href="' . $item->url . '" class="icon-menu" ' . $atts . '>';
		$output .= '<span class="menu-label">';
		$output .= $item->title;
		$output .= '</span>';
		$output .= $class;
		$output .= '</a>';

		return $output;

	} // svg_after_menu_item()

	/**
	 * Replaces menu item text with an SVG icon
	 *
	 * @link 	http://www.billerickson.net/customizing-wordpress-menus/
	 *
	 * @param 	string 		$item_output		//
	 * @param 	object 		$item				//
	 * @param 	int 		$depth 				//
	 * @param 	array 		$args 				//
	 *
	 * @return 	string 							modified menu
	 */
	public function svg_only_menu_item( $item_output, $item, $depth, $args ) {

		if ( is_int( $args->menu ) ) { return $item_output; }
		if ( 'social-menu' !== $args->menu->slug ) { return $item_output; }

		$atts 	= $this->get_attributes( $item );
		$class 	= $this->get_svg_by_class( $item->classes );

		if ( empty( $class ) ) { return $item_output; }

		$output = '';

		$output .= '<a aria-label="' . $item->title . '" href="' . $item->url . '" class="icon-menu" ' . $atts . '>';
		$output .= '<span class="screen-reader-text">' . $item->title . '</span>';
		$output .= $class;
		$output .= '</a>';

		return $output;

	} // svg_only_menu_item()

	/**
	 * Returns a string of HTML attributes for the menu item
	 *
	 * @param 	object 		$item 			The menu item object
	 * @return 	string 						A string of attributes
	 */
	public function get_attributes( $item ) {

		if ( empty( $item ) ) { return; }

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$attributes = '';

		foreach ( $atts as $attr => $value ) {

			if ( ! empty( $value ) ) {

				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';

			}

		}

		return $attributes;

	} // get_attributes()

	/**
	 * Gets the appropriate SVG based on a menu item class
	 *
	 * @global 		 			$decatur_2015_themekit 			Themekit class
	 * @param 		array 		$classes 					Array of classes to check
	 * @param 		string 		$link 						Optional to add to the SVG
	 * @return 		mixed 									SVG icon
	 */
	public function get_svg_by_class( $classes ) {

		$output = '';

		foreach ( $classes as $class ) {

			$check = decatur_2015_get_svg( $class );

			if ( ! is_null( $check ) ) { $output .= $check; break; }

		} // foreach

		return $output;

	} // get_svg_by_class()

	/**
	 * Returns a WordPress menu for a shortcode
	 *
	 * @param 	array 		$atts 			Shortcode attributes
	 * @param 	mixed 		$content 		The page content
	 * @return 	mixed 						A WordPress menu
	 */
	public function list_menu( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'menu'            => '',
			'container'       => 'div',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'depth'           => 0,
			'walker'          => '',
			'theme_location'  => ''),
			$atts )
		);

		return wp_nav_menu( array(
			'menu'            => $menu,
			'container'       => $container,
			'container_class' => $container_class,
			'container_id'    => $container_id,
			'menu_class'      => $menu_class,
			'menu_id'         => $menu_id,
			'echo'            => false,
			'fallback_cb'     => $fallback_cb,
			'before'          => $before,
			'after'           => $after,
			'link_before'     => $link_before,
			'link_after'      => $link_after,
			'depth'           => $depth,
			'walker'          => $walker,
			'theme_location'  => $theme_location )
		);

	} // list_menu()

	/**
	 * Adds the show-hide handle for collapsing submenus
	 *
	 * @link 	http://www.billerickson.net/customizing-wordpress-menus/
	 *
	 * @param 	string 		$item_output		//
	 * @param 	object 		$item				//
	 * @param 	int 		$depth 				//
	 * @param 	array 		$args 				//
	 *
	 * @return 	string 							modified menu
	 */
	public function add_collapse_menu_handle( $item_output, $item, $depth, $args ) {

		if ( ! is_int( $args->menu ) ) { return $item_output; }
		if ( ! in_array( 'menu-item-has-children', $item->classes ) ) { return $item_output; }

		$atts 	= $this->get_attributes( $item );
		$output = '';

		$output .= '<a href="' . $item->url . '" ' . $atts . '>';
		$output .= $item->title;
		$output .= '<span class="show-hide">+</span>';
		$output .= '</a>';

		return $output;

	} // add_collapse_menu_handle()

	/**
	 * Replaces only the search menu item with an icon
	 *
	 * @link 	http://www.billerickson.net/customizing-wordpress-menus/
	 *
	 * @param 	string 		$item_output		//
	 * @param 	object 		$item				//
	 * @param 	int 		$depth 				//
	 * @param 	array 		$args 				//
	 *
	 * @return 	string 							modified menu
	 */
	public function search_icon_only( $item_output, $item, $depth, $args ) {

		if ( 'header' !== $args->theme_location ) { return $item_output; }
		if ( 'Search' !== $item->post_title ) { return $item_output; }

		$class = $this->get_svg_by_class( $item->classes );

		if ( empty( $class ) ) { return $item_output; }

		$atts 	= $this->get_attributes( $item );
		$output = '';

		$output .= '<a aria-label="' . $item->title . '" href="' . $item->url . '" class="btn-search" ' . $atts . '>';
		$output .= '<span class="screen-reader-text">' . $item->title . '</span>';
		$output .= $class;
		$output .= '</a>';

		return $output;

	} // icons_only_menu_item()

	/**
	 * Adds classes conditionally.
	 *
	 * If the page is Doing Business or in the Doing Business tree, adds open-biz.
	 *
	 * @param 	array 		$classes 		The current classes
	 * @param 	object 		$item 			The menu item object
	 * @param 	array 		$args 			The menu item args
	 * @return 	array 						The modified classes
	 */
	public function maybe_add_biz_classes( $classes, $item, $args ) {

		global $post, $decatur_2015_themekit;

		//if ( empty( $post ) ) { return; }

		//showme( $post );

		if ( 'Doing Business' !== $item->title || ! is_main_site() ) { return $classes; }

		if ( 'Doing Business' === $item->title && ( 'doing-business' === $post->post_name || $decatur_2015_themekit->is_tree( 'Doing Business' ) ) ) {

			$classes[] = 'open-biz';

		}

		return $classes;

	} // maybe_add_biz_classes()

	/**
	 * Adds classes conditionally.
	 *
	 * If the page is Departments or in the Departments tree, adds open-dept.
	 *
	 * @param 	array 		$classes 		The current classes
	 * @param 	object 		$item 			The menu item object
	 * @param 	array 		$args 			The menu item args
	 * @return 	array 						The modified classes
	 */
	public function maybe_add_dept_classes( $classes, $item, $args ) {

		global $post, $decatur_2015_themekit;

		//if ( empty( $post ) ) { return; }

		//showme( $post );

		if ( 'Departments' !== $item->title || ! is_main_site() ) { return $classes; }

		if ( 'permits-and-forms' === $post->post_name ) {

			$referer = wp_get_referer();

			if ( strpos( $referer, '/development-services/' ) ) { // is permits and forms and came from DevServ

				$classes[] = 'open-dept';
				unset( $referer );

			}

		} elseif ( 'departments' === $post->post_name || $decatur_2015_themekit->is_tree( 'Departments' ) ) {

			$classes[] = 'open-dept';

		} elseif ( is_singular( 'employee' ) && 'tim-gleason' === $post->post_name ) {

			$classes[] = 'open-dept';

		}

		return $classes;

	} // maybe_add_dept_classes()

	/**
	 * Adds classes conditionally to submenu items.
	 *
	 * @param 	array 		$classes 		The current classes
	 * @param 	object 		$item 			The menu item object
	 * @param 	array 		$args 			The menu item args
	 * @return 	array 						The modified classes
	 */
	public function maybe_add_submenu_item_classes( $classes, $item, $args ) {

		global $post;

		if ( ! is_object( $post ) ) { return $classes; }
		if ( 'water-customer-service' !== $post->post_name ) { return $classes; }

		$referer = wp_get_referer();

		//showme( $referer );

		if ( $referer === $item->url ) { // referer matches URL for menu item

			$classes[] = 'current-referrer';
			unset( $referer );

		}

		return $classes;

	} // maybe_add_submenu_item_classes()

} // class

/**
 * Make an instance so its ready to be used
 */
$decatur_2015_menukit = new decatur_2015_Menukit();
