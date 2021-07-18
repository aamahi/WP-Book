<?php

namespace Mahi\WP\Book;

/**
 * Assets handlers class
 */
class Assets {

    /**
     * Class constructor
     */
    public function __construct() {
        add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts() {
        return [
            'wp-book-script' => [
                'src'     => MWB_ASSETS . '/js/main.js',
                'version' => filemtime( MWB_PATH . '/assets/js/main.js' ),
                'deps'    => [ 'jquery' ]
            ],
        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles() {
        return [
            'book_meta_data_style' => [
                'src'     => MWB_ASSETS . '/css/book_meta_data_style.css',
                'version' => filemtime( MWB_PATH . '/assets/css/book_meta_data_style.css' )
            ],
        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets() {
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_register_script( $handle, $script['src'], $deps, $script['version'], true );

        }

        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, $style['version'] );
        }
    }

}