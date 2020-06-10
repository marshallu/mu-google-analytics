<?php
/**
 * MU Google Analytics
 *
 * @package           MU Google Analytics
 * @author            Christopher McComas
 * @copyright         2020 Marshall University/Christopher McComas
 *
 * @wordpress-plugin
 * Plugin Name:       MU Google Analytics
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Add Google Analytics Tracking ID to individual WordPress site
 * Version:           1.0.0
 * Author:            Christopher McComas
 * Author URI:        http://github.com/mccomaschris
 * Text Domain:       mu-google-analytics
 */

add_action( 'admin_menu', 'muga_plugin_menu' );

function muga_plugin_menu() {
	add_options_page( 'Marshall University Google Analytics', 'MU Google Analytics', 'manage_options', 'muga-plugin-settings-page', 'muga_plugin_settings_page' );
	add_action( 'admin_init', 'muga_plugin_settings' );
}

function muga_plugin_settings() {
	register_setting( 'muga-plugin-settings-group', 'google_tracking_id' );
}

function muga_plugin_settings_page() {
	add_action( 'admin_init', 'muga_plugin_settings' );
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

<?php }

function mu_google_analytics() { ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( get_option( 'google_tracking_id' ) ); ?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', '<?php echo esc_attr( get_option('google_tracking_id') ); ?>');
	</script>
<?php }
add_action( 'wp_head', 'mu_google_analytics', 10 );
?>

