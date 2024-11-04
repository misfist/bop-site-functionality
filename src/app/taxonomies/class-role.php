<?php
/**
 * Taxonomy
 *
 * @since   1.0.0
 *
 * @package   Site_Functionality
 */
namespace Site_Functionality\App\Taxonomies;

use Site_Functionality\Common\Abstracts\Taxonomy;

/**
 * Class Taxonomies
 *
 * @package Site_Functionality\App\Taxonomies
 * @since 1.0.0
 */
class Role extends Taxonomy {

	/**
	 * Taxonomy data
	 */
	public const TAXONOMY = array(
		'id'            => 'role',
		'name'          => 'Roles',
		'singular_name' => 'Role',
		'menu_name'     => 'Roles',
		'post_types'    => array(
			'guest-author',
		),
		'has_archive'   => false,
		'archive'       => false,
		'with_front'    => false,
		'slug'          => 'roles',
		'rest_base'     => 'roles',
		'facet_enabled' => true,
	);

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init(): void {
		parent::init();

		$this->data['menu_capability'] = 'list_users';
		$this->data['menu_slug']       = 'edit-tags.php?taxonomy=role&post_type=guest-author';

		\add_action( 'admin_menu', array( $this, 'add_submenu' ) );
	}

	/**
	 * Add submenu
	 * Admin submenu under Users
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
	 *
	 * @return void
	 */
	public function add_submenu(): void {
		\add_submenu_page(
			'users.php',
			$this::TAXONOMY['name'],
			$this::TAXONOMY['name'],
			$this->data['menu_capability'],
			$this->data['menu_slug'],
			null,
			10
		);
	}

	/**
	 * Add rewrite rules
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_rewrite_rule/
	 *
	 * @return void
	 */
	public function rewrite_rules(): void {}

}
