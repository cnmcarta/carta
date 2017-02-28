<?php
        global $post;
        $custom = get_post_custom($post->ID);
		$lat = $custom["carta_placemark_lat"][0];
		$lng = $custom["carta_placemark_lng"][0];
        $place_name_en = $custom["carta_placemark_place_name_en"][0];
		$place_name_es = $custom["carta_placemark_place_name_es"][0];
		$description_en = $custom["carta_placemark_description_en"][0];
		$description_es = $custom["carta_placemark_description_es"][0];
?>
    <div id="carta_placemark_meta">
	<fieldset class = "outer">
	<fieldset class ="inner">
	<legend>Placemark Constants</legend>
    <label class="carta_placemark_label">Latitude:</label><input class="carta_placemark_input"  name="carta_placemark_lat" value="<?php echo $lat; ?>" /><br>
    <label class="carta_placemark_label">Longitude:</label><input class="carta_placemark_input"  name="carta_placemark_lng" value="<?php echo $lng; ?>" /><br>
	</fieldset>
	<fieldset class ="inner">
	<legend>English Version</legend>
	<label class="carta_placemark_label">Place Name:</label><input class="carta_placemark_input" name="carta_placemark_place_name_en" value="<?php echo $place_name_en; ?>" /><br>
	
    <label class="carta_placemark_label">English Description:</label><br>
	<?php
	wp_editor( $description_en, 'description_en', array(
		'wpautop'       => true,
		'media_buttons' => true,
		'textarea_name' => 'carta_placemark_description_en',
		'textarea_rows' => 10,
		'teeny'         => true
	) );
	?>
    </fieldset>
	<fieldset class ="inner">
	<legend>Spanish Version</legend>
	<label class="carta_placemark_label">Place Name:</label><input class="carta_placemark_input" name="carta_placemark_place_name_es" value="<?php echo $place_name_es; ?>" /><br>
	
	<label class="carta_placemark_label">Spanish Description:</label><br>
	<?php
	wp_editor( $description_es, 'description_es', array(
		'wpautop'       => true,
		'media_buttons' => true,
		'textarea_name' => 'carta_placemark_description_es',
		'textarea_rows' => 10,
		'teeny'         => true
	) );
	?>
	</fieldset>
	</fieldset>
	</div>