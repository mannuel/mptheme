<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mptheme
 */
	// Get cat items count
	$items = WC()->cart->get_cart();
	global $woocommerce;
	$item_count = $woocommerce->cart->cart_contents_count;
?>

<div class="floating-cart-resume">
	<h6 class="title"><?php _e("cart resume", 'mptheme'); ?></h6>
	
	<div class="content cart-content-inner">
		<?php
		foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product          = $cart_item['data'];
			$_product_cart_key = $cart_item['key'];

			$product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();
			$product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key );
			?>

			<div class="product">
				<div class="col-xs-4 image">
					<a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>" title="<?php echo $_product->get_name(); ?>">
						<?php echo $_product->get_image(); ?>
					</a>
				</div> <!-- /.col-xs-4 -->

				<div class="col-xs-8">
					<div class="name">
						<a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>" title="<?php echo $_product->get_name(); ?>">
							<?php echo $_product->get_name(); ?>
						</a>
					</div>
					<div>
						<span class="quantity"> <?php echo $cart_item['quantity']; ?> </span> x <span class="price"> <?php echo $product_price; ?> </span>
					</div>

					<div class="remove-item">
						<a href="<?php echo WC()->cart->get_remove_url( $cart_item_key ); ?>" class="remove-item-btn" data-key="<?php echo $_product_cart_key; ?>" data-quantity="<?php echo $cart_item['quantity']; ?>"><?php _e('Remove item', 'mptheme'); ?></a>
					</div>
				</div> <!-- /.col-xs-8 -->
			</div> <!-- /.product -->
			
			<?php
		}
		?>
	</div>

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
</div> <!-- /.floating-cart-resume -->

<div class="floating-cart-btn">
	<!-- <a href="<?php echo wc_get_cart_url(); ?>" class="btn-float-cart"> -->
	<a href="#" class="btn-float-cart">
		<i class="fa fa-shopping-cart" aria-hidden="true"></i>
		<span class="notification-label notification-label-red"><?php echo $item_count; ?></span>
	</a>
</div>

<?php wp_footer(); ?>
</body>
</html>