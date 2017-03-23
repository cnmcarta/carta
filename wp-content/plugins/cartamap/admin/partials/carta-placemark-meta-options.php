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
	<div id="carta-placemark-meta">
	<fieldset class = "outer">
	<fieldset class ="inner">
	<legend>Placemark Constants</legend>
	<label class="carta-placemark-label"><?php _e('Latitude:', 'carta-locale'); ?></label><input class="carta-placemark-input"  name="carta_placemark_lat" type="number" value="<?php echo $lat; ?>"  step="0.0000001" min="18.00" max="40.00" required /><br>
	<label class="carta-placemark-label"><?php _e('Longitude:', 'carta-locale'); ?></label><input class="carta-placemark-input"  name="carta_placemark_lng" type="number" value="<?php echo $lng; ?>"  step="0.0000001" min="-110.00" max="-95.00" required /><br>
	</fieldset>
	<fieldset class ="inner">
	<legend>English Version</legend>
	<label class="carta-placemark-label"><?php _e('Place Name:', 'carta-locale'); ?></label><input class="carta-placemark-input" name="carta_placemark_place_name_en" value="<?php echo $place_name_en; ?>" /><br>
	
	<label class="carta-placemark-label"><?php _e('English Description:', 'carta-locale'); ?></label><br>
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
	<label class="carta-placemark-label"><?php _e('Place Name:', 'carta-locale'); ?></label><input class="carta-placemark-input" name="carta_placemark_place_name_es" value="<?php echo $place_name_es; ?>" /><br>
	
	<label class="carta-placemark-label"><?php _e('Spanish Description:', 'carta-locale'); ?></label><br>
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