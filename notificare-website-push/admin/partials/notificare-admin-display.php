<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://notifica.re
 * @since      1.0.0
 *
 * @package    notificare-website-push
 * @subpackage notificare-website-push/admin/partials
 */
?>
<?php settings_errors(); ?>
<div class="wrap notificare-admin-settings">
	<h2 class="dashicons-before dashicons-admin-settings"><?php _e('Notificare settings', Notificare::PLUGIN_NAME); ?></h2>

	<form method="post" class="settings-form">
	<?php settings_fields(Notificare::PLUGIN_NAME); ?>
		<div class="form-table">
		    <div class="description"><?php printf( __( 'Before continuing grab your Application Key and Application Secret from', Notificare::PLUGIN_NAME ) ); ?> <a href="https://dashboard.notifica.re">dashboard.notifica.re</a></div>
		    <div class="description"><?php printf( __( 'For information about this plugin configuration, please visit', Notificare::PLUGIN_NAME ) ); ?> <a href="http://docs.notifica.re">docs.notifica.re</a></div>
            <div class="field">
                <label for="applicationname"><?php _e( 'Application Name', Notificare::PLUGIN_NAME ) ?></label>
                <input name="applicationname" type="text" id="applicationname" value="<?php echo esc_html( get_option( 'notificare_applicationName' ) ); ?>" class="regular-text" />
            </div>
            <div class="field">
                <label for="applicationhost"><?php _e( 'Application Host', Notificare::PLUGIN_NAME ) ?></label>
                <input name="applicationhost" type="text" id="applicationhost" value="<?php echo esc_html( get_option( 'notificare_applicationHost' ) ); ?>" class="regular-text" />
            </div>
            <div class="field">
                <label for="applicationversion"><?php _e( 'Application Version', Notificare::PLUGIN_NAME ) ?></label>
                <input name="applicationversion" type="text" id="applicationversion" value="<?php echo esc_html( get_option( 'notificare_applicationVersion' ) ); ?>" class="regular-text" />
            </div>
            <div class="field">
                <label for="applicationallowsilent" class="checkboxes">
                    <input name="applicationallowsilent" type="checkbox" id="applicationallowsilent" value="1" <?php checked('1', get_option('notificare_allowSilent'));?> />
                    <?php _e( 'Allow Silent Push', Notificare::PLUGIN_NAME  ) ?>
                </label>
            </div>
            <div class="field">
                <label for="applicationsounddir"><?php _e( 'Sounds Directory', Notificare::PLUGIN_NAME ) ?></label>
                <input name="applicationsounddir" type="text" id="applicationsounddir" value="<?php echo esc_html( get_option( 'notificare_soundsDir' ) ); ?>" class="regular-text" />
            </div>
            <h3><?php _e( 'Application Keys', Notificare::PLUGIN_NAME ) ?></h3>
			<div class="field">
                <label for="applicationkey"><?php _e( 'Application Key', Notificare::PLUGIN_NAME ) ?></label>
                <input name="applicationkey" type="text" id="applicationkey" value="<?php echo esc_html( get_option( 'notificare_applicationKey' ) ); ?>" class="regular-text" />
            </div>
			<div class="field">
                <label for="applicationsecret"><?php _e( 'Application Secret', Notificare::PLUGIN_NAME ) ?></label>
                <input name="applicationsecret" type="text" id="applicationsecret"  value="<?php echo esc_html( get_option( 'notificare_applicationSecret' ) ); ?>" class="regular-text" />
            </div>
            <h3><?php _e( 'Service Worker', Notificare::PLUGIN_NAME ) ?></h3>
            <div class="field">
                <label for="applicationserviceworker"><?php _e( 'Service Worker File', Notificare::PLUGIN_NAME ) ?></label>
                <input name="applicationserviceworker" type="text" id="applicationserviceworker" value="<?php echo esc_html( get_option( 'notificare_serviceWorker' ) ); ?>" class="regular-text" />
            </div>
            <div class="field">
                <label for="applicationserviceworkerscope"><?php _e( 'Service Worker Scope', Notificare::PLUGIN_NAME ) ?></label>
                <input name="applicationserviceworkerscope" type="text" id="applicationserviceworkerscope" value="<?php echo esc_html( get_option( 'notificare_serviceWorkerScope' ) ); ?>" class="regular-text" />
            </div>
            <h3><?php _e( 'GCM', Notificare::PLUGIN_NAME ) ?></h3>
            <div class="field">
                <label for="applicationoverridemanifest" class="checkboxes">
                    <input name="applicationoverridemanifest" type="checkbox" id="applicationoverridemanifest" value="1" <?php checked('1', get_option('notificare_overrideManifest'));?> />
                    <?php _e( 'Override manifest.json', Notificare::PLUGIN_NAME  ) ?>
                </label>
                <div class="description"><?php printf( __( 'If not overridden, you must provide a manifest file yourself. Read more about manifest files ', Notificare::PLUGIN_NAME ) ); ?> <a href="https://developer.mozilla.org/en-US/docs/Web/Manifest" target="_blank"><?php printf( __( 'here', Notificare::PLUGIN_NAME ) ); ?></a>.</div>
            </div>
            <div class="field">
                <label for="applicationgcmsender"><?php _e( 'GCM Sender ID', Notificare::PLUGIN_NAME ) ?></label>
                <input name="applicationgcmsender" type="text" id="applicationgcmsender" value="<?php echo esc_html( get_option( 'notificare_gcmSender' ) ); ?>" class="regular-text" />
            </div>
            <h3><?php _e( 'Geolocation Options', Notificare::PLUGIN_NAME ) ?></h3>
            <div class="field">
                <label for="applicationgeolocationtimeout"><?php _e( 'Timeout', Notificare::PLUGIN_NAME ) ?></label>
                <input name="applicationgeolocationtimeout" type="text" id="applicationgeolocationtimeout" value="<?php echo esc_html( get_option( 'notificare_geolocationOptionsTimeout' ) ); ?>" class="regular-text" />
            </div>
            <div class="field">
                <label for="applicationgeolocationaccuracy" class="checkboxes">
                    <input name="applicationgeolocationaccuracy" type="checkbox" id="applicationgeolocationaccuracy" value="1" <?php checked('1', get_option('notificare_geolocationOptionsEnableHighAccuracy'));?> />
                    <?php _e( 'Enable High Accuracy', Notificare::PLUGIN_NAME ) ?>
                </label>
            </div>
            <div class="field">
                <label for="applicationgeolocationage"><?php _e( 'Maximum Age', Notificare::PLUGIN_NAME ) ?></label>
                <input name="applicationgeolocationage" type="text" id="applicationgeolocationage" value="<?php echo esc_html( get_option( 'notificare_geolocationOptionsMaximumAge' ) ); ?>" class="regular-text" />
            </div>
		</div>
	<?php submit_button(); ?>
	</form>
</div>