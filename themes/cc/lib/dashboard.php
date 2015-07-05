<?php
/**
 **** Dashboard functions
 */


/**
 * check if page slug exists
 *
 * @param $post_name
 *
 * @return bool
 */
function the_slug_exists($post_name) {
	global $wpdb;
	if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
		return true;
	} else {
		return false;
	}
}

/**
* programatically create dashboard pages on theme activation if not found
 */
function create_customer_dash_pages() {
	if (isset($_GET['activated']) && is_admin()){

		global $user_ID;

		$customer_dash_title = "Customer Dashboard";
		$customer_dash_check = get_page_by_title($customer_dash_title);
		$customer_dash['post_type']    =   'page';
		$customer_dash['ID']           =   99;
		$customer_dash['post_title']   =   $customer_dash_title;
		$customer_dash['post_author']  =   $user_ID;
		$customer_dash['page_template']    = 'template-dashboard.php';
		$customer_dash['post_status']  =   'publish';
		$customer_dash['ping_status']  =   'closed';

		if(!isset( $customer_dash_check->ID) && !the_slug_exists('customer-dashboard')){
			$customer_dash_id = wp_insert_post($customer_dash);
		}

		$customer_dash_coupon_create_title = "Coupon Creator";
		$customer_dash_coupon_create_check = get_page_by_title($customer_dash_coupon_create_title);
		$customer_dash_coupon_create['post_type']    =   'page';
		$customer_dash_coupon_create['post_title']   =   $customer_dash_coupon_create_title;
		$customer_dash_coupon_create['post_author']  =   $user_ID;
		$customer_dash_coupon_create['post_parent']    =   99;
		$customer_dash_coupon_create['page_template']    = 'template-dashboard.php';
		$customer_dash_coupon_create['post_status']  =   'publish';
		$customer_dash_coupon_create['ping_status']  =   'closed';

		if(!isset( $customer_dash_coupon_create_check->ID) && !the_slug_exists('coupon-creator')){
			$customer_dash_coupon_create_id = wp_insert_post($customer_dash_coupon_create);
		}
	}


} // end programmatically_create_post
add_filter( 'after_setup_theme', 'create_customer_dash_pages' );




// returns the content of $GLOBALS['post']
// if the page is called 'debug'
function my_the_content_filter($content) {
	// assuming you have created a page/post entitled 'debug'
	if ($GLOBALS['post']->post_name == 'coupon-creator') {
		get_template_part('templates/ccdash/ccdash-coupon-creator');
	}
	// otherwise returns the database content
	return $content;
}

add_filter( 'the_content', 'my_the_content_filter' );