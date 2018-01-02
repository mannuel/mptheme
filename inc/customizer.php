<?php
/**
 * @package mptheme
 */

add_theme_support( 'custom-logo' );

if ( ! function_exists( 'mptheme_custom_logo' ) ) :
function mptheme_custom_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	return $image[0];
}
endif;

function mptheme_customize_register( $wp_customize ) {

	/* 
	 * ========================
	 * MP Theme Settings
	 * ========================
	 */
	$wp_customize->add_panel(
		'mptheme_settings_panel',
		array(
			'title'    => __( 'MP Theme Settings', 'mptheme' ),
			'priority' => 1
		)
	);

	// ---- TOP BAR ----
	$wp_customize->add_section( 'top_bar', array(
		'title' => __( 'Top bar', 'mptheme' ),
		'panel' => 'mptheme_settings_panel',
	) );

	$wp_customize->add_setting(
		'enable_top_bar',
		array(
			'default'			=> 10,
			'sanitize_callback' => 'absint',
			'priority'          => 3,
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'enable_top_bar',
		array(
			'settings' => 'enable_top_bar',
			'section'  => 'top_bar',
			'label'    => __( 'Enable top bar', 'mptheme' ),
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'color_top_bar',
		array(
			'default'           => '#fff',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 2
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'top_bar_color',
			array(
				'label'    => __( 'Text and link color:', 'mpclp' ),
				'section'  => 'top_bar',
				'settings' => 'color_top_bar'
			)
		)
	);

	$wp_customize->add_setting(
		'background_top_bar',
		array(
			'default'           => '#000',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 1
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'top_bar_background',
			array(
				'label'    => __( 'Text and link color:', 'mpclp' ),
				'section'  => 'top_bar',
				'settings' => 'background_top_bar'
			)
		)
	);
	// ---- END TOP BAR ----

	// ---- HEADER ----
	$wp_customize->add_section( 'header', array(
		'title' => __( 'Header', 'mptheme' ),
		'panel' => 'mptheme_settings_panel',
	) );

	$wp_customize->add_setting(
		'header_background',
		array(
			'default'           => '#fff',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'header_background_color',
			array(
				'label'    => __( 'Background:', 'mpclp' ),
				'section'  => 'header',
				'priority' => 1,
				'settings' => 'header_background'
			)
		)
	);
	// ---- END HEADER ----

	// ---- TYPOGRAPHY BODY ----
	$wp_customize->add_section( 'typography', array(
		'title' => __( 'Typography body', 'mptheme' ),
		'panel' => 'mptheme_settings_panel',
	) );

	$wp_customize->add_setting(
		'typography_body',
		array(
			'default'    => 'Arial, Helvetica, sans-serif',
			'type'       => 'select',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_body',
		array(
			'settings'      => 'typography_body',
			'label'         => __( 'Body font family:', 'mpclp' ),
			'section'       => 'typography',
			'type'          => 'select',
			'choices'       => array(
				'Arial, Helvetica, sans-serif'                       => 'Arial, Helvetica, sans-serif',
				'Montserrat, "Helvetica Neue", sans-serif'           => 'Montserrat, "Helvetica Neue", sans-serif',
				'"Arial Black", Gadget, sans-serif'                  => '"Arial Black", Gadget, sans-serif',
				'"Comic Sans MS", cursive, sans-serif'               => '"Comic Sans MS", cursive, sans-serif',
				'Impact, Charcoal, sans-serif'                       => 'Impact, Charcoal, sans-serif',
				'"Lucida Sans Unicode", "Lucida Grande", sans-serif' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
				'Tahoma, Geneva, sans-serif'                         => 'Tahoma, Geneva, sans-serif',
				'"Trebuchet MS", Helvetica, sans-serif'              => '"Trebuchet MS", Helvetica, sans-serif',
				'Verdana, Geneva, sans-serif'                        => 'Verdana, Geneva, sans-serif',
			),
		)
	);

	$wp_customize->add_setting(
		'typography_body_color',
		array(
			'default'           => '#fff',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'typography_body_color',
			array(
				'label'    => __( 'Body font color:', 'mpclp' ),
				'section'  => 'typography',
				'settings' => 'typography_body_color'
			)
		)
	);

	$wp_customize->add_setting( 'typography_body_size',
		array(
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_body_size',
		array(
			'label'    => 'Body font size:',
			'section'  => 'typography',
			'settings' => 'typography_body_size'
		)
	);

	$wp_customize->add_setting(
		'typography_body_weight',
		array(
			'default'    => '400',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_body_weight',
		array(
			'settings'      => 'typography_body_weight',
			'label'         => __( 'Body font weight:', 'mpclp' ),
			'section'       => 'typography',
			'priority'      => 25,
			'type'          => 'select',
			'choices'       => array(
				'300' => '300 - light',
				'400' => '400 - regular',
				'700' => '700 - bold',
			),
		)
	);

	/*
	 * ----- H1 ----- 
	 */

	$wp_customize->add_setting(
		'typography_h1',
		array(
			'default'    => 'Arial, Helvetica, sans-serif',
			'type'       => 'select',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_h1',
		array(
			'settings' => 'typography_h1',
			'label'    => __( 'H1 font family:', 'mpclp' ),
			'section'  => 'typography',
			'type'     => 'select',
			'priority' => 60,
			'choices'  => array(
				'Arial, Helvetica, sans-serif'                       => 'Arial, Helvetica, sans-serif',
				'Montserrat, "Helvetica Neue", sans-serif'           => 'Montserrat, "Helvetica Neue", sans-serif',
				'"Arial Black", Gadget, sans-serif'                  => '"Arial Black", Gadget, sans-serif',
				'"Comic Sans MS", cursive, sans-serif'               => '"Comic Sans MS", cursive, sans-serif',
				'Impact, Charcoal, sans-serif'                       => 'Impact, Charcoal, sans-serif',
				'"Lucida Sans Unicode", "Lucida Grande", sans-serif' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
				'Tahoma, Geneva, sans-serif'                         => 'Tahoma, Geneva, sans-serif',
				'"Trebuchet MS", Helvetica, sans-serif'              => '"Trebuchet MS", Helvetica, sans-serif',
				'Verdana, Geneva, sans-serif'                        => 'Verdana, Geneva, sans-serif',
			),
		)
	);

	$wp_customize->add_setting( 'typography_h1_size',
		array(
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_h1_size',
		array(
			'label'    => 'H1 font size:',
			'section'  => 'typography',
			'priority' => 61,
			'settings' => 'typography_h1_size'
		)
	);

	/*
	 * ----- H2 ----- 
	 */

	$wp_customize->add_setting(
		'typography_h2',
		array(
			'default'    => 'Arial, Helvetica, sans-serif',
			'type'       => 'select',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_h2',
		array(
			'settings' => 'typography_h2',
			'label'    => __( 'H2 font family:', 'mpclp' ),
			'section'  => 'typography',
			'type'     => 'select',
			'priority' => 71,
			'choices'  => array(
				'Arial, Helvetica, sans-serif'                       => 'Arial, Helvetica, sans-serif',
				'Montserrat, "Helvetica Neue", sans-serif'           => 'Montserrat, "Helvetica Neue", sans-serif',
				'"Arial Black", Gadget, sans-serif'                  => '"Arial Black", Gadget, sans-serif',
				'"Comic Sans MS", cursive, sans-serif'               => '"Comic Sans MS", cursive, sans-serif',
				'Impact, Charcoal, sans-serif'                       => 'Impact, Charcoal, sans-serif',
				'"Lucida Sans Unicode", "Lucida Grande", sans-serif' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
				'Tahoma, Geneva, sans-serif'                         => 'Tahoma, Geneva, sans-serif',
				'"Trebuchet MS", Helvetica, sans-serif'              => '"Trebuchet MS", Helvetica, sans-serif',
				'Verdana, Geneva, sans-serif'                        => 'Verdana, Geneva, sans-serif',
			),
		)
	);

	$wp_customize->add_setting( 'typography_h2_size',
		array(
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_h2_size',
		array(
			'label'    => 'H2 font size:',
			'section'  => 'typography',
			'priority' => 72,
			'settings' => 'typography_h2_size'
		)
	);

	/*
	 * ----- H3 ----- 
	 */

	$wp_customize->add_setting(
		'typography_h3',
		array(
			'default'    => 'Arial, Helvetica, sans-serif',
			'type'       => 'select',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_h3',
		array(
			'settings' => 'typography_h3',
			'label'    => __( 'H3 font family:', 'mpclp' ),
			'section'  => 'typography',
			'type'     => 'select',
			'priority' => 81,
			'choices'  => array(
				'Arial, Helvetica, sans-serif'                       => 'Arial, Helvetica, sans-serif',
				'Montserrat, "Helvetica Neue", sans-serif'           => 'Montserrat, "Helvetica Neue", sans-serif',
				'"Arial Black", Gadget, sans-serif'                  => '"Arial Black", Gadget, sans-serif',
				'"Comic Sans MS", cursive, sans-serif'               => '"Comic Sans MS", cursive, sans-serif',
				'Impact, Charcoal, sans-serif'                       => 'Impact, Charcoal, sans-serif',
				'"Lucida Sans Unicode", "Lucida Grande", sans-serif' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
				'Tahoma, Geneva, sans-serif'                         => 'Tahoma, Geneva, sans-serif',
				'"Trebuchet MS", Helvetica, sans-serif'              => '"Trebuchet MS", Helvetica, sans-serif',
				'Verdana, Geneva, sans-serif'                        => 'Verdana, Geneva, sans-serif',
			),
		)
	);

	$wp_customize->add_setting( 'typography_h3_size',
		array(
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_h3_size',
		array(
			'label'    => 'H3 font size:',
			'section'  => 'typography',
			'priority' => 82,
			'settings' => 'typography_h3_size'
		)
	);


	/*
	 * ----- H4 ----- 
	 */

	$wp_customize->add_setting(
		'typography_h4',
		array(
			'default'    => 'Arial, Helvetica, sans-serif',
			'type'       => 'select',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_h4',
		array(
			'settings' => 'typography_h4',
			'label'    => __( 'H4 font family:', 'mpclp' ),
			'section'  => 'typography',
			'type'     => 'select',
			'priority' => 91,
			'choices'  => array(
				'Arial, Helvetica, sans-serif'                       => 'Arial, Helvetica, sans-serif',
				'Montserrat, "Helvetica Neue", sans-serif'           => 'Montserrat, "Helvetica Neue", sans-serif',
				'"Arial Black", Gadget, sans-serif'                  => '"Arial Black", Gadget, sans-serif',
				'"Comic Sans MS", cursive, sans-serif'               => '"Comic Sans MS", cursive, sans-serif',
				'Impact, Charcoal, sans-serif'                       => 'Impact, Charcoal, sans-serif',
				'"Lucida Sans Unicode", "Lucida Grande", sans-serif' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
				'Tahoma, Geneva, sans-serif'                         => 'Tahoma, Geneva, sans-serif',
				'"Trebuchet MS", Helvetica, sans-serif'              => '"Trebuchet MS", Helvetica, sans-serif',
				'Verdana, Geneva, sans-serif'                        => 'Verdana, Geneva, sans-serif',
			),
		)
	);

	$wp_customize->add_setting( 'typography_h4_size',
		array(
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_h4_size',
		array(
			'label'    => 'H4 font size:',
			'section'  => 'typography',
			'priority' => 92,
			'settings' => 'typography_h4_size'
		)
	);

	/*
	 * ----- H5 ----- 
	 */

	$wp_customize->add_setting(
		'typography_h5',
		array(
			'default'    => 'Arial, Helvetica, sans-serif',
			'type'       => 'select',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_h5',
		array(
			'settings' => 'typography_h5',
			'label'    => __( 'H5 font family:', 'mpclp' ),
			'section'  => 'typography',
			'type'     => 'select',
			'priority' => 101,
			'choices'  => array(
				'Arial, Helvetica, sans-serif'                       => 'Arial, Helvetica, sans-serif',
				'Montserrat, "Helvetica Neue", sans-serif'           => 'Montserrat, "Helvetica Neue", sans-serif',
				'"Arial Black", Gadget, sans-serif'                  => '"Arial Black", Gadget, sans-serif',
				'"Comic Sans MS", cursive, sans-serif'               => '"Comic Sans MS", cursive, sans-serif',
				'Impact, Charcoal, sans-serif'                       => 'Impact, Charcoal, sans-serif',
				'"Lucida Sans Unicode", "Lucida Grande", sans-serif' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
				'Tahoma, Geneva, sans-serif'                         => 'Tahoma, Geneva, sans-serif',
				'"Trebuchet MS", Helvetica, sans-serif'              => '"Trebuchet MS", Helvetica, sans-serif',
				'Verdana, Geneva, sans-serif'                        => 'Verdana, Geneva, sans-serif',
			),
		)
	);

	$wp_customize->add_setting( 'typography_h5_size',
		array(
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_h5_size',
		array(
			'label'    => 'H5 font size:',
			'section'  => 'typography',
			'priority' => 102,
			'settings' => 'typography_h5_size'
		)
	);

	/*
	 * ----- H6 ----- 
	 */

	$wp_customize->add_setting(
		'typography_h6',
		array(
			'default'    => 'Arial, Helvetica, sans-serif',
			'type'       => 'select',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_h6',
		array(
			'settings' => 'typography_h6',
			'label'    => __( 'H6 font family:', 'mpclp' ),
			'section'  => 'typography',
			'type'     => 'select',
			'priority' => 201,
			'choices'  => array(
				'Arial, Helvetica, sans-serif'                       => 'Arial, Helvetica, sans-serif',
				'Montserrat, "Helvetica Neue", sans-serif'           => 'Montserrat, "Helvetica Neue", sans-serif',
				'"Arial Black", Gadget, sans-serif'                  => '"Arial Black", Gadget, sans-serif',
				'"Comic Sans MS", cursive, sans-serif'               => '"Comic Sans MS", cursive, sans-serif',
				'Impact, Charcoal, sans-serif'                       => 'Impact, Charcoal, sans-serif',
				'"Lucida Sans Unicode", "Lucida Grande", sans-serif' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
				'Tahoma, Geneva, sans-serif'                         => 'Tahoma, Geneva, sans-serif',
				'"Trebuchet MS", Helvetica, sans-serif'              => '"Trebuchet MS", Helvetica, sans-serif',
				'Verdana, Geneva, sans-serif'                        => 'Verdana, Geneva, sans-serif',
			),
		)
	);

	$wp_customize->add_setting( 'typography_h6_size',
		array(
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_h6_size',
		array(
			'label'    => 'H6 font size:',
			'section'  => 'typography',
			'priority' => 202,
			'settings' => 'typography_h6_size'
		)
	);

	// ---- END TYPOGRAPHY BODY ----

	// ---- TYPOGRAPHY MENU ----
	$wp_customize->add_section( 'typography_menu', array(
		'title' => __( 'Typography menu', 'mptheme' ),
		'panel' => 'mptheme_settings_panel',
	) );

	$wp_customize->add_setting(
		'typography_menu',
		array(
			'default'    => 'Arial, Helvetica, sans-serif',
			'type'       => 'select',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_menu',
		array(
			'settings'      => 'typography_menu',
			'label'         => __( 'Menu font family:', 'mpclp' ),
			'section'       => 'typography_menu',
			'type'          => 'select',
			'choices'       => array(
				'Arial, Helvetica, sans-serif'                       => 'Arial, Helvetica, sans-serif',
				'Montserrat, "Helvetica Neue", sans-serif'           => 'Montserrat, "Helvetica Neue", sans-serif',
				'"Arial Black", Gadget, sans-serif'                  => '"Arial Black", Gadget, sans-serif',
				'"Comic Sans MS", cursive, sans-serif'               => '"Comic Sans MS", cursive, sans-serif',
				'Impact, Charcoal, sans-serif'                       => 'Impact, Charcoal, sans-serif',
				'"Lucida Sans Unicode", "Lucida Grande", sans-serif' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
				'Tahoma, Geneva, sans-serif'                         => 'Tahoma, Geneva, sans-serif',
				'"Trebuchet MS", Helvetica, sans-serif'              => '"Trebuchet MS", Helvetica, sans-serif',
				'Verdana, Geneva, sans-serif'                        => 'Verdana, Geneva, sans-serif',
			),
		)
	);

	$wp_customize->add_setting(
		'typography_menu_color',
		array(
			'default'           => '#fff',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'typography_menu_color',
			array(
				'label'    => __( 'Menu font color:', 'mpclp' ),
				'section'  => 'typography_menu',
				'settings' => 'typography_menu_color'
			)
		)
	);

	$wp_customize->add_setting( 'typography_menu_size',
		array(
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'logo_height',
		array(
			'label'    => 'Menu font size:',
			'section'  => 'typography_menu',
			'settings' => 'typography_menu_size'
		)
	);

	$wp_customize->add_setting(
		'typography_menu_weight',
		array(
			'default'    => '400',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'typography_menu_weight',
		array(
			'settings'      => 'typography_menu_weight',
			'label'         => __( 'Menu font weight:', 'mpclp' ),
			'section'       => 'typography_menu',
			'priority'      => 25,
			'type'          => 'select',
			'choices'       => array(
				'300' => '300 - light',
				'400' => '400 - regular',
				'700' => '700 - bold',
			),
		)
	);
	// ---- END TYPOGRAPHY MENU ----








	/* Custom Separator */ 
	class Separator_Custom_control extends WP_Customize_Control{
		public $type = 'separator';
		public function render_content(){
			?>
			<p><hr></p>
			<?php
		}
	}

	/**
	Separator
	**/
	$wp_customize->add_setting('separator_1', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_1', array(
		'settings'		=> 'separator_1',
		'section'  		=> 'typography',
		'priority'      => 59,
	)));

	/**
	Separator
	**/
	$wp_customize->add_setting('separator_2', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_2', array(
		'settings'		=> 'separator_2',
		'section'  		=> 'typography',
		'priority'      => 70,
	)));


	/**
	Separator
	**/
	$wp_customize->add_setting('separator_3', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_3', array(
		'settings'		=> 'separator_3',
		'section'  		=> 'typography',
		'priority'      => 80,
	)));


	/**
	Separator
	**/
	$wp_customize->add_setting('separator_4', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_4', array(
		'settings'		=> 'separator_4',
		'section'  		=> 'typography',
		'priority'      => 90,
	)));

	/**
	Separator
	**/
	$wp_customize->add_setting('separator_5', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_5', array(
		'settings'		=> 'separator_5',
		'section'  		=> 'typography',
		'priority'      => 100,
	)));

	/**
	Separator
	**/
	$wp_customize->add_setting('separator_6', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_6', array(
		'settings'		=> 'separator_6',
		'section'  		=> 'typography',
		'priority'      => 200,
	)));

}
add_action( 'customize_register', 'mptheme_customize_register' );


/* 
 * ========================
 * LIVE PREVIEW
 * ========================
 */
function mptheme_customizer_live_preview(){
	wp_enqueue_script( 
		  'mptheme-customizer',//Give the script an ID
		  get_template_directory_uri() . '/assets/js/customizer.mptheme.js',//Point to file
		  array( 'jquery','customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional) 
		  true						//Put script in footer?
	);
}
add_action( 'customize_controls_enqueue_scripts', 'mptheme_customizer_live_preview' );

/* 
 * ========================
 * GET MOD OPTION
 * ========================
 */
function mptheme_theme_mods( $mod ){
	$mods = get_theme_mods();
	return $mods[$mod];
}