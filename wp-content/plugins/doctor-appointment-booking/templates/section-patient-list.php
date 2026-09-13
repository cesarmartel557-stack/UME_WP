<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<?php
    $start_date = \Ctmdcd\base\AjaxPosts::$param1;
    $end_date = \Ctmdcd\base\AjaxPosts::$param2;
    $patients = \Ctmdcd\api\DataApi::get_filtered_patients( $start_date, $end_date );
?>
<div class="row mt-4">
    <div class="col">
        <div class="result-info-text">
            Showing patients who were added from <b><?php echo $start_date;?></b> to <b><?php echo $end_date;?></b> -
            <small class="text-muted">( <?php echo count( $patients ); if(count( $patients )>1): echo ' Results'; else: echo ' Result'; endif;?> )</small>
        </div>
    </div>
</div>
<div class="shadow-box">
	<table class="table table-bordered">
		<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Options</th>
		</tr>
		</thead>
		<tbody>
	    <?php
	        $count = 1;
	        foreach ($patients as $row): ?>
		<tr>
			<td><?php echo $count++; ?></td>
			<td>
                <a href="#" onclick="present_modal_page( 'modal-patient-profile', 'Patient Profile', <?php echo $row->patient_id; ?> )">
                    <?php echo $row->name;?>
                </a>
            </td>
			<td><?php echo $row->email; ?></td>
			<td><?php echo $row->phone; ?></td>
			<td>
	            <button type="button" class="btn btn-outline-primary btn-sm"
	            	onclick="present_modal_page( 'modal-patient-profile', 'Patient Profile', <?php echo $row->patient_id; ?> )">
	                <i class="fa fa-user"></i> &nbsp; Profile
	            </button>
	            <button type="button" class="btn btn-outline-info btn-sm"
	                onclick="present_modal_page( 'modal-patient-edit', 'Edit Patient', '<?php echo $row->patient_id; ?>' )">
	                <i class="fa fa-pencil"></i> &nbsp; Edit
	            </button>
	        </td>
		</tr>
	    <?php endforeach; ?>
		</tbody>
	</table>
</div>
