<?php
/**
 * Register a custom post type called "job".
 *
 * @see get_post_type_labels() for label keys.
 */
function zvezdelina_jobs_cpt() {
	$labels = array(
		'name'                  => _x( 'Jobs', 'Post type general name', 'softuni' ),
		'singular_name'         => _x( 'Job', 'Post type singular name', 'softuni' ),
		'menu_name'             => _x( 'Jobs', 'Admin Menu text', 'softuni' ),
		'name_admin_bar'        => _x( 'Job', 'Add New on Toolbar', 'softuni' ),
		'add_new'               => __( 'Add New', 'softuni' ),
		'add_new_item'          => __( 'Add New Job', 'softuni' ),
		'new_item'              => __( 'New Job', 'softuni' ),
		'edit_item'             => __( 'Edit Job', 'softuni' ),
		'view_item'             => __( 'View Job', 'softuni' ),
		'all_items'             => __( 'All Jobs', 'softuni' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'job' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions' ),
        'show_in_rest'       => true
	);

	register_post_type( 'job', $args );

    // flush_rewrite_rules();
}
add_action( 'init', 'zvezdelina_jobs_cpt' );

/**
 * Register a 'field' taxonomy for post type 'job', with a rewrite to match book CPT slug.
 *
 * @see register_post_type for registering post types.
 */
function zvezdelina_jobs_field_taxonomy() {
    $labels = array(
		'name'              => _x( 'Field', 'taxonomy general name', 'zvezdelina' ),
		'singular_name'     => _x( 'Field', 'taxonomy singular name', 'zvezdelina' ),
		'search_items'      => __( 'Search Field', 'zvezdelina' ),
		'all_items'         => __( 'All Field', 'zvezdelina' ),
		'parent_item'       => __( 'Parent Field', 'zvezdelina' ),
		'parent_item_colon' => __( 'Parent Field:', 'zvezdelina' ),
		'edit_item'         => __( 'Edit Field', 'zvezdelina' ),
		'update_item'       => __( 'Update Field', 'zvezdelina' ),
		'add_new_item'      => __( 'Add New Field', 'zvezdelina' ),
		'new_item_name'     => __( 'New Field Name', 'zvezdelina' ),
		'menu_name'         => __( 'Field', 'zvezdelina' ),
	);

    $args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
        'show_in_rest'      => true
	);


    register_taxonomy( 'field', 'job', $args );
}
add_action( 'init', 'zvezdelina_jobs_field_taxonomy' );
