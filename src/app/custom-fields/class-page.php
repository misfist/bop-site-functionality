<?php
/**
 * Custom Fields
 *
 * @since   1.0.0
 * @package Site_Functionality
 */
namespace Site_Functionality\App\Custom_Fields;

use Site_Functionality\Common\Abstracts\Base;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Page extends Base {

	/**
	 * Post type
	 *
	 * @var string
	 */
	public $post_type = 'page';

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init(): void {
		parent::init();

		add_action( 'acf/include_fields', array( $this, 'register_fields' ) );
	}

	/**
	 * Register ACF fields
	 * 
	 * @link https://www.advancedcustomfields.com/resources/register-fields-via-php/
	 *
	 * @return void
	 */
	public function register_fields(): void {

		$fields = array(
			array(
				'key'               => 'field_display_section_navigation',
				'label'             => __( 'Display Section Navigation', 'site-functionality' ),
				'name'              => 'display_section_navigation',
				'aria-label'        => '',
				'type'              => 'true_false',
				'instructions'      => __( 'Set whether to display section navigation on page.', 'site-functionality' ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'message'           => '',
				'default_value'     => 1,
				'allow_in_bindings' => 1,
				'ui'                => 1,
				'ui_on_text'        => __( 'Show', 'site-functionality' ),
				'ui_off_text'       => __( 'Hide', 'site-functionality' ),
			),
			array(
				'key'               => 'field_section_navigation_label',
				'label'             => __( 'Section Navigation Label', 'site-functionality' ),
				'name'              => 'section_navigation_label',
				'aria-label'        => '',
				'type'              => 'text',
				'instructions'      => __( 'Set the section navigation label.', 'site-functionality' ),
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
				'key'               => 'field_hide_page_title',
				'label'             => __( 'Page Title', 'site-functionality' ),
				'name'              => 'hide_page_title',
				'aria-label'        => '',
				'type'              => 'true_false',
				'instructions'      => __( 'Set whether to display page title on page.', 'site-functionality' ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'message'           => '',
				'default_value'     => 0,
				'ui_on_text'        => __( 'Hide', 'site-functionality' ),
				'ui_off_text'       => __( 'Show', 'site-functionality' ),
				'ui'                => 1,
			),
			array(
				'key'               => 'field_hide_featured_image',
				'label'             => __( 'Featured Image', 'site-functionality' ),
				'name'              => 'hide_featured_image',
				'aria-label'        => '',
				'type'              => 'true_false',
				'instructions'      => __( 'Set whether to display featured image in list views.', 'site-functionality' ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'message'           => '',
				'default_value'     => 0,
				'ui_on_text'        => __( 'Hide', 'site-functionality' ),
				'ui_off_text'       => __( 'Show', 'site-functionality' ),
				'ui'                => 1,
			),
			array(
				'key'               => 'field_download_file',
				'label'             => __( 'Downloadable File', 'site-functionality' ),
				'name'              => 'download_file',
				'aria-label'        => '',
				'type'              => 'file',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'return_format'     => 'url',
				'allow_in_bindings' => 1,
				'library'           => 'all',
				'min_size'          => '',
				'max_size'          => '',
				'mime_types'        => '',
			),
		);

		$args = array(
			'key'                   => 'group_details',
			'title'                 => __( 'Details', 'site-functionality' ),
			'fields'                => $fields,
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'page',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'side',
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

}
