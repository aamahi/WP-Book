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

    public function create_book_category_taxonomy() {

        /**
         * Add new taxonomy, make it hierarchical.
         */
        $labels = [
            'name'              => _x( 'Book Categories', 'taxonomy a general name', 'book-review' ),
            'singular_name'     => _x( 'Book Category', 'taxonomy a general name', 'book-review' ),
            'search_items'      => __( 'Search Book Category', 'book-review' ),
            'all_items'         => __( 'All Book Category', 'book-review' ),
            'parent_item'       => __( 'Parent Book Category', 'book-review' ),
            'parent_item_colon' => __( 'Parent Book Category:', 'book-review' ),
            'edit_item'         => __( 'Edit  Book Category', 'book-review' ),
            'update_item'       => __( 'Update Book Category', 'book-review' ),
            'add_new_item'      => __( 'Add New Book Category', 'book-review' ),
            'new_item_name'     => __( 'New Book Category Name', 'book-review' ),
            'menu_name'         => __( ' Book Categories', 'book-review' ),
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
        register_taxonomy('book-category', [ 'book' ], $args );
    }
}