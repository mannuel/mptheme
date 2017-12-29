<?php
// require get_template_directory() . '/inc/function-admin.php';

define( 'MPT__THEME_DIR', get_template_directory( __FILE__ ) );

require_once( MPT__THEME_DIR . '/admin/class.admin.php' );

require_once( MPT__THEME_DIR . '/inc/customizer.php' );

require_once( MPT__THEME_DIR . '/inc/metabox.php' );

require_once( MPT__THEME_DIR . '/inc/theme-functions.php' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mptheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Top bar left', 'mptheme' ),
		'id'            => 'top-bar-left',
		'description'   => esc_html__( 'Add widgets here.', 'mptheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Top bar right', 'mptheme' ),
		'id'            => 'top-bar-right',
		'description'   => esc_html__( 'Add widgets here.', 'mptheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mptheme_widgets_init' );

// function register_my_menus() {
//   register_nav_menus(
//     array(
//       'header-menu' => __( 'Header Menu' ),
//       'extra-menu' => __( 'Extra Menu' )
//      )
//    );
//  }
//  add_action( 'init', 'register_my_menus' );