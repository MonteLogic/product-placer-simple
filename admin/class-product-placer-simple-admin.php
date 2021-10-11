<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/dchavours/
 * @since      1.0.0
 *
 * @package    Product_Placer_Simple
 * @subpackage Product_Placer_Simple/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Product_Placer_Simple
 * @subpackage Product_Placer_Simple/admin
 * @author     Dennis Chavours <dchavours@gmail.com>
 */
class Product_Placer_Simple_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->load_dependencies();

	}


	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files to run logic related to this file:
	 * - Read data from table, functions consist of returnable values and logic which can be iterated upon.
	 *	 : File - admin/database/read-table-data.php
	 *	 : Classes - "Read_Table_Data"

	 */


	private function load_dependencies() {

		include plugin_dir_path( dirname( __FILE__ ) ) . 'admin/database/read-table-data.php';



	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Product_Placer_Simple_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Product_Placer_Simple_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/product-placer-simple-admin.css', array(), $this->version, 'all' );

		// bootstrap to the admin side.
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/main.css', array(), $this->version, 'all' );
	

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Product_Placer_Simple_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Product_Placer_Simple_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/product-placer-simple-admin.js', array( 'jquery' ), $this->version, false );

	}

		/**
	 * Register the menu and sub menu items for the admin area
	 *
	 * @since    1.0.0
	 */
	public function my_admin_menu() {

		add_menu_page( 'PPS General Settings', 'PPS Settings', 'manage_options', 'ParentPagePPS', array( $this , 'pps_settings_home') , 'dashicons-info', 250  );

		// add_menu_page( $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $function:callable, $icon_url:string, $position:integer|null )
		// add_submenu_page( $parent_slug:string, $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $function:callable, $position:integer|null )
		
	
		
		// I'll deal with this later 
			add_submenu_page( 'ParentPagePPS', 'Sub 1', 'PPS Importer', 'manage_options', 'SubPagePPS', array( $this , 'SubPagePPS_function' ));
		
		}



	/**
	 *	- This creates the preview of the avatar which will go on the widget. Most of the logic that goes on the home page should be put
	 * 		in the pps-settings-home.php file.
	 * 
	 *
	 * @since    0.8
	 */
	

	public function pps_settings_home(){
		
		require_once 'partials/pps-settings-home.php';

	}


	/**
	 * Creates the page Second Page, which is a subpage.
	 *
	 * @since    0.8
	 */
	
	public function SubPagePPS_function(){

		require_once 'partials/subPageOne.php';

	}





/**
 * 
 * Register custom fields for product settings.
 *

 * @since      1.0.0
 *
 */

		function pps_custom_settings(){

		
		// Add Settings Section, I wonder if this is implemented any different. Or is harder to implement. 
		add_settings_section( 'pps-sidebar-options', 'Sidebar Option', 'pps_sidebar_options', 'ParentPagePPS');
		// add_settings_section( $id:string, $title:string, $callback:callable, $page:string )



		register_setting( 'pps-settings-group', 'number' );
		

					//registers all settings for general settings page
		register_setting( 'pps-settings-group', 'profile_picture' );
		//register_setting( $option_group:string, $option_name:string, $args:array )


		register_setting( 'pps-settings-group', 'last_name' );
		register_setting( 'pps-settings-group', 'user_description' );
		register_setting( 'pps-settings-group', 'twitter_handler', 'pps_sanitize_twitter_handler' );
		register_setting( 'pps-settings-group', 'facebook_handler' );
		register_setting( 'pps-settings-group', 'selected_page' );
		register_setting( 'pps-settings-group', 'dropdown_settings' );
		




	add_settings_field( 'sidebar-profile-picture', 'Product Picture', 'pps_sidebar_profile', 'ParentPagePPS', 'pps-sidebar-options');
//	add_settings_field( $id:string,                $title:string,       $callback:callable,   $page:string,     $section:string)


	add_settings_field( 'sidebar-profile-picture', 'Product Picture', 'pps_sidebar_profile', 'ParentPagePPS', 'pps-sidebar-options');
	//add_settings_field( $id:string, $title:string, $callback:callable, $page:string, $section:string, $args:array )
	add_settings_field( 'sidebar-product-name', 'Product Name', 'product_sidebar_name', 'ParentPagePPS', 'pps-sidebar-options');
	add_settings_field( 'sidebar-description', 'Description', 'pps_sidebar_description', 'ParentPagePPS', 'pps-sidebar-options');
	
	//Todo: import the logic from mho into the function.
	//add_settings_field( 'external-link', 'Link To External Product', 'link_external_product', 'ParentPagePPS', 'pps-sidebar-options');

	// Dropdown field function
	//add_settings_field( 'dropdown-function', 'Link To Internal Product', 'show_drop_down', 'ParentPagePPS', 'pps-sidebar-options');	

		}



		function wpdocs_register_widgets() {
			register_widget( 'PPS_Widget_Plugin' );
		}



	 // The Product_Placer_Simple_Admin class ends here
}
	



function product_sidebar_name() {
	// '.Read_Table_Data::display_table_pps_values().'

	
	echo_some_value();

	if(!empty(Read_Table_Data::display_table_pps_values())){
		echo '<input type="text" name="product_sidebar_name" value ="'.Read_Table_Data::display_table_pps_values().'" placeholder="Description" />

					<p class="description">Write product name</p>';

	}


	if(empty(Read_Table_Data::display_table_pps_values())){

	$picture = esc_attr( get_option( 'profile_picture' ) );
	echo '<input type="button" class="button button-secondary" value="Upload Product Picture" id="upload-button">
			<input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" />';
		}



}



function pps_sidebar_options() {
	echo 'Customize your Sidebar Options';

}


function pps_sidebar_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	echo '<input type="button" class="button button-secondary" value="Upload Product Picture" id="upload-button">
			<input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" />';

}



function pps_sidebar_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" />
			<p class="description">Write short product description</p>';
}