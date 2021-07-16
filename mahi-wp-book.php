<?php

namespace Mahi\WP\Book;

/**
 * Plugin Name:         Mahi WP Book
 * Plugin URI:          https://github.com/aamahi/wp-book
 * Description:         This is a simple book management plugin
 * Version:             1.0
 * Requires PHP:        5.6
 * Requires at least:   5.2
 * Author:              Abdullah Al-mahi
 * Author URI:          https://abdullahmahi.com/
 * License:             GPL-2.0-or-later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         wp-book
 * Domain Path:         /languages
 *
 * @package WordPress
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class Mahi_WP_Book {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0';

    /**
     * WeDevs_Member_Manager constructor.
     */
    private function __construct() {
        $this->localization_setup();
        $this->define_constants();

        register_activation_hook( __FILE__, [ $this, 'activate' ] );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Initializes a singleton instance
     *
     * @return \Mahi_WP_Book
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define all constants
     *
     * @return void
     */
    public function define_constants() {
        $this->define( 'MWB_VERSION', self::version );
        $this->define( 'MWB_FILE', __FILE__ );
        $this->define( 'MWB_PATH', __DIR__ );
        $this->define( 'MWB_URL', plugins_url( '', MWB_FILE ) );
        $this->define( 'MWB_ASSETS', MWB_URL . '/assets' );
    }

    /**
     * Define constant if not already defined
     *
     * @since 1.0
     *
     * @param string      $name
     * @param string|bool $value
     *
     * @return void
     */
    private function define( $name, $value ) {
        if ( ! defined( $name ) ) {
            define( $name, $value );
        }
    }
    /**
     * Initialize plugin for localization
     *
     * @uses load_plugin_textdomain()
     */
    public function localization_setup() {
        load_plugin_textdomain( 'wp-book', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {
        if ( is_admin() ) {
            new Admin();
        }
//        new Frontend();
        new Assets();
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installer = New Installer();
        $installer->run();
    }

}

/**
 * Initializes the main plugin
 *
 * @return \Mahi_WP_Book
 */
function mahi_wp_book() {
    return Mahi_WP_Book::init();
}

// kick-off the plugin
mahi_wp_book();