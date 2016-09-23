<?php

/**
 * A class of helpful theme functions
 *
 * @package Decatur_2015
 * @author Slushman <chris@slushman.com>
 */
class decatur_2015_Actions_and_Filters {

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

		add_action( 'init', array( $this, 'disable_emojis' ) );
		add_action( 'after_setup_theme', array( $this, 'more_setup' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'enqueue_login' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin' ) );
		//add_filter( 'script_loader_tag', array( $this, 'async_scripts' ), 10, 2 ); // still troubleshooting this
		add_filter( 'post_mime_types', array( $this, 'add_mime_types' ) );
		add_filter( 'upload_mimes', array( $this, 'custom_upload_mimes' ) );
		add_filter( 'body_class', array( $this, 'page_body_classes' ) );
		add_action( 'wp_head', array( $this, 'background_images' ) );
		add_action( 'wp_footer', array( $this, 'initialize_scripts' ), 99 );
		add_filter( 'excerpt_length', array( $this, 'excerpt_length' ) );
		add_filter( 'excerpt_more', array( $this, 'excerpt_read_more' ) );
		add_filter( 'mce_buttons_2', array( $this, 'add_editor_buttons' ) );
		add_action( 'decatur_2015_breadcrumbs', array( $this, 'breadcrumbs' ) );
		add_filter( 'wpseo_breadcrumb_single_link', array( $this, 'unlink_private_pages' ), 10, 2 );
		add_filter( 'wpseo_breadcrumb_single_link', array( $this, 'subsite_link_home' ), 10, 2 );
		add_filter( 'wp_seo_get_bc_title', array( $this, 'remove_private' ) );
		add_filter( 'manage_page_posts_columns', array( $this, 'page_template_column_head' ), 10 );
		add_action( 'manage_page_posts_custom_column', array( $this, 'page_template_column_content' ), 10, 2 );
		add_filter( 'get_search_form', array( $this, 'make_search_button_a_button' ) );
		add_filter( 'style_loader_src', array( $this, 'remove_cssjs_ver' ), 10, 2 );
		add_filter( 'script_loader_src', array( $this, 'remove_cssjs_ver' ), 10, 2 );
		add_action( 'widgets_init', array( $this, 'more_widget_areas' ) );
		add_filter( 'wpseo_breadcrumb_links', array( $this, 'water_customer_service' ) );
		add_filter( 'wpseo_breadcrumb_links', array( $this, 'breadcrumb_permits_and_forms' ) );
		add_filter( 'wpseo_breadcrumb_links', array( $this, 'subsite_home_page' ) );
		add_filter( 'sm-location-cpt-args', array( $this, 'add_location_image' ) );

		add_action( 'tha_body_top', array( $this, 'analytics_code' ) );

		add_action( 'tha_header_top', array( $this, 'site_header_top' ) );
		add_action( 'tha_header_top', array( $this, 'add_hidden_search' ) );

		add_action( 'tha_header_bottom', array( $this, 'site_header_bottom' ) );

		add_action( 'tha_header_after', array( $this, 'add_precontent' ) );

		add_action( 'tha_content_bottom', array( $this, 'footer_logos' ) );

		add_action( 'tha_content_while_before', array( $this, 'page_title' ) );

		add_action( 'tha_content_while_after', array( $this, 'home_news_link' ) );

		add_action( 'tha_content_after', array( $this, 'add_postcontent' ) );

		add_action( 'tha_sidebars_before', array( $this, 'sidebars_employees' ) );
		add_action( 'tha_sidebars_before', array( $this, 'sidebars_jobs' ) );
		add_action( 'tha_sidebars_before', array( $this, 'sidebars_pages' ) );

	} // loader()

	/**
	 * Additional theme setup
	 * @return 	void
	 */
	public function more_setup() {

		register_nav_menus( array(
			'header' => esc_html__( 'Header', 'decatur-2015' ),
			'social' => esc_html__( 'Social Links', 'decatur-2015' )
		) );

		add_theme_support( 'yoast-seo-breadcrumbs' );

		add_image_size( 'homethumb', 250, 188, true );

	} // more_setup()

	/**
	 * Register more widget areas.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function more_widget_areas() {

		register_sidebar( array(
			'name'          => esc_html__( 'Home Sidebar', 'decatur-2015' ),
			'id'            => 'sidebar-home',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Home Bottom', 'decatur-2015' ),
			'id'            => 'sidebar-homebottom',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'City Admin', 'decatur-2015' ),
			'id'            => 'sidebar-cityadmin',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'City Clerk', 'decatur-2015' ),
			'id'            => 'sidebar-cityclerk',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Development Services', 'decatur-2015' ),
			'id'            => 'sidebar-devservices',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Finance', 'decatur-2015' ),
			'id'            => 'sidebar-finance',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Human Resources', 'decatur-2015' ),
			'id'            => 'sidebar-hr',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Licensing', 'decatur-2015' ),
			'id'            => 'sidebar-licensing',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Mayor & Council', 'decatur-2015' ),
			'id'            => 'sidebar-mayorcouncil',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Public Works', 'decatur-2015' ),
			'id'            => 'sidebar-publicworks',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Purchasing', 'decatur-2015' ),
			'id'            => 'sidebar-purchasing',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Transit', 'decatur-2015' ),
			'id'            => 'sidebar-transit',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Water', 'decatur-2015' ),
			'id'            => 'sidebar-water',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

	} // more_widget_areas()

	/**
	 * Add core editor buttons that are disabled by default
	 */
	function add_editor_buttons( $buttons ) {

		$buttons[] = 'superscript';
		$buttons[] = 'subscript';

		return $buttons;

	} // add_editor_buttons()

	/**
	 * Adds a hidden search field
	 *
	 * @return 		mixed 			The HTML markup for a search field
	 */
	public function add_hidden_search() {

		?><div aria-hidden="true" class="hidden-search-top" id="hidden-search-top">
			<div class="wrap"><?php

			get_search_form();

			?></div>
		</div><?php

	} // add_hidden_search()

	public function add_location_image( $params ) {

		$params['supports'] = array( 'title', 'editor', 'thumbnail' );

		return $params;

	} // add_location_image()

	/**
	 * Adds PDF as a filter for the Media Library
	 *
	 * @param 	array 		$post_mime_types 		The current MIME types
	 * @return 	array 								The modified MIME types
	 */
	public function add_mime_types( $post_mime_types ) {

		$post_mime_types['application/pdf'] = array( esc_html__( 'PDFs', 'decatur-2015' ), esc_html__( 'Manage PDFs', 'decatur-2015' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );
		$post_mime_types['text/x-vcard'] = array( esc_html__( 'vCards', 'decatur-2015' ), esc_html__( 'Manage vCards', 'decatur-2015' ), _n_noop( 'vCard <span class="count">(%s)</span>', 'vCards <span class="count">(%s)</span>' ) );

		return $post_mime_types;

	} // add_mime_types

	/**
	 * Inserts content after the main content and before the footer.
	 */
	public function add_postcontent() {

		//

	} // add_postcontent()

	/**
	 * Inserts content after the header and before the main content.
	 */
	public function add_precontent() {

		//

	} // add_precontent()

	/**
	 * Inserts Google Tag manager code after body tag
	 * @return 	mixed 		The inserted Google Tag Manager code
	 */
	public function analytics_code() {

		$tag = get_theme_mod( 'tag_manager' );

		if ( ! empty( $tag ) ) {

			echo $tag;

		}

	} // analytics_code()

	/**
	 * Sets the async attribute on all script tags.
	 */
	public function async_scripts( $tag, $handle ) {

		if ( is_admin() ) { return $tag; }

		$prefix = 'decatur-2015-';
		$check = strpos( $handle, $prefix );
		$count = strlen( $prefix );



		if ( 'FALSE' === $check || 0 < $check ) { return $tag; }

		echo '<pre>'; print_r( $check ); echo '</pre>';
		echo '<pre>'; print_r( $count ); echo '</pre>';

		return str_replace( ' src', ' async="async" src', $tag );

	} // async_scripts()

	/**
	 * Creates a style tag in the header with the background image
	 *
	 * @return 		void
	 */
	public function background_images() {

		//if ( is_front_page() && is_main_site() ) { return; }

		global $decatur_2015_themekit;

		$output = '';
		$image 	= '';

		if ( ! is_singular( 'employee' ) && ! is_singular( 'post' ) ) {

			$image = $decatur_2015_themekit->get_featured_images( get_the_ID() );

		}

		if ( ! $image ) {

			$image = get_theme_mod( 'default_header_image' );

		}

		if ( is_int( $image ) ) {

			$image 	= wp_prepare_attachment_for_js( $image );

		}

		$final 	= $image['sizes']['full']['url'];
		$mobile = $image['sizes']['large']['url'];

		if ( ! empty( $final ) || ! empty( $mobile ) ) {

			$output .= '<style>';

			if ( ! empty( $mobile ) ) {

				$output .= '@media screen and (max-width:767px){.site-header{background-image:url(' . $mobile . ');}}';

			}

			if ( ! empty( $final ) ) {

				$output .= '@media screen and (min-width:768px){.site-header{background-image:url(' . $final . ');}}';

			}

			$output .= '</style>';

		}

		echo $output;

	} // background_images()

	/**
	 * Returns the appropriate breadcrumbs.
	 *
	 * @return 		mixed 				WooCommerce breadcrumbs, then Yoast breadcrumbs
	 */
	public function breadcrumbs() {

		$crumbs = '';

		if ( function_exists( 'woocommerce_breadcrumb' ) ) {

			$args['after'] 			= '</span>';
			$args['before'] 		= '<span rel="v:child" typeof="v:Breadcrumb">';
			$args['delimiter'] 		= '&nbsp;>&nbsp;';
			$args['home'] 			= esc_html_x( 'Home', 'breadcrumb', 'decatur-2015' );
			$args['wrap_after'] 	= '</span></span></nav>';
			$args['wrap_before'] 	= '<nav class="woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb">';

			$crumbs = woocommerce_breadcrumb( $args );

		} elseif( function_exists( 'yoast_breadcrumb' ) ) {

			$crumbs = yoast_breadcrumb();

		}

		return $crumbs;

	} // breadcrumbs()

	/**
	 * Rebuilds the breadcrumbs if the referring page for
	 * Permits & Forms is Dev Services or a
	 * child of Dev Services.
	 *
	 * @param 	array 		$crumbs 			The current breadcrumbs
	 * @return 	array 							The modified breadcrumbs
	 */
	public function breadcrumb_permits_and_forms( $crumbs = array() ) {

		if ( ! is_page( 'permits-and-forms' ) ) { return $crumbs; }

		$referer = wp_get_referer();

		if ( ! strpos( $referer, '/development-services/' ) ) { return $crumbs; }

		$new[] 			= array_shift( $crumbs ); // home

		$depts 			= get_page_by_title( 'Departments' );
		$deptslink 		= get_permalink( $depts->ID );
		$new[]			= array( 'text' => 'Departments', 'url' => $deptslink, 'allow_html' => 1 );

		$devserv 		= get_page_by_title( 'Development Services' );
		$devservlink 	= get_permalink( $devserv->ID );
		$new[]			= array( 'text' => 'Development Services', 'url' => $devservlink, 'allow_html' => 1 );

		$new[] 			= array( 'text' => 'Permits and Forms' );

		return $new;

	} // breadcrumb_permits_and_forms()

	/**
	 * Adds support for additional MIME types to WordPress
	 *
	 * @param 		array 		$existing_mimes 			The existing MIME types
	 * @return 		array 									The modified MIME types
	 */
	public function custom_upload_mimes( $existing_mimes = array() ) {

		// add your extension to the array
		$existing_mimes['vcf'] = 'text/x-vcard';

		return $existing_mimes;

	} // custom_upload_mimes()

	/**
	 * Removes WordPress emoji support everywhere
	 */
	public function disable_emojis() {

		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	} // disable_emojis()

	/**
	 * Enqueues scripts and styles for the admin
	 */
	public function enqueue_admin() {

		wp_enqueue_style( 'decatur-2015-admin', get_stylesheet_directory_uri() . '/admin.css' );

	} // enqueue_admin()

	/**
	 * Enqueues scripts and styles for the login page
	 *
	 * @return 	void
	 */
	public function enqueue_login() {

		wp_enqueue_style( 'decatur-2015-login', get_stylesheet_directory_uri() . '/login.css', 10, 2 );
		//wp_enqueue_script( 'enquire', '//cdnjs.cloudflare.com/ajax/libs/enquire.js/2.1.2/enquire.min.js', array(), '20150804', true );

	} // enqueue_login()

	/**
	 * Enqueues scripts and styles for the front end
	 */
	public function enqueue_public() {

		wp_enqueue_style( 'decatur-2015-style', get_stylesheet_uri() );

		wp_enqueue_script( 'decatur-2015-public', get_stylesheet_directory_uri() . '/assets/js/public.min.js', array( 'jquery', 'enquire', 'jquery-ui-tabs' ), '20160822', true );

		//wp_enqueue_script( 'decatur-2015-navigation', get_stylesheet_directory_uri() . '/js/navigation.min.js', array(), '20120206', true );

		//wp_enqueue_script( 'decatur-2015-skip-link-focus-fix', get_stylesheet_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );

		wp_enqueue_style( 'dashicons' );

		wp_enqueue_script( 'enquire', '//cdnjs.cloudflare.com/ajax/libs/enquire.js/2.1.2/enquire.min.js', array(), '20150804', true );

		//wp_enqueue_script( 'decatur-2015-search', get_template_directory_uri() . '/js/hidden-search.min.js', array( 'jquery' ), '20150807', true );

		wp_enqueue_script( 'object-fit-images', get_stylesheet_directory_uri() . '/assets/js/ofi.min.js', array(), '20160525', true );

		if ( ! is_main_site() ) {

			wp_enqueue_script( 'decatur-2015-subsite-expand', get_stylesheet_directory_uri() . '/assets/js/subsite-expand.min.js', array( 'jquery', 'enquire' ), '20151020', true );

		} else {

			wp_enqueue_script( 'decatur-2015-mayor-city-mngr-expand-menu', get_stylesheet_directory_uri() . '/assets/js/mayor-city-mngr-expand-menu.min.js', array( 'jquery', 'enquire' ), '20151027', true );

		}

		//wp_enqueue_script( 'decatur-2015-main-menu-expand', get_stylesheet_directory_uri() . '/js/main-menu-expand.min.js', array( 'jquery', 'enquire' ), '20150807', true );

		//wp_enqueue_script( 'decatur-2015-collapse', get_stylesheet_directory_uri() . '/js/collapse-submenus.min.js', array( 'jquery' ), '20150812', true );

		//wp_enqueue_script( 'decatur-2015-tabs', get_stylesheet_directory_uri() . '/js/tabs.min.js', array( 'jquery', 'jquery-ui-tabs' ), '20151009', true );

		//wp_enqueue_script( 'decatur-2015-open-submenu', get_stylesheet_directory_uri() . '/js/check-to-open-submenu.min.js', array( 'jquery', 'enquire' ), '20151014', true );

		wp_enqueue_style( 'decatur-2015-fonts', $this->fonts_url(), array(), null );

	} // enqueue_public()

	/**
	 * Limits excerpt length
	 *
	 * @param 	int 		$length 			The current word length of the excerpt
	 * @return 	int 							The word length of the excerpt
	 */
	public function excerpt_length( $length ) {

		if ( is_home() || is_front_page() ) {

			return 30;

		}

		return $length;

	} // excerpt_length()

	/**
	 * Customizes the "Read More" text for excerpts
	 *
	 * @global   			$post 		The post object
	 * @param 	mixed 		$more 		The current "read more"
	 * @return 	mixed 					The modifed "read more"
	 */
	public function excerpt_read_more( $more ) {

		global $post;

		$return = sprintf( '... <a class="moretag read-more" href="%s">', esc_url( get_permalink( $post->ID ) ) );
		$return .= esc_html__( 'Read more', 'dcc-2015' );
		$return .= '<span class="screen-reader-text">';
		$return .= sprintf( esc_html__( ' about %s', 'dcc-2015' ), $post->post_title );
		$return .= '</span></a>';

		return $return;

	} // excerpt_read_more()

	/**
	 * Properly encode a font URLs to enqueue a Google font
	 *
	 * @return 	mixed 		A properly formatted, translated URL for a Google font
	 */
	public function fonts_url() {

		$return 	= '';
		$families 	= '';
		$fonts[] 	= array( 'font' => 'Roboto Condensed', 'weights' => '400,700', 'translate' => esc_html_x( 'on', 'Roboto Condensed font: on or off', 'decatur-2015' ) );

		foreach ( $fonts as $font ) {

			if ( 'off' == $font['translate'] ) { continue; }

			$families[] = $font['font'] . ':' . $font['weights'];

		}

		if ( ! empty( $families ) ) {

			$query_args['family'] 	= urlencode( implode( '|', $families ) );
			$query_args['subset'] 	= urlencode( 'latin,latin-ext' );
			$return 				= add_query_arg( $query_args, '//fonts.googleapis.com/css' );

		}

		return $return;

	} // fonts_url()

	/**
	 * Adds the footer logos
	 *
	 * @return [type] [description]
	 */
	public function footer_logos() {

		$logo = get_theme_mod( 'footer_logo' );

		if ( empty( $logo ) ) { return; }

		$image = wp_prepare_attachment_for_js( $logo );

		?><div class="seal">
			<img alt="<?php

				esc_html_e( $image['alt'], 'decatur-2015' );

			?>" class="seal-small" src="<?php

				echo esc_url( $image['sizes']['thumbnail']['url'] );

			?>">
		</div><?php

	} // footer_logos()

	/**
	 * Returns an array of post objects that are parents of the given post object.
	 * Reverses the order from get_post_ancestors so the oldest is now first in the array.
	 *
	 * @param 		obj 		$post 		Post object.
	 * @return 		array 					An array of post objects.
	 */
	private function get_parents( $post ) {

		if ( empty( $post ) || ! is_object( $post ) ) { return; }

		$rents 		= get_post_ancestors( $post );
		$rents 		= array_reverse( $rents );
		$parents 	= array();

		foreach ( $rents as $rent ) {

			$parents[] = get_post( $rent );

		}

		return $parents;

	} // get_parents()

	/**
	 * Returns the sidebar name for the given page slug.
	 *
	 * @param 		string 		$page 		Page slug.
	 * @return 		string 					The sidebar name.
	 */
	private function get_sidebar_name( $page ) {

		if ( empty( $page ) ) { return; }

		$sidebar = '';

		switch ( $page ) {

			case 'city-administration': 	$sidebar = 'cityadmin'; break;
			case 'city-clerk': 				$sidebar = 'cityclerk'; break;
			case 'development-services': 	$sidebar = 'devservices'; break;
			case 'finance': 				$sidebar = 'finance'; break;
			case 'human-resources': 		$sidebar = 'hr'; break;
			case 'licensing': 				$sidebar = 'licensing'; break;
			case 'mayor-and-council': 		$sidebar = 'mayorcouncil'; break;
			case 'public-works': 			$sidebar = 'publicworks'; break;
			case 'purchasing': 				$sidebar = 'purchasing'; break;
			case 'transit': 				$sidebar = 'transit'; break;
			case 'water': 					$sidebar = 'water'; break;

		} // switch

		return $sidebar;

	} // get_sidebar_name()

	/**
	 * Adds a link to the news page after home news section
	 */
	public function home_news_link() {

		if ( ! is_front_page() ) { return; }

		$pageID = get_theme_mod( 'home_news_url' );

		?><div class="link-home-news"><a href="<?php

			echo esc_url( get_permalink( $pageID ) );

		?>"><?php

			esc_html_e( get_theme_mod( 'home_news_text' ), 'decatur-2015' );

		?></a></div><?php

	} // home_news_link()

	/**
	 * Initializes scripts in the footer.
	 *
	 * @return 		mixed 			Script tags.
	 */
	public function initialize_scripts() {

		?><script>var sliderImages = document.querySelectorAll('img.soliloquy-image');objectFitImages(sliderImages);</script><?php

	} // initialize_scripts()

	/**
	 * Converts the search input button to an HTML5 button element
	 *
	 * @hook 		get_search_form
	 *
	 * @param 		mixed  		$form 			The current form HTML
	 * @return 		mixed 						The modified form HTML
	 */
	public function make_search_button_a_button( $form ) {

		$form = '<form action="' . esc_url( home_url( '/' ) ) . '" class="search-form" method="get" role="search" >
				<label class="screen-reader-text" for="site-search">' . _x( 'Search for:', 'label' ) . '</label>
				<input class="search-field" id="site-search" name="s" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder' ) . '" title="' . esc_attr_x( 'Search for:', 'label' ) . '" type="search" value="' . get_search_query() . '"  />
				<button type="submit" class="search-submit">
					<span class="screen-reader-text">'. esc_attr_x( 'Search', 'submit button' ) .'</span>
					<span class="dashicons dashicons-search"></span>
				</button>
			</form>';

		return $form;

	} // make_search_button_a_button()

	/**
	 * Adds classes to the body tag.
	 *
	 * @global 	$post						The $post object
	 * @param 	array 		$classes 		Classes for the body element.
	 * @return 	array 						The modified body class array
	 */
	public function page_body_classes( $classes ) {

		global $post, $decatur_2015_themekit;

		if ( empty( $post->post_content ) ) {

			$classes[] = 'content-none';

		} else {

			$classes[] = $post->post_name;

		}

		if ( is_page( 'departments' ) || $decatur_2015_themekit->is_tree( 'Departments' ) ) { // is descendant of departments

			$classes[] = 'depts-marg';

		}

		if ( is_page( 'permits-and-forms' ) ) {

			$referer = wp_get_referer();

			if ( strpos( $referer, '/development-services/' ) ) { // is permits and forms and came from DevServ

				$classes[] = 'depts-marg';

			}

		}

		if ( is_page( 'doing-business' ) || $decatur_2015_themekit->is_tree( 'Doing Business' ) ) { // is descendant of departments

			$classes[] = 'biz-marg';

		}

		if ( is_singular( 'employee' ) ) {

			$job_title 	= get_post_meta( get_the_ID(), 'job-title', TRUE );
			$classes[] 	= sanitize_title( $job_title );
			$terms 		= get_the_terms( get_the_ID(), 'department' );
			$show 		= TRUE;

			/**
			 * Loop through terms. Make $show FALSE if employee is in the
			 * mayor-and-council department.
			 */
			foreach ( $terms as $term ) {

				if ( 'mayor-and-council' === $term->slug ) {

					$show = FALSE;
					break;

				}

			} // foreach

			if ( $show ) {

				$classes[] 	= 'depts-marg';

			}

		} // is_singular()

		if ( is_multisite() ) {

			$info = get_blog_details();
			$class = str_replace( '/', '', $info->path );
			$classes[] = $class;

		}

		if ( is_main_site() ) {

			$classes[] = 'city';

		}

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {

			$classes[] = 'group-blog';

		}

		return $classes;

	} // page_body_classes()

	/**
	 * The content for each column cell
	 *
	 * @return 	mixed 		The cell content
	 */
	public function page_template_column_content( $column_name, $post_ID ) {

		if ( 'page_template' !== $column_name ) { return; }

		$slug 		= get_page_template_slug( $post_ID );
		$templates 	= get_page_templates();
		$name 		= array_search( $slug, $templates );

		if ( ! empty( $name ) ) {

			echo '<span class="name-template">' . $name . '</span>';

		} else {

			echo '<span class="name-template">' . esc_html( 'Default', 'decatur-2015' ) . '</span>';

		}

	} // page_template_column_content()

	/**
	 * Adds the page template column to the columns on the page listings
	 *
	 * @param 	array 		$defaults 			The current column names
	 * @return 	array           				The modified column names
	 */
	public function page_template_column_head( $defaults ) {

		$defaults['page_template'] = esc_html( 'Page Template', 'decatur-2015' );

		return $defaults;

	} // page_template_column_head()

	/**
	 * Displays the page title markup.
	 */
	public function page_title() {

		?><header class="page-header contentpage"><?php

			if ( ! is_front_page() ) {

				the_title( '<h1 class="page-title">', '</h1>' );

			} else {

				?><h1 class="page-title"><?php echo get_bloginfo( 'name' ); ?></h1><?php

			}

		?></header><!-- .entry-header --><?php

	} // page_title()

	/**
	 * Removes query strings from static resources
	 * to increase Pingdom and GTMatrix scores.
	 *
	 * Does not remove query strings from Google Font calls.
	 *
	 * @param 	string 		$src 			The resource URL
	 * @return 	string 						The modifed resource URL
	 */
	function remove_cssjs_ver( $src ) {

		if ( empty( $src ) ) { return; }
		if ( strpos( $src, 'https://fonts.googleapis.com' ) ) { return; }

		if ( strpos( $src, '?ver=' ) ) {

			$src = remove_query_arg( 'ver', $src );

		}

		return $src;

	} // remove_cssjs_ver()

	/**
	 * Removes the "Private" text from the private pages in the breadcrumbs
	 *
	 * @param 	string 		$text 			The breadcrumb text
	 * @return 	string 						The modified breadcrumb text
	 */
	public function remove_private( $text ) {

		$check = stripos( $text, 'Private: ' );

		if ( is_int( $check ) ) {

			$text = str_replace( 'Private: ', '', $text );

		}

		return $text;

	} // remove_private()

	/**
	 * Adds custom sidebars to employee pages
	 */
	public function sidebars_employees() {

		global $post;

		//showme( $post );

		if ( 'employee' !== get_post_type( $post ) ) { return; }

		$sidebar 	= '';
		$terms 		= get_the_terms( $post->ID, 'department' );

		foreach ( $terms as $term ) {

			if ( 'city-administration' === $term->slug ) {

				$sidebar = 'cityadmin'; break;

			} elseif ( 'mayor-and-council' === $term->slug ) {

				$sidebar = 'mayorcouncil'; break;

			}

		} // foreach

		if ( empty( $sidebar ) ) { return; }

		get_sidebar( $sidebar );

	} // sidebars_employees()

	/**
	 * Adds custom sidebars to job pages
	 */
	public function sidebars_jobs() {

		global $post;

		if ( 'job' !== get_post_type( $post ) ) { return; }

		$sidebar = 'hr';

		get_sidebar( $sidebar );

	} // sidebars_jobs()

	/**
	 * Adds sidebars, depending on the page
	 *
	 * If parents is empty or departments isn't the first parent, sidebar is the current post slug.
	 * If the page is water-customer-service, sidebar is based on the referrer.
	 * If the page is permits-and-forms, sidebar is based on the referrer.
	 * Otherwise, sidebar is the second parent post slug.
	 */
	public function sidebars_pages() {

		global $post;

		if ( 'page' !== get_post_type( $post ) ) { return; }

		$parents = $this->get_parents( $post );

		//echo '<pre>'; print_r( $parents ); echo '</pre>';

		if ( is_page( 'water-customer-service' ) ) {

			$referer = wp_get_referer();
			$sidebar = ( strpos( $referer, '/city-administration/' ) ? 'cityadmin' : 'water' );

		} elseif ( is_page( 'permits-and-forms' ) ) {

			$referer = wp_get_referer();

			if ( strpos( $referer, '/development-services/' ) ) {

				$sidebar = 'devservices';

			}

		} elseif ( empty( $parents ) || ( 'departments' === $parents[0]->post_name && ! isset( $parents[1] ) ) ) {

			$sidebar = $this->get_sidebar_name( $post->post_name );

		} elseif ( 'mayor-and-council' === $parents[0]->post_name && ! isset( $parents[1] ) ) {

			$sidebar = $this->get_sidebar_name( $parents[0]->post_name );

		} else {

			$sidebar = $this->get_sidebar_name( $parents[1]->post_name );

		}

		if ( empty( $sidebar ) ) { return; }

		get_sidebar( $sidebar );

	} // sidebars_pages()

	/**
	 * Adds the primary menu to the bottom of the header
	 *
	 * @return 		mixed 		The primary menu
	 */
	public function site_header_bottom() {

		get_template_part( 'menus/menu', 'primary' );

	} // site_header_top()

	/**
	 * Adds a slider to the homepage then adds the header menu.
	 *
	 * @return 		mixed 		The top header content
	 */
	public function site_header_top() {

		if ( is_front_page() && function_exists( 'soliloquy' ) ) {

			soliloquy( 'home', 'slug' );

		}

		get_template_part( 'menus/menu', 'header' );

	} // site_header_top()



	/**
	 * Changes the breadcrumbs on subsites to make the home crumbs the main site
	 *
	 * @param 	array 		$crumbs 			The current breadcrumbs
	 * @return 	array 							The modified breadcrumbs
	 */
	public function subsite_home_page( $crumbs = array() ) {

		if ( is_main_site() ) { return $crumbs; }

		$new 			= array();
		$current_home 	= array_shift( $crumbs );
		$mainsiteurl 	= network_site_url();
		$new[] 			= array( 'text' => 'City of Decatur, Illinois', 'url' => $mainsiteurl, 'allow_html' => 1 );
		$new[] 			= $current_home;

		if ( ! empty( $crumbs ) ) {

			foreach ( $crumbs as $crumb ) {

				$new[] = $crumb;

			} // foreach

		}

		return $new;

	} // subsite_home_page()

	/**
	 * Re-links the home crumb to the city site on subsites
	 *
	 * @param 	mixed 		$output 		The HTML output for the breadcrumb
	 * @param 	array 		$link 			Array of link info
	 *
	 * @return 	mixed 						The modified link output
	 */
	public function subsite_link_home( $output, $link ) {

		if ( is_main_site() ) { return $output; }
		if ( 'http://decaturcity.dev/' !== $link['url'] ) { return $output ; }

		$new = '';
		$new .= '<span typeof="v:Breadcrumb">';
		$new .= '<a href="' . $link['url'] . '" rel="v:url" property="v:title">City of Decatur, Illinois</a></span>';

		return $new;

	} // subsite_link_home()

	/**
	 * Unlinks breadcrumbs that are private pages
	 *
	 * @param 	mixed 		$output 		The HTML output for the breadcrumb
	 * @param 	array 		$link 			Array of link info
	 * @return 	mixed 						The modified link output
	 */
	public function unlink_private_pages( $output, $link ) {

		if ( ! isset( $link['url'] ) || empty( $link['url'] ) ) { return $output; }

		$id 		= url_to_postid( $link['url'] );
		$options 	= WPSEO_Options::get_all();

		if ( $options['breadcrumbs-home'] !== $link['text'] && 0 === $id ) {

			$output = '<span rel="v:child" typeof="v:Breadcrumb">' . $link['text'] . '</span>';

		}

		return $output;

	} // unlink_private_pages()

	/**
	 * Rebuilds the breadcrumbs if the referring page for
	 * Water Customer Service is City Administration or a
	 * child of City Administration.
	 *
	 * @param 	array 		$crumbs 			The current breadcrumbs
	 * @return 	array 							The modified breadcrumbs
	 */
	public function water_customer_service( $crumbs = array() ) {

		if ( ! is_page( 'water-customer-service' ) ) { return $crumbs; }

		$referer = wp_get_referer();

		if ( ! strpos( $referer, '/city-administration/' ) ) { return $crumbs; }

		$new[] 			= array_shift( $crumbs ); // home
		$new[] 			= array_shift( $crumbs ); // departments

		$cityadmin 		= get_page_by_title( 'City Administration' );
		$cityadminlink 	= get_permalink( $cityadmin->ID );
		$new[]			= array( 'text' => 'City Administration', 'url' => $cityadminlink, 'allow_html' => 1 );

		$finance 		= get_page_by_title( 'Finance' );
		$financelink 	= get_permalink( $finance->ID );
		$new[]			= array( 'text' => 'Finance', 'url' => $financelink, 'allow_html' => 1 );

		$new[] 			= array( 'text' => 'Water Customer Service' );

		return $new;

	} // water_customer_service()

} // class

/**
 * Make an instance so its ready to be used
 */
$decatur_2015_actions_and_filters = new decatur_2015_Actions_and_Filters();
