<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://notifica.re
 * @since      1.0.0
 *
 * @package    Notificare
 * @subpackage Notificare/includes
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
 * @package    notificare
 * @subpackage notificare/includes
 * @author     Joel Oliveira <joel@notifica.re>
 */
class Notificare {


    /**
	 * Plugin name
	 */
	const PLUGIN_NAME = 'Notificare';

    /**
	 * Base URL for the Dashboard
	 */
	const DASHBOARD = 'https://dashboard.notifica.re';

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Notificare_Loader    $loader    Maintains and registers all hooks for the plugin.
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

		$this->plugin_name = self::PLUGIN_NAME;
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();


		add_action( 'admin_menu', array( $this, 'addOptionsPage') );
		add_action('wp_head', array( $this, 'addRelManifest') );

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Notificare_Loader. Orchestrates the hooks of the plugin.
	 * - Notificare_i18n. Defines internationalization functionality.
	 * - Notificare_Admin. Defines all hooks for the admin area.
	 * - Notificare_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-notificare-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-notificare-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-notificare-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-notificare-public.php';


		$this->loader = new Notificare_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Notificare_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Notificare_i18n();

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

		$plugin_admin = new Notificare_Admin( $this->get_plugin_name(), $this->get_version() );

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

		$plugin_public = new Notificare_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

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
	 * @return    Notificare_Loader    Orchestrates the hooks of the plugin.
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
     * Add a settings menu to the admin dashboard
     */
    public function addOptionsPage() {
        add_options_page( 'Notificare Plugin Options', 'Notificare', 'manage_options', $this->plugin_name, array( $this, 'renderOptionsPage') );
    }


    /**
     * Render the page where we can enter settings
     */
    public function renderOptionsPage() {
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
        if ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'update' ) {

            if ( isset( $_REQUEST['applicationname'] ) ) {
                update_option( 'notificare_applicationName', $_REQUEST['applicationname'] );
            }

            if ( isset( $_REQUEST['applicationhost'] ) ) {
                update_option( 'notificare_applicationHost', $_REQUEST['applicationhost'] );
            }

            if ( isset( $_REQUEST['applicationversion'] ) ) {
                update_option( 'notificare_applicationVersion', $_REQUEST['applicationversion'] );
            }

            if ( isset( $_REQUEST['applicationkey'] ) ) {
                update_option( 'notificare_applicationKey', $_REQUEST['applicationkey'] );
            }

            if ( isset( $_REQUEST['applicationsecret'] ) ) {
                update_option( 'notificare_applicationSecret', $_REQUEST['applicationsecret'] );
            }

            if ( isset( $_REQUEST['applicationgcmsender'] ) ) {
                update_option( 'notificare_gcmSender', $_REQUEST['applicationgcmsender'] );
            }

            if ( isset( $_REQUEST['applicationallowsilent'] ) ) {
                update_option( 'notificare_allowSilent', $_REQUEST['applicationallowsilent'] );
            }

            if ( isset( $_REQUEST['applicationsounddir'] ) ) {
                update_option( 'notificare_soundsDir', $_REQUEST['applicationsounddir'] );
            }

            if ( isset( $_REQUEST['applicationserviceworker'] ) ) {
                update_option( 'notificare_serviceWorker', $_REQUEST['applicationserviceworker'] );
            }

            if ( isset( $_REQUEST['applicationserviceworkerscope'] ) ) {
                update_option( 'notificare_serviceWorkerScope', $_REQUEST['applicationserviceworkerscope'] );
            }

            if ( isset( $_REQUEST['applicationgeolocationtimeout'] ) ) {
                update_option( 'notificare_geolocationOptionsTimeout', $_REQUEST['applicationgeolocationtimeout'] );
            }

            if ( isset( $_REQUEST['applicationgeolocationaccuracy'] ) ) {
                update_option( 'notificare_geolocationOptionsEnableHighAccuracy', $_REQUEST['applicationgeolocationaccuracy'] );
            }

            if ( isset( $_REQUEST['applicationgeolocationage'] ) ) {
                update_option( 'notificare_geolocationOptionsMaximumAge', $_REQUEST['applicationgeolocationage'] );
            }

        }

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/notificare-admin-display.php';
    }

    public function addRelManifest() {
    	echo '<link rel="manifest" href="' . plugin_dir_url( __FILE__ ) . 'manifest.json.php" />';
    }


}
