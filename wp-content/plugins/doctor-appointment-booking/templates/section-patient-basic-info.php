<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<table class="table table-bordered">
	<tbody>
		<tr>
			<td width="30%"><b>Name</b></td>
			<td width="70%"><?php echo $row->name;?></td>
		</tr>
		<tr>
			<td><b>Email Address</b></td>
			<td><?php echo $row->email;?></td>
		</tr>
		<tr>
			<td><b>Phone Number</b></td>
			<td><?php echo $row->phone;?></td>
		</tr>
		<tr>
			<td><b>Age</b></td>
			<td><?php echo $row->age == null ? '' : $row->age ;?></td>
		</tr>
		<tr>
			<td><b>Gender</b></td>
			<td><?php echo $row->gender == null ? '' : $row->gender ;?></td>
		</tr>
		<tr>
			<td><b>Address</b></td>
			<td><?php echo $row->address == null ? '' : $row->address ;?></td>
		</tr>
		<tr>
			<td><b>Notes</b></td>
			<td><?php echo $row->notes == null ? '' : $row->notes ;?></td>
		</tr>
	</tbody>
</table>
