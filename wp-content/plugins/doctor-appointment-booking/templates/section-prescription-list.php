<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<?php
    $patient_id = \Ctmdcd\base\AjaxPosts::$param1 == '' ? \Ctmdcd\base\AjaxPosts::$param6 : \Ctmdcd\base\AjaxPosts::$param1;
    $start_date = \Ctmdcd\base\AjaxPosts::$param2 == '' ? \Ctmdcd\base\AjaxPosts::$param7 : \Ctmdcd\base\AjaxPosts::$param2;
    $end_date = \Ctmdcd\base\AjaxPosts::$param3 == '' ? \Ctmdcd\base\AjaxPosts::$param8 : \Ctmdcd\base\AjaxPosts::$param3;

    if ( $patient_id == '' )
        $name = 'All patients';
    else {
        $patient_info = \Ctmdcd\api\DataApi::get_patient_info_by_id( $patient_id );
        foreach ( $patient_info as $value ) {
            $name = $value->name;
        }
    }

    $prescriptions = \Ctmdcd\api\DataApi::get_filtered_prescriptions( $patient_id, $start_date, $end_date );
?>
<div class="row mt-4">
    <div class="col">
        <div class="result-info-text">
            Showing prescription list of <b><?php echo $name;?></b> from <b><?php echo $start_date;?></b> to <b><?php echo $end_date;?></b> -
            <small class="text-muted">( <?php echo count( $prescriptions ); if(count( $prescriptions )>1): echo ' Results'; else: echo ' Result'; endif;?> )</small>
        </div>
    </div>
</div>
<div class="row mr-1">
    <div class="col">
		<div class="shadow-box">
			<table class="table table-bordered mt-3">
				<thead>
					<tr>
						<th>#</th>
						<th>Date</th>
						<th>Patient</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
                <?php
                    $count = 1;
                    foreach ( $prescriptions as $prescription ) :
                ?>
					<tr>
						<td><?php echo $count++;?></td>
						<td><?php echo date( get_option( 'date_format' ), $prescription->timestamp ); ?></td>
						<td>
                            <?php
                                $patient = \Ctmdcd\api\DataApi::get_patient_info_by_id( $prescription->patient_id );
                                foreach ( $patient as $value ) {
                                    echo $value->name;
                                }
                            ?>
                        </td>
						<td>
							<button type="button" class="btn btn-outline-primary btn-sm"
                                onclick="present_modal_page( 'modal-prescription-view', 'View / Print Prescription', '<?php echo $prescription->prescription_id;?>' )">
								<i class="fa fa-print"></i> &nbsp; Print / View
							</button>
                            <button type="button" class="btn btn-outline-info btn-sm"
                                onclick="present_modal_page( 'modal-prescription-edit', 'Edit Prescription', '<?php echo $prescription->prescription_id;?>' )">
                                <i class="fa fa-pencil"></i> &nbsp; Edit
                            </button>
							<button type="button" class="btn btn-outline-danger btn-sm"
                                onclick="confirm_action( 'confirm-action', 'Are you sure to delete this prescription ?', 'delete_prescription',
                                    '<?php echo $prescription->prescription_id;?>', 'section-prescription-list', 'prescription-list',
                                        'The prescription was deleted successfully', '<?php echo $patient_id;?>', '<?php echo $start_date;?>', '<?php echo $end_date;?>')">
								<i class="fa fa-trash"></i> &nbsp; Delete
							</button>
						</td>
					</tr>
                <?php endforeach;?>
				</tbody>
			</table>
		</div>
    </div>
</div>
