<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://notifica.re
 * @since             1.0.0
 * @package           Notificare
 *
 * @wordpress-plugin
 * Plugin Name:       Notificare
 * Plugin URI:        https://notifica.re/html5-wordpress/
 * Description:       Website push notifications for Wordpress websites. Send push notifications to your website visitors even when they are not at your website.
 * Version:           1.0.0
 * Author:            Notificare
 * Author URI:        https://notifica.re
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       notificare
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-notificare-activator.php
 */
function activate_notificare() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-notificare-activator.php';
	Notificare_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-notificare-deactivator.php
 */
function deactivate_notificare() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-notificare-deactivator.php';
	Notificare_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_notificare' );
register_deactivation_hook( __FILE__, 'deactivate_notificare' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-notificare.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_notificare() {

	$plugin = new Notificare();
	$plugin->run();

}
run_notificare();
