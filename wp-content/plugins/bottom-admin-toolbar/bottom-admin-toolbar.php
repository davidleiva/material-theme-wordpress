<?php
/**
 * Plugin Name:       Bottom Admin Toolbar
 * Plugin URI:        https://wordpress.org/plugins/bottom-admin-toolbar/
 * Description:       Change your admin bar position by activating that simple extension.
 * Version:           1.4.1
 * Tags:              admin, bar, adminbar, bottom bar, toolbar, WordPress, bottom
 * Requires at least: 3.0 or higher
 * Requires PHP:      5.6
 * Tested up to:      5.8
 * Stable tag:        1.4.1
 * Author:            DevlopEr
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Contributors:      DevlopEr
 * Donate link:       https://ko-fi.com/devloper
 */

// Variables
define( 'BAB_PATH', plugin_dir_path( __FILE__ ) );
define( 'BAB_ASSETS_URL', plugin_dir_url( __FILE__ ) . 'assets/' );
define( 'BAB_BASENAME', plugin_basename( __FILE__ ) );

if ( !class_exists( 'BottomAdminToolbar' ) ) :
    /**
     * BottomAdminToolbar
     */
    class BottomAdminToolbar {

        /**
         * Constructor
         */
        public function __construct() {
            $this->setup_actions();
        }

        /**
         * Setting up Hooks
         */
        public function setup_actions() {
            add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) ); // Remove loaded default style
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_files' ) ); // Enqueue Files
        }

        /**
         * Enqueue custom files
         */
        public function enqueue_files() {
            if ( is_admin_bar_showing() ) :
                wp_enqueue_style( 'bab-css', BAB_ASSETS_URL . 'bab.css', array(), '1.0', 'all' );
                wp_enqueue_script( 'bab-js', BAB_ASSETS_URL . 'bab.js', array( 'jquery' ), '1.0', true );
            endif;
        }

    }
    new BottomAdminToolbar();
endif;
