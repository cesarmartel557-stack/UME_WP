<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<?php
	use \Ctmdcd\base\AjaxPosts;
	use \Ctmdcd\api\DataApi;

	$patient_info = DataApi::get_patient_info_by_id( AjaxPosts::$param1 );
	foreach ( $patient_info as $row ) :
?>

<div class="row">
	<div class="col">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="basic-tab" data-toggle="tab" href="#basic" role="tab"
				   aria-controls="basic" aria-selected="true">Basic Info</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="medical-tab" data-toggle="tab" href="#medical" role="tab"
				   aria-controls="medical" aria-selected="false">Medical Info</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="appointment-tab" data-toggle="tab" href="#appointment" role="tab"
				   aria-controls="appointment" aria-selected="false">Appointments</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="prescription-tab" data-toggle="tab" href="#prescription" role="tab"
				   aria-controls="prescription" aria-selected="false">Prescriptions</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab"
				   aria-controls="invoice" aria-selected="false">Invoices</a>
			</li>
		</ul>
		<div class="tab-content pt-2">
			<div class="tab-pane active" id="basic" role="tabpanel" aria-labelledby="basic-tab">
				<?php include 'section-patient-basic-info.php';?>
			</div>
			<div class="tab-pane" id="medical" role="tabpanel" aria-labelledby="medical-tab">
				<?php include 'section-patient-medical-info.php'; ?>
			</div>
			<div class="tab-pane" id="appointment" role="tabpanel" aria-labelledby="appointment-tab">
				<?php
					$patient_appointments = DataApi::get_appointments_of_patient( AjaxPosts::$param1 );
					include 'section-patient-appointment-list.php';
				?>
			</div>
			<div class="tab-pane" id="prescription" role="tabpanel" aria-labelledby="prescription-tab">
				<?php
					$patient_prescriptions = DataApi::get_prescriptions_of_patient( AjaxPosts::$param1 );
					include 'section-patient-prescription-list.php';
				?>
			</div>
			<div class="tab-pane" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                <div class="alert alert-danger text-center">
                    <b>Patient's invoice management is only available in the pro version</b>
                </div>
                <div class="text-center">
                    <a href="https://codecanyon.net/item/doctor-appointment-booking-wordpress-plugin/21215314"
                       class="btn btn-primary" target="_blank">View Detail</a>
                </div>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
