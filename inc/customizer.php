<?php
/**
 * City of Decatur 2015 Theme Customizer
 *
 * Contains methods for customizing the theme customization screen.
 *
 * @link 		https://codex.wordpress.org/Theme_Customization_API
 * @since 		1.0.0
 * @package  	DocBlock
 */

// Register panels, sections, and controls
add_action( 'customize_register', 'decatur_2015_register_panels' );
add_action( 'customize_register', 'decatur_2015_register_sections' );
add_action( 'customize_register', 'decatur_2015_register_fields' );

// Output custom CSS to live site
add_action( 'wp_head', 'decatur_2015_header_output' );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init', 'decatur_2015_live_preview' );

/**
 * Registers custom panels for the Customizer
 *
 * @see			add_action( 'customize_register', $func )
 * @param 		WP_Customize_Manager 		$wp_customize 		Theme Customizer object.
 * @link 		http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
 * @since 		1.0.0
 */
function decatur_2015_register_panels( $wp_customize ) {

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

	// Quick Links Panel
	$wp_customize->add_panel( 'quick_links',
		array(
			'capability'  		=> 'edit_theme_options',
			'description'  		=> esc_html__( 'The default quick links for the site.', 'decatur-2015' ),
			'priority'  		=> 10,
			'theme_supports'  	=> '',
			'title'  			=> esc_html__( 'Default Quick Links', 'decatur-2015' ),
		)
	);


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
	*/

} // decatur_2015_register_panels()

/**
 * Registers custom sections for the Customizer
 *
 * Existing sections:
 *
 * Slug 				Priority 		Title
 *
 * title_tagline 		20 				Site Identity
 * colors 				40				Colors
 * header_image 		60				Header Image
 * background_image 	80				Background Image
 * nav 					100 			Navigation
 * widgets 				110 			Widgets
 * static_front_page 	120 			Static Front Page
 * default 				160 			all others
 *
 * @see			add_action( 'customize_register', $func )
 * @param 		WP_Customize_Manager 		$wp_customize 		Theme Customizer object.
 * @link 		http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
 * @since 		1.0.0
 */
function decatur_2015_register_sections( $wp_customize ) {

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

	// Home Page Section
	$wp_customize->add_section( 'homepage',
		array(
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__( 'Home Page', 'decatur-2015' ),
			'panel' 		=> 'theme_options',
			'priority' 		=> 10,
			'title' 		=> esc_html__( 'Home Page', 'decatur-2015' )
		)
	);

	// Images Section
	$wp_customize->add_section( 'images',
		array(
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__( 'Images', 'decatur-2015' ),
			'panel' 		=> 'theme_options',
			'priority' 		=> 10,
			'title' 		=> esc_html__( 'Images', 'decatur-2015' )
		)
	);

	// Quick Links Sections
	foreach ( range( 1, 10 ) as $num ) {

		$wp_customize->add_section( 'quick_link' . $num,
			array(
				'capability' 	=> 'edit_theme_options',
				'description' 	=> esc_html__( 'Quick Link ' . $num, 'decatur-2015' ),
				'panel' 		=> 'quick_links',
				'priority' 		=> 10,
				'title' 		=> esc_html__( 'Quick Link ' . $num, 'decatur-2015' )
			)
		);

	}



	/*
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
	*/

} // decatur_2015_register_sections()

/**
 * Registers controls/fields for the Customizer
 *
 * Note: To enable instant preview, we have to actually write a bit of custom
 * javascript. See live_preview() for more.
 *
 * Note: To use active_callbacks, don't add these to the selecting control, it apepars these conflict:
 * 		'transport' => 'postMessage'
 * 		$wp_customize->get_setting( 'field_name' )->transport = 'postMessage';
 *
 * @see			add_action( 'customize_register', $func )
 * @param 		WP_Customize_Manager 		$wp_customize 		Theme Customizer object.
 * @link 		http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
 * @since 		1.0.0
 */
function decatur_2015_register_fields( $wp_customize ) {

	// Enable live preview JS for default fields
	$wp_customize->get_setting( 'blogname' )->transport 		= 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport 	= 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



	// Site Identity Section Fields

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






	// Contact Info Section Fields

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






	// Home Section Fields

	// Home Page Video URL Field
	$wp_customize->add_setting(
		'homevideo',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'homevideo',
		array(
			'description' 	=> esc_html__( 'Paste the YouTube URL to feature on the home page.', 'decatur-2015' ),
			'label' => esc_html__( 'Home Page Video', 'decatur-2015' ),
			'priority' => 10,
			'section' => 'homepage',
			'settings' => 'homevideo',
			'type' => 'url'
		)
	);
	$wp_customize->get_setting( 'homevideo' )->transport = 'postMessage';

	// Homepage News Link Text
	$wp_customize->add_setting(
		'home_news_text',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'home_news_text',
		array(
			'description' 	=> esc_html__( '', 'decatur-2015' ),
			'label'  	=> esc_html__( 'Homepage News Link Text', 'decatur-2015' ),
			'priority' => 10,
			'section'  	=> 'homepage',
			'settings' 	=> 'home_news_text',
			'type' 		=> 'text'
		)
	);
	$wp_customize->get_setting( 'home_news_text' )->transport = 'postMessage';

	// Internal URL Select Field
	$wp_customize->add_setting(
		'home_news_url',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'home_news_url',
		array(
			'description' 	=> esc_html__( '', 'decatur-2015' ),
			'label' => esc_html__( 'Select Internal Page', 'decatur-2015' ),
			'priority' => 10,
			'section' => 'homepage',
			'settings' => 'home_news_url',
			'type' => 'dropdown-pages'
		)
	);
	$wp_customize->get_setting( 'home_news_url' )->transport = 'postMessage';






	// Images Section Fields

	// Media Upload Field
	// Can be used for images
	// Returns the image ID, not a URL
	$wp_customize->add_setting(
		'default_header_image',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'default_header_image',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'Default Header Image', 'decatur-2015' ),
				'mime_type' => '',
				'priority' => 10,
				'section' => 'images',
				'settings' => 'default_header_image'
			)
		)
	);
	$wp_customize->get_setting( 'default_header_image' )->transport = 'postMessage';

	// Media Upload Field
	// Can be used for images
	// Returns the image ID, not a URL
	$wp_customize->add_setting(
		'footer_logo',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'footer_logo',
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'Footer Logo', 'decatur-2015' ),
				'mime_type' => '',
				'priority' => 10,
				'section' => 'images',
				'settings' => 'footer_logo'
			)
		)
	);
	$wp_customize->get_setting( 'footer_logo' )->transport = 'postMessage';



	// Quick Links Fields

	foreach ( range( 1, 10 ) as $num ) {

		// Quick Link Text Field
		$wp_customize->add_setting(
			'quicklinktext' . $num,
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'quicklinktext' . $num,
			array(
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label'  	=> esc_html__( 'Quick Link ' . $num . ' Text', 'decatur-2015' ),
				'priority' => 10,
				'section'  	=> 'quick_link' . $num,
				'settings' 	=> 'quicklinktext' . $num,
				'type' 		=> 'text'
			)
		);
		$wp_customize->get_setting( 'quicklinktext' . $num )->transport = 'postMessage';



		// Internal or External Link Field
		$wp_customize->add_setting(
			'linktype' . $num,
			array(
				'default'  	=> '',
			)
		);
		$wp_customize->add_control(
			'linktype' . $num,
			array(
				'choices' => array(
					'internal' => esc_html__( 'Internal Link', 'decatur-2015' ),
					'external' => esc_html__( 'External Link', 'decatur-2015' )
				),
				'description' => esc_html__( 'Will this link to a page on this site or somewhere else?', 'decatur-2015' ),
				'label' => esc_html__( 'Link Type ' . $num, 'decatur-2015' ),
				'priority' => 10,
				'section' => 'quick_link' . $num,
				'settings' => 'linktype' . $num,
				'type' => 'radio'
			)
		);



		// Internal URL Select Field
		$wp_customize->add_setting(
			'internalpageid' . $num,
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'internalpageid' . $num,
			array(
				'active_callback' => 'decatur_2015_linktype_callback' . $num,
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'Select Internal Page ' . $num, 'decatur-2015' ),
				'priority' => 10,
				'section' => 'quick_link' . $num,
				'settings' => 'internalpageid' . $num,
				'type' => 'dropdown-pages'
			)
		);
		$wp_customize->get_setting( 'internalpageid' . $num )->transport = 'postMessage';



		// External Link URL Field
		$wp_customize->add_setting(
			'externallinkurl' . $num,
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'externallinkurl' . $num,
			array(
				'active_callback' => 'decatur_2015_linktype_callback' . $num,
				'description' 	=> esc_html__( '', 'decatur-2015' ),
				'label' => esc_html__( 'External Link URL ' . $num, 'decatur-2015' ),
				'priority' => 10,
				'section' => 'quick_link' . $num,
				'settings' => 'externallinkurl' . $num,
				'type' => 'url'
			)
		);
		$wp_customize->get_setting( 'externallinkurl' . $num )->transport = 'postMessage';

	} // foreach



	/*
	// Fields & Controls

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

} // decatur_2015_register_fields()

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
function decatur_2015_generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {

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

} // decatur_2015_generate_css()

/**
 * This will output the custom WordPress settings to the live theme's WP head.
 *
 * Used by hook: 'wp_head'
 *
 * @access 		public
 * @see 		add_action( 'wp_head', $func )
 * @since 		1.0.0
 */
function decatur_2015_header_output() {

	?><!-- Customizer CSS -->
	<style type="text/css"><?php

		// pattern:
		// decatur_2015_generate_css( 'selector', 'style', 'mod_name', 'prefix', 'postfix', true );
		//
		// background-image example:
		// decatur_2015_generate_css( '.class', 'background-image', 'background_image_example', 'url(', ')' );


	?></style><!-- Customizer CSS --><?php

} // decatur_2015_header_output()

/**
 * Returns TRUE based on which link type is selected, otherwise FALSE
 *
 * @param 	object 		$control 			The control object
 * @return 	bool 							TRUE if conditions are met, otherwise FALSE
 */
function decatur_2015_linktype_callback1( $control ) {

	$radio_setting = $control->manager->get_setting('linktype1')->value();

	//wp_die( print_r( $radio_setting ) );
	//wp_die( print_r( $control->id ) );

	if ( 'externallinkurl1' === $control->id && 'external' === $radio_setting ) { return true; }
	if ( 'internalpageid1' === $control->id && 'internal' === $radio_setting ) { return true; }

	return false;

} // decatur_2015_linktype_callback1()

/**
 * Returns TRUE based on which link type is selected, otherwise FALSE
 *
 * @param 	object 		$control 			The control object
 * @return 	bool 							TRUE if conditions are met, otherwise FALSE
 */
function decatur_2015_linktype_callback2( $control ) {

	$radio_setting 	= $control->manager->get_setting('linktype2')->value();
	$control_id 	= $control->id;

	if ( 'externallinkurl2' === $control_id && 'external' === $radio_setting ) { return true; }
	if ( 'internalpageid2' === $control_id && 'internal' === $radio_setting ) { return true; }

	return false;

} // decatur_2015_linktype_callback2()

/**
 * Returns TRUE based on which link type is selected, otherwise FALSE
 *
 * @param 	object 		$control 			The control object
 * @return 	bool 							TRUE if conditions are met, otherwise FALSE
 */
function decatur_2015_linktype_callback3( $control ) {

	$radio_setting 	= $control->manager->get_setting('linktype3')->value();
	$control_id 	= $control->id;

	if ( 'externallinkurl3' === $control_id && 'external' === $radio_setting ) { return true; }
	if ( 'internalpageid3' === $control_id && 'internal' === $radio_setting ) { return true; }

	return false;

} // decatur_2015_linktype_callback3()

/**
 * Returns TRUE based on which link type is selected, otherwise FALSE
 *
 * @param 	object 		$control 			The control object
 * @return 	bool 							TRUE if conditions are met, otherwise FALSE
 */
function decatur_2015_linktype_callback4( $control ) {

	$radio_setting 	= $control->manager->get_setting('linktype4')->value();
	$control_id 	= $control->id;

	if ( 'externallinkurl4' === $control_id && 'external' === $radio_setting ) { return true; }
	if ( 'internalpageid4' === $control_id && 'internal' === $radio_setting ) { return true; }

	return false;

} // decatur_2015_linktype_callback4()

/**
 * Returns TRUE based on which link type is selected, otherwise FALSE
 *
 * @param 	object 		$control 			The control object
 * @return 	bool 							TRUE if conditions are met, otherwise FALSE
 */
function decatur_2015_linktype_callback5( $control ) {

	$radio_setting 	= $control->manager->get_setting('linktype5')->value();
	$control_id 	= $control->id;

	if ( 'externallinkurl5' === $control_id && 'external' === $radio_setting ) { return true; }
	if ( 'internalpageid5' === $control_id && 'internal' === $radio_setting ) { return true; }

	return false;

} // decatur_2015_linktype_callback5()

/**
 * Returns TRUE based on which link type is selected, otherwise FALSE
 *
 * @param 	object 		$control 			The control object
 * @return 	bool 							TRUE if conditions are met, otherwise FALSE
 */
function decatur_2015_linktype_callback6( $control ) {

	$radio_setting 	= $control->manager->get_setting('linktype6')->value();
	$control_id 	= $control->id;

	if ( 'externallinkurl6' === $control_id && 'external' === $radio_setting ) { return true; }
	if ( 'internalpageid6' === $control_id && 'internal' === $radio_setting ) { return true; }

	return false;

} // decatur_2015_linktype_callback6()

/**
 * Returns TRUE based on which link type is selected, otherwise FALSE
 *
 * @param 	object 		$control 			The control object
 * @return 	bool 							TRUE if conditions are met, otherwise FALSE
 */
function decatur_2015_linktype_callback7( $control ) {

	$radio_setting 	= $control->manager->get_setting('linktype7')->value();
	$control_id 	= $control->id;

	if ( 'externallinkurl7' === $control_id && 'external' === $radio_setting ) { return true; }
	if ( 'internalpageid7' === $control_id && 'internal' === $radio_setting ) { return true; }

	return false;

} // decatur_2015_linktype_callback7()

/**
 * Returns TRUE based on which link type is selected, otherwise FALSE
 *
 * @param 	object 		$control 			The control object
 * @return 	bool 							TRUE if conditions are met, otherwise FALSE
 */
function decatur_2015_linktype_callback8( $control ) {

	$radio_setting 	= $control->manager->get_setting('linktype8')->value();
	$control_id 	= $control->id;

	if ( 'externallinkurl8' === $control_id && 'external' === $radio_setting ) { return true; }
	if ( 'internalpageid8' === $control_id && 'internal' === $radio_setting ) { return true; }

	return false;

} // decatur_2015_linktype_callback8()

/**
 * Returns TRUE based on which link type is selected, otherwise FALSE
 *
 * @param 	object 		$control 			The control object
 * @return 	bool 							TRUE if conditions are met, otherwise FALSE
 */
function decatur_2015_linktype_callback9( $control ) {

	$radio_setting 	= $control->manager->get_setting('linktype9')->value();
	$control_id 	= $control->id;

	if ( 'externallinkurl9' === $control_id && 'external' === $radio_setting ) { return true; }
	if ( 'internalpageid9' === $control_id && 'internal' === $radio_setting ) { return true; }

	return false;

} // decatur_2015_linktype_callback9()

/**
 * Returns TRUE based on which link type is selected, otherwise FALSE
 *
 * @param 	object 		$control 			The control object
 * @return 	bool 							TRUE if conditions are met, otherwise FALSE
 */
function decatur_2015_linktype_callback10( $control ) {

	$radio_setting 	= $control->manager->get_setting('linktype10')->value();
	$control_id 	= $control->id;

	if ( 'externallinkurl10' === $control_id && 'external' === $radio_setting ) { return true; }
	if ( 'internalpageid10' === $control_id && 'internal' === $radio_setting ) { return true; }

	return false;

} // decatur_2015_linktype_callback10()

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * Used by hook: 'customize_preview_init'
 *
 * @access 		public
 * @see 		add_action( 'customize_preview_init', $func )
 * @since 		1.0.0
 */
function decatur_2015_live_preview() {

	wp_enqueue_script( 'decatur_2015_customizer', get_template_directory_uri() . '/js/customizer.min.js', array( 'jquery', 'customize-preview' ), '', true );

} // decatur_2015_live_preview()


