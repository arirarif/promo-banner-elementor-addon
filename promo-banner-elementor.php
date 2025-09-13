<?php
/**
 * Plugin Name: Promotional Banner Elementor Addon
 * Plugin URI: https://yourwebsite.com
 * Description: Custom Elementor widget for creating promotional banners with left image and right content layout.
 * Version: 1.0.0
 * Author: Your Name
 * Text Domain: promo-banner-elementor
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

define('PROMO_BANNER_ELEMENTOR_VERSION', '1.0.0');
define('PROMO_BANNER_ELEMENTOR_FILE', __FILE__);
define('PROMO_BANNER_ELEMENTOR_PATH', plugin_dir_path(__FILE__));
define('PROMO_BANNER_ELEMENTOR_URL', plugin_dir_url(__FILE__));

/**
 * Main Plugin Class
 */
final class Promo_Banner_Elementor {
    
    /**
     * Instance
     */
    private static $_instance = null;

    /**
     * Instance
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     */
    public function __construct() {
        add_action('plugins_loaded', [$this, 'init']);
        
        // Register activation and deactivation hooks
        register_activation_hook(__FILE__, [$this, 'activate']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);
    }

    /**
     * Initialize the plugin
     */
    public function init() {
        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, '3.0.0', '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return;
        }

        // Add Plugin actions
        add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
        add_action('elementor/controls/controls_registered', [$this, 'init_controls']);

        // Register widget styles
        add_action('elementor/frontend/after_enqueue_styles', [$this, 'widget_styles']);
    }

    /**
     * Admin notice
     * Warning when the site doesn't have Elementor installed or activated.
     */
    public function admin_notice_missing_main_plugin() {
        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'promo-banner-elementor'),
            '<strong>' . esc_html__('Promotional Banner Elementor Addon', 'promo-banner-elementor') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'promo-banner-elementor') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice
     * Warning when the site doesn't have a minimum required Elementor version.
     */
    public function admin_notice_minimum_elementor_version() {
        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'promo-banner-elementor'),
            '<strong>' . esc_html__('Promotional Banner Elementor Addon', 'promo-banner-elementor') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'promo-banner-elementor') . '</strong>',
            '3.0.0'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Init Widgets
     */
    public function init_widgets() {
        require_once PROMO_BANNER_ELEMENTOR_PATH . 'widgets/promotional-banner.php';
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Promo_Banner_Widget());
    }

    /**
     * Init Controls
     */
    public function init_controls() {
        // Custom controls can be added here if needed
    }

    /**
     * Enqueue widget styles
     */
    public function widget_styles() {
        wp_enqueue_style(
            'promo-banner-elementor-styles',
            PROMO_BANNER_ELEMENTOR_URL . 'assets/css/promo-banner.css',
            [],
            PROMO_BANNER_ELEMENTOR_VERSION
        );
    }
    
    /**
     * Plugin activation
     */
    public function activate() {
        // Store plugin version
        update_option('promo_banner_elementor_version', PROMO_BANNER_ELEMENTOR_VERSION);
        
        // Store activation timestamp
        update_option('promo_banner_elementor_activated', current_time('timestamp'));
        
        // Clear any existing cache
        wp_cache_flush();
        
        // Log activation (optional - for debugging)
        if (WP_DEBUG) {
            error_log('Promotional Banner Elementor Addon: Plugin activated successfully.');
        }
    }
    
    /**
     * Plugin deactivation
     */
    public function deactivate() {
        // Clear transients and cache
        delete_transient('promo_banner_elementor_cache');
        delete_site_transient('promo_banner_elementor_network_cache');
        
        // Clear Elementor cache if available
        if (class_exists('\Elementor\Plugin')) {
            \Elementor\Plugin::$instance->files_manager->clear_cache();
        }
        
        // Flush rewrite rules
        flush_rewrite_rules();
        
        // Clear object cache
        wp_cache_flush();
        
        // Update deactivation timestamp (useful for analytics)
        update_option('promo_banner_elementor_deactivated', current_time('timestamp'));
        
        // Log deactivation (optional - for debugging)
        if (WP_DEBUG) {
            error_log('Promotional Banner Elementor Addon: Plugin deactivated successfully.');
        }
    }
}

Promo_Banner_Elementor::instance();
