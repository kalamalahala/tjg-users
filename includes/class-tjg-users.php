<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/kalamalahala
 * @since      1.0.0
 *
 * @package    Tjg_Users
 * @subpackage Tjg_Users/includes
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
 * @package    Tjg_Users
 * @subpackage Tjg_Users/includes
 * @author     Tyler Karle <tyler@thejohnson.group>
 */
class Tjg_Users {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Tjg_Users_Loader    $loader    Maintains and registers all hooks for the plugin.
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
		if ( defined( 'TJG_USERS_VERSION' ) ) {
			$this->version = TJG_USERS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'tjg-users';

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
	 * - Tjg_Users_Loader. Orchestrates the hooks of the plugin.
	 * - Tjg_Users_i18n. Defines internationalization functionality.
	 * - Tjg_Users_Admin. Defines all hooks for the admin area.
	 * - Tjg_Users_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-tjg-users-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-tjg-users-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-tjg-users-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-tjg-users-public.php';

		$this->loader = new Tjg_Users_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Tjg_Users_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Tjg_Users_i18n();

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

		$plugin_admin = new Tjg_Users_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Tjg_Users_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		// Add Page Template filter
		$this->loader->add_filter( 'page_template', $plugin_public, 'tjg_users_create_page_template' );
		

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
	 * @return    Tjg_Users_Loader    Orchestrates the hooks of the plugin.
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

	/**
	 * 	Get a list of matching Agents in The Johnson Group.
	 * 
	 * 	Return the 0th index user.
	 * 
	 * 	@param mixed $agent_number
	 * 	@return int $users
	 */
	public function get_user_by_agent_number($agent_number) {
		// Get list of users matching that agent number, return the 0th index user.
		$user_query = new WP_User_Query( array(
			'meta_key' => 'agent_number',
			'meta_value' => $agent_number,
			'number' => 1
		) );
		$users = $user_query->get_results();
		return $users[0];
	}

	public static function get_agent_number_by_user_id($id) {
		$user = get_user_by('id', $id);
		return get_user_meta($user->ID, 'agent_number', true);
	}

	/**
	 * Get the agent_number meta value of each user that has a meta tag 'saNumber' matching $sa_number
	 *
	 * @param int $sa_number
	 * @return array $agent_numbers
	 */
	public static function get_tjg_agent_children($sa_number) {
		$children_meta_query = array(
			'key' => 'saNumber',
			'value' => $sa_number,
			'compare' => '='
		);
		$children_query = new WP_User_Query( array(
			'meta_query' => array(
				$children_meta_query
			)
		) );
		$children = $children_query->get_results();
		foreach ($children as $child) {
			$agent_number = get_user_meta($child->ID, 'agent_number', true);
			$agent_numbers[] = $agent_number;
		}
		return $agent_numbers;
	}

	/**
	 * Recursively get the agent hierarchy for a given agent, or the Agency Owner by default.
	 *
	 * @param int|null $hierarchy_agent 
	 * @return array tjg_agent_hierarchy
	 */
	public static function get_tjg_agents( int $hierarchy_agent = null ) {
		$tjg_agents = [];
		// If a hierachy agent is provided, begin the search tree with that agent.
		if ( $hierarchy_agent ) {
			$tjg_agents[] = $hierarchy_agent;
		} else {
			// If no hierarchy agent is provided, begin the search tree with the Agency Owner
			$meta_query = [
				[
					'key'     => 'agent_position',
					'value'   => 'Agency Owner',
					'compare' => '=',
				],
			];
			$meta_agent = get_users( [
				'meta_query' => $meta_query,
			] );
			// Retrieve agent_number for that user
			$hierarchy_agent = self::get_agent_number_by_user_id( $meta_agent[0]->ID );
			
			$tjg_agents[] = $meta_agent[0]->ID;
		}
		// Get the agent's children
		$children = self::get_tjg_agent_children( $hierarchy_agent );
		// If there are children, recursively call this function to get their children
		if ( $children ) {
			foreach ( $children as $child ) {
				$tjg_agents = array_merge( $tjg_agents, self::get_tjg_agents( $child ) );
			}
		}
		return $tjg_agents;
	}

}
