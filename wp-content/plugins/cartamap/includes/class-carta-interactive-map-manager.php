<?php
/**
 * The Carta Interactive Map Manager is the core plugin responsible for including and
 * instantiating all of the code that composes the plugin
 *
 * @package SPMM
 */

/**
 * The Carta Interactive Map Manager is the core plugin responsible for including and
 * instantiating all of the code that composes the plugin.
 *
 * The Carta Interactive Map Manager includes an instance to the Carta Interactive Map 
 * Loader which is responsible for coordinating the hooks that exist within the
 * plugin.
 *
 * It also maintains a reference to the plugin slug which can be used in
 * internationalization, and a reference to the current version of the plugin
 * so that we can easily update the version in a single place to provide
 * cache busting functionality when including scripts and styles.
 *
 * @since    1.0.0
 */ 
class Carta_Interactive_Map_Manager {
	
	/**
	 * A reference to the loader class that coordinates the hooks and callbacks
	 * throughout the plugin.
	 *
	 * @access protected
	 * @var    Carta_Interactive_Map_Manager_Loader   $loader    Manages hooks between the WordPress hooks and the callback functions.
	 */ 
	protected $loader;

	/**
	 * Represents the slug of the plugin that can be used throughout the plugin
	 * for internationalization and other purposes.
	 *
	 * @access protected
	 * @var    string   $plugin_slug    The single, hyphenated string used to identify this plugin.
	 */	
	protected $plugin_slug;
	
	/**
	 * Maintains the current version of the plugin so that we can use it throughout
	 * the plugin.
	 *
	 * @access protected
	 * @var    string   $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Instantiates the plugin by setting up the core properties and loading
	 * all necessary dependencies and defining the hooks.
	 *
	 * The constructor will define both the plugin slug and the verison
	 * attributes, but will also use internal functions to import all the
	 * plugin dependencies, and will leverage the Carta_Interactive_Map_Manager_Loader for
	 * registering the hooks and the callback functions used throughout the
	 * plugin.
	 */	
	 public function __construct() {

		$this->plugin_slug = 'carta-interactive-map-manager-slug'; //useful in plugin repository??
		$this->version = '0.2.0';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		
		

	}
	
	/**
	 * Imports the Carta Interactive Map  administration classes, and the Carta Interactive Map Manager Loader.
	 *
	 * The Carta Interactive Map Manager Manager administration class defines all unique functionality for
	 * introducing custom functionality into the WordPress dashboard.
	 *
	 * The Carta Interactive Map Manager Loader is the class that will coordinate the hooks and callbacks
	 * from WordPress and the plugin. This function instantiates and sets the reference to the
	 * $loader class property.
	 *
	 * @access    private
	 */	
	private function load_dependencies() {

		//admin dashboard content
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-carta-interactive-map-manager-admin.php';
		
		
		//public facing content
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-carta-interactive-map-manager-public.php';
		
		require_once plugin_dir_path( __FILE__ ) . 'class-carta-interactive-map-manager-loader.php';
		$this->loader = new Carta_Interactive_Map_Manager_Loader();
	}
	
	/**
	 * Defines the hooks and callback functions that are used for setting up the plugin dashboard 
	 * stylesheets and other functionality.
	 *
	 * This function relies on the Carta Interactive Map Manager Admin class and the 
	 * Carta Interactive Map Manager Loader class property.
	 *
	 * @access    private
	 */	
	private function define_admin_hooks() {

		//hooks for admin dashboard
		//see load_dependencies()
		$admin = new Carta_Interactive_Map_Manager_Admin( $this->get_version() );
		////////// Following Line: syntax to define admin hooks ///////////////
		//$this->loader->add_action( 'hook', $admin, 'function in $admin' );
		////////// CARTA Placemark Custom Post Type //////////////////////////
		//register carta placemark custom post type
		$this->loader->add_action( 'init', $admin, 'register_carta_placemark_post_type' );
		//display custom meta boxes for carta_placemark_post_type
		$this->loader->add_action( 'admin_init', $admin, 'display_carta_placemark_meta_fields' );
		//admin page styles for carta placemark custom post type
		$this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_styles' );
		//save carta_placemark_post_type meta data
		$this->loader->add_action( 'save_post', $admin, 'save_carta_placemark_meta_fields' );
		// i18n
		//$this->loader->add_action( 'plugins_loaded', $admin, 'load_textdomain' );
		$this->loader->add_action('init', $admin,'carta_localization');
	}
	
	/**
	 * Defines the hooks and callback functions that are used for rendering information on the front
	 * end of the site.
	 *
	 * This function relies on the Carta Interactive Map Manager Public class and the 
	 * Carta Interactive Map Manager Loader class property.
	 *
	 * @access    private
	 */
	private function define_public_hooks() {

		//see load_dependencies()
		$public = new Carta_Interactive_Map_Manager_Public( $this->get_version() );
		//shortcodes
		
		//shortcodes must return the content, not produce it directly
		//https://codex.wordpress.org/Function_Reference/add_shortcode
		
		//example for plugin designed as a class
		//https://developer.wordpress.org/reference/functions/add_shortcode/
		$this->loader->add_shortcode( 'interactive_cartamap', $public, 'shortcode_cartamap' );
		/* following variations also work
		//$this->loader->add_shortcode( 'interactive_cartamap','Carta_Interactive_Map_Manager_Admin','shortcode_cartamap' );
		//add_shortcode( 'interactive_cartamap', array( 'Carta_Interactive_Map_Manager_Admin', 'shortcode_cartamap' ) );
		*/
		//apply custom template to the public map page
		$this->loader->add_filter( 'template_include', $public, 'carta_page_template' );
		//$this->loader->load_plugin_textdomain($this->textdomain, false, dirname(plugin_basename(__FILE__)) . '/languages');
	
	}	
	

	/**
	 * Sets this class into motion.
	 *
	 * Executes the plugin by calling the run method of the loader class which will
	 * register all of the hooks and callback functions used throughout the plugin
	 * with WordPress.
	 */
	public function run() {
		$this->loader->run();
	}
	
	/**
	 * Returns the current version of the plugin to the caller.
	 *
	 * @return    string    $this->version    The current version of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}


// /**
//  * Load plugin textdomain.
//  *
//  * @since 1.0.0
//  */
// function cartamap_load_textdomain() {
//   load_plugin_textdomain( 'cartamap', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
// }
// add_action( 'init', 'cartamap_load_textdomain' );

}
