<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/dchavours/
 * @since      1.0.0
 *
 * @package    Product_Placer_Simple
 * @subpackage Product_Placer_Simple/includes
 */

 class Functions_To_Fire_On_Activate{

	public static function create_page_on_activation() {

		
		$content_in_page = '
		<script src="https://www.paypalobjects.com/api/checkout.js"></script>
		<tr class="wpspsc_checkout_form"><td colspan="4"><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="item_name_1" value="Test Product">
			<input type="hidden" name="amount_1" value="29.95">
			<input type="hidden" name="quantity_1" value="1">
			<input type="hidden" name="item_number_1" value="">
		<input type="hidden" name="shipping_1" value="0.00"><input type="hidden" name="no_shipping" value="1"><input type="image" src="http://michublocal.local/wp-content/plugins/wordpress-simple-paypal-shopping-cart/images/paypal_checkout_EN.png" name="submit" class="wp_cart_checkout_button wp_cart_checkout_button_1" style="" alt="Make payments with PayPal - it\'s fast, free and secure!"><input type="hidden" name="return" value="http://michublocal.local?reset_wp_cart=1"><input type="hidden" name="notify_url" value="http://michublocal.local/?simple_cart_ipn=1">
		<input type="hidden" name="business" value="dchavours@gmail.com">
		<input type="hidden" name="currency_code" value="USD">
		<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="upload" value="1">
		<input type="hidden" name="rm" value="2">
		<input type="hidden" name="charset" value="utf-8">
		<input type="hidden" name="bn" value="TipsandTricks_SP"><input type="hidden" name="custom" value="wp_cart_id%3D231%26ip%3D127.0.0.1"></form></td></tr>
		';

		global $wpdb;
		// count how many time

		if (!post_exists( 'pps-page-2')){

			$current_user = wp_get_current_user();

			$baseName = 'HintonBurger';
			$location = 'Westboro, Richmond rd.';
			$restaurant_owner_id = 62;
			
			// create post object
			$page = array(
			  'post_title'  => __( 'pps-page-2' ),
			  'post_status' => 'publish',
			  'post_author' => $current_user->ID,
			  'post_type'   => 'page',
			  'post_content'   => $content_in_page
			  

			);
			
			// insert the post into the database
			wp_insert_post( $page );

		}


	
	}
	public static function my_first_post_type(){

		$args = array(
			
			'labels' => array(
				
				'name' => 'Cars',
				'singular_name' => 'Car',
					
		),
		
			'public' => true,
			'has_archive' =>true,
			'supports' => array('title', 'editor','thumbnail'),
			
			
		);
		
		register_post_type('cars', $args);		
		
	}

}



/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Product_Placer_Simple
 * @subpackage Product_Placer_Simple/includes
 * @author     Dennis Chavours <dchavours@gmail.com>
 */
class Product_Placer_Simple_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */


	public static function activate() {
		Functions_To_Fire_On_Activate::create_page_on_activation();
		Functions_To_Fire_On_Activate::my_first_post_type();


	}

}
