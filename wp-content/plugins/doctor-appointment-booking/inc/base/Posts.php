<?php

/**
 * @package DoctorAppointmentBooking
 */

namespace Ctmdcd\base;

defined( 'ABSPATH' ) or die( 'You can not access the file directly' );

class Posts extends BaseController
{
	// Method for registering form submission hook to this plugin
	public function register() {
		add_action( 'admin_post_ctmdcd', array( $this, 'post' ) );
	}

	// Main method for handling all the post data submitted during a form submission
	public function post() {
		$task = sanitize_text_field( $_POST['task'] );
		$this->handle_form_submission( $task );
	}

	// Method for handling form submission according to task of the form
	public function handle_form_submission( $task ) {
		if ( $task == 'new_appointment' )
			$this->add_appointment();

		if ( $task == 'new_chamber' )
			$this->add_chamber();

		if ( $task == 'edit_chamber' )
			$this->edit_chamber();

		if ( $task == 'edit_chamber_schedule' )
			$this->edit_chamber_schedule();

		if ( $task == 'new_patient' )
			$this->add_patient();

		if ( $task == 'edit_patient' )
			$this->edit_patient();

		if ( $task == 'new_prescription' )
			$this->add_prescription();

		if ( $task == 'edit_prescription' )
			$this->edit_prescription();

		if ( $task == 'delete_prescription' )
			$this->delete_prescription();

		if ( $task == 'change_appointment_status' )
			$this->change_appointment_status();

		if ( $task == 'edit_settings' )
			$this->edit_settings();
	}

	// Method for adding a new appointment
	private function add_appointment() {
		if ( $this->verify_nonce( 'new_appointment_nonce' ) == true ) {
			$patient_type = sanitize_text_field( $_POST['patient_type'] );
			if ( $patient_type == 'old' ) {
				$patient_id = sanitize_text_field( $_POST['patient_id'] );
			} else {
				$patient_id = $this->add_patient();
			}
			$data['patient_id']                 =   $patient_id;
			$data['chamber_id']                 =   sanitize_text_field( $_POST['chamber_id'] );
			$data['schedule']                   =   sanitize_text_field( $_POST['schedule'] );
			$data['appointment_timestamp']      =   strtotime( sanitize_text_field( $_POST['appointment_timestamp'] ) );
			global $wpdb;
			$table = $this->get_table_name( 'appointment' );
			$wpdb->insert( $table, $data );
		}
	}

	// Method for marking a patient for an appointment as visited or absent
	private function change_appointment_status() {
		if ( $this->verify_nonce( 'change_appointment_status_nonce' ) == true ) {
			$appointment_id =   sanitize_text_field( $_POST['id'] );
			global $wpdb;
			$table = $this->get_table_name( 'appointment' );
			$appointment_info = $wpdb->get_results( "SELECT * FROM $table WHERE appointment_id = $appointment_id" );
			$is_visited = 0;
			foreach ( $appointment_info as $value ) {
				$is_visited = $value->is_visited;
			}
			$data['is_visited'] = $is_visited == 0 ? 1 : 0;
			$wpdb->update( $table, $data, array( 'appointment_id' => $appointment_id ) );
		}
	}

	// Method for adding a new chamber
	private function add_chamber() {
		if ( $this->verify_nonce( 'new_chamber_nonce' ) == true ) {
			$data['name']     =   sanitize_text_field( $_POST['name'] );
			$data['address']  =   sanitize_text_field( $_POST['address'] );
			$data['status']   =   sanitize_text_field( $_POST['status'] );
			global $wpdb;
			$table = $this->get_table_name( 'chamber' );
			$wpdb->insert( $table, $data );
		}
	}

	// Method for editing an existing chamber
	private function edit_chamber() {
		if ( $this->verify_nonce( 'edit_chamber_nonce' ) == true ) {
			$chamber_id       =   sanitize_text_field( $_POST['chamber_id'] );
			$data['name']     =   sanitize_text_field( $_POST['name'] );
			$data['address']  =   sanitize_text_field( $_POST['address'] );
			$data['status']   =   sanitize_text_field( $_POST['status'] );
			global $wpdb;
			$table = $this->get_table_name( 'chamber' );
			$wpdb->update( $table, $data, array( 'chamber_id' => $chamber_id ) );
		}
	}

	// Method for editing schedule for a specific chamber
	private function edit_chamber_schedule() {
		if ( $this->verify_nonce( 'edit_chamber_schedule_nonce' ) == true ) {
			$schedules = array();
			$chamber_id			=	sanitize_text_field( $_POST['chamber_id'] );
			// Variables for holding the schedule data within an array
			$days      			= 	$this->sanitized_array( $_POST['days'] );
			$open_days 			= 	$this->sanitized_array( $_POST['open_days'] );
			$morning_open    	= 	$this->sanitized_array( $_POST['morning_open'] );
			$morning_close   	= 	$this->sanitized_array( $_POST['morning_close'] );
			$afternoon_open  	= 	$this->sanitized_array( $_POST['afternoon_open'] );
			$afternoon_close 	= 	$this->sanitized_array( $_POST['afternoon_close'] );
			$evening_open    	= 	$this->sanitized_array( $_POST['evening_open'] );
			$evening_close   	= 	$this->sanitized_array( $_POST['evening_close'] );
			foreach ( $days as $key => $day ) {
				$schedule = array();
				$schedule['day'] = $day;
				$schedule['key'] = $key;
				$is_open = in_array( $key, $open_days );
				// Check if the day is checked or not
				if ( $is_open == 1 ) {
					$schedule['status']        = 'open';
					// Taking values for morning session
					$schedule['morning_open']  = $morning_open[$key];
					$schedule['morning_close'] = $morning_close[$key];
					// Check if the schedule has data inside otherwise return a empty string
					if ( $schedule['morning_open'] != '' && $schedule['morning_close'] != '' )
						$schedule['morning'] = $schedule['morning_open'] . ' - ' . $schedule['morning_close'];
					else
						$schedule['morning'] = '';
					// Taking values for afternoon session
					$schedule['afternoon_open']  = $afternoon_open[$key];
					$schedule['afternoon_close'] = $afternoon_close[$key];
					// Check if the schedule has data inside otherwise return a empty string
					if ( $schedule['afternoon_open'] != '' && $schedule['afternoon_close'] != '' )
						$schedule['afternoon'] = $schedule['afternoon_open'] . ' - ' . $schedule['afternoon_close'];
					else
						$schedule['afternoon'] = '';
					// Taking values for evening session
					$schedule['evening_open']  = $evening_open[$key];
					$schedule['evening_close'] = $evening_close[$key];
					// Check if the schedule has data inside otherwise return a empty string
					if ( $schedule['evening_open'] != '' && $schedule['evening_close'] != '' )
						$schedule['evening'] = $schedule['evening_open'] . ' - ' . $schedule['evening_close'];
					else
						$schedule['evening'] = '';
				} else {
					$schedule['status']        =	'closed';
					$schedule['morning_open']  = 	'';
					$schedule['morning_close'] = 	'';
					$schedule['morning']       = 	'';
					$schedule['afternoon_open']  = 	'';
					$schedule['afternoon_close'] = 	'';
					$schedule['afternoon']       = 	'';
					$schedule['evening_open']  	 = 	'';
					$schedule['evening_close'] 	 = 	'';
					$schedule['evening']       	 = 	'';
				}
				array_push( $schedules, $schedule );
			}
			$data['schedule'] = json_encode($schedules);
			global $wpdb;
			$table = $this->get_table_name( 'chamber' );
			$wpdb->update( $table, $data, array( 'chamber_id' => $chamber_id ) );
		}
	}

	// Method for adding a new patient and returns the patient id that is inserted into the database
	private function add_patient() {
		$data['name']       =   sanitize_text_field( $_POST['name'] );
		$data['email']      =   sanitize_email( $_POST['email'] );
		$data['phone']      =   sanitize_text_field( $_POST['phone'] );
		$data['age']        =   sanitize_text_field( $_POST['age'] );
		$data['gender']     =   sanitize_text_field( $_POST['gender'] );
		$data['date_added'] =   strtotime( date( get_option( 'date_format' ) ) );
		$table = $this->get_table_name( 'patient' );
		global $wpdb;
		$wpdb->insert( $table, $data );
		return $wpdb->insert_id;
	}

	// Method for editing an existing patient
	private function edit_patient() {
		if ( $this->verify_nonce( 'edit_patient_nonce' ) == true ) {
			$patient_id 		= 	sanitize_text_field( $_POST['patient_id'] );
			$data['name']       =   sanitize_text_field( $_POST['name'] );
			$data['email']      =   sanitize_email( $_POST['email'] );
			$data['phone']      =   sanitize_text_field( $_POST['phone'] );
			$data['age']        =   sanitize_text_field( $_POST['age'] );
			$data['gender']     =   sanitize_text_field( $_POST['gender'] );
			$data['address']    =   sanitize_text_field( $_POST['address'] );
			$data['notes']      =   sanitize_text_field( $_POST['notes'] );
			// Generating a json object for patient's medical information
			$medical_info = array();
			$medical_data['blood_group']	=	sanitize_text_field( $_POST['blood_group'] );
			$medical_data['height']			=	sanitize_text_field( $_POST['height'] );
			$medical_data['weight']			=	sanitize_text_field( $_POST['weight'] );
			$medical_data['blood_pressure']	=	sanitize_text_field( $_POST['blood_pressure'] );
			$medical_data['pulse']			=	sanitize_text_field( $_POST['pulse'] );
			$medical_data['respiration']	=	sanitize_text_field( $_POST['respiration'] );
			$medical_data['allergy']		=	sanitize_text_field( $_POST['allergy'] );
			$medical_data['diet']			=	sanitize_text_field( $_POST['diet'] );
			array_push( $medical_info, $medical_data );
			$data['medical_info']	=	json_encode( $medical_info );
			global $wpdb;
			$table = $this->get_table_name( 'patient' );
			$wpdb->update( $table, $data, array( 'patient_id' => $patient_id ) );
		}
	}

	// Method for adding a new prescription
	private function add_prescription() {
		if ( $this->verify_nonce( 'new_prescription_nonce' ) == true ) {
			$patient_type = sanitize_text_field( $_POST['patient_type'] );
			$patient_id = '';
			if ( $patient_type == 'old' ) {
				$patient_id = sanitize_text_field( $_POST['patient_id'] );
			} else if ( $patient_type == 'new' ) {
				$patient_id = $this->add_patient();
			} else if ( isset( $_POST['appointment_id'] ) ) {
				$patient_id = sanitize_text_field( $_POST['patient_id'] );
			}
			$data['patient_id']     =   $patient_id;
			$data['symptom']        =   sanitize_text_field( $_POST['symptom'] );
			$data['diagnosis']      =   sanitize_text_field( $_POST['diagnosis'] );
			$data['timestamp']      =   strtotime( date( get_option( 'date_format' ) ) );
			$medicine_names         =   $this->sanitized_array( $_POST['medicine_name'] );
			$medicine_notes         =   $this->sanitized_array( $_POST['medicine_note'] );
			$data['medicine']       =   $this->encode_medicines( $medicine_names, $medicine_notes );
			$test_names             =   $this->sanitized_array( $_POST['test_name'] );
			$test_notes             =   $this->sanitized_array( $_POST['test_note'] );
			$data['test']           =   $this->encode_tests( $test_names, $test_notes );
			if ( isset( $_POST['appointment_id'] ) ) {
				$data['appointment_id'] =   sanitize_text_field( $_POST['appointment_id'] );
			}
			global $wpdb;
			$table = $this->get_table_name( 'prescription' );
			$wpdb->insert( $table, $data );
		}
	}

	// Method for editing an existing prescription
	private function edit_prescription() {
		if ( $this->verify_nonce( 'edit_prescription_nonce' ) == true ) {
			$prescription_id =   sanitize_text_field( $_POST['prescription_id'] );
			$data['patient_id']     =   sanitize_text_field( $_POST['patient_id'] );
			$data['symptom']        =   sanitize_text_field( $_POST['symptom'] );
			$data['diagnosis']      =   sanitize_text_field( $_POST['diagnosis'] );
			$medicine_names         =   $this->sanitized_array( $_POST['medicine_name'] );
			$medicine_notes         =   $this->sanitized_array( $_POST['medicine_note'] );
			$data['medicine']       =   $this->encode_medicines( $medicine_names, $medicine_notes );
			$test_names             =   $this->sanitized_array( $_POST['test_name'] );
			$test_notes             =   $this->sanitized_array( $_POST['test_note'] );
			$data['test']           =   $this->encode_tests( $test_names, $test_notes );
			global $wpdb;
			$table = $this->get_table_name( 'prescription' );
			$wpdb->update( $table, $data, array( 'prescription_id' => $prescription_id ) );
		}
	}

	// Method for deleting an existing prescription
	private function delete_prescription() {
		if ( $this->verify_nonce( 'delete_prescription_nonce' ) == true ) {
			$prescription_id = sanitize_text_field( $_POST['id'] );
			global $wpdb;
			$table = $this->get_table_name( 'prescription' );
			$wpdb->delete( $table, array( 'prescription_id' => $prescription_id ) );
		}
	}

	// Method for encoding multiple medicine entries into a json object
	private function encode_medicines( $medicine_names, $medicine_notes ) {
		$number_of_medicine_entries = sizeof( $medicine_names );
		$medicine_entries           = array();
		for ( $i = 0; $i < $number_of_medicine_entries; $i++ ) {
			$new_medicine_entry = array(
				'medicine_name' => $medicine_names[$i],
				'medicine_note' => $medicine_notes[$i]
			);
			array_push( $medicine_entries, $new_medicine_entry );
		}
		return json_encode( $medicine_entries );
	}

	// Method for encoding multiple test entries into a json object
	private function encode_tests( $test_names, $test_notes ) {
		$number_of_test_entries = sizeof( $test_names );
		$test_entries           = array();
		for ( $i = 0; $i < $number_of_test_entries; $i++ ) {
			$new_test_entry = array(
				'test_name' => $test_names[$i],
				'test_note' => $test_notes[$i]
			);
			array_push( $test_entries, $new_test_entry );
		}
		return json_encode( $test_entries );
	}

	// Method for editing plugin settings
	private function edit_settings() {
		if ( $this->verify_nonce( 'edit_settings_nonce' ) == true ) {
			$table = $this->get_table_name( 'settings' );
			global $wpdb;
			// Update doctor name
			$data['description']    =   sanitize_text_field( $_POST['doctor_name'] );
			$wpdb->update( $table, $data, array( 'type' => 'doctor_name' ) );
			// Update doctor qualification
			$data['description']    =   sanitize_text_field( $_POST['doctor_qualification'] );
			$wpdb->update( $table, $data, array( 'type' => 'doctor_qualification' ) );
			// Update doctor phone number
			$data['description']    =   sanitize_text_field( $_POST['doctor_phone'] );
			$wpdb->update( $table, $data, array( 'type' => 'doctor_phone' ) );
			// Update doctor email address
			$data['description']    =   sanitize_email( $_POST['default_email'] );
			$wpdb->update( $table, $data, array( 'type' => 'default_email' ) );
			// Update default chamber
			$data['description']    =   sanitize_text_field( $_POST['default_chamber_id'] );
			$wpdb->update( $table, $data, array( 'type' => 'default_chamber_id' ) );
			// Update default currency
			$data['description']    =   sanitize_text_field( $_POST['default_currency'] );
			$wpdb->update( $table, $data, array( 'type' => 'default_currency' ) );
		}
	}

	// Convenient method for getting a table name of this plugin
	private function get_table_name( $table ) {
		global $wpdb;
		return $wpdb->prefix . 'ctmdcd_' . $table;
	}

	// Convenient method for sanitizing an array and return a sanitized array
	private function sanitized_array( $array ) {
		$sanitized_array = array();
		$i = 0;
		foreach ( $array as $value ) {
			$sanitized_array[ $i ] = ( isset( $value ) ) ? sanitize_text_field( $value ) : '';
			$i++;
		}
		return $sanitized_array;
	}

	// Convenient method for verifying wp nonce (provided that nonce field name and action is same)
	private function verify_nonce( $nonce_name ) {
		if ( $_POST[$nonce_name] ) {
			if ( wp_verify_nonce( $_POST[$nonce_name], $nonce_name ) ) {
				return true;
			}
			return false;
		}
		return false;
	}
}