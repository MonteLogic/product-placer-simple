<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/dchavours/
 * @since      1.0.0
 *
 * @package    Product_Placer_Simple
 * @subpackage Product_Placer_Simple/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Product_Placer_Simple
 * @subpackage Product_Placer_Simple/includes
 * @author     Dennis Chavours <dchavours@gmail.com>
 */
class Product_Placer_Simple {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Product_Placer_Simple_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'PRODUCT_PLACER_SIMPLE_VERSION' ) ) {
			$this->version = PRODUCT_PLACER_SIMPLE_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'product-placer-simple';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Product_Placer_Simple_Loader. Orchestrates the hooks of the plugin.
	 * - Product_Placer_Simple_i18n. Defines internationalization functionality.
	 * - Product_Placer_Simple_Admin. Defines all hooks for the admin area.
	 * - Product_Placer_Simple_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-product-placer-simple-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-product-placer-simple-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-product-placer-simple-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-product-placer-simple-public.php';


		/**
		 * Widget class and related file function.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/widgets.php';


		/**
		 * Dependency needed for showing stars on the front end of the widget.
		 */

		require_once( ABSPATH . 'wp-admin/includes/template.php' );


		/**
		 * Calling jal_install 
		 */

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/database/create-table.php';


		$this->loader = new Product_Placer_Simple_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Product_Placer_Simple_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Product_Placer_Simple_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Product_Placer_Simple_Admin( $this->get_plugin_name(), $this->get_version() );
		$database_read = new Create_Table( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_media' );
		//add an admin menu page to the system
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'my_admin_menu' );

		// add pps_Register_Settings function

		$this->loader->add_action( 'admin_init', $plugin_admin, 'pps_custom_settings' );


		// Not sure if this widget addition functionality is plugin_admin or plugin_public 
		// 
		// 
		$this->loader->add_action( 'widgets_init', $plugin_admin, 'wpdocs_register_widgets' );

		// // Create a table for pps. 
		// $this->loader->add_action( 'activated_plugin', $plugin_admin, 'upgrade_database_ppsimple' );
	

		// Create a table for pps. 
		$this->loader->add_action( 'activated_plugin', $database_read, 'jal_install' );
	
		// Add to table for pps.
		//  jal_install_data
		$this->loader->add_action( 'activated_plugin', $database_read, 'jal_install_data' );


	//	$this->loader->add_action( 'admin_init', $plugin_admin, 'display_table_pps_values' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Product_Placer_Simple_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_media' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Product_Placer_Simple_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}




}
