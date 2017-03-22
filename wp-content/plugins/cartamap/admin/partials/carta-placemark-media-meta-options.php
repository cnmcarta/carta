<?php
    global $post;

    
    //url will link to the page that allows for selecting media.  When called will open up a new selection interface
    $upload_url = esc_url(get_upload_iframe_src('image', $post->ID));
    
    //Retreive the image url if exists
    //DOES NOT WORK
    $image_url = esc_url( get_post_meta( $post->ID, 'carta_placemark_image', true ) );
    
    $video_url = esc_url( get_post_meta( $post->ID, 'carta_placemark_video', true ) );
    ?>
    

    
    <div id="map-media-meta">
    
        <div class="uploaded-image" style="text-align: center;">
        
            <?php if($image_url != "" || $image_url != null){ ?>
            
                <img src="<?php echo $image_url; ?>" alt="" style="max-width:100%; width: 500px; height: auto;" />
                
            <?php } ?>
            
        </div>
        
        <button class="upload-file <?php if( $image_url != null ){ echo 'hidden'; } ?>">Select Image</button>
        <button class="delete-file <?php if( $image_url == null ){ echo 'hidden'; } ?>">Delete Image</button>
        
        <input type="hidden" name="carta_placemark_image" id="upload-img-url" value="<?php echo $image_url; ?>"></input>
    
    <hr>
    
    <div class="embed-responsive embed-responsive-16by9">
            
        <embed id="video" src="<?php echo $video_url; ?>" />
            
    </div>
        
    <label for="upload-video-url"> Video Url</label><br />
    <input type="text" id="upload-video-url-input" value="<?php echo $video_url; ?>" style="width: 50%; min-width: 200px;"/>
    <button class="upload-video">Upload Video</button>
    
    <input type="hidden" name="carta_placemark_video" id="upload-video-url" value="<?php echo $video_url; ?>"></input>

    </div>
    
    