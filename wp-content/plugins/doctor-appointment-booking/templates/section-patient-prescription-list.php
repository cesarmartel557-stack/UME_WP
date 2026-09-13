<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<?php
if ( count( $patient_prescriptions ) > 0 ) { ?>
	<table class="table table-bordered">
		<thead>
		<tr>
			<th>#</th>
			<th>Date</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$count = 1;
			foreach ( $patient_prescriptions as $prescription ):
				?>
			<tr>
				<td><?php echo $count++; ?></td>
				<td><?php echo date( get_option( 'date_format' ), $prescription->timestamp );?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php } else { ?>
	<div class="alert alert-info">
		You do not have any prescription record for <b><?php echo $row->name; ?></b>
	</div>
<?php }
