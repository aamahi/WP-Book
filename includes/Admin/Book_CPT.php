<?php

namespace Mahi\WP\Book\Admin;
/**
 * Class Book_CPT
 */
class Book_CPT {
    /**
     * Book CPT constructor.
     */
    public function __construct() {
        add_action( 'init', [ $this, 'create_book_cpt' ] );
    }

    /**
     * Register Book Custom post type
     *
     * @return void
     */
    public function create_book_cpt() {
        $labels = array(
            'name'           => _x( 'Books', 'Post Type General Name', 'wp-book' ),
            'singular_name'  => _x( 'Book', 'Post Type Singular Name', 'wp-book' ),
            'menu_name'      => _x( 'Book', 'Admin Menu text', 'wp-book' ),
            'name_admin_bar' => _x( 'Book', 'Add New on Toolbar', 'wp-book' ),
            'all_items'      => __( 'All Books', 'wp-book' ),
            'add_new_item'   => __( 'Add New Book', 'wp-book' ),
            'add_new'        => __( 'Add New', 'wp-book' ),
            'new_item'       => __( 'New Book', 'wp-book' ),
            'edit_item'      => __( 'Edit Book', 'wp-book' ),
            'update_item'    => __( 'Update Book', 'wp-book' ),
            'view_item'      => __( 'View Book', 'wp-book' ),
            'view_items'     => __( 'View Books', 'wp-book' ),
            'search_items'   => __( 'Search Book', 'wp-book' ),
        );

        $args = array(
            'label'               => __( 'Book', 'book' ),
            'description'         => __( 'This is Book CPT', 'book' ),
            'labels'              => $labels,
            'menu_icon'           => 'dashicons-admin-page',
            'supports'            => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies'          => array( 'book_tag', 'book_category' ),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 10,
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'hierarchical'        => false,
            'exclude_from_search' => true,
            'show_in_rest'        => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
        );

        register_post_type( 'book', $args );
    }
}