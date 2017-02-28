<?php
/**
 * The Carta Interactive Map Manager Public defines all functionality for the public-facing
 * sides of the plugin
 *
 * @package CIMM
 */

/**
 * The Carta Interactive Map Manager Public defines all functionality for the public-facing
 * sides of the plugin.
 *
 *
 * @since    1.0.0
 */
class Carta_Interactive_Map_Manager_Public {

	/**
	 * A reference to the version of the plugin that is passed to this class from the caller.
	 *
	 * @access private
	 * @var    string    $version    The current version of the plugin.
	 */
	private $version;

	/**
	 * Initializes this class and stores the current version of this plugin.
	 *
	 * @param    string    $version    The current version of this plugin.
	 */
	public function __construct( $version ) {
		$this->version = $version;
	}

	/**
	 * Uses the partial located in the admin directory for rendering the
	 * post meta data the end of the post content.
	 *
	 * @param    string    $content    The post content.
	 * @return   string    $content    The post content including the given posts meta data.
	 */
	 /*
	public function display_post_meta_data( $content ) {

		ob_start();

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/single-post-meta-manager.php';
		$template = ob_get_contents();
		$content .= $template;

		ob_end_clean();

		return $content;

	}
	*/
	
	/**
	 * Requires the file that is used to display the shortcode content.
	 */	
	public function shortcode_cartamap() {
		//shortcodes must return content, not produce it directly 
		//https://codex.wordpress.org/Function_Reference/add_shortcode
		ob_start();
		require_once plugin_dir_path( __FILE__ ) . 'partials/shortcode_cartamap.php';
		return ob_get_clean();		
	}	

}