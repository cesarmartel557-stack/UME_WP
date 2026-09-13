<?php

/**
 * @package DoctorAppointmentBooking
 */

namespace Ctmdcd\api;

use \Ctmdcd\base\BaseController;

defined( 'ABSPATH' ) or die( 'You can not access the file directly' );

class DataApi extends BaseController
{
	// Method for getting an object of all the chambers
	public static function get_chambers() {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_chamber';
		$result = $wpdb->get_results( "SELECT * FROM $table ORDER BY `name` ASC" );
		return $result;
	}

	// Method for getting an object of a specific chamber (EXPECTS AN ARGUMENT 'CHAMBER_ID')
	public static function get_chamber_info_by_id( $chamber_id ) {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_chamber';
		$result = $wpdb->get_results( "SELECT * FROM $table WHERE chamber_id = '$chamber_id'" );
		return $result;
	}

	// Method for getting an object of all the appointments (ESPECTS AN ARGUMENT 'TIMESTAMP' WHICH IS THE DAY FOR WHICH YOU WISH TO GET THE APPOINTMENT OBJECT)
	public static function get_appointments( $timestamp ) {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_appointment';
		$app_date = strtotime( $timestamp );
		$default_chamber_id = self::get_settings( 'default_chamber_id' );
		$result = $wpdb->get_results( "SELECT * FROM $table WHERE appointment_timestamp = $app_date AND chamber_id = $default_chamber_id" );
		return $result;
	}

	// Method for getting an object of appointment counts on each day
	public static function get_days_appointment_counts() {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_appointment';
		$default_chamber_id = self::get_settings( 'default_chamber_id' );
		$result = $wpdb->get_results( "SELECT `appointment_timestamp`, COUNT(*) AS total FROM $table WHERE chamber_id = $default_chamber_id GROUP BY `appointment_timestamp`" );
		return $result;
	}

	// Method for getting an object of all the appointment of a single patient (EXPECTS AN ARGUMENT 'PATIENT_ID')
	public static function get_appointments_of_patient( $patient_id ) {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_appointment';
		$result = $wpdb->get_results( "SELECT * FROM $table WHERE patient_id = $patient_id ORDER BY appointment_timestamp DESC" );
		return $result;
	}

	// Method for getting an object of all the information of a single appointment (EXPECTS AN ARGUMENT 'APPOINTMENT_ID')
	public static function get_appointment_info_by_id( $appointment_id ) {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_appointment';
		$result = $wpdb->get_results( "SELECT * FROM $table WHERE appointment_id = $appointment_id" );
		return $result;
	}

	// Method for getting an object of all the patients
	public static function get_patients() {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_patient';
		$result = $wpdb->get_results( "SELECT * FROM $table ORDER BY `name` ASC" );
		return $result;
	}

	// Method for getting an object of all the patients after applying filters available (EXPECTS TWO ARGUMENTS 'START_DATE' and 'END DATE')
	public static function get_filtered_patients( $start_date = '', $end_date = '' ) {
		$start_date = strtotime( $start_date );
		$end_date = strtotime( $end_date );
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_patient';
		$result = $wpdb->get_results( "SELECT * FROM $table WHERE `date_added` BETWEEN '$start_date' AND '$end_date'" );
		return $result;
	}

	// Method for getting an object of all the information of a specific patient (EXPECTS AN ARGUMENT 'PATIENT_ID')
	public static function get_patient_info_by_id( $patient_id ) {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_patient';
		$result = $wpdb->get_results( "SELECT * FROM $table WHERE patient_id = $patient_id" );
		return $result;
	}

	// Method for getting an object of all the prescriptions
	public static function get_prescriptions() {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_prescription';
		$result = $wpdb->get_results( "SELECT * FROM $table ORDER BY `timestamp` DESC " );
		return $result;
	}

	// Method for getting an object of all the prescriptions after applying filters available (EXPECTS THREE ARGUMENTS 'PATIENT_ID', 'START DATE' and 'END DATE')
	public static function get_filtered_prescriptions( $patient_id = '', $start_date = '', $end_date = '' ) {
		$patient_id = $patient_id == '' ? 'NULL' : $patient_id;
		$start_date = strtotime( $start_date );
		$end_date = strtotime( $end_date );
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_prescription';
		$result = $wpdb->get_results( "SELECT * FROM $table WHERE `timestamp` BETWEEN '$start_date' AND '$end_date' AND patient_id = COALESCE($patient_id, patient_id)" );
		return $result;
	}

	// Method for getting an object of all the information about a single prescription (EXPECTS AN ARGUMENT 'PRESCRIPTION_ID')
	public static function get_prescription_info_by_id( $prescription_id ) {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_prescription';
		$result = $wpdb->get_results( "SELECT * FROM $table WHERE prescription_id = $prescription_id" );
		return $result;
	}

	// Method for getting an object of all the prescriptions for a specific patient (EXPECTS AN ARGUMENT 'PATIENT_ID')
	public static function get_prescriptions_of_patient( $patient_id ) {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_prescription';
		$result = $wpdb->get_results( "SELECT * FROM $table WHERE patient_id = $patient_id ORDER BY `prescription_id` DESC " );
		return $result;
	}

	// Method for getting prescription id of a particular appointment (EXPECTS AN ARGUMENT 'APPOINTMENT_ID')
	public static function get_prescription_of_appointment( $appointment_id ) {
		$prescription_id = '';
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_prescription';
		$result = $wpdb->get_results( "SELECT * FROM $table WHERE appointment_id = $appointment_id" );
		if ( count( $result ) > 0 ) {
			foreach ( $result as $value ) {
				$prescription_id = $value->prescription_id;
			}
		}
		return $prescription_id;
	}

	// Method for getting an object of all the countries
	public static function get_countries() {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_country';
		$result = $wpdb->get_results( "SELECT * FROM $table" );
		return $result;
	}

	// Method for getting an info from country table (EXPECTS TWO ARGUMENTS 'COUNTRY_ID' and 'INFO')
	public static function get_country_info_by_id( $country_id, $info ) {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_country';
		$result = $wpdb->get_results( "SELECT * FROM $table WHERE ID = $country_id" );
		foreach ( $result as $value ) {
			return $value->$info;
		}
	}

	// Method for getting an specific value from settings table (EXPECTS AN ARGUMENT 'TYPE')
	public static function get_settings( $type ) {
		global $wpdb;
		$table = $wpdb->prefix . 'ctmdcd_settings';
		$result = $wpdb->get_results( "SELECT * FROM $table WHERE type = '$type'" );
		foreach ( $result as $row ) {
			return $row->description;
		}
	}
}