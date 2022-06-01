<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/kalamalahala
 * @since      1.0.0
 *
 * @package    Tjg_Users
 * @subpackage Tjg_Users/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Tjg_Users
 * @subpackage Tjg_Users/includes
 * @author     Tyler Karle <tyler@thejohnson.group>
 */
class Tjg_Users_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// Check to see if the WP Site has a "Manage Users" page or post
		global $wpdb;
		$table_name = $wpdb->prefix . 'posts';
		$post_check = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT * FROM $table_name WHERE post_name = %s",
				'manage-users'
			)
			);
		if ( !empty($post_check)) {
			// If the post exists, do nothing
		} else {
			// If the post does not exist, create it
			$manage_users_page_array = wp_insert_post(
				array(
					'post_title' => 'Manage Users',
					'post_name' => 'manage-users',
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_author' => 1,
					'post_content' => 'hello from the page template'
				));
			// Add the page template to the page
			wp_insert_post($manage_users_page_array);
		}

	}

}
