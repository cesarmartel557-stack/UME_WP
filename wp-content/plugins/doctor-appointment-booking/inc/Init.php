<?php

/**
 * @package DoctorAppointmentBooking
 */

namespace Ctmdcd;

defined( 'ABSPATH' ) or die( 'You can not access the file directly' );

final class Init
{
	/**
	 * Store all the classes inside an array
	 * @return array full list of classes
	 */
	public static function get_services() {
		return array (
			pages\Admin::class,
			base\Enqueue::class,
			base\SettingsLinks::class,
			base\Posts::class,
			base\AjaxPosts::class
		);
	}

	/**
	 * Loop through the classes, initialize them and call the register() method if it exists
	 *
	 */
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	private static function instantiate( $class ) {
		$service = new $class();
		return $service;
	}
}