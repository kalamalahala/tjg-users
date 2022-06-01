<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/kalamalahala
 * @since      1.0.0
 *
 * @package    Tjg_Users
 * @subpackage Tjg_Users/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Tjg_Users
 * @subpackage Tjg_Users/includes
 * @author     Tyler Karle <tyler@thejohnson.group>
 */
class Tjg_Users_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		// Delete the "Manage Users" page when deactivating the plugin
		global $wpdb;
		$table_name = $wpdb->prefix . 'posts';
		$post_check = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT * FROM $table_name WHERE post_name = %s",
				'manage-users'
			)
			);
		if ( !empty($post_check) ) {
			wp_delete_post($post_check->ID, true);
		} else {
			// If the post does not exist, do nothing
		}

	}

}
