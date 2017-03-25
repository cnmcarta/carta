<?php
    global $post;

    
    //url will link to the page that allows for selecting media.  When called will open up a new selection interface
    $upload_url = esc_url(get_upload_iframe_src('image', $post->ID));
    
    //Retreive the image url if exists
    //DOES NOT WORK
    $carta_image_url = esc_url( get_post_meta( $post->ID, 'carta_placemark_image', true ) );
    
    $carta_video_url = esc_url( get_post_meta( $post->ID, 'carta_placemark_video', true ) );
    ?>
    


    <div id="map-media-meta">
    <fieldset class="inner">
        <legend><?php _e('Placemark Image', 'cartamap'); ?></legend>
        <div class="uploaded-image" style="text-align: center;">
        
            <?php if($carta_image_url != "" || $carta_image_url != null){ ?>
            
                <img src="<?php echo $carta_image_url; ?>" alt="" style="width:70%; max-width: 500px; height: auto;" />
                
            <?php } ?>
            
        </div>
        
        <button class="upload-file <?php if( $carta_image_url != null ){ echo 'hidden'; } ?>"><?php _e('Select Image', 'cartamap'); ?></button>
        <button class="delete-file <?php if( $carta_image_url == null ){ echo 'hidden'; } ?>"><?php _e('Delete Image', 'cartamap'); ?></button>
        <br />
        <input type="hidden" name="carta_placemark_image" id="upload-img-url" value="<?php echo $carta_image_url; ?>"></input>
    </fieldset>
    <hr>
    <fieldset class="inner">
        <legend><?php _e('Placemark Video', 'cartamap'); ?></legend>
        <div class="embed-responsive embed-responsive-16by9">
            
            <embed id="video" src="<?php echo $carta_video_url; ?>" />
            
        </div>
        
        <label for="upload-video-url"><?php _e('Video Url', 'cartamap'); ?> </label><br />
        <input type="text" id="upload-video-url-input" value="<?php echo $carta_video_url; ?>" style="width: 50%; min-width: 200px;"/>
        <button class="upload-video"><?php _e('Upload Video', 'cartamap'); ?></button>
    
        <input type="hidden" name="carta_placemark_video" id="upload-video-url" value="<?php echo $carta_video_url; ?>"></input>
        </fieldset>
    </div>
    
    