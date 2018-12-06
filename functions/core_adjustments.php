<?php

/*
 * ========================================================================
 * Adjustments
 * ========================================================================
 */

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
	$args['container'] = false;
	return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
	//return is_array($var) ? array() : '';
	//fixed to keep current class, adapt to include other items if needed
	//return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
	return is_array($var) ? array_intersect($var, array('current-menu-item','current-menu-parent','current_page_item','current_page_parent','current-page-ancestor','events-menu-item','courses-menu-item','news-menu-item')) : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
	return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
	global $post;
	if (is_home()) {
		$key = array_search('blog', $classes);
		if ($key > -1) {
			unset($classes[$key]);
		}
	} elseif (is_page()) {
		$classes[] = sanitize_html_class($post->post_name);
	} elseif (is_singular()) {
		$classes[] = sanitize_html_class($post->post_name);
	}
	return $classes;
}

// Remove classes from wp_list_categories (JPS)
function html5theme_remove_cat_css( $html ) {
	$html = preg_replace( '/cat-item\scat-item-(.?[0-9])\s/', '', $html );
	$html = preg_replace( '/current-cat/', 'current', $html );
	$html = preg_replace( '/\sclass="cat-item\scat-item-(.?[0-9])"/', '', $html );
	$html = preg_replace( '/\stitle="(.*?)"/', '', $html );
	$html = preg_replace( '/\sclass=\'children\'/', '', $html );

	return $html;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
	global $wp_widget_factory;
	remove_action('wp_head', array(
		$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
		'recent_comments_style'
	));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
	global $wp_query;
	$big = 999999999;
	echo paginate_links(array(
		'base' => str_replace($big, '%#%', get_pagenum_link($big)),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages
	));
}

// Added classes to prev/next links (JPS)
function html5theme_post_link_attributes($output)
{
	$injection = 'class="button_link"';
	return str_replace('<a href=', '<a '.$injection.' href=', $output);
}

// Added classes to prev/next links for font awesome (JPS)
function html5theme_posts_link_attributes_1()
{
	return 'class="button_link prev-post fa fa-angle-double-left"';
}
function html5theme_posts_link_attributes_2() {
	return 'class="button_link next-post fa fa-angle-double-right"';
}

// Added classes to prev/next links for font awesome (JPS)
function html5theme_post_link_attributes_next($output)
{
	$injection = 'class="button_link fa fa-angle-double-right"';
	return str_replace('<a href=', '<a '.$injection.' href=', $output);
}
function html5theme_post_link_attributes_prev($output) {
	$injection = 'class="button_link fa fa-angle-double-left"';
	return str_replace('<a href=', '<a '.$injection.' href=', $output);
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
	return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
	return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
	global $post;
	if (function_exists($length_callback)) {
		add_filter('excerpt_length', $length_callback);
	}
	if (function_exists($more_callback)) {
		add_filter('excerpt_more', $more_callback);
	}
	$output = get_the_excerpt();
	$output = apply_filters('wptexturize', $output);
	$output = apply_filters('convert_chars', $output);
	$output = '<p class="post_excerpt">' . $output . '</p>';
	echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
	global $post;
	return '... <a class="view-article" href="' . get_permalink($post->ID) . '">View Article</a>';
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
	return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove the width and height attributes from inserted images
function remove_width_attribute( $html ) {
	$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	return $html;
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
	$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
	return $html;
}

// remove admin menu items, more available (JPS)
function remove_comments_menu() {
	remove_menu_page( 'edit-comments.php' );
}

// Pick out the version number from scripts and styles (JPS)
// For security: WP version number added if script/style doens't have it's own.
function remove_version_from_style_js( $src ) {
	if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

// Make tinmyce paste as text button default to on (JPS)
function tinymce_paste_as_text( $init ) {
		$init['paste_as_text'] = true;
		return $init;
}


/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
add_action( 'admin_menu', 'remove_comments_menu' ); // remove admin menu items, more available

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
//add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
add_filter('wp_list_categories','html5theme_remove_cat_css'); // JPS remove classes from wp_list_categories
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
add_filter('image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
// add_filter('next_posts_link_attributes', 'html5theme_posts_link_attributes'); // JPS Add generic class to links generated by next_posts_link and previous_posts_link
// add_filter('previous_posts_link_attributes', 'html5theme_posts_link_attributes'); // JPS Add generic class to links generated by next_posts_link and previous_posts_link
add_filter('next_posts_link_attributes', 'html5theme_posts_link_attributes_1'); // JPS Add fa classes to links generated by next_posts_link
add_filter('previous_posts_link_attributes', 'html5theme_posts_link_attributes_2'); // JPS Add fa classes to links generated by previous_posts_link
add_filter('next_post_link', 'html5theme_post_link_attributes_next'); // JPS Add fa classes to links generated by next_posts_link
add_filter('previous_post_link', 'html5theme_post_link_attributes_prev'); // JPS Add fa classes to links generated by previous_posts_link
add_filter( 'style_loader_src', 'remove_version_from_style_js'); // JPS Pick out the version number from styles
add_filter( 'script_loader_src', 'remove_version_from_style_js'); // JPS Pick out the version number from scripts
add_filter('tiny_mce_before_init', 'tinymce_paste_as_text'); // JPS Make tinmyce paste as text button default to on

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether
