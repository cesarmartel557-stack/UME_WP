<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<div class="container-fluid">
	<div class="row mr-1 page-title">
		<div class="col-lg-6">
			<h5 class="mt-2">Manage Appointments</h5>
		</div>
		<div class="col-lg-6">
			<a href="#" class="btn btn-success pull-right new-appointment"
					onclick="present_modal_page( 'modal-appointment-add', 'Add Appointment' )">
				<i class="fa fa-plus"></i> &nbsp; New Appointment
			</a>
		</div>
	</div>
	<hr>
	<div class="row mr-1">
		<div class="col">
			<div id="appointment-calendar">
				<?php include 'section-appointment-calendar.php' ;?>
			</div>
		</div>
		<div class="col">
			<div id="appointment-list">
				<?php include 'section-appointment-list.php'; ?>
			</div>
		</div>
	</div>

	<?php include 'modal.php'; ?>
</div>