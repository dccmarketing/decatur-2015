<?php
/**
 * _s Theme Customizer.
 *
 * @package _s
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/**
 * City of Decatur 2015 Theme Customizer
 *
 * Contains methods for customizing the theme customization screen.
 *
 * @link 		https://codex.wordpress.org/Theme_Customization_API
 * @since 		1.0.0
 * @package  	DocBlock
 */
class decatur_2015_Customize {

   /**
	* This hooks into 'customize_register' (available as of WP 3.4) and allows
	* you to add new sections and controls to the Theme Customize screen.
	*
	* Note: To enable instant preview, we have to actually write a bit of custom
	* javascript. See live_preview() for more.
	*
	* Existing sections:
	*
	* title_tagline 20 - Site Identity
	* colors 40 - Colors
	* header_image 60 - Header Image
	* background_image 80 - Background Image
	* nav 100 - Navigation
	* widgets 110 - Widgets
	* static_front_page 120 - Static Front Page
	* default 160 - all others
	*
	* @access 		public
	* @see 			add_action( 'customize_register', $func )
	* @param 		WP_Customize_Manager 		$wp_customize 		Theme Customizer object.
	* @link 		http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
	* @since 		1.0.0
	*/
	public static function register( $wp_customize ) {

		// Google Tag Manager Field
		$wp_customize->add_setting(
			'tag_manager',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'tag_manager',
			array(
				'description' 	=> esc_html__( 'Paste in the Google Tag Manager code here.', 'decatur-2015' ),
				'label' => esc_html__( 'Google Tag Manager', 'decatur-2015' ),
				'priority' => 90,
				'section' => 'title_tagline',
				'settings' => 'tag_manager',
				'type' => 'textarea'
			)
		);
		$wp_customize->get_setting( 'tag_manager' )->transport = 'postMessage';



		// Theme Options Panel
		$wp_customize->add_panel( 'theme_options',
			array(
				'capability'  		=> 'edit_theme_options',
				'description'  		=> esc_html__( 'Options for City of Decatur 2015', 'decatur-2015' ),
				'priority'  		=> 10,
				'theme_supports'  	=> '',
				'title'  			=> esc_html__( 'Theme Options', 'decatur-2015' ),
			)
		);



		// Contact Info Section
		$wp_customize->add_section( 'contact_info',
			array(
				'capability' 	=> 'edit_theme_options',
				'description' 	=> esc_html__( 'Contact Info', 'decatur-2015' ),
				'panel' 		=> 'theme_options',
				'priority' 		=> 10,
				'title' 		=> esc_html__( 'Contact Info', 'decatur-2015' )
			)
		);



		// Contact Info Fields

		// Address 1 Field
		$wp_customize->add_setting(
			'address_1',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'address_1',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label'  	=> esc_html__( 'Address Line 1', 'decatur-2015' ),
				'priority' => 200,
				'section'  	=> 'contact_info',
				'settings' 	=> 'address_1',
				'type' 		=> 'text'
			)
		);
		$wp_customize->get_setting( 'address_1' )->transport = 'postMessage';

		// Address 2 Field
		$wp_customize->add_setting(
			'address_2',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'address_2',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label'  	=> esc_html__( 'Address Line 2', 'decatur-2015' ),
				'priority' => 210,
				'section'  	=> 'contact_info',
				'settings' 	=> 'address_2',
				'type' 		=> 'text'
			)
		);
		$wp_customize->get_setting( 'address_2' )->transport = 'postMessage';

		// City Field
		$wp_customize->add_setting(
			'city',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'city',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label'  	=> esc_html__( 'City', 'decatur-2015' ),
				'priority' => 220,
				'section'  	=> 'contact_info',
				'settings' 	=> 'city',
				'type' 		=> 'text'
			)
		);
		$wp_customize->get_setting( 'city' )->transport = 'postMessage';

		// US States Select Field
		$wp_customize->add_setting(
			'us_state',
			array(
				'default'  	=> 'choice1',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'us_state',
			array(
				'choices' => array(
					'AL' => esc_html__( 'Alabama', 'decatur-2015' ),
					'AK' => esc_html__( 'Alaska', 'decatur-2015' ),
					'AZ' => esc_html__( 'Arizona', 'decatur-2015' ),
					'AR' => esc_html__( 'Arkansas', 'decatur-2015' ),
					'CA' => esc_html__( 'California', 'decatur-2015' ),
					'CO' => esc_html__( 'Colorado', 'decatur-2015' ),
					'CT' => esc_html__( 'Connecticut', 'decatur-2015' ),
					'DE' => esc_html__( 'Delaware', 'decatur-2015' ),
					'DC' => esc_html__( 'District of Columbia', 'decatur-2015' ),
					'FL' => esc_html__( 'Florida', 'decatur-2015' ),
					'GA' => esc_html__( 'Georgia', 'decatur-2015' ),
					'HI' => esc_html__( 'Hawaii', 'decatur-2015' ),
					'ID' => esc_html__( 'Idaho', 'decatur-2015' ),
					'IL' => esc_html__( 'Illinois', 'decatur-2015' ),
					'IN' => esc_html__( 'Indiana', 'decatur-2015' ),
					'IA' => esc_html__( 'Iowa', 'decatur-2015' ),
					'KS' => esc_html__( 'Kansas', 'decatur-2015' ),
					'KY' => esc_html__( 'Kentucky', 'decatur-2015' ),
					'LA' => esc_html__( 'Louisiana', 'decatur-2015' ),
					'ME' => esc_html__( 'Maine', 'decatur-2015' ),
					'MD' => esc_html__( 'Maryland', 'decatur-2015' ),
					'MA' => esc_html__( 'Massachusetts', 'decatur-2015' ),
					'MI' => esc_html__( 'Michigan', 'decatur-2015' ),
					'MN' => esc_html__( 'Minnesota', 'decatur-2015' ),
					'MS' => esc_html__( 'Mississippi', 'decatur-2015' ),
					'MO' => esc_html__( 'Missouri', 'decatur-2015' ),
					'MT' => esc_html__( 'Montana', 'decatur-2015' ),
					'NE' => esc_html__( 'Nebraska', 'decatur-2015' ),
					'NV' => esc_html__( 'Nevada', 'decatur-2015' ),
					'NH' => esc_html__( 'New Hampshire', 'decatur-2015' ),
					'NJ' => esc_html__( 'New Jersey', 'decatur-2015' ),
					'NM' => esc_html__( 'New Mexico', 'decatur-2015' ),
					'NY' => esc_html__( 'New York', 'decatur-2015' ),
					'NC' => esc_html__( 'North Carolina', 'decatur-2015' ),
					'ND' => esc_html__( 'North Dakota', 'decatur-2015' ),
					'OH' => esc_html__( 'Ohio', 'decatur-2015' ),
					'OK' => esc_html__( 'Oklahoma', 'decatur-2015' ),
					'OR' => esc_html__( 'Oregon', 'decatur-2015' ),
					'PA' => esc_html__( 'Pennsylvania', 'decatur-2015' ),
					'RI' => esc_html__( 'Rhode Island', 'decatur-2015' ),
					'SC' => esc_html__( 'South Carolina', 'decatur-2015' ),
					'SD' => esc_html__( 'South Dakota', 'decatur-2015' ),
					'TN' => esc_html__( 'Tennessee', 'decatur-2015' ),
					'TX' => esc_html__( 'Texas', 'decatur-2015' ),
					'UT' => esc_html__( 'Utah', 'decatur-2015' ),
					'VT' => esc_html__( 'Vermont', 'decatur-2015' ),
					'VA' => esc_html__( 'Virginia', 'decatur-2015' ),
					'WA' => esc_html__( 'Washington', 'decatur-2015' ),
					'WV' => esc_html__( 'West Virginia', 'decatur-2015' ),
					'WI' => esc_html__( 'Wisconsin', 'decatur-2015' ),
					'WY' => esc_html__( 'Wyoming', 'decatur-2015' ),
					'AS' => esc_html__( 'American Samoa', 'decatur-2015' ),
					'AA' => esc_html__( 'Armed Forces America (except Canada)', 'decatur-2015' ),
					'AE' => esc_html__( 'Armed Forces Africa/Canada/Europe/Middle East', 'decatur-2015' ),
					'AP' => esc_html__( 'Armed Forces Pacific', 'decatur-2015' ),
					'FM' => esc_html__( 'Federated States of Micronesia', 'decatur-2015' ),
					'GU' => esc_html__( 'Guam', 'decatur-2015' ),
					'MH' => esc_html__( 'Marshall Islands', 'decatur-2015' ),
					'MP' => esc_html__( 'Northern Mariana Islands', 'decatur-2015' ),
					'PR' => esc_html__( 'Puerto Rico', 'decatur-2015' ),
					'PW' => esc_html__( 'Palau', 'decatur-2015' ),
					'VI' => esc_html__( 'Virgin Islands', 'decatur-2015' )
				),
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'State', 'decatur-2015' ),
				'priority' => 230,
				'section' => 'contact_info',
				'settings' => 'us_state',
				'type' => 'select'
			)
		);
		$wp_customize->get_setting( 'us_state' )->transport = 'postMessage';

		// Zip Code Field
		$wp_customize->add_setting(
			'zip_code',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'zip_code',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label'  	=> esc_html__( 'Zip Code', 'decatur-2015' ),
				'priority' => 240,
				'section'  	=> 'contact_info',
				'settings' 	=> 'zip_code',
				'type' 		=> 'text'
			)
		);
		$wp_customize->get_setting( 'zip_code' )->transport = 'postMessage';

		// Phone Number Field
		$wp_customize->add_setting(
			'phone_number',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'phone_number',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label'  	=> esc_html__( 'Phone Number', 'decatur-2015' ),
				'priority' => 250,
				'section'  	=> 'contact_info',
				'settings' 	=> 'phone_number',
				'type' 		=> 'text'
			)
		);
		$wp_customize->get_setting( 'phone_number' )->transport = 'postMessage';

		// Email Address Field
		$wp_customize->add_setting(
			'email_address',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'email_address',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label'  	=> esc_html__( 'Email Address', 'decatur-2015' ),
				'priority' => 260,
				'section'  	=> 'contact_info',
				'settings' 	=> 'email_address',
				'type' 		=> 'email'
			)
		);
		$wp_customize->get_setting( 'email_address' )->transport = 'postMessage';






/*
		// Theme Options Panel
		$wp_customize->add_panel( 'theme_options',
			array(
				'capability'  		=> 'edit_theme_options',
				'description'  		=> esc_html__( 'Options for City of Decatur 2015', 'decatur-2015' ),
				'priority'  		=> 10,
				'theme_supports'  	=> '',
				'title'  			=> esc_html__( 'Theme Options', 'decatur-2015' ),
			)
		);



		// New Section
		$wp_customize->add_section( 'new_section',
			array(
				'capability' 	=> 'edit_theme_options',
				'description' 	=> esc_html__( 'New Customizer Section', 'decatur-2015' ),
				'panel' 		=> 'theme_options',
				'priority' 		=> 10,
				'title' 		=> esc_html__( 'New Section', 'decatur-2015' )
			)
		);



		// Add Fields & Controls

		// Text Field
		$wp_customize->add_setting(
			'text_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'text_field',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label'  	=> esc_html__( 'Text Field', 'decatur-2015' ),
				'priority' => 10,
				'section'  	=> 'new_section',
				'settings' 	=> 'text_field',
				'type' 		=> 'text'
			)
		);
		$wp_customize->get_setting( 'text_field' )->transport = 'postMessage';



		// URL Field
		$wp_customize->add_setting(
			'url_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'url_field',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'URL Field', 'decatur-2015' ),
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'url_field',
				'type' => 'url'
			)
		);
		$wp_customize->get_setting( 'url_field' )->transport = 'postMessage';



		// Email Field
		$wp_customize->add_setting(
			'email_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'email_field',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'Email Field', 'decatur-2015' ),
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'email_field',
				'type' => 'email'
			)
		);
		$wp_customize->get_setting( 'email_field' )->transport = 'postMessage';

		// Date Field
		$wp_customize->add_setting(
			'date_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'date_field',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'Date Field', 'decatur-2015' ),
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'date_field',
				'type' => 'date'
			)
		);
		$wp_customize->get_setting( 'date_field' )->transport = 'postMessage';


		// Checkbox Field
		$wp_customize->add_setting(
			'checkbox_field',
			array(
				'default'  	=> 'true',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'checkbox_field',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'Checkbox Field', 'decatur-2015' ),
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'checkbox_field',
				'type' => 'checkbox'
			)
		);
		$wp_customize->get_setting( 'checkbox_field' )->transport = 'postMessage';




		// Password Field
		$wp_customize->add_setting(
			'password_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'password_field',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'Password Field', 'decatur-2015' ),
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'password_field',
				'type' => 'password'
			)
		);
		$wp_customize->get_setting( 'password_field' )->transport = 'postMessage';



		// Radio Field
		$wp_customize->add_setting(
			'radio_field',
			array(
				'default'  	=> 'choice1',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'radio_field',
			array(
				'choices' => array(
					'choice1' => esc_html__( 'Choice 1', 'decatur-2015' ),
					'choice2' => esc_html__( 'Choice 2', 'decatur-2015' ),
					'choice3' => esc_html__( 'Choice 3', 'decatur-2015' )
				),
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'Radio Field', 'decatur-2015' ),
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'radio_field',
				'type' => 'radio'
			)
		);
		$wp_customize->get_setting( 'radio_field' )->transport = 'postMessage';



		// Select Field
		$wp_customize->add_setting(
			'select_field',
			array(
				'default'  	=> 'choice1',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'select_field',
			array(
				'choices' => array(
					'choice1' => esc_html__( 'Choice 1', 'decatur-2015' ),
					'choice2' => esc_html__( 'Choice 2', 'decatur-2015' ),
					'choice3' => esc_html__( 'Choice 3', 'decatur-2015' )
				),
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'Select Field', 'decatur-2015' ),
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'select_field',
				'type' => 'select'
			)
		);
		$wp_customize->get_setting( 'select_field' )->transport = 'postMessage';



		// Textarea Field
		$wp_customize->add_setting(
			'textarea_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'textarea_field',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'Textarea Field', 'decatur-2015' ),
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'textarea_field',
				'type' => 'textarea'
			)
		);
		$wp_customize->get_setting( 'textarea_field' )->transport = 'postMessage';



		// Range Field
		$wp_customize->add_setting(
			'range_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'range_field',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'input_attrs' => array(
					'class' => 'range-field',
					'max' => 100,
					'min' => 0,
					'step' => 1,
					'style' => 'color: #020202'
				),
				'label' => esc_html__( 'Range Field', 'decatur-2015' ),
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'range_field',
				'type' => 'range'
			)
		);
		$wp_customize->get_setting( 'range_field' )->transport = 'postMessage';



		// Page Select Field
		$wp_customize->add_setting(
			'select_page_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'select_page_field',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'Select Page', 'decatur-2015' ),
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'select_page_field',
				'type' => 'dropdown-pages'
			)
		);
		$wp_customize->get_setting( 'dropdown-pages' )->transport = 'postMessage';



		// Color Chooser Field
		$wp_customize->add_setting(
			'color_field',
			array(
				'default'  	=> '#ffffff',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'color_field',
				array(
					'description' 	=> esc_html__( '', 'decatur-2015' ),
					'label' => esc_html__( 'Color Field', 'decatur-2015' ),
					'priority' => 10,
					'section' => 'new_section',
					'settings' => 'color_field'
				),
			)
		);
		$wp_customize->get_setting( 'color_field' )->transport = 'postMessage';



		// File Upload Field
		$wp_customize->add_setting( 'file_upload' );
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'file_upload',
				array(
					'description' 	=> esc_html__( '', 'decatur-2015' ),
					'label' => esc_html__( 'File Upload', 'decatur-2015' ),
					'priority' => 10,
					'section' => 'new_section',
					'settings' => 'file_upload'
				),
			)
		);



		// Image Upload Field
		$wp_customize->add_setting(
			'image_upload',
			array(
				'default' => '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'image_upload',
				array(
					'description' 	=> esc_html__( '', 'decatur-2015' ),
					'label' => esc_html__( 'Image Field', 'decatur-2015' ),
					'priority' => 10,
					'section' => 'new_section',
					'settings' => 'image_upload'
				)
			)
		);
		$wp_customize->get_setting( 'image_upload' )->transport = 'postMessage';



		// Media Upload Field
		// Can be used for images
		// Returns the image ID, not a URL
		$wp_customize->add_setting(
			'media_upload',
			array(
				'default' => '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'media_upload',
				array(
					'description' 	=> esc_html__( '', 'decatur-2015' ),
					'label' => esc_html__( 'Media Field', 'decatur-2015' ),
					'mime_type' => '',
					'priority' => 10,
					'section' => 'new_section',
					'settings' => 'media_upload'
				)
			)
		);
		$wp_customize->get_setting( 'media_upload' )->transport = 'postMessage';




		// Cropped Image Field
		$wp_customize->add_setting(
			'cropped_image',
			array(
				'default' => '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'cropped_image',
				array(
					'description' 	=> esc_html__( '', 'decatur-2015' ),
					'flex_height' => '',
					'flex_width' => '',
					'height' => '1080',
					'priority' => 10,
					'section' => 'new_section',
					'settings' => 'cropped_image',
					width' => '1920'
				)
			)
		);
		$wp_customize->get_setting( 'cropped_image' )->transport = 'postMessage';
		*/


		// Enable live preview JS
		$wp_customize->get_setting( 'blogname' )->transport 		= 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport 	= 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	} // register()

	/**
	 * This will output the custom WordPress settings to the live theme's WP head.
	 *
	 * Used by hook: 'wp_head'
	 *
	 * @access 		public
	 * @see 		add_action( 'wp_head', $func )
	 * @since 		1.0.0
	 */
	public static function header_output() {

		?><!-- Customizer CSS -->
		<style type="text/css"><?php

			// pattern:
			// decatur_2015_Customize::generate_css( 'selector', 'style', 'mod_name', 'prefix', 'postfix', true );
			//
			// background-image example:
			// decatur_2015_Customize::generate_css( '.class', 'background-image', 'background_image_example', 'url(', ')' );


		?></style><!-- Customizer CSS --><?php

	} // header_output()

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 *
	 * Used by hook: 'customize_preview_init'
	 *
	 * @access 		public
	 * @see 		add_action( 'customize_preview_init', $func )
	 * @since 		1.0.0
	 */
	public static function live_preview() {

		wp_enqueue_script( 'decatur_2015_customizer', get_template_directory_uri() . '/js/customizer.min.js', array( 'jquery', 'customize-preview' ), '', true );

	} // live_preview()

	/**
	 * This will generate a line of CSS for use in header output. If the setting
	 * ($mod_name) has no defined value, the CSS will not be output.
	 *
	 * @access 		public
	 * @since 		1.0.0
	 * @param 		string 		$selector 		CSS selector
	 * @param 		string 		$style 			The name of the CSS *property* to modify
	 * @param 		string 		$mod_name 		The name of the 'theme_mod' option to fetch
	 * @param 		string 		$prefix 		Optional. Anything that needs to be output before the CSS property
	 * @param 		string 		$postfix 		Optional. Anything that needs to be output after the CSS property
	 * @param 		bool 		$echo 			Optional. Whether to print directly to the page (default: true).
	 * @return 		string 						Returns a single line of CSS with selectors and a property.
	 */
	public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {

		$return = '';
		$mod 	= get_theme_mod( $mod_name );

		if ( ! empty( $mod ) ) {

			$return = sprintf('%s { %s:%s; }',
				$selector,
				$style,
				$prefix . $mod . $postfix
			);

			if ( $echo ) {

				echo $return;

			}

		}

		return $return;

	} // generate_css()

} // class

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'decatur_2015_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'decatur_2015_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'decatur_2015_Customize' , 'live_preview' ) );
