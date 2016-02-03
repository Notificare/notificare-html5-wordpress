<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://notifica.re
 * @since      1.0.0
 *
 * @package    notificare
 * @subpackage notificare/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap notificare-admin-settings">
	<h2 class="dashicons-before dashicons-admin-settings"><?php _e('Notificare settings', Notificare::PLUGIN_NAME); ?></h2>

	<form method="post" class="settings-form">
	<?php settings_fields(Notificare::PLUGIN_NAME); ?>
		<div class="form-table">
		    <div class="description"><?php printf( __('Before continuing grab your Application Key and Application Secret from the <a href="%s">Notificare Dashboard</a>.', Notificare::PLUGIN_NAME), Notificare::DASHBOARD ); ?></div>
		    <div class="field">
                <label for="applicationname"><?php _e('Application Name',Notificare::PLUGIN_NAME) ?></label>
                <input name="applicationname" type="text" id="applicationname" value="<?php echo get_option('notificare_applicationName'); ?>" class="regular-text" />
            </div>
            <div class="field">
                <label for="applicationhost"><?php _e('Application Host',Notificare::PLUGIN_NAME) ?></label>
                <input name="applicationhost" type="text" id="applicationhost" value="<?php echo get_option('notificare_applicationHost'); ?>" class="regular-text" />
            </div>
            <div class="field">
                <label for="applicationversion"><?php _e('Application Version',Notificare::PLUGIN_NAME) ?></label>
                <input name="applicationversion" type="text" id="applicationversion" value="<?php echo get_option('notificare_applicationVersion'); ?>" class="regular-text" />
            </div>
            <h3>Keys</h3>
			<div class="field">
                <label for="applicationkey"><?php _e('Application Key',Notificare::PLUGIN_NAME) ?></label>
                <input name="applicationkey" type="text" id="applicationkey" value="<?php echo get_option('notificare_applicationKey'); ?>" class="regular-text" />
            </div>
			<div class="field">
                <label for="applicationsecret"><?php _e('Application Secret',Notificare::PLUGIN_NAME) ?></label>
                <input name="applicationsecret" type="text" id="applicationsecret"  value="<?php echo get_option('notificare_applicationSecret'); ?>" class="regular-text" />
            </div>
            <h3>Geolocation Options</h3>
            <div class="field">
                <label for="applicationgeolocationtimeout"><?php _e('Timeout',Notificare::PLUGIN_NAME) ?></label>
                <input name="applicationgeolocationtimeout" type="text" id="applicationgeolocationtimeout" value="<?php echo get_option('notificare_geolocationOptionsTimeout'); ?>" class="regular-text" />
            </div>
            <div class="field">
                <label for="applicationgeolocationaccuracy"><?php _e('Enable High Accuracy',Notificare::PLUGIN_NAME) ?></label>
                <input name="applicationgeolocationaccuracy" type="text" id="applicationgeolocationaccuracy" value="<?php echo get_option('notificare_geolocationOptionsEnableHighAccuracy'); ?>" class="regular-text" />
            </div>
            <div class="field">
                <label for="applicationgeolocationage"><?php _e('Maximum Age',Notificare::PLUGIN_NAME) ?></label>
                <input name="applicationgeolocationage" type="text" id="applicationgeolocationage" value="<?php echo get_option('notificare_geolocationOptionsMaximumAge'); ?>" class="regular-text" />
            </div>
		</div>
	<?php submit_button(); ?>
	</form>
</div>