<?php
/*
 * The file responsible for starting the Carta Interactive Map
 * Carta Interactive Map is a plugin to display an interactive map of the Camino Real Trail 
 * from Mexico  City to north of Santa Fe NM
 * This particular file is responsible for including the necessary dependencies and starting the plugin.
 * Plugin Name:       Carta Interactive Map
 * Plugin URI:        http://example.com
 * Description:       Display an interactive map of the Camino Real
 * Version:           0.2.0
 * Author:            CIS1730
 * Author URI:        http://example.com
 * Text Domain:       carta-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */
 // Domain path is used to internationalize the plugin
 //https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/
 //
 //This plugin developed from tutorial at
 //https://code.tutsplus.com/tutorials/object-oriented-programming-in-wordpress-building-the-plugin-ii--cms-21105
 //
// If this file is called directly, then abort execution. 
if ( ! defined( 'WPINC' ) ) {
    die; //can only run as part of WordPress, Cannot directly navigate to this file
}
/**
 * Include the core class responsible for loading all necessary components of the plugin.
 */ 
require_once plugin_dir_path( __FILE__ ) . 'includes/class-carta-interactive-map-manager.php';
 
/**
 * Instantiates the Carta Interactive Map Manager class and then
 * calls its run method officially starting up the plugin.
 */ 
function run_carta_interactive_map_manager() {
 
    $cimm = new Carta_Interactive_Map_Manager();
    $cimm->run();
 
}
// Call the above function to begin execution of the plugin.
run_carta_interactive_map_manager();
