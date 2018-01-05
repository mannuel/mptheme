<?php
/**
 * Custom hooks and function for woocommerce compatibility
 *
 * @package mptheme
 */

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
	return array(
			'delimiter'   => ' &#47; ',
			'wrap_before' => '<nav class="container" itemprop="breadcrumb"> <div class="woocommerce-breadcrumb">',
			'wrap_after'  => '</div></nav>',
			'before'      => '',
			'after'       => '',
			'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
		);
}