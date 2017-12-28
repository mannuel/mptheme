<?php
/**
 * =======================
 * Theme functions
 * =======================
 *
 * @package mptheme
 */

class mptheme_functions {

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
		add_action( 'wp_head', array( 'mptheme_functions', 'theme_styles' ) );
		add_action( 'wp_enqueue_scripts', array('mptheme_functions', 'mptheme_enqueue') );
	} // END function init_hooks

	/**
	 * Adding theme custom styles
	 */
	public static function theme_styles() {
		?>
		<style type="text/css">
			body{
				<?php if (mptheme_theme_mods('typography_body_color')): ?>
					color: <?php echo mptheme_theme_mods('typography_body_color'); ?>;
				<?php endif; ?>

				<?php if (get_option( "typography_body" )): ?>
					font-family: <?php echo get_option( "typography_body" ); ?>;
				<?php endif; ?>

				<?php if (mptheme_theme_mods('typography_body_size')): ?>
					font-size: <?php echo mptheme_theme_mods( "typography_body_size" ); ?>;
				<?php endif; ?>
			}

			<?php if (mptheme_theme_mods('background_top_bar')): ?>
				.top-bar{ background: <?php echo mptheme_theme_mods('background_top_bar'); ?>  }
			<?php endif; ?>

			<?php if (mptheme_theme_mods('color_top_bar')): ?>
				.top-bar, .top-bar a{ color: <?php echo mptheme_theme_mods('color_top_bar') ?>  }
			<?php endif; ?>

			<?php if (mptheme_theme_mods('header_background')): ?>
				.site-header{ background: <?php echo mptheme_theme_mods('header_background'); ?>  }
			<?php endif; ?>

			.primary-menu li a{
				<?php if (mptheme_theme_mods('typography_menu_color')): ?>
					color: <?php echo mptheme_theme_mods('typography_menu_color'); ?>;
				<?php endif; ?>

				<?php if (get_option( "typography_menu" )): ?>
					font-family: <?php echo get_option( "typography_menu" ); ?>;
				<?php endif; ?>
			}

		</style>
		<?php
	}

	/**
	 * Enqueue Scripts
	 */
	public static function mptheme_enqueue() {
		wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.grid.min.css' );
		$dependencies = array('bootstrap');
		wp_enqueue_style( 'bootstrapstarter-grid', get_stylesheet_uri(), $dependencies );

		wp_register_style('mptheme-base', get_template_directory_uri() . '/assets/css/mptheme.base.css' );
		wp_enqueue_style( 'mptheme-base' );
	}

}  // END class mptheme_functions

add_action( 'init', array( 'mptheme_functions', 'init' ) );


function mptheme_setup() {
	load_theme_textdomain( 'mptheme' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu',      'mptheme' ),
		'secondary' => __( 'Secondary Links Menu', 'mptheme' ),
	) );
} // mptheme_setup
add_action( 'after_setup_theme', 'mptheme_setup' );