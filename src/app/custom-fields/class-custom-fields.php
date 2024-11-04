<?php
/**
 * Custom Fields
 *
 * @since   1.0.0
 * @package Site_Functionality
 */
namespace Site_Functionality\App\Custom_Fields;

use Site_Functionality\Common\Abstracts\Base;
use Site_Functionality\App\Custom_Fields\Page;
use Site_Functionality\App\Custom_Fields\User;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Custom_Fields extends Base {

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init(): void {
		parent::init();

		add_action( 'acf/init', array( $this, 'acf_settings' ) );

		new Page( $this->settings );
		new User( $this->settings );
	}

	/**
	 * Add ACF settings
	 * 
	 * @link https://www.advancedcustomfields.com/resources/acf-settings/
	 *
	 * @return void
	 */
	public function acf_settings(): void {
		acf_update_setting( 'l10n_textdomain', 'site-functionality' );
		acf_update_setting( 'json', false );
	}

}
