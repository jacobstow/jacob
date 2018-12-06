<?php

/*
 * ========================================================================
 * Load a holding page
 * ========================================================================
 */

// http://www.squareonemd.co.uk/developing-a-wordpress-site-on-a-live-url/
// needs file in template folder

function sthn_header_redirect() {
    if ( !is_user_logged_in()) {
        get_template_part('holdingpage');
        exit(0);
        }
    }
add_filter('wp_headers', 'sthn_header_redirect');