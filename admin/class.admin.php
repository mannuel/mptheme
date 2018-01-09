<?php
/**
 * =======================
 * Admin Page
 * =======================
 *
 * @package mptheme
 */

class mptheme {

	private static $initiated = false;

	public static function init() {

		if ( isset( $_POST['_wpnonce'] ) ) {
			self::save_theme_options();
		}

		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	} // END function init

	/**
	 * Initializes WordPress hooks
	 */
	private static function init_hooks() {
		self::$initiated = true;
		add_action( 'admin_menu', array( 'mptheme', 'mptheme_add_options_page' ) );
		add_action( 'admin_enqueue_scripts', array( 'mptheme', 'admin_scripts' ) );
		add_action( 'admin_init', array( 'mptheme', 'register_settings' ) );
	} // END function init_hooks

	/**
	 * Enqueue Scripts
	 */
	public static function admin_scripts() {
		
		wp_enqueue_style( 'wp-color-picker' );

		wp_register_style( 'mptheme-admin-styles', get_template_directory_uri() . '/admin/assets/css/mptheme.admin.css', '1.0.0', true, 'all' );
		wp_enqueue_style( 'mptheme-admin-styles' );

		wp_register_script( 'mptheme-admin-script', get_template_directory_uri() . '/admin/assets/js/mptheme.admin.js', array('jquery', 'wp-color-picker'), '1.0.0', true );
		wp_enqueue_script( 'mptheme-admin-script' );

		wp_enqueue_media();
	}

	public static function mptheme_add_options_page(){
		add_menu_page( 'MP Theme options', 'MP Theme', 'manage_options', 'mp-theme', array('mptheme', 'mptheme_options_page'), '', 1 );
	}

	/**
	 * Show options page
	 */
	public static function mptheme_options_page() {
		mptheme::view('options');
	}


	/**
	 * Views
	 */
	public static function view($name) {
		$file = MPT__THEME_DIR . '/admin/views/'. $name . '.php';
		require( $file );
	}


	/**
	 * Options DB Save
	 */
	public static function save_theme_options() {
		if ( wp_verify_nonce( $_POST['_wpnonce'], 'mptheme_options' ) ){
			return false;
		}

		update_option( 'mptheme_google_analytics_id', sanitize_text_field($_POST['mpclp-login-image-link']) );
		return true;
	}

	/**
	 * Customization fields
	 */
	public static function register_settings() {
		register_setting( 'mptheme_options', 'mptheme' );

		add_settings_section( 'mptheme_options_section', 'Page options', array( 'mptheme', 'mptheme_options_fields' ), 'MP Theme Options' );

		add_settings_field( 'mptheme-google-analytics-id', 'Google Analytics ID:', array( 'mptheme', 'mptheme_google_analytics_id'), 'MP Theme Options', 'mptheme_options_section', '' );

	}

	public static function mptheme_options_fields(){
		echo "";
	}

	public static function mptheme_google_analytics_id( ){
		$mptheme_google_analytics_id = esc_attr( get_option( 'mptheme_google_analytics_id' ) );
		echo '<input type="text" id="mpclp-login-image-link" name="mpclp-login-image-link" value="'.$mptheme_google_analytics_id.'">';
	}

} // END class mptheme

add_action( 'init', array( 'mptheme', 'init' ) );