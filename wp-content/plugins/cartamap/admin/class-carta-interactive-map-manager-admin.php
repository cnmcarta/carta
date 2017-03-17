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
	 * A reference to the version of the plugin that is passed to this class from the caller.
	 *
	 * @access private
	 * @var    Carta_Map_Json_Generator (class-carta-map-json-generator.php)		$carta_map_json		The class that will generate the Json file.
	 */	
	private $carta_map_json;
	
	/**
	 * Initializes this class and stores the current version of this plugin.
	 *
	 * @param    string    $version    The current version of this plugin.
	 * @param	 Carta_Map_Json_Generator	$carta_map_json		The class that will generate the Json file.
	 */
	public function __construct( $version ) {
		$this->version = $version;
		$this->load_dependencies();
		$this->carta_map_json = new Carta_Map_Json_Generator();
	}
	
	//add in any dependencies for your functions here
	private function load_dependencies(){
		
		require_once(plugin_dir_path( __FILE__ ) . 'class-carta-map-json-generator.php');
		
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
		//require 'validate.php';
		
		$carta_placemark_lat = sanitize_text_field( $_POST['carta_placemark_lat'] );
		//if (isset($carta_placemark_lat) && is_valid_lat($carta_placemark_lat)){
			update_post_meta($post->ID, "carta_placemark_lat", $carta_placemark_lat);
		//	add_action('admin_notices', 'invalid_lat_admin_notice');
		//}
		//else{
		//	add_action('admin_notices', 'invalid_lat_admin_notice');
		//}
		
		$carta_placemark_lng = sanitize_text_field( $_POST['carta_placemark_lng'] );
		update_post_meta($post->ID, "carta_placemark_lng", $carta_placemark_lng);
		$carta_placemark_place_name_en = sanitize_text_field( $_POST['carta_placemark_place_name_en'] );
		update_post_meta($post->ID, "carta_placemark_place_name_en", $carta_placemark_place_name_en);
		$carta_placemark_place_name_es = sanitize_text_field( $_POST['carta_placemark_place_name_es'] );
		update_post_meta($post->ID, "carta_placemark_place_name_es", $carta_placemark_place_name_es);
		$carta_placemark_description_en = sanitize_text_field( $_POST['carta_placemark_description_en'] );
		update_post_meta($post->ID, "carta_placemark_description_en", $carta_placemark_description_en);
		$carta_placemark_description_es = sanitize_text_field( $_POST['carta_placemark_description_es'] );
		update_post_meta($post->ID, "carta_placemark_description_es", $carta_placemark_description_es);
		

			// it's an existing record
			//Write the save data to the json file
			$this->carta_map_json->createjsonfile('carta_placemark');


	}
		public function carta_localization() {
		$path = dirname(plugin_basename( __FILE__ )) . '/languages/';
		$loaded = load_plugin_textdomain( 'cartamap', false, $path);
			if ($_GET['page'] == basename(__FILE__) && !$loaded) {          
				echo '<div class="error">CARTA Localization: ' . __('Could not load the localization file: ' . $path, 'CARTA Localization') . '</div>';
				return;
			}
		}
}