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

/**
 * Add the settings page to the Dashboard.
 */
function muga_plugin_menu() {
	add_options_page( 'Marshall University Google Analytics', 'MU Google Analytics', 'manage_options', 'muga-plugin-settings-page', 'muga_plugin_settings_page' );
}
add_action( 'admin_menu', 'muga_plugin_menu' );

/**
 * Register the setting for the plugin
 */
function muga_plugin_settings() {
	register_setting( 'muga-plugin-settings-group', 'google_tracking_id' );
}
add_action( 'admin_init', 'muga_plugin_settings' );

/**
 * Register the settings page for the plugin
 */
function muga_plugin_settings_page() {
	require __DIR__ . '/muga-settings.php';
}
add_action( 'admin_init', 'muga_plugin_settings' );


function muga_embed_in_head() {
	echo '<script async src="https://www.googletagmanager.com/gtag/js?id=' . esc_attr( get_option( 'google_tracking_id' ) ) . '"></script>';
	echo '<script>';
	echo 'window.dataLayer = window.dataLayer || [];';
	echo 'function gtag(){dataLayer.push(arguments);}';
	echo 'gtag(\'js\', new Date());';
	echo "gtag('config', '" . esc_attr( get_option( 'google_tracking_id' ) ) . "');";
	echo '</script>';
}
add_action( 'wp_head', 'muga_embed_in_head' );
