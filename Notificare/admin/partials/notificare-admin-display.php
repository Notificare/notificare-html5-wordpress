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

<div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php _e('Notificare settings', Notificare::plugin_name); ?></h2>

	<form method="post">
	<?php settings_fields(Notificare::plugin_name); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="applicationKey"><?php _e('Application Key',Notificare::plugin_name) ?></label></th>
				<td>
					<input name="applicationkey" type="text" id="applicationkey" value="<?php echo get_option('notificare_applicationKey'); ?>" class="regular-text" />
					<span class="description"><?php printf( __('Copy your Application Key from <a href="%s">Notificare Dashboard</a>', Notificare::plugin_name), Notificare::DASHBOARD ); ?></span></td>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="applicationSecret"><?php _e('Application Secret',Notificare::plugin_name) ?></label></th>
				<td>
					<input name="usertoken" type="text" id="usertoken"  value="<?php echo get_option('notificare_applicationSecret'); ?>" class="regular-text" />
					<span class="description"><?php printf( __('Copy your user token from <a href="%s">Notificare Dashboard</a>', Notificare::plugin_name), Notificare::DASHBOARD ); ?></span>
				</td>
			</tr>
			</table>
	<?php submit_button(); ?>
	</form>
</div>