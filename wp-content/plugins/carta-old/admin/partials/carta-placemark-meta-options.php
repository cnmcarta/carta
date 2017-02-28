<?php
        global $post;
        $custom = get_post_custom($post->ID);
        $member_name = $custom["member_name"][0];
		$member_title = $custom["member_title"][0];
		$member_email = $custom["member_email"][0];
		$sort_priority = $custom["sort_priority"][0];
?>
    <div id="wasvn_meta">
	<label class="wasvn_label">Place Name:</label><input class="wasvn_input" name="member_name" value="<?php echo $member_name; ?>" /><br>
    <label class="wasvn_label">Coordinates:</label><input class="wasvn_input"  name="member_title" value="<?php echo $member_title; ?>" /><br>
    <label class="wasvn_label">Description:</label><input class="wasvn_input"  name="member_email" value="<?php echo $member_email; ?>" /><br>
    <label class="wasvn_label">Sort Priority:</label><input class="wasvn_input"  name="sort_priority" value="<?php echo $sort_priority; ?>" /><br>
	</div>