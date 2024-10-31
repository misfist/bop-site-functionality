<?php
/**
 * Content Admin
 *
 * @since   1.0.0
 * @package Site_Functionality
 */
namespace Site_Functionality\App\Admin;

use Site_Functionality\Common\Abstracts\Base;
use Site_Functionality\App\Admin\Assets;
use Site_Functionality\App\Admin\Options;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Admin extends Base {

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init(): void {
		parent::init();

		$this->define_hooks();

		$options = new Options( $this->settings );
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 */
	protected function define_hooks(): void {

		$assets = new Assets( $this->settings );

		add_action( 'admin_enqueue_scripts', array( $assets, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $assets, 'enqueue_scripts' ) );

	}

}
