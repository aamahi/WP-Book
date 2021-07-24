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
        add_action( 'save_post', [ $this, 'save_book_meta_data' ] );
    }

    /**
     * check secure meta box field
     *
     * @param $nonce_field
     * @param $action
     * @param $post_id
     *
     * @return bool
     */
    private function is_secured( $nonce_field, $action, $post_id  ) {

        $nonce = isset( $_POST[ $nonce_field ] ) ? $_POST[ $nonce_field ] : "" ;

        if ( $nonce == '' ) {
            return false;
        }
        if( ! wp_verify_nonce( $nonce, $action ) ) {
            return false;
        }

        if ( wp_is_post_autosave( $post_id ) ) {
            return false;
        }

        if ( wp_is_post_revision( $post_id ) ) {
            return false;
        }

        return true;
    }


    /**
     * save all book meta data.
     *
     * @param $post_id
     *
     * @return mixed
     */
    public function save_book_meta_data( $post_id ) {

        /**
         * check security
         */
        if ( ! $this->is_secured( 'mahi_wp_book_field', 'mahi_wp_book', $post_id ) ) {
            return $post_id;
        }

        $book_author    = isset( $_POST['book_author'] ) ? sanitize_text_field( wp_unslash( $_POST['book_author'] ) ) : '';
        $book_price     = isset( $_POST['book_price'] ) ? sanitize_text_field( wp_unslash( $_POST['book_price'] ) ) : '';
        $book_publisher = isset( $_POST['book_publisher'] ) ? sanitize_text_field( wp_unslash( $_POST['book_publisher'] ) ) : '';
        $book_year      = isset( $_POST['book_year'] ) ? sanitize_text_field( wp_unslash( $_POST['book_year'] ) ) : '';
        $book_edition   = isset( $_POST['book_edition'] ) ? sanitize_text_field( wp_unslash( $_POST['book_edition'] ) ) : '';
        $book_url       = isset( $_POST['book_url'] ) ? sanitize_trackback_urls( wp_unslash( $_POST['book_url'] ) ) : '';

        update_post_meta( $post_id, 'book_author', $book_author );
        update_post_meta( $post_id, 'book_price', $book_price );
        update_post_meta( $post_id, 'book_publisher', $book_publisher );
        update_post_meta( $post_id, 'book_year', $book_year );
        update_post_meta( $post_id, 'book_edition', $book_edition );
        update_post_meta( $post_id, 'book_url', $book_url );
    }

    /**
     * Add Book Meta Box
     */
    public function add_book_meta_box() {
        add_meta_box(
            'book_meta',
            __( "WP Book", 'wp-book' ),
            [ $this, 'display_book_meta_boxes' ],
            'book',
            'advanced'

        );
    }

    /**
     * Display book meta box
     *
     * @param $post
     */
    public function display_book_meta_boxes( $post ) {
        /**
         * load subscription-metadata-style file
         */
        wp_enqueue_style( 'book_meta_data_style' );

        /**
         * wp_nonce field.
         */
        wp_nonce_field( 'mahi_wp_book', 'mahi_wp_book_field' );

        /**
         * Get all Book meta data.
         */
        $book_author    = get_post_meta( $post->ID, 'book_author', true );
        $book_price     = get_post_meta( $post->ID, 'book_price', true );
        $book_publisher = get_post_meta( $post->ID, 'book_publisher', true );
        $book_year      = get_post_meta( $post->ID, 'book_year', true );
        $book_edition   = get_post_meta( $post->ID, 'book_edition', true );
        $book_url       = get_post_meta( $post->ID, 'book_url', true );

        /**
         * load wp book meta data form
         */
        ob_start();
        include "view/book_meta_data.php";
    }

}