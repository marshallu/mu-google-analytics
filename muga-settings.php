<?php
/**
 * Admin form display
 *
 * @package MU Google Analytics
 */

?>
<div class="wrap">
	<h2>MU Google Analytics</h2>

	<form method="post" action="options.php">
		<?php settings_fields( 'muga-plugin-settings-group' ); ?>
		<?php do_settings_sections( 'muga-plugin-settings-group' ); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">Enter Your Google Tracking ID</th>
				<td><input type="text" name="google_tracking_id" value="<?php echo esc_attr( get_option( 'google_tracking_id' ) ); ?>" /></td>
			</tr>
		</table>

		<?php submit_button(); ?>

	</form>
</div>
