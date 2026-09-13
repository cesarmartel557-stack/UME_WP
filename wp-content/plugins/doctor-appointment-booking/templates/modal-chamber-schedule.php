<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<?php
	use \Ctmdcd\base\AjaxPosts;
	use \Ctmdcd\api\DataApi;

	$results = DataApi::get_chamber_info_by_id( AjaxPosts::$param1 );

	$days = array( 0 => 'Sunday', 1 => 'Monday', 2 =>'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 =>'Saturday' );

	$morning_times = array( '8:00 AM', '8:30 AM', '9:00 AM', '9:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '12:00 PM', '12:30 PM', '1:00 PM', '1:30 PM', '2:00 PM', '2:30 PM' );

	$afternoon_times = array( '12:00 PM', '12:30 PM', '1:00 PM', '1:30 PM', '2:00 PM', '2:30 PM', '3:00 PM', '3:30 PM', '4:00 PM', '4:30 PM', '5:00 PM', '5:30 PM', '6:00 PM' );

	$evening_times = array( '6:00 PM', '6:30 PM', '7:00 PM', '7:30 PM', '8:00 PM', '8:30 PM', '9:00 PM', '9:30 PM', '10:00 PM', '10:30 PM', '11:00 PM', '11:30 PM', '12:00 AM' );

	foreach ( $results as $row ):

		$schedule = ( $row->schedule != '' ) ? ( array )json_decode( $row->schedule ) : array();
?>

<form method="post" class="schedule-edit-form"
	action="<?php echo admin_url();?>admin-post.php">

	<input type="hidden" name="action" value="ctmdcd">
	<input type="hidden" name="task" value="edit_chamber_schedule">
	<input type="hidden" name="chamber_id" value="<?php echo $row->chamber_id; ?>">
    <input type="hidden" name="edit_chamber_schedule_nonce" value="<?php echo wp_create_nonce( 'edit_chamber_schedule_nonce' ); ?>">

	<div class="row mt-3">
		<div class="col"></div>
		<div class="col">
			<h6 class="text-muted">Morning Session</h6>
		</div>
		<div class="col">
			<h6 class="text-muted">Afternoon Session</h6>
		</div>
		<div class="col">
			<h6 class="text-muted">Evening Session</h6>
		</div>
	</div>

	<?php foreach ( $days as $key => $day ): ?>

		<input type="hidden" name="days[]" value="<?php echo $day; ?>">
		<?php
			$open = ( isset( $schedule[$key]->status ) ) ? $schedule[ $key ]->status : 'closed';
			$chk  = ( $open == 'open' ) ? 'checked' : '';
		?>
		<div class="row mt-3">
			<div class="col">
				<div class="form-group">
					<input name="open_days[]" class="open-days" value="<?php echo $key;?>" type="checkbox"
						<?php echo $chk; ?>>
	                <b><?php echo $day; ?></b>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<?php $v = ( isset( $schedule[$key]->morning_open ) ) ? $schedule[$key]->morning_open : '';?>
					<select class="form-control select2" style="width: 100%;">
						<option value="">Select Time</option>
						<?php foreach ( $morning_times as $time ): ?>
							<option value="<?php echo $time;?>"
								<?php echo ($time == $v) ? 'selected' : '';?>><?php echo $time;?></option>
						<?php endforeach;?>
					</select>
					<input type="hidden" name="morning_open[]" value="<?php echo $v;?>">
				</div>
				<div class="form-group">
					<?php $v = ( isset( $schedule[$key]->morning_close ) ) ? $schedule[$key]->morning_close : '';?>
					<select class="form-control select2" style="width: 100%;">
						<option value="">Select Time</option>
						<?php foreach ( $morning_times as $time ): ?>
							<option value="<?php echo $time;?>"
								<?php echo ($time == $v) ? 'selected' : '';?>><?php echo $time;?></option>
						<?php endforeach;?>
					</select>
					<input type="hidden" name="morning_close[]" value="<?php echo $v; ?>">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<?php $v = ( isset( $schedule[$key]->afternoon_open ) ) ? $schedule[$key]->afternoon_open : '';?>
					<select class="form-control select2" style="width: 100%;">
						<option value="">Select Time</option>
						<?php foreach ( $afternoon_times as $time ): ?>
							<option value="<?php echo $time;?>"
								<?php echo ($time == $v) ? 'selected' : '';?>><?php echo $time;?></option>
						<?php endforeach;?>
					</select>
					<input type="hidden" name="afternoon_open[]" value="<?php echo $v; ?>">
				</div>
				<div class="form-group">
					<?php $v = ( isset( $schedule[$key]->afternoon_close ) ) ? $schedule[$key]->afternoon_close : '';?>
					<select class="form-control select2" style="width: 100%;">
						<option value="">Select Time</option>
						<?php foreach ( $afternoon_times as $time ): ?>
							<option value="<?php echo $time;?>"
								<?php echo ($time == $v) ? 'selected' : '';?>><?php echo $time;?></option>
						<?php endforeach;?>
					</select>
					<input type="hidden" name="afternoon_close[]" value="<?php echo $v; ?>">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<?php $v = ( isset( $schedule[$key]->evening_open ) ) ? $schedule[$key]->evening_open : '';?>
					<select class="form-control select2" style="width: 100%;">
						<option value="">Select Time</option>
						<?php foreach ( $evening_times as $time ): ?>
							<option value="<?php echo $time;?>"
								<?php echo ($time == $v) ? 'selected' : '';?>><?php echo $time;?></option>
						<?php endforeach;?>
					</select>
					<input type="hidden" name="evening_open[]" value="<?php echo $v; ?>">
				</div>
				<div class="form-group">
					<?php $v = ( isset( $schedule[$key]->evening_close ) ) ? $schedule[$key]->evening_close : '';?>
					<select class="form-control select2" style="width: 100%;">
						<option value="">Select Time</option>
						<?php foreach ( $evening_times as $time ): ?>
							<option value="<?php echo $time;?>"
								<?php echo ($time == $v) ? 'selected' : '';?>><?php echo $time;?></option>
						<?php endforeach;?>
					</select>
					<input type="hidden" name="evening_close[]" value="<?php echo $v; ?>">
				</div>
			</div>
		</div>
	<?php endforeach;?>
	<hr class="mt-4 mb-4">
	<div class="row mt-3">
		<div class="col">
			<div class="form-group mb-0">
				<button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> &nbsp; Save Chamber Schedule
                </button>
				<a href="#" class="btn btn-info btn-cancel" data-dismiss="modal">
					<i class="fa fa-close"></i> Cancel
				</a>
			</div>
		</div>
	</div>
</form>
<?php endforeach;?>


<script type="text/javascript">

	jQuery(document).ready(function() {
		// Initialize select2
		jQuery('.select2').select2({
			width: 'resolve'
		});

		// Binding the form with jquery
		var options = {
            beforeSubmit        :   validate,
            success             :   showResponse,
            resetForm           :   true
        };
        jQuery('.schedule-edit-form').submit(function() {
            jQuery(this).ajaxSubmit(options);
            return false;
        });

		// Disable the select menu for the days unchecked when the page loads
		jQuery('.open-days').each(function(){
	    	var val = jQuery(this).prop('checked');
	      	//console.log(val);
	      	if(val== false) {
	   			//console.log(jQuery(this).parent().parent().parent().parent());
	      		jQuery(this).parent().parent().parent().find('select').attr('disabled','');
	      	} else {
	        	jQuery(this).parent().parent().parent().parent().parent().parent().find("select option[value='']").attr('selected', true);
	        	jQuery(this).parent().parent().parent().find('select').removeAttr("disabled");
	      	}
	    });

		// Enable or disbale select menus based on checkbox change
	    jQuery('.open-days').change(function(){
	      	var val = jQuery(this).prop('checked');
	      	//console.log(val);
	      	//console.log(jQuery(this).parent().parent().parent());
	      	if(val== false) {
	        	jQuery(this).parent().parent().parent().find('select').attr('disabled','');
	      	} else {
	        	jQuery(this).parent().parent().parent().parent().parent().parent().find("select option[value='']").attr('selected', true);
	        	jQuery(this).parent().parent().parent().find('select').removeAttr("disabled");
	      	}
	    });

	    // Take select values on change
	    jQuery('.select2').change(function(){
	      	var value = jQuery(this).val();
	        //console.log(value);
	        var parent = jQuery(this).parent();
	        //console.log(parent);
	      	jQuery(this).parent().find('input[type=hidden]').val(value);
	    });

	});

	function validate() {
		return true;
	}

	function showResponse() {
        var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";

        jQuery('#ajax-modal-page').modal('hide');

        make_ajax_call( '<?php echo wp_create_nonce( 'ctmdcd-ajax-nonce' ); ?>', ajaxurl, 'section-chamber-list', 'chamber-list' );

        notify( 'Chamber schedule was updated successfully', 'success' );
    }

</script>
