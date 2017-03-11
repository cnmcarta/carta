<? php

//require ('../class-carta-interactive-map-manager-admin.php');

public function is_valid_lat($carta_placemark_lat) {
    if ($carta_placemark_lat < 18 || $carta_placemark_lat > 40) {
        return false;
    }
    else return true;
}

public function invalid_lat_admin_notice() {
    __('<div class="notice notice-error is-dismissible">');
        __('<p>Invalid!</p>');
    __('</div>');
}

public function valid_lat_admin_notice() {
    __('<div class="notice notice-success is-dismissible">');
        __('<p>Done!</p>');
    __('</div>');
}


function is_valid_lng($carta_placemark_lng) {
    if ($carta_placemark_lng < -110 || $carta_placemark_lng > -95) {
        return false;
    }
    else return true;
}


?>