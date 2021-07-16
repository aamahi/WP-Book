<?php

namespace Mahi\WP\Book\Admin;

/**
 * The Book_Tag_Taxonomy Class
 *
 * @package Mahi\WP\Book\Admin
 */
class Book_Tag_Taxonomy {

    /**
     * book_tagTaxonomy constructor.
     */
    public function __construct() {
        add_action( 'init', [ $this, 'create_book_tag_taxonomy' ] );
    }

    /**
     * Create a New book_tag taxonomy.
     *
     * @return void
     */
    public function create_book_tag_taxonomy() {

        /**
         * Add new taxonomy, make it non-hierarchical.
         */
        $labels = [
            'name'              => _x( 'Book Tags', 'taxonomy a general name', 'wp-book' ),
            'singular_name'     => _x( 'Book Tag', 'taxonomy a general name', 'wp-book' ),
            'search_items'      => __( 'Search Book Tag', 'wp-book' ),
            'all_items'         => __( 'All Book Tag', 'wp-book' ),
            'edit_item'         => __( 'Edit  Book Tag', 'wp-book' ),
            'update_item'       => __( 'Update Book Tag', 'wp-book' ),
            'add_new_item'      => __( 'Add New Book Tag', 'wp-book' ),
            'new_item_name'     => __( 'New Book Tag Name', 'wp-book' ),
            'menu_name'         => __( 'Book Categories', 'wp-book' ),
        ];

        $args = [
            'hierarchical'      => false,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'rewrite'           => array( 'slug' => 'book-tag' ),
        ];

        /**
         * register the taxonomy
         */
        register_taxonomy('book-tag', [ 'book' ], $args );
    }
}