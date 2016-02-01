<?php

/**
 * Fired during plugin activation
 *
 * @link       https://notifica.re
 * @since      1.0.0
 *
 * @package    notificare
 * @subpackage notificare/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    notificare
 * @subpackage notificare/includes
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

	}

}
