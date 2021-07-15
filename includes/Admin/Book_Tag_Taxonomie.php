<?php


namespace Mahi\WP\Book\Admin;


class Book_Tag_Taxonomie {
    public function __construct() {
//        add_action('init', [$this, 'create_book_tag_taxonomy']);
    }

//create a custom taxonomy name it subjects for your posts

    public function create_book_tag_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

//        $labels = array(
//            'name'              => _x('Book-Tags', 'taxonomy general name', 'wp-book'),
//            'singular_name'     => _x('Book-Tag', 'taxonomy singular name', 'wp-book'),
//            'search_items'      => __('Search Book-Tags', 'wp-book'),
//            'all_items'         => __('All Book-Tags', 'wp-book'),
//            'parent_item'       => __('Parent Book-Tag', 'wp-book'),
//            'parent_item_colon' => __('Parent Book-Tag:', 'wp-book'),
//            'edit_item'         => __('Edit Book-Tag', 'wp-book'),
//            'update_item'       => __('Update Book-Tag', 'wp-book'),
//            'add_new_item'      => __('Add New Book-Tag', 'wp-book'),
//            'new_item_name'     => __('New Book-Tag Name', 'wp-book'),
//            'menu_name'         => __('Book-Tag', 'wp-book'),
//        );
//        $args   = array(
//            'labels'             => $labels,
//            'description'        => __('', 'wp-book'),
//            'hierarchical'       => false,
//            'public'             => true,
//            'publicly_queryable' => true,
//            'show_ui'            => true,
//            'show_in_menu'       => true,
//            'show_in_nav_menus'  => true,
//            'show_tagcloud'      => true,
//            'show_in_quick_edit' => true,
//            'show_admin_column'  => false,
//            'show_in_rest'       => false,
//        );
//        register_taxonomy('book-tag', array('book', 'post'), $args);
    }
}