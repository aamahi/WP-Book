<?php


namespace Mahi\WP\Book;

use Mahi\WP\Book\Admin\Book_CPT;

/**
 * The Admin Class.
 * @package Mahi\WP\Book
 */
class Admin {

    public function __construct() {
        new Book_CPT();
    }
}