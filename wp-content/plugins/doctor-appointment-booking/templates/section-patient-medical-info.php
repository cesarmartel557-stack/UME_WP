<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<?php if ( $row->medical_info == null ) { ?>
	<div class="alert alert-info">
		Medical information for <?php echo $row->name; ?> is not available
	</div>
<?php } else {
	$medical_info = json_decode( $row->medical_info );
?>

	<table class="table table-bordered">
		<tbody>
			<tr>
				<td><b>Blood Group</b></td>
				<td><?php echo $medical_info[0]->blood_group;?></td>
			</tr>
			<tr>
				<td><b>Height</b></td>
				<td><?php echo $medical_info[0]->height;?></td>
			</tr>
			<tr>
				<td><b>Weight</b></td>
				<td><?php echo $medical_info[0]->weight;?></td>
			</tr>
			<tr>
				<td><b>Blood Pressure</b></td>
				<td><?php echo $medical_info[0]->blood_pressure;?></td>
			</tr>
			<tr>
				<td><b>Pulse</b></td>
				<td><?php echo $medical_info[0]->pulse;?></td>
			</tr>
			<tr>
				<td><b>Respiration</b></td>
				<td><?php echo $medical_info[0]->respiration;?></td>
			</tr>
			<tr>
				<td><b>Allergy</b></td>
				<td><?php echo $medical_info[0]->allergy;?></td>
			</tr>
			<tr>
				<td><b>Diet</b></td>
				<td><?php echo $medical_info[0]->diet;?></td>
			</tr>
		</tbody>
	</table>

<?php }
