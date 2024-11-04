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
class Country extends Taxonomy {

	/**
	 * Taxonomy data
	 */
	public const TAXONOMY = array(
		'id'            => 'country',
		'name'          => 'Countries/Territories',
		'singular_name' => 'Country/Territory',
		'menu_name'     => 'Countries/Territories',
		'post_types'    => array(
			'guest-author',
		),
		'has_archive'   => false,
		'archive'       => false,
		'with_front'    => false,
		'slug'          => 'countries-territories',
		'rest_base'     => 'countries-territories',
		'facet_enabled' => true,
	);

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init(): void {
		parent::init();
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
