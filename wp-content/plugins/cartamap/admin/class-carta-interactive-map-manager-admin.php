<?php

/**
 * The Carta Interactive Map Manager Admin defines all functionality for the dashboard
 * of the plugin
 *
 * @package CIMM
 */

/**
 * The Carta Interactive Map Manager Admin defines all functionality for the dashboard
 * of the plugin.
 *
 * This class defines the meta box used to display the post meta data and registers
 * the style sheet responsible for styling the content of the meta box.
 *
 * @since    1.0.0
 */
class Carta_Interactive_Map_Manager_Admin {

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
	 * Enqueues the style sheet responsible for styling this dashboard screen.
	 */

	public function enqueue_styles() {
		wp_enqueue_style(
			'carta-placemark-meta-manager-admin',
			plugin_dir_url( __FILE__ ) . 'css/carta-interactive-map-manager-admin.css',
			array(),
			$this->version,
			FALSE
		);
	}
	public function register_carta_placemark_post_type() {
	  register_post_type( 'carta_placemark',
		array(
		  'labels' => array(
			'name' => __( 'Carta Placemark' ),
			'singular_name' => __( 'Carta Placemark' )
		  ),
		  'public' => true,
		  'has_archive' => true,
		)
	  );
	  //remove the default editor box
	  //http://wordpress.stackexchange.com/questions/6856/
	  remove_post_type_support( 'carta_placemark', 'editor' );
	}	
	public function display_carta_placemark_meta_fields() {
		//https://developer.wordpress.org/reference/functions/add_meta_box/
		//add_meta_box(id,title,callback,screen,context,priority,callback_args)
		add_meta_box("carta_placemark_meta", "Carta Placemark Details", array($this,"render_carta_placemark_meta_options"), "carta_placemark", "normal", "default");
	}
	public function render_carta_placemark_meta_options() {
		require_once plugin_dir_path( __FILE__ ) . 'partials/carta-placemark-meta-options.php';
	}
	public function save_carta_placemark_meta_fields() {
		global $post;
		update_post_meta($post->ID, "carta_placemark_lat", $_POST["carta_placemark_lat"]);
		update_post_meta($post->ID, "carta_placemark_lng", $_POST["carta_placemark_lng"]);
		update_post_meta($post->ID, "carta_placemark_place_name_en", $_POST["carta_placemark_place_name_en"]);
		update_post_meta($post->ID, "carta_placemark_place_name_es", $_POST["carta_placemark_place_name_es"]);
		update_post_meta($post->ID, "carta_placemark_description_en", $_POST["carta_placemark_description_en"]);
		update_post_meta($post->ID, "carta_placemark_description_es", $_POST["carta_placemark_description_es"]);
	}
	
	
}
