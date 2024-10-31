<?php
/**
 * Content Frontend
 *
 * @since   1.0.0
 * @package Site_Functionality
 */
namespace Site_Functionality\App\Frontend;

use Site_Functionality\Common\Abstracts\Base;
use Site_Functionality\App\Frontend\Assets;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Frontend extends Base {

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init(): void {
		$this->define_hooks();
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 */
	protected function define_hooks(): void {
		$assets = new Assets( $this->settings );

		add_filter( 'feed_links_show_comments_feed', '__return_false' );

		add_action( 'wp_enqueue_scripts', array( $assets, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $assets, 'enqueue_scripts' ) );

	}

}
