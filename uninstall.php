<?php
/**
 * Uninstall Promotional Banner Elementor Addon
 * 
 * This file is executed when the plugin is uninstalled/deleted.
 * It cleans up all plugin data from the database.
 */

// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

/**
 * Clean up plugin options and transients
 */
function promo_banner_elementor_cleanup() {
    global $wpdb;
    
    // Delete plugin options (if any were stored)
    delete_option('promo_banner_elementor_version');
    delete_option('promo_banner_elementor_settings');
    
    // Delete transients related to the plugin
    delete_transient('promo_banner_elementor_cache');
    
    // Delete site transients (multisite compatible)
    delete_site_transient('promo_banner_elementor_network_cache');
    
    // Clean up user meta data related to the plugin (if any)
    $wpdb->delete(
        $wpdb->usermeta,
        array('meta_key' => 'promo_banner_elementor_user_settings'),
        array('%s')
    );
    
    // Clean up post meta data related to the plugin widgets
    $wpdb->delete(
        $wpdb->postmeta,
        array('meta_key' => '_elementor_data'),
        array('%s')
    );
    
    // Clean up any custom database tables (if created by the plugin)
    // Note: This plugin doesn't create custom tables, but this is where you would drop them
    
    // Clear any cached data
    wp_cache_flush();
    
    // Delete Elementor cache if it exists
    if (class_exists('\Elementor\Plugin')) {
        \Elementor\Plugin::$instance->files_manager->clear_cache();
    }
    
    // Delete any uploaded files in the plugin directory (be careful with this)
    // Only delete if you're storing files in plugin directory
    $upload_dir = wp_upload_dir();
    $plugin_upload_dir = $upload_dir['basedir'] . '/promo-banner-elementor/';
    
    if (is_dir($plugin_upload_dir)) {
        promo_banner_elementor_remove_directory($plugin_upload_dir);
    }
    
    // Log the uninstall (optional - for debugging)
    if (WP_DEBUG) {
        error_log('Promotional Banner Elementor Addon: Plugin uninstalled and data cleaned up.');
    }
}

/**
 * Recursively remove directory and its contents
 */
function promo_banner_elementor_remove_directory($dir) {
    if (is_dir($dir)) {
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                if (is_dir($dir . "/" . $file)) {
                    promo_banner_elementor_remove_directory($dir . "/" . $file);
                } else {
                    unlink($dir . "/" . $file);
                }
            }
        }
        rmdir($dir);
    }
}

/**
 * Network/Multisite cleanup
 */
function promo_banner_elementor_network_cleanup() {
    global $wpdb;
    
    if (is_multisite()) {
        // Get all blog IDs
        $blog_ids = $wpdb->get_col("SELECT blog_id FROM {$wpdb->blogs}");
        
        foreach ($blog_ids as $blog_id) {
            switch_to_blog($blog_id);
            promo_banner_elementor_cleanup();
            restore_current_blog();
        }
        
        // Clean up network-wide options
        delete_site_option('promo_banner_elementor_network_settings');
    } else {
        promo_banner_elementor_cleanup();
    }
}

// Run the cleanup
promo_banner_elementor_network_cleanup();

// Clear object cache
wp_cache_flush();

// Final log entry
if (WP_DEBUG) {
    error_log('Promotional Banner Elementor Addon: Uninstall process completed successfully.');
}