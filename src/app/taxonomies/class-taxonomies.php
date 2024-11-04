<?php
/**
 * Content Taxonomies
 *
 * @since   1.0.0
 * @package Site_Functionality
 */
namespace Site_Functionality\App\Taxonomies;

use Site_Functionality\Common\Abstracts\Base;
use Site_Functionality\App\Taxonomies\Author_Type;
use Site_Functionality\App\Taxonomies\Role;
use Site_Functionality\App\Taxonomies\Country;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Taxonomies extends Base {

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init(): void {
		parent::init();

		new Author_Type( $this->settings );
		new Role( $this->settings );
		new Country( $this->settings );
	}

}
