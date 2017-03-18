jQuery(function($){
    
    var frame,
        metabox = $('#map-media-meta'),
        uploadFile = metabox.find('.upload-file'),
        deleteFile = metabox.find('.delete-file'),
        imgContainer = metabox.find('.uploaded-image'),
        imgId = metabox.find('#upload-img-id')
    
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
        imgId.val( attachment.id );

        // Hide the add image link
        uploadFile.addClass( 'hidden' );

        // Unhide the remove image link
         deleteFile.removeClass( 'hidden' );
    });

  });


    deleteFile.click(function(event){
        event.preventDefault();
        
        imgContainer.html("");
        
        imgId.val("");
        
        deleteFile.addClass('hidden');
        
        uploadFile.removeClass('hidden');
    })
});