<?php
/**
 * Content Post_Types
 *
 * @since   1.0.0
 * @package Site_Functionality
 */
namespace Site_Functionality\App\Post_Types;

use Site_Functionality\Common\Abstracts\Base;
use Site_Functionality\App\Post_Types\Author;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Post_Types extends Base {

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init(): void {
		parent::init();

		\add_filter( 'query_vars', array( $this, 'register_query_vars' ) );

		$author = new Author( $this->settings );
	}

	

	/**
	 * Register Query Vars
	 *
	 * @link https://developer.wordpress.org/reference/hooks/query_vars/
	 *
	 * @param  array $query_vars
	 * @return array $query_vars
	 */
	public function register_query_vars( $query_vars ) {
		return $query_vars;
	}

}
