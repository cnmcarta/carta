<?php
    
    //url will link to the page that allows for selecting media.  When called will open up a new selection interface
    $upload_url = esc_url(get_upload_iframe_src('image', $post->ID));
    
    //Retreive the media id if it already exists
    $media_id = get_post_meta($post->ID, 'carta_placemark_media', true);
    
    $media_type = get_post_meta($post->ID, 'carta_placemark_media_type', true); 
    
    //retreive the url of the media file if it exists
    $media_source = wp_get_attachment_url($media_id);
    ?>
    
    <div id="map-media-meta">


        <div class="uploaded-image">
        <?php
        $media_type = "image";

        if($media_source != null || $media_source != "" && $media_type == "image"){
            echo '<img src="'.$media_source.'" alt="" style="max-width:100%;" />';
        } 
        else if($media_source != null || $media_source != "" && $media_type == "video"){
            echo '<iframe src="' . $media_source . '">
                    <p>Your browser does not support this video.</p>
                  </iframe>';
        }
        ?>
        </div>
        
        <button class="upload-file <?php if($media_source != null){ echo 'hidden'; } ?>">Select Media</button>
        <button class="delete-file <?php if($media_source == null){ echo 'hidden'; } ?>">Delete Media</button>
        <input type="hidden" name="map_location_media_id" id="upload-img-id"></input>
    </div>