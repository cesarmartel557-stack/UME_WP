<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<div class="container-fluid">
	<div class="row mr-1 page-title">
		<div class="col-lg-6">
			<h5 class="mt-2">Manage Patients</h5>
		</div>
		<div class="col-lg-6">
			<a href="#" class="btn btn-success pull-right"
					onclick="present_modal_page( 'modal-patient-add', 'Add Patient' )">
				<i class="fa fa-plus"></i> &nbsp; Add Patient
			</a>
		</div>
	</div>
	<hr>
	<div class="row mr-1 search-fields">
		<div class="col-lg-3">
			<div class="input-group">
				<input type="text" class="form-control" id="daterange" value="">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search patient" id="search">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>
			</div>
		</div>
	</div>
	<div class="row mr-1">
		<div class="col">
			<div id="patient-list">
				<?php include 'section-patient-list.php'; ?>
			</div>
		</div>
	</div>

	<?php include 'modal.php'; ?>

	<script>
		var start, end;
		var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";

		jQuery(document).ready(function () {
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
			apply_patient_filter();

			// Called when apply button on daterangepicker is tapped or any range is selected
			jQuery('#daterange').on('apply.daterangepicker', function( ev, picker ) {
				start = picker.startDate.format('MM/DD/YYYY');
				end = picker.endDate.format('MM/DD/YYYY');
				apply_patient_filter();
			});

			// Search filter
			jQuery('#search').keyup(function () {
				var searchText = jQuery( this ).val().toLowerCase();
				jQuery.each( jQuery(".table tbody tr"), function() {
					if( jQuery( this ).text().toLowerCase().indexOf( searchText ) === -1)
						jQuery( this ).hide();
					else
						jQuery( this ).show();
				});
			});

		});

		function apply_patient_filter() {
			make_ajax_call( '<?php echo wp_create_nonce( 'ctmdcd-ajax-nonce' ); ?>', ajaxurl, 'section-patient-list', 'patient-list', start, end );
		}

	</script>
</div>