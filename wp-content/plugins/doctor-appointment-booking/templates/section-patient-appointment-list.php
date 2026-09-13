<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<?php
	if ( count( $patient_appointments ) > 0 ) { ?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Chamber</th>
				<th>Date</th>
				<th>Schedule</th>
				<th>Visited</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$count = 1;
				foreach ( $patient_appointments as $appointment ):
					$chamber_info = \Ctmdcd\api\DataApi::get_chamber_info_by_id( $appointment->chamber_id );
			?>
				<tr>
					<td><?php echo $count++; ?></td>
					<td>
						<?php
							foreach ($chamber_info as $info)
								echo $info->name;
						?>
					</td>
					<td><?php echo date( get_option( 'date_format' ), $appointment->appointment_timestamp );?></td>
					<td><?php echo $appointment->schedule;?></td>
					<td>
						<?php if ( $appointment->is_visited == 0 ) { ?>
							<span class="badge badge-danger">No</span>
						<?php } else { ?>
							<span class="badge badge-success">Yes</span>
						<?php } ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php } else { ?>
		<div class="alert alert-info">
			<b><?php echo $row->name; ?></b> has no records of previous appointment with you
		</div>
<?php }
