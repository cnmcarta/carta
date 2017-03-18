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
 * This class defines the meta box used to display the post meta data and registers
 * the style sheet responsible for styling the content of the meta box.
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
	 * Requires the file that is used to display the shortcode content.
	 */	
	public function shortcode_cartamap() {
		//shortcodes must return content, not produce it directly 
		//https://codex.wordpress.org/Function_Reference/add_shortcode
		
		wp_register_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', false );

		wp_register_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.3.7', 'all' );

		wp_enqueue_script( 'bootstrap-js' );

		wp_enqueue_style( 'bootstrap-css' );
		
		ob_start();
		
		wp_enqueue_style('carta_interactive_map_manager_public', plugin_dir_url( __FILE__ ) . 'css/style.css', array(), $this->version, FALSE);
		wp_enqueue_style('carta_interactive_map_manager_public1', plugin_dir_url( __FILE__ ) . 'css/modal.css', array(), $this->version, FALSE);
		
		require_once plugin_dir_path( __FILE__ ) . 'partials/shortcode-cartamap.php';
		return ob_get_clean();
		
	
	}
	/**
	 * 
	 * Custom template for public map page 
	 * 
	 */
	  
	 function carta_page_template($template){
		 if ( is_page( 'interactivemap' )  ) {
			$new_template = plugin_dir_path( __FILE__ ) . '/templates/carta-page-template.php' ;
			if ( '' != $new_template ) {
				return $new_template ;
			}
		}
		return $template;
	 }
}