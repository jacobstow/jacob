<?php
/*
 *  Based on: html5blank.com | @html5blank
 *  With parts from: www.initializr.com
 */

/*
 * ========================================================================
 * External Modules/Files
 * ========================================================================
 */

// Load any external files here

/*
 * ========================================================================
 * Theme Support
 * ========================================================================
 */

if (!isset($content_width))
{
    $content_width = 920;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('featured', 500, 346, true); // Featured Thumbnail
    //add_image_size('medium', 290, 200, true); // Medium Thumbnail
    //add_image_size('small', 160, 130, true); // Small Thumbnail
    // add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // This feature allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption.
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

}

/*
 * ========================================================================
 * Set-up
 * ========================================================================
 */

// HTML5 Blank navigation - needs wp_nav_menu_args commented out in core filters
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => '', //eg div
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="clear">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	// could deregister wordpress jquery and add own version
        // could add jquery migrate

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('responsiveslides', get_template_directory_uri() . '/js/lib/responsiveslides.min.js', array('jquery'), '1.54');
        wp_enqueue_script('responsiveslides'); // Enqueue it!

        wp_register_script('magnificpopup', get_template_directory_uri() . '/js/lib/magnific-popup/magnific-popup.min.js', array('jquery'), '1.1.0');
        wp_enqueue_script('magnificpopup'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head

/*
// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_front_page()) {
        wp_register_script('responsiveslides', get_template_directory_uri() . '/js/lib/responsiveslides.min.js', array('jquery'), '1.54'); // Conditional script(s)
        wp_enqueue_script('responsiveslides'); // Enqueue it!
    }
}
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
*/

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('font-awesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css', array(), '1.0', 'all');
    wp_enqueue_style('font-awesome'); // Enqueue it!

    wp_register_style('magnific-popup', get_template_directory_uri() . '/js/lib/magnific-popup/magnific-popup.css', array(), '1.1.0', 'all');
    wp_enqueue_style('magnific-popup'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet


// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => 'Header Menu', // Main Navigation
        'footer-menu' => 'Footer Menu' // Sidebar Navigation
        //'extra-menu' => 'Extra Menu' // Extra Navigation if needed (duplicate as many as you need!)
    ));
}
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu

/*
 * ========================================================================
 * Adjustments
 * ========================================================================
 */

// streamlining the wp core, setting-up good classes, excerpts, pagination etc.
// this should stay the same for most themes
require_once('functions/core_adjustments.php');

/*
 * ========================================================================
 * Custom Post Types
 * ========================================================================
 */

// other ways of doing this, investigate
require_once('functions/custom_post_types.php');

/*
 * ========================================================================
 * Options Page
 * ========================================================================
 */

// using ACF PRO
require_once('functions/options_page.php');

/*
 * ========================================================================
 * Custom Login page
 * ========================================================================
 */

// various ways to do this
require_once('functions/custom_login.php');

/*
 * ========================================================================
 * Comments
 * ========================================================================
 */

// may need to go back to ori HTML5 Blank theme for template code
require_once('functions/setup_comments.php');

/*
 * ========================================================================
 * Shortcodes
 * ========================================================================
 */

require_once('functions/shortcodes.php');

/*
// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]
*/

/*
 * ========================================================================
 * Helper functions
 * ========================================================================
 */

// require_once('functions/load_holding_page.php');
require_once('functions/hide_adminbar.php');

/*
function editing_guide_notice() {
    ?>
    <div class="notice notice-info">
        <p><a href="<?php echo get_stylesheet_directory_uri(); ?>/editing-guide/colin-hawkins-editing-guide-v1.pdf" target="_blank">View editing guide</a> including a breif outline of administration tasks.</p>
    </div>
    <?php
}
add_action( 'admin_notices', 'editing_guide_notice' );
*/