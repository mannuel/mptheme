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

			.primary-menu li a,
			.secondary-menu li a{
				<?php if (mptheme_theme_mods('typography_menu_color')): ?>
					color: <?php echo mptheme_theme_mods('typography_menu_color'); ?>;
				<?php endif; ?>

				<?php if (get_option( "typography_menu" )): ?>
					font-family: <?php echo get_option( "typography_menu" ); ?>;
				<?php endif; ?>

				<?php if (mptheme_theme_mods( "typography_menu_weight" )): ?>
					font-weight: <?php echo mptheme_theme_mods( "typography_menu_weight" ); ?>;
				<?php endif; ?>

				<?php if (mptheme_theme_mods( "typography_menu_size" )): ?>
					font-size: <?php echo mptheme_theme_mods( "typography_menu_size" ); ?>;
				<?php endif; ?>
			}

			h1{
				<?php if (mptheme_theme_mods( "typography_h1_size" )): ?>
					font-size: <?php echo mptheme_theme_mods( "typography_h1_size" ); ?>;
				<?php endif; ?>

				<?php if (mptheme_theme_mods( "typography_h1" )): ?>
					font-family: <?php echo mptheme_theme_mods( "typography_h1" ); ?>;
				<?php endif; ?>
			}

			h2{
				<?php if (mptheme_theme_mods( "typography_h2_size" )): ?>
					font-size: <?php echo mptheme_theme_mods( "typography_h2_size" ); ?>;
				<?php endif; ?>

				<?php if (mptheme_theme_mods( "typography_h2" )): ?>
					font-family: <?php echo mptheme_theme_mods( "typography_h2" ); ?>;
				<?php endif; ?>
			}

			h3{
				<?php if (mptheme_theme_mods( "typography_h3_size" )): ?>
					font-size: <?php echo mptheme_theme_mods( "typography_h3_size" ); ?>;
				<?php endif; ?>

				<?php if (mptheme_theme_mods( "typography_h3" )): ?>
					font-family: <?php echo mptheme_theme_mods( "typography_h3" ); ?>;
				<?php endif; ?>
			}

			h4{
				<?php if (mptheme_theme_mods( "typography_h4_size" )): ?>
					font-size: <?php echo mptheme_theme_mods( "typography_h4_size" ); ?>;
				<?php endif; ?>

				<?php if (mptheme_theme_mods( "typography_h4" )): ?>
					font-family: <?php echo mptheme_theme_mods( "typography_h4" ); ?>;
				<?php endif; ?>
			}

			h5{
				<?php if (mptheme_theme_mods( "typography_h5_size" )): ?>
					font-size: <?php echo mptheme_theme_mods( "typography_h5_size" ); ?>;
				<?php endif; ?>

				<?php if (mptheme_theme_mods( "typography_h5" )): ?>
					font-family: <?php echo mptheme_theme_mods( "typography_h5" ); ?>;
				<?php endif; ?>
			}

			h6{
				<?php if (mptheme_theme_mods( "typography_h6_size" )): ?>
					font-size: <?php echo mptheme_theme_mods( "typography_h6_size" ); ?>;
				<?php endif; ?>

				<?php if (mptheme_theme_mods( "typography_h6" )): ?>
					font-family: <?php echo mptheme_theme_mods( "typography_h6" ); ?>;
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

		wp_enqueue_script( 'mptheme-functions', get_template_directory_uri() . '/assets/js/mptheme.functions.js', '', 1.1, true);

		wp_localize_script( 'mptheme-functions', 'mptheme_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
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











// **********************************************************************//
// Ajax add to cart
// **********************************************************************//

function mptheme_add_cart_single_ajax() {
	$product_id   = $_POST['product_id'];
	$variation_id = $_POST['variation_id'];
	$quantity     = $_POST['quantity'];

	if ($variation_id) {
		WC()->cart->add_to_cart( $product_id, $quantity, $variation_id );
	} else {
		WC()->cart->add_to_cart( $product_id, $quantity);
	}

	$items = WC()->cart->get_cart();

	global $woocommerce;
	$item_count = $woocommerce->cart->cart_contents_count;

	$currency = get_woocommerce_currency_symbol();

	?>

	<h6 class="title"><?php _e("cart resume", 'mptheme'); ?></h6>
	
	<div class="content cart-content-inner">

		<?php foreach($items as $item => $values) { 
			// $_product = $values['data']->post;
			$_product          = $values['data'];
			$_product_cart_key = $values['key'];

			// print_r($values);

			$product_price = get_post_meta( $values['product_id'], '_regular_price', true);
			$product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $values['product_id'], $item );
			$sale = get_post_meta( $values['product_id'], '_sale_price', true);
			?>
			
			<div class="product">
				<div class="col-xs-4 image">
					<a href="<?php echo get_permalink( $values['product_id'] ); ?>" title="<?php echo $_product->get_name(); ?>">
						<?php echo $_product->get_image(); ?>
					</a>
				</div> <!-- /.col-xs-4 -->

				<div class="col-xs-8">
					<div class="name">
						<a href="<?php echo get_permalink( $values['product_id'] ); ?>" title="<?php echo $_product->get_name(); ?>">
							<?php echo $_product->get_name(); ?>
						</a>
					</div>
					<div>
						<span class="quantity"> <?php echo $values['quantity']; ?> </span> x <span class="price"> <?php echo $product_price; ?> </span>
					</div>

					<div class="remove-item">
						<a href="<?php echo WC()->cart->get_remove_url( $cart_item_key ); ?>" class="remove-item-btn" data-key="<?php echo $_product_cart_key; ?>" data-quantity="<?php echo $values['quantity']; ?>"><?php _e('Remove item', 'mptheme'); ?></a>
					</div>
				</div> <!-- /.col-xs-8 -->
			</div> <!-- /.product -->
		<?php } ?>

	</div> <!-- /.cart-content-inner -->

	<?php if ( ! WC()->cart->is_empty() ) { ?>

		<div class="subtotal">
			<span class="pull-left"><?php _e("cart subtotal", 'mptheme'); ?></span> <span class="pull-right"><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span>
		</div>

		<div class="actions">
			<div>
				<a href="<?php echo wc_get_cart_url(); ?>" class="btn"> <?php _e("view cart", 'mptheme'); ?> </a>
			</div>
			<div>
				<a href="<?php echo wc_get_checkout_url(); ?>" class="btn btn-primary"> <?php _e("checkout", 'mptheme'); ?> </a>
			</div>
		</div>
	<?php } else {
            echo '<p>' . __('No products in the cart.', 'mptheme') . '</p>';
        }
	?>

	<?php
	die();
}

add_action('wp_ajax_mptheme_add_cart_single', 'mptheme_add_cart_single_ajax');
add_action('wp_ajax_nopriv_mptheme_add_cart_single', 'mptheme_add_cart_single_ajax');








// **********************************************************************//
// Ajax remove item to cart
// **********************************************************************//

function mptheme_remove_cart_single_ajax() {
	$product_cart_key = $_POST['product_cart_key'];

	WC()->cart->remove_cart_item( $product_cart_key );

	$items = WC()->cart->get_cart();

	global $woocommerce;
	$item_count = $woocommerce->cart->cart_contents_count;

	$currency = get_woocommerce_currency_symbol();

	?>

	<h6 class="title"><?php _e("cart resume", 'mptheme'); ?></h6>
	
	<div class="content cart-content-inner">

		<?php foreach($items as $item => $values) { 
			// $_product = $values['data']->post;
			$_product          = $values['data'];
			$_product_cart_key = $values['key'];

			// print_r($values);

			$product_price = get_post_meta( $values['product_id'], '_regular_price', true);
			$product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $values['product_id'], $item );
			$sale = get_post_meta( $values['product_id'], '_sale_price', true);
			?>
			
			<div class="product">
				<div class="col-xs-4 image">
					<a href="<?php echo get_permalink( $values['product_id'] ); ?>" title="<?php echo $_product->get_name(); ?>">
						<?php echo $_product->get_image(); ?>
					</a>
				</div> <!-- /.col-xs-4 -->

				<div class="col-xs-8">
					<div class="name">
						<a href="<?php echo get_permalink( $values['product_id'] ); ?>" title="<?php echo $_product->get_name(); ?>">
							<?php echo $_product->get_name(); ?>
						</a>
					</div>
					<div>
						<span class="quantity"> <?php echo $values['quantity']; ?> </span> x <span class="price"> <?php echo $product_price; ?> </span>
					</div>

					<div class="remove-item">
						<a href="<?php echo WC()->cart->get_remove_url( $cart_item_key ); ?>" class="remove-item-btn" data-key="<?php echo $_product_cart_key; ?>" data-quantity="<?php echo $values['quantity']; ?>"><?php _e('Remove item', 'mptheme'); ?></a>
					</div>
				</div> <!-- /.col-xs-8 -->
			</div> <!-- /.product -->
		<?php } ?>

	</div> <!-- /.cart-content-inner -->

	<?php if ( ! WC()->cart->is_empty() ) { ?>

		<div class="subtotal">
			<span class="pull-left"><?php _e("cart subtotal", 'mptheme'); ?></span> <span class="pull-right"><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span>
		</div>

		<div class="actions">
			<div>
				<a href="<?php echo wc_get_cart_url(); ?>" class="btn"> <?php _e("view cart", 'mptheme'); ?> </a>
			</div>
			<div>
				<a href="<?php echo wc_get_checkout_url(); ?>" class="btn btn-primary"> <?php _e("checkout", 'mptheme'); ?> </a>
			</div>
		</div>
	<?php } else {
            echo '<p>' . __('No products in the cart.', 'mptheme') . '</p>';
        }
	?>

	<?php
	die();
}

add_action('wp_ajax_mptheme_remove_cart_single', 'mptheme_remove_cart_single_ajax');
add_action('wp_ajax_nopriv_mptheme_remove_cart_single', 'mptheme_remove_cart_single_ajax');