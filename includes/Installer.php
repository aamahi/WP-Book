<?php

namespace Mahi\WP\Book;


/**
 * The Installer Class
 * @package WeDevs\Member\Manager
 */
class Installer {
    /**
     * run the installer
     *
     * @return void
     */
    public function run() {
        $this->add_version();
    }

    /**
     * Add Time and Version On DB
     */
    public function add_version() {
        $installed = get_option( 'mahi_wp_book_installed' );

        if ( ! $installed ) {
            update_option( 'mahi_wp_book_installed', time() );
        }

        update_option( 'mahi_wp_book_version', MWB_VERSION );
    }}