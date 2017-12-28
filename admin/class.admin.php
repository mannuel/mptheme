<?php
/**
 * =======================
 * Admin Page
 * =======================
 *
 * @package mptheme
 */

class mptheme {
	const NONCE = 'mptheme';

	private static $initiated = false;

	public static function init() {
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
		add_action( 'add_meta_boxes', array( 'mptheme', 'page_setup_metabox' ) );
	} // END function init_hooks

	/**
	 * Enqueue Scripts
	 */
	public static function admin_scripts() {
		
		wp_enqueue_style( 'wp-color-picker' );
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
	 * Meta box for page setup
	 */
	public static function page_setup_metabox(){
		add_meta_box( 'mptheme-page-setup', 'Page setup', array('mptheme', 'page_setup_metabox_content'), 'page', 'normal', 'low' );
		add_meta_box( 'mptheme-page-seo', 'Page SEO', array('mptheme', 'page_seop_metabox_content'), 'page', 'normal', 'low' );
	}

	public static function page_setup_metabox_content(){
		echo "test";
	}

	public static function page_seop_metabox_content(){
		?>
		<h3>Title</h3>
		<input type="text">
		<?php
	}


	/**
	 * Views
	 */
	public static function view($name) {
		$file = MPT__THEME_DIR . '/admin/views/'. $name . '.php';
		require( $file );
	}

	public static function mptheme_options_fields(){
		echo "";
	}

	public static function mptheme_enable_top_bar( ){
		$mptheme_enable_top_bar = esc_attr( get_option( 'mptheme_enable_top_bar' ) );
		?>
		<select name="mptheme-enable-top-bar" id="mptheme-enable-top-bar">
			<option value="yes" <?php selected($mptheme_enable_top_bar, "yes"); ?>>yes</option>
			<option value="no" <?php selected($mptheme_enable_top_bar, "no"); ?>>no</option>
		</select>
		<?php
	}

	public static function top_bar_background( ){
		$mptheme_top_bar_background = esc_attr( get_option( 'mptheme_top_bar_background' ) );
		echo '<input type="text" id="mptheme-top-bar-background" class="wpColorPicker" name="mptheme-top-bar-background" value="'.$mptheme_top_bar_background.'" />';
	}

	public static function top_bar_color( ){
		$mptheme_top_bar_color = esc_attr( get_option( 'mptheme_top_bar_color' ) );
		echo '<input type="text" id="mptheme-top-bar-color" class="wpColorPicker" name="mptheme-top-bar-color" value="'.$mptheme_top_bar_color.'" />';
	}

	public static function image_logo_image( ){
		$mptheme_logo_image = esc_attr( get_option( 'mptheme_logo_image' ) );
		echo '<input type="hidden" name="mptheme-logo-image" id="mptheme-logo-image" value="'.$mptheme_logo_image.'">';
		echo '<input type="button" value="Set logo image" id="upload-logo-image-button" class="button">';
	}

	public static function header_background( ){
		$mptheme_header_background = esc_attr( get_option( 'mptheme_header_background' ) );
		echo '<input type="text" id="mptheme-header-background" class="wpColorPicker" name="mptheme-header-background" value="'.$mptheme_header_background.'" />';
	}

} // END class mptheme

add_action( 'init', array( 'mptheme', 'init' ) );