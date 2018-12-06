<?php

/*
 * ========================================================================
 * Hide Yoast SEO for certain users
 * ========================================================================
 */

function remove_yoast() {
	if ( !current_user_can('activate_plugins') ) {

		//remove_meta_box('wpseo_meta', 'post', 'normal');

		// Remove Yoast meta boxes from all of these post types.
		add_action('add_meta_boxes', function() {
			//$post_types = ['post', 'artist', 'press_item'];
			$post_types = ['post'];

			foreach ($post_types as $type) {
				remove_meta_box('wpseo_meta', $type, 'normal');
			}
		}, 100000);

	}
}

// WordPress SEO adds meta boxes on add_meta_boxes action with default priority - 10, which run after admin_init, so that won't remove them.
// Instead you need to hook into add_meta_boxes, but with lower priority - 11, 12, etc.
add_action('add_meta_boxes', 'remove_yoast', 11);