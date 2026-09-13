<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<div class="container-fluid">
	<div class="row mr-1 page-title">
		<div class="col-lg-6">
			<h5 class="mt-2">Manage Prescriptions</h5>
		</div>
		<div class="col-lg-6">
			<a href="#" class="btn btn-success pull-right"
					onclick="present_modal_page( 'modal-prescription-add', 'Create New Prescription' )">
				<i class="fa fa-plus"></i> &nbsp; New Prescription
			</a>
		</div>
	</div>
	<hr>
	<div class="row search-fields mr-1">
		<div class="col-lg-3">
			<div class="input-group">
				<input type="text" class="form-control" id="daterange" value="">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
			</div>
		</div>
		<div class="col-lg-3">
			<select id="patient" class="form-control select2"
				onchange="apply_prescription_filter()">
				<option value="">All Patients</option>
				<?php
					$patients = \Ctmdcd\api\DataApi::get_patients();
					foreach ($patients as $patient):
				?>
				<option value="<?php echo $patient->patient_id;?>"><?php echo $patient->name;?></option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<div id="prescription-list">
		<?php include 'section-prescription-list.php'; ?>
	</div>

	<?php include 'modal.php'; ?>

	<script type="text/javascript">

		var start, end, patient_id;
		var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";

		jQuery(document).ready(function() {

			// select2 initialize
			jQuery('.select2').select2();

			// Daterangepicker
			start = moment().subtract( 6, 'days' );
			end = moment();

			function cb( start, end ) {
				jQuery('#daterange').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
			}

			jQuery('#daterange').daterangepicker({
				startDate: start,
				endDate: end,
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				}
			}, cb);

			cb(start, end);

			// Called when the page loads for the first time with default filter parameters
			start = start.format('MM/DD/YYYY');
			end = end.format('MM/DD/YYYY');
			apply_prescription_filter();

			// Called when apply button on daterangepicker is tapped or any range is selected
			jQuery('#daterange').on('apply.daterangepicker', function( ev, picker ) {
				start = picker.startDate.format('MM/DD/YYYY');
				end = picker.endDate.format('MM/DD/YYYY');
				apply_prescription_filter();
			});

		});

		function apply_prescription_filter() {
			patient_id = jQuery('#patient').val();

			make_ajax_call( '<?php echo wp_create_nonce( 'ctmdcd-ajax-nonce' ); ?>', ajaxurl, 'section-prescription-list', 'prescription-list', patient_id, start, end );
		}

	</script>
</div>
