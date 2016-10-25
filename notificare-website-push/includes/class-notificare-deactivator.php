<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://notifica.re
 * @since      1.0.0
 *
 * @package    notificare-website-push
 * @subpackage notificare-website-push/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    notificare-website-push
 * @subpackage notificare-website-push/includes
 * @author     Joel Oliveira <joel@notifica.re>
 */
class Notificare_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

        delete_option( 'notificare_applicationName' );
        delete_option( 'notificare_applicationHost' );
        delete_option( 'notificare_applicationKey' );
        delete_option( 'notificare_applicationSecret' );
        delete_option( 'notificare_applicationVersion' );
        delete_option( 'notificare_allowSilent' );
        delete_option( 'notificare_overrideManifest' );
        delete_option( 'notificare_soundsDir' );
        delete_option( 'notificare_serviceWorker' );
        delete_option( 'notificare_serviceWorkerScope' );
        delete_option( 'notificare_geolocationOptionsTimeout' );
        delete_option( 'notificare_geolocationOptionsEnableHighAccuracy' );
        delete_option( 'notificare_geolocationOptionsMaximumAge' );
        delete_option( 'notificare_gcmSender' );

		// Remove the rewrite rule on deactivation
		$wp_rewrite = $GLOBALS['wp_rewrite'];
		$wp_rewrite->flush_rules();

	}

}
