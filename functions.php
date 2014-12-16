<?php
function video_flagship_theme_support() {
	add_image_size( 'rectangle', 450, 300, true );
}

// Initiate Theme Support
add_action('after_setup_theme','video_flagship_theme_support');

function delete_video_transients($post_id) {
	global $post;
	if (isset($_GET['post_type'])) {		
		$post_type = $_GET['post_type'];
	}
	else {
		$post_type = $post->post_type;
	}
	switch($post_type) {
		case 'profile' :
			delete_transient('latest_profile_query');
		break;
	}
}
	add_action('save_post','delete_video_transients');
