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

		global $wpdb;


		// count how many time


		
		if ( $wpdb->get_row( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = 'pps-cart-page'", 'ARRAY_A' == null ) ) {
			
		echo 'true - 990'; 
			// $current_user = wp_get_current_user();

			// $baseName = 'HintonBurger';
			// $location = 'Westboro, Richmond rd.';
			// $restaurant_owner_id = 62;
			
			// // create post object
			// $page = array(
			//   'post_title'  => __( 'New Page' ),
			//   'post_status' => 'publish',
			//   'post_author' => $current_user->ID,
			//   'post_type'   => 'page',
			// );
			
			// // insert the post into the database
			// wp_insert_post( $page );
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
