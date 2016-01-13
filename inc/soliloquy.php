<?php

/**
 * A class of functions for changing Soliloquy
 *
 * @package Decatur_2015
 * @author Slushman <chris@slushman.com>
 */
class decatur_2015_Soliloquy {

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->loader();

	}

	/**
	 * Loads all filter and action calls
	 */
	private function loader() {

		add_action( 'soliloquy_tab_images', array( $this, 'add_notes' ), 9 );
		add_filter( 'soliloquy_output_caption', array( $this, 'soliloquy_first_slide' ), 10, 5 );
		add_filter( 'soliloquy_output_caption', array( $this, 'soliloquy_link_caption' ), 9999, 5 );

	} // loader()

	public function add_notes() {

		echo '<p class="admin-notes update-nag">' . esc_html__( 'NOTE: Slides for the homepage need to be 1200px by 645px or larger.', 'decatur-2015' ) . '</p>';

	} //

	/**
	 * Create a new caption for the first slide.
	 *
	 * @param 		string 		$caption 		Current Slide Caption
	 * @param 		int 		$slideID 		Current Slide ID
	 * @param 		array 		$slide 			Current Slide Data
	 * @param 		array 		$data 			Slider Configuration
	 * @param 		int			$i 				Current Slide Index in Slides
	 * @return 		string 						Caption
	 */
	public function soliloquy_first_slide( $caption, $id, $item, $data, $i ) {

		if ( 1 !== $i ) { return $caption; }

		global $decatur_2015_themekit;

		$caption = '';
		$caption .= '<p class="site-title">';
		$caption .= '<a href="' . esc_url( site_url() ) . '">';
		$caption .= '<span class="screen-reader-text">' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
		$caption .= $decatur_2015_themekit->get_svg( 'logo' );
		$caption .= '</a></p>';

		return $caption;

	} // soliloquy_first_slide()

	/**
	 * If the slide has a link, close the link after the entire caption output.
	 *
	 * @param 		string 		$output 		Current caption output
	 * @param 		int 		$slideID 		Current Slide ID
	 * @param 		array 		$item 			Current Slide Data
	 * @param 		array 		$data 			Slider Configuration
	 * @param 		int			$i 				Current Slide Index in Slides
	 * @return 		string 						The output
	 */
	public function soliloquy_link_after_caption( $output, $id, $item, $data, $i ) {

		if ( empty( $item['link'] ) || ! isset( $item['link'] ) ) { return $output; }

		$output .= '</a>';

		return $output;

	} // soliloquy_link_after_caption()

	/**
	 * If the slide has a link, begin the link before the entire caption output.
	 *
	 * @param 		string 		$output 		Current caption output
	 * @param 		int 		$slideID 		Current Slide ID
	 * @param 		array 		$item 			Current Slide Data
	 * @param 		array 		$data 			Slider Configuration
	 * @param 		int			$i 				Current Slide Index in Slides
	 * @return 		string 						The output
	 */
	public function soliloquy_link_before_caption( $output, $id, $item, $data, $i ) {

		if ( empty( $item['link'] ) || ! isset( $item['link'] ) ) { return $output; }

		$output .= '<a class="link-caption" href="' . esc_url( $item['link'] ) . '">';

		return $output;

	} // soliloquy_link_before_caption()

	/**
	 * Link the caption to the hyperlink, if specified
	 *
	 * @param 		string 		$caption 		Current Slide Caption
	 * @param 		int 		$id 			Current Slide ID
	 * @param 		array 		$item 			Current Slide Data
	 * @param 		array 		$data 			Slider Configuration
	 * @param 		int			$i 				Current Slide Index in Slides
	 * @return 		string 						Caption
	 */
	public function soliloquy_link_caption( $caption, $id, $item, $data, $i ) {

		if ( empty( $item['link'] ) || ! isset( $item['link'] ) ) { return $caption; }

		$caption = '<a href="' . esc_url( $item['link'] ) . '">' . $caption . '</a>';

		return $caption;

	} // soliloquy_link_caption()

} // class

/**
 * Make an instance so its ready to be used
 */
$decatur_2015_soliloquy = new decatur_2015_Soliloquy();

