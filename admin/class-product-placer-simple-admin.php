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

		add_menu_page( 'PPS General Settings', 'PPS Settings', 'manage_options', 'ParentPagePPS', array( $this , 'ppssettingscallbacks') , 'dashicons-info', 250  );

		// add_menu_page( $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $function:callable, $icon_url:string, $position:integer|null )
		// add_submenu_page( $parent_slug:string, $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $function:callable, $position:integer|null )
		
	
		
		// I'll deal with this later 
			add_submenu_page( 'ParentPagePPS', 'Sub 1', 'PPS Importer', 'manage_options', 'SubPagePPS', array( $this , 'SubPagePPS_function' ));
		
		}

	public function ppssettingscallbacks(){
		//return views
		require_once 'partials/ppssettingscallbacks.php';

		}
	
	public function SubPagePPS_function(){

		require_once 'partials/subPageOne.php';

	}

	public function register_pps_general_settings(){
		//registers all settings for general settings page
		register_setting( 'sunset-settings-group', 'profile_picture' );


	// Add Settings Section, I wonder if this is implemented any different. Or is harder to implement. 
		add_settings_section( 'pps-sidebar-options', 'Sidebar Option', 'sunset_sidebar_options', 'pps_home');
		// add_settings_section( $id:string, $title:string, $callback:callable, $page:string )




		add_settings_field( 'sidebar-profile-picture', 'Product Picture', 'pps_sidebar_profile', 'pps_home', 'pps-sidebar-options');
	//	add_settings_field( $id:string,                $title:string,       $callback:callable,   $page:string,     $section:string)


	}


	function pps_sidebar_options() {
		echo 'Customize your Sidebar Information';

	}

	function pps_sidebar_profile(){


			$picture = esc_attr( get_option( 'profile_picture' ) );
			echo '<input type="button" class="button button-secondary" value="Upload Product Picture" id="upload-button">
					<input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" />';
		
	
		
	}










}




