<?php

/*
 * ========================================================================
 * Hide admin bar for certain users
 * ========================================================================
 */

// Remove Admin bar
/*
function remove_admin_bar()
{
    return false;
}

if (current_user_can('administrator')) :
	add_filter('show_admin_bar', 'remove_admin_bar');
endif;

*/

// hide for all users
add_filter( 'show_admin_bar', '__return_false' );