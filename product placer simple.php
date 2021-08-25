<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wp2mag.blogspot.com/2021/07/product-placer.html
 * @since             1.0.0
 * @package           Product_Placer_Simple
 *
 * @wordpress-plugin
 * Plugin Name:       Product Placer Simple
 * Plugin URI:        https://github.com/dchavours/product-placer-simple
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Dennis Chavours
 * Author URI:        https://wp2mag.blogspot.com/2021/07/product-placer.html
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       product placer simple
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PRODUCT PLACER SIMPLE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-product placer simple-activator.php
 */
function activate_product placer simple() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-product placer simple-activator.php';
	Product_Placer_Simple_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-product placer simple-deactivator.php
 */
function deactivate_product placer simple() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-product placer simple-deactivator.php';
	Product_Placer_Simple_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_product placer simple' );
register_deactivation_hook( __FILE__, 'deactivate_product placer simple' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-product placer simple.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_product placer simple() {

	$plugin = new Product_Placer_Simple();
	$plugin->run();

}
run_product placer simple();
