<? php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    cartamap
 * @subpackage cartamap/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    cartamap
 * @subpackage cartamap/includes
 * @author     Stephen Gralton <stephen.gralton@gmail.com>, Matthew Vicetjindawat, Brandy Yeazell, Andrew Kapuscinski, Eduardo Vazquez, John Cairns, 
 */
//class Cartamap_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_textdomain() {

		load_plugin_textdomain(
			'cartamap',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
