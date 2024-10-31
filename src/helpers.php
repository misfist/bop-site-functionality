<?php
/**
 * Helpers
 *
 * @link       https://github.com/misfist/site-functionality
 * @since      1.0.0
 *
 * @package    site-functionality
 */

namespace Site_Functionality;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Debug Helper
 * 
 * @return void
 */
if( ! function_exists( 'console_log' ) ) {
	function console_log( $data ): void {
		$output = $data;
		if ( is_array( $output ) )
			$output = implode( ',', $output );

		echo "<script>console.log( $output );</script>";
	}
}
