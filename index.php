<?php
/*
* Plugin Name: Relive Classic
* Plugin URI: https://nhathuynhvan.com/
* Description: Plugin Relive Classic is help you use editor, widgets in classic style and disable Gutenberg.
* Version: 1.0.0
* Author: Nhat Huynh Van
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
* Requires at least: 4.9
* Requires PHP: 5.6 or later
* Tested up to: 6.0
* Text Domain: relive-classic
* Domain Path: /languages
*
* This program is free software; you can redistribute it and/or modify it under the terms of the GNU
* General Public License version 2, as published by the Free Software Foundation. You may NOT assume
* that you can use any other version of the GPL.
*
* This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
* even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

if ( ! defined( 'RELIVE_CLASSIC_PATH' ) ) {
    define( 'RELIVE_CLASSIC_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'RELIVE_CLASSIC_URL' ) ) {
    define( 'RELIVE_CLASSIC_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! class_exists( 'RELIVE_CLASSIC_IMPLEMENT' ) ) {
    class RELIVE_CLASSIC_IMPLEMENT {
        public function __construct() {
            $this->init();
            $this->hooks();
        }

        private function init(){
            $includes = array(
                'settings',
                'implement',
            );

            foreach( $includes as $files ){
                require_once( RELIVE_CLASSIC_PATH . "{$files}.php" );
            }
            
            register_activation_hook(__FILE__, array($this, 'relive_classic_install'));
            register_deactivation_hook(__FILE__, array($this, 'relive_classic_uninstall'));
        }

        public function relive_classic_install() {
            update_option( 'relive_classic_editor_enable', 'yes', false );
            update_option( 'relive_classic_widgets_enable', 'yes', false );
        }

        public function relive_classic_uninstall() {
        }

        private function hooks(){
            add_action( 'plugins_loaded', array($this, 'load_plugin_textdomain'));
            add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
        }

        function load_plugin_textdomain() {
            load_plugin_textdomain('relive-classic', FALSE, basename(RELIVE_CLASSIC_PATH) . '/languages/');
        }

        public function admin_enqueue_scripts() {
            wp_enqueue_style( 'relive-classic-style', RELIVE_CLASSIC_URL . 'admin/css/style.css' );
        }
    }

    $RELIVE_CLASSIC_IMPLEMENT = new RELIVE_CLASSIC_IMPLEMENT();
}