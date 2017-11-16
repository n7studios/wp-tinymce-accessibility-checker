<?php
/**
* Plugin Name: TinyMCE Accessibility Checker
* Plugin URI: https://www.n7studios.co.uk
* Version: 1.0.0
* Author: n7 Studios
* Author URI: https://www.n7studios.co.uk/
* Description: Adds the TinyMCE Accessibility Plugin to Visual Editors.
*/
class WP_TinyMCE_Accessibility_Checker {

    /**
     * Constructor
     *
     * @since   1.0.0
     */
    public function __construct() {

        add_filter( 'tiny_mce_before_init', array( $this, 'tinymce_load_menu_bar' ) );
        add_filter( 'mce_external_plugins', array( $this, 'tinymce_load_plugins' ) );

    }

    /**
     * Loads the Menu Bar for every TinyMCE instance.
     *
     * This allows Tools > Check Accessibility to be accessed, as a11ychecker
     * doesn't register a button to trigger the Accessibility checker
     *
     * @since   1.0.0
     *
     * @param   array   $config     Configuration
     * @return  array               Configuration
     */
    public function tinymce_load_menu_bar( $init ) {

        $init['menubar'] = true;
        return $init;

    }

    /**
     * Loads the TinyMCE a11ychecker plugin.  You must place this JS file in the same directory as this PHP file.
     * We don't include it here, as it is a paid for product.
     *
     * For licensing, see https://www.ephox.com/products/accessibility-checker
     *
     * @since   1.0.0
     *
     * @param   array   $plugins    TinyMCE JS Plugins to load
     * @return  array               TinyMCE JS Plugins to load
     */
    public function tinymce_load_plugins( $plugins ) {

        $plugins['a11ychecker'] = content_url( 'plugins/wp-tinymce-accessibility-checker/assets/a11ychecker/plugin.min.js' );
        return $plugins;

    }

}

// Initialize
$wp_tinymce_accessibility_checker = new WP_TinyMCE_Accessibility_Checker;