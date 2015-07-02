<?php

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}



/**
 * Set a custom add to cart URL to redirect to
 */

function redirect_to_checkout() {
	return WC()->cart->get_checkout_url();
}
add_filter( 'woocommerce_add_to_cart_redirect', 'redirect_to_checkout' );
