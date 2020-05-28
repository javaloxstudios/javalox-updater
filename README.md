# JavaLox Plugin Auto Updater

Boilerplate auto-update plugin for JavaLox WP plugins so I can push automatic updates for custom plugins that are not hosted on WP Plugin Directory

## Quick Start

Plugin.php (or what will be the new plugin's main .php file) has the basic setup already, with a placeholder `javalox_au()` function to initialize the update function as soon as the plugin loads. After placing `wp_autoupdate.php` file in the new plugin directory, the init function then requires it:

```php
    function javalox_au() {
        require_once( 'wp_autoupdate.php' );

        // Set auto-update params
        $plugin_current_version = '<current version of new plugin>';
        $plugin_remote_path     = '<remote path to JavaLox update server>';
        $plugin_slug            = plugin_basename(__FILE__);
        $license_user           = '<license username>';
        $license_key            = '<license key>';

        // Only perform Auto-Update call if a license_user and license_key is given
        if ( $license_user && $license_key && $plugin_remote_path ) {
            new WP_AutoUpdate($plugin_current_version, $plugin_remote_path, $plugin_slug, $license_user, $license_key);
        }
    }
    add_action('init', 'javalox_au');
```

