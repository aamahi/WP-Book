<?php


namespace Mahi\WP\Book\Admin;

/**
 * The Book_Category_Taxonomy Class
 *
 * @package Mahi\WP\Book\Admin
 */
class Book_Category_Taxonomy {

    /**
     * Book_CategoryTaxonomy constructor.
     */
    public function __construct() {
        add_action( 'init', [ $this, 'create_book_category_taxonomy' ] );
    }

    /**
     * Create a New book_category taxonomy.
     *
     * @return void
     */
    public function create_book_category_taxonomy() {

        /**
         * Add new taxonomy, make it hierarchical.
         */
        $labels = [
            'name'              => _x( 'Book Categories', 'taxonomy a general name', 'wp-book' ),
            'singular_name'     => _x( 'Book Category', 'taxonomy a general name', 'wp-book' ),
            'search_items'      => __( 'Search Book Category', 'wp-book' ),
            'all_items'         => __( 'All Book Category', 'wp-book' ),
            'parent_item'       => __( 'Parent Book Category', 'wp-book' ),
            'parent_item_colon' => __( 'Parent Book Category:', 'wp-book' ),
            'edit_item'         => __( 'Edit  Book Category', 'wp-book' ),
            'update_item'       => __( 'Update Book Category', 'wp-book' ),
            'add_new_item'      => __( 'Add New Book Category', 'wp-book' ),
            'new_item_name'     => __( 'New Book Category Name', 'wp-book' ),
            'menu_name'         => __( 'Book Categories', 'wp-book' ),
        ];

        $args = [
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'rewrite'           => array( 'slug' => 'book-category' ),
        ];

        /**
         * register the taxonomy
         */
        register_taxonomy('book_category', [ 'book' ], $args );
    }
}