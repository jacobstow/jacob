<?php

/*
 * ========================================================================
 * Custom Post Types
 * ========================================================================
 */

/* https://generatewp.com/generator/ */

// Register Custom Post Type
function jshtml5theme_post_type_project() {

    $labels = array(
        'name'                  => 'Projects',
        'singular_name'         => 'Project',
        'menu_name'             => 'Projects',
        'name_admin_bar'        => 'Projects',
        'archives'              => 'Item Archives',
        'parent_item_colon'     => 'Parent Item:',
        'all_items'             => 'All Items',
        'add_new_item'          => 'Add New Item',
        'add_new'               => 'Add New',
        'new_item'              => 'New Item',
        'edit_item'             => 'Edit Item',
        'update_item'           => 'Update Item',
        'view_item'             => 'View Item',
        'search_items'          => 'Search Item',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into item',
        'uploaded_to_this_item' => 'Uploaded to this item',
        'items_list'            => 'Items list',
        'items_list_navigation' => 'Items list navigation',
        'filter_items_list'     => 'Filter items list',
    );
    $rewrite = array(
        'slug'                  => 'portfolio',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => 'Project',
        'description'           => 'Portfolio of projects',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', ),
        'taxonomies'            => array( 'portfolio_category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-admin-page',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,        
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'project', $args );

}
add_action( 'init', 'jshtml5theme_post_type_project', 0 );


// Register Custom Taxonomy
function jshtml5theme_taxonomy_port_category() {

    $labels = array(
        'name'                       => 'Categories',
        'singular_name'              => 'Category',
        'menu_name'                  => 'Categories',
        'all_items'                  => 'All Items',
        'parent_item'                => 'Parent Item',
        'parent_item_colon'          => 'Parent Item:',
        'new_item_name'              => 'New Item Name',
        'add_new_item'               => 'Add New Item',
        'edit_item'                  => 'Edit Item',
        'update_item'                => 'Update Item',
        'view_item'                  => 'View Item',
        'separate_items_with_commas' => 'Separate items with commas',
        'add_or_remove_items'        => 'Add or remove items',
        'choose_from_most_used'      => 'Choose from the most used',
        'popular_items'              => 'Popular Items',
        'search_items'               => 'Search Items',
        'not_found'                  => 'Not Found',
        'no_terms'                   => 'No items',
        'items_list'                 => 'Items list',
        'items_list_navigation'      => 'Items list navigation',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'portfolio_category', array( 'project' ), $args );

}
add_action( 'init', 'jshtml5theme_taxonomy_port_category', 0 );


/*
// change category page query
function jshtml5theme_query_posts_projects($query)
{
    // is_main_query() not secondary query
    // !is_admin not admin pages
    // is_post_type_archive() for main listing page
    // is_category() for post category
    // is_tax() for custom category pages (can refine by term too)
    if ($query->is_main_query() && $query->is_post_type_archive('project') && !is_admin() ) :
        $query->set('posts_per_page', 24);
        $query->set( 'orderby', 'date' );
        $query->set( 'order', 'ASC' );
    elseif ($query->is_main_query() && $query->is_tax('portfolio_category') && !is_admin() ) :
        $query->set('posts_per_page', 24);
        $query->set( 'orderby', 'date' );
        $query->set( 'order', 'ASC' );
    endif;
}
 
add_action('pre_get_posts', 'jshtml5theme_query_posts_projects');
*/