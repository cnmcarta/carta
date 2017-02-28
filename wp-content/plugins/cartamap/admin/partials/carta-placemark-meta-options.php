<?php
        global $post;
        $custom = get_post_custom($post->ID);
        $place_name = $custom["carta_placemark_place_name"][0];
		$lat = $custom["carta_placemark_lat"][0];
		$lng = $custom["carta_placemark_lng"][0];
		$description_en = $custom["carta_placemark_description_en"][0];
		$description_es = $custom["carta_placemark_description_es"][0];
?>
    <div id="carta_placemark_meta">
	<label class="carta_placemark_label">Place Name:</label><input class="carta_placemark_input" name="carta_placemark_place_name" value="<?php echo $place_name; ?>" /><br>
    <label class="carta_placemark_label">Latitude:</label><input class="carta_placemark_input"  name="carta_placemark_lat" value="<?php echo $lat; ?>" /><br>
    <label class="carta_placemark_label">Longitude:</label><input class="carta_placemark_input"  name="carta_placemark_lng" value="<?php echo $lng; ?>" /><br>
	
    <label class="carta_placemark_label">English Description:</label><input class="carta_placemark_input"  name="carta_placemark_description_en" value="<?php echo $description_en; ?>" /><br>
    <label class="carta_placemark_label">Spanish Description:</label><input class="carta_placemark_input"  name="carta_placemark_description_es" value="<?php echo $description_es; ?>" /><br>
	<?php
	//http://wordpress.stackexchange.com/questions/116445/using-tinymce-with-textareas-in-meta-boxes-on-custom-post-types
	wp_editor( $meta_biography, 'biography', array(
		'wpautop'       => true,
		'media_buttons' => false,
		'textarea_name' => 'meta_biography',
		'textarea_rows' => 10,
		'teeny'         => true
	) );
	?>
	
	
	</div>