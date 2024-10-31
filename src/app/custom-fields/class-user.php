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

class User extends Base {

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init(): void {
		parent::init();

		$this->data['contact_methods'] = array(
			'public_email'  => esc_html__( 'Public Email', 'site-functionality' ),
			'public_number' => esc_html__( 'Public Phone', 'site-functionality' ),
			'twitter'       => esc_html__( 'Twitter', 'site-functionality' ),
			'linkedin'      => esc_html__( 'LinkedIn', 'site-functionality' ),
			'youtube'       => esc_html__( 'YouTube', 'site-functionality' ),
			'facebook'      => esc_html__( 'Facebook', 'site-functionality' ),
		);

		$this->enable_rest_api();

		\add_action( 'acf/include_fields', array( $this, 'register_fields' ) );
		\add_filter( 'user_contactmethods', array( $this, 'user_contact_methods' ), 11, 1 );
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
				'key'               => 'field_expert_title',
				'label'             => __( 'Expert Title', 'site-functionality' ),
				'name'              => 'expert_title',
				'aria-label'        => '',
				'type'              => 'text',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'readonly'          => 1,
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
		);
		$args   = array(
			'key'                   => 'group_expert_details',
			'title'                 => __( 'Expert Details', 'site-functionality' ),
			'fields'                => $fields,
			'location'              => array(
				array(
					array(
						'param'    => 'user_form',
						'operator' => '==',
						'value'    => 'all',
					),
				),
			),
			'menu_order'            => 50,
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
	 * Replace User Contact Methods
	 *
	 * @link https://developer.wordpress.org/reference/hooks/user_contactmethods/
	 *
	 * @param array $contact_methods
	 * @return array $contact_methods
	 */
	public function user_contact_methods( $contact_methods ) : array {
		if ( isset( $this->data['contact_methods'] ) && ! empty( $this->data['contact_methods'] ) ) {
			$contact_methods = array();
			foreach ( $this->data['contact_methods'] as $key => $value ) {
				$contact_methods[ $key ] = $value;
			}
		}
		return $contact_methods;
	}

	/**
	 * Register guest-author post meta
	 * 
	 * @link https://developer.wordpress.org/reference/functions/register_post_meta/
	 *
	 * @return void
	 */
	public function enable_rest_api(): void {
		$post_type = 'guest-author';

		$fields = array(
			'cap-display_name',
			'cap-first_name',
			'cap-last_name',
			'cap-description',
			'cap-website',
			'expert_title',
			'expert_extended_bio',
			'twitter',
			'linkedin',
			'youtube',
			'facebook',
		);
		foreach ( $fields as $field ) {
			register_post_meta(
				$post_type,
				$field,
				array(
					'type'         => 'string',
					'show_in_rest' => true,
					'single'       => true,
				)
			);
		}
	}


}
