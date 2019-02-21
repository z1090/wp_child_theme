<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

add_action( 'init', 'create_custom_post_type_society');
function create_custom_post_type_society() {
    $labels = array(
        'name' => 'Societies',
		'singular_name' => 'Society',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Society',
		'edit_item' => 'Edit Society',
		'new_item' => 'New Society',
		'view_item' => 'View Society',
		'search_items' => 'Search Societies',
		'not_found' => 'No societies found',
		'not_found_in_trash' => 'No societies found in Trash',
		'parent_item_colon' => '',
    );
    $args = array(
        'label' => __('Events'),
		'labels' => $labels,
		'public' => true,
		'can_export' => true,
		'show_ui' => true,
		'_builtin' => false,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-groups',
		'hierarchical' => false,
		'rewrite' => array( "slug" => "society" ), // defines URL base
		'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
		'show_in_nav_menus' => true,
		'taxonomies' => array( 'society_category', 'post_tag') // own categories
    );

	register_post_type('societies', $args);
}