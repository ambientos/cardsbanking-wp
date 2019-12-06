<?php

/**
 * Plugin Name: AG Cardsbanking Site
 * Description: Special plugin for site
 * Version: 0.1
 * Author: Anton Grakhov
 * Author URI: https://grakhov.dev/
 * Tested up to: 5.3
 * Text Domain: cbsite
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Plugin prefix for constants
 *
 * @var string
 */
$plugin_prefix = 'AG_Cb_Site\\';


/**
 * Plugin folder name
 */
$plugin_folder_name = 'ag-cb-site';


/**
 * Main constants
 */
define( $plugin_prefix . 'TEXT_DOMAIN', 'cbsite' );
define( $plugin_prefix . 'PLUGIN_FOLDER', WP_PLUGIN_DIR . '/' . $plugin_folder_name );
define( $plugin_prefix . 'PLUGIN_URI', plugins_url( $plugin_folder_name ) );


/**
 * Autoload classes
 */
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	include __DIR__ . '/vendor/autoload.php';

	$plugin_classname = $plugin_prefix . 'Plugin';

	new $plugin_classname();
}
