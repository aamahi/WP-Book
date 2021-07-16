<?php


namespace Mahi\WP\Book;

use Mahi\WP\Book\Admin\Book_Category_Taxonomy;
use Mahi\WP\Book\Admin\Book_CPT;
use Mahi\WP\Book\Admin\Book_Tag_Taxonomie;

/**
 * The Admin Class.
 * @package Mahi\WP\Book
 */
class Admin {

    public function __construct() {
        new Book_CPT();
        new Book_Category_Taxonomy();
    }
}