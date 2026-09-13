<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<div class="shadow-box">
	<table class="table table-bordered mt-3">
		<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Address</th>
            <th>Status</th>
			<th>Options</th>
		</tr>
		</thead>
		<tbody>
	    <?php
	        $count = 1;
	        $chambers = \Ctmdcd\api\DataApi::get_chambers();
	        foreach ($chambers as $row): ?>
		<tr>
			<td><?php echo $count++; ?></td>
			<td>
                <a href="#" onclick="present_modal_page( 'modal-chamber-schedule', 'Schedule', '<?php echo $row->chamber_id;?>' )">
	                <?php echo $row->name; ?>
                </a>
            </td>
			<td><?php echo $row->address; ?></td>
            <td>
                <span class="badge badge-<?php echo $row->status == 1 ? 'success' : 'danger' ;?>">
                    <?php echo $row->status == 1 ? 'Active' : 'Inactive'; ?>
                </span>
            </td>
			<td>
	            <button type="button" class="btn btn-outline-primary btn-sm"
	            	onclick="present_modal_page( 'modal-chamber-schedule', 'Schedule', '<?php echo $row->chamber_id;?>' )">
	                <i class="fa fa-cog"></i> &nbsp; Schedule
	            </button>
	            <button type="button" class="btn btn-outline-info btn-sm"
	                onclick="present_modal_page( 'modal-chamber-edit', 'Edit Chamber', '<?php echo $row->chamber_id; ?>' )">
	                <i class="fa fa-pencil"></i> &nbsp; Edit
	            </button>
	        </td>
		</tr>
	    <?php endforeach; ?>
		</tbody>
	</table>
</div>