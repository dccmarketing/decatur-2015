<?php

/**
 * A class of helpful theme functions
 *
 * @package Decatur_2015
 * @author Slushman <chris@slushman.com>
 */
class decatur_2015_Themekit {

	/**
	 * Constructor
	 */
	public function __construct() {

		// Nothing to see here...

	}

	/**
	 * Returns an array of image info from the image URL
	 *
	 * @param 		string 		$name 				The name of the customizer image field
	 * @return 		array 							The image info array
	 */
	public function get_customizer_image_info( $name ) {

		if ( empty( $name ) ) { return FALSE; }

		$image_url = get_theme_mod( $name );

		if ( empty( $image_url ) ) { return FALSE; }

		$id = $this->get_image_id( $image_url );

		if ( empty( $id ) ) { return FALSE; }

		$info = wp_prepare_attachment_for_js( $id );

		return $info;

	} // get_customizer_image_info()

	/**
	 * Returns an array of the featured image details
	 *
	 * @param 	int 	$postID 		The post ID
	 *
	 * @return 	array 					Array of info about the featured image
	 */
	public function get_featured_images( $postID ) {

		if ( empty( $postID ) ) { return FALSE; }

		$imageID = get_post_thumbnail_id( $postID );

		if ( empty( $imageID ) ) { return FALSE; }

		return wp_prepare_attachment_for_js( $imageID );

	} // get_featured_images()

	/**
	 * Returns the appropriate class based on the page
	 *
	 * @return 		string 			Class name
	 */
	public function get_header_class() {

		if ( is_front_page() && is_main_site() ) { return; }

		$return = '';
		$referer = wp_get_referer();

		if ( is_singular( 'employee' ) && is_single( array( 'Tim Gleason', 'tim-gleason' ) ) ) {

			$return = 'open-dept';

		} elseif ( is_page( 'departments' ) || $this->is_tree( 'Departments' ) ) {

			$return = 'open-dept';

		} elseif ( ! is_main_site() ) {

			$return = 'open-dept';

		} elseif ( is_page( 'permits-and-forms' ) && strpos( $referer, '/development-services/' ) ) {

			$return = 'open-dept';

		} elseif ( is_page( 'doing-business' ) || $this->is_tree( 'Doing Business' ) ) {

			$return = 'open-biz';

		}

		return $return;

	} // get_header_class()

	/**
	 * Returns the attachment ID from the file URL
	 *
	 * @link 	https://pippinsplugins.com/retrieve-attachment-id-from-image-url/
	 * @param 	string 		$image_url 			The URL of the image
	 * @return 	int 							The image ID
	 */
	public function get_image_id( $image_url ) {

		if ( empty( $image_url ) ) { return FALSE; }

		global $wpdb;

		$attachment = $wpdb->get_col(
						$wpdb->prepare(
							"SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url
						)
					);

        return $attachment[0];

	} // get_image_id()

	/**
	 * Returns a post object of the requested post type
	 *
	 * @param 	string 		$post 			The name of the post type
	 * @param   array 		$params 		Optional parameters
	 * @return 	object 		A post object
	 */
	public function get_posts( $post, $params = array(), $cache = '' ) {

		$return = '';
		$cache_name = 'posts';

		if ( ! empty( $cache ) ) {

			$cache_name = '' . $cache . '_posts';

		}

		$return = wp_cache_get( $cache_name, 'posts' );

		if ( false === $return ) {

			$args['post_type'] 				= $post;
			$args['post_status'] 			= 'publish';
			$args['order_by'] 				= 'date';
			$args['posts_per_page'] 		= 50;
			$args['no_found_rows']			= true;
			$args['update_post_meta_cache'] = false;
			$args['update_post_term_cache'] = false;

			$args 	= wp_parse_args( $params, $args );
			$query 	= new WP_Query( $args );

			if ( ! is_wp_error( $query ) && $query->have_posts() ) {

				wp_cache_set( $cache_name, $query, 'posts', 5 * MINUTE_IN_SECONDS );

				$return = $query;

			}

		}

		return $return;

	} // get_posts()

	/**
	 * Returns the URL for the posts page
	 *
	 * @return 		string 						The URL for the posts page
	 */
	public function get_posts_page() {

		if( get_option( 'show_on_front' ) == 'page' ) {

			return get_permalink( get_option( 'page_for_posts' ) );

		} else  {

			return bloginfo( 'url' );

		}

	} // get_posts_page()

	/**
	 * Returns the URL of the featured image
	 *
	 * @param 	int 		$postID 		The post ID
	 * @param 	string 		$size 			The image size to return
	 *
	 * @return 	string | bool 				The URL of the featured image, otherwise FALSE
	 */
	public function get_thumbnail_url( $postID, $size = 'thumbnail' ) {

		if ( empty( $postID ) ) { return FALSE; }

		$thumb_id = get_post_thumbnail_id( $postID );

		if ( empty( $thumb_id ) ) { return FALSE; }

		$thumb_array = wp_get_attachment_image_src( $thumb_id, $size, true );

		if ( empty( $thumb_array ) ) { return FALSE; }

		return $thumb_array[0];

	} // get_thumbnail_url()

	/**
	 * Checks if a page is an ancestor of another page or not
	 *
	 * @param 	int | string 		$pid 			The page title or ID to check
	 * @return 	boolean 							TRUE if the page matches or is an ancestor, FALSE if not
	 */
	public function is_tree( $pid ) {

		if ( empty( $pid ) ) { return; }

		if ( is_int( $pid ) ) {

			$id = $pid;

		} elseif ( is_string( $pid ) ) {

			$page 	= get_page_by_title( $pid );

			if ( ! $page ) { return; }

			$id 	= $page->ID;

		}

		global $post;

		if ( is_page( $id ) ) { return TRUE; }
		if ( empty( $post ) ) { return FALSE; }

		$ancs = get_post_ancestors( $post->ID );

		foreach ( $ancs as $anc ) {

			if ( is_page() && $id === $anc ) { return TRUE; }

		}

		return FALSE;

	} // is_tree()

	/**
	 * Returns a Google Map link from an address
	 *
	 * @param 	string 		$address 		An address
	 * @return 	string 						URL for Google Maps
	 */
	public function make_map_link( $address ) {

		if( empty( $address ) ) { return FALSE; }

		$return = '';

		$query_args['q'] 	= urlencode( $address );
		$return 			= add_query_arg( $query_args, 'http://www.google.com/maps/' );

		return $return;

	} // make_map_link()

	/**
	 * Converts a phone number into a tel link
	 *
	 * NOTE: The screen reader label has "Call" before and "at" afterwards. Phrase accordingly.
	 * Example:
	 * 	$label = "Bob Gunderson".
	 * 	Result = "Call Bob Gunderson at".
	 *
	 * By default, the label is blank, which reads: Call (217) 555-5555 for screen readers.
	 *
	 * @param 	string 		$number 			A phone number
	 * @param 	string 		$labe 				An optional label for screen readers.
	 *
	 * @return 	mixed 							Formatted HTML telephone link
	 */
	public function make_phone_link( $number, $label = '' ) {

		if ( empty( $number ) ) { return FALSE; }

		$return = '';

		$formatted = preg_replace( '/[^0-9]/', '', $number );

		if ( ! is_numeric( $formatted ) ) { return FALSE; }

		$return .= '<a href="tel:' . $formatted . '">';
		$return .= '<span class="screen-reader-text">';

		if ( empty( $label ) ) {

			$return .= esc_html__( 'Call' . $label, 'decatur-2015' ) . ' </span>';

		} else {

			$return .= esc_html__( 'Call ' . $label . ' at ', 'decatur-2015' ) . '</span>';

		}

		$return .= $number . '</a>';

		return $return;

	} // make_phone_link()

	/**
	 * Reduce the length of a string by character count
	 *
	 * @param 	string 		$text 		The string to reduce
	 * @param 	int 		$limit 		Max amount of characters to allow
	 * @param 	string 		$after 		Text for after the limit
	 * @return 	string 					The possibly reduced string
	 */
	public function shorten_text( $text, $limit = 100, $after = '...' ) {

		$length = strlen( $text );
		$text 	= substr( $text, 0, $limit );

		if ( $length > $limit ) {

			$text = $text . $after;

		} // Ellipsis

		return $text;

	} // shorten_text()

	/**
	 * Returns an attachment by the filename
	 *
	 * @param 		string 			$post_name 				The post name
	 * @return 		object 									The attachment post object
	 */
	function wp_get_attachment_by_post_name( $post_name ) {

		if ( empty( $post_name ) ) { return 'Post name is empty'; }

		$args['name'] 			= trim ( $post_name );
		$args['post_per_page'] 	= 1;
		$args['post_status'] 	= 'any';

		$posts = $this->get_posts( 'attachment', $args, $post_name . '_attachments' );

		if ( $posts->posts[0] ) {

			return $posts->posts[0];

		}

		return FALSE;

	} // wp_get_attachment_by_post_name()

} // class

/**
 * Make an instance so its ready to be used
 */
$decatur_2015_themekit = new decatur_2015_Themekit();

/**
 * Prints whatever in a nice, readable format
 */
function showme( $input ) {

	echo '<pre>'; print_r( $input ); echo '</pre>';

} // showme()
