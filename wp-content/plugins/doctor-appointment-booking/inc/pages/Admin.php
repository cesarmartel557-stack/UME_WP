<?php

/**
 * @package DoctorAppointmentBooking
 */

namespace Ctmdcd\pages;

use \Ctmdcd\base\BaseController;
use \Ctmdcd\api\SettingsApi;
use \Ctmdcd\api\callbacks\AdminCallbacks;

defined( 'ABSPATH' ) or die( 'You can not access the file directly' );

class Admin extends BaseController
{
	public $settings;
	public $callbacks;
	public $pages = array();
	public $sub_pages = array();

	// Method that sets the main page of the plugin
	public function set_pages() {
		$this->pages = array(
			array(
				'page_title' => 'Appointments',
				'menu_title' => 'Doctor Chamber',
				'capability' => 'manage_options',
				'menu_slug' => 'ctmdcd-manage-appointments',
				'callback' => array( $this->callbacks, 'appointment' ),
				'icon_url' => 'dashicons-clock',
				'position' => 0
			)
		);
	}

	// Method that sets information of all the sub menus present in the plugin 
	public function set_sub_pages() {
		$this->sub_pages = array(
			array(
				'parent_slug' => 'ctmdcd-manage-appointments',
				'page_title' => 'Prescription',
				'menu_title' => 'Prescription',
				'capability' => 'manage_options',
				'menu_slug' => 'ctmdcd-manage-prescriptions',
				'callback' => array( $this->callbacks, 'prescription' )
			),
			array(
				'parent_slug' => 'ctmdcd-manage-appointments',
				'page_title' => 'Billing',
				'menu_title' => 'Billing',
				'capability' => 'manage_options',
				'menu_slug' => 'ctmdcd-manage-billing',
				'callback' => array( $this->callbacks, 'billing' )
			),
			array(
				'parent_slug' => 'ctmdcd-manage-appointments',
				'page_title' => 'Patients',
				'menu_title' => 'Patients',
				'capability' => 'manage_options',
				'menu_slug' => 'ctmdcd-manage-patients',
				'callback' => array( $this->callbacks, 'patient' )
			),
			array(
				'parent_slug' => 'ctmdcd-manage-appointments',
				'page_title' => 'Chambers',
				'menu_title' => 'Chambers',
				'capability' => 'manage_options',
				'menu_slug' => 'ctmdcd-manage-chambers',
				'callback' => array( $this->callbacks, 'chamber' )
			),
			array(
				'parent_slug' => 'ctmdcd-manage-appointments',
				'page_title' => 'Settings',
				'menu_title' => 'Settings',
				'capability' => 'manage_options',
				'menu_slug' => 'ctmdcd-settings',
				'callback' => array( $this->callbacks, 'settings' )
			)
		);
	}

	// Method for adding the pages into this plugin
	public function register() {
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();
		$this->set_pages();
		$this->set_sub_pages();
		$this->settings->add_pages( $this->pages )->with_sub_page( 'Appointments' )->add_sub_pages( $this->sub_pages )->register();
	}
}