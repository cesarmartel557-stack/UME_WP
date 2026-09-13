<?php

/**
 * @package DoctorAppointmentBooking
 */

namespace Ctmdcd\api\callbacks;

use \Ctmdcd\base\BaseController;

defined( 'ABSPATH' ) or die( 'You can not access the file directly' );

class AdminCallbacks extends BaseController
{
	// Method called when admin clicks on appointment menu of the plugin
	public function appointment() {
		return require_once( "$this->plugin_path/templates/page-appointment.php" );
	}

	// Method called when admin clicks on prescription menu of the plugin
	public function prescription() {
		return require_once( "$this->plugin_path/templates/page-prescription.php" );
	}

	// Method called when admin clicks on billing menu of the plugin
	public function billing() {
		return require_once( "$this->plugin_path/templates/page-billing.php" );
	}

	// Method called when admin clicks on patient menu of the plugin
	public function patient() {
		return require_once( "$this->plugin_path/templates/page-patient.php" );
	}

	// Method called when admin clicks on chamber menu of the plugin
	public function chamber() {
		return require_once( "$this->plugin_path/templates/page-chamber.php" );
	}

	// Method called when admin clicks on settings menu of the plugin
	public function settings() {
		return require_once( "$this->plugin_path/templates/page-settings.php" );
	}
}