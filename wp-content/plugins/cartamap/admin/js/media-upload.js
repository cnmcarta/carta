jQuery(function($){

    var frame,
        metabox = $('#map-media-meta'),
        uploadFile = metabox.find('.upload-file'),
        deleteFile = metabox.find('.delete-file'),
        imgContainer = metabox.find('.uploaded-image'),
        imgUrl = metabox.find('#upload-img-url');
        uploadVideo = metabox.find('.upload-video');
        videoUrl = metabox.find('#upload-video-url');
        videoInput = metabox.find('#upload-video-url-input');
        videoFrame = metabox.find('.embed-responsive');
    
    uploadFile.click(function(event){
        
        event.preventDefault();
        
        //frame is an object created by wordpress(a popup of sorts)
        if(frame){
            frame.open();
            return;
        }
        
        //wp.media is a js library for uploading media and accessing it.
        // Create a new media frame
        frame = wp.media({
        title: 'Select the media that you would like to go with this pin',
        button: {
            text: 'Include this media'
        },
        multiple: false  // Set to true to allow multiple files to be selected
        });
        
        frame.open();
        
            // When an image is selected in the media frame...
        frame.on( 'select', function() {
      
        // Get media attachment details from the frame state
        var attachment = frame.state().get('selection').first().toJSON();

        // Send the attachment URL to our custom image input field.
        imgContainer.html( '<img src="' + attachment.url + '" alt="" style="max-width:100%;"/>' );

        // Send the attachment id to our hidden input
        imgUrl.val( attachment.url );

        // Hide the add image link
        uploadFile.addClass( 'hidden' );

        // Unhide the remove image link
         deleteFile.removeClass( 'hidden' );
    });

  });


    uploadVideo.click(function(event){
       
       event.preventDefault();
        
        videoUrl.val(videoInput.val());
        
        videoFrame.html('<embed src="' + videoInput.val() + '" />');
        
    });

    deleteFile.click(function(event){
        event.preventDefault();
        
        imgContainer.html("");
        
        imgUrl.val("");
        
        deleteFile.addClass('hidden');
        
        uploadFile.removeClass('hidden');
    })
});