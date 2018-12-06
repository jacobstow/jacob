<?php

/*
 * ========================================================================
 * Shortcodes
 * ========================================================================
 */

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


// button shortcode e.g. [button url="http://www.jacobstow.com" target="blank" size="small" text="Button Text"]
// all atributes optional, can add a colour one too (replicate size, add to class)
function jscustom_button_shortcode( $atts, $content = null ) {
	
	// Extract shortcode attributes
	extract( shortcode_atts( array(
		'url'    => '',
		'title'  => '',
		'target' => '',
		'text'   => '',
		'size'  => '',
	), $atts ) );

	// Use text value for items without content
	$content = $text ? $text : $content;

	// Return button with link
	if ( $url ) {

		$link_attr = array(
			'href'   => esc_url( $url ),
			'title'  => esc_attr( $title ),
			'target' => ( 'blank' == $target ) ? '_blank' : '',
			'class'  => 'button ' . esc_attr( $size ),
		);

		$link_attrs_str = '';

		foreach ( $link_attr as $key => $val ) {

			if ( $val ) {

				$link_attrs_str .= ' '. $key .'="'. $val .'"';

			}
		}
		return '<a'. $link_attrs_str .'><span>'. do_shortcode( $content ) .'</span></a>';

	}

	// No link defined so return button as a span
	else {

		return '<span class="button"><span>'. do_shortcode( $content ) .'</span></span>';

	}

}
add_shortcode( 'button', 'jscustom_button_shortcode' );