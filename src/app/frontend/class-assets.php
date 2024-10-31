<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/misfist/site-functionality
 * @since      1.0.0
 *
 * @package    site-functionality
 */

namespace Site_Functionality\App\Frontend;

use Site_Functionality\Common\Abstracts\Base;

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the frontend-facing stylesheet and JavaScript.
 */
class Assets extends Base {

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init(): void {
		parent::init();
	}

	/**
	 * Register the stylesheets for the frontend-facing side of the site.
	 *
	 * @hooked wp_enqueue_scripts
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles(): void {
		$version = $this->settings->get_plugin_version();

		$plugin_url = plugin_dir_url( $this->settings->get_plugin_basename() );

		// wp_enqueue_style( 'site-functionality', $plugin_url . 'assets/site-functionality-frontend.css', array(), $version, 'all' );

	}

	/**
	 * Register the JavaScript for the frontend-facing side of the site.
	 *
	 * @hooked wp_enqueue_scripts
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts(): void {
		$version = $this->settings->get_plugin_version();

		$plugin_url = plugin_dir_url( $this->settings->get_plugin_basename() );

		// wp_enqueue_script( 'site-functionality', $plugin_url . 'assets/site-functionality-frontend.js', array( 'jquery' ), $version, false );

	}

}
