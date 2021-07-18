<?php


namespace Mahi\WP\Book\Admin;

/**
 * The Book_Meta Class
 *
 * @package Mahi\WP\Book\Admin
 */
class Book_Meta {

    /**
     * Book_Meta_ constructor.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', [ $this, 'add_book_meta_box' ], 10, 2 );
    }

    public function add_book_meta_box() {
        add_meta_box(
            'book_meta',
            __( "WP Book", 'wp-book' ),
            function () {echo "Hello";},
//            [ $this, 'display_book_meta_boxes' ],
            'book_meta',
            'advanced'

        );
    }
    public function display_book_meta_boxes() {
        echo "HELLO";
        /**
         * load subscription-metadata-style file
         */
        wp_enqueue_style( 'book_meta_data_style' );

        ob_start();
        include "view/book_meta_data.php";
    }

}