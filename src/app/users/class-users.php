<?php
/**
 * Users
 *
 * @since   1.0.9
 * @package Site_Functionality
 */
namespace Site_Functionality\App\Users;

use Site_Functionality\Common\Abstracts\Base;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Users extends Base {

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init(): void {
		parent::init();

		add_filter( 'author_link', array( $this, 'hide_user_link' ), '', 3 );
		add_filter( 'coauthors_posts_link', array( $this, 'hide_coauthors_posts_link' ), '', 2 );

		add_action( 'template_redirect', array( $this, 'redirect_author_page' ) );
	}

	/**
	 * Hide user link
	 * If user role is hidden then hide the user link
	 *
	 * @param  string $link
	 * @param  int    $author_id
	 * @param  string $author_nicename
	 * @return string
	 */
	public function hide_user_link( $link, $author_id, $author_nicename ): string {
		if ( is_admin() || ! $author ) {
			return $link;
		}

		$link = '';
		return $link;
	}

	/**
	 * Hide coauthors posts link
	 * If user role is hidden then hide the user link
	 *
	 * @link https://github.com/Automattic/Co-Authors-Plus/blob/master/php/class-coauthors-guest-authors.php
	 *
	 * @param  array  $args
	 * @param  object $author
	 * @return array
	 */
	public function hide_coauthors_posts_link( $args, $author ): array {
		if ( is_admin() ) {
			return $args;
		}
		$args['href'] = '';
		return $args;
	}

	/**
	 * Redirect author page
	 *
	 * This function handles the redirection of the author page to a specified location.
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_redirect/
	 *
	 * @return void
	 */
	public function redirect_author_page(): void {
		if ( is_author() ) {
			$author = get_queried_object();
			if ( $author && is_a( $author, '\WP_User' ) ) {
				wp_redirect( home_url() );
				exit();
			}
		}
	}

}
