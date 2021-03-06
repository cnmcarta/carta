<?php


class Carta_Map_Json_Generator {
    
    private $jsonfile;
    
    function __construct(){
        $jsonfile = "";
    }
    
    public function createjsonFile($custom_post_type){
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
          return;
        }
        global $wpdb;
        $results = $wpdb->get_results( 'SELECT * FROM wp_posts WHERE post_type = carta_placemark');
        $args = array('post_type' => $custom_post_type, 'numberposts' => $results);
        $map_points = get_posts($args);
        $jsonFile .=
        '{
            "markers": [
            ';
            
            foreach($map_points as $map_point){
                    
                    $jsonFile .= '
                {
                    "ID" : "' . $map_point->ID . '",
                    "category" : "' . $map_point->post_category[0] . '",
                    "englishName" : "' . esc_html( get_post_meta($map_point->ID, 'carta_placemark_place_name_en', true) ) . '",
                    "spanishName" : "' . esc_html( get_post_meta($map_point->ID, 'carta_placemark_place_name_es', true) ) . '",
                    "englishDescr" : "' . esc_html( get_post_meta($map_point->ID, 'carta_placemark_description_en', true) ) . '",
                    "spanishDescr" : "' . esc_html( get_post_meta($map_point->ID, 'carta_placemark_description_es', true) ) . '",
                    "location" :{
                        "address" : "' . get_post_meta($map_point->ID, 'carta_placemark_address', true) . '",
                        "state" : "' . get_post_meta($map_point->ID, 'carta_placemark_state', true) . '",
                        "city" : "' . get_post_meta($map_point->ID, 'carta_placemark_city', true) . '",
                        "zipcode" : "' . get_post_meta($map_point->ID, 'carta_placemark_zipcode', true) . '",
                        "lat" : "' . get_post_meta($map_point->ID, 'carta_placemark_lat', true) . '",
                        "long" : "' . get_post_meta($map_point->ID, 'carta_placemark_lng', true) . '"
                    },
                    "imageUrl" : "' . get_post_meta($map_point->ID, 'carta_placemark_image', true) . '",
                    "videoUrl" : "' . get_post_meta($map_point->ID, 'carta_placemark_video', true) . '"
                }';
                if( end($map_points)->ID !== $map_point->ID ){
                    $jsonFile .= ',';
                }
            };
        $jsonFile .='
            ]
        }';
        file_put_contents(plugin_dir_path(__FILE__) . '../public/assets/carta-map-markers.json', $jsonFile);
        
         
    }
        
}
?>