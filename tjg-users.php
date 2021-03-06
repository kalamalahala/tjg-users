<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/kalamalahala
 * @since             0.1.0
 * @package           Tjg_Users
 *
 * @wordpress-plugin
 * Plugin Name:       The Johnson Group - User Administration
 * Plugin URI:        https://github.com/kalamalahala
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           0.1.0
 * Author:            Tyler Karle
 * Author URI:        https://github.com/kalamalahala
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tjg-users
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 0.1.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TJG_USERS_VERSION', '0.1.0' );

/**
 * Define server root location
 */
define( 'TJG_USERS_ROOT', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tjg-users-activator.php
 */
function activate_tjg_users() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tjg-users-activator.php';
	Tjg_Users_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tjg-users-deactivator.php
 */
function deactivate_tjg_users() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tjg-users-deactivator.php';
	Tjg_Users_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tjg_users' );
register_deactivation_hook( __FILE__, 'deactivate_tjg_users' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tjg-users.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_tjg_users() {

	$plugin = new Tjg_Users();
	$plugin->run();

}
run_tjg_users();
