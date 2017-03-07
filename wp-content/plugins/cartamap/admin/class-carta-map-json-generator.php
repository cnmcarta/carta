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
        $args = array('post_type' => $custom_post_type);
        $map_points = get_posts($args);

        $jsonFile .=
        '{
        "markers": [
        ';
        
        foreach($map_points as $map_point){
                
                $jsonFile .= '
            {
                "ID" : "' . $map_point->ID . '",
                "name" : "' . $map_point->post_title . '",
                "category" : "' . $map_point->post_category[0] . '",
                "englishName" : "' . get_post_meta($map_point->ID, 'carta_placemark_place_name_en', true) . '",
                "spanishName" : "' . get_post_meta($map_point->ID, 'carta_placemark_place_name_es', true) . '",
                "englishDescr" : "' . get_post_meta($map_point->ID, 'carta_placemark_description_en', true) . '",
                "spanishDescr" : "' . get_post_meta($map_point->ID, 'carta_placemark_description_es', true) . '",
                "location" :{
                    "address" : "' . get_post_meta($map_point->ID, 'carta_placemark_address', true) . '",
                    "state" : "' . get_post_meta($map_point->ID, 'carta_placemark_state', true) . '",
                    "city" : "' . get_post_meta($map_point->ID, 'carta_placemark_city', true) . '",
                    "zipcode" : "' . get_post_meta($map_point->ID, 'carta_placemark_zipcode', true) . '",
                    "lat" : "' . get_post_meta($map_point->ID, 'carta_placemark_lat', true) . '",
                    "long" : "' . get_post_meta($map_point->ID, 'carta_placemark_lng', true) . '"
                }
            }';
                if(end($map_points)->ID !== $map_point->ID ){
                    $jsonFile .= ',';
                }
        };
    $jsonFile .='
        ]
    }';
        file_put_contents(plugin_dir_path(__FILE__) . '../assets/carta-map-markers.json', $jsonFile);
        
         
    }
        
}
?>