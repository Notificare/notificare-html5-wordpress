<?php

/**
 * Fired during plugin activation
 *
 * @link       https://notifica.re
 * @since      1.0.0
 *
 * @package    notificare-website-push
 * @subpackage notificare-website-push/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    notificare-website-push
 * @subpackage notificare-website-push/includes
 * @author     Joel Oliveira <joel@notifica.re>
 */
class Notificare_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

        add_option( 'notificare_applicationName' );
        add_option( 'notificare_applicationHost' );
        add_option( 'notificare_applicationKey' );
		add_option( 'notificare_applicationSecret' );
		add_option( 'notificare_applicationVersion' );
		add_option( 'notificare_allowSilent', '0' );
		add_option( 'notificare_overrideManifest', '1' );
		add_option( 'notificare_soundsDir' );
		add_option( 'notificare_serviceWorker' );
		add_option( 'notificare_serviceWorkerScope' );
		add_option( 'notificare_geolocationOptionsTimeout' );
		add_option( 'notificare_geolocationOptionsEnableHighAccuracy', '0' );
		add_option( 'notificare_geolocationOptionsMaximumAge' );
		add_option( 'notificare_gcmSender' );

	}

}
