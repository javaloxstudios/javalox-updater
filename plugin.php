<?php
/*
Plugin Name: JavaLox Updater
Plugin URI: https://github.com/Joe-Seago/javalox-updater
Description: Boilerplate for pushing automatic updates to JavaLox plugins that are not hosted on WP Plugin Directory
Version: 1.0
Contributors: javalox
Author: Joe Seago
Author URI: https://joeseago.com
License: GPLv3
License URI:  https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: javalox-updater
*/

// Load the auto-update class
function javalox_au() {
    require_once( 'wp_autoupdate.php' );

    // Set auto-update params
    $plugin_current_version = '1.0';
    $plugin_remote_path = plugin_dir_url( __FILE__ ) . 'update.php';
    $plugin_slug = plugin_basename( __FILE__ );
    $license_user = 'user';
    $license_key = 'keyabcd';

    // Only perform Auto-Update call if a license_user and license_key is given
    if ( $license_user && $license_key && $plugin_remote_path ) {
        new WP_AutoUpdate($plugin_current_version, $plugin_remote_path, $plugin_slug, $license_user, $license_key);
    }
}
add_action( 'init', 'javalox_au' );
