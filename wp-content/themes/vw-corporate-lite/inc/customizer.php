<?php
/**
 * VW Corporate Lite Theme Customizer
 *
 * @package VW Corporate Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_corporate_lite_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_corporate_lite_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-corporate-lite' ),
	    'description' => __( 'Description of what this panel does.', 'vw-corporate-lite' ),
	) );

	$wp_customize->add_section( 'vw_corporate_lite_left_right', array(
    	'title'      => __( 'General Settings', 'vw-corporate-lite' ),
		'priority'   => 30,
		'panel' => 'vw_corporate_lite_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_corporate_lite_theme_options',array(
	        'default' => '',
	        'sanitize_callback' => 'vw_corporate_lite_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('vw_corporate_lite_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => 'Do you want this section',
	        'section' => 'vw_corporate_lite_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','vw-corporate-lite'),
	            'Right Sidebar' => __('Right Sidebar','vw-corporate-lite'),
	            'One Column' => __('One Column','vw-corporate-lite'),
	            'Three Columns' => __('Three Columns','vw-corporate-lite'),
	            'Four Columns' => __('Four Columns','vw-corporate-lite'),
	            'Grid Layout' => __('Grid Layout','vw-corporate-lite')
	        ),
	    )
    );

	//Topbar section
	$wp_customize->add_section('vw_corporate_lite_topbar_icon',array(
		'title'	=> __('Topbar Section','vw-corporate-lite'),
		'description'	=> __('Add Header Content here','vw-corporate-lite'),
		'priority'	=> null,
		'panel' => 'vw_corporate_lite_panel_id',
	));

	$wp_customize->add_setting('vw_corporate_lite_contact_corporate',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_corporate_lite_contact_corporate',array(
		'label'	=> __('Add Phone Number','vw-corporate-lite'),
		'section'	=> 'vw_corporate_lite_topbar_icon',
		'setting'	=> 'vw_corporate_lite_contact_corporate',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_lite_email_corporate',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_corporate_lite_email_corporate',array(
		'label'	=> __('Add Email','vw-corporate-lite'),
		'section'	=> 'vw_corporate_lite_topbar_icon',
		'setting'	=> 'vw_corporate_lite_email_corporate',
		'type'		=> 'text'
	));

	//Social Icons(topbar)
	$wp_customize->add_section('vw_corporate_lite_topbar_header',array(
		'title'	=> __('Social Icon Section','vw-corporate-lite'),
		'description'	=> __('Add Header Content here','vw-corporate-lite'),
		'priority'	=> null,
		'panel' => 'vw_corporate_lite_panel_id',
	));

	$wp_customize->add_setting('vw_corporate_lite_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_corporate_lite_youtube_url',array(
		'label'	=> __('Add Youtube link','vw-corporate-lite'),
		'section'	=> 'vw_corporate_lite_topbar_header',
		'setting'	=> 'vw_corporate_lite_youtube_url',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_lite_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_corporate_lite_facebook_url',array(
		'label'	=> __('Add Facebook link','vw-corporate-lite'),
		'section'	=> 'vw_corporate_lite_topbar_header',
		'setting'	=> 'vw_corporate_lite_facebook_url',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_lite_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_corporate_lite_twitter_url',array(
		'label'	=> __('Add Twitter link','vw-corporate-lite'),
		'section'	=> 'vw_corporate_lite_topbar_header',
		'setting'	=> 'vw_corporate_lite_twitter_url',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_lite_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_corporate_lite_rss_url',array(
		'label'	=> __('Add RSS link','vw-corporate-lite'),
		'section'	=> 'vw_corporate_lite_topbar_header',
		'setting'	=> 'vw_corporate_lite_rss_url',
		'type'	=> 'text'
	));

	//home page slider
	$wp_customize->add_section( 'vw_corporate_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings.This section will appear below the header', 'vw-corporate-lite' ),
		'priority'   => 30,
		'panel' => 'vw_corporate_lite_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_corporate_lite_slidersettings-page-' . $count, array(
				'default'           => '',
				'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'vw_corporate_lite_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-corporate-lite' ),
			'section'  => 'vw_corporate_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );

	}

	//OUR services
	$wp_customize->add_section('vw_corporate_lite_our_services',array(
		'title'	=> __('Our Services','vw-corporate-lite'),
		'description'=> __('This section will appear below the slider.','vw-corporate-lite'),
		'panel' => 'vw_corporate_lite_panel_id',
	));
	
	
	$wp_customize->add_setting('vw_corporate_lite_sec1_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_corporate_lite_sec1_title',array(
		'label'	=> __('Section Title','vw-corporate-lite'),
		'section'=> 'vw_corporate_lite_our_services',
		'setting'=> 'vw_corporate_lite_sec1_title',
		'type'=> 'text'
	));
	
	$wp_customize->add_setting('vw_corporate_lite_sec1_subtitle',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_corporate_lite_sec1_subtitle',array(
		'label'	=> __('Section Sub-Title','vw-corporate-lite'),
		'section'=> 'vw_corporate_lite_our_services',
		'setting'=> 'vw_corporate_lite_sec1_subtitle',
		'type'=> 'text'
	));

	for ( $count = 0; $count <= 2; $count++ ) {

		$wp_customize->add_setting( 'vw_corporate_lite_servicesettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		));
		$wp_customize->add_control( 'vw_corporate_lite_servicesettings-page-' . $count, array(
			'label'    => __( 'Select Service Page', 'vw-corporate-lite' ),
			'section'  => 'vw_corporate_lite_our_services',
			'type'     => 'dropdown-pages'
		));
	}
	
	$wp_customize->add_section('vw_corporate_lite_footer_section',array(
		'title'	=> __('Footer Text','vw-corporate-lite'),
		'description'	=> __('Add some text for footer like copyright etc.','vw-corporate-lite'),
		'panel' => 'vw_corporate_lite_panel_id'
	));
	
	$wp_customize->add_setting('vw_corporate_lite_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_corporate_lite_footer_copy',array(
		'label'	=> __('Copyright Text','vw-corporate-lite'),
		'section'	=> 'vw_corporate_lite_footer_section',
		'type'		=> 'text'
	));
	
}
add_action( 'customize_register', 'vw_corporate_lite_customize_register' );	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vw_corporate_lite_customize_preview_js() {
	wp_enqueue_script( 'vw_corporate_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'vw_corporate_lite_customize_preview_js' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class vw_corporate_lite_customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'vw_corporate_lite_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new vw_corporate_lite_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'    => esc_html__( 'VW Corporate Pro', 'vw-corporate-lite' ),
					'pro_text' => esc_html__( 'Go Pro',         'vw-corporate-lite' ),
					'pro_url'  => 'https://www.vwthemes.com/premium/corporate-wordpress-theme'
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-corporate-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-corporate-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
vw_corporate_lite_customize::get_instance();