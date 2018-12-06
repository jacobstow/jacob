<?php

/*
 * ========================================================================
 * Customising the login page (note: can also overide and use your own page entirely)
 * ========================================================================
 */

// https://codex.wordpress.org/Customizing_the_Login_Form
// shouldn't need important, investigate

// add css to head, changing logo and any styles
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/site-login-logo.png);
            padding-bottom: 0px;
            background-size: 250px;
            width: 250px;
            height: 150px;
        }
        body {
        	background: #fff !important; 
        }
        .login form {
        	webkit-box-shadow: none !important;
        	box-shadow: none !important;
        	padding-top: 10px !important;
        	padding-bottom: 20px !important;
        }
        .login #nav {
        	text-align: center !important;
        }
        .login #backtoblog {
        	display: none !important;
        }
        .login #login_error, .login .message {
        	border: none !important;
        	background: #f8f8f8 !important;
        	webkit-box-shadow: none !important;
        	box-shadow: none !important;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// change link for logo to website home page
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

// adjust title
function my_login_logo_url_title() {
    return 'Colin Hawkins';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );