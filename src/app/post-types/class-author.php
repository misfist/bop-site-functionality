<?php
/**
 * Content Post_Types
 *
 * @since   1.0.0
 * @package Site_Functionality
 */
namespace Site_Functionality\App\Post_Types;

use Site_Functionality\Common\Abstracts\Base;
use Site_Functionality\App\Taxonomies\Taxonomies;
use Site_Functionality\App\Custom_Fields\User;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Author extends Base {

	/**
	 * Post_Type data
	 */
	public const POST_TYPE = array(
		'id'                  => 'guest-author', // co-authors-plus
		'menu_name'           => 'Authors',
		'title'               => 'Authors',
		'singular'            => 'Author',
		'plural'              => 'Authors',
		'menu_icon'           => 'dashicons-businessperson',
		'taxonomies'          => array(
			'author_type',
			'country',
			'role',
		),
		'menu_position'       => 10,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_in_admin_bar'   => true,
		'show_in_menu'        => true,
		'menu_position'       => 21,
		'show_in_nav_menus'   => true,
		'supports'            => array(
			'custom-fields',
			'thumbnail',
		),
		'slug'                => 'experts',
		'rest_base'           => 'experts',
		'has_archive'         => 'experts',
		'facet_enabled'       => true,
		'query_var'           => 'experts',
	);

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init(): void {
		parent::init();

		\add_filter( 'coauthors_guest_author_labels', array( $this, 'modify_labels' ), null, 2 );
		\add_filter( 'register_post_type_args', array( $this, 'modify_post_type_args' ), null, 2 );
		\add_action( 'init', array( $this, 'register_common_taxonomies' ) );
		\add_action( 'acf/include_fields', array( $this, 'register_fields' ) );
		\add_action( 'admin_menu', array( $this, 'remove_taxonomy_metaboxes' ), 100 );

	}

	/**
	 * Modify post type labels
	 *
	 * @link https://developer.wordpress.org/reference/hooks/post_type_labels_post_type/
	 *
	 * @param  array $labels
	 * @return array $labels - modified
	 */
	public function modify_labels( $labels ) {
		$labels = array(
			'singular'              => self::POST_TYPE['singular'],
			'plural'                => self::POST_TYPE['plural'],
			'all_items'             => sprintf( /* translators: %s: post type title */ __( 'All %s', 'site-functionality' ), self::POST_TYPE['title'] ),
			'add_new_item'          => sprintf( /* translators: %s: post type singular title */ __( 'Add New %s', 'site-functionality' ), self::POST_TYPE['singular'] ),
			'edit_item'             => sprintf( /* translators: %s: post type singular title */ __( 'Edit %s', 'site-functionality' ), self::POST_TYPE['singular'] ),
			'new_item'              => sprintf( /* translators: %s: post type singular title */ __( 'New %s', 'site-functionality' ), self::POST_TYPE['singular'] ),
			'view_item'             => sprintf( /* translators: %s: post type singular title */ __( 'View %s', 'site-functionality' ), self::POST_TYPE['singular'] ),
			'search_items'          => sprintf( /* translators: %s: post type title */ __( 'Search %s', 'site-functionality' ), self::POST_TYPE['title'] ),
			'not_found'             => sprintf( /* translators: %s: post type title */ __( 'No %s found', 'site-functionality' ), strtolower( self::POST_TYPE['title'] ) ),
			'not_found_in_trash'    => sprintf( /* translators: %s: post type title */ __( 'No %s found in trash', 'site-functionality' ), strtolower( self::POST_TYPE['title'] ) ),
			'update_item'           => sprintf( /* translators: %s: post type title */ __( 'Update %s', 'site-functionality' ), self::POST_TYPE['singular'] ),
			'metabox_about'         => sprintf( /* translators: %s: post type title */ __( 'About the %s', 'site-functionality' ), self::POST_TYPE['singular'] ),
			'featured_image'        => __( 'Avatar', 'site-functionality' ),
			'set_featured_image'    => __( 'Set Avatar', 'site-functionality' ),
			'use_featured_image'    => __( 'Use Avatar', 'site-functionality' ),
			'remove_featured_image' => __( 'Remove Avatar', 'site-functionality' ),
		);
		return $labels;
	}

	/**
	 * Modify post type args
	 *
	 * @link https://developer.wordpress.org/reference/hooks/register_post_type_args/
	 *
	 * @param  array  $args
	 * @param  string $post_type
	 * @return array $args - modified
	 */
	public function modify_post_type_args( $args, $post_type ): array {
		if ( self::POST_TYPE['id'] === $post_type ) {
			$args['menu_icon']           = self::POST_TYPE['menu_icon'];
			$args['rest_base']           = self::POST_TYPE['rest_base'];
			$args['menu_position']       = self::POST_TYPE['menu_position'];
			$args['publicly_queryable']  = self::POST_TYPE['publicly_queryable'];
			$args['exclude_from_search'] = self::POST_TYPE['exclude_from_search'];
			$args['show_in_menu']        = self::POST_TYPE['show_in_menu'];
			$args['menu_position']       = self::POST_TYPE['menu_position'];
			$args['show_in_admin_bar']   = self::POST_TYPE['show_in_admin_bar'];
			$args['show_in_nav_menus']   = self::POST_TYPE['show_in_nav_menus'];
			$args['supports']            = self::POST_TYPE['supports'];
			$args['publicly_queryable']  = self::POST_TYPE['publicly_queryable'];
			$args['has_archive']         = self::POST_TYPE['has_archive'];
			$args['facet_enabled']       = self::POST_TYPE['facet_enabled'];
			$args['query_var']           = self::POST_TYPE['query_var'];
			$args['rewrite']             = array( 'slug' => self::POST_TYPE['slug'] );
		}
		return $args;
	}

	/**
	 * Register common taxonomies for post type
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_taxonomy_for_object_type/
	 *
	 * @return void
	 */
	public function register_common_taxonomies(): void {
		$taxonomies = self::POST_TYPE['taxonomies'];
		foreach ( (array) $taxonomies as $taxonomy ) {
			register_taxonomy_for_object_type( $taxonomy, self::POST_TYPE['id'] );
		}
	}

	/**
	 * Register ACF fields
	 *
	 * @link https://www.advancedcustomfields.com/resources/register-fields-via-php/
	 *
	 * @return void
	 */
	public function register_fields(): void {
		$taxonomies = self::POST_TYPE['taxonomies'];

		/**
		 * Taxonomy fields
		 */
		$taxonomy_fields = array_map(
			function( $taxonomy ) {
				$title = ( 'category' === $taxonomy ) ? __( 'Topic', 'site-functionality' ) : str_replace( '_connect', '', $taxonomy );
				$label = mb_convert_case( str_replace( '_', ' ', $title ), MB_CASE_TITLE, 'UTF-8' );
				return array(
					'key'               => 'field_' . $taxonomy,
					'label'             => $label,
					'name'              => $taxonomy,
					'aria-label'        => '',
					'type'              => 'taxonomy',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'taxonomy'          => $taxonomy,
					'add_term'          => 0,
					'save_terms'        => 1,
					'load_terms'        => 1,
					'return_format'     => 'id',
					'field_type'        => ( 'author_type' === $taxonomy ) ? 'radio' : 'checkbox',
					'allow_null'        => 1,
					'multiple'          => 0,
				);
			},
			$taxonomies
		);
		$taxonomy_args   = array(
			'key'                   => 'group_expert_taxonomies',
			'title'                 => __( 'Taxonomies', 'site-functionality' ),
			'fields'                => $taxonomy_fields,
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => self::POST_TYPE['id'],
					),
				),
			),
			'menu_order'            => 100,
			'position'              => 'side',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
			'show_in_rest'          => 1,
		);
		\acf_add_local_field_group( $taxonomy_args );

		/**
		 * Standard fields
		 */
		$fields = array(
			array(
				'key'               => 'field_expert_title',
				'label'             => __( 'Expert Title', 'site-functionality' ),
				'name'              => 'expert_title',
				'aria-label'        => '',
				'type'              => 'text',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'readonly'          => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			),
			array(
				'key'               => 'field_public_email',
				'label'             => __( 'Public Email', 'site-functionality' ),
				'name'              => 'public_email',
				'aria-label'        => '',
				'type'              => 'text',
				'instructions'      => __( 'Email to display on the public profile page.', 'site-functionality' ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			),
			array(
				'key'               => 'field_public_number',
				'label'             => __( 'Public Number', 'site-functionality' ),
				'name'              => 'public_number',
				'aria-label'        => '',
				'type'              => 'text',
				'instructions'      => __( 'Phone number to display on the public the profile page.', 'site-functionality' ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			),
			array(
				'key'               => 'field_twitter',
				'label'             => __( 'Twitter', 'site-functionality' ),
				'name'              => 'twitter',
				'aria-label'        => '',
				'type'              => 'url',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_facebook',
				'label'             => __( 'Facebook', 'site-functionality' ),
				'name'              => 'facebook',
				'aria-label'        => '',
				'type'              => 'url',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_linkedin',
				'label'             => __( 'LinkedIn', 'site-functionality' ),
				'name'              => 'linkedin',
				'aria-label'        => '',
				'type'              => 'url',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_other',
				'label'             => __( 'Other', 'site-functionality' ),
				'name'              => 'other',
				'aria-label'        => '',
				'type'              => 'url',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_extended_bio',
				'label'             => __( 'Extended Bio', 'site-functionality' ),
				'name'              => 'expert_extended_bio',
				'aria-label'        => '',
				'type'              => 'wysiwyg',
				'instructions'      => __( 'Extended biography text for Expert\'s Biography page', 'site-functionality' ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'tabs'              => 'all',
				'toolbar'           => 'full',
				'media_upload'      => 0,
				'delay'             => 0,
			),
			array(
				'key'               => 'field_expertise',
				'label'             => __( 'Expertise', 'site-functionality' ),
				'name'              => 'expert_expertise',
				'aria-label'        => '',
				'type'              => 'textarea',
				'instructions'      => '',
				'required'          => 0,
				'readonly'          => 1,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'maxlength'         => '',
				'rows'              => '4',
				'placeholder'       => '',
				'new_lines'         => '',
			),
			array(
				'key'               => 'field_expert_programs',
				'label'             => __( 'Programs', 'site-functionality' ),
				'name'              => 'expert_programs',
				'aria-label'        => '',
				'type'              => 'textarea',
				'instructions'      => '',
				'required'          => 0,
				'readonly'          => 1,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'maxlength'         => '',
				'rows'              => '4',
				'placeholder'       => '',
				'new_lines'         => '',
			),

		);
		$args = array(
			'key'                   => 'group_expert_details',
			'title'                 => __( 'Details', 'site-functionality' ),
			'fields'                => $fields,
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => self::POST_TYPE['id'],
					),
				),
			),
			'menu_order'            => 10000,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
			'show_in_rest'          => 1,
		);
		\acf_add_local_field_group( $args );
	}

	/**
	 * Remove taxonomy metaboxes
	 * On author screens, use ACF UI for taxonomies
	 *
	 * @link https://developer.wordpress.org/reference/functions/remove_meta_box/
	 *
	 * @return void
	 */
	public function remove_taxonomy_metaboxes(): void {
		$taxonomies = self::POST_TYPE['taxonomies'];
		foreach ( (array) $taxonomies as $taxonomy ) {
			remove_meta_box( 'tagsdiv-' . $taxonomy, self::POST_TYPE['id'], 'side' );
			remove_meta_box( 'categorydiv-' . $taxonomy, self::POST_TYPE['id'], 'side' );
		}
		remove_meta_box( 'categorydiv', self::POST_TYPE['id'], 'normal' );
		// remove_meta_box( 'categorydiv','post','normal' );
	}

}
